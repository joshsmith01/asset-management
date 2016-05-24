<?php


// Include our MySQL connection relative to the dist directory.

//require 'connect.php';

$sqlDisplayCategories = "SELECT * from asset_categories";

$displayCategories = $pdo->prepare( $sqlDisplayCategories );

$displayCategories->execute();

//Fetch the rows from the values returned by the SQL execution
// $assignedInventory = $assignedInventory->fetch(PDO::FETCH_ASSOC);

// Add some error checking with a die statement. -JMS
if ( $displayCategories->rowCount() > 0 )  { ?>

<table class="stack">
	<thead>
	<tr>
		<th >Asset Categories</th>
		<th ></th>
		<th ></th>
		<th ></th>
	</tr>
	</thead>
	<tbody>

<!--	echo '<td width="25%">' . $name . '</td>';-->
	<?php
		$counter = 1;
	while ( $row = $displayCategories->fetch( PDO::FETCH_ASSOC ) ) {

		$name = $row['category_name'];

		if ($counter == 1) {
			echo '</tr><td width="25%">' . $name .'</td>';
		} elseif ($counter % 4 == 0 ) {
			echo '<td width="25%">' . $name . '</td></tr>';
		} else {
			echo '<td width="25%">' . $name . '</td>';
		}




		$counter++;
	}
	} else {
		echo 'No Categories are assigned';
	}
	?>

	</tr>
	</tbody>
</table>
