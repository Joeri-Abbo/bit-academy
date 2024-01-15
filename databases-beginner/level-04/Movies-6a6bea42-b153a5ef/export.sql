-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: netland
-- Generation Time: 2023-06-05 21:25:46.9280
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `films`;
CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) NOT NULL,
  `duur` time NOT NULL,
  `datum_van_uitkomst` date DEFAULT NULL,
  `land_van_uitkomst` varchar(255) DEFAULT NULL,
  `omschrijving` text NOT NULL,
  `youtube_trailer_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `description` text NOT NULL,
  `has_won_awards` bit(1) NOT NULL,
  `seasons` int(11) NOT NULL,
  `country` enum('NL','UK') NOT NULL,
  `language` enum('NL','EN') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `films` (`id`, `titel`, `duur`, `datum_van_uitkomst`, `land_van_uitkomst`, `omschrijving`, `youtube_trailer_id`) VALUES
(1, 'Iron Man', '02:06:00', '2008-05-02', 'Verenigde Staten', 'Billionaire Tony Stark creates a powerful suit of armor to save himself and the world.', 'abcd123'),
(2, 'The Incredible Hulk', '01:52:00', '2008-06-13', 'Verenigde Staten', 'Bruce Banner must confront his inner demons while evading the pursuit of General Thunderbolt Ross.', 'efgh456'),
(3, 'Iron Man 2', '02:04:00', '2010-05-07', 'Verenigde Staten', 'Tony Stark faces new challenges as he fights against powerful enemies and deals with his own personal issues.', 'ijkl789'),
(4, 'Thor', '01:55:00', '2011-05-06', 'Verenigde Staten', 'The powerful Norse god Thor is banished to Earth and must learn humility to reclaim his powers and save his realm.', 'mnop123'),
(5, 'Captain America: The First Avenger', '02:04:00', '2011-07-22', 'Verenigde Staten', 'Steve Rogers volunteers for a secret experiment that transforms him into the super-soldier Captain America.', 'qrst456');

INSERT INTO `series` (`id`, `title`, `rating`, `description`, `has_won_awards`, `seasons`, `country`, `language`) VALUES
(1, 'The good place', 4.5, 'De serie gaat over een vrouw, Eleanor Shellstrop, die zich in het hiernamaals bevindt. Ze wordt verwelkomd door Michael, de \'architect\' van het utopische dorpje waar ze voor eeuwig gaat wonen. Er zijn twee delen in het hiernamaals, The Good Place (\'goede plek\') en The Bad Place (\'slechte plek\'); welke wordt bepaald door ethische punten voor elke handeling op aarde.', b'0', 4, 'UK', 'EN'),
(2, 'Game of Thrones', 5.0, 'Op het continent Westeros regeert koning Robert Baratheon al meer dan zeventien jaar lang over de Zeven Koninkrijken, na zijn opstand tegen koning Aerys II Targaryen \"De Krankzinnige\". Als zijn adviseur Jon Arryn wordt vermoord, vraagt hij zijn oude vriend Eddard Stark, de Heer van Winterfell en Landvoogd van het Noorden, om zijn plaats in te nemen. Eddard gaat met tegenzin akkoord, en trekt met zijn twee dochters, Sansa en Arya (Maisie Williams), naar de hoofdstad in het zuiden. Vlak voor hun vertrek wordt een van zijn jongste zonen, Bran Stark, uit een van de torens van Winterfell geduwd, na getuige te zijn geweest van de incestueuze affaire tussen koningin Cersei en haar tweelingbroer, Jaime Lannister.', b'1', 7, 'UK', 'EN'),
(3, 'Breaking Bad', 2.0, 'Walter White is in 2008 een overgekwalificeerde scheikundeleraar op een middelbare school in Albuquerque. Op het moment dat zijn vrouw onverwacht zwanger is van hun tweede kind, stort Walters wereld in. De dokter heeft vastgesteld dat hij terminaal ziek is. Walter heeft longkanker en lijkt niet lang meer te zullen leven. Om ervoor te zorgen dat zijn gezin na zijn dood niet in een financiële crisis belandt en tevens om zijn eigen behandelingen te betalen, besluit Walter over te schakelen op een leven als misdadiger. Met de hulp van Jesse Pinkman, een uitgevallen leerling die hij nog scheikunde gegeven heeft, maakt en verkoopt hij de drug crystal meth. Terwijl hij doorgaat met lesgeven, komt het belang van scheikunde in de moderne maatschappij prangend in zijn lessen naar voren. Zijn product is meer dan 99% zuiver en dit feit loopt als een rode draad door de hele serie heen.', b'1', 3, 'UK', 'EN'),
(4, 'Penoza', 3.2, 'Hoofdrolspeelster Carmen van Walraven (Monic Hendrickx) ontdekt dat haar man Frans (Thomas Acda) een veel belangrijker rol in de onderwereld speelt dan ze dacht. Ze dwingt hem dan ook ermee te stoppen. Net wanneer alles weer goed lijkt te gaan, wordt haar man voor de ogen van hun jongste zoon Boris (Stijn Taverne) geliquideerd. Carmen krijgt last van schuldeisers en bedreigingen. Ook justitie zit achter haar aan omdat die wil dat zij gaat getuigen tegen de compagnons van haar man.Carmen wil niet als beschermd getuige door het leven gaan en kiest voor een moeilijk alternatief: ze werkt zich naar de top van de georganiseerde misdaad, waar niemand nog aan haar of haar gezin durft te komen. In het vervolg daarop weet ze al snel niet meer wie ze moet vertrouwen, en worden de grenzen tussen goed en kwaad steeds onduidelijker.', b'0', 3, 'NL', 'NL'),
(5, 'De luizenmoeder', 4.8, 'Het verhaal speelt zich af op de fictieve basisschool De Klimop in Dokkum. De school heeft een zwaar jaar achter de rug, waarin enkele leraren en de conciërge ontslagen zijn. Het is nu aan de schoolleiding om in het nieuwe schooljaar een frisse start te maken. Centraal staan Hannah (Jennifer Hoffman), de moeder van Floor, de \'luizenmoeder\', en juf Ank (Ilse Warringa), de kordate onderwijzeres. Als moeder van een nieuwe leerling moet Hannah zich staande houden in een absurdistische wereld van hangouders, moedermaffia, schoolpleinregels, rigide verjaardagsprotocollen, verantwoorde traktaties, parkeerbeleid, appgroepjes, ouderparticipatie en ander leed. Ook worden de belevenissen van de andere ouders en de schoolleiding gevolgd. De ouders (moeders) worden geacht het onderwijs te ondersteunen als vrijwilligers en de onderste tree in de bijbehorende hiërarchie die tot de ouderraad loopt is die van luizenmoeder, de moeder die schoolkinderen met een luizenkam controleert op luizen in het haar en deze verwijdert.', b'1', 2, 'NL', 'NL'),
(6, 'My little pony', 1.0, 'De serie begint met een eenhoorn genaamd Twilight Sparkle, een student van Equestria\'s heerser, prinses Celestia. Nadat ze ziet hoe haar student zich alleen maar bezighoudt met boeken, stuurt prinses Celestia haar naar Ponyville met de opdracht een paar vrienden te maken. Twilight Sparkle, samen met haar assistent, een babydraak genaamd Spike, raakt bevriend met de pony\'s Pinkie Pie, Applejack, Rainbow Dash, Rarity en Fluttershy. Samen beleven ze avonturen binnen en buiten de stad en lossen ze diverse problemen op. De meeste afleveringen eindigen met Twilight Sparkle of iemand anders die een brief schrijft aan de prinses over wat ze die aflevering geleerd heeft over de magie van de vriendschap. Ook zit er in iedere aflevering een belangrijke les over vriendschap.', b'0', 25, 'UK', 'NL');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;