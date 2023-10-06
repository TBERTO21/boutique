-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 12 oct. 2020 à 12:29
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `numero` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  `Cryptogramme` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id`, `type`, `nom`, `numero`, `expiration`, `Cryptogramme`, `id_utilisateur`) VALUES
(65, 'visa', 'Berto Thomas', '8888888888888888', '2021-02-21', '347', 11),
(73, 'visa', 'INES ALI', '0808080808080808', '2023-08-28', '288', 2),
(72, 'mastercard', 'PAPE AMAR', '6666666666666666', '2023-02-21', '789', 10);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'vynilles'),
(7, 'CD');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_panier` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `id_cb` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_panier`, `id_utilisateur`, `prix`, `quantite`, `id_cb`, `date`) VALUES
(77, 146, 2, '35', '1', '73', '2020-10-12 14:28:07'),
(76, 145, 2, '70', '1', '73', '2020-10-12 13:53:31'),
(75, 144, 11, '5', '1', '65', '2020-10-12 01:02:52'),
(74, 143, 11, '75', '2', '65', '2020-10-10 19:36:14'),
(72, 139, 10, '65', '2', '72', '2020-10-10 18:51:58'),
(73, 141, 11, '110', '3', '65', '2020-10-10 19:26:08');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaires` varchar(1024) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaires`, `id_utilisateur`, `reference`, `date`) VALUES
(21, 'dddddddddd', 11, 8, '2020-09-27 13:14:49'),
(22, 'dddddddddd', 11, 8, '2020-09-27 13:15:01'),
(23, 'ddddddddddd', 11, 8, '2020-09-27 13:15:22'),
(24, 'ddddddddddd', 11, 8, '2020-09-27 13:15:29'),
(25, 'd', 11, 5, '2020-09-27 13:18:16'),
(33, 'booo', 11, 20, '2020-09-29 17:45:50'),
(32, 'booo', 11, 20, '2020-09-29 17:45:06'),
(31, 'gg', 11, 21, '2020-09-29 17:42:53'),
(34, 'JUL', 11, 11, '2020-09-29 19:38:32'),
(35, '', 11, 16, '2020-10-04 14:33:41'),
(36, 'maaaaaaa', 11, 20, '2020-10-07 14:44:03'),
(37, 'ggfdf', 11, 20, '2020-10-07 15:04:56'),
(38, 'ggfdf', 11, 20, '2020-10-07 15:07:15'),
(39, 'test', 11, 20, '2020-10-07 15:07:19'),
(40, 'test', 11, 20, '2020-10-07 15:07:30'),
(41, 'ruben', 11, 20, '2020-10-07 15:07:34'),
(42, 'rubentest', 11, 20, '2020-10-07 15:07:53'),
(43, 'rubentest', 11, 20, '2020-10-07 15:25:58');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL DEFAULT '1',
  `id_utilisateurs` int(11) NOT NULL,
  `prix` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `reference` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `artiste` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `id_categories` int(11) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`reference`, `nom`, `artiste`, `type`, `description`, `image`, `prix`, `id_categories`) VALUES
(1, 'Abbey Road\r\n', 'beattles', 'rock', 'Après le succès des rééditions de ‘Sgt. Pepper’s Lonely Hearts Club Band’ et de l’album blanc, voici celle très attendue d’Abbey Road.\r\nBien qu\'étant sorti avant Let It Be, Abbey Road est le dernier album enregistré par les Beatles. Après les dissensions intervenues pendant l’enregistrement des sessions qui donneront Let It Be, Les Beatles décident de se réunir et de donner le meilleur d’eux.\r\n\r\nGeorge Harrison a pour la première fois 2 titres sur un album (Something et Here Comes the Sun), et pour la première fois également une de ses chansons, Something, est la face A du nouveau single.\r\n\r\nAbbey Road est l’album des Beatles le plus vendu dès sa sortie, avec plus de 30 millions d’exemplaires écoulés. Le groupe crée encore une fois l’évènement et accouche d’un nouveau chef-d’œuvre. Le 26 septembre sera le 50ème anniversaire de la sortie de cet album mythique. A cette occasion l’album a été entièrement remixé par Giles Martin, et fait l’objet d’une réédition multiformats.', 'beattles.jpg', '20', 1),
(5, 'The Eminem Show', 'Eminem', 'rap us', 'Quand on a écoulé son précédent album à 12 millions d\'exemplaires, qu\'on est devenu le phénomène de société le plus commenté du moment, et qu\'on s\'apprête à se lancer dans une nouvelle carrière (le cinéma), on a deux options : soit se laisser dicter par la pression un album calque, soit n\'en faire qu\'à sa tête ! Eminem a choisi la deuxième solution, et il propose, en guise de troisième étape de sa déjà mythique carrière, un disque qu\'il a écrit, mais aussi composé et produit tout seul, n\'appelant à la rescousse son mentor, Dr Dre, que sur trois titres (pas les plus fameux du lot). Mais le peroxydé a de la ressource, et sa couleur musicale, plutôt rentre-dedans, n\'a rien à envier aux luxueuses enluminures de Dre. La verve d\'Eminem est tout en virulence, qu\'il s\'attaque à sa mère, ou aux clichés de l\'Amérique blanche... Percutant et mature, Eminem est devenu l\'incontournable analyste de l\'Amérique d\'aujourd\'hui, un Dylan du millénaire.', 'eminen.jfif', '7', 7),
(6, 'Chronic 2001', 'Dr Dre', 'rap us', 'Ex-membre du crew le plus emblématique du rap West Coast, Dr Dre marque très vite le hip-hop au fer rouge. Ses productions, inspirées de pointures comme George Clinton ou l\'éternel Zapp & Roger, vont devenir la signature du beatmaker. Apres avoir contribué au succès de Snoop ou de 2 Pac, le sorcier de Compton sort The Chronic 2001. Les tubes « Forgot about Dre », « Still Dre » ou « The Next Episode » vont très vite imposer cet opus au sommet des charts et ouvrir les portes à de nouvelles sonorités dans le gangsta rap. ', 'dre.png', '7', 7),
(7, 'Sa jeunesse\r\n', 'Charles Aznavour', 'variete', 'Titre : Sa jeunesse - Groupe interprète : Charles Aznavour - Support : Album - Format : CD - Nombre de CD : 3 - Editeur / Label : Le Chant du Monde - Date de parution : 27/10/2011 - Liste de titres : - 1 - Poker 2 - Jézébel 3 - Oublie loulou 4 - Plus bleu que tes yeux 5 - Quand elle chante 6 - Si j\'avais un piano 7 - Me que me que 8 - Viens 9 - Et bailler et dormir 10 - Intoxiqué 11 - Couchés dans le foin 12 - A propos de pommier 13 - Heureux avec des riens 14 - Quelque part dans la nuit 15 - Monsieur jonas 16 - Ah 17 - Moi j\'fais mon rond 18 - Parce que 19 - Viens au creux de mon Épaule 20 - Je veux te dire adieu 21 - Je t\'aime comme Ça 22 - á te regarder 23 - La bagarre le rififi 24 - Je voudrais 1 - Sur ma vie 2 - La palais de nos chimères 3 - Prends garde à toi 4 - Je cherche mon amour 5 - Toi 6 - Ca 7 - Terre nouvelle 8 - Après l\'amour 9 - Rentre chez toi et pleure 10 - Le chemin de l\'éternité 11 - Une enfant 12 - On ne sait jamais 13 - J\'entends ta voix 14 - Vivre avec toi 15 - J\'aime paris au mois de mai 16 - L\'amour à fleur de coeur 17 - J\'ai bu 18 - Tant de monnaie 19 - Le feutre taupé 20 - Il pleut 21 - Merci mon dieu 22 - L\'amour a fait de moi 23 - Sur la table 24 - Parti avec un autre amour 1 - Sa jeunesse 2 - Ay! mourir pour toi 3 - Perdu 4 - Pour faire une jam 5 - Si je n\'avais plus 6 - C\'est merveilleux l\'amour 7 - Bal du faubourg 8 - Il y avait 9 - Quand tu viens chez moi mon coeur 10 - Mon amour 11 - Ton beau visage 12 - Je haïs les dimanches 13 - Je te donnerai 14 - Ce sacré piano 15 - Je ne peux pas rentrer chez moi 16 - C\'est ca! 17 - A tout jamais 18 - Tu t\'laisses aller 19 - J\'ai perdu la tête 20 - Les deux guitares 21 - Ce jour tant attendu 22 - Rendez-vous à brasilia 23 - Prends le chorus 24 - Je m\'voyais déjà\r\n', 'azna.jpg', '40', 7),
(8, 'Les étoiles vagabondes : Expansion', 'Nekfeu', 'rap fr', '«Quand deux étoiles sont trop proches et que l\'une d\'elles explose, il arrive qu\'elle condamne l\'autre étoile à errer sans trajectoire dans l\'univers. On les appelle les étoiles vagabondes.»\r\nVoici le synopsis du 1er film / documentaire d’1h30 entièrement réalisé par Nekfeu & Syrine Boulanouar, intitulé «Les étoiles vagabondes».\r\n\r\nLe 06 juin 2019, Nekfeu présentait un nouveau concept d’album présenté publiquement lors d’une séance exclusive au cinéma dans un peu plus de 150 salles à travers toute la France (métropole + Ile de La réunion), la Suisse, la Belgique, le Luxembourg. Au total, 100 000 personnes étaient rassemblées pour découvrir son nouvel album. En l’écoutant, des anomalies pouvaient se sentir dans les transitions des titres. La raison? L’album «Les étoiles vagabondes» à cet instant est incomplet. Depuis le 21 juin 2019, avec la sortie de «Expansion», Nekfeu présente enfin dans son intégralité son œuvre finale intitulée «Les étoiles vagabondes: expansion». Edités de façon limitée à 100 000 exemplaires chacun, les 2 albums dans leur version physique s’imbriquent pour former l’œuvre intégrale. Un objet précieux que tous les collectionneurs doivent se procurer avant leur épuisement total.', 'nek.jpg', '80', 1),
(9, 'Brol Vinyle \r\n\r\n', 'Angele', 'variete', 'Âgée de 22 ans et déjà 3 hits à son actif, Angèle sort à présent son premier album, dont le titre est une expression qui nous rappelle ses origines bruxelloises. Brol qui veut dire désordre, ou gadget en argot belge, sort sur son propre label nouvellement crée, \'Angèle VL Records\'.\r\nAngèle s’est d’abord fait connaître via Instagram, et le bouche à oreille a suffi pour la mettre rapidement en haut de l’affiche. D’Instagram aux premières parties, et des premières parties à ses propres concerts, en seulement 1 an, l’artiste a tourné dans toute la France, mais aussi en Suisse, Belgique, Pays-Bas et Québec.\r\nAvec \'La Thune\', \'La Loi De Murphy\' et \'Je Veux Tes Yeux\', elle s’est directement projetée au sommet des charts et ça ne fait que commencer…', 'ange.jpg', '18', 1),
(10, 'Rien 100 rien\r\n', 'jul', 'rap fr', 'Un opus haut en couleurs et toujours plus éclectique pour une “team JUL” toujours plus nombreuse et fidèle.\r\n\r\n', 'Rien-100-rien.jpg', '16', 7),
(11, 'Je trouve pas le sommeil\r\n', 'jul', 'rap fr', 'JUL EN VERSION VINYLE COLLECTOR !\r\nUNE PIECE DE COLLECTION EN EDITION DOUBLE VINYLE LIMITE !\r\n', 'JeTrouve.jpg', '23', 1),
(13, 'Brol La Suite ', 'angele', 'variete', 'Après avoir sorti fin 2018 son premier album déjà disque de diamant, Angèle, le phénomène de l’année, revient en novembre prochain avec une nouvelle e´dition de Brol. « Brol La Suite » inclut 9 nouveaux titres inédits. Apre`s Stromae et Damso, pour ne citer qu\'eux, la Belgique a produit un nouveau prodige : Ange`le, de son vrai nom Ange`le Van Laeken. Elle est assure´ment le phe´nome`ne de l’anne´e avec son premier album « Brol », un terme argotique belge qui lui tient particulie`rement a` cœur. « J\'avais simplement envie de mettre un mot belge dans mon album, d\'autant qu\'il m\'a toujours fait rire. Le brol c’est le bordel, le de´sordre mais optimiste et le´ger, ce n\'est pas du tout pe´joratif. Ce mot me rappelle mon enfance, mon pays parce que j\'y suis de moins en moins. Je le trouve du coup tre`s rassurant.»? Si Internet produit des artistes instagram a` la chaine, Ange`le se de´marque de la masse. A 23 ans, elle vient bousculer les codes du « game » et se moque gentiment de la «fame» et de ses vicissitudes. Pur produit de son e´poque, elle transcende les clivages musicaux, vestimentaires, sociaux ou ethniques – a` l’image de Bruxelles, capitale de pop urbaine europe´enne, plus de´complexe´e que Paname ; une nouvelle pop urbaine qui n\'a plus besoin de revendiquer une identite´, une classe, un quartier ou des couleurs. Ange`le est une bedroom producer avec un gros «Do It Yourself» floque´ sur son sweatshirt oversize. Elle e´crit ses paroles, compose ses propres sons, et propose une esthétique graphique qui lui ressemble, directe et percutante, en recrutant la toute jeune Charlotte Abramow pour s’occuper de son image. Issue d\'une famille d\'artistes et apre`s avoir suivi des e´tudes acade´miques de jazz, Ange`le a commence´ par des reprises de classiques de la pop sur son Instagram et s’est construit un univers au succe`s phe´nome´nal. Ange`le incarne parfaitement sa ge´ne´ration, magmatique et syncre´tique, ou` les frontie`res entre les genres musicaux ne sont plus qu’un lointain souvenir.', 'Brol.jpg', '15', 7),
(14, 'Laisse béton  Vinyle', 'renaud', 'variete', 'Laisse béton Exclusivité Vinyle Jaune\r\n\r\n', 'beton.jpg', '20', 1),
(15, 'Legend', 'Bob Marley', 'reggae', 'Réédition vinyle : Legend est une compilation de Bob Marley and the Wailers sorti en 1984. Elle regroupe dix des onze singles de Bob Marley ayant atteint le top 40 au Royaume-Uni (le onzième étant Punky Reggae Party), ainsi que trois morceaux extraits des deux albums publiés par les anciens Wailers (avec Peter Tosh et Bunny Wailer) chez Island, et enfin Redemption Song, plébiscité par les fans. Aujourd\'hui encore, Legend reste le disque de reggae le plus couronné de succès, avec plus de quatorze millions d\'exemplaires vendus aux États-Unis et environ vingt-cinq millions d\'exemplaires vendus dans le monde. En France, il fut certifié en 1995 disque de diamant (plus d\'un million d\'exemplaires vendus). Il fut pourtant critiqué pour son manque de représentativité de la carrière de Bob Marley. En effet, il ne prend pas en compte les albums Natty Dread, Rastaman Vibration, Babylon By Bus et Survival. Bien que ce soit une compilation, le magazine Rolling Stone l\'a classé « quarante-sixième plus grand album de tous les temps »\r\n', 'Legend.jpg', '15', 1),
(16, 'Babylon by bus\r\n', 'Bob marley', 'reggae', 'Sixième album de Bob Marley et second album live, Babylon by Bus fut enregistré lors de plusieurs concerts européens à l\'occasion du Kaya Tour réalisé en 1978. Réédité sur un seul CD, ce double album de 14 titres, devenus aujourd\'hui des classiques, renferme une énergie palpable, légèrement teintée d\'une couleur rock apportée par l\'exubérant soliste Junior Marvin, mis en avant par Bob Marley lors de cette tournée. Un des grands albums live des années 70 ! Extrait du Guide \"La Discothèque idéale Fnac\" 2016\r\n\r\n', 'Babylon.jpg', '10', 7),
(17, 'Scream \r\n', 'Michael Jackson', 'pop', 'Michael Jackson a toujours adoré les ambiances gentiment effrayantes, les américains ont un mot pour ça, « spooky », que l’on peut traduire par « ce qui fait gentiment peur ». Son clip le plus célèbre « Thriller » en est l’illustration parfaite.\r\nA l’approche d’Halloween, ses plus grands tubes « spooky » sont rassemblés pour la première fois sur un album exceptionnel. Pour l’occasion, un inédit vient compléter un tracklist anthologique avec un tout nouveau mash-up du duo de DJ internationalement reconnus The White Panda, basé sur les titres « Blood on the Dancefloor », « Dangerous » et « Leave Me Alone ». Une tuerie de plus pour les radios qui donnera lieu à un nouveau clip très attendu. Signalons également la présence pour la première fois sur un disque de Michael Jackson du tube « Somebody’s Watching Me » de Rockwell, avec son refrain chanté par Michael.\r\nLes artworks des deux formats – CD et double vinyle couleur – comprendront un accès à la première expérience de réalité augmentée créée pour un projet Michael Jackson.\r\nUn énorme plan marketing multimédia et créatif est mis en place avec des événements inoubliables pour les fans qui seront annoncés prochainement !\r\nRestez à l’écoute, la fusée « Scream » a encore des surprises qui auront une forte résonance médiatique.\r\nLe vinyle de « Scream », qui sortira juste avant Halloween, sera un double vinyle en édition limitée dont l’un sera fluorescent dans le noir : spooky ! …Avec en plus un poster exclusif !', 'Scream.jpg', '70', 1),
(18, 'Thriller \r\n', 'Michael Jackson', 'pop', 'Vinyle Michael Jackson - Thriller (LP, Album, RE, Gat)\r\n', 'Thriller.jpg', '35', 1),
(19, 'BAD', 'Michael Jackson', 'pop', 'Vinyle Michael Jackson - Bad (LP, Album, RE)\r\n', 'Bad.jpg', '30', 1),
(20, 'Picture my pain\r\n', '2Pac', 'rap us', 'Encore un nouvel album posthume penserez vous, oui, c\'estvrai mais c\'est un album posthume d\'un des plus grands del\'histoire du rap, d\'un des emcee les plus prolifiques de sagénération, qui aura laissé derrière lui une oeuvremonumentale. Picture My Pain est une collection de 18titres jamais sortis, témoins de l\'énergie et de la classedont débordait Tupac. Un must pour les fans de \'Pac qui nedécevra pas !\r\n\r\n', '2.jpg', '5', 7),
(21, 'Greatest hits\r\n', 'The Notorious B.I.G.', 'rap us', 'Pour la première fois, tout le meilleur de la légende du Hip-hop : c\'est-à-dire NOTORIOUS B.I.G, dans un même album !Inclus tous ses plus gros hits comme bien sur \"Hypnotise\", \"Juicy\", \"Notorious Big\" feat Lil KIM & P.DIDDY, ou encore \"Ten Crack Commandements\"... Notons les 2 titres inédits !\r\n\r\n', 'BIG.jpg', '11', 7);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `codepo` varchar(255) DEFAULT NULL,
  `grade` int(11) NOT NULL DEFAULT 3,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `nom`, `prenom`, `telephone`, `adresse`, `ville`, `codepo`, `grade`) VALUES
