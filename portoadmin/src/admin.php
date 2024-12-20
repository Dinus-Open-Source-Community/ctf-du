<?php
include 'config.php';
include 'includes/db.php';

$isAdmin = isset($_GET['admin']) ? $_GET['admin'] : 'false';

if($isAdmin !== 'true') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - CyberSec Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gray-800 p-6 rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Admin Panel</h1>
            <div class="bg-green-800 p-4 rounded mb-4">
                <p class="font-mono">Congratulations! Here's your flag: <?php echo FLAG; ?></p>
            </div>
            <a href="index.php" class="text-blue-400 hover:text-blue-300">← Back to Portfolio</a>
        </div>
    </div>
</body>
</html>
