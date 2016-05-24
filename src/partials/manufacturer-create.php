<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/22/16
 * Time: 21:33
 */

?>
<div class="row" >
	<div class="large-12 columns" >
		<p > Add all new manufacturer here!</p >
		<div class="signup-panel" >
			<! -- TODO: send this form to a script that adds new companies to the db . - JMS -->
			<form action = "../assets/php/manufacturer-create-action.php" method="post" >
				<div class="row" >
					<div class="small-12 medium-10 columns small-centered" >
						<input type = "text" name="manufacturer-name" id="manufacturer-name" placeholder="Manufacturer Name" >
					</div >
				</div >
				<div class="row" >
					<div class="small-12 medium-10 columns small-centered" >
						<input type = "text" name="manufacturer-address1" id="manufacturer-address1" placeholder="Manufacturer Address" >
					</div >
				</div >
				<div class="row" >
					<div class="small-12 medium-10 columns small-centered" >
						<input type = "text" name="manufacturer-address2" id="manufacturer-address2" placeholder="Manufacturer Address" >
					</div >
				</div >
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" name="manufacturer-city" id="manufacturer-city" placeholder="Manufacturer City">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" name="manufacturer-state" id="manufacturer-state" placeholder="Manufacturer State">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" name="manufacturer-country" id="manufacturer-country" placeholder="Manufacturer Country">
					</div>
				</div>
				<div class="row" >
					<div class="small-12 medium-10 columns small-centered" >
						<input type="submit" name="manufacturer-create-submit" class="button small-centered" value="Add Manufacturer">
					</div >
				</div >
			</form >
		</div >
	</div >
</div >
<?php
// Path to the action script is relative to the dist folder. -JMS

require 'assets/php/manufacturer-display-action.php'

?>