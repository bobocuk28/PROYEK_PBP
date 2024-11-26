-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 24 Nov 2024 pada 14.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tidak_siap_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` enum('Informatika') NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `status_jabatan` enum('dosen','dosen wali','ketua program studi','ketua departemen','dekan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `email`, `password`, `nama`, `jurusan`, `alamat`, `no_telpon`, `status_jabatan`) VALUES
('1122334455', 'riko@lecture.ac.id', 'password012', 'Riko Ramadhan', 'Informatika', 'Jl. Pemuda No. 19, Solo', '080123456789', 'ketua program studi'),
('1234567890', 'budi@lecture.ac.id', 'password123', 'Budi Santoso', 'Informatika', 'Jl. Merdeka No. 10, Jakarta', '081234567890', 'dosen wali'),
('2345678901', 'rani@lecture.ac.id', 'password234', 'Rani Puspita', 'Informatika', 'Jl. Soekarno Hatta No. 20, Bandung', '082345678901', 'dosen'),
('3456789012', 'anto@lecture.ac.id', 'password345', 'Anto Prasetyo', 'Informatika', 'Jl. Raya No. 5, Surabaya', '083456789012', 'dosen'),
('4567890123', 'dina@lecture.ac.id', 'password456', 'Dina Lestari', 'Informatika', 'Jl. Merdeka No. 15, Semarang', '084567890123', 'dosen wali'),
('5678901234', 'faisal@lecture.ac.id', 'password567', 'Faisal Reza', 'Informatika', 'Jl. Pahlawan No. 10, Yogyakarta', '085678901234', 'dosen'),
('6789012345', 'nina@lecture.ac.id', 'password678', 'Nina Saraswati', 'Informatika', 'Jl. Cendana No. 7, Medan', '086789012345', 'dosen wali'),
('7890123456', 'yudi@lecture.ac.id', 'password789', 'Yudi Kurniawan', 'Informatika', 'Jl. Sudirman No. 25, Bali', '087890123456', 'dosen'),
('8901234567', 'andi@lecture.ac.id', 'password890', 'Andi Prabowo', 'Informatika', 'Jl. Jendral No. 8, Malang', '088901234567', 'dosen wali'),
('9012345678', 'melissa@lecture.ac.id', 'password901', 'Melissa Tanjung', 'Informatika', 'Jl. Pahlawan No. 14, Pekanbaru', '089012345678', 'dosen'),
('9876543210', 'email_baru@lecture.ac.id', 'password123', 'Dr. Hendra Prasetya', 'Informatika', 'Jl. Raya No. 12, Bandung', '08123456789', 'dekan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` enum('Informatika') NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `status` enum('aktif','cuti','proses penentuan status') NOT NULL DEFAULT 'proses penentuan status',
  `total_sks` int(11) NOT NULL,
  `ip_semester` float(3,2) NOT NULL,
  `ipk` float(3,2) NOT NULL,
  `semester` int(11) NOT NULL,
  `dosen_wali` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `email`, `password`, `nama`, `jurusan`, `alamat`, `no_telpon`, `status`, `total_sks`, `ip_semester`, `ipk`, `semester`, `dosen_wali`) VALUES
