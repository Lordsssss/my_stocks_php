<?php

require_once __DIR__ . '/../Modele/stocks.php';
require_once 'Framework/Controleur.php';

class StockController extends Controleur {

    private $stock;

    public function __construct() {
        $this->stock = new Stock();
    }

    // Affiche la liste de les stocks
    public function index() {
        $stocks = $this->stock->getAllStocks();
        $this->genererVue(['stocks' => $stocks]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new stock
    $stock_symbole = $_POST['stock_symbole'];
    $stock_name = $_POST['stock_name'];
    $current_price = $_POST['current_price'];

    Stock::addStock($stock_symbole, $stock_name, $current_price);
    header("Location: ../index.php");
}
