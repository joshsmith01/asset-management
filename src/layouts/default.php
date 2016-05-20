<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/19/16
 * Time: 21:53
 */
session_start();
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
