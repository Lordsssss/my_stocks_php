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
     * Retrieves a user by their ID
     * 
     * @param int $account_number The user ID
     * @return mixed The user data
     * @throws Exception If no user matches the provided ID
     */
    public function getUserByAccountNumber($account_number) {
        $sql = "SELECT * FROM users WHERE account_number=?";
        $user = $this->executeQuery($sql, [$account_number]);
        return $user->fetch();
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

    /**
     * Updates the username and email of a user
     * 
     * @param int $userId The user ID
     * @param string $newUsername The new username
     * @param string $newEmail The new email
     * @return boolean True if the update was successful, false otherwise
     */
    public function updateUser($account_number, $newUsername, $newEmail) {
        $sql = "UPDATE users SET username = ?, email = ? WHERE account_number = ?";
        $result = $this->executeQuery($sql, [$newUsername, $newEmail, $account_number]);
        return ($result->rowCount() == 1);
    }
}
?>