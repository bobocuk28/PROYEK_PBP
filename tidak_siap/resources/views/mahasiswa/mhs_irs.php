<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penetapan Ruang Kuliah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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

        .breadcrumb span {
            margin-left: 5px;
            margin-right: 5px;
            color: black;
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

        .menu a:hover {
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

        .semester {
            cursor: pointer;
            background-color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-container {
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
            }
            .content {
                gap: 15px;
            }
        }
    </style>
    <script>
        function toggleTable(semester) {
            var table = document.getElementById(semester + '-tabel');
            if (table.style.display === 'none' || table.style.display === '') {
                table.style.display = 'block'; // Show tabel
            } else {
                table.style.display = 'none'; // Hide tabel
            }
        }
    </script>
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
            <a href="#">IRS</a>
        </div>
    </div>

    <!-- Menu Navigasi -->
    <div class="menu-container">
        <ul class="menu">
            <li><a href="buat_irs.php">Buat IRS</a></li>
            <li><a href="#" class="active">IRS</a></li>
            <li><a href="mhs_khs.php">KHS</a></li>
            <li><a href="mhs_transkrip.php">Transkrip</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="content">
            <h5>Isian Rencana Studi (IRS)</h5>
            <div class="semester" onclick="toggleTable('semester1')">
                <h6>Semester-1 | Tahun Ajaran 2022/2023 Ganjil</h6>
                <p>Jumlah SKS: 22</p>
            </div>
            <div id="semester1-tabel" class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">IRS Mahasiswa (Sudah Disetujui Wali)</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama MatKul</th>
                            <th>Kelas</th>
                            <th>SKS</th>
                            <th>Ruang</th>
                            <th>Status</th>
                            <th>Nama Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                    </tbody>
                </table>
                <button class="tombol">Batalkan</button>
            </div>
            <div class="semester" onclick="toggleTable('semester2')">
                <h6>Semester-2 | Tahun Ajaran 2022/2023 Genap</h6>
                <p>Jumlah SKS: 22</p>
            </div>
            <div id="semester2-tabel" class="table-container">
                <h6 style="text-align: center; margin-bottom: 20px;">IRS Mahasiswa (Sudah Disetujui Wali)</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama MatKul</th>
                            <th>Kelas</th>
                            <th>SKS</th>
                            <th>Ruang</th>
                            <th>Status</th>
                            <th>Nama Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                            <td>....</td>
                        </tr>
                    </tbody>
                </table>
                <button class="tombol">Batalkan</button>
            </div>

        </div>
    </div>
</body>
</html>