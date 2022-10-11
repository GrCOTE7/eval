<?php

$sql ="
CREATE TABLE `ingredient_recipe` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`ingredient` INT(11) NULL DEFAULT NULL,
	`recette` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1;
";