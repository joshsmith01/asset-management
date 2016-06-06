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
if ( isset( $_POST['employee-create-submit'] ) ) {

	//Retrieve the field values from our login form.
	$newEmpFirst    = ! empty( $_POST['employee-name_f'] ) ? trim( $_POST['employee-name_f'] ) : null;
	$newEmpLast     = ! empty( $_POST['employee-name_l'] ) ? trim( $_POST['employee-name_l'] ) : null;
	$newEmpEmail    = ! empty( $_POST['employee-email'] ) ? trim( $_POST['employee-email'] ) : null;
	$newEmpPassword = ! empty( $_POST['employee-password'] ) ? trim( $_POST['employee-password'] ) : null;


	//TO ADD: Error checking (username characters, password length, etc).
	//Basically, you will need to add your own error checking BEFORE
	//the prepared statement is built and executed.

	//Now, we need to check if the supplied username already exists.

	//Construct the SQL statement and prepare it.
	$sql  = "SELECT COUNT(email) AS num FROM employees WHERE email = :newEmpEmail";
	$stmt = $pdo->prepare( $sql );

	//Bind the provided username to our prepared statement.
	$stmt->bindValue( ':newEmpEmail', $newEmpEmail );

	//Execute.
	$stmt->execute();

	//Fetch the row.
	$row = $stmt->fetch( PDO::FETCH_ASSOC );

	//If the provided username already exists - display error.
	//TO ADD - Your own method of handling this error. For example purposes,
	//I'm just going to kill the script completely, as error handling is outside
	//the scope of this tutorial.
	if ( $row['num'] > 0 ) {
		die( 'That username already exists!' );
	}

	//Hash the password as we do NOT want to store our passwords in plain text.
	$passwordHash = password_hash( $newEmpPassword, PASSWORD_BCRYPT, array( "cost" => 12 ) );

	//Prepare our INSERT statement.
	//Remember: We are inserting a new row into our employees table.


	//Retrieve the user account information for the given username.
	$sql  = "INSERT INTO employees (name_f, name_l, email, password) VALUES (:newEmpFirst, :newEmpLast, :newEmpEmail, :newEmpPassword)";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':newEmpFirst',    $newEmpFirst );
	$stmt->bindValue( ':newEmpLast',     $newEmpLast );
	$stmt->bindValue( ':newEmpEmail',    $newEmpEmail );
	$stmt->bindValue( ':newEmpPassword', $newEmpPassword );

	//Execute.
	$stmt->execute();


	$_POST = array();
	// TODO: Return the user to the same *tab*, not just the same page. -JMS
	header( "Location: /profile.php" );
	exit; // Location header is set, pointless to send HTML, stop the script
}


?>
