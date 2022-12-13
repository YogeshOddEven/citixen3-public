-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2021 at 04:28 PM
-- Server version: 5.7.35-log
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuglogix_packnsend`
--

-- --------------------------------------------------------

--
-- Table structure for table `pns_about_page_details`
--

CREATE TABLE `pns_about_page_details` (
  `id_page` int(11) NOT NULL,
  `overview_details` longtext NOT NULL,
  `our_vision_details` longtext NOT NULL,
  `date_updated` datetime NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_about_page_details`
--

INSERT INTO `pns_about_page_details` (`id_page`, `overview_details`, `our_vision_details`, `date_updated`, `contact_no`, `email`, `website`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.a', '0000-00-00 00:00:00', '9876543210', 'test@test.com', 'https://www.zuuride.com');

-- --------------------------------------------------------

--
-- Table structure for table `pns_bank_details`
--

CREATE TABLE `pns_bank_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_bank_details`
--

INSERT INTO `pns_bank_details` (`id`, `name`, `type`, `status`) VALUES
(1, 'Andhra Pradesh Grameena Vikas Bank', 'Reginal Rural Bank', 1),
(2, 'Andhra Pragathi Grameena Bank', 'Reginal Rural Bank', 1),
(3, 'Arunachal Pradesh Rural Bank', 'Reginal Rural Bank', 1),
(4, 'Aryavart Bank', 'Reginal Rural Bank', 1),
(5, 'Assam Gramin Vikash Bank', 'Reginal Rural Bank', 1),
(6, 'Axis Bank', 'Private', 1),
(7, 'Bandhan Bank', 'Private', 1),
(8, 'Bangiya Gramin Vikash Bank', 'Reginal Rural Bank', 1),
(9, 'Bank of Baroda', 'Public', 1),
(10, 'Bank of India', 'Public', 1),
(11, 'Bank of Maharashtra', 'Public', 1),
(12, 'Baroda Gujarat Gramin Bank', 'Reginal Rural Bank', 1),
(13, 'Baroda Rajasthan Kshetriya Gramin Bank', 'Reginal Rural Bank', 1),
(14, 'Baroda UP Bank', 'Reginal Rural Bank', 1),
(15, 'Canara Bank', 'Public', 1),
(16, 'Central Bank of India', 'Public', 1),
(17, 'Chaitanya Godavari Gramin Bank', 'Reginal Rural Bank', 1),
(18, 'Chhattisgarh Rajya Gramin Bank', 'Reginal Rural Bank', 1),
(19, 'City Union Bank', 'Private', 1),
(20, 'CSB Bank', 'Private', 1),
(21, 'Dakshin Bihar Gramin Bank', 'Reginal Rural Bank', 1),
(22, 'DCB Bank', 'Private', 1),
(23, 'Dhanlaxmi Bank', 'Private', 1),
(24, 'Ellaquai Dehati Bank', 'Reginal Rural Bank', 1),
(25, 'Federal Bank', 'Private', 1),
(26, 'HDFC Bank', 'Private', 1),
(27, 'Himachal Pradesh Gramin Bank', 'Reginal Rural Bank', 1),
(28, 'ICICI Bank', 'Private', 1),
(29, 'IDBI Bank', 'Private', 1),
(30, 'IDFC First Bank', 'Private', 1),
(31, 'Indian Bank', 'Public', 1),
(32, 'Indian Overseas Bank', 'Public', 1),
(33, 'IndusInd Bank', 'Private', 1),
(34, 'Jammu & Kashmir Bank', 'Private', 1),
(35, 'Jammu And Kashmir Grameen Bank', 'Reginal Rural Bank', 1),
(36, 'Jharkhand Rajya Gramin Bank', 'Reginal Rural Bank', 1),
(37, 'Karnataka Bank', 'Private', 1),
(38, 'Karnataka Gramin Bank', 'Reginal Rural Bank', 1),
(39, 'Karnataka Vikas Grameena Bank', 'Reginal Rural Bank', 1),
(40, 'Karur Vysya Bank', 'Private', 1),
(41, 'Kerala Gramin Bank', 'Reginal Rural Bank', 1),
(42, 'Kotak Mahindra Bank', 'Private', 1),
(43, 'Madhya Pradesh Gramin Bank', 'Reginal Rural Bank', 1),
(44, 'Madhyanchal Gramin Bank', 'Reginal Rural Bank', 1),
(45, 'Maharashtra Gramin Bank', 'Reginal Rural Bank', 1),
(46, 'Manipur Rural Bank', 'Reginal Rural Bank', 1),
(47, 'Meghalaya Rural Bank', 'Reginal Rural Bank', 1),
(48, 'Mizoram Rural Bank', 'Reginal Rural Bank', 1),
(49, 'Nagaland Rural Bank', 'Reginal Rural Bank', 1),
(51, 'Odisha Gramya Bank', 'Reginal Rural Bank', 1),
(52, 'Paschim Banga Gramin Bank', 'Reginal Rural Bank', 1),
(53, 'Prathama UP Gramin Bank', 'Reginal Rural Bank', 1),
(54, 'Puduvai Bharathiar Grama Bank', 'Reginal Rural Bank', 1),
(55, 'Punjab and Sind Bank', 'Public', 1),
(56, 'Punjab Gramin Bank', 'Reginal Rural Bank', 1),
(57, 'Punjab National Bank', 'Public', 1),
(58, 'Rajasthan Marudhara Gramin Bank', 'Reginal Rural Bank', 1),
(59, 'RBL Bank', 'Private', 1),
(60, 'Saptagiri Gramin Bank', 'Reginal Rural Bank', 1),
(61, 'Sarva Haryana Gramin Bank', 'Reginal Rural Bank', 1),
(62, 'Saurashtra Gramin Bank', 'Reginal Rural Bank', 1),
(63, 'South Indian Bank', 'Private', 1),
(64, 'State Bank of India', 'Public', 1),
(65, 'Tamil Nadu Grama Bank', 'Reginal Rural Bank', 1),
(66, 'Tamilnad Mercantile Bank', 'Private', 1),
(67, 'Telangana Grameena Bank', 'Reginal Rural Bank', 1),
(68, 'Tripura Gramin Bank', 'Reginal Rural Bank', 1),
(69, 'UCO Bank', 'Public', 1),
(70, 'Union Bank of India', 'Public', 1),
(71, 'Utkal Grameen Bank', 'Reginal Rural Bank', 1),
(72, 'Uttar Bihar Gramin Bank', 'Reginal Rural Bank', 1),
(73, 'Uttarakhand Gramin Bank', 'Reginal Rural Bank', 1),
(74, 'Uttarbanga Kshetriya Gramin Bank', 'Reginal Rural Bank', 1),
(75, 'Vidarbha Konkan Gramin Bank', 'Reginal Rural Bank', 1),
(76, 'Yes Bank', 'Private', 1),
(78, 'Corporation Bank', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_cancel_ride_reason`
--

CREATE TABLE `pns_cancel_ride_reason` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0=User 1=Driver',
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_cancel_ride_reason`
--

INSERT INTO `pns_cancel_ride_reason` (`id`, `name`, `status`, `type`, `date_added`) VALUES
(1, 'Booked Another Cab', 1, 0, '2021-01-20 14:42:18'),
(2, 'Plan Changed', 1, 0, '2021-01-20 14:42:18'),
(3, 'Vehicle Break Down', 1, 1, '2021-01-20 14:42:18'),
(4, 'Emergency Work ', 1, 1, '2021-01-20 14:42:18'),
(5, 'Driver requested for cash', 1, 0, '2021-02-19 00:00:00'),
(6, 'Bad Driver ratings', 1, 0, '2021-03-07 00:00:00'),
(7, 'Bad User Rating', 1, 1, '2021-03-07 00:00:00'),
(8, 'User forced to Cancel', 1, 1, '2021-03-07 00:00:00'),
(9, 'Driver forced to Cancel', 1, 0, '2021-03-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pns_car_brand`
--

CREATE TABLE `pns_car_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_car_brand`
--

INSERT INTO `pns_car_brand` (`id`, `brand_name`, `date_added`, `status`) VALUES
(1, 'Hyundai', '2020-09-24 13:42:59', 0),
(2, 'Datson', '2020-09-24 13:42:59', 0),
(3, 'Toyota', '2020-09-24 13:43:43', 0),
(4, 'Tata', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_car_details`
--

CREATE TABLE `pns_car_details` (
  `id` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `car_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_car_details`
--

INSERT INTO `pns_car_details` (`id`, `modal`, `brand`, `car_number`, `description`, `status`, `date_added`, `car_owner`) VALUES
(1, 1, 1, 'GJ04AA1234', 'Grgy', 1, '2020-09-24 14:19:34', 12),
(2, 1, 1, 'GJ04AA1234', 'Test', 0, '0000-00-00 00:00:00', 21),
(3, 1, 1, 'GJ10BH3965', 'sasdasd', 0, '0000-00-00 00:00:00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pns_car_modal`
--

CREATE TABLE `pns_car_modal` (
  `id` int(11) NOT NULL,
  `modal_name` varchar(255) NOT NULL,
  `brand` int(11) NOT NULL,
  `seat_available` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_car_modal`
--

INSERT INTO `pns_car_modal` (`id`, `modal_name`, `brand`, `seat_available`, `date_added`, `status`) VALUES
(1, 'I20', 1, 4, '2020-09-24 13:34:04', 0),
(2, 'Creta', 1, 4, '2020-09-24 13:34:04', 0),
(3, 'Go', 2, 4, '2020-09-24 13:35:28', 0),
(4, 'Innova V2.0', 3, 7, '2020-09-24 13:36:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_car_type`
--

CREATE TABLE `pns_car_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_car_type`
--

INSERT INTO `pns_car_type` (`id`, `name`, `price`, `image`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Hatchback', 250, '', 1, '2020-12-22 12:34:52', '0000-00-00 00:00:00'),
(2, 'Sedan', 150, '', 1, '2020-12-22 12:34:52', '0000-00-00 00:00:00'),
(3, 'SUV', 350, '', 1, '2020-12-22 12:35:50', '0000-00-00 00:00:00'),
(4, 'TUV', 450, '', 1, '2020-12-22 12:35:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pns_close_account_reason`
--

CREATE TABLE `pns_close_account_reason` (
  `id` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_close_account_reason`
--

INSERT INTO `pns_close_account_reason` (`id`, `reason`, `status`, `date_added`) VALUES
(1, 'I\'ve moved and don\'t share rides anymore', 1, '0000-00-00 00:00:00'),
(2, 'I didn\'t find what I was looking for and see no reason for keeping my account', 1, '0000-00-00 00:00:00'),
(3, 'I receive too many calls or emails', 1, '0000-00-00 00:00:00'),
(4, 'I wanted to try car sharing but it’s not for me', 1, '0000-00-00 00:00:00'),
(5, 'I have found a regular car share so I don\'t need the site any more', 1, '0000-00-00 00:00:00'),
(6, 'I had the impression that I had to pay to use the site', 1, '0000-00-00 00:00:00'),
(7, 'No problem, the site is brilliant', 1, '0000-00-00 00:00:00'),
(8, 'I have another account and I want to close this one', 1, '0000-00-00 00:00:00'),
(9, 'No one contacted me about the ride I offered', 1, '0000-00-00 00:00:00'),
(10, 'I\'ve encountered a technical issue blocking me', 1, '0000-00-00 00:00:00'),
(11, 'Other reason', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pns_coupon_apply_details`
--

CREATE TABLE `pns_coupon_apply_details` (
  `id` int(11) NOT NULL,
  `id_coupon` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `transaction_amount` float DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `id_transaction` int(11) DEFAULT NULL,
  `id_ride` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_coupon_apply_details`
--

INSERT INTO `pns_coupon_apply_details` (`id`, `id_coupon`, `coupon_code`, `user_id`, `transaction_amount`, `discount_amount`, `id_transaction`, `id_ride`, `date_added`, `status`) VALUES
(1, '1', 'CHRIST20', 0, 2707, 541.4, 18, 15, '2021-02-02 00:00:00', 1),
(2, '1', 'CHRIST20', 0, 4511, 902.2, 20, 16, '2021-02-02 00:00:00', 1),
(3, '1', 'CHRIST20', 0, 17, 3.4, 22, 17, '2021-02-02 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_coupon_details`
--

CREATE TABLE `pns_coupon_details` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_type` int(11) NOT NULL DEFAULT '0' COMMENT '0=generic 1 = user oriented',
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `reward_type` int(11) NOT NULL DEFAULT '0' COMMENT '0=Instant Discount 1= cashback',
  `reward_rate` float NOT NULL DEFAULT '0',
  `reward_amount` float NOT NULL DEFAULT '0',
  `min_transaction_amount` float NOT NULL DEFAULT '0',
  `coupon_use` int(11) NOT NULL DEFAULT '1' COMMENT '0=single time 1 or more= defined no times',
  `avail_from` datetime DEFAULT NULL,
  `avail_to` datetime DEFAULT NULL,
  `districts` varchar(255) DEFAULT NULL,
  `states` varchar(255) DEFAULT NULL,
  `total_coupon_use` int(11) DEFAULT NULL,
  `max_discount_amount` float DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_coupon_details`
--

INSERT INTO `pns_coupon_details` (`id`, `title`, `description`, `coupon_code`, `coupon_type`, `user_id`, `reward_type`, `reward_rate`, `reward_amount`, `min_transaction_amount`, `coupon_use`, `avail_from`, `avail_to`, `districts`, `states`, `total_coupon_use`, `max_discount_amount`, `added_by`, `date_added`, `status`) VALUES
(1, 'Christmas Bonus', 'Get 20% Discount On Minimum Booking of Rs.150 & above', 'CHRIST20', 0, '0', 0, 20, 0, 150, 100, '2020-12-22 00:00:00', '2022-12-26 00:00:00', '', '', 0, 0, 1, '2020-12-22 12:46:25', 1),
(2, 'New year Bonus', 'Get Rs.20 Discount On Minimum Booking of Rs.150 & above', 'NEWYEAR20', 0, '0', 1, 0, 20, 100, 100, '2020-12-26 00:00:00', '2021-03-24 00:00:00', '', '', 0, 0, 1, '2022-12-22 12:46:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_customers`
--

CREATE TABLE `pns_customers` (
  `cid` int(11) NOT NULL,
  `srno` varchar(100) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `secondary_mobile` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'Male',
  `photo` varchar(255) DEFAULT NULL,
  `social_profile_photo` varchar(255) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lng` varchar(100) DEFAULT NULL,
  `address` longtext,
  `landmark` varchar(100) DEFAULT NULL,
  `pincode` varchar(25) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `reference_code` varchar(255) DEFAULT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `reg_token_ids` varchar(255) DEFAULT NULL,
  `fb_app_id` varchar(255) DEFAULT NULL,
  `kyc_proof` varchar(255) DEFAULT NULL,
  `address_kyc_proof` varchar(255) DEFAULT NULL,
  `is_adddress_kyc_approved` int(11) NOT NULL DEFAULT '0',
  `address_proof` varchar(255) DEFAULT NULL,
  `is_kyc_approved` int(11) NOT NULL DEFAULT '0',
  `is_address_approved` int(11) NOT NULL DEFAULT '0',
  `is_email_approved` int(11) NOT NULL DEFAULT '0',
  `is_mobile_approved` int(11) NOT NULL DEFAULT '0',
  `is_photo_approved` int(11) NOT NULL DEFAULT '0',
  `account_close_reason` varchar(255) DEFAULT NULL,
  `account_close_remarks` text,
  `otp` varchar(255) DEFAULT NULL,
  `otp_valid_till` datetime DEFAULT NULL,
  `email_otp` varchar(25) DEFAULT NULL,
  `email_otp_valid_till` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_customers`
--

INSERT INTO `pns_customers` (`cid`, `srno`, `fname`, `lname`, `uname`, `pass`, `password`, `secondary_mobile`, `mobile`, `emailid`, `gender`, `photo`, `social_profile_photo`, `lat`, `lng`, `address`, `landmark`, `pincode`, `state`, `city`, `reference_code`, `referral`, `status`, `date_added`, `reg_token_ids`, `fb_app_id`, `kyc_proof`, `address_kyc_proof`, `is_adddress_kyc_approved`, `address_proof`, `is_kyc_approved`, `is_address_approved`, `is_email_approved`, `is_mobile_approved`, `is_photo_approved`, `account_close_reason`, `account_close_remarks`, `otp`, `otp_valid_till`, `email_otp`, `email_otp_valid_till`, `reset_token`) VALUES
(1, NULL, 'Yogesh', '', NULL, '202cb962ac59075b964b07152d234b70', '123', NULL, '9601089399', 'yogeshnakhva2@gmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Gujarat', 'RAJKOT', '', 'YO20', '1', '2021-03-20', 'e60a9fb9-6a06-42bc-befd-c7ab4932e3ed', NULL, '', NULL, 0, NULL, 0, 0, 0, 0, 0, NULL, NULL, '9264', '2021-03-20 21:20:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pns_distirct_details`
--

CREATE TABLE `pns_distirct_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_distirct_details`
--

INSERT INTO `pns_distirct_details` (`id`, `name`, `state_id`, `state_name`, `status`) VALUES
(1, 'ANANTHAPUR', 1, 'Andhra Pradesh', 1),
(2, 'Chittoor', 1, 'Andhra Pradesh', 1),
(3, 'Madanapalle', 1, 'Andhra Pradesh', 1),
(4, 'KADAPA', 1, 'Andhra Pradesh', 1),
(5, 'Hindupur', 1, 'Andhra Pradesh', 1),
(6, 'Kurnool', 1, 'Andhra Pradesh', 1),
(7, 'PRAKASAM', 1, 'Andhra Pradesh', 1),
(8, 'West Godavari', 1, 'Andhra Pradesh', 1),
(9, 'KRISHNA', 1, 'Andhra Pradesh', 1),
(10, 'NELLORE', 1, 'Andhra Pradesh', 1),
(11, 'Guntur', 1, 'Andhra Pradesh', 1),
(12, 'Machilipatnam', 1, 'Andhra Pradesh', 1),
(13, 'Warangal', 1, 'Andhra Pradesh', 1),
(14, 'Kovvur', 1, 'Andhra Pradesh', 1),
(15, 'Bapatla', 1, 'Andhra Pradesh', 1),
(16, 'East Godavari', 1, 'Andhra Pradesh', 1),
(17, 'VISAKHAPATNAM', 1, 'Andhra Pradesh', 1),
(18, 'VIZIANAGARAM', 1, 'Andhra Pradesh', 1),
(19, 'SRIKAKULAM', 1, 'Andhra Pradesh', 1),
(20, 'KARIMGANJ', 2, 'Assam', 1),
(21, 'HAILAKANDI', 2, 'Assam', 1),
(22, 'CACHAR', 2, 'Assam', 1),
(23, 'DIMA HASSO - NORTH CACHAR HILL', 2, 'Assam', 1),
(24, 'UDALGURI', 2, 'Assam', 1),
(25, 'SONITPUR', 2, 'Assam', 1),
(26, 'DARRANG', 2, 'Assam', 1),
(27, 'BONGAIGAON', 2, 'Assam', 1),
(28, 'KOKRAJHAR', 2, 'Assam', 1),
(29, 'GOALPARA', 2, 'Assam', 1),
(30, 'DHUBRI', 2, 'Assam', 1),
(31, 'KAMRUP', 2, 'Assam', 1),
(32, 'KAMRUP METROPOLITAN', 2, 'Assam', 1),
(33, 'BAKSA', 2, 'Assam', 1),
(34, 'NALBARI', 2, 'Assam', 1),
(35, 'BARPETA', 2, 'Assam', 1),
(36, 'LAKHIMPUR', 2, 'Assam', 1),
(37, 'DIBRUGARH', 2, 'Assam', 1),
(38, 'DHEMAJI', 2, 'Assam', 1),
(39, 'MARIGAON', 2, 'Assam', 1),
(40, 'NAGAON', 2, 'Assam', 1),
(41, 'KARBI ANGLONG', 2, 'Assam', 1),
(42, 'GOLAGHAT', 2, 'Assam', 1),
(43, 'SIBSAGAR', 2, 'Assam', 1),
(44, 'JORHAT', 2, 'Assam', 1),
(45, 'TINSUKIA', 2, 'Assam', 1),
(46, 'GAYA', 3, 'Bihar', 1),
(47, 'AURANGABAD', 3, 'Bihar', 1),
(48, 'BHOJPUR', 3, 'Bihar', 1),
(49, 'BUXAR', 3, 'Bihar', 1),
(50, 'ARWAL', 3, 'Bihar', 1),
(51, 'JEHANABAD', 3, 'Bihar', 1),
(52, 'PATNA', 3, 'Bihar', 1),
(53, 'JAMUI', 3, 'Bihar', 1),
(54, 'PURNIA', 3, 'Bihar', 1),
(55, 'ROHTAS', 3, 'Bihar', 1),
(56, 'KAIMUR BHABUA', 3, 'Bihar', 1),
(57, 'VAISHALI', 3, 'Bihar', 1),
(58, 'BEGUSARAI', 3, 'Bihar', 1),
(59, 'KHAGARIA', 3, 'Bihar', 1),
(60, 'BHAGALPUR', 3, 'Bihar', 1),
(61, 'BANKA', 3, 'Bihar', 1),
(62, 'KATIHAR', 3, 'Bihar', 1),
(63, 'KISHANGANJ', 3, 'Bihar', 1),
(64, 'LAKHISARAI', 3, 'Bihar', 1),
(65, 'MUNGER', 3, 'Bihar', 1),
(66, 'NALANDA', 3, 'Bihar', 1),
(67, 'SHEIKHPURA', 3, 'Bihar', 1),
(68, 'NAWADA', 3, 'Bihar', 1),
(69, 'MADHEPURA', 3, 'Bihar', 1),
(70, 'SUPAUL', 3, 'Bihar', 1),
(71, 'SAHARSA', 3, 'Bihar', 1),
(72, 'SAMASTIPUR', 3, 'Bihar', 1),
(73, 'DARBHANGA', 3, 'Bihar', 1),
(74, 'MUZAFFARPUR', 3, 'Bihar', 1),
(75, 'DARBHANGA', 4, 'Goa', 1),
(76, 'EAST CHAMPARAN', 3, 'Bihar', 1),
(77, 'MADHUBANI', 3, 'Bihar', 1),
(78, 'ARARIA', 3, 'Bihar', 1),
(79, 'SARAN', 3, 'Bihar', 1),
(80, 'SITAMARHI', 3, 'Bihar', 1),
(81, 'SHEOHAR', 3, 'Bihar', 1),
(82, 'GOPALGANJ', 3, 'Bihar', 1),
(83, 'SIWAN', 3, 'Bihar', 1),
(84, 'WEST CHAMPARAN', 3, 'Bihar', 1),
(85, 'BILASPURCGH', 5, 'Chattisgarh', 1),
(86, 'JANJGIRCHAMPA', 5, 'Chattisgarh', 1),
(87, 'KORBA', 5, 'Chattisgarh', 1),
(88, 'MUNGELI', 5, 'Chattisgarh', 1),
(89, 'Janjgir-Champa', 5, 'Chattisgarh', 1),
(90, 'DURG', 5, 'Chattisgarh', 1),
(91, 'RAJNANDGAON', 5, 'Chattisgarh', 1),
(92, 'BALOD', 5, 'Chattisgarh', 1),
(93, 'BEMETARA', 5, 'Chattisgarh', 1),
(94, 'KAWARDHA', 5, 'Chattisgarh', 1),
(95, 'RAIGARH', 5, 'Chattisgarh', 1),
(96, 'SURGUJA', 5, 'Chattisgarh', 1),
(97, 'JASPUR', 5, 'Chattisgarh', 1),
(98, 'BALRAMPUR', 5, 'Chattisgarh', 1),
(99, 'KORIYA', 5, 'Chattisgarh', 1),
(100, 'SURAJPUR', 5, 'Chattisgarh', 1),
(101, 'GARIABAND', 5, 'Chattisgarh', 1),
(102, 'MAHASAMUND', 5, 'Chattisgarh', 1),
(103, 'DHAMTARI', 5, 'Chattisgarh', 1),
(104, 'RAIPUR', 5, 'Chattisgarh', 1),
(105, 'BALOD BAZER', 5, 'Chattisgarh', 1),
(106, 'Kanker', 5, 'Chattisgarh', 1),
(107, 'Jagdalpur', 5, 'Chattisgarh', 1),
(108, 'Bastar', 5, 'Chattisgarh', 1),
(109, 'Dantewada', 5, 'Chattisgarh', 1),
(110, 'Bijapur(CGH)', 5, 'Chattisgarh', 1),
(111, 'Bilaspur', 5, 'Chattisgarh', 1),
(112, 'Narayanpur', 5, 'Chattisgarh', 1),
(113, 'EAST DELHI', 6, 'Delhi', 1),
(114, 'SHAHDARA', 6, 'Delhi', 1),
(115, 'NORTH EAST DELHI', 6, 'Delhi', 1),
(116, 'NORTH DELHI', 6, 'Delhi', 1),
(117, 'NORTH WEST DELHI', 6, 'Delhi', 1),
(118, 'CENTRAL DELHI', 6, 'Delhi', 1),
(119, 'SOUTH DELHI', 6, 'Delhi', 1),
(120, 'SOUTH WEST DELHI', 6, 'Delhi', 1),
(121, 'NEW DELHI', 6, 'Delhi', 1),
(122, 'WEST DELHI', 6, 'Delhi', 1),
(123, 'AHMEDABAD', 7, 'Gujarat', 1),
(124, 'Ahmedabad City', 7, 'Gujarat', 1),
(125, 'BANASKANTHA', 7, 'Gujarat', 1),
(126, 'BHARUCH', 7, 'Gujarat', 1),
(127, 'GANDHI NAGAR', 7, 'Gujarat', 1),
(128, 'BOTAB', 7, 'Gujarat', 1),
(129, 'Gandhinagar', 7, 'Gujarat', 1),
(130, 'MAHESANA', 7, 'Gujarat', 1),
(131, 'PATAN', 7, 'Gujarat', 1),
(132, 'SABARKANTHA', 7, 'Gujarat', 1),
(133, 'ARAVALLI', 7, 'Gujarat', 1),
(134, 'AMRELI', 7, 'Gujarat', 1),
(135, 'BHAVNAGAR', 7, 'Gujarat', 1),
(136, 'RAJKOT', 7, 'Gujarat', 1),
(137, 'JAMNAGAR', 7, 'Gujarat', 1),
(138, 'DEVBHOOMI DWARKA', 7, 'Gujarat', 1),
(139, 'GIR SOMNATH', 7, 'Gujarat', 1),
(140, 'JUNAGADH', 7, 'Gujarat', 1),
(141, 'DIU', 8, 'Daman and Diu', 1),
(142, 'KACHCHH', 7, 'Gujarat', 1),
(143, 'PORBANDAR', 7, 'Gujarat', 1),
(144, 'MORBI', 7, 'Gujarat', 1),
(145, 'SURENDRA NAGAR', 7, 'Gujarat', 1),
(146, 'ANAND', 7, 'Gujarat', 1),
(147, 'KHEDA', 7, 'Gujarat', 1),
(148, 'MAHISAGAR', 7, 'Gujarat', 1),
(149, 'SURAT', 7, 'Gujarat', 1),
(150, 'TAPI', 7, 'Gujarat', 1),
(151, 'DANGS', 7, 'Gujarat', 1),
(152, 'NARMADA', 7, 'Gujarat', 1),
(153, 'NAVSARI', 7, 'Gujarat', 1),
(154, 'DAHOD', 7, 'Gujarat', 1),
(155, 'PANCH MAHALS', 7, 'Gujarat', 1),
(156, 'VADODARA', 7, 'Gujarat', 1),
(157, 'Chhotaudepur', 7, 'Gujarat', 1),
(158, 'VALSAD', 7, 'Gujarat', 1),
(159, 'DADRA  NAGAR HAVELI', 9, 'Dadra and Nagar Hav.', 1),
(160, 'DAMAN', 8, 'Daman and Diu', 1),
(161, 'AMBALA', 10, 'Haryana', 1),
(162, 'YAMUNANAGAR', 10, 'Haryana', 1),
(163, 'PANCHKULA', 10, 'Haryana', 1),
(164, 'BHIWANI', 10, 'Haryana', 1),
(165, 'FARIDABAD', 10, 'Haryana', 1),
(166, 'MEWAT', 10, 'Haryana', 1),
(167, 'REWARI', 10, 'Haryana', 1),
(168, 'GURGAON', 10, 'Haryana', 1),
(169, 'MAHENDRAGARH', 10, 'Haryana', 1),
(170, 'FATEHABAD', 10, 'Haryana', 1),
(171, 'SIRSA', 10, 'Haryana', 1),
(172, 'HISAR', 10, 'Haryana', 1),
(173, 'KARNAL', 10, 'Haryana', 1),
(174, 'PANIPAT', 10, 'Haryana', 1),
(175, 'JIND', 10, 'Haryana', 1),
(176, 'KURUKSHETRA', 10, 'Haryana', 1),
(177, 'KAITHAL', 10, 'Haryana', 1),
(178, 'JHAJJAR', 10, 'Haryana', 1),
(179, 'ROHTAK', 10, 'Haryana', 1),
(180, 'SONIPAT', 10, 'Haryana', 1),
(181, 'CHAMBA', 11, 'Himachal Pradesh', 1),
(182, 'KANGRA', 11, 'Himachal Pradesh', 1),
(183, 'HAMIRPURHP', 11, 'Himachal Pradesh', 1),
(184, 'BILASPUR HP', 11, 'Himachal Pradesh', 1),
(185, 'MANDI', 11, 'Himachal Pradesh', 1),
(186, 'KULLU', 11, 'Himachal Pradesh', 1),
(187, 'LAHUL  SPITI', 11, 'Himachal Pradesh', 1),
(188, 'KINNAUR', 11, 'Himachal Pradesh', 1),
(189, 'SHIMLA', 11, 'Himachal Pradesh', 1),
(190, 'SIRMAUR', 11, 'Himachal Pradesh', 1),
(191, 'SOLAN', 11, 'Himachal Pradesh', 1),
(192, 'UNA', 11, 'Himachal Pradesh', 1),
(193, 'Bandipur', 12, 'Jammu and Kashmir', 1),
(194, 'Kupwara', 12, 'Jammu and Kashmir', 1),
(195, 'BARAMULLA', 12, 'Jammu and Kashmir', 1),
(196, 'SAMBA', 12, 'Jammu and Kashmir', 1),
(197, 'JAMMU', 12, 'Jammu and Kashmir', 1),
(198, 'KATHUA', 12, 'Jammu and Kashmir', 1),
(199, 'RAJAURI', 12, 'Jammu and Kashmir', 1),
(200, 'POONCH', 12, 'Jammu and Kashmir', 1),
(201, 'BUDGAM', 12, 'Jammu and Kashmir', 1),
(202, 'SRINAGAR', 12, 'Jammu and Kashmir', 1),
(203, 'ANANTHNAG', 12, 'Jammu and Kashmir', 1),
(204, 'PULWAMA', 12, 'Jammu and Kashmir', 1),
(205, 'KULGAM', 12, 'Jammu and Kashmir', 1),
(206, 'GANDERBAL', 12, 'Jammu and Kashmir', 1),
(207, 'SHOPIAN', 12, 'Jammu and Kashmir', 1),
(208, 'REASI', 12, 'Jammu and Kashmir', 1),
(209, 'DODA', 12, 'Jammu and Kashmir', 1),
(210, 'RAMBAN', 12, 'Jammu and Kashmir', 1),
(211, 'UDHAMPUR', 12, 'Jammu and Kashmir', 1),
(212, 'Kargil', 12, 'Jammu and Kashmir', 1),
(213, 'Leh', 12, 'Jammu and Kashmir', 1),
(214, 'DHANBAD', 13, 'Jharkhand', 1),
(215, 'BOKARO', 13, 'Jharkhand', 1),
(216, 'GIRIDIH', 13, 'Jharkhand', 1),
(217, 'HAZARIBAG', 13, 'Jharkhand', 1),
(218, 'CHATRA', 13, 'Jharkhand', 1),
(219, 'Ramgarh', 13, 'Jharkhand', 1),
(220, 'KODERMA', 13, 'Jharkhand', 1),
(222, 'LATEHAR', 13, 'Jharkhand', 1),
(223, 'GARHWA', 13, 'Jharkhand', 1),
(224, 'PAKUR', 13, 'Jharkhand', 1),
(225, 'PALAMU', 13, 'Jharkhand', 1),
(226, 'RANCHI', 13, 'Jharkhand', 1),
(227, 'GUMLA', 13, 'Jharkhand', 1),
(228, 'SIMDEGA', 13, 'Jharkhand', 1),
(229, 'Lohardaga', 13, 'Jharkhand', 1),
(230, 'KHUNTI', 13, 'Jharkhand', 1),
(231, 'GODDA', 13, 'Jharkhand', 1),
(232, 'JAMTARA', 13, 'Jharkhand', 1),
(233, 'SAHIBGANJ', 13, 'Jharkhand', 1),
(234, 'DEOGHAR', 13, 'Jharkhand', 1),
(235, 'DUMKA', 13, 'Jharkhand', 1),
(236, 'Saraikela Kharsawan', 13, 'Jharkhand', 1),
(237, 'EAST SINGHBHUM', 13, 'Jharkhand', 1),
(238, 'WEST SINGHBHUM', 13, 'Jharkhand', 1),
(239, 'BENGALURU', 14, 'Karnataka', 1),
(240, 'Bangalore', 14, 'Karnataka', 1),
(241, 'BENGALURU RURAL', 14, 'Karnataka', 1),
(242, 'RAMANAGAR', 14, 'Karnataka', 1),
(243, 'BAGALKOT', 14, 'Karnataka', 1),
(244, 'BELLARY', 14, 'Karnataka', 1),
(245, 'DAVANGERE', 14, 'Karnataka', 1),
(246, 'BELAGAVI', 14, 'Karnataka', 1),
(247, 'Bidar', 14, 'Karnataka', 1),
(248, 'Hubballi', 14, 'Karnataka', 1),
(249, 'Dharwad', 14, 'Karnataka', 1),
(250, 'Madikeri', 14, 'Karnataka', 1),
(251, 'GADAG', 14, 'Karnataka', 1),
(252, 'KOPPAL', 14, 'Karnataka', 1),
(253, 'HAVERI', 14, 'Karnataka', 1),
(254, 'KALABURAGI', 14, 'Karnataka', 1),
(255, 'YADGIR', 14, 'Karnataka', 1),
(256, 'UTTARA KANNADA', 14, 'Karnataka', 1),
(257, 'RAICHUR', 14, 'Karnataka', 1),
(258, 'Joida', 14, 'Karnataka', 1),
(259, 'BIJAPUR(KAR)', 14, 'Karnataka', 1),
(260, 'BIJAPUR', 14, 'Karnataka', 1),
(261, 'CHICKMAGALUR', 14, 'Karnataka', 1),
(262, 'CHITRADURGA', 14, 'Karnataka', 1),
(263, 'HASSAN', 14, 'Karnataka', 1),
(264, 'Kodagu', 14, 'Karnataka', 1),
(265, 'Athani', 14, 'Karnataka', 1),
(266, 'CHIKKABALLAPUR', 14, 'Karnataka', 1),
(267, 'KOLAR', 14, 'Karnataka', 1),
(268, 'Mandya', 14, 'Karnataka', 1),
(269, 'Dakshina Kannada', 14, 'Karnataka', 1),
(270, 'Udupi', 14, 'Karnataka', 1),
(271, 'Mysuru', 14, 'Karnataka', 1),
(272, 'Saraswathipuram', 14, 'Karnataka', 1),
(273, 'Chamrajnagar', 14, 'Karnataka', 1),
(274, 'Bailhongal', 14, 'Karnataka', 1),
(275, 'Nanjangud', 14, 'Karnataka', 1),
(276, 'SHIVAMOGGA', 14, 'Karnataka', 1),
(277, 'TUMAKURU', 14, 'Karnataka', 1),
(278, 'KOLLAM', 15, 'Kerala', 1),
(279, 'PATHANAMTHITTA', 15, 'Kerala', 1),
(280, 'ALAPPUZHA', 15, 'Kerala', 1),
(281, 'THIRUVANANTHAPURAM', 15, 'Kerala', 1),
(282, 'WAYANAD', 15, 'Kerala', 1),
(283, 'KOZHIKODE', 15, 'Kerala', 1),
(284, 'MALAPPURAM', 15, 'Kerala', 1),
(285, 'KANNUR', 15, 'Kerala', 1),
(286, 'KASARGOD', 15, 'Kerala', 1),
(287, 'Kasaragod', 15, 'Kerala', 1),
(288, 'PALAKKAD', 15, 'Kerala', 1),
(289, 'MAHE', 15, 'Kerala', 1),
(290, 'ERNAKULAM', 15, 'Kerala', 1),
(291, 'KOTTAYAM', 15, 'Kerala', 1),
(292, 'IDUKKI', 15, 'Kerala', 1),
(293, 'THRISSUR', 15, 'Kerala', 1),
(294, 'Lakshadweep', 16, 'Lakshadweep', 1),
(295, 'Kochi', 16, 'Lakshadweep', 1),
(296, 'SEONI', 17, 'Madhya Pradesh', 1),
(297, 'BALAGHAT', 17, 'Madhya Pradesh', 1),
(298, 'BHOPAL', 17, 'Madhya Pradesh', 1),
(299, 'RAISEN', 17, 'Madhya Pradesh', 1),
(300, 'CHHATARPUR', 17, 'Madhya Pradesh', 1),
(301, 'TIKAMGARH', 17, 'Madhya Pradesh', 1),
(302, 'PANNA', 17, 'Madhya Pradesh', 1),
(303, 'CHHINDWARA', 17, 'Madhya Pradesh', 1),
(304, 'BETUL', 17, 'Madhya Pradesh', 1),
(305, 'HOSHANGABAD', 17, 'Madhya Pradesh', 1),
(306, 'HARDA', 17, 'Madhya Pradesh', 1),
(307, 'NARSINGHPUR', 17, 'Madhya Pradesh', 1),
(308, 'SEHORE', 17, 'Madhya Pradesh', 1),
(309, 'SATNA', 17, 'Madhya Pradesh', 1),
(310, 'REWA', 17, 'Madhya Pradesh', 1),
(311, 'DAMOH', 17, 'Madhya Pradesh', 1),
(312, 'SAGAR', 17, 'Madhya Pradesh', 1),
(313, 'ANUPPUR', 17, 'Madhya Pradesh', 1),
(314, 'UMARIA', 17, 'Madhya Pradesh', 1),
(315, 'SHAHDOL', 17, 'Madhya Pradesh', 1),
(316, 'SIDHI', 17, 'Madhya Pradesh', 1),
(317, 'SINGRAULI', 17, 'Madhya Pradesh', 1),
(318, 'VIDISHA', 17, 'Madhya Pradesh', 1),
(319, 'ASHOK NAGAR', 17, 'Madhya Pradesh', 1),
(320, 'SHIVPURI', 17, 'Madhya Pradesh', 1),
(321, 'GUNA', 17, 'Madhya Pradesh', 1),
(322, 'GWALIOR', 17, 'Madhya Pradesh', 1),
(323, 'DATIA', 17, 'Madhya Pradesh', 1),
(324, 'INDORE', 17, 'Madhya Pradesh', 1),
(325, 'DEWAS', 17, 'Madhya Pradesh', 1),
(326, 'DHAR', 17, 'Madhya Pradesh', 1),
(327, 'KATNI', 17, 'Madhya Pradesh', 1),
(328, 'JABALPUR', 17, 'Madhya Pradesh', 1),
(329, 'KHANDWA', 17, 'Madhya Pradesh', 1),
(330, 'KHARGONE', 17, 'Madhya Pradesh', 1),
(331, 'BARWANI', 17, 'Madhya Pradesh', 1),
(332, 'BURHANPUR', 17, 'Madhya Pradesh', 1),
(333, 'NEEMUCH', 17, 'Madhya Pradesh', 1),
(334, 'MANDSAUR', 17, 'Madhya Pradesh', 1),
(335, 'BHIND', 17, 'Madhya Pradesh', 1),
(336, 'MORENA', 17, 'Madhya Pradesh', 1),
(337, 'SHEOPUR', 17, 'Madhya Pradesh', 1),
(338, 'RATLAM', 17, 'Madhya Pradesh', 1),
(339, 'JHABUA', 17, 'Madhya Pradesh', 1),
(340, 'ALIRAJPUR', 17, 'Madhya Pradesh', 1),
(341, 'RAJGARH', 17, 'Madhya Pradesh', 1),
(342, 'UJJAIN', 17, 'Madhya Pradesh', 1),
(343, 'SHAJAPUR', 17, 'Madhya Pradesh', 1),
(344, 'AGAR MALWA', 17, 'Madhya Pradesh', 1),
(345, 'MANDLA', 17, 'Madhya Pradesh', 1),
(346, 'DINDORI', 17, 'Madhya Pradesh', 1),
(347, 'JALNA', 18, 'Maharashtra', 1),
(348, 'AURANGABAD', 18, 'Maharashtra', 1),
(349, 'BEED', 18, 'Maharashtra', 1),
(350, 'Jalgaon', 18, 'Maharashtra', 1),
(351, 'DHULE', 18, 'Maharashtra', 1),
(352, 'NANDURBAR', 18, 'Maharashtra', 1),
(353, 'NANDED', 18, 'Maharashtra', 1),
(354, 'LATUR', 18, 'Maharashtra', 1),
(355, 'OSMANABAD', 18, 'Maharashtra', 1),
(356, 'HINGOLI', 18, 'Maharashtra', 1),
(357, 'PARBHANI', 18, 'Maharashtra', 1),
(358, 'SOUTH GOA', 4, 'Goa', 1),
(359, 'NORTH GOA', 4, 'Goa', 1),
(360, 'Kolhapur', 18, 'Maharashtra', 1),
(361, 'RATNAGIRI', 18, 'Maharashtra', 1),
(362, 'Sangli', 18, 'Maharashtra', 1),
(364, 'SINDHUDURG', 18, 'Maharashtra', 1),
(365, 'MUMBAI', 18, 'Maharashtra', 1),
(366, 'MUMBAI SUBURBAN', 18, 'Maharashtra', 1),
(367, 'AKOLA', 18, 'Maharashtra', 1),
(368, 'WASHIM', 18, 'Maharashtra', 1),
(369, 'AMRAVATI', 18, 'Maharashtra', 1),
(370, 'BULDHANA', 18, 'Maharashtra', 1),
(371, 'GADCHIROLI', 18, 'Maharashtra', 1),
(372, 'CHANDRAPUR', 18, 'Maharashtra', 1),
(373, 'Nagpur', 18, 'Maharashtra', 1),
(374, 'GONDIA', 18, 'Maharashtra', 1),
(375, 'BHANDARA', 18, 'Maharashtra', 1),
(376, 'WARDHA', 18, 'Maharashtra', 1),
(377, 'Yavatmal', 18, 'Maharashtra', 1),
(379, 'NASHIK', 18, 'Maharashtra', 1),
(380, 'RAIGARH(MH)', 18, 'Maharashtra', 1),
(381, 'THANE', 18, 'Maharashtra', 1),
(382, 'PALGHAR', 18, 'Maharashtra', 1),
(384, 'AHMEDNAGAR', 18, 'Maharashtra', 1),
(385, 'SOLAPUR', 18, 'Maharashtra', 1),
(386, 'PUNE', 18, 'Maharashtra', 1),
(387, 'SATARA', 18, 'Maharashtra', 1),
(388, 'Imphal West', 19, 'Manipur', 1),
(389, 'Churachandpur', 19, 'Manipur', 1),
(390, 'Thoubal', 19, 'Manipur', 1),
(391, 'Ukhrul', 19, 'Manipur', 1),
(392, 'Tamenglong', 19, 'Manipur', 1),
(393, 'Chandel', 19, 'Manipur', 1),
(394, 'Imphal East', 19, 'Manipur', 1),
(395, 'Bishnupur', 19, 'Manipur', 1),
(396, 'Senapati', 19, 'Manipur', 1),
(397, 'Aizawl', 20, 'Mizoram', 1),
(398, 'Mammit', 20, 'Mizoram', 1),
(399, 'Lunglei', 20, 'Mizoram', 1),
(400, 'Kolasib', 20, 'Mizoram', 1),
(401, 'Lawngtlai', 20, 'Mizoram', 1),
(402, 'NA', 20, 'Mizoram', 1),
(403, 'Champhai', 20, 'Mizoram', 1),
(404, 'Saiha', 20, 'Mizoram', 1),
(405, 'Serchhip', 20, 'Mizoram', 1),
(406, 'Aizawal', 20, 'Mizoram', 1),
(407, 'Zunhebotto', 21, 'Nagaland', 1),
(408, 'Dimapur', 21, 'Nagaland', 1),
(409, 'Wokha', 21, 'Nagaland', 1),
(410, 'Phek', 21, 'Nagaland', 1),
(411, 'Mokokchung', 21, 'Nagaland', 1),
(412, 'Kiphire', 21, 'Nagaland', 1),
(413, 'Tuensang', 21, 'Nagaland', 1),
(414, 'Mon', 21, 'Nagaland', 1),
(415, 'Kohima', 21, 'Nagaland', 1),
(416, 'Peren', 21, 'Nagaland', 1),
(417, 'Longleng', 21, 'Nagaland', 1),
(418, 'NA', 21, 'Nagaland', 1),
(419, 'Dimapur', 22, 'Sikkim', 1),
(420, 'South Tripura', 23, 'Tripura', 1),
(421, 'West Tripura', 23, 'Tripura', 1),
(422, 'Gomati', 23, 'Tripura', 1),
(423, 'Sepahijala', 23, 'Tripura', 1),
(424, 'Agartala�', 23, 'Tripura', 1),
(425, 'West Tripura', 19, 'Manipur', 1),
(426, 'Lower Dibang Valley', 24, 'Arunachal Pradesh', 1),
(427, 'East Siang', 24, 'Arunachal Pradesh', 1),
(428, 'Dibang Valley', 24, 'Arunachal Pradesh', 1),
(429, 'West Siang', 24, 'Arunachal Pradesh', 1),
(430, 'Lohit', 24, 'Arunachal Pradesh', 1),
(431, 'Papum Pare', 24, 'Arunachal Pradesh', 1),
(432, 'Tawang', 24, 'Arunachal Pradesh', 1),
(433, 'West Kameng', 24, 'Arunachal Pradesh', 1),
(434, 'East Kameng', 24, 'Arunachal Pradesh', 1),
(435, 'Lower Subansiri', 24, 'Arunachal Pradesh', 1),
(436, 'Changlang', 24, 'Arunachal Pradesh', 1),
(437, 'Tirap', 24, 'Arunachal Pradesh', 1),
(438, 'Kurung Kumey', 24, 'Arunachal Pradesh', 1),
(439, 'Upper Subansiri', 24, 'Arunachal Pradesh', 1),
(440, 'Upper Siang', 24, 'Arunachal Pradesh', 1),
(441, 'Dhalai', 23, 'Tripura', 1),
(442, 'North Tripura', 23, 'Tripura', 1),
(443, 'Dharmanagar', 23, 'Tripura', 1),
(444, 'West Garo Hills', 25, 'Megalaya', 1),
(445, 'Jaintia Hills', 25, 'Megalaya', 1),
(446, 'East Khasi Hills', 25, 'Megalaya', 1),
(447, 'South Garo Hills', 25, 'Megalaya', 1),
(448, 'East Garo Hills', 25, 'Megalaya', 1),
(449, 'Ri Bhoi', 25, 'Megalaya', 1),
(450, 'Shillong', 25, 'Megalaya', 1),
(451, 'West Khasi Hills', 25, 'Megalaya', 1),
(452, 'NA', 25, 'Megalaya', 1),
(453, 'Tura', 25, 'Megalaya', 1),
(454, 'KHORDA', 26, 'Odisha', 1),
(455, 'BALESWAR', 26, 'Odisha', 1),
(456, 'BHADRAK', 26, 'Odisha', 1),
(457, 'CUTTACK', 26, 'Odisha', 1),
(458, 'JAJAPUR', 26, 'Odisha', 1),
(459, 'KENDRAPARA', 26, 'Odisha', 1),
(460, 'JAGATSINGHAPUR', 26, 'Odisha', 1),
(461, 'MAYURBHANJ', 26, 'Odisha', 1),
(462, 'PURI', 26, 'Odisha', 1),
(463, 'NAYAGARH', 26, 'Odisha', 1),
(464, 'GANJAM', 26, 'Odisha', 1),
(465, 'GAJAPATI', 26, 'Odisha', 1),
(466, 'KALAHANDI', 26, 'Odisha', 1),
(467, 'NUAPADA', 26, 'Odisha', 1),
(468, 'KORAPUT', 26, 'Odisha', 1),
(469, 'NABARANGAPUR', 26, 'Odisha', 1),
(470, 'MALKANGIRI', 26, 'Odisha', 1),
(471, 'KANDHAMAL', 26, 'Odisha', 1),
(472, 'BOUDH', 26, 'Odisha', 1),
(473, 'RAYAGADA', 26, 'Odisha', 1),
(474, 'BALANGIR', 26, 'Odisha', 1),
(475, 'SONAPUR', 26, 'Odisha', 1),
(476, 'ANGUL', 26, 'Odisha', 1),
(477, 'DHENKANAL', 26, 'Odisha', 1),
(478, 'KENDUJHAR', 26, 'Odisha', 1),
(479, 'SAMBALPUR', 26, 'Odisha', 1),
(480, 'BARGARH', 26, 'Odisha', 1),
(481, 'JHARSUGUDA', 26, 'Odisha', 1),
(482, 'DEBAGARH', 26, 'Odisha', 1),
(483, 'SUNDERGARH', 26, 'Odisha', 1),
(484, 'ROPAR', 27, 'Punjab', 1),
(485, 'CHANDIGHAR', 28, 'Chandigarh', 1),
(486, 'CHANDIGHAR', 27, 'Punjab', 1),
(487, 'MOHALI', 27, 'Punjab', 1),
(488, 'RUPNAGAR', 27, 'Punjab', 1),
(489, 'LUDHIANA', 27, 'Punjab', 1),
(490, 'FATEHGARH SAHIB', 27, 'Punjab', 1),
(491, 'PATIALA', 27, 'Punjab', 1),
(492, 'SANGRUR', 27, 'Punjab', 1),
(493, 'AMRITSAR', 27, 'Punjab', 1),
(494, 'TARN TARAN', 27, 'Punjab', 1),
(495, 'BATHINDA', 27, 'Punjab', 1),
(496, 'MANSA', 27, 'Punjab', 1),
(497, 'MUKTSAR', 27, 'Punjab', 1),
(498, 'MOGA', 27, 'Punjab', 1),
(499, 'FARIDKOT', 27, 'Punjab', 1),
(500, 'FAZILKA', 27, 'Punjab', 1),
(501, 'FIROZPUR', 27, 'Punjab', 1),
(502, 'PATHANKOT', 27, 'Punjab', 1),
(503, 'GURDASPUR', 27, 'Punjab', 1),
(504, 'HOSHIARPUR', 27, 'Punjab', 1),
(505, 'JALANDHAR', 27, 'Punjab', 1),
(506, 'NAWANSHAHR', 27, 'Punjab', 1),
(507, 'KAPURTHALA', 27, 'Punjab', 1),
(508, 'ALWAR', 29, 'Rajasthan', 1),
(509, 'BHARATPUR', 29, 'Rajasthan', 1),
(510, 'DHOLPUR', 29, 'Rajasthan', 1),
(511, 'JAIPUR', 29, 'Rajasthan', 1),
(512, 'DAUSA', 29, 'Rajasthan', 1),
(513, 'SAWAI MADHOPUR', 29, 'Rajasthan', 1),
(514, 'KARAULI', 29, 'Rajasthan', 1),
(515, 'AJMER', 29, 'Rajasthan', 1),
(516, 'BHILWARA', 29, 'Rajasthan', 1),
(517, 'PRATAPGHAR', 29, 'Rajasthan', 1),
(518, 'CHITTORGARH', 29, 'Rajasthan', 1),
(519, 'BANSWARA', 29, 'Rajasthan', 1),
(520, 'DUNGARPUR', 29, 'Rajasthan', 1),
(521, 'KOTA', 29, 'Rajasthan', 1),
(522, 'BARAN', 29, 'Rajasthan', 1),
(523, 'JHALAWAR', 29, 'Rajasthan', 1),
(524, 'BUNDI', 29, 'Rajasthan', 1),
(525, 'TONK', 29, 'Rajasthan', 1),
(526, 'RAJSAMAND', 29, 'Rajasthan', 1),
(527, 'UDAIPUR', 29, 'Rajasthan', 1),
(528, 'BARMER', 29, 'Rajasthan', 1),
(529, 'BIKANER', 29, 'Rajasthan', 1),
(530, 'CHURU', 29, 'Rajasthan', 1),
(531, 'JHUJHUNU', 29, 'Rajasthan', 1),
(532, 'JODHPUR', 29, 'Rajasthan', 1),
(533, 'JAISALMER', 29, 'Rajasthan', 1),
(534, 'NAGAUR', 29, 'Rajasthan', 1),
(535, 'PALI', 29, 'Rajasthan', 1),
(536, 'SIKAR', 29, 'Rajasthan', 1),
(537, 'SIROHI', 29, 'Rajasthan', 1),
(538, 'JALOR', 29, 'Rajasthan', 1),
(539, 'SRI GANGANAGAR', 29, 'Rajasthan', 1),
(540, 'HANUMANGARH', 29, 'Rajasthan', 1),
(541, 'SRIGANGANAGAR', 29, 'Rajasthan', 1),
(542, 'CUDDALORE', 30, 'Tamil Nadu', 1),
(543, 'KARUR', 30, 'Tamil Nadu', 1),
(544, 'TIRUCHIRAPPALLI', 30, 'Tamil Nadu', 1),
(545, 'TIRUPPUR', 30, 'Tamil Nadu', 1),
(546, 'TIRUVARUR', 30, 'Tamil Nadu', 1),
(547, 'THANJAVUR', 30, 'Tamil Nadu', 1),
(548, 'NAGAPATTINAM', 30, 'Tamil Nadu', 1),
(549, 'KARAIKAL', 30, 'Tamil Nadu', 1),
(550, 'PUDUKKOTTAI', 30, 'Tamil Nadu', 1),
(551, 'PERAMBALUR', 30, 'Tamil Nadu', 1),
(552, 'ARIYALUR', 30, 'Tamil Nadu', 1),
(553, 'VILLUPURAM', 30, 'Tamil Nadu', 1),
(554, 'Chennai', 30, 'Tamil Nadu', 1),
(555, 'VELLORE', 30, 'Tamil Nadu', 1),
(556, 'KANCHIPURAM', 30, 'Tamil Nadu', 1),
(557, 'TIRUVALLUR', 30, 'Tamil Nadu', 1),
(558, 'PONDICHERRY', 31, 'Pondicherry', 1),
(559, 'PONDICHERRY', 30, 'Tamil Nadu', 1),
(560, 'TIRUVANNAMALAI', 30, 'Tamil Nadu', 1),
(561, 'DINDIGUL', 30, 'Tamil Nadu', 1),
(562, 'KANYAKUMARI', 30, 'Tamil Nadu', 1),
(563, 'SIVAGANGA', 30, 'Tamil Nadu', 1),
(564, 'TUTICORIN', 30, 'Tamil Nadu', 1),
(565, 'TIRUNELVELI', 30, 'Tamil Nadu', 1),
(566, 'MADURAI', 30, 'Tamil Nadu', 1),
(567, 'RAMANATHAPURAM', 30, 'Tamil Nadu', 1),
(568, 'THENI', 30, 'Tamil Nadu', 1),
(569, 'VIRUDHUNAGAR', 30, 'Tamil Nadu', 1),
(570, 'COIMBATORE', 30, 'Tamil Nadu', 1),
(571, 'DHARMAPURI', 30, 'Tamil Nadu', 1),
(572, 'KRISHNAGIRI', 30, 'Tamil Nadu', 1),
(573, 'ERODE', 30, 'Tamil Nadu', 1),
(574, 'NAMAKKAL', 30, 'Tamil Nadu', 1),
(575, 'SALEM', 30, 'Tamil Nadu', 1),
(576, 'NILGIRIS', 30, 'Tamil Nadu', 1),
(577, 'HYDERABAD', 32, 'Telangana', 1),
(578, 'RANGAREDDY', 32, 'Telangana', 1),
(579, 'Ranga Reddy', 32, 'Telangana', 1),
(580, 'RANGAREDDY', 1, 'Andhra Pradesh', 1),
(581, 'SIDDIPET', 32, 'Telangana', 1),
(582, 'MEDAK', 32, 'Telangana', 1),
(583, 'SANGAREDDY', 32, 'Telangana', 1),
(584, 'Vikarabad', 32, 'Telangana', 1),
(585, 'Trimulgherry', 32, 'Telangana', 1),
(586, 'MANCHERIAL', 32, 'Telangana', 1),
(587, 'ADILABAD', 32, 'Telangana', 1),
(588, 'NIRMAL', 32, 'Telangana', 1),
(589, 'Warangal', 32, 'Telangana', 1),
(590, 'Parkal', 32, 'Telangana', 1),
(591, 'Hanamkonda', 32, 'Telangana', 1),
(592, 'Jangaon', 32, 'Telangana', 1),
(593, 'JAYASHANKAR', 32, 'Telangana', 1),
(594, 'KARIM NAGAR', 32, 'Telangana', 1),
(595, 'SIRCILLA', 32, 'Telangana', 1),
(596, 'JAGTIAL', 32, 'Telangana', 1),
(597, 'KOTHAGUDEM', 32, 'Telangana', 1),
(598, 'KHAMMAM', 32, 'Telangana', 1),
(599, 'KOTHAGUDEM COLLS', 32, 'Telangana', 1),
(600, 'MAHABUB NAGAR', 32, 'Telangana', 1),
(601, 'GADWAL', 32, 'Telangana', 1),
(602, 'WANAPARTHY', 32, 'Telangana', 1),
(603, 'Mahabub Nagar', 1, 'Andhra Pradesh', 1),
(604, 'BHONGIR', 32, 'Telangana', 1),
(605, 'NALGONDA', 32, 'Telangana', 1),
(606, 'NIZAMABAD', 32, 'Telangana', 1),
(607, 'KAMAREDDY', 32, 'Telangana', 1),
(608, 'PEDDAPALLI', 32, 'Telangana', 1),
(609, 'SURYAPET', 32, 'Telangana', 1),
(610, 'NAGAR KURNOOL', 32, 'Telangana', 1),
(611, 'STN. JADCHERLA', 32, 'Telangana', 1),
(612, 'Warangal Rural', 32, 'Telangana', 1),
(613, 'Mahabuababad', 32, 'Telangana', 1),
(614, 'AGRA', 33, 'Uttar Pradesh', 1),
(615, 'ALIGARH', 33, 'Uttar Pradesh', 1),
(616, 'HATHRAS', 33, 'Uttar Pradesh', 1),
(617, 'BULANDSHAHR', 33, 'Uttar Pradesh', 1),
(618, 'ETAH', 33, 'Uttar Pradesh', 1),
(619, 'KANSHIRAM NAGAR', 33, 'Uttar Pradesh', 1),
(620, 'ETAWAH', 33, 'Uttar Pradesh', 1),
(621, 'AURAIYA', 33, 'Uttar Pradesh', 1),
(622, 'JHANSI', 33, 'Uttar Pradesh', 1),
(623, 'JALAUN', 33, 'Uttar Pradesh', 1),
(624, 'LALITPUR', 33, 'Uttar Pradesh', 1),
(625, 'FIROZABAD', 33, 'Uttar Pradesh', 1),
(626, 'MAINPURI', 33, 'Uttar Pradesh', 1),
(627, 'MATHURA', 33, 'Uttar Pradesh', 1),
(628, 'ALLAHABAD', 33, 'Uttar Pradesh', 1),
(629, 'KAUSHAMBI', 33, 'Uttar Pradesh', 1),
(630, 'Prayagraj Allahabad', 33, 'Uttar Pradesh', 1),
(631, 'KUSHINAGAR', 33, 'Uttar Pradesh', 1),
(632, 'GHAZIPUR', 33, 'Uttar Pradesh', 1),
(633, 'VARANASI', 33, 'Uttar Pradesh', 1),
(634, 'SONBHADRA', 33, 'Uttar Pradesh', 1),
(635, 'MIRZAPUR', 33, 'Uttar Pradesh', 1),
(636, 'PRATAPGARH', 33, 'Uttar Pradesh', 1),
(637, 'SULTANPUR', 33, 'Uttar Pradesh', 1),
(638, 'AMETHI', 33, 'Uttar Pradesh', 1),
(639, 'PILIBHIT', 33, 'Uttar Pradesh', 1),
(640, 'BAREILLY', 33, 'Uttar Pradesh', 1),
(641, 'BIJNOR', 33, 'Uttar Pradesh', 1),
(642, 'BUDAUN', 33, 'Uttar Pradesh', 1),
(643, 'HARDOI', 33, 'Uttar Pradesh', 1),
(644, 'KHERI', 33, 'Uttar Pradesh', 1),
(645, 'MEERUT', 33, 'Uttar Pradesh', 1),
(646, 'BAGPAT', 33, 'Uttar Pradesh', 1),
(647, 'AMROHA', 33, 'Uttar Pradesh', 1),
(648, 'SAMBHAL', 33, 'Uttar Pradesh', 1),
(649, 'RAMPUR', 33, 'Uttar Pradesh', 1),
(650, 'MORADABAD', 33, 'Uttar Pradesh', 1),
(651, 'MUZAFFARNAGAR', 33, 'Uttar Pradesh', 1),
(652, 'SAHARANPUR', 33, 'Uttar Pradesh', 1),
(653, 'HARIDWAR', 33, 'Uttar Pradesh', 1),
(654, 'SHAHJAHANPUR', 33, 'Uttar Pradesh', 1),
(655, 'AZAMGARH', 33, 'Uttar Pradesh', 1),
(656, 'MAU', 33, 'Uttar Pradesh', 1),
(657, 'SHRAWASTI', 33, 'Uttar Pradesh', 1),
(658, 'BAHRAICH', 33, 'Uttar Pradesh', 1),
(659, 'SIDDHARTHNAGAR', 33, 'Uttar Pradesh', 1),
(660, 'BASTI', 33, 'Uttar Pradesh', 1),
(661, 'SANT KABIR NAGAR', 33, 'Uttar Pradesh', 1),
(662, 'BASTI', 8, 'Daman and Diu', 1),
(663, 'DEORIA', 33, 'Uttar Pradesh', 1),
(664, 'GONDA', 33, 'Uttar Pradesh', 1),
(665, 'BALRAMPUR', 33, 'Uttar Pradesh', 1),
(666, 'GORAKHPUR', 33, 'Uttar Pradesh', 1),
(667, 'MAHARAJGANJ', 33, 'Uttar Pradesh', 1),
(668, 'MAHRAJGANJ', 33, 'Uttar Pradesh', 1),
(669, 'BANDA', 33, 'Uttar Pradesh', 1),
(670, 'CHITRAKOOT', 33, 'Uttar Pradesh', 1),
(671, 'MAHOBA', 33, 'Uttar Pradesh', 1),
(672, 'HAMIRPUR', 33, 'Uttar Pradesh', 1),
(673, 'KANNAUJ', 33, 'Uttar Pradesh', 1),
(674, 'FARRUKHABAD', 33, 'Uttar Pradesh', 1),
(675, 'FATEHPUR', 33, 'Uttar Pradesh', 1),
(676, 'KANPUR NAGAR', 33, 'Uttar Pradesh', 1),
(677, 'KANPUR DEHAT', 33, 'Uttar Pradesh', 1),
(678, 'UNNAO', 33, 'Uttar Pradesh', 1),
(679, 'BARABANKI', 33, 'Uttar Pradesh', 1),
(680, 'FAIZABAD', 33, 'Uttar Pradesh', 1),
(681, 'AMBEDKAR NAGAR', 33, 'Uttar Pradesh', 1),
(682, 'GHAZIABAD', 33, 'Uttar Pradesh', 1),
(683, 'HAPUR', 33, 'Uttar Pradesh', 1),
(684, 'GAUTAM BUDDHA NAGAR', 33, 'Uttar Pradesh', 1),
(685, 'LUCKNOW', 33, 'Uttar Pradesh', 1),
(686, 'RAEBARELI', 33, 'Uttar Pradesh', 1),
(687, 'SITAPUR', 33, 'Uttar Pradesh', 1),
(688, 'BALLIA', 33, 'Uttar Pradesh', 1),
(689, 'JAUNPUR', 33, 'Uttar Pradesh', 1),
(690, 'CHANDAULI', 33, 'Uttar Pradesh', 1),
(691, 'SANT RAVIDAS NAGAR', 33, 'Uttar Pradesh', 1),
(692, 'ALMORA', 34, 'Uttarakhand', 1),
(693, 'BAGESHWAR', 34, 'Uttarakhand', 1),
(694, 'CHAMOLI', 34, 'Uttarakhand', 1),
(695, 'RUDRAPRAYAG', 34, 'Uttarakhand', 1),
(696, 'HARIDWAR', 34, 'Uttarakhand', 1),
(697, 'DEHRADUN', 34, 'Uttarakhand', 1),
(698, 'NAINITAL', 34, 'Uttarakhand', 1),
(699, 'UDHAM SINGH NAGAR', 34, 'Uttarakhand', 1),
(700, 'CHAMPAWAT', 34, 'Uttarakhand', 1),
(701, 'PAURI GARHWAL', 34, 'Uttarakhand', 1),
(702, 'PITHORAGARH', 34, 'Uttarakhand', 1),
(703, 'TEHRI GARHWAL', 34, 'Uttarakhand', 1),
(704, 'UTTARKASHI', 34, 'Uttarakhand', 1),
(705, 'EAST SIKKIM', 22, 'Sikkim', 1),
(706, 'WEST SIKKIM', 22, 'Sikkim', 1),
(707, 'SOUTH SIKKIM', 22, 'Sikkim', 1),
(708, 'NORTH SIKKIM', 35, 'West Bengal', 1),
(709, 'South Andaman', 36, 'Andaman and Nico.In.', 1),
(710, 'North And Middle Andaman', 36, 'Andaman and Nico.In.', 1),
(711, 'Nicobar', 36, 'Andaman and Nico.In.', 1),
(712, 'Kolkata', 35, 'West Bengal', 1),
(713, 'NORTH 24 PARGANAS', 35, 'West Bengal', 1),
(714, 'BIRBHUM', 35, 'West Bengal', 1),
(715, 'SOUTH 24 PARGANAS', 35, 'West Bengal', 1),
(716, 'MURSHIDABAD', 35, 'West Bengal', 1),
(717, 'NADIA', 35, 'West Bengal', 1),
(718, 'COOCH BEHAR', 35, 'West Bengal', 1),
(719, 'JALPAIGURI', 35, 'West Bengal', 1),
(720, 'DARJILING', 35, 'West Bengal', 1),
(721, 'EAST MIDNAPORE', 35, 'West Bengal', 1),
(722, 'Darjeeling', 35, 'West Bengal', 1),
(723, 'WEST MIDNAPORE', 35, 'West Bengal', 1),
(724, 'SOUTH DINAJPUR', 35, 'West Bengal', 1),
(725, 'NORTH DINAJPUR', 35, 'West Bengal', 1),
(726, 'MALDA', 35, 'West Bengal', 1),
(727, 'BARDHAMAN', 35, 'West Bengal', 1),
(728, 'BANKURA', 35, 'West Bengal', 1),
(729, 'HOOGHLY', 35, 'West Bengal', 1),
(730, 'HOWRAH', 35, 'West Bengal', 1),
(731, 'PURULIYA', 35, 'West Bengal', 1),
(732, 'SOUTH EAST DELHI', 6, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_document_type_details`
--

CREATE TABLE `pns_document_type_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `is_required` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_document_type_details`
--

INSERT INTO `pns_document_type_details` (`id`, `name`, `type`, `is_required`, `status`) VALUES
(2, 'Driving License', '1', 0, 1),
(5, 'Vehicle Photo', '1', 1, 1),
(6, 'Vehicle Insurance', '1', 1, 1),
(7, 'Vehicle Pollution Certificate', '1', 1, 1),
(12, 'Registration certificate', '1', 1, 1),
(13, 'PAN Card', '0', 0, 1),
(15, 'Aadhar Back', '0', 1, 1),
(16, 'Aadhar Front', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_driver`
--

CREATE TABLE `pns_driver` (
  `cid` int(11) NOT NULL,
  `srno` varchar(100) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `secondary_mobile` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `social_profile_photo` varchar(255) DEFAULT NULL,
  `bank_account_image` varchar(255) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lng` varchar(100) DEFAULT NULL,
  `address` longtext,
  `landmark` varchar(100) DEFAULT NULL,
  `pincode` varchar(25) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `reference_code` varchar(255) DEFAULT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `is_on_duty` int(11) NOT NULL DEFAULT '0',
  `date_added` varchar(255) DEFAULT NULL,
  `reg_token_ids` varchar(255) DEFAULT NULL,
  `fb_app_id` varchar(255) DEFAULT NULL,
  `kyc_proof` varchar(255) DEFAULT NULL,
  `address_kyc_proof` varchar(255) DEFAULT NULL,
  `is_adddress_kyc_approved` int(11) NOT NULL DEFAULT '0',
  `address_proof` varchar(255) DEFAULT NULL,
  `is_kyc_approved` int(11) NOT NULL DEFAULT '0',
  `is_address_approved` int(11) NOT NULL DEFAULT '0',
  `is_email_approved` int(11) NOT NULL DEFAULT '0',
  `is_mobile_approved` int(11) NOT NULL DEFAULT '0',
  `is_photo_approved` int(11) NOT NULL DEFAULT '0',
  `account_close_reason` varchar(255) DEFAULT NULL,
  `account_close_remarks` text,
  `otp` varchar(255) DEFAULT NULL,
  `otp_valid_till` varchar(255) DEFAULT NULL,
  `email_otp` varchar(25) DEFAULT NULL,
  `email_otp_valid_till` varchar(255) DEFAULT NULL,
  `urole` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `is_blocked` int(11) NOT NULL DEFAULT '0',
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_driver`
--

INSERT INTO `pns_driver` (`cid`, `srno`, `fname`, `lname`, `uname`, `pass`, `password`, `secondary_mobile`, `mobile`, `emailid`, `gender`, `photo`, `social_profile_photo`, `bank_account_image`, `lat`, `lng`, `address`, `landmark`, `pincode`, `state`, `city`, `reference_code`, `referral`, `status`, `is_on_duty`, `date_added`, `reg_token_ids`, `fb_app_id`, `kyc_proof`, `address_kyc_proof`, `is_adddress_kyc_approved`, `address_proof`, `is_kyc_approved`, `is_address_approved`, `is_email_approved`, `is_mobile_approved`, `is_photo_approved`, `account_close_reason`, `account_close_remarks`, `otp`, `otp_valid_till`, `email_otp`, `email_otp_valid_till`, `urole`, `bank_id`, `bank_name`, `bank_account_no`, `bank_ifsc_code`, `is_blocked`, `reset_token`) VALUES
(1, NULL, 'Yogesh', '', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '1234', NULL, '9327133788', '', '', 'User_8050_profile.png', NULL, 'Bank_4366_image.png', NULL, NULL, NULL, NULL, NULL, '', '', '', 'YO23', '3', 1, NULL, '7c023d1b-ba8e-4cd2-9de6-e02a0d20bcbe', NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 1, NULL, NULL, '', '2021-03-20 16:43:35', NULL, NULL, NULL, 9, 'Bank of Baroda', '42464994949', 'HDHSHD', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pns_driver_duty_details`
--

CREATE TABLE `pns_driver_duty_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_driver_duty_details`
--

INSERT INTO `pns_driver_duty_details` (`id`, `user_id`, `start_time`, `end_time`, `date`, `status`) VALUES
(1, 1, '18:23:15', '18:28:53', '2021-07-23', 1),
(2, 1, '20:47:39', '20:47:41', '2021-07-24', 1),
(3, 1, '20:48:28', '20:49:15', '2021-08-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_driver_profile_document`
--

CREATE TABLE `pns_driver_profile_document` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_document` int(11) DEFAULT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `document_no` varchar(255) DEFAULT NULL,
  `document_date` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `address` text,
  `dob` varchar(255) DEFAULT NULL,
  `name_on_document` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_driver_profile_document`
--

INSERT INTO `pns_driver_profile_document` (`id`, `id_user`, `id_document`, `document_name`, `image`, `document_no`, `document_date`, `expiry_date`, `address`, `dob`, `name_on_document`, `date_added`, `status`) VALUES
(1, 1, 1, 'Aadhar Card', '5420_image.png', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 12:16:00', 0),
(2, 1, 11, 'Bank Details', '6337_image.png', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 12:16:00', 0),
(3, 1, 3, 'Voter Id Card', '7773_image.png', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 12:16:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_driver_vehicle_document`
--

CREATE TABLE `pns_driver_vehicle_document` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_vehicle` int(11) DEFAULT NULL,
  `id_document` int(11) DEFAULT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name_on_document` varchar(255) DEFAULT NULL,
  `document_no` varchar(255) DEFAULT NULL,
  `document_date` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_driver_vehicle_document`
--

INSERT INTO `pns_driver_vehicle_document` (`id`, `id_user`, `id_vehicle`, `id_document`, `document_name`, `image`, `name_on_document`, `document_no`, `document_date`, `expiry_date`, `date_added`, `status`) VALUES
(1, 1, 1, 5, 'Car Photo', '6176_image.png', NULL, NULL, NULL, NULL, '2021-02-23 12:22:07', 0),
(2, 1, 1, 7, 'Car PUC Certificate', '5428_image.png', NULL, NULL, NULL, NULL, '2021-02-23 12:22:07', 0),
(3, 1, 1, 2, 'Driving License', '6425_image.png', NULL, NULL, NULL, NULL, '2021-02-23 12:22:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_emergency_contact`
--

CREATE TABLE `pns_emergency_contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_emergency_contact`
--

INSERT INTO `pns_emergency_contact` (`id`, `user_id`, `name`, `contact_no`, `status`, `date_added`) VALUES
(4, 9, '72658', '72658', 0, '2021-01-21 19:17:05'),
(6, 43, 'Maa', '+91 75428 49944', 0, '2021-01-29 20:16:32'),
(7, 9, 'Home ', '704567984', 0, '2021-02-05 15:22:11'),
(9, 58, 'Maa', '+91 75428 49944', 0, '2021-02-17 13:30:59'),
(10, 66, 'Papa', '8235130292', 0, '2021-02-22 17:54:17'),
(11, 66, 'Raja Bhaiya', '6201134206', 0, '2021-02-22 17:54:23'),
(12, 66, 'Chhoti', '7319734023', 0, '2021-02-22 17:54:31'),
(13, 69, 'Bhai', '70047 95684', 0, '2021-02-23 13:19:00'),
(14, 69, 'Mumma', '8092504674', 0, '2021-02-23 13:19:15'),
(15, 69, 'mani di', '08878664881', 0, '2021-02-23 13:20:08'),
(16, 51, 'Maa Jio', '+91 6200 750 142', 0, '2021-02-23 20:05:52'),
(17, 51, 'Papa Jio', '+916206255062', 0, '2021-02-23 20:06:37'),
(18, 123, 'Golu', '+917091273304', 0, '2021-03-10 21:56:19'),
(19, 123, 'My Husband', '9430727627', 0, '2021-03-10 21:56:37'),
(20, 84, 'Adil MCA', '+91 76982 48386', 0, '2021-03-20 18:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `pns_emergency_details`
--

CREATE TABLE `pns_emergency_details` (
  `id` int(11) NOT NULL,
  `id_ride` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0=User,1 =driver',
  `user_id` int(11) NOT NULL,
  `place_id` varchar(255) NOT NULL,
  `lat_lng` varchar(255) NOT NULL,
  `place_description` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_favorite_location`
--

CREATE TABLE `pns_favorite_location` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `description` text,
  `address` text,
  `place_id` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_favorite_location`
--

INSERT INTO `pns_favorite_location` (`id`, `user_id`, `title`, `lat`, `lng`, `description`, `address`, `place_id`, `status`, `date_added`) VALUES
(1, 1, 'Office', '', '', 'Vbiz Solutions, Kalavad Road, Janta Society, Kishan Para, Rajkot, Gujarat, India', 'Vbiz Solutions, Kalavad Road, Janta Society, Kishan Para, Rajkot, Gujarat, India', 'ChIJt9y1gCHKWTkRaPkbXLDihvg', 0, '2021-01-21 19:21:27'),
(2, 1, 'Office 1', '', '', 'Gaurav Path, Kishan Para, Rajkot, Gujarat 360001, India', 'Gaurav Path, Kishan Para, Rajkot, Gujarat 360001, India', 'ChIJOfKkLiLKWTkR8MIHaGzs1Tk', 0, '2021-01-22 10:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `pns_log`
--

CREATE TABLE `pns_log` (
  `lid` int(11) NOT NULL,
  `exname` varchar(100) NOT NULL,
  `ltype` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '1=executive 2=customer ',
  `ldetail` longtext NOT NULL,
  `ldate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pns_login`
--

CREATE TABLE `pns_login` (
  `id` int(11) NOT NULL,
  `aname` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `desig` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `reg_token_ids` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `urole` varchar(100) DEFAULT NULL,
  `city` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_login`
--

INSERT INTO `pns_login` (`id`, `aname`, `pass`, `password`, `desig`, `fname`, `lname`, `mobile`, `emailid`, `reg_token_ids`, `status`, `photo`, `urole`, `city`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Administrator', 'Pack N Send', 'Admin', '9227387054', '', '', '0', '_1613583079.png', 'Super Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `pns_menu`
--

CREATE TABLE `pns_menu` (
  `mid` int(11) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `mtitle` varchar(100) NOT NULL,
  `pmenu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_menu`
--

INSERT INTO `pns_menu` (`mid`, `mname`, `mtitle`, `pmenu`) VALUES
(1, 'Dashboard', 'dashboard', '0'),
(2, 'View Stats', 'view_stats', '1'),
(3, 'View Recent', 'view_decent', '1'),
(4, 'Rider', 'rider', '0'),
(5, 'Add Rider', 'add_rider', '4'),
(6, 'Update Rider', 'update_rider', '4'),
(7, 'Remove Rider', 'remove_rider', '4'),
(8, 'View Rider', 'view_rider', '4'),
(9, 'Export Rider', 'export_rider', '4'),
(10, 'Driver', 'driver', '0'),
(11, 'Add Driver', 'add_driver', '10'),
(12, 'Update Driver', 'update_driver', '10'),
(13, 'Remove Driver', 'remove_driver', '10'),
(14, 'View Driver', 'view_driver', '10'),
(15, 'Verify Driver', 'verify_driver', '10'),
(16, 'Export Driver', 'export_driver', '10'),
(17, 'Ride', 'ride', '0'),
(18, 'Add Ride', 'add_ride', '17'),
(19, 'Update Ride', 'update_ride', '17'),
(20, 'Remove Ride', 'remove_ride', '17'),
(21, 'View Ride', 'view_ride', '17'),
(22, 'Export Ride', 'export_ride', '17'),
(23, 'Vehicle', 'vehicle', '0'),
(24, 'Add Vehicle', 'add_vehicle', '23'),
(25, 'Update Vehicle', 'update_vehicle', '23'),
(26, 'Remove Vehicle', 'remove_vehicle', '23'),
(27, 'View Vehicle', 'view_vehicle', '23'),
(28, 'Export Vehicle', 'export_vehicle', '23'),
(29, 'Ambulance', 'ambulance', '0'),
(30, 'Add Ambulance', 'add_ambulance', '29'),
(31, 'Update Ambulance', 'update_ambulance', '29'),
(32, 'Remove Ambulance', 'remove_ambulance', '29'),
(33, 'View Ambulance', 'view_ambulance', '29'),
(34, 'Export Ambulance', 'export_ambulance', '29'),
(35, 'Vehicle Type', 'vehicle_type', '0'),
(36, 'Add Vehicle Type', 'add_vehicle_type', '35'),
(37, 'Update Vehicle Type', 'update_vehicle_type', '35'),
(38, 'Remove Vehicle Type', 'remove_vehicle_type', '35'),
(39, 'View Vehicle Type', 'view_vehicle_type', '35'),
(40, 'Export Vehicle Type', 'export_vehicle_type', '35'),
(41, 'Ambulance Type', 'ambulance_type', '0'),
(42, 'Add Ambulance Type', 'add_ambulance_type', '41'),
(43, 'Update Ambulance Type', 'update_ambulance_type', '41'),
(44, 'Remove Ambulance Type', 'remove_ambulance_type', '41'),
(45, 'View Ambulance Type', 'view_ambulance_type', '41'),
(46, 'Export Ambulance Type', 'export_ambulance_type', '41'),
(47, 'Coupon', 'coupon', '0'),
(48, 'Add Coupon', 'add_coupon', '47'),
(49, 'Update Coupon', 'update_coupon', '47'),
(50, 'Remove Coupon', 'remove_coupon', '47'),
(51, 'View Coupon', 'view_coupon', '47'),
(52, 'Export Coupon', 'export_coupon', '47'),
(53, 'Transaction', 'transaction', '0'),
(54, 'Add Transaction', 'add_transaction', '53'),
(55, 'Update Transaction', 'update_transaction', '53'),
(56, 'Remove Transaction', 'remove_transaction', '53'),
(57, 'View Transaction', 'view_transaction', '53'),
(58, 'Export Transaction', 'export_transaction', '53'),
(59, 'Rating', 'rating', '0'),
(60, 'Add Rating', 'add_rating', '59'),
(61, 'Update Rating', 'update_rating', '59'),
(62, 'Remove Rating', 'remove_rating', '59'),
(63, 'View Rating', 'view_rating', '59'),
(64, 'Export Rating', 'export_rating', '59'),
(65, 'Settings', 'settings', '0'),
(66, 'Admin Settings', 'admin_settings', '65'),
(67, 'State', 'state', '65'),
(68, 'District', 'district', '65'),
(69, 'bank', 'bank', '65'),
(70, 'Rating Type', 'rating_type', '65'),
(71, 'Cancellation Reason', 'cancellation_reason', '65'),
(72, 'Document Type', 'document_type', '65'),
(73, 'Vehicle Company', 'vehicle_company', '65'),
(74, 'Vehicle Model', 'vehicle_model', '65'),
(75, 'Ambulance Model', 'ambulance_model', '65'),
(76, 'Ambulance Facility', 'ambulance_facility', '65'),
(77, 'Fare', 'fare', '0'),
(78, 'Add Fare', 'add_fare', '77'),
(79, 'Update Fare', 'update_fare', '77'),
(80, 'Remove Fare', 'remove_fare', '77'),
(81, 'View Fare', 'view_fare', '77'),
(82, 'Export Fare', 'export_fare', '77'),
(83, 'Team Member', 'team_member', '0'),
(84, 'Add Team Member', 'add_team_member', '83'),
(85, 'Update Team Member', 'update_team_member', '83'),
(86, 'Remove Team Member', 'remove_team_member', '83'),
(87, 'View Team Member', 'view_team_member', '83'),
(88, 'Export Team Member', 'export_team_member', '83'),
(89, 'Notification', 'notification', '0'),
(90, 'Add Notification', 'add_notification', '89'),
(91, 'Remove Notification', 'remove_notification', '89'),
(92, 'View Notification', 'view_notification', '89');

-- --------------------------------------------------------

--
-- Table structure for table `pns_notification_details`
--

CREATE TABLE `pns_notification_details` (
  `id_notification` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `type` varchar(255) DEFAULT NULL,
  `type_id` varchar(255) DEFAULT NULL,
  `id_recepient` varchar(255) DEFAULT NULL,
  `recepient_type` int(11) NOT NULL DEFAULT '0',
  `is_read` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_ride_chat_details`
--

CREATE TABLE `pns_ride_chat_details` (
  `id` int(11) NOT NULL,
  `id_ride` int(11) NOT NULL,
  `ride_owner` int(11) NOT NULL,
  `driver` int(11) NOT NULL,
  `message_by` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_added` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_ride_offers_details`
--

CREATE TABLE `pns_ride_offers_details` (
  `id` int(11) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `source_place_id` varchar(255) DEFAULT NULL,
  `destination_place_id` varchar(255) DEFAULT NULL,
  `total_distance` float DEFAULT NULL,
  `ride_code` varchar(255) DEFAULT NULL,
  `ride_route_image` varchar(255) DEFAULT NULL,
  `car_type` int(11) DEFAULT NULL,
  `car_type_name` varchar(255) DEFAULT NULL,
  `car_price` float DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `price` float DEFAULT NULL,
  `id_car` int(11) NOT NULL DEFAULT '0',
  `ride_owner` int(11) DEFAULT NULL,
  `ride_for_type` varchar(255) DEFAULT 'Self',
  `ride_for_name` varchar(255) DEFAULT NULL,
  `ride_for_mobile` varchar(255) DEFAULT NULL,
  `is_use_wallet_amount` int(11) NOT NULL DEFAULT '0',
  `amount_from_wallet` float DEFAULT NULL,
  `amount_from_other` float DEFAULT NULL,
  `total_amount` varchar(25) NOT NULL DEFAULT '0',
  `per_minute_charge` varchar(25) NOT NULL DEFAULT '0',
  `waiting_charge` varchar(25) NOT NULL DEFAULT '0',
  `estimated_ride_time` varchar(25) DEFAULT '0',
  `total_ride_time` varchar(25) NOT NULL DEFAULT '0',
  `extra_time` varchar(25) NOT NULL DEFAULT '0',
  `waiting_time` varchar(25) NOT NULL DEFAULT '0',
  `payment_mode` varchar(255) NOT NULL DEFAULT 'Cash',
  `id_transaction` int(11) DEFAULT NULL,
  `is_coupon_applied` int(11) NOT NULL DEFAULT '0',
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_discount` float DEFAULT '0',
  `is_driver_accepted` int(11) NOT NULL DEFAULT '0',
  `is_driver_reached` int(11) NOT NULL DEFAULT '0',
  `ride_otp` varchar(25) DEFAULT NULL,
  `is_return_ride` int(11) NOT NULL DEFAULT '0',
  `primary_ride_id` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_ride_started` int(11) NOT NULL DEFAULT '0',
  `is_ride_ended` int(11) NOT NULL DEFAULT '0',
  `reason` varchar(255) DEFAULT NULL,
  `cancel_remark` text,
  `cancel_type` int(11) NOT NULL DEFAULT '0',
  `cancellation_charge` int(11) NOT NULL DEFAULT '0',
  `commission_amount` float DEFAULT NULL,
  `accepted_time` time DEFAULT NULL,
  `arrived_time` time DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `accepted_location` varchar(255) DEFAULT NULL,
  `arrived_location` varchar(255) DEFAULT NULL,
  `start_location` varchar(255) DEFAULT NULL,
  `end_location` varchar(255) DEFAULT NULL,
  `is_schedule_ride` varchar(10) NOT NULL DEFAULT '0',
  `ride_invoice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_ride_offers_details`
--

INSERT INTO `pns_ride_offers_details` (`id`, `source`, `destination`, `city`, `source_place_id`, `destination_place_id`, `total_distance`, `ride_code`, `ride_route_image`, `car_type`, `car_type_name`, `car_price`, `id_driver`, `date`, `time`, `price`, `id_car`, `ride_owner`, `ride_for_type`, `ride_for_name`, `ride_for_mobile`, `is_use_wallet_amount`, `amount_from_wallet`, `amount_from_other`, `total_amount`, `per_minute_charge`, `waiting_charge`, `estimated_ride_time`, `total_ride_time`, `extra_time`, `waiting_time`, `payment_mode`, `id_transaction`, `is_coupon_applied`, `coupon_code`, `coupon_discount`, `is_driver_accepted`, `is_driver_reached`, `ride_otp`, `is_return_ride`, `primary_ride_id`, `date_added`, `status`, `is_ride_started`, `is_ride_ended`, `reason`, `cancel_remark`, `cancel_type`, `cancellation_charge`, `commission_amount`, `accepted_time`, `arrived_time`, `start_time`, `end_time`, `accepted_location`, `arrived_location`, `start_location`, `end_location`, `is_schedule_ride`, `ride_invoice`) VALUES
(1, 'Gaurav Path, Kishan Para, Rajkot, Gujarat 360001, India', 'Rajkot, Gujarat, India', '136', 'ChIJOfKkLiLKWTkR8MIHaGzs1Tk', 'ChIJD98cx4rJWTkRO62Tvs8V3XY', 2.434, 'Gau-Raj (24-02-2021-13:03 PM)', NULL, 10, 'Auto Rickshaw', 0, 1, '2021-02-24', '13:03:23', 0, 1, 1, 'Self', 'M M', '9638527410', 0, 0, 0, '0', '0', '0', '349', '0', '0', '0', 'Cash', 236, 0, '', 0, 0, 0, NULL, 0, 0, '2021-02-24 13:23:40', 4, 0, 0, NULL, NULL, 0, 0, 0, '01:23:50', '01:23:56', '01:23:58', '01:24:01', '37.785834, -122.406417', '', '37.785834,-122.406417', '37.785834,-122.406417', '0', NULL),
(2, 'B/4, Cresent Building, Race Course Rd, Near Kanikas Hotel, Janta Society, Kishan Para, Rajkot, Gujarat 360001, India', 'Porbandar, Gujarat, India', '136', 'ChIJLeCwzCPKWTkRxvM9JxxbAXU', 'ChIJ5fjCUVA0VjkRytib3rhlIZ4', 180.436, 'B/4-Por (24-02-2021-13:24 PM)', NULL, 10, 'Auto Rickshaw', 0, NULL, '2021-02-24', '13:24:05', 0, 0, 72, 'Self', 'M M', '9638527410', 0, 0, 0, '0', '0', '0', '11476', '0', '0', '0', 'Cash', 237, 0, '', 0, 0, 0, NULL, 0, 0, '2021-02-24 13:43:40', 6, 0, 0, '', 'No Driver available.', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pns_ride_passenger`
--

CREATE TABLE `pns_ride_passenger` (
  `id` int(11) NOT NULL,
  `id_ride` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_ride_preference`
--

CREATE TABLE `pns_ride_preference` (
  `id` int(11) NOT NULL,
  `id_ride` int(11) NOT NULL,
  `id_preference` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_ride_rating_details`
--

CREATE TABLE `pns_ride_rating_details` (
  `id` int(11) NOT NULL,
  `id_ride` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `rating_for` varchar(11) NOT NULL,
  `rating_by` varchar(11) NOT NULL,
  `type` varchar(11) NOT NULL DEFAULT '1' COMMENT '0=User 1=Driver',
  `ratings` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_ride_rating_details`
--

INSERT INTO `pns_ride_rating_details` (`id`, `id_ride`, `remarks`, `rating_for`, `rating_by`, `type`, `ratings`, `date_added`, `status`) VALUES
(1, 1, '', '1', '1', '0', 4, '2021-01-30 00:00:00', 1),
(2, 1, '', '1', '1', '1', 4, '2021-01-31 00:00:00', 1),
(3, 1, '', '1', '1', '1', 4, '2021-02-05 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_ride_rating_items`
--

CREATE TABLE `pns_ride_rating_items` (
  `id` int(11) NOT NULL,
  `id_rating` int(11) NOT NULL,
  `rating_type_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `date_added` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_ride_rating_items`
--

INSERT INTO `pns_ride_rating_items` (`id`, `id_rating`, `rating_type_id`, `ratings`, `date_added`, `status`) VALUES
(1, 1, 1, 3, '0000-00-00 00:00:00', 1),
(2, 1, 2, 4, '0000-00-00 00:00:00', 1),
(3, 2, 1, 3, '0000-00-00 00:00:00', 1),
(4, 2, 2, 4, '0000-00-00 00:00:00', 1),
(5, 3, 1, 3, '0000-00-00 00:00:00', 1),
(6, 3, 2, 4, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_ride_rating_type`
--

CREATE TABLE `pns_ride_rating_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '0=User 1=Driver',
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_ride_rating_type`
--

INSERT INTO `pns_ride_rating_type` (`id`, `name`, `type`, `date_added`, `status`) VALUES
(1, 'How Was Condition of car?', 0, '2021-01-20 18:18:37', 1),
(2, 'How Was Behaviour Of Driver', 0, '0000-00-00 00:00:00', 1),
(3, 'How Was Behaviour Of Passenger', 1, '0000-00-00 00:00:00', 1),
(4, 'Was passenger available on time?', 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_role`
--

CREATE TABLE `pns_role` (
  `rid` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `rstatus` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_role`
--

INSERT INTO `pns_role` (`rid`, `uname`, `rname`, `rstatus`) VALUES
(423, 'Team Member', 'dashboard', '1'),
(424, 'Team Member', 'view_stats', '1'),
(425, 'Team Member', 'view_decent', '1'),
(426, 'Team Member', 'rider', '1'),
(427, 'Team Member', 'add_rider', '0'),
(428, 'Team Member', 'update_rider', '0'),
(429, 'Team Member', 'remove_rider', '0'),
(430, 'Team Member', 'view_rider', '1'),
(431, 'Team Member', 'export_rider', '1'),
(432, 'Team Member', 'driver', '1'),
(433, 'Team Member', 'add_driver', '0'),
(434, 'Team Member', 'update_driver', '0'),
(435, 'Team Member', 'remove_driver', '0'),
(436, 'Team Member', 'view_driver', '1'),
(437, 'Team Member', 'verify_driver', '1'),
(438, 'Team Member', 'export_driver', '1'),
(439, 'Team Member', 'ride', '1'),
(440, 'Team Member', 'add_ride', '0'),
(441, 'Team Member', 'update_ride', '0'),
(442, 'Team Member', 'remove_ride', '0'),
(443, 'Team Member', 'view_ride', '1'),
(444, 'Team Member', 'export_ride', '1'),
(445, 'Team Member', 'vehicle', '1'),
(446, 'Team Member', 'add_vehicle', '0'),
(447, 'Team Member', 'update_vehicle', '0'),
(448, 'Team Member', 'remove_vehicle', '0'),
(449, 'Team Member', 'view_vehicle', '1'),
(450, 'Team Member', 'export_vehicle', '1'),
(451, 'Team Member', 'ambulance', '1'),
(452, 'Team Member', 'add_ambulance', '0'),
(453, 'Team Member', 'update_ambulance', '0'),
(454, 'Team Member', 'remove_ambulance', '0'),
(455, 'Team Member', 'view_ambulance', '1'),
(456, 'Team Member', 'export_ambulance', '1'),
(457, 'Team Member', 'vehicle_type', '1'),
(458, 'Team Member', 'add_vehicle_type', '0'),
(459, 'Team Member', 'update_vehicle_type', '0'),
(460, 'Team Member', 'remove_vehicle_type', '0'),
(461, 'Team Member', 'view_vehicle_type', '1'),
(462, 'Team Member', 'export_vehicle_type', '1'),
(463, 'Team Member', 'ambulance_type', '1'),
(464, 'Team Member', 'add_ambulance_type', '0'),
(465, 'Team Member', 'update_ambulance_type', '0'),
(466, 'Team Member', 'remove_ambulance_type', '0'),
(467, 'Team Member', 'view_ambulance_type', '1'),
(468, 'Team Member', 'export_ambulance_type', '1'),
(469, 'Team Member', 'coupon', '1'),
(470, 'Team Member', 'add_coupon', '0'),
(471, 'Team Member', 'update_coupon', '0'),
(472, 'Team Member', 'remove_coupon', '0'),
(473, 'Team Member', 'view_coupon', '1'),
(474, 'Team Member', 'export_coupon', '1'),
(475, 'Team Member', 'transaction', '1'),
(476, 'Team Member', 'add_transaction', '0'),
(477, 'Team Member', 'update_transaction', '0'),
(478, 'Team Member', 'remove_transaction', '0'),
(479, 'Team Member', 'view_transaction', '1'),
(480, 'Team Member', 'export_transaction', '1'),
(481, 'Team Member', 'rating', '1'),
(482, 'Team Member', 'add_rating', '0'),
(483, 'Team Member', 'update_rating', '0'),
(484, 'Team Member', 'remove_rating', '0'),
(485, 'Team Member', 'view_rating', '1'),
(486, 'Team Member', 'export_rating', '1'),
(487, 'Team Member', 'settings', '0'),
(488, 'Team Member', 'admin_settings', '0'),
(489, 'Team Member', 'state', '0'),
(490, 'Team Member', 'district', '0'),
(491, 'Team Member', 'bank', '0'),
(492, 'Team Member', 'rating_type', '0'),
(493, 'Team Member', 'cancellation_reason', '0'),
(494, 'Team Member', 'document_type', '0'),
(495, 'Team Member', 'vehicle_company', '0'),
(496, 'Team Member', 'vehicle_model', '0'),
(497, 'Team Member', 'ambulance_model', '0'),
(498, 'Team Member', 'ambulance_facility', '0'),
(499, 'Team Member', 'fare', '1'),
(500, 'Team Member', 'add_fare', '0'),
(501, 'Team Member', 'update_fare', '0'),
(502, 'Team Member', 'remove_fare', '0'),
(503, 'Team Member', 'view_fare', '1'),
(504, 'Team Member', 'export_fare', '1'),
(505, 'Team Member', 'team_member', '1'),
(506, 'Team Member', 'add_team_member', '1'),
(507, 'Team Member', 'update_team_member', '0'),
(508, 'Team Member', 'remove_team_member', '0'),
(509, 'Team Member', 'view_team_member', '1'),
(510, 'Team Member', 'export_team_member', '1'),
(951, 'Admin', 'dashboard', '0'),
(952, 'Admin', 'view_stats', '0'),
(953, 'Admin', 'view_decent', '0'),
(954, 'Admin', 'rider', '1'),
(955, 'Admin', 'add_rider', '0'),
(956, 'Admin', 'update_rider', '0'),
(957, 'Admin', 'remove_rider', '0'),
(958, 'Admin', 'view_rider', '1'),
(959, 'Admin', 'export_rider', '0'),
(960, 'Admin', 'driver', '1'),
(961, 'Admin', 'add_driver', '0'),
(962, 'Admin', 'update_driver', '0'),
(963, 'Admin', 'remove_driver', '0'),
(964, 'Admin', 'view_driver', '1'),
(965, 'Admin', 'verify_driver', '0'),
(966, 'Admin', 'export_driver', '0'),
(967, 'Admin', 'ride', '0'),
(968, 'Admin', 'add_ride', '0'),
(969, 'Admin', 'update_ride', '0'),
(970, 'Admin', 'remove_ride', '0'),
(971, 'Admin', 'view_ride', '1'),
(972, 'Admin', 'export_ride', '0'),
(973, 'Admin', 'vehicle', '0'),
(974, 'Admin', 'add_vehicle', '0'),
(975, 'Admin', 'update_vehicle', '0'),
(976, 'Admin', 'remove_vehicle', '0'),
(977, 'Admin', 'view_vehicle', '1'),
(978, 'Admin', 'export_vehicle', '0'),
(979, 'Admin', 'ambulance', '0'),
(980, 'Admin', 'add_ambulance', '0'),
(981, 'Admin', 'update_ambulance', '0'),
(982, 'Admin', 'remove_ambulance', '0'),
(983, 'Admin', 'view_ambulance', '0'),
(984, 'Admin', 'export_ambulance', '0'),
(985, 'Admin', 'vehicle_type', '0'),
(986, 'Admin', 'add_vehicle_type', '0'),
(987, 'Admin', 'update_vehicle_type', '0'),
(988, 'Admin', 'remove_vehicle_type', '0'),
(989, 'Admin', 'view_vehicle_type', '0'),
(990, 'Admin', 'export_vehicle_type', '0'),
(991, 'Admin', 'ambulance_type', '0'),
(992, 'Admin', 'add_ambulance_type', '0'),
(993, 'Admin', 'update_ambulance_type', '0'),
(994, 'Admin', 'remove_ambulance_type', '0'),
(995, 'Admin', 'view_ambulance_type', '0'),
(996, 'Admin', 'export_ambulance_type', '0'),
(997, 'Admin', 'coupon', '0'),
(998, 'Admin', 'add_coupon', '0'),
(999, 'Admin', 'update_coupon', '0'),
(1000, 'Admin', 'remove_coupon', '0'),
(1001, 'Admin', 'view_coupon', '0'),
(1002, 'Admin', 'export_coupon', '0'),
(1003, 'Admin', 'transaction', '0'),
(1004, 'Admin', 'add_transaction', '0'),
(1005, 'Admin', 'update_transaction', '0'),
(1006, 'Admin', 'remove_transaction', '0'),
(1007, 'Admin', 'view_transaction', '0'),
(1008, 'Admin', 'export_transaction', '0'),
(1009, 'Admin', 'rating', '0'),
(1010, 'Admin', 'add_rating', '0'),
(1011, 'Admin', 'update_rating', '0'),
(1012, 'Admin', 'remove_rating', '0'),
(1013, 'Admin', 'view_rating', '0'),
(1014, 'Admin', 'export_rating', '0'),
(1015, 'Admin', 'settings', '0'),
(1016, 'Admin', 'admin_settings', '0'),
(1017, 'Admin', 'state', '0'),
(1018, 'Admin', 'district', '0'),
(1019, 'Admin', 'bank', '0'),
(1020, 'Admin', 'rating_type', '0'),
(1021, 'Admin', 'cancellation_reason', '0'),
(1022, 'Admin', 'document_type', '0'),
(1023, 'Admin', 'vehicle_company', '0'),
(1024, 'Admin', 'vehicle_model', '0'),
(1025, 'Admin', 'ambulance_model', '0'),
(1026, 'Admin', 'ambulance_facility', '0'),
(1027, 'Admin', 'fare', '0'),
(1028, 'Admin', 'add_fare', '0'),
(1029, 'Admin', 'update_fare', '0'),
(1030, 'Admin', 'remove_fare', '0'),
(1031, 'Admin', 'view_fare', '0'),
(1032, 'Admin', 'export_fare', '0'),
(1033, 'Admin', 'team_member', '0'),
(1034, 'Admin', 'add_team_member', '0'),
(1035, 'Admin', 'update_team_member', '0'),
(1036, 'Admin', 'remove_team_member', '0'),
(1037, 'Admin', 'view_team_member', '0'),
(1038, 'Admin', 'export_team_member', '0'),
(1479, 'Marketing Manager', 'dashboard', '0'),
(1480, 'Marketing Manager', 'view_stats', '0'),
(1481, 'Marketing Manager', 'view_decent', '0'),
(1482, 'Marketing Manager', 'rider', '0'),
(1483, 'Marketing Manager', 'add_rider', '0'),
(1484, 'Marketing Manager', 'update_rider', '0'),
(1485, 'Marketing Manager', 'remove_rider', '0'),
(1486, 'Marketing Manager', 'view_rider', '0'),
(1487, 'Marketing Manager', 'export_rider', '0'),
(1488, 'Marketing Manager', 'driver', '1'),
(1489, 'Marketing Manager', 'add_driver', '0'),
(1490, 'Marketing Manager', 'update_driver', '0'),
(1491, 'Marketing Manager', 'remove_driver', '0'),
(1492, 'Marketing Manager', 'view_driver', '1'),
(1493, 'Marketing Manager', 'verify_driver', '0'),
(1494, 'Marketing Manager', 'export_driver', '0'),
(1495, 'Marketing Manager', 'ride', '1'),
(1496, 'Marketing Manager', 'add_ride', '0'),
(1497, 'Marketing Manager', 'update_ride', '0'),
(1498, 'Marketing Manager', 'remove_ride', '0'),
(1499, 'Marketing Manager', 'view_ride', '1'),
(1500, 'Marketing Manager', 'export_ride', '0'),
(1501, 'Marketing Manager', 'vehicle', '1'),
(1502, 'Marketing Manager', 'add_vehicle', '0'),
(1503, 'Marketing Manager', 'update_vehicle', '0'),
(1504, 'Marketing Manager', 'remove_vehicle', '0'),
(1505, 'Marketing Manager', 'view_vehicle', '1'),
(1506, 'Marketing Manager', 'export_vehicle', '0'),
(1507, 'Marketing Manager', 'ambulance', '1'),
(1508, 'Marketing Manager', 'add_ambulance', '0'),
(1509, 'Marketing Manager', 'update_ambulance', '0'),
(1510, 'Marketing Manager', 'remove_ambulance', '0'),
(1511, 'Marketing Manager', 'view_ambulance', '1'),
(1512, 'Marketing Manager', 'export_ambulance', '0'),
(1513, 'Marketing Manager', 'vehicle_type', '0'),
(1514, 'Marketing Manager', 'add_vehicle_type', '0'),
(1515, 'Marketing Manager', 'update_vehicle_type', '0'),
(1516, 'Marketing Manager', 'remove_vehicle_type', '0'),
(1517, 'Marketing Manager', 'view_vehicle_type', '0'),
(1518, 'Marketing Manager', 'export_vehicle_type', '0'),
(1519, 'Marketing Manager', 'ambulance_type', '0'),
(1520, 'Marketing Manager', 'add_ambulance_type', '0'),
(1521, 'Marketing Manager', 'update_ambulance_type', '0'),
(1522, 'Marketing Manager', 'remove_ambulance_type', '0'),
(1523, 'Marketing Manager', 'view_ambulance_type', '0'),
(1524, 'Marketing Manager', 'export_ambulance_type', '0'),
(1525, 'Marketing Manager', 'coupon', '0'),
(1526, 'Marketing Manager', 'add_coupon', '0'),
(1527, 'Marketing Manager', 'update_coupon', '0'),
(1528, 'Marketing Manager', 'remove_coupon', '0'),
(1529, 'Marketing Manager', 'view_coupon', '0'),
(1530, 'Marketing Manager', 'export_coupon', '0'),
(1531, 'Marketing Manager', 'transaction', '0'),
(1532, 'Marketing Manager', 'add_transaction', '0'),
(1533, 'Marketing Manager', 'update_transaction', '0'),
(1534, 'Marketing Manager', 'remove_transaction', '0'),
(1535, 'Marketing Manager', 'view_transaction', '0'),
(1536, 'Marketing Manager', 'export_transaction', '0'),
(1537, 'Marketing Manager', 'rating', '0'),
(1538, 'Marketing Manager', 'add_rating', '0'),
(1539, 'Marketing Manager', 'update_rating', '0'),
(1540, 'Marketing Manager', 'remove_rating', '0'),
(1541, 'Marketing Manager', 'view_rating', '0'),
(1542, 'Marketing Manager', 'export_rating', '0'),
(1543, 'Marketing Manager', 'settings', '0'),
(1544, 'Marketing Manager', 'admin_settings', '0'),
(1545, 'Marketing Manager', 'state', '0'),
(1546, 'Marketing Manager', 'district', '0'),
(1547, 'Marketing Manager', 'bank', '0'),
(1548, 'Marketing Manager', 'rating_type', '0'),
(1549, 'Marketing Manager', 'cancellation_reason', '0'),
(1550, 'Marketing Manager', 'document_type', '0'),
(1551, 'Marketing Manager', 'vehicle_company', '0'),
(1552, 'Marketing Manager', 'vehicle_model', '0'),
(1553, 'Marketing Manager', 'ambulance_model', '0'),
(1554, 'Marketing Manager', 'ambulance_facility', '0'),
(1555, 'Marketing Manager', 'fare', '0'),
(1556, 'Marketing Manager', 'add_fare', '0'),
(1557, 'Marketing Manager', 'update_fare', '0'),
(1558, 'Marketing Manager', 'remove_fare', '0'),
(1559, 'Marketing Manager', 'view_fare', '0'),
(1560, 'Marketing Manager', 'export_fare', '0'),
(1561, 'Marketing Manager', 'team_member', '0'),
(1562, 'Marketing Manager', 'add_team_member', '0'),
(1563, 'Marketing Manager', 'update_team_member', '0'),
(1564, 'Marketing Manager', 'remove_team_member', '0'),
(1565, 'Marketing Manager', 'view_team_member', '0'),
(1566, 'Marketing Manager', 'export_team_member', '0'),
(2271, 'Niraj', 'dashboard', '1'),
(2272, 'Niraj', 'view_stats', '1'),
(2273, 'Niraj', 'view_decent', '1'),
(2274, 'Niraj', 'rider', '1'),
(2275, 'Niraj', 'add_rider', '0'),
(2276, 'Niraj', 'update_rider', '0'),
(2277, 'Niraj', 'remove_rider', '0'),
(2278, 'Niraj', 'view_rider', '1'),
(2279, 'Niraj', 'export_rider', '0'),
(2280, 'Niraj', 'driver', '1'),
(2281, 'Niraj', 'add_driver', '0'),
(2282, 'Niraj', 'update_driver', '0'),
(2283, 'Niraj', 'remove_driver', '0'),
(2284, 'Niraj', 'view_driver', '1'),
(2285, 'Niraj', 'verify_driver', '0'),
(2286, 'Niraj', 'export_driver', '0'),
(2287, 'Niraj', 'ride', '1'),
(2288, 'Niraj', 'add_ride', '0'),
(2289, 'Niraj', 'update_ride', '0'),
(2290, 'Niraj', 'remove_ride', '0'),
(2291, 'Niraj', 'view_ride', '1'),
(2292, 'Niraj', 'export_ride', '0'),
(2293, 'Niraj', 'vehicle', '1'),
(2294, 'Niraj', 'add_vehicle', '0'),
(2295, 'Niraj', 'update_vehicle', '0'),
(2296, 'Niraj', 'remove_vehicle', '0'),
(2297, 'Niraj', 'view_vehicle', '1'),
(2298, 'Niraj', 'export_vehicle', '0'),
(2299, 'Niraj', 'ambulance', '1'),
(2300, 'Niraj', 'add_ambulance', '0'),
(2301, 'Niraj', 'update_ambulance', '0'),
(2302, 'Niraj', 'remove_ambulance', '0'),
(2303, 'Niraj', 'view_ambulance', '1'),
(2304, 'Niraj', 'export_ambulance', '0'),
(2305, 'Niraj', 'vehicle_type', '0'),
(2306, 'Niraj', 'add_vehicle_type', '0'),
(2307, 'Niraj', 'update_vehicle_type', '0'),
(2308, 'Niraj', 'remove_vehicle_type', '0'),
(2309, 'Niraj', 'view_vehicle_type', '0'),
(2310, 'Niraj', 'export_vehicle_type', '0'),
(2311, 'Niraj', 'ambulance_type', '0'),
(2312, 'Niraj', 'add_ambulance_type', '0'),
(2313, 'Niraj', 'update_ambulance_type', '0'),
(2314, 'Niraj', 'remove_ambulance_type', '0'),
(2315, 'Niraj', 'view_ambulance_type', '0'),
(2316, 'Niraj', 'export_ambulance_type', '0'),
(2317, 'Niraj', 'coupon', '0'),
(2318, 'Niraj', 'add_coupon', '0'),
(2319, 'Niraj', 'update_coupon', '0'),
(2320, 'Niraj', 'remove_coupon', '0'),
(2321, 'Niraj', 'view_coupon', '0'),
(2322, 'Niraj', 'export_coupon', '0'),
(2323, 'Niraj', 'transaction', '0'),
(2324, 'Niraj', 'add_transaction', '0'),
(2325, 'Niraj', 'update_transaction', '0'),
(2326, 'Niraj', 'remove_transaction', '0'),
(2327, 'Niraj', 'view_transaction', '0'),
(2328, 'Niraj', 'export_transaction', '0'),
(2329, 'Niraj', 'rating', '0'),
(2330, 'Niraj', 'add_rating', '0'),
(2331, 'Niraj', 'update_rating', '0'),
(2332, 'Niraj', 'remove_rating', '0'),
(2333, 'Niraj', 'view_rating', '0'),
(2334, 'Niraj', 'export_rating', '0'),
(2335, 'Niraj', 'settings', '0'),
(2336, 'Niraj', 'admin_settings', '0'),
(2337, 'Niraj', 'state', '0'),
(2338, 'Niraj', 'district', '0'),
(2339, 'Niraj', 'bank', '0'),
(2340, 'Niraj', 'rating_type', '0'),
(2341, 'Niraj', 'cancellation_reason', '0'),
(2342, 'Niraj', 'document_type', '0'),
(2343, 'Niraj', 'vehicle_company', '0'),
(2344, 'Niraj', 'vehicle_model', '0'),
(2345, 'Niraj', 'ambulance_model', '0'),
(2346, 'Niraj', 'ambulance_facility', '0'),
(2347, 'Niraj', 'fare', '0'),
(2348, 'Niraj', 'add_fare', '0'),
(2349, 'Niraj', 'update_fare', '0'),
(2350, 'Niraj', 'remove_fare', '0'),
(2351, 'Niraj', 'view_fare', '0'),
(2352, 'Niraj', 'export_fare', '0'),
(2353, 'Niraj', 'team_member', '1'),
(2354, 'Niraj', 'add_team_member', '0'),
(2355, 'Niraj', 'update_team_member', '0'),
(2356, 'Niraj', 'remove_team_member', '0'),
(2357, 'Niraj', 'view_team_member', '1'),
(2358, 'Niraj', 'export_team_member', '0'),
(2535, 'Associate', 'dashboard', '0'),
(2536, 'Associate', 'view_stats', '0'),
(2537, 'Associate', 'view_decent', '0'),
(2538, 'Associate', 'rider', '1'),
(2539, 'Associate', 'add_rider', '0'),
(2540, 'Associate', 'update_rider', '0'),
(2541, 'Associate', 'remove_rider', '0'),
(2542, 'Associate', 'view_rider', '1'),
(2543, 'Associate', 'export_rider', '1'),
(2544, 'Associate', 'driver', '1'),
(2545, 'Associate', 'add_driver', '0'),
(2546, 'Associate', 'update_driver', '1'),
(2547, 'Associate', 'remove_driver', '0'),
(2548, 'Associate', 'view_driver', '1'),
(2549, 'Associate', 'verify_driver', '1'),
(2550, 'Associate', 'export_driver', '1'),
(2551, 'Associate', 'ride', '1'),
(2552, 'Associate', 'add_ride', '1'),
(2553, 'Associate', 'update_ride', '0'),
(2554, 'Associate', 'remove_ride', '0'),
(2555, 'Associate', 'view_ride', '1'),
(2556, 'Associate', 'export_ride', '1'),
(2557, 'Associate', 'vehicle', '1'),
(2558, 'Associate', 'add_vehicle', '0'),
(2559, 'Associate', 'update_vehicle', '1'),
(2560, 'Associate', 'remove_vehicle', '0'),
(2561, 'Associate', 'view_vehicle', '1'),
(2562, 'Associate', 'export_vehicle', '1'),
(2563, 'Associate', 'ambulance', '1'),
(2564, 'Associate', 'add_ambulance', '0'),
(2565, 'Associate', 'update_ambulance', '1'),
(2566, 'Associate', 'remove_ambulance', '0'),
(2567, 'Associate', 'view_ambulance', '1'),
(2568, 'Associate', 'export_ambulance', '1'),
(2569, 'Associate', 'vehicle_type', '0'),
(2570, 'Associate', 'add_vehicle_type', '0'),
(2571, 'Associate', 'update_vehicle_type', '0'),
(2572, 'Associate', 'remove_vehicle_type', '0'),
(2573, 'Associate', 'view_vehicle_type', '0'),
(2574, 'Associate', 'export_vehicle_type', '0'),
(2575, 'Associate', 'ambulance_type', '0'),
(2576, 'Associate', 'add_ambulance_type', '0'),
(2577, 'Associate', 'update_ambulance_type', '0'),
(2578, 'Associate', 'remove_ambulance_type', '0'),
(2579, 'Associate', 'view_ambulance_type', '0'),
(2580, 'Associate', 'export_ambulance_type', '0'),
(2581, 'Associate', 'coupon', '0'),
(2582, 'Associate', 'add_coupon', '0'),
(2583, 'Associate', 'update_coupon', '0'),
(2584, 'Associate', 'remove_coupon', '0'),
(2585, 'Associate', 'view_coupon', '0'),
(2586, 'Associate', 'export_coupon', '0'),
(2587, 'Associate', 'transaction', '0'),
(2588, 'Associate', 'add_transaction', '0'),
(2589, 'Associate', 'update_transaction', '0'),
(2590, 'Associate', 'remove_transaction', '0'),
(2591, 'Associate', 'view_transaction', '0'),
(2592, 'Associate', 'export_transaction', '0'),
(2593, 'Associate', 'rating', '0'),
(2594, 'Associate', 'add_rating', '0'),
(2595, 'Associate', 'update_rating', '0'),
(2596, 'Associate', 'remove_rating', '0'),
(2597, 'Associate', 'view_rating', '0'),
(2598, 'Associate', 'export_rating', '0'),
(2599, 'Associate', 'settings', '0'),
(2600, 'Associate', 'admin_settings', '0'),
(2601, 'Associate', 'state', '0'),
(2602, 'Associate', 'district', '0'),
(2603, 'Associate', 'bank', '0'),
(2604, 'Associate', 'rating_type', '0'),
(2605, 'Associate', 'cancellation_reason', '0'),
(2606, 'Associate', 'document_type', '0'),
(2607, 'Associate', 'vehicle_company', '0'),
(2608, 'Associate', 'vehicle_model', '0'),
(2609, 'Associate', 'ambulance_model', '0'),
(2610, 'Associate', 'ambulance_facility', '0'),
(2611, 'Associate', 'fare', '0'),
(2612, 'Associate', 'add_fare', '0'),
(2613, 'Associate', 'update_fare', '0'),
(2614, 'Associate', 'remove_fare', '0'),
(2615, 'Associate', 'view_fare', '0'),
(2616, 'Associate', 'export_fare', '0'),
(2617, 'Associate', 'team_member', '1'),
(2618, 'Associate', 'add_team_member', '0'),
(2619, 'Associate', 'update_team_member', '0'),
(2620, 'Associate', 'remove_team_member', '0'),
(2621, 'Associate', 'view_team_member', '1'),
(2622, 'Associate', 'export_team_member', '0'),
(2799, 'vishal', 'dashboard', '1'),
(2800, 'vishal', 'view_stats', '1'),
(2801, 'vishal', 'view_decent', '1'),
(2802, 'vishal', 'rider', '1'),
(2803, 'vishal', 'add_rider', '1'),
(2804, 'vishal', 'update_rider', '1'),
(2805, 'vishal', 'remove_rider', '1'),
(2806, 'vishal', 'view_rider', '1'),
(2807, 'vishal', 'export_rider', '1'),
(2808, 'vishal', 'driver', '1'),
(2809, 'vishal', 'add_driver', '1'),
(2810, 'vishal', 'update_driver', '1'),
(2811, 'vishal', 'remove_driver', '0'),
(2812, 'vishal', 'view_driver', '1'),
(2813, 'vishal', 'verify_driver', '0'),
(2814, 'vishal', 'export_driver', '1'),
(2815, 'vishal', 'ride', '1'),
(2816, 'vishal', 'add_ride', '1'),
(2817, 'vishal', 'update_ride', '0'),
(2818, 'vishal', 'remove_ride', '0'),
(2819, 'vishal', 'view_ride', '1'),
(2820, 'vishal', 'export_ride', '1'),
(2821, 'vishal', 'vehicle', '1'),
(2822, 'vishal', 'add_vehicle', '1'),
(2823, 'vishal', 'update_vehicle', '1'),
(2824, 'vishal', 'remove_vehicle', '0'),
(2825, 'vishal', 'view_vehicle', '1'),
(2826, 'vishal', 'export_vehicle', '1'),
(2827, 'vishal', 'ambulance', '1'),
(2828, 'vishal', 'add_ambulance', '1'),
(2829, 'vishal', 'update_ambulance', '0'),
(2830, 'vishal', 'remove_ambulance', '0'),
(2831, 'vishal', 'view_ambulance', '1'),
(2832, 'vishal', 'export_ambulance', '0'),
(2833, 'vishal', 'vehicle_type', '0'),
(2834, 'vishal', 'add_vehicle_type', '0'),
(2835, 'vishal', 'update_vehicle_type', '0'),
(2836, 'vishal', 'remove_vehicle_type', '0'),
(2837, 'vishal', 'view_vehicle_type', '0'),
(2838, 'vishal', 'export_vehicle_type', '0'),
(2839, 'vishal', 'ambulance_type', '0'),
(2840, 'vishal', 'add_ambulance_type', '0'),
(2841, 'vishal', 'update_ambulance_type', '0'),
(2842, 'vishal', 'remove_ambulance_type', '0'),
(2843, 'vishal', 'view_ambulance_type', '0'),
(2844, 'vishal', 'export_ambulance_type', '0'),
(2845, 'vishal', 'coupon', '0'),
(2846, 'vishal', 'add_coupon', '0'),
(2847, 'vishal', 'update_coupon', '0'),
(2848, 'vishal', 'remove_coupon', '0'),
(2849, 'vishal', 'view_coupon', '0'),
(2850, 'vishal', 'export_coupon', '0'),
(2851, 'vishal', 'transaction', '0'),
(2852, 'vishal', 'add_transaction', '0'),
(2853, 'vishal', 'update_transaction', '0'),
(2854, 'vishal', 'remove_transaction', '0'),
(2855, 'vishal', 'view_transaction', '0'),
(2856, 'vishal', 'export_transaction', '0'),
(2857, 'vishal', 'rating', '0'),
(2858, 'vishal', 'add_rating', '0'),
(2859, 'vishal', 'update_rating', '0'),
(2860, 'vishal', 'remove_rating', '0'),
(2861, 'vishal', 'view_rating', '0'),
(2862, 'vishal', 'export_rating', '0'),
(2863, 'vishal', 'settings', '0'),
(2864, 'vishal', 'admin_settings', '0'),
(2865, 'vishal', 'state', '0'),
(2866, 'vishal', 'district', '0'),
(2867, 'vishal', 'bank', '0'),
(2868, 'vishal', 'rating_type', '0'),
(2869, 'vishal', 'cancellation_reason', '0'),
(2870, 'vishal', 'document_type', '0'),
(2871, 'vishal', 'vehicle_company', '0'),
(2872, 'vishal', 'vehicle_model', '0'),
(2873, 'vishal', 'ambulance_model', '0'),
(2874, 'vishal', 'ambulance_facility', '0'),
(2875, 'vishal', 'fare', '1'),
(2876, 'vishal', 'add_fare', '0'),
(2877, 'vishal', 'update_fare', '0'),
(2878, 'vishal', 'remove_fare', '0'),
(2879, 'vishal', 'view_fare', '1'),
(2880, 'vishal', 'export_fare', '0'),
(2881, 'vishal', 'team_member', '1'),
(2882, 'vishal', 'add_team_member', '1'),
(2883, 'vishal', 'update_team_member', '1'),
(2884, 'vishal', 'remove_team_member', '0'),
(2885, 'vishal', 'view_team_member', '1'),
(2886, 'vishal', 'export_team_member', '1'),
(2979, 'Super Admin', 'dashboard', '1'),
(2980, 'Super Admin', 'view_stats', '1'),
(2981, 'Super Admin', 'view_decent', '1'),
(2982, 'Super Admin', 'rider', '1'),
(2983, 'Super Admin', 'add_rider', '1'),
(2984, 'Super Admin', 'update_rider', '1'),
(2985, 'Super Admin', 'remove_rider', '1'),
(2986, 'Super Admin', 'view_rider', '1'),
(2987, 'Super Admin', 'export_rider', '1'),
(2988, 'Super Admin', 'driver', '1'),
(2989, 'Super Admin', 'add_driver', '1'),
(2990, 'Super Admin', 'update_driver', '1'),
(2991, 'Super Admin', 'remove_driver', '1'),
(2992, 'Super Admin', 'view_driver', '1'),
(2993, 'Super Admin', 'verify_driver', '1'),
(2994, 'Super Admin', 'export_driver', '1'),
(2995, 'Super Admin', 'ride', '1'),
(2996, 'Super Admin', 'add_ride', '1'),
(2997, 'Super Admin', 'update_ride', '1'),
(2998, 'Super Admin', 'remove_ride', '1'),
(2999, 'Super Admin', 'view_ride', '1'),
(3000, 'Super Admin', 'export_ride', '1'),
(3001, 'Super Admin', 'vehicle', '1'),
(3002, 'Super Admin', 'add_vehicle', '1'),
(3003, 'Super Admin', 'update_vehicle', '1'),
(3004, 'Super Admin', 'remove_vehicle', '1'),
(3005, 'Super Admin', 'view_vehicle', '1'),
(3006, 'Super Admin', 'export_vehicle', '1'),
(3007, 'Super Admin', 'ambulance', '1'),
(3008, 'Super Admin', 'add_ambulance', '1'),
(3009, 'Super Admin', 'update_ambulance', '1'),
(3010, 'Super Admin', 'remove_ambulance', '1'),
(3011, 'Super Admin', 'view_ambulance', '1'),
(3012, 'Super Admin', 'export_ambulance', '1'),
(3013, 'Super Admin', 'vehicle_type', '1'),
(3014, 'Super Admin', 'add_vehicle_type', '1'),
(3015, 'Super Admin', 'update_vehicle_type', '1'),
(3016, 'Super Admin', 'remove_vehicle_type', '1'),
(3017, 'Super Admin', 'view_vehicle_type', '1'),
(3018, 'Super Admin', 'export_vehicle_type', '1'),
(3019, 'Super Admin', 'ambulance_type', '1'),
(3020, 'Super Admin', 'add_ambulance_type', '1'),
(3021, 'Super Admin', 'update_ambulance_type', '1'),
(3022, 'Super Admin', 'remove_ambulance_type', '1'),
(3023, 'Super Admin', 'view_ambulance_type', '1'),
(3024, 'Super Admin', 'export_ambulance_type', '1'),
(3025, 'Super Admin', 'coupon', '1'),
(3026, 'Super Admin', 'add_coupon', '1'),
(3027, 'Super Admin', 'update_coupon', '1'),
(3028, 'Super Admin', 'remove_coupon', '1'),
(3029, 'Super Admin', 'view_coupon', '1'),
(3030, 'Super Admin', 'export_coupon', '1'),
(3031, 'Super Admin', 'transaction', '1'),
(3032, 'Super Admin', 'add_transaction', '1'),
(3033, 'Super Admin', 'update_transaction', '1'),
(3034, 'Super Admin', 'remove_transaction', '1'),
(3035, 'Super Admin', 'view_transaction', '1'),
(3036, 'Super Admin', 'export_transaction', '1'),
(3037, 'Super Admin', 'rating', '1'),
(3038, 'Super Admin', 'add_rating', '1'),
(3039, 'Super Admin', 'update_rating', '1'),
(3040, 'Super Admin', 'remove_rating', '1'),
(3041, 'Super Admin', 'view_rating', '1'),
(3042, 'Super Admin', 'export_rating', '1'),
(3043, 'Super Admin', 'settings', '1'),
(3044, 'Super Admin', 'admin_settings', '1'),
(3045, 'Super Admin', 'state', '1'),
(3046, 'Super Admin', 'district', '1'),
(3047, 'Super Admin', 'bank', '1'),
(3048, 'Super Admin', 'rating_type', '1'),
(3049, 'Super Admin', 'cancellation_reason', '1'),
(3050, 'Super Admin', 'document_type', '1'),
(3051, 'Super Admin', 'vehicle_company', '1'),
(3052, 'Super Admin', 'vehicle_model', '1'),
(3053, 'Super Admin', 'ambulance_model', '1'),
(3054, 'Super Admin', 'ambulance_facility', '1'),
(3055, 'Super Admin', 'fare', '1'),
(3056, 'Super Admin', 'add_fare', '1'),
(3057, 'Super Admin', 'update_fare', '1'),
(3058, 'Super Admin', 'remove_fare', '1'),
(3059, 'Super Admin', 'view_fare', '1'),
(3060, 'Super Admin', 'export_fare', '1'),
(3061, 'Super Admin', 'team_member', '1'),
(3062, 'Super Admin', 'add_team_member', '1'),
(3063, 'Super Admin', 'update_team_member', '1'),
(3064, 'Super Admin', 'remove_team_member', '1'),
(3065, 'Super Admin', 'view_team_member', '1'),
(3066, 'Super Admin', 'export_team_member', '1'),
(3067, 'Super Admin', 'notification', '1'),
(3068, 'Super Admin', 'add_notification', '1'),
(3069, 'Super Admin', 'remove_notification', '1'),
(3070, 'Super Admin', 'view_notification', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pns_settings`
--

CREATE TABLE `pns_settings` (
  `sid` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `svalue` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_settings`
--

INSERT INTO `pns_settings` (`sid`, `sname`, `svalue`) VALUES
(1, 'refer_by_bonus', '10'),
(2, 'refer_for_bonus', '5'),
(3, 'driver_cancellation_charge', '10'),
(4, 'driver_ride_earnings', '25'),
(5, 'driver_wallet_limit', '75'),
(6, 'rider_wallet_limit', '75'),
(7, 'allowed_waiting_time', '5'),
(8, 'gst', '5'),
(9, 'min_pickup_charge_range', '5'),
(10, 'max_pickup_charge_range', '8');

-- --------------------------------------------------------

--
-- Table structure for table `pns_state_details`
--

CREATE TABLE `pns_state_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_state_details`
--

INSERT INTO `pns_state_details` (`id`, `name`, `status`) VALUES
(1, 'Andhra Pradesh', 1),
(2, 'Assam', 1),
(3, 'Bihar', 1),
(4, 'Goa', 1),
(5, 'Chattisgarh', 1),
(6, 'Delhi', 1),
(7, 'Gujarat', 1),
(8, 'Daman and Diu', 1),
(9, 'Dadra and Nagar Hav.', 1),
(10, 'Haryana', 1),
(11, 'Himachal Pradesh', 1),
(12, 'Jammu and Kashmir', 1),
(13, 'Jharkhand', 1),
(14, 'Karnataka', 1),
(15, 'Kerala', 1),
(16, 'Lakshadweep', 1),
(17, 'Madhya Pradesh', 1),
(18, 'Maharashtra', 1),
(19, 'Manipur', 1),
(20, 'Mizoram', 1),
(21, 'Nagaland', 1),
(22, 'Sikkim', 1),
(23, 'Tripura', 1),
(24, 'Arunachal Pradesh', 1),
(25, 'Megalaya', 1),
(26, 'Odisha', 1),
(27, 'Punjab', 1),
(28, 'Chandigarh', 1),
(29, 'Rajasthan', 1),
(30, 'Tamil Nadu', 1),
(31, 'Pondicherry', 1),
(32, 'Telangana', 1),
(33, 'Uttar Pradesh', 1),
(34, 'Uttarakhand', 1),
(35, 'West Bengal', 1),
(36, 'Andaman and Nico.In.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_team_member`
--

CREATE TABLE `pns_team_member` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `auto_id` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `manager_id` varchar(100) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `emailid` varchar(100) DEFAULT NULL,
  `alaternate_mobile` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `utype` varchar(100) DEFAULT NULL,
  `address` text,
  `state` varchar(11) DEFAULT NULL,
  `district` varchar(11) DEFAULT NULL,
  `pincode` varchar(25) DEFAULT NULL,
  `assigned_state` varchar(11) DEFAULT NULL,
  `assigned_district` varchar(11) DEFAULT NULL,
  `assigned_pincode` varchar(25) DEFAULT NULL,
  `commission` float DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_ifsc` varchar(100) DEFAULT NULL,
  `bank_account` varchar(100) DEFAULT NULL,
  `other_document` varchar(255) DEFAULT NULL,
  `aadhar_card_document` varchar(255) DEFAULT NULL,
  `pan_card_document` varchar(255) DEFAULT NULL,
  `bank_document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pns_transaction`
--

CREATE TABLE `pns_transaction` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `tansaction_type` varchar(200) DEFAULT NULL,
  `transaction_category` varchar(255) DEFAULT NULL,
  `transaction_for` int(11) DEFAULT NULL,
  `transaction_by` int(11) NOT NULL DEFAULT '0',
  `wallet_amount` float NOT NULL DEFAULT '0',
  `other_amount` float NOT NULL DEFAULT '0',
  `transaction_amount` float DEFAULT NULL,
  `transaction_currancy` varchar(255) DEFAULT 'INR',
  `tax_amount` float DEFAULT NULL,
  `gateway_fees` float DEFAULT NULL,
  `transaction_fees` float NOT NULL,
  `payement_gateway` varchar(50) DEFAULT NULL,
  `transaction_ref_id` varchar(255) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_status` int(11) NOT NULL DEFAULT '1',
  `payment_status` int(11) NOT NULL DEFAULT '1',
  `utype` int(11) NOT NULL DEFAULT '0' COMMENT '0=Passenger 1=Driver',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_transaction`
--

INSERT INTO `pns_transaction` (`id`, `id_category`, `tansaction_type`, `transaction_category`, `transaction_for`, `transaction_by`, `wallet_amount`, `other_amount`, `transaction_amount`, `transaction_currancy`, `tax_amount`, `gateway_fees`, `transaction_fees`, `payement_gateway`, `transaction_ref_id`, `transaction_date`, `transaction_status`, `payment_status`, `utype`, `description`) VALUES
(1, 1, 'Debit', 'Create Ride', 1, 1, 0, 0, 0, 'INR', 0, 0, 0, '', '', '2021-02-24 13:23:40', 1, 1, 0, NULL),
(2, 2, 'Debit', 'Create Ride', 1, 1, 0, 0, 0, 'INR', 0, 0, 0, '', '', '2021-02-24 13:43:40', 1, 1, 0, NULL),
(3, 1, 'Credit', 'Ride Cancellation Refund', 1, 1, 0, 0, 0, 'INR', 0, 0, 0, 'Wallet', '', '2021-02-24 13:44:17', 1, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pns_user_preference`
--

CREATE TABLE `pns_user_preference` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_preference` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_user_preference`
--

INSERT INTO `pns_user_preference` (`id`, `id_user`, `id_preference`, `date_added`) VALUES
(28, 28, 2, '2020-10-17 16:16:31'),
(29, 28, 1, '2020-10-17 16:16:31'),
(30, 28, 3, '2020-10-17 16:16:31'),
(43, 27, 2, '2020-11-03 12:20:58'),
(44, 27, 1, '2020-11-03 12:20:58'),
(48, 9, 2, '2020-11-12 12:25:55'),
(49, 9, 1, '2020-11-12 12:25:55'),
(50, 9, 3, '2020-11-12 12:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `pns_user_wallet`
--

CREATE TABLE `pns_user_wallet` (
  `id_wallet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `utype` int(11) NOT NULL DEFAULT '0' COMMENT '0=User 1 = Driver',
  `balance` double NOT NULL DEFAULT '0',
  `currancy` varchar(255) NOT NULL DEFAULT 'INR',
  `currancy_code` varchar(25) NOT NULL DEFAULT 'Rs.',
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns_user_wallet`
--

INSERT INTO `pns_user_wallet` (`id_wallet`, `id_user`, `utype`, `balance`, `currancy`, `currancy_code`, `date_updated`) VALUES
(1, 1, 0, 0, 'INR', 'Rs.', '2021-02-23 12:09:37'),
(2, 1, 1, 50, 'INR', 'Rs.', '2021-02-23 12:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `pns_user_wallet_summary`
--

CREATE TABLE `pns_user_wallet_summary` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `utype` int(11) NOT NULL DEFAULT '0' COMMENT '0=User 1 = Driver',
  `amount` double NOT NULL DEFAULT '0',
  `Transaction_type` varchar(255) NOT NULL DEFAULT 'Credit',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_added_facilities`
--

CREATE TABLE `pns_vehicle_added_facilities` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_category`
--

CREATE TABLE `pns_vehicle_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_vehicle_category`
--

INSERT INTO `pns_vehicle_category` (`id`, `name`, `date_added`, `status`) VALUES
(1, 'Car', '0000-00-00 00:00:00', 1),
(2, 'Ambulance', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_company`
--

CREATE TABLE `pns_vehicle_company` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_vehicle_company`
--

INSERT INTO `pns_vehicle_company` (`id`, `category`, `name`, `date_added`, `status`) VALUES
(5, 2, 'Tata', '0000-00-00 00:00:00', 1),
(12, 1, 'SUV', '2021-01-30 00:00:00', 1),
(15, 5, 'SUV', '2021-01-30 00:00:00', 1),
(16, 5, 'OMNI', '2021-01-30 00:00:00', 1),
(20, 6, 'Tempo Traveller', '2021-01-30 00:00:00', 1),
(23, 1, 'Tempo Traveller', '2021-01-30 00:00:00', 1),
(26, 5, 'Tempo Traveller', '2021-01-30 00:00:00', 1),
(27, 8, 'Ford', '2021-02-14 00:00:00', 1),
(28, 4, 'Ford', '2021-02-14 00:00:00', 1),
(29, 3, 'Ford', '2021-02-14 00:00:00', 1),
(30, 8, 'Honda', '2021-02-14 00:00:00', 1),
(31, 4, 'Honda', '2021-02-14 00:00:00', 1),
(32, 3, 'Honda', '2021-02-14 00:00:00', 1),
(33, 8, 'Hyundai', '2021-02-14 00:00:00', 1),
(34, 4, 'Hyundai', '2021-02-14 00:00:00', 1),
(35, 3, 'Hyundai', '2021-02-14 00:00:00', 1),
(36, 8, 'Jeep', '2021-02-14 00:00:00', 1),
(37, 4, 'Jeep', '2021-02-14 00:00:00', 1),
(38, 8, 'Kia', '2021-02-14 00:00:00', 1),
(39, 3, 'Kia', '2021-02-14 00:00:00', 1),
(40, 8, 'Mahindra', '2021-02-14 00:00:00', 1),
(41, 4, 'Mahindra', '2021-02-14 00:00:00', 1),
(42, 3, 'Mahindra', '2021-02-14 00:00:00', 1),
(43, 8, 'Maruti Suzuki', '2021-02-14 00:00:00', 1),
(44, 4, 'Maruti Suzuki', '2021-02-14 00:00:00', 1),
(45, 3, 'Maruti Suzuki', '2021-02-14 00:00:00', 1),
(46, 8, 'Nissan', '2021-02-14 00:00:00', 1),
(47, 4, 'Nissan', '2021-02-14 00:00:00', 1),
(48, 8, 'Renault', '2021-02-14 00:00:00', 1),
(49, 3, 'Renault', '2021-02-14 00:00:00', 1),
(50, 8, 'Skoda', '2021-02-14 00:00:00', 1),
(51, 4, 'Skoda', '2021-02-14 00:00:00', 1),
(52, 3, 'Skoda', '2021-02-14 00:00:00', 1),
(53, 8, 'Tata', '2021-02-14 00:00:00', 1),
(54, 4, 'Tata', '2021-02-14 00:00:00', 1),
(55, 3, 'Tata', '2021-02-14 00:00:00', 1),
(56, 8, 'Toyota', '2021-02-14 00:00:00', 1),
(57, 4, 'Toyota', '2021-02-14 00:00:00', 1),
(58, 3, 'Toyota', '2021-02-14 00:00:00', 1),
(59, 8, 'Volkswagen', '2021-02-14 00:00:00', 1),
(60, 4, 'Volkswagen', '2021-02-14 00:00:00', 1),
(61, 3, 'Volkswagen', '2021-02-14 00:00:00', 1),
(62, 6, 'SUV', '2021-02-14 00:00:00', 1),
(63, 6, 'OMNI', '2021-02-14 00:00:00', 1),
(64, 1, 'OMNI', '2021-02-15 00:00:00', 1),
(65, 9, 'ATHER', '2021-02-16 00:00:00', 1),
(66, 9, 'AVON', '2021-02-16 00:00:00', 1),
(67, 9, 'BAJAJ', '2021-02-16 00:00:00', 1),
(68, 9, 'BENELLI', '2021-02-16 00:00:00', 1),
(69, 9, 'HERO', '2021-02-16 00:00:00', 1),
(70, 9, 'HERO ELECTRIC', '2021-02-16 00:00:00', 1),
(71, 9, 'HONDA', '2021-02-16 00:00:00', 1),
(72, 9, 'JAWA', '2021-02-16 00:00:00', 1),
(73, 9, 'KAWASAKI', '2021-02-16 00:00:00', 1),
(74, 9, 'KTM', '2021-02-16 00:00:00', 1),
(75, 9, 'MAHINDRA', '2021-02-16 00:00:00', 1),
(76, 9, 'ROYAL ENFIELD', '2021-02-16 00:00:00', 1),
(77, 9, 'SUZUKI', '2021-02-16 00:00:00', 1),
(78, 9, 'TRIUMPH', '2021-02-16 00:00:00', 1),
(79, 9, 'TVS', '2021-02-16 00:00:00', 1),
(80, 9, 'YAMAHA', '2021-02-16 00:00:00', 1),
(82, 10, 'Other', '2021-02-24 00:00:00', 1),
(83, 11, 'Other', '2021-02-24 00:00:00', 1),
(84, 13, 'Other', '2021-02-24 00:00:00', 1),
(85, 1, 'Bike', '2021-02-25 00:00:00', 1),
(86, 14, 'Others', '2021-02-25 00:00:00', 1),
(87, 15, 'Others', '2021-03-07 00:00:00', 0),
(88, 16, 'Others', '2021-03-07 00:00:00', 0),
(89, 17, 'Others', '2021-03-07 00:00:00', 0),
(90, 18, 'Others', '2021-03-07 00:00:00', 0),
(91, 19, 'Others', '2021-03-07 00:00:00', 0),
(92, 20, 'Others', '2021-03-07 00:00:00', 0),
(93, 21, 'Others', '2021-03-07 00:00:00', 0),
(94, 22, 'Others', '2021-03-07 00:00:00', 0),
(95, 23, 'Others', '2021-03-07 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_details`
--

CREATE TABLE `pns_vehicle_details` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `model` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `owner` varchar(25) DEFAULT NULL,
  `state_id` varchar(25) DEFAULT NULL,
  `city_id` varchar(25) NOT NULL DEFAULT '0',
  `city_name` varchar(255) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `is_avail` int(11) DEFAULT NULL,
  `price_per_km` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `reference_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_vehicle_details`
--

INSERT INTO `pns_vehicle_details` (`id`, `category`, `sub_category`, `company`, `model`, `user_id`, `owner`, `state_id`, `city_id`, `city_name`, `state_name`, `is_avail`, `price_per_km`, `name`, `reference_code`, `image`, `date_added`, `status`) VALUES
(1, 1, 8, 40, 60, 1, NULL, '13', '214', 'EAST SINGHBHUM', 'Jharkhand', 1, '0', 'JH05BM5696', 'VISH', '', '2021-02-23 12:34:29', 1),
(2, 1, 9, 67, 149, 1, NULL, '18', '373', 'Nagpur', 'Maharashtra', 1, '0', 'MH40AE2845', 'VRT1701210031', '', '2021-02-24 18:07:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_facilities`
--

CREATE TABLE `pns_vehicle_facilities` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_cat` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_fare_charge_items`
--

CREATE TABLE `pns_vehicle_fare_charge_items` (
  `id` int(11) NOT NULL,
  `id_fare` int(11) NOT NULL DEFAULT '0',
  `from_time` varchar(25) DEFAULT NULL,
  `to_time` varchar(25) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_fare_details`
--

CREATE TABLE `pns_vehicle_fare_details` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `vehicle_type` int(11) NOT NULL DEFAULT '0',
  `state` int(11) NOT NULL DEFAULT '0',
  `district` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(255) DEFAULT NULL,
  `vehicle_type_name` varchar(255) DEFAULT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `district_name` varchar(255) DEFAULT NULL,
  `price_per_km` float NOT NULL DEFAULT '0',
  `cancellation_charge_amount` float NOT NULL DEFAULT '0',
  `cancellation_charge_type` int(11) NOT NULL DEFAULT '0' COMMENT '0=Fixed Amount 1=Percentage',
  `admin_commission_amount` float NOT NULL DEFAULT '0',
  `admin_commission_type` int(11) NOT NULL DEFAULT '0' COMMENT '0=Fixed Amount 1=Percentage',
  `base_fare_amount` float NOT NULL DEFAULT '0',
  `min_charge_amount` float NOT NULL DEFAULT '0',
  `per_minute_charge` float NOT NULL DEFAULT '0',
  `waiting_charge` float NOT NULL DEFAULT '0',
  `ride_search_charge` float NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_fare_items`
--

CREATE TABLE `pns_vehicle_fare_items` (
  `id` int(11) NOT NULL,
  `id_fare` int(11) NOT NULL DEFAULT '0',
  `min_km` float NOT NULL DEFAULT '0',
  `max_km` float NOT NULL DEFAULT '0',
  `amount` float NOT NULL DEFAULT '0',
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_model`
--

CREATE TABLE `pns_vehicle_model` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_cat` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_vehicle_model`
--

INSERT INTO `pns_vehicle_model` (`id`, `category`, `sub_cat`, `company`, `name`, `date_added`, `status`) VALUES
(1, 1, 8, 53, 'Nexon', '0000-00-00 00:00:00', 1),
(2, 1, 4, 54, 'Tigor', '0000-00-00 00:00:00', 1),
(4, 1, 8, 33, 'i20', '0000-00-00 00:00:00', 1),
(5, 1, 8, 33, 'Grand i10', '0000-00-00 00:00:00', 1),
(6, 1, 8, 43, 'Wagon R', '2021-01-29 00:00:00', 1),
(15, 1, 8, 27, 'Mustang', '2021-02-16 00:00:00', 1),
(16, 1, 8, 27, 'Figo', '2021-02-16 00:00:00', 1),
(17, 1, 8, 27, 'Freestyle', '2021-02-16 00:00:00', 1),
(18, 1, 4, 28, 'Ecosport', '2021-02-16 00:00:00', 1),
(19, 1, 4, 28, 'Aspire', '2021-02-16 00:00:00', 1),
(20, 1, 3, 29, 'Endeavour', '2021-02-16 00:00:00', 1),
(21, 1, 8, 30, 'Civic', '2021-02-16 00:00:00', 1),
(22, 1, 8, 30, 'Accord Hybrid', '2021-02-16 00:00:00', 1),
(23, 1, 8, 30, 'Jazz', '2021-02-16 00:00:00', 1),
(24, 1, 8, 30, 'Brio', '2021-02-16 00:00:00', 1),
(25, 1, 8, 30, 'Cr-V', '2021-02-16 00:00:00', 1),
(26, 1, 4, 31, 'City', '2021-02-16 00:00:00', 1),
(27, 1, 4, 31, 'Amaze', '2021-02-16 00:00:00', 1),
(28, 1, 3, 32, 'Brv', '2021-02-16 00:00:00', 1),
(29, 1, 3, 32, 'Wr-V', '2021-02-16 00:00:00', 1),
(30, 1, 8, 33, 'Santro', '2021-02-16 00:00:00', 1),
(31, 1, 8, 33, 'Kona Electric', '2021-02-16 00:00:00', 1),
(32, 1, 8, 33, 'Grand I10 Prime', '2021-02-16 00:00:00', 1),
(33, 1, 8, 33, 'Grand I10 Nios', '2021-02-16 00:00:00', 1),
(34, 1, 8, 33, 'Elantra', '2021-02-16 00:00:00', 1),
(35, 1, 8, 33, 'Aura', '2021-02-16 00:00:00', 1),
(36, 1, 4, 34, 'Xcent', '2021-02-16 00:00:00', 1),
(37, 1, 4, 34, 'Verna', '2021-02-16 00:00:00', 1),
(38, 1, 4, 34, 'Xcent Prime', '2021-02-16 00:00:00', 1),
(39, 1, 3, 35, 'Tucson', '2021-02-16 00:00:00', 1),
(40, 1, 3, 35, 'Creta', '2021-02-16 00:00:00', 1),
(41, 1, 3, 35, 'Venue', '2021-02-16 00:00:00', 1),
(42, 1, 8, 36, 'Compass', '2021-02-16 00:00:00', 1),
(43, 1, 8, 36, 'Compass Trailhawk', '2021-02-16 00:00:00', 1),
(44, 1, 4, 37, 'Grand Cherokee', '2021-02-16 00:00:00', 1),
(45, 1, 4, 37, 'Wrangler', '2021-02-16 00:00:00', 1),
(46, 1, 8, 38, 'Carnival', '2021-02-16 00:00:00', 1),
(47, 1, 3, 39, 'Seltos', '2021-02-16 00:00:00', 1),
(48, 1, 3, 39, 'Sonet', '2021-02-16 00:00:00', 1),
(49, 1, 8, 46, 'Terrano', '2021-02-16 00:00:00', 1),
(50, 1, 8, 46, 'Micra', '2021-02-16 00:00:00', 1),
(51, 1, 8, 46, 'Micra Active', '2021-02-16 00:00:00', 1),
(52, 1, 4, 47, 'Sunny', '2021-02-16 00:00:00', 1),
(53, 1, 4, 47, 'GTR', '2021-02-16 00:00:00', 1),
(54, 1, 4, 47, 'Kicks', '2021-02-16 00:00:00', 1),
(55, 1, 8, 48, 'Lodgy', '2021-02-16 00:00:00', 1),
(56, 1, 3, 49, 'Triber', '2021-02-16 00:00:00', 1),
(57, 1, 8, 48, 'Kwid', '2021-02-16 00:00:00', 1),
(58, 1, 3, 49, 'Duster', '2021-02-16 00:00:00', 1),
(59, 1, 3, 49, 'Captur', '2021-02-16 00:00:00', 1),
(60, 1, 8, 40, 'Kuv100 Nxt', '2021-02-16 00:00:00', 1),
(61, 1, 8, 40, 'Nuvo Sport', '2021-02-16 00:00:00', 1),
(62, 1, 8, 40, 'E2O Plus', '2021-02-16 00:00:00', 1),
(63, 1, 4, 41, 'Verito', '2021-02-16 00:00:00', 1),
(64, 1, 4, 41, 'Verito Vibe', '2021-02-16 00:00:00', 1),
(65, 1, 4, 41, 'E Verito', '2021-02-16 00:00:00', 1),
(66, 1, 3, 42, 'Marazzo', '2021-02-16 00:00:00', 1),
(67, 1, 3, 42, 'Thar', '2021-02-16 00:00:00', 1),
(68, 1, 3, 42, 'Bolero', '2021-02-16 00:00:00', 1),
(69, 1, 3, 42, 'Xylo', '2021-02-16 00:00:00', 1),
(70, 1, 3, 42, 'Scorpio', '2021-02-16 00:00:00', 1),
(71, 1, 3, 42, 'Xuv300', '2021-02-16 00:00:00', 1),
(72, 1, 3, 42, 'Xuv500', '2021-02-16 00:00:00', 1),
(73, 1, 3, 42, 'Tuv300 Plus', '2021-02-16 00:00:00', 1),
(74, 1, 3, 42, 'Alturas G4', '2021-02-16 00:00:00', 1),
(75, 1, 3, 42, 'Tuv300', '2021-02-16 00:00:00', 1),
(76, 1, 3, 42, 'Bolero Power Plus', '2021-02-16 00:00:00', 1),
(77, 1, 8, 43, 'Omni', '2021-02-16 00:00:00', 1),
(78, 1, 8, 43, 'Eeco', '2021-02-16 00:00:00', 1),
(79, 1, 8, 43, 'Alto K10', '2021-02-16 00:00:00', 1),
(80, 1, 8, 43, 'Celerio', '2021-02-16 00:00:00', 1),
(81, 1, 8, 43, 'S-Cross', '2021-02-16 00:00:00', 1),
(82, 1, 8, 43, 'Celerio X', '2021-02-16 00:00:00', 1),
(83, 1, 8, 43, 'Swift', '2021-02-16 00:00:00', 1),
(84, 1, 8, 43, 'Celerio Tour', '2021-02-16 00:00:00', 1),
(85, 1, 8, 43, 'Alto 800 Tour', '2021-02-16 00:00:00', 1),
(86, 1, 8, 43, 'Ignis', '2021-02-16 00:00:00', 1),
(87, 1, 8, 43, 'Alto', '2021-02-16 00:00:00', 1),
(88, 1, 8, 43, 'S-Presso', '2021-02-16 00:00:00', 1),
(89, 1, 4, 44, 'Swift Dzire', '2021-02-16 00:00:00', 1),
(90, 1, 4, 44, 'Baleno RS', '2021-02-16 00:00:00', 1),
(91, 1, 4, 44, 'Dzire Tour', '2021-02-16 00:00:00', 1),
(92, 1, 4, 44, 'Ciaz', '2021-02-16 00:00:00', 1),
(93, 1, 4, 44, 'Baleno', '2021-02-16 00:00:00', 1),
(94, 1, 3, 45, 'Gypsy', '2021-02-16 00:00:00', 1),
(95, 1, 3, 45, 'Ertiga', '2021-02-16 00:00:00', 1),
(96, 1, 3, 45, 'Vitara Brezza', '2021-02-16 00:00:00', 1),
(97, 1, 3, 45, 'Xl6', '2021-02-16 00:00:00', 1),
(98, 1, 8, 50, 'Monte Carlo', '2021-02-16 00:00:00', 1),
(99, 1, 8, 50, 'Kodiaq Scout', '2021-02-16 00:00:00', 1),
(100, 1, 4, 51, 'Rapide', '2021-02-16 00:00:00', 1),
(101, 1, 4, 51, 'Octavia', '2021-02-16 00:00:00', 1),
(102, 1, 4, 51, 'Superb', '2021-02-16 00:00:00', 1),
(103, 1, 4, 51, 'Superb Outline', '2021-02-16 00:00:00', 1),
(104, 1, 3, 52, 'Kodiaq', '2021-02-16 00:00:00', 1),
(105, 1, 8, 53, 'Nano Genx', '2021-02-16 00:00:00', 1),
(106, 1, 8, 53, 'Bolt', '2021-02-16 00:00:00', 1),
(107, 1, 8, 36, 'Tiago Nrg', '2021-02-16 00:00:00', 1),
(108, 1, 8, 53, 'Altroz', '2021-02-16 00:00:00', 1),
(109, 1, 8, 53, 'Tiago', '2021-02-16 00:00:00', 1),
(110, 1, 4, 54, 'Zest', '2021-02-16 00:00:00', 1),
(111, 1, 4, 54, 'Hexa', '2021-02-16 00:00:00', 1),
(112, 1, 3, 55, 'Safari Storme', '2021-02-16 00:00:00', 1),
(113, 1, 3, 55, 'Harrier', '2021-02-16 00:00:00', 1),
(114, 1, 3, 55, 'Winger', '2021-02-16 00:00:00', 1),
(115, 1, 8, 56, 'Prius', '2021-02-16 00:00:00', 1),
(116, 1, 8, 56, 'Glanza', '2021-02-16 00:00:00', 1),
(117, 1, 4, 57, 'Etios Liva', '2021-02-16 00:00:00', 1),
(118, 1, 4, 57, 'Platinum Etios', '2021-02-16 00:00:00', 1),
(119, 1, 4, 57, 'Corolla Altis', '2021-02-16 00:00:00', 1),
(120, 1, 4, 57, 'Etios Cross', '2021-02-16 00:00:00', 1),
(121, 1, 4, 57, 'Camry', '2021-02-16 00:00:00', 1),
(122, 1, 4, 57, 'Yaris', '2021-02-16 00:00:00', 1),
(123, 1, 3, 58, 'Fortuner', '2021-02-16 00:00:00', 1),
(124, 1, 3, 58, 'Land Cruiser', '2021-02-16 00:00:00', 1),
(125, 1, 3, 58, 'Innova', '2021-02-16 00:00:00', 1),
(126, 1, 3, 58, 'Innova Crysta', '2021-02-16 00:00:00', 1),
(127, 1, 3, 58, 'Land Cruiser Prado', '2021-02-16 00:00:00', 1),
(128, 1, 8, 59, 'Passata', '2021-02-16 00:00:00', 1),
(129, 1, 8, 59, 'Ameo', '2021-02-16 00:00:00', 1),
(130, 1, 8, 59, 'Polo', '2021-02-16 00:00:00', 1),
(131, 1, 4, 60, 'Vento', '2021-02-16 00:00:00', 1),
(132, 1, 3, 61, 'Tiguan', '2021-02-16 00:00:00', 1),
(133, 1, 8, 33, 'i20 Active', '2021-02-16 00:00:00', 1),
(134, 1, 4, 54, 'Tigor Ev', '2021-02-16 00:00:00', 1),
(135, 1, 9, 65, '340', '2021-02-16 00:00:00', 1),
(136, 1, 9, 65, '450', '2021-02-16 00:00:00', 1),
(137, 1, 9, 65, '450X', '2021-02-16 00:00:00', 1),
(138, 1, 9, 66, 'E-STAR', '2021-02-16 00:00:00', 1),
(139, 1, 9, 66, 'E-BIKE VX', '2021-02-16 00:00:00', 1),
(140, 1, 9, 66, 'E-PLUS', '2021-02-16 00:00:00', 1),
(141, 1, 9, 66, 'E-LITE', '2021-02-16 00:00:00', 1),
(142, 1, 9, 66, 'E-SCOOT', '2021-02-16 00:00:00', 1),
(143, 1, 9, 66, 'E-MATE', '2021-02-16 00:00:00', 1),
(144, 1, 9, 66, 'E-BIKE', '2021-02-16 00:00:00', 1),
(145, 1, 9, 67, 'AVENGER', '2021-02-16 00:00:00', 1),
(146, 1, 9, 67, 'PLATINA', '2021-02-16 00:00:00', 1),
(147, 1, 9, 67, 'PULSAR 150', '2021-02-16 00:00:00', 1),
(148, 1, 9, 67, 'PULSAR NS200', '2021-02-16 00:00:00', 1),
(149, 1, 9, 67, 'DISCOVER', '2021-02-16 00:00:00', 1),
(150, 1, 9, 67, 'DOMINAR 400', '2021-02-16 00:00:00', 1),
(151, 1, 9, 67, 'CT100', '2021-02-16 00:00:00', 1),
(152, 1, 9, 67, 'V', '2021-02-16 00:00:00', 1),
(153, 1, 9, 67, 'PULSAR 160NS', '2021-02-16 00:00:00', 1),
(154, 1, 9, 67, 'PLATINA 110', '2021-02-16 00:00:00', 1),
(155, 1, 9, 67, 'PULSAR 180F', '2021-02-16 00:00:00', 1),
(156, 1, 9, 67, 'AVENGER STREET 160', '2021-02-16 00:00:00', 1),
(157, 1, 9, 67, 'PLATINA 110 H-GEAR', '2021-02-16 00:00:00', 1),
(158, 1, 9, 67, 'PULSAR 125', '2021-02-16 00:00:00', 1),
(159, 1, 9, 67, 'CHETAK ELECTRIC', '2021-02-16 00:00:00', 1),
(160, 1, 9, 67, 'PULSAR 200F', '2021-02-16 00:00:00', 1),
(161, 1, 9, 67, 'PULSAR RS200', '2021-02-16 00:00:00', 1),
(162, 1, 9, 68, 'TNT 300', '2021-02-16 00:00:00', 1),
(163, 1, 9, 68, 'TNT 600', '2021-02-16 00:00:00', 1),
(164, 1, 9, 67, 'TORNADO 302R', '2021-02-16 00:00:00', 1),
(165, 1, 9, 67, 'TRK 502', '2021-02-16 00:00:00', 1),
(166, 1, 9, 68, 'IMPERIALE 400', '2021-02-16 00:00:00', 1),
(167, 1, 9, 68, 'LEONCINO SCRAMBLER', '2021-02-16 00:00:00', 1),
(168, 1, 9, 68, 'TRK 502X', '2021-02-16 00:00:00', 1),
(169, 1, 9, 68, 'LEONCINO 250', '2021-02-16 00:00:00', 1),
(170, 1, 9, 69, 'GLAMOUR', '2021-02-16 00:00:00', 1),
(171, 1, 9, 69, 'HF DAWN', '2021-02-16 00:00:00', 1),
(172, 1, 9, 69, 'HF DELUXE BS6', '2021-02-16 00:00:00', 1),
(173, 1, 9, 69, 'KARIZMA ZMR', '2021-02-16 00:00:00', 1),
(174, 1, 9, 69, 'MAESTRO EDGE', '2021-02-16 00:00:00', 1),
(175, 1, 9, 69, 'PASSION', '2021-02-16 00:00:00', 1),
(176, 1, 9, 69, 'PASSION X PRO', '2021-02-16 00:00:00', 1),
(177, 1, 9, 69, 'PLEASURE', '2021-02-16 00:00:00', 1),
(178, 1, 9, 69, 'SUPER SPLENDOR', '2021-02-16 00:00:00', 1),
(179, 1, 9, 69, 'ACHIEVER 150', '2021-02-16 00:00:00', 1),
(180, 1, 9, 69, 'SPLENDOR +', '2021-02-16 00:00:00', 1),
(181, 1, 9, 69, 'SPLENDOR ISMART', '2021-02-16 00:00:00', 1),
(182, 1, 9, 69, 'SPLENDOR', '2021-02-16 00:00:00', 1),
(183, 1, 9, 69, 'XTREME SPORTS', '2021-02-16 00:00:00', 1),
(184, 1, 9, 69, 'DUET', '2021-02-16 00:00:00', 1),
(185, 1, 9, 69, 'PASSION PRO I3S', '2021-02-16 00:00:00', 1),
(186, 1, 9, 69, 'HF DELUXE I3S BS6', '2021-02-16 00:00:00', 1),
(187, 1, 9, 69, 'XPULSE 200', '2021-02-16 00:00:00', 1),
(188, 1, 9, 69, 'XTREME 200R', '2021-02-16 00:00:00', 1),
(189, 1, 9, 69, 'DESTINI 125', '2021-02-16 00:00:00', 1),
(190, 1, 9, 69, 'XTREME 200S', '2021-02-16 00:00:00', 1),
(191, 1, 9, 69, 'XPULSE 200T', '2021-02-16 00:00:00', 1),
(192, 1, 9, 69, 'MAESTRO EDGE 125', '2021-02-16 00:00:00', 1),
(193, 1, 9, 69, 'PLEASURE+ 110 BS6', '2021-02-16 00:00:00', 1),
(194, 1, 9, 69, 'NEW SUPER SPLENDOR', '2021-02-16 00:00:00', 1),
(195, 1, 9, 69, 'SPLENDOR ISMART BS6', '2021-02-16 00:00:00', 1),
(196, 1, 9, 70, 'CRUZ', '2021-02-16 00:00:00', 1),
(197, 1, 9, 70, 'OPTIMA PLUS', '2021-02-16 00:00:00', 1),
(198, 1, 9, 70, 'WAVE DX', '2021-02-16 00:00:00', 1),
(199, 1, 9, 70, 'PHOTON', '2021-02-16 00:00:00', 1),
(200, 1, 9, 70, 'E-SPRINT', '2021-02-16 00:00:00', 1),
(201, 1, 9, 70, 'DASH', '2021-02-16 00:00:00', 1),
(202, 1, 9, 70, 'AVIOR', '2021-02-16 00:00:00', 1),
(203, 1, 9, 70, 'NYX', '2021-02-16 00:00:00', 1),
(204, 1, 9, 70, 'FLASH', '2021-02-16 00:00:00', 1),
(205, 1, 9, 71, 'ACTIVA-I', '2021-02-16 00:00:00', 1),
(206, 1, 9, 71, 'AVIATOR', '2021-02-16 00:00:00', 1),
(207, 1, 9, 71, 'CB SHINE', '2021-02-16 00:00:00', 1),
(208, 1, 9, 71, 'CB UNICORN 150', '2021-02-16 00:00:00', 1),
(209, 1, 9, 71, 'CBR 1000RR FIREBLADE', '2021-02-16 00:00:00', 1),
(210, 1, 9, 71, 'CBR 250R', '2021-02-16 00:00:00', 1),
(211, 1, 9, 71, 'DIO', '2021-02-16 00:00:00', 1),
(212, 1, 9, 71, 'DREAM NEO', '2021-02-16 00:00:00', 1),
(213, 1, 9, 71, 'DREAM YUGA', '2021-02-16 00:00:00', 1),
(214, 1, 9, 71, 'ACTIVA 125', '2021-02-16 00:00:00', 1),
(215, 1, 9, 71, 'CD 110 DREAM DX', '2021-02-16 00:00:00', 1),
(216, 1, 9, 71, 'CBR 650R', '2021-02-16 00:00:00', 1),
(217, 1, 9, 71, 'CB UNICORN 160', '2021-02-16 00:00:00', 1),
(218, 1, 9, 71, 'GOLD WING', '2021-02-16 00:00:00', 1),
(219, 1, 9, 71, 'LIVO', '2021-02-16 00:00:00', 1),
(220, 1, 9, 71, 'CB HORNET 160R', '2021-02-16 00:00:00', 1),
(221, 1, 9, 71, 'CB SHINE SP', '2021-02-16 00:00:00', 1),
(222, 1, 9, 71, 'NAVI', '2021-02-16 00:00:00', 1),
(223, 1, 9, 71, 'AFRICA TWIN', '2021-02-16 00:00:00', 1),
(224, 1, 9, 71, 'CLIQ', '2021-02-16 00:00:00', 1),
(225, 1, 9, 71, 'GRAZIA', '2021-02-16 00:00:00', 1),
(226, 1, 9, 71, 'XBLADE', '2021-02-16 00:00:00', 1),
(227, 1, 9, 71, 'ACTIVA 5G', '2021-02-16 00:00:00', 1),
(228, 1, 9, 71, 'CB300R', '2021-02-16 00:00:00', 1),
(229, 1, 9, 71, 'ACTIVA 125 FI BS6', '2021-02-16 00:00:00', 1),
(230, 1, 9, 71, 'SP 125 BS6', '2021-02-16 00:00:00', 1),
(231, 1, 9, 71, 'ACTIVA 6G BS6', '2021-02-16 00:00:00', 1),
(232, 1, 9, 72, 'FORTY TWO', '2021-02-16 00:00:00', 1),
(233, 1, 9, 72, '300', '2021-02-16 00:00:00', 1),
(234, 1, 9, 72, 'PERAK', '2021-02-16 00:00:00', 1),
(235, 1, 9, 73, 'NINJA', '2021-02-16 00:00:00', 1),
(236, 1, 9, 73, 'VERSYS 1000', '2021-02-16 00:00:00', 1),
(237, 1, 9, 73, 'VERSYS 650', '2021-02-16 00:00:00', 1),
(238, 1, 9, 73, 'ZX-6R', '2021-02-16 00:00:00', 1),
(239, 1, 9, 73, 'KLX 110', '2021-02-16 00:00:00', 1),
(240, 1, 9, 73, 'VULCAN S', '2021-02-16 00:00:00', 1),
(241, 1, 9, 73, 'KX250', '2021-02-16 00:00:00', 1),
(242, 1, 9, 73, 'KLX 140', '2021-02-16 00:00:00', 1),
(243, 1, 9, 73, 'NINJA 400', '2021-02-16 00:00:00', 1),
(244, 1, 9, 73, 'VERSYS X-300', '2021-02-16 00:00:00', 1),
(245, 1, 9, 73, 'NINJA H2 SX SE', '2021-02-16 00:00:00', 1),
(246, 1, 9, 73, 'KX450', '2021-02-16 00:00:00', 1),
(247, 1, 9, 73, 'KLX450R', '2021-02-16 00:00:00', 1),
(248, 1, 9, 73, 'KLX 140G [2019]', '2021-02-16 00:00:00', 1),
(249, 1, 9, 73, 'W800 STREET', '2021-02-16 00:00:00', 1),
(250, 1, 9, 74, 'DUKE 200', '2021-02-16 00:00:00', 1),
(251, 1, 9, 74, '390 DUKE ABS', '2021-02-16 00:00:00', 1),
(252, 1, 9, 74, 'RC 200', '2021-02-16 00:00:00', 1),
(253, 1, 9, 74, 'RC 390', '2021-02-16 00:00:00', 1),
(254, 1, 9, 74, 'DUKE 250', '2021-02-16 00:00:00', 1),
(255, 1, 9, 74, '390 ADVENTURE', '2021-02-16 00:00:00', 1),
(256, 1, 9, 74, '790 DUKE', '2021-02-16 00:00:00', 1),
(257, 1, 9, 74, 'DUKE 125', '2021-02-16 00:00:00', 1),
(258, 1, 9, 74, 'RC 125', '2021-02-16 00:00:00', 1),
(259, 1, 9, 75, 'CENTURO', '2021-02-16 00:00:00', 1),
(260, 1, 9, 75, 'MOJO', '2021-02-16 00:00:00', 1),
(261, 1, 9, 75, 'GUSTO', '2021-02-16 00:00:00', 1),
(262, 1, 9, 75, 'GUSTO 125', '2021-02-16 00:00:00', 1),
(263, 1, 9, 76, 'BULLET', '2021-02-16 00:00:00', 1),
(264, 1, 9, 76, 'BULLET 500', '2021-02-16 00:00:00', 1),
(265, 1, 9, 76, 'CLASSIC 350', '2021-02-16 00:00:00', 1),
(266, 1, 9, 76, 'CLASSIC 500', '2021-02-16 00:00:00', 1),
(267, 1, 9, 76, 'CLASSIC CHROME', '2021-02-16 00:00:00', 1),
(268, 1, 9, 76, 'THUNDERBIRD', '2021-02-16 00:00:00', 1),
(269, 1, 9, 76, 'HIMALAYAN', '2021-02-16 00:00:00', 1),
(270, 1, 9, 76, 'CLASSIC SQUADRON BLUE', '2021-02-16 00:00:00', 1),
(271, 1, 9, 76, 'BULLES ES', '2021-02-16 00:00:00', 1),
(272, 1, 9, 76, 'INTERCEPTOR 650 BS6', '2021-02-16 00:00:00', 1),
(273, 1, 9, 76, 'CONTINENTAL GT 650 BS6', '2021-02-16 00:00:00', 1),
(274, 1, 9, 76, 'THUNDERBIRD 500X', '2021-02-16 00:00:00', 1),
(275, 1, 9, 76, 'THUNDERBIRD 350X', '2021-02-16 00:00:00', 1),
(276, 1, 9, 76, 'CLASSIC 350 SIGNALS', '2021-02-16 00:00:00', 1),
(277, 1, 9, 76, 'TRIALS 350', '2021-02-16 00:00:00', 1),
(278, 1, 9, 76, 'TRIALS 500', '2021-02-16 00:00:00', 1),
(279, 1, 9, 76, 'CLASSIC DESERT STORM', '2021-02-16 00:00:00', 1),
(280, 1, 9, 76, 'BULLET 350', '2021-02-16 00:00:00', 1),
(281, 1, 9, 77, 'ACCESS 125', '2021-02-16 00:00:00', 1),
(282, 1, 9, 77, 'ACCESS 125 (SE)', '2021-02-16 00:00:00', 1),
(283, 1, 9, 77, 'HAYATE EP', '2021-02-16 00:00:00', 1),
(284, 1, 9, 77, 'GSX-R1000', '2021-02-16 00:00:00', 1),
(285, 1, 9, 77, 'V-STORM 1000', '2021-02-16 00:00:00', 1),
(286, 1, 9, 77, 'HAYABUSA', '2021-02-16 00:00:00', 1),
(287, 1, 9, 77, 'INTRUDER M1800R', '2021-02-16 00:00:00', 1),
(288, 1, 9, 77, 'GIXXER', '2021-02-16 00:00:00', 1),
(289, 1, 9, 77, 'LETS', '2021-02-16 00:00:00', 1),
(290, 1, 9, 77, 'GIXXER SF [2019]', '2021-02-16 00:00:00', 1),
(291, 1, 9, 77, 'GSX-S1000', '2021-02-16 00:00:00', 1),
(292, 1, 9, 77, 'GIXXER SF FI (ABS)', '2021-02-16 00:00:00', 1),
(293, 1, 9, 77, 'GIXXER SP', '2021-02-16 00:00:00', 1),
(294, 1, 9, 77, 'GIXXER SF SP', '2021-02-16 00:00:00', 1),
(295, 1, 9, 77, 'INTRUDER 150', '2021-02-16 00:00:00', 1),
(296, 1, 9, 77, 'GSX-S750', '2021-02-16 00:00:00', 1),
(297, 1, 9, 77, 'BURGMAN STREET', '2021-02-16 00:00:00', 1),
(298, 1, 9, 77, 'INTRUDER 150 SP', '2021-02-16 00:00:00', 1),
(299, 1, 9, 77, 'RMZ250', '2021-02-16 00:00:00', 1),
(300, 1, 9, 77, 'RMZ450', '2021-02-16 00:00:00', 1),
(301, 1, 9, 77, 'V STORM 650 XT', '2021-02-16 00:00:00', 1),
(302, 1, 9, 77, 'GIXXER [2019]', '2021-02-16 00:00:00', 1),
(303, 1, 9, 77, 'DR-Z50', '2021-02-16 00:00:00', 1),
(304, 1, 9, 77, 'GIXXER SF 250', '2021-02-16 00:00:00', 1),
(305, 1, 9, 77, 'GIXXER 250', '2021-02-16 00:00:00', 1),
(306, 1, 9, 78, 'TIGER 800', '2021-02-16 00:00:00', 1),
(307, 1, 9, 78, 'TIGER EXPLORER', '2021-02-16 00:00:00', 1),
(308, 1, 9, 78, 'BONNEVILE T100', '2021-02-16 00:00:00', 1),
(309, 1, 9, 78, 'ROCKET III ROADSTER', '2021-02-16 00:00:00', 1),
(310, 1, 9, 78, 'THUNDERBIRD STORM', '2021-02-16 00:00:00', 1),
(311, 1, 9, 78, 'SPEED TRIPLE ABS', '2021-02-16 00:00:00', 1),
(312, 1, 9, 78, 'STREET TRIPLE', '2021-02-16 00:00:00', 1),
(313, 1, 9, 78, 'DAYTONA 675', '2021-02-16 00:00:00', 1),
(314, 1, 9, 78, 'THUNDERBIRD LT', '2021-02-16 00:00:00', 1),
(315, 1, 9, 78, 'TIGER 800XR', '2021-02-16 00:00:00', 1),
(316, 1, 9, 78, 'STREET TWIN', '2021-02-16 00:00:00', 1),
(317, 1, 9, 78, 'BONNEVILLE T120', '2021-02-16 00:00:00', 1),
(318, 1, 9, 78, 'THRUXTON R', '2021-02-16 00:00:00', 1),
(319, 1, 9, 78, 'BONNEVILLE BOBBER', '2021-02-16 00:00:00', 1),
(320, 1, 9, 78, 'STREET SCRAMBLER', '2021-02-16 00:00:00', 1),
(321, 1, 9, 78, 'SPEEDMASTER', '2021-02-16 00:00:00', 1),
(322, 1, 9, 78, 'TIGER 1200', '2021-02-16 00:00:00', 1),
(323, 1, 9, 78, 'SCRAMBLER 1200', '2021-02-16 00:00:00', 1),
(324, 1, 9, 78, 'SPEED TWIN', '2021-02-16 00:00:00', 1),
(325, 1, 9, 79, 'APACHE RTR 160 BS6', '2021-02-16 00:00:00', 1),
(326, 1, 9, 79, 'APACHE RTR 180', '2021-02-16 00:00:00', 1),
(327, 1, 9, 79, 'APACHE RTR 180 ABS', '2021-02-16 00:00:00', 1),
(328, 1, 9, 79, 'JUPITER', '2021-02-16 00:00:00', 1),
(329, 1, 9, 79, 'SCOOTY PEP+', '2021-02-16 00:00:00', 1),
(330, 1, 9, 79, 'STAR CITY PLUS BS6', '2021-02-16 00:00:00', 1),
(331, 1, 9, 79, 'SPORT', '2021-02-16 00:00:00', 1),
(332, 1, 9, 79, 'WEGO', '2021-02-16 00:00:00', 1),
(333, 1, 9, 79, 'APACHE', '2021-02-16 00:00:00', 1),
(334, 1, 9, 79, 'ZEST', '2021-02-16 00:00:00', 1),
(335, 1, 9, 79, 'VICTOR', '2021-02-16 00:00:00', 1),
(336, 1, 9, 79, 'APACHE RTR 200 4V', '2021-02-16 00:00:00', 1),
(337, 1, 9, 79, 'APACHE RR 310', '2021-02-16 00:00:00', 1),
(338, 1, 9, 79, 'NTORQ 125', '2021-02-16 00:00:00', 1),
(339, 1, 9, 79, 'APACHE RTR 160 4V BS6', '2021-02-16 00:00:00', 1),
(340, 1, 9, 79, 'RADEON', '2021-02-16 00:00:00', 1),
(341, 1, 9, 79, 'XL100', '2021-02-16 00:00:00', 1),
(342, 1, 9, 79, 'TVS APACHE RTR 200 FI E100', '2021-02-16 00:00:00', 1),
(343, 1, 9, 79, 'IQUBE', '2021-02-16 00:00:00', 1),
(344, 1, 9, 80, 'RAY', '2021-02-16 00:00:00', 1),
(345, 1, 9, 80, 'YZF R1', '2021-02-16 00:00:00', 1),
(346, 1, 9, 80, 'YZF R15', '2021-02-16 00:00:00', 1),
(347, 1, 9, 80, 'FAZER', '2021-02-16 00:00:00', 1),
(348, 1, 9, 80, 'SZ-RR', '2021-02-16 00:00:00', 1),
(349, 1, 9, 80, 'CYGNUS ALPHA', '2021-02-16 00:00:00', 1),
(350, 1, 9, 80, 'YZF R3', '2021-02-16 00:00:00', 1),
(351, 1, 9, 80, 'SALULTO', '2021-02-16 00:00:00', 1),
(352, 1, 9, 80, 'FASCINO', '2021-02-16 00:00:00', 1),
(353, 1, 9, 80, 'MT-09', '2021-02-16 00:00:00', 1),
(354, 1, 9, 80, 'FZ25', '2021-02-16 00:00:00', 1),
(355, 1, 9, 80, 'FAZER 25', '2021-02-16 00:00:00', 1),
(356, 1, 9, 80, 'SALUTO RX', '2021-02-16 00:00:00', 1),
(357, 1, 9, 80, 'YZF R15 V3', '2021-02-16 00:00:00', 1),
(358, 1, 9, 80, 'MT-15', '2021-02-16 00:00:00', 1),
(359, 1, 9, 80, 'FZ VERSION 3.0', '2021-02-16 00:00:00', 1),
(360, 1, 9, 80, 'FZ-S VERSION 3.0', '2021-02-16 00:00:00', 1),
(361, 1, 10, 82, 'Other', '2021-02-24 00:00:00', 1),
(362, 1, 11, 83, 'Other', '2021-02-24 00:00:00', 1),
(366, 2, 14, 86, 'Others', '2021-03-07 00:00:00', 1),
(367, 2, 15, 87, 'Others', '2021-03-07 00:00:00', 1),
(368, 2, 16, 88, 'Others', '2021-03-07 00:00:00', 1),
(369, 2, 17, 89, 'Others', '2021-03-07 00:00:00', 1),
(370, 2, 18, 90, 'Others', '2021-03-07 00:00:00', 1),
(371, 2, 19, 91, 'Others', '2021-03-07 00:00:00', 1),
(372, 2, 20, 92, 'Others', '2021-03-07 00:00:00', 1),
(373, 2, 21, 93, 'Others', '2021-03-07 00:00:00', 1),
(374, 2, 22, 94, 'Others', '2021-03-07 00:00:00', 1),
(375, 2, 23, 95, 'Others', '2021-03-07 00:00:00', 1),
(376, 1, 4, 54, 'Indigo', '2021-03-09 00:00:00', 1),
(377, 1, 8, 53, 'Indica', '2021-03-09 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pns_vehicle_sub_category`
--

CREATE TABLE `pns_vehicle_sub_category` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pns_vehicle_sub_category`
--

INSERT INTO `pns_vehicle_sub_category` (`id`, `category`, `name`, `price`, `image`, `date_added`, `status`) VALUES
(3, 1, 'SUV', 25, '_1614531376.png', '2021-01-20 16:11:32', 1),
(4, 1, 'Sedan', 15, '_1614531348.png', '2021-01-20 16:11:32', 1),
(8, 1, 'Hatchback', 25, '_1614531324.png', '0000-00-00 00:00:00', 1),
(9, 1, 'Bike', 10, '_1614531517.png', '0000-00-00 00:00:00', 1),
(10, 1, 'Auto Rickshaw', 9, '_1614428166.png', '0000-00-00 00:00:00', 1),
(11, 1, 'E-Rickshaw', 7, '_1614428266.png', '0000-00-00 00:00:00', 1),
(14, 2, 'Bike_Basic', 0, '_1615109819.png', NULL, 1),
(15, 2, 'Tempo Traveller_Basic', 0, '_1615109882.png', NULL, 1),
(16, 2, 'Tempo Traveller_Emergency', 0, '_1615110067.png', NULL, 1),
(17, 2, 'Tempo Traveller_Mortuary', 0, '_1615110087.png', NULL, 1),
(18, 2, 'SUV_Basic', 0, '_1615110161.png', NULL, 1),
(19, 2, 'SUV_Emergency', 0, '_1615110181.png', NULL, 1),
(20, 2, 'SUV_Mortuary', 0, '_1615110196.png', NULL, 1),
(21, 2, 'OMNI_Basic', 0, '_1615110212.png', NULL, 1),
(22, 2, 'OMNI_Emergency', 0, '_1615110254.png', NULL, 1),
(23, 2, 'OMNI_Mortuary', 0, '_1615110454.png', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pns_wallet_transaction`
--

CREATE TABLE `pns_wallet_transaction` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `tansaction_type` varchar(200) DEFAULT NULL,
  `transaction_category` varchar(255) DEFAULT NULL,
  `transaction_for` int(11) DEFAULT NULL,
  `transaction_by` int(11) NOT NULL DEFAULT '0',
  `transaction_amount` float DEFAULT NULL,
  `transaction_currancy` varchar(255) DEFAULT 'INR',
  `tax_amount` float DEFAULT NULL,
  `gateway_fees` float DEFAULT NULL,
  `transaction_fees` float NOT NULL,
  `payement_gateway` varchar(50) DEFAULT NULL,
  `transaction_ref_id` varchar(255) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `transaction_status` int(11) NOT NULL DEFAULT '1',
  `payment_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pns_about_page_details`
--
ALTER TABLE `pns_about_page_details`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `pns_bank_details`
--
ALTER TABLE `pns_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_cancel_ride_reason`
--
ALTER TABLE `pns_cancel_ride_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_car_brand`
--
ALTER TABLE `pns_car_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_car_details`
--
ALTER TABLE `pns_car_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_car_modal`
--
ALTER TABLE `pns_car_modal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_car_type`
--
ALTER TABLE `pns_car_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_close_account_reason`
--
ALTER TABLE `pns_close_account_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_coupon_apply_details`
--
ALTER TABLE `pns_coupon_apply_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_coupon_details`
--
ALTER TABLE `pns_coupon_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_customers`
--
ALTER TABLE `pns_customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `pns_distirct_details`
--
ALTER TABLE `pns_distirct_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_document_type_details`
--
ALTER TABLE `pns_document_type_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_driver`
--
ALTER TABLE `pns_driver`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `pns_driver_duty_details`
--
ALTER TABLE `pns_driver_duty_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_driver_profile_document`
--
ALTER TABLE `pns_driver_profile_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_driver_vehicle_document`
--
ALTER TABLE `pns_driver_vehicle_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_emergency_contact`
--
ALTER TABLE `pns_emergency_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_emergency_details`
--
ALTER TABLE `pns_emergency_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_favorite_location`
--
ALTER TABLE `pns_favorite_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_log`
--
ALTER TABLE `pns_log`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `pns_login`
--
ALTER TABLE `pns_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_menu`
--
ALTER TABLE `pns_menu`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `pns_notification_details`
--
ALTER TABLE `pns_notification_details`
  ADD PRIMARY KEY (`id_notification`);

--
-- Indexes for table `pns_ride_chat_details`
--
ALTER TABLE `pns_ride_chat_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_ride_offers_details`
--
ALTER TABLE `pns_ride_offers_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_ride_passenger`
--
ALTER TABLE `pns_ride_passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_ride_preference`
--
ALTER TABLE `pns_ride_preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_ride_rating_details`
--
ALTER TABLE `pns_ride_rating_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_ride_rating_items`
--
ALTER TABLE `pns_ride_rating_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_ride_rating_type`
--
ALTER TABLE `pns_ride_rating_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_role`
--
ALTER TABLE `pns_role`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `pns_settings`
--
ALTER TABLE `pns_settings`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `pns_state_details`
--
ALTER TABLE `pns_state_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_team_member`
--
ALTER TABLE `pns_team_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_transaction`
--
ALTER TABLE `pns_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_user_preference`
--
ALTER TABLE `pns_user_preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_user_wallet`
--
ALTER TABLE `pns_user_wallet`
  ADD PRIMARY KEY (`id_wallet`);

--
-- Indexes for table `pns_user_wallet_summary`
--
ALTER TABLE `pns_user_wallet_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_added_facilities`
--
ALTER TABLE `pns_vehicle_added_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_category`
--
ALTER TABLE `pns_vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_company`
--
ALTER TABLE `pns_vehicle_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_details`
--
ALTER TABLE `pns_vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_facilities`
--
ALTER TABLE `pns_vehicle_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_fare_charge_items`
--
ALTER TABLE `pns_vehicle_fare_charge_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_fare_details`
--
ALTER TABLE `pns_vehicle_fare_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_fare_items`
--
ALTER TABLE `pns_vehicle_fare_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_model`
--
ALTER TABLE `pns_vehicle_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_vehicle_sub_category`
--
ALTER TABLE `pns_vehicle_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns_wallet_transaction`
--
ALTER TABLE `pns_wallet_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pns_about_page_details`
--
ALTER TABLE `pns_about_page_details`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pns_bank_details`
--
ALTER TABLE `pns_bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pns_cancel_ride_reason`
--
ALTER TABLE `pns_cancel_ride_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pns_car_brand`
--
ALTER TABLE `pns_car_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pns_car_details`
--
ALTER TABLE `pns_car_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pns_car_modal`
--
ALTER TABLE `pns_car_modal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pns_car_type`
--
ALTER TABLE `pns_car_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pns_close_account_reason`
--
ALTER TABLE `pns_close_account_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pns_coupon_apply_details`
--
ALTER TABLE `pns_coupon_apply_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pns_coupon_details`
--
ALTER TABLE `pns_coupon_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pns_customers`
--
ALTER TABLE `pns_customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pns_distirct_details`
--
ALTER TABLE `pns_distirct_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;

--
-- AUTO_INCREMENT for table `pns_document_type_details`
--
ALTER TABLE `pns_document_type_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pns_driver`
--
ALTER TABLE `pns_driver`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pns_driver_duty_details`
--
ALTER TABLE `pns_driver_duty_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pns_driver_profile_document`
--
ALTER TABLE `pns_driver_profile_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pns_driver_vehicle_document`
--
ALTER TABLE `pns_driver_vehicle_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pns_emergency_contact`
--
ALTER TABLE `pns_emergency_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pns_emergency_details`
--
ALTER TABLE `pns_emergency_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_favorite_location`
--
ALTER TABLE `pns_favorite_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pns_log`
--
ALTER TABLE `pns_log`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_login`
--
ALTER TABLE `pns_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pns_menu`
--
ALTER TABLE `pns_menu`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pns_notification_details`
--
ALTER TABLE `pns_notification_details`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_ride_chat_details`
--
ALTER TABLE `pns_ride_chat_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_ride_offers_details`
--
ALTER TABLE `pns_ride_offers_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pns_ride_passenger`
--
ALTER TABLE `pns_ride_passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_ride_preference`
--
ALTER TABLE `pns_ride_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_ride_rating_details`
--
ALTER TABLE `pns_ride_rating_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pns_ride_rating_items`
--
ALTER TABLE `pns_ride_rating_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pns_ride_rating_type`
--
ALTER TABLE `pns_ride_rating_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pns_role`
--
ALTER TABLE `pns_role`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3071;

--
-- AUTO_INCREMENT for table `pns_settings`
--
ALTER TABLE `pns_settings`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pns_state_details`
--
ALTER TABLE `pns_state_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pns_team_member`
--
ALTER TABLE `pns_team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_transaction`
--
ALTER TABLE `pns_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pns_user_preference`
--
ALTER TABLE `pns_user_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pns_user_wallet`
--
ALTER TABLE `pns_user_wallet`
  MODIFY `id_wallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pns_user_wallet_summary`
--
ALTER TABLE `pns_user_wallet_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_vehicle_added_facilities`
--
ALTER TABLE `pns_vehicle_added_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_vehicle_category`
--
ALTER TABLE `pns_vehicle_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pns_vehicle_company`
--
ALTER TABLE `pns_vehicle_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pns_vehicle_details`
--
ALTER TABLE `pns_vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pns_vehicle_facilities`
--
ALTER TABLE `pns_vehicle_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_vehicle_fare_charge_items`
--
ALTER TABLE `pns_vehicle_fare_charge_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_vehicle_fare_details`
--
ALTER TABLE `pns_vehicle_fare_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_vehicle_fare_items`
--
ALTER TABLE `pns_vehicle_fare_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pns_vehicle_model`
--
ALTER TABLE `pns_vehicle_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `pns_vehicle_sub_category`
--
ALTER TABLE `pns_vehicle_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pns_wallet_transaction`
--
ALTER TABLE `pns_wallet_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
