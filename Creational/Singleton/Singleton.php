<?php

class Singleton 
{
    private static $_instance;
    /**
     * If instance does not exist, create it. In other case just return the instance.
     * 
     * @return $_instance
     */
    public static function getInstance() {
        if (static::$_instance === null) {
            static::$_instance = //some instance;
        }

        return static::$_instance;
    }

    /**
     * Does not allow to create another instance of object 
     * To call the instance just use Singleto::getInstance()
     */
    private function __construct() { }

    /**
     * Does not allow to clone instance
     */
    private function __clone() { }

    /**
     * Does not allow to unserialize the instance
     */
    private function __wakeup() { }
}

?>