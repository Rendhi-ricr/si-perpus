-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 08:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` text DEFAULT NULL,
  `alamat_anggota` text DEFAULT NULL,
  `nis_nisn` int(11) NOT NULL,
  `no_telp_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama_anggota`, `alamat_anggota`, `nis_nisn`, `no_telp_anggota`) VALUES
(4, 'Rendhi Richardo Ardiansyah', 'Subang', 123421, 2147483647),
(9, 'Erik Afandi', 'Subang', 2147483647, 1238761923);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `cover_buku` text DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `pengarang` text DEFAULT NULL,
  `penerbit` text DEFAULT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `ringkasan_buku` text DEFAULT NULL,
  `jumlah_salinan_tersedia` int(11) NOT NULL,
  `tanggal_input_buku` date NOT NULL DEFAULT current_timestamp(),
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `cover_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `ringkasan_buku`, `jumlah_salinan_tersedia`, `tanggal_input_buku`, `id_kategori`, `id_rak`) VALUES
(18, 'asijdasjd.png', 'Sangkuriang', 'asdasd', 'Sidu', 2018, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 12, '2023-05-09', 8, 5),
(19, 'images-removebg-preview.png', 'The Pragmatic Programmer: Your Journey to Mastery', 'Andrew Hunt, David Thomas', 'The Pragmatic Bookshelf', 2019, 'The Pragmatic Programmer merupakan salah satu buku programmer paling terkenal di dunia. Diterbitkan pertama kali tahun 1999, buku ini akan memberikan Anda segudang informasi berharga terkait dunia programming yang mudah untuk dipahami. Bahkan, di dalamnya juga terdapat tips dalam berkarir sebagai seorang programmer, lho!', 100, '1901-01-04', 9, 5),
(20, 'download.png', 'Structure and Interpretation of Computer Programs', 'Harold Abelson, Gerald Jay Sussman, Julie Sussman', 'Massachusetts Institute of Technology', 2021, 'Dikenal luas dengan sebutan SICP, buku ini dibuat berdasarkan materi kuliah programming di Massachusetts Institute of Technology (MIT). Dengan kata lain, buku ini ditulis oleh dosen-dosen andal kelas dunia. Jadi, jangan heran kalau pembahasan buku pemrograman ini benar-benar komplit dan mendalam.', 25, '1955-09-08', 10, 5),
(21, 'images__1_-removebg-preview.png', 'Code Complete: A Practical Handbook of Software Construction', 'Steve McConnel', 'aibhsdoash', 2012, 'Buku pemrograman ini sangat populer karena gaya penulisannya yang ringan sehingga mudah dipahami oleh siapa pun. Anda akan belajar mengenai coding, debugging, desain, testing, dan masih banyak lainnya.', 12, '1964-12-10', 8, 5),
(39, '2023-12-25.png', 'aiudsahgiduags', 'iusaghiudgasiug', 'iugsaiudgaius', 2012, 'aiushdiaushd', 123, '2024-04-17', 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `denda`) VALUES
(10, 12123),
(11, 12313),
(12, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detail_transaksi`
--

INSERT INTO `tbl_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_buku`) VALUES
(4, 19, 21),
(5, 20, 18),
(6, 20, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_histori_detail_transaksi`
--

CREATE TABLE `tbl_histori_detail_transaksi` (
  `id_histori_detail_transaksi` int(11) NOT NULL,
  `id_histori_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_histori_detail_transaksi`
--

INSERT INTO `tbl_histori_detail_transaksi` (`id_histori_detail_transaksi`, `id_histori_transaksi`, `id_buku`) VALUES
(23, 12, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_histori_transaksi`
--

CREATE TABLE `tbl_histori_transaksi` (
  `id_histori_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_histori_transaksi`
--

INSERT INTO `tbl_histori_transaksi` (`id_histori_transaksi`, `id_anggota`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES
(12, 4, '2024-05-02', '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(8, 'Pemrograman dasar'),
(9, 'Pemrograman Menengah'),
(10, 'Pemrograman Tingkat Lanjut');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` text DEFAULT NULL,
  `foto_petugas` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `password` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `foto_petugas`, `email`, `no_hp`, `password`) VALUES
(6, 'Rendhi Richardo Ardiansyah', 'WhatsApp Image 2023-11-17 at 19.11.05.jpeg', 'admin@gmail.com', 2147483647, '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(5, '1'),
(9, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status` enum('selesai','belum selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_anggota`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status`) VALUES
(19, 9, '2024-05-14', '2024-05-20', 'belum selesai'),
(20, 4, '2024-05-21', '2024-05-24', 'belum selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `password`, `email`, `level`) VALUES
(1, 'rendhi', '$2y$10$jKxh4HdUdAjn6RUIa8g1xu4me1ZV17VoMJfVdp5wj6wQpKV6J4gV.', 'rendhi@gmail.com', 0),
(2, 'rendhi', '$2y$10$AOPYnzomez66ZaoRy9Uv8.OPXELKNGkXehC.QGnLH/aM4TovT/F3e', 'rendhi@gmail.com', 0),
(3, 'rendhi1', '$2y$10$FfN3Z3BEKzgmf9P8ztmOcez6E5ZgStuw1jGlGFaPqkMTLAVBU5d32', 'rendhi@gmail.com', 0),
(4, 'rendhi1', '$2y$10$HL20NBXlRWAEkbyNkrzAMuKgivOKDQylK0uKxIPgqHQ2k.lvoZX5W', 'rendhi@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_rak` (`id_rak`),
  ADD KEY `id_rak_2` (`id_rak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `tbl_detail_transaksi_ibfk_2` (`id_transaksi`);

--
-- Indexes for table `tbl_histori_detail_transaksi`
--
ALTER TABLE `tbl_histori_detail_transaksi`
  ADD PRIMARY KEY (`id_histori_detail_transaksi`),
  ADD KEY `id_histori_transaksi` (`id_histori_transaksi`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tbl_histori_transaksi`
--
ALTER TABLE `tbl_histori_transaksi`
  ADD PRIMARY KEY (`id_histori_transaksi`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_histori_detail_transaksi`
--
ALTER TABLE `tbl_histori_detail_transaksi`
  MODIFY `id_histori_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_histori_transaksi`
--
ALTER TABLE `tbl_histori_transaksi`
  MODIFY `id_histori_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`),
  ADD CONSTRAINT `tbl_buku_ibfk_2` FOREIGN KEY (`id_rak`) REFERENCES `tbl_rak` (`id_rak`);

--
-- Constraints for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD CONSTRAINT `tbl_detail_transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`),
  ADD CONSTRAINT `tbl_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_histori_detail_transaksi`
--
ALTER TABLE `tbl_histori_detail_transaksi`
  ADD CONSTRAINT `tbl_histori_detail_transaksi_ibfk_1` FOREIGN KEY (`id_histori_transaksi`) REFERENCES `tbl_histori_transaksi` (`id_histori_transaksi`),
  ADD CONSTRAINT `tbl_histori_detail_transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`);

--
-- Constraints for table `tbl_histori_transaksi`
--
ALTER TABLE `tbl_histori_transaksi`
  ADD CONSTRAINT `tbl_histori_transaksi_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `tbl_anggota` (`id_anggota`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tbl_anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
