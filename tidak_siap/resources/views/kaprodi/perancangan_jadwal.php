<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\..\css\kaprodi\perancangan_jadwal.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="title">Tidak Siap</div>
        <div class="user-info">
            <i class="fas fa-bell"></i>
            <span>BUDI WIDODO</span>
            <i class="fas fa-caret-down"></i>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb-container">
        <div class="breadcrumb">
            <a href="#"><i class="fas fa-home"></i><strong> Home</strong></a> 
            <span>/</span> 
            <a href="#">Perancangan</a>
        </div>
    </div>
    <div>
        <h1 class="keterangan">Jadwal</h1>
    </div>
    <!-- Menu Navigasi -->
    <div class="menu-container">
        <ul class="menu">
            <li><a href="perancangan_matkul.php">Mata Kuliah</a></li>
            <li><a href="#" class="active">Jadwal</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="content">
        <h6 style="text-align: center; margin-bottom: 20px;">BUAT JADWAL</h6>
            <div class="form-group">
                <label for="Program Studi">Nama Mata Kuliah :</label>
                <select id="" name="Nama Mata Kuliah">
                    <option value="Statistika">Statistika</option>
                    <option value="Matematika 1">Matematika 1</option>
                    <option value="Logika Infromatika">Logika Infromatika</option>
                    <option value="Mesin Lerning">Mesin Lerning</option>
                    <!-- Tambahkan opsi lainnya jika diperlukan -->
                </select>
            </div>            
            <div class="form-group">
                <label for="hari">Hari:</label>
                <select id="hari" name="hari">
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                    <option value="minggu">Minggu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jam">Jam:</label>
                <input type="time" id="jam" name="jam">
            </div>
            <div class="form-group">
                <label for="Program Studi">Ruangan :</label>
                <select id="" name="Ruangan">
                    <option value="A101">A101</option>
                    <option value="A102">A102</option>
                    <option value="A103">A103</option>
                    <option value="B101">B101</option>
                    <!-- Tambahkan opsi lainnya jika diperlukan -->
                </select>
            </div>
            <button class="tombol">Tambah</button>

            <div class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">DAFTAR JADWAL KULIAH</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen Pengampu</th>
                            <th>Ruangan</th>
                            <th>Aksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senin</td>
                            <td>07.00-09.30</td>
                            <td>Statistika</td>
                            <td>Budiono</td>
                            <td>A101</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
                            <td>Belum Disetujui</td>
                        </tr>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>Budiono</td>
                            <td>...</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
                            <td>...</td>
                        </tr>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>Budiono</td>
                            <td>...</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
                            <td>...</td>
                        </tr>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
                            <td>...</td>
                        </tr>
                    </tbody>
                </table>
                <button class="tombol">Ajukan</button>
            </div>
            <div class="ip-section">
            </div>
        </div>
    </div>
</body>
</html>
