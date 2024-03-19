<?php
    session_start();

    include_once '../controllers/initialize.php';

    usort($_SESSION['products'], function($a, $b) {
        return $b['votes'] <=> $a['votes'];
    });
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Leaderboard | OpenCrowd</title>
</head>
<body>
    <?php include_once('navbar.php'); ?>
    
    <div style="margin: auto; width: 50%;">
        <table>
            <tbody>
                <?php foreach ($_SESSION['products'] as $index => $product) { ?>
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
