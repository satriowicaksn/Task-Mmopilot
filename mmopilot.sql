-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 03:02 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmopilot`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id_country`, `country`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Albania', 1),
(3, 'Algeria', 1),
(4, 'Andorra', 1),
(5, 'Angola', 1),
(6, 'Antigua and Barbuda', 1),
(7, 'Argentina', 1),
(8, 'Armenia', 1),
(9, 'Australia', 1),
(10, 'Austria', 1),
(11, 'Azerbaijan', 1),
(12, 'Bahamas', 1),
(13, 'Bahrain', 1),
(14, 'Bangladesh', 1),
(15, 'Barbados', 1),
(16, 'Belarus', 1),
(17, 'Belgium', 1),
(18, 'Belize', 1),
(19, 'Benin', 1),
(20, 'Bhutan', 1),
(21, 'Bolivia', 1),
(22, 'Bosnia and Herzegovina', 1),
(23, 'Botswana', 1),
(24, 'Brazil', 1),
(25, 'Brunei', 1),
(26, 'Bulgaria', 1),
(27, 'Burkina Faso', 1),
(28, 'Burundi', 1),
(29, 'Cabo Verde', 1),
(30, 'Cambodia', 1),
(31, 'Cameroon', 1),
(32, 'Canada', 1),
(33, 'Central African Republic', 1),
(34, 'Chad', 1),
(35, 'Chile', 1),
(36, 'China', 1),
(37, 'Colombia', 1),
(38, 'Comoros', 1),
(39, 'Congo, Republic of the', 1),
(40, 'Congo, Democratic Republic of the', 1),
(41, 'Costa Rica', 1),
(42, 'Cote d Ivoire', 1),
(43, 'Croatia', 1),
(44, 'Cuba', 1),
(45, 'Cyprus', 1),
(46, 'Czech Republic', 1),
(47, 'Denmark', 1),
(48, 'Djibouti', 1),
(49, 'Dominica', 1),
(50, 'Dominican Republic', 1),
(51, 'Ecuador', 1),
(52, 'Egypt', 1),
(53, 'El Salvador', 1),
(54, 'Equatorial Guinea', 1),
(55, 'Eritrea', 1),
(56, 'Estonia', 1),
(57, 'Ethiopia', 1),
(58, 'Fiji', 1),
(59, 'Finland', 1),
(60, 'France', 1),
(61, 'Gabon', 1),
(62, 'Gambia', 1),
(63, 'Georgia', 1),
(64, 'Germany', 1),
(65, 'Ghana', 1),
(66, 'Greece', 1),
(67, 'Grenada', 1),
(68, 'Guatemala', 1),
(69, 'Guinea', 1),
(70, 'Guinea-Bissau', 1),
(71, 'Guyana', 1),
(72, 'Haiti', 1),
(73, 'Honduras', 1),
(74, 'Hungary', 1),
(75, 'Iceland', 1),
(76, 'India', 1),
(77, 'Indonesia', 1),
(78, 'Iran', 1),
(79, 'Iraq', 1),
(80, 'Ireland', 1),
(81, 'Italy', 1),
(82, 'Jamaica', 1),
(83, 'Japan', 1),
(84, 'Jordan', 1),
(85, 'Kazakhstan', 1),
(86, 'Kenya', 1),
(87, 'Kiribati', 1),
(88, 'Kosovo', 1),
(89, 'Kuwait', 1),
(90, 'Kyrgyzstan', 1),
(91, 'Laos', 1),
(92, 'Latvia', 1),
(93, 'Lebanon', 1),
(94, 'Lesotho', 1),
(95, 'Liberia', 1),
(96, 'Libya', 1),
(97, 'Liechtenstein', 1),
(98, 'Lithuania', 1),
(99, 'Luxembourg', 1),
(100, 'Macedonia', 1),
(101, 'Madagascar', 1),
(102, 'Malawi', 1),
(103, 'Malaysia', 1),
(104, 'Maldives', 1),
(105, 'Mali', 1),
(106, 'Malta', 1),
(107, 'Marshall Islands', 1),
(108, 'Mauritania', 1),
(109, 'Mauritius', 1),
(110, 'Mexico', 1),
(111, 'Micronesia', 1),
(112, 'Moldova', 1),
(113, 'Monaco', 1),
(114, 'Mongolia', 1),
(115, 'Montenegro', 1),
(116, 'Morocco', 1),
(117, 'Mozambique', 1),
(118, 'Myanmar (Burma)', 1),
(119, 'Namibia', 1),
(120, 'Nauru', 1),
(121, 'Nepal', 1),
(122, 'Netherlands', 1),
(123, 'New Zealand', 1),
(124, 'Nicaragua', 1),
(125, 'Niger', 1),
(126, 'Nigeria', 1),
(127, 'North Korea', 1),
(128, 'Norway', 1),
(129, 'Oman', 1),
(130, 'Pakistan', 1),
(131, 'Palau', 1),
(132, 'Palestine', 1),
(133, 'Panama', 1),
(134, 'Papua New Guinea', 1),
(135, 'Paraguay', 1),
(136, 'Peru', 1),
(137, 'Philippines', 1),
(138, 'Poland', 1),
(139, 'Portugal', 1),
(140, 'Qatar', 1),
(141, 'Romania', 1),
(142, 'Russia', 1),
(143, 'Rwanda', 1),
(144, 'St. Kitts and Nevis', 1),
(145, 'St. Lucia', 1),
(146, 'St. Vincent and The Grenadines', 1),
(147, 'Samoa', 1),
(148, 'San Marino', 1),
(149, 'Sao Tome and Principe', 1),
(150, 'Saudi Arabia', 1),
(151, 'Senegal', 1),
(152, 'Serbia', 1),
(153, 'Seychelles', 1),
(154, 'Sierra Leone', 1),
(155, 'Singapore', 1),
(156, 'Slovakia', 1),
(157, 'Slovenia', 1),
(158, 'Solomon Islands', 1),
(159, 'Somalia', 1),
(160, 'South Africa', 1),
(161, 'South Korea', 1),
(162, 'South Sudan', 1),
(163, 'Spain', 1),
(164, 'Sri Lanka', 1),
(165, 'Sudan', 1),
(166, 'Suriname', 1),
(167, 'Swaziland', 1),
(168, 'Sweden', 1),
(169, 'Switzerland', 1),
(170, 'Syria', 1),
(171, 'Taiwan', 1),
(172, 'Tajikistan', 1),
(173, 'Tanzania', 1),
(174, 'Thailand', 1),
(175, 'Timor-Leste', 1),
(176, 'Togo', 1),
(177, 'Tonga', 1),
(178, 'Trinidad and Tobago', 1),
(179, 'Tunisia', 1),
(180, 'Turkey', 1),
(181, 'Turkmenistan', 1),
(182, 'Tuvalu', 1),
(183, 'Uganda', 1),
(184, 'Ukraine', 1),
(185, 'United Arab Emirates', 1),
(186, 'United Kingdom (UK)', 1),
(187, 'United States of America (USA)', 1),
(188, 'Uruguay', 1),
(189, 'Uzbekistan', 1),
(190, 'Vanuatu', 1),
(191, 'Vatican City (Holy See)', 1),
(192, 'Venezuela', 1),
(193, 'Vietnam', 1),
(194, 'Yemen', 1),
(195, 'Zambia', 1),
(196, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mmo_client`
--

CREATE TABLE `mmo_client` (
  `id_client` int(11) NOT NULL,
  `nama_client` text NOT NULL,
  `email_client` text NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `whatsapp` varchar(55) NOT NULL,
  `facebook` text NOT NULL,
  `discord` text NOT NULL,
  `skype` text NOT NULL,
  `client_kode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_client`
--

INSERT INTO `mmo_client` (`id_client`, `nama_client`, `email_client`, `username`, `password`, `address`, `whatsapp`, `facebook`, `discord`, `skype`, `client_kode`) VALUES
(4, 'Satrio Putro Wicakson', 'satriowicaksono076@gmail.com', 'satrio', 'asasasas', 'Jl. Mt Haryono Malang', '', '', '', '', '1596089366'),
(6, 'Ardhito Pramono', 'admin@gmail.com', 'ardhito', 'ardhito', '', '08999', '', '', '', '1596091547'),
(7, 'client2', 'client2@gmail.com', 'client', '040302002', '', '', '', '', '', '1596365715'),
(9, 'client3', 'client3@gmail.com', 'client_3', 'client', '', '', '', '', '', '1596365768');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_client_game`
--

CREATE TABLE `mmo_client_game` (
  `id_client_game` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `username_game` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_client_game`
--

INSERT INTO `mmo_client_game` (`id_client_game`, `id_client`, `id_game`, `username_game`) VALUES
(9, 5, 3, 'aasas'),
(10, 5, 1, 'asasasas'),
(11, 4, 4, '#fasdasd'),
(12, 4, 3, 'asdadasdas'),
(13, 4, 1, '#SATRIOPUTROWW'),
(15, 6, 1, 'aku'),
(16, 6, 4, '#SATRIOPUTROWW');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_game`
--

CREATE TABLE `mmo_game` (
  `id_game` int(11) NOT NULL,
  `nama_game` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_game`
--

INSERT INTO `mmo_game` (`id_game`, `nama_game`) VALUES
(1, 'Guildwars 2'),
(3, 'Wow Classic'),
(4, 'Albion Online');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_item`
--

CREATE TABLE `mmo_item` (
  `id_item` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `item_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_item`
--

INSERT INTO `mmo_item` (`id_item`, `id_game`, `item`, `item_desc`) VALUES
(44, 1, 'Gold', 'hasas'),
(45, 3, 'Item wow', 'asasas'),
(46, 1, 'Item A', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_job_day`
--

CREATE TABLE `mmo_job_day` (
  `id_job_day` int(11) NOT NULL,
  `id_job_item` int(11) NOT NULL,
  `jam` time NOT NULL,
  `cek_target` text NOT NULL,
  `hari` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_job_day`
--

INSERT INTO `mmo_job_day` (`id_job_day`, `id_job_item`, `jam`, `cek_target`, `hari`, `tanggal`) VALUES
(64, 82, '07:00:00', 'day', 0, 0),
(65, 83, '07:00:00', 'day', 0, 0),
(66, 85, '02:00:00', 'day', 0, 0),
(67, 86, '08:00:00', 'day', 0, 0),
(68, 87, '19:40:00', 'day', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mmo_job_item`
--

CREATE TABLE `mmo_job_item` (
  `id_job_item` int(11) NOT NULL,
  `id_temjob` int(11) NOT NULL,
  `job_item` varchar(50) NOT NULL,
  `job_qty` int(11) NOT NULL,
  `job_durasi` enum('day','week','month','') NOT NULL,
  `job_target` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `job_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_job_item`
--

INSERT INTO `mmo_job_item` (`id_job_item`, `id_temjob`, `job_item`, `job_qty`, `job_durasi`, `job_target`, `id_parent`, `job_time`) VALUES
(82, 16, 'Gold', 1000, 'day', 100, 0, '1596083115'),
(83, 16, 'Item A', 500, 'day', 50, 82, '1596083143'),
(84, 16, 'Gold', 200, '', 20, 83, '1596083163'),
(85, 16, 'Item A', 400, 'day', 6, 0, '1596092187'),
(86, 16, 'Gold', 1000, 'day', 100, 0, '1596093767'),
(87, 16, 'Gold', 1000, 'day', 100, 0, '1596369023');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_laporan`
--

CREATE TABLE `mmo_laporan` (
  `id_laporan` int(11) NOT NULL,
  `manager` text NOT NULL,
  `staff` text NOT NULL,
  `client` text NOT NULL,
  `laporan_order` text NOT NULL,
  `laporan_date` date NOT NULL,
  `cek_date` text NOT NULL,
  `laporan_kode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_laporan`
--

INSERT INTO `mmo_laporan` (`id_laporan`, `manager`, `staff`, `client`, `laporan_order`, `laporan_date`, `cek_date`, `laporan_kode`) VALUES
(16, 'admin@mmopilot.com', 'Operator', '19', '37', '2020-07-29', '29 Jul 2020', '1595959756'),
(17, 'admin@mmopilot.com', 'Operator', '21', '38', '2020-07-29', '29 Jul 2020', '1595959983'),
(18, 'Admin', 'Operator', '13', '1', '2020-08-02', '02 Aug 2020', '1596371337');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_laporan_item`
--

CREATE TABLE `mmo_laporan_item` (
  `id_laporan_item` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `id_order_item` int(11) NOT NULL,
  `laporan_item` text NOT NULL,
  `laporan_progres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_laporan_item`
--

INSERT INTO `mmo_laporan_item` (`id_laporan_item`, `id_laporan`, `id_order_item`, `laporan_item`, `laporan_progres`) VALUES
(36, 16, 111, 'Tahu', 80),
(37, 16, 112, 'Telor', 15),
(38, 17, 113, 'Daging Ayam', 100),
(39, 17, 114, 'Telor', 100),
(40, 18, 1, 'Gold', 0),
(41, 18, 2, 'Item A', 0),
(42, 18, 3, 'Item A', 0),
(43, 18, 4, 'Gold', 0),
(44, 18, 5, 'Gold', 100);

-- --------------------------------------------------------

--
-- Table structure for table `mmo_order`
--

CREATE TABLE `mmo_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `order` text NOT NULL,
  `order_price` varchar(255) NOT NULL,
  `order_status` enum('aktif','selesai','','') NOT NULL,
  `orderDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_order`
--

INSERT INTO `mmo_order` (`id_order`, `id_user`, `order`, `order_price`, `order_status`, `orderDate`) VALUES
(1, 13, '16', '80,2', 'aktif', 1596369350);

-- --------------------------------------------------------

--
-- Table structure for table `mmo_order_item`
--

CREATE TABLE `mmo_order_item` (
  `id_order_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `order_item` text NOT NULL,
  `order_qty` text NOT NULL,
  `order_target` int(11) NOT NULL,
  `order_target_progres` int(11) NOT NULL,
  `order_durasi` text NOT NULL,
  `order_progres` int(11) NOT NULL,
  `order_date` text NOT NULL,
  `order_priority` int(11) NOT NULL,
  `id_ortem` int(11) NOT NULL,
  `order_parent` int(11) NOT NULL,
  `jam` time NOT NULL,
  `hari` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_order_item`
--

INSERT INTO `mmo_order_item` (`id_order_item`, `id_order`, `order_item`, `order_qty`, `order_target`, `order_target_progres`, `order_durasi`, `order_progres`, `order_date`, `order_priority`, `id_ortem`, `order_parent`, `jam`, `hari`, `tanggal`, `sisa`) VALUES
(1, 1, 'Gold', '1000', 100, 0, 'day', 0, '02 Aug 2020', 1, 82, 0, '07:00:00', 0, 0, 0),
(2, 1, 'Item A', '500', 50, 0, 'day', 0, '02 Aug 2020', 2, 83, 82, '07:00:00', 0, 0, 0),
(3, 1, 'Item A', '400', 6, 0, 'day', 0, '02 Aug 2020', 10, 85, 0, '02:00:00', 0, 0, 0),
(4, 1, 'Gold', '1000', 100, 0, 'day', 0, '02 Aug 2020', 10, 86, 0, '08:00:00', 0, 0, 0),
(5, 1, 'Gold', '1000', 100, 0, 'day', 100, '02 Aug 2020', 10, 87, 0, '19:40:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mmo_priority`
--

CREATE TABLE `mmo_priority` (
  `id_priority` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_priority`
--

INSERT INTO `mmo_priority` (`id_priority`, `priority`, `keterangan`) VALUES
(1, 1, 'Priority 1'),
(2, 2, 'Priority 2'),
(3, 3, 'Priority 3'),
(4, 4, 'Priority 4'),
(5, 5, 'Priority 5'),
(6, 6, 'Priority 6'),
(7, 7, 'Priority 7'),
(8, 8, 'Priority 8'),
(9, 9, 'Priority 9'),
(10, 10, 'Priority 10');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_role`
--

CREATE TABLE `mmo_role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_desc` text NOT NULL,
  `job` enum('admin','operator','client','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_role`
--

INSERT INTO `mmo_role` (`id_role`, `role_name`, `role_desc`, `job`) VALUES
(1, 'admin', 'admin / manager mmopilot ', 'admin'),
(2, 'operator', 'operator / karyawan mmopilot', 'operator'),
(3, 'client', 'Pelanggan / Client mmopilot', 'client'),
(4, 'manager', 'Manager game mmopilot', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_temjob`
--

CREATE TABLE `mmo_temjob` (
  `id_temjob` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `nama_temjob` varchar(50) NOT NULL,
  `harga_temjob` varchar(50) NOT NULL,
  `kode_temjob` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_temjob`
--

INSERT INTO `mmo_temjob` (`id_temjob`, `id_game`, `nama_temjob`, `harga_temjob`, `kode_temjob`) VALUES
(15, 1, 'Farming', '40,9', '1596082205'),
(16, 1, 'Ascended Armor', '80,2', '1596082373');

-- --------------------------------------------------------

--
-- Table structure for table `mmo_user`
--

CREATE TABLE `mmo_user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmo_user`
--

INSERT INTO `mmo_user` (`id_user`, `id_role`, `name`, `email`, `password`, `createDate`) VALUES
(24, 1, 'Admin', 'admin_mmo', 'admin', 0),
(25, 4, 'Manager', 'manager_mmo', 'manager', 0),
(26, 2, 'Operator', 'operator_mm', 'operator', 0),
(27, 2, 'Operator 2', 'operator2_mmo', 'operator', 0),
(28, 2, 'Operator 3', 'operator3_mmo', 'operator', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `mmo_client`
--
ALTER TABLE `mmo_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `mmo_client_game`
--
ALTER TABLE `mmo_client_game`
  ADD PRIMARY KEY (`id_client_game`);

--
-- Indexes for table `mmo_game`
--
ALTER TABLE `mmo_game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `mmo_item`
--
ALTER TABLE `mmo_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `mmo_job_day`
--
ALTER TABLE `mmo_job_day`
  ADD PRIMARY KEY (`id_job_day`);

--
-- Indexes for table `mmo_job_item`
--
ALTER TABLE `mmo_job_item`
  ADD PRIMARY KEY (`id_job_item`),
  ADD KEY `id_jt` (`id_job_item`),
  ADD KEY `id_temjob` (`id_temjob`);

--
-- Indexes for table `mmo_laporan`
--
ALTER TABLE `mmo_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `mmo_laporan_item`
--
ALTER TABLE `mmo_laporan_item`
  ADD PRIMARY KEY (`id_laporan_item`);

--
-- Indexes for table `mmo_order`
--
ALTER TABLE `mmo_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `mmo_order_item`
--
ALTER TABLE `mmo_order_item`
  ADD PRIMARY KEY (`id_order_item`);

--
-- Indexes for table `mmo_priority`
--
ALTER TABLE `mmo_priority`
  ADD PRIMARY KEY (`id_priority`);

--
-- Indexes for table `mmo_role`
--
ALTER TABLE `mmo_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `mmo_temjob`
--
ALTER TABLE `mmo_temjob`
  ADD PRIMARY KEY (`id_temjob`),
  ADD KEY `id_temjob` (`id_temjob`);

--
-- Indexes for table `mmo_user`
--
ALTER TABLE `mmo_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT for table `mmo_client`
--
ALTER TABLE `mmo_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mmo_client_game`
--
ALTER TABLE `mmo_client_game`
  MODIFY `id_client_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mmo_game`
--
ALTER TABLE `mmo_game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mmo_item`
--
ALTER TABLE `mmo_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `mmo_job_day`
--
ALTER TABLE `mmo_job_day`
  MODIFY `id_job_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `mmo_job_item`
--
ALTER TABLE `mmo_job_item`
  MODIFY `id_job_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `mmo_laporan`
--
ALTER TABLE `mmo_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mmo_laporan_item`
--
ALTER TABLE `mmo_laporan_item`
  MODIFY `id_laporan_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `mmo_order`
--
ALTER TABLE `mmo_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mmo_order_item`
--
ALTER TABLE `mmo_order_item`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mmo_priority`
--
ALTER TABLE `mmo_priority`
  MODIFY `id_priority` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mmo_role`
--
ALTER TABLE `mmo_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mmo_temjob`
--
ALTER TABLE `mmo_temjob`
  MODIFY `id_temjob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mmo_user`
--
ALTER TABLE `mmo_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
