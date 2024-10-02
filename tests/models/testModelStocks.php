<?php

require_once 'Model/stocks.php';

$tstStock = new Stock;

// Test getAllStocks method
echo '<h3>Test getAllStocks : </h3>';
$allStocks = $tstStock->getAllStocks();
if ($allStocks->rowCount() > 0) {
    echo 'Retrieved all stocks successfully.';
    var_dump($allStocks->fetchAll());
} else {
    echo 'No stocks found.';
}

// Test getStockById method
echo '<h3>Test getStockById : </h3>';
$stock_id = 1; // Replace with a valid stock ID for testing
$stock = $tstStock->getStockById($stock_id);
if ($stock) {
    echo 'Retrieved stock with ID ' . $stock_id . ' successfully.';
    var_dump($stock);
} else {
    echo 'No stock found with ID ' . $stock_id . '.';
}

// Test addStock method
echo '<h3>Test addStock : </h3>';
$newStock = [
    'stock_symbol' => 'AAPL',
    'stock_name' => 'Apple Inc.',
    'current_price' => 150.00
];
$addResult = $tstStock->addStock($newStock);
if ($addResult->rowCount() > 0) {
    echo 'Added new stock successfully.';
} else {
    echo 'Failed to add new stock.';
}

// Test deleteStock method
echo '<h3>Test deleteStock : </h3>';
$deleteResult = $tstStock->deleteStock($stock_id);
if ($deleteResult->rowCount() > 0) {
    echo 'Stock with ID ' . $stock_id . ' marked as deleted successfully.';
} else {
    echo 'Failed to mark stock with ID ' . $stock_id . ' as deleted.';
}

// Test restoreStock method
echo '<h3>Test restoreStock : </h3>';
$restoreResult = $tstStock->restoreStock($stock_id);
if ($restoreResult->rowCount() > 0) {
    echo 'Stock with ID ' . $stock_id . ' restored successfully.';
} else {
    echo 'Failed to restore stock with ID ' . $stock_id . '.';
}
?>