<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | OpenCrowd</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once('navbar.php'); ?>
    
    <form style="margin: auto; width: 50%;" method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>User | Sign Up</legend>
            Name:  <br> <input type="text" id="name" name="name" placeholder="Full Name"> <hr>
            Email: <br> <input type="email" id="email" name="email" placeholder="username@example.com"> <hr>
            Headline: <br> <input type="text" id="headline" name="headline" placeholder="Write a headline" style="width: 99%;"> <br> <hr>
            Username: <br> <input type="text" id="username" name="username" placeholder="Username"> <br> <hr>
            Password: <br> <input type="password" id="password" name="password" placeholder="Password"> <br> <br>
            Confirm Password: <br> <input type="password" id="conf-password" name="conf-password" placeholder="Confirm Password"> <br> <hr>
            Org: <br> <input type="text" id="org" name="org" placeholder="Your organization name"> <br> <br>
            Role:   <select id="role" name="role">
                        <option value="Developer">Developer</option>
                        <option value="Investor">Investor</option>
                        <option value="Contributor">Contributor</option>
                        <option value="Student">Student</option>
                    </select> <hr>
            Gender:     <br> <input type="radio" id="male" name="gender" value="male" /> 
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" /> 
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other" /> 
                        <label for="other">Other</label> <hr>
            Date of Birth:  <br> <input type="date" id="dob" name="dob" required /> <hr>

            <input type="button" name="submit" value="Submit" onclick="register()">
            <input type="reset" name="reset">
        </fieldset>
    </form>

    <script src="../ajax/register.js"></script>
</body>
</html>
