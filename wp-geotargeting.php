<?php

namespace Geotargeting;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/*
Plugin Name: WP Geotargeting
Plugin URI: https://webwolf.dev/
Description: Adjust content depending on the localization of the user.
Author: Kamil Łazarz
Author URI: https://webwolf.dev/
Version: 1.0.0
Requires PHP: 7.4
Text Domain: wp-geotargeting
Domain Path: /languages
*/

require_once "config/general.php";
require_once "app/bootstrap.php";

App::getInstance();
