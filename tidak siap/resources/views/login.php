<?php
// Mulai session
session_start();

// Variabel untuk menampilkan pesan
$loginMessage = '';

// Cek apakah form login disubmit
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah user sudah ada di session (di kenyataan, data ini akan dicek di database)
    if (isset($_SESSION['user']) && $_SESSION['user']['email'] === $email && $_SESSION['user']['password'] === $password) {
        $loginMessage = "Login berhasil! Selamat datang, " . $_SESSION['user']['username'] . ".";
    } else {
        $loginMessage = "Email atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="login" value="Login">
    </form>
    <p class="message"><?= $loginMessage ?></p>
    <p><a href="signup.php">Belum punya akun? Daftar di sini</a></p>
</div>

</body>
</html>
