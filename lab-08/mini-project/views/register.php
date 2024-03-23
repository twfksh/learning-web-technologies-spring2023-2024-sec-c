<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="../controllers/register.php" method="POST">
        <fieldset>
            <legend>REGISTRATION</legend>
            Id <br>                 <input type="text" name="id"> <br>
            Password <br>           <input type="password" name="password"> <br>
            Confirm Password <br>   <input type="password" name="conf-password"> <br>
            Name <br>               <input type="text" name="name"> <br>
            Email <br>              <input type="email" name="email"> <br>
            User Type <i>[User/Admin]</i> <br>
                <select name="user-type">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select> <hr>
            <input type="submit" name="submit" value="Register">
            <a href="login.php">Login</a>
        </fieldset>
    </form>
</body>
</html>