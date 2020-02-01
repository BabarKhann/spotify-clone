<?php
require("./includes/config.php");
require('helpers.php');
// Check, if Session Variable Set, then redirect user to index page.
if (isset($_SESSION['userLoggedIn'])) :
    redirect("index.php");
endif;

require('includes/classes/Account.php');
require('includes/classes/Constants.php');

$account = new Account($conn);

require('includes/handlers/login-handler.php');
require('includes/handlers/register-handler.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Spotify Clone</title>
    <!-- Load Register Page Css -->
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<div id="background">
    <div id="loginContainer">
        <div id="inputContainer">
            <form action="register.php" id="loginForm" method="POST">
                <h2>Login to your account</h2>
                <p class="error" style="color: red">
                    <?= $account->getError('login'); ?>
                </p>
                <p>
                    <label for="loginUsername">Username</label>
                    <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g. johnSmilga"
                           required>
                </p>
                <p>
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" name="loginPassword" required>
                </p>

                <button type="submit" name="loginButton">LOG IN</button>

                <div class="hasAccountText">
                    <span id="hideLogin">Don't have an account yet? Signup here.</span>
                </div>

            </form>
            <form action="register.php" id="registerForm" method="POST">
                <h2>Login to your account</h2>
                <p>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?= oldValue('username') ?>"
                           placeholder="e.g. johnSmilga" required>
                    <?= $account->getError('username'); ?>
                </p>
                <p>
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" value="<?= oldValue('firstName') ?>"
                           placeholder="e.g. John" required>
                    <?= $account->getError('firstname'); ?>
                </p>
                <p>
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" value="<?= oldValue('lastName') ?>"
                           placeholder="e.g. Smilga" required>
                    <?= $account->getError('lastname'); ?>
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= oldValue('email') ?>"
                           placeholder="e.g. smilga@gmail.com" required>
                    <?= $account->getError('email'); ?>
                </p>
                <p>
                    <label for="email2">Confirm Email</label>
                    <input type="email" id="email2" name="email2" value="<?= oldValue('email2') ?>"
                           placeholder="e.g. smilga@gmail.com" required>
                    <?= $account->getError('email'); ?>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="<?= oldValue('password') ?>"
                           required>
                    <?= $account->getError('password'); ?>
                </p>
                <p>
                    <label for="password2">Confirm Password</label>
                    <input type="password" id="password2" name="password2" value="<?= oldValue('password2') ?>"
                           required>
                    <?= $account->getError('password'); ?>
                </p>

                <button type="submit" name="registerButton">SIGN UP</button>

                <div class="hasAccountText">
                    <span id="hideRegister">Already have an account? Log in here.</span>
                </div>

            </form>
        </div> <!-- #inputContainer -->
        <div id="loginText">
            <h1>Get Greate Music, right now</h1>
            <h2>Listen to loads songs free.</h2>
            <ul>
                <li>Discover Music</li>
                <li>Create your playlist</li>
                <li>Follow artists</li>
            </ul>
        </div>
    </div>
</div>
<!-- #background -->
<script src="assets/js/register.js"></script>

<?php

if (isset($_POST['registerButton'])) :
    echo '<script>
        $(document).ready(function () {
            $("#loginForm").hide();
            $("#registerForm").show();
        });
    </script>';
else:
    echo '<script>
        $(document).ready(function () {
            $("#loginForm").show();
            $("#registerForm").hide();
        });
    </script>';
endif;

?>
</body>

</html>