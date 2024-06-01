<?php
// process_login.php

// Mulai sesi (jika belum dimulai)
session_start();

// Hubungkan ke database
include("connect.php"); // Pastikan file connect.php sudah ada dan berisi konfigurasi koneksi ke database

header('Content-Type: application/json'); // Set header untuk menandakan respons JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Query untuk mencari pengguna dengan username tertentu
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Bind hasil query ke variabel
    $stmt->bind_result($user_id, $user_username, $user_password);
    $stmt->fetch();

    // Jangan melakukan hashing pada password saat login
    if ($stmt->num_rows > 0 && $password === $user_password) {
        // Jika cocok, set variabel sesi dan arahkan ke halaman admin
        $_SESSION["user_id"] = $user_id;
        $_SESSION["username"] = $user_username;

        // Buat respons JSON
        $response = array("status" => "success", "message" => "Login successful");
        echo json_encode($response);
        exit();
    } else {
        // Buat respons JSON
        $response = array("status" => "error", "message" => "Login failed. Please check your username and password.");
        echo json_encode($response);
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
