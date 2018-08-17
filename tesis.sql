-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tesis_db
CREATE DATABASE IF NOT EXISTS `tesis_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tesis_db`;

-- Dumping structure for table tesis_db.actividades
CREATE TABLE IF NOT EXISTS `actividades` (
  `id_actividades` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_act` varchar(100) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link_act` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_actividades`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.actividades: ~4 rows (approximately)
DELETE FROM `actividades`;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` (`id_actividades`, `nombre_act`, `estado`, `fecha`, `link_act`) VALUES
	(1, 'Bienvenida Especial', b'0', '2018-08-08 09:35:45', 'bienvenida-especial-agregar.html'),
	(2, 'Retiros Amazing race', b'0', '2018-08-08 09:35:56', 'amazing-race-agregar.html'),
	(3, 'Celulas NICE', b'0', '2018-08-08 09:36:04', 'celulas-nice-agregar.html'),
	(4, 'Conferencia Especial', b'0', '2018-08-08 09:36:11', 'conferencia-especial-agregar.html');
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;

-- Dumping structure for table tesis_db.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alumno` varchar(100) DEFAULT NULL,
  `cif` varchar(15) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_facultad` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.alumnos: ~59 rows (approximately)
DELETE FROM `alumnos`;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id_alumno`, `nombre_alumno`, `cif`, `fecha`, `id_facultad`, `id_actividad`, `estado`) VALUES
	(1, 'Irvn Sanchez', '2013010360', '2018-08-17 07:28:22', 1, 1, 0),
	(2, 'Irvn Sanchez', '2013010360', '2018-08-17 07:29:05', 1, 1, 0),
	(3, 'Irvn Sanchez', '2013010360', '2018-08-17 07:54:26', 1, 1, 0),
	(4, '', '', '2018-08-17 07:54:32', 0, 1, 0),
	(5, '', '', '2018-08-17 07:55:38', 0, 1, 0),
	(6, 'Irvn Sanchez', '489655', '2018-08-17 08:02:08', 1, 1, 0),
	(7, '', '', '2018-08-17 08:12:27', 0, 1, 0),
	(8, '', '', '2018-08-17 08:15:27', 0, 1, 0),
	(9, '', '', '2018-08-17 08:17:23', 0, 1, 0),
	(10, 'Irvn Sanchez', '2013010396', '2018-08-17 08:27:11', 1, 1, 0),
	(11, 'Irvin', '87498456', '2018-08-17 08:41:07', 5, 2, 0),
	(12, '', '', '2018-08-17 08:45:04', 0, 2, 0),
	(13, '', '', '2018-08-17 08:48:50', 0, 2, 0),
	(14, '', '', '2018-08-17 08:49:05', 0, 2, 0),
	(15, '', '', '2018-08-17 09:00:06', 0, 2, 0),
	(16, '', '', '2018-08-17 09:00:27', 0, 2, 0),
	(17, '', '', '2018-08-17 11:19:45', 0, 2, 0),
	(18, '', '', '2018-08-17 11:23:18', 0, 2, 0),
	(19, '', '', '2018-08-17 11:43:49', 0, 2, 0),
	(20, '', '', '2018-08-17 11:44:23', 0, 2, 0),
	(21, '', '', '2018-08-17 11:46:08', 0, 2, 0),
	(22, '', '', '2018-08-17 11:46:19', 0, 2, 0),
	(23, '', '', '2018-08-17 11:47:35', 0, 2, 0),
	(24, '', '', '2018-08-17 11:48:10', 0, 2, 0),
	(25, '', '', '2018-08-17 11:48:29', 0, 2, 0),
	(26, '', '', '2018-08-17 11:49:23', 0, 2, 0),
	(27, '', '', '2018-08-17 11:52:09', 0, 2, 0),
	(28, '', '', '2018-08-17 11:53:15', 0, 2, 0),
	(29, '', '', '2018-08-17 11:54:03', 0, 2, 0),
	(30, '', '', '2018-08-17 11:55:26', 0, 2, 0),
	(31, '', '', '2018-08-17 11:56:28', 0, 2, 0),
	(32, '', '', '2018-08-17 11:57:02', 0, 2, 0),
	(33, '', '', '2018-08-17 11:57:32', 0, 2, 0),
	(34, '', '', '2018-08-17 11:57:54', 0, 2, 0),
	(35, '', '', '2018-08-17 11:58:39', 0, 2, 0),
	(36, '', '', '2018-08-17 13:32:55', 0, 2, 0),
	(37, '', '', '2018-08-17 13:34:29', 0, 2, 0),
	(38, '', '', '2018-08-17 13:34:45', 0, 2, 0),
	(39, '', '', '2018-08-17 13:35:59', 0, 2, 0),
	(40, '', '', '2018-08-17 13:39:12', 0, 2, 0),
	(41, '', '', '2018-08-17 13:44:42', 0, 2, 0),
	(42, '', '', '2018-08-17 13:47:12', 0, 2, 0),
	(43, '', '', '2018-08-17 13:47:29', 0, 2, 0),
	(44, '', '', '2018-08-17 13:47:50', 0, 0, 0),
	(45, '', '', '2018-08-17 13:50:08', 0, 2, 0),
	(46, '', '', '2018-08-17 13:50:51', 0, 2, 0),
	(47, '', '', '2018-08-17 13:52:12', 0, 2, 0),
	(48, '', '', '2018-08-17 13:53:21', 0, 2, 0),
	(49, '', '', '2018-08-17 13:53:55', 0, 2, 0),
	(50, '', '', '2018-08-17 13:54:24', 0, 2, 0),
	(51, '', '', '2018-08-17 13:58:28', 0, 2, 0),
	(52, '', '', '2018-08-17 13:58:53', 0, 2, 0),
	(53, '', '', '2018-08-17 14:07:05', 0, 2, 0),
	(54, '', '', '2018-08-17 14:08:01', 0, 2, 0),
	(55, '', '', '2018-08-17 14:09:51', 0, 2, 0),
	(56, '', '', '2018-08-17 14:10:52', 0, 2, 0),
	(57, '', '', '2018-08-17 14:11:20', 0, 2, 0),
	(58, '', '', '2018-08-17 14:12:16', 0, 2, 0),
	(59, '', '', '2018-08-17 14:12:32', 0, 2, 0),
	(60, 'Irvin', '1984156', '2018-08-17 14:14:06', 1, 2, 0),
	(61, 'Irvin', '8549841516', '2018-08-17 14:28:42', 1, 2, 0);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Dumping structure for table tesis_db.alum_extra
CREATE TABLE IF NOT EXISTS `alum_extra` (
  `id_almex` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_almex`),
  KEY `FK_alum_extra_alumnos` (`id_alumno`),
  CONSTRAINT `FK_alum_extra_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.alum_extra: ~0 rows (approximately)
DELETE FROM `alum_extra`;
/*!40000 ALTER TABLE `alum_extra` DISABLE KEYS */;
/*!40000 ALTER TABLE `alum_extra` ENABLE KEYS */;

-- Dumping structure for table tesis_db.ciclo
CREATE TABLE IF NOT EXISTS `ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.ciclo: ~0 rows (approximately)
DELETE FROM `ciclo`;
/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciclo` ENABLE KEYS */;

-- Dumping structure for table tesis_db.coment_act
CREATE TABLE IF NOT EXISTS `coment_act` (
  `id_coment` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `expectativas` text,
  `ideas` text,
  `estado` int(11) DEFAULT '0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_coment`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.coment_act: ~7 rows (approximately)
