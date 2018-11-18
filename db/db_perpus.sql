-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 08:55 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `kd_anggota` char(10) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`kd_anggota`, `nama_anggota`, `alamat`, `jenis_kelamin`) VALUES
('AG00000001', 'Mamad', 'Jogja', 'laki-laki'),
('AG00000002', 'Dani', 'Solo', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `kd_buku` char(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `kd_kategori` char(10) NOT NULL,
  `kd_penerbit` char(10) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `kd_kategori`, `kd_penerbit`, `isbn`, `jumlah`, `tahun_terbit`) VALUES
('KB000000001', 'ANSI', 'K-002', 'P-002', '2121212121', 8, 2010),
('KB000000002', 'KCB', 'K-002', 'P-001', '1212131131', 3, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE IF NOT EXISTS `denda` (
`kd_denda` int(11) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`kd_denda`, `biaya`) VALUES
(1, 300),
(2, 400);

-- --------------------------------------------------------

--
-- Table structure for table `det_peminjaman`
--

CREATE TABLE IF NOT EXISTS `det_peminjaman` (
  `kd_peminjaman` char(10) NOT NULL,
  `kd_buku` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_peminjaman`
--

INSERT INTO `det_peminjaman` (`kd_peminjaman`, `kd_buku`) VALUES
('PJ18030001', 'KB000000001'),
('PJ18030002', 'KB000000002'),
('PJ18030003', 'KB000000001'),
('PJ18030003', 'KB000000002'),
('PJ18030004', 'KB000000001'),
('PJ18030004', 'KB000000002'),
('PJ18030005', 'KB000000001'),
('PJ18030006', 'KB000000002');

-- --------------------------------------------------------

--
-- Table structure for table `det_pengarang`
--

CREATE TABLE IF NOT EXISTS `det_pengarang` (
  `kd_det_pengarang` char(10) NOT NULL,
  `kd_buku` char(11) NOT NULL,
  `kd_pengarang` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pengarang`
--

INSERT INTO `det_pengarang` (`kd_det_pengarang`, `kd_buku`, `kd_pengarang`) VALUES
('DP00000001', 'KB000000001', 'PG0002');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` char(10) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
('K-001', 'Matematika'),
('K-002', 'B. Indonesia'),
('K-003', 'asasa');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `kd_peminjaman` char(10) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `kd_anggota` char(10) NOT NULL,
  `kd_petugas` char(3) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kd_peminjaman`, `tgl_peminjaman`, `kd_anggota`, `kd_petugas`, `status`) VALUES
('PJ18030001', '2018-03-15', 'AG00000002', 'P01', 'Dikembalikan'),
('PJ18030002', '2018-03-16', 'AG00000001', 'P01', 'Dikembalikan'),
('PJ18030003', '2018-03-23', 'AG00000002', 'P01', 'Dipinjam'),
('PJ18030004', '2018-03-24', 'AG00000002', 'P01', 'Dipinjam'),
('PJ18030005', '2018-03-20', 'AG00000002', 'P01', 'Dikembalikan'),
('PJ18030006', '2018-03-30', 'AG00000002', 'P01', 'Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `kd_penerbit` char(10) NOT NULL,
  `nama_penerbit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`kd_penerbit`, `nama_penerbit`) VALUES
('P-001', 'Andi Star'),
('P-002', 'Gramedia');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE IF NOT EXISTS `pengarang` (
  `kd_pengarang` char(10) NOT NULL,
  `nama_pengarang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`kd_pengarang`, `nama_pengarang`) VALUES
('PG0001', 'Hanif Al-Fatta'),
('PG0002', 'Suprianto');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
  `kd_pengembalian` char(10) NOT NULL,
  `kd_peminjaman` char(10) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kd_petugas` char(3) NOT NULL,
  `kd_denda` int(11) NOT NULL,
  `total_denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`kd_pengembalian`, `kd_peminjaman`, `tgl_kembali`, `kd_petugas`, `kd_denda`, `total_denda`) VALUES
('KM18030001', 'PJ18030002', '2018-03-23', 'P01', 2, 0),
('KM18030002', 'PJ18030001', '2018-03-24', 'P01', 2, 800),
('KM18030003', 'PJ18030005', '2018-03-28', 'P01', 2, 400),
('KM18030004', 'PJ18030006', '2018-03-30', 'P01', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `kd_petugas` char(3) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
('P01', 'Hendrik L', 'admin', 'admin', 'Admin'),
('P02', 'Petugas', 'petugas', 'petugas', 'Petugas'),
('P03', 'Kepala', 'kepala', 'kepala', 'Kepala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`kd_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`kd_buku`), ADD KEY `fk_kd_kategori` (`kd_kategori`), ADD KEY `fk_kd_penerbit` (`kd_penerbit`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
 ADD PRIMARY KEY (`kd_denda`);

--
-- Indexes for table `det_peminjaman`
--
ALTER TABLE `det_peminjaman`
 ADD KEY `fk_kd_peminjaman` (`kd_peminjaman`), ADD KEY `fk_kd_buku` (`kd_buku`);

--
-- Indexes for table `det_pengarang`
--
ALTER TABLE `det_pengarang`
 ADD PRIMARY KEY (`kd_det_pengarang`), ADD KEY `fk_kd_pengarang` (`kd_pengarang`), ADD KEY `fk_kd_buku` (`kd_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
 ADD PRIMARY KEY (`kd_peminjaman`), ADD KEY `fk_kd_petugas` (`kd_petugas`), ADD KEY `fk_kd_anggota` (`kd_anggota`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
 ADD PRIMARY KEY (`kd_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
 ADD PRIMARY KEY (`kd_pengarang`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
 ADD PRIMARY KEY (`kd_pengembalian`), ADD KEY `fk_kd_peminjaman` (`kd_peminjaman`), ADD KEY `fk_kd_petugas` (`kd_petugas`), ADD KEY `fk_kd_denda` (`kd_denda`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
 ADD PRIMARY KEY (`kd_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
MODIFY `kd_denda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`),
ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`kd_penerbit`) REFERENCES `penerbit` (`kd_penerbit`);

--
-- Constraints for table `det_peminjaman`
--
ALTER TABLE `det_peminjaman`
ADD CONSTRAINT `det_peminjaman_ibfk_1` FOREIGN KEY (`kd_peminjaman`) REFERENCES `peminjaman` (`kd_peminjaman`),
ADD CONSTRAINT `det_peminjaman_ibfk_2` FOREIGN KEY (`kd_buku`) REFERENCES `buku` (`kd_buku`);

--
-- Constraints for table `det_pengarang`
--
ALTER TABLE `det_pengarang`
ADD CONSTRAINT `det_pengarang_ibfk_1` FOREIGN KEY (`kd_pengarang`) REFERENCES `pengarang` (`kd_pengarang`),
ADD CONSTRAINT `det_pengarang_ibfk_2` FOREIGN KEY (`kd_buku`) REFERENCES `buku` (`kd_buku`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`kd_petugas`) REFERENCES `petugas` (`kd_petugas`),
ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kd_anggota`) REFERENCES `anggota` (`kd_anggota`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`kd_peminjaman`) REFERENCES `peminjaman` (`kd_peminjaman`),
ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`kd_petugas`) REFERENCES `petugas` (`kd_petugas`),
ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`kd_denda`) REFERENCES `denda` (`kd_denda`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
