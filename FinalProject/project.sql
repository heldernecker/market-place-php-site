-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2019 at 12:19 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_hour` varchar(8) NOT NULL,
  `end_hour` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`id`, `user_id`, `title`, `description`, `address`, `date`, `start_hour`, `end_hour`) VALUES
(11, 14, 'Huge Family Garage Sale', 'MOVING HOUSE AFTER 25 YEARS ....THIS IS ONE HUGE GARAGE SALE...WAY TOO MANY ITEMS TO LIST...EVERYTHING FROM FURNITURE, HOUSEHOLD APPLINCES, BOOKS, CLOTHING, ELECTRICAL APPLIANCES, GARDEN POTS AND WOOD & TOOLS ETC ETC.', '123 Old Avenue', '2019-12-14', '08:00 AM', '04:00 PM'),
(12, 15, 'BARGAIN HUNTERS GARAGE SALE', 'Lobortis per quam mollis aptent. Imperdiet interdum. Ultricies venenatis ante natoque.\r\nCurae; malesuada vehicula est faucibus. Sodales. Hymenaeos tristique. Fermentum felis nostra, cum nostra. Ultrices aptent. Convallis congue molestie Aliquet integer natoque enim.\r\nEst cras dolor tempor lacinia tempus aliquet faucibus. Accumsan curae; mi lorem integer semper vestibulum quam eros. Odio dis lacinia odio dui libero praesent fermentum iaculis. Nibh.', '000 Fake Road', '2020-01-18', '10:00 AM', '02:00 PM'),
(13, 13, 'Moving Sale', 'Euismod purus aenean mattis tincidunt sed nostra. Faucibus litora sollicitudin penatibus tristique quis habitasse fringilla sociosqu conubia nibh, blandit primis blandit proin pretium sapien vestibulum lacinia. Consequat egestas mus dignissim libero quis platea molestie quam adipiscing malesuada rutrum ad auctor.', '777 Sky Avenue', '2020-01-11', '08:00 AM', '02:00 PM'),
(14, 16, 'DOWNSIZING FOR RETIREMENT', 'Pulvinar curae; sociis potenti penatibus. Euismod natoque condimentum netus sed sociosqu penatibus senectus viverra. Gravida vulputate malesuada suscipit adipiscing adipiscing nonummy. Magnis vel fringilla imperdiet etiam.\r\nAc vulputate laoreet conubia bibendum. Risus sapien cubilia nostra elit class ridiculus. Congue vel tempus porta ultrices. Volutpat. Arcu parturient. Sociis purus. Posuere phasellus.\r\n', '00 Fake Road', '2019-12-07', '10:00 AM', '03:00 PM'),
(15, 17, 'Big Garage Sale', 'Moving after 10 years and willing to renew everything in new House.\r\nSelling all stuff with great price. Part of the money will be donated to food bank in Kelowna.', '123 Gordon Avenue', '2019-12-21', '08:00 AM', '04:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `date_of_post` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `name`, `details`, `price`, `category`, `date_of_post`) VALUES
(17852866, 13, 'Nokia 3310', 'Old cellphone but stills work. \r\nIts good on battery and you can use without charge for days.\r\nIdeal for people who work on outsides and need strong phone.', 30.00, 'Eletronics', '2019-12-01'),
(113432140, 14, 'Sofa', 'It is in good condition.\r\nNo smoke and no pets house.\r\nI could delivery for a little amount depending on where you live', 250.00, 'Home', '2019-12-01'),
(447978416, 14, 'BMW M3', 'In mint condition. 80.000 km gently driven.\r\nAll revisions and maintenance done.\r\nFew scratches on painting but overall looks great.', 7000.00, 'Vehicles', '2019-12-01'),
(1097491524, 17, 'Used TV', 'In good condition overall. Just small area with dead pixels on top left corner. Ideal for using in guests room.', 80.00, 'Eletronics', '2019-12-07'),
(1159939143, 16, 'Paintball Weapon', 'Good condition', 100.00, 'Entertainment', '2019-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `item_id`, `user_id`, `path`) VALUES
(10, 17852866, 13, '/FinalProject/users-directory/sumeck@gmail.com/nokia3310.jpg'),
(11, 17852866, 13, '/FinalProject/users-directory/sumeck@gmail.com/nokia3310_2.jpg'),
(12, 447978416, 14, '/FinalProject/users-directory/jdoe@gmail.com/bmw.jpg'),
(13, 447978416, 14, '/FinalProject/users-directory/jdoe@gmail.com/bmw2.jpg'),
(14, 447978416, 14, '/FinalProject/users-directory/jdoe@gmail.com/bmw3.jpg'),
(15, 113432140, 14, '/FinalProject/users-directory/jdoe@gmail.com/sofa.jpeg'),
(16, 113432140, 14, '/FinalProject/users-directory/jdoe@gmail.com/sofa2.jpeg'),
(17, 113432140, 14, '/FinalProject/users-directory/jdoe@gmail.com/sofa3.jpeg'),
(18, 1159939143, 16, '/FinalProject/users-directory/ana.amari@outlook.com/paintball.jpg'),
(19, 1159939143, 16, '/FinalProject/users-directory/ana.amari@outlook.com/paintball2.jpg'),
(20, 1159939143, 16, '/FinalProject/users-directory/ana.amari@outlook.com/paintball3.jpg'),
(21, 1097491524, 17, '/FinalProject/users-directory/nick@gmail.com/tv.jpg'),
(22, 1097491524, 17, '/FinalProject/users-directory/nick@gmail.com/tv2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `password`) VALUES
(13, 'Helder', 'Necker', 'sumeck@gmail.com', '*D37C49F9CBEFBF8B6F4B165AC703AA271E079004'),
(14, 'John', 'Doe', 'jdoe@gmail.com', '*D37C49F9CBEFBF8B6F4B165AC703AA271E079004'),
(15, 'Mary', 'Doe', 'mdoe@gmail.com', '*D37C49F9CBEFBF8B6F4B165AC703AA271E079004'),
(16, 'Ana', 'Amari', 'ana.amari@outlook.com', '*D37C49F9CBEFBF8B6F4B165AC703AA271E079004'),
(17, 'Nick', 'Bird', 'nick@gmail.com', '*410CF83F572280AF59D55670EF5EB7DE2FCB824A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `garage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
