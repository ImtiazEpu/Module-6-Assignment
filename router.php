<?php
$routes = require ('routes.php');


/**
 * @param $uri
 * @param $routes
 *
 * @return void
 */
function routeToController ( $uri, $routes ): void {
    if ( array_key_exists( $uri, $routes ) ) {
        require $routes[ $uri ];
    } else {
        abort();
    }
}
$uri = parse_url( $_SERVER[ 'REQUEST_URI' ] )[ 'path' ];
routeToController( $uri, $routes );