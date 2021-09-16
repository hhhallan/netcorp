-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 sep. 2021 à 20:35
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reseaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `res_trames`
--

CREATE TABLE `res_trames` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'success',
  `version` int(2) NOT NULL,
  `protocol_name` varchar(10) NOT NULL,
  `flags` varchar(10) NOT NULL,
  `ttl` int(5) NOT NULL,
  `protocol_checksum` varchar(15) NOT NULL,
  `header_checksum` varchar(15) NOT NULL,
  `port_from` int(6) NOT NULL,
  `port_dest` int(6) NOT NULL,
  `ip_from` varchar(15) NOT NULL,
  `ip_dest` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `res_trames`
--

INSERT INTO `res_trames` (`id`, `identifiant`, `date`, `status`, `version`, `protocol_name`, `flags`, `ttl`, `protocol_checksum`, `header_checksum`, `port_from`, `port_dest`, `ip_from`, `ip_dest`) VALUES
(6430, '0xf30f', '2020-11-17 16:40:51', 'success', 4, 'UDP', '0x00', 128, 'disabled', 'unverified', 50046, 3481, '192.168.1.74', '52.112.255.37'),
(6431, '0xf30e', '2020-11-17 16:40:49', 'success', 4, 'UDP', '0x00', 128, 'disabled', 'unverified', 50046, 3481, '192.168.1.74', '52.112.255.37'),
(6432, '0xf30d', '2020-11-17 16:40:47', 'success', 4, 'UDP', '0x00', 128, 'disabled', 'unverified', 50046, 3481, '192.168.1.74', '52.112.255.37'),
(6433, '0xf30c', '2020-11-17 16:40:45', 'success', 4, 'UDP', '0x00', 128, 'disabled', 'unverified', 50046, 3481, '192.168.1.74', '52.112.255.37'),
(6434, '0x92ce', '2020-11-17 16:40:40', 'success', 4, 'TLSv1.2', '0x40', 128, 'disabled', 'unverified', 63440, 443, '192.168.1.74', '52.49.17.168'),
(6435, '0x92d0', '2020-11-17 16:40:35', 'success', 4, 'TLSv1.2', '0x40', 128, 'disabled', 'unverified', 63440, 443, '192.168.1.74', '52.49.17.168'),
(6436, '0xa132', '2020-11-17 16:40:30', 'success', 4, 'ICMP', '0x00', 128, 'good', '0x0000', 51062, 443, '192.168.1.74', '172.217.19.227'),
(6437, '0xa132', '2020-11-17 16:40:20', 'success', 4, 'ICMP', '0x00', 99, 'good', '0xc31d', 51062, 443, '172.217.19.227', '192.168.1.74'),
(6438, '0x9927', '2020-11-14 14:03:51', 'success', 4, 'TCP', '0x00', 121, 'disabled', 'unverified', 51062, 443, '216.58.168.12', '192.168.1.74'),
(6439, '0xf2f9', '2020-11-02 12:53:58', 'success', 4, 'ICMP', '0x00', 117, 'good', '0xc312', 51062, 443, '172.217.19.227', '192.168.1.74'),
(6440, '0xf2f9', '2020-11-02 12:53:56', 'success', 4, 'ICMP', '0x00', 128, 'good', '0x0000', 51062, 443, '192.168.1.74', '172.217.19.227'),
(6441, '0x9927', '2020-11-14 14:03:56', 'success', 4, 'TCP', '0x40', 128, 'disabled', 'unverified', 51062, 443, '192.168.1.74', '216.58.198.206'),
(6442, '0xd912', '2020-11-02 12:53:20', 'timeout', 4, 'ICMP', '0x00', 128, 'good', '0x0000', 51062, 443, '192.168.1.74', '172.217.19.227'),
(6443, '0xd914', '2020-11-02 12:53:18', 'timeout', 4, 'ICMP', '0x00', 128, 'good', '0x0020', 51062, 443, '192.168.1.74', '172.217.19.227'),
(6444, '0xa443', '2020-11-02 11:57:34', 'success', 4, 'ICMP', '0x00', 128, 'good', '0x0000', 51062, 443, '192.168.1.74', '172.217.19.227'),
(6445, '0xa443', '2020-11-02 11:57:33', 'success', 4, 'ICMP', '0x00', 117, 'good', '0xc312', 51062, 443, '172.217.19.227', '192.168.1.74');

-- --------------------------------------------------------

--
-- Structure de la table `res_users`
--

CREATE TABLE `res_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `token_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `res_users`
--

INSERT INTO `res_users` (`id`, `name`, `surname`, `email`, `password`, `token`, `created_at`, `token_at`) VALUES
(12, 'allan', 'leblond', 'allan@allan.com', '$2y$10$e5sg84r/y.kZ1f5tLbTljewfMKO9vQikM8GvLty1ykWS47K/cPVfW', '', '2021-01-14 16:05:08', '2021-01-15 15:48:56'),
(13, 'bonjour', 'bonjour', 'bonjour@bonjour.com', '$2y$10$yY103y8/novxUthb8JbSTuST.48VZQO6xZ5Nhadglc4DQJcM60hg2', NULL, '2021-01-14 16:06:25', NULL),
(14, 'safia', 'medjahed', 'safia@safia.com', '$2y$10$rwhF6gUOmfZuiwttTAEX3ujHBZFVpGgrxao1PDbAbTOQIKBEaNzFW', NULL, '2021-01-15 15:46:04', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `res_trames`
--
ALTER TABLE `res_trames`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `res_users`
--
ALTER TABLE `res_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `res_trames`
--
ALTER TABLE `res_trames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6446;

--
-- AUTO_INCREMENT pour la table `res_users`
--
ALTER TABLE `res_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
