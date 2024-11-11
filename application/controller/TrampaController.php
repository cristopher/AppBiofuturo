<?php

class TrampaController extends Controller
{
    /* Public */
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->render('trampa/public/index', array(
            'trampas' => TrampaModel::getAllTrampas(),
            'title' => 'Trampas'
        ));
    }

    public function create()
    {
        TrampaModel::createTrampa(Request::post('trampa_codigo'));
        Redirect::to('trampa');
    }

    public function edit($trampa_id)
    {
        $this->View->render('trampa/public/edit', array(
            'trampa' => TrampaModel::getTrampa($trampa_id),
            'title' => 'Modificar trampa'
        ));
    }

    public function editSave()
    {
        TrampaModel::updateTrampa(Request::post('trampa_id'), Request::post('trampa_codigo'));
        Redirect::to('trampa');
    }

    public function delete($trampa_id)
    {
        TrampaModel::deleteTrampa($trampa_id);
        Redirect::to('trampa');
    }
}