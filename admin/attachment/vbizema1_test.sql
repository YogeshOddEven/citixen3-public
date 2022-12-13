-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `wl_contacts`;
CREATE TABLE `wl_contacts` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `srno` varchar(100) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `contact_category` int(11) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_contacts` (`cid`, `srno`, `cname`, `contact_category`, `mobileno`, `emailid`, `status`, `date_added`) VALUES
(1,	'WL756053',	'contact 1',	1,	'7',	'',	'0',	'2020-03-25'),
(2,	'WL867951',	'contact 2',	2,	'7865432100',	'',	'0',	'2020-04-01'),
(3,	'WL867951',	'contact 2',	2,	'7865432100',	'',	'0',	'2020-04-01'),
(4,	'WL727544',	'contact 3',	2,	'4686453132',	'',	'0',	'2020-05-14'),
(5,	'WL469450',	'contact4',	3,	'9876543210',	'',	'0',	'2020-05-14'),
(6,	'WL469450',	'testing contact',	3,	'9876543210',	'',	'0',	'2020-05-14'),
(7,	'WL504460',	'kanu_Architect',	1,	'1236578963',	'',	'0',	'2020-06-04'),
(8,	'WL110491',	'Kanu_Plumber',	2,	'45632985632',	'',	'0',	'2020-06-04'),
(9,	'WL637891',	'manu_architect',	1,	'4563296325',	'',	'0',	'2020-06-04'),
(10,	'WL512436',	'Kanu_Plumber',	3,	'256325',	'',	'0',	'2020-06-04'),
(11,	'WL344386',	'manu_supervisor',	3,	'123698523',	'',	'0',	'2020-06-04');

DROP TABLE IF EXISTS `wl_contact_category`;
CREATE TABLE `wl_contact_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_contact_category` (`id`, `cname`) VALUES
(1,	'Architect'),
(2,	'Plumber'),
(3,	'Site Supervisor');

DROP TABLE IF EXISTS `wl_demo_booking_details`;
CREATE TABLE `wl_demo_booking_details` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `date_booking` date NOT NULL,
  `id_time_slot` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0(Active),1(Inactive)2(Cancel)',
  `date_added` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `wl_event_details`;
CREATE TABLE `wl_event_details` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `exname` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=open 1=closed 2=reopen',
  `date_added` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_event_details` (`id_event`, `title`, `description`, `date`, `time`, `exname`, `status`, `date_added`, `ip_address`) VALUES
(1,	'Demo Scheduled',	'Demo scheduled with prospect',	'2020-05-23',	'10:00:00',	1,	0,	'2020-05-22 00:00:00',	''),
(2,	'Test Service',	'Testing all functionality                                                              ',	'2020-05-24',	'16:00:00',	1,	0,	'2020-05-23 16:53:12',	''),
(3,	'calendar service 1',	'asdl&#39;asd\r\nasd\r\n',	'2020-05-24',	'18:00:00',	1,	0,	'0000-00-00 00:00:00',	'::1');

DROP TABLE IF EXISTS `wl_industry`;
CREATE TABLE `wl_industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_industry` (`id`, `name`) VALUES
(1,	'Ceramic');

DROP TABLE IF EXISTS `wl_inquiry_followup`;
CREATE TABLE `wl_inquiry_followup` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `iid` varchar(100) NOT NULL,
  `exname` varchar(100) NOT NULL,
  `fdate` date NOT NULL,
  `ftime` varchar(100) NOT NULL,
  `remarks` longtext NOT NULL,
  `nfdate` date NOT NULL,
  `nftime` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0= Done 1= Pending',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_inquiry_followup` (`fid`, `iid`, `exname`, `fdate`, `ftime`, `remarks`, `nfdate`, `nftime`, `status`) VALUES
