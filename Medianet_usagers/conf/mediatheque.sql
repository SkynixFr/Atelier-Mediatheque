-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 12 Novembre 2019 à 14:28
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id` int(10) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  `indisponible` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id`, `ref`, `nom`, `description`, `disponible`, `indisponible`, `image`, `type`, `genre`) VALUES
(1, 'C-001', 'Hit de l\'été 2019', 'Tous les plus grands hit de l\'été.', 1, NULL, 'images/hitdelete2019.jpg', 'musique', 'cd'),
(2, 'C-002', 'On m\'appelle l\'ovni', 'Un des plus grands bruits de ce monde, le nouveau single de Jul.', 1, NULL, 'images/julovni.jpg', 'musique', 'cd'),
(3, 'C-003', 'Mon pays c\'est l\'amour', 'Dernier album de Johnny Hallyday', 1, NULL, 'images/johnnyhallyday.jpg', 'musique', 'cd'),
(4, 'C-004', 'J\'suis pas rassuré', 'Album 2003 de Zambla', 1, NULL, 'images/zambla.jpg', 'musique', 'cd'),
(5, 'C-005', 'Hit dance 2018', 'Tous les plus grands hit dance de 2018', 1, NULL, 'images/hitdance2018.jpg', 'musique', 'cd'),
(6, 'D-001', 'Les Bronzés 3', 'Film drôle français.', 1, NULL, 'images/bronzé3.jpg', 'humour', 'dvd'),
(7, 'D-002', 'Les Tuches 2', 'C\'est des belges qui mangent des frites.', 1, NULL, 'images/tuches2.jpg', 'humour', 'dvd'),
(8, 'D-003', '50 Nuances de Grey', 'Anastasia Steele accepte de remplacer sa colocataire malade, Katherine, pour interviewer l\'homme d\'affaires et milliardaire Christian Grey. Jeune P.D-G séduisant et mystérieux, ce dernier l\'intimide. À sa grande surprise, il vient la voir au magasin où elle travaille, prétextant des achats. Très attirée par lui, elle se verra rapidement devenir sa soumise. Pour cela un contrat va être rédigé pour permettre de définir les règles de ce jeu dangereux. Cependant, ce contrat devient souvent un sujet tabou et sera changé sans cesse. ', 1, NULL, 'images/50nuancesdegrey.jpg', 'romance', 'dvd'),
(9, 'D-004', 'Sharknado', 'Une tornade formée au large du Mexique entraîne l\'invasion de Los Angeles par des requins. Le propriétaire d\'une buvette de bord de mer, accompagné de deux amis et d\'une de ses serveuses, part dans l\'intérieur des terres à la recherche de son ex-femme, de sa fille et de son fils. Malgré les requins qui tombent du ciel, ils réussiront à sauver la ville et à reformer une famille unie. ', 1, NULL, 'images/sharknado.jpg', 'horreur', 'dvd'),
(10, 'D-005', 'Dragon ball evolution', 'Dans les temps anciens, la Terre faillit être détruite par des forces maléfiques. Pour s\'en prémunir, sept sages créèrent les boules de cristal : les Dragonballs. Décidées à prendre leur revanche, les forces du Mal sont désormais de retour, et un seul guerrier d\'exception est capable d\'empêcher le pire. Le jeune Sangoku va alors découvrir le jour de ses 18 ans que son destin est trés loin de ce qu\'il avait imaginé.\nAprès la mort accidentelle de son grand-père, il rencontre Maître Roshi, un expert en arts martiaux qui lui révèlera le secret et le pouvoir des Dragonballs. Sangoku se retrouve alors investi d¹une mission cruciale : retrouver toutes les boules de cristal avant son ennemi le plus cruel, Piccolo. Il se lancera dans une course effrénée aux côtés de Bulma, une scientifique brillante, Yamcha, un bandit du désert, et Chi Chi pour qui son coeur bat.\nPour Sangoku, cette quête des Dragonballs pourrait bien aussi être celle de son identité. ', 1, NULL, 'images/dragonballevolution.jpg', 'action', 'dvd'),
(11, 'L-001', 'Alien chantilly', 'Une poignée de perce-oreilles, deux doigts de cornichons martiens, une pincée de Pustulator, cinq ou six bouts de Sergent Déguelis Sulfurix, un anneau de Téniax, un morceau de \"Frankenstein et la betterave tueuse\", remuez, agitez, secouez, et laissez agir... vous êtes déjà en train de rire aux meilleurs gags du cinquième album de \"Kid Paddle\" : Alien Chantilly ! Servez bien frais !', 1, NULL, 'images/kidpaddle.jpg', 'aventure', 'livre'),
(12, 'L-002', 'Le Schtroumpfissime', 'Qui ne connaît les Schtroumpfs ? Ces gentils lutins bleus à gros bonnet blanc se ressemblent tous, même s\'ils ont chacun leur caractère, et parlent une curieuse langue dans laquelle la plupart des mots sont remplacés par \"schtroumpf\" ou \"schtroumpfer\". Sous l\'autorité débonnaire du grand Schtroumpf, ce sympathique petit peuple organise sa vie et lutte contre l\'abominable sorcier Gargamel, qui ne rêve que de les détruire.\nUne adorable fantaisie qui séduira les plus petits et distraira leurs aînés.', 1, NULL, 'images/schtroumpf.jpg', 'aventure', 'livre'),
(13, 'L-003', 'Guide de fornite', 'Avec ce livre vous pourrez faire des TOP 1 très facilement !', 1, NULL, 'images/guidefortnite.jpg', 'guide', 'livre'),
(14, 'L-004', 'Guide minecraft redstone', 'Avec ce livre vous pourrez créer des machines extraordinaire !', 1, NULL, 'images/guideminecraft.jpg', 'guide', 'livre'),
(15, 'L-005', 'Apprendre à coder pour les nuls', 'Comprends divers cours pour apprendre à coder efficacement.', 1, NULL, 'images/programmerpourlesnuls.jpg', 'guide', 'livre');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `usager` int(11) DEFAULT NULL,
  `document` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `usager`, `document`) VALUES
