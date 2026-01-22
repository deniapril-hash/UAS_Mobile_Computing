<?php
header("Content-Type: application/json");
// --- TAMBAHKAN 3 BARIS INI DI BAGIAN PALING ATAS ---
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// ---------------------------------------------------

include 'koneksi.php'; // Atau file koneksi kamu

$query = mysqli_query($conn, "SELECT * FROM articles");

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

// PERBAIKAN DISINI:
// Bungkus $data dengan array baru yang memiliki key 'data'
echo json_encode([
    'data' => $data
]);
?>