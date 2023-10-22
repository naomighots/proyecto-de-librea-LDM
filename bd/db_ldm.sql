CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb`;



CREATE TABLE IF NOT EXISTS `mydb`.`Rol` (
    `idRol` INT NOT NULL,
    `Nombre_rol` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idRol`)
);

CREATE TABLE IF NOT EXISTS `mydb`.`Trabajador` (
    `idTrabajador` INT NOT NULL,
    `Correo` VARCHAR(180) NOT NULL,
    `nombre` VARCHAR(30) NOT NULL,
    `Clave` VARCHAR(30) NOT NULL,
    `Rol_idRol` INT NOT NULL,
    PRIMARY KEY (`idTrabajador`, `Rol_idRol`),
    INDEX `fk_Trabajador_Rol1_idx` (`Rol_idRol` ASC),
    CONSTRAINT `fk_Trabajador_Rol1`
    FOREIGN KEY (`Rol_idRol`)
    REFERENCES `mydb`.`Rol` (`idRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `mydb`.`Persona` (
    `rut` VARCHAR(12) NOT NULL,
    `Nombre` VARCHAR(45) NOT NULL,
    `Apellido_paterno` VARCHAR(45) NOT NULL,
    `Apellido_materno` VARCHAR(45) NOT NULL,
    `Telefono` INT(9) NOT NULL,
    `Direccion` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`rut`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `mydb`.`Autor` (
    `idAutor` INT NOT NULL,
    `Nombre_autor` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idAutor`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `mydb`.`Categoria` (
    `idCategoria` INT NOT NULL,
    `Categoria` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `mydb`.`Editorial` (
    `idEditorial` INT NOT NULL,
    `Editorial` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`idEditorial`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `mydb`.`Libros` (
    `idLibros` INT NOT NULL,
    `Titulo` VARCHAR(45) NOT NULL,
    `Fecha_lanzamientos` VARCHAR(45) NOT NULL,
    `Ejemplares` INT(6) NOT NULL,
    `Imagen` TEXT NOT NULL,
    `Descripcion` TEXT NOT NULL,
    `Autor_idAutor` INT NOT NULL,
    `Categoria_idCategoria` INT NOT NULL,
    `Editorial_idEditorial` INT NOT NULL,
    PRIMARY KEY (`idLibros`, `Autor_idAutor`, `Categoria_idCategoria`, `Editorial_idEditorial`),
    INDEX `fk_Libros_Autor1_idx` (`Autor_idAutor` ASC),
    INDEX `fk_Libros_Categoria1_idx` (`Categoria_idCategoria` ASC),
    INDEX `fk_Libros_Editorial1_idx` (`Editorial_idEditorial` ASC),
    CONSTRAINT `fk_Libros_Autor1`
    FOREIGN KEY (`Autor_idAutor`)
    REFERENCES `mydb`.`Autor` (`idAutor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Libros_Categoria1`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `mydb`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Libros_Editorial1`
    FOREIGN KEY (`Editorial_idEditorial`)
    REFERENCES `mydb`.`Editorial` (`idEditorial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB;




CREATE TABLE IF NOT EXISTS `mydb`.`Estado` (
    `idEstado` INT(6) NOT NULL,
    `Estado` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `mydb`.`Arriendo` (
    `idArriendo` INT NOT NULL,
    `Fecha_arriendo` DATE NOT NULL,
    `Fecha_devolucion` DATE NOT NULL,
    `Estado_idEstado` INT(6) NOT NULL,
    `Libros_idLibros` INT NOT NULL,
    `Persona_rut` VARCHAR(12) NOT NULL,
    `Trabajador_idTrabajador` INT NOT NULL,
    `Trabajador_Rol_idRol` INT NOT NULL,
    PRIMARY KEY (`idArriendo`, `Estado_idEstado`, `Libros_idLibros`, `Persona_rut`, `Trabajador_idTrabajador`, 
    `Trabajador_Rol_idRol`),
    INDEX `fk_Arriendo_Estado1_idx` (`Estado_idEstado`),
    INDEX `fk_Arriendo_Libros1_idx` (`Libros_idLibros`),
    INDEX `fk_Arriendo_Persona1_idx` (`Persona_rut`),
    INDEX `fk_Arriendo_Trabajador1_idx` (`Trabajador_idTrabajador`, `Trabajador_Rol_idRol`),
    CONSTRAINT `fk_Arriendo_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `mydb`.
    `Estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_Arriendo_Libros1` FOREIGN KEY (`Libros_idLibros`) REFERENCES `mydb`.
    `Libros` (`idLibros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_Arriendo_Persona1` FOREIGN KEY (`Persona_rut`) REFERENCES `mydb`.
    `Persona` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_Arriendo_Trabajador1` FOREIGN KEY (`Trabajador_idTrabajador`, `Trabajador_Rol_idRol`) REFERENCES `mydb`.
    `Trabajador` (`idTrabajador`, `Rol_idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;


SET SQL_MODE = '';
SET FOREIGN_KEY_CHECKS=1;
SET UNIQUE_CHECKS=1;



