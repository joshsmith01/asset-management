<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/23/16
 * Time: 13:37
 */


// Make my dropdown statement for the database.
// REF: http://stackoverflow.com/questions/16812733/populating-dropdown-menu-through-pdo-code

$smtAsset = $pdo->prepare( "SELECT asset_id, asset_name from asset_names where asset_status_id=1" );

$smtAsset->execute();
$dataAsset = $smtAsset->fetchAll();

$smtEmployee = $pdo->prepare( "SELECT emp_id, concat(name_f, ' ', name_l) AS fullname FROM employees" );
 
$smtEmployee->execute();
$dataEmp = $smtEmployee->fetchAll();


?>
