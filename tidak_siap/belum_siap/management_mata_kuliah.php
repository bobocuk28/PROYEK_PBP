<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login dan memiliki akses sebagai ketua program studi
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'dosen') {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['user_email'];
$sql = "SELECT * FROM dosen WHERE email = '$email'";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

if ($user_data['status_jabatan'] != 'ketua program studi') {
    echo "Anda tidak memiliki akses ke halaman ini.";
    exit();
}

// Mengambil data mata kuliah dan dosen pengajar dari database
$sql_mata_kuliah = "
    SELECT mk.kode_mata_kuliah, mk.nama_mata_kuliah, mk.sks, GROUP_CONCAT(d.nama SEPARATOR ', ') AS dosen_pengajar
    FROM mata_kuliah mk
    LEFT JOIN mata_kuliah_dosen mkd ON mk.kode_mata_kuliah = mkd.kode_mata_kuliah
    LEFT JOIN dosen d ON mkd.nip = d.nip
    GROUP BY mk.kode_mata_kuliah, mk.nama_mata_kuliah, mk.sks
";
$result_mata_kuliah = $conn->query($sql_mata_kuliah);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Membatasi tinggi tabel agar bisa discroll */
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 1;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Management Mata Kuliah</a>
            <div class="d-flex">
                <!-- Tombol kembali ke Dashboard -->
                <a href="dashboard_dosen.php" class="btn btn-secondary me-2">Kembali</a>
                <!-- Tombol logout -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Daftar Mata Kuliah</h2>
        <div class="table-container">
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_mata_kuliah->num_rows > 0) {
                        while ($row = $result_mata_kuliah->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['kode_mata_kuliah'] . "</td>";
                            echo "<td>" . $row['nama_mata_kuliah'] . "</td>";
                            echo "<td>" . $row['sks'] . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#modal" . $row['kode_mata_kuliah'] . "'>Lihat Pengajar</button>";
                            echo "</td>";
                            echo "</tr>";

                            // Modal untuk setiap mata kuliah
                            echo "
                            <div class='modal fade' id='modal" . $row['kode_mata_kuliah'] . "' tabindex='-1' aria-labelledby='modalLabel" . $row['kode_mata_kuliah'] . "' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='modalLabel" . $row['kode_mata_kuliah'] . "'>Dosen Pengajar - " . $row['nama_mata_kuliah'] . "</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <p><strong>Kode Mata Kuliah:</strong> " . $row['kode_mata_kuliah'] . "</p>
                                            <p><strong>Nama Mata Kuliah:</strong> " . $row['nama_mata_kuliah'] . "</p>
                                            <p><strong>Dosen Pengajar:</strong> " . ($row['dosen_pengajar'] ? $row['dosen_pengajar'] : "Belum ada dosen") . "</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>Tidak ada data mata kuliah.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
