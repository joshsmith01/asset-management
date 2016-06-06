<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/23/16
 * Time: 13:37
 */


// Use the connect script that I already have built.
require 'connect.php';

// Make my dropdown statement for the database.
// REF: http://stackoverflow.com/questions/16812733/populating-dropdown-menu-through-pdo-code


//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if ( isset( $_POST['asset-create-submit'] ) ) {

	//Retrieve the field values from our login form.
	$newAssetName         = ! empty( $_POST['asset-name'] ) ? trim( $_POST['asset-name'] ) : null;
	$newAssetCategory     = ! empty( $_POST['asset-category'] ) ? trim( $_POST['asset-category'] ) : null;
	$newAssetManufacturer = ! empty( $_POST['asset-manufacturer'] ) ? trim( $_POST['asset-manufacturer'] ) : null;


	

	//Retrieve the user account information for the given username.
	$sql  = "INSERT INTO asset_names (asset_name, asset_category_id, asset_manufacturer_id, asset_status_id)
    VALUES ( :newAssetName, :newAssetCategory, :newAssetManufacturer, 1)";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':newAssetName',     $newAssetName  );
	$stmt->bindValue( ':newAssetCategory', $newAssetCategory );
	$stmt->bindValue( ':newAssetManufacturer', $newAssetManufacturer );


	//Execute.
	$stmt->execute();


	$_POST = array();
	// TODO: Return the user to the same *tab*, not just the same page. -JMS
	header( "Location: /profile.php" );
	exit; // Location header is set, pointless to send HTML, stop the script
}


?>