DELETE FROM `coment_act`;
/*!40000 ALTER TABLE `coment_act` DISABLE KEYS */;
INSERT INTO `coment_act` (`id_coment`, `id_alumno`, `id_actividad`, `expectativas`, `ideas`, `estado`, `fecha`) VALUES
	(1, 0, 0, '', '', 0, '2018-08-17 07:55:09'),
	(2, 5, 1, '', '', 0, '2018-08-17 07:55:38'),
	(3, 6, 1, 'muy buenas', 'muy malas', 0, '2018-08-17 08:02:08'),
	(4, 7, 1, '', '', 0, '2018-08-17 08:12:27'),
	(5, 8, 1, '', '', 0, '2018-08-17 08:15:27'),
	(6, 9, 1, '', '', 0, '2018-08-17 08:17:23'),
	(7, 10, 1, 'jjjj', 'jjjj', 0, '2018-08-17 08:27:11');
/*!40000 ALTER TABLE `coment_act` ENABLE KEYS */;

-- Dumping structure for table tesis_db.conf_arg
CREATE TABLE IF NOT EXISTS `conf_arg` (
  `id_conf` int(11) NOT NULL AUTO_INCREMENT,
  `benf_adq` varchar(80) DEFAULT NULL,
  `opn_con` int(11) DEFAULT NULL,
  `desc_est` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_conf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.conf_arg: ~0 rows (approximately)
DELETE FROM `conf_arg`;
/*!40000 ALTER TABLE `conf_arg` DISABLE KEYS */;
/*!40000 ALTER TABLE `conf_arg` ENABLE KEYS */;

-- Dumping structure for table tesis_db.enc_sat
CREATE TABLE IF NOT EXISTS `enc_sat` (
  `id_encu` int(11) NOT NULL AUTO_INCREMENT,
  `num_pr` int(11) DEFAULT NULL,
  `num_rest` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0',
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_encu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.enc_sat: ~0 rows (approximately)
DELETE FROM `enc_sat`;
/*!40000 ALTER TABLE `enc_sat` DISABLE KEYS */;
INSERT INTO `enc_sat` (`id_encu`, `num_pr`, `num_rest`, `fecha`, `estado`, `id_alumno`) VALUES
	(1, 1, 4, '2018-08-17 14:28:42', 0, 61),
	(2, 2, 4, '2018-08-17 14:28:42', 0, 61),
	(3, 4, 4, '2018-08-17 14:28:42', 0, 61),
	(4, 3, 5, '2018-08-17 14:28:42', 0, 61),
	(5, 6, 2, '2018-08-17 14:28:42', 0, 61),
	(6, 0, 2, '2018-08-17 14:28:42', 0, 61),
	(7, 5, 1, '2018-08-17 14:28:42', 0, 61);
/*!40000 ALTER TABLE `enc_sat` ENABLE KEYS */;

-- Dumping structure for table tesis_db.facultad
CREATE TABLE IF NOT EXISTS `facultad` (
  `id_facultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_fac` varchar(80) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_facultad`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.facultad: ~6 rows (approximately)
DELETE FROM `facultad`;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` (`id_facultad`, `nombre_fac`, `estado`, `fecha`) VALUES
	(1, 'Ingenieria en Sistemas Computacionales', 0, '2018-08-02 00:00:00'),
	(2, 'Medicina', 0, '2018-08-02 08:25:08'),
	(3, 'Odontologia', 0, '2018-08-02 08:25:30'),
	(4, 'Ciencias Empresariales y Economicas', 0, '2018-08-02 08:26:07'),
	(5, 'Ciencias Sociales', 0, '2018-08-02 08:26:15'),
	(6, 'Ciencias Juridicas', 0, '2018-08-02 08:26:25');
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;

-- Dumping structure for table tesis_db.iglesia_est
CREATE TABLE IF NOT EXISTS `iglesia_est` (
  `id_iglesia` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `asistencia` int(11) DEFAULT NULL,
  `nombre_iglesia` varchar(80) DEFAULT NULL,
  `anios_es` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_iglesia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.iglesia_est: ~3 rows (approximately)
DELETE FROM `iglesia_est`;
/*!40000 ALTER TABLE `iglesia_est` DISABLE KEYS */;
INSERT INTO `iglesia_est` (`id_iglesia`, `id_alumno`, `asistencia`, `nombre_iglesia`, `anios_es`, `estado`, `fecha`) VALUES
	(1, 0, 0, '', 0, 0, '2018-08-17 08:17:16'),
	(2, 9, 1, '', 0, 0, '2018-08-17 08:17:23'),
	(3, 10, 1, 'red', 5, 0, '2018-08-17 08:27:11');
/*!40000 ALTER TABLE `iglesia_est` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
