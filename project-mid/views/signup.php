<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | OpenCrowd</title>
</head>
<body>
    <?php include_once('navbar.php'); ?>
    
    <form style="margin: auto; width: 50%;" method="post" action="../controllers/reg.php" enctype="multipart/form-data">
        <fieldset>
            <legend>User | Sign Up</legend>
            Name:  <br> <input type="text" name="name" placeholder="Full Name"> <hr>
            Email: <br> <input type="email" name="email" placeholder="username@example.com"> <hr>
            Headline: <br> <input type="text" name="headline" placeholder="Write a headline" style="width: 99%;"> <br> <hr>
            Username: <br> <input type="text" name="username" placeholder="Username"> <br> <hr>
            Password: <br> <input type="password" name="password" placeholder="Password"> <br> <br>
            Confirm Password: <br> <input type="password" name="conf-password" placeholder="Confirm Password"> <br> <hr>
            Org: <br> <input type="text" name="org" placeholder="Your organization name"> <br> <br>
            Role:   <select name="role">
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
            Date of Birth:  <br> <input type="date" name="dob" required /> <hr>

            <input type="submit" name="submit">
            <input type="reset" name="reset">
        </fieldset>
    </form>
</body>
</html>
