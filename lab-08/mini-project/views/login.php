<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../controllers/auth.php" method="POST">
        <fieldset>
            <legend>REGISTRATION</legend>
            User Id <br>                 <input type="text" name="user-id"> <br>
            Password <br>           <input type="password" name="password">
            <input type="checkbox" name="remember"> Remember Me
            <hr>
            <input type="submit" name="submit" value="Login">
            <a href="register.php">Register</a>
        </fieldset>
    </form>
</body>
</html>