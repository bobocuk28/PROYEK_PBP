<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\..\css\akademik\manajemen_ruangan.css">
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
            <a href="#">Informatika</a>
        </div>
    </div>

    <div>
        <h1 class="keterangan">Manajemen Ruangan</h1>
    </div>

    <!-- Menu Navigasi -->
    <div class="menu-container">
        <ul class="menu">
            <li><a href="#" class="active">Informatika</a></li>
            <li><a href="matematika.php">Matematika</a></li>
            <li><a href="biologi.php">Biologi</a></li>
            <li><a href="kimia.php">Kimia</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="main-content">
    <h6 style="text-align: center; margin-bottom: 20px;">BAGI RUANG</h6>
        <div class="content">
            <div class="form-group">
                <label for="nama-ruang">Kode Ruang:</label>
                <input type="text" id="nama-ruang" name="nama-ruang">
            </div>
            <div class="form-group">
                <label for="kuota">Kuota:</label>
                <input type="number" id="kuota" name="kuota" step="1">
            </div>

            <div class="form-group">
                <label for="fungsi">Fungsi:</label>
                <input type="text" id="fungsi" name="fungsi">
            </div>
            <button class="tombol">Tambah</button>

        <div class="search-section">
            <input type="text" placeholder="Cari ruang">
        </div>


            <div class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">DAFTAR PENGAJUAN RUANG</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Ruang</th>
                            <th>Kuota</th>
                            <th>Fungsi Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>A101</td>
                        <td>50</td>
                        <td>Ruang kelas</td>
                        <td class="actions">
                            <button class="edit">Edit</button>
                            <button class="delete">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>B102</td>
                        <td>52</td>
                        <td>Ruang kelas</td>
                        <td class="actions">
                            <button class="edit">Edit</button>
                            <button class="delete">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>A102</td>
                        <td>35</td>
                        <td>Ruang kelas</td>
                        <td class="actions">
                            <button class="edit">Edit</button>
                            <button class="delete">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>A103</td>
                        <td>40</td>
                        <td>Ruang kelas</td>
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
