-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 01:13 AM
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
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_karyawan`
--

CREATE TABLE `calon_karyawan` (
  `id_calonkaryawan` varchar(100) NOT NULL,
  `id_jabatan` varchar(100) NOT NULL,
  `nama_calonkaryawan` varchar(100) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_seleksi`
--

CREATE TABLE `hasil_seleksi` (
  `id_hasil` int(100) NOT NULL,
  `id_calonkaryawan` varchar(100) NOT NULL,
  `id_penguji` varchar(100) NOT NULL,
  `keputusan` enum('pending','lolos','tidak lolos') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(30) NOT NULL,
  `nama_jabatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(30) NOT NULL,
  `kategori_karyawan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` varchar(30) NOT NULL,
  `jenis_kontrak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengelolaan_sk`
--

CREATE TABLE `pengelolaan_sk` (
  `id_sk` varchar(30) NOT NULL,
  `id_karyawan` varchar(30) NOT NULL,
  `id_jabatan` varchar(30) NOT NULL,
  `id_kategori` varchar(30) NOT NULL,
  `id_kontrak` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `kategori_karyawan` varchar(50) NOT NULL,
  `jenis_kontrak` varchar(50) NOT NULL,
  `tanggal_kontrak_mulai` date NOT NULL,
  `tanggal_berakhir_kontrak` date NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `nama_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `pengelolaan_sk`
--
DELIMITER $$
CREATE TRIGGER `after_insert_pengelolaan_sk` AFTER INSERT ON `pengelolaan_sk` FOR EACH ROW BEGIN
    INSERT INTO validasi (id_sk, status)
    VALUES (NEW.id_sk, 'pending');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penguji_seleksi`
--

CREATE TABLE `penguji_seleksi` (
  `id_penguji` varchar(100) NOT NULL,
  `id_calonkaryawan` varchar(100) NOT NULL,
  `nama_calonkaryawan` varchar(100) NOT NULL,
  `nama_penguji` varchar(100) NOT NULL,
  `status` enum('pending','disetujui','ditolak') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` varchar(30) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
('1', 'Hrd'),
('2', 'Direktur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(30) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `id_role`) VALUES
('US01', 'Hrd', 'hrd@example.com', 'hrd', '1'),
('US02', 'Direktur', 'direktur@example.com', 'direktur', '2');

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `id_sk` varchar(30) NOT NULL,
  `status` enum('pending','disetujui','ditolak') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `validasi`
--

INSERT INTO `validasi` (`id_sk`, `status`) VALUES
('SK01', 'disetujui'),
('SK01', 'disetujui'),
('SK01', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  ADD PRIMARY KEY (`id_calonkaryawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  ADD PRIMARY KEY (`id_hasil`),
  ADD UNIQUE KEY `id_calonkaryawan` (`id_calonkaryawan`) USING BTREE,
  ADD KEY `id_penguji` (`id_penguji`);

--
-- Indexes for table `penguji_seleksi`
--
ALTER TABLE `penguji_seleksi`
  ADD KEY `id_calonkaryawan` (`id_calonkaryawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  MODIFY `id_hasil` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_seleksi`
--
ALTER TABLE `hasil_seleksi`
  ADD CONSTRAINT `hasil_seleksi_ibfk_1` FOREIGN KEY (`id_calonkaryawan`) REFERENCES `calon_karyawan` (`id_calonkaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penguji_seleksi`
--
ALTER TABLE `penguji_seleksi`
  ADD CONSTRAINT `penguji_seleksi_ibfk_1` FOREIGN KEY (`id_calonkaryawan`) REFERENCES `calon_karyawan` (`id_calonkaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
