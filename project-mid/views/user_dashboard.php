<?php
    require_once '../models/user_model.php';
    
    $curUser = getUserByUsername($_SESSION['opencrowd_cur_session']);
?>

<div>
    <fieldset style="margin: auto; width: 50%;">
        <legend>Profile [<?=$_SESSION['opencrowd_cur_session']?>]</legend>
                <?php
                    $username = $curUser['username'];
                    $jpgProfilePicture = "../uploads/images/{$username}.jpg";
                    $pngProfilePicture = "../uploads/images/{$username}.png";

                    if (file_exists($jpgProfilePicture)) {
                        echo "<img src='{$jpgProfilePicture}' alt='Profile Picture' width='150'>";
                    } elseif (file_exists($pngProfilePicture)) {
                        echo "<img src='{$pngProfilePicture}' alt='Profile Picture' width='150'>";
                    } else {
                        echo "<i class='fa-solid fa-user-plus fa-6x'></i>";
                    }
                ?> <br> <br>
                    Name:           <?= $curUser['name'] ?>    <hr>
                    Email:          <?= $curUser['email'] ?>   <hr>
                    Headline:       <?= $curUser['headline'] ?> <hr>
                    Organization:   <?= $curUser['org'] ?> <hr>
                    Role:           <?= $curUser['role'] ?> <hr>
                    Gender:         <?= $curUser['gender'] ?>  <hr>
                    Date of Birth:  <?= $curUser['dob'] ?> <hr>
                    <button onclick="window.location.href='edit_profile.php'">Edit Profile</button>
                    <button onclick="window.location.href='products.php?username=<?=$username?>'">My Products</button>
                    <button onclick="window.location.href='add_product.php?username=<?=$username?>'">Add Products</button>
    </fieldset>
</div>