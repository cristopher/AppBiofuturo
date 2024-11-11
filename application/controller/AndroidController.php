<?php

class AndroidController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAdminAuthentication();
    }

    public function login()
    {
        $response = new stdClass();
        $response->resultado = false;

        $response->resultado = TecnicosModel::getTecnicoLogin(Request::post('nombre'), Request::post('pass'));

        $this->View->renderJSON($response);
    }
}