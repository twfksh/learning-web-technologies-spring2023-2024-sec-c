<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Simple MVC Application</title>
</head>
<body>
    <form method="POST" action="../controllers/login_controller.php">
        <fieldset>
            <legend>Forgot Password</legend>
            <label for="username">Username or Email</label> <br>
            <input type="text" name="username"> <br> <hr>
            <input type="submit" name="submit" value="Reset Password">
        </fieldset>
    </form>
</body>
</html>