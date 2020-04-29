/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.39-MariaDB : Database - reinscripciones
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`reinscripciones` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `reinscripciones`;

/*Table structure for table `alumnos` */

DROP TABLE IF EXISTS `alumnos`;

CREATE TABLE `alumnos` (
  `matricula` int(10) unsigned NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `semestre` varchar(5) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `alumnos` */

insert  into `alumnos`(`matricula`,`nombres`,`apellidoP`,`apellidoM`,`semestre`,`idCarrera`) values 
(16640110,'Luis Angel','Govea','Magaña','8vo',1),
(16640111,'Guillermo','Guzman','Espinosa','8vo',1),
(16640112,'Natalia','Mata','Espinoza','8vo',1),
(16640145,'Carmen','Alanis','Cazares','8vo',1),
(16640192,'Jesús','Bravo','Garcia','8vo',1);

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `idAreas` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAreas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `areas` */

insert  into `areas`(`idAreas`,`nombre`) values 
(1,'Sistemas'),
(2,'Ciencias Básicas'),
(3,'Administración'),
(4,'Industrial'),
(5,'Mecatrónica');

/*Table structure for table `carga` */

DROP TABLE IF EXISTS `carga`;

CREATE TABLE `carga` (
  `idCarga` int(10) unsigned NOT NULL,
  `periodo` varchar(45) DEFAULT NULL,
  `idMateria` varchar(10) NOT NULL,
  `creditos` varchar(45) NOT NULL,
  `idAlumno` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCarga`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `carga` */

insert  into `carga`(`idCarga`,`periodo`,`idMateria`,`creditos`,`idAlumno`) values 
(1,'Ago-Dic','8EG0Q','5',16640111),
(2,'Ago-Dic','8EI0Q','5',16640111),
(3,'Ago-Dic','8EH0Q','5',16640111),
(4,'Ago-Dic','8EJ0Q','5',16640111);

/*Table structure for table `carreras` */

DROP TABLE IF EXISTS `carreras`;

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL,
  `nombre` varchar(110) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `carreras` */

insert  into `carreras`(`idCarrera`,`nombre`) values 
(1,'Tecnologías de la Infomación y Comunicaciones'),
(2,'Sistemas'),
(3,'Bioquimica'),
(4,'Mecatrónica'),
(5,'Industrial'),
(6,'Administración'),
(7,'Gestión Empresarial');

/*Table structure for table `docentes` */

DROP TABLE IF EXISTS `docentes`;

CREATE TABLE `docentes` (
  `idDocente` int(10) unsigned NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `idAreas` int(11) NOT NULL,
  PRIMARY KEY (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `docentes` */

insert  into `docentes`(`idDocente`,`nombres`,`apellidoP`,`apellidoM`,`idAreas`) values 
(1,'Heriberto','Chavez','Flores',1),
(2,'Estela','Romero','Fuentes',1),
(3,'Ma Elena','Mendoza','Chulim',1),
(4,'Jose Juan','Cabeza','Ortega',1),
(5,'Hector ','Oceguera ','Soto',1);

/*Table structure for table `horarios` */

DROP TABLE IF EXISTS `horarios`;

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL,
  `hora` time NOT NULL,
  `lunes` varchar(10) NOT NULL,
  `martes` varchar(10) NOT NULL,
  `miercoles` varchar(10) NOT NULL,
  `jueves` varchar(10) NOT NULL,
  `viernes` varchar(10) NOT NULL,
  `grupo` varchar(6) NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `horarios` */

insert  into `horarios`(`idHorario`,`hora`,`lunes`,`martes`,`miercoles`,`jueves`,`viernes`,`grupo`) values 
(1,'00:07:00','7SG1E','7SG1E','7SG1E','7SG1E','7SG1E','7mo'),
(2,'00:07:00','8EG0Q','8EG0Q','8EG0Q','8EG0Q','8EG0Q','8vo'),
(3,'00:08:00','8EH0Q','8EH0Q','8EH0Q','8EH0Q','8EH0Q','8vo'),
(4,'00:09:00','8EJ0Q','8EH0Q','8EH0Q','8EH0Q','8EJ0Q','8vo'),
(5,'00:10:00','8EI0Q','8EI0Q','8EI0Q','8EI0Q','8EI0Q','8vo');

/*Table structure for table `kardex` */

DROP TABLE IF EXISTS `kardex`;

CREATE TABLE `kardex` (
  `idKardex` int(11) NOT NULL,
  `idAlumno` int(10) unsigned NOT NULL,
  `idMateria` varchar(10) NOT NULL,
  `acreditada` tinyint(1) DEFAULT '0',
  `noacreditada` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idKardex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kardex` */

/*Table structure for table `materias` */

DROP TABLE IF EXISTS `materias`;

CREATE TABLE `materias` (
  `idMateria` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `creditos` varchar(4) NOT NULL,
  `semestre` varchar(5) NOT NULL,
  `teorica` varchar(4) NOT NULL,
  `practica` varchar(4) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `idDocente` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `materias` */

insert  into `materias`(`idMateria`,`nombre`,`creditos`,`semestre`,`teorica`,`practica`,`idCarrera`,`idDocente`) values 
('7SG1E','Programación Front-End I','5','7mo','3','2',1,2),
('8EG0Q','Gestion de Proyectos de Software','5','8vo','2','3',1,1),
('8EH0Q','DevOps','5','8vo','2','3',1,1),
('8EI0Q','Programación Fron-End II','5','8vo','2','3',1,2),
('8EJ0Q','Auditoria de Redes','5','7mo','3','2',1,3);

/*Table structure for table `pago` */

DROP TABLE IF EXISTS `pago`;

CREATE TABLE `pago` (
  `idPago` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `periodo` varchar(45) DEFAULT NULL,
  `idAlumno` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pago` */

insert  into `pago`(`idPago`,`estado`,`periodo`,`idAlumno`) values 
(1,'pagado','Ago-Dic',16640111),
(2,'pendiente','Ago-Dic',16640112),
(3,'pagado','Ago-Dic',16640110),
(4,'pagado','Ago-Dic',16640145),
(5,'pagado','Ago-Dic',16640192);

/*Table structure for table `reinscripcion` */

DROP TABLE IF EXISTS `reinscripcion`;

CREATE TABLE `reinscripcion` (
  `idReinscripcion` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idPago` int(11) NOT NULL,
  PRIMARY KEY (`idReinscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `reinscripcion` */

insert  into `reinscripcion`(`idReinscripcion`,`estado`,`idPago`) values 
(1,'completo',1),
(2,'completo',2),
(3,'completo',3),
(4,'completo',4),
(5,'completo',5);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contra` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
