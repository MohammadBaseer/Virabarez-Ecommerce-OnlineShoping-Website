-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 01:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subcategory` varchar(200) NOT NULL,
  `category_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category`, `subcategory`, `category_date`) VALUES
(2, 'LADIES FASHION', 'Cosmetics', '2021-03-25 13:38:42'),
(3, 'LADIES FASHION', 'Ladies Watches', '2021-03-25 14:08:54'),
(4, 'LADIES FASHION', 'Accessories', '2021-03-25 13:39:00'),
(5, 'LADIES CLOTHING', 'Ladies Spring Cloths', '2021-03-25 13:40:41'),
(6, 'LADIES CLOTHING', 'Ladies Summer Cloths', '2021-03-25 13:40:52'),
(7, 'LADIES CLOTHING', 'Ladies Winter Cloths', '2021-03-25 13:41:03'),
(8, 'LADIES CLOTHING', 'Ladies Other Cloths', '2021-03-25 13:41:16'),
(9, 'LADIES CLOTHING', 'Ladies Shoes', '2021-03-25 13:41:25'),
(10, 'MENS CLOTHING', 'Mens Spring Cloths', '2021-03-25 13:44:50'),
(11, 'MENS CLOTHING', 'Mens Summer Cloths', '2021-03-25 13:44:58'),
(12, 'MENS CLOTHING', 'Mens Winter Cloths', '2021-03-25 13:45:07'),
(13, 'MENS CLOTHING', 'Mens Other Cloths', '2021-03-25 14:05:20'),
(14, 'MENS CLOTHING', 'Mens Shoes', '2021-03-25 14:05:44'),
(15, 'MENS FASHION', 'Mens Watches', '2021-03-25 14:08:30'),
(16, 'MENS FASHION', 'Mens Care', '2021-03-25 14:09:23'),
(17, 'TECHNOLOGY', 'Computers', '2021-03-25 14:11:23'),
(18, 'TECHNOLOGY', 'Tablets', '2021-03-25 14:11:31'),
(19, 'TECHNOLOGY', 'Mobiles', '2021-03-25 14:11:43'),
(20, 'TECHNOLOGY', 'Other Technology', '2021-03-25 14:11:55'),
(21, 'JEWELRY', 'Diamond', '2021-03-25 14:15:17'),
(22, 'JEWELRY', 'Gold', '2021-03-25 14:15:29'),
(23, 'JEWELRY', 'Silver', '2021-03-25 14:15:41'),
(24, 'JEWELRY', 'Other Jewelry', '2021-03-25 15:58:35'),
(25, 'HOME ACCESSORIES', 'Electronics', '2021-03-25 14:18:17'),
(26, 'HOME ACCESSORIES', 'Furniture', '2021-03-25 14:18:38'),
(27, 'HOME ACCESSORIES', 'Home Accessories', '2021-03-25 14:18:56'),
(28, 'ARTS', 'Engraving Arts', '2021-03-25 15:24:17'),
(29, 'ARTS', 'Visual Arts', '2021-03-25 15:26:05'),
(30, 'ARTS', 'Painting/Hand Craft', '2021-03-25 15:25:58'),
(31, 'ARTS', 'Other Arts', '2021-03-25 15:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries_table`
--

CREATE TABLE `countries_table` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  `calling_code` int(5) NOT NULL,
  `countries_isd_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries_table`
--

