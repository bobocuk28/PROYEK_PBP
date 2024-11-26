<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['user_email'];
$user_type = $_SESSION['user_type'];

if ($user_type == 'mahasiswa') {
    // Ambil data mahasiswa
    $sql = "SELECT * FROM mahasiswa WHERE email = '$email'";
    $result = $conn->query($sql);
    $user_data = $result->fetch_assoc();
} else if ($user_type == 'dosen') {
    // Ambil data dosen
    $sql = "SELECT * FROM dosen WHERE email = '$email'";
    $result = $conn->query($sql);
    $user_data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Dashboard <?php echo ucfirst($user_type); ?></h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $user_data['nama']; ?></h5>
                <p class="card-text">
                    Email: <?php echo $user_data['email']; ?><br>
                    NIM / NIP: <?php echo $user_type == 'mahasiswa' ? $user_data['nim'] : $user_data['nip']; ?><br>
                    Alamat: <?php echo $user_data['alamat']; ?><br>
                    No Telpon: <?php echo $user_data['no_telpon']; ?><br>
                    Status: <?php echo $user_data['status']; ?><br>
                    <?php if ($user_type == 'mahasiswa') { ?>
                        Total SKS: <?php echo $user_data['total_sks']; ?><br>
                        IPK: <?php echo $user_data['ipk']; ?><br>
                        Semester: <?php echo $user_data['semester']; ?><br>
                        Dosen Wali: <?php echo $user_data['dosen_wali']; ?>
                    <?php } else { ?>
                        Jabatan: <?php echo $user_data['status_jabatan']; ?>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
