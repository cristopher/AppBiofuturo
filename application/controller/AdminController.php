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

    public function profile($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('admin/showProfile', array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Ver perfil')
            );
        } else {
            Redirect::to('admin');
        }
    }

    public function changeUserRole($user_id)
    {
        if (isset($user_id)) {
            $roles = ['Nivel 1' => 1,'Nivel 2' => 2,'Nivel 3' => 3,'Nivel 4' => 4,'Nivel 5' => 5,'Nivel 6' => 6,'Nivel 7' => 7];

            $this->View->render('admin/changeUserRole', array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'roles' => $roles,
                'title' => 'Cambiar rol')
            );
        } else {
            Redirect::to('admin');
        }
    }

    public function changeUserRole_action()
    {
        UserRoleModel::changeUserRole();

        Redirect::to('admin');
    }

    public function editAvatar($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('admin/editAvatar', array(
                'avatar_file_path' => AvatarModel::getPublicUserAvatarFilePathByUserId($user_id),
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Cambiar Avatar')
            );
        } else {
            Redirect::to('admin');
        }
    }

    public function uploadAvatar_action()
    {
        $user_id = Request::post('user_id');

        if (isset($user_id)) {
            AvatarModel::createAvatarAdmin($user_id);
            Redirect::to('admin/editAvatar/'.$user_id);
        } else {
            Redirect::to('admin');
        }

    }

    public function deleteAvatar_action($user_id)
    {
        if (isset($user_id)) {
            AvatarModel::deleteAvatarAdmin($user_id);
        }

        Redirect::to('admin/editAvatar/'.$user_id);
    }

    public function register_action()
    {
        $registration_successful = RegistrationModel::registerNewUserAdmin();

        Redirect::to('admin');
    }

    public function editUsername($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('admin/editUsername',array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Cambiar nombre de usuario'
            ));
        } else {
            Redirect::to('admin');
        }
    }

    public function editUsername_action()
    {
        if (!Csrf::isTokenValid()) {
            Redirect::to('admin');
            exit();
        }

        $result = UserModel::editUserNameAdmin();

        Redirect::to('admin');

    }

    public function editUserEmail($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('admin/editUserEmail',array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Cambiar Email'
            ));
        } else {
            Redirect::to('admin');
        }

    }

    public function editUserEmail_action()
    {
        $result = UserModel::editUserEmailAdmin();

        Redirect::to('admin');
    }

    public function changePassword($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('admin/changePassword',array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Cambiar contraseña'
            ));
        } else {
            Redirect::to('admin');
        }
    }

    public function changePassword_action()
    {
        $result = PasswordResetModel::changePasswordAdmin(
            Request::post('user_id'), Request::post('user_password_new'), Request::post('user_password_repeat')
        );

        Redirect::to('admin');
    }

    public function activate($user_id){
        if (isset($user_id)) {
            if (is_numeric($user_id)){
                RegistrationModel::verifyUserAdmin($user_id);
            }
        }

        Redirect::to('admin');
    }

    public function softDelete($user_id, $deletionStatus){
        if (isset($user_id) && isset($deletionStatus)) {
            if (is_numeric($user_id) && is_numeric($deletionStatus)){
                AdminModel::deletionStatus($user_id, $deletionStatus);
            }
        }

        Redirect::to('admin');
    }

    public function suspension($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('admin/suspendUser', array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Suspender usuario'
            ));
        } else {
            Redirect::to('admin');
        }
    }

    public function suspension_action(){
        AdminModel::setAccountSuspensionStatus(
            Request::post('suspension'), Request::post('user_id')
        );

        Redirect::to("admin");
    }

    public function delete($user_id){
        if (isset($user_id)) {
            $this->View->render('admin/deleteUser',array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Eliminar usuario'
            ));
        } else {
            Redirect::to('admin');
        }
    }

    public function delete_action(){

        $user_id = Request::post('user_id');

        if (isset($user_id) && Csrf::isTokenValid()) {
            if (is_numeric($user_id)){
                AdminModel::deleteUser($user_id);
            }
        }

        Redirect::to('admin');
    }
}
