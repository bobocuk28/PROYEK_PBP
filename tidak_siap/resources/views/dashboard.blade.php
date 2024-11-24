<?php
// Mulai session
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #d3d3d3;
            padding: 10px 20px;
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
            margin-right: 10px;
        }
        .header .user-info .user-name {
            margin-right: 10px;
        }
        .header .user-info .dropdown {
            cursor: pointer;
        }
        .container {
            padding: 20px;
        }
        .dashboard-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .profile {
            display: flex;
            align-items: center;
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .profile i {
            font-size: 50px;
            margin-right: 20px;
        }
        .info-box {
            background-color: #d3d3d3;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .info-box i {
            font-size: 20px;
            margin-right: 10px;
        }
        .info-box .info-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .info-box .info-content {
            font-size: 14px;
        }
        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .button {
            background-color: #d3d3d3;
            padding: 20px;
            border-radius: 5px;
            flex: 1 1 calc(33.333% - 20px);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
        }
        .button i {
            font-size: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Tidak Siap</div>
        <div class="user-info">
            <i class="fas fa-bell"></i>
            <div class="user-name"><?= $_SESSION['user']['username']; ?></div>
            <div class="dropdown"><i class="fas fa-chevron-down"></i></div>
        </div>
    </div>
    <div class="container">
        <div class="dashboard-title">Dashboard</div>
        <div class="profile">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="info-box">
            <div class="info-title"><i class="fas fa-info-circle"></i> Informasi Pribadi</div>
            <div class="info-content">
                Nama : Mulyadi S.T.,M.Cs<br>
                NIP : 12345678910<br>
                Jabatan : Dosen Wali<br>
                Fakultas : Fakultas Sains Matematika<br>
                Periode Akademik : 2024/2025
            </div>
        </div>
        <div class="buttons">
            <div class="button"><i class="fas fa-folder"></i> Bimbingan Akademik</div>
            <div class="button"><i class="fas fa-book"></i> Manajemen Mata Kuliah</div>
            <div class="button"><i class="fas fa-file-alt"></i> Laporan dan KHS</div>
            <div class="button"><i class="fas fa-tasks"></i> Pengelolaan IRS</div>
            <div class="button"><i class="fas fa-building"></i> Manajemen Ruangan</div>
            <div class="button"><i class="fas fa-envelope"></i></div>
        </div>
    </div>
</body>
</html>
