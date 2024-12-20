<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Password Reset</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Request Password Reset</h2>
    <form id="requestResetForm">
        <div class="mb-3">
            <label for="email" class="form-label">Enter your email:</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Request Reset</button>
    </form>
    <div id="response" class="mt-3"></div>
</div>
<script>
document.getElementById('requestResetForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;

    const response = await fetch('api/request_reset.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email })
    });
    alert('token was send in email');
});
</script>
</body>
</html>
