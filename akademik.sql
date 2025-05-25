-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 02:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `queue_entries`
--

CREATE TABLE `queue_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tambah_dokter`
--

CREATE TABLE `tambah_dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_SIP` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tambah_dokter`
--

INSERT INTO `tambah_dokter` (`id`, `nama`, `nomor_SIP`, `tanggal_lahir`, `alamat`, `no_telpon`, `email`, `id_jurusan`) VALUES
(1, 'Dr. Andika', 'SIP123456', '1980-01-01', 'Jl. Melati No. 5', '08123456789', 'andika@example.com', 1),
(2, 'Najib', '234', '2025-05-13', 'Kocak123', '234', 'hagsdh@g.com', 2),
(3, 'Kocak', '123', '2025-05-14', 'asdasdadasdasd', '1123', 'asd@asd', 3),
(4, 'Dr.Stephen', '234', '2025-05-27', 'Jl.Merak', '1123', 'hekeb77709@luvnish.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tambah_pasien`
--

CREATE TABLE `tambah_pasien` (
  `nama` varchar(15) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tambah_pasien`
--

INSERT INTO `tambah_pasien` (`nama`, `umur`, `alamat`) VALUES
('arya', '000', 'gunungkidul'),
('arya', '000', 'gunungkidul'),
('Izza Arya Wibow', '000', 'gunungkidul'),
('sdf', '000', 'asd'),
('as', '000', 'asdasdadasdasd'),
('as', '23', 'asdasdadasdasd'),
('asd', '23', 'asdasdasdasd'),
('asd', '23', 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(8, 'Gigi'),
(9, 'Poli mata'),
(10, 'Bedah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `hakakses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hakakses`) VALUES
('piyxox', 'piyxox', 'admin'),
('admin', 'admin123', 'admin'),
('user', 'user123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `queue_entries`
--
ALTER TABLE `queue_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tambah_dokter`
--
ALTER TABLE `tambah_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `queue_entries`
--
ALTER TABLE `queue_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tambah_dokter`
--
ALTER TABLE `tambah_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
