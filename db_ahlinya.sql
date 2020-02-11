-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2020 pada 01.46
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ahlinya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` varchar(5) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `posisi` enum('home','job','skill') NOT NULL,
  `urutan` int(3) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `gambar`, `posisi`, `urutan`, `date_created`) VALUES
('03462', '6-things-you-should-never-store-on-your-work-computer.jpg', 'job', 4, '2020-02-11 07:21:02'),
('04286', 'person-playing-chess-1040157.jpg', 'home', 2, '2020-02-10 14:09:52'),
('07846', 'apartment-apple-business-245032.jpg', 'home', 3, '2020-02-11 07:03:55'),
('34521', 'pexels-photo-210661.jpeg', 'skill', 5, '2020-02-11 07:21:36'),
('51827', 'man-standing-infront-of-white-board-1181345.jpg', 'home', 1, '2020-02-10 14:06:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_post` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `gambar`, `id_post`, `date_created`) VALUES
(1, 'bertiga.jpeg', 'SKILL196792037084364', '0000-00-00 00:00:00'),
(2, 'ARNI_NOISE.jpeg', 'SKILL621899582477634', '0000-00-00 00:00:00'),
(3, 'ARNI_NOISE1.jpeg', 'SKILL820857623194110', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id_job` varchar(20) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_job` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `lokasi` text NOT NULL,
  `regional` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `upah_min` int(11) NOT NULL,
  `upah_max` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Expired') NOT NULL DEFAULT 'Aktif',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_job`
--

INSERT INTO `tbl_job` (`id_job`, `id_user`, `id_kategori`, `nama_job`, `slug`, `lokasi`, `regional`, `type`, `link`, `upah_min`, `upah_max`, `deskripsi`, `gambar`, `status`, `date_created`, `date_expired`) VALUES
('JOB069551873164420', '10', '41243212', 'Gangguaan Listrik', '', '', 'grt56', 'Part Time', '', 2000, 10000, '', 'pondok-tahfizh-masjid-jami-sengkang1.jpg', 'Aktif', '2020-01-02 12:53:02', '0000-00-00 00:00:00'),
('JOB630189246375409', '3123', '32223f', 'Perbaiki keran air', 'Perbaiki-keran-air', '', 'grt56', '', 'xxxxx', 1000, 3000, '', 'bertiga.jpeg', 'Aktif', '2020-02-04 08:40:42', '0000-00-00 00:00:00'),
('JOB769051341279345', '3123', '32223f', 'Cuci Piring Warung makan', '', '', 'grt56', '', '', 2000, 30002, '', 'Bulukumba.jpeg', 'Aktif', '2020-02-04 08:39:05', '0000-00-00 00:00:00'),
('JOB921514707680386', '3123', '32223f', 'Cuci karpet', 'Cuci-karpet', 'Mamuju', 'grt56', '', '', 1000, 10000, '<p>Lorem Piisnafs</p>', 'ARNANDA1.jpeg', 'Aktif', '2020-02-04 08:44:12', '0000-00-00 00:00:00'),
('JOB992337670185526', '10', '41243212', 'Pell Lantain', '', '', 'grt56', 'Part Time', 'xxxxx', 1000, 3000, '', '9493de01b143caeab7b53ee98fbaf6de.jpg', 'Aktif', '2020-01-02 12:52:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `icon`, `gambar`, `date_created`) VALUES
('21e212', 'Perkebunan', 'fa fa-dashboard', 'default.jpg', '2020-01-15 13:37:22'),
('32223f', 'Rumah', 'fa fa-home', 'default.jpg', '2020-01-15 13:37:22'),
('41243212', 'servis elektronik', 'fa fa-desktop', 'default.jpg', '2019-10-20 11:50:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(1) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` varchar(20) NOT NULL,
  `stok_min` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_aplikasi`, `nama_pimpinan`, `provinsi`, `kabupaten`, `kecamatan`, `alamat`, `kontak_person`, `stok_min`) VALUES
(1, 'Arks Dev', 'Waddah', 'Sulawesi Selatan', 'Makassar', 'Manggala', 'jl. Dg. Hayo', '085298730727', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` varchar(15) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `hal` text NOT NULL,
  `isi` text NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_regional`
--

CREATE TABLE `tbl_regional` (
  `id_regional` varchar(5) NOT NULL,
  `nama_regional` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_regional`
--

INSERT INTO `tbl_regional` (`id_regional`, `nama_regional`, `date_created`) VALUES
('fds3d', 'Makassar', '2020-02-04 07:24:00'),
('grt56', 'Gowa', '2020-02-04 07:24:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_skill`
--

CREATE TABLE `tbl_skill` (
  `id_skill` varchar(20) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_skill` text NOT NULL,
  `slug` text NOT NULL,
  `regional` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `upah_min` float NOT NULL,
  `upah_max` float NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_skill`
--

INSERT INTO `tbl_skill` (`id_skill`, `id_user`, `id_kategori`, `nama_skill`, `slug`, `regional`, `type`, `upah_min`, `upah_max`, `deskripsi`, `gambar`, `date_created`) VALUES
('SKILL196792037084364', '10', '41243212', 'Service Laptop 1', '', 'fds3d', 'Part Time', 20001, 30002, '<p><strong>memberanikan </strong>diri menjadi seperti mereka saat ini asfasf</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-25 13:37:13'),
('SKILL196792037084367', '10', '41243212', 'Service Laptop 2', '', 'fds3d', 'Part Time', 20001, 30002, '<p><strong>memberanikan </strong>diri menjadi seperti mereka saat ini asfasf</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-25 13:37:13'),
('SKILL350289981767342', '3123', '21e212', 'Panjat Kelapa', 'Panjat-Kelapa', '', 'Part Time', 200000, 10000, '<p>lorem ipsum</p>', 'ASSA_BAJU_PUTIH_WITH_NOISE.jpeg', '2020-02-04 08:35:20'),
('SKILL489286502607531', '3123', '32223f', 'Angkat Air', 'Angkat-Air', 'Gowa', '', 2000, 10000, '<p>Lorem IPsum dodosmlasf</p>', 'Akar_kesederhaan.jpeg', '2020-02-04 08:42:28'),
('SKILL621899582477634', '3123', '21e212', 'Cuci Piring Kilat', 'Cuci-Piring-Kilat', 'Gowa', '', 2000, 300000000, '<p>INformatif</p>', 'Cover_waktu_itu.png', '2020-02-04 08:37:39'),
('SKILL820857623194107', '10', '41243212', 'Angkat  Lemari 3', '', 'fds3d', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194110', '10', '41243212', 'Angkat  Lemari 4', '', 'fds3d', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194111', '10', '41243212', 'Angkat  Lemari 5', '', 'fds3d', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194112', '10', '41243212', 'Angkat  Lemari 6', '', 'fds3d', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194113', '10', '41243212', 'Angkat  Lemari 7', '', 'fds3d', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194125', '10', '41243212', 'Angkat  Lemari 8', '', 'grt56', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194134', '10', '41243212', 'Angkat  Lemari 9', '', 'grt56', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194145', '10', '41243212', 'Angkat  Lemari 10', '', 'grt56', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194165', '10', '41243212', 'Angkat  Lemari 11', '', 'grt56', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194198', '10', '41243212', 'Angkat  Lemari 12', '', 'grt56', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tanggapan`
--

CREATE TABLE `tbl_tanggapan` (
  `id_tanggapan` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_to` varchar(20) NOT NULL,
  `id_post` varchar(20) NOT NULL,
  `isi` text NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tanggapan`
--

INSERT INTO `tbl_tanggapan` (`id_tanggapan`, `id_user`, `id_to`, `id_post`, `isi`, `is_read`, `date_created`) VALUES
('004341136586227', '3123', '10', 'JOB069551873164420', '<p>Adakah</p>', 1, '2020-02-03 00:00:17'),
('112350648504967', '10', '10', 'SKILL196792037084367', '<p>ayolah</p>', 1, '2020-02-09 00:34:26'),
('176094785651343', '10', '3123', 'JOB921514707680386', '<p>Belum selesai pekerjaan ta bos?</p>', 0, '2020-02-06 14:08:28'),
('345897385661094', '2', '10', 'JOB069551873164420', '<p>Adakah</p>', 1, '2020-02-06 13:44:21'),
('369153510428827', '10', '10', 'SKILL196792037084364', '<p>Adakah</p>', 0, '2020-02-09 00:30:39'),
('476930832798120', '10', '3123', 'JOB921514707680386', '<p>dimana rumah ta bos?</p>', 0, '2020-02-06 14:08:15'),
('493260785605879', '10', '10', 'SKILL196792037084367', '<p>Asas</p>', 0, '2020-02-09 00:33:28'),
('653062317574492', '3123', '10', 'SKILL196792037084364', '<p>ADakah</p>', 1, '2020-02-03 00:02:04'),
('683156340722987', '10', '10', 'SKILL196792037084367', '<p>Adakah</p>', 0, '2020-02-09 00:32:56'),
('839429182573140', '3123', '10', 'JOB069551873164420', '<p>affs</p>', 1, '2020-02-02 23:58:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_type`
--

CREATE TABLE `tbl_type` (
  `id_type` int(10) NOT NULL,
  `nama_type` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Super Admin','Admin','User') NOT NULL,
  `is_active` int(1) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `bahasa` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `hp` varchar(14) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `tw` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `foto`, `username`, `email`, `namalengkap`, `password`, `role`, `is_active`, `profesi`, `tgl_lahir`, `bahasa`, `deskripsi`, `hp`, `kota`, `kecamatan`, `kodepos`, `alamat`, `tw`, `fb`, `ig`, `linkedin`, `date_created`) VALUES
('10', 'Bulukumba.jpeg', 'aswarkasim', 'aswarkasim@gmail.com', 'Aswar Kasim', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'User', 1, 'xxxxx sdf df', '2019-10-24', 'xxxx', 'xxxx xvsvd', 'xxxxx', 'grt56', 'xxxx', '0dsdsd', '0sdfsdf', 'xxxx sdf', 'xxxxfsdf', 'https://instagram.com', 'xxxxxxsdf', '2019-09-25 07:44:46'),
('2', 'default.jpg', 'burhan', 'burhan@gmail.com', 'Burhan', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'User', 1, 'xxxxx', '0000-00-00', '', '', '', 'grt56', '', '0', '0', '', '', '', '', '2019-10-19 07:37:17'),
('3123', 'RARA_NOISE.jpeg', 'admin', 'admin@gmail.com', 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 1, '', '2020-01-14', '', '', '', '', '', '', '', '', '', '', '', '2020-01-17 14:20:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tbl_regional`
--
ALTER TABLE `tbl_regional`
  ADD PRIMARY KEY (`id_regional`);

--
-- Indeks untuk tabel `tbl_skill`
--
ALTER TABLE `tbl_skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Indeks untuk tabel `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indeks untuk tabel `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
