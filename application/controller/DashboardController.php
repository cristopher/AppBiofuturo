<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->render('dashboard/index',array(
            'saludo' => ModuleModel::saludo(),
            'title' => 'Tablero'
        ));
    }
}
