<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/23/16
 * Time: 13:37
 */


// Use the connect script that I already have built.
require 'connect.php';

// Make my statement for the database.

//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if ( isset( $_POST['manufacturer-create-submit'] ) ) {

	//Retrieve the field values from our login form.
	$newManName     = ! empty( $_POST['manufacturer-name'] ) ? trim( $_POST['manufacturer-name'] ) : null;
	$newManAddress1 = ! empty( $_POST['manufacturer-address1'] ) ? trim( $_POST['manufacturer-address1'] ) : null;
	$newManAddress2 = ! empty( $_POST['manufacturer-address2'] ) ? trim( $_POST['manufacturer-address2'] ) : null;
	$newManCity     = ! empty( $_POST['manufacturer-city'] ) ? trim( $_POST['manufacturer-city'] ) : null;
	$newManState    = ! empty( $_POST['manufacturer-city'] ) ? trim( $_POST['manufacturer-city'] ) : null;
	$newManCountry  = ! empty( $_POST['manufacturer-country'] ) ? trim( $_POST['manufacturer-country'] ) : null;

	//Retrieve the user account information for the given username.
	$sql  = "INSERT INTO manufacturers (name, address_line_1, address_line_2, city, state, country) VALUES (:newManName, :newManAddress1, :newManAddress2, :newManCity, :newManState, :newManCountry)";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':newManName',     $newManName );
	$stmt->bindValue( ':newManAddress1', $newManAddress1 );
	$stmt->bindValue( ':newManAddress2', $newManAddress2 );
	$stmt->bindValue( ':newManCity',     $newManCity );
	$stmt->bindValue( ':newManState',    $newManState );
	$stmt->bindValue( ':newManCountry',  $newManCountry );

	//Execute.
	$stmt->execute();


	$_POST = array();
	// TODO: Return the user to the same *tab*, not just the same page. -JMS
	header( "Location: /profile.php" );
	exit; // Location header is set, pointless to send HTML, stop the script
}


?>
