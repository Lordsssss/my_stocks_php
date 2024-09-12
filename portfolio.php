<?php
require 'models/user_portfolio.php';

$account_number = isset($_GET['account_number']) ? $_GET['account_number'] : null;
$portfolio = Portfolio::getPortfolioById($account_number);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Portfolio</title>
</head>
<body>
    <h1 class="title">Stock Prices</h1>
    <table class="table">
        <tr>
            <th>quantity</th>
            <th>Symbole</th>
            <th>Average Price</th>
        </tr>
        <?php foreach ($portfolio as $stock): ?>
        <tr>
            <td><?= $stock['quantity'] ?></td>
            <td><?= $stock['stock_symbol'] ?></td>
            <td><?= $stock['average_price'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>