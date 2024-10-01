<?php $this->title = 'My Admin Stocks'; ?>
<section id="adminstocks">
    <style>
        <?php include 'Content/css/stock.css'; ?>
    </style>
    <link rel="stylesheet" href="./Content/css/stock.css">
    <h1 class="title">Stock Prices</h1>

    <a href="ControllerAdminStocks/addStock">
        <h2 class="title">Add Stock</h2>
    </a>
    <table class="table">
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($stocks as $stock): ?>
            <tr class="<?= $stock['deleted'] ? 'deleted-stock' : '' ?>">
                <td><?= $stock['stock_symbol'] ?></td>
                <td><?= $stock['stock_name'] ?></td>
                <td><?= $stock['current_price'] ?></td>
                <td><?= $stock['deleted'] ? 'Deleted' : 'Active' ?></td>
                <td>
                    <?php if ($stock['deleted']): ?>
                        <button class="button button-restore">
                            <a href="ControllerAdminStocks/restore/<?= $this->clean($stock['stock_id']) ?>">Restore</a>
                        </button>
                    <?php else: ?>
                        <button class="button button-order">Place an order</button>
                        <button class="button button-delete">
                            <a href="ControllerAdminStocks/confirmation/<?= $this->clean($stock['stock_id']) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>
                            </a>
                        </button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section></svg></a>