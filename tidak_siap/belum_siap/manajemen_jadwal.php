<?php
session_start();
include('db.php');

// Pastikan hanya dosen dengan role ketua_prodi yang bisa mengakses halaman ini
if ($_SESSION['user_type'] != 'dosen' || $_SESSION['role'] != 'ketua_prodi') {
    header("Location: index.php");
    exit();
}

// Ambil ID Prodi dari session ketua prodi
$id_prodi = $_SESSION['user_prodi']; // Pastikan Anda sudah menyimpan id_prodi di session

// Ambil data mata kuliah yang sudah ada untuk dropdown
$sql_mata_kuliah = "SELECT * FROM mata_kuliah WHERE id_prodi = $id_prodi";
$result_mata_kuliah = $conn->query($sql_mata_kuliah);

// Ambil data ruangan yang statusnya 'disetujui' dan sesuai dengan prodi
$sql_ruangan = "SELECT * FROM ruangan WHERE status = 'disetujui' AND id_prodi = $id_prodi";
$result_ruangan = $conn->query($sql_ruangan);

// Proses tambah data jadwal kuliah
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_jadwal'])) {
    $kode_mk = $_POST['kode_mk'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $id_ruang = $_POST['id_ruang'];

    // Ambil SKS mata kuliah
    $sql_sks = "SELECT sks FROM mata_kuliah WHERE kode_mk = '$kode_mk'";
    $result_sks = $conn->query($sql_sks);
    $row_sks = $result_sks->fetch_assoc();
    $sks = $row_sks['sks'];

    // Hitung jam selesai (1 SKS = 1 jam)
    $jam_selesai = date("H:i:s", strtotime("$jam_mulai +$sks hour"));

    // Query untuk insert data jadwal
    $sql = "INSERT INTO jadwal_kuliah (kode_mk, hari, jam_mulai, jam_selesai, id_ruang, kapasitas, status) 
            VALUES ('$kode_mk', '$hari', '$jam_mulai', '$jam_selesai', '$id_ruang', 30, 'belum disetujui')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Jadwal berhasil ditambahkan');</script>";
        echo "<script>window.location.href = 'manajemen_jadwal.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tampilkan semua jadwal yang belum disetujui dan gabungkan nama dosen dalam satu baris
$sql_jadwal = "
    SELECT 
        jk.id_jadwal, 
        mk.nama_mk, 
        ru.nama_ruang, 
        jk.jam_mulai, 
        jk.jam_selesai, 
        jk.kapasitas, 
        GROUP_CONCAT(d.nama ORDER BY d.nama ASC SEPARATOR ', ') AS nama_dosen, 
        jk.status
    FROM 
        jadwal_kuliah jk
    JOIN 
        mata_kuliah mk ON jk.kode_mk = mk.kode_mk
    JOIN 
        ruangan ru ON jk.id_ruang = ru.id_ruang
    JOIN 
        pengampuan p ON p.kode_mk = mk.kode_mk
    JOIN 
        dosen d ON d.nip = p.nip
    WHERE 
        jk.status = 'belum disetujui' 
        AND mk.id_prodi = $id_prodi
    GROUP BY 
        jk.id_jadwal
";
$result_jadwal = $conn->query($sql_jadwal);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Jadwal Kuliah</title>
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
        <h3>Manajemen Jadwal Kuliah</h3>
        
        <!-- Form Tambah Jadwal -->
        <h4>Tambah Jadwal Kuliah</h4>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Mata Kuliah</label>
                <select class="form-control" id="kode_mk" name="kode_mk" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php while ($row_mk = $result_mata_kuliah->fetch_assoc()) { ?>
                        <option value="<?php echo $row_mk['kode_mk']; ?>"><?php echo $row_mk['nama_mk']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select class="form-control" id="hari" name="hari" required>
                    <option value="">Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
            </div>

            <div class="mb-3">
                <label for="id_ruang" class="form-label">Ruangan</label>
                <select class="form-control" id="id_ruang" name="id_ruang" required>
                    <option value="">Pilih Ruangan</option>
                    <?php while ($row_ruang = $result_ruangan->fetch_assoc()) { ?>
                        <option value="<?php echo $row_ruang['id_ruang']; ?>"><?php echo $row_ruang['nama_ruang']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="tambah_jadwal" class="btn btn-primary">Tambah Jadwal</button>
        </form>

        <!-- Tabel Jadwal yang Belum Disetujui -->
        <h4>Jadwal yang Belum Disetujui</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">Nama Ruang</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Jam Selesai</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_jadwal = $result_jadwal->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row_jadwal['nama_mk']; ?></td>
                        <td><?php echo $row_jadwal['nama_ruang']; ?></td>
                        <td><?php echo $row_jadwal['jam_mulai']; ?></td>
                        <td><?php echo $row_jadwal['jam_selesai']; ?></td>
                        <td><?php echo $row_jadwal['kapasitas']; ?></td>
                        <td><?php echo $row_jadwal['nama_dosen']; ?></td>
                        <td><?php echo $row_jadwal['status']; ?></td>
                        <td>
                            <a href="edit_jadwal.php?id_jadwal=<?php echo $row_jadwal['id_jadwal']; ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus_jadwal.php?id_jadwal=<?php echo $row_jadwal['id_jadwal']; ?>" class="btn btn-danger">Hapus</a>
                            <a href="ajukan_jadwal.php?id_jadwal=<?php echo $row_jadwal['id_jadwal']; ?>" class="btn btn-success">Ajukan</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Ajukan Semua Jadwal -->
        <a href="ajukan_semua_jadwal.php" class="btn btn-success">Ajukan Semua Jadwal</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
