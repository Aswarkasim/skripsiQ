-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2020 pada 07.59
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
(1, 'bertiga.jpeg', 'SKILL196792037084364', '0000-00-00 00:00:00');

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
('JOB069551873164420', '10', '41243212', 'Gangguaan Listrik', '', '', 'Makassar', 'Part Time', '', 2000, 10000, '', 'pondok-tahfizh-masjid-jami-sengkang1.jpg', 'Aktif', '2020-01-02 12:53:02', '0000-00-00 00:00:00'),
('JOB992337670185526', '10', '41243212', 'Pell Lantain', '', '', 'Makassar', 'Part Time', 'xxxxx', 1000, 3000, '', '9493de01b143caeab7b53ee98fbaf6de.jpg', 'Aktif', '2020-01-02 12:52:06', '0000-00-00 00:00:00');

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
('21e212', 'Perkebunan', 'fa fa-dashboard', '', '2020-01-15 13:37:22'),
('32223f', 'Rumah', 'fa fa-home', '', '2020-01-15 13:37:22'),
('41243212', 'servis elektronik', 'fa fa-desktop', 'default.jpg', '2019-10-20 11:50:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_tanggapan` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `isi` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('SKILL196792037084364', '10', '41243212', 'Service Laptop 1', '', 'Makassar', 'Part Time', 20001, 30002, '<p><strong>memberanikan </strong>diri menjadi seperti mereka saat ini asfasf</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-25 13:37:13'),
('SKILL196792037084367', '10', '41243212', 'Service Laptop 2', '', 'Makassar', 'Part Time', 20001, 30002, '<p><strong>memberanikan </strong>diri menjadi seperti mereka saat ini asfasf</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-25 13:37:13'),
('SKILL820857623194107', '10', '41243212', 'Angkat  Lemari 3', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194110', '10', '41243212', 'Angkat  Lemari 4', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194111', '10', '41243212', 'Angkat  Lemari 5', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194112', '10', '41243212', 'Angkat  Lemari 6', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194113', '10', '41243212', 'Angkat  Lemari 7', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194125', '10', '41243212', 'Angkat  Lemari 8', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194134', '10', '41243212', 'Angkat  Lemari 9', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194145', '10', '41243212', 'Angkat  Lemari 10', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194165', '10', '41243212', 'Angkat  Lemari 11', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34'),
('SKILL820857623194198', '10', '41243212', 'Angkat  Lemari 12', '', 'Makassar', 'Part Time', 2000, 30002, '<p>lorem ipsum</p>', '9493de01b143caeab7b53ee98fbaf6de.jpg', '2019-12-27 07:02:34');

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
('', 'default.jpg', 'burhan', 'burhan@gmail.com', 'Burhan', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'User', 1, 'xxxxx', '0000-00-00', '', '', '', '', '', '0', '0', '', '', '', '', '2019-10-19 07:37:17'),
('10', '20190302_0829531.jpg', 'aswarkasim', 'aswarkasim@gmail.com', 'Aswar Kasim', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'User', 1, 'xxxxx sdf df', '2019-10-24', 'xxxx', 'xxxx xvsvd', 'xxxxx', '', 'xxxx', '0dsdsd', '0sdfsdf', 'xxxx sdf', 'xxxxfsdf', 'https://instagram.com', 'xxxxxxsdf', '2019-09-25 07:44:46');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- Indeks untuk tabel `tbl_skill`
--
ALTER TABLE `tbl_skill`
  ADD PRIMARY KEY (`id_skill`);

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
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
