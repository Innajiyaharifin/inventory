-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Nov 2015 pada 13.21
-- Versi Server: 5.6.24
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neeqah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_plan`
--

CREATE TABLE IF NOT EXISTS `t_detail_plan` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail_plan`
--

INSERT INTO `t_detail_plan` (`id`, `plan_id`, `produk_id`, `harga`) VALUES
(1, 1, 3, 1750000),
(2, 2, 3, 1750000),
(3, 3, 3, 1750000),
(4, 4, 3, 1750000),
(5, 5, 2, 15000000),
(6, 5, 3, 1750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE IF NOT EXISTS `t_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`id`, `nama_kategori`, `image`) VALUES
(1, 'tata rias', 'baju-pengantin-muslim1.jpg'),
(2, 'gedung', 'Gedung-Pernikahan-Jakarta-Graha-Nusantara-111.jpg'),
(3, 'cathering', 'unduhan (19).jpg'),
(4, 'dokumentasi', 'images (12)1.jpg'),
(5, 'Gaun Pengantin', 'images (9).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_member`
--

CREATE TABLE IF NOT EXISTS `t_member` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_member`
--

INSERT INTO `t_member` (`id`, `user_id`, `fullname`, `telp`, `alamat`, `photo`) VALUES
(1, 2, 'ekka puzziana', '089656519620', 'purwakarta', 'Koala0.jpg'),
(2, 4, 'sari', '+6289677743359', NULL, ''),
(3, 5, 'sari', '+6232178937128', NULL, ''),
(4, 7, 'beruang', '+6299999999999', 'blabla\r\n', ''),
(5, 9, 'sari', '+6289677743359', NULL, ''),
(6, 11, 'gina', '+627788978888', NULL, ''),
(7, 19, 'siti', '+628765654566', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_plan`
--

CREATE TABLE IF NOT EXISTS `t_plan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `wedding_date` date NOT NULL,
  `budget` int(11) NOT NULL,
  `jml_undangan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_plan`
--

INSERT INTO `t_plan` (`id`, `user_id`, `wedding_date`, `budget`, `jml_undangan`) VALUES
(1, 4, '2015-10-27', 100000000, 500),
(2, 4, '2015-11-25', 15000000, 400),
(3, 4, '2015-11-24', 25000000, 50),
(4, 4, '2015-11-17', 25000000, 50),
(5, 4, '2015-11-10', 75000000, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE IF NOT EXISTS `t_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `harga` int(11) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id`, `nama_produk`, `kategori_id`, `vendor_id`, `desc`, `harga`, `featured_image`, `status`) VALUES
(1, 'gedung sopo', 2, 1, 'gedung sopo depn kampus bsi hehehehe', 100000000, 'Foto3599.jpg', '0'),
(2, 'Gedung Serbaguna', 2, 3, 'Gedung serbaguna cocok digunakan untuk Pesta Pernikahan, Pesta Ulang tahun dll', 15000000, 'Gedung-Pernikahan-Jakarta-Graha-Nusantara-11.jpg', '0'),
(3, 'Gaun Pengantin', 5, 3, 'Gaun Pengantin cocok untuk anda yang akan mengadakan Pernikahan dengan nuansa elegan dan cantik', 1750000, 'images (10)1.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk_gallery`
--

CREATE TABLE IF NOT EXISTS `t_produk_gallery` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk_gallery`
--

INSERT INTO `t_produk_gallery` (`id`, `produk_id`, `img`) VALUES
(1, 1, '2012-08-29 12.30.43.jpg'),
(2, 1, '2012-08-29 12.12.41.jpg'),
(3, 3, 'baju-pengantin-muslim0.jpg'),
(4, 3, 'images (12).jpg'),
(5, 3, 'images0.jpg'),
(6, 2, 'unduhan (1)0.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk_kategori`
--

CREATE TABLE IF NOT EXISTS `t_produk_kategori` (
  `produk_id` varchar(8) NOT NULL,
  `kategori_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_report`
--

CREATE TABLE IF NOT EXISTS `t_report` (
  `id` int(11) unsigned NOT NULL,
  `member_id` int(11) unsigned DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `message` text,
  `report_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_report`
--

INSERT INTO `t_report` (`id`, `member_id`, `vendor_id`, `message`, `report_date`) VALUES
(1, 4, 1, 'huuuuuuuuuuuuuuuuuuuuuuu', '2015-11-14 11:51:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `email`, `password`, `role`, `status`) VALUES
(1, 'innajiyaharifin@gmail.com', '4dd0a9e8cdc3cff95e88073856bd918f', 2, 1),
(2, 'ekkapuzziana@gmail.com', 'b3d71a239c4f81b84366f2fd62ca5122', 1, 1),
(3, 'admin@neeqah.id', '21232f297a57a5a743894a0e4a801fc3', 4, 1),
(4, 'sarisusanti@gmail.com', 'a87bcf310c4fdf2a80f2f3d97f1f9424', 1, 1),
(5, 'sarisusanti95@gmail.com', '63151f717c68a75d3ed51e9ed4271841', 1, 1),
(6, 'inanajiy1606@bsi.ac.id', 'a0fb2daa33c637d078d1d276dd453ea2', 2, 1),
(7, 'beruang@gmail.com', '0fdada40c729ac17fccb73e52177a02f', 1, 1),
(8, 'sariku1323@gmail.com', 'a87bcf310c4fdf2a80f2f3d97f1f9424', 2, 1),
(9, 'sarsun@gmail.com', '13abe753ee2e0a937abada659bdf0970', 1, 1),
(10, 'Gina@gmail.com', '7df27de84ed79a46d75c7c57ad00f76f', 2, 1),
(11, 'gina90@gmail.com', '7df27de84ed79a46d75c7c57ad00f76f', 1, 0),
(12, 'yosua@neeqah.id', '0a810b127cc9448c08522476682769ca', 3, 9),
(13, 'sari@neeqah.id', 'a87bcf310c4fdf2a80f2f3d97f1f9424', 3, 9),
(14, 'ina@neeqah.id', 'a0fb2daa33c637d078d1d276dd453ea2', 3, 9),
(15, 'eka@neeqah.id', '79ee82b17dfb837b1be94a6827fa395a', 3, 9),
(16, 'siti@neeqah.id', 'db04eb4b07e0aaf8d1d477ae342bdff9', 3, 1),
(17, 'sitsitrrend@gmail.com', '51ffb25da90082351020dcf2e4020ce8', 2, 0),
(18, 'sitsitrrend@gmail.com', '51ffb25da90082351020dcf2e4020ce8', 2, 0),
(19, 'sitsitrend@gmail.com', 'db04eb4b07e0aaf8d1d477ae342bdff9', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_vendor`
--

CREATE TABLE IF NOT EXISTS `t_vendor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `responsible_name` varchar(255) DEFAULT NULL,
  `reponsible_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_vendor`
--

INSERT INTO `t_vendor` (`id`, `user_id`, `name`, `telp`, `alamat`, `logo`, `responsible_name`, `reponsible_telp`) VALUES
(1, 1, 'inna grup', '089655664677', 'buahbatu', '2012-08-29 12.32.23.jpg', 'inna najiyah', '0219997788'),
(2, 6, 'Ina Najiyah', '+6289656519620', 'Jl. Logam No.50 Bandung', 'unduhan (19).jpg', 'Ina group', NULL),
(3, 8, 'Wedding Group', '089677743359', 'Jl. Ahmad Yani Gg. Slamet 1 No.52 Rt/Rw 08/03 Kel.Cibeunying Kec. Kiara Condong', 'images (8).jpg', 'Sari Susanti', NULL),
(4, 10, 'Gina Grup', '+628788797999', '', '', 'Gina Erliana', NULL),
(6, 17, 'Sitrend wedding', '+6285603114750', '', '', 'Siti Rendani Anjaryanti', NULL),
(7, 18, 'Sitrend wedding', '+6285603114750', '', '', 'Siti Rendani Anjaryanti', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_verification`
--

CREATE TABLE IF NOT EXISTS `t_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `hash_key` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_verification`
--

INSERT INTO `t_verification` (`id`, `user_id`, `hash_key`) VALUES
(1, 4, 'a4d9a5f1c0e4694c92f3db655426fed1'),
(2, 5, '933014a54ad774e6bc986cbe2b160d44'),
(3, 6, '2a7c11a5b219647e9aa9f2673e3319fa'),
(4, 7, '9ac35782ca66e5030d0a6d6ffa5b520a'),
(5, 8, 'c991715cdb2d20e110be4be1944dec9d'),
(6, 9, '9ffc9c8288feeb29a1c616f75d35fccd'),
(7, 10, 'e2de9d17890a8646c8d03f5ce6418fba'),
(8, 11, 'e0d1860dc7ce2192307075de372b59dc'),
(9, 12, 'a766f36bcf94a39c1954671bf44373ed'),
(10, 17, '6b5c501825193786854981e25509706c'),
(11, 18, '000f3b5d816f34ef36ca92d17ece40e4'),
(12, 19, 'b138d912770787c5003bee8be38b2f0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_detail_plan`
--
ALTER TABLE `t_detail_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_member`
--
ALTER TABLE `t_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_plan`
--
ALTER TABLE `t_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `t_produk_gallery`
--
ALTER TABLE `t_produk_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `t_report`
--
ALTER TABLE `t_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_vendor`
--
ALTER TABLE `t_vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_verification`
--
ALTER TABLE `t_verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_detail_plan`
--
ALTER TABLE `t_detail_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_member`
--
ALTER TABLE `t_member`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_plan`
--
ALTER TABLE `t_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_produk_gallery`
--
ALTER TABLE `t_produk_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_report`
--
ALTER TABLE `t_report`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `t_vendor`
--
ALTER TABLE `t_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_verification`
--
ALTER TABLE `t_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_member`
--
ALTER TABLE `t_member`
  ADD CONSTRAINT `t_member_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_plan`
--
ALTER TABLE `t_plan`
  ADD CONSTRAINT `t_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `t_vendor` (`id`),
  ADD CONSTRAINT `t_produk_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `t_kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_produk_gallery`
--
ALTER TABLE `t_produk_gallery`
  ADD CONSTRAINT `t_produk_gallery_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `t_produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_report`
--
ALTER TABLE `t_report`
  ADD CONSTRAINT `t_report_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `t_member` (`id`),
  ADD CONSTRAINT `t_report_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `t_vendor` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_vendor`
--
ALTER TABLE `t_vendor`
  ADD CONSTRAINT `t_vendor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
