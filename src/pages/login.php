{{> welcome}}


<div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns">

        <form action="../assets/php/login-action.php" method="post">
            <div class="row column log-in-form">
                <h4 class="text-center">Log in with you email account</h4>
                <label for="username">Email
                    <input type="text" placeholder="somebody@example.com" id="email" name="email">
                </label>
                <label for="password">Password
                    <input type="text" placeholder="Password" id="password" name="password">
                </label>
                <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
                <input type="submit" class="button expanded" name="login" value="Log In">
                <p class="text-center"><a href="#">Forgot your password?</a></p>
                <p class="text-center"><a href="register.php">Register</a></p>
            </div>
        </form>

    </div>
</div>


