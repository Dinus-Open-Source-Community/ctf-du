<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music World - Your Favorite Songs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>🎵 Music World 🎵</h1>
            <nav>
                <ul>
                    <li><a href="?page=pages/pop">Pop</a></li>
                    <li><a href="?page=pages/rock">Rock</a></li>
                    <li><a href="?page=pages/jazz">Jazz</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            if(isset($_GET['page'])) {
                include($_GET['page'] . '.php');
            } else {
                echo '<div class="welcome">
                    <h2>Welcome to Music World!</h2>
                    <p>Discover your favorite songs across different genres.</p>
                </div>';
            }
            ?>
        </main>
        <footer>
            <p>&copy; 2024 Music World</p>
        </footer>
    </div>
</body>
</html>
