-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 08:34 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_cas`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dp_guru` (IN `sp_NIP` VARCHAR(18))  NO SQL
DELETE FROM tb_guru WHERE NIP=sp_NIP$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dp_jadwal` (IN `sp_idjadwal` INT(11))  NO SQL
DELETE from tb_jadwal WHERE id_jadwal=sp_idjadwal$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dp_jurusan` (IN `sp_idjur` INT)  NO SQL
DELETE FROM tb_jurusan WHERE id_jurusan = sp_idjur$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dp_kelas` (IN `sp_idkls` INT(11))  NO SQL
DELETE FROM tb_kelas WHERE id_kelas = sp_idkls$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dp_ketguru` (IN `sp_id_ket` INT(11))  NO SQL
DELETE FROM tb_ket_guru WHERE id_ket_guru = sp_id_ket$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dp_mapel` (IN `sp_mapel` VARCHAR(10))  NO SQL
DELETE FROM tb_mapel WHERE id_mapel = sp_mapel$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dp_users` (IN `sp_id` INT(11))  NO SQL
DELETE FROM tb_user WHERE idusers = sp_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_guru` (IN `sp_NIP` VARCHAR(18), IN `sp_Nama` VARCHAR(50), IN `sp_No_hp` VARCHAR(13))  NO SQL
UPDATE tb_guru SET
Nama = sp_Nama,
No_hp =sp_No_hp
where NIP=sp_NIP$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_jadwal` (IN `sp_id_jadwal` INT(11), IN `sp_hari` VARCHAR(12), IN `sp_id_w` INT(11), IN `sp_NIP` VARCHAR(18), IN `sp_id_mapel` VARCHAR(10), IN `sp_id_kelas` INT(11))  NO SQL
UPDATE tb_jadwal SET
hari = sp_hari,
id_waktu =sp_id_w,
NIP = sp_NIP,
id_mapel =sp_id_mapel,
id_kelas = sp_id_kelas
WHERE id_jadwal = sp_id_jadwal$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_jurusan` (IN `sp_id_jur` INT(11), IN `sp_nm_jur` VARCHAR(50))  NO SQL
UPDATE tb_jurusan SET
nama_jurusan = sp_nm_jur
WHERE id_jurusan = sp_id_jur$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_kehadiran` (IN `p_id` INT(11), IN `p_status` VARCHAR(13), IN `p_ket` TEXT)  NO SQL
BEGIN

DECLARE v_id int(11);

UPDATE tb_jadwal SET 
status =p_status,
keterangan =p_ket
where id_jadwal =p_id ;

SELECT last_insert_id() INTO v_id;

INSERT INTO tb_ket_guru SET
id_jadwal = p_id,
status = p_status,
keterangan = p_ket ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_kelas` (IN `sp_id_kelas` INT(11), IN `sp_Nama_kelas` VARCHAR(10), IN `sp_id_jurusan` INT(11))  NO SQL
UPDATE tb_kelas SET
Nama_kelas = sp_Nama_kelas,
id_jurusan = sp_id_jurusan
WHERE id_kelas = sp_id_kelas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_ket_guru` (IN `sp_id_ket_guru` INT(11), IN `sp_id_jadwal` INT(11), IN `sp_status` VARCHAR(20), IN `sp_ket` TEXT)  NO SQL
UPDATE tb_ket_guru SET 
id_jadwal = sp_id_jadwal,
status = sp_status,
keterangan = sp_ket
WHERE id_ket_guru = sp_id_ket_guru$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_mapel` (IN `sp_id_mapel` VARCHAR(10), IN `sp_mapel` VARCHAR(50), IN `sp_lama_mapel` INT(3), IN `sp_tahun_ajar` VARCHAR(10))  NO SQL
UPDATE tb_mapel SET
Mata_pelajaran = sp_mapel,
lama_mapel = sp_lama_mapel,
Tahun_ajar = sp_tahun_ajar
WHERE id_mapel = sp_id_mapel$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_ubah_pass` (IN `p_id` INT(11), IN `p_pass` VARCHAR(255))  NO SQL
update tb_user
set password=sha2(p_pass,512)
where idusers=p_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ep_user` (IN `sp_id_users` INT(11), IN `sp_nama` VARCHAR(50), IN `sp_username` VARCHAR(50))  NO SQL
update tb_user
set nama=sp_nama,
username =sp_username
where idusers=sp_id_users$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jadwal_perhari` (IN `p_hari` VARCHAR(12))  NO SQL
SELECT * FROM tb_jadwal WHERE hari = p_hari$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_guru` (IN `sp_NIP` VARCHAR(18), IN `sp_Nama` VARCHAR(50), IN `sp_no_hp` VARCHAR(13))  NO SQL
BEGIN


INSERT INTO tb_guru
set NIP = sp_NIP,
Nama = sp_Nama,
No_hp = sp_No_hp;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_jadwal` (IN `sp_id` INT(11), IN `sp_hari` VARCHAR(12), IN `sp_id_w` INT(11), IN `sp_NIP` VARCHAR(18), IN `sp_id_mapel` VARCHAR(10), IN `sp_id_kelas` INT(11), IN `sp_status` VARCHAR(13))  NO SQL
BEGIN

