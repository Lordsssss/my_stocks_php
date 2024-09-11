<?php

require_once __DIR__ . '/../models/stocks.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new stock
    $stock_symbole = $_POST['stock_symbole'];
    $stock_name = $_POST['stock_name'];
    $current_price = $_POST['current_price'];

    Stock::addStock($stock_symbole, $stock_name, $current_price);
    header("Location: ../index.php");
}
