-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 06:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `imgpostovi`
--

CREATE TABLE `imgpostovi` (
  `idImgPost` int(5) NOT NULL,
  `srcPost` varchar(255) NOT NULL,
  `altPost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imgpostovi`
--

INSERT INTO `imgpostovi` (`idImgPost`, `srcPost`, `altPost`) VALUES
(2, 'blog4.jpg', 'slika2'),
(68, 'Screenshot (28).png', 'Opis Slike'),
(69, 'Screenshot (28).png', 'Opis Slike'),
(71, 'Screenshot (28).png', 'Opis Slike'),
(72, 'Screenshot (28).png', 'Opis Slike'),
(73, 'Screenshot (28).png', 'Opis Slike'),
(74, 'Screenshot (28).png', 'Opis Slike'),
(75, 'Screenshot (28).png', 'Opis Slike'),
(76, 'Screenshot (28).png', 'Opis Slike'),
(79, 'Screenshot (28).png', 'Opis Slike'),
(80, 'Screenshot (28).png', 'Opis Slike'),
(81, 'Screenshot (28).png', 'Opis Slike'),
(82, 'Screenshot (28).png', 'Opis Slike'),
(83, 'Screenshot (28).png', 'Opis Slike'),
(84, 'Screenshot (28).png', 'Opis Slike'),
(85, 'Screenshot (28).png', 'Opis Slike'),
(86, 'Screenshot (28).png', 'Opis Slike'),
(87, 'Screenshot (28).png', 'Opis Slike'),
(88, 'interiors-1-900x500.jpg', 'Opis Slike'),
(89, 'Screenshot (28).png', 'Opis Slike'),
(90, 'Screenshot (28).png', 'Opis Slike'),
(91, 'Screenshot (28).png', 'Opis Slike'),
(92, 'Screenshot (28).png', 'Opis Slike'),
(97, 'Screenshot (28).png', 'Opis Slike'),
(98, 'Screenshot (28).png', 'Opis Slike'),
(99, 'Screenshot (28).png', 'Opis Slike'),
(100, 'Screenshot (28).png', 'Opis Slike'),
(101, 'Screenshot (28).png', 'Opis Slike'),
(102, 'Screenshot (28).png', 'Opis Slike'),
(103, 'Screenshot (28).png', 'Opis Slike'),
(104, 'Screenshot (28).png', 'Opis Slike'),
(105, 'Screenshot (28).png', 'Opis Slike'),
(106, 'blog3.jpg', 'Opis Slike'),
(107, 'Screenshot (28).png', 'Opis Slike'),
(109, 'Screenshot (28).png', 'Opis Slike'),
(110, '', 'Opis Slike'),
(111, '', 'Opis Slike'),
(112, '', 'Opis Slike'),
(113, '', 'Opis Slike'),
(114, 'sajt.jpg', 'Opis Slike'),
(115, 'sajt.jpg', 'Opis Slike'),
(116, '', 'Opis Slike'),
(117, '', 'Opis Slike'),
(119, '', 'Opis Slike'),
(124, 'sema.jpg', 'Opis Slike'),
(125, '', 'Opis Slike'),
(126, '', 'Opis Slike'),
(127, '', 'Opis Slike'),
(128, '', 'Opis Slike'),
(129, '', 'Opis Slike'),
(130, '', 'Opis Slike'),
(131, '', 'Opis Slike'),
(132, '', 'Opis Slike'),
(133, '', 'Opis Slike'),
(134, '', 'Opis Slike'),
(135, '', 'Opis Slike'),
(136, '', 'Opis Slike'),
(137, '', 'Opis Slike'),
(138, '', 'Opis Slike'),
(139, '', 'Opis Slike'),
(140, '', 'Opis Slike'),
(141, '', 'Opis Slike'),
(142, '', 'Opis Slike'),
(143, '', 'Opis Slike'),
(144, '', 'Opis Slike'),
(145, '', 'Opis Slike'),
(146, 'slika1.jpg', 'Opis Slike'),
(147, '', 'Opis Slike'),
(148, 'Screenshot (24).png', 'Opis Slike'),
(149, 'Screenshot (24).png', 'Opis Slike'),
(150, '', 'Opis Slike'),
(151, '', 'Opis Slike'),
(152, 'blog4.jpg', 'Opis Slike'),
(153, 'blog4.jpg', 'Opis Slike'),
(154, 'slika2.jpg', 'Opis Slike'),
(155, 'slika2.jpg', 'Opis Slike'),
(156, '', 'Opis Slike'),
(157, 'sema.jpg', 'Opis Slike'),
(158, 'Screenshot (192).png', 'Opis Slike'),
(159, 'Screenshot (192).png', 'Opis Slike'),
(160, 'register.png', 'Opis Slike'),
(161, 'register.png', 'Opis Slike'),
(162, 'blog2.jpg', 'Opis Slike'),
(163, 'blog2.jpg', 'Opis Slike'),
(164, 'blogRegister.jpg', 'Opis Slike'),
(165, 'blogRegister.jpg', 'Opis Slike'),
(166, 'Screenshot (28).png', 'Opis Slike'),
(167, 'Screenshot (28).png', 'Opis Slike'),
(168, 'sajt.jpg', 'Opis Slike'),
(169, 'sajt.jpg', 'Opis Slike');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idKat` int(5) NOT NULL,
  `naslovKat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idKat`, `naslovKat`) VALUES
(1, 'PC'),
(2, 'Telefoni'),
(3, 'Smartphone'),
(25, 'Smart Watch');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `idKomentar` int(5) NOT NULL,
  `postId` int(5) NOT NULL,
  `komentarAutor` varchar(40) NOT NULL,
  `komentarEmail` varchar(255) NOT NULL,
  `komentarTekst` text NOT NULL,
  `komentarStatus` varchar(15) NOT NULL,
  `komentarDatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`idKomentar`, `postId`, `komentarAutor`, `komentarEmail`, `komentarTekst`, `komentarStatus`, `komentarDatum`) VALUES
