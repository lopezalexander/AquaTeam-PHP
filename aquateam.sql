-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2013 at 02:49 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aquateam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `communiques`
--

CREATE TABLE IF NOT EXISTS `communiques` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(150) NOT NULL,
  `Dates` varchar(100) NOT NULL,
  `Body` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `communiques`
--

INSERT INTO `communiques` (`ID`, `Title`, `Author`, `Dates`, `Body`) VALUES
(11, 'Nouvelle Saison de Synchro', 'Cindy Mcnicoll', '11/06/2013 -- 11:33:49', '<div><ul><li>Porte ouverte le Mardi 3 Septembre de 18:00 à 20:00</li><li>Inscriptions, prises de photos des anciennes nageuses, Mercredi le 4 Septembre de 18:15 à 19:15</li><li>Début de la nouvelle saison de synchro, Mercredi le 4 Septembre</li><li>Gala de fin d''année, Dimanche le 25 Mai 2014</li></ul></div>'),
(12, 'Entraîneuse', 'Cindy Mcnicoll', '11/06/2013 -- 11:34:22', '<div><br></div><div>Nous tenons à nous excuser car nous avons oublié de remercier Audrey Carrière, qui a entraînée le duo Intermédiaire 16-20 ans.</div><div><br></div><div>Toute nos excuses Audrey et merci de ta collaboration :)</div>'),
(13, 'Mot de la présidente', 'Cindy Mcnicoll', '11/06/2013 -- 11:39:25', '<div>Bonjour à tous,</div><div><br></div><div>Tout d’abord, je tiens à féliciter les nageuses pour vos superbes performances lors du Gala 2013. Bravo, &nbsp;vous avez bien travaillé tout au long de la saison et cette démonstration en est le point culminant. &nbsp;Les photos seront disponibles d''ici deux semaines sur le site d''Aqua-rythme (voir adresse en bas de page). Le DVD sera remis aux nageuses au début de la prochaine saison. Cette année, le club a fêté 30 ans d’existence et a eu 87 nageuses. Une année record! &nbsp;Nous avons participé à 6 compétitions, dont les Jeux du Québec. &nbsp;</div><div><br></div><div>Tout ça n’aurait pas été possible sans la participation active des membres du CA qui ont contribué a organisé le bon déroulement du club tout au long de l’année. &nbsp;Sans parents bénévoles, le club ne pourrait pas continuer à progresser.</div><div><br></div><div><div><ul><li>Lucie Mainville, présidente. 6 ans au CA</li><li>Benoit Fortin vice président. &nbsp;4 ans au CA</li><li>Louise Vallée, comptable. 5 ans au CA</li><li>Céline Leblanc, secrétaire et organisation du Gala &nbsp;2 ans au CA</li><li>Linh Wuong, un an au CA</li><li>Brenda Allard, un an au CA</li><li>Catherine St-Roch, un an au CA</li></ul><div><div>&nbsp;Avis important : &nbsp;L’an prochain Louise, Benoit, Céline et Lucie ne se représenteront pas comme membre du CA. Il sera donc important d’avoir de nouveaux parents pour reprendre le flambeau et faire en sorte que le club Aqua-rythme vive encore de nombreuses années de succès.</div><div><br></div><div>&nbsp;Merci énormément à nos entraîneures qui ont contribuées &nbsp;à faire que nos filles se développent sainement dans se sport que nous aimons toutes et tous.</div><div><br></div><div>Pendant la saison 2012-2013, les entraîneures étaient :</div></div></div></div><div><br></div><div><div><ul><li>&nbsp;Véronique Lemay entraineur chef, &nbsp;entraîneure des récréatives une heure et de l’équipe Inter 13-15 avec Katherine Langlois.</li><li>Marilyne Lemay récréative &nbsp;avec Julie Caron dimanche soir. Lundi pré-novice et mercredi avec Laurie Delisle.</li><li>Caroline Lemay avec Jade Naegeli novice U10.</li><li>Karoline Traversy entraineure combo Inter et novice 12- avec Marie-Pier &nbsp;Morin Lachance.</li><li>Anne Bergeron développement U13-15</li><li>&nbsp;Élyse Pomerleau développement 13-15</li><li>Laura Coté Intermédiaires 16-22.</li></ul><div><div>Pour la saison 2013-2014, nous aurons deux entraîneures- chef : &nbsp;Karoline Traversy et Laura Côté.</div><div><br></div><div>&nbsp;Merci aussi aux bénévoles :</div></div></div></div><div><div><ul><li>&nbsp;Nos juges : Lyne Bélanger, Cindy Mcnicoll (juge et site Internet) et &nbsp;Brigitte Bousquet.</li><li>Photos : Denis Rheault et Jean-Philippe Ménard photos et &nbsp;site internet.</li><li>Caméraman et DVD du Gala : Éric Lapointe</li><li>&nbsp;Programme du Gala : Annie Perreault (Merle blanc)</li><li>Album souvenir : &nbsp;Éloïse Lapointe et Ève Chouinar</li></ul></div></div><div><br></div><div><div>Passez un bel été et revenez-nous en pleine forme en septembre. --&nbsp;</div><div><br></div><div>Lucie Mainville</div><div>présidente du club Aqua-rythme</div></div>'),
(14, 'GOOGLE +', 'Cindy Mcnicoll', '11/06/2013 -- 11:40:27', '<div>Bonjour à tous les parents et toutes les nageuses. &nbsp;Un site google +, a été créer afin de pouvoir y mettre plus facilement les photos et les vidéos. &nbsp;Des posts peuvent y être mis, des liens, des photos, des vidéos, etc. &nbsp;Je vais aussi y mettre des renseignements utiles au fil de la saison. &nbsp;N''hésitez pas à vous inscrire en cliquant sur le bouton :&nbsp;</div><div>Et à partagez la pages. &nbsp;Et surtout ne vous gênez pas pour y inscrire des messages, ils nous fera plaisir de le lire&nbsp;</div><div><br></div><div>https://plus.google.com/u/0/b/102553168434824310674/102553168434824310674/posts/p/pub</div>'),
(15, 'Résultat Championnat Québecois 2012-2013', 'Cindy Mcnicoll', '11/06/2013 -- 11:43:05', '<div>Félicitation à toutes les nageuses du Club Aqua-Rythme pour leur belle performance au Championnat québecois ce tenant les 18-19-20 mai 2013 !</div><div><br></div><div>Au niveau développement 13-15, l''équipe entraînée par Élyse Pomerleau</div><div><br></div><div><img src="http://i.imgur.com/KkfWXzh.jpg" width="319"></div><div><br></div><div><div>Composée de Clara Duchesne, Alice Raymond, Megann Mcnicoll, Marilou Picard, Sabrina Gallant Monette et Sarah Lalancette,&nbsp;</div><div>elles ont terminée au 26e rang. &nbsp;</div><div><br></div><div>Aussi, dans la même catégorie, l''équipe entraînée par Anne Bergeron</div></div><div><br></div><div><img src="http://i.imgur.com/N8jnj1t.jpg" width="320"></div><div><br></div><div><div>Composée de Catherine Chouinard, Béatrice Lambert, Audrey L''Espérence, Élyse Beaugrand-Patry, Marion L''Espérence, AnnLaura Bourdages et Isabella Robert, ont terminée en 10e position. &nbsp;</div><div><br></div><div>Dans la catégorie Combo intermédiaire 16-22 ans, entraînée par Karoline Traversy.&nbsp;</div></div><div><br></div><div><img src="http://i.imgur.com/tY3lMLw.jpg" width="319"></div><div><br></div><div><div>Composée de : Julie Caron, Alexandra Reault, Marie-Pier Morin-Lachance, Jade Naegeli, Claudy Dechesnes, Anne-Sophie Emond, Laurie Delisle et Élyse Pomerleau. &nbsp; Cette magnifique routine leur a valu la 2e place au Championnat québecois</div><div><br></div><div>Toutes nos félicitations aussi à l''équipe intermédiaire 13-15 ans, entraînée par Véronique Lemay. &nbsp;L''équipe est composée de : Ève Chouinard, Megan Fortin, Camille Lapointe, Éloïse Lapointe, Alexanne Phaneuf-Michaud, Sophie-Anne Rheault. &nbsp;Leur routine, est arrivée au 10e rang lors du Championnat québecois.</div><div><br></div><div>Enfin, félicitation au combo intermédiaire 13-15 ans, entraînée par Véronique Lemay. &nbsp;L''équipe est composée de : Jessica Bécotte, Blanche Casabon-Ménard, Ève Chouinard, Michelle Colette, Élo&#297;se Lapointe et Alexanne Phaneuf-Michaud, Camille Lapointe, Megan Fortin, Sophie-Anne Rheault. &nbsp;Leur routine, est arrivée au 4e rang lors du Championnat québecois.</div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Description` text NOT NULL,
  `Source` text NOT NULL,
  `Url` text NOT NULL,
  `Url2` text NOT NULL,
  `Dates` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`ID`, `Title`, `Description`, `Source`, `Url`, `Url2`, `Dates`) VALUES
