<?php

require_once './common.php';
require_once './database.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    $product = [
        'product_name'=> custom_trim($_POST['product-name']),
        'buying_price'=> custom_trim($_POST['buying-price']),
        'selling_price'=> custom_trim($_POST['selling-price'])
    ];

    $display = (isset($_POST['display'])) ? true : false;

    if (addProduct($product)) {
        echo "Successfully add the product into the database!";
    } else {
        echo "Failed to add the product!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <form method="post" action="">
        <fieldset>
            <legend>ADD PRODUCT</legend>
            <label for="product-name">Product Name</label> <br>
            <input type="text" name="product-name"> <br>
            <label for="buying-price">Buying Price</label> <br>
            <input type="number" name="buying-price"> <br>
            <label for="selling-price">Selling Price</label> <br>
            <input type="number" name="selling-price"> <br>
            <hr>
            <input type="checkbox" name="display"> Display <br>
            <hr>
            <input type="submit" name="submit" value="Save">

        </fieldset>
    </form>
</body>
</html>