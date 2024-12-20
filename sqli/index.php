<?php
// index.php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: admin/admin.php"); // Redirect to admin page if already logged in
    exit;
} else {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}
?>
