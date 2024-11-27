<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\..\css\dosen\nilai_akademik.css">
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
            <a href="#"></a>
        </div>
    </div>
    <div>
        <h1 class="keterangan">Input Nilai Mahasiswa</h1>
    </div>
    <!-- Menu Navigasi -->
    <div class="menu-container">
        <ul class="menu">
            <li><a href="#" class="active">Input Nilai</a></li>
            <li><a href="jadwal_mengajar.php">Jadwal</a></li>
            <li><a href="daftar_mahasiswa.php">Daftar</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="content">
        <h6 style="text-align: center; margin-bottom: 20px;"></h6>
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
                <label for="Program Studi">Kelas :</label>
                <select id="" name="Nama Mata Kuliah">
                    <option value="Statistika">A</option>
                    <option value="Matematika 1">B</option>
                    <option value="Logika Infromatika">C</option>
                    <option value="Mesin Lerning">D</option>
                    <!-- Tambahkan opsi lainnya jika diperlukan -->
                </select>
            </div>
            
            <div class="search-section">
                <input type="text" placeholder="Cari Nama Mahasiswa">
            </div>

            <div class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">Masukkan Nilai</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Mata Kuliah</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nilai</th>
                            <th>Nilai Huruf</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Budi Wibowo</td>
                            <td>24060122100001</td>
                            <td>Matematika 1</td>
                            <td>PAIK101</td>
                            <td><input type="number" id="kuota" name="kuota" step="1"></td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td><input type="number" id="kuota" name="kuota" step="1"></td>
                            <td>...</td>
                        </tr>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td><input type="number" id="kuota" name="kuota" step="1"></td>
                            <td>...</td>
                        </tr>
                        <tr>
                        <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td><input type="number" id="kuota" name="kuota" step="1"></td>
                            <td>...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ip-section">
            </div>
        </div>
    </div>
</body>
</html>
