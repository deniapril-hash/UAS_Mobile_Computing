<?php
// get_notes.php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'koneksi.php';

// Query mengambil semua data, diurutkan dari yang terbaru (ID DESC)
$sql = "SELECT * FROM notes ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$data = array();

if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // Kirim data dalam format JSON
    echo json_encode($data);
} else {
    echo json_encode([]);
}
?>