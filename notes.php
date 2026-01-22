<?php
// === BAGIAN INI WAJIB ADA DI PALING ATAS ===
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Tangani Request "OPTIONS" (Pre-flight check dari browser)
// Browser biasanya "tanya dulu" sebelum kirim data, kalau tidak dijawab 200 OK, dia akan error "Failed to fetch"
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
// ============================================

header("Content-Type: application/json; charset=UTF-8");

// Pastikan file koneksi kamu benar
include 'koneksi.php'; 

// Cek method request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Method harus POST"]);
    exit();
}

// Ambil data JSON (Flutter kadang mengirim sebagai Raw Body, bukan Form Data biasa)
// Kita coba ambil dua cara agar aman
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';

// Jika kosong, coba ambil dari php://input (raw json) - Jaga-jaga
if (empty($title) && empty($description)) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if ($data) {
        $title = $data['title'] ?? '';
        $description = $data['description'] ?? '';
    }
}

// Validasi
if (empty($title) || empty($description)) {
    echo json_encode(["status" => "error", "message" => "Judul dan Deskripsi wajib diisi"]);
    exit();
}

// Escape string untuk keamanan SQL
$title = mysqli_real_escape_string($conn, $title);
$description = mysqli_real_escape_string($conn, $description);

// Query Insert
$sql = "INSERT INTO notes (title, content) VALUES ('$title', '$description')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status" => "success", "message" => "Berhasil disimpan"]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal Query: " . mysqli_error($conn)]);
}
?>