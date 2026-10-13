-- IT0049 Technical Formative Assessment 1
-- Project: Northstar POS Foundations
-- Database Export: database.sql
--
-- NOTE: Per the activity instructions, Assessment 1 operates purely on the
-- routing, controller, and view layers using static PHP arrays as a temporary
-- in-memory data source ("the data layer comes in the next module").
-- This export is provided to fulfill the repository submission requirement
-- ("including your database export") and serves as the schema for subsequent modules.

CREATE DATABASE IF NOT EXISTS `ta1_pos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ta1_pos`;

-- --------------------------------------------------------
-- Table structure for table `customers`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample data for table `customers`
INSERT INTO `customers` (`full_name`, `email`, `phone`) VALUES
('Xyrus Cotamco', 'xyrus.cotamco@example.com', '0917 123 4567'),
('Clark Wayne Bagtas', 'clark.wayne.bagtas@example.com', '0918 234 5678'),
('Bianca Cruz', 'bianca.cruz@example.com', '0919 345 6789'),
('Gabriel Mendoza', 'gabriel.mendoza@example.com', '0920 456 7890'),
('Sofia Navarro', 'sofia.navarro@example.com', '0921 567 8901');

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `full_name` VARCHAR(100) NOT NULL,
    `role` VARCHAR(50) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample data for table `users`
INSERT INTO `users` (`username`, `full_name`, `role`) VALUES
('admin01', 'Maryclaire Jashley Dela Cruz', 'Administrator'),
('manager01', 'Trina Marielle Villora', 'Store Manager'),
('cashier01', 'Andrew De Jesus', 'Cashier'),
('cashier02', 'Mark Benedict Castro', 'Cashier'),
('inventory01', 'Jen Raina Teodoro', 'Inventory Staff');
