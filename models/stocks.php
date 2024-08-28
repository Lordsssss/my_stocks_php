<?php

require_once __DIR__ . '/../db/db.php';

class Stock {
    public static function getAllPrices() {
        $pdo = getConnection();
        $stmt = $pdo->query('SELECT * FROM stocks');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}