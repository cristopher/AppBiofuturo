<?php

class TecnicoModel
{
    public static function getAllTecnicos()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT tecnico_id, tecnico_nombre, tecnico_apellido, tecnico_usuario, tecnico_password FROM tecnicos";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getTecnico($tecnico_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT tecnico_id, tecnico_nombre, tecnico_apellido, tecnico_usuario, tecnico_password FROM tecnicos WHERE tecnico_id = :tecnico_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_id' => $tecnico_id));

        return $query->fetch();
    }

    public static function getTecnicoLogin($tecnico_usuario, $tecnico_password)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT Count(tecnico_id) FROM tecnicos WHERE tecnico_usuario = :tecnico_usuario AND tecnico_password = :tecnico_password LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_usuario' => $tecnico_usuario, ':tecnico_password' => $tecnico_password));

        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }

    public static function createTecnico($tecnico_nombre)
    {
        if (!$tecnico_nombre || strlen($tecnico_nombre) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $tecnico_nombre = trim($tecnico_nombre);
        $tecnico_apellido = Request::post('tecnico_apellido');
        $tecnico_usuario = Request::post('tecnico_usuario');
        $tecnico_password = Request::post('tecnico_password');

        $sql = "INSERT INTO tecnicos (tecnico_nombre, tecnico_apellido, tecnico_usuario, tecnico_password) VALUES (:tecnico_nombre, :tecnico_apellido, :tecnico_usuario, :tecnico_password)";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_nombre' => $tecnico_nombre, ':tecnico_apellido' => $tecnico_apellido, ':tecnico_usuario' => $tecnico_usuario, ':tecnico_password' => $tecnico_password));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function updateTecnico($tecnico_id, $tecnico_nombre)
    {
        if (!$tecnico_id || !$tecnico_nombre) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $tecnico_nombre = trim($tecnico_nombre);
        $tecnico_apellido = Request::post('tecnico_apellido');
        $tecnico_usuario = Request::post('tecnico_usuario');
        $tecnico_password = Request::post('tecnico_password');

        $sql = "UPDATE tecnicos SET tecnico_nombre = :tecnico_nombre, tecnico_apellido = :tecnico_apellido, tecnico_usuario = :tecnico_usuario, tecnico_password = :tecnico_password WHERE tecnico_id = :tecnico_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_id' => $tecnico_id, ':tecnico_nombre' => $tecnico_nombre, ':tecnico_apellido' => $tecnico_apellido, ':tecnico_usuario' => $tecnico_usuario, ':tecnico_password' => $tecnico_password));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    public static function deleteTecnico($tecnico_id)
    {
        if (!$tecnico_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM tecnicos WHERE tecnico_id = :tecnico_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_id' => $tecnico_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
