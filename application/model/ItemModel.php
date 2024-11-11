<?php

class ItemModel
{
    public static function getAllItems()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, item_id, item_text, item_default FROM items WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id')));

        return $query->fetchAll();
    }

    public static function getItem($item_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, item_id, item_text, item_default FROM items WHERE user_id = :user_id AND item_id = :item_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => Session::get('user_id'), ':item_id' => $item_id));

        return $query->fetch();
    }

    public static function createItem($item_text)
    {
        if (!$item_text || strlen($item_text) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $item_text = trim($item_text);
        $user_id = Session::get('user_id');

        if (self::eval_default() == 1){
            self::clearDefault($user_id);
        }

        $sql = "INSERT INTO items (item_text, item_default, user_id) VALUES (:item_text, :item_default, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':item_text' => $item_text, ':item_default' => self::eval_default(), ':user_id' => $user_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function updateItem($item_id, $item_text)
    {
        if (!$item_id || !$item_text) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $item_text = trim($item_text);
        $user_id = Session::get('user_id');

        if (self::eval_default() == 1){
            self::clearDefault($user_id);
        }

        $sql = "UPDATE items SET item_text = :item_text, item_default = :item_default WHERE item_id = :item_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':item_id' => $item_id, ':item_text' => $item_text, ':item_default' => self::eval_default(), ':user_id' => $user_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    public static function deleteItem($item_id)
    {
        if (!$item_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM items WHERE item_id = :item_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':item_id' => $item_id, ':user_id' => Session::get('user_id')));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    /* functiones adicionales*/

    public static function getAllItemsAdmin()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT items.user_id, users.user_name, items.item_id, items.item_text, items.item_default FROM items INNER JOIN users ON items.user_id = users.user_id ORDER BY users.user_name";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getItemAdmin($item_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, item_id, item_text, item_default FROM items WHERE item_id = :item_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':item_id' => $item_id));

        return $query->fetch();
    }

    public static function createItemAdmin($user_id, $item_text)
    {
        if (!$user_id || !$item_text || strlen($item_text) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $item_text = trim($item_text);

        if (self::eval_default() == 1){
            self::clearDefault($user_id);
        }

        $sql = "INSERT INTO items (item_text, item_default, user_id) VALUES (:item_text, :item_default, :user_id)";
        $query = $database->prepare($sql);
        $query->execute(array(':item_text' => $item_text, ':item_default' => self::eval_default(), ':user_id' => $user_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function updateItemAdmin($item_id, $item_text)
    {
        if (!$item_id || !$item_text) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $item_text = trim($item_text);
        $user_id = self::getItem($item_id)->user_id;

        if (self::eval_default() == 1){
            self::clearDefault($user_id);
        }

        $sql = "UPDATE items SET item_text = :item_text, item_default = :item_default WHERE item_id = :item_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':item_id' => $item_id, ':item_text' => $item_text, ':item_default' => self::eval_default(), ':user_id' => $user_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    public static function deleteItemAdmin($item_id, $user_id)
    {
        if (!$item_id || !$user_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM items WHERE item_id = :item_id AND user_id = :user_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':item_id' => $item_id, ':user_id' => $user_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    //verificar si envió o no elemento predeterminado
    //funciona con los checkbox no multiples
    public static function eval_default()
    {
        $item_default = Request::post('item_default');
        $item_default = (!$item_default) ? 0 : $item_default;
        return (strlen($item_default) > 1 && $item_default == "on") ? 1 : 0;
    }

    //buscar todos los predeterminados y convertirlos en no predeterminados
    public static function clearDefault($user_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE items SET item_default = 0 WHERE user_id = :user_id";
        $query = $database->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        if ($query->rowCount() >= 1) {
            return true;
        }

        return false;
    }
}
