<?php
require('helpers.php');
require('includes/classes/Account.php');
$account = new Account();
require('includes/handlers/register-handler.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Spotify Clone</title>
</head>

<body>
    <div id="inputContainer">
        <form action="register.php" id="loginForm" method="POST">
            <h3>Login to your account</h3>
            <p>
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g. johnSmilga" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" required>
            </p>

            <button type="submit" name="loginButton">Login</button>
        </form>
        <form action="register.php" id="registerForm" method="POST">
            <h3>Login to your account</h3>
            <p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="e.g. johnSmilga" required>
                <?= $account->getError('username'); ?>
            </p>
            <p>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="e.g. John" required>
                <?= $account->getError('firstname'); ?>
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="e.g. Smilga" required>
                <?= $account->getError('lastname'); ?>
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="e.g. smilga@gmail.com" required>
                <?= $account->getError('email'); ?>
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input type="email" id="email2" name="email2" placeholder="e.g. smilga@gmail.com" required>
                <?= $account->getError('email'); ?>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <?= $account->getError('password'); ?>
            </p>
            <p>
                <label for="password2">Confirm Password</label>
                <input type="password" id="password2" name="password2" required>
                <?= $account->getError('password'); ?>
            </p>

            <button type="submit" name="registerButton">Sign Up</button>
        </form>
    </div>
</body>

</html>