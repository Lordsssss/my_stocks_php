<?php

require_once 'Framework/View.php';

// Mock list of stocks
$stocks = [
    [
        'stock_id' => '1',
        'stock_symbol' => 'AAPL',
        'stock_name' => 'Apple Inc.',
        'current_price' => '150.00',
        'deleted' => false
    ],
    [
        'stock_id' => '2',
        'stock_symbol' => 'GOOGL',
        'stock_name' => 'Alphabet Inc.',
        'current_price' => '2800.00',
        'deleted' => true
    ]
];

// Create a new Vue instance for the 'index' view with the title 'Stocks'
$vue = new View('index', 'Stocks');

// Generate the view with the mock stocks data
$vue->generate(['stocks' => $stocks]);

// Create a new Vue instance for the 'index' view with the title 'Stocks'
$vueAdmin = new View('index', 'AdminStocks');

// Generate the view with the mock stocks data
$vueAdmin->generate(['stocks' => $stocks]);