<?php
$host = 'localhost';  // Ganti 'localhost' dengan host database Anda
$db = 'students';  // Ganti 'nama_database_anda' dengan nama database Anda
$user = 'root';  // Ganti 'nama_pengguna_anda' dengan nama pengguna database Anda
$pass = '';  // Ganti 'kata_sandi_anda' dengan kata sandi database Anda

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Connection Error: ' . $mysqli->connect_error);
}

$mysqli->select_db($db);

// Create table if not exists
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    name VARCHAR(255),
    role VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
)";
$mysqli->query($query);

// Handle operasi CRUD
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Baca data
    $result = $mysqli->query("SELECT * FROM users");
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Username</th><th>Name</th><th>Role</th><th>Email</th><th>Password</th><th>Aksi</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['role']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['password']}</td>";
            echo "<td>";
            echo "<button class='update-btn' data-id='{$row['id']}'>Update</button>";
            echo "<button class='delete-btn' data-id='{$row['id']}'>Delete</button>";
            echo "</td>";
            echo "</tr>";

            // Formulir Pengeditan
            echo "<tr class='edit-form-row' id='edit-form-row-{$row['id']}' style='display:none;'>";
            echo "<td colspan='6'>";
            echo "<form class='edit-form' data-id='{$row['id']}'>";
            echo "<label for='edit_id'>ID:</label>";
            echo "<input type='text' name='edit_id' value='{$row['id']}' readonly>";
            echo "<label for='edit_username'>Username:</label>";
            echo "<input type='text' name='edit_username' value='{$row['username']}' required>";
            echo "<label for='edit_name'>Name:</label>";
            echo "<input type='text' name='edit_name' value='{$row['name']}' required>";
            echo "<label for='edit_role'>Role:</label>";
            echo "<input type='text' name='edit_role' value='{$row['role']}' required>";
            echo "<label for='edit_email'>Email:</label>";
            echo "<input type='text' name='edit_email' value='{$row['email']}' required>";
            echo "<label for='edit_password'>Password:</label>";
            echo "<input type='text' name='edit_password' value='{$row['password']}' required>";
            echo "<button type='submit'>Simpan</button>";
            echo "<button type='button' class='cancel-btn' data-id='{$row['id']}'>Batal</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data.";
    }
}

// Handle operasi DELETE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = $_POST['id'];

    // Lakukan penghapusan data dari database
    $deleteQuery = "DELETE FROM users WHERE id = $id";

    if ($mysqli->query($deleteQuery)) {
        // Tidak perlu memberikan respons ke klien jika data berhasil dihapus
        // echo json_encode(['status' => 'success']);
    } else {
        // Tidak perlu memberikan respons ke klien jika ada kesalahan
        // echo json_encode(['status' => 'error', 'message' => $mysqli->error]);
    }
}

// Handle operasi UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    // Update data
    $updateId = $_POST['update_id'];
    $editUsername = $_POST['edit_username'];
    $editName = $_POST['edit_name'];
    $editRole = $_POST['edit_role'];
    $editEmail = $_POST['edit_email'];
    $editPassword = $_POST['edit_password'];

    $updateQuery = "UPDATE users SET 
        username = '$editUsername',
        name = '$editName',
        role = '$editRole',
        email = '$editEmail',
        password = '$editPassword'
        WHERE id = $updateId";

    if ($mysqli->query($updateQuery)) {
        $result = $mysqli->query("SELECT * FROM users WHERE id = $updateId");
        $updatedData = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'data' => $updatedData]);
    } else {
        echo json_encode(['status' => 'error', 'message' => $mysqli->error]);
    }
}
?>