(2,	'1',	'1',	'2019-12-11',	'10:56 AM',	'Test',	'2019-12-11',	'10:56 AM',	1),
(3,	'1',	'',	'2019-12-11',	'12:40 PM',	'Testing',	'2019-12-11',	'12:40 PM',	0),
(4,	'7',	'2',	'2020-02-15',	'10:55 AM',	'Followup Client Done',	'2020-02-19',	'10:55 AM',	1),
(5,	'8',	'2',	'2020-05-25',	'04:43 PM',	'testing followup done',	'2020-05-31',	'04:43 PM',	1),
(6,	'9',	'1',	'2020-06-04',	'12:48 AM',	'We will need to contact him tomorrow',	'2020-06-05',	'12:48 AM',	0),
(7,	'9',	'1',	'2020-06-05',	'02:47 AM',	'New follow up',	'2020-06-04',	'02:47 AM',	0),
(8,	'9',	'1',	'2020-06-04',	'11:32 PM',	'Check for the next date',	'2020-06-05',	'11:32 AM',	1);

DROP TABLE IF EXISTS `wl_inquiry_source`;
CREATE TABLE `wl_inquiry_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_inquiry_source` (`id`, `sname`) VALUES
(2,	'Dealer Referrance'),
(5,	'Walk-in'),
(6,	'Call'),
(8,	'Email'),
(9,	'India Mart'),
(10,	'Architect');

