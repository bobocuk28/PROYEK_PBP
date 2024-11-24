<?php
// Mulai session
session_start();

// Inisialisasi variabel untuk menampilkan pesan
$loginMessage = ''; 

// Cek apakah form login disubmit
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Contoh data pengguna untuk keperluan login (seharusnya dicek di database)
    $userData = [
        'email' => 'user@example.com',
        'password' => 'password123',
        'username' => 'User1'
    ];

    // Verifikasi email dan password
    if ($email === $userData['email'] && $password === $userData['password']) {
        // Simpan informasi pengguna ke session
        $_SESSION['user'] = $userData;
        
        // Redirect ke dashboard.php
        header("Location: dashboard.php");
        exit; // Pastikan untuk menghentikan eksekusi setelah redirect
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
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f4f4; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .container { 
            width: 400px; 
            padding: 20px; 
            background: #fff; 
            border-radius: 5px; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
        }
        h2 { 
            text-align: center; 
        }
        input { 
            width: 100%; 
            padding: 10px; 
            margin: 10px 0;
            box-sizing: border-box; 
        }
        .message { 
            color: red; /* Ubah warna menjadi merah untuk pesan error */
            text-align: center; 
        }
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
    <p><a href="reset_password">Lupa Password</a></p>
</div>

</body>
</html>
