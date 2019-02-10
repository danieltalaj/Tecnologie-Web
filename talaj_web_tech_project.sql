-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talaj_web_tech_project`
--
CREATE DATABASE IF NOT EXISTS `talaj_web_tech_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `talaj_web_tech_project`;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `skiresorts`
--

DROP TABLE IF EXISTS `skiresorts`;
CREATE TABLE IF NOT EXISTS `skiresorts` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `Elevation_Difference` int(4) NOT NULL,
  `Elevation_MIN` int(4) NOT NULL,
  `Elevation_MAX` int(4) NOT NULL,
  `Total_slopes_km` int(3) NOT NULL,
  `Total_lift_count` int(3) NOT NULL,
  `Price_daily_skipass` decimal(10,2) NOT NULL,
  KEY `ID` (`ID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `skiresorts`
--

INSERT INTO `skiresorts` (`ID`, `Name`, `Region`, `Elevation_Difference`, `Elevation_MIN`, `Elevation_MAX`, `Total_slopes_km`, `Total_lift_count`, `Price_daily_skipass`) VALUES
(1, 'Via Lattea – Sestriere/​Sauze d’Oulx/​San Sicario/​Claviere/​Montgenèvre', 'Piedmont (Piemonte)', 1377, 1372, 2749, 400, 63, '49.00'),
(2, 'Cervinia – ​Breuil-Cervinia/​Valtournenche/Zermatt – Cervino (Matterhorn)', 'Aosta Valley (Valle d\'Aosta)', 2337, 1562, 3899, 322, 53, '82.00'),
(3, 'Val Gardena (Gröden)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1282, 1236, 2518, 175, 79, '56.00'),
(4, 'Espace San Bernardo – La Rosière/​La Thuile', 'Aosta Valley (Valle d\'Aosta)', 1624, 1176, 2800, 152, 34, '45.50'),
(5, 'Madonna di Campiglio/​Pinzolo/​Folgàrida/​Marilleva', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1652, 852, 2504, 150, 58, '56.00'),
(6, 'Monterosa Ski – Alagna Valsesia/​Gressoney-La-Trinité/​Champoluc/​Frachey', 'Aosta Valley (Valle d\'Aosta)/Piedmont (Piemonte)', 2063, 1212, 3275, 132, 20, '48.00'),
(7, 'Alta Badia', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1226, 1324, 2550, 130, 53, '56.00'),
(8, 'Cortina d\'Ampezzo', 'Veneto', 1700, 1224, 2924, 120, 35, '50.00'),
(9, 'Kronplatz (Plan de Corones)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1302, 973, 2275, 119, 32, '57.00'),
(10, 'Livigno', 'Lombardy (Lombardia)', 982, 1816, 2798, 115, 32, '43.00'),
(11, 'Mondolè Ski – Artesina/​Frabosa Soprana/​Prato Nevoso', 'Piedmont (Piemonte)', 1278, 807, 2085, 105, 24, '34.00'),
(12, 'Ponte di Legno/​Tonale/​Presena Glacier/​Temù (Pontedilegno-Tonale)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1879, 1121, 3000, 100, 28, '44.00'),
(13, 'Bardonecchia', 'Piedmont (Piemonte)', 1382, 1312, 2694, 100, 21, '37.00'),
(14, 'Civetta – Alleghe/​Selva di Cadore/​Palafavera/​Zoldo', 'Veneto', 1100, 1000, 2100, 80, 22, '50.00'),
(15, '3 Zinnen Dolomites – Helm/​Stiergarten/​Rotwand/​Kreuzbergpass', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1070, 1130, 2200, 75, 20, '55.00'),
(16, 'Folgaria/​Fiorentini', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 650, 1200, 1850, 74, 22, '41.00'),
(17, 'Belpiano (Schöneben)/​Malga San Valentino (Haideralm)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 930, 1460, 2390, 65, 10, '43.50'),
(18, 'Alpe di Siusi (Seiser Alm)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 551, 1669, 2220, 63, 21, '56.00'),
(19, 'Arabba', 'Veneto', 876, 1602, 2478, 63, 21, '53.00'),
(20, 'San Martino di Castrozza', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 953, 1404, 2357, 60, 21, '47.00'),
(21, 'Val di Fassa – Belvedere/​Col Rodella/​Ciampac/​Buffaure – Canazei/​Campitello/​Alba/​Pozza di Fassa', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1165, 1320, 2485, 55, 36, '53.00'),
(22, 'Gitschberg Jochtal', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1203, 1307, 2510, 55, 15, '48.00'),
(23, 'Passo San Pellegrino/​Falcade', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1323, 1190, 2513, 54, 15, '50.00'),
(24, 'Riserva Bianca – Limone Piemonte', 'Piedmont (Piemonte)', 1014, 1046, 2060, 52, 14, '35.00'),
(25, 'Pila', 'Aosta Valley (Valle d\'Aosta)', 1200, 1540, 2740, 50, 12, '45.00'),
(26, 'Bormio – Cima Bianca', 'Lombardy (Lombardia)', 1787, 1225, 3012, 50, 11, '43.00'),
(27, 'Aprica', 'Lombardy (Lombardia)', 1108, 1162, 2270, 50, 11, '40.00'),
(29, 'Pragelato', 'Piedmont (Piemonte)', 1365, 1335, 2700, 50, 5, '15.00'),
(30, 'Valchiavenna – Madesimo/​Campodolcino', 'Lombardy (Lombardia)', 1398, 1550, 2948, 48, 12, '41.00'),
(31, 'Latemar – Obereggen/​Pampeago/​Predazzo', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 848, 1540, 2388, 48, 18, '50.00'),
(32, 'Sulden am Ortler (Solda all\'Ortles)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1350, 1900, 3250, 44, 10, '43.50'),
(33, 'Plose – Brixen (Bressanone)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1445, 1060, 2505, 43, 7, '48.00'),
(34, 'Courmayeur – Chécrouit/​Val Veny', 'Aosta Valley (Valle d\'Aosta)', 1550, 1205, 2755, 42, 17, '49.00'),
(35, 'Carezza Ski', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1137, 1200, 2337, 40, 14, '46.00'),
(36, 'Meran 2000', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 741, 1609, 2350, 40, 7, '42.50'),
(37, 'Speikboden – Sand in Taufers (Campo Tures)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1450, 950, 2400, 38, 8, '46.00'),
(38, 'Paganella – Andalo', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1095, 1030, 2125, 33, 14, '43.00'),
(39, 'Klausberg – Steinhaus (Cadipietra)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1460, 1050, 2510, 33, 8, '46.00'),
(40, 'Val Senales Glacier (Schnalstaler Gletscher)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1201, 2011, 3212, 30, 11, '45.50'),
(41, 'Macugnaga', 'Piedmont (Piemonte)', 1673, 1327, 3000, 30, 7, '27.00'),
(42, 'Alpe Lusia – Moena/​Bellamonte', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 973, 1367, 2340, 28, 8, '50.00'),
(43, 'Racines-Giovo (Ratschings-Jaufen)/​Malga Calice (Kalcheralm)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 800, 1300, 2100, 25, 8, '47.00'),
(44, 'Santa Caterina Valfurva', 'Lombardy (Lombardia)', 1158, 1722, 2880, 21, 8, '43.00'),
(45, 'Lagazuói/​5 Torri – Passo Giau/​Passo Falzàrego', 'Veneto', 920, 1822, 2742, 21, 7, '50.00'),
(46, 'Rosskopf (Monte Cavallo) – Sterzing (Vipiteno)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1172, 948, 2120, 20, 3, '42.00'),
(47, 'Pejo', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 1600, 1400, 3000, 20, 7, '37.00'),
(48, 'Torgnon', 'Aosta Valley (Valle d\'Aosta)', 731, 1515, 2246, 20, 5, '29.00'),
(49, 'Marmolada – Malga Ciapela', 'Veneto', 1815, 1450, 3265, 20, 6, '53.00'),
(50, 'Crissolo – Monviso', 'Piedmont (Piemonte)', 1067, 1333, 2400, 20, 3, '21.00'),
(51, 'Argentera', 'Piedmont (Piemonte)', 850, 1630, 2480, 20, 2, '22.00'),
(52, 'Pfelders (Moos in Passeier)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 901, 1601, 2502, 18, 4, '37.00'),
(53, 'Watles – Malles Venosta (Mals)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 750, 1750, 2500, 18, 3, '43.50'),
(54, 'Passo Rolle (Rolle Pass)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 343, 1873, 2216, 15, 5, '47.00'),
(55, 'Champorcher', 'Aosta Valley (Valle d\'Aosta)', 1060, 1440, 2500, 14, 5, '32.00'),
(56, 'Rittner Horn (Corno del Renon) – Ritten (Renon)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 732, 1538, 2270, 14, 3, '28.00'),
(57, 'Passo dello Stelvio (Stelvio Pass)', 'Lombardy (Lombardia', 690, 2760, 3450, 9, 6, '45.00'),
(58, 'Prali', 'Piedmont (Piemonte)', 1060, 1450, 2510, 9, 5, '25.00'),
(59, 'Baranci (Haunold) – San Candido (Innichen)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 435, 1175, 1610, 8, 5, '55.00'),
(60, 'Furkel – Trafoi (Stilfs)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 830, 1570, 2400, 8, 3, '43.50'),
(61, 'Chamois', 'Aosta Valley (Valle d\'Aosta)', 686, 1812, 2498, 8, 5, '26.00'),
(62, 'Auronzo di Cadore – Monte Agudo', 'Veneto', 669, 865, 1534, 7, 4, '36.00'),
(63, 'Jochgrimm (Passo Oclini)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 400, 1850, 2250, 7, 4, '18.00'),
(64, 'Passo Fedaia – Pian dei Fiacconi (Marmolada)', 'Trentino-South Tyrol (Trentino-Alto Adige/Südtirol)', 570, 2080, 2650, 6, 1, '53.00'),
(65, 'Misurina – Passo Tre Croci', 'Veneto', 359, 1761, 2120, 5, 2, '35.00');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Password` varchar(60) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users_skiresorts`
--

DROP TABLE IF EXISTS `users_skiresorts`;
CREATE TABLE IF NOT EXISTS `users_skiresorts` (
  `ID_USER` int(11) NOT NULL,
  `ID_SKIRESORT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
