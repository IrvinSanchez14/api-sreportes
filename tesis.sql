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
	(1, 'Bienvenida Especial', b'0', '2018-09-06 07:04:11', 'bienvenida-especial-agregar.php'),
	(2, 'Retiros Amazing race', b'0', '2018-09-06 07:04:19', 'amazing-race-agregar.php'),
	(3, 'Celulas NICE', b'0', '2018-09-06 07:04:23', 'celulas-nice-agregar.php'),
	(4, 'Conferencia Especial', b'0', '2018-09-06 07:04:28', 'conferencia-especial-agregar.php');
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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.alumnos: ~36 rows (approximately)
DELETE FROM `alumnos`;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id_alumno`, `nombre_alumno`, `cif`, `fecha`, `id_facultad`, `id_actividad`, `estado`) VALUES
	(1, 'Irvn Sanchez', '2013010360', '2018-08-17 07:28:22', 1, 1, 0),
	(75, 'Irvn Sanchez', '2013010360', '2018-08-20 08:42:24', 1, 1, 0),
	(76, 'Irvn Sanchez', '2013010360', '2018-08-20 08:42:42', 1, 1, 0),
	(77, 'Ruben anaya', '2198415615', '2018-08-20 11:55:06', 2, 1, 0),
	(78, 'chicky', '8965', '2018-08-20 14:38:50', 3, 2, 0),
	(79, 'Ruben anaya', '7896', '2018-08-21 06:55:24', 6, 2, 0),
	(80, 'Ruben anaya', '1563', '2018-08-21 07:06:14', 1, 2, 0),
	(81, 'Ruben anaya', '1563', '2018-08-21 07:06:42', 1, 2, 0),
	(82, 'Ruben anaya', '1563', '2018-08-21 07:07:58', 1, 2, 0),
	(83, 'Ruben anaya', '8549841516', '2018-08-21 07:08:23', 1, 2, 0),
	(84, 'Ruben anaya', '21312', '2018-08-21 07:12:06', 1, 2, 0),
	(85, 'Irvn Sanchez', '8549841516', '2018-08-21 07:13:32', 1, 2, 0),
	(86, 'Irvn Sanchez', '8549841516', '2018-08-21 07:14:30', 1, 2, 0),
	(90, 'Irvn Sanchez', '1563', '2018-08-21 08:08:17', 2, 2, 0),
	(91, '', '', '2018-08-21 08:10:19', 0, 0, 0),
	(92, 'Ruben anaya', 'w', '2018-08-21 08:10:51', 1, 2, 0),
	(93, 'sdfsdfsdfsdf', '45646', '2018-08-21 08:11:40', 1, 2, 0),
	(94, 'Irvn Sanchez', '22556', '2018-08-21 08:17:36', 1, 4, 0),
	(95, 'Kevin Sanchez', '784981456', '2018-08-21 09:24:07', 1, 4, 0),
	(96, 'sdfsdfsdfsdf', '34234', '2018-08-28 09:42:59', 2, 3, 0),
	(97, 'Irvn Sanchez', '2134234', '2018-08-29 08:15:16', 1, 1, 0),
	(98, 'Irvn Sanchez', '1111', '2018-08-29 08:36:00', 3, 1, 0),
	(99, 'Irvn Sanchez', '444', '2018-08-29 08:44:37', 4, 1, 0),
	(100, 'Irvn Sanchez', '111', '2018-08-29 12:37:32', 5, 4, 0),
	(101, 'Ruben anaya', '1563', '2018-08-30 09:46:13', 1, 3, 0),
	(102, 'Ruben anaya', '1563', '2018-08-30 09:46:18', 2, 3, 0),
	(103, 'Ruben anaya', '1563', '2018-08-30 09:46:21', 6, 3, 0),
	(104, 'robert', '7896', '2018-08-31 08:15:33', 1, 0, 0),
	(105, 'raul', '11111', '2018-08-31 08:18:41', 2, 2, 0),
	(106, 'Irvin', '111', '2018-08-31 09:21:11', 3, 2, 0),
	(107, 'Ruben anaya', '1212', '2018-08-31 09:40:24', 4, 2, 0),
	(108, 'Irvn Sanchez', '1111', '2018-09-03 07:29:15', 1, 1, 0),
	(109, 'chicky', '4444', '2018-09-03 08:10:21', 3, 3, 0),
	(110, 'chicky', '4444', '2018-09-03 08:10:21', 3, 3, 0),
	(111, 'chicky', '4444', '2018-09-03 08:10:26', 3, 3, 0),
	(112, 'chicky', '4444', '2018-09-03 08:10:26', 3, 3, 0),
	(113, 'Ruben anaya', '2', '2018-09-03 08:10:56', 2, 3, 0),
	(114, 'Irvn Sanchez', '11111', '2018-09-03 08:24:31', 4, 4, 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.alum_extra: ~8 rows (approximately)
DELETE FROM `alum_extra`;
/*!40000 ALTER TABLE `alum_extra` DISABLE KEYS */;
INSERT INTO `alum_extra` (`id_almex`, `email`, `telefono`, `facebook`, `id_alumno`) VALUES
	(9, 'isanchez@serenova.com', '22262051', 'Irvin Sanchez', 76),
	(10, 'isanchez@serenova.com', '895625', 'ruben', 77),
	(11, 'isanchez@serenova.com', '22262051', 'Irvin Sanchez', 94),
	(12, 'kevin@hotmail.com', '51456136', 'wer', 95),
	(13, 'isanchez@serenova.com', '22262051', 'Irvin Sanchez', 97),
	(14, 'isanchez@serenova.com', '263', 'Irvin Sanchez', 98),
	(15, 'isanchez@serenova.com', '222658', 'wer', 99),
	(16, 'isanchez@serenova.com', '22262051', 'Irvin Sanchez', 100),
	(17, 'isanchez@serenova.com', '22222', 'Irvin Sanchez', 108);
/*!40000 ALTER TABLE `alum_extra` ENABLE KEYS */;

-- Dumping structure for table tesis_db.archivos
CREATE TABLE IF NOT EXISTS `archivos` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `size` varchar(15) DEFAULT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_archivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.archivos: ~2 rows (approximately)
DELETE FROM `archivos`;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` (`id_archivo`, `nombre`, `size`, `tipo`, `estado`, `fecha`) VALUES
	(1, '26169750_694815130726332_6006578709738339106_n.jpg', '53335', 'image/jpeg', b'0', '2018-08-28 13:17:10'),
	(2, 'download.jfif', '8657', 'image/jpeg', b'0', '2018-08-28 13:17:51'),
	(3, '16259.png', '6119', 'image/png', b'0', '2018-09-06 07:55:18');
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;

