-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Janvier 2016 à 15:14
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ideevent`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `categorie_id` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`categorie_id`) VALUES
('Culture'),
('Musique'),
('Nature'),
('Politique'),
('Social'),
('Soirée'),
('Sport');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_event`
--

CREATE TABLE `categorie_event` (
  `ce_event` int(20) NOT NULL,
  `ce_categorie` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `categorie_event`
--

INSERT INTO `categorie_event` (`ce_event`, `ce_categorie`) VALUES
(43, 'Culture'),
(43, 'Musique'),
(43, 'Nature'),
(43, 'Politique'),
(43, 'Social'),
(43, 'Sport'),
(44, 'Culture'),
(45, 'Culture'),
(46, 'Culture'),
(47, 'Social'),
(47, 'Sport'),
(48, 'Musique'),
(49, 'Social'),
(50, 'Social'),
(50, 'SoirÃ©e'),
(50, 'Sport'),
(51, 'Nature'),
(51, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` int(20) NOT NULL,
  `client_nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_pseudo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_naissance` date NOT NULL,
  `client_ville` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_sexe` set('M','F','','') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_mdp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_moderateur` tinyint(1) NOT NULL DEFAULT '0',
  `client_cp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `client_ckey` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`client_id`, `client_nom`, `client_prenom`, `client_pseudo`, `client_naissance`, `client_ville`, `client_mail`, `client_sexe`, `client_mdp`, `client_moderateur`, `client_cp`, `client_active`, `client_ckey`) VALUES
(1, 'YONDONJAMTS', 'Batmunkh', 'bat2120', '1995-03-25', 'Sainte-Hélène', 'y.bat2120@gmail.com', 'M', 'azertyuiop', 1, '58000', 1, 'c5e45b7c7f06c20b341f02b8d778fe66'),
(2, 'DHAUSSY', 'Tim', 'teemo', '1995-11-03', 'Montpellier', 'tim@yahoo.fr', 'M', 'azertyuiop', 1, '75000', 1, ''),
(3, 'FAVROT', 'Matthieu', 'matou', '1995-11-20', 'Paris', 'mat@yahoo.com', 'M', 'azertyuiop', 1, '75000', 1, ''),
(4, 'BOUYD', 'Hakim', 'hakoush', '1995-11-20', 'Paris', 'hakoush@yahoo.com', 'M', 'azertyuiop', 1, '75000', 1, ''),
(5, 'OUDDIZ', 'Amine', 'amine', '1995-11-12', 'Paris', 'amine@yahoo.com', 'M', 'azertyuiop', 1, '75000', 1, ''),
(6, 'QUINQUENEL', 'Antoine', 'antoine', '1995-11-05', 'Paris', 'antoine@yahoo.com', 'M', 'azeryuiop', 1, '75000', 1, ''),
(8, 'LAURENT', 'Romain', 'rourou', '1995-05-15', 'BORDEAUX', 'romain@mail.fr', 'F', '123456789', 0, '62000', 1, ''),
(15, 'BESSON', 'Marie', 'marie94', '1994-04-15', 'Nice', 'marie@yahoo.fr', 'F', '123456789', 0, '52000', 1, ''),
(16, 'Quenel', 'Antoine', 'Queque', '1994-01-05', 'Â¨Paris', 'groupe9d@zqf.fr', 'M', '1234', 0, '75001', 1, '67a2f605a90f726c0fcd32b540965c3a');

-- --------------------------------------------------------

--
-- Structure de la table `commenter_event`
--

CREATE TABLE `commenter_event` (
  `ce_client` int(20) NOT NULL,
  `ce_event` int(20) NOT NULL,
  `ce_commentaire` text COLLATE utf8_bin NOT NULL,
  `ce_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `commenter_event`
--

INSERT INTO `commenter_event` (`ce_client`, `ce_event`, `ce_commentaire`, `ce_date`) VALUES
(3, 5, 'C''est de la merde !', '2015-11-19 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `event_id` int(20) NOT NULL,
  `event_titre` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `event_createur` int(20) NOT NULL,
  `event_description` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `event_datedebut` datetime NOT NULL,
  `event_datefin` datetime NOT NULL,
  `event_tarifmin` float UNSIGNED NOT NULL,
  `event_tarifmax` float UNSIGNED NOT NULL,
  `event_nomlieu` varchar(50) COLLATE utf8_bin NOT NULL,
  `event_norue` int(20) UNSIGNED NOT NULL,
  `event_rue` varchar(50) COLLATE utf8_bin NOT NULL,
  `event_ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `event_cp` int(20) UNSIGNED NOT NULL,
  `event_maxpart` int(20) UNSIGNED NOT NULL,
  `event_lien` varchar(50) COLLATE utf8_bin NOT NULL,
  `event_sponsor` varchar(50) COLLATE utf8_bin NOT NULL,
  `event_photo` varchar(50) COLLATE utf8_bin NOT NULL,
  `event_video` varchar(50) COLLATE utf8_bin NOT NULL,
  `event_datecreation` date NOT NULL,
  `event_signalement` int(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`event_id`, `event_titre`, `event_createur`, `event_description`, `event_datedebut`, `event_datefin`, `event_tarifmin`, `event_tarifmax`, `event_nomlieu`, `event_norue`, `event_rue`, `event_ville`, `event_cp`, `event_maxpart`, `event_lien`, `event_sponsor`, `event_photo`, `event_video`, `event_datecreation`, `event_signalement`) VALUES
(43, 'Soutenance finale', 4, 'AprÃ¨s 4 mois de travail acharnÃ©, le groupe 9D a le plaisir de vous convier Ã  sa soutenance finale oÃ¹ vous aurez la chance de dÃ©couvrir le site IDEEVENT.', '2016-01-21 09:00:00', '2016-01-21 10:30:00', 0, 0, '', 10, 'Rue de Vanves', 'Issy les Moulineaux', 92130, 8, '', 'Groupe9D, HTML, CSS, MySQL, XAMPP, MAMP', '', '', '0000-00-00', 0),
(44, 'EXPOSITION Â« KARL LAGERFELD, A VISUAL JOURNEY Â»', 4, 'Â« Toute chose qui demande une explication ne la vaut pas. Â» Voltaire\r\n\r\nL''exposition Karl Lagerfeld, &quot;A Visual Journey&quot; explore la grande diversitÃ© de motifs, approches et techniques qui dÃ©finit l''interprÃ©tation subtile et trÃ¨s personnelle que fait Karl Lagerfeld de la photographie.\r\n\r\nElle met en lumiÃ¨re les nombreux centres d''intÃ©rÃªt de Lagerfeld, parmi lesquels l''architecture, les paysages, Paris la nuit, les portraits et autoportraits, la photographie de mode et l''abstraction (un goÃ»t pour les arts graphiques caractÃ©rise un grand nombre de ses photos, quels qu''en soient les sujets).\r\n\r\nDeux grandes installations - Daphnis et ChloÃ© et Le Voyage d''UlysseÂ­ - couronnent cette prÃ©sentation complÃ¨te de l''Å“uvre photographique de Lagerfeld.\r\n\r\nLagerfeld, n''Ã©tant pas homme Ã  se limiter Ã  une seule maniÃ¨re d''apprÃ©hender ce qui l''entoure, adapte son style photographique en fonction du sujet : Â« Les gens veulent toujours savoir quel est mon style photographique. Je n''en sais rien, explique-t-il. C''est Ã  l''observateur de me le dire. Je n''ai pas un style, mais plusieurs, ou aucun. Il ne faut jamais rester immobile, ni dans la vie, ni dans la mode ou la photographie. Â»', '2015-10-16 10:30:00', '2016-03-20 18:30:00', 0, 14.5, '', 8, 'Rue Vignon', 'Paris', 75008, 1000, '', '', '', '', '0000-00-00', 0),
(45, 'SALON DE LA GASTRONOMIE DES OUTRE-MER', 4, '4 jours pour dÃ©couvrir la gastronomie de caractÃ¨re !\r\n\r\nLe salon de la Gastronomie des Outre-Mer est organisÃ© par Babette De RoziÃ¨res la cheffe bien cÃ©lÃ¨bre de France 5, France 2 et France O. \r\n\r\nLa 2Ã¨me Ã©dition du Salon se dÃ©roulera sur 4 jours Ã  Paris Event Center,  plus de 100 exposants reprÃ©senteront la gastronomie et le tourisme ultramarin : Ã©pices, rhums, fruits et lÃ©gumes, sorbets, spÃ©cialitÃ©s culinaires locales,  offices de tourismes, une vÃ©ritable invitation au voyage  Ã  la cuisine du soleil !\r\n\r\nUn grand podium dâ€™animation accueillera chants, danses et musiques traditionnelles tous les jours pour le plus grand bonheur des visiteurs, Francky Vincent, Tahiti Nui, D''Lys Des Iles et bien dâ€™autres artistes.\r\n\r\nVous trouverez  sur place des restaurants typiques pour dÃ©couvrir la cuisine de caractÃ¨re.\r\nRÃ©servez votre week-end de la Saint Valentin pour fÃªter cet Ã©vÃ©nement avec lâ€™Ã©lu(e)  de votre cÅ“ur dans un des restaurants typiques.\r\n\r\nPrenez date, votre rendez-vous au Salon de la Gastronomie des Outre-Mer aura lieu du 12 au 15 fÃ©vrier prochain au Paris Event Center Porte de La Villette.', '2016-02-12 10:00:00', '2016-02-15 19:00:00', 0, 10, '', 20, 'Avenue Porte de la Vilette', 'Paris', 75019, 100000, '', '', '', '', '0000-00-00', 0),
(46, 'SALON RÃ‰TROMOBILE', 4, 'Salon RetroMobile : Auto, moto, passion !\r\n\r\nPrenez date, votre rendez-vous annuel tant attendu approche, l''Ã©vÃ©nement qui fait de Paris la capitale de l''automobile de collection, Salon RÃ©tromobile : du 03 au 07 fÃ©vrier 2016.\r\n\r\nRÃ©tromobile est le salon des passionnÃ©s, curieux ou amateurs de voitures anciennes : plus de 500 vÃ©hicules exposÃ©s, 500 exposants, 120 clubs, 45 artistes rÃ©unis dans la Â« Galerie d''Art Automobile Â» et de nombreuses animations exclusives.\r\n\r\nLe premier salon de la saison pour les amoureux de voiture anciennes : \r\n\r\nVenez voyager dans le temps ou vivre votre passion. RÃªver, s''extasier, s''informer, investir, aller Ã  la rencontre des artistes, clubs et fÃ©dÃ©rations, libraires, organisateurs de rallyes, vendeurs de piÃ¨ces dÃ©tachÃ©es et de miniatures, restaurateurs, marchands d''automobile, maisons de ventes aux enchÃ¨res, restaurateurs mÃ©caniciens, assureurs, constructeurs : Bentley, Bugatti, BMW, Mercedes, Porsche, Ferrari, CitroÃ«n, Peugeot, Renault, Lancia, Alfa RomÃ©o, Skodaâ€¦\r\n\r\nDes expositions et animations exclusives : \r\n\r\nLes expos prÃ©sentÃ©es aux visiteurs ont fait de RÃ©tromobile un salon d''Exception : des voitures de Maharadjas, en passant par l''aventure humaine du Dakar, l''animation dÃ©diÃ©e Ã  la Grande Guerre avec un tronÃ§on de la Voie SacrÃ©e recrÃ©Ã© de toute piÃ¨ce ! les Alpine de Jean RÃ©dÃ©lÃ©, l''expo consacrÃ© Ã  Roland Garros, la majestueuse Locomotive Seguin, ou encore l''innovant Fardier Cugnotâ€¦ chaque annÃ©e les expositions de RÃ©tromobile sont une nouvelle occasion de dÃ©couvrir ou redÃ©couvrir des modÃ¨les et des collections de vÃ©hicules exceptionnels, des animations dynamiques mettant en scÃ¨ne des vÃ©hicules mythiques.\r\n\r\nVentes aux enchÃ¨res de voitures de collection : \r\n\r\nEvÃ©nement de renommÃ©e internationale, RÃ©tromobile est aussi le catalyseur qui fÃ©dÃ¨re les trois leaders mondiaux des ventes aux enchÃ¨res, dont Artcurial qui a signÃ© une vente record de 46 millions d''euros.', '2016-02-03 10:00:00', '2016-02-07 19:00:00', 0, 18, '', 1, 'Place de la Porte de Versailles', 'Paris', 75015, 10000, '', '', '', '', '0000-00-00', 0),
(47, 'Match de foot', 4, 'Viens supporter ton Ã©cole lors du match de l''ISEP, la compÃ©tition est rude. L''Ã©quipe de l''ISEP vise la montÃ©e dans la division 1, et elle ne peut pas le faire sans toi alors n''attends plus et rejoins nous pour soutenir ton Ã©quipe favorite. En plus, il y aura des pompom girls, du beau jeu et de la bonne ambiance.', '2016-01-28 14:00:00', '2016-01-28 17:00:00', 0, 0, '', 28, 'Rue Notre Dame des Champs', 'Paris', 75006, 50, '', 'Move your A.S', '', '', '0000-00-00', 0),
(48, 'Concert de Justin Bieber', 4, 'Justin Bieber est un chanteur canadien nÃ© en 1994. Justin avait 12 ans lorsqu''il a participÃ© Ã  un concours local de chant dans la ville de Stratford, oÃ¹ il a terminÃ© deuxiÃ¨me. En 2007, Justin Bieber et sa maman ont commencÃ© Ã  publier des vidÃ©os sur YouTube de sorte que sa famille et ses amis qui ne pouvaient pas assister Ã  ses prestations puissent le regarder. C''est par Youtube que Justin Bieber a rencontrÃ© son agent et qu''il a signÃ© sur le prestigieux label Island Records. Usher est son mentor. Son premier album My World a Ã©tÃ© commercialisÃ© le 17 novembre 200 Il sera en concert 9. Depuis Justin Bieber est le Miley Cyrus au masculin ! Il remplit dÃ©sormais des stades entiers.', '2016-09-20 20:00:00', '2016-09-21 01:00:00', 62, 95, '', 8, 'Bd de Bercy', 'Paris', 75000, 2000, '', '', '', '', '0000-00-00', 1),
(49, ' La ville et le transhumanisme', 4, 'ConfÃ©rence-dÃ©bat en prÃ©sence de Pascal Desfarges (directeur de l''agence Retiss). Dans le cadre du cycle Â« Futur@venir Â» organisÃ© par les Entretiens d''Issy.\r\n\r\n\r\n\r\n\r\n', '2016-01-21 20:00:00', '2016-01-21 23:00:00', 0, 0, '', 62, 'Rue du Gle Lecler', 'Issy les Moulineaux', 92130, 200, '', '', '', '', '0000-00-00', 0),
(50, 'Titre test', 1, 'Description test', '2016-02-25 05:20:00', '2017-03-26 06:50:00', 5, 6, '', 5, 'Rue test', 'Villetest', 75000, 500, '', '', '', '', '2016-01-18', 0),
(51, 'SoirÃ©e Mousse chez quenel', 16, 'GANGBANG', '2016-07-01 02:02:00', '2017-06-02 01:01:00', 0, 0, '', 1, 'Mon cul', 'Paris', 75001, 6, '', '', '', '', '2016-01-19', 0);

-- --------------------------------------------------------

--
-- Structure de la table `event_age`
--

CREATE TABLE `event_age` (
  `ea_event` int(20) NOT NULL,
  `ea_age` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `event_age`
--

INSERT INTO `event_age` (`ea_event`, `ea_age`) VALUES
(43, '18+'),
(44, '14-17'),
(44, '18+'),
(45, '10-13'),
(45, '14-17'),
(45, '18+'),
(45, '3-5'),
(45, '6-9'),
(46, '10-13'),
(46, '14-17'),
(46, '18+'),
(46, '3-5'),
(46, '6-9'),
(47, '10-13'),
(47, '14-17'),
(47, '18+'),
(48, '10-13'),
(48, '14-17'),
(48, '18+'),
(48, '6-9'),
(49, '18+'),
(50, '10-14'),
(50, '15-17'),
(51, '18+');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(8) UNSIGNED NOT NULL,
  `faq_question` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `faq_reponse` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_question`, `faq_reponse`) VALUES
(1, 'Comment s''inscrire ?', 'Pour vous inscrire, c''est trÃ¨s simple.\r\nSuivez ces quelques Ã©tapes:\r\n\r\n1-Rendez-vous sur la page d''inscription du site IdÃ©Event\r\n2-ComplÃ©tez les champs d''informations (Tous les champs sont obligatoire!)\r\n3-Cliquez sur "Je m''inscris"\r\n4-Vous recevrez un mail de confirmation sur votre boÃ®te mail. Consultez-la et cliquez sur le lien\r\n5-Vous Ãªtes officiellement inscrit et membre de la communautÃ© #IDV !'),
(2, 'Comment crÃ©er un Ã©vÃ©nement ?', 'Pour crÃ©er un Ã©vÃ©nement, c''est trÃ¨s simple. Suivez ces quelques Ã©tapes:\r\n1-Rendez-vous sur la Page crÃ©er un Ã©vÃ©nement\r\n2-ComplÃ©tez les champs d''informations (Tous les champs ne sont pas obligatoire)\r\n3-Cliquez sur Je propose !\r\n4-Votre Ã©vÃ©nement fait officiellement partie de la sÃ©lection #IDV\r\n\r\nLa crÃ©ation d''Ã©vÃ©nements factices, inadÃ©quats, superflus, mensongers ou impropres pourra faire l''objet de sanctions pouvant aller jusqu''au bannissement de la communautÃ© #IDV'),
(3, 'Comment signaler un problÃ¨me ?', 'Le meilleur moyen pour nous signaler tout contenu indÃ©sirable (Message Ã  caractÃ¨res choquants, faux-Ã©vÃ©nements...) reste d''utiliser le bouton Signaler situÃ© Ã  cÃ´tÃ© de l''Ã©lÃ©ment en question.\r\n'),
(4, 'Comment modifier mes informations personnelles ?', 'Pour modifier vos informations personnelles:\r\n\r\n1-Connectez-vous\r\n2-Cliquez sur la rubrique Mon Compte\r\n3-Renseignez-nous vos nouvelles informations\r\n4-Valider vos choix'),
(5, 'Pourquoi je ne peux pas me dÃ©clarer participant Ã  un Ã©vÃ©nement ?', 'Pour pouvoir participer Ã  un Ã©vÃ©nement, il faut Ãªtre membre de la communautÃ© #IDV\r\nSi la capacitÃ© maximale d''un Ã©vÃ©nement est atteinte, vous ne pouvez pas vous dÃ©clarer participant'),
(6, 'Suis-je certain d''assister Ã  l''Ã©vÃ©nement auquel je me suis dÃ©clarÃ©(e) participant(e) ?', 'Non, en effet, l''organisation de chaque Ã©vÃ©nement se rÃ©serve le droit de toute entrÃ©e.\r\nLa direction IdÃ©Event se libÃ¨re de toute responsabilitÃ© et ne se considÃ¨re pas comme garant en cas de problÃ¨me/vol/refus d''entrÃ©e..(Voir conditions d''utilisations/Mentions lÃ©gales'),
(7, 'J''ai perdu mon mot de passe !', '1-Dans l''espace dÃ©diÃ© Ã  la connexion, cliquez sur Mot de passe perdu\r\n2-Renseignez votre mail dans l''espace dÃ©diÃ©\r\n3-Consultez vos mails\r\n4-Votre mot de passe vous a Ã©tÃ© envoyÃ©\r\n'),
(8, 'Je ne suis plus intÃ©ressÃ© pas un Ã©vÃ©nement auquel je me suis dÃ©clarÃ© participant, que faire ?', 'Il vous suffit de retourner sur la page de l''Ã©vÃ©nement en question (que vous suivez encore) et de cliquer sur Se dÃ©sinscrire'),
(9, 'Je ne retrouve plus un Ã©vÃ©nement que j''avais consultÃ© !', 'Le meilleur moyen de pouvoir suivre l''actualitÃ© d''un Ã©vÃ©nement est de se dÃ©clarer participant (si vous souhaitez y participer) ou de se dÃ©clarer interessÃ© afin de pouvoir rester en contact avec.\r\nVous pouvez toutefois utiliser la recherche ou la recherche avancÃ©e.\r\nAttention, il se peut toutefois que votre Ã©vÃ©nement ait tout simplement Ã©tÃ© supprimÃ©.'),
(10, 'Il me manque des informations concernant un Ã©vÃ©nement, que faire ?', 'IdÃ©Event se charge de mettre Ã  disposition les informations principales, de faÃ§on claire et prÃ©cise, et ce, sur chaque page Ã©vÃ©nementielle.\r\nPour toute autre information complÃ©mentaire dont le renseignement n''est pas obligatoire (concernant fumeurs, vestiaires, changement d''horaire de derniÃ¨re minute...) il se peut qu''elle soit dans l''espace "description" si le crÃ©ateur de l''Ã©vÃ©nement y a pensÃ©.\r\n\r\nSinon, vous pouvez Ã©galement accÃ©der au lien de l''Ã©vÃ©nement ou prendre contact directement avec l''organisation si possible.\r\nIDV dÃ©cline toutefois toute responsabilitÃ© en cas d''informations erronÃ©es et/ou de changement(s) de derniÃ¨re minute non signalÃ©(s). Pour plus d''informations, veuillez consulter nos conditions d''utilisations/Mentions lÃ©gales.'),
(11, 'Je souhaite retrouver les photos d''un Ã©vÃ©nement passÃ©, comment faire ?', 'Pour consulter toutes les photos relatives aux Ã©vÃ©nements passÃ©s, rendez-vous dans la Gallerie.'),
(12, 'Comment noter un Ã©vÃ©nement ?', 'Pour noter un Ã©vÃ©nement, rendez-vous sur la page de ce dernier et utilisez le systÃ¨me de notation #IDV\r\n(Noter un Ã©vÃ©nement implique d''y avoir participer..)'),
(13, 'ÃŠtes-vous prÃ©sent sur les rÃ©seaux sociaux ?', 'IdÃ©Event accorde une grande importance Ã  son image et Ã  celle de sa communautÃ© #IDV ; c''est pourquoi nous sommes prÃ©sent sur les rÃ©seaux sociaux afin que vous puissiez mieux nous suivre et interagir avec nous\r\nPour y accÃ©der, vous pouvez cliquer sur les liens en bas de page ou sur ceux juste ici: IdÃ©Event Facebook & IdÃ©Event Twiter\r\n'),
(14, 'Comment obtenir des informations sur les Ã©vÃ©nements Ã  venir, en fonction de mes goÃ»ts ?', 'Pour bÃ©nÃ©ficier d''Ã©vÃ©nements en fonction de leur(s) catÃ©gorie(s) :\r\n\r\n1-Rendez-vous dans la rubrique CatÃ©gorie\r\n2-SÃ©lectionnez celle qui vous intÃ©resse parmi toutes celles de la collection proposÃ©e\r\nFaites votre choix !\r\n\r\n(Un Ã©vÃ©nement peut Ãªtre inclus dans plusieurs catÃ©gories)');

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

CREATE TABLE `forum_reponses` (
  `id` int(6) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date_reponse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `correspondance_sujet` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_reponses`
--

INSERT INTO `forum_reponses` (`id`, `auteur`, `message`, `date_reponse`, `correspondance_sujet`) VALUES
(8, 'hakoush', 'Bonsoir, j''ai un problème j''ai proposé un événement, mais malheureusement il n''aura plus lieu, comment faire pour le supprimer?\r\n', '2016-01-17 21:43:17', 9),
(9, 'Bat', 'Ah dommage que ton événement n''est plus lieu mais il n''y a pas de bouton pour que tu le supprimes toi même, il va donc falloir que tu le signales aux admins qui se chargeront de le supprimer!', '2016-01-17 21:47:00', 9),
(10, 'hakoush', 'Merci beaucoup', '2016-01-17 21:47:59', 9),
(11, 'hakoush', 'Ce serait cool de pouvoir inviter des amis!', '2016-01-17 21:49:12', 10),
(12, 'Tim', 'Nous prenons note merci de ta suggestion', '2016-01-17 21:53:00', 0),
(13, 'Tim', 'Nous prenons note de ta suggestion, merci bien! ', '2016-01-17 21:55:00', 10),
(14, 'hakoush', 'Comment modifier un événement?', '2016-01-17 22:09:31', 11),
(15, 'Queque', 'La mere a quenel', '2016-01-19 11:47:45', 11),
(16, 'Queque', 'Y aura t il sa mere', '2016-01-19 11:49:25', 12);

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujets`
--

CREATE TABLE `forum_sujets` (
  `id` int(6) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `titre` text NOT NULL,
  `date_derniere_reponse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_sujets`
--

INSERT INTO `forum_sujets` (`id`, `auteur`, `titre`, `date_derniere_reponse`) VALUES
(9, 'hakoush', 'Supprimer un événément', '2016-01-17 21:47:59'),
(10, 'hakoush', 'Inviter des amis (suggestions)', '2016-01-17 21:49:12'),
(11, 'hakoush', 'Modifier un événement', '2016-01-19 11:47:45'),
(12, 'Queque', 'Soirée mousse chez quenell', '2016-01-19 11:49:25');

-- --------------------------------------------------------

--
-- Structure de la table `gout`
--

CREATE TABLE `gout` (
  `gout_client` int(20) NOT NULL,
  `gout_categorie` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `gout`
--

INSERT INTO `gout` (`gout_client`, `gout_categorie`) VALUES
(1, 'Culture'),
(1, 'Musique'),
(1, 'Soirée'),
(2, 'Nature'),
(3, 'Social'),
(4, 'Culture'),
(5, 'Soirée'),
(6, 'Cérémonie'),
(8, 'Soirée'),
(16, 'Culture'),
(16, 'Nature'),
(16, 'Politique');

-- --------------------------------------------------------

--
-- Structure de la table `participer_suivre_noter`
--

CREATE TABLE `participer_suivre_noter` (
  `psn_client` int(20) NOT NULL,
  `psn_event` int(20) NOT NULL,
  `psn_participer` tinyint(1) NOT NULL DEFAULT '0',
  `psn_suivre` tinyint(1) NOT NULL DEFAULT '0',
  `psn_noter` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `participer_suivre_noter`
--

INSERT INTO `participer_suivre_noter` (`psn_client`, `psn_event`, `psn_participer`, `psn_suivre`, `psn_noter`) VALUES
(1, 48, 0, 0, 3),
(4, 48, 0, 0, 1),
(4, 45, 0, 0, 3),
(4, 46, 0, 0, 3),
(1, 46, 0, 0, 4),
(16, 47, 1, 1, NULL),
(16, 48, 0, 1, NULL),
(16, 45, 1, 0, NULL),
(16, 51, 1, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `tranche_age`
--

CREATE TABLE `tranche_age` (
  `tranche_id` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `tranche_age`
--

INSERT INTO `tranche_age` (`tranche_id`) VALUES
('10-13'),
('14-17'),
('18+'),
('3-5'),
('6-9');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `categorie_event`
--
ALTER TABLE `categorie_event`
  ADD KEY `ce_event` (`ce_event`,`ce_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `commenter_event`
--
ALTER TABLE `commenter_event`
  ADD KEY `ce_client` (`ce_client`,`ce_event`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_createur` (`event_createur`);

--
-- Index pour la table `event_age`
--
ALTER TABLE `event_age`
  ADD KEY `ea_event` (`ea_event`,`ea_age`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Index pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gout`
--
ALTER TABLE `gout`
  ADD KEY `gout_client` (`gout_client`,`gout_categorie`);

--
-- Index pour la table `participer_suivre_noter`
--
ALTER TABLE `participer_suivre_noter`
  ADD KEY `psn_client` (`psn_client`,`psn_event`),
  ADD KEY `psn_client_2` (`psn_client`);

--
-- Index pour la table `tranche_age`
--
ALTER TABLE `tranche_age`
  ADD PRIMARY KEY (`tranche_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
