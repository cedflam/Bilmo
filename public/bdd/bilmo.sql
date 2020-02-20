-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 20 fév. 2020 à 10:38
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bilmo`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `site`, `password`) VALUES
(1, 'Bousquet', 'tdurand@barre.com', 'http://www.aubry.com/temporibus-quibusdam-quod-odit-quo', '$2y$13$AqtHW2G.hz.kS9sttZmbcOVx9zEQB2VZyfiEFzy9suT7gEgsmxuRa'),
(2, 'Vincent', 'nathalie.colin@blanchet.fr', 'https://jacob.fr/ut-atque-qui-hic-hic.html', '$2y$13$soDwKQ8q86K0y0MYzObJx.32Qjg930mZ2voYMbFxM10ApRPhTH75a'),
(3, 'Goncalves', 'astrid91@boyer.net', 'http://www.dupuy.fr/voluptas-doloribus-qui-blanditiis-tempore-qui-iusto-distinctio', '$2y$13$NWis3CoWTtn6EbGx/A.9du6hIPQct10Z3aYp7OIuOwkxCgUr3PT2u'),
(4, 'Hoarau S.A.S.', 'jean.rocher@chauvin.com', 'http://marty.fr/omnis-quasi-assumenda-molestiae-a-ea-voluptatem-sint', '$2y$13$YINO1rLunaZkIIuqLMHEheqYmR4YyfkH/fyeoxEAIHZKTKcp129h.'),
(5, 'Thibault', 'aurelie.carlier@rolland.org', 'https://www.gomez.net/temporibus-modi-dolores-exercitationem-atque-dolores-rerum', '$2y$13$79qCA9hrWE6xdL11TaoAT.OUkYnSVAkuiw4Y5kUy9dCSzCFrOh75.'),
(6, 'Guibert', 'hcoste@leveque.fr', 'http://imbert.com/ut-molestiae-dolorum-ut-incidunt-rerum-delectus-quibusdam-sit', '$2y$13$BcFJGbF5EUOH9kin3y5j.eA05MIxRwfUTWXIBJcZu5ye//ekRqP.K'),
(7, 'Klein', 'christelle.leroux@briand.fr', 'https://www.lebreton.com/placeat-a-voluptatem-quis-repellendus-aut-voluptatum', '$2y$13$C0h7rV5yxNCCbJ/KJPeQYuV6rRDn39wGGa34mTLGA0EOcEteLlCFi'),
(8, 'Rolland Raymond SA', 'bweiss@lemaire.fr', 'http://www.robert.net/', '$2y$13$e/5HywPUY3HU0kl9lnPT4OneLzo9M2NzG0aQByhbUGYWC65vBNUHi'),
(9, 'Salmon Leroy SAS', 'hguillot@martins.com', 'http://www.verdier.net/recusandae-error-maiores-eius-voluptates-alias-at-sed.html', '$2y$13$GjDdXHwmsLjc.kv/lXw7s.OhZfX6HCMXj1iHTlcZ1ueVWGNkwRqom'),
(10, 'Devaux', 'rene57@caron.com', 'http://garcia.fr/excepturi-commodi-quo-ut-qui-consequatur-cupiditate.html', '$2y$13$Q4i5ZFS3/DA/52yg8OkuNORGq/w3cooJhVNFcsw.cEVOkGbvxsErK');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200211121841', '2020-02-20 10:37:12');

-- --------------------------------------------------------

--
-- Structure de la table `phone`
--

DROP TABLE IF EXISTS `phone`;
CREATE TABLE IF NOT EXISTS `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `phone`
--

