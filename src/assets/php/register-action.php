<?php

//register-action.php

/**
 * Start the session.
 */
session_start();

/**
 * Include ircmaxell's password_compat library.
 */
require '../lib/password.php';

/**
 * Include our MySQL connection.
 */
require 'connect.php';


//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if ( isset( $_POST['register'] ) ) {

	//Retrieve the field values from our registration form.
	$firstname = ! empty( $_POST['emp-first-name'] ) ? trim( $_POST['emp-first-name'] ) : null;
	$lastname     = ! empty( $_POST['emp-last-name'] ) ? trim( $_POST['emp-last-name'] ) : null;
	$email = ! empty( $_POST['emp-email'] ) ? trim( $_POST['emp-email'] ) : null;
	$pass = ! empty( $_POST['emp-password-confirm'] ) ? trim( $_POST['emp-password-confirm'] ) : null;

	//TO ADD: Error checking (username characters, password length, etc).
	//Basically, you will need to add your own error checking BEFORE
	//the prepared statement is built and executed.

	//Now, we need to check if the supplied username already exists.

	//Construct the SQL statement and prepare it.
	$sql  = "SELECT COUNT(email) AS num FROM employees WHERE email = :email";
	$stmt = $pdo->prepare( $sql );

	//Bind the provided username to our prepared statement.
	$stmt->bindValue( ':email', $email );

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
	$passwordHash = password_hash( $pass, PASSWORD_BCRYPT, array( "cost" => 12 ) );

	//Prepare our INSERT statement.
	//Remember: We are inserting a new row into our employees table.
	$sql  = "INSERT INTO employees (name_f, name_l, email, password) VALUES (:name_f, :name_l, :email, :password)";
	$stmt = $pdo->prepare( $sql );

	//Bind our variables.
	$stmt->bindValue( ':name_f', $firstname );
	$stmt->bindValue( ':name_l', $lastname );
	$stmt->bindValue( ':email', $email );
	$stmt->bindValue( ':password', $passwordHash );

	//Execute the statement and insert the new account.
	$result = $stmt->execute();

	//If the signup process is successful.
	if ( $result ) {
		//What you do here is up to you!
		echo 'Thank you for registering with our website.';
	}

}

?>