<?php
$host = "localhost";
$user = "riae4859_riangg";
$pass = "riang123456789";
$db   = "riae4859_riang";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
