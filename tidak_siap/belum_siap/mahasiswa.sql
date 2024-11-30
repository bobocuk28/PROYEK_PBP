-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 02:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belum_siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_fakultas` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`nip`, `nama`, `email`, `password`, `id_fakultas`) VALUES
('NIP001', 'Dr. Andi Santoso', 'andi.santoso@example.com', 'password123', 1),
('NIP002', 'Prof. Budi Hartono', 'budi.hartono@example.com', 'securepass456', 2),
('NIP003', 'Ibu Citra Lestari', 'citra.lestari@example.com', 'mypassword789', 1),
('NIP004', 'Sdr. Dwi Prasetyo', 'dwi.prasetyo@example.com', 'passw0rd!', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(255) NOT NULL,
  `role` enum('pembimbing_akademik','ketua_prodi','dekan') NOT NULL,
  `id_fakultas` bigint(20) UNSIGNED DEFAULT NULL,
  `id_prodi` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_mulai` year(4) DEFAULT NULL,
  `periode_selesai` year(4) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `role`, `id_fakultas`, `id_prodi`, `periode_mulai`, `periode_selesai`, `nama`, `email`, `password`, `alamat`, `no_telpon`) VALUES
('12345', 'dekan', 1, 1, '2015', '2025', 'Dr. Ahmad Zain', 'ahmad.zain@university.ac.id', 'password123', 'Jl. tembalang No. 1', '08123456789'),
('12346', 'ketua_prodi', 1, 1, '2016', '2026', 'Prof. Budi Setiawan', 'budi.setiawan@university.ac.id', 'password456', 'Jl. tembalang No. 1', '08123456789'),
('12347', 'pembimbing_akademik', 1, 1, '2018', '2023', 'Dr. Citra Wulan', 'citra.wulan@university.ac.id', 'password789', 'Jl. tembalang No. 1', '08123456789'),
('12348', 'pembimbing_akademik', 1, 1, '2017', '2023', 'Dr. Doni Alamsyah', 'doni.alamsyah@university.ac.id', 'password101', 'Jl. tembalang No. 1', '08123456789'),
('12349', 'pembimbing_akademik', 1, 1, '2019', '2024', 'Prof. Eka Pratama', 'eka.pratama@university.ac.id', 'password202', 'Jl. tembalang No. 1', '08123456789'),
('12350', 'dekan', 1, 2, '2016', '2026', 'Dr. Fajar Hadi', 'fajar.hadi@university.ac.id', 'password303', 'Jl. tembalang No. 1', '08123456789'),
('12351', 'ketua_prodi', 1, 2, '2015', '2025', 'Prof. Gita Rahayu', 'gita.rahayu@university.ac.id', 'password404', 'Jl. tembalang No. 1', '08123456789'),
('12352', 'pembimbing_akademik', 1, 2, '2018', '2023', 'Dr. Haris Wijaya', 'haris.wijaya@university.ac.id', 'password505', 'Jl. tembalang No. 1', '08123456789'),
('12353', 'pembimbing_akademik', 1, 2, '2019', '2024', 'Prof. Ika Sari', 'ika.sari@university.ac.id', 'password606', 'Jl. tembalang No. 1', '08123456789'),
('12354', 'pembimbing_akademik', 1, 2, '2020', '2025', 'Dr. Joko Santoso', 'joko.santoso@university.ac.id', 'password707', 'Jl. tembalang No. 1', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` bigint(20) UNSIGNED NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Sains dan Matematika'),
(2, 'Fakultas Ilmu Sosial dan Politik'),
(3, 'Fakultas Teknik'),
(4, 'Fakultas Ekonomi'),
(5, 'Fakultas Kedokteran'),
(6, 'Fakultas Hukum'),
(7, 'Fakultas Pertanian'),
(8, 'Fakultas Psikologi'),
(9, 'Fakultas Pendidikan'),
(10, 'Fakultas Seni dan Desain');

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `id_irs` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `tahun_akademik` varchar(9) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `status_pengesahan` enum('disetujui','belum_disetujui') DEFAULT 'belum_disetujui',
  `nilai` enum('A','B','C','D','E') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `kode_mk` varchar(10) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_ruang` bigint(20) UNSIGNED DEFAULT NULL,
  `kapasitas` int(11) NOT NULL,
  `status` enum('disetujui','belum disetujui','ditolak','diajukan') NOT NULL DEFAULT 'belum disetujui',
  `id_prodi` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id_jadwal`, `kode_mk`, `hari`, `jam_mulai`, `jam_selesai`, `id_ruang`, `kapasitas`, `status`, `id_prodi`) VALUES
(13, 'IF101', 'Senin', '16:00:00', '19:00:00', 1, 30, 'belum disetujui', 1),
(15, 'IF103', 'Senin', '15:00:00', '18:00:00', 1, 30, 'belum disetujui', 1),
(16, 'IF201', 'Senin', '07:00:00', '10:00:00', 3, 30, 'belum disetujui', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_mk` varchar(10) DEFAULT NULL,
  `id_jadwal` bigint(20) UNSIGNED DEFAULT NULL,
  `wali_kelas_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_prodi` bigint(20) UNSIGNED DEFAULT NULL,
  `angkatan` year(4) NOT NULL,
  `status` enum('aktif','cuti','dropout','lulus') DEFAULT 'aktif',
  `wali_akademik_id` varchar(255) DEFAULT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `SkSk` int(11) DEFAULT NULL,
  `ipk` float(3,2) DEFAULT NULL,
  `semester` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_telepon`, `email`, `password`, `id_prodi`, `angkatan`, `status`, `wali_akademik_id`, `id_kelas`, `SkSk`, `ipk`, `semester`) VALUES
('1210101', 'Ali Mustofa', 'L', '2000-02-01', 'Jl. Raya No.1', '081234567890', 'ali.mustofa@student.university.ac.id', 'passwordAli', 1, '2018', 'aktif', '12349', NULL, NULL, NULL, NULL),
('1210102', 'Budi Santoso', 'L', '2000-03-02', 'Jl. Raya No.2', '081234567891', 'budi.santoso@student.university.ac.id', 'passwordBudi', 1, '2018', 'aktif', '12349', NULL, NULL, NULL, NULL),
('1210103', 'Citra Dewi', 'P', '2000-04-03', 'Jl. Raya No.3', '081234567892', 'citra.dewi@student.university.ac.id', 'passwordCitra', 1, '2018', 'aktif', '12347', NULL, NULL, NULL, NULL),
('1210104', 'Doni Pratama', 'L', '2000-05-04', 'Jl. Raya No.4', '081234567893', 'doni.pratama@student.university.ac.id', 'passwordDoni', 1, '2018', 'aktif', '12348', NULL, NULL, NULL, NULL),
('1210105', 'Eka Sari', 'P', '2000-06-05', 'Jl. Raya No.5', '081234567894', 'eka.sari@student.university.ac.id', 'passwordEka', 1, '2018', 'aktif', '12349', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tipe` enum('wajib','pilihan') DEFAULT 'wajib',
  `id_prodi` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`, `semester`, `tipe`, `id_prodi`) VALUES
('IF101', 'Algoritma dan Pemrograman', 3, 2, 'wajib', 1),
('IF102', 'Matematika Diskrit', 3, 1, 'wajib', 1),
('IF103', 'Dasar-Dasar Jaringan', 3, 2, 'wajib', 1),
('IF201', 'Struktur Data', 3, 2, 'wajib', 1),
('IF202', 'Sistem Operasi', 3, 2, 'wajib', 1),
('IF301', 'Basis Data', 3, 3, 'wajib', 1),
('IF302', 'Rekayasa Perangkat Lunak', 3, 3, 'wajib', 1),
('IF303', 'Pemrograman Web', 3, 4, 'wajib', 1),
('IF401', 'Kecerdasan Buatan', 3, 5, 'pilihan', 1),
('IF402', 'Keamanan Jaringan', 3, 5, 'pilihan', 1),
('IF501', 'TBO', 3, 5, 'wajib', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengampuan`
--

CREATE TABLE `pengampuan` (
  `kode_mk` varchar(10) NOT NULL,
  `nip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengampuan`
--

INSERT INTO `pengampuan` (`kode_mk`, `nip`) VALUES
('IF101', '12345'),
('IF101', '12347'),
('IF102', '12345'),
('IF102', '12346'),
('IF102', '12348'),
('IF201', '12348'),
('IF201', '12349'),
('IF202', '12349'),
('IF301', '12350'),
('IF302', '12350');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_prodi` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `id_fakultas` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_prodi`, `nama_prodi`, `id_fakultas`) VALUES
(1, 'Informatika', 1),
(2, 'Matematika', 1),
(3, 'Fisika', 1),
(4, 'Statistika', 1),
(5, 'Ilmu Komputer', 1),
(6, 'Ekonomi Pembangunan', 4),
(7, 'Akuntansi', 4),
(8, 'Manajemen', 4),
(9, 'Hukum', 6),
(10, 'Psikologi', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` bigint(20) UNSIGNED NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `id_fakultas` bigint(20) UNSIGNED DEFAULT NULL,
  `id_prodi` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('disetujui','belum disetujui','ditolak','diajukan') NOT NULL DEFAULT 'belum disetujui'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruang`, `kapasitas`, `id_fakultas`, `id_prodi`, `status`) VALUES
(1, 'Ruang A101', 40, 1, 1, 'disetujui'),
(2, 'Ruang A102', 45, 1, 1, 'disetujui'),
(3, 'Ruang A103', 50, 1, 1, 'disetujui'),
(4, 'Ruang B201', 30, 1, 2, 'disetujui'),
(5, 'Ruang B202', 40, 1, 2, 'disetujui'),
(6, 'Ruang C301', 25, 1, 1, 'disetujui'),
(7, 'Ruang C302', 35, 1, 2, 'disetujui'),
(8, 'Ruang D401', 50, 1, 1, 'disetujui'),
(9, 'Ruang D402', 60, 1, 1, 'disetujui'),
(10, 'Ruang E501', 45, 1, 1, 'disetujui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`id_irs`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `fk_jadwal_kuliah_id_prodi` (`id_prodi`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `wali_kelas_id` (`wali_kelas_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `wali_akademik_id` (`wali_akademik_id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `fk_mata_kuliah_id_prodi` (`id_prodi`);

--
-- Indexes for table `pengampuan`
--
ALTER TABLE `pengampuan`
  ADD PRIMARY KEY (`kode_mk`,`nip`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `irs`
--
ALTER TABLE `irs`
  MODIFY `id_irs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_prodi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akademik`
--
ALTER TABLE `akademik`
  ADD CONSTRAINT `akademik_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `program_studi` (`id_prodi`) ON DELETE CASCADE;

--
-- Constraints for table `irs`
--
ALTER TABLE `irs`
  ADD CONSTRAINT `irs_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `fk_jadwal_kuliah_id_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `program_studi` (`id_prodi`),
  ADD CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_kuliah_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id_ruang`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_kuliah` (`id_jadwal`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`wali_kelas_id`) REFERENCES `dosen` (`nip`) ON DELETE SET NULL;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `program_studi` (`id_prodi`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`wali_akademik_id`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `fk_mata_kuliah_id_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `program_studi` (`id_prodi`);

--
-- Constraints for table `pengampuan`
--
ALTER TABLE `pengampuan`
  ADD CONSTRAINT `pengampuan_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengampuan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE;

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE,
  ADD CONSTRAINT `ruangan_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `program_studi` (`id_prodi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
