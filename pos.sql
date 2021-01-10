-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2020 pada 14.07
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(75) NOT NULL,
  `kode_kategori` varchar(15) NOT NULL,
  `stock` int(5) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `max_stock` int(5) NOT NULL,
  `min_stock` int(5) NOT NULL,
  `harga_jual` varchar(25) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `kode_diskon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kode_kategori`, `stock`, `satuan`, `max_stock`, `min_stock`, `harga_jual`, `harga_beli`, `kode_diskon`) VALUES
('BR521102019001', 'CocaCola', '1h1zuxr3afesckw', -50, 'Kotak', 55, 15, '3500', '3000', '112345'),
('BR522102019002', 'Freastea', '1h1zuxr3afesckw', 20, 'Botol', 15, 5, '3500', '3000', '112345'),
('BR522102019003', 'Tea Jus', '1h1zuxr3afesckw', 679, 'Buah', 51, 15, '3500', '3000', '112345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transkeluar`
--

CREATE TABLE `detail_transkeluar` (
  `urut` int(15) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `harga` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `qty` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transkeluar`
--

INSERT INTO `detail_transkeluar` (`urut`, `id_transaksi`, `harga`, `sub_total`, `kode_barang`, `qty`) VALUES
(121, 'TR512032020027', 3500, 3500, 'BR521102019001', 1),
(122, 'TR512032020027', 3500, 24500, 'BR522102019003', 7),
(123, 'TR512032020028', 3500, 3500, 'BR521102019001', 1),
(124, 'TR512032020028', 3500, 24500, 'BR522102019003', 7),
(125, 'TR512032020029', 3500, 3500, 'BR521102019001', 1),
(126, 'TR512032020029', 3500, 24500, 'BR522102019003', 7),
(127, 'TR512032020030', 3500, 3500, 'BR521102019001', 1),
(128, 'TR512032020030', 3500, 24500, 'BR522102019003', 7),
(129, 'TR512032020031', 3500, 3500, 'BR521102019001', 1),
(130, 'TR512032020031', 3500, 24500, 'BR522102019003', 7),
(131, 'TR512032020032', 3500, 3500, 'BR521102019001', 1),
(132, 'TR512032020032', 3500, 24500, 'BR522102019003', 7),
(133, 'TR512032020033', 3500, 3500, 'BR521102019001', 1),
(134, 'TR512032020033', 3500, 24500, 'BR522102019003', 7),
(135, 'TR512032020034', 3500, 52500, 'BR521102019001', 15),
(136, 'TR512032020034', 3500, 77000, 'BR522102019003', 22),
(137, 'TR512032020035', 3500, 52500, 'BR521102019001', 15),
(138, 'TR512032020035', 3500, 77000, 'BR522102019003', 22),
(139, 'TR512032020036', 3500, 52500, 'BR521102019001', 15),
(140, 'TR512032020036', 3500, 77000, 'BR522102019003', 22),
(141, 'TR512032020037', 3500, 52500, 'BR521102019001', 15),
(142, 'TR512032020037', 3500, 77000, 'BR522102019003', 22),
(143, 'TR512032020038', 3500, 52500, 'BR521102019001', 15),
(144, 'TR512032020038', 3500, 77000, 'BR522102019003', 22),
(145, 'TR512032020039', 3500, 52500, 'BR521102019001', 15),
(146, 'TR512032020039', 3500, 77000, 'BR522102019003', 22),
(147, 'TR512032020040', 3500, 52500, 'BR521102019001', 15),
(148, 'TR512032020040', 3500, 77000, 'BR522102019003', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `kode_diskon` varchar(15) NOT NULL,
  `nama_diskon` varchar(55) NOT NULL,
  `type_diskon` enum('1','2','3') NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `persen` char(15) NOT NULL,
  `ketentuan` varchar(25) NOT NULL,
  `item` char(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`kode_diskon`, `nama_diskon`, `type_diskon`, `tgl_awal`, `tgl_akhir`, `persen`, `ketentuan`, `item`, `keterangan`) VALUES
('112345', 'dont delete', '3', '0000-00-00', '0000-00-00', '0', '0', '0', ''),
('14746ajs1fesgcw', 'test free item', '1', '2019-10-21', '2019-10-24', '0', '5', '2', ''),
('1pyphkwjfdpcgs', 'test', '2', '2019-10-01', '2019-10-31', '50', '0', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('1h1zuxr3afesckw', 'Minuman'),
('e95r8v11fcowo8', 'Makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `no_faktur` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kode_user` varchar(15) NOT NULL,
  `total_transaksi` int(15) NOT NULL,
  `kembalian` int(15) NOT NULL,
  `bayar` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`no_faktur`, `tgl_transaksi`, `kode_user`, `total_transaksi`, `kembalian`, `bayar`) VALUES
('TR511032020001', '2020-03-11', '1jneyu8j1fhcock', 3500, 5500, 9000),
('TR511032020002', '2020-03-11', '1jneyu8j1fhcock', 3500, 5500, 9000),
('TR511032020003', '2020-03-11', '1jneyu8j1fhcock', 3500, 5500, 9000),
('TR511032020004', '2020-03-11', '1jneyu8j1fhcock', 3500, 5500, 9000),
('TR511032020005', '2020-03-11', '1jneyu8j1fhcock', 3500, 5500, 9000),
('TR511032020006', '2020-03-11', '1jneyu8j1fhcock', 3500, 5500, 9000),
('TR511032020007', '2020-03-11', '1jneyu8j1fhcock', 3500, 0, 0),
('TR511032020008', '2020-03-11', '1jneyu8j1fhcock', 3500, 0, 0),
('TR512032020009', '2020-03-12', '1jneyu8j1fhcock', 3500, 0, 0),
('TR512032020010', '2020-03-12', 'iu6a8as1fhcgcw', 3500, 0, 0),
('TR512032020011', '2020-03-12', 'iu6a8as1fhcgcw', 3500, 5500, 9000),
('TR512032020012', '2020-03-12', 'iu6a8as1fhcgcw', 3500, 0, 0),
('TR512032020013', '2020-03-12', 'iu6a8as1fhcgcw', 3500, 5500, 9000),
('TR512032020014', '2020-03-12', 'iu6a8as1fhcgcw', 3500, 0, 0),
('TR512032020015', '2020-03-12', 'iu6a8as1fhcgcw', 3500, 5500, 9000),
('TR512032020016', '2020-03-12', 'iu6a8as1fhcgcw', 3500, 5500, 9000),
('TR512032020017', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 62000, 90000),
('TR512032020018', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020019', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 62000, 90000),
('TR512032020020', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 62000, 90000),
('TR512032020021', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020022', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020023', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020024', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020025', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020026', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020027', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 872000, 900000),
('TR512032020028', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020029', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020030', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 62000, 90000),
('TR512032020031', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 0, 0),
('TR512032020032', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 62000, 90000),
('TR512032020033', '2020-03-12', 'iu6a8as1fhcgcw', 28000, 62000, 90000),
('TR512032020034', '2020-03-12', '1jneyu8j1fhcock', 129500, 20500, 150000),
('TR512032020035', '2020-03-12', '1jneyu8j1fhcock', 129500, 20500, 150000),
('TR512032020036', '2020-03-12', '1jneyu8j1fhcock', 129500, 0, 0),
('TR512032020037', '2020-03-12', '1jneyu8j1fhcock', 129500, 770500, 900000),
('TR512032020038', '2020-03-12', '1jneyu8j1fhcock', 129500, 0, 0),
('TR512032020039', '2020-03-12', '1jneyu8j1fhcock', 129500, 0, 0),
('TR512032020040', '2020-03-12', '1jneyu8j1fhcock', 129500, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `id_transaksi` varchar(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `jumlah_beli` int(5) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`id_transaksi`, `kode_barang`, `jumlah_beli`, `tgl_transaksi`) VALUES
('29bphktcaqqs4w8', 'BR522102019003', 999, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `username` varchar(55) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(85) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `level`) VALUES
('1jneyu8j1fhcock', 'kasir', 'Sigit Pambudi ', 'c7911af3adbd12a035b289556d96470a', '2'),
('iu6a8as1fhcgcw', 'admin', 'Sigit', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_option` int(15) NOT NULL,
  `nama_toko` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlpn` char(15) NOT NULL,
  `salam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id_option`, `nama_toko`, `alamat`, `no_tlpn`, `salam`) VALUES
(1, 'Sembako Murah Meriah', 'Jl Wahidin No 169 Belakang Smk Wahidin \r\n', '08999999999', 'Terima Kasih Atas Kunjungan Anda Ke sini Kami Harapankan Kedatangan Anda Kembali');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `detail_transkeluar`
--
ALTER TABLE `detail_transkeluar`
  ADD PRIMARY KEY (`urut`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`kode_diskon`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indeks untuk tabel `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_option`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transkeluar`
--
ALTER TABLE `detail_transkeluar`
  MODIFY `urut` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id_option` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
