<?php

session_start();

if(!isset($_COOKIE['current_quote'])) {
    setcookie('current_quote', '1', time() + (86400 * 30), "/");
    $current_quote = '1';
} else {
    $current_quote = $_COOKIE['current_quote'];
}


if(!in_array($current_quote, ['1','2','3','4','5'])) {
    $current_quote = '1';
}


$quote_file = "./quotes/quote" . $current_quote . ".php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amba Squad Daily Quotes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-purple-500 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl max-w-md w-full mx-4">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Amba Squad Quotes</h1>
        <?php include($quote_file); ?>
    </div>
</body>
</html>
