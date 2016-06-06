<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/22/16
 * Time: 21:39
 */
?>

<div class="row">
	<div class="large-12 columns">
		<p> Add all new employees here!</p>
		<div class="signup-panel">
			<! -- TODO: send this form to a script that adds new employees to the db . - JMS -->
			<form action="../assets/php/employee-create-action.php" method="post">
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" name="employee-name_f" placeholder="First Name">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" name="employee-name_l" placeholder="Last Name">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" name="employee-email" placeholder="Email">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="text" name="employee-password" placeholder="Password">
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-10 columns small-centered">
						<input type="submit" name="employee-create-submit" class="button small-centered"
						       value="Add Employee">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
// Path to the action script is relative to the dist folder. -JMS
require 'assets/php/employee-display-action.php'

?>