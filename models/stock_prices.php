<?php

require_once __DIR__ . '/../db/db.php';

class StockPrices {
    public static function getAllPrices() {
        $pdo = getConnection();
        $stmt = $pdo->query('SELECT * FROM stock_prices');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}