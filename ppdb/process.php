<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/REV_1/styles/style.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        h1 {
            color: #7e74f1;
        }

        table {
            width: 50%;
            margin-top: 20px;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #7e74f1;
            color: #fff;
        }
    </style>
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
                        <li><a href="/REV_1/index.php#event" onclick="goToSection('/REV_1/index.php', 'event')">Agenda</a></li>
                        <li><a href="/REV_1/#about">Tentang</a></li>
                        <li><a href="/REV_1/ppdb/daftar.php" target="_blank">PPDB</a></li>
                        <li><button class="btn"><a href="/REV_1/login/login.php">Masuk</a></button></li>
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

    <?php
    include 'conn.php';

    if (isset($_POST['submit'])) {
        $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
        $nisn = mysqli_real_escape_string($conn, $_POST['nisn']);
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $asal_sekolah = mysqli_real_escape_string($conn, $_POST['asal_sekolah']);
        $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
        $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
        $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);

        $stmt = $conn->prepare("INSERT INTO students (`jurusan`, `nisn`, `nama`, `asal_sekolah`, `no_hp`, `tempat_lahir`, `tanggal_lahir`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $jurusan, $nisn, $nama, $asal_sekolah, $no_hp, $tempat_lahir, $tanggal_lahir);
        $execval = $stmt->execute();

        if ($execval) {
            echo "<h1>Registration successfully...</h1>";

            // Display the submitted data in a table
            echo "<table border='1'>";
            echo "<tr><th>Nama</th><th>NISN</th></tr>";
            echo "<tr><td>$nama</td><td>$nisn</td></tr>";
            echo "</table>";

            echo "<p>Anda akan dihubungi melalui nomor telepon sms dan WhatsApp.</p>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
