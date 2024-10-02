<?php

require_once 'Model/User.php';

$tstUser = new User;

// Test getAllUsers method
echo '<h3>Test getAllUsers : </h3>';
$allUsers = $tstUser->getAllUsers();
if ($allUsers->rowCount() > 0) {
    echo 'Retrieved all users successfully.';
    var_dump($allUsers->fetchAll());
} else {
    echo 'No users found.';
}

// Test getUserByAccountNumber method
echo '<h3>Test getUserByAccountNumber : </h3>';
$account_number = "ACC0001";
$user = $tstUser->getUserByAccountNumber($account_number);
if ($user) {
    echo 'Retrieved user with account number ' . $account_number . ' successfully.';
    var_dump($user);
} else {
    echo 'No user found with account number ' . $account_number . '.';
}

// Test login method
echo '<h3>Test login : </h3>';
$login = 'admin';
$password = 'admin';
$isLoggedIn = $tstUser->login($login, $password);
if ($isLoggedIn) {
    echo 'Login successful for user ' . $login . '.';
} else {
    echo 'Login failed for user ' . $login . '.';
}

// Test getUser method
echo '<h3>Test getUser : </h3>';
try {
    $user = $tstUser->getUser($login, $password);
    echo 'Retrieved user with login ' . $login . ' successfully.';
    var_dump($user);
} catch (Exception $e) {
    echo 'Failed to retrieve user with login ' . $login . ': ' . $e->getMessage();
}

?>