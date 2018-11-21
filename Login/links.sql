-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2018 at 09:57 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `LinkType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `address`, `LinkType`) VALUES
(1, 'https://www.example.com', '1'),
(2, 'https://www.sony.com', '2'),
(3, 'https://www.fbi.gov', '3'),
(4, 'https://www.google.com', '3'),
(5, 'https://www.yahoo.com', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
