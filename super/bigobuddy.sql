--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `snap` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `verify` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityid`, `stateid`, `cityname`, `status`) VALUES
(1, 1, 'JALANDHAR', 1),
(2, 1, 'BATHINDA', 1),
(3, 1, 'HOSHIARPUR', 1),
(4, 1, 'KAPURTHALA', 0),
(5, 1, 'PHAGWARA', 1),
(6, 1, 'AMRITSAR', 1),
(7, 1, 'GURDASPUR', 1),
(8, 1, 'FEROZPUR', 1),
(9, 1, 'PATHANKOT', 1),
(10, 6, 'JAIPUR', 0),
(11, 1, 'LUDHIANA', 1),
(12, 1, 'PATIALA', 1),
(13, 1, 'BATALA', 1),
(14, 1, 'MOGA', 1),
(15, 1, 'RAMPURA PHUL', 1),
(16, 1, 'MALERKOTLA', 1),
(17, 1, 'KHANNA', 1),
(18, 1, 'MUKTSAR', 1),
(19, 1, 'BARNALA', 1),
(20, 1, 'RAJPURA', 1),
(21, 1, 'FIROZPUR', 1),
(22, 1, 'KAPURTHALA', 1),
(23, 1, 'SANGRUR', 1),
(24, 1, 'JALANDHAR CANTT.', 1),
(25, 1, 'CHANDIGARH', 1),
(26, 1, 'ABOHAR', 1),
(27, 1, 'FARIDKOT', 1),
(28, 1, 'FATEHGARH SAHIB', 1),
(29, 1, 'FAZILKA', 1),
(30, 1, 'MANSA', 1),
(31, 1, 'MOHALI', 1),
(32, 1, 'ROPAR', 1),
(33, 1, 'TARAN TARAN', 1),
(34, 1, 'NAKODAR', 1),
(35, 1, 'BANGA', 1),
(36, 1, 'NAWASHAHR', 1),
(37, 1, 'BALACHAUR', 1),
(38, 1, 'KHARAR', 1),
(39, 1, 'PHILLAUR', 1),
(40, 1, 'GORAYA', 1),
(41, 1, 'MANDI GOBINDGARH', 1),
(42, 1, 'RAJKOT', 1),
(43, 1, 'JAGRAON', 1),
(44, 1, 'SAMRALA', 1),
(45, 1, 'RAJPURA', 1),
(46, 1, 'DERA BASSI', 1),
(47, 1, 'NABHA', 1),
(48, 1, 'SAMANA', 1),
(49, 1, 'BUDHLADA', 1),
(50, 1, 'DASUYA', 1),
(51, 1, 'BHULATH', 1),
(52, 1, 'BABA BAKALA', 1),
(53, 1, 'GARHSHANKAR', 1),
(54, 1, 'NANGAL', 1),
(55, 1, 'ANANDPUR SAHIB', 1),
(56, 1, 'ZIRA', 1),
(57, 1, 'SHAHKOT', 1),
(58, 1, 'CHAMKOR SAHIB', 1),
(59, 1, 'DHURI', 1),
(60, 1, 'TALWANDI SABOO', 1),
(61, 1, 'MUKERIAN', 1),
(62, 1, 'SULTANPUR LODHI', 1),
(63, 1, 'PATTI', 1),
(64, 1, 'ADAMPUR', 1),
(65, 1, 'BHOGPUR', 1),
(66, 1, 'KARTARPUR', 1),
(67, 1, 'LOHIAN KHAS', 1),
(68, 1, 'NURMAHAL', 1),
(69, 1, 'JANDIALA', 1),
(70, 9, 'NEW DELHI', 1),
(71, 2, 'GURGAON', 1),
(72, 4, 'NOIDA', 1),
(73, 3, 'SHIMLA', 1),
(74, 3, 'DHARAMSALA', 1),
(75, 3, 'MANALI', 1),
(76, 3, 'MANDI', 1),
(77, 3, 'DALHOUSIE', 1),
(78, 3, 'KULLU', 1),
(79, 3, 'KASAULI', 1),
(80, 3, 'SOLAN', 1),
(81, 1, 'NAHAN', 1),
(82, 3, 'CHAMBA', 1),
(83, 3, 'PARWANOO', 1),
(84, 3, 'KANGRA', 1),
(85, 3, 'HAMIRPUR', 1),
(86, 3, 'BILASPUR', 1),
(87, 3, 'SUNDER NAGAR', 1),
(88, 3, 'PAONTA SAHIB', 1),
(89, 3, 'PALAMPUR', 1),
(90, 3, 'BADDI', 1),
(91, 3, 'KHAJJIAR', 1),
(92, 3, 'NALAGARH', 1),
(93, 3, 'JAWALAMUKHI', 1),
(94, 3, 'ARKI', 1),
(95, 3, 'JOGINDER NAGAR', 1),
(96, 3, 'DERA GOPIPUR', 1),
(97, 3, 'NADAUN', 1),
(98, 3, 'DAGSHAI', 1),
(99, 3, 'GAGRET', 1),
(100, 3, 'GHUMARWIN', 1),
(101, 3, 'BHUNTAR', 1),
(102, 3, 'UNA', 1),
(103, 3, 'ROHRU', 1),
(104, 3, 'THEOG', 1),
(105, 3, 'NURPUR', 1),
(106, 3, 'RAMPUR', 1),
(107, 3, 'TIRA SUJANPUR', 1),
(108, 3, 'NARKANDA', 1),
(109, 2, 'FARIDABAD', 1),
(110, 2, 'AMBALA', 1),
(111, 2, 'PANIPAT', 1),
(112, 2, 'KARNAL', 1),
(113, 2, 'PALWAL', 1),
(114, 2, 'KURUKSHETRA', 1),
(115, 2, 'KAITHAL', 1),
(116, 2, 'HISSAR', 1),
(117, 2, 'PANCHKULA', 1),
(118, 2, 'YAMUNANAGAR', 1),
(119, 2, 'REWARI', 1),
(120, 2, 'ROHTAK', 1),
(121, 2, 'JIND', 1),
(122, 2, 'SONIPAT', 1),
(123, 2, 'BHIWANI', 1),
(124, 2, 'BAHADURGARH', 1),
(125, 2, 'PINJORE', 1),
(126, 2, 'JAGADHRI', 1),
(127, 2, 'BAHADURGARH', 1),
(128, 2, 'FATEHABAD', 1),
(129, 2, 'THANESAR', 1),
(130, 2, 'TOSHAM', 1),
(131, 2, 'SIRSA', 1),
(132, 2, 'MAHENDRAGARH', 1),
(133, 2, 'JHAJJAR', 1),
(134, 2, 'KALANAUR', 1),
(135, 2, 'FARRUKHNAGAR', 1),
(136, 2, 'NILOKHERI', 1),
(137, 2, 'SOHNA', 1),
(138, 2, 'MANESAR', 1),
(139, 2, 'RADAUR', 1),
(140, 2, 'RATIA', 1),
(141, 2, 'LADWA', 1),
(142, 2, 'LOHARU', 1),
(143, 2, 'ELLENABAD', 1),
(144, 4, 'LUCKNOW', 1),
(145, 4, 'VARANASI', 1),
(146, 4, 'MEERUT', 1),
(147, 4, 'KANPUR', 1),
(148, 4, 'AGRA', 1),
(149, 4, 'ALLAHABAD', 1),
(150, 4, 'BAREILLY', 1),
(151, 4, 'GHAZIABAD', 1),
(152, 4, 'ALIGARH', 1),
(153, 4, 'JHANSI', 1),
(154, 4, 'MORADABAD', 1),
(155, 4, 'GORAKHPUR', 1),
(156, 4, 'FAIZABAD', 1),
(157, 4, 'MATHURA', 1),
(158, 4, 'UNNAO', 1),
(159, 4, 'SAHARANPUR', 1),
(160, 4, 'FARRUKHABAD', 1),
(161, 4, 'MUZAFFARNAGAR', 1),
(162, 4, 'SULTANPUR', 1),
(163, 4, 'BUDAON', 1),
(164, 4, 'SAMBHAL', 1),
(165, 4, 'HAPUR', 1),
(166, 4, 'AZAMGARH', 1),
(167, 4, 'JAUNPUR', 1),
(168, 4, 'AMBEDKAR NAGAR', 1),
(169, 4, 'GREATER NOIDA', 1),
(170, 4, 'GONDA', 1),
(171, 4, 'ETAWAH', 1),
(172, 4, 'MIRZAPUR', 1),
(173, 4, 'DEORIA', 1),
(174, 4, 'HARDOI', 1),
(175, 4, 'BULANDSHAHR', 1),
(176, 4, 'LAKHIMPUR', 1),
(177, 4, 'MAU', 1),
(178, 4, 'FIROZABAD', 1),
(179, 4, 'SONBHADRA', 1),
(180, 4, 'BIJNOR', 1),
(181, 4, 'LALITPUR', 1),
(182, 4, 'KASHANJ', 1),
(183, 4, 'KUSHINAGAR', 1),
(184, 4, 'HATHRAS', 1),
(185, 4, 'MAINPURI', 1),
(186, 5, 'PATNA', 1),
(187, 5, 'BHAGALPUR', 1),
(188, 5, 'PURNIA', 1),
(189, 5, 'DARBHANGA', 1),
(190, 5, 'BUXAR', 1),
(191, 5, 'KATIHAR', 1),
(192, 5, 'MUNGER', 1),
(193, 5, 'BIHAR SHARIFF', 1),
(194, 5, 'MUZAFFURPUR', 1),
(195, 5, 'BETTIAH', 1),
(196, 5, 'ARRAH', 1),
(197, 5, 'CHHAPRA', 1),
(198, 5, 'SASARAM', 1),
(199, 5, 'GAYA', 1),
(200, 5, 'SIWAN', 1),
(201, 5, 'DEHRI', 1),
(202, 5, 'DEHRI', 1),
(203, 5, 'MOTIHARI', 1),
(204, 5, 'BODH GAYA', 1),
(205, 5, 'KISHANGANJ', 1),
(206, 5, 'JAMALPUR', 1),
(207, 5, 'HAJIPUR', 1),
(208, 5, 'BEGUSARAI', 1),
(209, 5, 'SITAMARHI', 1),
(210, 5, 'SAMASTIPUR', 1),
(211, 5, 'NAWADA', 1),
(212, 5, 'DINAPUR CANTONMENT', 1),
(213, 5, 'KHAGAUL', 1),
(214, 5, 'PAHARPUR', 1),
(215, 5, 'PHULWARI SHARIF', 1),
(216, 5, 'BAGAHA', 1),
(217, 5, 'JEHANABAD', 1),
(218, 5, 'BHABUA', 1),
(219, 6, 'JODHPUR', 1),
(220, 6, 'ALWAR', 1),
(221, 6, 'JAIPUR', 1),
(222, 6, 'BIKANER', 1),
(223, 6, 'UDAIPUR', 1),
(224, 6, 'JAISALMER', 1),
(225, 6, 'AJMER', 1),
(226, 6, 'BHARATPUR', 1),
(227, 6, 'BUNDI', 1),
(228, 6, 'KOTA', 1),
(229, 6, 'CHITTORGARH', 1),
(230, 6, 'DHOLPUR', 1),
(231, 6, 'SAWAI MADHOPUR', 1),
(232, 6, 'SIKAR', 1),
(233, 6, 'GANGAPUR', 1),
(234, 6, 'PUSHKAR', 1),
(235, 6, 'KISHANGARH', 1),
(236, 6, 'HANUMANGARH', 1),
(237, 6, 'NAGAUR', 1),
(238, 6, 'CHURU', 1),
(239, 6, 'BARMER', 1),
(240, 6, 'BANSWARA', 1),
(241, 6, 'HINDAUN', 1),
(242, 6, 'TONK', 1),
(243, 6, 'JALORE', 1),
(244, 6, 'PALI', 1),
(245, 6, 'JHALAWAR', 1),
(246, 6, 'JHUNJHUNU', 1),
(247, 6, 'BEAWAR', 1),
(248, 6, 'DUNGARPUR', 1),
(249, 6, 'BARAN', 1),
(250, 6, 'SRI GANGANAGAR', 1),
(251, 6, 'CHHOTI SADRI', 1),
(252, 6, 'BHILWARA', 1),
(253, 6, 'KARAULI', 1),
(254, 6, 'SIROHI', 1),
(255, 6, 'DAUSA', 1),
(256, 6, 'BARI', 1),
(257, 6, 'BHIWADI', 1),
(258, 6, 'RAJGARH', 1),
(259, 6, 'DIDWANA', 1),
(260, 6, 'DUNGARGARH', 1),
(261, 6, 'NEEMRANA', 1),
(262, 6, 'GULABPURA', 1),
(263, 7, 'BHOPAL', 1),
(264, 7, 'INDORE', 1),
(265, 7, 'GWALIOR', 1),
(266, 7, 'UJJAIN', 1),
(267, 7, 'JABALPUR', 1),
(268, 7, 'REWA', 1),
(269, 7, 'NEEMUCH', 1),
(270, 7, 'SATNA', 1),
(271, 7, 'CHHINDWARA', 1),
(272, 7, 'SAGAR', 1),
(273, 7, 'BURHANPUR', 1),
(274, 7, 'KATNI', 1),
(275, 7, 'DAMOH', 1),
(276, 7, 'SINGRAULI', 1),
(277, 7, 'KHAJURAHO', 1),
(278, 7, 'SHIVPURI', 1),
(279, 7, 'SANCHI', 1),
(280, 7, 'CHHATARPUR', 1),
(281, 7, 'ORCHHA', 1),
(282, 7, 'SEONI', 1),
(283, 7, 'DEWAS', 1),
(284, 7, 'RATLAM', 1),
(285, 7, 'MORENA', 1),
(286, 7, 'VIDISHA', 1),
(287, 7, 'HOSHANGABAD', 1),
(288, 7, 'PITHAMPUR', 1),
(289, 7, 'MANDSAUR', 1),
(290, 7, 'KHANDWA', 1),
(291, 7, 'MANDU', 1),
(292, 7, 'BHIND', 1),
(293, 7, 'GUNA', 1),
(294, 7, 'DHAR', 1),
(295, 7, 'AMARKANTAK', 1),
(296, 7, 'BHOJPUR', 1),
(297, 7, 'BARWANI', 1),
(298, 7, 'ITARSI', 1),
(299, 7, 'MAHESHWAR', 1),
(300, 7, 'MORAR CANTONMENT', 1),
(301, 7, 'PACHMARHI', 1),
(302, 7, 'KHAMARIA', 1),
(303, 10, 'HARIDWAR', 1),
(304, 10, 'DEHRADUN', 1),
(305, 10, 'RISHIKESH', 1),
(306, 10, 'MUSSORIE', 1),
(307, 10, 'BADRINATH', 1),
(308, 10, 'ALMORA', 1),
(309, 10, 'HALDWANI', 1),
(310, 10, 'ROORKEE', 1),
(311, 10, 'RUDRAPUR', 1),
(312, 10, 'RANIKHET', 1),
(313, 10, 'NAINITAL', 1),
(314, 10, 'GANGOTRI', 1),
(315, 10, 'KEDARNATH', 1),
(316, 10, 'AULI', 1),
(317, 10, 'BHIMTAL', 1),
(318, 10, 'LANSDOWNE', 1),
(319, 10, 'KASHIPUR', 1),
(320, 10, 'KAUSANI', 1),
(321, 10, 'BAJPUR', 1),
(322, 10, 'CLEMENT TOWN', 1),
(323, 10, 'CHAMPAWAT', 1),
(324, 10, 'TEHRI', 1),
(325, 10, 'BARKOT', 1),
(326, 10, 'KOTDWAR', 1),
(327, 10, 'NARENDRA NAGAR', 1),
(328, 10, 'CHAKRATA', 1),
(329, 10, 'BHOWALI', 1),
(330, 10, 'CHAMBA', 1),
(331, 10, 'DEVPRAYAG', 1),
(332, 10, 'KATHGODAM', 1),
(333, 10, 'CHAMOLI GOPESHWAR', 1),
(334, 10, 'RAIPUR', 1),
(335, 1, 'DHARAMKOT', 1),
(336, 1, 'BANUR', 1),
(337, 1, 'JALALABAD', 1),
(338, 1, 'QADIAN', 1),
(339, 1, 'JAITU', 1),
(340, 1, 'SUNAM', 1),
(341, 1, 'SANDEEP', 0),
(342, 11, 'KOLKATA', 1),
(343, 11, 'DURGAPUR', 1),
(344, 11, 'SILIGURI', 1),
(345, 11, 'ASANSOL', 1),
(346, 11, 'DARJEELING', 1),
(347, 11, 'BANKURA', 1),
(348, 11, 'BAHARAMPUR', 1),
(349, 11, 'NADIA', 1),
(350, 11, 'HOWRAH', 1),
(351, 11, 'BALURGHAT', 1),
(352, 11, 'HUGLI-CHUCHURA', 1),
(353, 11, 'BIDHAN NAGAR', 1),
(354, 11, 'BARASAT', 1),
(355, 11, 'BARRACKPORE', 1),
(356, 11, 'KALYANI', 1),
(357, 11, 'PURULIA', 1),
(358, 11, 'COOCH BEHAR', 1),
(359, 11, 'PURBA MEDINIPUR', 1),
(360, 11, 'KRISHNANAGAR', 1),
(361, 11, 'CHANDAN NAGAR', 1),
(362, 11, 'HALDIA', 1),
(363, 11, 'SHANTIPUR', 1),
(364, 11, 'JALPAIGURI', 1),
(365, 11, 'HOOGHLY', 1),
(366, 11, 'NEW TOWN, KOLKATA', 1),
(367, 11, 'NAIHATI', 1),
(368, 11, 'KHARAGPUR', 1),
(369, 11, 'BANGAON', 1),
(370, 11, 'ENGLISH BAZAR', 1),
(371, 11, 'BANSBERIA', 1),
(372, 11, 'MAHESHTALA', 1),
(373, 11, 'HABRA', 1),
(374, 11, 'BASIRHAT', 1),
(375, 11, 'DUM DUM', 1),
(376, 11, 'BARDHAMAN', 1),
(377, 11, 'BHADRESWAR', 1),
(378, 11, 'NABADWIP', 1),
(379, 11, 'RAJPUR SONARPUR', 1),
(380, 11, 'ASHOK NAGAR', 1),
(381, 11, 'SERAMPORE', 1),
(382, 11, 'HALISAHAR', 1),
(383, 11, 'PANIHATI', 1),
(384, 12, 'AGARTALA', 1),
(385, 12, 'DHARMANAGAR', 1),
(386, 12, 'KAILASHAHAR', 1),
(387, 12, 'KUNJABAN', 1),
(388, 12, 'JAMPUI HILLS', 1),
(389, 12, 'BELONIA', 1),
(390, 12, 'TELIAMURA', 1),
(391, 12, 'AMBASSA', 1),
(392, 12, 'SABROOM', 1),
(393, 12, 'KUMARGHAT', 1),
(394, 12, 'SONAMURA', 1),
(395, 12, 'KHOWAI', 1),
(396, 12, 'AMARPUR', 1),
(397, 12, 'KAMALPUR', 1),
(398, 12, 'JIRANIA', 1),
(399, 12, 'RANIRBAZAR', 1),
(400, 12, 'BADHARGHAT', 1),
(401, 12, 'PRATAPGARH', 1),
(402, 12, 'JOGENDRANAGAR', 1),
(403, 12, 'NARSINGARH', 1),
(404, 12, 'GAKULNAGAR', 1),
(405, 12, 'MANU', 1),
(406, 12, 'CHAMPAKNAGAR', 1),
(407, 12, 'INDRANAGAR', 1),
(408, 12, 'AMTALI', 1),
(409, 12, 'HEZAMARA', 1),
(410, 12, 'KHUMULWNG', 1),
(411, 12, 'ABHICHARAN', 1),
(412, 1, 'ZIRAKPUR', 1),
(413, 1, 'KOT KAPURA', 1),
(414, 1, 'MALOUT', 1),
(415, 1, 'FIROZPUR CANTT.', 1),
(416, 1, 'SIRHIND FATEHGARH SA', 1),
(417, 1, 'LONGOWAL', 1),
(418, 1, 'URMAR TANDA', 1),
(419, 1, 'MORINDA', 1),
(420, 1, 'PATTRAN', 1),
(421, 1, 'SUJANPUR', 1),
(422, 1, 'TALWARA', 1),
(423, 9, 'DELHI', 1),
(424, 13, 'CHENNAI', 1),
(425, 13, 'COIMBATORE', 1),
(426, 13, 'MADURAI', 1),
(427, 13, 'TIRUCHIRAPPALLI', 1),
(428, 13, 'SALEM', 1),
(429, 13, 'TIRUNELVELI', 1),
(430, 13, 'TIRUPPUR', 1),
(431, 13, 'RANIPET', 1),
(432, 13, 'NAGERCOIL', 1),
(433, 13, 'THANJAVUR', 1),
(434, 13, 'VELLOR', 1),
(435, 13, 'KANCHEEPURAM', 1),
(436, 13, 'TIRUVANNAMALAI', 1),
(437, 13, 'POLLACHI', 1),
(438, 13, 'RAJAPALAYAM', 1),
(439, 13, 'SIVAKASI', 1),
(440, 13, 'PUDUKKOTTAI', 1),
(441, 13, 'NEYVELI (TS)', 1),
(442, 13, 'NAGAPATTINAM', 1),
(443, 13, 'VILUPPURAM', 1),
(444, 13, 'TIRUCHENGODE', 1),
(445, 13, 'VANIYAMBADI', 1),
(446, 13, 'THENI ALLINAGARAM', 1),
(447, 13, 'UDHAGAMANDALAM', 1),
(448, 13, 'ARUPPUKKOTTAI', 1),
(449, 13, 'PARAMAKUDI', 1),
(450, 13, 'ARAKKONAM', 1),
(451, 13, 'VIRUDHACHALAM', 1),
(452, 13, 'SRIVILLIPUTHUR', 1),
(453, 13, 'TINDIVANAM', 1),
(454, 13, 'VIRUDHUNAGAR', 1),
(455, 13, 'KARUR', 1),
(456, 13, 'VALPARAI', 1),
(457, 13, 'SANKARANKOVIL', 1),
(458, 13, 'TENKASI', 1),
(459, 13, 'PALANI', 1),
(460, 13, 'PATTUKKOTTAI', 1),
(461, 13, 'TIRUPATHUR', 1),
(462, 13, 'RAMANATHAPURAM', 1),
(463, 13, 'UDUMALAIPETTAI', 1),
(464, 13, 'GOBICHETTIPALAYAM', 1),
(465, 13, 'THIRUVARUR', 1),
(466, 13, 'THIRUVALLUR', 1),
(467, 13, 'PANRUTI', 1),
(468, 13, 'NAMAKKAL', 1),
(469, 13, 'THIRUMANGALAM', 1),
(470, 13, 'VIKRAMASINGAPURAM', 1),
(471, 13, 'NELLIKUPPAM', 1),
(472, 13, 'RASIPURAM', 1),
(473, 13, 'TIRUTTANI', 1),
(474, 13, 'NANDIVARAM-GUDUVANCH', 1),
(475, 13, 'PERIYAKULAM', 1),
(476, 13, 'PERNAMPATTU', 1),
(477, 13, 'VELLAKOIL', 1),
(478, 13, 'SIVAGANGA', 1),
(479, 13, 'VADALUR', 1),
(480, 13, 'RAMESHWARAM', 1),
(481, 13, 'TIRUVETHIPURAM', 1),
(482, 13, 'PERAMBALUR', 1),
(483, 13, 'USILAMPATTI', 1),
(484, 13, 'VEDARANYAM', 1),
(485, 13, 'SATHYAMANGALAM', 1),
(486, 13, 'PULIYANKUDI', 1),
(487, 13, 'NANJIKOTTAI', 1),
(488, 13, 'THURAIYUR', 1),
(489, 13, 'SIRKALI', 1),
(490, 13, 'TIRUCHENDUR', 1),
(491, 13, 'PERIYASEMUR', 1),
(492, 13, 'SATTUR', 1),
(493, 13, 'VANDAVASI', 1),
(494, 13, 'THARAMANGALAM', 1),
(495, 13, 'TIRUKKOYILUR', 1),
(496, 13, 'ODDANCHATRAM', 1),
(497, 13, 'PALLADAM', 1),
(498, 13, 'VADAKKUVALLIYUR', 1),
(499, 13, 'TIRUKALUKUNDRAM', 1),
(500, 13, 'UTHAMAPALAYAM', 1),
(501, 13, 'SURANDAI', 1),
(502, 13, 'SANKARI', 1),
(503, 13, 'SHENKOTTAI', 1),
(504, 13, 'VADIPATTI', 1),
(505, 13, 'SHOLINGUR', 1),
(506, 13, 'TIRUPATHUR', 1),
(507, 13, 'MANACHANALLUR', 1),
(508, 13, 'VISWANATHAM', 1),
(509, 13, 'POLUR', 1),
(510, 13, 'PANAGUDI', 1),
(511, 13, 'UTHIRAMERUR', 1),
(512, 13, 'THIRUTHURAIPOONDI', 1),
(513, 13, 'PALLAPATTI', 1),
(514, 13, 'PONNERI', 1),
(515, 13, 'LALGUDI', 1),
(516, 13, 'NATHAM', 1),
(517, 13, 'UNNAMALAIKADAI', 1),
(518, 13, 'P.N.PATTI', 1),
(519, 13, 'THARANGAMBADI', 1),
(520, 13, 'TITTAKUDI', 1),
(521, 13, 'PACODE', 1),
(522, 13, 'O\' VALLEY', 1),
(523, 13, 'SURIYAMPALAYAM', 1),
(524, 13, 'SHOLAVANDAN', 1),
(525, 13, 'THAMMAMPATTI', 1),
(526, 13, 'NAMAGIRIPETTAI', 1),
(527, 13, 'PERAVURANI', 1),
(528, 13, 'PARANGIPETTAI', 1),
(529, 13, 'PUDUPATTINAM', 1),
(530, 13, 'PALLIKONDA', 1),
(531, 13, 'SIVAGIRI', 1),
(532, 13, 'PUNJAIPUGALUR', 1),
(533, 13, 'PADMANABHAPURAM', 1),
(534, 13, 'THIRUPUVANAM', 1),
(535, 15, 'BHUBANESWAR', 1),
(536, 15, 'CUTTACK', 1),
(537, 15, 'RAURKELA', 1),
(538, 15, 'BRAHMAPUR', 1),
(539, 15, 'SAMBALPUR', 1),
(540, 15, 'PURI', 1),
(541, 15, 'BALESHWAR TOWN', 1),
(542, 15, 'BARIPADA TOWN', 1),
(543, 15, 'BHADRAK', 1),
(544, 15, 'BALANGIR', 1),
(545, 15, 'JHARSUGUDA', 1),
(546, 15, 'BARGARH', 1),
(547, 15, 'PARADIP', 1),
(548, 15, 'BHAWANIPATNA', 1),
(549, 15, 'DHENKANAL', 1),
(550, 15, 'BARBIL', 1),
(551, 15, 'KENDUJHAR', 1),
(552, 15, 'SUNABEDA', 1),
(553, 15, 'RAYAGADA', 1),
(554, 15, 'JATANI', 1),
(555, 15, 'BYASANAGAR', 1),
(556, 15, 'KENDRAPARA', 1),
(557, 15, 'RAJAGANGAPUR', 1),
(558, 15, 'PARLAKHEMUNDI', 1),
(559, 15, 'TALCHER', 1),
(560, 15, 'SUNDARGARH', 1),
(561, 15, 'PHULABANI', 1),
(562, 15, 'PATTAMUNDAI', 1),
(563, 15, 'TITLAGARH', 1),
(564, 15, 'NABARANGAPUR', 1),
(565, 15, 'SORO', 1),
(566, 15, 'MALKANGIRI', 1),
(567, 15, 'RAIRANGPUR', 1),
(568, 15, 'TARBHA', 1),
(569, 16, 'DIMAPUR', 1),
(570, 16, 'KOHIMA', 1),
(571, 16, 'ZUNHEBOTO', 1),
(572, 16, 'TUENSANG', 1),
(573, 16, 'WOKHA', 1),
(574, 16, 'MOKOKCHUNG', 1),
(575, 17, 'AIZAWL', 1),
(576, 17, 'LUNGLEI', 1),
(577, 17, 'SAIHA', 1),
(578, 18, 'SHILLONG', 1),
(579, 18, 'TURA', 1),
(580, 18, 'NONGSTOIN', 1),
(581, 19, 'IMPHAL', 1),
(582, 19, 'THOUBAL', 1),
(583, 19, 'LILONG', 1),
(584, 19, 'MAYANG IMPHAL', 1),
(585, 20, 'MUMBAI', 1),
(586, 20, 'PUNE', 1),
(587, 20, 'NAGPUR', 1),
(588, 20, 'THANE', 1),
(589, 20, 'NASHIK', 1),
(590, 20, 'KALYAN-DOMBIVALI', 1),
(591, 20, 'VASAI-VIRAR', 1),
(592, 20, 'SOLAPUR', 1),
(593, 20, 'MIRA-BHAYANDAR', 1),
(594, 20, 'BHIWANDI', 1),
(595, 20, 'AMRAVATI', 1),
(596, 20, 'NANDED-WAGHALA', 1),
(597, 20, 'SANGLI', 1),
(598, 20, 'MALEGAON', 1),
(599, 20, 'AKOLA', 1),
(600, 20, 'LATUR', 1),
(601, 20, 'DHULE', 1),
(602, 20, 'AHMEDNAGAR', 1),
(603, 20, 'ICHALKARANJI', 1),
(604, 20, 'PARBHANI', 1),
(605, 20, 'PANVEL', 1),
(606, 20, 'YAVATMAL', 1),
(607, 20, 'ACHALPUR', 1),
(608, 20, 'OSMANABAD', 1),
(609, 20, 'NANDURBAR', 1),
(610, 20, 'SATARA', 1),
(611, 20, 'WARDHA', 1),
(612, 20, 'UDGIR', 1),
(613, 20, 'AURANGABAD', 1),
(614, 20, 'AMALNER', 1),
(615, 20, 'AKOT', 1),
(616, 20, 'PANDHARPUR', 1),
(617, 20, 'SHRIRAMPUR', 1),
(618, 20, 'PARLI', 1),
(619, 20, 'WASHIM', 1),
(620, 20, 'AMBEJOGAI', 1),
(621, 20, 'MANMAD', 1),
(622, 20, 'RATNAGIRI', 1),
(623, 20, 'URAN ISLAMPUR', 1),
(624, 20, 'PUSAD', 1),
(625, 20, 'SANGAMNER', 1),
(626, 20, 'SHIRPUR-WARWADE', 1),
(627, 20, 'MALKAPUR', 1),
(628, 20, 'WANI', 1),
(629, 20, 'LONAVLA', 1),
(630, 20, 'TALEGAON DABHADE', 1),
(631, 20, 'ANJANGAON', 1),
(632, 20, 'UMRED', 1),
(633, 20, 'PALGHAR', 1),
(634, 20, 'SHEGAON', 1),
(635, 20, 'OZAR', 1),
(636, 20, 'PHALTAN', 1),
(637, 20, 'YEVLA', 1),
(638, 20, 'SHAHADE', 1),
(639, 20, 'VITA', 1),
(640, 20, 'UMARKHED', 1),
(641, 20, 'WARORA', 1),
(642, 20, 'PACHORA', 1),
(643, 20, 'TUMSAR', 1),
(644, 20, 'MANJLEGAON', 1),
(645, 20, 'SILLOD', 1),
(646, 20, 'ARVI', 1),
(647, 20, 'NANDURA', 1),
(648, 20, 'VAIJAPUR', 1),
(649, 20, 'WADGAON ROAD', 1),
(650, 20, 'SAILU', 1),
(651, 20, 'MURTIJAPUR', 1),
(652, 20, 'TASGAON', 1),
(653, 20, 'MEHKAR', 1),
(654, 20, 'YAWAL', 1),
(655, 20, 'PULGAON', 1),
(656, 20, 'NILANGA', 1),
(657, 20, 'WAI', 1),
(658, 20, 'UMARGA', 1),
(659, 20, 'PAITHAN', 1),
(660, 20, 'RAHURI', 1),
(661, 20, 'NAWAPUR', 1),
(662, 20, 'TULJAPUR', 1),
(663, 20, 'MORSHI', 1),
(664, 20, 'PURNA', 1),
(665, 20, 'SATANA', 1),
(666, 20, 'PATHRI', 1),
(667, 20, 'SINNAR', 1),
(668, 20, 'UCHGAON', 1),
(669, 20, 'URAN', 1),
(670, 20, 'PEN', 1),
(671, 20, 'KARJAT', 1),
(672, 20, 'MANWATH', 1),
(673, 20, 'PARTUR', 1),
(674, 20, 'SANGOLE', 1),
(675, 20, 'MANGRULPIR', 1),
(676, 20, 'RISOD', 1),
(677, 20, 'SHIRUR', 1),
(678, 20, 'SAVNER', 1),
(679, 20, 'SASVAD', 1),
(680, 20, 'PANDHARKAODA', 1),
(681, 20, 'TALODE', 1),
(682, 20, 'SHRIGONDA', 1),
(683, 20, 'SHIRDI', 1),
(684, 20, 'RAVER', 1),
(685, 20, 'MUKHED', 1),
(686, 20, 'VADGAON KASBA', 1),
(687, 20, 'TIRORA', 1),
(688, 20, 'MAHAD', 1),
(689, 20, 'LONAR', 1),
(690, 20, 'SAWANTWADI', 1),
(691, 20, 'PATHARDI', 1),
(692, 20, 'PAUNI', 1),
(693, 20, 'RAMTEK', 1),
(694, 20, 'MUL', 1),
(695, 20, 'SOYAGAON', 1),
(696, 20, 'MANGALVEDHE', 1),
(697, 20, 'NARKHED', 1),
(698, 20, 'SHENDURJANA', 1),
(699, 20, 'PATUR', 1),
(700, 20, 'MHASWAD', 1),
(701, 20, 'LOHA', 1),
(702, 20, 'NANDGAON', 1),
(703, 20, 'WARUD', 1),
(704, 0, 'GANGTOK', 1),
(705, 14, 'GANGTOK', 1),
(706, 14, 'NAMCHI', 1),
(707, 14, 'MANGAN', 1),
(708, 14, 'PELLING', 1),
(709, 14, 'JORETHANG', 1),
(710, 14, 'GYALSING', 1),
(711, 14, 'YUKSOM', 1),
(712, 14, 'RANGPO', 1),
(713, 14, 'RAVANGLA', 1),
(714, 14, 'LACHUNG', 1),
(715, 14, 'LACHEN', 1),
(716, 14, 'RICHENPONG', 1),
(717, 14, 'PAKYONG', 1),
(718, 14, 'SINGHIK', 1),
(719, 14, 'MELLI', 1),
(720, 14, 'UPPER TADONG', 1),
(721, 14, 'NAYABAZAR', 1),
(722, 0, 'RABDENTSE', 1),
(723, 14, 'RABDENTSE', 1),
(724, 14, 'TUMLONG', 1),
(725, 14, 'CHIDAM', 1),
(726, 14, 'SORENG', 1),
(727, 14, 'HEE BURMIOK', 1),
(728, 14, 'PHODONG', 1),
(729, 14, 'KABI LONGSTOK', 1),
(730, 14, 'MAJITAR', 1),
(731, 14, 'CHUNGTHANG', 1),
(732, 14, 'RONGLI', 1),
(733, 14, 'NAMOK', 1),
(734, 14, 'TINKITAM', 1),
(735, 14, 'TARKU', 1),
(736, 14, 'RANGUTHANG', 1),
(737, 21, 'THIRUVANANTHAPURAM', 1),
(738, 21, 'KOCHI', 1),
(739, 25, 'CHHATTISGARH	', 1),
(740, 21, 'KOZHIKODE', 1),
(741, 21, 'KOLLAM', 1),
(742, 21, 'THRISSUR', 1),
(743, 21, 'PALAKKAD', 1),
(744, 21, 'ALAPPUZHA', 1),
(745, 21, 'MALAPPURAM', 1),
(746, 21, 'PONNANI', 1),
(747, 21, 'VATAKARA', 1),
(748, 21, 'KANHANGAD', 1),
(749, 21, 'TALIPARAMBA', 1),
(750, 21, 'KOYILANDY', 1),
(751, 21, 'NEYYATTINKARA', 1),
(752, 21, 'KAYAMKULAM', 1),
(753, 21, 'NEDUMANGAD', 1),
(754, 21, 'KANNUR', 1),
(755, 21, 'TIRUR', 1),
(756, 21, 'KOTTAYAM', 1),
(757, 21, 'KASARAGOD', 1),
(758, 21, 'KUNNAMKULAM', 1),
(759, 21, 'OTTAPPALAM', 1),
(760, 21, 'THIRUVALLA', 1),
(761, 21, 'THODUPUZHA', 1),
(762, 21, 'CHALAKUDY', 1),
(763, 21, 'CHANGANASSERY', 1),
(764, 21, 'PUNALUR', 1),
(765, 21, 'NILAMBUR', 1),
(766, 21, 'CHERTHALA', 1),
(767, 21, 'PERINTHALMANNA', 1),
(768, 21, 'MATTANNUR', 1),
(769, 21, 'SHORANUR', 1),
(770, 21, 'VARKALA', 1),
(771, 21, 'PARAVOOR', 1),
(772, 21, 'PATHANAMTHITTA', 1),
(773, 21, 'PERINGATHUR', 1),
(774, 21, 'ATTINGAL', 1),
(775, 21, 'KODUNGALLUR', 1),
(776, 21, 'PAPPINISSERI', 1),
(777, 21, 'CHITTUR-THATHAMANGAL', 1),
(778, 21, 'MUVATTUPUZHA', 1),
(779, 21, 'ADOOR', 1),
(780, 21, 'MAVELIKKARA', 1),
(781, 21, 'MAVOOR', 1),
(782, 21, 'PERUMBAVOOR', 1),
(783, 21, 'VAIKOM', 1),
(784, 21, 'PALAI', 1),
(785, 21, 'PANNIYANNUR', 1),
(786, 21, 'GURUVAYOOR', 1),
(787, 21, 'PUTHUPPALLY', 1),
(788, 21, 'PANAMATTOM', 1),
(789, 22, 'BENGALURU', 1),
(790, 22, 'HUBLI-DHARWAD', 1),
(791, 22, 'BELAGAVI', 1),
(792, 22, 'MANGALURU', 1),
(793, 22, 'DAVANAGERE', 1),
(794, 22, 'BALLARI', 1),
(795, 22, 'MYSORE', 1),
(796, 22, 'TUMKUR', 1),
(797, 22, 'SHIVAMOGGA', 1),
(798, 22, 'RAAYACHURU', 1),
(799, 22, 'ROBERTSON PET', 1),
(800, 22, 'KOLAR', 1),
(801, 22, 'MANDYA', 1),
(802, 22, 'UDUPI', 1),
(803, 22, 'CHIKKAMAGALURU', 1),
(804, 22, 'KARWAR', 1),
(805, 22, 'RANEBENNURU', 1),
(806, 22, 'RANEBENNURU', 0),
(807, 22, 'RANIBENNUR', 1),
(808, 22, 'RAMANAGARAM', 1),
(809, 22, 'GOKAK', 1),
(810, 22, 'YADGIR', 1),
(811, 22, 'RABKAVI BANHATTI', 1),
(812, 22, 'SHAHABAD', 1),
(813, 22, 'SIRSI', 1),
(814, 22, 'SINDHNUR', 1),
(815, 22, 'TIPTUR', 1),
(816, 22, 'ARSIKERE', 1),
(817, 22, 'NANJANGUD', 1),
(818, 22, 'SAGARA', 1),
(819, 22, 'SIRA', 1),
(820, 22, 'PUTTUR', 1),
(821, 22, 'ATHNI', 1),
(822, 22, 'MULBAGAL', 1),
(823, 22, 'SURAPURA', 1),
(824, 22, 'SIRUGUPPA', 1),
(825, 22, 'MUDHOL', 1),
(826, 22, 'SIDLAGHATTA', 1),
(827, 22, 'SHAHPUR', 1),
(828, 22, 'SAUNDATTI-YELLAMMA', 1),
(829, 22, 'WADI', 1),
(830, 22, 'MANVI', 1),
(831, 22, 'NELAMANGALA', 1),
(832, 22, 'LAKSHMESHWAR', 1),
(833, 22, 'RAMDURG', 1),
(834, 22, 'NARGUND', 1),
(835, 22, 'TARIKERE', 1),
(836, 22, 'MALAVALLI', 1),
(837, 22, 'SAVANUR', 1),
(838, 22, 'LINGSUGUR', 1),
(839, 22, 'VIJAYAPURA', 1),
(840, 22, 'SANKESHWARA', 1),
(841, 22, 'MADIKERI', 1),
(842, 22, 'TALIKOTA', 1),
(843, 22, 'SEDAM', 1),
(844, 22, 'SHIKARIPUR', 1),
(845, 22, 'MAHALINGAPURA', 1),
(846, 22, 'MUDALAGI', 1),
(847, 22, 'MUDDEBIHAL', 1),
(848, 22, 'PAVAGADA', 1),
(849, 22, 'MALUR', 1),
(850, 22, 'SINDHAGI', 1),
(851, 22, 'SANDURU', 1),
(852, 22, 'AFZALPUR', 1),
(853, 22, 'MADDUR', 1),
(854, 22, 'MADHUGIRI', 1),
(855, 22, 'TEKKALAKOTE', 1),
(856, 22, 'TERDAL', 1),
(857, 22, 'MUDABIDRI', 1),
(858, 22, 'MAGADI', 1),
(859, 22, 'NAVALGUND', 1),
(860, 22, 'SHIGGAON', 1),
(861, 22, 'SHRIRANGAPATTANA', 1),
(862, 22, 'SINDAGI', 1),
(863, 22, 'SAKALESHAPURA', 1),
(864, 22, 'SRINIVASPUR', 1),
(865, 22, 'RON', 1),
(866, 22, 'MUNDARGI', 1),
(867, 22, 'SADALAGI', 1),
(868, 22, 'PIRIYAPATNA', 1),
(869, 22, 'ADYAR', 1),
(870, 23, 'DHANBAD', 1),
(871, 23, 'RANCHI', 1),
(872, 23, 'JAMSHEDPUR', 1),
(873, 23, 'BOKARO STEEL CITY', 1),
(874, 23, 'DEOGHAR', 1),
(875, 23, 'PHUSRO', 1),
(876, 23, 'ADITYAPUR', 1),
(877, 23, 'HAZARIBAG', 1),
(878, 23, 'GIRIDIH', 1),
(879, 23, 'RAMGARH', 1),
(880, 23, 'JHUMRI TILAIYA', 1),
(881, 23, 'SAUNDA', 1),
(882, 23, 'SAHIBGANJ', 1),
(883, 23, 'MEDININAGAR (DALTONG', 1),
(884, 23, 'CHAIBASA', 1),
(885, 23, 'CHATRA', 1),
(886, 23, 'GUMIA', 1),
(887, 23, 'DUMKA', 1),
(888, 23, 'MADHUPUR', 1),
(889, 23, 'CHIRKUNDA', 1),
(890, 23, 'PAKAUR', 1),
(891, 23, 'SIMDEGA', 1),
(892, 23, 'MUSABANI', 1),
(893, 23, 'MIHIJAM', 1),
(894, 23, 'PATRATU', 1),
(895, 23, 'LOHARDAGA', 1),
(896, 23, 'TENU DAM-CUM-KATHHAR', 1),
(897, 24, 'SRINAGAR', 1),
(898, 24, 'JAMMU', 1),
(899, 24, 'BARAMULA', 1),
(900, 24, 'ANANTNAG', 1),
(901, 24, 'SOPORE', 1),
(902, 24, 'KATHURBAN AGGLOMERAT', 1),
(903, 24, 'RAJAURI', 1),
(904, 24, 'PUNCH', 1),
(905, 24, 'UDHAMPUR', 1),
(906, 25, 'RAIPUR', 1),
(907, 25, 'BHILAI NAGAR', 1),
(908, 25, 'KORBA', 1),
(909, 25, 'BILASPUR', 1),
(910, 25, 'DURG', 1),
(911, 25, 'RAJNANDGAON', 1),
(912, 25, 'JAGDALPUR', 1),
(913, 25, 'RAIGARH', 1),
(914, 25, 'AMBIKAPUR', 1),
(915, 25, 'MAHASAMUND', 1),
(916, 25, 'DHAMTARI', 1),
(917, 25, 'CHIRMIRI', 1),
(918, 25, 'BHATAPARA', 1),
(919, 25, 'DALLI-RAJHARA', 1),
(920, 25, 'NAILA JANJGIR', 1),
(921, 25, 'TILDA NEWRA', 1),
(922, 25, 'MUNGELI', 1),
(923, 25, 'MANENDRAGARH', 1),
(924, 25, 'SAKTI', 1),
(925, 26, 'GUWAHATI', 1),
(926, 26, 'SILCHAR', 1),
(927, 26, 'DIBRUGARH', 1),
(928, 26, 'NAGAON', 1),
(929, 26, 'TINSUKIA', 1),
(930, 26, 'JORHAT', 1),
(931, 26, 'BONGAIGAON CITY', 1),
(932, 26, 'DHUBRI', 1),
(933, 26, 'DIPHU', 1),
(934, 26, 'NORTH LAKHIMPUR', 1),
(935, 26, 'TEZPUR', 1),
(936, 26, 'KARIMGANJ', 1),
(937, 26, '', 1),
(938, 26, 'SIBSAGAR', 1),
(939, 26, 'GOALPARA', 1),
(940, 26, 'BARPETA', 1),
(941, 26, 'LANKA', 1),
(942, 26, 'LUMDING', 1),
(943, 26, 'MANKACHAR', 1),
(944, 26, 'NALBARI', 1),
(945, 26, 'RANGIA', 1),
(946, 26, 'MARGHERITA', 1),
(947, 26, 'MANGALDOI', 1),
(948, 26, 'SILAPATHAR', 1),
(949, 26, 'MARIANI', 1),
(950, 26, 'MARIGAON', 1),
(951, 28, 'NAHARLAGUN', 1),
(952, 28, 'PASIGHAT', 1),
(953, 27, 'VISAKHAPATNAM', 1),
(954, 27, 'VIJAYAWADA', 1),
(955, 27, 'GUNTUR', 1),
(956, 27, 'NELLORE', 1),
(957, 27, 'KURNOOL', 1),
(958, 27, 'RAJAHMUNDRY', 1),
(959, 27, 'KAKINADA', 1),
(960, 27, 'TIRUPATI', 1),
(961, 27, 'ANANTAPUR', 1),
(962, 27, 'KADAPA', 1),
(963, 27, 'VIZIANAGARAM', 1),
(964, 27, 'ELURU', 1),
(965, 27, 'ONGOLE', 1),
(966, 27, 'NANDYAL', 1),
(967, 27, 'MACHILIPATNAM', 1),
(968, 27, 'ADONI', 1),
(969, 27, 'TENALI', 1),
(970, 27, 'CHITTOOR', 1),
(971, 27, 'HINDUPUR', 1),
(972, 27, 'PRODDATUR', 1),
(973, 27, 'BHIMAVARAM', 1),
(974, 27, 'MADANAPALLE', 1),
(975, 27, 'GUNTAKAL', 1),
(976, 27, 'DHARMAVARAM', 1),
(977, 27, 'GUDIVADA', 1),
(978, 27, 'SRIKAKULAM', 1),
(979, 27, 'NARASARAOPET', 1),
(980, 27, 'RAJAMPET', 1),
(981, 27, 'TADPATRI', 1),
(982, 27, 'TADEPALLIGUDEM', 1),
(983, 27, 'CHILAKALURIPET', 1),
(984, 27, 'YEMMIGANUR', 1),
(985, 27, 'KADIRI', 1),
(986, 27, 'CHIRALA', 1),
(987, 27, 'ANAKAPALLE', 1),
(988, 27, 'KAVALI', 1),
(989, 27, 'PALACOLE', 1),
(990, 27, 'SULLURPETA', 1),
(991, 27, 'TANUKU', 1),
(992, 27, 'RAYACHOTI', 1),
(993, 27, 'SRIKALAHASTI', 1),
(994, 27, 'BAPATLA', 1),
(995, 27, 'NAIDUPET', 1),
(996, 27, 'NAGARI', 1),
(997, 27, 'GUDUR', 1),
(998, 27, 'VINUKONDA', 1),
(999, 27, 'NARASAPURAM', 1),
(1000, 27, 'NUZVID', 1),
(1001, 27, 'MARKAPUR', 1),
(1002, 27, 'PONNUR', 1),
(1003, 27, 'KANDUKUR', 1),
(1004, 27, 'BOBBILI', 1),
(1005, 27, 'RAYADURG', 1),
(1006, 27, 'SAMALKOT', 1),
(1007, 27, 'JAGGAIAHPET', 1),
(1008, 27, 'TUNI', 1),
(1009, 27, 'AMALAPURAM', 1),
(1010, 27, 'BHEEMUNIPATNAM', 1),
(1011, 27, 'VENKATAGIRI', 1),
(1012, 27, 'SATTENAPALLE', 1),
(1013, 27, 'PITHAPURAM', 1),
(1014, 27, 'PALASA KASIBUGGA', 1),
(1015, 27, 'PARVATHIPURAM', 1),
(1016, 27, 'MACHERLA', 1),
(1017, 27, 'GOOTY', 1),
(1018, 27, 'SALUR', 1),
(1019, 27, 'MANDAPETA', 1),
(1020, 27, 'JAMMALAMADUGU', 1),
(1021, 27, 'PEDDAPURAM', 1),
(1022, 27, 'PUNGANUR', 1),
(1023, 27, 'NIDADAVOLE', 1),
(1024, 27, 'REPALLE', 1),
(1025, 27, 'RAMACHANDRAPURAM', 1),
(1026, 27, 'KOVVUR', 1),
(1027, 27, 'TIRUVURU', 1),
(1028, 27, 'URAVAKONDA', 1),
(1029, 27, 'NARSIPATNAM', 1),
(1030, 27, 'YERRAGUNTLA', 1),
(1031, 27, 'PEDANA', 1),
(1032, 27, 'PUTTUR', 1),
(1033, 27, 'RENIGUNTA', 1),
(1034, 27, 'RAJAM', 1),
(1035, 27, 'SRISAILAM PROJECT (R', 1),
(1036, 29, 'GOA', 1),
(1037, 29, 'MARMAGAO', 1),
(1038, 29, 'PANAJI', 1),
(1039, 29, 'MARGAO', 1),
(1040, 29, 'MAPUSA', 1),
(1041, 30, 'AHMEDABAD', 1),
(1042, 30, 'SURAT', 1),
(1043, 30, 'VADODARA', 1),
(1044, 30, 'RAJKOT', 1),
(1045, 30, 'BHAVNAGAR', 1),
(1046, 30, 'JAMNAGAR', 1),
(1047, 30, 'NADIAD', 1),
(1048, 30, 'PORBANDAR', 1),
(1049, 30, 'ANAND', 1),
(1050, 30, 'MORVI', 1),
(1051, 30, 'MAHESANA', 1),
(1052, 30, 'BHARUCH', 1),
(1053, 30, 'VAPI', 1),
(1054, 30, 'NAVSARI', 1),
(1055, 30, 'VERAVAL', 1),
(1056, 30, 'BHUJ', 1),
(1057, 30, 'GODHRA', 1),
(1058, 30, 'PALANPUR', 1),
(1059, 30, 'VALSAD', 1),
(1060, 30, 'PATAN', 1),
(1061, 30, 'DEESA', 1),
(1062, 30, 'AMRELI', 1),
(1063, 30, 'ANJAR', 1),
(1064, 30, 'DHORAJI', 1),
(1065, 30, 'KHAMBHAT', 1),
(1066, 30, 'MAHUVA', 1),
(1067, 30, 'KESHOD', 1),
(1068, 30, 'WADHWAN', 1),
(1069, 30, 'ANKLESHWAR', 1),
(1070, 30, 'SAVARKUNDLA', 1),
(1071, 30, 'KADI', 1),
(1072, 30, 'VISNAGAR', 1),
(1073, 30, 'UPLETA', 1),
(1074, 30, 'UNA', 1),
(1075, 30, 'SIDHPUR', 1),
(1076, 30, 'UNJHA', 1),
(1077, 30, 'MANGROL', 1),
(1078, 30, 'VIRAMGAM', 1),
(1079, 30, 'MODASA', 1),
(1080, 30, 'PALITANA', 1),
(1081, 30, 'PETLAD', 1),
(1082, 30, 'KAPADVANJ', 1),
(1083, 30, 'SIHOR', 1),
(1084, 30, 'WANKANER', 1),
(1085, 30, 'LIMBDI', 1),
(1086, 30, 'MANDVI', 1),
(1087, 30, 'THANGADH', 1),
(1088, 30, 'VYARA', 1),
(1089, 30, 'PADRA', 1),
(1090, 30, 'LUNAWADA', 1),
(1091, 30, 'RAJPIPLA', 1),
(1092, 30, 'VAPI', 1),
(1093, 30, 'UMRETH', 1),
(1094, 30, 'SANAND', 1),
(1095, 30, 'RAJULA', 1),
(1096, 30, 'RADHANPUR', 1),
(1097, 30, 'MAHEMDABAD', 1),
(1098, 30, 'RANAVAV', 1),
(1099, 30, 'THARAD', 1),
(1100, 30, 'MANSA', 1),
(1101, 30, 'UMBERGAON', 1),
(1102, 30, 'TALAJA', 1),
(1103, 30, 'VADNAGAR', 1),
(1104, 30, 'MANAVADAR', 1),
(1105, 30, 'SALAYA', 1),
(1106, 30, 'VIJAPUR', 1),
(1107, 30, 'PARDI', 1),
(1108, 30, 'RAPAR', 1),
(1109, 30, 'SONGADH', 1),
(1110, 30, 'LATHI', 1),
(1111, 30, 'ADALAJ', 1),
(1112, 30, 'CHHAPRA', 1);


--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` varchar(15) DEFAULT NULL,
  `section` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `fee_details` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `daily_attendance`
