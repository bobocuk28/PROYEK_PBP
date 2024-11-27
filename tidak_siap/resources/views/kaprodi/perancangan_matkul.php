<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\..\css\kaprodi\perancangan_matkul.css">
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
        <h1 class="keterangan">Mata Kuliah</h1>
    </div>

    <!-- Menu Navigasi -->
    <div class="menu-container">
        <ul class="menu">
            <li><a href="#" class="active">Mata Kuliah</a></li>
            <li><a href="perancangan_jadwal.php">Jadwal</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="content">
        <h6 style="text-align: center; margin-bottom: 20px;">BUAT MATA KULIAH</h6>
            <div class="form-group">
                <label for="Nama_Mata_Kuliah">Nama Mata Kuliah:</label>
                <input type="text" id="Nama_Mata_Kuliah" name="Nama_Mata_Kuliah">
            </div>
            <div class="form-group">
                <label for="Kode_Mata_Kuliah">Kode Mata Kuliah:</label>
                <input type="text" id="Kode_Mata_Kuliah" name="Kode_Mata_Kuliah">
            </div>
            <div class="form-group">
                <label for="Sks">Sks:</label>
                <input type="number" id="Sks" name="Sks">
            </div>
            <div class="form-group">
                <label for="Jumlah_Kelas">Jumlah Kelas:</label>
                <input type="number" id="Jumlah_Kelas" name="Jumlah_Kelas" step="1">
            </div>
            <div class="form-group">
                <label for="Dosen_Pengampu">Dosen Pengampu:</label>
                <input type="text" id="Dosen_Pengampu" name="Dosen_Pengampu">
            </div>
            <div class="form-group">
                <label for="Semester">Semester:</label>
                <input type="number" id="Semester" name="Semester" step="1">
            </div>
            <button class="tombol">Tambah</button>

            <div class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">DAFTAR MATA KULIAH</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Mata Kuliah</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Sks</th>
                            <th>Kelas</th>
                            <th>Dosen Pengampu</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Statistika</td>
                            <td>PAIK101</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Budiono</td>
                            <td>1</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ekonomi</td>
                            <td>PAIK101</td>
                            <td>3</td>
                            <td>3</td>
                            <td>Budiono</td>
                            <td>1</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Biologi</td>
                            <td>PAIK101</td>
                            <td>3</td>
                            <td>4</td>
                            <td>Budiono</td>
                            <td>1</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Kimia</td>
                            <td>PAIK101</td>
                            <td>3</td>
                            <td>3</td>
                            <td>Budiono</td>
                            <td>1</td>
                            <td class="actions">
                                <button class="edit">Edit</button>
                                <button class="delete">Hapus</button>
                            </td>
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
