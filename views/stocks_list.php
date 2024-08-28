<?php
$stockPrices = $GLOBALS['stockPrices'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Prices</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <h1 class="title">Stock Prices</h1>
    <table class="table">
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php foreach ($stockPrices as $price): ?>
        <tr>
            <td><?= $price['stock_symbol'] ?></td>
            <td><?= $price['stock_name'] ?></td>
            <td><?= $price['current_price'] ?></td>
            <td><button class="button button-order">Placer un ordre</button></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>