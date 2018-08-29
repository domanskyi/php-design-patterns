<?php

class DataValidator
{
    public function validateLogin() { }
    public function validatePassword() { }
}
class DatabaseManager
{
    public function input() { }
    public function select() { }
}
class Registration // << FACADE
{
    function __construct(DataValidator $validator, DatabaseManager $db_manager) {

    } 

    public function registration($login, $password) {
        $this->db_manager->select();
        $this->validator->validateLogin($login);
        $this->validator->validatePassword($password);
        $this->db_manager->input();
    }
}
?>