<?php
session_start();
include('db.php');

// Pastikan hanya dosen dengan role ketua_prodi yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'dosen' || $_SESSION['role'] != 'dekan') {
    header("Location: index.php");
    exit();
}

// Fungsi untuk menyetujui atau menolak ruangan
if (isset($_GET['setujui_id'])) {
    $id = $_GET['setujui_id'];

    // Update status menjadi 'disetujui'
    $sql_setujui = "UPDATE ruangan SET status = 'disetujui' WHERE id_ruang = $id";
    if ($conn->query($sql_setujui) === TRUE) {
        echo "<script>alert('Ruangan telah disetujui');</script>";
        echo "<script>window.location.href = 'persetujuan_ruangan.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_GET['tolak_id'])) {
    $id = $_GET['tolak_id'];

    // Update status menjadi 'ditolak'
    $sql_tolak = "UPDATE ruangan SET status = 'ditolak' WHERE id_ruang = $id";
    if ($conn->query($sql_tolak) === TRUE) {
        echo "<script>alert('Ruangan telah ditolak');</script>";
        echo "<script>window.location.href = 'persetujuan_ruangan.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fungsi untuk menyetujui semua ruangan yang statusnya 'diajukan'
if (isset($_POST['setujui_semua'])) {
    // Update status semua ruangan yang masih 'diajukan' menjadi 'disetujui'
    $sql_setujui_semua = "UPDATE ruangan SET status = 'disetujui' WHERE status = 'diajukan'";
    if ($conn->query($sql_setujui_semua) === TRUE) {
        echo "<script>alert('Semua ruangan telah disetujui');</script>";
        echo "<script>window.location.href = 'persetujuan_ruangan.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Ambil data ruangan dengan status 'diajukan'
$sql_ruangan = "SELECT r.id_ruang, r.nama_ruang, r.kapasitas, f.nama_fakultas, p.nama_prodi, r.status
                FROM ruangan r
                JOIN fakultas f ON r.id_fakultas = f.id_fakultas
                JOIN program_studi p ON r.id_prodi = p.id_prodi
                WHERE r.status = 'diajukan'"; // Filter hanya ruangan yang 'diajukan'
$result_ruangan = $conn->query($sql_ruangan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Dekan</a>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Persetujuan Ruangan</h3>
        
        <!-- Tabel Daftar Ruangan yang Diajukan -->
        <h4>Daftar Ruangan yang Diajukan</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_ruangan->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_ruang']; ?></td>
                        <td><?php echo $row['nama_ruang']; ?></td>
                        <td><?php echo $row['kapasitas']; ?></td>
                        <td><?php echo $row['nama_fakultas']; ?></td>
                        <td><?php echo $row['nama_prodi']; ?></td>
                        <td><?php echo ucfirst($row['status']); ?></td>
                        <td>
                            <!-- Setujui dan Tolak Ruangan -->
                            <a href="?setujui_id=<?php echo $row['id_ruang']; ?>" class="btn btn-success btn-sm">Setujui</a>
                            <a href="?tolak_id=<?php echo $row['id_ruang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak ruangan ini?');">Tolak</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Tombol Setujui Semua Ruangan -->
        <form method="POST">
            <button type="submit" name="setujui_semua" class="btn btn-warning">Setujui Semua Ruangan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
