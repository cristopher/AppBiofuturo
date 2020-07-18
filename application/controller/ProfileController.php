<?php

class ProfileController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->View->render('profile/index', array(
            'users' => UserModel::getPublicProfilesOfAllUsers(),
            'title' => 'Perfiles')
        );
    }

    public function showProfile($user_id)
    {
        if (isset($user_id)) {
            $this->View->render('profile/showProfile', array(
                'user' => UserModel::getPublicProfileOfUser($user_id),
                'title' => 'Ver perfil')
            );
        } else {
            Redirect::home();
        }
    }
}
