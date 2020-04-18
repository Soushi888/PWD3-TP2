DROP TABLE IF EXISTS auteur;

--
-- Structure de la table auteur
--

CREATE TABLE auteur (
  id_auteur int          UNSIGNED NOT NULL AUTO_INCREMENT,
  nom       varchar(255) NOT NULL,
  prenom    varchar(255) NOT NULL,
  PRIMARY KEY (id_auteur)
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8;

--
-- Contenu de la table auteur
--

SET NAMES UTF8;

INSERT INTO auteur VALUES( 1, 'Orwell', 'George');
INSERT INTO auteur VALUES( 2, 'Mitchell', 'Margaret');
INSERT INTO auteur VALUES( 3, 'Melville', 'Herman');
INSERT INTO auteur VALUES( 4, 'Dumas', 'Alexandre');
INSERT INTO auteur VALUES( 5, 'Marquez', 'Gabriel García');
INSERT INTO auteur VALUES( 6, 'Murakami', 'Haruki');
INSERT INTO auteur VALUES( 7, 'Camus', 'Albert');