<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Simple MVC Application</title>
</head>
<body>
    <form method="POST" action="../controllers/signup_controller.php">
        <fieldset>
            <legend>Sign Up</legend>
            <label for="full-name">Full Name</label> <br>
            <input type="text" name="full-name"> <br>
            <label for="username">Username</label> <br>
            <input type="text" name="username"> <br>
            <label for="email">Email</label> <br>
            <input type="email" name="email"> <br>
            <label for="password">Password</label> <br>
            <input type="password" name="password"> <hr>
            <input type="submit" name="submit">
            <input type="reset" name="reset">
        </fieldset>
    </form>
</body>
</html>