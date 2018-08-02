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
  PRIMARY KEY (`id_actividades`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.actividades: ~0 rows (approximately)
DELETE FROM `actividades`;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` (`id_actividades`, `nombre_act`, `estado`, `fecha`) VALUES
	(1, 'Bienvenida Especial', b'0', '2018-08-02 00:00:00'),
	(2, 'Retiros Amazing race', b'0', '2018-08-02 08:40:02'),
	(3, 'Celulas NICE', b'0', '2018-08-02 08:40:09'),
	(4, 'Conferencia Especial', b'0', '2018-08-02 08:40:24');
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;

-- Dumping structure for table tesis_db.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alumno` varchar(100) DEFAULT NULL,
  `cif` varchar(15) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_facultad` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.alumnos: ~0 rows (approximately)
DELETE FROM `alumnos`;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Dumping structure for table tesis_db.alum_extra
CREATE TABLE IF NOT EXISTS `alum_extra` (
  `id_almex` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_almex`)
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
  `estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_coment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.coment_act: ~0 rows (approximately)
DELETE FROM `coment_act`;
/*!40000 ALTER TABLE `coment_act` DISABLE KEYS */;
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
  `fecha` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_encu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.enc_sat: ~0 rows (approximately)
DELETE FROM `enc_sat`;
/*!40000 ALTER TABLE `enc_sat` DISABLE KEYS */;
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
  `estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_iglesia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table tesis_db.iglesia_est: ~0 rows (approximately)
DELETE FROM `iglesia_est`;
/*!40000 ALTER TABLE `iglesia_est` DISABLE KEYS */;
/*!40000 ALTER TABLE `iglesia_est` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
