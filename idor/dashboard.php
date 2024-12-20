<?php
include 'conn.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Welcome to the Dashboard, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Have a nice day!</p>
    <?php if ($username === 'admin'): ?>
        <div class="alert alert-success">
            <strong>Flag:</strong> DCTF{4Cc0unT_t4k3_0ver_goees_brrrrrrrrrr}
        </div>
    <?php elseif ($username != 'admin'):?>
        <div class="alert alert-success">
            <strong>Flag:</strong> DCTF{fake_or_real??}
        </div>
    <?php endif; ?>

    <ul>
        <li><a href="reset_request.php">Request Reset Password</a></li>
        <li><a href="reset_password.php">Reset Password</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
</body>
</html>
