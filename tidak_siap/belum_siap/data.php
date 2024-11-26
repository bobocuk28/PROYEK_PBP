<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login dan merupakan dosen atau admin
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'dosen') {
    header("Location: index.php");
    exit();
}

// Ambil semua data mahasiswa
$sql_mahasiswa = "SELECT * FROM mahasiswa";
$result_mahasiswa = $conn->query($sql_mahasiswa);

// Ambil semua data dosen
$sql_dosen = "SELECT * FROM dosen";
$result_dosen = $conn->query($sql_dosen);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa dan Dosen</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Mahasiswa dan Dosen</h2>
        
        <h3>Data Mahasiswa</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Total SKS</th>
                    <th>IPK</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_mahasiswa->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nim']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['total_sks']; ?></td>
                        <td><?php echo $row['ipk']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h3>Data Dosen</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_dosen->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nip']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['status_jabatan']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>