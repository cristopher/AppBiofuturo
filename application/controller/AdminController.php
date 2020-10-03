<?php

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAdminAuthentication();
    }

    public function index()
    {
        $this->View->render('admin/index', array(
            'users' => UserModel::getPublicProfilesOfAllUsers(),
            'title' => 'Administracion')
        );
    }

    public function register_action()
    {
        $registration_successful = RegistrationModel::registerNewUserAdmin();

        Redirect::to('admin');
    }

    public function actionAccountSettings()
    {
        AdminModel::setAccountSuspensionAndDeletionStatus(
            Request::post('suspension'), Request::post('softDelete'), Request::post('user_id')
        );

        Redirect::to("admin");
    }
}
