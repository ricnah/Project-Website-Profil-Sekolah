<!-- login.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" onsubmit="login(event)" action="process_login.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>  
            </div>
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        </form>

        <!-- Tambahkan elemen untuk menampilkan pesan kesalahan -->
        <p id="loginError"></p>
    </div>


    <script src="script.js"></script>
</body>

</html>