INSERT INTO `phone` (`id`, `model`, `color`, `camera`, `screen`, `processor`, `memory`, `battery`) VALUES
(1, 'Huawei P30 Pro', 'red', '45 Mpx', '6.85 pouces', 'A9', '4Go', '4000 mAh'),
(2, 'Google OnePlus 7T', 'white', '50 Mpx', '6.25 pouces', 'Exynos 1000', '2Go', '3000 mAh'),
(3, 'Huawei P30 Pro', 'red', '50 Mpx', '6.25 pouces', 'Exynos 1000', '6Go', '3500 mAh'),
(4, 'Huawei P30 Pro', 'black', '45 Mpx', '6 pouces', 'Kirin 990', '6Go', '3000 mAh'),
(5, 'Google OnePlus 7T', 'white', '25 Mpx', '7 pouces', 'A9', '4Go', '3000 mAh'),
(6, 'Google OnePlus 7T', 'white', '25 Mpx', '6.85 pouces', 'Qualcomm SnapDragon', '4Go', '3000 mAh'),
(7, 'Apple Iphone 11', 'white', '25 Mpx', '6 pouces', 'Qualcomm SnapDragon', '2Go', '3500 mAh'),
(8, 'Samsung Galaxy note 10 Plus', 'blue', '45 Mpx', '6.85 pouces', 'A9', '6Go', '3000 mAh'),
(9, 'Apple Iphone 11', 'red', '50 Mpx', '6.85 pouces', 'Kirin 990', '2Go', '3500 mAh'),
(10, 'Samsung Galaxy note 10 Plus', 'blue', '25 Mpx', '6 pouces', 'A9', '4Go', '3500 mAh'),
(11, 'Huawei P30 Pro', 'white', '45 Mpx', '6 pouces', 'Exynos 1000', '2Go', '3500 mAh'),
(12, 'Apple Iphone 11', 'red', '45 Mpx', '6.85 pouces', 'Qualcomm SnapDragon', '2Go', '4000 mAh'),
(13, 'Apple Iphone 11', 'blue', '50 Mpx', '7 pouces', 'Kirin 990', '2Go', '3500 mAh'),
(14, 'Samsung Galaxy note 10 Plus', 'black', '50 Mpx', '6.85 pouces', 'Qualcomm SnapDragon', '4Go', '3000 mAh'),
(15, 'Google OnePlus 7T', 'black', '45 Mpx', '7 pouces', 'Kirin 990', '2Go', '3000 mAh'),
(16, 'Huawei P30 Pro', 'white', '45 Mpx', '7 pouces', 'Exynos 1000', '2Go', '4000 mAh'),
(17, 'Apple Iphone 11', 'blue', '35 Mpx', '6.25 pouces', 'Kirin 990', '6Go', '4000 mAh'),
(18, 'Samsung Galaxy note 10 Plus', 'red', '45 Mpx', '6 pouces', 'Exynos 1000', '6Go', '3000 mAh'),
(19, 'Huawei P30 Pro', 'blue', '35 Mpx', '7 pouces', 'A9', '4Go', '3500 mAh'),
(20, 'Google OnePlus 7T', 'white', '45 Mpx', '7 pouces', 'Qualcomm SnapDragon', '6Go', '3000 mAh');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D6499395C3F3` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `customer_id`, `first_name`, `last_name`, `email`, `registered_at`) VALUES
(1, 1, 'Marcel', 'Foucher', 'bpons@bernard.fr', '2011-04-13 21:48:34'),
(2, 1, 'Susan', 'Normand', 'carpentier.margaud@voila.fr', '1991-07-11 22:22:27'),
(3, 1, 'Charlotte', 'Da Silva', 'alexandre.laporte@martin.com', '1985-11-06 23:14:53'),
(4, 1, 'Alix', 'Texier', 'gpetit@bouygtel.fr', '1976-12-02 06:10:29'),
(5, 1, 'Thibaut', 'Marion', 'noel.leroy@free.fr', '1980-05-09 04:06:05'),
(6, 2, 'Mathilde', 'Picard', 'gguyot@live.com', '2003-02-03 18:11:13'),
(7, 2, 'Lucy', 'Salmon', 'jean85@roussel.fr', '2015-12-20 23:52:54'),
(8, 2, 'Guillaume', 'Legrand', 'henriette.deoliveira@laposte.net', '2006-08-30 17:57:09'),
(9, 2, 'Aurore', 'Rolland', 'daniel14@petitjean.org', '1975-07-08 05:51:13'),
(10, 2, 'Amélie', 'Camus', 'yallain@bazin.fr', '1976-05-08 08:12:24'),
(11, 3, 'Aimée', 'Diaz', 'ghebert@orange.fr', '1971-05-05 20:27:57'),
(12, 3, 'Gérard', 'Vallee', 'alves.alexandre@live.com', '1997-07-06 07:54:14'),
(13, 3, 'Louis', 'Jacob', 'patricia70@yahoo.fr', '1984-04-25 10:24:32'),
(14, 3, 'Margaud', 'Lesage', 'bertrand.martins@orange.fr', '1970-01-21 21:07:25'),
(15, 3, 'Catherine', 'Georges', 'jacques.martine@noos.fr', '1996-02-10 20:34:32'),
(16, 4, 'Isaac', 'Valentin', 'vidal.nicolas@royer.fr', '2019-03-26 13:29:36'),
(17, 4, 'Maurice', 'Guillot', 'rene.lesage@raymond.org', '1982-03-08 04:31:23'),
(18, 4, 'Matthieu', 'Guerin', 'pnguyen@garcia.com', '2000-02-17 04:59:33'),
(19, 4, 'Christine', 'Lemonnier', 'zacharie.joubert@riviere.fr', '1993-10-25 08:14:14'),
(20, 4, 'Adèle', 'Chevallier', 'legoff.alix@bertrand.org', '2003-09-01 17:00:18'),
(21, 5, 'Zacharie', 'Lecoq', 'bailly.suzanne@wanadoo.fr', '2005-08-08 10:08:52'),
(22, 5, 'Sébastien', 'Techer', 'schartier@tiscali.fr', '2016-09-23 13:43:30'),
(23, 5, 'Gilles', 'Barbe', 'bertrand.godard@yahoo.fr', '1973-03-30 03:21:19'),
(24, 5, 'Alexandria', 'Roussel', 'alfred65@morvan.fr', '1989-02-20 07:17:07'),
(25, 5, 'Sébastien', 'Leduc', 'jeanne61@grondin.com', '2007-09-20 12:12:17'),
(26, 6, 'Emmanuel', 'Roy', 'guyon.honore@meunier.fr', '2015-02-06 22:30:11'),
(27, 6, 'Yves', 'Lelievre', 'peltier.bernard@laposte.net', '1983-05-13 13:07:01'),
(28, 6, 'Margot', 'Renault', 'perrin.olivie@dbmail.com', '2012-08-04 12:55:57'),
(29, 6, 'Agnès', 'Pinto', 'uboutin@bouygtel.fr', '1999-06-23 10:35:18'),
(30, 6, 'Marcelle', 'Grenier', 'charles85@guillet.net', '1970-11-28 21:54:27'),
(31, 7, 'Charlotte', 'Renard', 'vbourdon@bouygtel.fr', '1988-03-20 21:11:45'),
(32, 7, 'Marc', 'Dos Santos', 'gdossantos@carpentier.com', '1987-03-12 06:26:00'),
(33, 7, 'Susanne', 'Guichard', 'manon.payet@labbe.fr', '2003-03-05 02:01:02'),
(34, 7, 'Théodore', 'Lefort', 'gilles78@noos.fr', '1999-02-04 21:52:04'),
(35, 7, 'Gilles', 'Rousseau', 'philippe.grondin@dbmail.com', '2008-01-25 03:07:13'),
(36, 8, 'Joséphine', 'Cordier', 'valentin.theophile@gautier.org', '2000-09-06 16:24:19'),
(37, 8, 'François', 'Vasseur', 'nathalie14@sfr.fr', '2005-05-13 03:09:40'),
(38, 8, 'Thomas', 'Prevost', 'jacob.louise@wanadoo.fr', '1990-11-26 13:45:05'),
(39, 8, 'Astrid', 'Prevost', 'isaac.bailly@gillet.fr', '1991-03-24 13:43:30'),
(40, 8, 'Rémy', 'Bonnin', 'maillet.pierre@dbmail.com', '2012-09-28 14:02:38'),
(41, 9, 'Susanne', 'Schmitt', 'yreynaud@klein.org', '2011-10-06 01:36:41'),
(42, 9, 'Henri', 'Dupuy', 'andre.etienne@gmail.com', '2010-08-08 22:10:07'),
(43, 9, 'Agathe', 'Grenier', 'gaillard.diane@mercier.com', '1997-06-13 03:31:55'),
(44, 9, 'Paulette', 'Merle', 'marianne.noel@club-internet.fr', '2016-08-01 07:19:02'),
(45, 9, 'Émilie', 'Weiss', 'uruiz@live.com', '1974-03-06 06:17:29'),
(46, 10, 'Gilles', 'Paris', 'eric.chauvin@alexandre.fr', '2014-04-27 19:50:43'),
(47, 10, 'Marguerite', 'Bernard', 'nrobin@gmail.com', '1984-04-06 17:17:47'),
(48, 10, 'Renée', 'Dupont', 'andree.hardy@free.fr', '2003-10-06 23:17:03'),
(49, 10, 'Nathalie', 'Parent', 'jeanne.lefort@sfr.fr', '1988-08-20 07:06:03'),
(50, 10, 'Isabelle', 'Aubert', 'lpierre@tele2.fr', '1978-03-06 06:14:26');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6499395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
