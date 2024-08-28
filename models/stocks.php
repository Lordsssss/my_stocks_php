<?php

require_once __DIR__ . '/../db/db.php';

class Stock {
    public static function getAllPrices() {
        $pdo = getConnection();
        $stmt = $pdo->query('SELECT * FROM stocks');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function addStock($stock_symbol, $stock_name, $current_price) {
        $pdo = getConnection();
        $sql = 'INSERT INTO stocks (stock_symbol, stock_name, current_price) VALUES (?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$stock_symbol, $stock_name, $current_price]);
    }
}