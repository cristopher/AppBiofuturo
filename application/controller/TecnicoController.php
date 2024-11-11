<?php

class TecnicoController extends Controller
{
    /* Public */
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->render('tecnico/public/index', array(
            'tecnicos' => TecnicoModel::getAllTecnicos(),
            'title' => 'Tecnicos'
        ));
    }

    public function create()
    {
        TecnicoModel::createTecnico(Request::post('tecnico_nombre'));
        Redirect::to('tecnico');
    }

    public function edit($tecnico_id)
    {
        $this->View->render('tecnico/public/edit', array(
            'tecnico' => TecnicoModel::getTecnico($tecnico_id),
            'title' => 'Modificar tecnico'
        ));
    }

    public function editSave()
    {
        TecnicoModel::updateTecnico(Request::post('tecnico_id'), Request::post('tecnico_nombre'));
        Redirect::to('tecnico');
    }

    public function delete($tecnico_id)
    {
        TecnicoModel::deleteTecnico($tecnico_id);
        Redirect::to('tecnico');
    }
}