INSERT INTO tb_jadwal
set id_jadwal =sp_id,
hari = sp_hari,
id_waktu = sp_id_w,
NIP= sp_NIP,
id_mapel =sp_id_mapel,
id_kelas = sp_id_kelas,
status = sp_status;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_jurusan` (IN `sp_id_jurusan` INT(11), IN `sp_nama_jurusan` VARCHAR(50))  NO SQL
BEGIN

INSERT INTO tb_jurusan
set id_jurusan = sp_id_jurusan,
nama_jurusan = sp_nama_jurusan;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_kelas` (IN `sp_id_kelas` INT(11), IN `sp_nama_kelas` VARCHAR(10), IN `sp_id_jurusan` INT(11))  NO SQL
INSERT INTO tb_kelas
set id_kelas = sp_id_kelas,
nama_kelas = sp_nama_kelas,
id_jurusan = sp_id_jurusan$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_ket_guru` (IN `sp_id_jadwal` INT(11), IN `sp_status` VARCHAR(20), IN `sp_keterangan` TEXT)  NO SQL
BEGIN

INSERT INTO tb_ket_guru
set id_jadwal = sp_id_jadwal,
status = sp_status,
keterangan = sp_keterangan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_mapel` (IN `sp_id_mapel` VARCHAR(10), IN `sp_mata_pelajaran` VARCHAR(50), IN `sp_lama_mapel` INT(3), IN `sp_tahun_ajaran` VARCHAR(10))  NO SQL
BEGIN

