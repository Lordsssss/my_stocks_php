<?php

require_once 'Framework/Model.php';

class Stock extends Model
{
    /**
     * Retrieves all stocks
     * 
     * @return PDOStatement Query results
     */
    public function getAllStocks()
    {
        $sql = 'SELECT * FROM stocks';
        $stocks = $this->executeQuery($sql);
        return $stocks;
    }
    /**
     * Retrieves a stock by its ID
     * 
     * @param int $stock_id Stock ID
     * @return PDOStatement Query result
     */
    public function getStockById($stock_id)
    {
        $sql = 'SELECT * FROM stocks WHERE stock_id = ?';
        $stock = $this->executeQuery($sql, [$stock_id]);
        return $stock->fetch();
    }
    /**
     * Adds a new stock
     * 
     * @param array $stock Stock data
     * @return PDOStatement Query result
     */
    public function addStock($stock)
    {
        $sql = 'INSERT INTO stocks (stock_symbol, stock_name, current_price) VALUES (?, ?, ?)';
        $result = $this->executeQuery($sql, [$stock["stock_symbol"], $stock["stock_name"], $stock["current_price"]]);
        return $result;
    }

    /**
     * Sets the deleted variable to true for a given stock_id
     * 
     * @param int $stock_id Stock ID
     * @return PDOStatement Query result
     */
    public function deleteStock($stock_id)
    {
        $sql = 'UPDATE stocks SET deleted = true WHERE stock_id = ?';
        $result = $this->executeQuery($sql, [$stock_id]);
        return $result;
    }

    /**
     * Sets the deleted variable to false for a given stock_id
     * 
     * @param int $stock_id Stock ID
     * @return PDOStatement Query result
     */
    public function restoreStock($stock_id)
    {
        $sql = 'UPDATE stocks SET deleted = false WHERE stock_id = ?';
        $result = $this->executeQuery($sql, [$stock_id]);
        return $result;
    }
}