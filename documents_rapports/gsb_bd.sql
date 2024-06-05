-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 13 avr. 2024 à 02:21
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsb_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `_id_activite` int(11) NOT NULL,
  `nom_activite` varchar(50) DEFAULT NULL,
  `_description_activite` longtext DEFAULT NULL,
  `_lieu_activite` varchar(50) DEFAULT NULL,
  `_date_activite` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`_id_activite`, `nom_activite`, `_description_activite`, `_lieu_activite`, `_date_activite`) VALUES
(1, 'Atelier sur la gestion des médicaments', 'Un atelier interactif où les participants apprennent les meilleures pratiques pour prendre leurs médicaments correctement, comprendre les posologies et éviter les interactions médicamenteuses.', 'Pharmacie communautaire', '2024-04-15'),
(2, 'Marche santé', 'Une marche en groupe pour promouvoir un mode de vie actif et discuter des avantages de l\'exercice physique pour la santé, notamment en combinaison avec un traitement médicamenteux.', 'Parc local', '2024-04-22'),
(3, 'Conférence sur la nutrition et la santé', 'Une conférence animée par un nutritionniste sur l\'importance d\'une alimentation équilibrée pour optimiser l\'efficacité des médicaments et maintenir une bonne santé globale.', 'Centre communautaire', '2024-04-30'),
(4, 'Séance d\'information sur les vaccins', 'Une séance informative où les participants peuvent poser des questions sur les vaccins, discuter de leur importance pour la prévention des maladies et des mythes courants.', 'Pharmacie', '2024-05-05'),
(5, 'Cours de premiers secours', 'Un cours pratique enseignant les gestes de premiers secours en cas d\'urgence médicale, y compris l\'administration de médicaments comme l\'épinéphrine pour les réactions allergiques graves.', 'Salle de formation de la Croix-Rouge', '2024-05-12');

--
-- Déclencheurs `activites`
--
DELIMITER $$
CREATE TRIGGER `supprimer_inscriptions_apres_activite` AFTER DELETE ON `activites` FOR EACH ROW BEGIN
    DELETE FROM est_inscrit WHERE _id_activite = OLD._id_activite;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `effets_secondaires`
--

