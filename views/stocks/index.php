<?php $this->title = 'My Stocks'; ?>
<section id="stocks">
    <style>
        <?php include 'Content/css/stock.css'; ?>
    </style>
    <link rel="stylesheet" href="./Content/css/stock.css">
    <h1 class="title">Stock Prices</h1>
    <table class="table">
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php foreach ($stocks as $stock): ?>
            <?php if (!$stock['deleted']): ?>
                <tr>
                    <td><?= $stock['stock_symbol'] ?></td>
                    <td><?= $stock['stock_name'] ?></td>
                    <td><?= $stock['current_price'] ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</section>