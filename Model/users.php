<?php

require_once 'Framework/Model.php';

class User extends Model{
        /**
     * Retrieves all users
     * 
     * @return PDOStatement Query results
     */
    public function getAllUsers() {
        $sql = 'SELECT * FROM users';
        $users = $this->executeQuery($sql);
        return $users;
    }
}