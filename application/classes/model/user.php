<?php defined('SYSPATH') or die('No direct script access.');

class Model_User {
    protected $_table = 'users';


    public function login($username, $password)
    {
        return DB::select('*')
            ->from($this->_table)
            ->where('username', '=', $username)
            ->where('password', '=', $password)
            ->execute()
            ->as_array();
    }

    public function getuserdetail($username)
    {
        return DB::select('*')
            ->from($this->_table)
            ->where('username', '=', $username)
            ->execute()
            ->as_array();
    }

    public function add($username, $password, $namesurname, $address,$city,$country, $email, $phonenumber,$image, $verified)
    {
        $data = array('id', 'username', 'password', 'namesurname','address', 'city', 'country', 'email', 'phonenumber', 'image', 'verified', 'active');
        return DB::insert($this->_table, $data)
            ->values(array('', $username, $password, $namesurname,$address, $city, $country, $email,$phonenumber, $image, $verified, 0 ))
            ->execute();
    }

    public function get_all($limit = 10, $offset = 0)
    {
        return DB::select()
        ->from($this->_table)
        ->limit($limit)
        ->offset($offset)
        ->execute()
        ->as_array();
    }

    public function count_all()
    {
        return DB::select(DB::expr('COUNT(*) AS user_count'))
            ->from($this->_table)
            ->execute()
            ->get('user_count');
    }

    public function resetpassword($email)
    {
        $newpassword = substr(md5(rand()),0,10);
        $passwordrest = DB::update($this->_table)->set(array(
            'password' =>$newpassword
        ))
            ->where('email', '=', $email)
            ->execute();

        if ($passwordrest){
            return $newpassword;
        }

    }

    /**
    * Updates the active flag of a user to 0
    *
    */
    public function delete($user_id, $message)
    {
        return DB::delete($this->_table)
        ->where('user_id', '=', $user_id)
        ->where('message', '=', $message)
        ->execute();
    }

    //sign in, logout, resetpassword,
}