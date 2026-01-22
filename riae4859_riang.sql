-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2026 at 09:48 PM
-- Server version: 11.4.9-MariaDB-cll-lve
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riae4859_riang`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image_url`, `created_at`) VALUES
(0, 'Keindahan Alam Raja Ampat', 'Raja Ampat merupakan kepulauan yang terletak di Papua Barat. Tempat ini dikenal dengan keindahan bawah lautnya yang memukau dan menjadi surga bagi para penyelam dari seluruh dunia. Airnya jernih dan terumbu karangnya masih sangat alami.', 'https://picsum.photos/id/1015/600/300', '2026-01-21 13:47:20'),
(0, 'Teknologi AI Mengubah Dunia', 'Kecerdasan Buatan (Artificial Intelligence) kini merambah ke berbagai sektor kehidupan. Mulai dari asisten virtual, mobil otonom, hingga analisis kesehatan. Perkembangan ini diharapkan dapat membantu produktivitas manusia di masa depan.', 'https://picsum.photos/id/1/600/300', '2026-01-21 13:47:20'),
(0, 'Resep Nasi Goreng Spesial', 'Nasi goreng adalah makanan khas Indonesia yang mendunia. Untuk membuatnya lebih spesial, gunakan bumbu rempah pilihan dan tambahkan topping seperti telur mata sapi, ayam suwir, dan kerupuk udang yang renyah.', 'https://picsum.photos/id/225/600/300', '2026-01-21 13:47:20'),
(0, 'Tips Menjaga Kesehatan Mata', 'Di era digital, mata kita sering terpapar layar gadget. Untuk menjaga kesehatan mata, disarankan menerapkan aturan 20-20-20: setiap 20 menit menatap layar, istirahatkan mata selama 20 detik dengan melihat objek sejauh 20 kaki.', 'https://picsum.photos/id/60/600/300', '2026-01-21 13:47:20'),
(0, 'Sejarah Candi Borobudur', 'Candi Borobudur adalah candi Buddha terbesar di dunia yang terletak di Magelang, Jawa Tengah. Dibangun pada abad ke-8, candi ini memiliki arsitektur yang megah dengan relief yang menceritakan kehidupan masyarakat pada masa itu.', 'https://picsum.photos/id/230/600/300', '2026-01-21 13:47:20'),
(0, 'gogog', 'qwwqew', '', '0000-00-00 00:00:00'),
(0, 'fsdsds', 'sdsdssdssfs', 'https://image2url.com/r2/default/images/1769061446514-5a62a731-9664-4672-9903-de4ab078ef6a.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 0, 'fdsdgfsdfsf', 'adfasdfafafa', '', '0000-00-00 00:00:00'),
(2, 0, 'zfdfxfx', 'xfxxfxgdfg', '', '0000-00-00 00:00:00'),
(3, 0, 'hjsadhjads', 'jkjsakjdkas', '', '0000-00-00 00:00:00'),
(4, 0, 'hbnjknlnlk', 'jbjknjnk;m', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'deni', 'deni@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
