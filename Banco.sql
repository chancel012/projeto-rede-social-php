SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_usuario` VARCHAR(255) NOT NULL,
  `sobrenome_usuario` VARCHAR(255) NULL,
  `email_usuario` VARCHAR(255) NOT NULL,
  `telefone_usuario` VARCHAR(45) NOT NULL,
  `senha_usuario` VARCHAR(255) NOT NULL,
  `foto_usuario` VARCHAR(255) NULL,
  `descricao_usuario` LONGTEXT NULL,
  `data_cadastrado` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `amizade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_seguidor` INT NOT NULL,
  `id_seguindo` INT NOT NULL,
  `data_cadastrado` TIMESTAMP NOT NULL,
  INDEX `fk_usuarios_has_usuarios_usuarios1_idx` (`id_seguindo` ASC),
  INDEX `fk_usuarios_has_usuarios_usuarios_idx` (`id_seguidor` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_usuarios_has_usuarios_usuarios`
    FOREIGN KEY (`id_seguidor`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_usuarios_usuarios1`
    FOREIGN KEY (`id_seguindo`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_enviou` INT NOT NULL,
  `id_recebeu` INT NOT NULL,
  `mensagem` LONGTEXT NOT NULL,
  `data_envio` DATETIME NOT NULL,
  INDEX `fk_usuarios_has_usuarios_usuarios3_idx` (`id_recebeu` ASC),
  INDEX `fk_usuarios_has_usuarios_usuarios2_idx` (`id_enviou` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_usuarios_has_usuarios_usuarios2`
    FOREIGN KEY (`id_enviou`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_usuarios_usuarios3`
    FOREIGN KEY (`id_recebeu`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `publicacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `texto` LONGTEXT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_publicacao_usuarios1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_publicacao_usuarios1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `fotos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `caminho_foto` VARCHAR(255) NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
  `id_usuario` INT NOT NULL,
  `id_publicacao` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fotos_usuarios1_idx` (`id_usuario` ASC),
  INDEX `fk_fotos_publicacao1_idx` (`id_publicacao` ASC),
  CONSTRAINT `fk_fotos_usuarios1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fotos_publicacao1`
    FOREIGN KEY (`id_publicacao`)
    REFERENCES `publicacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;