INSERT INTO tb_mapel
set id_mapel = sp_id_mapel,
Mata_pelajaran = sp_mata_pelajaran,
lama_mapel = sp_lama_mapel,
Tahun_ajar = sp_tahun_ajaran;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_user` (IN `sp_id` VARCHAR(11), IN `sp_nama` VARCHAR(50), IN `sp_username` VARCHAR(50), IN `sp_password` VARCHAR(255), IN `sp_level` INT(3))  NO SQL
BEGIN

DECLARE last_id int(11);

INSERT INTO tb_user
set idusers = sp_id,
nama = sp_nama,
username = sp_username,
password = sha2(sp_password,512),
level = sp_level;

SET last_id = last_insert_id();

SELECT last_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_userguru` (IN `p_nama` VARCHAR(50), IN `p_username` VARCHAR(50), IN `p_password` VARCHAR(255))  NO SQL
insert into tb_user set nama=p_nama,
username=p_username,
password=SHA2(p_password,512),
level='2'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ambil_data_user` (IN `p_username` VARCHAR(50), IN `p_password` VARCHAR(255))  NO SQL
SELECT *
FROM tb_user
WHERE username=p_username
AND password=sha2(p_password,512)$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `f_ceklogin` (`f_username` VARCHAR(50), `f_password` VARCHAR(100)) RETURNS INT(11) NO SQL
BEGIN

DECLARE hasil INT(1);

SELECT COUNT(*) FROM tb_user
WHERE username = f_username
AND password = sha2(f_password,512) into hasil;

return hasil;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_guru`
--
CREATE TABLE `data_guru` (
`NIP` varchar(18)
,`Nama` varchar(50)
,`No_hp` varchar(13)
,`id_mapel` varchar(10)
,`Mata_pelajaran` varchar(50)
,`lama_mapel` int(3)
,`Tahun_ajar` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jadwal_guru_ngajar`
--
CREATE TABLE `jadwal_guru_ngajar` (
`id_jadwal` int(11)
,`id_waktu` int(11)
,`jam_ke` int(3)
,`jam_awal` time
,`jam_akhir` time
,`hari` varchar(12)
,`NIP` varchar(18)
,`Nama` varchar(50)
,`id_kelas` int(11)
,`nama_kelas` varchar(10)
,`id_jurusan` int(11)
,`nama_jurusan` varchar(50)
,`id_mapel` varchar(10)
,`Mata_pelajaran` varchar(50)
,`lama_mapel` int(3)
,`Tahun_ajar` varchar(10)
,`status` varchar(13)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jadwal_perhari`
--
CREATE TABLE `jadwal_perhari` (
`id_jadwal` int(11)
,`id_waktu` int(11)
,`jam_ke` int(3)
,`jam_awal` time
,`jam_akhir` time
,`hari` varchar(12)
,`NIP` varchar(18)
,`Nama` varchar(50)
,`id_kelas` int(11)
,`nama_kelas` varchar(10)
,`id_jurusan` int(11)
,`nama_jurusan` varchar(50)
,`id_mapel` varchar(10)
,`Mata_pelajaran` varchar(50)
,`lama_mapel` int(3)
,`Tahun_ajar` varchar(10)
,`status` varchar(13)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kelasjur`
--
CREATE TABLE `kelasjur` (
`id_kelas` int(11)
,`Nama_kelas` varchar(10)
,`id_jurusan` int(11)
,`nama_jurusan` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_log`
--

CREATE TABLE `tabel_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `log_user` varchar(255) DEFAULT NULL,
  `log_ip` varchar(50) DEFAULT NULL,
  `log_namapc` varchar(50) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_log`
--

INSERT INTO `tabel_log` (`log_id`, `log_time`, `log_user`, `log_ip`, `log_namapc`, `log_tipe`, `log_desc`) VALUES
(110, '2018-03-01 00:39:08', 'Dode', '::1', 'gede-PC', 0, 'User Login'),
(111, '2018-03-01 04:21:44', 'Dode', '::1', 'gede-PC', 0, 'User Login'),
(112, '2018-03-01 04:22:06', 'Dode', '::1', 'gede-PC', 2, 'User Melakukan Penambahan data jadwal'),
(113, '2018-03-01 04:22:43', 'Dode', '::1', 'gede-PC', 1, 'User Logout'),
(114, '2018-03-01 04:24:28', 'Dode', '::1', 'gede-PC', 0, 'User Login'),
(115, '2018-03-01 04:24:47', 'Dode', '::1', 'gede-PC', 2, 'User Melakukan Penambahan data jadwal'),
(116, '2018-03-01 04:25:13', 'Dode', '::1', 'gede-PC', 2, 'User Melakukan Penambahan data jadwal'),
(117, '2018-03-01 04:25:33', 'Dode', '::1', 'gede-PC', 2, 'User Melakukan Penambahan data jadwal'),
(118, '2018-03-01 04:26:52', 'Dode', '::1', 'gede-PC', 3, 'User pelakukan edit data_kehadiran'),
(119, '2018-03-01 04:27:13', 'Dode', '::1', 'gede-PC', 3, 'User pelakukan edit data_kehadiran'),
(120, '2018-03-01 04:43:27', 'Dode', '::1', 'gede-PC', 1, 'User Logout'),
(121, '2018-03-01 04:43:36', '123456789009876543', '::1', 'gede-PC', 0, 'User Login'),
(122, '2018-03-01 04:43:44', '123456789009876543', '::1', 'gede-PC', 1, 'User Logout'),
(123, '2018-03-01 04:43:51', 'Dode', '::1', 'gede-PC', 0, 'User Login'),
(124, '2018-03-01 05:45:55', 'Dode', '::1', 'gede-PC', 1, 'User Logout'),
(125, '2018-03-01 05:46:01', 'Dode', '::1', 'gede-PC', 0, 'User Login'),
(126, '2018-03-01 06:13:06', 'Dode', '::1', 'gede-PC', 2, 'User Melakukan Penambahan data jadwal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `NIP` varchar(18) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `No_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`NIP`, `Nama`, `No_hp`) VALUES
('123443211234432188', 'denil', '0897878989898'),
('123456789009876543', 'ibu ani', '085678987654'),
('123456789009876547', 'dewa', '085678987654'),
('1698755432786433', 'Dewa Gede S', '085676575438'),
('187878787878787787', 'ayah', '876767'),
('189697699777777777', 'Diah', '085678987659'),
('189697699777777888', 'Diana', '085789989497');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(12) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `NIP` varchar(18) NOT NULL,
  `id_mapel` varchar(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` varchar(13) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `hari`, `id_waktu`, `NIP`, `id_mapel`, `id_kelas`, `status`, `keterangan`) VALUES
(26, 'Tuesday', 2, '123456789009876543', '001', 1, 'Hadir', NULL),
(28, 'Tuesday', 2, '123456789009876543', '003', 3, 'Hadir', NULL),
(29, 'Tuesday', 2, '123456789009876543', '003', 4, 'Hadir', NULL),
(30, 'Thursday', 6, '123456789009876543', '003', 5, 'Tidak Hadir', ''),
(31, 'Wednesday', 6, '1698755432786433', '003', 1, 'Hadir', NULL),
(33, 'Wednesday', 2, '1698755432786433', '002', 2, 'Hadir', NULL),
(34, 'Wednesday', 2, '1698755432786433', '003', 2, 'Hadir', NULL),
(35, 'Wednesday', 2, '1698755432786433', '004', 3, 'Hadir', NULL),
(36, 'Wednesday', 2, '1698755432786433', '002', 4, 'Hadir', NULL),
(37, 'Wednesday', 2, '1698755432786433', '003', 5, 'Tidak Hadir', ''),
(38, 'Wednesday', 7, '1698755432786433', '004', 1, 'Hadir', NULL),
(39, 'Wednesday', 3, '1698755432786433', '002', 2, 'Hadir', NULL),
(40, 'Wednesday', 3, '1698755432786433', '003', 3, 'Hadir', NULL),
(41, 'Wednesday', 3, '1698755432786433', '001', 4, 'Hadir', NULL),
(42, 'Wednesday', 3, '1698755432786433', '002', 5, 'Hadir', NULL),
(43, 'Thursday', 2, '123456789009876543', '002', 1, 'Hadir', NULL),
(44, 'Thursday', 2, '123456789009876543', '003', 2, 'Hadir', NULL),
(45, 'Thursday', 2, '123456789009876543', '004', 3, 'Tidak Hadir', ''),
(46, 'Thursday', 6, '123456789009876543', '002', 4, 'Hadir', NULL),
(47, 'Thursday', 6, '123456789009876543', '003', 4, 'Hadir', NULL),
(48, 'Thursday', 3, '123456789009876543', '004', 1, 'Hadir', NULL),
(49, 'Thursday', 3, '123456789009876543', '002', 2, 'Hadir', NULL),
(50, 'Thursday', 3, '123456789009876543', '003', 3, 'Hadir', NULL),
(51, 'Thursday', 7, '123456789009876543', '001', 4, 'Hadir', NULL),
(52, 'Thursday', 2, '123456789009876543', '002', 5, 'Hadir', NULL),
(53, 'Thursday', 6, '189697699777777888', '004', 2, 'Tidak Hadir', ''),
(54, 'Thursday', 8, '1698755432786433', '003', 4, 'Hadir', NULL),
(55, 'Thursday', 8, '187878787878787787', '002', 1, 'Tidak Hadir', ''),
(56, 'Thursday', 8, '123456789009876547', '001', 2, 'Hadir', NULL),
(57, 'Thursday', 8, '1698755432786433', '003', 3, 'Hadir', NULL),
(58, 'Thursday', 20, '1698755432786433', '002', 3, 'Hadir', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'PRAMUGARI/RA'),
(2, 'GROUND STAFF'),
(3, 'ADMINISTRASI PERKANTORAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `Nama_kelas` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `Nama_kelas`, `id_jurusan`) VALUES
(1, 'X AP1', 3),
(2, 'X AP2', 3),
(3, 'X AP3', 3),
(4, 'XI AP', 3),
(5, 'XII AP', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ket_guru`
--

CREATE TABLE `tb_ket_guru` (
  `id_ket_guru` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status` varchar(13) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ket_guru`
--

INSERT INTO `tb_ket_guru` (`id_ket_guru`, `id_jadwal`, `status`, `keterangan`) VALUES
(1, 1, 'Hadir', NULL),
(2, 8, 'hadir', ''),
(3, 8, 'Tidak Hadir', 'Sedang Rapat'),
(4, 2, 'Tidak Hadir', 'sedang rapat jurusan'),
(5, 2, 'Hadir', ''),
(6, 2, 'Tidak Hadir', 'sakit'),
(7, 2, 'Hadir', 'sakit'),
(8, 2, 'Tidak Hadir', 'sakit'),
(9, 10, 'Hadir', ''),
(10, 2, 'Hadir', ''),
(11, 37, 'Tidak Hadir', ''),
(12, 45, 'Tidak Hadir', ''),
(13, 53, 'Tidak Hadir', ''),
(14, 30, 'Tidak Hadir', ''),
(15, 55, 'Tidak Hadir', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` varchar(10) NOT NULL,
  `Mata_pelajaran` varchar(50) NOT NULL,
  `lama_mapel` int(3) NOT NULL,
  `Tahun_ajar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `Mata_pelajaran`, `lama_mapel`, `Tahun_ajar`) VALUES
('001', 'Bahasa Indonesia', 3, '2018/2019'),
('002', 'Bahasa Inggris', 2, '2018/2019'),
('003', 'KKPI', 1, '2018/2019'),
('004', 'Olah Raga', 2, '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `idusers` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`idusers`, `nama`, `username`, `password`, `level`) VALUES
(5, 'Admin', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '1'),
(6, 'Dewa Gd S.', 'bejok', 'c0e63c847ca46cfd18dfe07d44ff30347d7b6af29f1e46a9d627cc87e7057ee514758062a68744d0bb4669ebcb1fb2ad54710157e7a4a74e920da25d7274dab0', '1'),
(7, 'Dode', 'Dode', 'f3d7b5a8ee73e616609d29dd45adc254cd1a18a6e31cf84c19fe1934eeeccc83d1ae86ca2cceaa7c57ee9a3d1ee0b74a28672204e05f05595a24f2d60d3e3ace', '1'),
(8, 'Ibu Ani', '123456789009876543', 'f74d2480c1b7388dfcd4c8f766e05fa6832a5ffb17f07a59d293402b5de49f0604c95ea25a80497836ddf5d516b8f97ec5e0cc23bd0334276fbbc6ec941904b6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktu`
--

CREATE TABLE `tb_waktu` (
  `id_waktu` int(11) NOT NULL,
  `jam_ke` int(3) NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waktu`
--

INSERT INTO `tb_waktu` (`id_waktu`, `jam_ke`, `jam_awal`, `jam_akhir`) VALUES
(1, 100, '07:00:00', '07:30:00'),
(2, 1, '07:30:00', '08:10:00'),
(3, 2, '08:10:00', '08:50:00'),
(4, 3, '08:50:00', '09:30:00'),
(5, 200, '09:30:00', '09:45:00'),
(6, 4, '09:45:00', '10:25:00'),
(7, 5, '10:25:00', '11:05:00'),
(8, 6, '11:05:00', '11:45:00'),
(9, 300, '11:45:00', '12:30:00'),
(10, 7, '12:30:00', '13:10:00'),
(11, 8, '13:10:00', '13:50:00'),
(15, 9, '13:50:00', '14:30:00'),
(16, 10, '14:30:00', '15:10:00'),
(17, 400, '15:10:00', '15:30:00'),
(18, 500, '15:30:00', '15:45:00'),
(19, 600, '11:45:00', '12:45:00'),
(20, 7, '12:45:00', '13:25:00'),
(21, 8, '13:25:00', '14:05:00'),
(22, 700, '14:05:00', '14:20:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `test123`
--
CREATE TABLE `test123` (
`id_jadwal` int(11)
,`id_waktu` int(11)
,`jam_ke` int(3)
,`jam_awal` time
,`jam_akhir` time
,`hari` varchar(12)
,`NIP` varchar(18)
,`Nama` varchar(50)
,`id_kelas` int(11)
,`nama_kelas` varchar(10)
,`id_jurusan` int(11)
,`nama_jurusan` varchar(50)
,`id_mapel` varchar(10)
,`Mata_pelajaran` varchar(50)
,`lama_mapel` int(3)
,`Tahun_ajar` varchar(10)
,`status` varchar(13)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Structure for view `data_guru`
--
DROP TABLE IF EXISTS `data_guru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_guru`  AS  select `a`.`NIP` AS `NIP`,`b`.`Nama` AS `Nama`,`b`.`No_hp` AS `No_hp`,`c`.`id_mapel` AS `id_mapel`,`c`.`Mata_pelajaran` AS `Mata_pelajaran`,`c`.`lama_mapel` AS `lama_mapel`,`c`.`Tahun_ajar` AS `Tahun_ajar` from ((`tb_jadwal` `a` join `tb_guru` `b`) join `tb_mapel` `c`) where ((`a`.`NIP` = `b`.`NIP`) and (`a`.`id_mapel` = `c`.`id_mapel`)) ;

-- --------------------------------------------------------

--
-- Structure for view `jadwal_guru_ngajar`
--
DROP TABLE IF EXISTS `jadwal_guru_ngajar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jadwal_guru_ngajar`  AS  select `a`.`id_jadwal` AS `id_jadwal`,`a`.`id_waktu` AS `id_waktu`,`b`.`jam_ke` AS `jam_ke`,`b`.`jam_awal` AS `jam_awal`,`b`.`jam_akhir` AS `jam_akhir`,`a`.`hari` AS `hari`,`a`.`NIP` AS `NIP`,`c`.`Nama` AS `Nama`,`a`.`id_kelas` AS `id_kelas`,`d`.`Nama_kelas` AS `nama_kelas`,`d`.`id_jurusan` AS `id_jurusan`,`e`.`nama_jurusan` AS `nama_jurusan`,`a`.`id_mapel` AS `id_mapel`,`f`.`Mata_pelajaran` AS `Mata_pelajaran`,`f`.`lama_mapel` AS `lama_mapel`,`f`.`Tahun_ajar` AS `Tahun_ajar`,`a`.`status` AS `status`,`a`.`keterangan` AS `keterangan` from (((((`tb_jadwal` `a` join `tb_waktu` `b`) join `tb_guru` `c`) join `tb_kelas` `d`) join `tb_jurusan` `e`) join `tb_mapel` `f`) where ((`a`.`id_waktu` = `b`.`id_waktu`) and (`a`.`NIP` = `c`.`NIP`) and (`a`.`id_kelas` = `d`.`id_kelas`) and (`d`.`id_jurusan` = `e`.`id_jurusan`) and (`a`.`id_mapel` = `f`.`id_mapel`)) ;

-- --------------------------------------------------------

--
-- Structure for view `jadwal_perhari`
--
DROP TABLE IF EXISTS `jadwal_perhari`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jadwal_perhari`  AS  select `a`.`id_jadwal` AS `id_jadwal`,`a`.`id_waktu` AS `id_waktu`,`b`.`jam_ke` AS `jam_ke`,`b`.`jam_awal` AS `jam_awal`,`b`.`jam_akhir` AS `jam_akhir`,`a`.`hari` AS `hari`,`a`.`NIP` AS `NIP`,`c`.`Nama` AS `Nama`,`a`.`id_kelas` AS `id_kelas`,`d`.`Nama_kelas` AS `nama_kelas`,`d`.`id_jurusan` AS `id_jurusan`,`e`.`nama_jurusan` AS `nama_jurusan`,`a`.`id_mapel` AS `id_mapel`,`f`.`Mata_pelajaran` AS `Mata_pelajaran`,`f`.`lama_mapel` AS `lama_mapel`,`f`.`Tahun_ajar` AS `Tahun_ajar`,`a`.`status` AS `status`,`a`.`keterangan` AS `keterangan` from (((((`tb_jadwal` `a` join `tb_waktu` `b`) join `tb_guru` `c`) join `tb_kelas` `d`) join `tb_jurusan` `e`) join `tb_mapel` `f`) where ((`a`.`id_waktu` = `b`.`id_waktu`) and (`a`.`NIP` = `c`.`NIP`) and (`a`.`id_kelas` = `d`.`id_kelas`) and (`d`.`id_jurusan` = `e`.`id_jurusan`) and (`a`.`id_mapel` = `f`.`id_mapel`) and (`a`.`hari` = convert(dayname(now()) using latin1)) and (cast(now() as time) >= `b`.`jam_awal`) and (cast(now() as time) <= `b`.`jam_akhir`)) ;

-- --------------------------------------------------------

--
-- Structure for view `kelasjur`
--
DROP TABLE IF EXISTS `kelasjur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelasjur`  AS  select `a`.`id_kelas` AS `id_kelas`,`a`.`Nama_kelas` AS `Nama_kelas`,`b`.`id_jurusan` AS `id_jurusan`,`b`.`nama_jurusan` AS `nama_jurusan` from (`tb_kelas` `a` join `tb_jurusan` `b`) where ((`a`.`id_kelas` <> 0) and (`a`.`id_jurusan` = `b`.`id_jurusan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `test123`
--
DROP TABLE IF EXISTS `test123`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test123`  AS  select `a`.`id_jadwal` AS `id_jadwal`,`a`.`id_waktu` AS `id_waktu`,`b`.`jam_ke` AS `jam_ke`,`b`.`jam_awal` AS `jam_awal`,`b`.`jam_akhir` AS `jam_akhir`,`a`.`hari` AS `hari`,`a`.`NIP` AS `NIP`,`c`.`Nama` AS `Nama`,`a`.`id_kelas` AS `id_kelas`,`d`.`Nama_kelas` AS `nama_kelas`,`d`.`id_jurusan` AS `id_jurusan`,`e`.`nama_jurusan` AS `nama_jurusan`,`a`.`id_mapel` AS `id_mapel`,`f`.`Mata_pelajaran` AS `Mata_pelajaran`,`f`.`lama_mapel` AS `lama_mapel`,`f`.`Tahun_ajar` AS `Tahun_ajar`,`a`.`status` AS `status`,`a`.`keterangan` AS `keterangan` from (((((`tb_jadwal` `a` join `tb_waktu` `b`) join `tb_guru` `c`) join `tb_kelas` `d`) join `tb_jurusan` `e`) join `tb_mapel` `f`) where ((`a`.`id_waktu` = `b`.`id_waktu`) and (`a`.`NIP` = `c`.`NIP`) and (`a`.`id_kelas` = `d`.`id_kelas`) and (`d`.`id_jurusan` = `e`.`id_jurusan`) and (`a`.`id_mapel` = `f`.`id_mapel`) and (`a`.`hari` = convert(dayname(now()) using latin1)) and (`b`.`jam_awal` > cast(now() as time))) order by `b`.`jam_awal` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_ket_guru`
--
ALTER TABLE `tb_ket_guru`
  ADD PRIMARY KEY (`id_ket_guru`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`idusers`);

--
-- Indexes for table `tb_waktu`
--
ALTER TABLE `tb_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_ket_guru`
--
ALTER TABLE `tb_ket_guru`
  MODIFY `id_ket_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_waktu`
--
ALTER TABLE `tb_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
