DROP TABLE IF EXISTS administrateur;

--
-- Structure de la table administrateur
--

CREATE TABLE administrateur (
  id_administrateur int(11)      UNSIGNED NOT NULL AUTO_INCREMENT,
  identifiant       varchar(255)          NOT NULL UNIQUE,
  mdp               varchar(255)          NOT NULL,
  PRIMARY KEY (id_administrateur)
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8;

--
-- Contenu de la table administrateur
--

SET NAMES UTF8;

INSERT INTO administrateur (id_administrateur, identifiant, mdp) VALUES
( 1, 'p41admin', SHA2('12345678', 256));