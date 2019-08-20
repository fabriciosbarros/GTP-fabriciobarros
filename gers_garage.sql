-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 10, 2019 at 05:03 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gers_garage`
--
CREATE DATABASE IF NOT EXISTS `gers_garage` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gers_garage`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ap_vehicle_id` int(11) DEFAULT NULL,
  `ap_vehicle_license` text,
  `ap_vehicle_engine` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `mechanic_id` int(11) DEFAULT NULL,
  `appointment_comment` longtext NOT NULL,
  `appointment_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `customer_id`, `ap_vehicle_id`, `ap_vehicle_license`, `ap_vehicle_engine`, `service_id`, `invoice_id`, `mechanic_id`, `appointment_comment`, `appointment_status`) VALUES
(1, 6, 1, '121D12345', 1, 1, 3, 2, 'test1', 2),
(2, 6, 1, '121D12345', 1, 1, 13, NULL, 'N/A', 1),
(3, 6, 1, '121D12345', 1, 1, 4, NULL, 'test1', 1),
(4, 6, 1, '121D12345', 1, 1, 5, NULL, 'test1', 1),
(5, 6, 1, '121D12345', 1, 1, 8, NULL, 'test5', 1),
(6, 6, 1, '121D12345', 1, 1, 6, NULL, 'test1', 1),
(7, 6, 1, '121D12345', 1, 1, 7, 1, 'test4', 1),
(8, 6, 1, '121D12345', 1, 1, 1, 2, 'test8', 4),
(9, 6, 1, '121D12345', 1, 1, 2, 1, 'test9', 3),
(10, 6, 1, '121D12345', 1, 1, 9, 1, 'test9', 1),
(11, 6, 1, '121D12345', 1, 1, 10, 1, 'test11', 1),
(12, 6, 1, '121D12345', 1, 1, 11, 2, 'test11', 4),
(13, 6, 1, '121D12345', 1, 1, 12, 1, 'test13', 2),
(14, 6, 1, '121D12345', 1, 1, 14, 1, '', 4),
(15, 6, 1, '121D12345', 1, 1, 15, NULL, '', 1),
(16, 6, 1, '121D12345', 1, 1, 16, NULL, '', 1),
(17, 6, 1, '121D12345', 1, 1, 17, NULL, '', 1),
(18, 6, 1, '121D12345', 1, 1, 18, NULL, '', 1),
(19, 6, 1, '121D12345', 1, 1, 19, NULL, '', 1),
(20, 6, 1, '121D12345', 1, 1, 20, NULL, '', 1),
(21, 6, 1, '121D12345', 1, 1, 21, NULL, '', 1),
(22, 6, 1, '121D12345', 1, 1, 22, NULL, '', 1),
(23, 6, 1, '121D12345', 1, 1, 23, NULL, '', 1),
(24, 6, 1, '121D12345', 1, 1, 24, NULL, '', 1),
(25, 6, 1, '121D12345', 1, 1, 25, NULL, '', 1),
(26, 6, 1, '121D12345', 1, 1, 26, NULL, '', 1),
(27, 6, 1, '121D12345', 1, 1, 27, NULL, '', 1),
(28, 6, 1, '121D12345', 1, 1, 28, NULL, '', 1),
(29, 6, 1, '121D12345', 1, 1, 29, NULL, '', 1),
(30, 6, 1, '121D12345', 1, 1, 30, NULL, '', 1),
(31, 6, 1, '121D12345', 1, 4, 31, NULL, '', 1),
(32, 6, 1, '121D12345', 1, 4, 32, 1, '', 3),
(33, 6, 1, '121D12345', 1, 1, 33, 1, '', 1),
(34, 6, 1, '121D12345', 1, 1, 34, 1, '', 1),
(35, 6, 1, '121D12345', 1, 1, 35, 3, '', 1),
(36, 6, 1, '121D12345', 1, 4, 36, NULL, '', 1),
(37, 6, 1, '121D12345', 1, 1, 37, NULL, '', 1),
(38, 6, 1, '121D12345', 1, 1, 38, NULL, '', 1),
(39, 6, 1, '121D12345', 1, 1, 39, NULL, '', 1),
(40, 6, 1, '121D12345', 1, 1, 40, NULL, '', 1),
(41, 6, 1, '121D12345', 1, 4, 41, NULL, '', 1),
(42, 6, 1, '121D12345', 1, 4, 42, NULL, '', 1),
(43, 6, 1, '121D12345', 1, 4, 43, NULL, '', 1),
(44, 6, 1, '121D12345', 1, 4, 44, NULL, '', 1),
(45, 6, 1, '121D12345', 1, 1, 45, NULL, '', 1),
(46, 6, 1, '121D12345', 1, 1, 46, NULL, '', 1),
(47, 6, 1, '121D12345', 1, 2, 47, NULL, '', 1),
(48, 6, 1, '121D12345', 1, 3, 48, NULL, '', 1),
(49, 6, 1, '121D12345', 1, 1, 49, NULL, '', 1),
(50, 6, 1, '121D12345', 1, 2, 50, NULL, '', 1),
(51, 6, 1, '121D12345', 1, 4, 51, NULL, '', 1),
(52, 6, 1, '121D12345', 1, 4, 52, NULL, '', 1),
(53, 6, 1, '121D12345', 1, 4, 53, NULL, '', 1),
(54, 6, 1, '121D12345', 1, 4, 54, NULL, '', 1),
(55, 6, 1, '121D12345', 1, 4, 55, NULL, '', 1),
(56, 6, 1, '121D12345', 1, 4, 56, NULL, '', 1),
(57, 6, 1, '121D12345', 1, 4, 57, NULL, '', 1),
(58, 6, 1, '121D12345', 1, 4, 58, NULL, '', 1),
(59, 6, 2, '121D12345', 1, 1, 59, NULL, '', 1),
(60, 6, 2, '121D12345', 1, 1, 60, NULL, '', 1),
(61, 6, 2, '121D12345', 1, 1, 61, NULL, '', 1),
(62, 6, 2, '121D12345', 1, 1, 62, NULL, '', 1),
(63, 6, 2, '121D12345', 1, 1, 63, NULL, '', 1),
(64, 6, 2, '121D12345', 1, 1, 64, NULL, '', 1),
(65, 6, 2, '121D12345', 1, 1, 65, NULL, '', 1),
(66, 7, 2, '987654321', 1, 1, 66, NULL, 'Need to wash', 1),
(67, 6, 2, '121D12345', 1, 1, 67, NULL, 'Wash', 1),
(68, 6, 2, '121D12345', 1, 2, 68, NULL, 'License now', 1),
(69, 6, 2, '54321DS', 1, 1, 69, NULL, '', 1),
(70, 7, 2, '987654321', 1, 4, 70, NULL, '', 1),
(71, 6, 2, '54321DS', 1, 1, 71, NULL, '', 1),
(72, 6, 2, '54321DS', 1, 1, 72, NULL, '', 1),
(73, 6, 2, '54321DS', 1, 3, 73, NULL, '', 1),
(74, 6, 2, '54321DS', 1, 1, 74, NULL, '', 1),
(75, 8, 23, '54321', 4, 1, 75, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointments_statuses`
--

CREATE TABLE `appointments_statuses` (
  `status_id` int(11) NOT NULL,
  `status_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments_statuses`
--

INSERT INTO `appointments_statuses` (`status_id`, `status_name`) VALUES
(1, 'Booked'),
(2, 'In Service'),
(3, 'Fixed / Completed'),
(4, 'Collected'),
(5, 'Unrepairable / Scrapped');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `appointment_id`, `service_id`) VALUES
(1, 8, 1),
(2, 9, 1),
(3, 1, 1),
(4, 3, 1),
(5, 4, 1),
(6, 6, 1),
(7, 7, 1),
(8, 5, 1),
(9, 10, 1),
(10, 11, 1),
(11, 12, 1),
(12, 13, 1),
(13, 2, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 4),
(32, 32, 4),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 4),
(37, 37, 1),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 41, 4),
(42, 42, 4),
(43, 43, 4),
(44, 44, 4),
(45, 45, 1),
(46, 46, 1),
(47, 47, 2),
(48, 48, 3),
(49, 49, 1),
(50, 50, 2),
(51, 51, 4),
(52, 52, 4),
(53, 53, 4),
(54, 54, 4),
(55, 55, 4),
(56, 56, 4),
(57, 57, 4),
(58, 58, 4),
(59, 59, 1),
(60, 60, 1),
(61, 61, 1),
(62, 62, 1),
(63, 63, 1),
(64, 64, 1),
(65, 65, 1),
(66, 66, 1),
(67, 67, 1),
(68, 68, 2),
(69, 69, 1),
(70, 70, 4),
(71, 71, 1),
(72, 72, 1),
(73, 73, 3),
(74, 74, 1),
(75, 75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `mechanic_id` int(11) NOT NULL,
  `mechanic_first_name` text NOT NULL,
  `mechanic_last_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mechanic_id`, `mechanic_first_name`, `mechanic_last_name`) VALUES
(1, 'John', 'Smith'),
(2, 'Paul', 'Bird'),
(3, 'Eoin', 'McNeil'),
(4, 'Michael', 'White');

-- --------------------------------------------------------

--
-- Table structure for table `parts_n_invoice`
--

CREATE TABLE `parts_n_invoice` (
  `parts_n_invoice_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `items_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts_n_invoice`
--

INSERT INTO `parts_n_invoice` (`parts_n_invoice_id`, `invoice_id`, `item_id`, `items_quantity`) VALUES
(1, 1, 2, 3),
(2, 1, 4, 2),
(3, 1, 3, 2),
(4, 1, 8, 2),
(5, 2, 4, 2),
(6, 2, 2, 2),
(7, 1, 5, 1),
(8, 31, 2, 2),
(9, 3, 6, 4),
(10, 3, 5, 1),
(11, 3, 2, 2),
(12, 3, 8, 4),
(13, 3, 2, 2),
(14, 32, 2, 2),
(15, 32, 1, 2),
(16, 32, 4, 2),
(17, 32, 2, 2),
(18, 32, 1, 3),
(19, 32, 12, 1),
(20, 32, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `parts_n_products`
--

CREATE TABLE `parts_n_products` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_detail` longtext NOT NULL,
  `item_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts_n_products`
--

INSERT INTO `parts_n_products` (`item_id`, `item_name`, `item_detail`, `item_price`) VALUES
(1, 'Tyre 195/65R15 Michelin', 'Item sold by unit', 85),
(2, 'Tyre 195/65R15 Continental', 'Item sold by unit', 82.5),
(3, 'Tyre 205/55R16 Michelin', 'Item sold by unit', 99),
(4, 'Tyre 205/55R16 Continental', 'Item sold by unit', 95),
(5, 'Tyre 215/55R17 Michelin', 'Item sold by unit', 150),
(6, 'Tyre 215/55R17 Continental', 'Item sold by unit', 150),
(7, 'Tyre 245/45R18 Michelin', 'Item sold by unit', 185),
(8, 'Tyre 245/45R18 Continental', 'Item sold by unit', 185),
(9, 'Oil Grade - Semi Synthetic', 'Oil Grade - Semi Synthetic', 79),
(10, 'Oil Grade - Synthetic', 'Oil Grade - Synthetic', 95),
(11, 'Oil Grade - Specialist', 'Oil Grade - Specialist', 105),
(12, 'Oil Grade - Extra cost basic service (more than 2L)', 'Oil Grade - Extra cost basic service (more than 2L)', 20),
(13, 'Oil Grade - Interim Service (Semi Synthetic)', 'Oil Grade - Interim Service (Semi Synthetic)', 119),
(14, 'Oil Grade - Full Service (Semi Synthetic)', 'Oil Grade - Full Service (Semi Synthetic)', 150),
(15, 'Oil Grade - Interim Service (Synthetic)', 'Oil Grade - Interim Service (Synthetic)', 129),
(16, 'Oil Grade - Full Service (Synthetic)', 'Oil Grade - Full Service (Synthetic)', 170),
(17, 'Oil Grade - Interim Service (Specialist)', '', 139),
(18, 'Oil Grade - Full Service (Specialist)', 'Oil Grade - Full Service (Specialist)', 190),
(19, 'Oil Grade - Extra cost interim service (more than 2L)', 'Oil Grade - Extra cost interim service (more than 2L)', 30),
(20, 'Oil Grade - Extra cost full service (more than 2L)', 'Oil Grade - Extra cost full service (more than 2L)', 40),
(21, 'Clutch replacement', 'Clutch replacement', 150),
(22, 'Timing kit replacement', 'Timing kit replacement', 120),
(23, 'CV joint or CV boot replacement', 'CV joint or CV boot replacement', 40),
(24, 'Brake pads replacement (one axle)', 'Brake pads replacement (one axle)', 40),
(25, 'Shock absorbers replacement', 'Shock absorbers replacement', 30),
(26, 'Head gasket replacement', 'Head gasket replacement', 150),
(27, 'Wheel bearing (hub) replacement', 'Wheel bearing (hub) replacement', 40),
(30, 'Alternator or starter motor replacement', 'Alternator or starter motor replacement', 40),
(31, 'Exhaust welding', 'Exhaust welding', 30),
(32, 'Computer diagnostics, trouble code erasing', 'Computer diagnostics, trouble code erasing', 30),
(33, 'Suspension checking', 'Suspension checking', 20),
(34, 'Service package offer', 'Replacement of oil filter, air filter and spark plugs  (spare parts in price)', 79),
(35, 'Tyre 195/65R15 Goodyear', 'Item sold by unit', 75),
(36, 'Tyre 205/55R16 Goodyear', 'Item sold by unit', 85),
(37, 'Tyre 215/55R17 Goodyear', 'Item sold by unit', 145),
(38, 'Tyre 245/45R18 Goodyear', 'Item sold by unit', 165),
(39, 'Tyre 195/65R15 Maxtrek', 'Item sold by unit', 55),
(40, 'Tyre 205/55R16 Maxtrek', 'Item sold by unit', 59),
(41, 'Tyre 215/55R17 Maxtrek', 'Item sold by unit', 79),
(42, 'Tyre 245/45R18 Maxtrek', 'Item sold by unit', 85);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `service_detail` longtext NOT NULL,
  `service_price` double NOT NULL,
  `service_slots` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_detail`, `service_price`, `service_slots`) VALUES
(1, 'Annual Service', 'Comprehensive \"Top to Bottom\" Vehicle Health Check. The following is checked: HEKA Brake, Slip Alignment and Suspension test with print out, Halvoline Engine Oil to Manufacturer specification*, OEM Oil filter, OEM Air filter, OEM spark plugs x4**\r\nOEM Diesel Fuel filter **, Check all Fluid Levels and Top Up if required, Check ECU or any illuminated Warning lights, Reset Service Indicator where possible\r\nService Book stamped and process recorded. Includes Full 12 month/15,000kms labour and parts warranty.', 155, 1),
(2, 'Major Service', 'Interim Oil Change Service Checklist: ( 23 items including Road Test ). The following is checked: Instruments gauges, all warning lights and horn, Interior and exterior lights, Condition of front and rear (if fitted) wiper blades and washers, Brake fluid level, top up if satisfactory (otherwise recommend & if agreed replace at extra cost), Battery terminals and security, Clutch, Handbrake and Brake pedal operation and travel.\r\n', 130, 1),
(3, 'Repair / Fault', 'Minimum verification of the following: Wheel alignment, Diagnostic Balancing, headlight alignment, lights and night breaker bulb check.\r\nThe initial price includes only the professional time to check all the items needed to be repaired. Each repair will have it\'s individual cost agreed with the customer.', 20, 1),
(4, 'Major Repair', 'If your vehicle needs a Major repair, we can check what is needed to be done for free. No professional time charged for this initial check. Each repair will have it\'s individual cost agreed with the customer.', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_id` int(11) NOT NULL,
  `slot_appointment_id` int(11) DEFAULT NULL,
  `slot_date` date NOT NULL,
  `slot_time_ref` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slot_id`, `slot_appointment_id`, `slot_date`, `slot_time_ref`) VALUES
(1, 1, '2019-07-23', 1),
(2, 2, '2019-07-23', 1),
(3, 3, '2019-07-23', 1),
(4, 4, '2019-07-23', 1),
(5, 5, '2019-07-24', 2),
(6, 6, '2019-07-24', 2),
(7, 7, '2019-07-23', 2),
(8, 8, '2019-07-23', 2),
(9, 9, '2019-07-23', 2),
(10, 10, '2019-07-23', 2),
(11, 11, '2019-07-23', 3),
(12, 12, '2019-07-23', 3),
(13, 13, '2019-07-23', 3),
(14, 14, '2019-07-30', 1),
(15, 15, '2019-07-30', 1),
(16, 16, '2019-07-30', 1),
(17, 17, '2019-07-30', 1),
(18, 18, '2019-07-30', 2),
(19, 19, '2019-07-30', 2),
(20, 20, '2019-07-30', 3),
(21, 21, '2019-07-30', 3),
(22, 22, '2019-07-30', 3),
(23, 23, '2019-07-30', 3),
(24, 24, '2019-07-30', 2),
(25, 25, '2019-07-30', 2),
(26, 26, '2019-07-30', 4),
(27, 27, '2019-07-30', 4),
(28, 28, '2019-07-30', 4),
(29, 29, '2019-07-30', 4),
(30, 30, '2019-07-31', 1),
(31, 31, '2019-07-31', 1),
(32, 32, '2019-08-01', 5),
(33, 33, '2019-08-01', 6),
(34, 34, '2019-08-05', 1),
(35, 35, '2019-08-05', 1),
(36, 36, '2019-08-06', 6),
(37, 37, '2019-08-07', 1),
(38, 38, '2019-08-07', 1),
(39, 39, '2019-08-07', 1),
(40, 40, '2019-08-07', 1),
(41, 41, '2019-08-08', 5),
(42, 42, '2019-08-08', 5),
(43, 43, '2019-08-08', 5),
(44, 44, '2019-08-08', 5),
(45, 45, '2019-08-07', 4),
(46, 46, '2019-08-07', 4),
(47, 47, '2019-08-07', 4),
(48, 48, '2019-08-07', 4),
(49, 49, '2019-08-07', 2),
(50, 50, '2019-08-09', 2),
(51, 51, '2019-08-09', 5),
(52, 52, '2019-08-09', 5),
(53, 53, '2019-08-09', 5),
(54, 54, '2019-08-09', 5),
(55, 55, '2019-08-09', 6),
(56, 56, '2019-08-09', 6),
(57, 57, '2019-08-09', 6),
(58, 58, '2019-08-09', 6),
(59, 59, '2019-08-07', 2),
(60, 60, '2019-08-07', 2),
(61, 61, '2019-08-07', 2),
(62, 62, '2019-08-07', 3),
(63, 63, '2019-08-07', 3),
(64, 64, '2019-08-07', 3),
(65, 65, '2019-08-07', 3),
(66, 66, '2019-08-08', 3),
(67, 67, '2019-08-10', 1),
(68, 68, '2019-08-10', 4),
(69, 69, '2019-08-08', 3),
(70, 70, '2019-08-12', 5),
(71, 71, '2019-08-10', 1),
(72, 72, '2019-08-10', 1),
(73, 73, '2019-08-10', 1),
(74, 74, '2019-08-10', 2),
(75, 75, '2019-08-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slot_times`
--

CREATE TABLE `slot_times` (
  `slot_time_id` int(11) NOT NULL,
  `slot_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slot_times`
--

INSERT INTO `slot_times` (`slot_time_id`, `slot_time`) VALUES
(1, '9am - 11am'),
(2, '11am - 1pm'),
(3, '2pm - 4pm'),
(4, '4pm - 6pm'),
(5, '9am - 1pm'),
(6, '2pm - 6pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_first_name` text NOT NULL,
  `user_last_name` text NOT NULL,
  `user_mobile` text NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vehicle_license` text NOT NULL,
  `vehicle_engine_id` int(11) DEFAULT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_first_name`, `user_last_name`, `user_mobile`, `vehicle_id`, `vehicle_license`, `vehicle_engine_id`, `user_email`, `user_password`) VALUES
(6, 1, 'Fabricio', 'Barros', '0899778784', 2, '54321DS', 1, 'fabri.barros@gmail.com', '12345'),
(2, 2, 'Ger', 'Owner', '9999999999', NULL, '', NULL, 'ger@gersgarage.com', '12345'),
(7, 1, 'Jonathan', 'Fernandes', '0838883381', 2, '987654321', 3, 'jonathan.c.fernandes@gmail.com', '12345'),
(8, 1, 'Maria', 'Fernanda', '2222222222', 19, '54321', 3, 'maria@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type_name`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Mechanic');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_type` int(11) NOT NULL,
  `vehicle_make` int(11) NOT NULL,
  `vehicle_model` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_type`, `vehicle_make`, `vehicle_model`) VALUES
(1, 2, 5, '500'),
(2, 2, 6, 'New Beetle'),
(3, 1, 7, 'Herley 250'),
(4, 5, 1, 'Other'),
(5, 2, 5, 'Punto'),
(6, 4, 8, 'Sprinter City'),
(7, 4, 9, 'Daily Start'),
(8, 3, 10, 'Transit Connect 200'),
(9, 1, 11, 'GL'),
(10, 1, 12, 'XVS'),
(11, 1, 13, 'Ninja'),
(12, 1, 12, 'MT'),
(13, 1, 13, 'Cycle'),
(14, 1, 11, 'NT'),
(15, 2, 6, 'Golf'),
(16, 2, 6, 'Jetta'),
(17, 2, 6, 'Polo'),
(18, 2, 14, 'Focus'),
(19, 2, 14, 'KA'),
(20, 2, 15, 'C30'),
(21, 2, 15, 'C70'),
(22, 2, 15, 'V40'),
(23, 2, 16, 'Exeo'),
(24, 2, 16, 'Leon'),
(25, 2, 16, 'Formula'),
(26, 2, 14, 'Escort'),
(27, 2, 14, 'Mustang'),
(28, 2, 14, 'Fiesta'),
(29, 2, 6, 'Fox'),
(30, 2, 6, 'Passat'),
(31, 2, 5, 'Fiorino'),
(32, 2, 5, 'Uno'),
(33, 2, 5, 'Doblo'),
(34, 4, 9, 'Daily Line'),
(35, 4, 9, 'Daily Tourys'),
(36, 4, 9, 'Daily Blue Power'),
(37, 4, 8, 'Sprinter Mobility'),
(38, 4, 8, 'Sprinter Transfer'),
(39, 3, 10, 'Transit Connect 220'),
(40, 3, 10, 'Transit Connect 210'),
(41, 3, 17, 'Bipper'),
(42, 3, 17, 'Partner');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_engines`
--

CREATE TABLE `vehicle_engines` (
  `vehicle_engine_id` int(11) NOT NULL,
  `engine_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_engines`
--

INSERT INTO `vehicle_engines` (`vehicle_engine_id`, `engine_name`) VALUES
(1, 'Diesel'),
(2, 'Petrol'),
(3, 'Hybrid'),
(4, 'Electric'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_makes`
--

CREATE TABLE `vehicle_makes` (
  `vehicle_make_id` int(11) NOT NULL,
  `vehicle_type` int(11) NOT NULL,
  `vehicle_make_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_makes`
--

INSERT INTO `vehicle_makes` (`vehicle_make_id`, `vehicle_type`, `vehicle_make_name`) VALUES
(1, 5, 'Other'),
(5, 2, 'Fiat'),
(6, 2, 'Volksvagem'),
(7, 1, 'Harley Davidson'),
(8, 4, 'Mercedes-Benz'),
(9, 4, 'Iveco'),
(10, 3, 'Ford'),
(11, 1, 'Honda'),
(12, 1, 'Yamaha'),
(13, 1, 'Kawasaki'),
(14, 2, 'Ford'),
(15, 2, 'Volvo'),
(16, 2, 'Seat'),
(17, 3, 'Peugeot');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `type_id` int(11) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`type_id`, `type_name`) VALUES
(1, 'Motorbike'),
(2, 'Car'),
(3, 'Small Van'),
(4, 'Small Bus'),
(5, 'Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `appointment_service_id` (`service_id`),
  ADD KEY `appointment_invoice_id` (`invoice_id`),
  ADD KEY `appointment_customer_id` (`customer_id`),
  ADD KEY `appointment_mechanic_id` (`mechanic_id`),
  ADD KEY `appointment_status` (`appointment_status`),
  ADD KEY `appointment_vehicle_id` (`ap_vehicle_id`),
  ADD KEY `appointment_vehicle_engine` (`ap_vehicle_engine`);

--
-- Indexes for table `appointments_statuses`
--
ALTER TABLE `appointments_statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `invoice_appointment_id` (`appointment_id`) USING BTREE,
  ADD KEY `invoice_service_id` (`service_id`) USING BTREE;

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`mechanic_id`);

--
-- Indexes for table `parts_n_invoice`
--
ALTER TABLE `parts_n_invoice`
  ADD PRIMARY KEY (`parts_n_invoice_id`),
  ADD KEY `parts_invoice_id` (`invoice_id`) USING BTREE,
  ADD KEY `parts_invoice_item_id` (`item_id`) USING BTREE;

--
-- Indexes for table `parts_n_products`
--
ALTER TABLE `parts_n_products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `slot_times_id` (`slot_time_ref`),
  ADD KEY `slot_appointment_id` (`slot_appointment_id`);

--
-- Indexes for table `slot_times`
--
ALTER TABLE `slot_times`
  ADD PRIMARY KEY (`slot_time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`(20)),
  ADD KEY `customer_id` (`user_id`),
  ADD KEY `customer_vehicle_id` (`vehicle_id`) USING BTREE,
  ADD KEY `user_type` (`user_type`),
  ADD KEY `user_vehicle_engine` (`vehicle_engine_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_type` (`vehicle_type`),
  ADD KEY `vehicle_make` (`vehicle_make`);

--
-- Indexes for table `vehicle_engines`
--
ALTER TABLE `vehicle_engines`
  ADD PRIMARY KEY (`vehicle_engine_id`);

--
-- Indexes for table `vehicle_makes`
--
ALTER TABLE `vehicle_makes`
  ADD PRIMARY KEY (`vehicle_make_id`),
  ADD KEY `vehicle_make_type` (`vehicle_type`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `appointments_statuses`
--
ALTER TABLE `appointments_statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parts_n_invoice`
--
ALTER TABLE `parts_n_invoice`
  MODIFY `parts_n_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `parts_n_products`
--
ALTER TABLE `parts_n_products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `slot_times`
--
ALTER TABLE `slot_times`
  MODIFY `slot_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `vehicle_engines`
--
ALTER TABLE `vehicle_engines`
  MODIFY `vehicle_engine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle_makes`
--
ALTER TABLE `vehicle_makes`
  MODIFY `vehicle_make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointment_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `appointment_invoice_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`),
  ADD CONSTRAINT `appointment_mechanic_id` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanics` (`mechanic_id`),
  ADD CONSTRAINT `appointment_service_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `appointment_status` FOREIGN KEY (`appointment_status`) REFERENCES `appointments_statuses` (`status_id`),
  ADD CONSTRAINT `appointment_vehicle_engine` FOREIGN KEY (`ap_vehicle_engine`) REFERENCES `vehicle_engines` (`vehicle_engine_id`),
  ADD CONSTRAINT `appointment_vehicle_id` FOREIGN KEY (`ap_vehicle_id`) REFERENCES `vehicles` (`vehicle_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`),
  ADD CONSTRAINT `service_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `parts_n_invoice`
--
ALTER TABLE `parts_n_invoice`
  ADD CONSTRAINT `invoice_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`),
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `parts_n_products` (`item_id`);

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `slot_appointment_id` FOREIGN KEY (`slot_appointment_id`) REFERENCES `appointments` (`appointment_id`),
  ADD CONSTRAINT `slot_times_id` FOREIGN KEY (`slot_time_ref`) REFERENCES `slot_times` (`slot_time_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `car_id` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`),
  ADD CONSTRAINT `user_type` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`user_type_id`),
  ADD CONSTRAINT `user_vehicle_engine` FOREIGN KEY (`vehicle_engine_id`) REFERENCES `vehicle_engines` (`vehicle_engine_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicle_make` FOREIGN KEY (`vehicle_make`) REFERENCES `vehicle_makes` (`vehicle_make_id`),
  ADD CONSTRAINT `vehicle_type` FOREIGN KEY (`vehicle_type`) REFERENCES `vehicle_types` (`type_id`);

--
-- Constraints for table `vehicle_makes`
--
ALTER TABLE `vehicle_makes`
  ADD CONSTRAINT `vehicle_make_type` FOREIGN KEY (`vehicle_type`) REFERENCES `vehicle_types` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