-- Dumping structure for table tesis_db.ciclo
CREATE TABLE IF NOT EXISTS `ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.ciclo: ~8 rows (approximately)
DELETE FROM `ciclo`;
/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
INSERT INTO `ciclo` (`id_ciclo`, `valor`, `id_actividad`, `id_alumno`) VALUES
	(1, 0, 0, 0),
	(2, 0, 4, 70),
	(3, 0, 4, 71),
	(4, 0, 4, 72),
	(5, 0, 4, 73),
	(6, 0, 4, 74),
	(7, 0, 4, 94),
	(8, 1, 4, 95),
	(9, 0, 4, 100),
	(10, 1, 4, 114);
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

-- Dumping data for table tesis_db.coment_act: ~5 rows (approximately)
DELETE FROM `coment_act`;
/*!40000 ALTER TABLE `coment_act` DISABLE KEYS */;
INSERT INTO `coment_act` (`id_coment`, `id_alumno`, `id_actividad`, `expectativas`, `ideas`, `estado`, `fecha`) VALUES
	(1, 2, 1, 'espero que sea chivo', 'vamolo', 0, '2018-08-20 08:42:24'),
	(2, 76, 1, 'espero que sea chivo', 'vamolo', 0, '2018-08-20 08:42:42'),
	(3, 77, 1, 'daishdnokai', 'oiadjsm', 0, '2018-08-20 11:55:06'),
	(4, 97, 1, 'espero que sea chivo', 'vamolo', 0, '2018-08-29 08:15:16'),
	(5, 98, 1, 'espero que sea chivo', 'vamolo', 0, '2018-08-29 08:36:00'),
	(6, 99, 1, 'espero que sea chivo', 'vamolo', 0, '2018-08-29 08:44:37'),
	(7, 108, 1, 'espero que sea chivo', 'vamolo', 0, '2018-09-03 07:29:15');
/*!40000 ALTER TABLE `coment_act` ENABLE KEYS */;

-- Dumping structure for table tesis_db.conf_arg
CREATE TABLE IF NOT EXISTS `conf_arg` (
  `id_conf` int(11) NOT NULL AUTO_INCREMENT,
  `benf_adq` varchar(80) DEFAULT NULL,
  `opn_con` int(11) DEFAULT NULL,
  `desc_est` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_conf`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.conf_arg: ~5 rows (approximately)
