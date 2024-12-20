<?php
// admin/admin.php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $disallowedExtensions = array("php", "php3", "php4", "php5", "exe", "bat");

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 50000) { // 50 KB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if (in_array($fileType, $disallowedExtensions)) {
        echo "Sorry, files with the extension '$fileType' are not allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 20px 0;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .upload-info {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>This is the admin page.</p>
        <a href="../logout.php">Logout</a>

        <div class="upload-info">
            <h3>Upload File</h3>
            <form action="admin.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" required>
                <button type="submit">Upload File</button>
            </form>
        </div>
    </div>
</body>
</html>