(1, 5, 1),
(2, 5, 15),
(3, 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `motscles`
--

CREATE TABLE `motscles` (
  `id` int(11) NOT NULL,
  `motscles` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `motscles`
--

INSERT INTO `motscles` (`id`, `motscles`) VALUES
(1, 'musique'),
(2, 'cd'),
(3, 'dvd'),
(6, 'livre'),
(8, 'aventure'),
(9, 'amour'),
(10, 'romance'),
(11, 'action'),
(12, 'guide'),
(13, 'hit de l\'été'),
(14, 'hit dance'),
(15, 'hit'),
(16, 'on m\'appelle l\'ovni'),
(18, 'jul'),
(19, 'mon pays c\'est l\'amour'),
(20, 'johnny hallyday'),
(21, 'j\'suis pas rassuré'),
(22, 'zambla'),
(23, 'les bronzés 3'),
(24, 'humour'),
(25, 'les tuches 2'),
(26, 'belge'),
(27, '50 nuances de Grey'),
(28, 'anastasia steele'),
(29, 'christian grey'),
(30, 'sharknado'),
(31, 'requin'),
(32, 'dragon ball evolution'),
(33, 'sangoku'),
(34, 'alien chantilly'),
(35, 'kid paddle'),
(36, 'le schtroumpfissime'),
(37, 'schtroumpfs'),
(38, 'guide de fornite'),
(39, 'fortnite'),
(40, 'guide de minecraft'),
(41, 'minecraft'),
(42, 'apprendre à coder pour les nuls'),
(43, 'coder'),
(44, 'horreur');

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE `recherche` (
  `id` int(10) NOT NULL,
  `reference` int(10) NOT NULL,
  `motcle` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recherche`
--

INSERT INTO `recherche` (`id`, `reference`, `motcle`) VALUES
(9, 1, 1),
(10, 1, 2),
(11, 1, 13),
(12, 1, 15),
(13, 2, 1),
(14, 2, 2),
(15, 2, 16),
(16, 2, 18),
(17, 3, 1),
(18, 3, 2),
(19, 3, 19),
(20, 3, 20),
(21, 4, 1),
(22, 4, 2),
(23, 4, 21),
(24, 4, 22),
(25, 5, 1),
(26, 5, 2),
(27, 5, 14),
(28, 5, 15),
(29, 6, 3),
(30, 6, 24),
(31, 6, 23),
(32, 7, 3),
(33, 7, 25),
(34, 7, 26),
(35, 8, 3),
(36, 8, 27),
(37, 8, 28),
(38, 8, 29),
(39, 9, 3),
(40, 8, 9),
(41, 8, 10),
(42, 9, 11),
(43, 9, 30),
(44, 9, 31),
(45, 10, 3),
(46, 10, 32),
(47, 10, 33),
(48, 11, 6),
(49, 11, 8),
(50, 11, 11),
(51, 11, 34),
(52, 11, 35),
(53, 12, 6),
(54, 12, 8),
(55, 12, 36),
(56, 12, 37),
(57, 13, 6),
(58, 13, 38),
(59, 13, 39),
(60, 13, 12),
(61, 14, 12),
(62, 14, 6),
(63, 14, 40),
(64, 14, 41),
(65, 15, 6),
(66, 15, 42),
(67, 15, 43),
(68, 15, 12),
(69, 7, 24),
(70, 9, 44),
(71, 10, 11);

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

CREATE TABLE `usagers` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `etat` tinyint(4) NOT NULL,
  `numadherent` varchar(20) DEFAULT NULL,
  `dateadhesion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usagers`
--

INSERT INTO `usagers` (`id`, `nom`, `prenom`, `motdepasse`, `datenaissance`, `email`, `age`, `adresse`, `telephone`, `etat`, `numadherent`, `dateadhesion`) VALUES
(1, 'Zinni', 'Arthur', '', '1998-02-15', 'arthurzinni@yahoo.fr', 21, '21, rue des tulipes 54000 Nancy', '0612457898', 0, NULL, NULL),
(2, 'Pallara', 'Hugo', '', '1998-12-05', 'pallarahugo@yahoo.fr', 21, '19, rue des roses 54000 Nancy', '0623568912', 0, NULL, NULL),
(3, 'Meligner', 'Ludovic', '', '1998-06-25', 'melignerludovic@yahoo.fr', 21, '56, rue des lilas 54000 Nancy', '0715936248', 0, NULL, NULL),
(4, 'Day', 'romain', '', '1998-03-18', 'dayromain@yahoo.fr', 21, '73, rue des pissenlit 54000 Nancy', '0745917283', 0, NULL, NULL),
(5, 'Yo', 'YIo', '$2y$10$mnU8BoLMnCV.oHEh2F4uMuVzuDrgr6.6kj2P4/Y6GbRKnrzQfJPLi', '2019-11-04', 'yo@gmail.com', 1, '25, rue des poulpes', '0606060606', 0, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document` (`document`),
  ADD KEY `usager` (`usager`);

--
-- Index pour la table `motscles`
--
ALTER TABLE `motscles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usagers`
--
ALTER TABLE `usagers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `motscles`
--
ALTER TABLE `motscles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `usagers`
--
ALTER TABLE `usagers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`document`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`usager`) REFERENCES `usagers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
