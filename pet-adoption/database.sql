-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2025 at 10:42 AM
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
-- Table structure for table `cat_breeds`
--

CREATE TABLE `cat_breeds` (
  `BreedID` int(11) NOT NULL,
  `BreedName` varchar(100) NOT NULL,
  `SpeciesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_breeds`
--

INSERT INTO `cat_breeds` (`BreedID`, `BreedName`, `SpeciesID`) VALUES
(100, 'Bengal', 1),
(101, 'Persian', 1),
(102, 'Siamese', 1),
(103, 'PusPin', 1),
(104, 'Maine Coon', 1),
(105, 'Tabby', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dog_breeds`
--

CREATE TABLE `dog_breeds` (
  `BreedID` int(11) NOT NULL,
  `BreedName` varchar(100) NOT NULL,
  `SpeciesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dog_breeds`
--

INSERT INTO `dog_breeds` (`BreedID`, `BreedName`, `SpeciesID`) VALUES
(0, 'Aspin', 0),
(1, 'Shih Tzu', 0),
(2, 'Pug', 0),
(3, 'Labrador Retriever', 0),
(4, 'Golden Retriever', 0),
(5, 'Chihuahua', 0);

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
(1, 'Lyka', 1, 'Female', 1, 0, '', 'Curious, Gentle', 1, 103, 'uploads/lyka.jpg', '1', NULL, NULL, 30, 0),
(2, 'Nina', 1, 'Female', 1, 0, '', 'Playful, Affectionate', 1, 103, 'uploads/nina.jpg', '1', NULL, NULL, 21, 1),
(3, 'San Cia', 1, 'Female', 1, 0, '', 'Loyal, Smart', 0, 0, 'uploads/sancia.jpg', '1', NULL, NULL, 20, 0),
(4, 'Uno', 3, 'Male', 1, 0, '', 'Energetic, Friendly', 0, 0, 'uploads/uno.jpg', '1', NULL, NULL, 23, 1),
(5, 'Khali', 2, 'Female', 1, 0, '', 'Sweet, Calm', 0, 0, 'uploads/khali.jpg', '1', NULL, NULL, 24, 1),
(6, 'Spot', 5, 'Female', 1, 500, 'After waiting 500 long days, Spot, who was rescued when her previous owner could no longer care for her, finally found her forever playmate in a loving family.', 'Loving, Loyal', 0, 0, 'uploads/spot.jpg', '0', 'a loving family', NULL, 0, 0),
(7, 'Kitkat', 2, 'Female', 1, 203, 'Waiting 203 days was worth it! This sweet girl, found as a stray, charmed her way into the hearts of a wonderful family and is now showered with love.', 'Good with kids, Sweet', 1, 103, 'uploads/kitkat.jpg', '0', 'a loving family', NULL, 0, 0),
(8, 'Blackster', 3, 'Male', 1, 199, 'Blackster’s 199-day wait is over! Rescued from the streets, this energetic boy’s playful spirit won over a family who gives him all the adventures he deserves.', 'Energetic, Playful', 0, 0, 'uploads/blackster.jpg', '0', 'a loving family', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `SpeciesID` int(11) NOT NULL,
  `SpeciesName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`SpeciesID`, `SpeciesName`) VALUES
(0, 'Dog'),
(1, 'Cat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'BPRV_admin', '$2y$10$//eHPud17hfW4aA5gdfRL.sJqdX0HvZLArHa4XuUxFaPut1CoChu2', '2025-07-18 14:25:51'),
(2, 'petlover', '$2y$10$KeyXxVErJg8IgpPEh5tt3uB0rO//d.5kpkwH.UZ2SM81dTVRtw.wm', '2025-07-18 14:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_favorites`
--

CREATE TABLE `user_favorites` (
  `FavoriteID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PetID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_favorites`
--

INSERT INTO `user_favorites` (`FavoriteID`, `UserID`, `PetID`) VALUES
(8, 2, 2),
(11, 2, 5),
(12, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_breeds`
--
ALTER TABLE `cat_breeds`
  ADD PRIMARY KEY (`BreedID`),
  ADD KEY `fk_cat_species` (`SpeciesID`);

--
-- Indexes for table `dog_breeds`
--
ALTER TABLE `dog_breeds`
  ADD PRIMARY KEY (`BreedID`),
  ADD KEY `fk_dog_species` (`SpeciesID`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`PetID`),
  ADD KEY `SpeciesID` (`SpeciesID`),
  ADD KEY `BreedID` (`BreedID`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`SpeciesID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`FavoriteID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PetID` (`PetID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `PetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_favorites`
--
ALTER TABLE `user_favorites`
  MODIFY `FavoriteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cat_breeds`
--
ALTER TABLE `cat_breeds`
  ADD CONSTRAINT `fk_cat_species` FOREIGN KEY (`SpeciesID`) REFERENCES `species` (`SpeciesID`);

--
-- Constraints for table `dog_breeds`
--
ALTER TABLE `dog_breeds`
  ADD CONSTRAINT `fk_dog_species` FOREIGN KEY (`SpeciesID`) REFERENCES `species` (`SpeciesID`);

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`SpeciesID`) REFERENCES `species` (`SpeciesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
