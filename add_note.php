<?php
// 1. Izinkan akses dari mana saja (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// 2. Handle Preflight Request (Browser suka ngecek dulu pakai OPTIONS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
include 'koneksi.php'; // Pastikan file koneksi.php kamu sudah benar

// Cek method request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Method harus POST"]);
    exit();
}

// Ambil data dari parameter POST
$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';

// Validasi data tidak boleh kosong
if (empty($title) || empty($description)) {
    echo json_encode(["status" => "error", "message" => "Judul dan Deskripsi wajib diisi"]);
    exit();
}

// Query Insert (Sesuaikan nama tabel dan kolom dengan database kamu)
// Misal tabel: notes, kolom: title, content
$sql = "INSERT INTO notes (title, content) VALUES ('$title', '$description')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status" => "success", "message" => "Berhasil disimpan"]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal Query: " . mysqli_error($conn)]);
}
?>