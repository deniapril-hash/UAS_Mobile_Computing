<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = mysqli_connect(
    "localhost",
    "riae4859_riangg",
    "riang123456789",
    "riae4859_riang"
);

if (!$conn) {
    echo json_encode(["success" => false, "message" => "DB error"]);
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$query = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE email='$email' AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {
    echo json_encode([
        "success" => true,
        "name" => $data['name']
    ]);
} else {
    echo json_encode([
        "success" => false
    ]);
}
