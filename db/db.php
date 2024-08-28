<?php

function getConnection() {
    $host = 'localhost';
    $db   = 'my_stocks';
    $user = 'root';
    $pass = 'mysql';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}