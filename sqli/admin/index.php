<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: admin/admin.php");
    exit;
} else {
    header("Location: ../login.php");
    exit;
}
?>
