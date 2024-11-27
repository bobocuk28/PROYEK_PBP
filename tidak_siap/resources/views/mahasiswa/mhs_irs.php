<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penetapan Ruang Kuliah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="..\..\css\mahasiswa\mhs_irs.css">
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