(2, 'ines', '8585746e657f20beb49af25498340112be82aa9c', 'ines@gmail.com', 'ali', 'ines', '0624365083', 'las bas', 'marseille', '13015', 28),
(11, 'thomas', 'e9db499e13ac90573163837d2fb1fc9f85402d6d', 'thomasberto21@gmail.com', 'berto', 'thomas', '0624365083', '88', 'Marseille', '13014', 21),
(10, 'pape', '54cf1edf1143872699c8b24cfc4bf05ead9e0365', 'pape@gmail.com', 'amar', 'pape', '0622222222', 'las bas', 'marseille', '13015', 3),
(12, 'leo', 'f004987771b03890f2d1ddacd1329d82e6862738', '', NULL, NULL, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `vpanier`
--

DROP TABLE IF EXISTS `vpanier`;
CREATE TABLE IF NOT EXISTS `vpanier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `quantite` varchar(255) DEFAULT NULL,
  `id_utilisateurs` int(11) DEFAULT NULL,
  `id_panier` int(11) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vpanier`
--

INSERT INTO `vpanier` (`id`, `reference`, `nom`, `quantite`, `id_utilisateurs`, `id_panier`, `prix`, `date`) VALUES
(70, 19, 'BAD', '1', 10, 139, '30', '2020-10-10 00:00:00'),
(71, 18, 'Thriller \r\n', '1', 10, 138, '35', '2020-10-10 00:00:00'),
(73, 18, 'Thriller \r\n', '2', 11, 140, '35', '2020-10-10 00:00:00'),
(72, 7, 'Sa jeunesse\r\n', '1', 11, 141, '40', '2020-10-10 00:00:00'),
(74, 20, 'Picture my pain\r\n', '1', 11, 143, '5', '2020-10-10 19:36:14'),
(75, 17, 'Scream \r\n', '1', 11, 142, '70', '2020-10-10 19:36:14'),
(76, 20, 'Picture my pain\r\n', '1', 11, 144, '5', '2020-10-12 01:02:52'),
(77, 17, 'Scream \r\n', '1', 2, 145, '70', '2020-10-12 13:53:31'),
(78, 18, 'Thriller \r\n', '1', 2, 146, '35', '2020-10-12 14:28:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
