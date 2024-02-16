CREATE DATABASE garage_automobile;

USE garage_automobile;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `message` text NOT NULL
);


CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `jour` varchar(100) NOT NULL,
  `matinee` varchar(100) NOT NULL,
  `apresmidi` varchar(100) NOT NULL
) ;


INSERT INTO `horaire` (`id`, `jour`, `matinee`, `apresmidi`) VALUES
(1, 'lundi', '08:45 - 12:00', '14:00 - 18:00'),
(2, 'mardi', '08:45 - 12:00', '14:00 - 18:00'),
(3, 'mercredi', '08:45 - 12:00', '14:00 - 18:00'),
(4, 'jeudi', '08:45 - 12:00', '14:00 - 18:00'),
(5, 'vendredi', '08:45 - 12:00', '14:00 - 18:00'),
(6, 'samedi', '08:45 - 12:00', ''),
(7, 'dimanche', 'Ferme', '');


CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
);



CREATE TABLE `temoignage` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `note` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ;



CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ;


CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `caracteristiques` text NOT NULL,
  `moteur` varchar(50) NOT NULL,
  `annee` int(10) NOT NULL,
  `kilometrage` int(10) NOT NULL,
  `prix` int(10) NOT NULL
) ;

CREATE TABLE `voiture_images` (
  `id` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `lien` varchar(255) NOT NULL
) ;


ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `temoignage`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `voiture_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voiture_id` (`voiture_id`);

ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `temoignage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `voiture_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;




