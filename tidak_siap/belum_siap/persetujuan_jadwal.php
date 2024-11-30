<?php
session_start();
include('db.php');

// Pastikan hanya dosen dengan role dekan yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'dosen' || $_SESSION['role'] != 'dekan') {
    header("Location: index.php");
    exit();
}

// Ambil daftar program studi untuk dropdown
$sql_prodi = "SELECT * FROM program_studi";
$result_prodi = $conn->query($sql_prodi);

// Inisialisasi variabel
$selected_prodi = isset($_POST['id_prodi']) ? $_POST['id_prodi'] : null;
$jadwal_data = [];

// Jika prodi dipilih, ambil data jadwal terkait
if ($selected_prodi) {
    $sql_jadwal = "
        SELECT jk.id_jadwal, mk.nama_mk, jk.hari, jk.jam_mulai, jk.jam_selesai, 
               r.nama_ruang, r.kapasitas, jk.status
        FROM jadwal_kuliah jk
        JOIN mata_kuliah mk ON jk.kode_mk = mk.kode_mk
        JOIN ruangan r ON jk.id_ruang = r.id_ruang
        WHERE jk.id_prodi = $selected_prodi
    ";
    $jadwal_data = $conn->query($sql_jadwal);
}

// Update status jadwal
if (isset($_POST['action']) && isset($_POST['id_jadwal'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $action = $_POST['action'];

    if ($action == 'disetujui' || $action == 'ditolak') {
        $new_status = $action;
        $sql_update = "UPDATE jadwal_kuliah SET status = '$new_status' WHERE id_jadwal = $id_jadwal";
        $conn->query($sql_update);
    } elseif ($action == 'reset') {
        $sql_reset = "UPDATE jadwal_kuliah SET status = 'belum disetujui' WHERE id_jadwal = $id_jadwal";
        $conn->query($sql_reset);
    }
    // Refresh halaman setelah aksi
    header("Location: persetujuan_jadwal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Jadwal</title>
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
        <h3>Persetujuan Jadwal Kuliah</h3>

        <!-- Dropdown Pilihan Program Studi -->
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="id_prodi" class="form-label">Pilih Program Studi</label>
                <select class="form-control" id="id_prodi" name="id_prodi" onchange="this.form.submit()">
                    <option value="">Pilih Program Studi</option>
                    <?php while ($row = $result_prodi->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_prodi']; ?>" <?php echo ($selected_prodi == $row['id_prodi']) ? 'selected' : ''; ?>>
                            <?php echo $row['nama_prodi']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </form>

        <!-- Tabel Jadwal Kuliah -->
        <?php if ($selected_prodi && $jadwal_data->num_rows > 0) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Nama Ruang</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $jadwal_data->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['nama_mk']; ?></td>
                            <td><?php echo $row['hari']; ?></td>
                            <td><?php echo $row['jam_mulai']; ?></td>
                            <td><?php echo $row['jam_selesai']; ?></td>
                            <td><?php echo $row['nama_ruang']; ?></td>
                            <td><?php echo $row['kapasitas']; ?></td>
                            <td><?php echo ucfirst($row['status']); ?></td>
                            <td>
                                <?php if ($row['status'] == 'belum disetujui') { ?>
                                    <form method="POST" style="display:inline-block;">
                                        <input type="hidden" name="id_jadwal" value="<?php echo $row['id_jadwal']; ?>">
                                        <button type="submit" name="action" value="disetujui" class="btn btn-success btn-sm">Setujui</button>
                                    </form>
                                    <form method="POST" style="display:inline-block;">
                                        <input type="hidden" name="id_jadwal" value="<?php echo $row['id_jadwal']; ?>">
                                        <button type="submit" name="action" value="ditolak" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>
                                <?php } else { ?>
                                    <form method="POST">
                                        <input type="hidden" name="id_jadwal" value="<?php echo $row['id_jadwal']; ?>">
                                        <button type="submit" name="action" value="reset" class="btn btn-warning btn-sm">Reset</button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } elseif ($selected_prodi) { ?>
            <p>Tidak ada jadwal untuk program studi ini.</p>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
