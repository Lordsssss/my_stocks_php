<?php

require_once __DIR__ . '/../db/db.php';

class Transactions {
    public static function getAllPrices() {
        $pdo = getConnection();
        $stmt = $pdo->query('SELECT * FROM transactions');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}