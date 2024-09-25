<?php

require_once 'Model/stocks.php';
require_once 'Framework/Controller.php';

class ControllerStocks extends Controller {

    private $stock;

    public function __construct() {
        $this->stock = new Stock();
    }

    // Displays the list of stocks
    public function index() {
        $stocks = $this->stock->getAllStocks();
        $this->generateView(['stocks' => $stocks]);
    }
}