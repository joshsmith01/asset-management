<?php


// Include our MySQL connection relative to the dist directory.

//require 'connect.php';

$sql = "SELECT concat(employees.name_f, ' ', employees.name_l) AS fullname,
  roles.role
  FROM employees
    JOIN roles
      ON employees.role_id = roles.role_id;";

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
		<th >Role</th>
		<th ></th>
		<th ></th>
	</tr>
	</thead>
	<tbody>

	<?php
	while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {

		$fullname = $row['fullname'];
		$role     = $row['role'];



		echo '</tr><td>' . ucwords( $fullname ) . '</td><td>' . ucfirst( $role ) . '</td></tr>';

	}
	} else {
		echo 'No Employees exist in our database';
	}
	?>


	</tbody>
</table>
