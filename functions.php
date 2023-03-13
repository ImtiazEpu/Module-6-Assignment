<?php

/**
 * @param $value
 *
 * @return void
 */
function dd ( $value ): void {
    echo '<pre>';
    var_dump( $value );
    echo '</pre>';
    die();
}

/**
 * @param $value
 *
 * @return bool
 */
function urlIs ( $value ): bool {
    return $_SERVER[ 'REQUEST_URI' ] === $value;
}

/**
 * @param  int  $http_status_code
 *
 * @return void
 */
function abort ( int $http_status_code = 404 ): void {
    http_response_code( $http_status_code );
    require "views/{$http_status_code}.view.php";
    die();
}

/**
 * @param $status
 * @param $data
 *
 * @return void
 */
function json($status, $data) {
    $cors = "*";
    header("Access-Control-Allow-Origin: $cors");
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($status);
    echo json_encode($data);
}