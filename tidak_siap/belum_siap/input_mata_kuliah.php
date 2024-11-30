<?php
session_start();
include('db.php');

// Pastikan hanya dosen dengan role ketua_prodi yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'dosen' || $_SESSION['role'] != 'ketua_prodi') {
    header("Location: index.php");
    exit();
}

// Ambil data dosen yang sedang login
$nip_dosen = $_SESSION['user_nip'];
$sql_dosen = "SELECT * FROM dosen WHERE nip = '$nip_dosen'";
$result_dosen = $conn->query($sql_dosen);
$dosen_data = $result_dosen->fetch_assoc();
$id_prodi = $dosen_data['id_prodi'];  // Ambil id_prodi dari dosen yang login

// Proses tambah mata kuliah
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_mk'])) {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];
    $tipe = $_POST['tipe'];

    // Query untuk insert data mata kuliah dengan id_prodi
    $sql = "INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, semester, tipe, id_prodi) 
            VALUES ('$kode_mk', '$nama_mk', '$sks', '$semester', '$tipe', '$id_prodi')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Mata kuliah berhasil ditambahkan');</script>";
        echo "<script>window.location.href = 'mata_kuliah.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Proses hapus mata kuliah
if (isset($_GET['hapus_id'])) {
    $kode_mk = $_GET['hapus_id'];

    // Query untuk menghapus mata kuliah
    $sql = "DELETE FROM mata_kuliah WHERE kode_mk = '$kode_mk'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Mata kuliah berhasil dihapus');</script>";
        echo "<script>window.location.href = 'mata_kuliah.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Proses update mata kuliah
if (isset($_GET['edit_id'])) {
    $kode_mk = $_GET['edit_id'];
    $sql_edit = "SELECT * FROM mata_kuliah WHERE kode_mk = '$kode_mk'";
    $result_edit = $conn->query($sql_edit);
    $data_edit = $result_edit->fetch_assoc();
}

// Proses update mata kuliah setelah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_mk'])) {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];
    $tipe = $_POST['tipe'];

    // Query untuk update mata kuliah
    $sql_update = "UPDATE mata_kuliah 
                   SET nama_mk = '$nama_mk', sks = '$sks', semester = '$semester', tipe = '$tipe'
                   WHERE kode_mk = '$kode_mk'";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Mata kuliah berhasil diupdate');</script>";
        echo "<script>window.location.href = 'mata_kuliah.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Ambil data mata kuliah
$sql_mk = "SELECT * FROM mata_kuliah";
$result_mk = $conn->query($sql_mk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Ketua Prodi</a>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Manajemen Mata Kuliah</h3>
        
        <!-- Form Tambah Mata Kuliah -->
        <h4>Tambah Mata Kuliah</h4>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
            </div>
            <div class="mb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" class="form-control" id="semester" name="semester" required>
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <select class="form-control" id="tipe" name="tipe">
                    <option value="wajib">Wajib</option>
                    <option value="pilihan">Pilihan</option>
                </select>
            </div>
            <button type="submit" name="tambah_mk" class="btn btn-primary">Tambah Mata Kuliah</button>
        </form>

        <!-- Tabel Daftar Mata Kuliah -->
        <h4>Daftar Mata Kuliah</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_mk->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['kode_mk']; ?></td>
                        <td><?php echo $row['nama_mk']; ?></td>
                        <td><?php echo $row['sks']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td><?php echo $row['tipe']; ?></td>
                        <td>
                            <a href="?edit_id=<?php echo $row['kode_mk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="?hapus_id=<?php echo $row['kode_mk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php if (isset($data_edit)) { ?>
            <!-- Form Edit Mata Kuliah -->
            <h4>Edit Mata Kuliah</h4>
            <form method="POST">
                <input type="hidden" name="kode_mk" value="<?php echo $data_edit['kode_mk']; ?>">
                <div class="mb-3">
                    <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama_mk" name="nama_mk" value="<?php echo $data_edit['nama_mk']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="sks" class="form-label">SKS</label>
                    <input type="number" class="form-control" id="sks" name="sks" value="<?php echo $data_edit['sks']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" value="<?php echo $data_edit['semester']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <select class="form-control" id="tipe" name="tipe">
                        <option value="wajib" <?php echo $data_edit['tipe'] == 'wajib' ? 'selected' : ''; ?>>Wajib</option>
                        <option value="pilihan" <?php echo $data_edit['tipe'] == 'pilihan' ? 'selected' : ''; ?>>Pilihan</option>
                    </select>
                </div>
                <button type="submit" name="update_mk" class="btn btn-primary">Update Mata Kuliah</button>
            </form>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
