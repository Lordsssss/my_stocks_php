<?php

require_once 'Model/stocks.php';
require_once 'Controller/ControllerAdmin.php';

class ControllerAdminStocks extends ControllerAdmin {

    private $stock;

    public function __construct() {
        $this->stock = new Stock();
    }

    // Displays the list of stocks
    public function index() {
        $stocks = $this->stock->getAllStocks();
        $this->generateView(['stocks' => $stocks]);
    }

    public function add() {
        $stock['stock_symbol'] = $this->request->getParameter('stock_symbol');
        $stock['stock_name'] = $this->request->getParameter('stock_name');
        $stock['current_price'] = $this->request->getParameter('current_price');
        $this->stock->addStock($stock);
        $this->executeAction('index');
    }
    public function confirmation() {
        $stock_id = $this->request->getParameterId('id');
        $stock = $this->stock->getStockById($stock_id);
        $this->generateView(["stock"=> $stock]);
    }
    public function delete() {
        $stock_id = $this->request->getParameter('id');
        $this->stock->deleteStock($stock_id);
        $this->executeAction('index');
    }
    public function restore() {
        $stock_id = $this->request->getParameter('id');
        $this->stock->restoreStock($stock_id);
        $this->executeAction('index');
    }

    public function addStock() {
        $this->generateView();
    }
}