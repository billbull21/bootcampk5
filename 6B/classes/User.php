<?php

class User{

    private $_db;
    
    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function getData()
    {
        return $this->_db->showUser();
    }

    public function getDataSkill($id)
    {
        return $this->_db->showSkill($id);
    }

    public function tambah($fields = array())
    {
        if( $this->_db->insert('users', $fields) ) return true;
        else return false;
    }

    public function tambahSkill($fields = array())
    {
        if( $this->_db->insert('skills', $fields) ) return true;
        else return false;
    }

    public function getJson()
    {
        return $this->_db->getJsonData();
    }
}