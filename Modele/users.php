<?php

require_once __DIR__ . '/../db/db.php';

class UserList {
    public static function getAllUserList() {
        $pdo = getConnection();
        $stmt = $pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}