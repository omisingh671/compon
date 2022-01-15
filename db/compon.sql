-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 10:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compon`
--

-- --------------------------------------------------------

--
-- Table structure for table `compon_members`
--

CREATE TABLE `compon_members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `university` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `disciplines` varchar(255) NOT NULL,
  `membertype` varchar(255) NOT NULL,
  `lastmodified` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `orderno` int(3) NOT NULL,
  `extra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `compon_publications`
--

CREATE TABLE `compon_publications` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `authors` text NOT NULL,
  `journal` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `year` varchar(10) NOT NULL,
  `publicationlink` varchar(255) NOT NULL,
  `lastmodified` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `isfeatured` tinyint(1) NOT NULL DEFAULT 0,
  `orderno` int(3) NOT NULL,
  `author_id` int(11) NOT NULL,
  `extra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compon_publications`
--

INSERT INTO `compon_publications` (`id`, `title`, `description`, `authors`, `journal`, `country`, `year`, `publicationlink`, `lastmodified`, `status`, `isfeatured`, `orderno`, `author_id`, `extra`) VALUES
(1, 'Local Government Declarations for Net Zero Carbon Emissions by 2050 in Japan: A Questionnaire Survey on Climate Change Policies [地方自治体の2050年二酸化炭素排出実質ゼロ宣言: 気候変動政策に関する自治体調査から] [In Japanese]', 'Local governments around the world are increasingly issuing declarations to achieve net zero carbon emissions by 2050. Focusing on major municipalities and prefectures in Japan, we used a questionnaire to analyze differing degrees of commitment to climate mitigation and renewables and influencing factors. Out of 157 major local governments in Japan, we received 93 usable responses from governors and mayors and 146 from departments heading climate or energy policy. Results are categorized into “with declaration,” “under consideration” and “not considering” based on whether a declaration for zero emissions by 2050 is in place. Differences were found regarding the degree of interest in domestic and international trends around energy policy, proactiveness for climate change mitigation, and emphasis on decreasing local emissions. The analysis showed that “with declaration” and “under <p>consideration” governments are more likely to adopt an attitude of ecological modernization rather than pursuing a “Business as Usual” trajectory. While also observed in the \"under consideration\" group, overall, this group expressed less support for Japan to increase its national mid-term emissions reduction target. Also, while those “under consideration” reported challenges in installing renewable energy, the “with declaration” group demonstrated higher interest in promoting new local and municipal electric utilities for renewables.</p>', 'Tomoyuki Tatsumi, Takashi Nakazawa, Keiichi Satoh, Atsushi Nozawa, Kazuhiro Ikeda, Susumu Kitagawa, Masako Konishi, Gregory Trencher, Keiko Hirao, Koichi Hasegawa', 'Studies in informatics, Shizuoka University', 'Japan', '2021-03-01', 'http://h197.it.helsinki.fi/en/node/88', '2021-10-18 20:36:08', 'published', 1, 1, 1, ''),
(2, 'REDD+ in Indonesia: A new mode of governance or just another project?', '<p>Reducing Emission from Deforestation and Forest Degradation (REDD+), was adopted in Indonesia with an ambitious vision to promote a new mode of governance for Indonesia\'s forest, replacing a mode of ‘projectification’. Projectification, as described by Li (2016), is understood as a process through which plans for systematic long-term change collapse into incremental, simplified technical solutions. These proposals often fail to address complex socio-economic problems and political-economic contexts, allowing large-scale deforestation drivers to persist.</p>\n<p>We analyze whether Indonesia is on track toward transformational change or is conversely locked into projectification. We construct our analysis using results from a long-term study comprising surveys in 2012, 2015, and 2019 analyzing the evolving role of REDD+ in Indonesian forest governance. Combining qualitative and quantitative analysis, we examine changes in (i) discursive practices and policy beliefs; (ii) institutions and power relations; and (iii) informal networking relationships.</p>\n<p>Our findings show that despite high hopes and some promising developments, REDD+ has not yet fully succeeded in creating transformational change. Ideas of REDD+ remain focused on efficiency and technical aspects of implementation and do not question business as usual and the current political economic conditions favoring deforestation. The changing structure of the REDD+ policy network and exchanges between actors and groups over time suggest government actors and large funding organizations are becoming increasingly dominant, potentially indicating a return to established patterns of project-based governance.</p>', 'Moeliono, Moira, Brockhaus, Maria, Gallemore, Caleb, Dwisatrio, Bimo, Maharani, Cynthia D., Muharrom, Efrian, Pham, Thuy Thu', 'Forest Policy and Economics', 'REDD', '2020-12-01', 'http://h197.it.helsinki.fi/en/node/85', '2021-10-18 20:36:08', 'published', 1, 2, 1, ''),
(3, 'Incumbents\' Strategies in Media Coverage: A Case of the Czech Coal Policy', '<p>Transitioning to a decarbonized economy is a crucial part of climate change mitigation, with the phasing-out of coal, as the most significant source of carbon dioxide emissions, being the centerpiece of this effort. In the European context, the increasing pressures exerted especially on the basis of the European Union’s energy and climate policy, coupled with the inherent uncertainty of the transition process, encourage various struggles among the involved policy actors over the setting of specific transition pathways. One site of such contestation is media discourse, which may facilitate or limit policy change through agenda-setting, framing, and other processes. Importantly, discursive struggles also include industry incumbents, who have a vested interest in preserving the existing sociotechnical regime. This article focuses on the position of incumbents in terms of their relationship with governing political parties and the discursive strategies they employ. It exploresthe policy debate on coal mining expansion which took place in 2015 in the Czech Republic, a post-communist country with a coal-dependent economy, a skeptical position on energy transition, and a powerful energy industry. The research employs discourse network analysis to examine a corpus compiled from daily newspapers and applies block modeling techniques to analyze patterns of relationships within and between actor groups. The results show that incumbents successfully prevented policy change in the direction of rapid coal phase-out by exploiting discourse alignment with governing parties and efficiently employing discursive strategies based primarily on securitization of socioeconomic issues.</p>', 'Černý, Ondřej, & Ocelík, Petr', 'Politics and Governance', 'Czech Republic', '2020-06-01', 'http://h197.it.helsinki.fi/en/node/77', '2021-10-18 20:40:10', 'published', 1, 3, 1, ''),
(4, 'Media Coverage and Perceived Policy Influence of Environmental Actors:Good Strategy or Pyrrhic Victory?', '<p>In this article we analyze how media coverage for environmental actors (individual environmental activists and environmental movement organizations) is associated with their perceived policy influence in Canadian climate change policy networks.We conceptualize media coverage as the total number of media mentions an actor received in Canada’s two main national newspapers—the Globe and Mailand National Post. We conceptualize perceived policy influence as the total number of times an actor was nominated by other actors in a policy network as being perceived to be influential in domestic climate change policy making in Canada. Literature from the field of social movements, agenda setting, and policy networks suggests that environmental actors who garner more media coverage should be perceived as more influential in policy networks than actors who garner less coverage. We assess support for this main hypothesis in two ways. First, we analyze how actor attributes (such as the type of actor) are associated with the amount of media coverage an actor receives. Second, we evaluate whether being an environmental actor shapes the association between media coverage and perceived policy influence. We find a negative association between media coverage and perceived policy influence for individual activists, but not for environmental movement organizations. This case raises fundamental theoretical questions about the nature of relations between media and policy spheres, and the efficacy of media for signaling and mobilizing policy influence.</p>', 'Howe, Adam C., Stoddart, Mark C. J., & Tindall, David B.', 'Politics and Governance', 'Canada', '2020-06-01', 'http://h197.it.helsinki.fi/en/node/78', '2021-10-18 20:40:10', 'published', 1, 4, 1, ''),
(5, 'The Science-Policy Interface as a Discourse Network: Finland\'s ClimateChange Policy 2002–2015', '<p>In this article, we argue that the science-policy interface can be understood as a discourse network constituted by discursive interaction between scientific organizations and other actors that both use scientific arguments in conjunction with other policy arguments. We use discourse network analysis to investigate the climate change policy process in Finland between 2002 and 2015, focusing on the role of and relationships between scientific actors and arguments in the discourse networks. Our data consist of policy actors’ written testimonies on two law proposals, the ratification of the Kyoto Protocol (2002) and the enactment of the Finnish Climate Law (2015). Our results show that two competing discourse coalitionshave influenced the development of climate change policy in the 2000s. In 2002, the dominant coalition was economic, prioritizing economic growth over climate change mitigation. In 2015, the climate coalition that argued for ambitious mitigation measures became dominant. The majority of scientific actors were part of the dominant economy coalition in 2002 and part of the dominant ecology coalition in 2015. The centrality of scientific arguments increased over time, and both discourse coalitions used them progressively more. These developments reflect the increasingly central position of science in Finnish climate policymaking. We contribute to the literature on the science-policy interface by operationalizing the interface as a set of connections in a discourse network and by showing how the analysis of discourse networks and their properties can help us understand the shifts in the role of science in policymaking over time.</p>', 'Kukkonen, Anna, & Ylä-Anttila, Tuomas', 'Politics and Governance', 'Finland', '2020-06-01', 'http://h197.it.helsinki.fi/en/node/76', '2021-10-18 20:44:20', 'published', 1, 5, 1, ''),
(6, 'Attitudes and Opinions of Mayors on “Local Agreement” for Restarting Hamaoka Nuclear Power Plants: Report on a Survey in 2018 [原発再稼働をめぐる〈地元合意〉についての首長の認識と態度: 浜岡原子力発電所の再稼働に関する首長アンケート調査から] [In Japanese]', '<p>The purpose of this research is to understand the attitudes and opinions of mayors on \"local agreement\" over the restart of Hamaoka nuclear power plants. It has been increasingly significant to explore \"how local agreement over the resumption of nuclear power plants should be made,\" given the geographical extent of damage caused by the Fukushima accident, the establishment of Urgent Planning Zone(UPZ), and the rise of prefectural referendum campaigns.</p>\r\n<p>The questionnaire survey was conducted in the spring of 2018 by posting to the mayors of 235 municipalities, including 35 municipalities in Shizuoka prefecture and 200 in the other four prefectures in the area of Chubu Electric Power. The results showed the following three points. Firstly, the conventional “local agreement,\" which was made only by the host and neighboring municipalities, was losing support, and instead, UPZ was more favored as the desirable range of agreement. Secondly, the survey found a tendency of some mayors to strategically favor ways of \"local agreement\" based on their positions to the restart of Hamaoka nuclear power plants. Third, the result showed the difficulty of implementing the prefectural vote.</p>\r\n<p>It is increasingly significant to consider how a \"local agreement\" should be. By clarifying the mayors\' attitudes on \"local agreement,\" this survey made an important step in not only understanding the political dynamics over \"local agreement\" but also exploring the ideal way of making that.</p>', 'Tomoyuki Tatsumi, Takashi Nakazawa', 'Studies in informatics, Shizuoka University', 'Japan', '2020-03-01', 'http://h197.it.helsinki.fi/en/node/89', '2021-10-18 20:44:20', 'published', 1, 6, 1, ''),
(7, 'Actors and justifications in media debates on Arctic climate change in Finland and Canada: A network approach', 'In this paper, we examine the centrality of policy actors and moral justifications in media debates on Arctic climate change in Finland and Canada from 2011–2015. We take a network approach on the media debates by analysing relations between the actors and justifications, using discourse network analysis on a dataset of 745 statements from four newspapers. We find that in both countries, governments and universities are the most central actors, whereas business actors are the least central. Justifications that value environmental sustainability and scientific knowledge are most central and used across actor types. However, ecological justifications are sometimes in conflict with market justifications. Government actors emphasize new economic possibilities in the Arctic whereas environmental organizations demand greater protection of the vulnerable Arctic. Ecological justifications and justifications that value international cooperation are more central in the Finnish debate, whereas justifications valuing sustainability and science, as well as those valuing national sovereignty, are more central in the Canadian debate. We conclude that in addition to the centrality of specific policy actors in media debates, the use of different types of moral justifications also reflects political power in the media sphere.', 'Kukkonen, Anna, Stoddart, Mark C., & Ylä-Anttila, Tuomas', 'Acta Sociologica', 'Comparative', '2020-03-01', 'http://h197.it.helsinki.fi/en/node/71', '2021-10-21 17:30:35', 'published', 0, 7, 0, ''),
(8, 'Climate change policy networks: connecting adaptation and mitigation in multiplex networks in Peru', 'Increasing attention is being given to integrating adaptation and mitigation in climate change policies. Policy network analysis is a way to explore connections between adaptation and mitigation, and the opportunities or barriers to effective integration between these two policy subdomains. This study explores climate governance and policy networks by examining collaboration and information flows in national policy processes in Peru, a country with an active climate change policy domain. In contrast to most climate policy network analyses, this study distinguishes adaptation and mitigation subdomains through a multiplex approach. We used ERGM (Exponential Random Graph Models) to explain the existence of information flows and collaborations among 76 key actors in climate change policy in Peru. We identified actors who could connect adaptation and mitigation subdomains. Results show a concentration of influence in national government actors, particularly in the mitigation subdomain, and the isolation of actor groups that matter for policy implementation, such as the private sector or subnational actors. Results highlight the predominance of mitigation over adaptation and the existence of actors well positioned to broker relationships between the subdomains. The top brokers across subdomains were, however, not only actors with high centrality and brokerage roles in the subdomains, but also several ‘unusual key players’ that were not brokers in any of the two layers separately.', 'Locatelli, Bruno, Pramova, Emilia, Di Gregorio, Monica, Brockhaus, Maria, Armas Chávez, Dennis, Tubbeh, Ramzi, Sotés, Juan & Perla, Javier', 'Climate Policy', 'REDD', '2020-02-01', 'http://h197.it.helsinki.fi/en/node/86', '2021-10-21 17:30:35', 'published', 0, 8, 0, ''),
(9, 'Information Exchange Networks at the Climate Science-Policy Interface: Evidence from the Czech Republic, Finland, Ireland and Portugal', 'Scientifically informed climate policymaking starts with the exchange of credible, salient, and legitimate scientific information between scientists and policymakers. It is therefore important to understand what explains the exchange of scientific information in national climate policymaking processes. This article applies exponential random graph models to network data from the Czech Republic, Finland, Ireland, and Portugal to investigate which types of organizations are favored sources of scientific information and whether actors obtain scientific information from those with similar beliefs as their own. Results show that scientific organizations are favored sources in all countries, while only in the Czech Republic do actors obtain scientific information from those with similar policy beliefs. These findings suggest that actors involved in climate policymaking mostly look to scientific organizations for information, but that in polarized contexts where there is a presence of influential denialists overcoming biased information exchange is a challenge.', 'Wagner, Paul, Gronow, Antti, Ylä-Anttila, Tuomas, Ocelik, Petr & Schmidt, Luisa', 'Governance', 'Comparative', '2020-02-01', 'http://h197.it.helsinki.fi/en/node/73', '2021-10-21 17:31:37', 'published', 0, 9, 1, ''),
(10, 'When Climate is not Blamed: The politics of disaster attribution in international perspective', 'Analyzing the politics and policy implications in Brazil of attributing extreme weather events to climate change, we argue for greater place-based sensitivity in recommendations for how to frame extreme weather events relative to climate change. Identifying geographical limits of current recommendations to emphasize the climate role in such events, we explore Brazilian framings of the two tragic national disasters, as apparent in newspaper coverage of climate change. We find that a variety of contextual factors compel environmental leaders and scientists in Brazil to avoid and discourage highlighting the role of climate change in national extreme events. Against analysts’ general deficit-finding assumptions, we argue that the Brazilian framing tendency reflects sound strategic, socio-environmental reasoning, and discuss circumstances in which attributing such events to climate change—and, by extension, attribution science—can be ineffective for policy action on climate change and other socio-environmental issues in need of public pressure and preventive action. The case study has implications beyond Brazil by begging greater attention to policies and politics in particular places before assuming that attribution science and discursive emphasis on the climate role in extreme events are the most strategic means of achieving climate mitigation and disaster preparedness. Factors at play in Brazil might also structure extreme events attribution politics in other countries, not least some other countries of the global South.', 'Lahsen, Myanna, de Azevedo Couto, Gabriela & Lorenzoni, Irene', 'Climatic Change', 'Brazil', '2020-01-01', 'http://h197.it.helsinki.fi/en/node/75', '2021-10-21 17:31:37', 'published', 0, 10, 1, ''),
(11, 'Explaining collaboration in consensual and conflictual governance networks', 'The conditions under which policy beliefs and influential actors shape collaborative behaviour in governance networks are not well understood. This article applies exponential random graph models to network data from Finland and Sweden to investigate how beliefs, reputational power and the role of public authorities structure collaboration ties in the two countries’ climate change governance networks. Results show that only in Finland\'s conflictual climate policy domain do actors collaborate with those with similar beliefs and with reputational power, while only in Sweden\'s consensual climate policy domain do public authorities play central impartial coordinating roles. These results indicate that conflict is present in a governance network when beliefs and reputational power determine collaboration and that it is absent when public authorities occupy central roles. They also suggest that relative success in climate policy action is likely to occur when public authorities take on network manager roles.', 'Gronow, Antti, Wagner, Paul & Ylä-Anttila, Tuomas', 'Public Administration', 'Comparative', '2019-11-01', 'http://h197.it.helsinki.fi/en/node/72', '2021-10-21 17:39:13', 'published', 0, 11, 1, ''),
(12, 'Identifying the ‘Fukushima Effect’: in Germany through policy actors’ responses – Evidence from the G-GEPON 2 survey', 'The nuclear meltdown in Fukushima, Japan, on March 11, 2011 (“3.11”) prompted global changes in national energy policies. Public discourse created the image that “Fukushima” had prompted Germany’s Energiewende, and much research asking why the reaction of decision makers in Germany was significantly different from those in Japan has been conducted since that time. However, the effect on policy actors themselves in the policy-making network has been overlooked. Taking Germany’s socio-political history into account, we question such conclusions and argue that the measurable effect is much less than some conclude. Using an unconventional merged methods research design and innovative survey instrument with a policy-actor-network approach (the G-GEPON 2 Survey), we asked major German policy actors, interest groups, stakeholders, and civil society actors about their opinions, attitudes and governmental support regarding energy policy decisions pre- and post-Fukushima. We found that an established institutional landscape of policy actors and their cooperation in policy processes has not been affected by 3.11. New forms of inquiry for policy research show the potential to provide insights into policy processes which were not measurable with traditional single-method inquiries. Furthermore, we have found that emulation of national legal frameworks must consider socio-political traditions. We attempt to create new forms of investigation to reveal hidden structures in policy processes which are empirically difficult to grasp.', 'Hartwig, Manuela and Tkach-Kawasaki, Leslie', 'Quality & Quantity', 'GEPON', '2019-03-01', 'http://h197.it.helsinki.fi/en/node/84', '2021-10-21 17:40:36', 'published', 0, 12, 1, ''),
(13, 'T1 - T', '', 'amar', 'journal-title', 'India', '2014', 'http://localhost/compon-dev/', '2022-01-14 19:29:52', 'draft', 0, 1, 0, ''),
(14, 'T1', '', 'amar', 'journal-title', 'India', '2014', 'http://localhost/compon-dev/', '2022-01-14 19:32:50', 'draft', 0, 1, 0, ''),
(15, 'T2', '', 'amar', 'journal-title2', 'India', '2011', 'http://localhost/compon-dev/', '2022-01-14 19:43:03', 'published', 0, 0, 0, ''),
(16, 'T4 - 1234', '', 'amar', 'journal-title4', 'India', '2020', 'http://localhost/compon-dev/', '2022-01-14 21:11:22', 'published', 1, 12, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `compon_users`
--

CREATE TABLE `compon_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userauth` varchar(300) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compon_users`
--

INSERT INTO `compon_users` (`id`, `username`, `email`, `userauth`, `role`, `status`) VALUES
(1, 'admin', 'mailtestphpmailer@gmail.com', '2e4e7dce547aa88a470076bb91d2e658', 'admin', 'published');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compon_members`
--
ALTER TABLE `compon_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compon_publications`
--
ALTER TABLE `compon_publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compon_users`
--
ALTER TABLE `compon_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compon_members`
--
ALTER TABLE `compon_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compon_publications`
--
ALTER TABLE `compon_publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `compon_users`
--
ALTER TABLE `compon_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
