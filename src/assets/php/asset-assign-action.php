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
if ( isset( $_POST['asset-assign-submit'] ) ) {

	//Retrieve the field values from our login form.
	$assetID         = ! empty( $_POST['asset'] ) ? trim( $_POST['asset'] ) : null;
	$employeeID      = ! empty( $_POST['employee'] ) ? trim( $_POST['employee'] ) : null;


	//Retrieve the user account information for the given username.
	$sql  = "UPDATE asset_names SET assigned_emp_id=:employee, asset_status_id=2 WHERE asset_id=:asset";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':asset', $assetID  );
	$stmt->bindValue( ':employee', $employeeID );



	//Execute.
	$stmt->execute();


	$_POST = array();
	// TODO: Return the user to the same *tab*, not just the same page. -JMS
	header( "Location: /profile.php" );
	exit; // Location header is set, pointless to send HTML, stop the script


} elseif (isset($_POST ['asset-assign-unassign'] ) ) {


	//Retrieve the field values from our button.
	$assetID = ! empty( $_POST['asset'] ) ? trim( $_POST['asset'] ) : null;
	$rowID    = ! empty( $_POST['rowID'] ) ? trim( $_POST['rowID'] ) : null;

	//Retrieve the user account information for the given username.
	$sql  = "UPDATE asset_names SET asset_status_id=1 where asset_id=:asset";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':asset', $rowID );


	//Execute.
	$stmt->execute();

	// Return the user to the home page.
	header( "Location: /profile.php" );
	exit; // Location header is set, pointless to send HTML, stop the script




} elseif (isset($_POST['asset-assign-retire'])) {

	//Retrieve the field values from our login form.
	$assetID = ! empty( $_POST['asset'] ) ? trim( $_POST['asset'] ) : null;
	$rowID = ! empty( $_POST['rowID'] ) ? trim( $_POST['rowID'] ) : null;

	//Retrieve the user account information for the given username.
	$sql  = "UPDATE asset_names SET asset_status_id=3 WHERE asset_id=:asset";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':asset', $rowID );


	//Execute.
	$stmt->execute();

	// Return the user to the home page. 
	header( "Location: /profile.php" );
	exit; // Location header is set, pointless to send HTML, stop the script


}


?>
