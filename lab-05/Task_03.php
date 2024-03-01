<?php
    $profilePicture = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["pofile-picture"])) {
            $profilePicture = $_FILES["pofile-picture"];

            if ($validatePicture($profilePicture)) {
                echo "Picture uploaded successfully! <br>";
            }
        }
    }

    function validatePicture($file) {
        $maxFileSize = 4 * 1024 * 1024;
        
        if ($file["tmp_name"] === null) {
            echo "Please upload a valid file! <br>";
        }

        $fileName = $file["name"];
        $fileSize = $file["size"];
    }
?>