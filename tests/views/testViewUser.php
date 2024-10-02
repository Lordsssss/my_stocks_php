<?php

require_once 'Framework/View.php';

// Mock list of users
$users = [
    [
        'account_number' => '123456',
        'username' => 'user1',
        'email' => 'user1@example.com',
        'created_at' => '2023-01-01'
    ],
    [
        'account_number' => '789012',
        'username' => 'user2',
        'email' => 'user2@example.com',
        'created_at' => '2023-02-01'
    ]
];

// Create a new Vue instance for the 'index' view with the title 'Users'
$vue = new View('index', 'Users');

// Generate the view with the mock users data
$vue->generate(['users' => $users]);

// Create a new Vue instance for the 'index' view with the title 'Users'
$vueAdmin = new View('index', 'AdminUsers');

// Generate the view with the mock users data
$vueAdmin->generate(['users' => $users]);
