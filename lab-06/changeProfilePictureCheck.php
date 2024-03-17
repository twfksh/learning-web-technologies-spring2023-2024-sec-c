<?php
    session_start();

    $profilePicture = $_FILES["profile-picture"] ?? null;

    if ($profilePicture && $profilePicture["error"] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxFileSize = 2 * 1024 * 1024; 

        $fileType = $profilePicture["type"];
        $fileSize = $profilePicture["size"];

        if (!inArray($fileType, $allowedTypes)) {
            echo "Invalid file type, Allowed JPEG, PNG only";
        } elseif ($fileSize > $maxFileSize) {
            echo "File size exceeds the maximum allowed size (2 MB).";
        } else {
            $uploadDirectory = 'uploads/images/';
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $targetFileName = $uploadDirectory . $_SESSION['user']['username'] . '.' . (($fileType == 'image/jpeg') ? 'jpg' : 'png');

            if (move_uploaded_file($profilePicture["tmp_name"], $targetFileName)) {
                echo "Picture uploaded successfully!";
            } else {
                echo "Failed to move the uploaded photo.";
            }
        }
    } else {
        echo "Please select a valid photo to upload.";
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
