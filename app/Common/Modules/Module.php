<?php

namespace Starter\Common\Modules;

/**
 * Class Module
 * @package Starter\Common\Modules
 * @author Kamil Łazarz
 */
abstract class Module
{
    /** @var string $version */
    protected string $version = '1.0.0';

    /**
     * Module constructor
     * @return void
     */
    private function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ], 100, 1 );
    }

    /**
     * Add scripts
     * @example wp_enqueue_style( 'style-name', get_stylesheet_uri() );
     * @example wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', [], $this->version, true );
     * @return void
     */
    public function scripts() {

    }
}
