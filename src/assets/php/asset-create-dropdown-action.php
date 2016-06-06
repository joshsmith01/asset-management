<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/23/16
 * Time: 13:37
 */


// Make my dropdown statement for the database.
// REF: http://stackoverflow.com/questions/16812733/populating-dropdown-menu-through-pdo-code

$smtCat = $pdo->prepare( "SELECT asset_categories.category_name, asset_categories.category_id FROM asset_categories" );

$smtCat->execute();
$dataCat = $smtCat->fetchAll();

$smtMan = $pdo->prepare( "SELECT manufacturers.name, manufacturers.manufacturer_id FROM manufacturers" );
 
$smtMan->execute();
$dataMan = $smtMan->fetchAll();




?>
