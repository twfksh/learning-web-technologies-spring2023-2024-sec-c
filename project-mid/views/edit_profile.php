<?php
    session_start();
    
    require_once '../models/user_model.php';

    if (!isset($_SESSION['opencrowd_cur_session'])) {
        header('location: ../views/error.php?err=Error(Edit Profile): You have been logged out of the session, please login first');
    }

    if (isset($_GET['username']) && $_SESSION['opencrowd_cur_session'] === 'admin') {
        $curUser = getUserByUsername($_GET['username']);
    } else {
        $curUser = getUserByUsername($_SESSION['opencrowd_cur_session']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | OpenCrowd</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once('navbar.php'); ?>

    <form style="margin: auto; width: 50%;" method="post" action="../controllers/update_profile.php" enctype="multipart/form-data" >
        <fieldset>
            <legend>Edit Profile [<?=$_SESSION['opencrowd_cur_session']?>]</legend>
            <?php
                $username = $_SESSION['opencrowd_cur_session'];
                $jpgProfilePicture = "../assets/images/users/{$username}.jpg";
                $pngProfilePicture = "../assets/images/users/{$username}.png";

                if (file_exists($jpgProfilePicture)) {
                    echo "<img src='{$jpgProfilePicture}' alt='Profile Picture' width='150'>";
                } elseif (file_exists($pngProfilePicture)) {
                    echo "<img src='{$pngProfilePicture}' alt='Profile Picture' width='150'>";
                } else {
                    echo "<i class='fa-solid fa-user-plus fa-6x'></i>";
                }
            ?> <br> <br>
            <input type="file" name="profile-picture"> <hr>
            Name:  <br> <input type="text" name="name" value=<?=$curUser['name']?>> <hr>
            Email: <br> <input type="email" name="email" value=<?=$curUser['email']?>> <hr>
            Headline: <br> <input type="text" name="headline" value=<?=$curUser['headline']?> style="width: 99%;"> <br> <hr>
            Username: <br> <input type="text" name="username" value=<?=$curUser['username']?>> <br> <hr>
            Password: <br> <input type="password" name="password" value=<?=$curUser['password']?>> <br> <br>
            Confirm Password: <br> <input type="password" name="conf-password" value=<?=$curUser['password']?>> <br> <hr>
            Org: <br> <input type="text" name="org" value=<?=$curUser['org']?>> <br> <br>
            Role:   <select name="role">
                        <option value="Developer" <?= ($curUser['role'] == 'Developer') ? 'selected' : '' ?>>Developer</option>
                        <option value="Investor" <?= ($curUser['role'] == 'Investor') ? 'selected' : '' ?>>Investor</option>
                        <option value="Contributor" <?= ($curUser['role'] == 'Contributor') ? 'selected' : '' ?>>Contributor</option>
                        <option value="Student" <?= ($curUser['role'] == 'Student') ? 'selected' : '' ?>>Student</option>
                    </select> <hr>
            Gender:     <br> <input type="radio" id="male" name="gender" value="male" <?= ($curUser['gender'] == 'male') ? 'checked' : '' ?>>
                            <label for="male">Male</label>

                            <input type="radio" id="female" name="gender" value="female" <?= ($curUser['gender'] == 'female') ? 'checked' : '' ?>>
                            <label for="female">Female</label>

                            <input type="radio" id="other" name="gender" value="other" <?= ($curUser['gender'] == 'other') ? 'checked' : '' ?>>
                            <label for="other">Other</label> <hr>
            Date of Birth:  <br> <input type="date" name="dob" value=<?=$curUser['dob']?> required /> <hr>

            <input type="submit" name="submit">
        </fieldset>
    </form>
</body>
</html>
