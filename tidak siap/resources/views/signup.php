<?php
// Mulai session
session_start();

// Variabel untuk menampilkan pesan
$signupMessage = '';

// Cek apakah form sign up disubmit
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validasi password
    if ($password === $confirmPassword) {
        // Simpan data user ke session (dalam kenyataan, data ini akan disimpan di database)
        $_SESSION['user'] = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
        $signupMessage = "Akun berhasil dibuat. Silakan login!";
    } else {
        $signupMessage = "Password dan Konfirmasi Password tidak sama.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* CSS sederhana untuk mempercantik tampilan */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { width: 300px; margin: auto; padding: 20px; background: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        .message { color: green; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h2>Sign Up</h2>
    <form action="signup.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <input type="submit" name="signup" value="Sign Up">
    </form>
    <p class="message"><?= $signupMessage ?></p>
    <p><a href="login.php">Sudah punya akun? Login di sini</a></p>
</div>

</body>
</html>
