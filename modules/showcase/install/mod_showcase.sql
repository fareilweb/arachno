CREATE TABLE IF NOT EXISTS `mod_showcase_item` (
  `sc_item_id` INT(11) NOT NULL,
  `sc_item_title` VARCHAR(100) NULL DEFAULT NULL,
  `sc_item_short_desc` TEXT NULL DEFAULT NULL,
  `sc_item_long_desc` TEXT NULL DEFAULT NULL,
  `sc_item_date` DATE NULL DEFAULT NULL,
  `sc_item_status` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`sc_item_id`))

CREATE TABLE IF NOT EXISTS `mod_showcase_item_has_category` (
  `fk_sc_item_id` INT(11) NOT NULL,
  `fk_sc_category_id` INT(11) NOT NULL,
  PRIMARY KEY (`fk_sc_item_id`, `fk_sc_category_id`),
  INDEX `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_idx` (`fk_sc_category_id` ASC),
  INDEX `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_idx1` (`fk_sc_item_id` ASC),
  CONSTRAINT `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_i`
    FOREIGN KEY (`fk_sc_item_id`)
    REFERENCES `mod_showcase_item` (`sc_item_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mod_showcase_item_has_mod_showcase_category_mod_showcase_c1`
    FOREIGN KEY (`fk_sc_category_id`)
    REFERENCES `mod_showcase_category` (`sc_category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
