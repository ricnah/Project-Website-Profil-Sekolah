function login(event) {
   event.preventDefault();
 
   var username = document.getElementById('username').value;
   var password = document.getElementById('password').value;
 
   // Implement code to send login data to the server
   fetch('process_login.php', {
     method: 'POST',
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded',
     },
     body: `action=login&username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`,
   })
   .then(response => response.text())  // Mengubah ini dari json ke text
   .then(data => {
      console.log('Login Response:', data);
      // Memeriksa pesan langsung, tanpa parsing JSON
      if (data.includes('success')) {
          // Redirect to the admin page after successful login
          window.location.href = '/REV_1/CRUD/admin.php';
      } else {
          // Jika login gagal, tampilkan pesan kesalahan di elemen HTML tertentu
          var loginErrorElement = document.getElementById('loginError');
          loginErrorElement.textContent = data;
      }
  })
    .catch(error => {
      console.error('Error:', error);
    });
 }

 

 function register(event) {
   event.preventDefault();
 
   var newUsername = document.getElementById('newUsername').value;
   var newName = document.getElementById('newName').value;
   var newRole = document.getElementById('newRole').value;
   var newEmail = document.getElementById('newEmail').value;
   var newPassword = document.getElementById('newPassword').value;
   var confirmPassword = document.getElementById('confirmPassword').value;
 
   // Implement code to send registration data to the server
   fetch('process.php', {
     method: 'POST',
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded',
     },
     body: `action=register&newUsername=${encodeURIComponent(newUsername)}&newName=${encodeURIComponent(newName)}&newRole=${encodeURIComponent(newRole)}&newEmail=${encodeURIComponent(newEmail)}&newPassword=${encodeURIComponent(newPassword)}`,
   })
     .then(response => response.text())
     .then(data => {
      if (data !== 'Registration failed. Please try again later.') {
        // Registrasi berhasil, redirect ke halaman login
        window.location.href = 'login.php';
      } else {
        // Registrasi gagal, tampilkan pesan kesalahan
        alert(data);
      }
    })
    
     .catch(error => {
       console.error('Error:', error);
     });
 }
 