CREATE TABLE `effets_secondaires` (
  `_id_effet_secondaire` int(11) NOT NULL,
  `_nom_effet_secondaire` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `effets_secondaires`
--

INSERT INTO `effets_secondaires` (`_id_effet_secondaire`, `_nom_effet_secondaire`) VALUES
(1, 'Nausées'),
(2, 'Réactions allergiques'),
(3, 'Somnolence'),
(4, 'Vertiges'),
(5, 'Maux de tête'),
(6, 'Insomnie'),
(7, 'Sécheresse buccale'),
(8, 'Fatigue'),
(9, 'Anxiété');

-- --------------------------------------------------------

--
-- Structure de la table `effets_therapeutiques`
--

CREATE TABLE `effets_therapeutiques` (
  `_id_effet_therapeutique` int(11) NOT NULL,
  `_nom_effet_therapeutique` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `effets_therapeutiques`
--

INSERT INTO `effets_therapeutiques` (`_id_effet_therapeutique`, `_nom_effet_therapeutique`) VALUES
(1, 'Fébrifuge'),
(2, 'Antibactérien'),
(3, 'Antihistaminique'),
(4, 'Régulation de la pression artérielle'),
(5, 'Amélioration de la fonction cognitive'),
(6, 'Cicatrisation des plaies'),
(7, 'Stimulation de l\'appétit'),
(8, 'Analgésie'),
(9, 'Réduction de l\'inflammation'),
(10, 'Diminution de l\'anxiété'),
(11, 'Contrôle de la glycémie');

-- --------------------------------------------------------

--
-- Structure de la table `est_compatible`
--

CREATE TABLE `est_compatible` (
  `_id_medicament` int(11) NOT NULL,
  `_id_medicament_1` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `est_compatible`
--

INSERT INTO `est_compatible` (`_id_medicament`, `_id_medicament_1`) VALUES
(1, 2),
(1, 3),
(2, 3),
(3, 1),
(3, 2),
(3, 6),
(4, 1),
(4, 2),
(5, 2),
(6, 2),
(6, 7),
(7, 2),
(7, 3),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `est_inscrit`
--

CREATE TABLE `est_inscrit` (
  `_id_utilisateur` int(11) NOT NULL,
  `_id_activite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `est_inscrit`
--

INSERT INTO `est_inscrit` (`_id_utilisateur`, `_id_activite`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 3),
(76, 2),
(76, 4),
(77, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE `medicaments` (
  `_id_medicament` int(11) NOT NULL,
  `_nom` varchar(50) DEFAULT NULL,
  `_type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `medicaments`
--

INSERT INTO `medicaments` (`_id_medicament`, `_nom`, `_type`) VALUES
(1, 'Dexaphétamine', 'Stimulant'),
(2, 'Neuroxine', 'Sédatif'),
(3, 'Cérulopam', 'Antidépresseur'),
(4, 'Levotril', 'Anxiolytique'),
(5, 'Endorfinor', 'Analgésique'),
(6, 'Xylophine', 'Analgésique'),
(7, 'Psydronex', 'Psychotrope'),
(8, 'Triptadol', 'Antimigraineux');

-- --------------------------------------------------------

--
-- Structure de la table `procure`
--

CREATE TABLE `procure` (
  `_id_medicament` int(11) NOT NULL,
  `_id_effet_therapeutique` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `procure`
--

INSERT INTO `procure` (`_id_medicament`, `_id_effet_therapeutique`) VALUES
(1, 1),
(1, 9),
(2, 2),
(2, 7),
(3, 3),
(3, 5),
(4, 6),
(4, 10),
(5, 6),
(5, 8),
(6, 1),
(6, 6),
(7, 3),
(7, 6),
(8, 2),
(8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `provoque`
--

CREATE TABLE `provoque` (
  `_id_medicament` int(11) NOT NULL,
  `_id_effet_secondaire` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `provoque`
--

INSERT INTO `provoque` (`_id_medicament`, `_id_effet_secondaire`) VALUES
(1, 11),
(2, 5),
(2, 11),
(3, 6),
(3, 11),
(4, 1),
(4, 11),
(5, 9),
(5, 11),
(6, 10),
(6, 11),
(7, 2),
(7, 11),
(8, 6),
(8, 11);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `_id_utilisateur` int(11) NOT NULL,
  `prenom_utilisateur` varchar(50) DEFAULT NULL,
  `_adresse_mail` varchar(50) DEFAULT NULL,
  `_nom_utilisateur` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`_id_utilisateur`, `prenom_utilisateur`, `_adresse_mail`, `_nom_utilisateur`) VALUES
(1, 'Nephtalie', 'neph.desmornes@gmail.com', 'Desmornes'),
(2, 'Naelle', 'naelle.camaret@gmail.com', 'Camaret'),
(3, 'Safyra', 'safyra.assani@gmail.com', 'Assani'),
(77, 'Mohammed', 'mohammed.rhalem@gmail.com', 'Rhalem'),
(76, 'Manon', 'manon.gress@gmail.com', 'Gress');

--
-- Déclencheurs `utilisateurs`
--
DELIMITER $$
CREATE TRIGGER `verifier_utilisateur_avant_creation` BEFORE INSERT ON `utilisateurs` FOR EACH ROW BEGIN
    DECLARE utilisateur_existe INT;
    -- Vérifier si l'utilisateur existe déjà
    SELECT COUNT(*) INTO utilisateur_existe
    FROM utilisateurs
    WHERE _adresse_mail = NEW._adresse_mail;
    
    -- Si l'utilisateur existe déjà, annuler l'insertion
    IF utilisateur_existe > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cet utilisateur existe déjà.';
    END IF;
END
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`_id_activite`);

--
-- Index pour la table `effets_secondaires`
--
ALTER TABLE `effets_secondaires`
  ADD PRIMARY KEY (`_id_effet_secondaire`);

--
-- Index pour la table `effets_therapeutiques`
--
ALTER TABLE `effets_therapeutiques`
  ADD PRIMARY KEY (`_id_effet_therapeutique`);

--
-- Index pour la table `est_compatible`
--
ALTER TABLE `est_compatible`
  ADD PRIMARY KEY (`_id_medicament`,`_id_medicament_1`),
  ADD KEY `_id_medicament_1` (`_id_medicament_1`);

--
-- Index pour la table `est_inscrit`
--
ALTER TABLE `est_inscrit`
  ADD PRIMARY KEY (`_id_utilisateur`,`_id_activite`),
  ADD KEY `_id_activite` (`_id_activite`);

--
-- Index pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`_id_medicament`);

--
-- Index pour la table `procure`
--
ALTER TABLE `procure`
  ADD PRIMARY KEY (`_id_medicament`,`_id_effet_therapeutique`),
  ADD KEY `_id_effet_therapeutique` (`_id_effet_therapeutique`);

--
-- Index pour la table `provoque`
--
ALTER TABLE `provoque`
  ADD PRIMARY KEY (`_id_medicament`,`_id_effet_secondaire`),
  ADD KEY `_id_effet_secondaire` (`_id_effet_secondaire`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`_id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `effets_therapeutiques`
--
ALTER TABLE `effets_therapeutiques`
  MODIFY `_id_effet_therapeutique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `_id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
