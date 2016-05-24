<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/22/16
 * Time: 20:34
 */
?>

<div class="row">
	<div class="large-12 columns">
		<p>Add all company assets here!</p>
		<div class="signup-panel">
			<!-- TODO: send this form to a script that adds new assets to the db. -JMS-->
			<form action="../assets/php/asset-create-action.php" method="post">
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" placeholder="Asset Name">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" placeholder="Asset Category">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" placeholder="Asset Manufacturer">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="submit" name="asset-create-submit" class="button small-centered" value="Add Asset">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
// Path to the action script is relative to the dist folder. -JMS
require 'assets/php/asset-display-action.php'

?>


