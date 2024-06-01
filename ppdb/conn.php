<?php
$servername = "localhost"; // Ganti sesuai dengan nama server Anda
$username = "root"; // Ganti sesuai dengan username database Anda
$password = ""; // Ganti sesuai dengan password database Anda
$dbname = "students"; // Ganti sesuai dengan nama database Anda

// Tambahkan baris berikut untuk error handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    // Tangani kesalahan koneksi
    die("Connection failed: " . $e->getMessage());
}
?>
