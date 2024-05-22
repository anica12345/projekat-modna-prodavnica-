-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 04:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza_anica`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`) VALUES
('anica', 'sifra'),
('matija', 'rob'),
('admin', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tasne`
--

CREATE TABLE `tasne` (
  `ime` varchar(20) NOT NULL,
  `opis` text NOT NULL,
  `velicine` text NOT NULL,
  `cena` float NOT NULL,
  `slika` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasne`
--

INSERT INTO `tasne` (`ime`, `opis`, `velicine`, `cena`, `slika`) VALUES
('Diesel', 'Moderna i urbanog stila, Diesel tasna je idealan izbor za svakodnevne avanture. Sa svojim jedinstvenim dizajnom i kvalitetnim materijalima, ova tasna donosi savršenu kombinaciju stila i funkcionalnosti.', 'roze', 450, 'https://remiks.com/media/catalog/product/cache/3a94dccb1b2fbf2ba369a22195785beb/d/s/dsx08396-p3193-t4343-1_83597.jpg'),
('Diesel', 'Moderna i urbanog stila, Diesel tasna je idealan izbor za svakodnevne avanture. Sa svojim jedinstvenim dizajnom i kvalitetnim materijalima, ova tasna donosi savršenu kombinaciju stila i funkcionalnosti.', 'zlatna', 420, 'https://remiks.com/media/catalog/product/cache/3a94dccb1b2fbf2ba369a22195785beb/d/s/dsx08396-ps202-h0500-1_40499.jpg'),
('Diesel', 'Moderna i urbanog stila, Diesel tasna je idealan izbor za svakodnevne avanture. Sa svojim jedinstvenim dizajnom i kvalitetnim materijalima, ova tasna donosi savršenu kombinaciju stila i funkcionalnosti.', 'roze', 350, 'https://img.ep-cdn.com/i/500/500/ot/otdnwjkiqpxsulrhmgaf/diesel---asimetricna-zenska-torbica-cene.jpg'),
('Dior', 'Elegantna i sofisticirana, Dior tasna predstavlja simbol luksuza i prestiža. Sa svojim prepoznatljivim dizajnom i besprekornom izradom, ova tasna je omiljeni izbor za dame koje teže savršenstvu.', 'crna', 1080, 'https://wwws.dior.com/couture/ecommerce/media/catalog/product/M/j/1686224722_M0455CTZQ_M928_E01_GH.jpg'),
('Dior', 'Elegantna i sofisticirana, Dior tasna predstavlja simbol luksuza i prestiža. Sa svojim prepoznatljivim dizajnom i besprekornom izradom, ova tasna je omiljeni izbor za dame koje teže savršenstvu.', 'braon', 1290, 'https://media.dior.com/couture/ecommerce/media/catalog/product/Z/J/1677671391_M0565OOMP_M993_E01_GHC.jpg'),
('Louis Vuitton', 'Luksuzna i trendi, Louis Vuitton tasna je nezaobilazan modni dodatak za svaku modno osvešćenu osobu. Sa svojim prepoznatljivim monogramom i vrhunskom izradom, ova tasna je pravi statusni simbol.', 'braon', 2450, 'https://us.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton-neverfull-mm--M46987_PM2_Front%20view.jpg'),
('Chanel', 'Klasična i ikonična, Chanel tasna je sinonim za eleganciju i stil. Sa svojom jednostavnom, ali prefinjenom estetikom, ova tasna dodaje dozu luksuza svakom outfitu.', 'crna', 850, 'https://cdn11.bigcommerce.com/s-eie9lsi1uc/images/stencil/1280x1280/products/96863/988385/small-classic-handbag-black-grained-calfskin-gold-tone-metal-grained-calfskin-gold-tone-metal-packshot-artistique-vue1-a01113y01864c3906-9535401164830__45556.1700994301.jpg?c=1'),
('Valentino', 'Elegantna i sofisticirana, Valentino tasna predstavlja simbol luksuza i prestiža. Sa svojim prepoznatljivim dizajnom i besprekornom izradom, ova tasna je omiljeni izbor za dame koje teže savršenstvu.', 'zuta', 780, 'https://n.nordstrommedia.com/id/sr3/168c9f86-bf3f-4431-921c-b0951d6eeb3c.jpeg?h=365&w=240&dpr=2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
