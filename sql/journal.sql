-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 26 Mars 2017 à 19:34
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `journal`
--

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `allarticle`
--
CREATE TABLE IF NOT EXISTS `allarticle` (
`idArticle` int(11)
,`idAuteur` int(11)
,`idPublieur` int(11)
,`nomAuteur` varchar(25)
,`nomPublieur` varchar(25)
,`idCategorie` int(11)
,`nomCategorie` varchar(25)
,`idJournal` int(11)
,`dateJournal` varchar(25)
,`idUne` int(11)
,`publier` varchar(5)
,`nomImage` varchar(255)
,`titreArticle` varchar(255)
,`textArticle` text
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `allauteur`
--
CREATE TABLE IF NOT EXISTS `allauteur` (
`idArticle` int(11)
,`idAuteur` int(11)
,`nomAuteur` varchar(25)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `allpublieur`
--
CREATE TABLE IF NOT EXISTS `allpublieur` (
`idArticle` int(11)
,`idPublieur` int(11)
,`nomPublieur` varchar(25)
);
-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`idArticle` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idJournal` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `idPublieur` int(11) NOT NULL,
  `nomImage` varchar(255) DEFAULT NULL,
  `titreArticle` varchar(255) NOT NULL,
  `textArticle` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `idCategorie`, `idJournal`, `idAuteur`, `idPublieur`, `nomImage`, `titreArticle`, `textArticle`) VALUES
(1, 2, 2, 1, 1, 'oppositionnieme.jpg', 'Opposition : Enième manifestation ratée', '<p>Tôt le matin, le gymnase couvert de Mahamasina a été quadrillé par de nombreux éléments de l’Emmoreg.« Le retour au pouvoir monarchique et au despotisme ».</p><p>C’est la constatation des leaders de l’opposition par rapport à la situation politique actuelle. En effet, les anti-HVM haussent le ton par rapport à l’interdiction de toutes les manifestations politiques.</p><p> « Un régime qui interdit aussi bien les manifs en salle que les manifs organisées dans un lieu public est tout simplement un régime dictatorial », martèle-t-on. Une réaction à la manifestation prévue samedi dernier par le « Mitsangana ry Malagasy » et le « Malagasy Mivondrona ho an’ny Fanorenana » mais qui a dû être annulée au dernier moment à cause d’une nouvelle forte mobilisation des forces de l’ordre.</p><p> Enième manifestation ratée donc pour l’opposition. Tôt le matin, le gymnase couvert de Mahamasina a été quadrillé par l’Emmoreg. Le portail d’entrée a même été cadenassé. Plusieurs centaines d’éléments ont été mobilisés à cette occasion.Autorisation.</p>'),
(2, 2, 1, 1, 1, 'affairesoamahamanina.jpg', 'Affaire Soamahamanina : 2 leaders du mouvement placés sous MD, perquisition chez Augustin Andriamananoro', '<p>Une dizaine d’enquêteurs ont passé au peigne fin le domicile de l’ancien ministre à Faliarivo Ampitatafika.L’affaire Soamahamanina avance à vitesse grand « V ».</p><p>Déférés au parquet du tribunal de première instance d’Anosy hier en début de soirée, les deux leaders de l’association Vona Soamahamanina, Pierre Robson et Tsihoarana Andrianony ont été placés sous mandat de dépôt à la maison d’arrêt d’Antanimora. Apparemment, l’enquête a été réalisée d’une manière très rapide. Faut-il rappeler qu’ils ont été interpellés dans leur domicile respectif jeudi soir.</p><p> D’après les informations, quatre chefs d’inculpations pèsent contre eux, entre autres, atteinte à la sûreté intérieure de l’Etat, manifestation sans autorisation et destruction de biens publics. Avec l’ancien ministre des Télécommunications du temps du régime transitoire, Augustin Andriamananoro, ils sont aussi accusés d’être responsables de la perte de l’arme d’un élément de l’Emmoreg qui aurait perdu son arme lors des échauffourées qui se sont produites à Soamahamanina jeudi dernier. De source proche du dossier, le procès de cette affaire aura lieu la semaine prochaine. Les deux leaders de l’association Vona Soamahamanina vont donc devoir séjourner au moins sept jours en prison.</p>'),
(3, 1, 2, 3, 2, 'secteurprive.jpg', 'Secteur privé : Une délégation malgache à la conquête du marché japonais', '<p>Le Japon importe déjà plus de 140 millions USD de produits de Madagascar. Mais les besoins de ce pays développé sont encore énormes.</p><p> Une quinzaine d’opérateurs malgaches participeront au voyage de promotion des exportations au Japon.Des représentants du secteur privé malgache, issus de divers secteurs d’activités effectueront un voyage de promotion des exportations au Japon, du 1er au 9 octobre 2016.</p><p> D’après l’ambassadeur du Japon à Madagascar, Ichiro Ogasawara, il s’agit d’une initiative du secteur privé des deux pays, qui est, cependant, appuyé par plusieurs entités, dont l’ambassade de Madagascar au Japon. « Cette mission se divisera en deux parties.</p><p> D’abord, la délégation participera au Global Festa Japan 2016 à Chiba, une grande foire qui permettra aux différents pays d’exposer leurs offres et où les participants et visiteurs se comptent en milliers. Ensuite, l’Ambassadeur de Madagascar au Japon organise une manifestation baptisée Made in Madagascar Exhibition, qui comprendra des ventes-expo et des rencontres B to B », a indiqué l’ambassadeur Ichiro Ogasawara.</p><p> Outre ces deux grands événements, une visite d’usine et de marché ; une visite auprès de JETRO (Organisation japonaise du commerce extérieur) ainsi que d’autres événements seront au programme de la mission de la délégation malgache. Cela inclut également le « Minato Citizens’Festival » qui se tiendra les 8 et 9 octobre au pied de Tokyo Tower.<p>'),
(4, 1, 2, 3, 2, 'eurocodes.jpg', 'Eurocodes : Application désormais obligatoire à Madagascar', '<p>Un Conseil Technique Malagasy de Normalisation en Génie Civil (CTMN-GC) a été mis en place, à l’issue du séminaire international sur les Eurocodes, la semaine dernière. Il s’agit d’une formation sur les normes, réglementations et techniques de conception ainsi que de calculs des ouvrages en génie civil, avec la participation de 100 ingénieurs et architectes de Madagascar.</p><p> D’après le Ministère des Travaux Publics, qui a organisé le séminaire en partenariat avec l’Institut national de l’infrastructure (Ininfra) et l’IST (Institut supérieur de technologie), les Eurocodes englobent des règles de calcul pour les constructions en béton, les ouvrages métalliques, les fondations, les calculs de séismes, la sécurité contre les incendies, etc. bref, des références de mesure dans le domaine du génie civil et des travaux publics.</p><p> Les eurocodes 0, 1, 2 et 3 seront désormais appliqués à Madagascar, d’après la résolution adoptée lors du séminaire du 19 au 23 septembre dernier. Le CTMN-GC a d’ailleurs été mis en place, pour accompagner le ministère de tutelle, dans la concrétisation de cette résolution.</p>'),
(5, 1, 2, 3, 2, 'saloniftm.jpg', 'Salon IFTM TOP RESA : Crainte d’attentat', '<p>Les attentats du Bataclan et de Nice, mais aussi ceux plus récents aux Etats-Unis pèsent visiblement sur le salon iftm TOP RESA Porte de Versailles à Paris où les mesures de sécurité sont strictes. En témoigne le panneau placé à l’entrée du Parc des Expositions où l’on peut lire : « VIGIPIRATE ALERTE ATTENTAT. Mesdames, Messieurs, par mesure de sécurité, nous vous demandons de bien vouloir présenter à nos agents, vos sacs et/ou bagages ouverts, pour une INSPECTION VISUELLE.</p><p> Tout refus entraînera la non-admission sur notre site, nous vous remercions de votre compréhension« .Ceux et celles qui se rendaient au rendez-vous mondial de l’industrie du tourisme se pliaient volontiers à cette fouille « visuelle » et à renfort de détecteur face à la psychose d’attentat.</p><p> Plus d’une fois, le métro a été ralenti voire arrêté à telle ou telle station en raison de l’existence de colis suspect. C’était déjà le cas à l’aéroport Roissy Charles De Gaulle où il y avait eu lundi dernier un bagage abandonné au Terminal 2E.</p><p> Ce qui avait amené la police de l’air et des frontières à procéder à un contrôle plus minutieux des passeports. Ce qui a évidemment pris plus de temps que d’habitude, mais les passagers à l’arrivée et/ou au départ ne s’en étaient pas plaints pour autant car il y allait de leur sécurité.</p><p> Les unes et les autres faisaient preuve de compréhension tel que c’était le cas Porte de Versailles où pour entrer, il fallait montrer patte blanche ou plutôt un badge électronique vérifié au scanner par les agents de sécurité omniprésents sur le site.></p>'),
(6, 2, 2, 1, 3, 'cultefjkm.jpg', 'Culte Fjkm : Présence toujours significative de Ravalomanana', '<p>Le pasteur Irako Andriamahazosoa Ammi appelle à la collaboration avec les autorités étatiques et non à la politisation de l’Eglise lors de son discours en marge du culte qui s’est déroulé hier à Mahamasina.Une foule de fidèles et de croyants a inondé le Palais des Sports et de la Culture Mahamasina, hier, en marge du culte ayant intronisé le nouveau  président de l’Eglise réformée (Fjkm), le pasteur Irako Andriamahazosoa Ammi, ainsi que les cinq autres membres du nouveau bureau.</p><p> Le culte a commencé à 14h30 et nombreuses personnalités ont répondu positivement à l’appel de l’Eglise. L’Etat a été représenté par le Chef du gouvernement, Mahafaly Solonandrasana Olivier et quelques ministres dont Narson Fidimanana, ministre auprès de la Présidence en charge des Projets Présidentiels, de l’Aménagement du Territoire et de l’Equipement, Marcel Benjamin Ramanantsoa, ministre des Transports, Bary Rafatrolaza, vice-ministre auprès des Affaires étrangères chargé de la Coopération et du Développement.</p><p> On note également la présence du président du Sénat, Honoré Rakotomanana et de quelques parlementaires tels que Zo Rakotoseheno, Hanitra Razafimanantsoa et Randriamandimbisoa Félix. Le conseiller spécial du chef de l’Etat, Jaobarison Randrianarivony, était aussi sur les lieux.</p>'),
(7, 2, 2, 4, 3, '', 'Politicien : Docteur Jekill et mister Hyde ?', '<p>Rappel, le  roman de Stevenson de 1886 raconte l’histoire d’un brillant médecin Docteur Jekill qui à la suite d’une formule de son invention peut changer de personnalité. Ainsi, peut-il être ange et  devenir à sa guise démon et vice-versa. Le politicien malgache a-t-il avalé cette potion ? Ange, il est, quand il veut séduire son auditoire. Il trouve les mots justes enfilés en    discours envoûtants  et  arrive  à drainer de nombreux sceptiques devenus partisans. Il trouve le talent de  subtiliser les angoisses des uns et des autres qui se substituent en lui. Et le voilà, jouant une  flûte enchantée charrier une foule prête à se sacrifier au rythme  de notes savamment distillées.</p><p> Un défilé  d’amnésiques, de ses  errements  passés, le suit, car il est  le Docteur Jekill.Démon, il est devenu quand pasteur, il est. Quand, au nom même de la protection  de ses ouailles, d’avant, il devient Père Fouettard. Il est devant, le bouclier pour ses moutons des attaques barbares venues troubler la sérénité. La puissance publique légitime, la coercition légale et la force du droit forment la carapace qui l’emmure des appels à la raison. Pour lui, il n’y a qu’une seule raison, la Raison d’Etat.</p><p> Le bonimenteur se révèle au grand jour. L’ordre, la stabilité martèlent-ils à longueur de journée et tant pis, les larmes forcées (dues aux bombes) n’y changeront rien. Et voilà, tantôt chatons tantôt chacals, ils sont toujours là pour berner le monde.Et malheur à ceux  qui dévoilent leur dessein inavoué, malheur à ceux qui osent démystifier les vérités vite oubliées.</p><p> Ils seront les damnés de la place, des vendus pour les uns et des jaloux  pour les autres. « …Exilé sur le sol au milieu des huées /Ses ailes de géant l’empêchent de marcher » avait dit Baudelaire.Attention, la morale est sauve dans le roman, puisque le méchant après voir ravagé tout son entourage a finalement été tué, mais a retrouvé à l’ultime instant son visage d’ange. Rares sont les hommes politiques qui n’ont pas connu de reconnaissance sous forme de funérailles nationales.</p>'),
(8, 2, 2, 4, 4, '', 'Conférence des bailleurs pour Madagascar : Les 1er et 2 décembre 2016 à Paris', '<p>Une réunion entre les Partenaires techniques et financiers et le Gouvernement s’est tenue, hier, à Mahazoarivo. Il a été annoncé, lors de cette rencontre, que la conférence des bailleurs et des investisseurs pour Madagascar se tiendra les 1er et 2 décembre 2016 au siège de l’Unesco à Paris.</p><p> Cette conférence est une étape pour la mise en œuvre des priorités du Plan National de Développement 2016-2020 (PND). Les grandes lignes de ce PND  avec les perspectives économiques et financières y afférentes et la situation de la gouvernance et l’environnement des affaires seront d’ailleurs présentées aux acteurs économiques et de développement  internationaux invités à la conférence dès la première matinée de ce rendez-vous international.</p><p> La situation et les défis du développement du capital humain touchant l’éducation, la santé, la nutrition et l’emploi des jeunes, du développement rural et des infrastructures publiques ainsi que les perspectives et le cadre d’investissement à Madagascar seront également débattus lors de ces échanges pour donner l’idée à de nouveaux partenaires de leurs apports potentiels à l’amélioration du quotidien et de l’avenir de  la population malgache.</p>'),
(9, 3, 2, 4, 4, 'eventculinaires.jpg', 'Evénements culinaires et gastronomiques : « Haify mampihavana » et « La fête de la gastronomie » émerveillent !', '<p>Les fins gourmets et les amateurs de cuisine et arts de la table, ce week-end, ont été particulièrement gâtés à travers les deux évènements dédiés à la gastronomie et l’art culinaire, au jardin d’Andohalo et à l’AFT Andavamamba.« Haify mampihavana ».</p><p> Foie gras, bougies anti-tabac/anti-moustiques, fruits confits, « koba » venus tout droit de Faravohitra Avaradrano, jus de canne à sucre au citron/gingembre, frites de manioc… mais également des produits inédits tels que des sandales créées à partir de « tsikafokafona » (jacinthe d’eau), des sacs et autres accessoires faits de coco…</p><p> Le week-end dernier, « Haify mampihavana », qui en était à sa troisième édition, a créé la surprise, mais a surtout fait le bonheur de tous, les simples curieux autant que les fins gourmets, amateurs de cuisine typiquement malgache. Outre les stands où ont été mis en vente différents produits, les visiteurs ont effectivement pu goûter aux diverses spécialités de restaurants mettant en avant des saveurs et des plats bien de chez nous : le « zanadandy », les « ramanonaka » au thon, les « menakely » à la cannelle, les « salihena » brochettes de zébu accompagnées de manioc ou d’achards de mangues à la façon Tuléaroise, ou encore la « Batata Voanio »… des mets tout aussi inédits que savoureux.</p> '),
(10, 3, 2, 4, 4, 'antsahamanitrahiphop.jpg', 'Antsahamanitra : Le hip hop old school renaît de ses cendres !', '<p>Samedi dernier, Antsahamanitra était le théâtre d’un évènement exceptionnel : les retrouvailles d’un public avec leurs idoles, mais surtout, les retrouvailles de plusieurs artistes avec la scène et leur passion.Des textes plus que réfléchis et d’autres plus divertissants, sans prise de tête, des beats instrumentaux de qualité où se glissent parfois des sonorités soul, jazz et funk,  des flow enivrants… Le tout, sans tomber dans l’écueil des stéréotypes inhérents au rap. Du rap, comme on en retrouve que rarement aujourd’hui.</p><p> Samedi dernier, les inconditionnels de hip hop ont replongé dans une autre ère, où seuls comptaient le talent et la créativité. Un retour dans les années 90, où le rap « gasy » commençait à prendre son envol. La belle époque ! Cet après-midi, les groupes « old school », après des années à être restés loin de la scène pour certains, se réconciliaient donc avec le micro.</p><p> Da Hopp, Mas DNK, Doublenn, Big Jimda, Buddah El taga, Rapadango, MC Tiga Nagar, North & Center, Takodah & Ngah B, Samantha & Kayah, Tovolah Karnaz, 8MM et TST Baz se sont ainsi relayés sur scène pour faire revivre leurs grands succès et renouer avec le public. Public qui a également grandi et qui a troqué depuis longtemps leur baggy tombant et leur T-shirt XXL, mode des rappeurs à l’époque, contre des skinny et straight jean et chemises.</p><p> Des retrouvailles qui ne faisaient donc pas seulement le bonheur des spectateurs, mais également de ces artistes pour qui, le hip hop n’est pas seulement un genre musical, mais surtout un mode de vie.</p>'),
(11, 3, 2, 1, 5, 'madajazzcar.jpg', 'Madajazzcar : 27 ans de passion pour cet événement culturel phare', '<p>La 27e édition du festival Madajazzcar se déroulera du 1er au 14 octobre, dans tout Tanà ville. Une soixantaine de groupes feront bouger la ville au rythme du jazz endiablé. Madajazzcar, rendez-vous annuel et incontournable des amoureux du jazz, prend de l’âge mais ne vieillit pas.</p><p> 27 ans d’histoire maintenant, de la passion et beaucoup de motivation pour chaque pour année organiser un festival d’envergure internationale, le comité fait tout pour que cet événement soit indélébile dans l’agenda culturel annuel malgache.</p><p> Chaque mois d’octobre, et ce pour beaucoup de férus de jazz à la fois à Madagascar comme à l’étranger, tout comme les jacarandas qui fleurissent, le Madajazzcar offre son bouquet musical.</p><p> L’histoire commence alors lorsque trois médecins passionnés de jazz, Dr Allain Razakatiana, Dr Bruno Razafindrakoto et Dr Henri Rakotondrabe décident, en 1988, de créer un jazz club à l’Alliance Française d’Andavamamba.</p><p> D’autres illustres musiciens et aficionados viendront les rejoindre, comme le Dr Hervé Razakaboana, Arnaud Razafy, Serge Rahoerson, les frères Raymond, Dédé et Jeannot Rabeson, les frères Gilles de Commarmand et plus tard Désiré Razafindrazaka, qui en est le président du comité d’organisation jusqu’à ce jour.</p>'),
(12, 4, 2, 1, 5, 'football.jpg', 'Football –Telma Coupe : Ajesaia et Adema passent à la trappe !', '<p>Coup de tonnerre à Fianarantsoa quand l’Adema se faisait battre par l’AS Comato lors des huitièmes de finale de la Telma Coupe de Madagascar.</p><p> Mais les gars d’Ivato n’étaient pas les seuls, car à Mahajanga, les militaires réalisaient aussi le hold-up parfait en bottant en touche l’Ajesaia.Deux grosses cylindrées sortent de la Telma Coupe de Madagascar de football par la plus petite des portes. C’est le résultat des huitièmes de finale qui ont ainsi su préserver leur esprit coupe avec leur lot de surprises.Artillerie lourde.</p><p> D’abord à Fianarantsoa où l’Adema s’est fait surprendre par l’AS Comato après les prolongations. Un score de 3 à 2 dont l’Adema aura du mal à s’en remettre, puisque le club d’Ivato n’avait plus que cette coupe pour sauver sa saison, mais c’était mal connaître la hargne de Comato qui n’a jamais baissé les bras.Ensuite à Mahajanga où malgré un but marqué assez tôt, l’Ajesaia fut rejoint au score grâce à un but de Julien.</p><p> Un superbe coup qui a obligé les deux camps à aller aux tirs au but. Mais enhardis par leur succès, les militaires ont sorti l’artillerie lourde pour prendre dans leur ligne de mire des gars d’Antanikatsaka qui ne savaient plus sur quel pied danser.</p><p> Presque logiquement les protégés du Général Rasata ont eu le dessus en marquant les cinq tirs alors que l’Ajesaia en a loupé un.</p>'),
(13, 4, 2, 3, 2, 'africacup.jpg', 'Africa Cup 7s : Les Makis échouent en demies !', '<p>Coup dur pour le camp malgache qui se faisait éliminer sur un détail en demi-finales du Championnat d’Afrique de Rugby à 7 qui s’est tenu au Kenya durant tout le week-end. Une courte défaite de 7 à 10 qui est restée à travers la gorge de Benja et ses camarades.</p><p>Madagascar avait toutes les cartes en main pour se hisser en finale de l’Africa Cup Sevens lors du sommet de Nairobi.Les Makis pourtant auteurs d’un début tonitruant en allant battre le Maroc par 19 à 0 et surtout la Zambie sur un score incroyable de 40 à 0, ont échoué d’un rien au cours de cette demi-finale à oublier.Crème mondiale.</p><p>Menant en effet par 7 à 5 au son du gong qui marquait la fin de la rencontre, les Makis n’ont pas pu empêcher les Namibiens de marquer un essai synonyme de qualification pour la finale mais aussi pour les World Sevens Series regroupant la crème mondiale du rugby à 7 à Hong Kong en 2017. </p><p>Un vrai coup dur, car échouer si près du but faisait mal. Très mal.Score fleuve. Ce fut donc les Namibiens qui remportent la rencontre par 10 à 7 au grand dam du camp malgache qui faisait pourtant figure de favori avant le coup, tant il a montré un rugby séduisant avec des joueurs très mobiles.</p>'),
(14, 4, 2, 3, 1, 'volleyball.jpg', 'Volley-ball – Championnats de Madagascar : Stef’Auto et GNVB comme prévu !', '<p>Les temps passent et les champions même en baisse de forme restent les mêmes.</p><p> C’était le cas samedi avec la victoire des dames de Stef’Auto contre AMVB, mais aussi celle de GNVB face au VBC Diamant.</p><p>Pas de surprise au sommet national de football, enfin presque, car on ne peut pas taire cette grève des arbitres ayant entraîné le report de plusieurs heures du début de la rencontre prévu à 7h30, mais qui n’a pu réellement commencé que vers 13h30.Arriérés.</p><p> La faute au président de la Fédération Malgache de volley coupable de ne pas avoir payé à temps les indemnités des arbitres au point que ces derniers n’ont à aucun moment cédé qu’après avoir reçu leurs dus.</p><p>Et si on est arrivé à ce bras de fer qui ternit pour beaucoup l’image de cette discipline déjà orpheline de par l’absence des sponsors, c’est bien parce qu’il y avait un antécédent lors du sommet de Fianar de l’année dernière où la Fédération avait mis six mois pour payer ses dettes.</p>'),
(24, 2, 3, 4, 3, 'imsdsdsds.jpg', 'final test Upload image', '<p>final test Upload image</p>\r\n\r\n<p>final test Upload image</p>\r\n\r\n<p>final test Upload image</p>\r\n\r\n<p>final test Upload image</p>\r\n'),
(28, 1, 4, 1, 3, 'questionmark.png', 'test Article 1', '<p>test Article 1&nbsp;test Article 1&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
`idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(25) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'Economie'),
(2, 'Politique'),
(3, 'Culture'),
(4, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
`idJournal` int(11) NOT NULL,
  `dateJournal` varchar(25) NOT NULL,
  `idUne` int(11) NOT NULL DEFAULT '0',
  `publier` varchar(5) NOT NULL DEFAULT 'non'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `journal`
--

INSERT INTO `journal` (`idJournal`, `dateJournal`, `idUne`, `publier`) VALUES
(1, '2016-10-03', 2, 'oui'),
(2, '2016-10-04', 1, 'oui'),
(3, '2017-03-24', 24, 'non'),
(4, '2017-03-26', 0, 'non');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`idUser` int(11) NOT NULL,
  `nomUser` varchar(25) NOT NULL,
  `mdpUser` varchar(25) NOT NULL,
  `estAuteur` varchar(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `mdpUser`, `estAuteur`) VALUES
(1, 'John Raseta', 'john', 'oui'),
(2, 'Jean Randria', 'jean', 'non'),
(3, 'Paul Rakoto', 'paul', 'oui'),
(4, 'Mamy Rabe', 'john', 'oui'),
(5, 'Oscar', 'oscar', 'oui');

-- --------------------------------------------------------

--
-- Structure de la vue `allarticle`
--
DROP TABLE IF EXISTS `allarticle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allarticle` AS select `a`.`idArticle` AS `idArticle`,`a`.`idAuteur` AS `idAuteur`,`a`.`idPublieur` AS `idPublieur`,`aa`.`nomAuteur` AS `nomAuteur`,`ap`.`nomPublieur` AS `nomPublieur`,`a`.`idCategorie` AS `idCategorie`,`c`.`nomCategorie` AS `nomCategorie`,`a`.`idJournal` AS `idJournal`,`j`.`dateJournal` AS `dateJournal`,`j`.`idUne` AS `idUne`,`j`.`publier` AS `publier`,`a`.`nomImage` AS `nomImage`,`a`.`titreArticle` AS `titreArticle`,`a`.`textArticle` AS `textArticle` from ((((`article` `a` join `journal` `j` on((`a`.`idJournal` = `j`.`idJournal`))) join `allauteur` `aa` on((`aa`.`idArticle` = `a`.`idArticle`))) join `allpublieur` `ap` on((`ap`.`idArticle` = `a`.`idArticle`))) join `categorie` `c` on((`c`.`idCategorie` = `a`.`idCategorie`)));

-- --------------------------------------------------------

--
-- Structure de la vue `allauteur`
--
DROP TABLE IF EXISTS `allauteur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allauteur` AS select `a`.`idArticle` AS `idArticle`,`a`.`idAuteur` AS `idAuteur`,`u`.`nomUser` AS `nomAuteur` from (`article` `a` join `user` `u` on((`a`.`idAuteur` = `u`.`idUser`)));

-- --------------------------------------------------------

--
-- Structure de la vue `allpublieur`
--
DROP TABLE IF EXISTS `allpublieur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allpublieur` AS select `a`.`idArticle` AS `idArticle`,`a`.`idPublieur` AS `idPublieur`,`u`.`nomUser` AS `nomPublieur` from (`article` `a` join `user` `u` on((`a`.`idPublieur` = `u`.`idUser`)));

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`idArticle`), ADD KEY `idCategorie` (`idCategorie`), ADD KEY `idJournal` (`idJournal`), ADD KEY `idAuteur` (`idAuteur`), ADD KEY `idPublieur` (`idPublieur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `journal`
--
ALTER TABLE `journal`
 ADD PRIMARY KEY (`idJournal`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `journal`
--
ALTER TABLE `journal`
MODIFY `idJournal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
