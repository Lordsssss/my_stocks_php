<?php

require_once __DIR__ . '/../db/db.php';
require_once 'Framework/Modele.php';

class StockPrices extends Modele {
    public function getAllPrices() {
        $sql = 'SELECT * FROM stock_prices';
        $stock = $this->executerRequete($sql);
        return $stock;
    }
}