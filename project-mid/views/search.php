<?php
    session_start();

    include_once '../controllers/initialize.php';
    require_once '../models/validation_model.php';

    if (isset($_GET['query']) && !empty($_GET['query'])) {
        $query = $_GET['query'];
        $filtered_products = arrayFilter($_SESSION['products'], function($product) use ($query) {
            return stripos($product['name'], $query) !== false || stripos($product['publishedBy'], $query) !== false || stripos($product['description'], $query) !== false;
        });
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | OpenCrowd</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once('navbar.php'); ?>
    
    <div style="margin: auto; width: 50%;">
        <table>
            <tbody>
                <?php foreach ($filtered_products as $index => $product) { ?>
                    <tr>
                        <td>
                            <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>" style="width: 180px; height: 130px; object-fit: cover;">
                        </td>
                        <td style="padding-left: 10px;">
                            <a href="product_view.php?index=<?=$index?>"><?= $product['name'] ?></a><br>
                            <p>[Launch Date: <?= $product['launch_date'] ?>] [Published By: <?= $product['publishedBy'] ?>]</p>
                            <p><?= $product['description'] ?></p>
                        </div>
                        </td>
                        <td>
                            <b>Votes-<?= $product['votes'] ?></b>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
