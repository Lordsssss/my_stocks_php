<?php

/**
 * Class for managing configuration parameters
 * 
 * Inspired by SimpleFramework by Frédéric Guillot
 * (https://github.com/fguillot/simpleFramework)
 *
 * @version 1.0
 * @autor Baptiste Pesquet
 */
class Configuration {

    /** Array of configuration parameters */
    private static $parameters;

    /**
     * Returns the value of a configuration parameter
     * 
     * @param string $name Name of the parameter
     * @param string $defaultValue Default value to return
     * @return string Value of the parameter
     */
    public static function get($name, $defaultValue = null) {
        if (isset(self::getParameters()[$name])) {
            $value = self::getParameters()[$name];
        } else {
            $value = $defaultValue;
        }
        return $value;
    }

    /**
     * Returns the array of parameters, loading it if necessary from a configuration file.
     * The configuration files searched are Config/dev.ini and Config/prod.ini (in that order)
     * 
     * @return array Array of parameters
     * @throws Exception If no configuration file is found
     */
    private static function getParameters() {
        if (self::$parameters == null) {
            $filePath = "Config/dev.ini";
            if (!file_exists($filePath)) {
                $filePath = "Config/prod.ini";
            }
            if (!file_exists($filePath)) {
                throw new Exception("No configuration file found");
            } else {
                self::$parameters = parse_ini_file($filePath);
            }
        }
        return self::$parameters;
    }
}
