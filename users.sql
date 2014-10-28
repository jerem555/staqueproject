-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Octobre 2014 à 17:21
-- Version du serveur :  5.5.36
-- Version de PHP :  5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `stack`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `dateRegistered` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  `job` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `externallink` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `username`, `password`, `salt`, `token`, `dateRegistered`, `dateModified`, `job`, `country`, `language`, `externallink`, `score`) VALUES
(16, '', '', 'thibault.pirot@wanadoo.fr', 'Natacha', '27e419c68afe960ad658422bb40cb74afbc4ffd99106e25b44c9b205e09b5ebf51ba1b235cbb54ed229a689b443bee43156b49dc8ba85e70d0a4ee0ceb2411ec', 'RsuZi4hLus46LM4M4G5ORNaL5hbG0B8x8iyJKiixlZQFNC4UVw', 'jiY1WmyHXCDdsx3Bdf60kUQNqkb0fDRzXLkxKETnI1RtnvPCzC', '2014-10-17 08:02:52', '2014-10-17 08:02:52', '', '', '', '', 0),
(17, '', '', 'jeremy.tobelem@gmail.com', 'Jeremy', '02d9ee18dae4dc42926275e975890b30d2c81c9672c3acbe11e32097973353ab4af4e4efaad0aaba468a7bd5e4920df83643144f6a4f83e60abc48cb3049b4d5', 'T4dRSQLSx7Q6N44J2g2ASVW0vFeYQQY3NpKE5f6lreXEB5UnbT', 'qci7VOcHvoFNOjUWEbg8fn0OLEIcshLKGVjhFruCUsv49NcSwV', '2014-10-17 08:38:43', '2014-10-17 08:38:43', '', '', '', '', 0),
(18, 'Nadeige', '', 'nadeige.pirot@gmail.com', 'Nadeige', 'c15ac6e4abd49d71da1d69bb27ffbc2684c297126b9ccc6c1d5fbd87bc3f00eaa0f78a8fdbba569abf5f0faddbeb74c62ff832741ac846dc7300767d5b9df277', 'm0nVzMx3sfmtirN13hXcEy2hm9zdOkmibe3bQfq10Ua4umrjUo', 'HRIBj5HonJHyULPNd7YST5nkmz1Yk2uf9DSzaRNSi7Emrr1GjL', '2014-10-17 08:39:50', '2014-10-23 10:03:08', 'Integratrice Web', 'France', 'Russe', '', 0),
(19, '', '', 'gsaissi@gmail.com', 'giogio', '4cbf0e8f43e52e782a091ff3ad9f8a4b30463c624dfdf27b256f865971084219690948acd9cda90c84cd9845a953c862523a0f13cad13e6e2c0b816a37289501', 'd4plmrTtMzTrMIN7qkNUNMzYoE9kMz8l8DdsriIUbQ8w6S3il1', 'eGm9ySCSxx2u0ntRfjbri7o52Cl9Aum8JnnIkFG1Q8bTG3dLSh', '2014-10-17 14:12:11', '2014-10-17 14:26:54', '', '', '', '', 0),
(20, 'sery@sery.fr', '', 'sery@sery.fr', 'Alain', '62d01f543724f112b864f747fb192205fac05c9f2d6bed8661f8933ebc36584e0d5141173eef963278a971c8791cc39db53f11048f1d303473aff6adea54394f', 'm3XvC5fDykhytUnGrmRLOjgwOuSajj7CuKX0KrF5rVzNP2FPlB', 'SAJGPtTTsdM5sA5l8aFpV42kq5w0OVtJqpRKBSGbylYwn4Hxep', '2014-10-19 13:09:58', '2014-10-19 13:09:58', 'Prof', 'France', 'Anglais', 'google', 0),
(21, 'sabine.bimbard@html.fr', '', 'sabine.bimbard@html.fr', 'Sabine', '1d18b1b09f43aa645734557cf0583a524962916bde83cbee246adfd9908d9a9085b1b4d6b5b4536d508c4b6e0eaecdb055eee4dc68e45249945483dd9fbec01e', 'CZIZpDuL1pMncvuNgNlGG4BX99BVKz7zP4LPaibRk13r8RtTsC', 'BPpVxv1rKlFTcr6VxTsOfhs6FSdps61IaKRfCLoMhsiQr6rjmD', '2014-10-19 14:48:50', '2014-10-19 14:48:50', 'secretaire', 'France', 'Français, Italien', 'Yahoo', 0),
(22, 'lucette@lucette.fr', '', 'lucette@lucette.fr', 'Lulue', 'eaa66a1d398bc94e5f803db0c9b2311f1ce8d8917f4d060627f84e2ddeac81c83251d9007494f61bf005f965f75bb798c991f6b8a86656f13b7a307f5b3e864e', 'DuBqZgL6O7VH05UuKrv1s5FsuHUqyaqVTAIymd24WJRApauY8H', 'vvOF5ETJxE5C4R4sAIh1x0lnQUsRMvJLmGQTYNBCelDH7R9dNT', '2014-10-19 14:50:55', '2014-10-19 14:50:55', '', '', '', '', 0),
(34, 'gigi@police.fr', '4276.jpg', 'gigi@police.fr', 'Gigi', '8fe61f20a5f63401a40d56124df575c0b3e11f4ec868a4e319bf0769e85e255468049545dd6407bc3261a76e2da222a0cbf955326c9c21ec20e4d4346a4c8e53', 'tBAh0KImhQsMkRAPDpcd08WXsX4iyxKYz2EW6B60H6G75tjWu2', 'QLep8ky5cuef0evhtz7Oc28M8glsvSgNQVqPBuKDFL8M66ARJF', '2014-10-20 16:14:06', '2014-10-20 16:14:06', 'Facteur', 'Italie', 'Russe', '', 0),
(35, 'grteyu@kzdad.fr', '54451e5b6e4f7.jpg', 'grteyu@kzdad.fr', 'gilles', 'e37070ab70a062b496d2bca6daf87b422d73f3aecf0ffe76b3d733bb169796b85612832d9149fe56f05a59497d24f8b6d14b150f95d8cc66fa3efe45e5022c17', 'fUf3soTKLkxuO2KLvVXwte6oOrrqhVgB5uIGOgg0krHrXF2Jr3', 'KSS4uDYorAVc0KnBdP17N6DxhHVOos8aeqfyDr75lQPTZDTExx', '2014-10-20 16:38:19', '2014-10-22 10:48:12', 'Webmaster', 'France', 'Anglais', '', 0),
(36, 'Elodie', '54475fbcbc60b.jpg', 'nadeige.couthon@orange.fr', 'Elo', 'e2653230707b9623afcac0c2b7759fbf2a8ff1f26d529650cadcbb57721df5a6409a6d5d2b86a75967e66716bdb1a9426d83bef95f929c9a72e3689a2e9ff679', 'zOogCW1dzN4fjQeM4vHBRTZKDLrJ01aIBxZI74e8nKFrIsW41w', 'aa73iJW8VpHkHk3AR52iXARvgbSZ6g9MritsZHKmAt31CAzBur', '2014-10-22 09:41:48', '2014-10-22 09:41:48', 'Webmaster', 'France', 'Russe', '', 0),
(37, 'Hyppolite', '', 'emailbidon@bidon.fr', 'Hyppo', '692a60ff1bb5a805d31f46d44a3b9125736d341dc48225e65998f98c1cb889d0a0ab21ce032338191631cecca928b7f11722e028898a5997c65cf01b8e6bc9f6', '5LwmUGxpMJrEr6VzKQGb1KUWxaRMYpTIRQ1AxWRRsgAO3GgbkL', 'Rqr5ZKvNugmOopENRbKB1Z2C4tRFyDxzKNXRB91uNiw3QHhGKj', '2014-10-22 10:29:20', '2014-10-22 10:45:03', 'Webmaster', 'Italie', '', '', 0),
(38, 'Beatrice', '5448ff7a05554.jpg', 'bea@bea.fr', 'Bea', 'b518b97ad176d40ab92ed850a9745be20b12c49d3443412acd911399ce7185645b200d6256e7d49a611a85218aa2bc327f50c1e1d7f37c893574bc81760ac877', 'Kkdn5GOAN5hh7ZcCBb86LjpH4jRE4tI29EGrbYVgPns8p9DA4v', 'Yj2pVTkpFS8ARSKmuoUYFTnUF2qJz6Hpq0qeYupFrDXemXLN5k', '2014-10-23 15:15:38', '2014-10-23 15:15:38', 'Laborantine', 'France', 'Anglais', '', 41),
(39, 'Julie', '', 'nade@gr.fr', 'julie', 'c629eb4bc2d3d4d3bffc7d623002fd5fe695190867fd37ccbe81f1c7bc36922f58388676301c55a3d6406b0e269c06310c2dc3b30d2a8ceb3775bfb6d8e6ec98', 'IUAV7VyH0qSXv62iIYK2exfrnBmCUfq3bqWPKPRrKD2vItNlya', 'WWQrSaDM0loifHectdsIJJYB3qkydC0rHqKrR2Tir1jOwoWUtw', '2014-10-23 17:19:05', '2014-10-23 17:19:05', '', 'France', '', '', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
