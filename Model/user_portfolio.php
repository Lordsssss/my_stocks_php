<?php

require_once __DIR__ . '/../db/db.php';

class Portfolio {
    public static function getAllPrices() {
        $pdo = getConnection();
        $stmt = $pdo->query('SELECT * FROM user_portfolio');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getPortfolioById($account_number){
        $pdo = getConnection();
        $stmt = $pdo->prepare('SELECT * FROM user_portfolio WHERE account_number = :account_number');
        $stmt->execute(['account_number' => $account_number]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}