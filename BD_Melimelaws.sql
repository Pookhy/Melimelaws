--
-- Base de données: lesmelimelaws
--

-- --------------------------------------------------------

--
-- Structure de la table 'message'
--

CREATE TABLE IF NOT EXISTS message (
  id_Message int(11) NOT NULL auto_increment,
  date_Message date NOT NULL,
  contenu_Message varchar(200) NOT NULL,
  id_Personne int(11) NOT NULL,
  PRIMARY KEY  (id_Message),
  FOREIGN KEY(id_Personne) references personne(id_Personne)
) ENGINE InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table participe
--

CREATE TABLE IF NOT EXISTS participe (
  id_Participe int(11) NOT NULL auto_increment,
  id_Personne int(11) NOT NULL,
  id_Video int(11) NOT NULL,
  PRIMARY KEY  (id_Participe),
  FOREIGN KEY(id_Personne) references personne(id_Personne),
  FOREIGN KEY(id_Video) references video(id_Video)
) ENGINE InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table personne
--

CREATE TABLE IF NOT EXISTS personne (
  id_Personne int(11) NOT NULL auto_increment,
  nom_Personne varchar(255) NOT NULL,
  prenom_Personne varchar(255) NOT NULL,
  bio_Personne text,
  photo_Personne varchar(255) NULL,
  id_Connexion varchar(10) NULL,
  mdp_Connexion varchar(15) NULL,
  PRIMARY KEY  (id_Personne)
) ENGINE InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table saison
--

CREATE TABLE IF NOT EXISTS saison (
  id_Saison int(11) NOT NULL auto_increment,
  num_Saison int(11) default NOT NULL,
  photo_Saison varchar(255) NULL,
  PRIMARY KEY  (id_Saison)
) ENGINE InnoDB;


-- --------------------------------------------------------

--
-- Structure de la table video
--

CREATE TABLE IF NOT EXISTS video (
  id_Video int(11) NOT NULL auto_increment,
  num_Video int(11) default NULL,
  titre_Video varchar(255) NOT NULL,
  description_Video text NOT NULL,
  adresse_Video varchar(255) NOT NULL,
  type_Video enum('episode','bonus') NOT NULL,
  accueil_Video tinyint(1) NULL,
  id_Saison int(11) NOT NULL,
  PRIMARY KEY  (id_Video),
  FOREIGN KEY(id_Saison) references saison(id_Saison)
) ENGINE InnoDB;

