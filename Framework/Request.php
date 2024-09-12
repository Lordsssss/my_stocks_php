<?php
require_once 'Configuration.php';
require_once 'Session.php';

/**
 * Class modeling an incoming HTTP request.
 * 
 * @author Baptiste Pesquet
 */
class Request {

    /** Array of request parameters */
    private $parameters;

    /** Session object associated with the request */
    private $session;

    /**
     * Constructor
     * 
     * @param array $parameters Request parameters
     */
    public function __construct($parameters) {
        $this->parameters = $parameters;
        $this->session = new Session();
        $this->getSession()->setAttribute('env', Configuration::get("env"));
    }

    /**
     * Returns the session object associated with the request
     * 
     * @return Session Session object
     */
    public function getSession() {
        return $this->session;
    }

    /**
     * Returns true if the parameter exists in the request
     * 
     * @param string $name Parameter name
     * @return bool True if the parameter exists and its value is not empty 
     */
    public function hasParameter($name) {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }

    /**
     * Returns the value of the requested parameter
     * 
     * @param string $name Parameter name
     * @return string Parameter value
     * @throws Exception If the parameter does not exist in the request
     */
    public function getParameter($name) {
        if ($this->hasParameter($name)) {
            return $this->parameters[$name];
        } else {
            throw new Exception("Parameter '$name' missing from the request");
        }
    }

    /**
     * Returns the value of the parameter of type ID
     * 
     * @param string $name Parameter name
     * @return int Parameter value
     * @throws Exception If the parameter does not exist in the request
     */
    public function getParameterId($name) {
        $id = intval($this->getParameter($name));
        if ($id != 0) {
            return $id;
        } else {
            throw new Exception("Parameter '$name' is not valid");
        }
    }

    /**
     * Sets the value of a parameter
     * 
     * @param string $name Parameter name
     * @param mixed $value Parameter value
     */
    public function setParameter($name, $value) {
        $this->parameters[$name] = $value;
    }

}