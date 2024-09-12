<?php $this->title = 'My Stocks'; ?>
<section id="stocks"
    <h1 class="title">Stock Prices</h1>
    <table class="table">
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php foreach ($stocks as $price): ?>
        <tr>
            <td><?= $price['stock_symbol'] ?></td>
            <td><?= $price['stock_name'] ?></td>
            <td><?= $price['current_price'] ?></td>
            <td><button class="button button-order">Place an Order</button></td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>