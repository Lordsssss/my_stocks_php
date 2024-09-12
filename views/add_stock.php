<!DOCTYPE html>
<html>
<head>
    <title>Add New Stock</title>
</head>
<body>

<h1 class="title">Add New Stock</h1>
<div class="form-container">
<form class="form form-add-stock" action="controller/add_stock_controller.php" method="post">
    <div class="field-container">
        <label for="stock_name">Stock Name</label>
        <input type="text" name="stock_name" id="stock_name" maxlength="20">
    </div>
    <div class="field-container">
        <label for="stock_symbole">Stock Symbole</label>
        <input type="text" name="stock_symbole" id="stock_symbole" maxlength="20">
    </div>
    <div class="field-container">
        <label for="current_price">Current Price</label>
        <input type="text" name="current_price" id="current_price" maxlength="20">
    </div>
    <button class="button button-order" type="submit">Add Stock</button>
</form>
</div>
</body>
</html>
