<?php
require 'models/user_portfolio.php';

$account_number = isset($_GET['account_number']) ? $_GET['account_number'] : null;
$portfolio = Portfolio::getPortfolioById($account_number);
print $portfolio
?>
<!DOCTYPE html>
<html>
<head>
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
    <h1 class="title">Stock Prices</h1>
    <table class="table">
        <tr>
            <th>quantity</th>
            <th>Name</th>
            <th>Average Price</th>
        </tr>
        <?php echo $portfolio ?>
        <?php foreach ($portfolio as $stock): ?>
        <tr>
            <td><?= $stock['quantity'] ?></td>
            <td><?= $stock['stock_id'] ?></td>
            <td><?= $stock['average_price'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>