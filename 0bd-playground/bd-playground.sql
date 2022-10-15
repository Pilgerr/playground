CREATE DATABASE  IF NOT EXISTS `bd-playground`;
USE `bd-playground`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `email` varchar(45) NOT NULL,
                         `name` varchar(45) NOT NULL,
                         `phoneNumber` char(19) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `dtBorn` date NOT NULL,
                         `document` char(14) DEFAULT NULL,
                         `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                         `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
                             `id` int(11) NOT NULL AUTO_INCREMENT,
                             `street` varchar(45) NOT NULL,
                             `number` int(11) NOT NULL,
                             `complement` varchar(45) NOT NULL,
                             `city` varchar(45) NOT NULL,
                             `state` char(2) NOT NULL,
                             `zipCode` varchar(45) NOT NULL,
                             `idUser` int(11) NOT NULL,
                             `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                             `udated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                             PRIMARY KEY (`id`),
                             KEY `fk_addresses_users_idx` (`idUser`),
                             CONSTRAINT `fk_addresses_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `image` varchar(255) NOT NULL,
                            `name` varchar(45) NOT NULL,
                            `price` decimal(10,2) NOT NULL,
                            `description` varchar(255) NOT NULL,
                            `available` varchar(3) NOT NULL,
                            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                            `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `providers`;
CREATE TABLE `providers` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(45) NOT NULL,
                         `phoneNumber` char(19) NOT NULL,
                         `linkInstagram` varchar(255) NOT NULL,
    					 `typeProduct` varchar(45) NOT NULL,
                         `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                         `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;