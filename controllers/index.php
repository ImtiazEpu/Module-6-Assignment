<?php
$name     = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS );
$email    = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
$password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS );

if ( isset( $name ) && isset( $email ) && isset( $password ) && 'POST' === $_SERVER[ 'REQUEST_METHOD' ] ) {

    /**
     * check if all required fields are filled out
     */
    if ( empty( $name ) || empty( $email ) || empty( $password ) ) {
        echo 'Please fill out all required fields';
        exit;
    }

    /**
     * check if email is in valid format
     */
    if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        echo 'Please enter a valid email address';
        exit;
    }

    /**
     * Password length validation
     */
    if (strlen($password) < 8) {
        echo 'Password must be at least 8 characters long';
        exit;
    }

    /**
     * Generate a random salt value
     */
    try {
        $salt = password_hash( random_bytes( 16 ), PASSWORD_BCRYPT );
    } catch ( Exception $e ) {
        throw new Exception( 'Generate a random salt value error  ' . $e->getMessage() . '' );
    }

    /**
     * Combine the password and salt, and hash them using bcrypt
     */
    $hash_password = password_hash($password . $salt, PASSWORD_BCRYPT);

    /**
     * save profile picture with a unique filename
     */
    if ( isset( $_FILES[ 'profile-picture' ] ) && $_FILES[ 'profile-picture' ][ 'error' ] === UPLOAD_ERR_OK ) {
        $fileExtension = pathinfo( $_FILES[ 'profile-picture' ][ 'name' ], PATHINFO_EXTENSION );
        $fileName      = 'uploads/' . time() . '_' . uniqid() . '.' . $fileExtension;
        move_uploaded_file( $_FILES[ 'profile-picture' ][ 'tmp_name' ], $fileName );
    } else {
        $fileName = '';
    }

    /**
     * save user's data to CSV file
     */
    $userData = array( $name, $email, $fileName );
    $fp       = fopen( 'users.csv', 'a' );
    fputcsv( $fp, $userData );
    fclose( $fp );

    /**
     * start a new session and set a cookie with the user's name
     */
    session_start();
    $_SESSION[ 'name' ] = $name;
    setcookie( 'name', $name, time() + 3600 ); // cookie expires in 1 hour

    header( 'Location: /records' );
    exit;
}
require 'views/index.view.php';