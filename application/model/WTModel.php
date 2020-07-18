<?php

class WTModel
{
    private $table = '';

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function getAll(){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM " . $this->table;
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function get($where){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ';
        $sql_count = 0;
        $order = ' ORDER BY ';
        $order_count = 0;

        //cargar las variables al string sql
        foreach ($where as $var => $value) {
            if ($value != 'ASC' && $value != 'DESC'){
                if ($sql_count > 0) {
                    $sql .= " AND ";
                }
                
                $sql .= "$var = :$var ";
                $sql_count++;

            }else{
                if ($order_count > 0) {
                    $order .= " AND ";
                }

                $order .= "$var $value";
                $order_count++;
            }
        }
        //convertir las variables a tag para execute :var
        foreach ($where as $var => $value) {
            if ($value != 'ASC' && $value != 'DESC'){
                $where[":$var"] = $value;
                unset($where[$var]);
            }else{
                unset($where[$var]);
            }
        }

        if ($order_count > 0) {
            $sql .= $order;
        }
        
        $query = $database->prepare($sql);
        $query->execute($where);

        return $query->fetchAll();
    }

    public function getOne($where){
        $data = $this->get($where);
        $tmp = (array) $data;

        if (empty($tmp) == true){
            return new stdClass();
        }
        
        return $data[0];
    }

    public function new($data, $filter){
        $database = DatabaseFactory::getFactory()->getConnection();

        $where = [];
        $sql = 'INSERT INTO ' . $this->table;
        $rows = ' (';
        $values = ') VALUES (';
        $sql_count = 0;

        //cargar las variables al string sql
        foreach ($data as $var => $value) {
            if ($sql_count > 0) {
                $rows .= ",";
                $values .= ",";
            }
                
            $rows .= "$var";
            $values .= ":$var";
            $sql_count++;
        }

        //convertir las variables a tag para execute :var
        foreach ($data as $var => $value) {
            $where[":$var"] = $value;
        }

        //construir la primera parte del sql
        $sql .= $rows . $values . ")";

        //cargar ahora el Where para saber si necesitamos crear con restriccion
        //primero verificar si hay algo en el where
        if (count($filter) > 0){
            $sql .= ' WHERE ';
            $sql_count = 0;
    
            foreach ($filter as $var => $value) {
                if ($sql_count > 0) {
                    $sql .= " AND ";
                }
                
                $sql .= "$var = :$var ";
                $sql_count++;
            }
    
            //añadir el filter a los tag
            foreach ($filter as $var => $value) {
                $where[":$var"] = $value;
            }
        }
        
        $query = $database->prepare($sql);
        $query->execute($data);

        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }

    public function update($data, $filter, $many = false){
        $database = DatabaseFactory::getFactory()->getConnection();

        $where = [];
        $sql = 'UPDATE ' . $this->table . ' SET ';
        $sql_count = 0;
        
        //primero cargar los datos que vamos a guardar
        //cargar las variables al string sql
        foreach ($data as $var => $value) {
            if ($sql_count > 0) {
                $sql .= ", ";
            }
            
            $sql .= "$var = :$var ";
            $sql_count++;
        }

        //convertir las variables a tag para execute :var
        foreach ($data as $var => $value) {
            $where[":$var"] = $value;
        }

        //cargar ahora el filtro para saber que vamos a actualizar
        //primero verificar si hay algo en el filtro
        if (count($filter) > 0){
            $sql .= ' WHERE ';
            $sql_count = 0;
    
            foreach ($filter as $var => $value) {
                if ($sql_count > 0) {
                    $sql .= " AND ";
                }
                
                $sql .= "$var = :$var ";
                $sql_count++;
            }
    
            //añadir el filter a los tag
            foreach ($filter as $var => $value) {
                $where[":$var"] = $value;
            }
        }        
        
        //cerrar el update indicando que se va afectar solo a un row en caso que así sea señalado
        if ($many == false){
            $sql .= " LIMIT 1";
        }

        $query = $database->prepare($sql);
        $query->execute($where);

        if ($many == true){
            if ($query->rowCount() > 1) {
                return true;
            }
        }else{
            if ($query->rowCount() == 1) {
                return true;
            }
        }

        return false;
    }

    public function delete($where){
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = 'DELETE FROM '. $this->table .'  WHERE ';
        $sql_count = 0;

        foreach ($where as $var => $value) {
            if ($sql_count > 0) {
                $sql .= " AND ";
            }
               
            $sql .= "$var = :$var ";
            $sql_count++;
        }

        //convertir las variables a tag para execute :var
        foreach ($where as $var => $value) {
            $where[":$var"] = $value;
            unset($where[$var]);
        }

        $query = $database->prepare($sql);
        $query->execute($where);

        if ($query->rowCount() == 1) {
            return true;
        }

        return false;
    }

    public function getRAW($sql, $where){
        $database = DatabaseFactory::getFactory()->getConnection();

        //convertir las variables a tag para execute :var
        foreach ($where as $var => $value) {
            if ($value != 'ASC' && $value != 'DESC'){
                $where[":$var"] = $value;
                unset($where[$var]);
            }else{
                unset($where[$var]);
            }
        }
        
        $query = $database->prepare($sql);
        $query->execute($where);

        return $query->fetchAll();
    }

    public function returnDiff($a1, $a2) { 
        $r = new stdClass(); 

        foreach ($a1 as $k => $s) {
            if (property_exists($a2, $k) == false){
                $r->{$k} = $s;
            }else if (property_exists($a2, $k) == true){
                if ($a1->{$k} != $a2->{$k}){
                    $r->{$k} = $a2->{$k};
                }
            }
        }

        return $r;
    }
}
