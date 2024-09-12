<?php

/**
 * Class modeling the session.
 * Encapsulates the PHP superglobal $_SESSION.
 * 
 * @author Baptiste Pesquet
 */
class Session
{

    /**
     * Constructor.
     * Starts or resumes the session
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Destroys the current session
     */
    public function destroy()
    {
        session_destroy();
    }

    /**
     * Adds an attribute to the session
     * 
     * @param string $name Attribute name
     * @param string $value Attribute value
     */
    public function setAttribute($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Returns true if the attribute exists in the session
     * 
     * @param string $name Attribute name
     * @return bool True if the attribute exists and its value is not empty 
     */
    public function hasAttribute($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    /**
     * Returns the value of the requested attribute
     * 
     * @param string $name Attribute name
     * @return string Attribute value
     * @throws Exception If the attribute does not exist in the session
     */
    public function getAttribute($name)
    {
        if ($this->hasAttribute($name)) {
            return $_SESSION[$name];
        }
        else {
            throw new Exception("Attribute '$name' missing from the session");
        }
    }

}