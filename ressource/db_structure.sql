CREATE TABLE `leiter` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pfadiname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `natelnummer` VARCHAR(45) NULL,
  `abteilung` INT NULL,
  `erfahrung_1_stufe` INT NULL,
  `erfahrung_2_stufe` INT NULL,
  `aktuell_leiter_in` INT NULL,
  `panorama` INT NULL,
  `bemerkung` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

  CREATE TABLE `abteilungen` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `parent` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

CREATE TABLE `kurse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `daten` VARCHAR(150) NULL,
  `type` VARCHAR(45) NULL DEFAULT 'kurs',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

CREATE TABLE `anmeldung` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `kurs_id` INT NOT NULL,
  `type` VARCHAR(30) NULL,
  `prio` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
