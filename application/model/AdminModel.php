<?php

class AdminModel
{
    public static function deletionStatus($userId, $softDelete)
    {
        if ($userId == Session::get('user_id')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_CANT_DELETE_SUSPEND_OWN'));
            return false;
        }

        if ($softDelete == 1) {
            $delete = 1;
        } else {
            $delete = 0;
        }

        self::writeDeleteInfoToDatabase($userId, $delete);

        if ($delete = 1) {
            self::resetUserSession($userId);
        }
    }

    private static function writeDeleteInfoToDatabase($userId, $delete)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_deleted = :user_deleted  WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(
                ':user_deleted' => $delete,
                ':user_id' => $userId
        ));

        if ($query->rowCount() == 1) {
            Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_SUSPENSION_DELETION_STATUS'));
            return true;
        }
    }

    public static function deleteUser($userId)
    {
        if ($userId == Session::get('user_id')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_CANT_DELETE_SUSPEND_OWN'));
            return false;
        }

        //expulsar al usuario
        self::resetUserSession($userId);

        //eliminar sus notas
        self::deleteNotes($userId);
        //eliminar al usuario
        self::byeUser($userId);

    }

    public static function deleteNotes($userId)
    {
        $notes = NoteModel::getAllNotesAdmin($userId);

        foreach ($notes as $note) {
            NoteModel::deleteNoteAdmin($note->note_id, $userId);
        }
    }

    public static function byeUser($user_id)
    {
        if (!$user_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM users WHERE user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }


    public static function setAccountSuspensionStatus($suspensionInDays, $userId)
    {

        if ($userId == Session::get('user_id')) {
            Session::add('feedback_negative', Text::get('FEEDBACK_ACCOUNT_CANT_DELETE_SUSPEND_OWN'));
            return false;
        }

        if ($suspensionInDays > 0) {
            $suspensionTime = time() + ($suspensionInDays * 60 * 60 * 24);
        } else {
            $suspensionTime = null;
        }

        self::writeDeleteAndSuspensionInfoToDatabase($userId, $suspensionTime);

        if ($suspensionTime != null) {
            self::resetUserSession($userId);
        }
    }

    private static function writeDeleteAndSuspensionInfoToDatabase($userId, $suspensionTime)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET user_suspension_timestamp = :user_suspension_timestamp  WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(
                ':user_suspension_timestamp' => $suspensionTime,
                ':user_id' => $userId
        ));

        if ($query->rowCount() == 1) {
            Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_SUSPENSION_DELETION_STATUS'));
            return true;
        }
    }

    private static function resetUserSession($userId)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("UPDATE users SET session_id = :session_id  WHERE user_id = :user_id LIMIT 1");
        $query->execute(array(
                ':session_id' => null,
                ':user_id' => $userId
        ));

        if ($query->rowCount() == 1) {
            Session::add('feedback_positive', Text::get('FEEDBACK_ACCOUNT_USER_SUCCESSFULLY_KICKED'));
            return true;
        }
    }
}