(16, 'Finales Régionale des Jeux du Québec Rive-Sud 2013', 'Le Club Aqua-Rythme récolte des médailles : ', 'Journal Les Versants du Mont Saint-Bruno', 'http://www.versants.com/Sports/Sports-aquatiques/2013-02-26/article-3184683/Le-Club-Aqua-Rythme-recolte-les-medailles/1', '', '2013-02-26'),
(17, 'Trois compétitions, 17 podiums et les succès se poursuivent ', 'Le Club Aqua-Rythme récolte des médailles en routines d''équipes :', 'Journal Les Versants du Mont Saint-Bruno', 'http://www.versants.com/Sports/Sports-aquatiques/2012-01-24/article-2872643/Aqua-Rythme-accumule-les-medailles-en-routines-d%26rsquoequipes/1', '', '2012-03-24'),
(18, 'Finales Régionale des Jeux du Québec Rive-Sud  2012', 'Le Club Aqua-Rythme récolte des médailles en routines d''équipes :', 'Journal Les Versants du Mont Saint-Bruno', 'http://www.versants.com/Sports/Sports-aquatiques/2012-01-24/article-2872643/Aqua-Rythme-accumule-les-medailles-en-routines-d%26rsquoequipes/1', '', '2012-01-24'),
(19, 'Deux entraîneuses du Club Aqua-Rythme en route vers les JO de Londres :', '', 'Journal Les Versants du Mont Saint-Bruno 11 Mai 2012 et 12 Juin 2012', 'http://www.hebdosregionaux.ca/monteregie/2012/05/11/deux-entraineuses-du-club-aqua-rythme-en-route-vers-les-jo-de-londres', 'http://www.versants.com/Sports/Sports-aquatiques/2012-06-12/article-3006092/Deux-entraineuses-d%26rsquoAqua-Rythme-bientot-sur-leur-depart-pour-Londres-2012/1', '0000-00-00'),
(20, 'Le Club Aqua-Rythme amorce bien la saison des compétitions :', 'Le Club Aqua-Rythme amorce bien la saison des compétitions :', ' Journal Les Versants du Mont Saint-Bruno', 'http://www.versants.com/Sports/Sports-aquatiques/2012-01-16/article-2865810/Le-Club-Aqua-Rythme-amorce-bien-la-saison-des-competitions/1', '', '2012-01-16'),
(21, 'Des nageuses Grandbasiloises en action :', 'Des nageuses Grandbasiloises en action :', ' Le Journal de Saint-Bruno / Saint-Basile', 'http://www.versants.com/Journal-de-Saint-Basile/Sports/2012-01-25/article-2868960/Des-nageuses-grandbasiloises-en-action/1', '', '2012-01-25'),
(22, 'La fin d''une excellente saison :', 'La fin d''une excellente saison :', 'Journal Les Versants du Mont Saint-Bruno', 'http://www.versants.com/Sports/Sports-aquatiques/2012-06-21/article-3012146/La-fin-d%26rsquoune-excellente-saison!/1', '', '2012-06-21'),
(23, 'Les nageuses de la région en compétition :', 'Les nageuses de la région en compétition :', ' Le Journal de Saint-Bruno / Saint-Basile', ' http://www.hebdosregionaux.ca/monteregie/2011/04/22/les-nageuses-de-la-region-en-competition', '', '2012-04-22'),
(24, 'Des nageuses Grandbasiloises sur le podium :', 'Des nageuses Grandbasiloises sur le podium :', 'Le Journal de Saint-Bruno / Saint-Basile', 'http://www.versants.com/Journal-de-Saint-Basile/Sports/2011-02-09/article-2565817/Des-nageuses-grandbasiloises-sur-le-podium--/1', '', '2012-02-09'),
(25, 'La performance est au rendez-vous :', 'La performance est au rendez-vous :', 'Le Journal de Saint-Bruno / Saint-Basile', ' http://www.hebdosregionaux.ca/monteregie/2009/01/28/la-performance-au-rendez-vous-pour-le-club-de-nage-synchronisee-aqua-rythme', '', '2012-01-28'),
(26, 'Des médailles pour le club Aqua-Rythme :', 'Des médailles pour le club Aqua-Rythme :', 'Le Journal de Saint-Bruno / Saint-Basile', 'http://www.hebdosregionaux.ca/monteregie/2009/05/06/des-medailles-pour-le-club-aqua-rythme', '', '2012-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AlbumTitle` text NOT NULL,
  `Author` text NOT NULL,
  `PhotoName` text NOT NULL,
  `Dates` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`ID`, `AlbumTitle`, `Author`, `PhotoName`, `Dates`) VALUES
