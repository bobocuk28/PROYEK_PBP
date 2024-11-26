<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'mahasiswa') {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['user_email'];
$sql = "SELECT * FROM mahasiswa WHERE email = '$email'";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

// Ambil data dosen wali berdasarkan dosen_wali (NIP) yang ada pada data mahasiswa
$dosen_wali_nip = $user_data['dosen_wali'];
$sql_dosen_wali = "SELECT nama FROM dosen WHERE nip = '$dosen_wali_nip'";
$result_dosen_wali = $conn->query($sql_dosen_wali);
$dosen_wali = $result_dosen_wali->fetch_assoc();

// Tentukan apakah status mahasiswa adalah "proses penentuan status"
$is_pending_status = $user_data['status'] === 'proses penentuan status';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Mahasiswa</a>
            <div class="d-flex">
                <!-- Tombol logout -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo $user_data['nama']; ?></h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Email:</strong> <?php echo $user_data['email']; ?></li>
                            <li class="list-group-item"><strong>NIM:</strong> <?php echo $user_data['nim']; ?></li>
                            <li class="list-group-item"><strong>Alamat:</strong> <?php echo $user_data['alamat']; ?></li>
                            <li class="list-group-item"><strong>No Telpon:</strong> <?php echo $user_data['no_telpon']; ?></li>
                            <li class="list-group-item"><strong>Status:</strong> <?php echo $user_data['status']; ?></li>
                            <li class="list-group-item"><strong>Total SKS:</strong> <?php echo $user_data['total_sks']; ?></li>
                            <li class="list-group-item"><strong>IPK:</strong> <?php echo $user_data['ipk']; ?></li>
                            <li class="list-group-item"><strong>IP Semester:</strong> <?php echo $user_data['ip_semester']; ?></li>
                            <li class="list-group-item"><strong>Semester:</strong> <?php echo $user_data['semester']; ?></li>
                            <li class="list-group-item"><strong>Dosen Wali:</strong> <?php echo $dosen_wali['nama']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol -->
        <div class="mt-4 text-center">
            <button class="btn btn-primary" onclick="handleAkademik()">Akademik</button>
            <button class="btn btn-warning" onclick="showStatusModal()">Status Mahasiswa</button>
        </div>
    </div>

    <!-- Modal Status Mahasiswa -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Ubah Status Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Pilih status Anda:</p>
                    <button class="btn btn-success" onclick="updateStatus('aktif')">Aktif</button>
                    <button class="btn btn-danger" onclick="updateStatus('cuti')">Cuti</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Peringatan Akademik -->
    <div class="modal fade" id="akademikModal" tabindex="-1" aria-labelledby="akademikModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="akademikModalLabel">Perhatian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda harus menentukan status mahasiswa Anda sebelum melanjutkan ke halaman Akademik.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleAkademik() {
            <?php if ($is_pending_status): ?>
                const akademikModal = new bootstrap.Modal(document.getElementById('akademikModal'));
                akademikModal.show();
            <?php else: ?>
                window.location.href = "akademik.php";
            <?php endif; ?>
        }

        function showStatusModal() {
            const statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();
        }

        function updateStatus(status) {
            fetch('update_status_mahasiswa.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `status=${status}&nim=<?php echo $user_data['nim']; ?>`
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
