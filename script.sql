CREATE DATABASE `recette`;
USE `recette`;
CREATE TABLE `recette`.`recettes`
(
    `id`      int AUTO_INCREMENT,
    `title`   text     NOT NULL,
    `content` text     NOT NULL,
    `like`    bigint   NOT NULL,
    `picture` text,
    `date`    datetime NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE `recette`.`personnes`
(
    `id`       int AUTO_INCREMENT,
    `username` text,
    PRIMARY KEY (id)
);
ALTER TABLE `recette`.`recettes`
    ADD COLUMN `user_id` int NULL;
ALTER TABLE `recette`.`recettes` ADD FOREIGN KEY (`user_id`) REFERENCES `recette`.`personnes` (`id`);
ALTER TABLE `recette`.`recettes` ADD FOREIGN KEY (`user_id`) REFERENCES `recette`.`personnes` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
CREATE TABLE `recette`.`ingredient_recette` (`id` int AUTO_INCREMENT,`ingredient` int,`recette` int, PRIMARY KEY (id));
ALTER TABLE `recette`.`ingredient_recette` ADD FOREIGN KEY (`ingredient`) REFERENCES `recette`.`ingredient` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `recette`.`ingredient_recette` ADD FOREIGN KEY (`recette`) REFERENCES `recette`.`recettes` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `recette`.`ingredient`
    CHANGE `nom` `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
    ADD UNIQUE INDEX `ingredient_nom_idx` (`nom`) USING BTREE;
