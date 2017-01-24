-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jan 2017 pada 06.16
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihanxirpl2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `isbn` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `penerbit`, `pengarang`) VALUES
(1, 'D3s', 'Kaskus', 'Deni'),
(3, 'ASD', 'PT.Saruna', 'Kokoh'),
(4, 'Aku', 'PT.Manekin', 'Agus'),
(5, 'Dia', 'PT.Manekin', 'Agus'),
(6, 'Kamu', 'PT.Manekin', 'Agus'),
(8, 'Sejarah', 'PT.Sukajadi', 'Agus'),
(9, 'Indonesia', 'PT.Sukajadi', 'Agus'),
(10, 'Fisika', 'PT.Sukajadi', 'Agus'),
(11, 'PBO', 'PT.Sukajadi', 'agus'),
(12, 'Webprog', 'PT. Surakoat', 'Agus'),
(13, 'Inggris', 'PT. Surakoat', 'Agus'),
(14, 'Samsung Help', 'PT. Surakoat', 'Agus'),
(15, 'Davision', 'PT. Surakoat', 'Oke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `nomor` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `keterangan` enum('kembali','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `nomor`, `isbn`, `keterangan`) VALUES
(1, '2016-10-05', '2016-10-13', 1, 2, 'belum'),
(2, '2016-02-01', '2018-06-01', 12345, 957127, ''),
(3, '2016-02-01', '2018-06-01', 12345, 199199, 'belum'),
(5, '0000-00-00', '0000-00-00', 192929, 191991, 'kembali'),
(6, '2015-10-10', '2015-10-10', 2828, 2828, 'kembali'),
(11, '2015-10-10', '2016-02-10', 1, 1, 'kembali'),
(12, '2015-10-10', '2016-02-18', 2, 1, 'belum'),
(13, '2015-10-10', '2016-08-10', 3, 4, 'kembali'),
(14, '2016-05-01', '2016-02-10', 4, 5, 'belum'),
(15, '2015-10-10', '2016-08-10', 5, 6, 'belum'),
(16, '2016-05-01', '2016-02-18', 6, 8, 'kembali'),
(17, '2015-10-11', '2016-02-10', 7, 10, 'belum'),
(18, '2016-05-01', '2016-08-10', 8, 15, 'kembali'),
(19, '2015-10-11', '2016-04-10', 9, 11, 'kembali'),
(20, '2016-05-01', '2016-02-18', 10, 13, 'kembali'),
(21, '2016-05-01', '2016-04-10', 11, 14, 'kembali'),
(22, '2015-10-11', '2016-02-18', 12, 1, 'kembali'),
(23, '2016-05-01', '2016-02-18', 13, 12, 'kembali'),
(24, '2018-02-01', '2016-02-10', 14, 5, 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nomor` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nomor`, `nama`, `foto`, `kontak`, `alamat`) VALUES
(1, 'Muhammad Dandy', '', '0851271277', 'Cibiruuu'),
(3, 'Agung Satrio', '', '0857172727', 'Cijambe wetan'),
(4, 'Alifia Balqis', '', '0857177277', 'Cicalengka'),
(5, 'Bayuning Arjunanto', '', '0851727777', 'Bandung'),
(6, 'Fahmi Naufal', '', '08576661266', 'Sindang reret'),
(7, 'Fajar Ramdhani', '', '0857727717', 'Cikajang'),
(8, 'Jainal Permana', '', '048881888', 'Cibiru'),
(9, 'Fendi', '', '085177277', 'Garut'),
(10, 'Gelar Amar', '', '0852225666', 'Bandung'),
(11, 'Riki Pandika', '', '085772771', 'Ujung berung'),
(12, 'Rayhan F', '', '08585128', 'Bandung'),
(13, 'Muhammad Adhi', '', '085858188', 'Bandung'),
(14, 'Wildan H', '', '08571727', 'bandung'),
(15, 'Latifa Axyas', '', '08855128', 'Bandung'),
(16, 'Oskia Sofisti', '', '0858581277', 'Cicalengka'),
(17, 'Rizky Febrian', '', '085127777', 'Bandung'),
(18, 'Virgiandra AK', '', '0851221126', 'Cibiru'),
(19, 'Muhammad Calvin', '', '0121771717', 'Bandung'),
(20, 'Prayogi Sukmana', '', '08217127', 'Di belakang'),
(21, 'Muhammad Nuriansyah', '', '0852171277', 'Bandung'),
(22, 'Riski Dwi S', '', '0851217126616', 'Cibiru'),
(37, 'Escanora', '3.jpg', '048881888', 'awawawaw								');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeluser`
--

CREATE TABLE `tabeluser` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabeluser`
--

INSERT INTO `tabeluser` (`userid`, `password`, `level`) VALUES
('admin', 'admin', 'admin'),
('piket', 'piket', 'piket'),
('user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `tabeluser`
--
ALTER TABLE `tabeluser`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
