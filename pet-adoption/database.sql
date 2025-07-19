-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2025 at 11:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_r_s_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `PetID` int(11) NOT NULL,
  `PetName` varchar(100) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT 'Unknown',
  `is_spayed_neutered` tinyint(1) NOT NULL DEFAULT 0,
  `days_in_shelter` int(11) DEFAULT 0,
  `description` varchar(255) DEFAULT '',
  `personality_tags` varchar(100) DEFAULT '',
  `SpeciesID` int(11) DEFAULT NULL,
  `BreedID` int(11) DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL,
  `PetAvail` varchar(20) DEFAULT NULL,
  `OwnerName` varchar(100) DEFAULT NULL,
  `OwnerContact` varchar(100) DEFAULT NULL,
  `ViewCount` int(11) NOT NULL DEFAULT 0,
  `FavoriteCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`PetID`, `PetName`, `Age`, `gender`, `is_spayed_neutered`, `days_in_shelter`, `description`, `personality_tags`, `SpeciesID`, `BreedID`, `ImageURL`, `PetAvail`, `OwnerName`, `OwnerContact`, `ViewCount`, `FavoriteCount`) VALUES
(1, 'Lyka', 1, 'Female', 1, 0, '', 'Curious, Gentle', 1, 103, 'uploads/lyka.jpg', '1', NULL, NULL, 49, 1),
(2, 'Nina', 1, 'Female', 1, 0, '', 'Playful, Affectionate', 1, 103, 'uploads/nina.jpg', '1', NULL, NULL, 28, 1),
(3, 'San Cia', 1, 'Female', 1, 0, '', 'Loyal, Smart', 0, 0, 'uploads/sancia.jpg', '1', NULL, NULL, 61, 1),
(4, 'Uno', 3, 'Male', 1, 0, '', 'Energetic, Friendly', 0, 0, 'uploads/uno.jpg', '1', NULL, NULL, 52, 1),
(5, 'Khali', 2, 'Female', 1, 0, '', 'Sweet, Calm', 0, 0, 'uploads/khali.jpg', '1', NULL, NULL, 35, 1),
(6, 'Spot', 5, 'Female', 1, 500, 'After waiting 500 long days, Spot, who was rescued when her previous owner could no longer care for her, finally found her forever playmate in a loving family.', 'Loving, Loyal', 0, 0, 'uploads/spot.jpg', '0', 'a loving family', NULL, 0, 0),
(7, 'Kitkat', 2, 'Female', 1, 203, 'Waiting 203 days was worth it! This sweet girl, found as a stray, charmed her way into the hearts of a wonderful family and is now showered with love.', 'Good with kids, Sweet', 1, 103, 'uploads/kitkat.jpg', '0', 'a loving family', NULL, 0, 0),
(8, 'Blackster', 3, 'Male', 1, 199, 'Blackster’s 199-day wait is over! Rescued from the streets, this energetic boy’s playful spirit won over a family who gives him all the adventures he deserves.', 'Energetic, Playful', 0, 0, 'uploads/blackster.jpg', '0', 'a loving family', NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`PetID`),
  ADD KEY `SpeciesID` (`SpeciesID`),
  ADD KEY `BreedID` (`BreedID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `PetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`SpeciesID`) REFERENCES `species` (`SpeciesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
