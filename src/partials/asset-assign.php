<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/22/16
 * Time: 20:34
 */
?>

<?php
// Path to the action script is relative to the dist folder. -JMS
require 'assets/php/asset-assign-dropdown-action.php';
?>


<div class="row">
	<div class="large-12 columns">
		<p>Assign company assets here!</p>
		<div class="signup-panel">
			<form action="../assets/php/asset-assign-action.php" method="post">
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<select name="asset" title="asset-category">
							<option value="">Select...</option>
							<?php foreach ( $dataAsset as $row ): ?>
								<option value="<?= $row["asset_id"] ?>"><?= ucwords( $row["asset_name"] ) ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<select type="text" name="employee" placeholder="Employee Name">
							<option value="">Select...</option>
							<?php foreach ( $dataEmp as $row ): ?>
								<option value="<?= $row["emp_id"] ?>"><?= ucwords( $row["fullname"] ) ?></option>
							<?php endforeach ?>

						</select>
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="submit" name="asset-assign-submit" class="button small-centered" value="Assign Asset">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
// Path to the action script is relative to the dist folder. -JMS
require 'assets/php/asset-assign-display-action.php';

?>
