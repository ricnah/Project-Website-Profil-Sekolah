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
$query = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jurusan VARCHAR(255),
    nisn VARCHAR(20),
    nama VARCHAR(255),
    asal_sekolah VARCHAR(255),
    no_hp VARCHAR(20),
    tempat_lahir VARCHAR(255),
    tanggal_lahir DATE
)";
$mysqli->query($query);

// Handle operasi CRUD
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Baca data
    $result = $mysqli->query("SELECT * FROM students");
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Jurusan</th><th>NISN</th><th>Nama</th><th>Asal Sekolah</th><th>No HP</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Aksi</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['jurusan']}</td>";
            echo "<td>{$row['nisn']}</td>";
            echo "<td>{$row['nama']}</td>";
            echo "<td>{$row['asal_sekolah']}</td>";
            echo "<td>{$row['no_hp']}</td>";
            echo "<td>{$row['tempat_lahir']}</td>";
            echo "<td>{$row['tanggal_lahir']}</td>";
            echo "<td>";
            echo "<button class='update-btn' data-id='{$row['id']}'>Update</button>";
            echo "<button class='delete-btn' data-id='{$row['id']}'>Delete</button>";
            echo "</td>";
            echo "</tr>";
            
// Formulir Pengeditan
echo "<tr class='edit-form-row' id='edit-form-row-{$row['id']}' style='display:none;'>";
echo "<td colspan='8'>";
echo "<form class='edit-form' data-id='{$row['id']}'>";
echo "<label for='edit_id'>:</label>";
echo "<input type='text' name='edit_id' value='{$row['id']}' readonly>";
echo "<label for='edit_jurusan'>:</label>";
echo "<input type='text' name='edit_jurusan' value='{$row['jurusan']}' required>";
echo "<label for='edit_nisn'>:</label>";
echo "<input type='text' name='edit_nisn' value='{$row['nisn']}' required>";
echo "<label for='edit_nama'>:</label>";
echo "<input type='text' name='edit_nama' value='{$row['nama']}' required>";
echo "<label for='edit_asal_sekolah'>:</label>";
echo "<input type='text' name='edit_asal_sekolah' value='{$row['asal_sekolah']}' required>";
echo "<label for='edit_no_hp'>:</label>";
echo "<input type='text' name='edit_no_hp' value='{$row['no_hp']}' required>";
echo "<label for='edit_tempat_lahir'>:</label>";
echo "<input type='text' name='edit_tempat_lahir' value='{$row['tempat_lahir']}' required>";
echo "<label for='edit_tanggal_lahir'>:</label>";
echo "<input type='date' name='edit_tanggal_lahir' value='{$row['tanggal_lahir']}' required>";
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
    $deleteQuery = "DELETE FROM students WHERE id = $id";

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
    $editJurusan = $_POST['edit_jurusan'];
    $editNISN = $_POST['edit_nisn'];
    $editNama = $_POST['edit_nama'];
    $editAsalSekolah = $_POST['edit_asal_sekolah'];
    $editNoHP = $_POST['edit_no_hp'];
    $editTempatLahir = $_POST['edit_tempat_lahir'];
    $editTanggalLahir = $_POST['edit_tanggal_lahir'];

    $updateQuery = "UPDATE students SET 
        jurusan = '$editJurusan',
        nisn = '$editNISN',
        nama = '$editNama',
        asal_sekolah = '$editAsalSekolah',
        no_hp = '$editNoHP',
        tempat_lahir = '$editTempatLahir',
        tanggal_lahir = '$editTanggalLahir'
        WHERE id = $updateId";

if ($mysqli->query($updateQuery)) {
    $result = $mysqli->query("SELECT * FROM students WHERE id = $updateId");
    $updatedData = $result->fetch_assoc();
    echo json_encode(['status' => 'success', 'data' => $updatedData]);
} else {
    echo json_encode(['status' => 'error', 'message' => $mysqli->error]);
}


}