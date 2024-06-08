-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040031`
--

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `harga` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perpustakaan`
--

INSERT INTO `perpustakaan` (`id`, `judul`, `tgl_peminjaman`, `tgl_pengembalian`, `harga`, `gambar`, `detail`) VALUES
(1, 'Dilan1990', '2024-06-01', '2024-06-30', '$150.000', 'Dilan1990.jpeg', '\"Dilan 1990” bukan hanya sekedar kisah cinta remaja biasa. Ini adalah kisah tentang pertumbuhan, pengorbanan, dan perjuangan untuk mempertahankan hubungan di tengah tekanan dan konflik. Pidi Baiq dengan cermat menggambarkan dinamika hubungan asmara yang penuh liku-liku.'),
(2, 'Filosofiteras', '2023-08-01', '2023-08-26', '$125.000', 'filosofi teras.jpeg', 'Filosofi Teras adalah sebuah buku pengantar filsafat Stoa yang dibuat khusus sebagai panduan moral anak muda. Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional, terutama yang dialami oleh anak muda.\r\n'),
(3, 'Koalakumal', '2023-09-01', '2023-09-29', '$135.000', 'koalakumal.jpeg\r\n', '\"Koala Kumal\" adalah novel fiksi drama komedi yang menggali dalam tentang patah  hati dan bagaimana seseorang menghadapi perubahan setelah perpisahan. Dikisahkan,  Dika, seorang pria yang baru saja mengalami batal nikah dengan pacarnya, Andrea,  karena Andrea berselingkuh dengan pria lain bernama James.'),
(4, 'Biografigusdur', '2024-01-02', '2024-01-29', '$200.000', 'biografi.jpeg', 'Abdurrahman Wahid, atau yang lebih populer dengan sebutan Gus Dur, merupakan tokoh panutan yang sangat di hormati oleh banyak kalangan karena pengabdiannya kepada masyarakat,demokrasi, dan islam toleran. sosok penuh teka-teki dan kontroversial sehingga pemikiran dan tindakannya sering disalahpahami oleh banyak kalangan. Dia dipuji oleh banyak kalangna, namum juga dicela oleh mereka yang tak mampu memahami jalan pikiran dan sikapnya. Akan tetapi, penulis buku ini, Greg Barton, berhasil memotret dan menampilkan pemahanan yang utuh dan komprehensif tentang sosok Gus Dur kepada kita.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, ' eldyfg', '$2y$10$ESh/VY3bhRoUuypapv8NOeMwTAf9bmLe16EC0dLLbZ43SrICDi5sa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
