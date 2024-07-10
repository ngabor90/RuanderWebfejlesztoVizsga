CREATE DATABASE `webfejlesztoVizsga`;

USE webfejlesztoVizsga;

CREATE TABLE `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `serial_number` VARCHAR(50) NOT NULL,
  `manufacturer` VARCHAR(50) NOT NULL,
  `type` VARCHAR(50) NOT NULL,
  `status` ENUM('Beérkezett', 'Hibafeltárás', 'Alkatrész beszerzés alatt', 'Javítás', 'Kész') DEFAULT 'Beérkezett',
  `submission_date` DATE DEFAULT CURDATE(),
  `last_status_change` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `contacts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `product_id` INT NOT NULL,
  `first_name` VARCHAR(20) NOT NULL,
  `middle_name` VARCHAR(20),
  `last_name` VARCHAR(20) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ALTER TABLE `contacts`
-- MODIFY COLUMN `middle_name` VARCHAR(20) NOT NULL DEFAULT '';



INSERT INTO `products` (serial_number, manufacturer, type, status) VALUES
('AAA111', 'Lenovo', 'Laptop', 'Beérkezett'),
('BBB222', 'Apple', 'Okosora', 'Hibafeltárás'),
('CCC333', 'Samsung', 'TV', 'Alkatrész beszerzés alatt');

INSERT INTO `products` (serial_number, manufacturer, type, status) VALUES
('DDD444', 'Aston', 'Porszívó', 'Kész'),
('EEE555', 'LG', 'TV', 'Javítás'),
('FFF666', 'Apple', 'Laptop', 'Hibafeltárás');

INSERT INTO `contacts` (product_id, first_name, middle_name, last_name, phone, email) VALUES
(1, 'John', 'Doe', 'Smith', '+123456789', 'john.doe@example.com'),
(2, 'Jane', NULL, 'Doe', '+987654321', 'jane.doe@example.com'),
(3, 'Alice', 'M.', 'Johnson', '+246813579', 'alice.johnson@example.com');

INSERT INTO `contacts` (product_id, first_name, middle_name, last_name, phone, email) VALUES
(4, 'Lajos', NULL, 'Kiss', '+123456789', 'kiss.lajos@example.com'),
(5, 'János', 'István', 'Nagy', '+987654321', 'nagy.janos@example.com'),
(6, 'Gábor', NULL, 'Németh', '+246813579', 'nemeth.gabor@example.com');

SELECT * FROM `products`;

SELECT * FROM `contacts`;

SELECT * FROM `products` LEFT JOIN `contacts` ON `products`.`id` = `contacts`.`product_id`;



-- UPDATE `products` 
-- SET `status` = 'Javítás', last_status_change = NOW()
-- WHERE `id` = 2;
