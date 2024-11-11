<?php

class TrampaModel
{
    public static function getAllTrampas()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT trampa_id, cliente_id, campos_id, trampa_codigo, trampa_x, trampa_y, trampa_activa FROM trampas";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getAllTrampasWhereClienteAndCampo()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT trampa_id, cliente_id, campos_id, trampa_codigo, trampa_x, trampa_y, trampa_activa FROM trampas WHERE cliente_id = :cliente_id AND campos_id = :campos_id";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getTrampa($trampa_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT trampa_id, cliente_id, campos_id, trampa_codigo, trampa_x, trampa_y, trampa_activa FROM trampas WHERE trampa_id = :trampa_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':trampa_id' => $trampa_id));

        return $query->fetch();
    }

    public static function createTrampa($trampa_codigo)
    {
        if (!$trampa_codigo || strlen($trampa_codigo) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $trampa_codigo = trim($trampa_codigo);
        $cliente_id = trim(Request::post('cliente_id'));
        $campos_id = trim(Request::post('campos_id'));
        $trampa_x = trim(Request::post('trampa_x'));
        $trampa_y = trim(Request::post('trampa_y'));

        $sql = "INSERT INTO trampas (cliente_id, campos_id, trampa_codigo, trampa_x, trampa_y, trampa_activa) VALUES (:cliente_id, :campos_id, :trampa_codigo, :trampa_x, :trampa_y, :trampa_activa)";
        $query = $database->prepare($sql);
        $query->execute(array(':cliente_id' => $cliente_id, ':campos_id' => $campos_id, ':trampa_codigo' => $trampa_codigo, ':trampa_x' => $trampa_x, ':trampa_y' => $trampa_y, ':trampa_activa' => 1));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function updateTrampa($trampa_id, $trampa_codigo)
    {
        if (!$trampa_id || !$trampa_codigo) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $trampa_codigo = trim($trampa_codigo);
        $cliente_id = trim(Request::post('cliente_id'));
        $campos_id = trim(Request::post('campos_id'));
        $trampa_x = trim(Request::post('trampa_x'));
        $trampa_y = trim(Request::post('trampa_y'));
        $trampa_activa = trim(Request::post('trampa_activa'));

        $sql = "UPDATE trampas SET cliente_id, campos_id, trampa_codigo, trampa_x, trampa_y, trampa_activa WHERE trampa_id = :trampa_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':trampa_id' => $trampa_id, ':cliente_id' => $cliente_id, ':campos_id' => $campos_id, ':trampa_codigo' => $trampa_codigo, ':trampa_x' => $trampa_x, ':trampa_y' => $trampa_y, ':trampa_activa' => $trampa_activa));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    public static function deleteTrampa($trampa_id)
    {
        if (!$trampa_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM trampas WHERE trampa_id = :trampa_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':trampa_id' => $trampa_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
