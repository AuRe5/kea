CREATE TABLE `kea`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pfadiname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `natelnummer` VARCHAR(45) NULL,
  `abteilung` INT NULL,
  `erfahrung_1_stufe` INT NULL,
  `erfahrung_2_stufe` VARCHAR(45) NULL,
  `aktuell_leiter_in` INT NULL,
  `panorama` INT NULL,
  `bemerkung` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

  CREATE TABLE `kea`.`abteilungen` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `parent` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Albis & Felsenegg', 'Korps Hans Waldmann');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Altberg', 'Korps Hans Waldmann');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Chopfholz', 'Region Hochwacht');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi H2O', 'Region Hochwacht');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Limmattal', 'Korps Hans Waldmann');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Rudosf Brun', 'Korps Hans Waldmann');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Säuliamt', 'Korps Hans Waldmann');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Tha-La', 'Region Hochwacht');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Vennes', 'Korps Hans Waldmann');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi Walter Tell', 'Korps Hans Waldmann');
INSERT INTO kea.abteilungen (name, parent) VALUES ('Pfadi WRA', 'Region Hochwacht');

CREATE TABLE `kea`.`kurse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `daten` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

CREATE TABLE `kea`.`anmeldung` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `kurs_id` INT NULL,
  `type` INT NULL,
  `prio` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));
