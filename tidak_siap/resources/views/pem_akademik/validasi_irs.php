<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\..\css\pem_akademik\validasi_irs.css">
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
            <a href="#">Pengajuan</a>
        </div>
    </div>

    <div>
        <h1 class="keterangan">Validasi IRS</h1>
    </div>

    <!-- Menu Navigasi -->
    <div class="menu-container">
        <ul class="menu">
            <li><a href="#" class="active">Validasi IRS</a></li>
            <li><a href="pembatalan_irs.php">Pembatalan_IRS</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="content">
            <div class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">DAFTAR IRS MAHASISWA</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Dokumen IRS</th>
                            <th>Validasi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Agus</td>
                            <td>24060122110001</td>
                            <td>Informatika</td>
                            <td class="actions">
                                <button class="edit">Lihat</button>
                            </td>
                            <td class="actions">
                                <button class="edit">Setujui</button>
                                <button class="delete">Tolak</button>
                            </td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Surti</td>
                            <td>24060122110002</td>
                            <td>Informatika</td>
                            <td class="actions">
                                <button class="edit">Lihat</button>
                            </td>
                            <td class="actions">
                                <button class="edit">Setujui</button>
                                <button class="delete">Tolak</button>
                            </td>
                            <td>Jumlah SKS Melebihi Ketentuan</td>
                        </tr>
                        <tr>
                            <td>Budi</td>
                            <td>24060122110003</td>
                            <td>Informatika</td>
                            <td class="actions">
                                <button class="edit">Lihat</button>
                            </td>
                            <td class="actions">
                                <button class="edit">Setujui</button>
                                <button class="delete">Tolak</button>
                            </td>
                            <td>Mengambil Mata Kuliah Yang Tidak Diperbolehkan</td>
                        </tr>
                        <tr>
                            <td>Beti</td>
                            <td>24060122110004</td>
                            <td>Informatika</td>
                            <td class="actions">
                                <button class="edit">Lihat</button>
                            </td>
                            <td class="actions">
                                <button class="edit">Setujui</button>
                                <button class="delete">Tolak</button>
                            </td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