INSERT INTO `countries_table` (`country_id`, `country_name`, `calling_code`, `countries_isd_code`) VALUES
(1, 'Afghanistan', 0, '93'),
(2, 'Albania', 0, '355'),
(3, 'Algeria', 0, '213'),
(4, 'American Samoa', 0, '1-684'),
(5, 'Andorra', 0, '376'),
(6, 'Angola', 0, '244'),
(7, 'Anguilla', 0, '1-264'),
(8, 'Antarctica', 0, '672'),
(9, 'Antigua and Barbuda', 0, '1-268'),
(10, 'Argentina', 0, '54'),
(11, 'Armenia', 0, '374'),
(12, 'Aruba', 0, '297'),
(13, 'Australia', 0, '61'),
(14, 'Austria', 0, '43'),
(15, 'Azerbaijan', 0, '994'),
(16, 'Bahamas', 0, '1-242'),
(17, 'Bahrain', 0, '973'),
(18, 'Bangladesh', 0, '880'),
(19, 'Barbados', 0, '1-246'),
(20, 'Belarus', 0, '375'),
(21, 'Belgium', 0, '32'),
(22, 'Belize', 0, '501'),
(23, 'Benin', 0, '229'),
(24, 'Bermuda', 0, '1-441'),
(25, 'Bhutan', 0, '975'),
(26, 'Bolivia', 0, '591'),
(27, 'Bosnia and Herzegowina', 0, '387'),
(28, 'Botswana', 0, '267'),
(29, 'Bouvet Island', 0, '47'),
(30, 'Brazil', 0, '55'),
(31, 'British Indian Ocean Territory', 0, '246'),
(32, 'Brunei Darussalam', 0, '673'),
(33, 'Bulgaria', 0, '359'),
(34, 'Burkina Faso', 0, '226'),
(35, 'Burundi', 0, '257'),
(36, 'Cambodia', 0, '855'),
(37, 'Cameroon', 0, '237'),
(38, 'Canada', 0, '1'),
(39, 'Cape Verde', 0, '238'),
(40, 'Cayman Islands', 0, '1-345'),
(41, 'Central African Republic', 0, '236'),
(42, 'Chad', 0, '235'),
(43, 'Chile', 0, '56'),
(44, 'China', 0, '86'),
(45, 'Christmas Island', 0, '61'),
(46, 'Cocos (Keeling) Islands', 0, '61'),
(47, 'Colombia', 0, '57'),
(48, 'Comoros', 0, '269'),
(49, 'Congo Democratic Republic of', 0, '242'),
(50, 'Cook Islands', 0, '682'),
(51, 'Costa Rica', 0, '506'),
(52, 'Cote D\'Ivoire', 0, '225'),
(53, 'Croatia', 0, '385'),
(54, 'Cuba', 0, '53'),
(55, 'Cyprus', 0, '357'),
(56, 'Czech Republic', 0, '420'),
(57, 'Denmark', 0, '45'),
(58, 'Djibouti', 0, '253'),
(59, 'Dominica', 0, '1-767'),
(60, 'Dominican Republic', 0, '1-809'),
(61, 'Timor-Leste', 0, '670'),
(62, 'Ecuador', 0, '593'),
(63, 'Egypt', 0, '20'),
(64, 'El Salvador', 0, '503'),
(65, 'Equatorial Guinea', 0, '240'),
(66, 'Eritrea', 0, '291'),
(67, 'Estonia', 0, '372'),
(68, 'Ethiopia', 0, '251'),
(69, 'Falkland Islands (Malvinas)', 0, '500'),
(70, 'Faroe Islands', 0, '298'),
(71, 'Fiji', 0, '679'),
(72, 'Finland', 0, '358'),
(73, 'France', 0, '33'),
(75, 'French Guiana', 0, '594'),
(76, 'French Polynesia', 0, '689'),
(77, 'French Southern Territories', 0, ''),
(78, 'Gabon', 0, '241'),
(79, 'Gambia', 0, '220'),
(80, 'Georgia', 0, '995'),
(81, 'Germany', 0, '49'),
(82, 'Ghana', 0, '233'),
(83, 'Gibraltar', 0, '350'),
(84, 'Greece', 0, '30'),
(85, 'Greenland', 0, '299'),
(86, 'Grenada', 0, '1-473'),
(87, 'Guadeloupe', 0, '590'),
(88, 'Guam', 0, '1-671'),
(89, 'Guatemala', 0, '502'),
(90, 'Guinea', 0, '224'),
(91, 'Guinea-bissau', 0, '245'),
(92, 'Guyana', 0, '592'),
(93, 'Haiti', 0, '509'),
(94, 'Heard Island and McDonald Islands', 0, '011'),
(95, 'Honduras', 0, '504'),
(96, 'Hong Kong', 0, '852'),
(97, 'Hungary', 0, '36'),
(98, 'Iceland', 0, '354'),
(99, 'India', 0, '91'),
(100, 'Indonesia', 0, '62'),
(101, 'Iran (Islamic Republic of)', 0, '98'),
(102, 'Iraq', 0, '964'),
(103, 'Ireland', 0, '353'),
(104, 'Israel', 0, '972'),
(105, 'Italy', 0, '39'),
(106, 'Jamaica', 0, '1-876'),
(107, 'Japan', 0, '81'),
(108, 'Jordan', 0, '962'),
(109, 'Kazakhstan', 0, '7'),
(110, 'Kenya', 0, '254'),
(111, 'Kiribati', 0, '686'),
(112, 'Korea, Democratic People\'s Republic of', 0, '850'),
(113, 'South Korea', 0, '82'),
(114, 'Kuwait', 0, '965'),
(115, 'Kyrgyzstan', 0, '996'),
(116, 'Lao People\'s Democratic Republic', 0, '856'),
(117, 'Latvia', 0, '371'),
(118, 'Lebanon', 0, '961'),
(119, 'Lesotho', 0, '266'),
(120, 'Liberia', 0, '231'),
(121, 'Libya', 0, '218'),
(122, 'Liechtenstein', 0, '423'),
(123, 'Lithuania', 0, '370'),
(124, 'Luxembourg', 0, '352'),
(125, 'Macao', 0, '853'),
(126, 'Macedonia, The Former Yugoslav Republic of', 0, '389'),
(127, 'Madagascar', 0, '261'),
(128, 'Malawi', 0, '265'),
(129, 'Malaysia', 0, '60'),
(130, 'Maldives', 0, '960'),
(131, 'Mali', 0, '223'),
(132, 'Malta', 0, '356'),
(133, 'Marshall Islands', 0, '692'),
(134, 'Martinique', 0, '596'),
(135, 'Mauritania', 0, '222'),
(136, 'Mauritius', 0, '230'),
(137, 'Mayotte', 0, '262'),
(138, 'Mexico', 0, '52'),
(139, 'Micronesia, Federated States of', 0, '691'),
(140, 'Moldova', 0, '373'),
(141, 'Monaco', 0, '377'),
(142, 'Mongolia', 0, '976'),
(143, 'Montserrat', 0, '1-664'),
(144, 'Morocco', 0, '212'),
(145, 'Mozambique', 0, '258'),
(146, 'Myanmar', 0, '95'),
(147, 'Namibia', 0, '264'),
(148, 'Nauru', 0, '674'),
(149, 'Nepal', 0, '977'),
(150, 'Netherlands', 0, '31'),
(151, 'Netherlands Antilles', 0, '599'),
(152, 'New Caledonia', 0, '687    '),
(153, 'New Zealand', 0, '64'),
(154, 'Nicaragua', 0, '505'),
(155, 'Niger', 0, '227'),
(156, 'Nigeria', 0, '234'),
(157, 'Niue', 0, '683'),
(158, 'Norfolk Island', 0, '672'),
(159, 'Northern Mariana Islands', 0, '1-670'),
(160, 'Norway', 0, '47'),
(161, 'Oman', 0, '968'),
(162, 'Pakistan', 0, '92'),
(163, 'Palau', 0, '680'),
(164, 'Panama', 0, '507'),
(165, 'Papua New Guinea', 0, '675'),
(166, 'Paraguay', 0, '595'),
(167, 'Peru', 0, '51'),
(168, 'Philippines', 0, '63'),
(169, 'Pitcairn', 0, '64'),
(170, 'Poland', 0, '48'),
(171, 'Portugal', 0, '351'),
(172, 'Puerto Rico', 0, '1-787'),
(173, 'Qatar', 0, '974'),
(174, 'Reunion', 0, '262'),
(175, 'Romania', 0, '40'),
(176, 'Russian Federation', 0, '7'),
(177, 'Rwanda', 0, '250'),
(178, 'Saint Kitts and Nevis', 0, '1-869'),
(179, 'Saint Lucia', 0, '1-758'),
(180, 'Saint Vincent and the Grenadines', 0, '1-784'),
(181, 'Samoa', 0, '685'),
(182, 'San Marino', 0, '378'),
(183, 'Sao Tome and Principe', 0, '239'),
(184, 'Saudi Arabia', 0, '966'),
(185, 'Senegal', 0, '221'),
(186, 'Seychelles', 0, '248'),
(187, 'Sierra Leone', 0, '232'),
(188, 'Singapore', 0, '65'),
(189, 'Slovakia (Slovak Republic)', 0, '421'),
(190, 'Slovenia', 0, '386'),
(191, 'Solomon Islands', 0, '677'),
(192, 'Somalia', 0, '252'),
(193, 'South Africa', 0, '27'),
(194, 'South Georgia and the South Sandwich Islands', 0, '500'),
(195, 'Spain', 0, '34'),
(196, 'Sri Lanka', 0, '94'),
(197, 'Saint Helena, Ascension and Tristan da Cunha', 0, '290'),
(198, 'St. Pierre and Miquelon', 0, '508'),
(199, 'Sudan', 0, '249'),
(200, 'Suriname', 0, '597'),
(201, 'Svalbard and Jan Mayen Islands', 0, '47'),
(202, 'Swaziland', 0, '268'),
(203, 'Sweden', 0, '46'),
(204, 'Switzerland', 0, '41'),
(205, 'Syrian Arab Republic', 0, '963'),
(206, 'Taiwan', 0, '886'),
(207, 'Tajikistan', 0, '992'),
(208, 'Tanzania, United Republic of', 0, '255'),
(209, 'Thailand', 0, '66'),
(210, 'Togo', 0, '228'),
(211, 'Tokelau', 0, '690'),
(212, 'Tonga', 0, '676'),
(213, 'Trinidad and Tobago', 0, '1-868'),
(214, 'Tunisia', 0, '216'),
(215, 'Turkey', 0, '90'),
(216, 'Turkmenistan', 0, '993'),
(217, 'Turks and Caicos Islands', 0, '1-649'),
(218, 'Tuvalu', 0, '688'),
(219, 'Uganda', 0, '256'),
(220, 'Ukraine', 0, '380'),
(221, 'United Arab Emirates', 0, '971'),
(222, 'United Kingdom', 0, '44'),
(223, 'United States', 0, '1'),
(224, 'United States Minor Outlying Islands', 0, '246'),
(225, 'Uruguay', 0, '598'),
(226, 'Uzbekistan', 0, '998'),
(227, 'Vanuatu', 0, '678'),
(228, 'Vatican City State (Holy See)', 0, '379'),
(229, 'Venezuela', 0, '58'),
(230, 'Vietnam', 0, '84'),
(231, 'Virgin Islands (British)', 0, '1-284'),
(232, 'Virgin Islands (U.S.)', 0, '1-340'),
(233, 'Wallis and Futuna Islands', 0, '681'),
(234, 'Western Sahara', 0, '212'),
(235, 'Yemen', 0, '967'),
(236, 'Serbia', 0, '381'),
(238, 'Zambia', 0, '260'),
(239, 'Zimbabwe', 0, '263'),
(240, 'Aaland Islands', 0, '358'),
(241, 'Palestine', 0, '970'),
(242, 'Montenegro', 0, '382'),
(243, 'Guernsey', 0, '44-1481'),
(244, 'Isle of Man', 0, '44-1624'),
(245, 'Jersey', 0, '44-1534'),
(247, 'Curaçao', 0, '599'),
(248, 'Ivory Coast', 0, '225'),
(249, 'Kosovo', 0, '383');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(199) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(200) NOT NULL,
  `custormer_whatsapp` varchar(200) NOT NULL,
  `customer_country` varchar(200) NOT NULL,
  `customer_city` varchar(200) NOT NULL,
  `customer_address` varchar(400) NOT NULL,
  `sh_add` varchar(200) NOT NULL,
  `sh_city` varchar(200) NOT NULL,
  `sh_country` varchar(200) NOT NULL,
  `sh_phone` varchar(199) NOT NULL,
  `customer_joining_date` varchar(199) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_pass` varchar(400) NOT NULL,
  `status` varchar(200) NOT NULL,
  `trn_date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `msg_table`
