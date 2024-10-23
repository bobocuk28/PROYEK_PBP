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
            gap: 20px; 
        }

        .left-content {
            flex: 1;
            padding: 20px;
        }

        .left-content .box {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            
        }
        
        .info-box hr {
            border: 1px solid black;
        }

        .info-box p {
            margin: 5px 0;
            text-align: justify;
        }

        .info-box .highlight {
            font-weight: bold;
        }

        .isi-irs {
            padding: 5px;
            margin-bottom: 10px;
            display: flex;
            align-items: center; 
        }

        .isi-irs a {
            margin-right: 10px; 
            font-size: 16px;
            color: black;
        }
            
        .mata-kuliah {
            background-color: white;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .dropdown {
            margin-bottom: 10px;
        }

        thead {
            background-color: #D3D3D3;
        }

        h6 {
            margin-top: 20px; 
            font-weight: 500;
        }
        h6 i{
            margin-right: 10px;
        }
        .mata-kuliah ul {
            list-style-type: none;
            padding-left: 0;
        }
        .btn-outline-danger {
            margin-left: 15%;
        }
        .right-content {
            flex: 2; 
            padding: 20px;
        }

        .right-content .box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
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
            <li><a href="#" class="active">Buat IRS</a></li>
            <li><a href="mhs_irs.php">IRS</a></li>
            <li><a href="mhs_khs.php">KHS</a></li>
            <li><a href="mhs_transkrip.php">Transkrip</a></li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        <div class="content">
            <!-- Konten Kiri -->
            <div class="left-content">
            <div class="box info-box">
                    <p>Nama : <span class="highlight">Budi Widodo</span></p>
                    <p>NIM : <span class="highlight">246021220001</span></p>
                    <hr>
                    <p>Th. Ajaran : <span class="highlight">2024/2025</span></p>
                    <p>Ganjil/Genap : <span class="highlight">GANJIL</span></p>
                    <p>Mata Kuliah Ditawarkan : <span class="highlight">SMT 5</span></p>
                    <p>IPK (Kumulatif) : 3.99</span></p>
                    <p>IPS (Semester lalu) : 4.00</span></p>
                    <p>Max. Beban SKS (Saat ini) : 24</span></p>
                </div>

                <div class="box">
                    <div class="isi-irs">
                        <a href="#"><i class="fas fa-sync-alt"></i><strong> Refresh IRS</strong></a> 
                    </div>
                    <div class="dropdown">
                        <select class="form-select">
                            <option selected>Pilih Mata Kuliah</option>
                            <option value="1">Mata Kuliah 1</option>
                            <option value="2">Mata Kuliah 2</option>
                        </select>
                    </div>
                        <h6><i class="fas fa-book"></i>   Mata Kuliah Ditampilkan</h6>
                        <hr>
                    <div class="mata-kuliah">
                        <ul>
                            <li id="matakuliah">Proyek Perangkat Lunak (WAJIB) (MK2020) (SMT 5) (3 SKS) <button type="button" class="btn btn-outline-danger"> <i class="fas fa-trash"></i></button></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Konten Kanan -->
            <div class="right-content">
                <div class="box">
                    <div class="table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                                <th>Sabtu</th>
                                <th>Minggu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>06:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>07:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>08:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>09:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>10:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>11:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>12:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>13:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>14:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>15:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>16:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>17:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>18:00</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <button class="btn btn-primary">Minta Persetujuan</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
