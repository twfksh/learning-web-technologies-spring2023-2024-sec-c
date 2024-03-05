<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Simple MVC Application</title>
</head>
<body>
    <form method="POST" action="../controllers/auth_controller.php">
        <fieldset>
            <legend>Login</legend>
            <label for="username">Username</label> <br>
            <input type="text" name="username"> <br>
            <label for="password">Password</label> <br>
            <input type="password" name="password"> <hr>
            <input type="submit" name="submit">
            <a href="forgot_password.php">Forgot Password?</a>
        </fieldset>
    </form>
</body>
</html>