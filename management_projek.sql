-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2016 at 06:22 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `management_projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'SevenMediaTech', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(20) NOT NULL,
  `warna` varchar(10) NOT NULL DEFAULT 'blue',
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`no`, `keterangan`, `warna`, `mulai`, `selesai`) VALUES
(48, 'kerja praktek', '#0DD10D', '2016-02-01', '2016-02-29'),
(49, 'seminar kp', '#FF6600', '2016-05-18', '2016-05-18'),
(50, 'contoh', '#0DD10D', '2016-05-18', '2016-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE IF NOT EXISTS `klien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `perusahaan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` bigint(15) NOT NULL,
  `no_tlp` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id`, `nama`, `perusahaan`, `alamat`, `email`, `no_hp`, `no_tlp`) VALUES
(10, 'Nur Alimah', 'SMK Texmaco', 'Jl. Raya Mangkang - KM.16', 'smktex_smg@yahoo.com', 0, 248661966),
(11, 'Arief Eka', 'Global Media', 'Jalan Watukaji 14 No. 4, Gedawang, Banyumanik, Semarang ', 'info@arkahost.com', 8962004542, 0),
(12, 'Diyo', 'BPN Semarang', 'Jalan Ki Mangunsarkoro No. 23, Karangkidul, Semarang Tengah · ', 'humas@bpn.go.id', 0, 248415896);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `id_klien` int(11) NOT NULL,
  `nilai` bigint(20) NOT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `keterangan` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_project` (`id_project`),
  KEY `id_project_2` (`id_project`),
  KEY `id_klien` (`id_klien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_project`, `id_klien`, `nilai`, `total_bayar`, `status`, `keterangan`) VALUES
(16, 12, 10, 15000000, 15000000, 0, 'lunas'),
(17, 13, 11, 8000000, 8000000, 0, 'lunas'),
(18, 14, 12, 18000000, 18000000, 0, 'lunas'),
(19, 15, 11, 2500000, 2500000, 0, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `tgl_bayar` varchar(10) DEFAULT '-',
  `metode` varchar(8) DEFAULT '-',
  `jumlah` bigint(20) DEFAULT '0',
  `total` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_project` (`id_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `id_project`, `tgl_bayar`, `metode`, `jumlah`, `total`) VALUES
(48, 12, '2015-01-01', 'CASH', 2000000, 2000000),
(49, 12, '2015-02-01', 'TRANSFER', 3000000, 5000000),
(50, 12, '2015-04-01', 'TRANSFER', 5000000, 10000000),
(51, 12, '2015-06-01', 'CASH', 5000000, 15000000),
(52, 13, '2015-08-01', 'CASH', 2000000, 2000000),
(53, 13, '2015-9-01', 'TRANSFER', 2500000, 4500000),
(54, 13, '2015-10-01', 'TRANSFER', 3500000, 8000000),
(55, 14, '2016-03-01', 'CASH', 3000000, 3000000),
(56, 14, '2016-04-01', 'TRANSFER', 5000000, 8000000),
(57, 14, '2016-05-01', 'TRANSFER', 10000000, 18000000),
(59, 15, '2016-01-01', 'CASH', 1000000, 1000000),
(60, 15, '2016-02-02', 'TRANSFER', 1000000, 2000000),
(61, 15, '2016-03-01', 'CASH', 500000, 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_project` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `marketing_name` varchar(50) NOT NULL,
  `pj_name` varchar(50) NOT NULL,
  `nilai` bigint(11) NOT NULL,
  `id_klien` int(11) NOT NULL,
  `status_server` varchar(10) NOT NULL,
  `operasional_domain` bigint(20) NOT NULL,
  `id_server` int(11) NOT NULL,
  `operasional_marketing` bigint(20) NOT NULL,
  `operasional_pj` bigint(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `due_date` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_klien` (`id_klien`),
  KEY `id_klien_2` (`id_klien`),
  KEY `id_server` (`id_server`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `nama_project`, `deskripsi`, `marketing_name`, `pj_name`, `nilai`, `id_klien`, `status_server`, `operasional_domain`, `id_server`, `operasional_marketing`, `operasional_pj`, `tgl_mulai`, `due_date`, `username`, `password`) VALUES
(12, 'SIA E-Raport', 'Membuat sistem informasi akademik untuk dapat diakses oleh seluruh pihak sekolah dan orang tua wali murid berkenaan dengan raport siswa', 'Cahyo', 'Anwar', 15000000, 10, '2015-01-01', 50000, 15, 2846000, 2276800, '2015-02-01', '2015-07-31', 'nur alimah', 'nur alimah'),
(13, 'Sistem Keimigrasian Kota Semarang', 'Membuat sistem untuk memanajemen keimigrasian penduduk kota Semarang', 'Cahyo', 'Anwar', 8000000, 11, '2015-08-01', 50000, 14, 1506000, 1204800, '2015-08-01', '2015-12-31', 'arief eka', 'arief eka'),
(14, 'Sistem Pendataan Akta Tanah', 'Membuat sistem pendataan tanah', 'Cahyo', 'Anwar', 18000000, 12, '2016-03-01', 50000, 15, 3446000, 2756800, '2016-01-01', '2016-06-30', 'diyo', 'diyo'),
(15, 'Sistem Manajemen Pekerjaan', 'Membuat sistem untuk memanajemen pekerjaan atau projek', 'Cahyo', 'Anwar', 2500000, 11, '2016-01-01', 50000, 14, 406000, 324800, '2016-03-01', '2016-03-31', 'aref eka', 'arief eka');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE IF NOT EXISTS `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL,
  `kapasitas` varchar(9) NOT NULL,
  `harga` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id`, `nama`, `kapasitas`, `harga`) VALUES
(12, 'SMT-100', '100 MB', 100000),
(13, 'SMT-250', '250 MB', 250000),
(14, 'SMT-500', '500 MB', 450000),
(15, 'SMT-1000', '1 GB', 720000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_klien`) REFERENCES `klien` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_klien`) REFERENCES `klien` (`id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`id_server`) REFERENCES `server` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
