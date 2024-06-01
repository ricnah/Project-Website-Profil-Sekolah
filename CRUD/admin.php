<?php
// admin.php

// Mulai sesi (jika belum dimulai)
session_start();

// Periksa apakah pengguna belum login
if (!isset($_SESSION["user_id"])) {
    // Redirect ke halaman login
    header("Location: /REV_1/login/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #7e74f1;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Sidebar Styles */
.sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgba(126, 116, 241, 0.5); /* Gunakan nilai alpha yang lebih tinggi */
    backdrop-filter: blur(7px); /* Sesuaikan nilai blur sesuai kebutuhan */
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    color: white;
}

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #302d5f;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #fff;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left 0.5s;
            padding: 16px;
        }

    .openbtn img {
    width: 24px;
    height: 24px;
    border-radius: 5px;
    /* Tambahkan gaya lainnya sesuai kebutuhan */
    }


table {
width: 80%; /* Sesuaikan sesuai kebutuhan */
border-collapse: collapse;
margin-top: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #beb9f8;
    text-align: center; /* Menentukan posisi teks pada kolom (opsional) */
    white-space: nowrap;
}

th {
    background-color: #7e74f1;
    color: #fff;
}

button {
    background-color: #7e74f1;
    color: #fff;
    border: none;
    padding: 8px;
    cursor: pointer;
    width: auto;
}

button:hover {
    background-color: #594bd1;
}

/* Style for delete button */
.delete-btn {
    background-color: #ff4d4d;
    width: auto;
}

.delete-btn:hover {
    background-color: #d43f3f;
}

/* Style for update button */
.update-btn {
    background-color: #7e74f1;
    color: #fff;
    border: none;
    padding: 8px;
    cursor: pointer;
    width: auto;
}

.update-btn:hover {
    background-color: #594bd1;
}

#data-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%; /* Sesuaikan sesuai kebutuhan */
    max-width: 800px; /* Sesuaikan sesuai kebutuhan */
    margin: auto;
}

.form-group {
    margin-bottom: 10px; /* Atur jarak antara setiap pasangan label dan input */
}

.edit-form label {
    display: block; /* Menetapkan label sebagai blok agar tampil di atas input */
    width: 100%; /* Agar label mengambil lebar penuh dari formulir */
    margin-bottom: 5px; /* Jarak antara label dan input */
}

.edit-form-row {
    padding: 12px;
    border: 1px solid #beb9f8;
    text-align: center; /* Menentukan posisi teks pada kolom (opsional) */
    white-space: nowrap;
}
        
        /* ... CSS yang sudah ada ... */
    </style>
</head>
<body>

    <div id="mySidebar" class="sidebar">
        <a href="/REV_1/CRUD/admin.php" onclick="showAdmin()">Admin</a>
        <a href="/REV_1/CRUD/ppdbcrud.php" onclick="showPPDB()">PPDB</a>
        <a href="/REV_1/CRUD/contact.php" onclick="showContact()">Contact</a>
        <a href="/REV_1/index.php" onclick="showKeluar()">Keluar</a>
    </div>

    <div id="main">
        
    <button class="openbtn" onclick="toggleNav()">
    <img src="/REV_1/CRUD/assets/burger.svg" alt="Toggle Sidebar" style="width: 24px; height: 24px; border-radius: 5px; ">
    </button>

        <h1>CRUD Admin</h1>

        <div id="data-container"></div>

        <script>
            var isSidebarOpen = false;

            function toggleNav() {
                var sidebar = document.getElementById("mySidebar");

                if (isSidebarOpen) {
                    sidebar.style.width = "0";
                    document.getElementById("main").style.marginLeft = "0";
                } else {
                    sidebar.style.width = "250px";
                    document.getElementById("main").style.marginLeft = "250px";
                }

                isSidebarOpen = !isSidebarOpen;
            }

            function showDashboard() {
                // Logic untuk menampilkan dashboard
                console.log("Showing Dashboard");
            }

            function showCrudStudents() {
                // Logic untuk menampilkan CRUD Students
                console.log("Showing CRUD Students");
            }

            function showContact() {
                // Logic untuk menampilkan CRUD Contact
                console.log("Showing Contact");
            }

                document.addEventListener("DOMContentLoaded", function() {
        // Memeriksa localStorage saat halaman dimuat
        var activePage = localStorage.getItem('activePage');
        if (activePage) {
            setActivePage(activePage);
        }
    });

    function toggleNav() {
        var sidebar = document.getElementById("mySidebar");

        if (isSidebarOpen) {
            sidebar.style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        } else {
            sidebar.style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        isSidebarOpen = !isSidebarOpen;
    }

    function showAdmin() {
        setActivePage("admin");
        console.log("Admin");
    }

    function showPPDB() {
        setActivePage("ppdb");
        console.log("PPDB");
    }

    function showContact() {
        setActivePage("contact");
        console.log("Contact");
    }

    function showKeluar() {
        setActivePage("keluar");
        console.log("Keluar");
    }

    function setActivePage(page) {
        resetActiveLinks();
        localStorage.setItem('activePage', page); // Menyimpan status klik di localStorage

        var link;
        if (page === "admin") {
            link = document.querySelector('.sidebar a[href="/REV_1/CRUD/admin.php"]');
        } else if (page === "ppdb") {
            link = document.querySelector('.sidebar a[href="/REV_1/CRUD/ppdbcrud.php"]');
        } else if (page === "contact") {
            link = document.querySelector('.sidebar a[href="/REV_1/CRUD/contact.php"]');
        }

        if (link) {
            link.classList.add('active');
            link.style.backgroundColor = "#8a81f2";
        }
    }

    function resetActiveLinks() {
        var links = document.querySelectorAll('.sidebar a');
        links.forEach(function(link) {
            link.classList.remove('active');
            link.style.backgroundColor = ""; // Menghapus latar belakang yang diset oleh JavaScript
        });
    }
        </script>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/REV_1/CRUD/script_admin.js"></script>
</body>
</html>