DROP TABLE IF EXISTS `wl_inquiry_status`;
CREATE TABLE `wl_inquiry_status` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(100) NOT NULL,
  `scode` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_inquiry_status` (`sid`, `sname`, `scode`) VALUES
(1,	'Casual',	1),
(2,	'Serious',	2),
(3,	'Very Serious',	3),
(4,	'Done',	4),
(5,	'Lost',	5);

DROP TABLE IF EXISTS `wl_inquiry_status_updates`;
CREATE TABLE `wl_inquiry_status_updates` (
  `suid` int(11) NOT NULL AUTO_INCREMENT,
  `scode` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` text NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `iid` int(11) NOT NULL,
  `exname` int(11) NOT NULL,
  PRIMARY KEY (`suid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_inquiry_status_updates` (`suid`, `scode`, `date`, `time`, `remarks`, `attachments`, `iid`, `exname`) VALUES
(1,	4,	'2020-02-17',	'21:53:00',	'Site Visited',	'0',	7,	2),
(3,	5,	'2020-02-17',	'22:22:00',	'Design Submitted to client',	'u6ovRnTjtAYW.pdf',	7,	2),
(4,	8,	'2020-02-17',	'23:07:10',	'Inquiry Converted To Project',	'',	7,	1);

DROP TABLE IF EXISTS `wl_lead`;
CREATE TABLE `wl_lead` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `srno` varchar(100) NOT NULL,
  `ldate` date NOT NULL,
  `ltime` time NOT NULL,
  `lead_owner` int(11) NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `mobileno` varchar(25) NOT NULL,
  `secondary_mobile` varchar(25) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `lead_source` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_industry` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `st_no` varchar(100) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `next_followup_date` date NOT NULL,
  `next_followup_time` time NOT NULL,
  `is_project_converted` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_lead` (`lid`, `srno`, `ldate`, `ltime`, `lead_owner`, `party_name`, `mobileno`, `secondary_mobile`, `emailid`, `lead_source`, `company_name`, `company_website`, `company_industry`, `address`, `st_no`, `landmark`, `city`, `state`, `country`, `status`, `next_followup_date`, `next_followup_time`, `is_project_converted`) VALUES
(1,	'001',	'2020-03-25',	'10:59:00',	2,	'dasd',	'7894561230',	'9876543210',	'yogeshnakhva@gmail.com',	10,	'company 1',	'company 1',	'',	'test address',	'1234',	'adasd',	'jamnagar',	'gujarat',	'India',	'1',	'2020-03-25',	'10:59:00',	1),
(7,	'007',	'2020-03-25',	'10:59:00',	2,	'Vbiz Solutions',	'7894561230',	'9876543210',	'yogeshnakhva@gmail.com',	10,	'company 1',	'company 1',	'1',	'test address',	'1234',	'adasd',	'jamnagar',	'gujarat',	'India',	'4',	'2020-03-25',	'10:59:00',	0),
(8,	'008',	'2020-03-25',	'10:59:00',	2,	'dasd',	'7894561230',	'9876543210',	'yogeshnakhva@gmail.com',	10,	'company 1',	'company 1',	'',	'test address',	'1234',	'adasd',	'jamnagar',	'gujarat',	'India',	'1',	'2020-03-25',	'10:59:00',	1),
(9,	'009',	'2020-06-03',	'05:30:00',	1,	'Kanu',	'1254632654',	'1236578965',	'kanu@gmail.com',	2,	'Kanu_Company',	'www.kanu.com',	'1',	'Kanu_address',	'Kanu_stno',	'Kanu_landmark',	'Kanu_City',	'Gujarat',	'India',	'4',	'2020-06-04',	'10:52:00',	0),
(10,	'010',	'2020-06-04',	'05:30:00',	1,	'Manu',	'1234549655',	'7896545632',	'manu@gmail.com',	6,	'manu_company',	'',	'',	'Manu_address',	'',	'',	'',	'Gujarat',	'India',	'1',	'2020-06-08',	'01:51:00',	1);

DROP TABLE IF EXISTS `wl_lead_contact`;
CREATE TABLE `wl_lead_contact` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `id_contact` int(11) NOT NULL,
  `srno` varchar(100) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `contact_category` int(11) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `id_lead` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_lead_contact` (`cid`, `id_contact`, `srno`, `cname`, `party_name`, `contact_category`, `mobileno`, `emailid`, `id_lead`, `date_added`) VALUES
(1,	1,	'WL756053',	'contact 1',	'',	1,	'9876543210',	'',	1,	'2020-03-31'),
(3,	2,	'',	'contact 2',	'',	1,	'',	'',	1,	'2020-05-14'),
(7,	7,	'',	'kanu_Architect',	'',	1,	'1236578963',	'',	9,	'2020-06-04'),
(8,	8,	'',	'Kanu_Plumber',	'',	2,	'45632985632',	'',	9,	'2020-06-04'),
(9,	9,	'',	'manu_architect',	'',	1,	'4563296325',	'',	10,	'2020-06-04'),
(10,	10,	'',	'Kanu_Plumber',	'',	3,	'256325',	'',	10,	'2020-06-04'),
(11,	11,	'',	'manu_supervisor',	'',	3,	'123698523',	'',	10,	'2020-06-04');

DROP TABLE IF EXISTS `wl_lead_remarks`;
CREATE TABLE `wl_lead_remarks` (
  `id_remarks` int(11) NOT NULL AUTO_INCREMENT,
  `id_lead` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_remarks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_lead_remarks` (`id_remarks`, `id_lead`, `added_by`, `remarks`, `date_added`, `status`) VALUES
(1,	1,	1,	'test remark 1',	'2020-05-14 13:32:41',	0),
(9,	9,	1,	'Kanu Remark 1',	'2020-06-04 00:04:07',	0),
(10,	9,	1,	'Kanu Remark 2',	'2020-06-04 00:04:07',	0),
(11,	9,	1,	'Kanu Remark 3',	'2020-06-04 00:04:07',	0),
(12,	9,	1,	'Kanu Remark 4',	'2020-06-04 00:04:07',	0),
(13,	9,	1,	'Kanu Remark 1.1',	'2020-06-04 00:09:51',	0),
(14,	9,	1,	'Kanu Remark 5',	'2020-06-04 00:25:08',	0),
(16,	9,	1,	'remark. \"If you see something, say something\" might translate into, \"If you remark something, make a remark.\" Remark means to notice, and it also means to comment, as in, \"Keep your obnoxious remarks to yourself.\"',	'2020-06-04 00:37:51',	0),
(17,	10,	1,	'Remark 1',	'2020-06-04 01:46:20',	0);

DROP TABLE IF EXISTS `wl_log`;
CREATE TABLE `wl_log` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `exname` varchar(100) NOT NULL,
  `ltype` varchar(100) NOT NULL,
  `ldetail` longtext NOT NULL,
  `ldate` date NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_log` (`lid`, `exname`, `ltype`, `ldetail`, `ldate`) VALUES
(1,	'1',	'contact',	'Update contact details.',	'2020-03-18'),
(2,	'1',	'contact',	'Update contact details.',	'2020-03-18'),
(3,	'1',	'contact',	'Update contact details.',	'2020-03-18'),
(4,	'1',	'contact',	'Update contact details.',	'2020-03-18'),
(5,	'1',	'contact',	'Add new contact details.',	'2020-03-18'),
(6,	'1',	'contact',	'Delete contact details.',	'2020-03-18'),
(7,	'1',	'contact',	'Delete contact details.',	'2020-03-18'),
(8,	'1',	'Lead',	'Add new Lead details.',	'2020-03-25'),
(9,	'1',	'Lead',	'Delete Lead details.',	'2020-03-25'),
(10,	'1',	'Lead',	'Add new Lead details.',	'2020-03-25'),
(11,	'1',	'Lead',	'Update Lead details.',	'2020-03-31'),
(12,	'1',	'Lead',	'Update Lead details.',	'2020-04-01'),
(13,	'1',	'employee',	'Update employee details.',	'2020-05-03'),
(14,	'1',	'employee',	'Update employee details.',	'2020-05-03'),
(15,	'1',	'employee',	'Add new employee details.',	'2020-05-03'),
(16,	'1',	'employee',	'Delete employee details.',	'2020-05-03'),
(17,	'1',	'employee',	'Add new employee details.',	'2020-05-03'),
(18,	'1',	'employee',	'Add new employee details.',	'2020-05-03'),
(19,	'1',	'Lead',	'Update Lead details.',	'2020-05-06'),
(20,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(21,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(22,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(23,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(24,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(25,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(26,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(27,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(28,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(29,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(30,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(31,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(32,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(33,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(34,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(35,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(36,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(37,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(38,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(39,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(40,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(41,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(42,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(43,	'1',	'Lead',	'Update Lead details.',	'2020-05-14'),
(44,	'1',	'contact',	'Delete contact details.',	'2020-05-22'),
(45,	'1',	'inquiry',	'Add inquiry followup details.',	'2020-05-25'),
(46,	'1',	'Lead',	'Add new Lead details.',	'2020-06-04'),
(47,	'1',	'Lead Remark',	'Add new Lead Remark details.',	'2020-06-04'),
(48,	'1',	'Lead Remark',	'Add new Lead Remark details.',	'2020-06-04'),
(49,	'1',	'Lead Remark',	'Add new Lead Remark details.',	'2020-06-04'),
(50,	'1',	'Lead Reamrk',	'Delete Lead Reamrk details.',	'2020-06-04'),
(51,	'1',	'Lead Remark',	'Add new Lead Remark details.',	'2020-06-04'),
(52,	'1',	'Lead',	'Add new Lead Contact details.',	'2020-06-04'),
(53,	'1',	'inquiry',	'Add inquiry followup details.',	'2020-06-04'),
(54,	'1',	'Lead',	'Add new Lead details.',	'2020-06-04'),
(55,	'1',	'inquiry',	'Add inquiry followup details.',	'2020-06-04'),
(56,	'1',	'inquiry',	'Add inquiry followup details.',	'2020-06-04'),
(57,	'1',	'project',	'Create new project from lead.',	'2020-06-04');

DROP TABLE IF EXISTS `wl_login`;
CREATE TABLE `wl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `urole` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_login` (`id`, `aname`, `pass`, `password`, `desig`, `fname`, `lname`, `mobile`, `emailid`, `status`, `photo`, `urole`) VALUES
(1,	'WelitAdmin',	'21232f297a57a5a743894a0e4a801fc3',	'admin',	'Administrator',	'Welit',	'Admin',	'9825183171',	'developer3@vbizsolutions.biz',	'0',	'',	'1'),
(2,	'',	'202cb962ac59075b964b07152d234b70',	'123',	'',	'developer',	'vbiz',	'9227387054',	'developer@vbizsolutions.biz',	'0',	'',	'1'),
(5,	'',	'd41d8cd98f00b204e9800998ecf8427e',	'',	'',	'',	'',	'',	'',	'0',	'',	'');

DROP TABLE IF EXISTS `wl_menu`;
CREATE TABLE `wl_menu` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mname` varchar(100) NOT NULL,
  `mtitle` varchar(100) NOT NULL,
  `pmenu` varchar(100) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_menu` (`mid`, `mname`, `mtitle`, `pmenu`) VALUES
(1,	'settings',	'settings',	'0'),
(2,	'employee',	'employee',	'0'),
(3,	'contacts',	'contacts',	'0'),
(5,	'view_all_contact',	'view_all_contact',	'3'),
(6,	'leads',	'leads',	'0'),
(7,	'add_lead',	'add_lead',	'6'),
(8,	'view_all_lead',	'view_all_lead',	'6'),
(9,	'edit_lead',	'edit_lead',	'6'),
(10,	'delete_lead',	'delete_lead',	'6'),
(11,	'lead_status',	'lead_status',	'6'),
(12,	'edit_contact',	'edit_contact',	'3'),
(13,	'delete_contact',	'delete_contact',	'3'),
(14,	'contact_status',	'contact_status',	'3'),
(15,	'today_followup',	'today_followup',	'6'),
(16,	'pending_followup',	'pending_followup',	'6'),
(22,	'convert_project',	'convert_project',	'6'),
(23,	'project',	'project',	'0'),
(24,	'view_all_project',	'view_all_project',	'23'),
(25,	'edit_project',	'edit_project',	'23'),
(26,	'delete_project',	'delete_project',	'23'),
(27,	'project_status',	'project_status',	'23'),
(28,	'add_contact',	'add_contact',	'3'),
(29,	'service',	'service',	'0'),
(30,	'view_all_service',	'view_all_service',	'29'),
(31,	'edit_service',	'edit_service',	'29'),
(32,	'delete_service',	'delete_service',	'29'),
(33,	'service_status',	'service_status',	'29'),
(34,	'event',	'event',	'0'),
(35,	'view_all_event',	'view_all_event',	'34'),
(36,	'edit_event',	'edit_event',	'34'),
(37,	'delete_event',	'delete_event',	'34'),
(38,	'event_status',	'event_status',	'34'),
(39,	'demo_booking',	'demo_booking',	'0'),
(40,	'view_all_demo_booking',	'view_all_demo_booking',	'39'),
(41,	'edit_demo_booking',	'edit_demo_booking',	'39'),
(42,	'delete_demo_booking',	'delete_demo_booking',	'39'),
(43,	'demo_booking_status',	'demo_booking_status',	'39'),
(44,	'product',	'product',	'0'),
(45,	'view_all_product',	'view_all_product',	'44'),
(46,	'edit_product',	'edit_product',	'44'),
(47,	'delete_product',	'delete_product',	'44'),
(48,	'product_status',	'product_status',	'44'),
(49,	'time_slot',	'time_slot',	'0'),
(50,	'view_all_time_slot',	'view_all_time_slot',	'49'),
(51,	'edit_time_slot',	'edit_time_slot',	'49'),
(52,	'delete_time_slot',	'delete_time_slot',	'49'),
(53,	'time_slot_status',	'time_slot_status',	'49'),
(54,	'add_service',	'add_service',	'29'),
(55,	'add_event',	'add_event',	'34'),
(56,	'add_demo_booking',	'add_demo_booking',	'39'),
(57,	'add_product',	'add_product',	'44'),
(58,	'add_time_slot',	'add_time_slot',	'49'),
(59,	'lead_contact',	'lead_contact',	'0'),
(60,	'add_lead_contact',	'add_lead_contact',	'59'),
(61,	'edit_lead_contact',	'edit_lead_contact',	'59'),
(62,	'delete_lead_contact',	'delete_lead_contact',	'59'),
(63,	'lead_remarks',	'lead_remarks',	'0'),
(64,	'add_lead_remarks',	'add_lead_remarks',	'63'),
(65,	'edit_lead_remarks',	'edit_lead_remarks',	'63'),
(66,	'delete_lead_remarks',	'delete_lead_remarks',	'63');

DROP TABLE IF EXISTS `wl_products`;
CREATE TABLE `wl_products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_benefits` text NOT NULL,
  `application_areas` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_products` (`id_product`, `product_name`, `product_description`, `product_benefits`, `application_areas`, `status`, `date_added`) VALUES
(1,	'Product 1',	'<p>asdasd</p>\r\n<p>asd</p>\r\n<p>as</p>\r\n<p>das</p>\r\n<p>&nbsp;</p>',	'<p>sdf</p>\r\n<p>sdf</p>\r\n<p>fsd</p>\r\n<p>f</p>\r\n<p>s</p>\r\n<p>fad</p>\r\n<p>&nbsp;</p>',	'<p>asd</p>\r\n<p>ad</p>\r\n<p>assd</p>\r\n<p>as</p>\r\n<p>das</p>\r\n<p>&nbsp;</p>\r\n<p>d</p>\r\n<p>&nbsp;</p>',	0,	'2020-05-02 00:00:00'),
(2,	'Product 2',	'',	'',	'',	0,	'2020-05-02 00:00:00'),
(3,	'Product 3',	'',	'',	'',	0,	'2020-05-02 00:00:00'),
(7,	'Product 4',	'<p>Motion Sensor</p>',	'<p>- 1</p>\r\n<p>- 2</p>\r\n<p>- 3</p>\r\n<p>&nbsp;</p>',	'<p>- A</p>\r\n<p>- B</p>\r\n<p>- C</p>\r\n<p>&nbsp;</p>',	0,	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `wl_product_image`;
CREATE TABLE `wl_product_image` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_product_image` (`id_img`, `id_product`, `product_image`, `date_added`, `status`) VALUES
(1,	1,	'KO1YxzcDwEHp.jpg',	'2020-05-06 10:21:14',	0),
(2,	1,	'HdbC1I2JUQtB.jpg',	'2020-05-06 10:21:14',	0),
(5,	2,	'2yNgjkSr7AnF.jpg',	'2020-05-25 15:35:30',	0),
(6,	2,	'qSwtQxcDoG_M.png',	'2020-05-25 15:35:30',	0),
(7,	7,	'7L8VFozUaSJ0.jpg',	'2020-06-05 00:19:20',	0);

DROP TABLE IF EXISTS `wl_projects`;
CREATE TABLE `wl_projects` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `project_quatation_amount` double NOT NULL,
  `project_product` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `unique_pid` varchar(100) NOT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_projects` (`id_project`, `lid`, `client_id`, `pname`, `project_quatation_amount`, `project_product`, `status`, `date_created`, `unique_pid`) VALUES
(1,	7,	8,	'Rajkot Site Name 1',	100000,	'1,2,3',	0,	'2020-02-17 23:07:10',	'PROJ-5e4acf463d3e4'),
(2,	9,	0,	'Kanu',	120000,	'1,2,3,3,7',	0,	'2020-06-04 23:39:10',	'PROJ-5ed938c6c2e1e');

DROP TABLE IF EXISTS `wl_role`;
CREATE TABLE `wl_role` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `rstatus` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_role` (`rid`, `uname`, `rname`, `rstatus`) VALUES
(22,	'2',	'settings',	'0'),
(23,	'2',	'employee',	'1'),
(24,	'2',	'customers',	'1'),
(25,	'2',	'view_all_customer',	'1'),
(26,	'2',	'leads',	'1'),
(27,	'2',	'add_lead',	'1'),
(28,	'2',	'view_all_lead',	'1'),
(29,	'2',	'edit_lead',	'1'),
(30,	'2',	'delete_lead',	'0'),
(31,	'2',	'lead_status',	'0'),
(32,	'2',	'edit_customer',	'1'),
(33,	'2',	'delete_customer',	'1'),
(34,	'2',	'customer_status',	'1'),
(35,	'2',	'today_followup',	'0'),
(36,	'2',	'pending_followup',	'0'),
(37,	'2',	'convert_project',	'0'),
(38,	'2',	'project',	'1'),
(39,	'2',	'view_all_project',	'1'),
(40,	'2',	'edit_project',	'1'),
(41,	'2',	'delete_project',	'1'),
(42,	'2',	'project_status',	'1'),
(43,	'3',	'settings',	'0'),
(44,	'3',	'employee',	'0'),
(45,	'3',	'customers',	'1'),
(46,	'3',	'view_all_customer',	'1'),
(47,	'3',	'leads',	'1'),
(48,	'3',	'add_lead',	'0'),
(49,	'3',	'view_all_lead',	'1'),
(50,	'3',	'edit_lead',	'0'),
(51,	'3',	'delete_lead',	'0'),
(52,	'3',	'lead_status',	'0'),
(53,	'3',	'edit_customer',	'0'),
(54,	'3',	'delete_customer',	'0'),
(55,	'3',	'customer_status',	'0'),
(56,	'3',	'today_followup',	'0'),
(57,	'3',	'pending_followup',	'0'),
(58,	'3',	'convert_project',	'0'),
(59,	'3',	'project',	'1'),
(60,	'3',	'view_all_project',	'1'),
(61,	'3',	'edit_project',	'0'),
(62,	'3',	'delete_project',	'0'),
(63,	'3',	'project_status',	'0'),
(318,	'1',	'settings',	'1'),
(319,	'1',	'employee',	'1'),
(320,	'1',	'contacts',	'1'),
(321,	'1',	'view_all_contact',	'1'),
(322,	'1',	'leads',	'1'),
(323,	'1',	'add_lead',	'1'),
(324,	'1',	'view_all_lead',	'1'),
(325,	'1',	'edit_lead',	'1'),
(326,	'1',	'delete_lead',	'1'),
(327,	'1',	'lead_status',	'1'),
(328,	'1',	'edit_contact',	'1'),
(329,	'1',	'delete_contact',	'1'),
(330,	'1',	'contact_status',	'1'),
(331,	'1',	'today_followup',	'1'),
(332,	'1',	'pending_followup',	'1'),
(333,	'1',	'convert_project',	'1'),
(334,	'1',	'project',	'1'),
(335,	'1',	'view_all_project',	'1'),
(336,	'1',	'edit_project',	'1'),
(337,	'1',	'delete_project',	'1'),
(338,	'1',	'project_status',	'1'),
(339,	'1',	'add_contact',	'1'),
(340,	'1',	'service',	'1'),
(341,	'1',	'view_all_service',	'1'),
(342,	'1',	'edit_service',	'1'),
(343,	'1',	'delete_service',	'1'),
(344,	'1',	'service_status',	'1'),
(345,	'1',	'event',	'1'),
(346,	'1',	'view_all_event',	'1'),
(347,	'1',	'edit_event',	'1'),
(348,	'1',	'delete_event',	'1'),
(349,	'1',	'event_status',	'1'),
(350,	'1',	'demo_booking',	'1'),
(351,	'1',	'view_all_demo_booking',	'1'),
(352,	'1',	'edit_demo_booking',	'1'),
(353,	'1',	'delete_demo_booking',	'1'),
(354,	'1',	'demo_booking_status',	'1'),
(355,	'1',	'product',	'1'),
(356,	'1',	'view_all_product',	'1'),
(357,	'1',	'edit_product',	'1'),
(358,	'1',	'delete_product',	'1'),
(359,	'1',	'product_status',	'1'),
(360,	'1',	'time_slot',	'1'),
(361,	'1',	'view_all_time_slot',	'1'),
(362,	'1',	'edit_time_slot',	'1'),
(363,	'1',	'delete_time_slot',	'1'),
(364,	'1',	'time_slot_status',	'1'),
(365,	'1',	'add_service',	'1'),
(366,	'1',	'add_event',	'1'),
(367,	'1',	'add_demo_booking',	'1'),
(368,	'1',	'add_product',	'1'),
(369,	'1',	'add_time_slot',	'1'),
(370,	'1',	'lead_contact',	'1'),
(371,	'1',	'add_lead_contact',	'1'),
(372,	'1',	'edit_lead_contact',	'1'),
(373,	'1',	'delete_lead_contact',	'1'),
(374,	'1',	'lead_remarks',	'1'),
(375,	'1',	'add_lead_remarks',	'1'),
(376,	'1',	'edit_lead_remarks',	'1'),
(377,	'1',	'delete_lead_remarks',	'1');

DROP TABLE IF EXISTS `wl_service_details`;
CREATE TABLE `wl_service_details` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `customer` varchar(255) NOT NULL,
  `id_project` int(11) NOT NULL,
  `total_time_spent` varchar(255) NOT NULL,
  `customer_sign` varchar(255) NOT NULL,
  `service_person` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=open 1=closed 2=reopen',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_service_details` (`id_service`, `title`, `description`, `date`, `time`, `customer`, `id_project`, `total_time_spent`, `customer_sign`, `service_person`, `status`, `date_added`) VALUES
(1,	'Test Service',	'asdlas\'das\r\ndas\r\ndas                                                              ',	'2020-05-22',	'16:36:00',	'',	1,	'',	'',	'Service man 1',	0,	'2020-05-22 16:37:46'),
(3,	'System Upgrade',	'Service_Description',	'2020-06-05',	'00:23:00',	'Service_Customer',	2,	'',	'',	'Jay',	0,	'2020-06-05 00:35:37');

DROP TABLE IF EXISTS `wl_service_log`;
CREATE TABLE `wl_service_log` (
  `id_sl` int(11) NOT NULL AUTO_INCREMENT,
  `id_service` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `remarak_type` int(11) NOT NULL COMMENT '1=admin 2=service person 3=client',
  `date_added` datetime NOT NULL,
  `added_by` varchar(250) NOT NULL,
  PRIMARY KEY (`id_sl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_service_log` (`id_sl`, `id_service`, `remarks`, `remarak_type`, `date_added`, `added_by`) VALUES
(1,	1,	'Service Created By Admin',	1,	'2020-05-22 16:37:46',	'Kitchen Admin'),
(2,	2,	'Service Created By Admin',	1,	'2020-05-23 17:39:08',	'Kitchen Admin'),
(3,	3,	'Service Created By Admin',	1,	'2020-06-05 00:35:37',	'');

DROP TABLE IF EXISTS `wl_settings`;
CREATE TABLE `wl_settings` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(100) NOT NULL,
  `svalue` longtext NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_settings` (`sid`, `sname`, `svalue`) VALUES
(3,	'clogo',	'logo.png'),
(4,	'caddress',	'Mahakali Road, Opp. Cosmo Complex, Near Mahila College Chowk, Rajkot - 360001.'),
(5,	'cemailid',	'idea@plance.in'),
(6,	'cphone',	'+91 9825183171'),
(7,	'cmobile',	'9825807722'),
(8,	'cname',	'Plance');

DROP TABLE IF EXISTS `wl_time_slots`;
CREATE TABLE `wl_time_slots` (
  `id_slot` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_slot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wl_time_slots` (`id_slot`, `start_time`, `end_time`, `date_created`, `status`) VALUES
(1,	'08:00:00',	'10:00:00',	'0000-00-00 00:00:00',	0),
(2,	'10:00:00',	'12:00:00',	'2020-05-14 08:49:38',	0),
(3,	'12:00:00',	'14:00:00',	'2020-05-20 07:51:50',	0),
(4,	'14:00:00',	'16:00:00',	'2020-05-20 07:52:26',	0),
(5,	'16:00:00',	'18:00:00',	'2020-05-20 07:53:06',	0),
(6,	'18:00:00',	'20:00:00',	'2020-05-20 07:54:02',	0);

-- 2020-06-20 08:11:53
