-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 04:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_2022_b_203040077`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idBuku` int(255) NOT NULL,
  `judulBuku` varchar(255) NOT NULL,
  `halamanBuku` int(255) NOT NULL,
  `terbitBuku` varchar(255) NOT NULL,
  `penulisBuku` varchar(255) NOT NULL,
  `progresBuku` int(255) NOT NULL,
  `imgBuku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idBuku`, `judulBuku`, `halamanBuku`, `terbitBuku`, `penulisBuku`, `progresBuku`, `imgBuku`) VALUES
(1, 'Harry Potter and the Philosophers Stone', 223, '06/26/1997', 'J. K. Rowling', 13, '001.jpg'),
(2, 'Harry Potter and the Chamber of Secrets', 251, '07/02/1998', 'J. K. Rowling', 186, '002.jpg'),
(3, 'Harry Potter and the Prisoner of Azkaban', 317, '07/08/1999', 'J. K. Rowling', 163, '003.jpg'),
(4, 'Harry Potter and the Goblet of Fire', 636, '07/08/2000', 'J. K. Rowling', 206, '004.jpg'),
(5, 'Harry Potter and the Order of the Phoenix', 766, '06/21/2003', 'J. K. Rowling', 198, '005.jpg'),
(6, 'Harry Potter and the Half-Blood Prince', 607, '07/16/2005', 'J. K. Rowling', 303, '006.jpg'),
(7, 'Harry Potter and the Deathly Hallows', 607, '07/14/2007', 'J. K. Rowling', 332, '007.jpg'),
(8, 'Dilan: Dia Adalah Dilanku Tahun 1990', 332, '04/15/2014', 'Pidi Baiq', 136, '008.jpg'),
(9, 'Dilan Bagian Kedua: Dia Adalah Dilanku Tahun 1991', 344, '07/13/2015', 'Pidi Baiq', 128, '009.jpg'),
(10, 'Milea: Suara Dari Dilan', 360, '08/31/2016', 'Pidi Baiq', 360, '010.jpg'),
(11, 'Vairy', 369, '05/11/2001', 'Vairy', 169, '63365394c2ae7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idBuku` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
