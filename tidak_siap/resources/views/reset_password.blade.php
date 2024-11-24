<?php
// Start session
session_start();

// Pesan
$resetMessage = '';

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Misalnya cek email di database (di sini hanya contoh)
    if ($email === 'user@example.com') {
        // Jika email valid, kirim tautan reset password
        $resetLink = "http://localhost/reset_password.php?token=" . md5($email);
        $resetMessage = "Silakan cek email Anda untuk tautan reset password.";
        // Tautan reset akan dikirim via email, namun untuk demonstrasi kita hanya menampilkan pesan
        echo "<p>Tautan reset password: <a href='$resetLink'>$resetLink</a></p>";
    } else {
        $resetMessage = "Email tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <style>
        /* CSS sederhana untuk mempercantik tampilan */
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f4f4; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; /* Penuhi tinggi layar untuk memusatkan konten secara vertikal */
            margin: 0; /* Hilangkan margin bawaan dari body */
        }
        .container { 
            width: 400px; /* Lebarkan kotak login */
            padding: 20px; 
            background: #fff; 
            border-radius: 5px; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
        }
        h2 { 
            text-align: center; 
        }
        input { 
            width: 100%; /* Pastikan lebar input tidak melebihi container */
            padding: 10px; 
            margin: 10px 0;
            box-sizing: border-box; /* Tambahkan box-sizing agar padding tidak menambah lebar total */
        }
        .message { 
            color: green; 
            text-align: center; 
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lupa Password</h2>
    <form action="forgot_password.php" method="POST">
        <label for="email">Masukkan Email</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" name="submit" value="Reset Password">
    </form>
    <p class="message"><?= $resetMessage ?></p>
</div>

</body>
</html>