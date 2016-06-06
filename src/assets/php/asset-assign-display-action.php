<?php


// Include our MySQL connection relative to the dist directory.

//require 'connect.php';

$sql = "SELECT asset_names.asset_id, asset_names.asset_name, concat(employees.name_f, ' ', employees.name_l) as fullname,  status.status
FROM asset_names
  JOIN employees
    ON asset_names.assigned_emp_id = employees.emp_id
  JOIN status
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
		<th >Asset</th>
		<th >Assignee</th>
		<th >Status</th>
		<th >Assignment</th>
		<th >Update</th>
	</tr>
	</thead>
	<tbody>

	<?php


	while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {

		$assetID            = $row['asset_id'];
		$asset_name         = $row['asset_name'];
		$fullname           = $row['fullname'];
		$asset_status       = $row['status'];


		echo '</tr><td>' . ucfirst( $asset_name ) . '</td><td>' . ucwords($fullname) . '</td><td>' . ucfirst( $asset_status ) . '</td><td>' . ucfirst( $asset_status ) . '</td><td><form id="view_admin" method="post" action="../assets/php/asset-assign-action.php">
  <input type="hidden" name="rowID" value="'. $assetID .'">
  <input type="submit" name="asset-assign-unassign" value="Unassign" class="button warning">
  <input type="submit" name="asset-assign-retire" value="Retire" class="button alert">
</form></td></tr>';


	}
	} else {
		echo 'No Assets exist in our database';
	}
	?>


	</tbody>
</table>
