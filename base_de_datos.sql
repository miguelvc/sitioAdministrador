CREATE DATABASE IF NOT EXISTS sitioadmin;
USE sitioadmin;

--
-- Estructura de tabla para la tabla Personas
--

CREATE TABLE IF NOT EXISTS Personas (
  PersonaId int(11) NOT NULL AUTO_INCREMENT,
  Paterno varchar(30) NOT NULL,
  Materno varchar(30) DEFAULT NULL,
  Nombre varchar(50) NOT NULL,
  Rut decimal(10,0) DEFAULT NULL,
  Dv char(1) DEFAULT NULL,
  Nacimiento date DEFAULT NULL,
  Sexo char(1) DEFAULT NULL,
  EstadoCivilId int(11) NOT NULL,
  Eliminado tinyint(1) DEFAULT '0',
  Fecha timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT pk_PersonaId PRIMARY KEY(PersonaId),
  UNIQUE KEY Rut_UNIQUE (Rut)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla Usuarios
--

CREATE TABLE IF NOT EXISTS Usuarios (
  UsuarioId int(11) NOT NULL AUTO_INCREMENT,
  PersonaId int(11) DEFAULT NULL,
  Nombre varchar(50) DEFAULT NULL,
  Email varchar(100) NOT NULL,
  Password varchar(45) NOT NULL,
  Vigente tinyint(1) DEFAULT '1',
  Eliminado tinyint(1) DEFAULT '0',
  Fecha timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT  pk_UsuarioId PRIMARY KEY(UsuarioId),
  CONSTRAINT  fk_PersonaId FOREIGN KEY(PersonaId) REFERENCES Personas(PersonaId)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;




