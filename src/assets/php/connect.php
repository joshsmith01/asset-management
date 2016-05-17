<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/17/16
 * Time: 15:13
 * From this website: http://thisinterestsme.com/php-user-registration-form/
 */

// connect.php

// Our MySql user
define( 'dbUser', 'root' );

// My MySQL password
define( 'dbPass', 'root' );

// My server name
define( 'dbHost', 'localhost' );

// My database name
define( 'dbName', 'asset-management' );


/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 */
$pdoOptions = array(
	PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_EMULATE_PREPARES => false
);

/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
	"mysql:host=" . dbHost . ";dbname=" . dbName, //DSN
	dbUser, //Username
	dbPass, //Password
	$pdoOptions //Options
);

//The PDO object can now be used to query MySQL.