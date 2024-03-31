<?php

$fname = $lname = $dob = $gender = $phone = $email = $password = $confPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $confPassword = $_POST["conf-password"];

    if (empty($fname) || empty($lname) || empty($day) || empty($month) || empty($year) || empty($gender) || empty($password) || empty($confPassword)) {
        echo "All the fields must be filled.";
        exit();
    }

}

function validateName($name) {
    if (empty($name) || strlen($name) < 2) {
        return false;
    }

    
}

function validateEmail($email) {

}

function validateDateOfBirth($dob) {
        
}

?>