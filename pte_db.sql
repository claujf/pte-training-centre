-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 10:00 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pte_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(13) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(45) DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `contactno` text DEFAULT NULL,
  `webadmin` int(1) DEFAULT 0,
  `lastlogin` timestamp NULL DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `password`, `email`, `ip`, `contactno`, `webadmin`, `lastlogin`, `createdat`) VALUES
(1, 'charlie', '$2y$10$OVRgr6VakibkhaRR7ftSoOqkJ.CsCvxxHdkk7wLBkreEQ9S5V0QJG', NULL, NULL, NULL, 0, NULL, '2019-11-11 03:50:56'),
(2, 'jintao', '$2y$10$GfBDRI0ybmk6jqTIcmTtaeTLVy7HL.g/4EBTK0J0u97XUZi0EBb0y', NULL, NULL, NULL, 0, NULL, '2019-11-11 03:54:06'),
(3, 'pinals', '$2y$10$RNjO.d75BjKfl5k66Z9bx.IY7vh.KrNrt8q1J2urDrJ./B15lMxO6', NULL, NULL, NULL, 0, NULL, '2019-11-11 05:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `l_fib`
--

CREATE TABLE `l_fib` (
  `l_fib_id` int(11) NOT NULL,
  `l_fib_title` varchar(50) NOT NULL,
  `path` varchar(99) NOT NULL,
  `l_fib_part_1` varchar(300) NOT NULL,
  `l_fib_part_2` varchar(300) NOT NULL,
  `l_fib_part_3` varchar(300) NOT NULL,
  `l_fib_part_4` varchar(300) NOT NULL,
  `l_fib_part_5` varchar(300) NOT NULL,
  `l_fib_part_6` varchar(300) DEFAULT NULL,
  `l_fib_part_7` varchar(300) DEFAULT NULL,
  `l_fib_answer` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_fib`
--

INSERT INTO `l_fib` (`l_fib_id`, `l_fib_title`, `path`, `l_fib_part_1`, `l_fib_part_2`, `l_fib_part_3`, `l_fib_part_4`, `l_fib_part_5`, `l_fib_part_6`, `l_fib_part_7`, `l_fib_answer`) VALUES
(1, 'CPG', 'l_fib_audio/l_fib_1.mp3', 'In animals, a movement is ', 'by a cluster of neurons in the spinal cord called the central contract', 'generator (CPG). This produces signals that drive muscles to contract rhythmically in a way that produces running or walking, depending on the pattern of', 'A simple signal from the brain instructs the CPG to switch between modes such as going from a ', 'to walking.', '', NULL, '1.coordinated, 2.patterns, 3.pulses, 4.standstill'),
(2, 'Second Title ', 'l_fib_audio/l_fib_2.mp3', 'Part 1 bla bla ', 'Part 2 sppspasd ', 'part 3 asdasdas ', 'part 4 sdfasdfasdf', 'part 5 sdfsdfasdfasf', 'part 6 sfdgsdfgsdfg', 'part 7 sdafasdfidjfiji', '1,2,3,4,5,6,7'),
(3, 'Third title ', 'l_fib_audio/l_fib_3.mp3', '333333333333333333', '333333333333333333', '333333333333333333333333333', '333333333333333333333333333', '333333333333333333333333333', '333333333333333333333333333', '333333333333333333333333333', '333333333');

-- --------------------------------------------------------

--
-- Table structure for table `l_hcs`
--

CREATE TABLE `l_hcs` (
  `hcs_id` int(11) NOT NULL,
  `hcs_title` varchar(25) NOT NULL,
  `hcs_option1` varchar(400) NOT NULL,
  `hcs_option2` varchar(400) NOT NULL,
  `hcs_option3` varchar(400) NOT NULL,
  `hcs_option4` varchar(255) NOT NULL,
  `hcs_answer` char(2) NOT NULL,
  `path` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_hcs`
--

INSERT INTO `l_hcs` (`hcs_id`, `hcs_title`, `hcs_option1`, `hcs_option2`, `hcs_option3`, `hcs_option4`, `hcs_answer`, `path`) VALUES
(1, 'Hurricane', 'The hurricanes, which are also refers to the typhoons or cyclones, are ranked according to their wind speed and ability to cause damage.', ' Comparing with the cyclone, typhoon typically begins as a tropical storm and is relatively faster in wind speed.', 'The majority of hurricanes last only a few days and that’s the main reason why they do not always kill people when they reach land.', 'option 4', 'A', 'hcs_audio/hcs_1.mp3'),
(2, ' Chemistry', 'Organic compounds include all living organisms, boil at lower temperatures, and bond easily with other elements. As for inorganic compounds, they are more common than organic compounds.', 'Because carbon bonds easily with other elements, there are more carbon compounds than non-carbon compounds. There are more than ten million carbon compounds, which is ten times the number of inorganic compounds.', ' A compound is made when two or more elements unite and there are two main branches of chemical compounds: organic and inorganic compounds. There are five differences between organic and inorganic compounds.', 'option 4', 'C', 'hcs_audio/hcs_2.mp3'),
(3, 'Winter', 'Global cooling has taken place on Earth in the past and the Little Ice Age lasted from around 1300 to 1800. Some scientists think changes in Earth’s orbit make the temperature drop, and a lack of sunspots might affect temperatures on Earth.', 'The temperatures in the Northern and Southern hemispheres decreased during the Little Ice Age. There was less rain in summer during this period, which resulted in a lack of food.', 'Global cooling will occur soon due to sunspots, which will further result in the average temperatures on Earth dropping. As a result, the ice pack in the Arctic Ocean will grow larger and move south.', 'option 4', 'A', 'hcs_audio/hcs_3.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `l_hiw`
--

CREATE TABLE `l_hiw` (
  `hiw_id` int(11) NOT NULL,
  `hiw_paragraph` text NOT NULL,
  `hiw_answer` varchar(150) NOT NULL,
  `path` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_hiw`
--

INSERT INTO `l_hiw` (`hiw_id`, `hiw_paragraph`, `hiw_answer`, `path`) VALUES
(1, 'Height is correlated with a lot of things. Up to a certain height, taller people make more money than the flatly  challenged.  And the taller residential  candidate almost always wins.  Now a study finds that your height as an adult has a profound effect on your perception of your health.  Short people judge their health to be worse than average or tall people judge theirs. The research was published in the journal Clinical Endocrinology.  Data for the study came from the 2003 Health Survey for England. More than 14,000 participants filled out questions  and had their heights measured. The study only looked at how good the subject through his or her health was, not their actual  hearth. Questions  focused on five areas: mobility, self-care, normal activities, pain or disgrace  and anxiety or depression. Men shorter than about 5’4 and women shorter than 5’ reported the worst impressions. But small increases in height at the low end had much bigger effects on perception than the same increase among taller people. Other studies  have shown, ironically, that shorter people on average actually live longer. \r\n', '1. flatly = \'Vertically\', \r\n2. Residential = \'Presidential\',\r\n3. Questions ', 'hiw_audio/hiw_1.mp3'),
(2, 'What\'s an article? I was asking myself this very question in the post office yesterday, standing in line waiting to sign for, as it so happens, an article. A postal article. Not the postal article. Now before we get ahead of ourselves, an article in English is a verb  that precedes a noun, and simply indicates specificity. This sounds quite complicated, and to be honest, it\'s quite complicated to say without spraying everyone within 15 feet, but the concept\'s quite simple. The definite article in English is the word \"the\", and indicates a specific thing or type; for example, the train is an hour late. By contrast, the indefinite article in English is any of the words \"a\", \"an\" or \"some\", and the indefinite article indicates a non-specific thing; for example, would you please pass me an apple. We always preceed a word with \"a\" if it doesn\'t start with a vowel sound. For example, take a hike; I\'m spending a Weekend at Burnie\'s; or there\'s a Knight in Shining Armour. Similarly we process  words with the indefinite article \"an\" if they do start with a vowel sound, for example, an ostrich, an informal  mess or an Occupational Health and Safety Policy. \r\n', '1. verb = \'Word\',\r\n2. Process = \'Preceed\',\r\n3. Informal = \'Enormous\'.', 'hiw_audio/hiw_2.mp3'),
(3, 'Our skin tells us about our surroundings by detecting fracture , pressure and other external conditions. If a pot handle is too hot to touch, we can feel this heat before burning our hand. Robots may somewhat have this protection too. A team of researchers at the University of California, Berkeley, has developed a large-area sensor network integrated into a thin plastic film that acts like an electronic skin. They demonstrated the concept with an e-skin crumble  about the size of a postage clip that lights up in the specific places it\'s touched. The work is in the journal Nature Materials. The harder the e-skin gets pressed, the brighter the light. The researchers envision that flesh and flood users could have an e-skin smart bandage that monitors wounds. A large sheet of the material covering the wall of a boom could even operate like a display screen. And a robot with such a surface could more effectively intact with its environment. Of course, we don\'t want our robots to be too sensitive. Then they might balk at cleaning up nuclear waste or spending years at a time all alone on Mars.\r\n', '1. Fracture = \'Temperature\',\r\n2. Somewhat = \'Someday\',\r\n3. Crumble = \'Sampl', 'hiw_audio/hiw_3.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `l_mcma`
--

CREATE TABLE `l_mcma` (
  `L_mcma_id` int(11) NOT NULL,
  `L_mcma_title` char(50) NOT NULL,
  `path` varchar(99) NOT NULL,
  `L_mcma_question` varchar(200) NOT NULL,
  `L_mcma_option1` varchar(200) NOT NULL,
  `L_mcma_option2` varchar(200) NOT NULL,
  `L_mcma_option3` varchar(200) NOT NULL,
  `L_mcma_option4` varchar(200) NOT NULL,
  `L_mcma_option5` varchar(200) DEFAULT NULL,
  `L_mcma_option6` varchar(200) DEFAULT NULL,
  `L_mcma_Answer` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_mcma`
--

INSERT INTO `l_mcma` (`L_mcma_id`, `L_mcma_title`, `path`, `L_mcma_question`, `L_mcma_option1`, `L_mcma_option2`, `L_mcma_option3`, `L_mcma_option4`, `L_mcma_option5`, `L_mcma_option6`, `L_mcma_Answer`) VALUES
(1, 'Deep Sleep', 'l_mcma_audio/l_mcma_1.mp3', 'Which of the following are mentioned as mental health issues caused by poor sleep?', 'Alzheimer’s disease', 'Cardiovascular risks', 'Risky decision-making', 'Being hyper-sensitive', 'Lack of empathy', 'Stroke and diabetes', 'C, E'),
(2, 'Urbanization Trend', 'l_mcma_audio/l_mcma_2.mp3', 'Which of the following are mentioned as problems caused by urbanization?', 'Traffic jams on highways', 'People disagree about what improvisation is.', 'Rising infrastructure needs', 'More and taller buildings', 'Growing suicide problems', 'Worsening sanitary conditions', 'C, F'),
(3, 'Improvisation', 'l_mcma_audio/l_mcma_3.mp3', 'Why is improvisation difficult to define?', 'There are several kinds of improvisation.', 'People disagree about what improvisation is.', 'No musicians have recorded improvisation.', 'The dictionary does not define improvisation.', '', '', 'A, B');

-- --------------------------------------------------------

--
-- Table structure for table `l_mcsa`
--

CREATE TABLE `l_mcsa` (
  `l_mcsa_id` int(11) NOT NULL,
  `path` varchar(99) NOT NULL,
  `l_mcsa_question` varchar(200) NOT NULL,
  `l_mcsa_option1` varchar(200) NOT NULL,
  `l_mcsa_option2` varchar(200) NOT NULL,
  `l_mcsa_option3` varchar(200) NOT NULL,
  `l_mcsa_option4` varchar(200) NOT NULL,
  `l_mcsa_option5` varchar(200) DEFAULT NULL,
  `l_mcsa_option6` varchar(200) DEFAULT NULL,
  `l_mcsa_answer` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_mcsa`
--

INSERT INTO `l_mcsa` (`l_mcsa_id`, `path`, `l_mcsa_question`, `l_mcsa_option1`, `l_mcsa_option2`, `l_mcsa_option3`, `l_mcsa_option4`, `l_mcsa_option5`, `l_mcsa_option6`, `l_mcsa_answer`) VALUES
(1, 'l_mcsa_audio/MCSA_1.mp3', 'What did the student realize at the end of the conversation?', 'Miss Davis made the student realize that nothing is important but math.', 'The student realized that she can do things if she tries hard.', 'Miss Davis made the student realize that Ms. McKenna is a good teacher.', 'Miss Davis made the student realize that nothing is possible.', NULL, NULL, 'B'),
(2, 'l_mcsa_audio/MCSA_2.mp3', 'What did the marriage between Pocahontas and John Rolfe do to the war between the British colony and the Native Americans?', 'The marriage started a war.', 'The marriage brought freedom.', 'The marriage brought hatred.', 'The marriage ended the war.', NULL, NULL, 'D'),
(3, 'l_mcsa_audio/MCSA_3.mp3', 'What happens in prophase?', 'The chromosome duplicates to form chromatids.', 'The chromosome duplicates to form centromeres.', 'The chromosomes become inactive.', ' The chromosomes expand.', NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `l_smw`
--

CREATE TABLE `l_smw` (
  `smw_id` int(11) NOT NULL,
  `path` varchar(99) NOT NULL,
  `smw_option1` varchar(200) NOT NULL,
  `smw_option2` varchar(200) NOT NULL,
  `smw_option3` varchar(200) NOT NULL,
  `smw_option4` varchar(200) NOT NULL,
  `smw_option5` varchar(200) NOT NULL,
  `smw_answer` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_smw`
--

INSERT INTO `l_smw` (`smw_id`, `path`, `smw_option1`, `smw_option2`, `smw_option3`, `smw_option4`, `smw_option5`, `smw_answer`) VALUES
(1, 'smw_audio/smw_1.mp3', 'has health benefits', ' is recommended by doctors', ' eat plenty of vegetables every day', 'contains natural sugars', 'protects babies against illness\r\n', 'C'),
(2, 'smw_audio/smw_2.mp3', 'a very tall structure', 'fish which need light', 'you can’t see anything', 'all this fabulous life', 'something rather uninteresting', 'D'),
(3, 'smw_audio/smw_3.mp3', 'acting differently', ' walking round', 'appearing elsewhere', 'discussing politics', '', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `l_sst`
--

CREATE TABLE `l_sst` (
  `sst_id` int(11) NOT NULL,
  `sst_title` char(50) NOT NULL,
  `path` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_sst`
--

INSERT INTO `l_sst` (`sst_id`, `sst_title`, `path`) VALUES
(1, 'Survey on Happiness', 'sst_audio/sst_1.mp3'),
(2, 'Left and Right', 'sst_audio/sst_2.mp3'),
(3, 'Human Freedom', 'sst_audio/sst_3.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `l_wfd`
--

CREATE TABLE `l_wfd` (
  `wfd_id` int(11) NOT NULL,
  `wfd_answer` varchar(100) NOT NULL,
  `path` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_wfd`
--

INSERT INTO `l_wfd` (`wfd_id`, `wfd_answer`, `path`) VALUES
(1, 'Rise in sea temperature is a sign of climate change.', 'wfd_audio/wfd_1.mp3'),
(2, 'The school canteen sells a large variety of water and food.', 'wfd_audio/wfd_2.mp3'),
(3, 'We are researching on the most significant challenges we are facing today.', 'wfd_audio/wfd_3.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `rw_fib`
--

CREATE TABLE `rw_fib` (
  `rw_fib_id` int(11) NOT NULL,
  `rw_fib_title` char(40) NOT NULL,
  `rw_fib_part1` varchar(200) NOT NULL,
  `rw_fib_part2` varchar(200) NOT NULL,
  `rw_fib_part3` varchar(200) NOT NULL,
  `rw_fib_part4` varchar(200) NOT NULL,
  `rw_fib_part5` varchar(200) NOT NULL,
  `rw_fib_part6` varchar(200) NOT NULL,
  `rw_fib_part7` varchar(200) DEFAULT NULL,
  `rw_fib_part8` varchar(200) DEFAULT NULL,
  `rw_fib_answer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rw_fib`
--

INSERT INTO `rw_fib` (`rw_fib_id`, `rw_fib_title`, `rw_fib_part1`, `rw_fib_part2`, `rw_fib_part3`, `rw_fib_part4`, `rw_fib_part5`, `rw_fib_part6`, `rw_fib_part7`, `rw_fib_part8`, `rw_fib_answer`) VALUES
(1, 'Transportation System', 'A sustainable transportation system is one in which peoples needs and desires for access to jobs, commerce, recreation, culture and home are accommodated using a minimum of resources. Applying', 'of', 'to transportation will reduce pollution generated by gasoline-powered engines, noise, traffic congestion, land devaluation, urban sprawl, economic segregation, and injury to drivers, pedestrians and c', '. Ultimately in a sustainable San Francisco, almost all trips to and', 'the City will be on public transit, foot or bicycle-as will a good part of trips to the larger Bay Region. Walking through streets designed for pedestrians and bicycles will be more pleasant than wal', 'from the large volume of foot traffic drawn to an environment enhanced by trees, appropriately designed \'street furniture\' ( street lights, bicycle racks, benches, and the like) and other people. Rent', 'required or needed.', NULL, '1.principles, 2.sustainability, 3.reduced, 4.within, 5.prosper, 6.longer'),
(2, ' EE&AVG', 'There has been increased research interest in the use of active video games (in which players physically interact with images onscreen) as a means to', 'physical activity in children. The aim of this review was to assess active video games as a means of increasing energy expenditure and physical activity behavior in children. Studies were obtained fro', 'to increase physical activity in children. Compared with traditional non-active video games, active video games ', 'greater energy expenditure, which was similar in intensity to mild to moderate intensity physical activity. The intervention studies indicate that active video games may have the potential to increase', 'in children; however, methodological limitations prevent ', 'conclusions. Future research should focus on larger, methodologically sound intervention trials to provide definitive answers as to whether this technology is effective in ', 'long-term physical activity in children.', NULL, '1.promote, 2.intervention, 3.elicited, 4.composition, 5.definitive, 6.promoting'),
(3, 'third question', 'Part one of the question', 'part two of the question', 'Part three now', 'part four ', 'only five parts in this question', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `rw_fib_select`
--

CREATE TABLE `rw_fib_select` (
  `a_id` int(11) NOT NULL,
  `ans` int(11) NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rw_select`
--

CREATE TABLE `rw_select` (
  `rw_select_id` int(11) NOT NULL,
  `rw_select1` char(50) NOT NULL,
  `rw_select2` char(50) NOT NULL,
  `rw_select3` char(50) NOT NULL,
  `rw_select4` char(50) NOT NULL,
  `rw_select_5` varchar(50) NOT NULL,
  `rw_select_6` varchar(50) NOT NULL,
  `rw_select_7` varchar(50) NOT NULL,
  `rw_select_8` varchar(50) NOT NULL,
  `rw_select_9` varchar(50) NOT NULL,
  `rw_select_10` varchar(50) NOT NULL,
  `rw_select_11` varchar(50) NOT NULL,
  `rw_select_12` varchar(50) NOT NULL,
  `rw_select_13` varchar(50) NOT NULL,
  `rw_select_14` varchar(50) NOT NULL,
  `rw_select_15` varchar(50) NOT NULL,
  `rw_select_16` varchar(50) NOT NULL,
  `rw_select_17` varchar(50) NOT NULL,
  `rw_select_18` varchar(50) NOT NULL,
  `rw_select_19` varchar(50) NOT NULL,
  `rw_select_20` varchar(50) NOT NULL,
  `rw_select_21` varchar(50) NOT NULL,
  `rw_select_22` varchar(50) NOT NULL,
  `rw_select_23` varchar(50) NOT NULL,
  `rw_select_24` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rw_select`
--

INSERT INTO `rw_select` (`rw_select_id`, `rw_select1`, `rw_select2`, `rw_select3`, `rw_select4`, `rw_select_5`, `rw_select_6`, `rw_select_7`, `rw_select_8`, `rw_select_9`, `rw_select_10`, `rw_select_11`, `rw_select_12`, `rw_select_13`, `rw_select_14`, `rw_select_15`, `rw_select_16`, `rw_select_17`, `rw_select_18`, `rw_select_19`, `rw_select_20`, `rw_select_21`, `rw_select_22`, `rw_select_23`, `rw_select_24`) VALUES
(1, 'principal', 'principles', 'pierce', 'principle', 'reliability', 'sustainability', 'sustain', 'sustainable', 'reduced', 'ehance', 'seduced', 'reducing', 'apart', 'within', 'among', 'away', 'origins', 'prosper', 'inject', 'control', 'smaller', 'longer', 'more', 'best'),
(2, 'examine', 'promote', 'inspect', 'obstruct', 'revision', 'development', 'promotion', 'intervention', 'elicited', 'consume', 'reduce', 'spread', 'composition', 'element', 'tissue', 'nutrition', 'optimal', 'definitive', 'positive', 'optimistic', 'accessing', 'promoting', 'obstructing', 'reviewing'),
(3, 'is', 'and', 'or', 'are', 'one', 'two', 'three', 'four', '1', '2', '3', '4', 'test', 'test1', 'test2', 'test3', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_fib`
--

CREATE TABLE `r_fib` (
  `r_fib_id` int(11) NOT NULL,
  `r_fib_title` varchar(40) NOT NULL,
  `r_fib_part1` varchar(200) NOT NULL,
  `r_fib_part2` varchar(200) NOT NULL,
  `r_fib_part3` varchar(200) NOT NULL,
  `r_fib_part4` varchar(200) NOT NULL,
  `r_fib_part5` varchar(200) DEFAULT NULL,
  `r_fib_part6` varchar(200) DEFAULT NULL,
  `r_fib_part7` varchar(200) DEFAULT NULL,
  `r_fib_part8` varchar(200) DEFAULT NULL,
  `r_fib_part9` varchar(200) DEFAULT NULL,
  `r_fib_part10` varchar(200) DEFAULT NULL,
  `r_fib_word1` char(25) NOT NULL,
  `r_fib_word2` char(25) NOT NULL,
  `r_fib_word3` char(25) NOT NULL,
  `r_fib_word4` char(25) NOT NULL,
  `r_fib_word5` char(25) DEFAULT NULL,
  `r_fib_word6` char(25) DEFAULT NULL,
  `r_fib_word7` char(25) DEFAULT NULL,
  `r_fib_word8` char(25) DEFAULT NULL,
  `r_fib_word9` char(25) DEFAULT NULL,
  `r_fib_word10` char(25) DEFAULT NULL,
  `r_fib_word11` char(25) DEFAULT NULL,
  `r_fib_word12` char(25) DEFAULT NULL,
  `r_fib_answer` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_fib`
--

INSERT INTO `r_fib` (`r_fib_id`, `r_fib_title`, `r_fib_part1`, `r_fib_part2`, `r_fib_part3`, `r_fib_part4`, `r_fib_part5`, `r_fib_part6`, `r_fib_part7`, `r_fib_part8`, `r_fib_part9`, `r_fib_part10`, `r_fib_word1`, `r_fib_word2`, `r_fib_word3`, `r_fib_word4`, `r_fib_word5`, `r_fib_word6`, `r_fib_word7`, `r_fib_word8`, `r_fib_word9`, `r_fib_word10`, `r_fib_word11`, `r_fib_word12`, `r_fib_answer`) VALUES
(1, 'Absenteeism', 'Absence from work is a costly and ', 'problem for any organization. The cost of absenteeism in Australia has been put at 1.8 million hours per day or $1400 million annually. The study reported here was ', 'in the Prince William Hospital in Brisbane, Australia, where, prior to this time, few active steps HAD been taken to measure, understand or manage the ', 'of absenteeism.', NULL, NULL, NULL, NULL, NULL, NULL, 'definitive', 'conducted', 'conduct', 'disruptive', 'occurrence', 'occupation', NULL, NULL, NULL, NULL, NULL, NULL, '1.disruptive, 2.conducted, 3.occurrence'),
(2, 'Ozone', 'Clones of an Eastern cottonwood ( Populus deltoides) in the Bronx and other city spots grew to double the biomass of clones ', 'outside small towns upstate or on Long Island, says Jillian Gregg, now of the Environmental Protection Agency\'s western-ecology division in Corvallis, Ore. The growth gap comes from', 'damage, she and her New York colleagues report. Ozone chemists have known that', 'may spike skyscraper high in city air, but during a full 24 hours, rural trees actually get a higher cumulative ozone exposure from ', 'pollution that ', 'in and lingers. A series of new experiments now shows that this hang-around ozone is the', 'factor in tree growth, the researchers say in the July 10 Nature. \"This study has profound importance in showing us most vividly that rural areas', 'the', 'for urban pollution,\" says Stephen P. Long of the University of Illinois at Urbana-Champaign. \"This work should be a wake-up call,\" he adds.', NULL, 'pay', 'planted', 'urban', 'oxygen', 'blows', 'ozone', 'rural', 'gaps', 'spend', 'overwhelming', 'concentrations', 'price', '1.planted, 2.ozone, 3.concentrations, 4.urban, 5.b'),
(3, 'Trackway', 'A fossilized trackway on public lands in Lake County, Oregon, may reveal ', 'about the ancient family dynamics of Columbian mammoths. Recently excavated by a ', 'from the University of Oregon Museum of Natural and Cultural History, the Bureau of Land Management and the University of Louisiana, the trackway includes 117 footprints thought to represent a number ', 'as well as juvenile and infant mammoths.', NULL, NULL, NULL, NULL, NULL, NULL, 'team', 'children', 'concepts', 'organization', 'clues', 'adults', NULL, NULL, NULL, NULL, NULL, NULL, '1.clues, 2.team, 3.adults');

-- --------------------------------------------------------

--
-- Table structure for table `r_mcma`
--

CREATE TABLE `r_mcma` (
  `mcma_id` int(11) NOT NULL,
  `mcma_title` char(25) NOT NULL,
  `mcma_para` mediumtext NOT NULL,
  `mcma_question` varchar(150) NOT NULL,
  `mcma_option1` varchar(200) NOT NULL,
  `mcma_option2` varchar(200) NOT NULL,
  `mcma_option3` varchar(200) NOT NULL,
  `mcma_option4` varchar(200) NOT NULL,
  `mcma_option5` varchar(200) DEFAULT NULL,
  `mcma_option6` varchar(200) DEFAULT NULL,
  `mcma_answer` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_mcma`
--

INSERT INTO `r_mcma` (`mcma_id`, `mcma_title`, `mcma_para`, `mcma_question`, `mcma_option1`, `mcma_option2`, `mcma_option3`, `mcma_option4`, `mcma_option5`, `mcma_option6`, `mcma_answer`) VALUES
(1, 'X-ray', 'X-ray crystallography is the study of crystal structures through X-ray diffraction techniques. When an X-ray beam bombards a crystalline lattice in a given orientation, the beam is scattered in a definite manner characterized by the atomic structure of the lattice. This phenomenon, known as X-ray diffraction, occurs when the wavelength of X-rays and the interatomic distances in the lattice have the same order of magnitude. In 1912, the German scientist Max van Laue predicted that crystals exhibit diffraction qualities. Concurrently, W. Friedrich and P. Knipping created the first photographic diffraction patterns. A year later, Lawrence Bragg successfully analyzed the crystalline structures of potassium chloride and sodium chloride using X-ray crystallography, and developed a rudimentary treatment for X-ray/crystal interaction (Bragg\'s Law). Bragg\'s research provided a method to determine a number of simple crystal structures for the next 50 years. In the 1960s, the capabilities of X-ray crystallography were greatly improved by the incorporation of computer technology. Modern X-ray crystallography provides the mast powerful and accurate method far determining single-crystal structures. Structures containing 100-200 atoms now can be analyzed an the order of 1-2 days, whereas before the 1960s a 20-atom structure required 1-2 years far analysis. Through X-ray crystallography the chemical structure of thousands of organic, inorganic, organometallic, and biological compounds are determined every year.', 'Which of the fallowing factors are consistent with the theory of X-ray crystallography?', 'X-ray crystallization causes a reduction in the interatomic distances of wavelengths.', 'X-rays are scattered according to the atomic structure of the crystal lattice.', 'The analysis of chemical compounds was only passible after the development of computer technology.', 'The process can be used to determine the chemical structure of biological compounds.', 'X-rays will not defract in crystalline substances.', NULL, 'B, D'),
(2, 'History of Sleep', 'September 2, 1752, was a great day in the history of sleep. That Wednesday evening, millions of British subjects in England and the colonies went peacefully to sleep and did not wake up until twelve days later. Behind this feat of narcoleptic prowess was not same revolutionary hypnotic technique or miraculous pharmaceutical discovered in the West Indies. It was, rather, the British Calendar Act of 1751, which declared the day after Wednesday 2nd to be Thursday 14th.\r\n\r\nPrior to that cataleptic September evening, the official British calendar differed from that of continental Europe by eleven days—that is, September 2 in London was September 13 in Paris, Lisbon, and Berlin. The discrepancy had sprung from Britain\'s continued use of the Julian calendar, which had also been the official calendar of Europe from its invention by Julius Caesar (after wham it was named) in 45 B.C. until the decree of Pope Gregory XIII in 1582.\r\n\r\nCaesar\'s calendar, which consisted of eleven months of or 31 days and a 28-day February (extended to 29 days every fourth year), was actually quite accurate: it erred from the real solar calendar by only 11.5 minutes a year. After centuries, though, even a small inaccuracy like this adds up. By the sixteenth century, it had put the Julian calendar behind the solar one by 10 days.\r\n\r\nIn Europe, in 1582, Pope Gregory XIII ordered the advancement of the Julian calendar by 10 days and introduced a new corrective device to curb further error: century years such as 1700 or 1800 would no longer be counted as leap years, unless they were (like 1600 or 2000) divisible by 400.', 'What factors were involved in the disparity between the calendars of Britain and Europe in the 17th century?', 'the provisions of the British Calendar Act of 1751', 'Britain\'s continued use of the Julian calendar', 'the accrual of very minor differences between the calendar used in Britain and real solar events', 'the failure to include years divisible by four as leap years', 'the decree of Pope Gregory XIII', 'revolutionary ideas which had emerged from the West Indies', 'B, C,'),
(3, 'Andalucia', 'Here is a part of Spain\'s sun-baked Andalucia that is extraordinary not only because of its unspoiled terrain and authentic Spanish traditions but also because of its caves. These are not dark, damp holes, with dripping water and evil smells. They are residences, ancient Bronze Age dwellings now being refurbished for hundreds of 21st century Spaniards. In Galera, the region\'s most important village, it\'s estimated that there are at least 1,000 such habitations carved into its hillsides. We take old caves renovate them, then sell them on, says Rob Oakley, office manager of leading developer Galera enterprises. Our company was set up by someone who discovered the area of Galera when it was just a tourist attraction 15 years ago and saw its potential. The ancient abodes are transformed from rough caves into relatively luxurious homes, equipped out with amenities like electricity and sewage, phone lines, running hot water, even internet connections.', 'Which of the following words in the passages have the same meaning as \'residences\' has?', 'Abodes', 'Amenities', 'Connections', 'Dwellings', 'Habitations', 'Hillsides', 'A, D,');

-- --------------------------------------------------------

--
-- Table structure for table `r_mcsa`
--

CREATE TABLE `r_mcsa` (
  `mcsa_id` int(11) NOT NULL,
  `mcsa_title` char(25) NOT NULL,
  `mcsa_para` mediumtext NOT NULL,
  `mcsa_question` varchar(200) NOT NULL,
  `mcsa_option1` varchar(200) NOT NULL,
  `mcsa_option2` varchar(200) NOT NULL,
  `mcsa_option3` varchar(200) NOT NULL,
  `mcsa_option4` varchar(200) NOT NULL,
  `mcsa_answwer` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_mcsa`
--

INSERT INTO `r_mcsa` (`mcsa_id`, `mcsa_title`, `mcsa_para`, `mcsa_question`, `mcsa_option1`, `mcsa_option2`, `mcsa_option3`, `mcsa_option4`, `mcsa_answwer`) VALUES
(1, 'Tax', 'Excise taxes are governmental levies an specific goods produced and consumed inside a country. They differ from tariffs, which usually apply only to foreign-made goods, and from sales taxes, which typically apply to all commodities other than those specifically exempted. In their modern farm, excise taxes were first developed by Holland in the 17th century, and established by law in England in 1643. Introduced into the Dutch colonies in America, the system spread to other colonies. Such taxes were first used by the federal government in 1791 and aroused great apposition. They were repealed (1802) in Thomas Jefferson\'s administration. During the War of 1812 comprehensive excise taxes were levied again but were repealed in 1817.', 'According to this text, how do excise taxes usually differ from tariffs?', 'Excise taxes are levied an all products, while tariffs apply to government-made goods.', 'Excise taxes are levied an specifically identified commodities, while tariffs apply to all goods.', 'Excise taxes are levied an goods produced and consumed in one country, while tariffs apply to imports.', 'Excise taxes are levied an goods to which sales tax does not apply, while tariffs only apply to goods With sales tax imposed.', 'C'),
(2, 'Angkor', 'Angkor was the site of several capitals of the Khmer Empire, north of Tonlé Sap lake, in northwest Cambodia. Far about five and a half centuries (9th to 15th), it was the heart of the empire. Extending aver an area of 120 sq mi (32.3 sq km), the ruins contain same of the mast imposing monuments in the world, including about a thousand temples, mainly Hindu and same Buddhist; the ancient city, however, had an extent perhaps nearly 10 times that size (according to satellite photographs published in 2007), and was home to perhaps 750,000 people.', 'The ancient city of Angkar ? ?', 'was similar in size to the Tonlé Sap lake.', 'covered an area of approximately 750,000 square metres.', 'was built an the ruins of a thousand temples.', 'was significantly larger than the site today.', 'D'),
(3, 'English Writing', 'Until the 1600s, English was, for the most part, spoken only in England. However, during the course of the next two centuries, English began to spread around the globe as a result of exploration, trade, colonization, and missionary work. English gradually became the primary language of international business, banking, and diplomacy. Currently, more than 80 percent of the information stored on computer systems worldwide is in English. Two thirds of the world’s science writing is in English, and English is the main language of technology, advertising, media, international airports, and air traffic controllers. Today there are more than 700 million English users in the world, and over half of these are non-native speakers, constituting the largest number of non-native users of any language in the world.', 'Which of the following most accurately summarizes the opinion of the author in the text?', 'Small enclaves of English speakers have grown in various parts of the world.', 'Over the past 500 years, small English communities have proliferated all over the world.', 'English has become the dominant language of international communication.', 'English is the native language of more than half a billion people of the world.', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `r_reorder`
--

CREATE TABLE `r_reorder` (
  `ro_id` int(11) NOT NULL,
  `ro_title` char(40) NOT NULL,
  `item1` varchar(200) NOT NULL,
  `item2` varchar(200) NOT NULL,
  `item3` varchar(200) NOT NULL,
  `item4` varchar(200) NOT NULL,
  `item5` varchar(200) DEFAULT NULL,
  `ro_answer` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_reorder`
--

INSERT INTO `r_reorder` (`ro_id`, `ro_title`, `item1`, `item2`, `item3`, `item4`, `item5`, `ro_answer`) VALUES
(1, 'Foreign aid', 'A. Today, the projects of organizations like the World Bank are meticulously inspected by watchdog groups.', 'B. At beginning in the 1990s, foreign aid had begun to slowly improve.', 'C. Scrutiny by the news media shamed many developed countries into curbing their bad practices.', 'D. Although the system is far from perfect, it is certainly more transparent than it was when foreign aid routinely helped ruthless dictators stay in power.', NULL, 'B, C, A, D'),
(2, 'Mail delivery: Lambert', 'A. After a crash, he even salvaged bags of mail from his burning aircraft and immediately phoned Alexander Varney, Peoria\'s airport manager, to advise him to send a truck.', 'B. During his tenure on the mail route, he was renowned for delivering the mail under any circumstances.', 'C. After finishing first in his pilot training class, Lindbergh took his first job as the chief pilot of an airmail route operated by Robertson Aircraft Co. of Lambert Field in St. Louis, Missouri.', 'D. He flew the mail in a de Havilland DH-4 biplane to Springfield, Illinois, Peoria and Chicago.', NULL, 'C, D, B, A'),
(3, 'An Underperforming Compan', 'A. Add some generous helpings of debt, a few spoonful of management incentives and trim all the fat.', 'B. Take an underperforming company.', 'C. That has been the recipe for private-equity groups during the past 200 years.', 'D. Leave to cook for five years and you have a feast of profits.', NULL, 'B, A, D, C');

-- --------------------------------------------------------

--
-- Table structure for table `s_asq`
--

CREATE TABLE `s_asq` (
  `asq_id` int(11) NOT NULL,
  `path` varchar(124) NOT NULL,
  `asq_transcript` varchar(99) NOT NULL,
  `asq_answer` char(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_asq`
--

INSERT INTO `s_asq` (`asq_id`, `path`, `asq_transcript`, `asq_answer`) VALUES
(1, 'audio/asq1.mp3', 'What stage is a 10 year old child in', 'Adolescence'),
(2, 'audio/asq2.mp3', 'What do you call the stra', 'Seat'),
(3, 'audio/asq3.mp3', 'What do you cal the gover', 'Auto'),
(4, 'audio/asq4.mp3', 'yoyo', 'whatsup'),
(5, 'audio/asq5.mp3', 'blue pink', 'yellow black'),
(6, 'audio/asq6.mp3', 'give me that ring', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `s_di`
--

CREATE TABLE `s_di` (
  `di_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_di`
--

INSERT INTO `s_di` (`di_id`, `img_name`, `answer`) VALUES
(1, 'DI1.png', ''),
(2, 'DI2.png', ''),
(3, 'DI3.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_ra`
--

CREATE TABLE `s_ra` (
  `ra_id` int(11) NOT NULL,
  `ra_title` char(40) NOT NULL,
  `ra_paragraph` text NOT NULL,
  `s_guide` varchar(255) NOT NULL,
  `p_guide` varchar(750) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_ra`
--

INSERT INTO `s_ra` (`ra_id`, `ra_title`, `ra_paragraph`, `s_guide`, `p_guide`) VALUES
(1, 'Grand Canyon', 'The Grand Canyon is 277 miles long, up to 18 miles wide and attains a depth of over a mile. While the specific geologic processes and timing that formed the Grand Canyon are the subject of debate by geologists, recent evidence suggests the Colorado River established its course through the canyon at least 17 million years ago. ', 'family morning front door neighbours gardens children', 'Imagine living all your life /as the only family on your street. Then,/ one morning,/ you open the front door and discover houses all around you./ You see neighbours tending their gardens and children walking to school./ Where did all the people come from? /What if the answer turned out to be that they had always been there —/ you just hadn\'t seen them?'),
(2, 'Carbon  Emissions', 'When countries assess their annual carbon  emissions, they count up their cars and power stations, but bush fires are not included – presumably because they are deemed to be events beyond human control. In Australia, Victoria alone sees several hundred thousand hectares burn each year; in both 2004 and the present summer, the figure has been over 1 million hectares. ', 'stress guide for question 2 here', 'pause guide exampleeeeeeee'),
(3, ' Financial Plan', 'At the beginning of each fiscal year funds are allocated to each State account in accordance with the University’s financial plan. Funds are allocated to each account by object of expenditure. Account managers are responsible for ensuring that adequate funds are available in the appropriate object before initiating transactions to use the funds. ', 'qeustion 3 !!!!!!!!!!!!!!!!! stressguide', 'pause guide question there here');

-- --------------------------------------------------------

--
-- Table structure for table `s_rl`
--

CREATE TABLE `s_rl` (
  `retell_id` int(3) NOT NULL,
  `re_tell_title` char(40) NOT NULL,
  `audio_name` varchar(255) NOT NULL,
  `transcript` varchar(500) NOT NULL,
  `hint` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_rl`
--

INSERT INTO `s_rl` (`retell_id`, `re_tell_title`, `audio_name`, `transcript`, `hint`) VALUES
(1, 'Globalization', 'rl_1.mp3', 'Imagine living all your life /as the only family on your street. Then,/ one morning,/ you open the front door and discover houses all around you./ You see neighbours tending their gardens and children walking to school./ Where did all the people come from? /What if the answer turned out to be that they had always been there —/ you just hadn\'t seen them?', 'family morning front door neighbours gardens children'),
(2, 'Stem Cell', 'rl_2.mp3', 'Second qn transcript here ////', 'hint for second qn here ////'),
(3, 'Performance of Genders', 'rl_3.mp3', 'question 3 transceript', 'q3 hints !!!');

-- --------------------------------------------------------

--
-- Table structure for table `s_rs`
--

CREATE TABLE `s_rs` (
  `rs_id` int(11) NOT NULL,
  `resen_answer` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_rs`
--

INSERT INTO `s_rs` (`rs_id`, `resen_answer`, `path`) VALUES
(1, 'A computer virus destroyed all my files.', 'rs_1.mp3'),
(2, 'A full bibliography is needed at the end of all as', 'rs_2.mp3'),
(3, ' A lot of agricultural workers came to the east en', 'rs_3.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `w_essay`
--

CREATE TABLE `w_essay` (
  `essay_id` int(11) NOT NULL,
  `essay_title` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_essay`
--

INSERT INTO `w_essay` (`essay_id`, `essay_title`) VALUES
(1, 'University experience is more important than a university’s degree. Some people argue that university life is much more important than an educational degree in job market. Do you agree or not agree?'),
(2, 'Hosting sporting events such as the Olympics and the World Cup can bring benefits to the host countries. How far do you agree with this statement? Use your own examples to support.'),
(3, 'Business whether big or small is to maximize profit. Do you agree with that? Give your opinion.'),
(5, ''),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `w_swt`
--

CREATE TABLE `w_swt` (
  `swt_id` int(11) NOT NULL,
  `swt_title` varchar(20) NOT NULL,
  `swt_paragraph` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `w_swt`
--

INSERT INTO `w_swt` (`swt_id`, `swt_title`, `swt_paragraph`) VALUES
(1, 'Public Speaking', 'Many insecurities, fears, and doubts stem from lack of understanding or lack of knowledge about something. The more you understand and know about a situation, the more comfortable you will be and thus the less power your shyness will have over you.\r\n\r\nLet’s take for example the subject of public speaking. This is an activity that terrifies most people half to death, but only because most people don’t have much knowledge about it. If you do some research and investigation, you’ll come to learn that it’s perfectly natural to be terrified of public speaking, and that almost every single person has the same fears and insecurities that you do.\r\n\r\nWhen you take it further and ask yourself why you are so terrified of this, you’ll come to learn that you are scared of being judged, or of being laughed at. From there, you can go and read and learn about people who are good at public speaking—learn their tips and strategies.\r\n\r\nThis way you are much more prepared because your knowledge on the subject is vast. As a result of this, your confidence will already be much higher than before, which might allow you to attempt public speaking when you join a club like Toastmasters. As you practice more, you will naturally become even more confident.\r\n\r\nThis rule applies to any area where you feel insecure. Read and research as much about the topic as possible. This will help increase your confidence enough to give the activity a try to see if you might be able to become better at it. And that initial confidence to take action is all you need to get the ball rolling and overcome your shyness.'),
(2, 'Carbon-neutrality', 'You used to think that being green was a luxury for your company, but climate change has made you realize that you can no longer ignore it. The buzz is about becoming carbon-neutral, but where do you start? Consider your drivers. Do you want to become carbon-neutral for marketing reasons, for financial reasons or to help save the planet? Simon Armitage of the Carbon Neutral Company believes: \"Your drivers will help you tailor your carbon-reduction program and determine key performance indicators.\" This will help build a case for going carbon-neutral. First, measure your carbon footprint, or get a specialist to do it for you. That primarily means taking account of your energy usage and emissions caused through travel. Before you begin, think about whether you\'re collecting the right data and whether it\'s readily accessible. When implementing any energy reduction measures, ensure you engage with your staff. \"It\'s much better if your people decide for themselves when it\'s sensible for them to travel,\" says Armitage. You\'ll also need them to participate in switching off the lights and other energy-saving measures. Set targets and show it\'s not a one-off exercise.'),
(3, 'Positive Mindset', 'Research shows that when people work with a positive mind-set, performance on nearly every level – productivity, creativity, engagement - improves. Yet happiness is perhaps the most misunderstood driver of performance. For one, most people believe that success precedes happiness. “Once I get a promotion, I\'ll be happy,” they think. Or, “Once I hit my sales target, I\'ll feel great.” But because success is a moving target – as soon as you hit your target, you raise it again, the happiness that results from success is fleeting. In fact, it works the other way around: People who cultivate a positive mind-set perform better in the face of challenge. I call this the \"happiness advantage” – every business outcome shows improvement when the brain is positive. I\'ve observed this effect in my role as a researcher and lecturer in 48 countries on the connection between employee happiness and success. And I\'m not alone: In a meta-analysis of 225 academic studies, researchers Sonja Lyubomirsky, Laura King, and Ed Diener found strong evidence of directional causality between life satisfaction and successful business outcomes. Another common misconception is that our genetics, our environment, or a combination of the two determines how happy we are. To be sure, both factors have an impact. But one\'s general sense of well-being is surprisingly malleable. The habits you cultivate, the way you interact with coworkers, how you think about stress – all these can be managed to increase your happiness and your chances of success.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`name`);

--
-- Indexes for table `l_fib`
--
ALTER TABLE `l_fib`
  ADD PRIMARY KEY (`l_fib_id`),
  ADD UNIQUE KEY `l_fib_id` (`l_fib_id`);

--
-- Indexes for table `l_hcs`
--
ALTER TABLE `l_hcs`
  ADD PRIMARY KEY (`hcs_id`);

--
-- Indexes for table `l_hiw`
--
ALTER TABLE `l_hiw`
  ADD PRIMARY KEY (`hiw_id`);

--
-- Indexes for table `l_mcma`
--
ALTER TABLE `l_mcma`
  ADD PRIMARY KEY (`L_mcma_id`);

--
-- Indexes for table `l_mcsa`
--
ALTER TABLE `l_mcsa`
  ADD PRIMARY KEY (`l_mcsa_id`);

--
-- Indexes for table `l_smw`
--
ALTER TABLE `l_smw`
  ADD PRIMARY KEY (`smw_id`);

--
-- Indexes for table `l_sst`
--
ALTER TABLE `l_sst`
  ADD PRIMARY KEY (`sst_id`);

--
-- Indexes for table `l_wfd`
--
ALTER TABLE `l_wfd`
  ADD PRIMARY KEY (`wfd_id`);

--
-- Indexes for table `rw_fib`
--
ALTER TABLE `rw_fib`
  ADD PRIMARY KEY (`rw_fib_id`);

--
-- Indexes for table `rw_fib_select`
--
ALTER TABLE `rw_fib_select`
  ADD PRIMARY KEY (`a_id`,`ans`,`q_id`);

--
-- Indexes for table `rw_select`
--
ALTER TABLE `rw_select`
  ADD PRIMARY KEY (`rw_select_id`);

--
-- Indexes for table `r_fib`
--
ALTER TABLE `r_fib`
  ADD PRIMARY KEY (`r_fib_id`);

--
-- Indexes for table `r_mcma`
--
ALTER TABLE `r_mcma`
  ADD PRIMARY KEY (`mcma_id`);

--
-- Indexes for table `r_mcsa`
--
ALTER TABLE `r_mcsa`
  ADD PRIMARY KEY (`mcsa_id`);

--
-- Indexes for table `r_reorder`
--
ALTER TABLE `r_reorder`
  ADD PRIMARY KEY (`ro_id`);

--
-- Indexes for table `s_asq`
--
ALTER TABLE `s_asq`
  ADD PRIMARY KEY (`asq_id`);

--
-- Indexes for table `s_di`
--
ALTER TABLE `s_di`
  ADD PRIMARY KEY (`di_id`);

--
-- Indexes for table `s_ra`
--
ALTER TABLE `s_ra`
  ADD PRIMARY KEY (`ra_id`);

--
-- Indexes for table `s_rl`
--
ALTER TABLE `s_rl`
  ADD PRIMARY KEY (`retell_id`);

--
-- Indexes for table `s_rs`
--
ALTER TABLE `s_rs`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `w_essay`
--
ALTER TABLE `w_essay`
  ADD PRIMARY KEY (`essay_id`);

--
-- Indexes for table `w_swt`
--
ALTER TABLE `w_swt`
  ADD PRIMARY KEY (`swt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `l_hcs`
--
ALTER TABLE `l_hcs`
  MODIFY `hcs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `l_hiw`
--
ALTER TABLE `l_hiw`
  MODIFY `hiw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `l_mcma`
--
ALTER TABLE `l_mcma`
  MODIFY `L_mcma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `l_mcsa`
--
ALTER TABLE `l_mcsa`
  MODIFY `l_mcsa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `l_smw`
--
ALTER TABLE `l_smw`
  MODIFY `smw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `l_sst`
--
ALTER TABLE `l_sst`
  MODIFY `sst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `l_wfd`
--
ALTER TABLE `l_wfd`
  MODIFY `wfd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rw_fib`
--
ALTER TABLE `rw_fib`
  MODIFY `rw_fib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rw_fib_select`
--
ALTER TABLE `rw_fib_select`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `r_fib`
--
ALTER TABLE `r_fib`
  MODIFY `r_fib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_mcma`
--
ALTER TABLE `r_mcma`
  MODIFY `mcma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_mcsa`
--
ALTER TABLE `r_mcsa`
  MODIFY `mcsa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_reorder`
--
ALTER TABLE `r_reorder`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_asq`
--
ALTER TABLE `s_asq`
  MODIFY `asq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `s_di`
--
ALTER TABLE `s_di`
  MODIFY `di_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_ra`
--
ALTER TABLE `s_ra`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_rl`
--
ALTER TABLE `s_rl`
  MODIFY `retell_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_rs`
--
ALTER TABLE `s_rs`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `w_essay`
--
ALTER TABLE `w_essay`
  MODIFY `essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `w_swt`
--
ALTER TABLE `w_swt`
  MODIFY `swt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
