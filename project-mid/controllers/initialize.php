<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['products'])) {
        $products = [
            [
                'name'=> 'SwiftShip',
                'headline'=> 'Build and ship your iOS app in a few days or hours',
                'description'=> 'A Swift UI Boilerplate that takes care of features commonly needed in mobile apps, and lets you save time and focus on your value proposition and main features. Save hours of development and ship your iOS app in a few days.',
                'url'=> 'https://swiftship.dev/',
                'img'=> '../assets/images/products/swiftship.png',
                'votes'=> 0,
                'launch_date'=> '2024-04-10',
                'publishedBy'=> 'toufiq7r'
            ],
            [
                'name'=> 'Tailor',
                'headline'=> 'Supercharge your news with AI',
                'description'=> 'Supercharge your news understanding with Tailor! Tailor uses A.I. to summarize, fact-check, and link thousands of articles, podcasts, and YouTube videos. Get digestible, unbiased news stories and podcasts created just for you!',
                'url'=> 'https://tailor.news/',
                'img'=> '../assets/images/products/tailor.png',
                'votes'=> 0,
                'launch_date'=> '2024-06-04',
                'publishedBy'=> 'toufiq7r'
            ],
            [
                'name'=> 'LeetCard: AI-powered FlashCards',
                'headline'=> 'Secure your dream job',
                'description'=> 'LeetCard is a mobile app designed to enhance problem-solving skills and excel in interviews,featuring AI-powered hints, personalized study plans, and streamlined organization to maximize learningefficiency and effectiveness.',
                'url'=> 'https://apps.apple.com/us/app/leetcard-ai-powered-flashcard/id6478087443',
                'img'=> '../assets/images/products/leetcard.png',
                'votes'=> 0,
                'launch_date'=> '2024-03-20',
                'publishedBy'=> 'mrx'
            ]
        ];

        $_SESSION['products'] = $products;
    }
?>