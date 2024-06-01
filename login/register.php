<!-- register.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style_regis.css">
</head>

<style>
    .form-group-role select{
    margin-bottom: 15px;
    margin-top: 5px;
    text-align: left;
    width: 100%; 
    padding: 8px; 
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-group-role{
    text-align:left
}

/* Jika ingin menyesuaikan gaya ketika dropdown dipilih, Anda dapat menambahkan gaya hover dan focus */
.form-group-role select:hover,
.form-group-role select:focus {
    border-color: #685fcd; /* Warna border saat hover atau focus */
    text-align: left;
}
</style>

<body>
    <div class="register-container">
        <h2>Register</h2>
        <form class="register-form" onsubmit="register(event)">
            <div class="form-group">
                <label for="newUsername">Username:</label>
                <input type="text" id="newUsername" name="newUsername" required>
            </div>
            <div class="form-group">
                <label for="newName">Name:</label>
                <input type="text" id="newName" name="newName" required>
            </div>
            <div class="form-group-role">
                <label for="newRole">Role:</label>
                <select id="newRole" name="newRole" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                    <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Team IT">Team IT</option>
                </select>
            </div>
            <div class="form-group">
                <label for="newEmail">Email:</label>
                <input type="email" id="newEmail" name="newEmail" required>
            </div>
            <div class="form-group">
                <label for="newPassword">Password:</label>
                <input type="password" id="newPassword" name="newPassword" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>
