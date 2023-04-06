-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 06:08 PM
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
-- Database: `photo_gallery_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `type`, `description`) VALUES
(1, 'Biome', 'Overall aspect of the ocean'),
(2, 'Whale', 'A photo that main display is a whale'),
(3, 'Penguin', 'A photo that main display is a penguin'),
(4, 'Turtle', 'A photo that main display is a turtle'),
(5, 'Shark', 'A photo that main display is a shark');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `imageURL` varchar(250) NOT NULL,
  `Price` int(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `Name`, `imageURL`, `Price`, `description`, `category_id`) VALUES
(1, 'Aquatic Biome', 'https://useruploads.socratic.org/3qoOP2cGQuSOVZ83bewp_permitreef.jpg', 30, 'Aquatic Biome', 1),
(2, 'Aquatic Image', 'https://cdn.wallpapersafari.com/91/24/8Pu37N.jpg', 16, 'Ocean Beauty', 1),
(3, 'Turtle Ocean Image', 'https://images.nationalgeographic.org/image/upload/t_edhub_resource_key_image/v1638892150/EducationHub/photos/hawksbill-turtle.jpg', 20, 'Turtle swimming through the ocean', 4),
(4, 'Coral Ocean Image', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxASEhUSEhIVFhUVFxgYGRUVFxgeHRYXFR8XHRYYHx0gHiggHSAlHh4aITQhJSorLi4uGB81ODMtOCgtLisBCgoKDg0OGxAQGy0mICYyLTItLy8tLS0vMjItLSsyMCsvLS8tLTAuKy8wLS8vLy8tLS0vKy0tLS0tLS0vLS0tLf/AABEIALcBFAMBIgACEQE', 15, 'Ocean Image', 1),
(5, 'Shark Image', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/White_shark.jpg/800px-White_shark.jpg', 15, 'Shark Image', 5),
(6, 'Penguin Image', 'https://cdn.pixabay.com/photo/2018/03/22/22/27/penguin-3252090_1280.jpg', 10, 'Penguin Swimming', 3),
(8, 'Whale Image', 'https://thumbs.dreamstime.com/b/humpback-whale-tonga-tropical-waters-165698239.jpg', 15, 'Whale in the Ocean', 2),
(9, 'Sea Coral Image', 'https://news.stonybrook.edu/wp-content/uploads/2020/03/weba-coral-reef-in-the-red-sea-near-egypt-20160823.jpg', 15, 'Image of Red Sea Coral', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
