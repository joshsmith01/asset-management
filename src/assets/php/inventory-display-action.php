<?php


// Include our MySQL connection relative to the dist directtory.

require './assets/php/connect.php';

$sqlDisplayAssignedInventory = "SELECT asset_names.asset_name, asset_names.asset_id, asset_names.assigned_emp_id, asset_names.asset_status_id, employees.name_f, employees.name_l FROM asset_names INNER JOIN employees ON asset_names.assigned_emp_id = employees.emp_id WHERE asset_status_id=2";

$assignedInventory = $pdo->prepare( $sqlDisplayAssignedInventory );

$assignedInventory->execute();

//Fetch the rows from the values returned by the SQL execution
// $assignedInventory = $assignedInventory->fetch(PDO::FETCH_ASSOC);

// Add some error checking with a die statement. -JMS
if ( $assignedInventory->rowCount() > 0 )  { ?>

<table class="stack hover">
	<thead>
	<tr>
		<th width="100"> Asset ID</th>
		<th> Asset Name</th>
		<th width="400"> Employee Name</th>
	</tr>
	</thead>
	<tbody>


	<?php
	while ( $row = $assignedInventory->fetch( PDO::FETCH_ASSOC ) ) {

		$name       = $row['asset_name'];
		$id         = $row['asset_id'];
		$name_l     = $row['name_l'];
		$name_f     = $row['name_f'];
		$name_whole = $row['name_f'] . ' ' . $row['name_l'];

		echo '<tr><td>' . $id . '</td>';
		echo '<td>' . $name . '</td>';
		echo '<td>' . $name_whole . '</td></tr>';


	}
	} else {
		echo 'No Assets are assigned';
	}
	?>


	</tbody>
</table>
