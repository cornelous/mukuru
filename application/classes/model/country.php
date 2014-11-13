<?php defined('SYSPATH') or die('No direct script access.');

class Model_Country {
    protected $_table = 'countries';

    public function get_all()
    {
        return DB::select()
            ->from($this->_table)
            ->execute()
            ->as_array();
    }
}
