<?php

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if (LoginModel::isUserLoggedIn()) {
            Redirect::home();
        } else {
            $data = array('redirect' => Request::get('redirect') ? Request::get('redirect') : null);
            $data['title'] = 'Ingresar';
            $this->View->render('login/index', $data);
        }
    }

    public function login()
    {

        if (!Csrf::isTokenValid()) {
            LoginModel::logout();
            Redirect::home();
            exit();
        }

        $login_successful = LoginModel::login(
            Request::post('user_email'), Request::post('user_password'), Request::post('set_remember_me_cookie')
        );

        if ($login_successful) {
            if (Request::post('redirect')) {
                Redirect::toPreviousViewedPageAfterLogin(ltrim(urldecode(Request::post('redirect')), '/'));
            } else {
                Redirect::to('dashboard');
            }
        } else {
            if (Request::post('redirect')) {
                Redirect::to('login?redirect=' . ltrim(urlencode(Request::post('redirect')), '/'));
            } else {
                Redirect::to('login');
            }
        }
    }

    public function logout()
    {
        LoginModel::logout();
        Redirect::home();
        exit();
    }

    public function loginWithCookie()
    {

        $login_successful = LoginModel::loginWithCookie(Request::cookie('remember_me'));

        if ($login_successful) {
            Redirect::to('dashboard');
        } else {
            LoginModel::deleteCookie();
            Redirect::to('login');
        }
    }

    public function requestPasswordReset()
    {
        $this->View->render('login/requestPasswordReset',array(
            'title' => 'Recuperar contraseña'
        ));
    }

    public function requestPasswordReset_action()
    {
        $recover = PasswordResetModel::requestPasswordReset(Request::post('user_email'), Request::post('captcha'));

        if ($recover) {
            Redirect::to('login');
        } else {
            Redirect::to('login/requestPasswordReset');
        }
    }

    public function verifyPasswordReset($user_id, $verification_code)
    {
        if (PasswordResetModel::verifyPasswordReset($user_id, $verification_code)) {
            $this->View->render('login/resetPassword', array(
                'user_id' => $user_id,
                'user_password_reset_hash' => $verification_code,
                'title' => 'Restablecer contraseña'
            ));
        } else {
            Redirect::to('login');
        }
    }

    public function setNewPassword()
    {
        PasswordResetModel::setNewPassword(
            Request::post('user_id'), Request::post('user_password_reset_hash'),
            Request::post('user_password_new'), Request::post('user_password_repeat')
        );
        Redirect::to('login');
    }
}
