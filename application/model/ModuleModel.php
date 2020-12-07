<?php

class ModuleModel
{
    public static function getModuleMenu()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT module_id, module_name, module_icon, module_menu, module_url FROM modules WHERE user_account_type <= :user_account_type";
        $query = $database->prepare($sql);
        $query->execute(array(':user_account_type' => Session::get('user_account_type')));

        return $query->fetchAll();
    }

    public static function getModuleAdmin()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT admin_id, admin_name, admin_icon, admin_menu, admin_url FROM administrator";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getMenu($menu_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT module_id, module_name, module_menu, module_url FROM modules WHERE user_account_type = :user_account_type AND module_id = :module_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':user_account_type' => Session::get('user_account_type'), ':module_id' => $module_id));

        return $query->fetch();
    }

    public static function saludo()
    {
        $today = getdate();

        $hora=$today["hours"];

        if($hora > 6 && $hora < 12){ 
            return "Buenos días, "; 
        }else if($hora >= 12 && $hora <=19){ 
            return "Buenas Tardes, "; 
        }else{
            return "Buenas Noches, ";
        } 
    }
}
