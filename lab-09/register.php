<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="reg_validation.php" method="POST">
        <fieldset>
            <legend>REGISTRATION</legend>
            First Name <br>               <input type="text" name="fname"> <br>
            Last Name <br>               <input type="text" name="lname"> <br>
            <fieldset>
                <legend>Date of Birth</legend>
                <input type="number" name="day" min="1" max="31" required /> /
                <input type="number" name="month" min="1" max="12" required /> /
                <input type="number" name="year" min="1900" max="9999" required /> (dd/mm/yyyy)
            </fieldset> <hr>
            <fieldset>
                <legend>Gender</legend>
                <input type="radio" id="male" name="gender" value="male" required> 
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" required> 
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other" required> 
                <label for="other">Other</label>
            </fieldset> <hr> 
            Phone <br>              <input type="tel" name="phone"> <br>
            Email <br>              <input type="text" name="email"> <br>
            Password <br>           <input type="password" name="password"> <br>
            Confirm Password <br>   <input type="password" name="conf-password"> <br>
            <input type="submit" name="submit" value="Register">
        </fieldset>
    </form>
</body>
</html>