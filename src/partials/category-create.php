<?php
/**
 * Created by PhpStorm.
 * User: joshsmith01
 * Date: 5/22/16
 * Time: 21:30
 */



?>


<div class="row" >
	<div class="large-12 columns" >
		<p > Add Asset Categories here!</p >
		<div class="signup-panel" >
			<form action = "../assets/php/category-create-action.php"  method="post" >
				<div class="row" >
					<div class="small-12 medium-10 columns small-centered" >
						<input type = "text" name="category-create-category" placeholder = "Category Name" >
					</div >
				</div >

				<div class="row" >
					<div class="small-12 medium-10 columns small-centered" >
						<input type = "submit" name = "category-create-submit" class="button small-centered" value = "Add Category" >
					</div >
				</div >
			</form >
		</div >
	</div >
</div >


<?php
// Path to the action script is relative to the dist folder. -JMS
require 'assets/php/category-display-action.php'

?>