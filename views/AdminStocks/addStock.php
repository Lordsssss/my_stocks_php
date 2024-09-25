<?php $this->title = 'My Stocks'; ?>
<section class="addStock">
    <h1 class="title">Add New Stock</h1>
    <div class="form-container">
        <form class="form form-add-stock" action="ControllerAdminStocks/add" method="post">
            <div class="field-container">
                <label for="stock_name">Stock Name</label>
                <input type="text" name="stock_name" id="stock_name" maxlength="20">
            </div>
            <div class="field-container">
                <label for="stock_symbol">Stock Symbole</label>
                <input type="text" name="stock_symbol" id="stock_symbol" maxlength="20">
            </div>
            <div class="field-container">
                <label for="current_price">Current Price</label>
                <input type="text" name="current_price" id="current_price" maxlength="20">
            </div>
            <button class="button button-order" type="submit">Add Stock</button>
        </form>
    </div>
</section>
