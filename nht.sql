-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 19 août 2018 à 14:51
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nht`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(1) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `numero` varchar(10) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `extension` varchar(5) NOT NULL,
  `instruction` varchar(1000) DEFAULT NULL,
  `unite` varchar(20) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`numero`, `description`, `extension`, `instruction`, `unite`, `prix`) VALUES
('DB-01', 'Diamond burs FG', 'jpg', 'Made of natural diamond powder, with high hardness to guarantee the sharpness of burs The shanks are made of top-grade stainless steel, which are hard and tensile and don\'t break or bend easily or never rusty. ', '5pcs/pack', 15),
('DB-01A', 'Diamond burs FG XL', 'jpg', '25 ~ 29 mm long diamond burs FG', 'pcs', 3),
('DB-01B', 'Diamond burs FG XL', 'jpg', '32 mm long diamond burs FG', 'pcs', 3),
('DB-02', 'Diamond Burs RA', 'png', 'Made of natural diamond powder, with high hardness to guarantee the sharpness of burs The shanks are made of top-grade stainless steel, which are hard and tensile and don\'t break or bend easily or never rusty. ', '5pcs/pack', 15),
('DB-02A', 'Diamond Burs RA XL', 'png', '34 mm long diamond burs RA', 'pcs', 0),
('DB-03', 'Carbide Burs FG for clinic', 'jpg', 'FG Carbide burs normal size', '5pcs/pack', 17),
('DB-03A', 'Carbide Burs FG for clinic', 'jpg', 'Bigger or specialsize (such as FG 6 ~ FG 9, F39, FG 41, FG1931, FG 1932, FG 1957, FG 1958, FG 2057, FG 2058)', '5pcs/pack', 17),
('DB-03B', 'Carbide Burs FG for clinic', 'jpg', 'FG Carbide burs 25mm long (Surgical)', '5pcs/pack', 17),
('DB-04', 'Carbide Burs RA for clinic', 'jpeg', '1. Dental Carbide Burs for RA shank 2. Made of Tungsten carbide 3. One-piece construction reduces vibration in operation and risk of separation. 4. Use for hard tissue such as tooth and bones, as well for grinding metal, plastic, porcelain and other hard materials.', '5pcs/pack', 25),
('DB-04B', 'Carbide Burs RA for clinic', 'jpeg', 'RA Carbide burs 26mm long(Surgical)', '5pcs/pack', 25),
('DB-05', 'Silver Zekrya Burs', 'jpeg', '', '6pcs/pack', 70),
('DB-05B', 'Gold Zekrya-Z Burs', 'jpeg', '', '6pcs/pack', 70),
('DB-06', 'Silver Endo Z Burs', 'jpeg', '', '6pcs/pack', 70),
('DB-07', 'Gold Endo-Z Burs', 'jpeg', '', '6pcs/pack', 70),
('DB-09', 'Silicone Polisher', 'jpeg', 'Prophylaxis polisher: 1.C Series: for polishing porcelain / Ceramic tooth enamel acrylic and nature teeth:White Coarse,Pink Medium, Light Blue Fine; 2. A Series: for polishing precious, Semi-precious metals and all kinds of Alloys: Black Coarse, Brown Medium, Light green Fine; 3. Aailabel for FG or RA shank', 'pcs', 2),
('DB-10', 'Diamond Polisher', 'jpeg', '', 'pcs', 8),
('DB-11', 'Composite finishing & polishing kit (6 white stones)', 'jpeg', '', '6pcs/pack', 28),
('DB-12', 'Silicone Polishers kit', 'jpeg', '(4 white stones+silicone polisher)', '6pcs/pack', 28),
('DB-13', 'Zironia/All-Ceramics Polishing RA kit 橡胶轮套装', 'jpeg', '', '6pcs/pack', 50),
('DB-14', 'Ceramic/ Natural Teeth Polishing Kit', 'jpeg', '4111', '12pcs/kit', 25),
('DB-15', 'Ceramic/ Natural Teeth Polishing Kit', 'jpeg', '4112', '12pcs/kit', 25),
('DB-16', 'Amalgam Alloy Polishing Kit', 'jpeg', '4113', '12pcs/kit', 25),
('DB-17', 'Amalgam Alloy Polishing Kit', 'jpeg', '4114', '12pcs/kit', 25),
('DB-18', 'Zironia/Z-max Diamond Polishing Kit', 'jpeg', '4115', '12pcs/kit', 70),
('PB-01', 'Prophy Brushes (bowl shape- Nylon )', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 40),
('PB-01B', 'Prophy Brushes (bowl shape-Horsehair)', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 62),
('PB-02', 'Prophy Brushes (bowl shape-colorful)', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 62),
('PB-03', 'Prophy Brushes Nylon ', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 45),
('PB-04', 'Prophy Brushes with color', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 45),
('PB-05', 'Prophy Brushes (plain shape-Nylon) ', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 35),
('PB-05B', 'Prophy Brushes (plain shape-Horsehare) ', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 35),
('PB-06', 'Prophy Brushes (plain shape) with color', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 35),
('PB-07', 'Prophy Brushes Small (plain shape) ', 'jpeg', 'Prophylaxis Brushes for finishing metal, porcelain and composite materials. Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 35),
('PC-07', 'Prophy Cup with 4 leaves', 'jpeg', 'Elastic Rubber Cup Shape Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 35),
('PC-08', 'Prophy Cup with 6 leaves', 'jpeg', 'Elastic Rubber Cup Shape Packing: 100pcs/pack MOQ: 20packs', '100pcs/pack', 35);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `numero` varchar(10) NOT NULL,
  `nom` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`numero`, `nom`, `description`) VALUES
('1', 'un prix acceptable', ''),
('2', 'une qualité meilleure', ''),
('3', 'un service a domicile', ''),
('4', 'une garantie incomparable', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
