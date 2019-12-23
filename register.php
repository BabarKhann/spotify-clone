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
            </p>
            <p>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="e.g. John" required>
            </p>
            <p>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="e.g. Smilga" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="e.g. smilga@gmail.com" required>
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input type="email" id="email2" name="email2" placeholder="e.g. smilga@gmail.com" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </p>
            <p>
                <label for="password2">Confirm Password</label>
                <input type="password" id="password2" name="password2" required>
            </p>

            <button type="submit" name="registerButton">Sign Up</button>
        </form>
    </div>
</body>

</html>