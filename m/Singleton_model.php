<?php

trait Singleton {
    
    private static $_instance = null;
    
    private function __construct () {}
    private function __sleep() {}
    private function __wakeup() {}
    private function __clone() {}
    
    public static function getInstance() {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}