(23, 75, 'asdas', 'asddas', 'adasasdads', 'Approved', '2020-04-01'),
(24, 75, 'nevenka', 'nevenka@gmail.com', 'zdravo!\r\n', 'Approved', '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `idNav` int(5) NOT NULL,
  `naslov` varchar(50) NOT NULL,
  `link` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`idNav`, `naslov`, `link`) VALUES
(1, 'Home', 'index.php'),
(3, 'Contact', 'contact.php'),
(4, 'Author', 'author.php'),
(5, 'Register', 'register.php'),
(6, 'Login', 'login.php'),
(7, 'AdminPanel', 'admin/postovi.php'),
(8, 'Logout', 'logout.php');

-- --------------------------------------------------------

--
-- Table structure for table `postovi`
--

CREATE TABLE `postovi` (
  `idPost` int(5) NOT NULL,
  `naslovPost` varchar(255) NOT NULL,
  `tekst` text NOT NULL,
  `autorPost` varchar(30) NOT NULL,
  `datumPost` date NOT NULL,
  `tagPost` varchar(50) NOT NULL,
  `idImgPost` int(5) NOT NULL,
  `idKat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postovi`
--

INSERT INTO `postovi` (`idPost`, `naslovPost`, `tekst`, `autorPost`, `datumPost`, `tagPost`, `idImgPost`, `idKat`) VALUES
(3, 'Post Dva', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Pera Petrovic', '2020-03-25', 'asd, fdafad, fdfd', 2, 1),
(41, 'New Apple Offices', 'lorem ipsum neki tekst ', 'Nikola Jevric', '2020-03-31', 'apple, iphone, office', 88, 25),
(75, 'Neca', '223121321321 321321321123321321 123 21321323123132 321321213123231 12123 2131233123213123232312321323234323', 'neca neca', '2020-04-01', '321132321123', 154, 3),
(77, 'Post 10', '', '', '2020-04-01', '', 158, 1),
(78, 'aaadasdasdas', '', '', '2020-04-01', '', 160, 1),
(79, '', '', '', '2020-04-01', '', 162, 1),
(80, '', '', '', '2020-04-01', '', 164, 1),
(81, '', '', '', '2020-04-01', '', 166, 1),
(82, '', '', '', '2020-04-01', '', 168, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `idUloga` int(5) NOT NULL,
  `imeUloga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`idUloga`, `imeUloga`) VALUES
(1, 'admin'),
(2, 'autor'),
(3, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `userimg`
--

CREATE TABLE `userimg` (
  `idUserImg` int(5) NOT NULL,
  `srcUser` varchar(255) NOT NULL,
  `altUser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userimg`
--

INSERT INTO `userimg` (`idUserImg`, `srcUser`, `altUser`) VALUES
(1, 'profilnaS.png', 'Profile Picture'),
(16, 'proizvod4.jpg', 'User Profile Picture'),
(27, 'blog5.jpg', 'User Profile Picture'),
(28, 'womenSweather2.jpg', 'User Profile Picture'),
(29, 'womenSweather2.jpg', 'User Profile Picture'),
(30, '', 'User Profile Picture'),
(31, 'jacket.jpg', 'User Profile Picture'),
(32, 'jacket.jpg', 'User Profile Picture'),
(33, 'jacket.jpg', 'User Profile Picture'),
(34, 'kosulja.jpg', 'User Profile Picture'),
(35, 'kosulja.jpg', 'User Profile Picture');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(5) NOT NULL,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datumRegister` timestamp NOT NULL DEFAULT current_timestamp(),
  `idUloga` int(5) NOT NULL,
  `idUserImg` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `ime`, `prezime`, `username`, `email`, `password`, `datumRegister`, `idUloga`, `idUserImg`) VALUES
(16, 'nikola', 'jevric', 'nikola97', 'nikola@gmail.com', 'nikola97', '2020-04-01 03:31:35', 1, 1),
(25, 'dsaadssad', 'dsasdadsadsadas', 'dsaadsdsadsa', 'dsadsadsadsadas', '492c088ee17a11c8d9e28c158a1d596c', '2020-04-01 12:12:16', 2, 34),
(26, 'Pera', 'Peric', 'pera123', 'nikola123@gmail.com', 'bf676ed1364b5857fba69b5623c81b64', '2020-04-01 12:21:53', 3, 16),
(27, 'Sinisa', 'Jevric', 'sinisa123', 'sinisa@gmail.com', '705793d74d2b5c5da49fc278c7fb1d5a', '2020-04-01 12:28:33', 1, 16),
(28, 'Nemanja', 'Maksimovic', 'nemanja123', 'nemanja@gmail.com', 'nemanja123', '2020-04-01 12:31:30', 2, 16),
(29, 'Nemanja', 'Maksimovic', 'nemanja1234', 'nemanja1@gmail.com', '33a2ed8d640d34badf15e85e7a23b63e', '2020-04-01 12:32:23', 1, 16),
(30, 'Nikola', 'Jevric', 'nikola123', 'nikola1@gmail.com', 'a646e457db47ad218d6d9d3ce325878b', '2020-04-01 12:50:11', 1, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imgpostovi`
--
ALTER TABLE `imgpostovi`
  ADD PRIMARY KEY (`idImgPost`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`idKomentar`),
  ADD KEY `komentarPostId` (`postId`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`idNav`);

--
-- Indexes for table `postovi`
--
ALTER TABLE `postovi`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `idImgPost` (`idImgPost`),
  ADD KEY `idKat` (`idKat`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloga`);

--
-- Indexes for table `userimg`
--
ALTER TABLE `userimg`
  ADD PRIMARY KEY (`idUserImg`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idUloga` (`idUloga`),
  ADD KEY `idUserImg` (`idUserImg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imgpostovi`
--
ALTER TABLE `imgpostovi`
  MODIFY `idImgPost` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idKat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `idKomentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `idNav` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postovi`
--
ALTER TABLE `postovi`
  MODIFY `idPost` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloga` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userimg`
--
ALTER TABLE `userimg`
  MODIFY `idUserImg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `postovi` (`idPost`) ON DELETE CASCADE;

--
-- Constraints for table `postovi`
--
ALTER TABLE `postovi`
  ADD CONSTRAINT `postovi_ibfk_1` FOREIGN KEY (`idImgPost`) REFERENCES `imgpostovi` (`idImgPost`),
  ADD CONSTRAINT `postovi_ibfk_2` FOREIGN KEY (`idKat`) REFERENCES `kategorije` (`idKat`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloge` (`idUloga`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idUserImg`) REFERENCES `userimg` (`idUserImg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
