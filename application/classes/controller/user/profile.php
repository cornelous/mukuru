<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Profile extends Controller_Application {

    public $assert_auth_actions = array(
        'private' => array('login')
    );

    public function action_index()
    {
        $session = Session::instance();
        $username = $session->get('username');

        $user = new Model_User;
        $userdetails = $user->getuserdetail($username);

        $view = View::factory('profile/public')
            ->set('userdetails', $userdetails);

        $this->template->view = $view;
    }


}