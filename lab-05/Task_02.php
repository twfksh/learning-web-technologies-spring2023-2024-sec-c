<?php

    $curPasswd = $newPasswd = $reNewPasswd = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curPasswd = $_POST["cur-passwd"];
        $newPasswd = $_POST["new-passwd"];
        $reNewPasswd = $_POST["re-new-passwd"];

        if ($curPasswd == $newPasswd) {
            echo "New password matches the current password, enter a new password!";
        } elseif ($newPasswd !== $reNewPasswd) {
            echo "Retype new password correctly!";
        } else {
            echo "Password change successfull!";
        }
    }

    // function validatePasswd($passwd) {
    //     $passwd = trim($passwd);
    //     $len = strlen($passwd);
    //     if ($len < 8) {
    //         return NULL;
    //     } else {
    //         for ($i = 0; $i < $len; $i++) {
    //             $ch = ord($passwd[$i]);
    //             if (!($ch >= 48 && $ch <= 57) && !($ch >= 65 && $ch <= 90) &&
    //                 !($ch >= 97 && $ch <= 122)) {
    //                 if ($passwd[$i] == '@' || $passwd[$i] = '#' || 
    //                     $passwd[$i] = '$' || $passwd[$i] == '%') {
    //                 } else {
    //                     return NULL;
    //                 }
    //             }
    //         }
    //     }
    //     return $passwd;
    // }
?>