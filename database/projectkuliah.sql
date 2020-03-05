-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2018 pada 03.26
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectkuliah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(3) NOT NULL,
  `nrp` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nrp`, `nama`, `alamat`, `prodi`, `kelamin`) VALUES
(1, '2210171031', 'M Iqbal Nahdliansyah', '-', 'D4 Teknik Komputer', 'L'),
(2, '2210171032', 'Khoirul Anwar', '-', 'D4 Teknik Komputer', 'L'),
(3, '2210171033', 'Amran Zamzani', '-', 'D4 Teknik Komputer', 'L'),
(4, '2210171034', 'Dzakiyah Salma Humairra', '-', 'D4 Teknik Komputer', 'P'),
(5, '2210171035', 'Muhammad Ramadhan Hadi Styawan', '-', 'D4 Teknik Komputer', 'L'),
(6, '2210171036', 'Ainia Alif Fatikhah', '-', 'D4 Teknik Komputer', 'P'),
(7, '2210171037', 'Bayu Syarifuddin', '-', 'D4 Teknik Komputer', 'L'),
(8, '2210171038', 'Pravasta Caraka B', '-', 'D4 Teknik Komputer', 'L'),
(9, '2210171039', 'Fadillah Hendy F', '-', 'D4 Teknik Komputer', 'L'),
(10, '2210171040', 'Excel Daris F', '-', 'D4 Teknik Komputer', 'L'),
(11, '2210171041', 'Rohmad Rifai', '-', 'D4 Teknik Komputer', 'L'),
(12, '2210171042', 'Eva Rahmadanti', '-', 'D4 Teknik Komputer', 'P'),
(13, '2210171043', 'Miftahul Anwar', '-', 'D4 Teknik Komputer', 'L'),
(14, '2210171044', 'Putri Milenia Fitri', '-', 'D4 Teknik Komputer', 'P'),
(15, '2210171045', 'Muhammad Dafa G P M', '-', 'D4 Teknik Komputer', 'L'),
(16, '2210171046', 'Siti Nabilah Nuraini', '-', 'D4 Teknik Komputer', 'P'),
(17, '2210171047', 'Dio Dzaky Achmad Mustaqim', '-', 'D4 Teknik Komputer', 'L'),
(18, '2210171048', 'Mochammad Tio Refi Putera', '-', 'D4 Teknik Komputer', 'L'),
(19, '2210171049', 'M Rizqi Hasan Al Banna', '-', 'D4 Teknik Komputer', 'L'),
(20, '2210171052', 'Faizil Umam', '-', 'D4 Teknik Komputer', 'L'),
(21, '2210171054', 'Shelly Oktia Heriawati', '-', 'D4 Teknik Komputer', 'P'),
(22, '2210171055', 'Erwin Setiyawan', '-', 'D4 Teknik Komputer', 'L'),
(23, '2210171056', 'Ananta Septianto', '-', 'D4 Teknik Komputer', 'L'),
(24, '2210171057', 'Annisa Wahyuningtias', '-', 'D4 Teknik Komputer', 'P'),
(25, '2210171059', 'Muhammad Alan Nur', '-', 'D4 Teknik Komputer', 'L'),
(26, '2210171060', 'Vardyansyah Cahya P H P', '-', 'D4 Teknik Komputer', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(6) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `lokasi`, `tahun`, `jumlah`) VALUES
(1001, 'Belajar HTML', 'Andi Wasisno', 'Erlangga', 'B-WSN-001', '2017', 1),
(1002, 'Belajar PHP', 'Budi Hermanto', 'Erlangga', 'B-HRM-001', '2018', 0),
(1003, 'Belajar Photoshop', 'Sandy', 'Bioma Project', 'B-SND-001', '2015', 2),
(1004, 'Teori Dan Filsafat Hukum', 'Drs. W. Friedmann, M.Pd.', 'CV. Rajawali', 'T-FRD-001', '1999', 1),
(1005, 'Perjalanan Hidup Melkias Nawipa', 'Melkias Nawipa', 'Nawipa Project', 'P-NWP-001', '1999', 0),
(1006, 'Burung di Indonesia', 'Tri Yulianto', 'CV. Aneka Ilmu', 'B-YUL-001', '2015', 0),
(1007, 'Matematika Dasar', 'Anwar', 'PENS', 'M-ANW-001', '2009', 0),
(1008, 'Struktur Algoritma', 'Heri Setiawan', 'PT. Elex Media', 'S-SET-001', '2015', 4),
(1009, 'Paduan Belajar Bahasa C', 'Rizki Andrian', 'PT. Elex Media', 'P-AND-002', '2015', 3),
(1010, 'Bahan Kimia di Industri', 'Agus Riyadi', 'CV. Aneka Ilmu', 'B-RIY-001', '2018', 1),
(1011, 'Konduktor dan Isolator', 'Nora Choirica', 'CV. Aneka Ilmu', 'K-CHO-002', '2017', 0),
(1012, 'Seri Sains Air', 'Sri Winarsih, S.Pd.', 'PT. Bengawan Ilmu', 'S-WNR-001', '2018', 2),
(1013, 'Seri Sains Alat-Alat Pernapasan', 'Khamim, S.Pd.', 'PT. Bengawan Ilmu', 'S-KHA-002', '2018', 3),
(1014, 'Seri Sains Atmosfer', 'Mulyadi', 'PT. Bengawan Ilmu', 'S-MYD-003', '2017', 1),
(1015, 'Seri Sains Belajar Mengukur', 'Sadfikun', 'PT. Bengawan Ilmu', 'S-SAD-004', '2018', 2),
(1016, 'Seri Sains Daur Hidup Makhluk Hidup', 'Khamim, S.Pd.', 'PT. Bengawan Ilmu', 'S-KHA-005', '2018', 0),
(1017, 'Seri Sains Gaya dan Gerak', 'Agus Riyadi', 'PT. Bengawan Ilmu', 'S-RIY-006', '2015', 0),
(1018, 'Seri Sains Tata Surya', 'Taufik A., S.T.', 'PT. Bengawan Ilmu', 'S-TFK-007', '2017', 1),
(1019, 'Pemanasan Global dan Masa Depan Bumi', 'Drs. Mohammad Sulkan, M.Pd.', 'PT. Bengawan Ilmu', 'S-SLK-008', '2015', 0),
(1020, 'Mengenal Bahasa C++', 'Henry Aziz', 'PT. Elex Media', 'M-AZI-003', '2016', 1),
(1021, 'Mahir HTML dan PHP untuk Toko Online', 'Hendry A., S.Pd.', 'Bioma Project', 'M-HND-001', '2017', 1),
(1022, 'Belajar Cepat Codeigniter Dengan Studi Kasus', 'Diki Alfarabi Hadi', 'MalasNgoding.Com', 'B-ALF-001', '2018', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id` int(3) NOT NULL,
  `nrp` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_pinjam` varchar(100) NOT NULL,
  `tgl_kembali` varchar(100) NOT NULL,
  `status` enum('Pinjam','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`id`, `nrp`, `nama`, `judul`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(2, '2210171038', 'Tio', 'Struktur Algoritma', '12-03-2018', '17-03-2018', 'Selesai'),
(3, '2210171038', 'Shelly', 'Mengenal Bahasa C++', '01-03-2018', '06-03-2018', 'Selesai'),
(4, '2210171038', 'Pravasta Caraka B', 'Belajar Cepat Codeigniter Dengan Studi Kasus', '20-03-2018', '03-04-2018', 'Selesai'),
(5, '2210171038', 'Pravasta Caraka B', 'Matematika Dasar', '21-03-2018', '28-03-2018', 'Pinjam'),
(6, '2210171048', 'Mochammad Tio Refi Putera', 'Teori Dan Filsafat Hukum', '13-03-2018', '20-03-2018', 'Pinjam'),
(7, '2210171054', 'Shelly Oktia Heriawati', 'Mengenal Bahasa C++', '02-03-2018', '09-03-2018', 'Pinjam'),
(8, '2210171048', 'Mochammad Tio Refi Putera', 'Konduktor dan Isolator', '24-03-2018', '31-03-2018', 'Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `kode_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`kode_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Pravasta Caraka B', 'raka', 'd26cc343023b19a60c33c9b3a52cd9bf', 'member'),
(4, 'Shelly Oktia Heriawati', 'shelly', 'aa08769cdcb26674c6706093503ff0a3', 'member'),
(5, 'Mochammad Tio Refi Putera', 'tio', 'aa08769cdcb26674c6706093503ff0a3', 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
