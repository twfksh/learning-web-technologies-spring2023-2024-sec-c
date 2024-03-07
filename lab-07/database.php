<?php

$dbCred = [
    "host"=> "localhost",
    "user"=> "root",
    "password"=> "",
    "name"=> "product_db",
    "port"=> "3306"
];

function getDatabaseConnection() {
    $dbCred = $GLOBALS['dbCred'];

    $conn = mysqli_connect(
        $dbCred['host'], 
        $dbCred['user'], 
        $dbCred['password'], 
        $dbCred['name'], 
        $dbCred['port']
    );

    if (!$conn) return null;
    return $conn;
}

function addProduct($product) {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO products (product_name, buying_price, selling_price) VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt, 
        "sdd", 
        $product['product_name'], 
        $product['buying_price'], 
        $product['selling_price'] 
    );

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $result;
}

function fetchProducts() {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return null;
    }

    $result = mysqli_query($conn, "SELECT * FROM products");
    if (!$result) {
        return null;
    }

    $products = [];
    while ($product = mysqli_fetch_assoc($result)) $products[] = $product;

    mysqli_free_result($result);
    mysqli_close($conn);

    return $products;
}

function editProductInfo($product) {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE users SET product_name = ?, buying_price = ?, selling_price = ? WHERE product_name = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sdd",
        $product['product_name'], 
        $product['buying_price'], 
        $product['selling_price']
    );

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $result;
}

function deleteProduct($product_name) {
    $conn = getDatabaseConnection();
    if (!$conn) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM products WHERE product_name = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $product['product_name']);
    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $result;
}
