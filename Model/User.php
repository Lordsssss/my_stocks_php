<?php

require_once 'Framework/Model.php';

class User extends Model {
    /**
     * Retrieves all users without passwords
     * 
     * @return PDOStatement Query results
     */
    public function getAllUsers() {
        $sql = 'SELECT user_id, username, email, account_number, created_at FROM users';
        $users = $this->executeQuery($sql);
        return $users;
    }

    /**
     * Checks if a user exists in the database
     * 
     * @param string $login The login
     * @param string $password The password
     * @return boolean True if the user exists, false otherwise
     */
    public function login($login, $password) {
        $sql = "SELECT user_id FROM users WHERE username = ? AND password = ?";
        $user = $this->executeQuery($sql, array($login, $password));
        return ($user->rowCount() == 1);
    }

    /**
     * Returns an existing user from the database
     * 
     * @param string $login The login
     * @param string $password The password
     * @return mixed The user
     * @throws Exception If no user matches the provided credentials
     */
    public function getUser($login, $password) {
        $sql = "SELECT user_id, username, password 
                FROM users WHERE username = ? AND password = ?";
        $user = $this->executeQuery($sql, array($login, $password));
        if ($user->rowCount() == 1)
            return $user->fetch();  // Access the first result row
        else
            throw new Exception("No user matches the provided credentials");
    }
}
?>