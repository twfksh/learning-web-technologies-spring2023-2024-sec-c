<?php
    session_start();

    include_once '../controllers/initialize.php';

    if (isset($_GET['username'])) {
        $filteredUsername = $_GET['username'];  
        $filteredProducts = [];
        foreach ($_SESSION['products'] as $product) {
            if (isset($product['publishedBy']) && $product['publishedBy'] === $filteredUsername) {
                $filteredProducts[] = $product;
            }
        }
        $products = $filteredProducts;
    } else {
        $products = $_SESSION['products'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upvote'])) {
        $index = $_POST['index'];
        if (isset($_SESSION['products'][$index])) {
            $_SESSION['products'][$index]['votes']++;
            header('location: ' . $_SERVER['REQUEST_URI']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | OpenCrowd</title>
</head>
<body>
    <?php include_once('navbar.php'); ?>
    
    <div style="margin: auto; width: 50%;">
        <table>
            <tbody>
                <?php foreach ($products as $index => $product) { ?>
                    <tr>
                        <td>
                            <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>" style="width: 180px; height: 130px; object-fit: cover;">
                        </td>
                        <td style="padding-left: 10px;">
                            <a href="product_view.php?index=<?=$index?>"><?= $product['name'] ?></a><br>
                            <p>[Launch Date: <?= $product['launch_date'] ?>] [Published By: <?= $product['publishedBy'] ?>]</p>
                            <p><?= $product['description'] ?></p>
                        </td>
                        <td>
                            <div>
                                <form method="post" action="">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <button type="submit" name="upvote">👍🏼 <?=$product['votes']?></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>