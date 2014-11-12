<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Application extends Controller_Template {

    public function before()
    {
        parent::before();
        
        //Global variables
        View::set_global('site_name', 'Mukuru Assignment');

        $this->template->view = '';
        $this->template->styles = array('reset', 'mukuru');
        $this->template->scripts = array();
    }

}
