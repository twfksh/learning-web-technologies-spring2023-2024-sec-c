<?php
    $profilePicture = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["profile-picture"])) {
            $profilePicture = $_FILES["profile-picture"];

            if (validatePicture($profilePicture)) {
                echo "Picture uploaded successfully! <br>";
            } else {
                echo "Failed to upload picture.<br>";
            }
        }
    }

    function validatePicture($file) {
        $maxFileSize = 4 * 1024 * 1024;
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        
        $uploadDirectory = 'uploads/images/';
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        if ($file["error"] === UPLOAD_ERR_OK) {
            $fileType = $file["type"];

            if (!inArray($fileType, $allowedTypes)) {
                echo "Invalid file type. Allowed types: JPEG, PNG, GIF.";
                return false;
            }

            if ($file["size"] > $maxFileSize) {
                echo "File size exceeds the maximum allowd size (2 MB).";
                return false;
            }

            $targetFileName = $uploadDirectory . uniqid() . "_" . basename($file["name"]);

            if (move_uploaded_file($file["tmp_name"], $targetFileName)) {
                echo "Photo upload successful.";
                return true;
            } else {
                echo "Failed to move the uploaded photo.";
                return false;
            }

        } else {
            echo "Please select a valid photo to upload.";
            return false;
        }
    }

    function inArray($needle, $haystack) {
        foreach ($haystack as $item) {
            if ($item === $needle) {
                return true;
            }
        }
        return false;
    }
?>