<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connect.php");

    $action = $_POST["action"];

    if ($action == "register") {
        $newUsername = htmlspecialchars($_POST["newUsername"]);
        $newName = htmlspecialchars($_POST["newName"]);
        $newRole = htmlspecialchars($_POST["newRole"]);
        $newEmail = htmlspecialchars($_POST["newEmail"]);
        $newPassword = htmlspecialchars($_POST["newPassword"]);

        // Tidak di-hash kata sandi
        $hashedPassword = $newPassword;

        // Using prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (username, name, role, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $newUsername, $newName, $newRole, $newEmail, $hashedPassword);

        if ($stmt->execute()) {
            // Registrasi berhasil, tidak perlu memberikan respons pada klien
        } else {
            // Registrasi gagal, memberikan pesan kesalahan yang umum
            echo "Registration failed. Please try again later.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