(21, 'Compétition d''équipe 2013', 'JP Menard', ',_DSC7986.jpg,_DSC7987.jpg,_DSC7990.jpg,_DSC7991.jpg,_DSC7992.jpg,_DSC7993.jpg,_DSC7994.jpg,_DSC7998.jpg,_DSC7999.jpg,_DSC8035.jpg,_DSC8057.jpg,_DSC8058.jpg,_DSC8062.jpg,_DSC8091.jpg,_DSC8092.jpg,_DSC8093.jpg,_DSC8094.jpg,_DSC8123.jpg,130203DR-5.jpg,130203DR-6.jpg', '13/06/2013 -- 12:39:53'),
(22, 'Finale Régionale Jeux du Québec 2013', 'JP Menard', ',130120DR-14.jpg,130120DR-23.jpg,130120DR-37.jpg,130120DR-45.jpg,130120DR-110.jpg,130120DR-119.jpg,130120DR-136.jpg,130120DR-144.jpg,130120DR-150.jpg,130120DR-159.jpg,130120DR-174.jpg,130120DR-181.jpg,130120DR-202.jpg,130120DR-219.jpg,130120DR-231.jpg,130120DR-232.jpg,130120DR-244.jpg,130120DR-251.jpg,130120DR-252.jpg,130120DR-261.jpg', '13/06/2013 -- 12:43:40'),
(23, 'Photos d''équipe 2013', 'JP Menard', ',130224DR-2.jpg,130224DR-4.jpg,130224DR-6.jpg,130224DR-7.jpg,130224DR-8.jpg,130224DR-9.jpg,130224DR-10.jpg,130224DR-11.jpg,130224DR-12.jpg,130224DR-13.jpg,130224DR-14.jpg,130224DR-15.jpg,130224DR-16.jpg,130224DR-17.jpg,130224DR-19.jpg,130224DR-25.jpg,130303DR-10.jpg,130303DR-13.jpg,130303DR-19.jpg,130323DR-1-1.jpg', '13/06/2013 -- 12:46:27'),
(24, 'Inter-Régionale div. 4 2013', 'JP Menard', ',DSC_8479.JPG,DSC_8482.JPG,DSC_8483.JPG,DSC_8486.JPG,DSC_8487.JPG,DSC_8488.JPG,DSC_8490.JPG,DSC_8494.JPG,DSC_8495.JPG,DSC_8496.JPG,DSC_8497.JPG,DSC_8498.JPG,DSC_8511.JPG,DSC_8512.JPG,DSC_8514.JPG,DSC_8516.JPG,DSC_8517.JPG,DSC_8518.JPG,DSC_8532.JPG,DSC_8535.JPG', '13/06/2013 -- 12:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `resultats`
--

CREATE TABLE IF NOT EXISTS `resultats` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(150) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Version` varchar(100) NOT NULL,
  `Url` text NOT NULL,
  `Dates` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `resultats`
--

INSERT INTO `resultats` (`ID`, `FileName`, `Author`, `Version`, `Url`, `Dates`) VALUES
(4, '2013_Champ_Qc_20_mai_2013.pdf', 'Cindy Mcnicoll', 'v.1', 'https://sites.google.com/site/aquarythmesaintbruno/competition-horaire/resultats-des-competitions/2013_Champ_Qc_20_mai_2013.pdf?attredirects=0&d=1', '11/06/2013 -- 11:54:05'),
(5, 'Resultatsequipenovice.pdf', 'Cindy Mcnicoll', 'v.5', 'https://sites.google.com/site/aquarythmesaintbruno/competition-horaire/resultats-des-competitions/Resultatsequipenovice.pdf?attredirects=0&d=1', '11/06/2013 -- 11:54:57'),
(6, 'resultatsfigure.pdf ', 'Cindy Mcnicoll', 'v.5', 'https://sites.google.com/site/aquarythmesaintbruno/competition-horaire/resultats-des-competitions/resultatsfigure.pdf?attredirects=0&d=1', '11/06/2013 -- 11:55:33'),
(7, 'resultatsflex.pdf', 'Cindy Mcnicoll', 'v.5', 'https://sites.google.com/site/aquarythmesaintbruno/competition-horaire/resultats-des-competitions/resultatsflex.pdf?attredirects=0&d=1', '11/06/2013 -- 11:55:54'),
(8, 'resultatsinterdivision4.pdf', 'Cindy Mcnicoll', 'v.5', 'https://sites.google.com/site/aquarythmesaintbruno/competition-horaire/resultats-des-competitions/resultatsinterdivision4.pdf?attredirects=0&d=1', '11/06/2013 -- 11:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `tarification`
--

CREATE TABLE IF NOT EXISTS `tarification` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Groups` varchar(150) NOT NULL,
  `Hours` varchar(100) NOT NULL,
  `Resident` text NOT NULL,
  `NonResident` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tarification`
--

INSERT INTO `tarification` (`ID`, `Groups`, `Hours`, `Resident`, `NonResident`) VALUES
(4, 'Récréatif', '1', '250', '250'),
(6, 'Récréatif', '2', '400', '450'),
(7, 'Novice', '2', '455', '505'),
(8, 'Développement', '4', '650', '700'),
(9, 'Développement Open', '6', '750', '800'),
(10, 'Intermédiaire', '7', '1000', '1050'),
(11, 'Combo seulement', '2', '600', '650'),
(12, 'Solo / Duo', '1', '200', 'N/A'),
(13, 'Solo / Duo', '2', '300', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE IF NOT EXISTS `trainers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) NOT NULL,
  `Avatar` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`ID`, `Name`, `Avatar`) VALUES
(1, 'Véronique Lemay', 'Veronique_Lemay.jpg'),
(2, 'Karoline', 'Karoline_Traversy.jpg'),
(3, 'Laura', 'Laura_Cote.jpg'),
(4, 'Marilyne', 'Maryline_Lemay.jpg'),
(5, 'Katherine', 'Katherine_Langlois.jpg'),
(6, 'Anne', 'Anne_Bergeron.jpg'),
(7, 'Élyse', 'Elyse_Pomerleau.jpg'),
(8, 'Julie C. ', 'P1040617.jpg'),
(9, 'Marie-Pier ', 'P1040628.jpg'),
(10, 'Jade', 'DSC08292.jpg'),
(11, 'Caroline', 'Caroline.jpg'),
(12, 'Laurie', 'DSC08297.jpg'),
(13, 'Julie L.', 'Julie L.jpg'),
(14, 'Audrée', 'DSC08291.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
