<?php

namespace Starter;


use Exception;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class App
{
    /** @var App|null instance */
    private static ?App $instance = null;

    /**
     * App constructor
     */
    private function __construct() {
        $this->addModules();
    }

    /**
     * @return App
     */
    public static function getInstance(): App {

        if( self::$instance === null ) {
            self::setInstance( new App );
        }

        return self::$instance;
    }

    /**
     * @param App $instance
     */
    public static function setInstance( App $instance ): void {
        self::$instance = $instance;
    }

    /**
     * Cannot clone App
     * @return void
     */
    private function __clone() {
    }

    /**
     * Cannot wake up App
     * @throws Exception
     */
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }

    /**
     * Add modules
     * @return void
     */
    public function addModules() {

    }
}
