<?php
include 'conn.php';
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
    <title>Reset Password</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Reset Your Password</h2>
    <form id="resetPasswordForm">
        <div class="mb-3">
            <label for="token" class="form-label">Reset Token:</label>
            <input type="text" name="token" id="token" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password:</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
    <div id="response" class="mt-3"></div>
</div>
<script>
document.getElementById('resetPasswordForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const token = document.getElementById('token').value;
    const newPassword = document.getElementById('new_password').value;

    try {
        const response = await fetch('api/reset_password.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ token, new_password: newPassword })
        });

        const data = await response.json();

        if (response.ok) {
            if (data.success) {
                document.getElementById('response').innerHTML = `
                    <div class="alert alert-success">${data.success}</div>
                `;
            } else {
                document.getElementById('response').innerHTML = `
                    <div class="alert alert-danger">${data.error}</div>
                `;
            }
        } else {
            document.getElementById('response').innerHTML = `
                <div class="alert alert-danger">An error occurred: ${response.status}</div>
            `;
        }
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('response').innerHTML = `
            <div class="alert alert-danger">An unexpected error occurred.</div>
        `;
    }
});

</script>
</body>
</html>
