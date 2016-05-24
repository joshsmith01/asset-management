<?php


// Include our MySQL connection relative to the dist directory.

//require 'connect.php';

$sql = "SELECT asset_names.asset_name, asset_categories.category_name, manufacturers.name, status.status
FROM asset_names
  JOIN asset_categories
    ON asset_names.asset_category_id = asset_categories.category_id
  JOIN manufacturers
    ON asset_names.asset_manufacturer_id = manufacturers.manufacturer_id
  JOIN  status
    ON asset_names.asset_status_id = status.status_id;";

$stmt = $pdo->prepare( $sql );

$stmt->execute();

//Fetch the rows from the values returned by the SQL execution
// $assignedInventory = $assignedInventory->fetch(PDO::FETCH_ASSOC);

// Add some error checking with a die statement. -JMS
if ( $stmt->rowCount() > 0 )  { ?>

<table class="stack hover">
	<thead>
	<tr>
		<th >Name</th>
		<th >Category</th>
		<th >Manufacturer</th>
		<th >Status</th>
	</tr>
	</thead>
	<tbody>

	<?php
	while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {

		$asset_name         = $row['asset_name'];
		$asset_category     = $row['category_name'];
		$asset_manufacturer = $row['name'];
		$asset_status       = $row['status'];


		echo '</tr><td>' . ucfirst( $asset_name ) . '</td><td>' . ucfirst( $asset_category ) . '</td><td>' . ucfirst( $asset_manufacturer ) . '</td><td>' . ucfirst( $asset_status ) . '</td></tr>';

	}
	} else {
		echo 'No Assets exist in our database';
	}
	?>


	</tbody>
</table>
