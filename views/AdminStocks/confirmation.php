<?php $title = "Delete - " . $stock['stock_name']; ?>
<section id="confirmation">
    <style>
        <?php include 'Content/css/stock.css'; ?>
    </style>
    <link rel="stylesheet" href="./Content/css/stock.css">
    <article>
        <header>

            <p>
            <h1>
                Delete?
            </h1>
            <?= $stock['stock_symbol'] ?> <br />
            <strong><?= $stock['stock_name'] ?></strong>
            </p>
        </header>
    </article>

    <form action="ControllerAdminStocks/delete/<?= $stock['stock_id'] ?>" method="post">
        <input type="submit" value="Yes" />
    </form>
    <form action="ControllerAdminStocks/index" method="post">
        <input type="submit" value="Cancel" />
    </form>
</section>