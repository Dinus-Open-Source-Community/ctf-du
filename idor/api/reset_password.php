<?php
header('Content-Type: application/json');
include '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['token']) || !isset($data['new_password'])) {
        echo json_encode(['error' => 'Invalid input.']);
        exit();
    }

    $token = $data['token'];
    $new_password = $data['new_password'];

    $query = $conn->prepare("SELECT id FROM users WHERE reset_token = ?");
    $query->bind_param("s", $token);
    $query->execute();
    $query->bind_result($user_id);
    $query->fetch();
    $query->close();

    if ($user_id) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $update = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE id = ?");
        $update->bind_param("si", $hashed_password, $user_id);
        $update->execute();
        $update->close();

        echo json_encode(['success' => 'Password updated successfully!']);
    } else {
        echo json_encode(['error' => 'Invalid token.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}


?>
