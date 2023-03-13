<?php
// Get the email address of the user to delete from the POST data
$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
$filename = filter_input( INPUT_POST, 'filename', FILTER_SANITIZE_SPECIAL_CHARS );
if (isset($email) && isset($filename)) {

    /**
     * Delete the file from the uploads folder
     */
    if (file_exists($filename)) {
        unlink($filename);
    }

    /**
     * Read the contents of the CSV file into an array
     */
    $csvData = file( 'users.csv', FILE_IGNORE_NEW_LINES );

    /**
     * Find the row(s) to delete
     */
    $toDelete = [];
    foreach ( $csvData as $index => $row ) {
        $rowData = str_getcsv( $row );
        if ( $rowData[ 1 ] == $email ) { // Condition to delete rows that match a certain criteria
            $toDelete[] = $index;
        }
    }

    /**
     * Remove the row(s) to delete from the array
     */
    foreach ( $toDelete as $index ) {
        unset( $csvData[ $index ] );
    }

    /**
     * Write the modified array back to the CSV file
     */
    $file = fopen( 'users.csv', 'w' );
    foreach ( $csvData as $row ) {
        fputcsv( $file, str_getcsv( $row ) );
    }
    fclose( $file );

    /**
     * Send response
     */
    json(200, [
        "status" => 200,
        "message" => "Record successfully deleted",
    ]);
}