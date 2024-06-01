<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/REV_1/styles/style.css" />
  <title>PPDB - SDAMADA</title>
</head>

<body>
  <!-- Nav -->
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
  <!-- End Nav -->
  <!-- Hero -->

  <div class="p-hero">
    <h1 class="ppdb-hero">DIBUKA PENDAFTARAN PESERTA DIDIK BARU SDAMADA 2024-2025</h1>
    <p>
      SD Muhammadiyah 2 Sidoarjo membuka pendaftaran penerimaan peserta didik baru tahun ajaran 2024/2025. Pendaftaran
      dibuka mulai 17/09/23 , kuota terbatas dan ditutup ketika pagu telah terpenuhi.
    </p>
    <br />
    <!-- Poster -->
    <img
      src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgImlPtFf0vjKsFnpVTstsQ8HNjqHjhOV8f2Ncq8_sLr-jmTbW5yU5aAG9yVxjhuubmroh_J0WdA0eh1wDXNxumLbDDCDr8iOib32WY5HC85eo498ITY_ShUwM8-vCJUvGTU7su3HWTDFfuwUfKGm2FUUJtFf9sBvCDOZ79t-Oaw0AZZrnhFi0xSYO_6A/s1600/brosur-ppdb-depan.jpg"
      alt="">
    <!-- End Poster -->
    <!-- Pendaftaran -->
    <h2 style="padding: 1rem;">Formulir Pendaftaran</h2>
    <a href="/REV_1/ppdb/daftar.php">
      <button type="button" class="button-formulir">Daftar</button>
    </a>
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
  <!-- End Footer -->
  <script src="/REV_1/script/main.js"></script>
</body>
</body>

</html>