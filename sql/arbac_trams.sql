-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2016 at 03:24 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arbac_trams`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `payee_name` varchar(64) NOT NULL,
  `amount_type` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payable_for` tinyint(4) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL DEFAULT '0',
  `total_amount` float(9,2) NOT NULL,
  `primary_date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_type` tinyint(4) NOT NULL DEFAULT '0',
  `account_type` tinyint(4) NOT NULL DEFAULT '0',
  `paid_amount` float(9,2) NOT NULL,
  `due_amount` float(9,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_mode_id` tinyint(4) NOT NULL DEFAULT '1',
  `comments` text NOT NULL,
  `account_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `account_type_id` int(11) NOT NULL,
  `account_mode` tinyint(4) NOT NULL DEFAULT '1',
  `account_type` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_id`, `account_mode`, `account_type`, `created`, `updated`) VALUES
(1, 1, 'General', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Faculty Salary', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Batch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Branch', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'Travel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 'Student Fees', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'Seminar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 'Consultation Fee', '2016-06-21 02:16:28', '2016-06-21 02:16:28'),
(9, 1, 'Electricity Bill', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Telephone Bill', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Transport', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `arbac_groups`
--

CREATE TABLE `arbac_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arbac_groups`
--

INSERT INTO `arbac_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Super Admin Group'),
(2, 'Public', 'Public Access Group'),
(3, 'Default', 'Default Access Group'),
(4, 'Branch Admin', 'All Access to Branch'),
(5, 'Faculty', ''),
(6, 'Guest Faculty', ''),
(7, 'Branch Manager', ''),
(8, 'Sales Manager', ''),
(9, 'Accountant', ''),
(10, 'Councellor', ''),
(11, 'Telecaller', ''),
(12, 'Sales Executive', ''),
(13, 'Manager', ''),
(14, 'Consultant', '');

-- --------------------------------------------------------

--
-- Table structure for table `arbac_perms`
--

CREATE TABLE `arbac_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `perm_type` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `arbac_perm_to_group`
--

CREATE TABLE `arbac_perm_to_group` (
  `perm_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arbac_perm_to_group`
--

INSERT INTO `arbac_perm_to_group` (`perm_id`, `group_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(2, 4),
(2, 5),
(3, 4),
(3, 5),
(3, 6),
(4, 4),
(4, 5),
(4, 6),
(5, 4),
(5, 5),
(6, 4),
(6, 5),
(7, 4),
(7, 5),
(8, 2),
(8, 4),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `arbac_perm_to_user`
--

CREATE TABLE `arbac_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arbac_perm_to_user`
--

INSERT INTO `arbac_perm_to_user` (`perm_id`, `user_id`) VALUES
(17, 2),
(19, 2),
(22, 2),
(23, 3),
(24, 2),
(35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `arbac_pms`
--

CREATE TABLE `arbac_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `arbac_system_variables`
--

CREATE TABLE `arbac_system_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `arbac_users`
--

CREATE TABLE `arbac_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  `login_attempts` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arbac_users`
--

INSERT INTO `arbac_users` (`id`, `email`, `pass`, `username`, `banned`, `last_login`, `last_activity`, `last_login_attempt`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `totp_secret`, `ip_address`, `login_attempts`) VALUES
(1, 'admin@dqserv.com', 'dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3', 'Admin', 0, '2016-04-29 21:36:17', '2016-04-29 21:36:17', '2016-04-29 21:00:00', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', NULL),
(2, 'vivekra@dqserv.com', 'd0017f91469a999d729f88fd1ac61c3bba3a4d9b2172b602f541e059012b8700', 'vivekra', 0, '2016-06-27 16:13:52', '2016-06-27 16:13:52', '2016-06-27 16:00:00', NULL, NULL, NULL, NULL, NULL, '::1', NULL),
(3, 'muthu@dqserv.com', 'e5265ef271feca09a08efb897d004602905ecced562cc83502b0f24aed48920b', 'muthu', 0, '2016-04-28 21:33:01', '2016-04-28 21:33:01', '2016-04-28 21:00:00', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', NULL),
(5, 'yuvan@dqserv.com', '5ee63726c4f837435e022426c62472734968e6aa7b598180e79c9b39bc91adb7', 'yuvan', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'vijay@dqserv.com', '01f80f2a2962a97d02d9acf3dd9c8599b6386ab73702cb2f0f6f94fa7f114435', 'vijay', 0, '2016-03-23 04:33:46', '2016-03-23 04:33:46', '2016-03-23 04:00:00', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', NULL),
(7, 'vikram@dqserv.com', 'cdf1617460fec39f6c5bc899aeff9abd445fc4d9b170959c9d939bfc59c29802', 'vikram', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 'sandy@dqserv.com', '60dbc88abc1de63ead6c9632079f2e18cc665dc2bb4d34aa0ad41fe80ee7773e', 'sandy', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 'rajesh@dqserv.com', '98f8f458a88fd20da69690268e2e209a5327b186bdafa40e71aab0c03cde75c6', 'rajesh', 0, '2016-04-29 14:59:36', '2016-04-29 14:59:36', '2016-04-29 14:00:00', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', NULL),
(15, 'santhos@dqserv.com', '2a7231c465c29b17c353c6b989fba869f698f4acc02572ae45e1e8f4ca4794c4', 'santhos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `arbac_user_to_group`
--

CREATE TABLE `arbac_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arbac_user_to_group`
--

INSERT INTO `arbac_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `arbac_user_variables`
--

CREATE TABLE `arbac_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_id` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `batch_title` varchar(128) NOT NULL,
  `description` text,
  `faculty_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `batch_type` int(11) NOT NULL,
  `batch_pattern` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `week_days` varchar(64) NOT NULL,
  `student_enrolled` int(11) NOT NULL,
  `batch_capacity` int(11) NOT NULL,
  `iscorporate` tinyint(4) NOT NULL DEFAULT '0',
  `currency_id` int(11) NOT NULL,
  `batch_fee_type` tinyint(4) NOT NULL,
  `fees` decimal(9,2) DEFAULT NULL,
  `course_fee_type` tinyint(4) NOT NULL DEFAULT '1',
  `course_fee` float(9,2) NOT NULL,
  `batch_status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `course_id`, `category_id`, `batch_title`, `description`, `faculty_id`, `branch_id`, `batch_type`, `batch_pattern`, `start_date`, `end_date`, `week_days`, `student_enrolled`, `batch_capacity`, `iscorporate`, `currency_id`, `batch_fee_type`, `fees`, `course_fee_type`, `course_fee`, `batch_status`, `created`, `updated`) VALUES
(1, 1, 8, 'RHCE', 'RHCE - Full Time', 1, 1, 5, 4, '2016-06-13 00:00:00', '2016-06-13 00:00:00', '0,1,2,3,4,5', 5, 15, 0, 1, 2, '35000.00', 1, 0.00, 0, '0000-00-00 00:00:00', '2016-06-28 03:14:57'),
(3, 4, 8, 'batch1', 'batch1', 2, 3, 5, 5, '2016-06-15 00:00:00', '2016-06-07 00:00:00', '', 0, 0, 0, 1, 1, '0.00', 2, 0.00, 0, '2016-06-28 03:17:52', '2016-06-28 03:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `batches_students`
--

CREATE TABLE `batches_students` (
  `batch_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `student_rating` int(11) NOT NULL,
  `student_comments` text NOT NULL,
  `faculty_rating` int(11) NOT NULL,
  `faculty_comments` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batch_pattern`
--

CREATE TABLE `batch_pattern` (
  `batch_pattern_id` int(11) NOT NULL,
  `batch_pattern` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_pattern`
--

INSERT INTO `batch_pattern` (`batch_pattern_id`, `batch_pattern`, `active`, `created`, `updated`) VALUES
(1, 'Weekdays', 1, '2016-06-21 01:05:54', '2016-06-21 00:00:00'),
(2, 'Weekends', 1, '2016-06-21 01:05:54', '2016-06-21 00:00:00'),
(3, 'Alternate Days', 1, '2016-06-21 01:05:54', '2016-06-21 00:00:00'),
(4, 'Weekly', 1, '2016-06-21 01:05:54', '2016-06-21 00:00:00'),
(5, 'Monthly', 1, '2016-06-21 01:05:54', '2016-06-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `batch_type`
--

CREATE TABLE `batch_type` (
  `batch_type_id` int(11) NOT NULL,
  `batch_type_name` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_type`
--

INSERT INTO `batch_type` (`batch_type_id`, `batch_type_name`, `active`, `created`, `updated`) VALUES
(1, 'Online', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Webminar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Seminar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Instructor-Led Training', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Classroom Training', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) UNSIGNED NOT NULL,
  `enquiry_id` int(11) NOT NULL DEFAULT '0',
  `branch_code` varchar(64) NOT NULL,
  `branch_type` int(11) NOT NULL,
  `branch_name` varchar(128) NOT NULL DEFAULT '',
  `branch_reg_date` date NOT NULL,
  `branch_address` text NOT NULL,
  `branch_area` varchar(64) NOT NULL,
  `land_mark` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email_id` varchar(128) DEFAULT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `branch_status` int(11) NOT NULL,
  `ispublic` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `flags` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `group_membership` tinyint(1) NOT NULL DEFAULT '0',
  `autoresp_email_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `message_auto_response` tinyint(1) NOT NULL DEFAULT '0',
  `signature` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `enquiry_id`, `branch_code`, `branch_type`, `branch_name`, `branch_reg_date`, `branch_address`, `branch_area`, `land_mark`, `city_id`, `zipcode`, `country_id`, `phone`, `mobile`, `email_id`, `manager_id`, `branch_status`, `ispublic`, `flags`, `group_membership`, `autoresp_email_id`, `message_auto_response`, `signature`, `created`, `updated`) VALUES
(1, 0, 'branch1', 2, 'test', '2011-06-30', 'test', 'test', 'test', 2, 575001, 1, '1234567890', '1234567890', '0', 0, 14, 1, 0, 0, 0, 0, 'testing', '2016-06-23 18:56:21', '2016-06-28 00:22:22'),
(2, 0, 'branch2', 3, 'test2', '2016-06-15', 'test2', 'test2', 'test2', 3, 575001, 1, '1234567890', '1234567890', 'test2@gmail.com', 2, 14, 1, 0, 0, 0, 0, 'testing', '2016-06-23 19:56:57', '2016-06-27 23:48:50'),
(3, 0, 'branch3', 2, 'branch3', '2016-06-27', 'branch3', 'branch3', 'branch3', 3, 575001, 1, '1234567890', '1234567890', 'branch3@gmail.com', 1, 14, 1, 0, 0, 0, 0, 'branch3', '2016-06-27 23:52:15', '2016-06-27 23:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `branch_type`
--

CREATE TABLE `branch_type` (
  `branch_type_id` int(11) NOT NULL,
  `branch_type_name` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_type`
--

INSERT INTO `branch_type` (`branch_type_id`, `branch_type_name`, `active`, `created`, `updated`) VALUES
(1, 'Head Office', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Branch', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Franchisee', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '3rd Party', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_requirement`
--

CREATE TABLE `candidate_requirement` (
  `candidate_req_id` int(11) NOT NULL,
  `candidate_req_details` varchar(128) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_requirement`
--

INSERT INTO `candidate_requirement` (`candidate_req_id`, `candidate_req_details`, `active`, `created`, `updated`) VALUES
(1, 'Looking to Start After 2 Weeks', 1, '2016-06-19 15:20:23', '2016-06-19 15:20:23'),
(2, 'Looking to Start After 4 Weeks', 1, '2016-06-19 15:20:23', '2016-06-19 15:20:23'),
(3, 'Need to Arrange for a Demo Class', 1, '2016-06-19 15:20:23', '2016-06-19 15:20:23'),
(4, 'Need to Start the Class ASAP', 1, '2016-06-19 15:20:23', '2016-06-19 15:20:23'),
(5, 'Looking for Placement', 1, '2016-06-19 15:20:23', '2016-06-19 15:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `category_name`, `active`, `created`, `updated`) VALUES
(1, 0, 'Tuition', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 'Test Preparation', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 'Language Learning', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 'IT Courses', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 'School', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 'College', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 'Online Courses', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 'Certificate', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 8, 'Long term course', 1, '2016-06-27 18:21:04', '2016-06-28 00:30:09'),
(11, 10, 'short term course', 1, '2016-06-28 00:24:31', '2016-06-28 00:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(64) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`, `country_id`, `active`, `created`, `updated`) VALUES
(1, 'Chennai', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Thrichy', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bangalore', 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(128) NOT NULL,
  `company_address` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `company_pincode` int(11) NOT NULL,
  `company_email` varchar(128) NOT NULL,
  `company_domain` varchar(64) NOT NULL,
  `company_phone` varchar(11) NOT NULL,
  `company_contact_name` varchar(64) NOT NULL,
  `company_contact_email` varchar(128) NOT NULL,
  `company_contact_mobile` varchar(12) NOT NULL,
  `company_discount` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `city_id`, `company_pincode`, `company_email`, `company_domain`, `company_phone`, `company_contact_name`, `company_contact_email`, `company_contact_mobile`, `company_discount`) VALUES
(1, 'Talentegra', 'No:22,1st Cross St, Radha Nagar, Chrompet', 0, 600044, 'info@talentegra.com', 'www.talentegra.com', '0', 'Santhos', 'santhos@talentegra.com', '0', '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(128) NOT NULL,
  `country_short` varchar(10) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_short`, `active`, `created`, `updated`) VALUES
(1, 'India', 'IND', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'United States of America', 'USA', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Singapore', 'SG', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'United Kingdom', 'UK', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses_catalog`
--

CREATE TABLE `courses_catalog` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `course_code` varchar(40) DEFAULT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `course_summary` text,
  `course_contents` text,
  `course_duration` varchar(64) NOT NULL,
  `course_fee_type` tinyint(4) NOT NULL DEFAULT '1',
  `notes` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses_catalog`
--

INSERT INTO `courses_catalog` (`course_id`, `category_id`, `course_code`, `course_name`, `course_summary`, `course_contents`, `course_duration`, `course_fee_type`, `notes`, `active`, `created`, `updated`) VALUES
(1, 8, 'RH124', 'Redhat System Administration I', '\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n', '\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n', '', 1, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 8, 'RH134', 'Redhat System Administration II', '\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n', '\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n', '', 1, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 'code67', 'Test course', 'Test course', '', '', 2, '', 1, '2016-06-27 18:43:56', '2016-06-27 18:43:56'),
(4, 8, 'certi123', 'Test course', '', '', '', 0, '', 1, '2016-06-27 18:57:04', '2016-06-27 18:57:04'),
(6, 11, 'it123', 'test IT course', '', '', '', 0, '', 1, '2016-06-28 00:49:43', '2016-06-28 00:49:43'),
(7, 10, 'it1234', 'test IT courses', '', '', '', 1, '', 1, '2016-06-28 00:50:26', '2016-06-28 00:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `course_fee_type`
--

CREATE TABLE `course_fee_type` (
  `course_fee_type_id` int(11) NOT NULL,
  `course_fee_type` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_fee_type`
--

INSERT INTO `course_fee_type` (`course_fee_type_id`, `course_fee_type`, `active`, `created`, `updated`) VALUES
(1, 'Paid', 1, '2016-06-19 15:17:34', '2016-06-19 15:17:34'),
(2, 'Free', 1, '2016-06-19 15:17:34', '2016-06-19 15:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(64) NOT NULL,
  `currency_symbol` varchar(11) NOT NULL,
  `currency_short` varchar(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `conversion` decimal(9,2) NOT NULL,
  `active` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_name`, `currency_symbol`, `currency_short`, `country_id`, `conversion`, `active`, `created`) VALUES
(1, 'INR', 'Rs', 'Rs', 1, '0.00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delegations`
--

CREATE TABLE `delegations` (
  `id` int(11) NOT NULL COMMENT 'Id of delegation',
  `manager_id` int(11) NOT NULL COMMENT 'Manager wanting to delegate',
  `delegate_id` int(11) NOT NULL COMMENT 'Employee having the delegation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Delegation of approval';

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `position`, `created`, `updated`) VALUES
(1, 'President', 1, '2016-03-21 12:13:04', '2016-03-21 12:13:04'),
(2, 'Vice President', 2, '2016-03-21 12:13:27', '2016-03-21 12:13:27'),
(3, 'General Manager', 3, '2016-03-21 12:13:40', '2016-03-21 12:13:40'),
(4, 'Regional Manager', 4, '2016-03-21 12:14:29', '2016-03-21 12:14:29'),
(5, 'Manager', 5, '2016-03-21 12:14:39', '2016-03-21 12:14:39'),
(6, 'Faculty', 6, '2016-03-21 12:14:54', '2016-03-21 12:14:54'),
(7, 'Guest Faculty', 7, '2016-03-21 12:15:17', '2016-03-21 12:15:17'),
(8, 'Coordinator', 7, '2016-03-21 12:15:50', '2016-03-21 12:15:50'),
(9, 'Admin Executive', 7, '2016-03-21 12:16:04', '2016-03-21 12:16:04'),
(10, 'Sales Executive', 7, '2016-03-21 12:16:16', '2016-03-21 12:16:16'),
(11, 'Account Executive', 7, '2016-03-21 12:16:50', '2016-03-21 12:16:50'),
(12, 'Permanent Employee', 7, '2016-03-21 12:19:05', '2016-03-21 12:19:05'),
(13, 'Temporary Employee', 8, '2016-03-21 12:19:19', '2016-03-21 12:19:19'),
(14, 'Contract', 8, '2016-03-21 12:19:32', '2016-03-21 12:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `dq_user`
--

CREATE TABLE `dq_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `org_id` int(10) UNSIGNED NOT NULL,
  `default_email_id` int(10) NOT NULL,
  `default_mobile_no` int(10) NOT NULL,
  `status` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dq_user`
--

INSERT INTO `dq_user` (`id`, `org_id`, `default_email_id`, `default_mobile_no`, `status`, `name`, `created`, `updated`) VALUES
(1, 1, 1, 1, 1, 'Vivek R', '2016-04-22 09:09:00', '2016-04-22 11:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `enquiry_date` datetime NOT NULL,
  `enquiry_type` varchar(64) NOT NULL,
  `enquiry_description` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `level` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_type`
--

CREATE TABLE `enquiry_type` (
  `enquiry_type_id` int(11) NOT NULL,
  `enquiry_type_name` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_type`
--

INSERT INTO `enquiry_type` (`enquiry_type_id`, `enquiry_type_name`, `active`, `created`, `updated`) VALUES
(1, 'Course', 1, '2016-06-21 01:29:41', '2016-06-21 01:29:41'),
(2, 'Consultation', 1, '2016-06-21 01:29:41', '2016-06-21 01:29:41'),
(3, 'Franchisee', 1, '2016-06-21 01:29:41', '2016-06-21 01:29:41'),
(4, 'General', 1, '2016-06-21 01:29:41', '2016-06-21 01:29:41'),
(5, 'Appointment', 1, '2016-06-21 01:29:41', '2016-06-21 01:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enroll_id` int(11) NOT NULL,
  `enroll_date` datetime NOT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `score` varchar(10) DEFAULT NULL,
  `registration_fee` float(9,2) NOT NULL,
  `admission_fee` float(9,2) NOT NULL,
  `discount` float(9,2) NOT NULL,
  `discount_percent` float(9,2) NOT NULL,
  `tax` float(9,2) NOT NULL,
  `total_fee` float(9,2) NOT NULL,
  `payment_mode` tinyint(4) NOT NULL,
  `payment_option` tinyint(4) NOT NULL,
  `notes` text,
  `certificate_notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `payee_name` varchar(64) NOT NULL,
  `amount_type` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payable_for` tinyint(4) NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL DEFAULT '0',
  `total_amount` float(9,2) NOT NULL,
  `primary_date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_type` tinyint(4) NOT NULL DEFAULT '0',
  `expense_type` tinyint(4) NOT NULL DEFAULT '0',
  `paid_amount` float(9,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_mode_id` tinyint(4) NOT NULL DEFAULT '1',
  `comments` text NOT NULL,
  `expense_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_eligibility`
--

CREATE TABLE `faculty_eligibility` (
  `faculty_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `review_date` date NOT NULL,
  `review_level` varchar(64) NOT NULL,
  `reivewer_id` int(11) NOT NULL,
  `reviwer_comments` text NOT NULL,
  `shadow_date` date NOT NULL,
  `shadow_level` varchar(64) NOT NULL,
  `shadower_id` int(11) NOT NULL,
  `shadower_comments` text NOT NULL,
  `assesment_comments` text NOT NULL,
  `assesement_status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followup_action`
--

CREATE TABLE `followup_action` (
  `followup_action_id` int(11) NOT NULL,
  `followup_action` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup_action`
--

INSERT INTO `followup_action` (`followup_action_id`, `followup_action`, `active`, `created`, `updated`) VALUES
(1, 'Callback', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Send Course Details', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Send Course Fee', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Send Course Syllabus', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Ready for Admission', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Visited', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Meeting Fixed', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Send Institute Details', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `followup_status_code`
--

CREATE TABLE `followup_status_code` (
  `followup_status_id` int(11) NOT NULL,
  `followup_status` varchar(64) NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup_status_code`
--

INSERT INTO `followup_status_code` (`followup_status_id`, `followup_status`, `active`, `created`, `updated`) VALUES
(1, 'Ringing No Responses', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Need more time to decide', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Want some discount', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Call after a week', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `followup_thread`
--

CREATE TABLE `followup_thread` (
  `followup_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `followup_type` int(11) NOT NULL,
  `interest_level` int(11) NOT NULL,
  `followup_date` datetime NOT NULL,
  `followup_action` int(11) NOT NULL,
  `followup_comments` text NOT NULL,
  `next_followup_date` datetime NOT NULL,
  `next_followup_action` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interest_level`
--

CREATE TABLE `interest_level` (
  `interest_level_id` int(11) NOT NULL,
  `interest_level` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest_level`
--

INSERT INTO `interest_level` (`interest_level_id`, `interest_level`, `active`, `created`, `updated`) VALUES
(1, 'Need to Push', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Not Interested', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Willing to join', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Willing not now', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Highly Interested', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Interested', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `alt_mobile` varchar(16) NOT NULL,
  `ref_name` varchar(64) NOT NULL,
  `ref_mobile` varchar(16) NOT NULL,
  `comments` text NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `country_id` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `source_id`, `staff_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile`, `alt_mobile`, `ref_name`, `ref_mobile`, `comments`, `branch_id`, `course_id`, `country_id`, `active`, `status`, `created`, `updated`) VALUES
(1, 1, 1, 'Jagan', 'Babu', 'Ranga', 'jaganr@gmail.com', '9911001111', '9922110011', '', '', '', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT '',
  `manager` varchar(16) NOT NULL DEFAULT '',
  `status` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `domain` varchar(256) NOT NULL DEFAULT '',
  `extra` text,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `manager`, `status`, `domain`, `extra`, `created`, `updated`) VALUES
(1, 'TesNow', 'Vivek', 1, 'dqserv.com', '', '2016-01-25 20:46:40', '2016-03-21 12:34:45'),
(2, 'DQServ', '', 0, '', NULL, '2016-03-03 04:54:55', '2016-04-23 01:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_fee` float NOT NULL,
  `branch_id` int(11) NOT NULL,
  `acitve` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_course`
--

CREATE TABLE `package_course` (
  `package_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `payment_mode_id` int(11) NOT NULL,
  `payment_mode` varchar(64) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`payment_mode_id`, `payment_mode`, `active`, `created`, `updated`) VALUES
(1, 'Cash', 1, '2016-06-19 16:23:32', '2016-06-19 16:23:32'),
(2, 'Cheque', 1, '2016-06-19 16:23:32', '2016-06-19 16:23:32'),
(3, 'DD', 1, '2016-06-19 16:23:32', '2016-06-19 16:23:32'),
(4, 'Online/NEFT', 1, '2016-06-19 16:23:32', '2016-06-19 16:23:32'),
(5, 'Credit Card', 1, '2016-06-19 16:23:32', '2016-06-19 16:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualification_id` int(11) NOT NULL,
  `qualification` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `source_id` int(11) NOT NULL,
  `source_details` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`source_id`, `source_details`, `active`, `created`, `updated`) VALUES
(1, 'Google', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(2, 'Email', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(3, 'Friends', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(4, 'SMS', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(5, 'Online Promotion', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(6, 'Trainer/Staff ref', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(7, 'School campus', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(8, 'Student Ref', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(9, 'News Paper', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25'),
(10, 'Corporate/Company', 1, '2016-06-19 15:07:25', '2016-06-19 15:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) UNSIGNED NOT NULL,
  `org_id` int(11) NOT NULL DEFAULT '1',
  `branch_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `manager_id` int(11) NOT NULL DEFAULT '0',
  `designation_id` int(11) NOT NULL DEFAULT '7',
  `status` varchar(64) NOT NULL DEFAULT '1',
  `signature` text NOT NULL,
  `lang` varchar(16) DEFAULT NULL,
  `timezone` varchar(64) DEFAULT NULL,
  `locale` varchar(16) DEFAULT NULL,
  `notes` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `org_id`, `branch_id`, `group_id`, `manager_id`, `designation_id`, `status`, `signature`, `lang`, `timezone`, `locale`, `notes`, `created`, `updated`) VALUES
(1, 1, 1, 13, 0, 13, '16', 'testing2', 'english', 'Asia/Kolkata', 'en_CA', '', '2016-06-24 21:19:41', '2016-06-25 01:18:27'),
(2, 2, 2, 13, 1, 9, '16', 'test', 'english', 'Asia/Kolkata', 'en_AG', '', '2016-06-25 02:56:05', '2016-06-25 02:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `staff_branch_access`
--

CREATE TABLE `staff_branch_access` (
  `staff_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `branch_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `flags` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_branch_access`
--

INSERT INTO `staff_branch_access` (`staff_id`, `branch_id`, `group_id`, `flags`) VALUES
(1, 2, 2, 1),
(1, 3, 3, 1),
(3, 1, 4, 1),
(3, 2, 2, 1),
(4, 2, 4, 1),
(4, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `staff_id` int(11) NOT NULL,
  `firstname` varchar(132) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `father_name` varchar(64) NOT NULL,
  `husband_name` varchar(64) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `phone_ext` varchar(6) DEFAULT NULL,
  `mobile` varchar(24) NOT NULL,
  `home_phone` int(11) NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `dob` date NOT NULL,
  `dob_place` varchar(64) NOT NULL,
  `martial_status` varchar(64) NOT NULL,
  `children` tinyint(4) NOT NULL,
  `occupation` varchar(64) NOT NULL,
  `joined_date` date NOT NULL,
  `education` text NOT NULL,
  `specialization` text NOT NULL,
  `achivement_awards` text NOT NULL,
  `events_attended` int(11) NOT NULL,
  `event_trained` int(11) NOT NULL,
  `fulltime` char(3) DEFAULT 'Yes',
  `sms_notification` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isvisible` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `onvacation` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `assigned_only` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `change_passwd` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `max_page_size` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `auto_refresh_rate` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `default_signature_type` enum('none','mine','dept') NOT NULL DEFAULT 'none',
  `default_paper_size` enum('Letter','Legal','Ledger','A4','A3') NOT NULL DEFAULT 'Letter',
  `extra` text,
  `permissions` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`staff_id`, `firstname`, `lastname`, `father_name`, `husband_name`, `phone`, `phone_ext`, `mobile`, `home_phone`, `photo`, `dob`, `dob_place`, `martial_status`, `children`, `occupation`, `joined_date`, `education`, `specialization`, `achivement_awards`, `events_attended`, `event_trained`, `fulltime`, `sms_notification`, `isadmin`, `isvisible`, `onvacation`, `assigned_only`, `change_passwd`, `max_page_size`, `auto_refresh_rate`, `default_signature_type`, `default_paper_size`, `extra`, `permissions`) VALUES
(1, 'manju', 'shri', '', '', '1234567891', '111', '1234567890', 0, '', '1988-03-02', 'mangalore', 'single', 0, '', '2016-06-24', 'BE', '', '', 0, 0, 'no', 1, 0, 1, 0, 1, 0, 3, 3, 'none', 'Legal', '', ''),
(2, 'geetha', 's', '', '', '', '', '1234567890', 0, '', '1988-03-02', 'mangalore', 'single', 0, '', '2016-06-23', 'B com', '', '', 0, 0, 'yes', 0, 0, 1, 0, 1, 0, 7, 7, 'mine', 'Legal', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `stage_id` int(11) NOT NULL,
  `stage_name` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(128) NOT NULL,
  `country_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `country_id`, `active`, `created`, `updated`) VALUES
(1, 'Tamilnadu', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Karnataka', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_type` int(11) NOT NULL DEFAULT '1',
  `status` varchar(64) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_type`, `status`, `active`, `created`, `updated`) VALUES
(1, 1, 'New', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Pending', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Overdue', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Closed', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 4, 'Enrolled', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 'Qualified', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 6, 'Ongoing', 1, '2016-06-19 23:15:22', '2016-06-19 23:15:22'),
(8, 6, 'Upcoming', 1, '2016-06-19 23:15:22', '2016-06-19 23:15:22'),
(9, 6, 'Completed', 1, '2016-06-19 23:15:22', '2016-06-19 23:15:22'),
(10, 6, 'Cancelled', 1, '2016-06-19 23:15:22', '2016-06-19 23:15:22'),
(11, 6, 'Postponed', 1, '2016-06-19 23:15:22', '2016-06-19 23:15:22'),
(12, 3, 'Processed', 1, '2016-06-19 23:16:55', '2016-06-19 23:16:55'),
(13, 3, 'Disqualified', 1, '2016-06-19 23:16:55', '2016-06-19 23:16:55'),
(14, 5, 'new', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 5, 'old', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 7, 'new', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status_type`
--

CREATE TABLE `status_type` (
  `status_type_id` int(11) NOT NULL,
  `status_type` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_type`
--

INSERT INTO `status_type` (`status_type_id`, `status_type`, `active`, `created`, `updated`) VALUES
(1, 'general', 1, '2016-06-19 18:15:41', '2016-06-19 18:15:41'),
(2, 'expense', 1, '2016-06-19 18:14:55', '2016-06-19 18:14:55'),
(3, 'lead', 1, '2016-06-19 18:14:55', '2016-06-19 18:14:55'),
(4, 'enquiry', 1, '2016-06-19 18:14:55', '2016-06-19 18:14:55'),
(5, 'branch', 1, '2016-06-19 18:14:55', '2016-06-19 18:14:55'),
(6, 'batch', 1, '2016-06-19 18:14:55', '2016-06-19 18:14:55'),
(7, 'staff', 1, '2016-06-24 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `student_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `company` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `notes` text,
  `active` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `branch_id`, `student_name`, `middle_name`, `last_name`, `company`, `email`, `mobile`, `reg_date`, `photo`, `notes`, `active`, `created`, `updated`) VALUES
(4, 1, 'Ashwini', 'S', 'S', NULL, 'ashwini@gamil.com', '1234567890', '2016-03-09', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_stage`
--

CREATE TABLE `student_stage` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `reviewer_comments` text NOT NULL,
  `stage_start` datetime NOT NULL,
  `stage_end` datetime NOT NULL,
  `next_stage` datetime NOT NULL,
  `next_stage_date` datetime NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transport_id` int(11) NOT NULL,
  `transport_mode` varchar(60) NOT NULL DEFAULT '',
  `transport_desc` varchar(30) NOT NULL DEFAULT '',
  `transport_per_unit` int(11) NOT NULL DEFAULT '1',
  `transport_price` float(6,2) NOT NULL DEFAULT '1.00',
  `ispublic` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`transport_id`, `transport_mode`, `transport_desc`, `transport_per_unit`, `transport_price`, `ispublic`) VALUES
(1, 'Auto', 'Autorickshaw', 1, 7.00, 1),
(2, 'Two Wheeler', 'Two Wheeler', 1, 5.00, 1),
(3, 'Actual', 'Actual Cost', 1, 1.00, 1),
(4, 'Car', 'Car', 1, 10.00, 1),
(5, 'Taxi', 'Taxi', 1, 8.00, 1),
(6, 'Bus', 'Bus', 1, 1.00, 1),
(7, 'Train', 'Train', 1, 1.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `birth_date` date NOT NULL,
  `martial_status` varchar(64) NOT NULL,
  `husband_name` varchar(64) NOT NULL,
  `guardian` tinyint(4) NOT NULL DEFAULT '0',
  `guardian_name` varchar(64) NOT NULL,
  `guardian_mobile` varchar(16) NOT NULL,
  `father_name` varchar(64) NOT NULL,
  `mother_name` varchar(64) NOT NULL,
  `salary` int(11) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `area` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `level` int(11) NOT NULL,
  `qualification` text NOT NULL,
  `occupation` varchar(64) NOT NULL,
  `physically_challenged` tinyint(4) NOT NULL DEFAULT '1',
  `physically_challenged_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE `user_email` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `flags` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_email`
--

INSERT INTO `user_email` (`id`, `user_id`, `flags`, `address`) VALUES
(1, 1, 0, 'vivekra@talentegra.com'),
(2, 0, 0, 'srividhyav@talentegra.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_mobile`
--

CREATE TABLE `user_mobile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `flags` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `mobile_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_mobile`
--

INSERT INTO `user_mobile` (`id`, `user_id`, `flags`, `mobile_no`) VALUES
(1, 1, 0, '9841533114');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`account_type_id`);

--
-- Indexes for table `arbac_groups`
--
ALTER TABLE `arbac_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arbac_perms`
--
ALTER TABLE `arbac_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arbac_perm_to_group`
--
ALTER TABLE `arbac_perm_to_group`
  ADD PRIMARY KEY (`perm_id`,`group_id`);

--
-- Indexes for table `arbac_perm_to_user`
--
ALTER TABLE `arbac_perm_to_user`
  ADD PRIMARY KEY (`perm_id`,`user_id`);

--
-- Indexes for table `arbac_pms`
--
ALTER TABLE `arbac_pms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`);

--
-- Indexes for table `arbac_system_variables`
--
ALTER TABLE `arbac_system_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arbac_users`
--
ALTER TABLE `arbac_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arbac_user_to_group`
--
ALTER TABLE `arbac_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `arbac_user_variables`
--
ALTER TABLE `arbac_user_variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_index` (`user_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `course_name` (`course_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `batches_students`
--
ALTER TABLE `batches_students`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `batch_pattern`
--
ALTER TABLE `batch_pattern`
  ADD PRIMARY KEY (`batch_pattern_id`),
  ADD UNIQUE KEY `batch_pattern` (`batch_pattern`);

--
-- Indexes for table `batch_type`
--
ALTER TABLE `batch_type`
  ADD PRIMARY KEY (`batch_type_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD UNIQUE KEY `name` (`branch_name`),
  ADD UNIQUE KEY `branch_code` (`branch_code`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `autoresp_email_id` (`autoresp_email_id`);

--
-- Indexes for table `branch_type`
--
ALTER TABLE `branch_type`
  ADD PRIMARY KEY (`branch_type_id`);

--
-- Indexes for table `candidate_requirement`
--
ALTER TABLE `candidate_requirement`
  ADD PRIMARY KEY (`candidate_req_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `courses_catalog`
--
ALTER TABLE `courses_catalog`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `course_fee_type`
--
ALTER TABLE `course_fee_type`
  ADD PRIMARY KEY (`course_fee_type_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `delegations`
--
ALTER TABLE `delegations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dq_user`
--
ALTER TABLE `dq_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `enquiry_type`
--
ALTER TABLE `enquiry_type`
  ADD PRIMARY KEY (`enquiry_type_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `course_id` (`batch_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `followup_action`
--
ALTER TABLE `followup_action`
  ADD PRIMARY KEY (`followup_action_id`);

--
-- Indexes for table `followup_status_code`
--
ALTER TABLE `followup_status_code`
  ADD PRIMARY KEY (`followup_status_id`);

--
-- Indexes for table `interest_level`
--
ALTER TABLE `interest_level`
  ADD PRIMARY KEY (`interest_level_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`payment_mode_id`),
  ADD UNIQUE KEY `payment_mode` (`payment_mode`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`source_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `staff_branch_access`
--
ALTER TABLE `staff_branch_access`
  ADD PRIMARY KEY (`staff_id`,`branch_id`),
  ADD KEY `dept_id` (`branch_id`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`stage_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_type`
--
ALTER TABLE `status_type`
  ADD PRIMARY KEY (`status_type_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `student_stage`
--
ALTER TABLE `student_stage`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`),
  ADD UNIQUE KEY `transport_mode` (`transport_mode`),
  ADD KEY `ispublic` (`ispublic`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address` (`address`),
  ADD KEY `user_email_lookup` (`user_id`);

--
-- Indexes for table `user_mobile`
--
ALTER TABLE `user_mobile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD KEY `user_mobile_lookup` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `account_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `arbac_groups`
--
ALTER TABLE `arbac_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `arbac_perms`
--
ALTER TABLE `arbac_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `arbac_pms`
--
ALTER TABLE `arbac_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `arbac_system_variables`
--
ALTER TABLE `arbac_system_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `arbac_users`
--
ALTER TABLE `arbac_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `arbac_user_variables`
--
ALTER TABLE `arbac_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `batches_students`
--
ALTER TABLE `batches_students`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `batch_pattern`
--
ALTER TABLE `batch_pattern`
  MODIFY `batch_pattern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `batch_type`
--
ALTER TABLE `batch_type`
  MODIFY `batch_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `branch_type`
--
ALTER TABLE `branch_type`
  MODIFY `branch_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `candidate_requirement`
--
ALTER TABLE `candidate_requirement`
  MODIFY `candidate_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses_catalog`
--
ALTER TABLE `courses_catalog`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_fee_type`
--
ALTER TABLE `course_fee_type`
  MODIFY `course_fee_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `delegations`
--
ALTER TABLE `delegations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of delegation';
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dq_user`
--
ALTER TABLE `dq_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquiry_type`
--
ALTER TABLE `enquiry_type`
  MODIFY `enquiry_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followup_action`
--
ALTER TABLE `followup_action`
  MODIFY `followup_action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `followup_status_code`
--
ALTER TABLE `followup_status_code`
  MODIFY `followup_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `interest_level`
--
ALTER TABLE `interest_level`
  MODIFY `interest_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `stage_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `status_type`
--
ALTER TABLE `status_type`
  MODIFY `status_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_email`
--
ALTER TABLE `user_email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_mobile`
--
ALTER TABLE `user_mobile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
