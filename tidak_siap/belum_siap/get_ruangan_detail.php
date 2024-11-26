<?php
include('db.php');

// Ambil ID dari request
$id = $_GET['id'];

// Query untuk mengambil detail
$sql_detail = "
    SELECT 
        mkr.kode_mata_kuliah,
        mkr.kelas,
        rk.nama_ruang,
        rk.hari,
        rk.jam_mulai,
        rk.jam_selesai,
        mk.nama_mata_kuliah,
        mk.sks,
        mk.semester
    FROM 
        mata_kuliah_ruang AS mkr
    JOIN 
        ruang_kelas AS rk ON mkr.ruang_kelas_id = rk.id
    JOIN 
        mata_kuliah AS mk ON mkr.kode_mata_kuliah = mk.kode_mata_kuliah
    WHERE 
        mkr.id = '$id';
";
$result_detail = $conn->query($sql_detail);
$data = $result_detail->fetch_assoc();

// Query untuk mengambil daftar dosen
$sql_dosen = "
    SELECT d.nama 
    FROM mata_kuliah_dosen AS mkd
    JOIN dosen AS d ON mkd.nip = d.nip
    WHERE mkd.kode_mata_kuliah = '{$data['kode_mata_kuliah']}';
";
$result_dosen = $conn->query($sql_dosen);

// Format HTML untuk modal
echo "<h5>Detail Mata Kuliah</h5>";
echo "<p><strong>Nama Mata Kuliah:</strong> {$data['nama_mata_kuliah']}</p>";
echo "<p><strong>Kode Mata Kuliah:</strong> {$data['kode_mata_kuliah']}</p>";
echo "<p><strong>Kelas:</strong> {$data['kelas']}</p>";
echo "<p><strong>Ruang:</strong> {$data['nama_ruang']} ({$data['hari']} - {$data['jam_mulai']} s/d {$data['jam_selesai']})</p>";
echo "<p><strong>SKS:</strong> {$data['sks']}</p>";
echo "<p><strong>Semester:</strong> {$data['semester']}</p>";

echo "<h5>Dosen Pengajar</h5>";
if ($result_dosen->num_rows > 0) {
    while ($dosen = $result_dosen->fetch_assoc()) {
        echo "<p>- {$dosen['nama']}</p>";
    }
} else {
    echo "<p>Tidak ada dosen yang mengajar mata kuliah ini.</p>";
}
