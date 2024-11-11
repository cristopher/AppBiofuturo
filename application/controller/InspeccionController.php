<?php

class InspeccionController extends Controller
{
    /* Public */
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->render('inspeccion/public/index', array(
            'inspecciones' => InspeccionModel::getAllInspecciones(),
            'tecnicos' => TecnicoModel::getAllTecnicos(),
            'title' => 'Inspecciones'
        ));
    }

    public function create()
    {
        InspeccionModel::createInspeccion(Request::post('inspeccion_fecha'));
        Redirect::to('inspeccion');
    }

    public function edit($inspeccion_id)
    {
        $this->View->render('inspeccion/public/edit', array(
            'inspeccion' => InspeccionModel::getInspeccion($inspeccion_id),
            'title' => 'Modificar inspeccion'
        ));
    }

    public function editSave()
    {
        InspeccionModel::updateInspeccion(Request::post('inspeccion_id'), Request::post('inspeccion_fecha'));
        Redirect::to('inspeccion');
    }

    public function delete($inspeccion_id)
    {
        InspeccionModel::deleteInspeccion($inspeccion_id);
        Redirect::to('inspeccion');
    }
}