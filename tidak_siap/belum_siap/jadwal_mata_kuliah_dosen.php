<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'dosen') {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['user_email'];
$sql = "SELECT * FROM dosen WHERE email = '$email'";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

// Ambil NIP dosen yang login
$nip = $user_data['nip'];

// Query untuk mengambil mata kuliah yang diampu dosen
$sql_mata_kuliah = "
    SELECT mk.kode_mata_kuliah, mk.nama_mata_kuliah, mk.sks, mk.semester 
    FROM mata_kuliah AS mk
    JOIN mata_kuliah_dosen AS mkd ON mk.kode_mata_kuliah = mkd.kode_mata_kuliah
    WHERE mkd.nip = '$nip'
";

$result_mata_kuliah = $conn->query($sql_mata_kuliah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Mata Kuliah Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Agar tabel dapat discroll secara terpisah */
        .table-responsive {
            max-height: 400px; /* Batasi tinggi area tabel */
            overflow-y: auto; /* Membuat scroll vertikal */
        }
        .table thead th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa; /* Warna latar belakang sticky header */
            z-index: 1;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Jadwal Mata Kuliah Dosen</a>
            <div class="d-flex">
                <!-- Tombol Kembali -->
                <a href="dashboard_dosen.php" class="btn btn-secondary me-2">Kembali</a>
                <!-- Tombol logout -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Jadwal Mata Kuliah yang Diampu oleh <?php echo $user_data['nama']; ?></h3>

        <!-- Form Pencarian -->
        <form method="POST" action="jadwal_mata_kuliah_dosen.php" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Cari mata kuliah..." value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <!-- Tabel Mata Kuliah yang Diampu Dosen -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Semester</th>
                        <th>SKS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_mata_kuliah->num_rows > 0) : ?>
                        <?php while ($row = $result_mata_kuliah->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['kode_mata_kuliah']; ?></td>
                                <td><?php echo $row['nama_mata_kuliah']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td><?php echo $row['sks']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada mata kuliah yang diampu.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
