<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/19/16
 * Time: 21:53
 */
// Start the session all pages first. A session has to be present *before* I check to see that it is set with the next block of code.
session_start();

// Check to see if the user is actually logged in and if the user is on a page other than the the login page.
// If the user is not logged in and the user in not on the log in page, then redirect them to the log in page.
if ( ( ! isset( $_SESSION['logged_in'] ) ) && ( $_SERVER['REQUEST_URI'] != "/login.php" ) ) { //if login in session is not set
	header( "Location: /login.php" );
	echo $_SESSION['logged_in'];
}
?>

{{!-- This is the base layout for your project, and will be used on every page. --}}

<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Asset Management</title>
	<link rel="stylesheet" href="{{root}}assets/css/app.css">
</head>
<body>

{{!-- Pages you create in the src/pages/ folder are inserted here when the flattened page is created. --}}
{{> body}}

<script src="{{root}}assets/js/app.js"></script>
</body>
</html>
