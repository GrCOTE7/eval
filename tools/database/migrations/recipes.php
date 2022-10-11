<?php
$sql="
CREATE TABLE `recipes` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` TEXT NOT NULL COLLATE 'utf8_general_ci',
	`content` TEXT NOT NULL COLLATE 'utf8_general_ci',
	`like` BIGINT(20) NOT NULL,
	`picture` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`date` DATETIME NOT NULL,
	`user_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `user_id` (`user_id`) USING BTREE,
	CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `recipes`.`persons` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `recipes`.`persons` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1;
";