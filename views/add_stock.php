<?php

require_once 'models/stocks.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new stock
    $stock_symbole = $_POST['stock_symbole'];
    $stock_name = $_POST['stock_name'];
    $current_price = $_POST['current_price'];

    Stock::addStock($stock_symbole, $stock_name, $current_price);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Stock</title>
    <link rel="stylesheet" href="resources\css\style.css">
</head>
<body>

<h1 class="title">Add New Stock</h1>

<form class="form-add-stock" action="add_stock.php" method="post">
    <label class="test">Stock Symbole: <input type="text" name="stock_symbole"></label><br>
    <label>Stock Name: <input type="text" name="stock_name"></label><br>
    <label>Current Price: <input type="text" name="current_price"></label><br>
    <button class="button button-order" type="submit">Add Stock</button>
</form>

</body>
</html>
