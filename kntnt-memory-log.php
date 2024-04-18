<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Memory Log
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Logs the peak memory used to debug.log.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */


if ( defined( 'KNTNT_MEMORY_LOG' )  && KNTNT_MEMORY_LOG ) {
     
     register_shutdown_function( function() {
          $uri = $_SERVER['REQUEST_URI'] ?? 'n/a';
          $peak = memory_get_peak_usage() / 1024 / 1024;
          date_default_timezone_set('UTC');
          $current_time = date("[d-M-Y H:i:s T]");
          $message = sprintf("$current_time %6.1f MB %s\n", $peak, $uri);
          error_log( $message );
     } );

}