--

CREATE TABLE `daily_attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `marked_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hod` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `position`) VALUES
(4, 'CLERK'),
(5, 'ASSISTANT PROFESSOR');


--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `roll_number` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_of_receipt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fee_taker` int(11) NOT NULL,
  `fee_type` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `day` varchar(25) NOT NULL,
  `slot_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `ir` tinyint(1) NOT NULL DEFAULT '0',
  `vr` tinyint(1) NOT NULL DEFAULT '0',
  `ur` tinyint(1) NOT NULL DEFAULT '0',
  `dr` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `timings` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `stateid` int(11) NOT NULL,
  `statename` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateid`, `statename`, `status`) VALUES
(1, 'PUNJAB', 1),
(2, 'HARYANA', 1),
(3, 'HIMACHAL PRADESH', 1),
(4, 'UTTAR PRADESH', 1),
(5, 'BIHAR', 1),
(6, 'RAJASTHAN', 1),
(7, 'MADHYA PRADESH', 1),
(8, 'SDFDS', 0),
(9, 'DELHI', 1),
(10, 'UTTARAKHAND', 1),
(11, 'WEST BANGAL', 1),
(12, 'TRIPURA', 1),
(13, 'TAMIL NADU', 1),
(14, 'SIKKIM', 1),
(15, 'ODISHA (ORISSA)', 1),
(16, 'NAGALAND', 1),
(17, 'MIZORAM', 1),
(18, 'MEGHALAYA', 1),
(19, 'MANIPUR', 1),
(20, 'MAHARASHTRA', 1),
(21, 'KERALA', 1),
(22, 'KARNATAKA', 1),
(23, 'JHARKHAND', 1),
(24, 'JAMMU & KASHMIR', 1),
(25, 'CHHATTISGARH', 1),
(26, 'ASSAM', 1),
(27, 'ANDHRA PRADESH', 1),
(28, 'ARUNACHAL PRADESH', 1),
(29, 'GOA', 1),
(30, 'GUJARAT', 1);

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `roll_number` varchar(25) NOT NULL,
  `f_name` varchar(25) DEFAULT NULL,
  `l_name` varchar(25) DEFAULT NULL,
  `m_name` varchar(25) DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `parents_contact` varchar(15) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `joining_date` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `full_fee` varchar(50) NOT NULL,
  `fee_paid` varchar(50) DEFAULT '0',
  `due_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `assigned_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` date NOT NULL,
  `priority` varchar(10) NOT NULL,
  `assigned_by` int(50) NOT NULL,
  `assigned_to` int(50) NOT NULL,
  `viewed` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `des_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(250) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `teacher_attend`
--

CREATE TABLE `teacher_attend` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `marked_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attend`
--
ALTER TABLE `teacher_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attend`
--
ALTER TABLE `attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher_attend`
--
ALTER TABLE `teacher_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
