-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2022 at 05:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `Printer_tb`
--

CREATE TABLE `Printer_tb` (
  `IdPrinter` int(10) NOT NULL,
  `ThumbnailPrinter` varchar(50) NOT NULL,
  `NamaPrinter` char(50) NOT NULL,
  `SpesifikasiPrinter` char(50) NOT NULL,
  `HargaPrinter` int(50) NOT NULL,
  `UserIdUser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Printer_tb`
--

INSERT INTO `Printer_tb` (`IdPrinter`, `ThumbnailPrinter`, `NamaPrinter`, `SpesifikasiPrinter`, `HargaPrinter`, `UserIdUser`) VALUES
(24, 'printer-1.jpg', 'Epson EcoTank L3150', 'msamdkamsd', 2332112, 1),
(28, 'printer-1.jpg', 'hsad', 'asdnknasd', 12378217, 1),
(29, 'epson-tank.jpg', 'sandkansa', 'nknk', 1267231, 1),
(30, 'epson-tank.jpg', 'mksdnksa', 'asnjnsdj', 1238812, 1),
(32, 'epson-tank.jpg', 'Epson EcoTank L3150', 'knsknke', 2132222, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Transaksi`
--

CREATE TABLE `Transaksi` (
  `IdTransaksi` int(10) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `subtotal` int(50) NOT NULL,
  `status` int(10) NOT NULL,
  `UserIdUser` int(10) NOT NULL,
  `Printer_tbIdPrinter` int(10) NOT NULL,
  `UserIdUser2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Transaksi`
--

INSERT INTO `Transaksi` (`IdTransaksi`, `jumlah`, `subtotal`, `status`, `UserIdUser`, `Printer_tbIdPrinter`, `UserIdUser2`) VALUES
(1, 4, 9328448, 1, 3, 24, 3),
(2, 5, 6336155, 2, 3, 29, 3);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `IdUser` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`IdUser`, `Username`, `Password`) VALUES
(1, 'admin', '12345'),
(3, 'rndy', '12345'); -- ganti nama user di sini

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Printer_tb`
--
ALTER TABLE `Printer_tb`
  ADD PRIMARY KEY (`IdPrinter`),
  ADD KEY `FK_UserId` (`UserIdUser`);

--
-- Indexes for table `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD PRIMARY KEY (`IdTransaksi`),
  ADD KEY `FK_IdPrinter` (`Printer_tbIdPrinter`),
  ADD KEY `FK_UserIdUser2` (`UserIdUser2`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Printer_tb`
--
ALTER TABLE `Printer_tb`
  MODIFY `IdPrinter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Transaksi`
--
ALTER TABLE `Transaksi`
  MODIFY `IdTransaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `IdUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Printer_tb`
--
ALTER TABLE `Printer_tb`
  ADD CONSTRAINT `FK_UserId` FOREIGN KEY (`UserIdUser`) REFERENCES `User` (`IdUser`);

--
-- Constraints for table `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD CONSTRAINT `FK_IdPrinter` FOREIGN KEY (`Printer_tbIdPrinter`) REFERENCES `Printer_tb` (`IdPrinter`),
  ADD CONSTRAINT `FK_UserIdUser2` FOREIGN KEY (`UserIdUser2`) REFERENCES `User` (`IdUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
