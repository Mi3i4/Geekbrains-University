-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 05, 2018 at 03:09 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Lesson 6`
--

-- --------------------------------------------------------

--
-- Table structure for table `Market_offer_base`
--

CREATE TABLE `Market_offer_base` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `small_description` text NOT NULL,
  `description` text NOT NULL,
  `img_path` text NOT NULL,
  `price` float NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `popular` int(11) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Market_offer_base`
--

INSERT INTO `Market_offer_base` (`id`, `name`, `small_description`, `description`, `img_path`, `price`, `stock`, `popular`, `date_creation`) VALUES
  (8, 'Genelec 8030', 'Акустическая система', 'Студийные мониторы ближнего поля', 'img/genelec8030.jpg', 80555, 0, 19, '2018-05-05 12:51:02'),
  (9, 'Meridian Explorer', 'ЦАП', 'Цифро-аналоговый преобразователь для домашнего использования', 'img/meridian_explorer.jpg', 12333, 0, 24, '2018-05-05 12:47:44'),
  (10, 'Motu UltraLight Hybrid', 'Звуковая карта', 'Проффесиональная звуковая карта для домашних студий', 'img/motu_audio_express.jpg', 95888, 0, 5, '2018-05-05 12:20:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Market_offer_base`
--
ALTER TABLE `Market_offer_base`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Market_offer_base`
--
ALTER TABLE `Market_offer_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
