<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transkrip</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }
        .header {
            background-color: #D3D3D3;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .title {
            font-size: 18px;
            font-weight: bold;
        }
        .header .user-info {
            display: flex;
            align-items: center;
        }
        .header .user-info i {
            margin-right: 5px;
        }
        .header .user-info span {
            margin-right: 10px;
        }

        .breadcrumb-container {
            padding: 0 20px;
            background-color: #f5f5f5;
        }

        .breadcrumb {
            margin: 0;
            padding: 10px 0;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .breadcrumb a {
            text-decoration: none;
            color: black;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .menu-container {
            padding: 0 30px;
            background-color: #f5f5f5;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .menu {
            display: flex;
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .menu li {
            margin-right: 20px;
        }

        .menu a {
            text-decoration: none;
            color: black;
            font-size: 14px;
            padding: 10px 20px;
            border-radius: 15px;
            display: inline-block;
        }

        .menu .active {
            background-color: #b0b0b0;
            color: white;
        }

        .main-content {
            max-width: 1300px; 
            margin: 20px auto; 
            padding: 20px;
            background-color: #D3D3D3;
            border-radius: 10px;
        }

        .content {
            display: flex;
            flex-direction: column; 
        }
        .content h5 {
            text-align: center;
            font-weight: bold;
        }
        .content p {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .table-container {
            margin-top: 10px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        thead {
            background-color: #D3D3D3;
        }

        h5 {
            margin-bottom: 20px; 
        }

        h6 {
            margin: 0; 
            font-weight: bold; 
        }

        th, td {
            text-align: center; 
        }

        .ip-section h6{
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .search-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            margin-top: 20px; /* Jarak antara Tombol Tambah dan input Cari Ruang */
            display: flex;
            align-items: center;
        }
        .search-section input {
            width: 200px;
            padding: 10px;
            border: 1px solid #C0C0C0;
            border-radius: 5px;
        }
        .search-section button {
            background-color: #C0C0C0;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        .keterangan {
            padding: 10px;
            margin: 10px;
        }

        .tombol {
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            width: 115px;
            margin-top: 20px; /* Menambah jarak antara Fungsi dan Tombol */
            display: block;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px; /* Memberi jarak antar setiap input */
        }

        label {
            width: 200px; /* Mengatur lebar label agar rata */
            margin-right: 10px; /* Memberi jarak antara label dan input */
        }

        input[type="text"],
        input[type="number"] {
            width: 200px; /* Mengatur lebar kotak input */
            padding: 5px;
        }


        @media (max-width: 1300px) {
            .content {
                gap: 20px;
            }
            .main-content {
                padding: 15px;
                margin: 20px;
            }
        }

        @media (max-width: 1000px) {
            .content {
                flex-direction: column;
                gap: 10px;
            }
            .main-content {
                padding: 15px;
                margin: 20px;
            }
        }

        @media (max-width: 480px) {
            .menu a {
                padding: 8px 15px;
                font-size: 12px;
            }
            .main-content {
                padding: 10px;
                margin: 10px;
            }a
            .content {
                gap: 15px;
            }
        }
    </style>
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
