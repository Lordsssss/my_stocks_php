<?php

require_once 'Framework/Model.php';

class Stock extends Model {
    /**
     * Retrieves all stocks
     * 
     * @return PDOStatement Query results
     */
    public function getAllStocks() {
        $sql = 'SELECT * FROM stocks';
        $stocks = $this->executeQuery($sql);
        return $stocks;
    }

    /**
     * Adds a new stock
     * 
     * @param array $stock Stock data
     * @return PDOStatement Query result
     */
    public function addStock($stock) {
        $sql = 'INSERT INTO stocks (stock_symbol, stock_name, current_price) VALUES (?, ?, ?)';
        $result = $this->executeQuery($sql, [$stock["stock_symbol"], $stock["stock_name"], $stock["current_price"]]);
        return $result;
    }
}