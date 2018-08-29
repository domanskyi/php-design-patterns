<?php

class Database
{
    public function select() { }
    public function input() { }
}

class DatabaseProxy 
{
    private $_database;

    function __construct(Database $db) {
        $this->_database = $db;
    }

    public function select() {
        //SOME ADDITIONAL ACTIONS
        $this->_database->select();
    }

    public function input() {
        //SOME ADDITIONAL ACTIONS
        $this->_database->input();
    }
}
?>