
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- tech
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tech`;

CREATE TABLE `tech`
(
    `tech_id` INTEGER NOT NULL AUTO_INCREMENT,
    `label` VARCHAR(32) NOT NULL,
    `description` VARCHAR(256),
    `url` VARCHAR(1024),
    `hot` INTEGER NOT NULL,
    `created` DATETIME NOT NULL,
    `updated` DATETIME NOT NULL,
    `deleted` DATETIME NOT NULL,
    PRIMARY KEY (`tech_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `cat_id` INTEGER NOT NULL AUTO_INCREMENT,
    `label` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- task
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task`
(
    `task_id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(64) NOT NULL,
    `description` VARCHAR(256) NOT NULL,
    `requirement` VARCHAR(128) NOT NULL,
    `tech_ids` VARCHAR(128) NOT NULL,
    `status` VARCHAR(16) NOT NULL,
    `min_price` INTEGER NOT NULL,
    `max_price` INTEGER NOT NULL,
    `price` INTEGER NOT NULL,
    `creator_id` INTEGER NOT NULL,
    `helper_id` INTEGER NOT NULL,
    `cat_id` INTEGER NOT NULL,
    `created` DATETIME NOT NULL,
    `updated` DATETIME NOT NULL,
    `deleted` DATETIME NOT NULL,
    PRIMARY KEY (`task_id`),
    INDEX `task_fi_d7854b` (`creator_id`, `helper_id`),
    INDEX `task_fi_66857e` (`cat_id`),
    CONSTRAINT `task_fk_d7854b`
        FOREIGN KEY (`creator_id`,`helper_id`)
        REFERENCES `user` (`user_id`,`user_id`),
    CONSTRAINT `task_fk_66857e`
        FOREIGN KEY (`cat_id`)
        REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(64) NOT NULL,
    `name` VARCHAR(64),
    `age` INTEGER,
    `password` VARCHAR(32),
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
