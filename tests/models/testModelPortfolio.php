<?php

require_once 'Model/portfolios.php';

$tstPortfolio = new Portfolio;

// Test getAllPortfolios method
echo '<h3>Test getAllPortfolios : </h3>';
$allPortfolios = $tstPortfolio->getAllPortfolios();
if ($allPortfolios->rowCount() > 0) {
    echo 'Retrieved all portfolios successfully.';
    var_dump($allPortfolios->fetchAll());
} else {
    echo 'No portfolios found.';
}

// Test getPortfolio method
echo '<h3>Test getPortfolio : </h3>';
$account_number = 'ACC0001'; // Replace with a valid account number for testing
$portfolio = $tstPortfolio->getPortfolio($account_number);
if ($portfolio->rowCount() > 0) {
    echo 'Retrieved portfolio for account number ' . $account_number . ' successfully.';
    var_dump($portfolio->fetch());
} else {
    echo 'No portfolio found for account number ' . $account_number . '.';
}
?>