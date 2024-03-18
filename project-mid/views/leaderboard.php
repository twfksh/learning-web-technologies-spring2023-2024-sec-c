<?php
    session_start();

    if (!isset($_SESSION['products'])) {
        $products = [
            [
                'name'=> 'SwiftShip',
                'headline'=> 'Build and ship your iOS app in a few days or hours',
                'description'=> 'A Swift UI Boilerplate that takes care of features commonly needed in mobile apps, and lets you save time and focus on your value proposition and main features. Save hours of development and ship your iOS app in a few days.',
                'url'=> 'https://swiftship.dev/',
                'img'=> '../assets/images/products/swiftship.png',
                'votes'=> 0
            ],
            [
                'name'=> 'Tailor',
                'headline'=> 'Supercharge your news with AI',
                'description'=> 'Supercharge your news understanding with Tailor! Tailor uses A.I. to summarize, fact-check, and link thousands of articles, podcasts, and YouTube videos. Get digestible, unbiased news stories and podcasts created just for you!',
                'url'=> 'https://tailor.news/',
                'img'=> '../assets/images/products/tailor.png',
                'votes'=> 0
            ],
            [
                'name'=> 'LeetCard: AI-powered FlashCards',
                'headline'=> 'Secure your dream job',
                'description'=> 'LeetCard is a mobile app designed to enhance problem-solving skills and excel in interviews,featuring AI-powered hints, personalized study plans, and streamlined organization to maximize learningefficiency and effectiveness.',
                'url'=> 'https://apps.apple.com/us/app/leetcard-ai-powered-flashcard/id6478087443',
                'img'=> '../assets/images/products/leetcard.png',
                'votes'=> 0
            ]
        ];

        $_SESSION['products'] = $products;
    }

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
                            <img src="<?= $product['img'] ?>" alt="<?= $product['name'] ?>" style="width: 150px; height: 120px; object-fit: cover;">
                        </td>
                        <td style="padding-left: 10px;">
                            <a href="#"><?= $product['name'] ?></a><br>
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
