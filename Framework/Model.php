<?php

require_once 'Configuration.php';

/**
 * Abstract class Model.
 * Centralizes database access services.
 * Uses PHP's PDO API
 *
 * @version 1.0
 * @author Baptiste Pesquet
 */
abstract class Model {

    /** PDO object for database access 
        Static so shared by all instances of derived classes */
    private static $db;

    /**
     * Executes an SQL query
     * 
     * @param string $sql SQL query
     * @param array $params Query parameters
     * @return PDOStatement Query results
     */
    protected function executeQuery($sql, $params = null) {
        if ($params == null) {
            $result = self::getDb()->query($sql);   // direct execution
        } else {
            $result = self::getDb()->prepare($sql); // prepared query
            $result->execute($params);
        }
        return $result;
    }

    /**
     * Returns a database connection object, initializing the connection if needed
     * 
     * @return PDO PDO connection object
     */
    private static function getDb() {
        if (self::$db === null) {
            // Retrieve database configuration parameters
            $dsn = Configuration::get("dsn");
            $username = Configuration::get("username");
            $password = Configuration::get("password");
            // Create the connection
            self::$db = new PDO($dsn, $username, $password, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }

}