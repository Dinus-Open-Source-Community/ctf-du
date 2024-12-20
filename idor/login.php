<?php
include 'conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $query->bind_result($user_id, $hashed_password);
    $query->fetch();
    $query->close();

    if ($user_id && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Login</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    <li><a href="register.php">Register</a></li>
    </form>
</div>
</body>
</html>
