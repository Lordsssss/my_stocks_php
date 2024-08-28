<?php

require_once 'models/stocks.php';
require_once 'models/users.php';


// Fetch all stock prices
$stockPrices = Stock::getAllPrices();
$userlist = UserList::getAllUserList();

// Pass stock prices to the view
require 'views/stocks_list.php';
require 'views/user_list.php';