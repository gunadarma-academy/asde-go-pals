-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2016 pada 14.24
-- Versi Server: 5.5.34
-- Versi PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `gopals`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_username`, `admin_password`) VALUES
(1, 'andi', 'bc8b86ad63d0cc9430cfce9e933e9098'),
(2, 'bolebole', '728bac293d1ab9efd7da8d1245339025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atm`
--

CREATE TABLE IF NOT EXISTS `atm` (
  `id_atm` int(5) NOT NULL AUTO_INCREMENT,
  `atm_name` varchar(25) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `atm_address` text NOT NULL,
  `latitude` double(16,10) NOT NULL,
  `longitude` double(16,10) NOT NULL,
  PRIMARY KEY (`id_atm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `atm`
--

INSERT INTO `atm` (`id_atm`, `atm_name`, `bank_name`, `atm_address`, `latitude`, `longitude`) VALUES
(2, 'ATM Mandiri Margonda', 'Bank Mandiri', 'Jl. Margonda', -6.3812068000, 106.8307382000),
(3, 'ATM BCA Beji', 'Bank BCA', 'Jl. Tugu Tanah Baru, Beji, Depok', -6.3649372000, 106.8334829000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bengkel`
--

CREATE TABLE IF NOT EXISTS `bengkel` (
  `id_bengkel` int(4) NOT NULL AUTO_INCREMENT,
  `bengkel_name` varchar(30) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `bengkel_address` text NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `latitude` double(16,10) NOT NULL,
  `longitude` double(16,10) NOT NULL,
  PRIMARY KEY (`id_bengkel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `bengkel`
--

INSERT INTO `bengkel` (`id_bengkel`, `bengkel_name`, `vehicle_type`, `brand`, `bengkel_address`, `telephone`, `latitude`, `longitude`) VALUES
(1, 'Jaya Abadi Motor', 'Motorcycle', 'Yamaha', 'Jl. Raden Sanim No. 23 Tanah Baru, Depok', '0217761201', -6.3694460000, 106.7994230000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spbu`
--

CREATE TABLE IF NOT EXISTS `spbu` (
  `id_spbu` int(4) NOT NULL AUTO_INCREMENT,
  `spbu_name` varchar(35) NOT NULL,
  `company` varchar(12) NOT NULL,
  `spbu_address` text NOT NULL,
  `latitude` double(16,10) NOT NULL,
  `longitude` double(16,10) NOT NULL,
  PRIMARY KEY (`id_spbu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `spbu`
--

INSERT INTO `spbu` (`id_spbu`, `spbu_name`, `company`, `spbu_address`, `latitude`, `longitude`) VALUES
(1, 'SPBU Shell - Margonda Raya (1)', 'Shell', 'Jl. Margonda Raya No. 240, Depok, Jawa Barat', -6.3812068000, 106.8307382000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_input_atm`
--

CREATE TABLE IF NOT EXISTS `user_input_atm` (
  `id_atm` int(5) NOT NULL AUTO_INCREMENT,
  `atm_name` varchar(25) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `atm_address` text NOT NULL,
  `latitude` double(16,10) NOT NULL,
  `longitude` double(16,10) NOT NULL,
  PRIMARY KEY (`id_atm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user_input_atm`
--

INSERT INTO `user_input_atm` (`id_atm`, `atm_name`, `bank_name`, `atm_address`, `latitude`, `longitude`) VALUES
(1, 'ATM Mandiri Sekali', 'Bank Mandiri', 'Jl. Buntu', 0.0000000000, 0.0000000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_input_bengkel`
--

CREATE TABLE IF NOT EXISTS `user_input_bengkel` (
  `id_bengkel` int(4) NOT NULL AUTO_INCREMENT,
  `bengkel_name` varchar(30) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `bengkel_address` text NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `latitude` double(16,10) NOT NULL,
  `longitude` double(16,10) NOT NULL,
  PRIMARY KEY (`id_bengkel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user_input_bengkel`
--

INSERT INTO `user_input_bengkel` (`id_bengkel`, `bengkel_name`, `vehicle_type`, `brand`, `bengkel_address`, `telephone`, `latitude`, `longitude`) VALUES
(1, 'Berkah Mandala  Jaya ', 'Motorcycle', 'Honda', 'Jl. Antariksa', '02122113344', 1.0000000000, 1.0000000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_input_spbu`
--

CREATE TABLE IF NOT EXISTS `user_input_spbu` (
  `id_spbu` int(4) NOT NULL AUTO_INCREMENT,
  `spbu_name` varchar(35) NOT NULL,
  `company` varchar(12) NOT NULL,
  `spbu_address` text NOT NULL,
  `latitude` double(16,10) NOT NULL,
  `longitude` double(16,10) NOT NULL,
  PRIMARY KEY (`id_spbu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user_input_spbu`
--

INSERT INTO `user_input_spbu` (`id_spbu`, `spbu_name`, `company`, `spbu_address`, `latitude`, `longitude`) VALUES
(1, 'SPBU Shell - Margonda Raya (2)', 'Shell', 'Jl. Margonda Raya No. 477, Depok, Jawa Barat', -6.3649372000, 106.8334829000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
