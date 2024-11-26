<?php
session_start();
include('db.php');

// Pastikan pengguna sudah login dan memiliki status dekan
if (!isset($_SESSION['user_email']) || $_SESSION['user_type'] != 'dosen') {
    header("Location: index.php");
    exit();
}

// Ambil data dosen yang login
$email = $_SESSION['user_email'];
$sql = "SELECT * FROM dosen WHERE email = '$email'";
$result = $conn->query($sql);
$user_data = $result->fetch_assoc();

// Pastikan hanya dekan yang bisa mengakses halaman ini
if ($user_data['status_jabatan'] != 'dekan') {
    header("Location: dashboard_dosen.php");
    exit();
}

// Ambil parameter search dan sorting dari URL
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'nama_ruang';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

// Ambil data ruangan dengan search dan sorting
$sql_ruangan = "
    SELECT 
        mkr.id,
        mkr.kode_mata_kuliah,
        mkr.kelas,
        rk.nama_ruang,
        rk.hari,
        rk.jam_mulai,
        rk.jam_selesai,
        mk.nama_mata_kuliah,
        mk.sks,
        mk.semester,
        mkr.status
    FROM 
        mata_kuliah_ruang AS mkr
    JOIN 
        ruang_kelas AS rk ON mkr.ruang_kelas_id = rk.id
    JOIN 
        mata_kuliah AS mk ON mkr.kode_mata_kuliah = mk.kode_mata_kuliah
    WHERE 
        mkr.status = 'proses persetujuan'
        AND (
            mk.nama_mata_kuliah LIKE '%$search%' OR 
            rk.nama_ruang LIKE '%$search%' OR 
            mkr.kelas LIKE '%$search%' OR
            rk.hari LIKE '%$search%'
        )
    ORDER BY $sort_by $order;
";

$result_ruangan = $conn->query($sql_ruangan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-wrapper {
            max-height: 500px;
            overflow-y: auto;
        }
        .sortable-header {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Persetujuan Ruangan</a>
            <div class="d-flex">
                <a href="dashboard_dosen.php" class="btn btn-secondary me-2">Kembali</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3 class="mb-4">Daftar Ruangan Dalam Proses Persetujuan</h3>
        
        <!-- Form Search -->
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari ruangan atau mata kuliah..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <div class="table-wrapper">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="sortable-header">
                            <a href="?sort_by=kode_mata_kuliah&order=<?php echo $sort_by == 'kode_mata_kuliah' && $order == 'ASC' ? 'DESC' : 'ASC'; ?>&search=<?php echo $search; ?>" class="text-light">Kode Mata Kuliah</a>
                        </th>
                        <th class="sortable-header">
                            <a href="?sort_by=nama_mata_kuliah&order=<?php echo $sort_by == 'nama_mata_kuliah' && $order == 'ASC' ? 'DESC' : 'ASC'; ?>&search=<?php echo $search; ?>" class="text-light">Nama Mata Kuliah</a>
                        </th>
                        <th>Kelas</th>
                        <th class="sortable-header">
                            <a href="?sort_by=nama_ruang&order=<?php echo $sort_by == 'nama_ruang' && $order == 'ASC' ? 'DESC' : 'ASC'; ?>&search=<?php echo $search; ?>" class="text-light">Ruang</a>
                        </th>
                        <th class="sortable-header">
                            <a href="?sort_by=hari&order=<?php echo $sort_by == 'hari' && $order == 'ASC' ? 'DESC' : 'ASC'; ?>&search=<?php echo $search; ?>" class="text-light">Hari</a>
                        </th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th class="sortable-header">
                            <a href="?sort_by=sks&order=<?php echo $sort_by == 'sks' && $order == 'ASC' ? 'DESC' : 'ASC'; ?>&search=<?php echo $search; ?>" class="text-light">SKS</a>
                        </th>
                        <th class="sortable-header">
                            <a href="?sort_by=semester&order=<?php echo $sort_by == 'semester' && $order == 'ASC' ? 'DESC' : 'ASC'; ?>&search=<?php echo $search; ?>" class="text-light">Semester</a>
                        </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result_ruangan->num_rows > 0): ?>
                        <?php while ($row = $result_ruangan->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['kode_mata_kuliah']; ?></td>
                                <td><?php echo $row['nama_mata_kuliah']; ?></td>
                                <td><?php echo $row['kelas']; ?></td>
                                <td><?php echo $row['nama_ruang']; ?></td>
                                <td><?php echo $row['hari']; ?></td>
                                <td><?php echo $row['jam_mulai']; ?></td>
                                <td><?php echo $row['jam_selesai']; ?></td>
                                <td><?php echo $row['sks']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="showDetails(<?php echo $row['id']; ?>)">Detail</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada ruangan dalam proses persetujuan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal untuk Detail dan Aksi -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Ruangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="approve()">Setujui</button>
                    <button type="button" class="btn btn-danger" onclick="reject()">Tolak</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDetails(id) {
            fetch(`get_ruangan_detail.php?id=${id}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('modalContent').innerHTML = data;
                    document.getElementById('modalContent').setAttribute('data-id', id); // Simpan ID di modal
                    const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
                    detailModal.show();
                });
        }

        function approve() {
            const id = document.getElementById('modalContent').getAttribute('data-id');
            fetch('update_status_ruangan.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${id}&action=approve`
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            });
        }

        function reject() {
            const id = document.getElementById('modalContent').getAttribute('data-id');
            fetch('update_status_ruangan.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${id}&action=reject`
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
