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
if ( isset( $_POST['category-create-submit'] ) ) {

	//Retrieve the field values from our login form.
	$newCategory = ! empty( $_POST['category-create-category'] ) ? trim( $_POST['category-create-category'] ) : null;

	//Retrieve the user account information for the given username.
	$sql  = "INSERT INTO asset_categories (category_name) VALUES (:newCategory)";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':newCategory', $newCategory );

	//Execute.
	$stmt->execute();


	$_POST = array();
	// TODO: Return the user to the same *tab*, not just the same page. -JMS
	header( "Location: /profile.php" );
	exit; // Location header is set, pointless to send HTML, stop the script
}


?>
