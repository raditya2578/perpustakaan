-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 04:56 AM
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
-- Database: `digitalibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `bukuid` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahunterbit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`bukuid`, `judul`, `penulis`, `penerbit`, `tahunterbit`) VALUES
(1, 'Negeri Di Ujung Tanduk', 'Tere Liye', 'Gramedia', 2021),
(5, 'Daun Yang Jatuh Tak Pernah Membenci Angin', 'Tere Liye', 'Gramedia', 2022),
(8, 'Si Anak Cahayaaaa', 'Tere Liye', 'Gramedia', 2020),
(10, 'The Goo Goo Dols', 'Georgee', 'The Alchemy', 1995);

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `kategoriid` int(11) NOT NULL,
  `namakategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`kategoriid`, `namakategori`) VALUES
(1, 'Ilmiah'),
(2, 'Aksi'),
(4, 'Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `kategoribukuid` int(11) NOT NULL,
  `bukuid` int(11) DEFAULT NULL,
  `kategoriid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`kategoribukuid`, `bukuid`, `kategoriid`) VALUES
(6, 1, 1),
(8, 5, 2),
(9, 8, 1),
(10, 8, 2),
(11, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `koleksiid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `bukuid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`koleksiid`, `userid`, `bukuid`) VALUES
(6, 1, 1),
(4, 1, 5),
(10, 2, 5),
(11, 2, 8),
(12, 7, 1),
(13, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjamanid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `bukuid` int(11) DEFAULT NULL,
  `tanggalpeminjaman` date DEFAULT NULL,
  `tanggalpengembalian` date DEFAULT NULL,
  `statuspeminjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjamanid`, `userid`, `bukuid`, `tanggalpeminjaman`, `tanggalpengembalian`, `statuspeminjaman`) VALUES
(7, 1, 1, '2024-04-22', '2024-04-22', 'Dikembalikan'),
(8, 1, 5, '2024-04-22', '2024-04-22', 'Dikembalikan'),
(9, 1, 5, '2024-04-22', NULL, 'Dipinjam'),
(10, 2, 1, '2024-04-22', '2024-04-22', 'Dikembalikan'),
(11, 2, 5, '2024-04-22', '2024-04-22', 'Dikembalikan'),
(12, 2, 8, '2024-04-22', '2024-04-22', 'Dikembalikan'),
(13, 2, 8, '2024-04-22', '2024-04-22', 'Dikembalikan'),
(14, 6, 1, '2024-04-22', '2024-04-22', 'Dikembalikan'),
(15, 6, 8, '2024-04-22', NULL, 'Dipinjam'),
(16, 6, 1, '2024-04-22', NULL, 'Dipinjam'),
(17, 2, 8, '2024-04-23', '2024-04-23', 'Dikembalikan'),
(18, 2, 1, '2024-04-23', '2024-04-23', 'Dikembalikan'),
(19, 2, 1, '2024-04-23', NULL, 'Dipinjam'),
(20, 7, 1, '2024-04-23', NULL, 'Dipinjam'),
(21, 7, 8, '2024-04-23', '2024-04-23', 'Dikembalikan'),
(22, 7, 8, '2024-04-23', NULL, 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `ulasanid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `bukuid` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`ulasanid`, `userid`, `bukuid`, `ulasan`, `rating`) VALUES
(2, 6, 1, 'boleh juyga', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `namalengkap` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', 'admin', 'admin', 'admin'),
(2, 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'imam@example.com', 'imam', 'imam', 'admin'),
(4, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@gmaa.com', 'petugas', 'petugas', 'petugas'),
(6, 'tya', 'b626b66df044ee336f452bd5d88debb5', 'tya@gm.com', 'tya', 'tya', 'user'),
(7, 'eka', '79ee82b17dfb837b1be94a6827fa395a', 'eka@example.com', 'Eka Safitriani', 'Kudus, Jawa Tengah', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`bukuid`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`kategoriid`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`kategoribukuid`),
  ADD KEY `bukuid` (`bukuid`),
  ADD KEY `kategoriid` (`kategoriid`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`koleksiid`),
  ADD KEY `userid` (`userid`,`bukuid`),
  ADD KEY `bukuid` (`bukuid`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjamanid`),
  ADD KEY `userid` (`userid`,`bukuid`),
  ADD KEY `bukuid` (`bukuid`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`ulasanid`),
  ADD KEY `userid` (`userid`,`bukuid`),
  ADD KEY `bukuid` (`bukuid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `bukuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `kategoriid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `kategoribukuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `koleksiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjamanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `ulasanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`),
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`kategoriid`) REFERENCES `kategoribuku` (`kategoriid`);

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`bukuid`) REFERENCES `buku` (`bukuid`),
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
