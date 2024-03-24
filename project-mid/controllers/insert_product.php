<?php
    session_start();

    require_once '../models/validation_model.php';
    require_once '../models/product_model.php';

    $name = $email = $headline = $username = $password = $confirmPassword = $org = $role = $gender = $dob = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = custom_trim($_POST['name']);
        $headline = custom_trim($_POST['headline']);
        $description = custom_trim($_POST['description']);
        $url = custom_trim($_POST['url']);
        $image = $_FILES['image'] ?? null;
        $launchDate = custom_trim($_POST['launch_date']);
        $publishedBy = custom_trim($_POST['publishedBy']);

        if (empty($name) || empty($headline) || empty($description) || empty($url) || empty($image) || empty($launchDate) || empty($publishedBy)) {
            die("Require all the fields.");
        }
        
        $product = [
            'name'=> $name,
            'headline'=> $headline,
            'description'=> $description,
            'url'=> $url,
            'img'=> ' ',
            'launch_date'=> $launchDate,
            'published_by'=> $publishedBy,
        ];

        $profilePicture = $_FILES["profile-picture"] ?? null;

        if ($profilePicture && $profilePicture["error"] === UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png'];
            $maxFileSize = 2 * 1024 * 1024; 

            $fileType = $profilePicture["type"];
            $fileSize = $profilePicture["size"];

            if (!inArray($fileType, $allowedTypes)) {
                echo "Invalid file type, Allowed JPEG, PNG only";
            } elseif ($fileSize > $maxaFileSize) {
                echo "File size exceeds the maximum allowed size (2 MB).";
            } else {
                $uploadDirectory = '../uploads/images/products';
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0755, true);
                }

                $targetFileName = $uploadDirectory . $_SESSION['opencrowd_cur_session'] . '.' . (($fileType == 'image/jpeg') ? 'jpg' : 'png');

                if (move_uploaded_file($profilePicture["tmp_name"], $targetFileName)) {
                    echo "Product image uploaded successfully !";
                    $product['img'] = $targetFileName;
                } else {
                    echo "Failed to move the uploaded photo.";
                }
            }
        } else {
            echo "Please select a valid product photo to upload.";
        }

        if (!addProduct($product)) {
            header('location: ../views/error.php?err=Error(insert product): insert product failed');
            exit();
        } else {
            header('location: ../views/products.php');
        }
    }
?>