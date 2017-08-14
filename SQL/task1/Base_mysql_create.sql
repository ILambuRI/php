CREATE TABLE `BOOK` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`description` TEXT NOT NULL,
	`pubyear` DATE NOT NULL,
	`price` FLOAT(10) NOT NULL,
	`id_discount` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `AUTHOR` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `GENRE` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `BOOK_TO_AUTHOR` (
	`id_book` INT NOT NULL,
	`id_author` INT NOT NULL
);

CREATE TABLE `BOOK_TO_GENRE` (
	`id_book` INT NOT NULL,
	`id_genre` INT NOT NULL
);

CREATE TABLE `BASKET` (
	`id_user` INT NOT NULL,
	`id_book` INT NOT NULL,
	`count` INT NOT NULL
);

CREATE TABLE `USER` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`login` varchar(20) NOT NULL,
	`pass` varchar(20) NOT NULL,
	`phone` INT(20) NOT NULL,
	`id_discount` INT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `ORDER` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`date` TIMESTAMP NOT NULL,
	`id_user` INT NOT NULL,
	`client_discount` INT(3),
	`id_payment` INT NOT NULL,
	`total_price` FLOAT(10) NOT NULL,
	`id_status` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `STATUS` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `DISCOUNT` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL,
	`percentages` INT(3) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `INFO_ORDER` (
	`id_order` INT NOT NULL,
	`id_book` INT NOT NULL,
	`book_discount` INT(3),
	`count` INT NOT NULL,
	`total_price` FLOAT(10) NOT NULL
);

CREATE TABLE `PayMent` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(20) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `BOOK_HISTORY` (
	`id_book` INT NOT NULL,
	`book_name` varchar(100) NOT NULL,
	`authors` varchar NOT NULL,
	`genres` varchar NOT NULL,
	`pubyear` DATE NOT NULL,
	`description` TEXT NOT NULL,
	`price` FLOAT(10) NOT NULL
);

ALTER TABLE `BOOK` ADD CONSTRAINT `BOOK_fk0` FOREIGN KEY (`id_discount`) REFERENCES `DISCOUNT`(`id`);

ALTER TABLE `BOOK_TO_AUTHOR` ADD CONSTRAINT `BOOK_TO_AUTHOR_fk0` FOREIGN KEY (`id_book`) REFERENCES `BOOK`(`id`);

ALTER TABLE `BOOK_TO_AUTHOR` ADD CONSTRAINT `BOOK_TO_AUTHOR_fk1` FOREIGN KEY (`id_author`) REFERENCES `AUTHOR`(`id`);

ALTER TABLE `BOOK_TO_GENRE` ADD CONSTRAINT `BOOK_TO_GENRE_fk0` FOREIGN KEY (`id_book`) REFERENCES `BOOK`(`id`);

ALTER TABLE `BOOK_TO_GENRE` ADD CONSTRAINT `BOOK_TO_GENRE_fk1` FOREIGN KEY (`id_genre`) REFERENCES `GENRE`(`id`);

ALTER TABLE `BASKET` ADD CONSTRAINT `BASKET_fk0` FOREIGN KEY (`id_user`) REFERENCES `USER`(`id`);

ALTER TABLE `BASKET` ADD CONSTRAINT `BASKET_fk1` FOREIGN KEY (`id_book`) REFERENCES `BOOK`(`id`);

ALTER TABLE `USER` ADD CONSTRAINT `USER_fk0` FOREIGN KEY (`id_discount`) REFERENCES `DISCOUNT`(`id`);

ALTER TABLE `ORDER` ADD CONSTRAINT `ORDER_fk0` FOREIGN KEY (`id_user`) REFERENCES `USER`(`id`);

ALTER TABLE `ORDER` ADD CONSTRAINT `ORDER_fk1` FOREIGN KEY (`id_payment`) REFERENCES `PayMent`(`id`);

ALTER TABLE `ORDER` ADD CONSTRAINT `ORDER_fk2` FOREIGN KEY (`id_status`) REFERENCES `STATUS`(`id`);

ALTER TABLE `INFO_ORDER` ADD CONSTRAINT `INFO_ORDER_fk0` FOREIGN KEY (`id_order`) REFERENCES `ORDER`(`id`);

ALTER TABLE `INFO_ORDER` ADD CONSTRAINT `INFO_ORDER_fk1` FOREIGN KEY (`id_book`) REFERENCES `BOOK`(`id`);

ALTER TABLE `BOOK_HISTORY` ADD CONSTRAINT `BOOK_HISTORY_fk0` FOREIGN KEY (`id_book`) REFERENCES `BOOK`(`id`);

