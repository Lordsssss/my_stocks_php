<?php

require_once __DIR__ . '/../db/db.php';
require_once 'Framework/Modele.php';

class Stock extends Modele {
    public function getAllStocks() {
        $sql = 'SELECT * FROM stocks';
        $stocks = $this->executeRequest($sql);
        return $stocks;
    }

    public function addStock($stock_symbol, $stock_name, $current_price) {
        $sql = 'INSERT INTO stocks (stock_symbol, stock_name, current_price) VALUES (?, ?, ?)';
        $result = $this->executeRequest($sql,[$stock_symbol, $stock_name, $current_price]);
        return $result;
    }
}