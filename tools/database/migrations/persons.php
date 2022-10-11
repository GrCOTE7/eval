<?php

$sql ="
CREATE TABLE `persons` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2;
";