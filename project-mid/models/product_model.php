<?php
    require_once 'database_model.php';
    require_once '../utils/validation.php';

    function getAllProduct() {
        $conn = getDatabaseConnection();
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }

    function addProduct($product) {
        $conn = getDatabaseConnection();

        foreach ($product as $key => $value) {
            $newValue = validateTextData($value);
            $post[$key] = $newValue;
        }

        $sql = "INSERT INTO (name, headline, description, url, img, votes, launch_date) VALUES ('{$product['name']}', '{$product['headline']}', '{$product['description']}', '{$product['url']}', '{$product['img']}', '{$product['votes']}', '{$product['launch_date']}', '{$product['published_by']}')";

        if (mysqli_query($conn, $sql)) {
            return true;
        }
        return false;
    }

    function updateProduct($product) {
        $conn = getDatabaseConnection();

        foreach ($product as $key => $value) {
            $newValue = validateTextData($value);
            $post[$key] = $newValue;
        }

        $sql = "UPDATE products SET name = '{$product['name']}', headline = '{$product['headline']}', description = '{$product['description']}', url = '{$product['url']}', img = '{$product['img']}', votes = '{$product['votes']}', launch_date = '{$product['launch_date']}', '{$product['published_by']}'";
        if (mysqli_query($conn, $sql)) {
            return true;
        }
        return false;
    }

    function deleteProduct($product_name) {
        $conn = getDatabaseConnection();
        $sql = "DELETE FROM products WHERE name = '{$product_name}'";
        if (mysqli_query($conn, $sql)) {
            return true;
        }
        return false;
    }
?>
