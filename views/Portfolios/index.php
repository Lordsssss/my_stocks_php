<?php $this->title = 'portfolio'; ?>
<section id="stocks"
    <style>
        <?php include 'Content/css/portfolio.css'; ?>
    </style>
    <link rel="stylesheet" href="./Content/css/portfolio.css">
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
</section>