--

CREATE TABLE `msg_table` (
  `msg_id` int(200) NOT NULL,
  `msg_name` varchar(200) NOT NULL,
  `msg_phone` varchar(199) NOT NULL,
  `msg_whatsapp` varchar(200) NOT NULL,
  `msg_email` varchar(200) NOT NULL,
  `msg_body` varchar(2000) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(199) NOT NULL,
  `customer_order_id` int(199) NOT NULL,
  `product_order_id` int(199) NOT NULL,
  `order_shipp_add` varchar(200) NOT NULL,
  `order_shipp_country` varchar(200) NOT NULL,
  `order_shipp_city` varchar(200) NOT NULL,
  `order_shipp_phone` varchar(200) NOT NULL,
  `order_shipp_qty` int(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `reviewer_id` int(199) NOT NULL,
  `product_review_id` varchar(200) NOT NULL,
  `reviewer_name` varchar(200) NOT NULL,
  `reviewer_rate` varchar(200) NOT NULL,
  `reviewer_comment` text NOT NULL,
  `reviewer_date` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `product_id` int(199) NOT NULL,
  `product_seller_id` int(200) NOT NULL,
  `product_name` text CHARACTER SET utf8 NOT NULL,
  `product_code` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `product_price` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `product_discount` varchar(199) COLLATE utf8_persian_ci NOT NULL,
  `product_free_delivery` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `stock_status` varchar(199) COLLATE utf8_persian_ci NOT NULL,
  `seller_product_cat` varchar(199) COLLATE utf8_persian_ci NOT NULL,
  `product_image_1` text COLLATE utf8_persian_ci NOT NULL,
  `product_image_2` text COLLATE utf8_persian_ci NOT NULL,
  `product_image_3` text COLLATE utf8_persian_ci NOT NULL,
  `product_image_4` text COLLATE utf8_persian_ci NOT NULL,
  `product_desc` text COLLATE utf8_persian_ci NOT NULL,
  `product_info` text COLLATE utf8_persian_ci NOT NULL,
  `product_status` text COLLATE utf8_persian_ci NOT NULL,
  `product_entry_date` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `product_modify_date` varchar(199) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_wish`
--

CREATE TABLE `product_wish` (
  `wish_id` int(199) NOT NULL,
  `product_wish_id` int(199) NOT NULL,
  `customer_wish_id` int(199) NOT NULL,
  `wish_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_profile_table`
--

CREATE TABLE `seller_profile_table` (
  `seller_profile_id` int(199) NOT NULL,
  `seller_req_id` int(200) NOT NULL,
  `seller_user` varchar(200) NOT NULL,
  `seller_password` varchar(200) NOT NULL,
  `seller_country` varchar(200) NOT NULL,
  `seller_city` varchar(200) NOT NULL,
  `seller_profile` varchar(200) NOT NULL,
  `seller_license` varchar(200) NOT NULL,
  `seller_logo` varchar(200) NOT NULL,
  `seller_details` text NOT NULL,
  `seller_right` varchar(100) NOT NULL,
  `seller_status` varchar(200) NOT NULL,
  `account_status` varchar(100) NOT NULL,
  `seller_join_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_profile_table`
--

INSERT INTO `seller_profile_table` (`seller_profile_id`, `seller_req_id`, `seller_user`, `seller_password`, `seller_country`, `seller_city`, `seller_profile`, `seller_license`, `seller_logo`, `seller_details`, `seller_right`, `seller_status`, `account_status`, `seller_join_date`) VALUES
(1, 1, 'admin', 'a29c57c6894dee6e8251510d58c07078ee3f49bf', 'Afghanistan', 'Kabul', '', '', '1615829471___1615829471__lloogoo.png', '<p>ViraBarez is the best way to shop online from the major websites of Afghanistan. ViraBarez provides online product ordering and door-to-door delivery for those with or without credit cards or bank accounts.<br />\r\nViraBarez brings online shopping to markets not served by the largest eCommerce stores. ViraBarez brings the widest choice, from the world&rsquo;s famous stores with the product shown in the local language, in local currency and delivered directly to their home, at the lowest costs.</p>\r\n', 'Admin', 'Unlock', 'Enabled', ''),
(13, 15, 'seller1', 'c870a9373ded52f7e72f08d67d15073e841a78cb', 'Afghanistan', 'Kabul', '', '', '1687086876___1687086876__pngtree-shopping-bags-in-circle-for-online-store-png-image_2177917.jpg', '<p>We are the best seller in the worl</p>\r\n', 'Seller', 'unlock', 'Enabled', '2023-Jun-18'),
(14, 16, 'seller2', 'c870a9373ded52f7e72f08d67d15073e841a78cb', 'Qatar', 'Qatar', '', '', '1687087172_stock-trolley-bag-online-shop-logo-designs-template-illustration-.jpg', '<p>Buy one time get an offer every time</p>\r\n', 'Seller', 'unlock', 'Enabled', '2023-Jun-18');

-- --------------------------------------------------------

--
-- Table structure for table `seller_request_table`
--

CREATE TABLE `seller_request_table` (
  `seller_id` int(199) NOT NULL,
  `seller_company_title` varchar(200) NOT NULL,
  `seller_fname` varchar(200) NOT NULL,
  `seller_lname` varchar(200) NOT NULL,
  `seller_email` varchar(200) NOT NULL,
  `seller_phone` varchar(200) NOT NULL,
  `seller_whatsapp` varchar(200) NOT NULL,
  `seller_address` varchar(200) NOT NULL,
  `seller_description` text NOT NULL,
  `seller_acc_status` varchar(199) NOT NULL,
  `request_date` varchar(199) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_request_table`
--

INSERT INTO `seller_request_table` (`seller_id`, `seller_company_title`, `seller_fname`, `seller_lname`, `seller_email`, `seller_phone`, `seller_whatsapp`, `seller_address`, `seller_description`, `seller_acc_status`, `request_date`) VALUES
(1, 'ViraBarez', 'Mohammad', 'Baseer', 'mohammadbaseer25@gmail.com', '(+93)-783716394', '(+93)-783716394', 'Taimani District 4', 'des', 'acc', '2021-Mar-11'),
(15, 'Zarii Pakhton Online Shopping', 'Seller', 'Two', 'seller2i@gmail.com', '', '', '', 'ffgfg', 'acc', '2023-Jun-18'),
(16, 'Online Shoping', 'Seller', 'one', 'seller@gmail.com', '', '', 'Qatar 123', 'df', 'acc', '2023-Jun-18');

-- --------------------------------------------------------

--
-- Table structure for table `user_right`
--

CREATE TABLE `user_right` (
  `user_r_id` int(200) NOT NULL,
  `user_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_right`
--

INSERT INTO `user_right` (`user_r_id`, `user_type`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `countries_table`
--
ALTER TABLE `countries_table`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `msg_table`
--
ALTER TABLE `msg_table`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_wish`
--
ALTER TABLE `product_wish`
  ADD PRIMARY KEY (`wish_id`);

--
-- Indexes for table `seller_profile_table`
--
ALTER TABLE `seller_profile_table`
  ADD PRIMARY KEY (`seller_profile_id`);

--
-- Indexes for table `seller_request_table`
--
ALTER TABLE `seller_request_table`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `user_right`
--
ALTER TABLE `user_right`
  ADD PRIMARY KEY (`user_r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `countries_table`
--
ALTER TABLE `countries_table`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `msg_table`
--
ALTER TABLE `msg_table`
  MODIFY `msg_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(199) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `reviewer_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `product_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_wish`
--
ALTER TABLE `product_wish`
  MODIFY `wish_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `seller_profile_table`
--
ALTER TABLE `seller_profile_table`
  MODIFY `seller_profile_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seller_request_table`
--
ALTER TABLE `seller_request_table`
  MODIFY `seller_id` int(199) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_right`
--
ALTER TABLE `user_right`
  MODIFY `user_r_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
