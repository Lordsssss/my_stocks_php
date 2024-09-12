<?php

require_once __DIR__ . '/../db/db.php';
require_once 'Framework/Model.php';

class StockPrices extends Model {
    /**
     * Retrieves all stock prices
     * 
     * @return PDOStatement Query results
     */
    public function getAllPrices() {
        $sql = 'SELECT * FROM stock_prices';
        $stock = $this->executeQuery($sql);
        return $stock;
    }
}