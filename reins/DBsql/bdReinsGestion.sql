	-- -----------------------------------------------------
	-- Schema mydb
	-- -----------------------------------------------------
	-- -----------------------------------------------------
	-- Schema reinscripciones
	-- -----------------------------------------------------
	

	-- -----------------------------------------------------
	-- Schema reinscripciones
	-- -----------------------------------------------------
	drop database reinscripciones;
    CREATE SCHEMA IF NOT EXISTS `reinscripciones` DEFAULT CHARACTER SET utf8mb4;
	USE `reinscripciones` ;
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`carreras`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`carreras` (
	  `idCarrera` INT(11) NOT NULL,
	  `nombre` VARCHAR(110) NOT NULL,
	  PRIMARY KEY (`idCarrera`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `carreras` VALUES (1,'Tecnologías de la Infomación y Comunicaciones'),(2,'Sistemas'),(3,'Bioquimica'),(4,'Mecatrónica'),(5,'Industrial'),(6,'Administración'),(7,'Gestión Empresarial');
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`alumnos`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`alumnos` (
	  `matricula` INT(10) UNSIGNED NOT NULL,
	  `nombres` VARCHAR(45) NOT NULL,
	  `apellidoP` VARCHAR(45) NOT NULL,
	  `apellidoM` VARCHAR(45) NOT NULL,
	  `semestre` VARCHAR(5) NOT NULL,
	  `idCarrera` INT(11) NOT NULL,
	  PRIMARY KEY (`matricula`),
	  CONSTRAINT `fk_alumnos_carreras1`
	    FOREIGN KEY (`idCarrera`)
	    REFERENCES `reinscripciones`.`carreras` (`idCarrera`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `alumnos` VALUES (16640110,'Luis Angel','Govea','Magaña','8vo',1),(16640111,'Guillermo','Guzman','Espinosa','8vo',1),(16640112,'Natalia','Mata','Espinoza','8vo',1),(16640145,'Carmen','Alanis','Cazares','8vo',1),(16640192,'Jesús','Bravo','Garcia','8vo',1);
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`areas`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`areas` (
	  `idAreas` INT(11) NOT NULL,
	  `nombre` VARCHAR(45) NULL DEFAULT NULL,
	  PRIMARY KEY (`idAreas`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `areas` VALUES (1,'Sistemas'),(2,'Ciencias Básicas'),(3,'Administración'),(4,'Industrial'),(5,'Mecatrónica');
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`docentes`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`docentes` (
	  `idDocente` INT(10) UNSIGNED NOT NULL,
	  `nombres` VARCHAR(45) NOT NULL,
	  `apellidoP` VARCHAR(45) NOT NULL,
	  `apellidoM` VARCHAR(45) NOT NULL,
	  `idAreas` INT(11) NOT NULL,
	  PRIMARY KEY (`idDocente`),
	  CONSTRAINT `fk_docentes_areas1`
	    FOREIGN KEY (`idAreas`)
	    REFERENCES `reinscripciones`.`areas` (`idAreas`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `docentes` VALUES (1,'Heriberto','Chavez','Flores',1),(2,'Estela','Romero','Fuentes',1),(3,'Ma Elena','Mendoza','Chulim',1),(4,'Jose Juan','Cabeza','Ortega',1),(5,'Hector ','Oceguera ','Soto',1);
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`materias`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`materias` (
	  `idMateria` VARCHAR(10) NOT NULL,
	  `nombre` VARCHAR(45) NOT NULL,
	  `creditos` VARCHAR(4) NOT NULL,
	  `semestre` VARCHAR(5) NOT NULL,
	  `teorica` VARCHAR(4) NOT NULL,
	  `practica` VARCHAR(4) NOT NULL,
	  `idCarrera` INT(11) NOT NULL,
	  `idDocente` INT(10) UNSIGNED NOT NULL,
	  PRIMARY KEY (`idMateria`),
	  CONSTRAINT `fk_materias_carreras`
	    FOREIGN KEY (`idCarrera`)
	    REFERENCES `reinscripciones`.`carreras` (`idCarrera`),
	  CONSTRAINT `materias_ibfk_1`
	    FOREIGN KEY (`idDocente`)
	    REFERENCES `reinscripciones`.`docentes` (`idDocente`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `materias` VALUES ('7SG1E','Programación Front-End I','5','7mo','3','2',1,2),('8EG0Q','Gestion de Proyectos de Software','5','8vo','2','3',1,1),('8EH0Q','DevOps','5','8vo','2','3',1,1),('8EI0Q','Programación Fron-End II','5','8vo','2','3',1,2),('8EJ0Q','Auditoria de Redes','5','7mo','3','2',1,3);
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`carga`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`carga` (
	  `idCarga` INT(10) UNSIGNED NOT NULL,
	  `periodo` VARCHAR(45) NULL DEFAULT NULL,
	  `idMateria` VARCHAR(10) NOT NULL,
	  `creditos` VARCHAR(45) NOT NULL,
	  `idAlumno` INT(10) UNSIGNED NOT NULL,
	  PRIMARY KEY (`idCarga`),
	  CONSTRAINT `fk_alumno`
	    FOREIGN KEY (`idAlumno`)
	    REFERENCES `reinscripciones`.`alumnos` (`matricula`),
	  CONSTRAINT `fk_carga_alumnos1`
	    FOREIGN KEY (`idAlumno`)
	    REFERENCES `reinscripciones`.`alumnos` (`matricula`),
	  CONSTRAINT `fk_carga_materias1`
	    FOREIGN KEY (`idMateria`)
	    REFERENCES `reinscripciones`.`materias` (`idMateria`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `carga` VALUES (1,'Ago-Dic','8EG0Q','5',16640111),(2,'Ago-Dic','8EI0Q','5',16640111),(3,'Ago-Dic','8EH0Q','5',16640111),(4,'Ago-Dic','8EJ0Q','5',16640111);
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`horarios`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`horarios` (
	  `idHorario` INT(11) NOT NULL,
	  `hora` TIME NOT NULL,
	  `lunes` VARCHAR(10) NOT NULL,
	  `martes` VARCHAR(10) NOT NULL,
	  `miercoles` VARCHAR(10) NOT NULL,
	  `jueves` VARCHAR(10) NOT NULL,
	  `viernes` VARCHAR(10) NOT NULL,
	  `grupo` VARCHAR(6) NOT NULL,
	  PRIMARY KEY (`idHorario`),

	  CONSTRAINT `horarios_ibfk_1`
	    FOREIGN KEY (`lunes`)
	    REFERENCES `reinscripciones`.`materias` (`idMateria`),
	  CONSTRAINT `horarios_ibfk_2`
	    FOREIGN KEY (`martes`)
	    REFERENCES `reinscripciones`.`materias` (`idMateria`),
	  CONSTRAINT `horarios_ibfk_3`
	    FOREIGN KEY (`miercoles`)
	    REFERENCES `reinscripciones`.`materias` (`idMateria`),
	  CONSTRAINT `horarios_ibfk_4`
	    FOREIGN KEY (`jueves`)
	    REFERENCES `reinscripciones`.`materias` (`idMateria`),
	  CONSTRAINT `horarios_ibfk_5`
	    FOREIGN KEY (`viernes`)
	    REFERENCES `reinscripciones`.`materias` (`idMateria`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `horarios` VALUES (1,'00:07:00','7SG1E','7SG1E','7SG1E','7SG1E','7SG1E','7mo'),(2,'00:07:00','8EG0Q','8EG0Q','8EG0Q','8EG0Q','8EG0Q','8vo'),(3,'00:08:00','8EH0Q','8EH0Q','8EH0Q','8EH0Q','8EH0Q','8vo'),(4,'00:09:00','8EJ0Q','8EH0Q','8EH0Q','8EH0Q','8EJ0Q','8vo'),(5,'00:10:00','8EI0Q','8EI0Q','8EI0Q','8EI0Q','8EI0Q','8vo');
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`kardex`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`kardex` (
	  `idKardex` INT(11) NOT NULL,
	  `idAlumno` INT(10) UNSIGNED NOT NULL,
	  `idMateria` VARCHAR(10) NOT NULL,
	  `acreditada` TINYINT(1) NULL DEFAULT '0',
	  `noacreditada` TINYINT(1) NULL DEFAULT '1',
	  PRIMARY KEY (`idKardex`),
	  CONSTRAINT `fk_kardex_alumnos2`
	    FOREIGN KEY (`idAlumno`)
	    REFERENCES `reinscripciones`.`alumnos` (`matricula`),
	  CONSTRAINT `kardex_alumno2`
	    FOREIGN KEY (`idMateria`)
	    REFERENCES `reinscripciones`.`materias` (`idMateria`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`pago`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`pago` (
	  `idPago` INT(11) NOT NULL,
	  `estado` VARCHAR(45) NULL DEFAULT NULL,
	  `periodo` VARCHAR(45) NULL DEFAULT NULL,
	  `idAlumno` INT(10) UNSIGNED NOT NULL,
	  PRIMARY KEY (`idPago`),
	  CONSTRAINT `fk_pago_alumnos1`
	    FOREIGN KEY (`idAlumno`)
	    REFERENCES `reinscripciones`.`alumnos` (`matricula`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `pago` VALUES (1,'pagado','Ago-Dic',16640111),(2,'pendiente','Ago-Dic',16640112),(3,'pagado','Ago-Dic',16640110),(4,'pagado','Ago-Dic',16640145),(5,'pagado','Ago-Dic',16640192);
	

	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`reinscripcion`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`reinscripcion` (
	  `idReinscripcion` INT(11) NOT NULL,
	  `estado` VARCHAR(45) NULL DEFAULT NULL,
	  `idPago` INT(11) NOT NULL,
	  PRIMARY KEY (`idReinscripcion`),
	  CONSTRAINT `fk_reinscripcion_pago1`
	    FOREIGN KEY (`idPago`)
	    REFERENCES `reinscripciones`.`pago` (`idPago`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	

	INSERT INTO `reinscripcion` VALUES (1,'completo',1),(2,'completo',2),(3,'completo',3),(4,'completo',4),(5,'completo',5);
	

	-- -----------------------------------------------------
	-- Table `reinscripciones`.`usuarios`
	-- -----------------------------------------------------
	CREATE TABLE IF NOT EXISTS `reinscripciones`.`usuarios` (
	  `idUsuario` INT(11) NOT NULL,
	  `usuario` VARCHAR(15) NOT NULL,
	  `contra` VARCHAR(45) NOT NULL,
	  PRIMARY KEY (`idUsuario`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8mb4
	;
	


