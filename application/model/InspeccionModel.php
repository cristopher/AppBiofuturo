<?php

class InspeccionModel
{

    public static function getAllInspecciones()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT inspecciones.tecnico_id, tecnicos.tecnico_usuario, inspecciones.inspeccion_id, inspecciones.cliente_id, inspecciones.campos_id, inspecciones.inspeccion_fecha FROM inspecciones 
        INNER JOIN tecnicos ON inspecciones.tecnico_id = tecnicos.tecnico_id";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getAllInspeccionesWhereTecnico($tecnico_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT inspecciones.tecnico_id, tecnicos.tecnico_usuario, inspecciones.inspeccion_id, inspecciones.cliente_id, inspecciones.campos_id, inspecciones.inspeccion_fecha FROM inspecciones 
        INNER JOIN tecnicos ON inspecciones.tecnico_id = tecnicos.tecnico_id 
        WHERE tecnico_id = :tecnico_id";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_id' => $tecnico_id));

        return $query->fetchAll();
    }

    public static function getInspeccion($inspeccion_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT inspecciones.tecnico_id, tecnicos.tecnico_usuario, inspecciones.inspeccion_id, inspecciones.cliente_id, inspecciones.campos_id, inspecciones.inspeccion_fecha FROM inspecciones 
        INNER JOIN tecnicos ON inspecciones.tecnico_id = tecnicos.tecnico_id 
        WHERE inspeccion_id = :inspeccion_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':inspeccion_id' => $inspeccion_id));

        return $query->fetch();
    }

    public static function getInspeccionWhereTecnico($inspeccion_id, $tecnico_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT inspecciones.tecnico_id, tecnicos.tecnico_usuario, inspecciones.inspeccion_id, inspecciones.cliente_id, inspecciones.campos_id, inspecciones.inspeccion_fecha FROM inspecciones 
        INNER JOIN tecnicos ON inspecciones.tecnico_id = tecnicos.tecnico_id 
        WHERE tecnico_id = :tecnico_id AND inspeccion_id = :inspeccion_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_id' => $tecnico_id, ':inspeccion_id' => $inspeccion_id));

        return $query->fetch();
    }

    public static function createInspeccion($inspeccion_fecha)
    {
        if (!$inspeccion_fecha || strlen($inspeccion_fecha) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $tecnico_id = trim(Request::post('tecnico_id'));
        $cliente_id = trim(Request::post('cliente_id'));
        $campos_id = trim(Request::post('campos_id'));

        $sql = "INSERT INTO inspecciones (tecnico_id, cliente_id, campos_id, inspeccion_fecha) VALUES (:tecnico_id, :cliente_id, :campos_id, :inspeccion_fecha)";
        $query = $database->prepare($sql);
        $query->execute(array(':tecnico_id' => $tecnico_id, ':cliente_id' => $cliente_id, ':campos_id' => $campos_id, ':inspeccion_fecha' => $inspeccion_fecha));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
        return false;
    }

    public static function updateInspeccion($inspeccion_id, $inspeccion_fecha)
    {
        if (!$inspeccion_id || !$inspeccion_fecha) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $inspeccion_fecha = trim($inspeccion_fecha);
        $tecnico_id = trim(Request::post('tecnico_id'));
        $cliente_id = trim(Request::post('cliente_id'));
        $campos_id = trim(Request::post('campos_id'));

        $sql = "UPDATE inspecciones SET cliente_id = :cliente_id, campos_id = :campos_id, inspeccion_fecha = :inspeccion_fecha WHERE inspeccion_id = :inspeccion_id AND tecnico_id = :tecnico_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':inspeccion_id' => $inspeccion_id, ':tecnico_id' => $tecnico_id, ':cliente_id' => $cliente_id, ':campos_id' => $campos_id, ':inspeccion_fecha' => $inspeccion_fecha));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }

    public static function deleteInspeccion($inspeccion_id)
    {
        if (!$inspeccion_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM inspecciones WHERE inspeccion_id = :inspeccion_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':inspeccion_id' => $inspeccion_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }

    public static function deleteInspeccionWhereTecnico($inspeccion_id, $tecnico_id)
    {
        if (!$inspeccion_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM inspecciones WHERE inspeccion_id = :inspeccion_id AND tecnico_id = :tecnico_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':inspeccion_id' => $inspeccion_id, ':tecnico_id' => $tecnico_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}
