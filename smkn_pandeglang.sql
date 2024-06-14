-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 10:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkn_pandeglang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_absensi`
--

CREATE TABLE `data_absensi` (
  `id_absensi` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(100) DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `id_siswa` varchar(50) DEFAULT NULL,
  `status` enum('hadir','terlambat','sakit','izin','alfa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_absensi`
--

INSERT INTO `data_absensi` (`id_absensi`, `tanggal`, `jam`, `jam_pulang`, `id_siswa`, `status`) VALUES
('ABS20231220143009705', '2023-12-20', '14:30:09', '14:30:21', 'SIS20231220111134671', 'terlambat'),
('ABS20231221093347563', '2023-12-21', '09:33:47', '09:33:47', 'SIS20231220111134671', 'izin'),
('ABS20231221093420466', '2023-12-21', '09:34:20', '00:00:00', 'SIS20231221092916348', 'hadir'),
('ABS20231226101043113', '2023-12-26', '10:10:43', '10:17:42', 'SIS20231226040932956', 'terlambat'),
('ABS20240328161008300', '2024-03-28', '16:10:08', '16:11:28', 'SIS20231226040932956', 'terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama`, `alamat`, `no_telepon`, `username`, `password`) VALUES
('ADM20210512101743582', 'admin', 'admin\r\n', '085369237896', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nip`, `nama`, `alamat`, `no_telepon`, `jenis_kelamin`, `username`, `password`) VALUES
('GUR20231118074636284', '123', 'rain', 'jakarta', '0838573947', 'perempuan', 'rain', '23678db5efde9ab46bce8c23a6d91b50'),
('GUR20231118074714854', '1234', 'febry', 'jakarta', '0857394873', 'perempuan', 'febry', '9e6c7aa46d753cd6216c616bf06ec573'),
('GUR20231118083025705', '12345', 'ronald', 'jakarta', '01857239', 'laki-laki', 'ronald', '5af0a0feb2094f43bebb50c518c1ebfe');

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(50) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','mingu') DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `id_kelas` varchar(50) DEFAULT NULL,
  `id_matapelajaran` varchar(50) DEFAULT NULL,
  `id_guru` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `hari`, `jam`, `jam_pulang`, `id_kelas`, `id_matapelajaran`, `id_guru`) VALUES
('JAD20210512102730498', 'senin', '07:30:00', '15:06:00', 'KEL20210512102626849', 'MAT20210512102612466', 'GUR20210512102430287'),
('JAD20210604091921706', 'selasa', '07:30:00', '15:06:00', 'KEL20210512102626849', 'MAT20210512102612466', 'GUR20210512102430287'),
('JAD20210604091934813', 'rabu', '07:30:00', '15:06:00', 'KEL20210512102626849', 'MAT20210604091638380', 'GUR20210512102430287'),
('JAD20210604091948341', 'kamis', '07:30:00', '15:06:00', 'KEL20210512102626849', 'MAT20210604091648772', 'GUR20210512102430287'),
('JAD20210604092002900', 'jumat', '07:30:00', '15:06:00', 'KEL20210512102626849', 'MAT20210512102612466', 'GUR20210512102430287'),
('JAD20210604092016761', 'sabtu', '07:30:00', '15:06:00', 'KEL20210512102626849', 'MAT20210512102612466', 'GUR20210512102430287');

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id_jurusan` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id_jurusan`, `jurusan`) VALUES
('JUR20231123101847915', 'RPL'),
('JUR20231123101901236', 'Multi Media'),
('JUR20231123101910125', 'Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` varchar(50) DEFAULT NULL,
  `id_guru` varchar(50) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `id_guru`, `kelas`) VALUES
('KEL20210512102626849', 'GUR20231118074636284', 'kelas 1'),
('KEL20210604091706937', 'GUR20231118074714854', 'kelas 2'),
('KEL20210604091713310', 'GUR20231118083025705', 'kelas 3');

-- --------------------------------------------------------

--
-- Table structure for table `data_matapelajaran`
--

CREATE TABLE `data_matapelajaran` (
  `id_matapelajaran` varchar(50) DEFAULT NULL,
  `matapelajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_matapelajaran`
--

INSERT INTO `data_matapelajaran` (`id_matapelajaran`, `matapelajaran`) VALUES
('MAT20231118095227450', 'Matematika'),
('MAT20231118095238908', 'Bahasa Inggris'),
('MAT20231118095251153', 'Bahasa Indonesia'),
('MAT20231118095302371', 'PKN');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` varchar(50) DEFAULT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `id_kelas` varchar(50) DEFAULT NULL,
  `id_jurusan` varchar(50) DEFAULT NULL,
  `id_tahun_ajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nis`, `nama`, `alamat`, `no_telepon`, `jenis_kelamin`, `id_kelas`, `id_jurusan`, `id_tahun_ajaran`) VALUES
('SIS20231222081910359', '123', 'Dian Triyana', 'Tangerang', '085824590137', 'perempuan', 'KEL20210604091713310', 'JUR20231123101901236', 'TAH20230804054310100'),
('SIS20231226040932956', '1', 'Dimas Permana', 'Perum Korpri Blok G2 No. 11 Ciuyah, Rangkasbitung. Kab Lebak', '8999999', 'laki-laki', 'KEL20210604091713310', 'JUR20231123101901236', 'TAH20230804054302921');

-- --------------------------------------------------------

--
-- Table structure for table `data_tahun_ajaran`
--

CREATE TABLE `data_tahun_ajaran` (
  `id_tahun_ajaran` varchar(50) DEFAULT NULL,
  `tahun_ajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_tahun_ajaran`
--

INSERT INTO `data_tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`) VALUES
('TAH20210512102638950', '2021'),
('TAH20230804054302921', '2022'),
('TAH20230804054310100', '2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
