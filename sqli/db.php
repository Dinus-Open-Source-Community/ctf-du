<?php

$host = 'localhost';
$dbname = 'ctfheker';
$db_username = 'x0r';
$db_password = 'SuckOnThisNUT';
$conn = new mysqli($host, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// DCTF{5o_far_3Z_Right}
?>

