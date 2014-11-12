<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Application extends Controller_Template {

    public function before()
    {
        parent::before();
        $this->_user_auth();

        //Global variables
        View::set_global('site_name', 'Mukuru Assignment');

        $this->template->view = '';
        $this->template->styles = array('reset', 'mukuru');
        $this->template->scripts = array();
    }

}
