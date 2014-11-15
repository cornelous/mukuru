<?php defined('SYSPATH') or die('No direct script access.');

class Model_User {
    protected $_table = 'users';


    public function login($username, $password)
    {
        return DB::select('*')
            ->from($this->_table)
            ->where('username', '=', $username)
            ->where('password', '=', $password)
            ->where('verified', '=', 1)
            ->where('active', '=', 1)
            ->execute()
            ->as_array();
    }

    public function getuserdetail($username)
    {
        return DB::select('*')
            ->from($this->_table)
            ->join('countries', 'INNER')
            ->on('users.country', '=', 'countries.id')
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
         ->join('countries', 'INNER')
         ->on('users.country', '=', 'countries.id')
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
        if (!$passwordrest){
            return FALSE;
        }



    }

    public function verifytoken($token)
    {
        $verifieduser = DB::select('*')
        ->from($this->_table)
        ->where('verified', '=', $token)
        ->execute()
        ->as_array();

        $verified = DB::update($this->_table)->set(array(
            'verified' =>1,
            'active' => 1
        ))
        ->where('verified', '=', $token)
        ->execute();

        return $verifieduser;
    }


    public static function unique_username($username)
    {
        // Check if the username already exists in the database
        return ! DB::select(array(DB::expr('COUNT(username)'), 'total'))
            ->from('users')
            ->where('username', '=', $username)
            ->execute()
            ->get('total');
    }


    /**
    * Updates the active flag of a user to 0
    *
    */
    public function activ($uid, $status)
    {
        return DB::update($this->_table)->set(array(
            'active' =>!$status
        ))
            ->where('id', '=', $uid)
            ->execute();
    }

    public function update($username, $namesurname,$address, $city, $country,$phonenumber,$password)
    {
        return DB::update($this->_table)->set(array(
            'namesurname' =>$namesurname,
            'address' =>$address,
            'city' =>$city,
            'country' =>$country,
            'phonenumber' =>$phonenumber,
            'password' =>$password,

        ))
            ->where('username', '=', $username)
            ->execute();
    }
}