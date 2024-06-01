<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="/REV_1/styles/style.css">
</head>

<body>
    <header>
        <div class="main-container">
          <div class="nav">
            <div class="logo">
              <a href="/REV_1/#hero">SDAMADA</a>
            </div>
    
            <nav>
              <ul>
                <li><a href="/REV_1/index.php">Beranda</a></li>
                <li><a href="/REV_1/index.php#information">Informasi</a></li>
                <li><a href="/REV_1/index.php#event"
                    onclick="goToSection('/REV_1/index.php', 'event')">Agenda</a></li>
                <li><a href="/REV_1/#about">Tentang</a></li>
                <li><a href="/REV_1/ppdb/daftar.php" target="_blank">PPDB</a></li>
                <button class="btn">
                  <li><a href="/REV_1/login/login.php">Masuk</a></li>
                </button>
              </ul>
            </nav>
    
            <div class="burger">
              <div class="line-1"></div>
              <div class="line-2"></div>
              <div class="line-3"></div>
            </div>
          </div>
        </div>
      </header>

    <div class="container">
    <div id="content-container">
        <h1 class="daftar-container">Form Pendaftaran</h1>

        <?php
        include 'conn.php';

        if (isset($_POST['submit'])) {
            // ... (proses penyimpanan data)

            // Tambahkan query SELECT untuk mendapatkan data yang baru saja disubmit
            $selectQuery = "SELECT * FROM table_name ORDER BY id DESC LIMIT 1"; // Gantilah 'your_actual_table_name' dengan nama tabel yang benar
            $result = mysqli_query($conn, $selectQuery);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Tampilkan data di dalam HTML
                echo "<li>Jurusan: " . htmlspecialchars($row['jurusan']) . "</li>";
                echo "<li>NISN: " . htmlspecialchars($row['nisn']) . "</li>";
                echo "<li>Nama: " . htmlspecialchars($row['nama']) . "</li>";
                echo "<li>Asal Sekolah: " . htmlspecialchars($row['asal_sekolah']) . "</li>";
                echo "<li>Nomor HP: " . htmlspecialchars($row['no_hp']) . "</li>";
                echo "<li>Tempat Lahir: " . htmlspecialchars($row['tempat_lahir']) . "</li>";
                echo "<li>Tanggal Lahir: " . htmlspecialchars($row['tanggal_lahir']) . "</li>";
                // ... (lanjutkan untuk setiap kolom)
                echo "</ul>";
            } else {
                echo "Tidak dapat mengambil data dari database.";
            }
        }
        ?>

<form id="registrationForm" action="process.php" method="post">
<label for="jurusan">Jurusan:</label>
<select name="jurusan" id="jurusan" required>
    <option value="siswa_baru" <?php echo (isset($row['jurusan']) && $row['jurusan'] === 'siswa_baru') ? 'selected' : ''; ?>>Siswa Baru</option>
    <option value="siswa_pindahan" <?php echo (isset($row['jurusan']) && $row['jurusan'] === 'siswa_pindahan') ? 'selected' : ''; ?>>Siswa Pindahan</option>
</select>

    <label for="nisn">NISN:</label>
    <input type="number" name="nisn" id="nisn" required pattern="[0-9]*" value="<?php echo isset($row['nisn']) ? htmlspecialchars($row['nisn']) : ''; ?>">

    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required value="<?php echo isset($row['nama']) ? htmlspecialchars($row['nama']) : ''; ?>">

    <label for="asal_sekolah">Asal Sekolah:</label>
    <input type="text" name="asal_sekolah" id="asal_sekolah" required value="<?php echo isset($row['asal_sekolah']) ? htmlspecialchars($row['asal_sekolah']) : ''; ?>">

    <label for="no_hp">Nomor HP:</label>
    <input type="number" name="no_hp" id="no_hp" required value="<?php echo isset($row['no_hp']) ? htmlspecialchars($row['no_hp']) : ''; ?>">

    <label for="tempat_lahir">Tempat Lahir:</label>
    <input type="text" name="tempat_lahir" id="tempat_lahir" required value="<?php echo isset($row['tempat_lahir']) ? htmlspecialchars($row['tempat_lahir']) : ''; ?>">

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required value="<?php echo isset($row['tanggal_lahir']) ? htmlspecialchars($row['tanggal_lahir']) : ''; ?>">

    <button type="submit" name="submit">Submit</button>
</form>

    </div>


    <footer style="text-align: center; font-weight: bold">
        <p style="color: #7e74f1; animation: blink 1s infinite">Created by Ricki</p>
      </footer>
    
      <style>
        @keyframes blink {
          50% {
            opacity: 0;
          }
        }
      </style>

    <script src="/REV_1/script/main.js"></script>
</body>

</html>
