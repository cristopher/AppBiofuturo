<?php

class AndroidController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $response = new stdClass();
        $response->resultado = false;

        $response->resultado = TecnicoModel::getTecnicoLogin(Request::post('nombre'), Request::post('pass'));

        header('Access-Control-Allow-Origin: *');

        $this->View->renderJSON($response);
    }
}