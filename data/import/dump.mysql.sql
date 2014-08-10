SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `pizzas`;

CREATE TABLE IF NOT EXISTS `pizzas` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `pizzas` (`id`, `timestamp`, `title`, `description`, `price`) VALUES
(1, '2014-08-10 13:13:57', 'Pizza Salami', 'Der Klassiker! Belegt mit leckerer Salami direkt aus Mailand.', 650),
(2, '2014-08-10 13:15:35', 'Pizza Deftig', 'Für Hungrige! Belegt mit allem, was bei Drei nicht auf den Bäumen ist.', 900),
(3, '2014-08-10 13:16:34', 'Pizza Vier Jahreszeiten', 'Für jeden was dabei! Belegt mit vier leckeren Belägen.', 800);

DROP TABLE IF EXISTS `pizza_toppings`;

CREATE TABLE IF NOT EXISTS `pizza_toppings` (
  `pizza` tinyint(3) unsigned NOT NULL,
  `topping` tinyint(3) unsigned NOT NULL,
  UNIQUE KEY `pizza_toppings` (`pizza`,`topping`),
  KEY `pizza` (`pizza`),
  KEY `topping` (`topping`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pizza_toppings` (`pizza`, `topping`) VALUES
(1, 1),
(1, 2),
(1, 9),
(2, 2),
(2, 4),
(2, 5),
(2, 7),
(2, 8),
(2, 9),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 6),
(3, 9);

DROP TABLE IF EXISTS `toppings`;

CREATE TABLE IF NOT EXISTS `toppings` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(64) NOT NULL,
  `price` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `toppings` (`id`, `timestamp`, `title`, `price`) VALUES
(1, '2014-08-10 13:11:10', 'Salami', 100),
(2, '2014-08-10 13:11:28', 'Käse', 100),
(3, '2014-08-10 13:11:36', 'Schinken', 150),
(4, '2014-08-10 13:11:48', 'Zwiebeln', 50),
(5, '2014-08-10 13:11:53', 'Oliven', 50),
(6, '2014-08-10 13:12:07', 'Champignons', 100),
(7, '2014-08-10 13:12:15', 'Hackfleisch', 200),
(8, '2014-08-10 13:12:24', 'Mais', 50),
(9, '2014-08-10 13:12:33', 'Tomatenpampe', 50);

ALTER TABLE `pizza_toppings`
  ADD CONSTRAINT `pizza_toppings_ibfk_1` FOREIGN KEY (`pizza`) REFERENCES `pizzas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `pizza_toppings_ibfk_2` FOREIGN KEY (`topping`) REFERENCES `toppings` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

SET FOREIGN_KEY_CHECKS=1;
