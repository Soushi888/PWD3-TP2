DROP TABLE IF EXISTS livre;

--
-- Structure de la table livre
--

CREATE TABLE livre (
  id_livre  int          UNSIGNED NOT NULL AUTO_INCREMENT,
  titre     varchar(255)          NOT NULL,
  auteur    varchar(255)          NOT NULL,
  annee     smallint     UNSIGNED NOT NULL,
  PRIMARY KEY (id_livre)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

--
-- Contenu de la table livre
--

SET NAMES UTF8;

INSERT INTO livre (id_livre, titre, auteur, annee) VALUES
(1, '1984'                     , 'Orwell George'         , 1948),
(2, 'Autant en emporte le vent', 'Mitchell Margaret'     , 1936),
(3, 'Moby Dick'                , 'Melville Herman'       , 1851),
(4, 'Les 3 mousquetaires'      , 'Dumas Alexandre'       , 1844),
(5, '100 ans de solitude'      , 'Marquez Gabriel García', 1967),
(6, 'Kafka sur le rivage'      , 'Murakami Haruki'       , 2002),
(7, 'L\'étranger'              , 'Camus Albert'          , 1942),
(8, 'La peste'                 , 'Camus Albert'          , 1947);