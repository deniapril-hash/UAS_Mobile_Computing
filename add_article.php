<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Import koneksi database
include 'koneksi.php'; 

// Mengambil data dari body request POST
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$image_url = $_POST['image_url'] ?? '';

if (empty($title) || empty($content)) {
    echo json_encode([
        "success" => false,
        "message" => "Judul dan Konten tidak boleh kosong"
    ]);
    exit;
}

// Query untuk memasukkan data
$stmt = $conn->prepare("INSERT INTO articles (title, content, image_url) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $content, $image_url);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Artikel berhasil ditambahkan"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Gagal menyimpan ke database: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>