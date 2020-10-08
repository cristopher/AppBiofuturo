<?php

class UserRoleModel
{

    public static function changeUserRole()
    {
        $type = Request::post('user_account');
        $user_id = Request::post('user_id');

        if (!$type) {
            return false;
        }

        if (self::saveRoleToDatabase($type, $user_id)) {
            Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_TYPE_CHANGE_SUCCESSFUL'));
            return true;
        } else {
            Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_TYPE_CHANGE_FAILED'));
            return false;
        }
    }

    public static function saveRoleToDatabase($type, $user_id)
    {

        if (!in_array($type, [1, 2, 3, 4, 5, 6, 7])) {
            return false;
        }

        //no puedes cambiar tu propio rol
        if ($user_id == Session::get('user_id')) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_account_type = :new_type WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(
            ':new_type' => $type,
            ':user_id' => $user_id
        ));

        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }
}
