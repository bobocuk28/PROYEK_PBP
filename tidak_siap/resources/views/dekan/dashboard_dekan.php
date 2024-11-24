<html>
<head>
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
        .profile-photo {
            /* background-color: #f54242; */
            margin-right: 20px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-size: cover; 
            background-position: center; 
            background-image: url('pics/profil.jfif'); 
        }
        .profile-info {
            font-size: 18px;
        }
        .status-section {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .status-box {
            background-color: #d3d3d3;
            border-radius: 8px;
            padding: 20px;
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .academic-box {
            background-color: #d3d3d3;
            border-radius: 8px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .status-title, .academic-title {
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .fas.fa-university {
            font-size: 20px; 
        }
        .fas.fa-user {
            font-size: 24px; 
            margin-right: 5px;
            margin-left: 10px;
        }
        .dosen-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .dosen-details {
            display: flex;
            flex-direction: column;
            line-height: 1.5;
        }
        .status-label {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-weight: bold;
        }
        .academic-title i, .status-title i {
            font-size: 18px;
            padding-left: 10px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-top: 10px; /* Menambahkan jarak ke bawah */
        }
        .info-row div {
            flex: 1;
            text-align: center;
            font-size: 14px;
        }
        .info-row.second-row div {
            font-size: 18px;
        }
        
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #d3d3d3;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            flex: 1;
            text-decoration: none; 
            color: inherit; 
        }
        .button i {
            font-size: 20px;
            margin-bottom: 5px;  
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Tidak Siap</div>
        <div class="user-info">
            <i class="fas fa-bell"></i>
            <div class="user-name">BUDI WIDODO</div>
            <div class="dropdown"><i class="fas fa-chevron-down"></i></div>
        </div>
    </div>
    <div class="container">
        <div class="dashboard-title">Dashboard</div>
        <div class="profile">
            <div class="profile-photo"></div>
            <div class="profile-info">
                <div><strong>BUDI WIDODO</strong></div>
                <div>NIM: 24060122100000</div>
            </div>
        </div>

        <div class="status-section">
            <div class="status-box">
                <div class="status-title"><i class="fas fa-university"></i> Status Akademik</div>
                <div class="dosen-info">
                    <i class="fas fa-user"></i>
                    <div class="dosen-details">
                        <div><strong>NIP:</strong> 12345678910</div>
                        <div><strong>Fakultas:</strong> Sains dan Matematika</div>
                        <div><strong>Jabatan:</strong> Dekan</div>
                    </div>
                </div>
                <div class="info-row">
                    <div>Semester Akademik Sekarang</div>
                </div>
                <div class="info-row second-row">
                    <div class="info">2024/2025 Ganjil</div>
                </div>
            </div>
        </div>

        <div class="buttons">
            <a href="persetujuan_ruangan.php" class="button"><i class="fas fa-university"></i>Persetujuan</a>
        </div>
    </div>
</body>
</html>