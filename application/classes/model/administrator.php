<?php defined('SYSPATH') or die('No direct script access.');

class Model_Administrator {
    protected $_table = 'administrators';


    public function login($username, $password){
        return DB::select('*')
            ->from($this->_table)
            ->where('username', '=', $username)
            ->where('password', '=', $password)
            ->execute()
            ->as_array();
    }
}