DELETE FROM `conf_arg`;
/*!40000 ALTER TABLE `conf_arg` DISABLE KEYS */;
INSERT INTO `conf_arg` (`id_conf`, `benf_adq`, `opn_con`, `desc_est`, `estado`, `fecha`, `id_alumno`) VALUES
	(1, '1', 1, 0, 0, '2018-08-20 08:09:31', 1),
	(2, '', 0, 0, 0, '2018-08-20 08:12:57', 0),
	(3, 'muchos gracias', 1, 1, 0, '2018-08-20 08:14:48', 74),
	(4, 'muchos gracias', 1, 1, 0, '2018-08-21 08:17:37', 94),
	(5, 'muchos gracias', 3, 2, 0, '2018-08-21 09:24:07', 95),
	(6, 'muchos gracias', 1, 3, 0, '2018-08-29 12:37:32', 100),
	(7, 'muchos gracias', 1, 3, 0, '2018-09-03 08:24:31', 114);
/*!40000 ALTER TABLE `conf_arg` ENABLE KEYS */;

-- Dumping structure for table tesis_db.enc_sat
CREATE TABLE IF NOT EXISTS `enc_sat` (
  `id_encu` int(11) NOT NULL AUTO_INCREMENT,
  `num_res1` varchar(50) DEFAULT NULL,
  `num_res2` varchar(50) DEFAULT NULL,
  `num_res3` varchar(50) DEFAULT NULL,
  `num_res4` varchar(50) DEFAULT NULL,
  `num_res5` varchar(50) DEFAULT NULL,
  `num_res6` varchar(50) DEFAULT NULL,
  `num_res7` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0',
  PRIMARY KEY (`id_encu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.enc_sat: ~4 rows (approximately)
DELETE FROM `enc_sat`;
/*!40000 ALTER TABLE `enc_sat` DISABLE KEYS */;
INSERT INTO `enc_sat` (`id_encu`, `num_res1`, `num_res2`, `num_res3`, `num_res4`, `num_res5`, `num_res6`, `num_res7`, `fecha`, `estado`) VALUES
	(1, 'Necesita mejorar', 'Regular', 'Regular', 'Bueno', 'Muy Bueno', 'Excelente', 'Excelente', '2018-08-21 08:05:40', 0),
	(2, 'Necesita mejorar', 'Excelente', 'Muy Bueno', 'Regular', 'Necesita mejorar', 'Necesita mejorar', 'Bueno', '2018-08-21 08:06:50', 0),
	(3, 'Necesita mejorar', 'Regular', 'Bueno', 'Muy Bueno', 'Excelente', 'Muy Bueno', 'Regular', '2018-08-21 08:08:21', 0),
	(4, 'Seleccione una opción', 'Seleccione una opción', 'Seleccione una opción', 'Seleccione una opción', 'Seleccione una opción', 'Seleccione una opción', 'Seleccione una opción', '2018-08-21 08:11:40', 0),
	(5, 'Regular', 'Regular', 'Muy Bueno', 'Bueno', 'Necesita mejorar', 'Bueno', 'Excelente', '2018-08-31 09:00:37', 0),
	(6, 'Regular', 'Muy Bueno', 'Excelente', 'Muy Bueno', 'Necesita mejorar', 'Regular', 'Excelente', '2018-09-03 07:07:38', 0),
	(7, 'Necesita mejorar', 'Regular', 'Bueno', 'Excelente', 'Bueno', 'Necesita mejorar', 'Regular', '2018-09-06 07:28:14', 0);
/*!40000 ALTER TABLE `enc_sat` ENABLE KEYS */;

-- Dumping structure for table tesis_db.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.factura: ~3 rows (approximately)
DELETE FROM `factura`;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` (`id_factura`, `numero_factura`, `estado`, `fecha`, `id_alumno`) VALUES
	(1, 0, NULL, NULL, 0),
	(2, 0, 0, '2018-08-31 09:19:23', 0),
	(3, 423423423, 0, '2018-08-31 09:21:11', 106),
	(4, 1212121, 0, '2018-08-31 09:40:24', 107);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

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
	(1, 'Ingenieria', 0, '2018-08-28 14:32:27'),
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
  `anios_es` int(11) DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_iglesia`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.iglesia_est: ~17 rows (approximately)
DELETE FROM `iglesia_est`;
/*!40000 ALTER TABLE `iglesia_est` DISABLE KEYS */;
INSERT INTO `iglesia_est` (`id_iglesia`, `id_alumno`, `asistencia`, `nombre_iglesia`, `anios_es`, `estado`, `fecha`) VALUES
	(1, 0, 0, '', 0, 0, '2018-08-17 08:17:16'),
	(2, 9, 1, '', 0, 0, '2018-08-17 08:17:23'),
	(3, 10, 1, 'red', 5, 0, '2018-08-17 08:27:11'),
	(4, 69, 0, 'null', 0, 0, '2018-08-20 07:01:06'),
	(5, 70, 0, 'fs', 0, 0, '2018-08-20 07:15:50'),
	(6, 71, 0, 'kki', 0, 0, '2018-08-20 07:53:24'),
	(7, 72, 0, 'tt', 0, 0, '2018-08-20 07:55:01'),
	(8, 73, 1, 'pp', 0, 0, '2018-08-20 07:56:04'),
	(9, 74, 2, 'no', 0, 0, '2018-08-20 08:14:48'),
	(10, 2, 1, 'Ricaldone', 12, 0, '2018-08-20 08:42:24'),
	(11, 76, 1, 'Ricaldone', 12, 0, '2018-08-20 08:42:42'),
	(12, 77, 1, 'La pampa', 5, 0, '2018-08-20 11:55:06'),
	(13, 94, 1, 'tt', 0, 0, '2018-08-21 08:17:37'),
	(14, 95, 2, 'no', 0, 0, '2018-08-21 09:24:07'),
	(15, 97, 1, 'rr', 5, 0, '2018-08-29 08:15:16'),
	(16, 98, 1, 'qq', 5, 0, '2018-08-29 08:36:00'),
	(17, 99, 2, 'h', 0, 0, '2018-08-29 08:44:37'),
	(18, 100, 2, 'tt', 0, 0, '2018-08-29 12:37:32'),
	(19, 108, 1, 'rrrrr', 4, 0, '2018-09-03 07:29:15'),
	(20, 114, 2, 'no', 0, 0, '2018-09-03 08:24:31');
/*!40000 ALTER TABLE `iglesia_est` ENABLE KEYS */;

-- Dumping structure for table tesis_db.login
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.login: ~0 rows (approximately)
DELETE FROM `login`;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id_login`, `username`, `pass`, `estado`, `fecha`, `id_rol`) VALUES
	(1, 'gazu', '1234', b'0', '2018-09-03 11:21:09', 1),
	(2, 'rol', '888', b'0', '2018-09-04 08:37:25', 1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
