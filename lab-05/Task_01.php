<?php
    $usrname = $passwd = "";
    $remember = $_POST["remember"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usrname = validateUsername($_POST["username"]);
        $passwd = validatePasswd($_POST["password"]);
        if ($usrname == NULL || $passwd == NULL) echo "Invalid username or password!";
        else echo "Username: {$usrname} <br> Password: {$passwd} <br>";
    }
    
    function validateUsername($usrname) {
        $usrname = trim($usrname);
        $len = strlen($usrname);
        if ($len < 2) {
            return NULL;
        } else {
            for ($i = 0; $i < $len; $i++) {
                $ch = ord($usrname[$i]);
                if (!($ch >= 48 && $ch <= 57) ||
                    !($ch >= 65 && $ch <= 90) ||
                    !($ch >= 97 && $ch <= 122)||
                    !($usrname[$i] == '.') || !($usrname[$i] == '-') || !($usrname[$i] == '_')) {
                    return NULL;
                }
            }
        }
        return $usrname;
    }
    function validatePasswd($passwd) {
        $passwd = trim($passwd);
        $len = strlen($passwd);
        if ($len < 8) {
            return NULL;
        } else {
            for ($i = 0; $i < $len; $i++) {
                $ch = ord($passwd[$i]);
                if (!($ch >= 48 && $ch <= 57) && !($ch >= 65 && $ch <= 90) &&
                    !($ch >= 97 && $ch <= 122)) {
                    if ($passwd[$i] == '@' || $passwd[$i] = '#' || 
                        $passwd[$i] = '$' || $passwd[$i] == '%') {
                    } else {
                        return NULL;
                    }
                }
            }
        }
        return $passwd;
    }
?>