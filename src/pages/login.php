{{> welcome}}

<?php

//login.php

/**
 * Start the session.
 */
//session_start();

/**
 * Include ircmaxell's password_compat library.
 */
require 'assets/lib/password.php';

/**
 * Include our MySQL connection.
 */
require 'assets/php/connect.php';



//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if ( isset( $_POST['login'] ) ) {

    //Retrieve the field values from our login form.
    $username        = ! empty( $_POST['username'] ) ? trim( $_POST['username'] ) : null;
    $passwordAttempt = ! empty( $_POST['password'] ) ? trim( $_POST['password'] ) : null;

    //Retrieve the user account information for the given username.
    $sql  = "SELECT emp_id, email, password FROM employees WHERE email = :username";
    $stmt = $pdo->prepare( $sql );

    //Bind value.
    $stmt->bindValue( ':username', $username );

    //Execute.
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch( PDO::FETCH_ASSOC );

    //If $row is FALSE.
    if ( $user === false ) {
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die( 'Incorrect username / password combination!111' );
    } else {
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        $validPassword = password_verify( $passwordAttempt, $user['password'] );

        //If $validPassword is TRUE, the login has been successful.
        if ( $validPassword ) {

            //Provide the user with a login session.
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page, which we called home.php
            header( 'Location: home.php' );
            exit;

        } else {
            //$validPassword was FALSE. Passwords do not match.
            die( 'Incorrect username / password combination!222' );
        }
    }

}

?>
<div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns">

        <form action="login.php" method="post">
            <div class="row column log-in-form">
                <h4 class="text-center">Log in with you email account</h4>
                <label for="username">Username
                    <input type="text" placeholder="somebody@example.com" id="username" name="username">
                </label>
                <label for="password">Password
                    <input type="text" placeholder="Password" id="password" name="password">
                </label>
                <input id="show-password" type="checkbox"><label for="show-password">Show password</label>
                <input type="submit" class="button expanded" name="login" >Log In</input>
                <p class="text-center"><a href="#">Forgot your password?</a></p>
            </div>
        </form>

    </div>
</div>


