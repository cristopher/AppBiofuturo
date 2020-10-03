<?php

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index()
    {
        $this->View->render('user/index', array(
            'user_name' => Session::get('user_name'),
            'user_email' => Session::get('user_email'),
            'user_gravatar_image_url' => Session::get('user_gravatar_image_url'),
            'user_avatar_file' => Session::get('user_avatar_file'),
            'user_account_type' => Session::get('user_account_type'),
            'title' => 'Mi cuenta'
        ));
    }

    public function editUsername()
    {
        $this->View->render('user/editUsername',array(
            'user_name' => Session::get('user_name'),
            'title' => 'Cambiar nombre de usuario'
        ));
    }

    public function editUsername_action()
    {
        if (!Csrf::isTokenValid()) {
            LoginModel::logout();
            Redirect::home();
            exit();
        }

        $result = UserModel::editUserName(Request::post('user_name'));

        if($result)
            Redirect::to('user');
        else
            Redirect::to('user/editUsername');
    }

    public function editUserEmail()
    {
        $this->View->render('user/editUserEmail',array(
            'user_email' => Session::get('user_email'),
            'title' => 'Cambiar Email'
        ));
    }

    public function editUserEmail_action()
    {
        $result = UserModel::editUserEmail(Request::post('user_email'));

        if($result)
            Redirect::to('user');
        else
            Redirect::to('user/editUserEmail');
    }

    public function editAvatar()
    {
        $this->View->render('user/editAvatar', array(
            'avatar_file_path' => AvatarModel::getPublicUserAvatarFilePathByUserId(Session::get('user_id')),
            'title' => 'Cambiar Avatar')
        );
    }

    public function uploadAvatar_action()
    {
        AvatarModel::createAvatar();
        Redirect::to('user/editAvatar');
    }

    public function deleteAvatar_action()
    {
        AvatarModel::deleteAvatar(Session::get("user_id"));
        Redirect::to('user/editAvatar');
    }

    public function changePassword()
    {
        $this->View->render('user/changePassword',array(
            'title' => 'Cambiar contraseña'
        ));
    }

    public function changePassword_action()
    {
        $result = PasswordResetModel::changePassword(
            Session::get('user_id'), Request::post('user_password_current'),
            Request::post('user_password_new'), Request::post('user_password_repeat')
        );

        if($result)
            Redirect::to('user');
        else
            Redirect::to('user/changePassword');
    }
}
