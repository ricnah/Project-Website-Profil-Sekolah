// Smooth scroll for anchor links
document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
});

// Send Message function
function sendMessage() {
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var message = document.getElementById('message').value;

  // Validasi format email
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var isEmailValid = emailRegex.test(email);

  // Ganti warna border sesuai hasil validasi
  var emailInput = document.getElementById('email');
  if (isEmailValid) {
    emailInput.style.border = '1px solid var(--borderColor)';
  } else {
    emailInput.style.border = '1px solid red';
  }

  // Lanjutkan dengan alert atau operasi lainnya jika diperlukan
  var popupMessage = "Name: " + name + "\nEmail: " + email + "\nMessage: " + message;

  alert(popupMessage);

  // Membersihkan nilai input setelah mengirim pesan
  document.getElementById('contactForm').reset();
}

document.getElementById('loginBtn').addEventListener('click', openPopup);

function openPopup() {
    document.getElementById('loginPopup').style.display = 'block';
}

function closePopup() {
    document.getElementById('loginPopup').style.display = 'none';
}

function validateLogin() {
    // Add your login validation logic here
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Example: Simple validation - check if both fields are not empty
    if (username !== '' && password !== '') {
        alert('Login successful!');
        closePopup();
    } else {
        alert('Invalid username or password. Please try again.');
    }
}

// Scroll Automatis
function goToSection(targetPage, sectionId) {
  // Pindahkan ke halaman tujuan setelah 0.5 detik
  setTimeout(function () {
    window.location.href = targetPage;
  }, 5000);

  // Pindahkan window.onload ke luar dari fungsi setTimeout
  window.onload = function () {
    // Menunggu halaman tujuan selesai dimuat sebelum melakukan scroll
    var targetSection = document.getElementById(sectionId);
    // Melakukan scroll ke elemen tersebut
    if (targetSection) {
      targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  };
}


// Back to top
// Tampilkan tombol saat pengguna scroll ke bawah
window.onscroll = function () {
  toggleBackToTopButton();
};

function toggleBackToTopButton() {
  var button = document.getElementById("backToTopBtn");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    button.style.display = "block";
  } else {
    button.style.display = "none";
  }
}

// Fungsi untuk melakukan scroll ke atas
function scrollToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

document.addEventListener("input", function (e) {
  if (e.target.matches("input[type='number']")) {
      e.target.value = e.target.value.replace(/[^0-9]/g, '');
  }
});

        // Check if the "success" parameter is present in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const successParam = urlParams.get('success');

        // If the "success" parameter is present, scroll to the "contact" section
        if (successParam === '1') {
            const contactSection = document.getElementById('contact');
            if (contactSection) {
                contactSection.scrollIntoView({ behavior: 'smooth' });
            }
        }


    // // Dapatkan elemen textarea dan span char-count
    // const messageInput = document.getElementById('message');
    // const charCountSpan = document.getElementById('charCount');

    // // Tambahkan event listener untuk setiap kali input berubah
    // messageInput.addEventListener('input', updateCharCount);

    // function updateCharCount() {
    //     // Dapatkan panjang teks saat ini
    //     const currentLength = messageInput.value.length;

    //     // Perbarui teks pada span char-count
    //     charCountSpan.textContent = `${currentLength}/100`;

    //     // Hapus kelas efek fade-in
    //     charCountSpan.classList.remove('fade-in');

    //     // Jeda sebentar sebelum menambahkan kelas efek fade-in lagi
    //     setTimeout(() => {
    //         // Tambahkan kelas efek fade-in pada karakter count
    //         charCountSpan.classList.add('fade-in');
    //     }, 10);
    // }