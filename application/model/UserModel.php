<?php

class UserModel
{

    public static function getPublicProfilesOfAllUsers()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, user_email, user_active, user_has_avatar, user_deleted FROM users ORDER BY user_name";
        $query = $database->prepare($sql);
        $query->execute();

        $all_users_profiles = array();

        foreach ($query->fetchAll() as $user) {

            array_walk_recursive($user, 'Filter::XSSFilter');

            $all_users_profiles[$user->user_id] = new stdClass();
            $all_users_profiles[$user->user_id]->user_id = $user->user_id;
            $all_users_profiles[$user->user_id]->user_name = $user->user_name;
            $all_users_profiles[$user->user_id]->user_email = $user->user_email;
            $all_users_profiles[$user->user_id]->user_active = $user->user_active;
            $all_users_profiles[$user->user_id]->user_deleted = $user->user_deleted;
            $all_users_profiles[$user->user_id]->user_avatar_link = (Config::get('USE_GRAVATAR') ? AvatarModel::getGravatarLinkByEmail($user->user_email) : AvatarModel::getPublicAvatarFilePathOfUser($user->user_has_avatar, $user->user_id));
        }

        return $all_users_profiles;
    }

    public static function getAllUsers()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, user_email FROM users WHERE user_active = 1 AND user_deleted = 0";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getPublicProfileOfUser($user_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name, user_email, user_active, user_has_avatar, user_deleted, user_account_type, user_suspension_timestamp
                FROM users WHERE user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        $user = $query->fetch();

        if ($query->rowCount() == 1) {
            if (Config::get('USE_GRAVATAR')) {
                $user->user_avatar_link = AvatarModel::getGravatarLinkByEmail($user->user_email);
            } else {
                $user->user_avatar_link = AvatarModel::getPublicAvatarFilePathOfUser($user->user_has_avatar, $user->user_id);
            }
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_USER_DOES_NOT_EXIST'));
        }

        array_walk_recursive($user, 'Filter::XSSFilter');

        return $user;
    }

    public static function getUserDataByUserEmail($user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id, user_name, user_email, user_password_hash, user_active,user_deleted, user_suspension_timestamp, user_account_type,
        user_failed_logins, user_last_failed_login FROM users
                                     WHERE user_email = :user_email
                                           AND user_provider_type = :provider_type LIMIT 1");
        $query->execute(array(':user_email' => $user_email, ':provider_type' => 'DEFAULT'));

        return $query->fetch();
    }

    public static function doesEmailAlreadyExist($user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id FROM users WHERE user_email = :user_email LIMIT 1");
        $query->execute(array(':user_email' => $user_email));
        if ($query->rowCount() == 0) {
            return false;
        }
        return true;
    }

    public static function saveNewUserName($user_id, $new_user_name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_name = :user_name WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_name' => $new_user_name, ':user_id' => $user_id));
        if ($query->rowCount() == 1) {
            return true;
        }
        return false;
    }

    public static function saveNewEmailAddress($user_id, $new_user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_email = :user_email WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(':user_email' => $new_user_email, ':user_id' => $user_id));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }

    public static function editUserName($new_user_name)
    {
        if ($new_user_name == Session::get('user_name')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        if (!preg_match("/^[a-zA-Z á-úÁ-ÚüÜ]{2,64}$/", $new_user_name)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        $new_user_name = substr(strip_tags($new_user_name), 0, 64);

        $status_of_action = self::saveNewUserName(Session::get('user_id'), $new_user_name);
        if ($status_of_action) {
            Session::set('user_name', $new_user_name);
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }

    public static function editUserNameAdmin()
    {
        $user_name = Request::post('user_name'); 
        $user_id = Request::post('user_id');

        $user = self::getPublicProfileOfUser($user_id);

        if ($user_name == $user->user_name) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_SAME_AS_OLD_ONE'));
            return false;
        }

        if (!preg_match("/^[a-zA-Z á-úÁ-ÚüÜ]{2,64}$/", $user_name)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        $user_name = substr(strip_tags($user_name), 0, 64);

        $status_of_action = self::saveNewUserName($user_id, $user_name);
        if ($status_of_action) {
            Session::add('feedback_positive', Text::get('FEEDBACK_USERNAME_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
            return false;
        }
    }

    public static function editUserEmail($new_user_email)
    {
        if (empty($new_user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_FIELD_EMPTY'));
            return false;
        }

        if ($new_user_email == Session::get('user_email')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_SAME_AS_OLD_ONE'));
            return false;
        }

        if (!filter_var($new_user_email, FILTER_VALIDATE_EMAIL)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        $new_user_email = substr(strip_tags($new_user_email), 0, 254);

        if (self::doesEmailAlreadyExist($new_user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USER_EMAIL_ALREADY_TAKEN'));
            return false;
        }

        if (self::saveNewEmailAddress(Session::get('user_id'), $new_user_email)) {
            Session::set('user_email', $new_user_email);
            Session::set('user_gravatar_image_url', AvatarModel::getGravatarLinkByEmail($new_user_email));
            //generate activation hash
            $user_activation_hash = sha1(uniqid(mt_rand(), true));
            //send verify email
            RegistrationModel::sendVerificationEmail(Session::get('user_id'), Session::get('user_name'), $new_user_email, $user_activation_hash);
            //disabled user and save activation hash for verify email
            self::disabledUser(Session::get('user_id'), $user_activation_hash );
            Session::add('feedback_positive', Text::get('FEEDBACK_EMAIL_CHANGE_SUCCESSFUL'));
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
        return false;
    }

    public static function editUserEmailAdmin()
    {
        $user_email = Request::post('user_email'); 
        $user_id = Request::post('user_id');

        $user = self::getPublicProfileOfUser($user_id);

        if (empty($user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_FIELD_EMPTY'));
            return false;
        }

        if ($user_email == $user->user_email) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_SAME_AS_OLD_ONE'));
            return false;
        }

        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN'));
            return false;
        }

        $user_email = substr(strip_tags($user_email), 0, 254);

        if (self::doesEmailAlreadyExist($user_email)) {
            Session::add('feedback_negative', Text::get('FEEDBACK_USER_EMAIL_ALREADY_TAKEN'));
            return false;
        }

        if (self::saveNewEmailAddress($user_id, $user_email)) {
            //generate activation hash
            $user_activation_hash = sha1(uniqid(mt_rand(), true));
            //send verify email
            RegistrationModel::sendVerificationEmail($user_id, $user->user_name, $user_email, $user_activation_hash);
            //disabled user and save activation hash for verify email
            self::disabledUser($user_id, $user_activation_hash );
            Session::add('feedback_positive', Text::get('FEEDBACK_EMAIL_CHANGE_SUCCESSFUL'));
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_UNKNOWN_ERROR'));
        return false;
    }

    public static function getUserIdByUserEmail($user_email)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id FROM users WHERE user_email = :user_email AND user_provider_type = :provider_type LIMIT 1";
        $query = $database->prepare($sql);

        $query->execute(array(':user_email' => $user_email, ':provider_type' => 'DEFAULT'));

        return $query->fetch()->user_id;
    }

    public static function getUserDataByUserIdAndToken($user_id, $token)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT user_id, user_name, user_email, user_password_hash, user_active,
                                          user_account_type,  user_has_avatar, user_failed_logins, user_last_failed_login
                                     FROM users
                                     WHERE user_id = :user_id
                                       AND user_remember_me_token = :user_remember_me_token
                                       AND user_remember_me_token IS NOT NULL
                                       AND user_provider_type = :provider_type LIMIT 1");
        $query->execute(array(':user_id' => $user_id, ':user_remember_me_token' => $token, ':provider_type' => 'DEFAULT'));

        return $query->fetch();
    }

    public static function disabledUser($user_id,$user_activation_hash )
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE users SET user_active = 0, user_activation_hash = :user_activation_hash WHERE user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => $user_id, ':user_activation_hash' => $user_activation_hash));

        if ($query->rowCount() == 1) {
            Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_USER_NOT_ACTIVATED'));
            return true;
        }
        return false;
    }
}
