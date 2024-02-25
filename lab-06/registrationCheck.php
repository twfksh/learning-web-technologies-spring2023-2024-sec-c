<?php
    $name = $email = $username = $password = $confirmPassword = $gender = $dob_dd = $dob_mm = $dob_yyyy = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm-password"];
        $gender = isset($_POST["male"]) ? "male" : isset($_POST["female"]) ? "female" : "other";
        $dob_dd = $_POST["day"];
        $dob_mm = $_POST["month"];
        $dob_yyyy = $_POST["year"];
        echo $name;
        echo $username;
    }
?>