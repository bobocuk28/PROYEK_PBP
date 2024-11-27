<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\..\css\dekan\persetujuan_ruangan.css">
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
            <a href="#">Persetujuan</a>
        </div>
    </div>
    
    <div>
        <h1 class="keterangan">Persetujuan Ruangan</h1>
    </div>


    <!-- Menu Navigasi -->
    <div class="menu-container">
        <ul class="menu">
            <li><a href="#" class="active">Persetujuan Ruangan</a></li>
            <li><a href="persetujuan_jadwal.php">Persetujuan Jadwal</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="content">
            <h5>DOKUMEN PEMBAGIAN RUANGAN</h5>
            <div class="form-group">
                <label for="Program Studi">Program Studi :</label>
                <select id="" name="Program Studi">
                    <option value="Informatika">Informatika</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Biologi">Biologi</option>
                    <option value="Kimia">Kimia</option>
                    <!-- Tambahkan opsi lainnya jika diperlukan -->
                </select>
            </div>

            <div class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">Daftar Ruang Informatika</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Ruang</th>
                            <th>Kuota</th>
                            <th>Fungsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A101</td>
                            <td>50</td>
                            <td>Ruang Kelas</td>
                            <td class="actions">
                                <button class="edit">Setujui</button>
                                <button class="delete">Tolak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>A102</td>
                            <td>52</td>
                            <td>Ruang Kelas</td>
                            <td class="actions">
                                <button class="edit">Setujui</button>
                                <button class="delete">Tolak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>B101</td>
                            <td>35</td>
                            <td>Ruang Kelas</td>
                            <td class="actions">
                                <button class="edit">Setujui</button>
                                <button class="delete">Tolak</button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