('112233445566', 'dina@student.ac.id', 'dinaPass012', 'Dina Nabila', 'Informatika', 'Jl. Pemuda No. 13, Bali', '080123456012', 'aktif', 25, 3.60, 3.80, 7, '5678901234'),
('123456789012', 'ali@student.ac.id', 'aliPass123', 'Ali Akbar', 'Informatika', 'Jl. Kebon Jeruk No. 15, Jakarta', '081234567123', 'proses penentuan status', 24, 3.60, 3.50, 5, '1234567890'),
('234567890123', 'siti@student.ac.id', 'sitiPass234', 'Siti Zulaikha', 'Informatika', 'Jl. Sejahtera No. 3, Bandung', '082345678234', 'proses penentuan status', 18, 3.80, 3.75, 4, '1234567890'),
('345678901234', 'dedi@student.ac.id', 'dediPass345', 'Dedi Pramono', 'Informatika', 'Jl. Pahlawan No. 6, Surabaya', '083456789345', 'proses penentuan status', 10, 2.90, 2.80, 3, '2345678901'),
('456789012345', 'rani@student.ac.id', 'raniPass456', 'Rani Wijaya', 'Informatika', 'Jl. Raya No. 5, Bogor', '084567890456', 'proses penentuan status', 20, 3.55, 3.60, 6, '2345678901'),
('567890123456', 'peter@student.ac.id', 'peterPass567', 'Peter Gunawan', 'Informatika', 'Jl. Merdeka No. 12, Bandung', '085678901567', 'proses penentuan status', 22, 3.70, 3.85, 7, '3456789012'),
('678901234567', 'lina@student.ac.id', 'linaPass678', 'Lina Sari', 'Informatika', 'Jl. Cendana No. 8, Medan', '086789012678', 'proses penentuan status', 26, 3.90, 3.90, 8, '3456789012'),
('789012345678', 'indah@student.ac.id', 'indahPass789', 'Indah Pratiwi', 'Informatika', 'Jl. Sudirman No. 18, Jakarta', '087890123789', 'proses penentuan status', 30, 3.80, 3.70, 9, '4567890123'),
('890123456789', 'rahma@student.ac.id', 'rahmaPass890', 'Rahma Putri', 'Informatika', 'Jl. Merdeka No. 10, Yogyakarta', '088901234890', 'proses penentuan status', 12, 2.85, 2.90, 2, '4567890123'),
('901234567890', 'fadil@student.ac.id', 'fadilPass901', 'Fadil Azmi', 'Informatika', 'Jl. Jendral No. 9, Surabaya', '089012345901', 'proses penentuan status', 28, 3.50, 3.65, 6, '5678901234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mata_kuliah` varchar(10) NOT NULL,
  `nama_mata_kuliah` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mata_kuliah`, `nama_mata_kuliah`, `sks`, `semester`) VALUES
('PAIK001', 'Dasar Pemrograman', 3, 1),
('PAIK002', 'Struktur Diskrit', 3, 1),
('PAIK003', 'Logika Informatika', 3, 1),
('PAIK004', 'Matematika 1', 3, 1),
('PAIK005', 'Dasar Sistem', 2, 1),
('PAIK006', 'Algoritma dan Pemrograman', 3, 2),
('PAIK007', 'Aljabar Linear', 3, 2),
('PAIK008', 'Organisasi dan Arsitektur Komputer', 3, 2),
('PAIK009', 'Matematika 2', 3, 2),
('PAIK010', 'Struktur Data', 3, 3),
('PAIK011', 'Metode Numerik', 3, 3),
('PAIK012', 'Sistem Operasi', 3, 3),
('PAIK013', 'Interaksi Manusia dan Komputer', 3, 3),
('PAIK014', 'Basis Data', 3, 3),
('PAIK015', 'Statistika', 2, 3),
('PAIK016', 'Pemrograman Berbasis Objek', 3, 4),
('PAIK017', 'Grafika dan Komputasi Visual', 3, 4),
('PAIK018', 'Jaringan Komputer', 3, 4),
('PAIK019', 'Rekayasa Perangkat Lunak', 3, 4),
('PAIK020', 'Manajemen Basis Data', 3, 4),
('PAIK021', 'Sistem Cerdas', 3, 4),
('PAIK022', 'Sistem Informasi', 3, 5),
('PAIK023', 'Proyek Perangkat Lunak', 3, 5),
('PAIK024', 'Keamanan dan Jaminan Informasi', 3, 5),
('PAIK025', 'Pengembangan Berbasis Platform', 3, 5),
('PAIK026', 'Komputasi Tersebar dan Pararel', 3, 5),
('PAIK027', 'Pembelajaran Mesin', 3, 5),
('PAIK028', 'Masyarakat dan Etika Profesi', 2, 6),
('PAIK029', 'Manajemen Proyek', 3, 6),
('PAIK030', 'Analisis dan Strategi Algoritma', 3, 6),
('PAIK031', 'Uji Perangkat Lunak', 3, 6),
('PAIK032', 'Teori Bahasa dan Otomata', 3, 7),
('PAIK033', 'Metodologi dan Penulisan Ilmiah', 2, 7),
('PAIK034', 'Tugas Akhir', 6, 8),
('UUW001', 'Bahasa Inggris', 2, 1),
('UUW002', 'Olah Raga', 1, 1),
('UUW003', 'Pancasila dan Kewarganegaraan', 2, 1),
('UUW004', 'Bahasa Indonesia', 2, 2),
('UUW005', 'Pendidikan Agama', 2, 2),
('UUW006', 'Internet of Things', 2, 2),
('UUW007', 'Kewirausahaan', 2, 5),
('UWN001', 'Praktik Kerja Lapangan', 6, 6),
('UWN002', 'Kuliah Kerja Nyata', 6, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah_dosen`
--

CREATE TABLE `mata_kuliah_dosen` (
  `id` int(11) NOT NULL,
  `kode_mata_kuliah` varchar(10) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah_dosen`
--

INSERT INTO `mata_kuliah_dosen` (`id`, `kode_mata_kuliah`, `nip`) VALUES
(1, 'PAIK001', '1234567890'),
(2, 'PAIK001', '2345678901'),
(3, 'PAIK001', '3456789012'),
(4, 'PAIK002', '1234567890'),
(5, 'PAIK002', '2345678901'),
(6, 'PAIK002', '3456789012'),
(7, 'PAIK003', '1234567890'),
(8, 'PAIK003', '2345678901'),
(9, 'PAIK003', '3456789012'),
(10, 'PAIK004', '1234567890'),
(11, 'PAIK004', '2345678901'),
(12, 'PAIK004', '3456789012'),
(23, 'PAIK005', '1234567890'),
(24, 'PAIK005', '2345678901'),
(25, 'PAIK005', '3456789012'),
(26, 'PAIK006', '1234567890'),
(27, 'PAIK006', '2345678901'),
(28, 'PAIK006', '3456789012'),
(29, 'PAIK007', '1234567890'),
(30, 'PAIK007', '2345678901'),
(31, 'PAIK007', '3456789012'),
(32, 'PAIK008', '1234567890'),
(33, 'PAIK008', '2345678901'),
(34, 'PAIK008', '3456789012'),
(37, 'PAIK009', '1234567890'),
(38, 'PAIK009', '2345678901'),
(39, 'PAIK009', '3456789012'),
(40, 'PAIK010', '1234567890'),
(41, 'PAIK010', '2345678901'),
(42, 'PAIK010', '3456789012'),
(43, 'PAIK011', '1234567890'),
(44, 'PAIK011', '2345678901'),
(45, 'PAIK011', '3456789012'),
(46, 'PAIK012', '1234567890'),
(47, 'PAIK012', '2345678901'),
(48, 'PAIK012', '3456789012'),
(51, 'PAIK013', '1234567890'),
(52, 'PAIK013', '2345678901'),
(53, 'PAIK013', '3456789012'),
(54, 'PAIK014', '1234567890'),
(55, 'PAIK014', '2345678901'),
(56, 'PAIK014', '3456789012'),
(57, 'PAIK015', '1234567890'),
(58, 'PAIK015', '2345678901'),
(59, 'PAIK015', '3456789012'),
(60, 'PAIK016', '1234567890'),
(61, 'PAIK016', '2345678901'),
(62, 'PAIK016', '3456789012'),
(63, 'PAIK017', '1234567890'),
(64, 'PAIK017', '2345678901'),
(65, 'PAIK017', '3456789012'),
(66, 'PAIK018', '1234567890'),
(67, 'PAIK018', '2345678901'),
(68, 'PAIK018', '3456789012'),
(69, 'PAIK019', '1234567890'),
(70, 'PAIK019', '2345678901'),
(71, 'PAIK019', '3456789012'),
(72, 'PAIK020', '1234567890'),
(73, 'PAIK020', '2345678901'),
(74, 'PAIK020', '3456789012'),
(13, 'UUW001', '1234567890'),
(14, 'UUW001', '2345678901'),
(15, 'UUW002', '1234567890'),
(16, 'UUW002', '2345678901'),
(17, 'UUW003', '1234567890'),
(18, 'UUW003', '2345678901'),
(19, 'UUW004', '1234567890'),
(20, 'UUW004', '2345678901'),
(21, 'UUW005', '1234567890'),
(22, 'UUW005', '2345678901'),
(35, 'UUW006', '1234567890'),
(36, 'UUW006', '2345678901'),
(49, 'UUW007', '1234567890'),
(50, 'UUW007', '2345678901');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah_ruang`
--

CREATE TABLE `mata_kuliah_ruang` (
  `id` int(11) NOT NULL,
  `kode_mata_kuliah` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `ruang_kelas_id` int(11) NOT NULL,
  `status` enum('proses persetujuan','disetujui','ditolak') DEFAULT 'proses persetujuan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah_ruang`
--

INSERT INTO `mata_kuliah_ruang` (`id`, `kode_mata_kuliah`, `kelas`, `ruang_kelas_id`, `status`) VALUES
(1, 'PAIK001', 'Kelas A', 1, 'disetujui'),
(2, 'PAIK001', 'Kelas B', 2, 'disetujui'),
(3, 'PAIK002', 'Kelas A', 3, 'disetujui'),
(4, 'PAIK002', 'Kelas B', 4, 'ditolak'),
(5, 'PAIK003', 'Kelas A', 5, 'proses persetujuan'),
(6, 'PAIK003', 'Kelas B', 6, 'proses persetujuan'),
(7, 'PAIK004', 'Kelas A', 7, 'proses persetujuan'),
(8, 'PAIK004', 'Kelas B', 8, 'proses persetujuan'),
(9, 'PAIK005', 'Kelas A', 9, 'proses persetujuan'),
(10, 'PAIK005', 'Kelas B', 10, 'proses persetujuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan_mata_kuliah`
--

CREATE TABLE `pilihan_mata_kuliah` (
  `id_pilihan` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `id_mata_kuliah_ruang` int(11) NOT NULL,
  `waktu_pilih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_kelas`
--

CREATE TABLE `ruang_kelas` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(10) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`id`, `nama_ruang`, `hari`, `jam_mulai`, `jam_selesai`, `kapasitas`) VALUES
(1, 'RuangA101', 'Senin', '08:00:00', '10:00:00', 40),
(2, 'RuangA102', 'Senin', '10:00:00', '12:00:00', 35),
(3, 'RuangA103', 'Selasa', '08:00:00', '10:00:00', 50),
(4, 'RuangB101', 'Rabu', '08:00:00', '10:00:00', 30),
(5, 'RuangB102', 'Kamis', '10:00:00', '12:00:00', 40),
(6, 'RuangB103', 'Jumat', '08:00:00', '10:00:00', 50),
(7, 'RuangE101', 'Senin', '08:00:00', '10:00:00', 35),
(8, 'RuangE102', 'Selasa', '10:00:00', '12:00:00', 45),
(9, 'RuangK101', 'Rabu', '08:00:00', '10:00:00', 50),
(10, 'RuangK102', 'Kamis', '10:00:00', '12:00:00', 30);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `dosen_wali` (`dosen_wali`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mata_kuliah`);

--
-- Indeks untuk tabel `mata_kuliah_dosen`
--
ALTER TABLE `mata_kuliah_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_mata_kuliah_dosen` (`kode_mata_kuliah`,`nip`),
  ADD UNIQUE KEY `unique_mata_kuliah_dosen` (`kode_mata_kuliah`,`nip`),
  ADD UNIQUE KEY `kode_mata_kuliah` (`kode_mata_kuliah`,`nip`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `mata_kuliah_ruang`
--
ALTER TABLE `mata_kuliah_ruang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_mata_kuliah` (`kode_mata_kuliah`),
  ADD KEY `ruang_kelas_id` (`ruang_kelas_id`);

--
-- Indeks untuk tabel `pilihan_mata_kuliah`
--
ALTER TABLE `pilihan_mata_kuliah`
  ADD PRIMARY KEY (`id_pilihan`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_mata_kuliah_ruang` (`id_mata_kuliah_ruang`);

--
-- Indeks untuk tabel `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_ruang` (`nama_ruang`,`hari`,`jam_mulai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah_dosen`
--
ALTER TABLE `mata_kuliah_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah_ruang`
--
ALTER TABLE `mata_kuliah_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pilihan_mata_kuliah`
--
ALTER TABLE `pilihan_mata_kuliah`
  MODIFY `id_pilihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`dosen_wali`) REFERENCES `dosen` (`nip`);

--
-- Ketidakleluasaan untuk tabel `mata_kuliah_dosen`
--
ALTER TABLE `mata_kuliah_dosen`
  ADD CONSTRAINT `mata_kuliah_dosen_ibfk_1` FOREIGN KEY (`kode_mata_kuliah`) REFERENCES `mata_kuliah` (`kode_mata_kuliah`),
  ADD CONSTRAINT `mata_kuliah_dosen_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Ketidakleluasaan untuk tabel `mata_kuliah_ruang`
--
ALTER TABLE `mata_kuliah_ruang`
  ADD CONSTRAINT `mata_kuliah_ruang_ibfk_1` FOREIGN KEY (`kode_mata_kuliah`) REFERENCES `mata_kuliah` (`kode_mata_kuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mata_kuliah_ruang_ibfk_2` FOREIGN KEY (`ruang_kelas_id`) REFERENCES `ruang_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pilihan_mata_kuliah`
--
ALTER TABLE `pilihan_mata_kuliah`
  ADD CONSTRAINT `pilihan_mata_kuliah_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pilihan_mata_kuliah_ibfk_2` FOREIGN KEY (`id_mata_kuliah_ruang`) REFERENCES `mata_kuliah_ruang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
