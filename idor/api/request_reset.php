<?php
header('Content-Type: application/json');
include '../conn.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Unauthorized.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['email'])) {
        echo json_encode(['error' => 'Invalid input.']);
        exit();
    }

    $email = $data['email'];

    $query = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $query->bind_result($user_id);
    $query->fetch();
    $query->close();

    if ($user_id) {
        $token = bin2hex(random_bytes(16));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $update = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE id = ?");
        $update->bind_param("ssi", $token, $expiry, $user_id);
        $update->execute();
        $update->close();

        echo json_encode([
            'success' => 'Token generated successfully.',
            'token' => $token,
            'info' => 'Use this token to reset your password.'
        ]);
    } else {
        echo json_encode(['error' => 'Email not found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
