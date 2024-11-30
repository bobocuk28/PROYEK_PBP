<?php
session_start();
include('db.php');

// Pastikan hanya akademik yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'akademik') {
    header("Location: index.php");
    exit();
}

// Proses tambah data ruangan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_ruangan'])) {
    $nama_ruang = $_POST['nama_ruang'];
    $kapasitas = $_POST['kapasitas'];
    $id_fakultas = $_POST['id_fakultas'];
    $id_prodi = $_POST['id_prodi'];

    // Query untuk insert data
    $sql = "INSERT INTO ruangan (nama_ruang, kapasitas, id_fakultas, id_prodi) 
            VALUES ('$nama_ruang', '$kapasitas', '$id_fakultas', '$id_prodi')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ruangan berhasil ditambahkan');</script>";
        echo "<script>window.location.href = 'ruangan.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Proses hapus data ruangan
if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM ruangan WHERE id_ruang = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ruangan berhasil dihapus');</script>";
        echo "<script>window.location.href = 'ruangan.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Proses ajukan semua ruangan yang statusnya "belum disetujui"
if (isset($_POST['ajukan_ruangan'])) {
    // Query untuk update status semua ruangan yang statusnya 'belum disetujui' menjadi 'diajukan'
    $sql_ajukan = "UPDATE ruangan SET status = 'diajukan' WHERE status = 'belum disetujui'";

    if ($conn->query($sql_ajukan) === TRUE) {
        echo "<script>alert('Semua ruangan yang belum disetujui telah diajukan');</script>";
        echo "<script>window.location.href = 'ruangan.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Ambil data ruangan termasuk status
$sql_ruangan = "SELECT r.id_ruang, r.nama_ruang, r.kapasitas, f.nama_fakultas, p.nama_prodi, r.status
                FROM ruangan r
                JOIN fakultas f ON r.id_fakultas = f.id_fakultas
                JOIN program_studi p ON r.id_prodi = p.id_prodi";
$result_ruangan = $conn->query($sql_ruangan);

// Ambil daftar fakultas dan program studi untuk form tambah ruangan
$sql_fakultas = "SELECT * FROM fakultas";
$result_fakultas = $conn->query($sql_fakultas);

$sql_prodi = "SELECT * FROM program_studi";
$result_prodi = $conn->query($sql_prodi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Akademik</a>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Manajemen Ruangan</h3>
        
        <!-- Form Tambah Ruangan -->
        <h4>Tambah Ruangan</h4>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="nama_ruang" class="form-label">Nama Ruangan</label>
                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
            </div>
            <div class="mb-3">
                <label for="id_fakultas" class="form-label">Fakultas</label>
                <select class="form-control" id="id_fakultas" name="id_fakultas" required>
                    <option value="">Pilih Fakultas</option>
                    <?php while ($row_fakultas = $result_fakultas->fetch_assoc()) { ?>
                        <option value="<?php echo $row_fakultas['id_fakultas']; ?>"><?php echo $row_fakultas['nama_fakultas']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_prodi" class="form-label">Program Studi</label>
                <select class="form-control" id="id_prodi" name="id_prodi" required>
                    <option value="">Pilih Program Studi</option>
                    <?php while ($row_prodi = $result_prodi->fetch_assoc()) { ?>
                        <option value="<?php echo $row_prodi['id_prodi']; ?>"><?php echo $row_prodi['nama_prodi']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="tambah_ruangan" class="btn btn-primary">Tambah Ruangan</button>
        </form>

        <!-- Tabel Daftar Ruangan -->
        <h4>Daftar Ruangan</h4>
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
                        <td>
                            <?php echo ucfirst($row['status']); ?>
                        </td>
                        <td>
                            <!-- Hapus Ruangan -->
                            <a href="?hapus_id=<?php echo $row['id_ruang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus ruangan ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Tombol Ajukan Semua Ruangan -->
        <form method="POST">
            <button type="submit" name="ajukan_ruangan" class="btn btn-warning">Ajukan Semua Ruangan yang Belum Disetujui</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
