<?php


// Include our MySQL connection relative to the dist directory.

//require 'connect.php';

$sql = "SELECT * from manufacturers";

$stmt = $pdo->prepare( $sql );

$stmt->execute();

//Fetch the rows from the values returned by the SQL execution
// $assignedInventory = $assignedInventory->fetch(PDO::FETCH_ASSOC);

// Add some error checking with a die statement. -JMS
if ( $stmt->rowCount() > 0 )  { ?>

<table class="stack hover">
	<thead>
	<tr>
		<th >Asset Manufacturers</th>
		<th ></th>
		<th ></th>
		<th ></th>
		<th></th>
		<th></th>
	</tr>
	</thead>
	<tbody>

	<?php
	while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {

		$name     = $row['name'];
		$address1 = $row['address_line_1'];
		$address2 = $row['address_line_2'];
		$city     = $row['city'];
		$state    = $row['state'];
		$country  = $row['country'];


		echo '</tr><td>' . ucfirst( $name ) . '</td><td>' . ucfirst( $address1 ) . '</td><td>' . ucfirst( $address2 ) . '</td><td>' . ucfirst( $city ) . '</td><td>' . ucfirst( $state ) . '</td><td>' . ucfirst( $country ) . '</td></tr>';

	}
	} else {
		echo 'No Manufacturers exist in our database';
	}
	?>


	</tbody>
</table>
