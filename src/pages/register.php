{{> welcome}}


<div class="row">
	<div class="medium-6 medium-centered large-4 large-centered columns">

		<form action="login.php" method="post">
			<div class="row column log-in-form">
				<h4 class="text-center">Register for Asset Management</h4>
				<label for="emp-first-name">First Name
					<input type="text" placeholder="Johnny" id="emp-first-name" name="emp-first-name">
				</label>
				<label for="emp-last-name">Last Name
					<input type="text" placeholder="Appleseed" id="emp-last-name" name="emp-last-name">
				</label>
				<label for="emp-email">Email
					<input type="text" placeholder="johnnyappleseed@nature.com" id="emp-email" name="emp-email">
				</label>
				<label for="emp-password">Password
					<input type="text" placeholder="Password" id="emp-password" name="emp-password">
				</label>
				<label for="emp-password-confirm">Confirm Password
					<input type="text" placeholder="Password" id="emp-password-confirm" name="emp-password-confirm">
				</label>
				<input type="submit" class="button expanded" name="login" value="Register">
			</div>
		</form>

	</div>
</div>