-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 07:19 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osams`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_maintenance` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactions` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilities` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reports` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `account_name`, `account_desc`, `file_maintenance`, `submission`, `transactions`, `utilities`, `reports`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'The one who controls the overall', 'Grant', 'Grant', 'Grant', 'Grant', 'Grant', NULL, NULL),
(2, 'Encoder', 'Encoding', 'Deny', 'Grant', 'Deny', 'Deny', 'Grant', '2018-09-23 21:20:48', '2018-10-10 17:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_isdel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `new` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `user_photo`, `user_isdel`, `remember_token`, `created_at`, `updated_at`, `surname`, `first_name`, `middle_name`, `suffix`, `account_id`, `new`) VALUES
(1, 'capitolpampanga@gmail.com', '$2y$10$dfrqFjXFsU4f/LjnYt6dWujfxbmWgOO8QezDcgx5l/1gQ2sKxT9.W', 'capitol.png', '0', 'WNzqeh4TjJwHpEG4VnkPDOScRGY9sllddkAPmBmoBljQq3wASQg3YWMkILi8', '2018-09-20 06:34:49', '2018-09-20 06:34:49', 'Ocampo', 'Albert', NULL, NULL, 1, 0),
(2, 'gary@mail.com', '$2y$10$zjYTMvRkj8OpKV1nkbBtXuP3/g.GDK.IxLk3fukYRc2KGYPnGwneC', 'None', '0', NULL, '2018-09-21 22:45:20', '2018-09-21 22:45:20', 'Smith', 'Gary', 'Lee', NULL, 1, 0),
(3, 'jefuwacov@polyswarms.com', '$2y$10$5e2MHWodIYdlPa2T3SPIPuk1hN0gNCgwKv.xWxJsYOb8vssmGCW9S', 'avatar5_1537131277.png', '0', NULL, '2018-09-23 21:21:53', '2018-09-24 04:41:36', 'Smith', 'Sonian', 'Coks', NULL, 2, 0),
(4, 'tacoj@spindl-e.com', '$2y$10$zb.jLYx4jINP4RQ1lYa8su6yrPxQssoziRNvQgDxzXwPyPdx06scG', 'avatar5_1537131277.png', '0', NULL, '2018-09-23 21:43:10', '2018-09-23 21:43:10', 'jjjkjk', 'kjjkj', 'jkjk', NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admins_info`
--

CREATE TABLE `admins_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `civil_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admins_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_info`
--

INSERT INTO `admins_info` (`id`, `gender`, `birthdate`, `civil_status`, `mobile_number`, `municipality`, `barangay`, `street`, `admins_id`, `created_at`, `updated_at`) VALUES
(1, 'Male', '1998-02-02', 'Single', '9172250001', 'SANTA RITA', 'San Basilio', 'example street', 2, '2018-09-21 22:45:20', '2018-09-21 22:45:20'),
(2, 'Male', '2018-09-01', 'Single', '9172550100', 'CITY OF SAN FERNANDO (Capital)', 'Santo Niño', 'example street', 1, NULL, '2018-09-22 18:40:53'),
(3, 'Male', '1998-02-02', 'Single', '9170000000', 'PORAC', 'Balubad', 'example street', 3, '2018-09-23 21:21:53', '2018-09-23 21:21:53'),
(4, 'Male', '1992-02-02', 'Single', '0000000000', 'ANGELES CITY', 'Agapito del Rosario', 'sdsdd', 4, '2018-09-23 21:43:10', '2018-09-23 21:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_isdel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `body`, `cover_photo`, `a_isdel`, `created_at`, `updated_at`) VALUES
(1, 'To all unclaimed cheques under Vice Governor Dennis G. Pineda', 'ATTENTION!\r\nGoodevening! To all unclaimed cheques under Vice Governor Dennis G. Pineda report to me at the office (Office of the Vice Governor, Provincial Capitol of Pampanga 2nd Floor) starting on September 6 - September 21 2018 from 9:00 am to 5:00 pm. Once na hindi na claim until Sept. 21, 2018. Di niyo na mkukuha ang cheque niyo and it will be revert to our General Fund. Please, Kung may kakilala kayo na nasa list. Pki inform namn para ma claim nila ang cheque nila. Sayang din kase. Thankyou and Godbless!\r\n -GAD BENEFICIARIES\r\n -VICE GOVERNOR OLD AND NEW\r\n -VICE GOVERNOR - LAST PATYROLL\r\n -VICE GOVERNOR - PCL 1st - 4th District\r\n\r\nP.S Bring your SCHOOL ID! \r\n\r\n--TEAM DELTA.', 'none', 0, '2018-09-27 12:32:43', '2018-09-27 12:32:43'),
(2, 'To All Provincial Capitol Scholars', 'ATTENTION: TO ALL PROVINCIAL CAPITOL SCHOLARS UNDER VICE GOVERNOR DENNIS G. PINEDA (NCW, VICE GOV OLD AND NEW, GAD) WHOSE COLLEGE COURSES ARE WITH NO BOARD EXAM.\r\nONLY 4TH YEAR COLLEGE STUDENTS WHO SUBMITTED THEIR REQUIREMENTS AT THE OFFICE ARE QUALIFIED TO APPLY.\r\n\r\nWHAT : APPLICATION OF SPECIAL PROGRAM FOR EMPLOYMENT OF STUDENTS (SPES)\r\nWORKING PERIOD : 20 DAYS W/ A SALARY OF P 9,073.60\r\nAdditional Requirments:\r\n- Long White Folder\r\n- Birth Cert ( PSA or NSO) \r\n- TAX Exemption of both parents from BIR ( NET TAXABALE COMPENSATION AFTER TAX NOT EXCEEDING PHP 139,200 annually. (Please bring your Cert of Indigency of your parents with annually income para mkuha niyo yung ITR niyo sw BIR) \r\n- Class Schedule\r\n- 1 pc 2x2 picture white background\r\n- 18-30 years old\r\nFor further info, please inquire @ the Office of the Vice Governor, (Capitol Compound, Brgy. Sto. Niño CSFP) or you may contact us\r\nTelephone No. - 435-77-96\r\nNOTE: SCHOLARS UNDER VICE GOVERNOR DENNIS PINEDA, who will apply for SPES (4th year college students) will no longer be included in the Payroll under Educational Financial Assistance Program\r\nApplication is on going until Aug. 24, 2018 (Friday)', 'none', 0, '2018-09-27 12:35:10', '2018-09-27 12:35:10'),
(3, 'To All Graduates Of Senior High School (Grade 12)', 'ATTENTION: TO ALL GRADUATES OF SENIOR HIGH SCHOOL (GRADE 12) WITH ACADEMIC AWARDS (with HIGHEST HONOR, with HIGH HONOR with HONOR) IN PUBLIC SCHOOLS WITHIN PAMPANGA\r\nRequirements for the application of Educational Financial Assistance.\r\nSubmission of requirements is @ the Pampanga PROVINCIAL LIBRARY\r\nMOnday to Friday 8:00 AM to 5:00 PM\r\n1. Bio data with 2x2 picture (original)\r\n2. Photocopy of Form 137 or 138\r\n3. Photocopy of Certificate of Honor and Graduation Programme\r\n4. Photocopy of Registration Form (Upon Enrollment)\r\n5. Photocopy of Official receipt ( Upon enrollment)\r\n6. Barangay Indigency (Original)\r\n7. Photocopy of School ID (back to back)\r\nSubmission of requirements is until June 15, 2018 for June enrollees\r\nFor August enrollees until 1st week of September 2018', 'none', 0, '2018-09-27 12:37:07', '2018-09-27 12:37:07'),
(4, 'Awarding of EDUCATIONAL FINANCIAL ASSISTANCE PROGRAM', 'Hi Guys! Eto na! Sorry sa mga umasa at nasaktan. Eto na tlga! The Awarding of EDUCATIONAL FINANCIAL ASSISTANCE PROGRAM will be on June 26, 2018 TUESDAY at Bren Z. Guiao Convention Center City of San Fernando Pamp. Please be there at 6:00 in the morning for the Registration and the Program will start at 8:00 am.\r\nVice Gov OLD AND NEW : District 1, District 2, District 3 and District 4 WHITE SHIRT\r\nPCL - 3rd and 4th District : YELLOW SHIRT\r\nPLEASE BRING YOUR SCHOOL ID WITH YOU. If parent ang kukuha, Authorization and School ID (Photocopy)\r\nThankyou and See you next week!\r\nTEAM DELTA\r\n\r\nPS: AGAIN, MGA GRADUATE NG SENIOR HIGH SCHOOL WALA PA NAMES NIYO JAN. October-November pa lalabas ang list niyo. Kakaubmit niyo lang kase. Last year pa nag submit ang Ma-aaward sa tuesday.\r\nList of under PCL ipopost din po ang inyo sa PAGE NG PAMPANGA COUNCILORS LEAGUE (PCL) under Hon. Board Member Fritzie David Dizon Add the page for updates.', 'none', 0, '2018-09-27 12:39:59', '2018-09-27 12:39:59'),
(5, 'Awarding of Educational Financial Assistance Program Batch 3', 'Awarding of Educational Financial Assistance Program Batch 3 at Bren Z. Guiao Convention Center. A total of 2,911 beneficiaries all over Pampanga with a total amount of 8,733,000 funded by the Governor Lilia Baby Pineda, our Vice Governor Dennis G. Pineda and the Members of the Sangguniang Panlalawigan. The beneficiaries are the Vice Governor Scholars (White Shirt) Vice Governor PCL (Yellow Shirt) PWD’S (Green Shirt) and DAYCARE Workers. (Pink Shirt)\r\nTo the people who made this event possible, Thankyou so much! Especially the PROVINCIAL TREASURER’S OFFICE, THE PROVINCIAL LIBRARY, MIS, PIO, GSO, TO THE BOARD MEMBERS IN THE PROVINCE OF PAMPANGA, Our GOVERNOR LILIA BABY PINEDA AND TO MOST LOVED BY MANY KAPAMPANGAN’S, OUR DEAR VICE GOVERNOR DENNIS “DELTA” GARCIA PINEDA.  \r\nPS: To all beneficiaries who were not able to attend the awarding, Report to me at the Vice Governor’s office starting July 2, 2018 (Monday) onwards.\r\nThank you and have a great day ahead!\r\nTeamDelta!', 'none', 0, '2018-09-27 12:41:01', '2018-09-27 12:41:01'),
(6, 'SAMPLE ANNOUNCEMENT', 'FKDSJFKJFSDFJSDFJSDFKDSJFS', 'none', 0, '2018-10-01 23:42:42', '2018-10-01 23:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(10) UNSIGNED NOT NULL,
  `application_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renew` int(11) NOT NULL,
  `barcode_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `application_isdel` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `application_status`, `renew`, `barcode_image`, `barcode_number`, `applicant_id`, `scholar_id`, `application_isdel`, `created_at`, `updated_at`) VALUES
(1, 'Pre-Approved', 0, 'NONE', 'zA9TbKIht7', 1, 2, NULL, '2018-10-03 14:58:28', '2018-10-03 14:58:28'),
(2, 'Pending', 1, 'NONE', 'WWmnxRJgI9', 6, 2, NULL, '2018-10-08 07:15:03', '2018-10-08 07:15:03'),
(4, 'Pending', 1, 'NONE', 'fDNNR982sj', 9, 7, NULL, '2018-10-09 19:11:20', '2018-10-09 19:11:20'),
(5, 'Pending', 1, 'NONE', 'qwZa9yZzfW', 10, 2, NULL, '2018-10-10 22:10:41', '2018-10-10 22:10:41'),
(6, 'Pre-Approved', 0, 'NONE', 't8012Ubr81', 11, 7, NULL, '2018-10-11 00:36:53', '2018-10-11 00:36:53'),
(7, 'Pending', 1, 'NONE', 'SdA3fEDzv7', 12, 6, NULL, '2018-10-11 01:08:58', '2018-10-11 01:08:58'),
(10, 'Pre-Approved', 0, 'NONE', 'PtRG3NiJBt', 13, 7, NULL, '2018-10-11 07:23:46', '2018-10-11 07:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `approval_date`
--

CREATE TABLE `approval_date` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_approved` date NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approval_date`
--

INSERT INTO `approval_date` (`id`, `date_approved`, `status`, `applicant_id`, `application_id`, `scholarship_id`, `employee_id`) VALUES
(1, '2018-10-03', 'Pre-Approved', 1, 1, 2, 1),
(2, '2018-10-09', 'Pre-Approved', 6, 2, 2, 1),
(6, '2018-10-10', 'Pre-Approved', 9, 4, 7, 1),
(7, '2018-10-11', 'Pre-Approved', 12, 7, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `date`, `time`, `action`, `employee_id`) VALUES
(1, '2018-10-07', '22:27:55', 'Announcement Updated', 1),
(2, '2018-10-08', '11:35:47', 'FAQs Updated new data', 1),
(3, '2018-10-09', '06:45:15', 'Grades Archived', 1),
(4, '2018-10-09', '07:10:58', 'Grades Archived', 1),
(5, '2018-10-09', '08:31:09', 'Grades Archived', 1),
(6, '2018-10-09', '09:04:10', 'Grades Archived', 1),
(7, '2018-10-09', '09:04:54', 'Grades Archived', 1),
(8, '2018-10-09', '01:05:02', 'Grades Restored', 1),
(9, '2018-10-09', '09:05:12', 'Grades Archived', 1),
(10, '2018-10-09', '09:11:17', 'Grades Deleted', 1),
(11, '2018-10-09', '09:13:03', 'Grades Deleted', 1),
(12, '2018-10-09', '09:46:31', 'Grades Deleted', 1),
(13, '2018-10-09', '09:47:10', 'Grades Deleted', 1),
(14, '2018-10-09', '09:53:22', 'Grades Deleted', 1),
(15, '2018-10-10', '11:21:25', 'Application Re-checked', 1),
(16, '2018-10-10', '01:09:27', 'Application Pre-Approved', 1),
(17, '2018-10-10', '01:11:45', 'Application Re-checked', 1),
(18, '2018-10-10', '01:20:58', 'Application Pre-Approved', 1),
(19, '2018-10-10', '01:21:33', 'Application Re-checked', 1),
(20, '2018-10-10', '02:28:45', 'Application Approved', 1),
(21, '2018-10-10', '02:30:51', 'Application Approved', 1),
(22, '2018-10-10', '02:33:07', 'Application Approved', 1),
(23, '2018-10-10', '02:34:01', 'Application Disapproved', 1),
(24, '2018-10-10', '02:50:15', 'Application Disapproved', 1),
(25, '2018-10-10', '02:56:48', 'Application Disapproved', 1),
(26, '2018-10-11', '09:42:36', 'Account Type Updated', 1),
(27, '2018-10-11', '09:42:47', 'Account Type Updated', 1),
(28, '2018-10-11', '10:13:28', 'Scholarship Updated', 1),
(29, '2018-10-11', '10:16:32', 'Scholarship Updated', 1),
(30, '2018-10-11', '10:49:09', 'Scholarship Updated', 1),
(31, '2018-10-11', '11:07:52', 'Scholarship Updated', 1),
(32, '2018-10-11', '11:08:10', 'Scholarship Updated', 1),
(33, '2018-10-11', '11:08:27', 'Scholarship Updated', 1),
(34, '2018-10-11', '11:08:51', 'Scholarship Updated', 1),
(35, '2018-10-11', '11:10:38', 'Scholarship Updated', 1),
(36, '2018-10-11', '11:44:30', 'Scholarship Updated', 1),
(37, '2018-10-11', '11:44:44', 'Scholarship Updated', 1),
(38, '2018-10-11', '02:02:44', 'Scholarship Opened', 1),
(39, '2018-10-11', '09:00:00', 'Application Pre-Approved', 1),
(40, '2018-10-11', '09:00:25', 'Application Re-checked', 1),
(41, '2018-10-11', '09:02:02', 'Application Approved', 1),
(42, '2018-10-11', '09:04:07', 'Scholarship Updated', 1),
(43, '2018-10-11', '09:07:32', 'Scholarship Closed', 1),
(44, '2018-10-11', '09:10:38', 'Scholarship Awarded', 1),
(45, '2018-10-11', '09:17:40', 'Scholarship Opened', 1),
(46, '2018-10-11', '09:43:01', 'Application Pre-Approved', 1),
(47, '2018-10-11', '09:46:38', 'Application Pre-Approved', 1),
(48, '2018-10-11', '09:47:24', 'Application Re-checked', 1),
(49, '2018-10-11', '09:48:07', 'Application Approved', 1),
(50, '2018-10-11', '09:50:20', 'Scholarship Awarded', 1),
(51, '2018-10-11', '09:58:50', 'Scholarship Opened', 1),
(52, '2018-10-11', '11:06:30', 'Application Applied & Pre-approved', 1),
(53, '2018-10-11', '11:09:28', 'Registered new applicant', 1),
(54, '2018-10-11', '11:23:46', 'Application Applied & Pre-approved', 1),
(55, '2018-10-11', '11:39:35', 'Application Applied & Pre-approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `backup_tbl`
--

CREATE TABLE `backup_tbl` (
  `backup_ID` int(11) NOT NULL,
  `backup_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_tbl`
--

INSERT INTO `backup_tbl` (`backup_ID`, `backup_date`) VALUES
(1, '2018-10-10 07:54:00'),
(2, '2018-10-10 07:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `checker`
--

CREATE TABLE `checker` (
  `id` int(11) NOT NULL,
  `chk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checker`
--

INSERT INTO `checker` (`id`, `chk`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

CREATE TABLE `education_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `course` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yr_lvl` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yr_entered` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `college_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_info`
--

INSERT INTO `education_info` (`id`, `course`, `yr_lvl`, `yr_entered`, `duration`, `college_name`, `college_address`, `applicant_id`, `created_at`, `updated_at`) VALUES
(1, 'BSIT', '1st', '2018', 4, 'STI College', 'JASA, CSFP', 1, NULL, NULL),
(2, 'jfsdjfdjjk', '1st', '2015', 12, 'fsdfjfkjdj', 'jkjkkdjfkds', 4, NULL, NULL),
(3, 'Bachelor of Science in Information Technology', '4th', '2015', 4, 'STI College San Fernando', 'JASA City of San Fernando', 5, NULL, NULL),
(4, 'BSIT', '2nd', '2017', 4, 'STI College San Fernando', 'JASA, CSFP', 6, NULL, NULL),
(5, 'BSIT', '1st', '2017', 4, 'STI College', 'CSFP, JASA', 9, NULL, NULL),
(6, 'BSIT', '2nd', '2015', 4, 'STI College', 'JASA, CSFP', 10, NULL, NULL),
(7, 'BSIT', '1st', '2015', 4, 'STI College', 'JASA, CSFP', 11, NULL, NULL),
(8, 'BSIT', '1st', '2018', 4, 'STI College', 'JASA, CSFP', 12, NULL, NULL),
(9, 'BSIT', '2nd', '2015', 4, 'STI College', 'JASA, CSFP', 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eefap`
--

CREATE TABLE `eefap` (
  `id` int(10) UNSIGNED NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_account` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gsurname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gfirst_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmiddle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gsuffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduating` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `general_average` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eefap`
--

INSERT INTO `eefap` (`id`, `surname`, `first_name`, `middle_name`, `suffix`, `mobile_number`, `fb_account`, `gsurname`, `gfirst_name`, `gmiddle_name`, `gsuffix`, `gmobile_number`, `municipality`, `barangay`, `street`, `college_name`, `college_address`, `course`, `major`, `program_type`, `year_level`, `graduating`, `general_average`, `scholarship_id`, `applicant_id`, `application_id`, `created_at`, `updated_at`) VALUES
(1, 'Fierro', 'Camille', 'Solomon', NULL, '9265056213', 'fb.com/camz', 'Fierro', 'Jennalyn', NULL, NULL, '0000000000', 'MEXICO', 'Parian (Poblacion)', NULL, 'STI College', 'San Fernando', 'BSIT', 'General', 'Bachelor\'s Degree', '4th', 'YES', '2.0', 2, 1, 1, NULL, NULL),
(2, 'Smith', 'Sam', '', '', '9280000000', 'fb.com/smithsonian', 'Smith', 'German', 'Lee', '', '9000000000', 'MEXICO', 'Nueva Victoria', 'example street', 'STI College San Fernando', 'JASA, CSFP', 'BSIT', 'General', 'Bachelor\'s Degree', '2nd', 'YES', 'B+', 2, 6, 2, NULL, NULL),
(3, 'Weird', 'James', NULL, NULL, '0000000000', 'facebook.com/james', 'Weird', 'Jadine', NULL, NULL, '0000000000', 'BACOLOR', 'Santa Barbara', 'example street', 'STI College', 'JASA, CSFP', 'BSIT', 'General', '2 Years Course', '2nd', 'YES', '80', 2, 10, 5, NULL, '2018-10-11 06:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `eefapgv`
--

CREATE TABLE `eefapgv` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduating` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `general_average` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awards` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eefapgv`
--

INSERT INTO `eefapgv` (`id`, `created_at`, `updated_at`, `surname`, `first_name`, `middle_name`, `suffix`, `mobile_number`, `municipality`, `barangay`, `street`, `college_name`, `college_address`, `course`, `major`, `program_type`, `year_level`, `graduating`, `general_average`, `awards`, `scholarship_id`, `applicant_id`, `application_id`) VALUES
(2, NULL, '2018-10-11 04:40:29', 'Swift', 'Taylor', NULL, NULL, '0000000000', 'SASMUAN (Sexmoan)', 'San Antonio', 'example street', 'STI College', 'CSFP, JASA', 'BSIT', 'General', 'Bachelor\'s Degree', '1st', 'NO', '85', 'None/VG DHVTSU', 7, 9, 4),
(3, NULL, '2018-10-11 00:56:40', 'Doe', 'Jane', '', '', '0000000000', 'PORAC', 'Planas', 'example street', 'STI College', 'JASA, CSFP', 'BSIT', 'General', 'Bachelor\'s Degree', '1st', 'YES', '8.0', 'None/VG DHVTSU', 7, 11, 6),
(4, NULL, NULL, 'Ken', 'Chan', NULL, NULL, '0000000000', 'SAN LUIS', 'Santo Tomas', 'example street', 'dssdfsdj', 'jjjkjkjkj', 'jdfksdjksdjksdjfk', 'fsdsdjfjsd', 'Bachelor\'s Degree', '2nd', 'YES', '90', 'None/VG DHVTSU', 7, 13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `faquestions`
--

CREATE TABLE `faquestions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_isdel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faquestions`
--

INSERT INTO `faquestions` (`id`, `question`, `answer`, `faq_isdel`, `created_at`, `updated_at`) VALUES
(2, 'What is the difference?', 'There is no difference.', 0, NULL, '2018-09-08 10:19:04'),
(3, 'Sample 1', 'sampldfdsfdsfdfsfsdfdsfdsfsdfsdfsdfsdfskjnjsdssd', 0, '2018-09-09 10:35:40', '2018-10-08 07:35:47'),
(4, 'Sample 2', 'fsdffsfdsfgfgsfdvcbvjhkffdgfsdffsfdsfgfgsfdvcbvjhkffdgfsdffsfdsfg', 0, '2018-09-09 10:37:45', '2018-09-09 10:37:58'),
(5, 'Sample 3', 'dfdsfsdfdsfdsfdsdfsdfsdfsdfdsfdsfdsfsdf', 0, '2018-09-09 10:40:13', '2018-09-09 10:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grades` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grades_isdel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `subject`, `grades`, `student_id`, `semester`, `new`, `created_at`, `updated_at`, `grades_isdel`) VALUES
(1, 'Subject 1', '80', 6, '1st', 1, '2018-10-08 07:15:03', '2018-10-08 07:15:03', 0),
(2, 'Subject 2', '90', 6, '1st', 1, '2018-10-08 07:15:03', '2018-10-08 07:15:03', 0),
(3, 'Subject 3', '95', 6, '1st', 1, '2018-10-08 07:15:03', '2018-10-08 07:15:03', 0),
(4, 'Subject 4', '80', 6, '1st', 1, '2018-10-08 07:15:03', '2018-10-08 07:15:03', 0),
(10, 'Subject 1', '90', 6, '2nd', 1, '2018-10-08 16:00:00', '2018-10-08 16:00:00', 1),
(27, 'sub 1', '80', 11, '1st', 1, '2018-10-11 00:56:40', '2018-10-11 00:56:40', 0),
(28, 'sub 2', '85', 11, '1st', 1, '2018-10-11 00:56:40', '2018-10-11 00:56:40', 0),
(29, 'sub 3', '87', 11, '1st', 1, '2018-10-11 00:56:40', '2018-10-11 00:56:40', 0),
(30, 'sub 4', '83', 11, '1st', 1, '2018-10-11 00:56:40', '2018-10-11 00:56:40', 0),
(39, 'sub 1', '80', 12, '1st', 0, '2018-10-11 01:32:40', '2018-10-11 01:32:40', 1),
(40, 'sub 2', '92', 12, '1st', 0, '2018-10-11 01:32:40', '2018-10-11 01:32:40', 1),
(41, 'sub 3', '82', 12, '1st', 0, '2018-10-11 01:32:40', '2018-10-11 01:32:40', 1),
(42, 'sub 4', '88', 12, '1st', 0, '2018-10-11 01:32:41', '2018-10-11 01:32:41', 1),
(46, 'sub 1 -  fsjfsdjfsdjfjs', '88', 9, '2nd', 0, '2018-10-11 04:25:34', '2018-10-11 04:25:34', 1),
(47, 'sub 2 -  jfsjfsjs', '78', 9, '2nd', 0, '2018-10-11 04:25:34', '2018-10-11 04:25:34', 1),
(48, 'sub 3 - sj jsdfsfsjfjs', '81', 9, '2nd', 0, '2018-10-11 04:25:34', '2018-10-11 04:25:34', 1),
(57, 'sub 1 -  fjsdfjdfjjfklsjfksf', '80', 9, '1st', 1, '2018-10-11 04:40:29', '2018-10-11 04:40:29', 0),
(58, 'sub 2 - jfsjfsjjsdfjsdfjs', '82', 9, '1st', 1, '2018-10-11 04:40:29', '2018-10-11 04:40:29', 0),
(59, 'sub 3 - jfksdjfksdjfksdjfd', '78', 9, '1st', 1, '2018-10-11 04:40:29', '2018-10-11 04:40:29', 0),
(60, 'sub 1 - kjfsjdfsdjjfsj', '88', 12, '2nd', 1, '2018-10-11 05:23:25', '2018-10-11 05:23:25', 0),
(61, 'sub 2 - ojfjsjfkjfsj', '82', 12, '2nd', 1, '2018-10-11 05:23:25', '2018-10-11 05:23:25', 0),
(62, 'sub 3 - jfjsdjsdjfsjfskjfs', '80', 12, '2nd', 1, '2018-10-11 05:23:25', '2018-10-11 05:23:25', 0),
(63, 'sub 4 - jjfjsdjfsjsdjks', '83', 12, '2nd', 1, '2018-10-11 05:23:25', '2018-10-11 05:23:25', 0),
(67, 'Sbdjfksdjfsjd', '80', 10, '1st', 0, '2018-10-11 05:42:13', '2018-10-11 05:42:13', 1),
(68, 'sdsjsdkfjsdfjsdjf', '97', 10, '1st', 0, '2018-10-11 05:42:13', '2018-10-11 05:42:13', 1),
(69, 'sdfsfsjfskjskjfskj', '90', 10, '1st', 0, '2018-10-11 05:42:13', '2018-10-11 05:42:13', 1),
(70, 'ssdsdsdsdsds', '88', 10, '1st', 0, '2018-10-11 05:42:13', '2018-10-11 05:42:13', 1),
(71, 'sub 1 - jfjsfjsdfsdjskdjfks', '81', 10, '2nd', 1, '2018-10-11 06:07:26', '2018-10-11 06:07:26', 0),
(72, 'sub 2 -  jjfsdjfksdjksjfksjd', '86', 10, '2nd', 1, '2018-10-11 06:07:26', '2018-10-11 06:07:26', 0),
(73, 'sub 3 - jffdjsjdsfkjds', '84', 10, '2nd', 1, '2018-10-11 06:07:26', '2018-10-11 06:07:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guardian_info`
--

CREATE TABLE `guardian_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bday` date NOT NULL,
  `relationship` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardian_info`
--

INSERT INTO `guardian_info` (`id`, `surname`, `first_name`, `middle_name`, `suffix`, `mobile_number`, `gender`, `nationality`, `occupation`, `civil_status`, `municipality`, `barangay`, `street`, `bday`, `relationship`, `applicant_id`, `created_at`, `updated_at`) VALUES
(1, 'Luna', 'Joseph', 'Mondo', '', '9172551750', 'Male', 'Filipino', 'Doctor', 'Married', 'BACOLOR', 'Santa Barbara', 'example street', '1992-02-02', 'Father', 1, NULL, NULL),
(2, 'Kjkjk', 'Jkjkjkk', 'Jkjkj', 'Jjkjk', '9173333333', 'Male', 'Filipino', 'Fsdjsfdk', 'Married', 'ANGELES CITY', 'Agapito del Rosario', 'sasas', '1992-02-02', 'Father', 4, NULL, NULL),
(3, 'Fierro', 'Jennalyn', 'Solomon', '', '9265056213', 'Female', 'Filipino', 'Clerk', 'Married', 'MEXICO', 'Lagundi', NULL, '1975-02-14', 'Mother', 5, NULL, NULL),
(4, 'Smith', 'German', 'Lee', '', '9000000000', 'Male', 'Filipino', 'Engineer', 'Married', 'MEXICO', 'Nueva Victoria', 'example street', '2018-10-08', 'Father', 6, NULL, NULL),
(5, 'Swift', 'Selena', '', '', '0000000000', 'Female', 'Filipino', 'Housewife', 'Married', 'SAN LUIS', 'Santo Rosario', 'example street', '2018-10-11', 'Mother', 9, NULL, NULL),
(6, 'Weird', 'Jadine', '', '', '0000000000', 'Male', 'Filipino', 'Engineer', 'Married', 'MASANTOL', 'Malauli', 'example street', '2018-10-11', 'Mother', 10, NULL, NULL),
(7, 'Doe', 'Jones', '', '', '0000000000', 'Male', 'Filipino', 'Teacher', 'Married', 'MEXICO', 'Pandacaqui', 'example street', '2018-10-11', 'Father', 11, NULL, NULL),
(8, 'Harden', 'Jose', '', '', '0000000000', 'Male', 'Filipino', 'Basketball Player', 'Married', 'MABALACAT CITY', 'Dau', 'example street', '2018-10-11', 'Father', 12, NULL, NULL),
(9, 'Ken', 'Chong', '', '', '0000000000', 'Male', 'Filipino', 'Engineer', 'Married', 'MINALIN', 'Saplad', 'example street', '2018-10-11', 'Uncle', 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `scholar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`id`, `action`, `date`, `time`, `applicant_id`, `scholar_id`) VALUES
(1, 'Application Approved', '2018-10-04', '07:17:23', 1, 2),
(2, 'Application Cancelled', '2018-10-04', '08:26:52', 4, 2),
(3, 'Application Cancelled', '2018-10-04', '12:11:13', 4, 7),
(4, 'Application Cancelled', '2018-10-08', '04:32:36', 4, 6),
(5, 'Application Cancelled', '2018-10-08', '04:41:14', 4, 7),
(6, 'Application Pre-Approved', '2018-10-09', '10:51:49', 6, 2),
(7, 'Application Cancelled', '2018-10-10', '11:10:09', 9, 7),
(8, 'Application Re-checked', '2018-10-10', '11:21:25', 6, 2),
(9, 'Application Pre-Approved', '2018-10-10', '01:09:27', 9, 7),
(10, 'Application Re-checked', '2018-10-10', '01:11:45', 9, 7),
(11, 'Application Pre-Approved', '2018-10-10', '01:20:58', 9, 7),
(12, 'Application Re-checked', '2018-10-10', '01:21:33', 9, 7),
(13, 'Application Approved', '2018-10-10', '02:28:45', 4, 7),
(14, 'Application Approved', '2018-10-10', '02:30:51', 4, 7),
(15, 'Application Approved', '2018-10-10', '02:33:07', 4, 7),
(19, 'Application Disapproved', '2018-10-10', '02:56:48', 6, 2),
(20, 'Application Disapproved', '2018-10-10', '02:56:48', 2, 2),
(21, 'Cheques Released', '2018-10-11', '12:08:06', 9, NULL),
(22, 'Cheques Released', '2018-10-11', '12:09:39', 9, NULL),
(23, 'Application need to renew', '2018-10-11', '12:09:39', 9, 7),
(24, 'Cheques Released', '2018-10-11', '12:10:16', 9, NULL),
(25, 'Application need to renew', '2018-10-11', '12:10:16', 9, 7),
(26, 'Application Renewed', '2018-10-11', '08:28:16', 9, 7),
(29, 'Application Pre-Approved', '2018-10-11', '09:00:00', 12, 6),
(30, 'Application Re-checked', '2018-10-11', '09:00:25', 12, 6),
(31, 'Application Approved', '2018-10-11', '09:02:02', 7, 6),
(32, 'Cheques Released', '2018-10-11', '09:10:23', 12, NULL),
(33, 'Application need to renew', '2018-10-11', '09:10:23', 12, 6),
(34, 'Application Renewed', '2018-10-11', '09:23:26', 12, 6),
(35, 'Application Pre-Approved', '2018-10-11', '09:43:01', 10, 2),
(36, 'Application Pre-Approved', '2018-10-11', '09:46:38', 11, 7),
(37, 'Application Re-checked', '2018-10-11', '09:47:24', 10, 2),
(38, 'Application Approved', '2018-10-11', '09:48:07', 5, 2),
(39, 'Cheques Released', '2018-10-11', '09:50:04', 10, NULL),
(40, 'Application need to renew', '2018-10-11', '09:50:04', 10, 2),
(41, 'Application Renewed', '2018-10-11', '10:07:26', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `scholar_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `remarks` varchar(350) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `description`, `scholar_id`, `applicant_id`, `date`, `time`, `remarks`, `employee_id`) VALUES
(1, 'Your application has been re-checked.', NULL, 6, '2018-10-10', '11:21:25', NULL, 1),
(2, 'Your application is being consolidate to ensure that there are no duplicate entry.', NULL, 6, '2018-10-10', '11:21:25', NULL, 1),
(7, 'Your application has been pre-approved and being re-check.', 7, 9, '2018-10-10', '01:20:58', NULL, 1),
(8, 'Your application has been re-checked.', 7, 9, '2018-10-10', '01:21:33', NULL, 1),
(9, 'Your application is being consolidate to ensure that there are no duplicate entry.', 7, 9, '2018-10-10', '01:21:33', NULL, 1),
(12, 'Your application has been approved.', 7, 9, '2018-10-10', '02:33:07', 'sample remarks', 1),
(15, 'Your application has been disapproved.', 2, 6, '2018-10-10', '02:56:48', 'sample sample sample sample', 1),
(16, 'Your application has been pre-approved and being re-check.', 7, NULL, '2018-10-11', '12:08:05', 'sample sample', 1),
(17, 'Your application has been pre-approved and being re-check.', 7, NULL, '2018-10-11', '12:09:39', 'sample sample', 1),
(18, 'Releasing of Cheques', 7, 9, '2018-10-11', '12:09:39', 'sample sample', 1),
(19, 'Application need to renew', 7, 9, '2018-10-11', '12:09:39', NULL, 1),
(20, 'Your application has been pre-approved and being re-check.', 7, NULL, '2018-10-11', '12:10:15', 'sample sample', 1),
(21, 'Releasing of Cheques', 7, 9, '2018-10-11', '12:10:16', 'sample sample', 1),
(22, 'Application need to renew', 7, 9, '2018-10-11', '12:10:16', NULL, 1),
(23, 'Your application has been pre-approved and being re-check.', 6, 12, '2018-10-11', '09:00:00', NULL, 1),
(24, 'Your application has been re-checked.', 6, 12, '2018-10-11', '09:00:24', 'sample sample', 1),
(25, 'Your application is being consolidate to ensure that there are no duplicate entry.', 6, 12, '2018-10-11', '09:00:24', 'sample sample', 1),
(26, 'Your application has been approved.', 6, 12, '2018-10-11', '09:02:02', 'sample sample sample', 1),
(27, 'Your application has been pre-approved and being re-check.', 6, NULL, '2018-10-11', '09:07:32', NULL, 1),
(28, 'Your application has been pre-approved and being re-check.', 6, NULL, '2018-10-11', '09:08:43', 'sample sample sample', 1),
(29, 'Your application has been pre-approved and being re-check.', 6, NULL, '2018-10-11', '09:10:23', 'sample sample sample', 1),
(30, 'Releasing of Cheques', 6, 12, '2018-10-11', '09:10:23', 'sample sample sample', 1),
(31, 'Application need to renew', 6, 12, '2018-10-11', '09:10:23', NULL, 1),
(32, 'Your application has been pre-approved and being re-check.', 2, 10, '2018-10-11', '09:43:01', NULL, 1),
(33, 'Your application has been pre-approved and being re-check.', 7, 11, '2018-10-11', '09:46:38', NULL, 1),
(34, 'Your application has been re-checked.', 2, 10, '2018-10-11', '09:47:24', 'samplefdgfdgfdgfdfdgfdgfdgfdgfd', 1),
(35, 'Your application is being consolidate to ensure that there are no duplicate entry.', 2, 10, '2018-10-11', '09:47:24', 'samplefdgfdgfdgfdfdgfdgfdgfdgfd', 1),
(36, 'Your application has been approved.', 2, 10, '2018-10-11', '09:48:07', NULL, 1),
(37, 'Your application has been pre-approved and being re-check.', 2, NULL, '2018-10-11', '09:50:04', 'Congratulations!', 1),
(38, 'Releasing of Cheques', 2, 10, '2018-10-11', '09:50:04', 'Congratulations!', 1),
(39, 'Application need to renew', 2, 10, '2018-10-11', '09:50:04', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 17),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_07_28_071911_create_students_table', 2),
(8, '2018_08_02_165425_create_faquestions_table', 4),
(9, '2018_08_05_073336_create_scholarships_table', 5),
(10, '2018_08_08_083349_add_to_user', 6),
(11, '2018_08_14_163501_create_announcements_table', 7),
(12, '2018_08_17_043055_create_admins_table', 8),
(19, '2018_08_17_165847_add_to_admin', 9),
(42, '2018_09_02_074615_create_eefap_table', 17),
(43, '2018_09_02_075607_create_eefapgv_table', 17),
(44, '2018_09_02_075715_create_pcl_table', 17),
(53, '2018_09_03_192445_create_application_table', 11),
(54, '2018_09_08_042342_create_approval_date_table', 11),
(55, '2018_09_14_151449_create_table_personal_info', 12),
(57, '2018_09_14_153325_create_table_education_info', 12),
(58, '2018_09_16_135323_create_notifications_table', 13),
(62, '2018_09_16_162352_create_table_tracking', 14),
(66, '2018_09_14_152021_create_table_guardian_info', 15),
(67, '2018_09_17_051416_create_table_log', 18),
(68, '2018_09_18_131755_create_table_reqgv', 15),
(69, '2018_09_18_131955_create_table_reqeefap', 15),
(72, '2018_08_18_174148_create_account_type', 16),
(73, '2018_09_19_171854_add_to_reqeefap', 16),
(74, '2018_09_19_172108_add_to_reqgv', 16),
(75, '2018_08_18_144419_create_admins_info_table', 17),
(79, '2018_09_21_055235_create_table_audit_log', 18),
(80, '2018_09_24_063453_create_verifications_table', 18),
(81, '2018_09_24_064544_add_to_users', 18),
(83, '2018_09_24_100715_create_table_history_logs', 19),
(84, '2018_09_24_113252_add_to_users', 20),
(85, '2018_09_24_122609_add_to_table_admins', 21),
(91, '2018_10_02_144830_add_to_table_active', 22),
(92, '2018_10_03_195927_create_table_grades', 22),
(95, '2018_10_07_200840_create_table_spes', 23);

-- --------------------------------------------------------

--
-- Table structure for table `munbar`
--

CREATE TABLE `munbar` (
  `id` int(11) NOT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `barangay` varchar(500) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `munbar`
--

INSERT INTO `munbar` (`id`, `municipality`, `barangay`, `district`) VALUES
(1, 'ANGELES CITY', 'Agapito del Rosario', '1st District'),
(2, 'ANGELES CITY', 'Amsic', '1st District'),
(3, 'ANGELES CITY', 'Anunas', '1st District'),
(4, 'ANGELES CITY', 'Balibago', '1st District'),
(5, 'ANGELES CITY', 'Capaya', '1st District'),
(6, 'ANGELES CITY', 'Claro M. Recto', '1st District'),
(7, 'ANGELES CITY', 'Cuayan', '1st District'),
(8, 'ANGELES CITY', 'Cutcut', '1st District'),
(9, 'ANGELES CITY', 'Cutud', '1st District'),
(10, 'ANGELES CITY', 'Lourdes North West', '1st District'),
(11, 'ANGELES CITY', 'Lourdes Sur (Talimundoc)', '1st District'),
(12, 'ANGELES CITY', 'Lourdes Sur East', '1st District'),
(13, 'ANGELES CITY', 'Malabanias', '1st District'),
(14, 'ANGELES CITY', 'Margot', '1st District'),
(15, 'ANGELES CITY', 'Ninoy Aquino (Marisol)', '1st District'),
(16, 'ANGELES CITY', 'Mining', '1st District'),
(17, 'ANGELES CITY', 'Pampang', '1st District'),
(18, 'ANGELES CITY', 'Pandan', '1st District'),
(19, 'ANGELES CITY', 'Pulungbulu', '1st District'),
(20, 'ANGELES CITY', 'Pulung Cacutud', '1st District'),
(21, 'ANGELES CITY', 'Pulung Maragul', '1st District'),
(22, 'ANGELES CITY', 'Salapungan', '1st District'),
(23, 'ANGELES CITY', 'San Jose', '1st District'),
(24, 'ANGELES CITY', 'San Nicolas', '1st District'),
(25, 'ANGELES CITY', 'Santa Teresita', '1st District'),
(26, 'ANGELES CITY', 'Santa Trinidad', '1st District'),
(27, 'ANGELES CITY', 'Santo Cristo', '1st District'),
(28, 'ANGELES CITY', 'Santo Domingo', '1st District'),
(29, 'ANGELES CITY', 'Santo Rosario (Poblacion)', '1st District'),
(30, 'ANGELES CITY', 'Sapalibutad', '1st District'),
(31, 'ANGELES CITY', 'Sapangbato', '1st District'),
(32, 'ANGELES CITY', 'Tabun', '1st District'),
(33, 'ANGELES CITY', 'Virgen Delos Remedios', '1st District'),
(34, 'APALIT', 'Balucuc (Nuestra Señora de la Divina Pastora)', '4th District'),
(35, 'APALIT', 'Calantipe (Sto. Niño)', '4th District'),
(36, 'APALIT', 'Cansinala (Nuestra Señora del Rosario)', '4th District'),
(37, 'APALIT', 'Capalangan (Holy Cross)', '4th District'),
(38, 'APALIT', 'Colgante (Holy Family)', '4th District'),
(39, 'APALIT', 'Paligui (Chair of St. Peter / Apu Iru)', '4th District'),
(40, 'APALIT', 'Sampaloc (San Roque)', '4th District'),
(41, 'APALIT', 'San Juan (San Juan Nepomuceno) (Poblacion)', '4th District'),
(42, 'APALIT', 'San Vicente (San Vicente Ferrer) (Business District)', '4th District'),
(43, 'APALIT', 'Sucad (Sta. Lucia)', '4th District'),
(44, 'APALIT', 'Sulipan (Christ the Eternal High Priest)', '4th District'),
(45, 'APALIT', 'Tabuyuc (Santo Rosario)', '4th District'),
(46, 'ARAYAT', 'Arenas', '3rd District'),
(47, 'ARAYAT', 'Baliti', '3rd District'),
(48, 'ARAYAT', 'Batasan', '3rd District'),
(49, 'ARAYAT', 'Buensuceso', '3rd District'),
(50, 'ARAYAT', 'Candating', '3rd District'),
(51, 'ARAYAT', 'Gatiawin', '3rd District'),
(52, 'ARAYAT', 'Guemasan', '3rd District'),
(53, 'ARAYAT', 'La Paz (Turu)', '3rd District'),
(54, 'ARAYAT', 'Lacmit', '3rd District'),
(55, 'ARAYAT', 'Lacquios', '3rd District'),
(56, 'ARAYAT', 'Mangga-Cacutud', '3rd District'),
(57, 'ARAYAT', 'Mapalad', '3rd District'),
(58, 'ARAYAT', 'Palinlang', '3rd District'),
(59, 'ARAYAT', 'Paralaya', '3rd District'),
(60, 'ARAYAT', 'Plazang Luma', '3rd District'),
(61, 'ARAYAT', 'Poblacion', '3rd District'),
(62, 'ARAYAT', 'San Agustin Norte', '3rd District'),
(63, 'ARAYAT', 'San Agustin Sur', '3rd District'),
(64, 'ARAYAT', 'San Antonio', '3rd District'),
(65, 'ARAYAT', 'San Jose Mesulo', '3rd District'),
(66, 'ARAYAT', 'San Juan Bano', '3rd District'),
(67, 'ARAYAT', 'San Mateo', '3rd District'),
(68, 'ARAYAT', 'San Nicolas', '3rd District'),
(69, 'ARAYAT', 'San Roque Bitas', '3rd District'),
(70, 'ARAYAT', 'Cupang (Santa Lucia)', '3rd District'),
(71, 'ARAYAT', 'Matamo (Santa Lucia)', '3rd District'),
(72, 'ARAYAT', 'Santo Niño Tabuan', '3rd District'),
(73, 'ARAYAT', 'Suclayin', '3rd District'),
(74, 'ARAYAT', 'Telapayong', '3rd District'),
(75, 'ARAYAT', 'Kaledian (Camba)', '3rd District'),
(76, 'BACOLOR', 'Balas', '3rd District'),
(77, 'BACOLOR', 'Cabalantian', '3rd District'),
(78, 'BACOLOR', 'Cabambangan (Poblacion)', '3rd District'),
(79, 'BACOLOR', 'Cabetican', '3rd District'),
(80, 'BACOLOR', 'Calibutbut', '3rd District'),
(81, 'BACOLOR', 'Concepcion', '3rd District'),
(82, 'BACOLOR', 'Dolores', '3rd District'),
(83, 'BACOLOR', 'Duat', '3rd District'),
(84, 'BACOLOR', 'Macabacle', '3rd District'),
(85, 'BACOLOR', 'Magliman', '3rd District'),
(86, 'BACOLOR', 'Maliwalu', '3rd District'),
(87, 'BACOLOR', 'Mesalipit', '3rd District'),
(88, 'BACOLOR', 'Parulog', '3rd District'),
(89, 'BACOLOR', 'Potrero', '3rd District'),
(90, 'BACOLOR', 'San Antonio', '3rd District'),
(91, 'BACOLOR', 'San Isidro', '3rd District'),
(92, 'BACOLOR', 'San Vicente', '3rd District'),
(93, 'BACOLOR', 'Santa Barbara', '3rd District'),
(94, 'BACOLOR', 'Santa Ines', '3rd District'),
(95, 'BACOLOR', 'Talba', '3rd District'),
(96, 'BACOLOR', 'Tinajero', '3rd District'),
(97, 'CANDABA', 'Bahay Pare', '4th District'),
(98, 'CANDABA', 'Bambang', '4th District'),
(99, 'CANDABA', 'Barangca', '4th District'),
(100, 'CANDABA', 'Barit', '4th District'),
(101, 'CANDABA', 'Buas (Poblacion)', '4th District'),
(102, 'CANDABA', 'Cuayang Bugtong', '4th District'),
(103, 'CANDABA', 'Dalayap', '4th District'),
(104, 'CANDABA', 'Dulong Ilog', '4th District'),
(105, 'CANDABA', 'Gulap', '4th District'),
(106, 'CANDABA', 'Lanang', '4th District'),
(107, 'CANDABA', 'Lourdes', '4th District'),
(108, 'CANDABA', 'Magumbali', '4th District'),
(109, 'CANDABA', 'Mandasig', '4th District'),
(110, 'CANDABA', 'Mandili', '4th District'),
(111, 'CANDABA', 'Mangga', '4th District'),
(112, 'CANDABA', 'Mapaniqui', '4th District'),
(113, 'CANDABA', 'Paligui', '4th District'),
(114, 'CANDABA', 'Pangclara', '4th District'),
(115, 'CANDABA', 'Pansinao', '4th District'),
(116, 'CANDABA', 'Paralaya (Poblacion)', '4th District'),
(117, 'CANDABA', 'Pasig', '4th District'),
(118, 'CANDABA', 'Pescadores (Poblacion)', '4th District'),
(119, 'CANDABA', 'Pulong Gubat', '4th District'),
(120, 'CANDABA', 'Pulong Palazan', '4th District'),
(121, 'CANDABA', 'Salapungan', '4th District'),
(122, 'CANDABA', 'San Agustin (Poblacion)', '4th District'),
(123, 'CANDABA', 'Santo Rosario', '4th District'),
(124, 'CANDABA', 'Tagulod', '4th District'),
(125, 'CANDABA', 'Talang', '4th District'),
(126, 'CANDABA', 'Tenejero', '4th District'),
(127, 'CANDABA', 'Vizal San Pablo', '4th District'),
(128, 'CANDABA', 'Vizal Santo Cristo', '4th District'),
(129, 'CANDABA', 'Vizal Santo Niño', '4th District'),
(130, 'FLORIDABLANCA', 'Anon', '2nd District'),
(131, 'FLORIDABLANCA', 'Apalit', '2nd District'),
(132, 'FLORIDABLANCA', 'Basa Air Base', '2nd District'),
(133, 'FLORIDABLANCA', 'Benedicto', '2nd District'),
(134, 'FLORIDABLANCA', 'Bodega', '2nd District'),
(135, 'FLORIDABLANCA', 'Cabangcalan', '2nd District'),
(136, 'FLORIDABLANCA', 'Calabasa', '2nd District'),
(137, 'FLORIDABLANCA', 'Calantas', '2nd District'),
(138, 'FLORIDABLANCA', 'Carmencita', '2nd District'),
(139, 'FLORIDABLANCA', 'Consuelo', '2nd District'),
(140, 'FLORIDABLANCA', 'Dampe', '2nd District'),
(141, 'FLORIDABLANCA', 'Del Carmen', '2nd District'),
(142, 'FLORIDABLANCA', 'Fortuna', '2nd District'),
(143, 'FLORIDABLANCA', 'Gutad', '2nd District'),
(144, 'FLORIDABLANCA', 'Mabical', '2nd District'),
(145, 'FLORIDABLANCA', 'Malabo', '2nd District'),
(146, 'FLORIDABLANCA', 'Maligaya', '2nd District'),
(147, 'FLORIDABLANCA', 'Nabuclod', '2nd District'),
(148, 'FLORIDABLANCA', 'Pabanlag', '2nd District'),
(149, 'FLORIDABLANCA', 'Paguiruan', '2nd District'),
(150, 'FLORIDABLANCA', 'Palmayo', '2nd District'),
(151, 'FLORIDABLANCA', 'Pandaguirig', '2nd District'),
(152, 'FLORIDABLANCA', 'Poblacion', '2nd District'),
(153, 'FLORIDABLANCA', 'San Antonio', '2nd District'),
(154, 'FLORIDABLANCA', 'San Isidro', '2nd District'),
(155, 'FLORIDABLANCA', 'San Jose', '2nd District'),
(156, 'FLORIDABLANCA', 'San Nicolas', '2nd District'),
(157, 'FLORIDABLANCA', 'San Pedro', '2nd District'),
(158, 'FLORIDABLANCA', 'San Ramon', '2nd District'),
(159, 'FLORIDABLANCA', 'San Roque', '2nd District'),
(160, 'FLORIDABLANCA', 'Santa Monica', '2nd District'),
(161, 'FLORIDABLANCA', 'Solib', '2nd District'),
(162, 'FLORIDABLANCA', 'Valdez', '2nd District'),
(163, 'FLORIDABLANCA', 'Mawacat', '2nd District'),
(164, 'GUAGUA', 'Bancal', '2nd District'),
(165, 'GUAGUA', 'Plaza Burgos', '2nd District'),
(166, 'GUAGUA', 'San Nicolas 1st', '2nd District'),
(167, 'GUAGUA', 'San Pedro', '2nd District'),
(168, 'GUAGUA', 'San Rafael', '2nd District'),
(169, 'GUAGUA', 'San Roque', '2nd District'),
(170, 'GUAGUA', 'Sta. Filomena', '2nd District'),
(171, 'GUAGUA', 'Sto. Cristo', '2nd District'),
(172, 'GUAGUA', 'Sto. Niño', '2nd District'),
(173, 'GUAGUA', 'San Vicente (Ebus)', '2nd District'),
(174, 'GUAGUA', 'Lambac', '2nd District'),
(175, 'GUAGUA', 'Magsaysay', '2nd District'),
(176, 'GUAGUA', 'Maquiapo', '2nd District'),
(177, 'GUAGUA', 'Natividad', '2nd District'),
(178, 'GUAGUA', 'Pulungmasle', '2nd District'),
(179, 'GUAGUA', 'Rizal', '2nd District'),
(180, 'GUAGUA', 'Ascomo', '2nd District'),
(181, 'GUAGUA', 'Jose Abad Santos (Siran)', '2nd District'),
(182, 'GUAGUA', 'San Pablo', '2nd District'),
(183, 'GUAGUA', 'San Juan 1st', '2nd District'),
(184, 'GUAGUA', 'San Jose', '2nd District'),
(185, 'GUAGUA', 'San Matias', '2nd District'),
(186, 'GUAGUA', 'San Isidro', '2nd District'),
(187, 'GUAGUA', 'San Antonio', '2nd District'),
(188, 'GUAGUA', 'San Agustin', '2nd District'),
(189, 'GUAGUA', 'San Juan Bautista', '2nd District'),
(190, 'GUAGUA', 'San Juan Nepomuceno', '2nd District'),
(191, 'GUAGUA', 'San Miguel', '2nd District'),
(192, 'GUAGUA', 'San Nicolas 2nd', '2nd District'),
(193, 'GUAGUA', 'Sta. Ines', '2nd District'),
(194, 'GUAGUA', 'Sta. Ursula', '2nd District'),
(195, 'LUBAO', 'San Isidro', '2nd District'),
(196, 'LUBAO', 'Santiago', '2nd District'),
(197, 'LUBAO', 'Santo Niño (Prado Saba)', '2nd District'),
(198, 'LUBAO', 'San Roque Arbol', '2nd District'),
(199, 'LUBAO', 'Baruya (San Rafael)', '2nd District'),
(200, 'LUBAO', 'Lourdes (Lauc Pau)', '2nd District'),
(201, 'LUBAO', 'Prado Siongco', '2nd District'),
(202, 'LUBAO', 'San Jose Gumi', '2nd District'),
(203, 'LUBAO', 'Balantacan', '2nd District'),
(204, 'LUBAO', 'Santa Teresa 2nd', '2nd District'),
(205, 'LUBAO', 'Bancal Sinubli', '2nd District'),
(206, 'LUBAO', 'Bancal Pugad', '2nd District'),
(207, 'LUBAO', 'Calangain', '2nd District'),
(208, 'LUBAO', 'San Pedro Palcarangan', '2nd District'),
(209, 'LUBAO', 'San Pedro Saug', '2nd District'),
(210, 'LUBAO', 'San Pablo 1st', '2nd District'),
(211, 'LUBAO', 'San Pablo 2nd', '2nd District'),
(212, 'LUBAO', 'De La Paz', '2nd District'),
(213, 'LUBAO', 'Santa Cruz', '2nd District'),
(214, 'LUBAO', 'Remedios', '2nd District'),
(215, 'LUBAO', 'Santa Maria', '2nd District'),
(216, 'LUBAO', 'Del Carmen', '2nd District'),
(217, 'LUBAO', 'San Agustin', '2nd District'),
(218, 'LUBAO', 'Santa Rita', '2nd District'),
(219, 'LUBAO', 'Santa Teresa 1st', '2nd District'),
(220, 'LUBAO', 'Santo Tomas (Poblacion)', '2nd District'),
(221, 'LUBAO', 'San Roque Dau', '2nd District'),
(222, 'LUBAO', 'Santo Cristo', '2nd District'),
(223, 'LUBAO', 'San Matias', '2nd District'),
(224, 'LUBAO', 'Don Ignacio Dimson', '2nd District'),
(225, 'LUBAO', 'Santa Monica', '2nd District'),
(226, 'LUBAO', 'Santo Domingo', '2nd District'),
(227, 'LUBAO', 'San Miguel', '2nd District'),
(228, 'LUBAO', 'Concepcion', '2nd District'),
(229, 'LUBAO', 'San Francisco', '2nd District'),
(230, 'LUBAO', 'San Vicente', '2nd District'),
(231, 'LUBAO', 'San Antonio', '2nd District'),
(232, 'LUBAO', 'San Jose Apunan', '2nd District'),
(233, 'LUBAO', 'San Nicolas 2nd', '2nd District'),
(234, 'LUBAO', 'San Juan (Poblacion)', '2nd District'),
(235, 'LUBAO', 'San Nicolas 1st (Poblacion)', '2nd District'),
(236, 'LUBAO', 'Santa Barbara', '2nd District'),
(237, 'LUBAO', 'Santa Catalina', '2nd District'),
(238, 'LUBAO', 'Santa Lucia (Poblacion)', '2nd District'),
(239, 'MABALACAT CITY', 'Atlu-Bola', '1st District'),
(240, 'MABALACAT CITY', 'Bical', '1st District'),
(241, 'MABALACAT CITY', 'Bundagul', '1st District'),
(242, 'MABALACAT CITY', 'Cacutud', '1st District'),
(243, 'MABALACAT CITY', 'Calumpang', '1st District'),
(244, 'MABALACAT CITY', 'Camachiles', '1st District'),
(245, 'MABALACAT CITY', 'Dapdap', '1st District'),
(246, 'MABALACAT CITY', 'Dau', '1st District'),
(247, 'MABALACAT CITY', 'Dolores', '1st District'),
(248, 'MABALACAT CITY', 'Duquit', '1st District'),
(249, 'MABALACAT CITY', 'Lakandula', '1st District'),
(250, 'MABALACAT CITY', 'Mabiga', '1st District'),
(251, 'MABALACAT CITY', 'Macapagal Village', '1st District'),
(252, 'MABALACAT CITY', 'Mamatitang', '1st District'),
(253, 'MABALACAT CITY', 'Mangalit', '1st District'),
(254, 'MABALACAT CITY', 'Marcos Village', '1st District'),
(255, 'MABALACAT CITY', 'Mawaque (Mauaque)', '1st District'),
(256, 'MABALACAT CITY', 'Paralayunan', '1st District'),
(257, 'MABALACAT CITY', 'Poblacion', '1st District'),
(258, 'MABALACAT CITY', 'San Francisco', '1st District'),
(259, 'MABALACAT CITY', 'San Joaquin', '1st District'),
(260, 'MABALACAT CITY', 'Santa Ines', '1st District'),
(261, 'MABALACAT CITY', 'Santa Maria', '1st District'),
(262, 'MABALACAT CITY', 'Santo Rosario', '1st District'),
(263, 'MABALACAT CITY', 'Sapang Balen', '1st District'),
(264, 'MABALACAT CITY', 'Sapang Biabas', '1st District'),
(265, 'MABALACAT CITY', 'Tabun', '1st District'),
(266, 'MACABEBE', 'Batasan [Bitas]', '4th District'),
(267, 'MACABEBE', 'Caduang Tete', '4th District'),
(268, 'MACABEBE', 'Candelaria', '4th District'),
(269, 'MACABEBE', 'Castuli', '4th District'),
(270, 'MACABEBE', 'Consuelo', '4th District'),
(271, 'MACABEBE', 'Dalayap', '4th District'),
(272, 'MACABEBE', 'Mataguiti', '4th District'),
(273, 'MACABEBE', 'San Esteban', '4th District'),
(274, 'MACABEBE', 'San Francisco', '4th District'),
(275, 'MACABEBE', 'San Gabriel (Poblacion)', '4th District'),
(276, 'MACABEBE', 'San Isidro (Poblacion)', '4th District'),
(277, 'MACABEBE', 'San Jose', '4th District'),
(278, 'MACABEBE', 'San Juan', '4th District'),
(279, 'MACABEBE', 'San Rafael', '4th District'),
(280, 'MACABEBE', 'San Roque (Poblacion)', '4th District'),
(281, 'MACABEBE', 'San Vicente', '4th District'),
(282, 'MACABEBE', 'Santa Cruz (Poblacion)', '4th District'),
(283, 'MACABEBE', 'Santa Lutgarda', '4th District'),
(284, 'MACABEBE', 'Santa Maria', '4th District'),
(285, 'MACABEBE', 'Santa Rita (Poblacion)', '4th District'),
(286, 'MACABEBE', 'Santo Niño', '4th District'),
(287, 'MACABEBE', 'Santo Rosario (Poblacion)', '4th District'),
(288, 'MACABEBE', 'Sapang Pari', '4th District'),
(289, 'MACABEBE', 'Saplad David', '4th District'),
(290, 'MACABEBE', 'Tacasan', '4th District'),
(291, 'MACABEBE', 'Telacsan', '4th District'),
(292, 'MAGALANG', 'Camias', '1st District'),
(293, 'MAGALANG', 'Dolores', '1st District'),
(294, 'MAGALANG', 'San Antonio', '1st District'),
(295, 'MAGALANG', 'San Agustin', '1st District'),
(296, 'MAGALANG', 'Navaling', '1st District'),
(297, 'MAGALANG', 'La Paz', '1st District'),
(298, 'MAGALANG', 'Escaler', '1st District'),
(299, 'MAGALANG', 'San Francisco', '1st District'),
(300, 'MAGALANG', 'San Ildefonso', '1st District'),
(301, 'MAGALANG', 'San Isidro', '1st District'),
(302, 'MAGALANG', 'San Jose', '1st District'),
(303, 'MAGALANG', 'San Miguel', '1st District'),
(304, 'MAGALANG', 'San Nicolas 1st (Poblacion)', '1st District'),
(305, 'MAGALANG', 'San Nicolas 2nd', '1st District'),
(306, 'MAGALANG', 'San Pablo (Poblacion)', '1st District'),
(307, 'MAGALANG', 'San Pedro I', '1st District'),
(308, 'MAGALANG', 'San Pedro II', '1st District'),
(309, 'MAGALANG', 'San Roque', '1st District'),
(310, 'MAGALANG', 'San Vicente', '1st District'),
(311, 'MAGALANG', 'Santa Cruz (Poblacion)', '1st District'),
(312, 'MAGALANG', 'Santa Lucia', '1st District'),
(313, 'MAGALANG', 'Santa Maria', '1st District'),
(314, 'MAGALANG', 'Santo Niño', '1st District'),
(315, 'MAGALANG', 'Santo Rosario', '1st District'),
(316, 'MAGALANG', 'Bucanan', '1st District'),
(317, 'MAGALANG', 'Turu', '1st District'),
(318, 'MAGALANG', 'Ayala', '1st District'),
(319, 'MASANTOL', 'Alauli', '4th District'),
(320, 'MASANTOL', 'Bagang', '4th District'),
(321, 'MASANTOL', 'Balibago', '4th District'),
(322, 'MASANTOL', 'Bebe Anac', '4th District'),
(323, 'MASANTOL', 'Bebe Matua', '4th District'),
(324, 'MASANTOL', 'Bulacus', '4th District'),
(325, 'MASANTOL', 'San Agustin (Caingin)', '4th District'),
(326, 'MASANTOL', 'Santa Monica (Caingin)', '4th District'),
(327, 'MASANTOL', 'Cambasi', '4th District'),
(328, 'MASANTOL', 'Malauli', '4th District'),
(329, 'MASANTOL', 'Nigui', '4th District'),
(330, 'MASANTOL', 'Palimpe', '4th District'),
(331, 'MASANTOL', 'Puti', '4th District'),
(332, 'MASANTOL', 'Sagrada (Tibagin)', '4th District'),
(333, 'MASANTOL', 'San Isidro Anac', '4th District'),
(334, 'MASANTOL', 'San Isidro Matua (Poblacion)', '4th District'),
(335, 'MASANTOL', 'San Nicolas (Poblacion)', '4th District'),
(336, 'MASANTOL', 'San Pedro', '4th District'),
(337, 'MASANTOL', 'Santa Cruz', '4th District'),
(338, 'MASANTOL', 'Santa Lucia Matua', '4th District'),
(339, 'MASANTOL', 'Santa Lucia Paguiaba', '4th District'),
(340, 'MASANTOL', 'Santa Lucia Wakas', '4th District'),
(341, 'MASANTOL', 'Santa Lucia Anac (Poblacion)', '4th District'),
(342, 'MASANTOL', 'Sapang Kawayan', '4th District'),
(343, 'MASANTOL', 'Sua', '4th District'),
(344, 'MASANTOL', 'Santo Niño', '4th District'),
(345, 'MASANTOL', 'Bebe Arabia', '4th District'),
(346, 'MASANTOL', 'Sagrada 2 (sagrada dos)', '4th District'),
(347, 'MEXICO', 'Acli', '3rd District'),
(348, 'MEXICO', 'Anao', '3rd District'),
(349, 'MEXICO', 'Balas', '3rd District'),
(350, 'MEXICO', 'Buenavista', '3rd District'),
(351, 'MEXICO', 'Camuning', '3rd District'),
(352, 'MEXICO', 'Cawayan', '3rd District'),
(353, 'MEXICO', 'Concepcion', '3rd District'),
(354, 'MEXICO', 'Culubasa', '3rd District'),
(355, 'MEXICO', 'Divisoria', '3rd District'),
(356, 'MEXICO', 'Dolores (Piring)', '3rd District'),
(357, 'MEXICO', 'Eden', '3rd District'),
(358, 'MEXICO', 'Gandus', '3rd District'),
(359, 'MEXICO', 'Lagundi', '3rd District'),
(360, 'MEXICO', 'Laput', '3rd District'),
(361, 'MEXICO', 'Laug', '3rd District'),
(362, 'MEXICO', 'Masamat', '3rd District'),
(363, 'MEXICO', 'Masangsang', '3rd District'),
(364, 'MEXICO', 'Nueva Victoria', '3rd District'),
(365, 'MEXICO', 'Pandacaqui', '3rd District'),
(366, 'MEXICO', 'Pangatlan', '3rd District'),
(367, 'MEXICO', 'Panipuan', '3rd District'),
(368, 'MEXICO', 'Parian (Poblacion)', '3rd District'),
(369, 'MEXICO', 'Sabanilla', '3rd District'),
(370, 'MEXICO', 'San Antonio', '3rd District'),
(371, 'MEXICO', 'San Carlos', '3rd District'),
(372, 'MEXICO', 'San Jose Malino', '3rd District'),
(373, 'MEXICO', 'San Jose Matulid', '3rd District'),
(374, 'MEXICO', 'San Juan', '3rd District'),
(375, 'MEXICO', 'San Lorenzo', '3rd District'),
(376, 'MEXICO', 'San Miguel', '3rd District'),
(377, 'MEXICO', 'San Nicolas', '3rd District'),
(378, 'MEXICO', 'San Pablo', '3rd District'),
(379, 'MEXICO', 'San Patricio', '3rd District'),
(380, 'MEXICO', 'San Rafael', '3rd District'),
(381, 'MEXICO', 'San Roque', '3rd District'),
(382, 'MEXICO', 'San Vicente', '3rd District'),
(383, 'MEXICO', 'Santa Cruz', '3rd District'),
(384, 'MEXICO', 'Santa Maria', '3rd District'),
(385, 'MEXICO', 'Santo Domingo', '3rd District'),
(386, 'MEXICO', 'Santo Rosario', '3rd District'),
(387, 'MEXICO', 'Sapang Maisac', '3rd District'),
(388, 'MEXICO', 'Suclaban', '3rd District'),
(389, 'MEXICO', 'Tangle', '3rd District'),
(390, 'MINALIN', 'Bulac', '4th District'),
(391, 'MINALIN', 'Dawe', '4th District'),
(392, 'MINALIN', 'Lourdes', '4th District'),
(393, 'MINALIN', 'Maniango', '4th District'),
(394, 'MINALIN', 'San Francisco Javier', '4th District'),
(395, 'MINALIN', 'San Francisco de Asisi', '4th District'),
(396, 'MINALIN', 'San Isidro', '4th District'),
(397, 'MINALIN', 'San Nicolas (Poblacion)', '4th District'),
(398, 'MINALIN', 'San Pedro', '4th District'),
(399, 'MINALIN', 'Santa Catalina', '4th District'),
(400, 'MINALIN', 'Santa Maria', '4th District'),
(401, 'MINALIN', 'Santa Rita', '4th District'),
(402, 'MINALIN', 'Santo Domingo', '4th District'),
(403, 'MINALIN', 'Santo Rosario', '4th District'),
(404, 'MINALIN', 'Saplad', '4th District'),
(405, 'PORAC', 'Babo Pangulo', '2nd District'),
(406, 'PORAC', 'Babo Sacan (Guanson)', '2nd District'),
(407, 'PORAC', 'Balubad', '2nd District'),
(408, 'PORAC', 'Calzadang Bayu', '2nd District'),
(409, 'PORAC', 'Camias', '2nd District'),
(410, 'PORAC', 'Cangatba', '2nd District'),
(411, 'PORAC', 'Diaz', '2nd District'),
(412, 'PORAC', 'Dolores (Hacienda Dolores)', '2nd District'),
(413, 'PORAC', 'Inararo (Aetas)', '2nd District'),
(414, 'PORAC', 'Jalung', '2nd District'),
(415, 'PORAC', 'Mancatian', '2nd District'),
(416, 'PORAC', 'Manibaug Libutad', '2nd District'),
(417, 'PORAC', 'Manibaug Paralaya', '2nd District'),
(418, 'PORAC', 'Manibaug Pasig', '2nd District'),
(419, 'PORAC', 'Manuali', '2nd District'),
(420, 'PORAC', 'Mitla Proper', '2nd District'),
(421, 'PORAC', 'Palat', '2nd District'),
(422, 'PORAC', 'Pias', '2nd District'),
(423, 'PORAC', 'Pio', '2nd District'),
(424, 'PORAC', 'Planas', '2nd District'),
(425, 'PORAC', 'Poblacion', '2nd District'),
(426, 'PORAC', 'Pulung Santol', '2nd District'),
(427, 'PORAC', 'Salu', '2nd District'),
(428, 'PORAC', 'San Jose Mitla', '2nd District'),
(429, 'PORAC', 'Santa Cruz', '2nd District'),
(430, 'PORAC', 'Sapang Uwak (Aetas)', '2nd District'),
(431, 'PORAC', 'Sepung Bulaun (Baidbid)', '2nd District'),
(432, 'PORAC', 'Siñura (Seniora)', '2nd District'),
(433, 'PORAC', 'Villa Maria (Aetas)', '2nd District'),
(434, 'CITY OF SAN FERNANDO (Capital)', 'Alasas', '3rd District'),
(435, 'CITY OF SAN FERNANDO (Capital)', 'Baliti', '3rd District'),
(436, 'CITY OF SAN FERNANDO (Capital)', 'Bulaon', '3rd District'),
(437, 'CITY OF SAN FERNANDO (Capital)', 'Calulut', '3rd District'),
(438, 'CITY OF SAN FERNANDO (Capital)', 'Dela Paz Norte', '3rd District'),
(439, 'CITY OF SAN FERNANDO (Capital)', 'Dela Paz Sur', '3rd District'),
(440, 'CITY OF SAN FERNANDO (Capital)', 'Del Carmen', '3rd District'),
(441, 'CITY OF SAN FERNANDO (Capital)', 'Del Pilar', '3rd District'),
(442, 'CITY OF SAN FERNANDO (Capital)', 'Del Rosario', '3rd District'),
(443, 'CITY OF SAN FERNANDO (Capital)', 'Dolores', '3rd District'),
(444, 'CITY OF SAN FERNANDO (Capital)', 'Juliana', '3rd District'),
(445, 'CITY OF SAN FERNANDO (Capital)', 'Lara', '3rd District'),
(446, 'CITY OF SAN FERNANDO (Capital)', 'Lourdes', '3rd District'),
(447, 'CITY OF SAN FERNANDO (Capital)', 'Maimpis', '3rd District'),
(448, 'CITY OF SAN FERNANDO (Capital)', 'Magliman', '3rd District'),
(449, 'CITY OF SAN FERNANDO (Capital)', 'Malino', '3rd District'),
(450, 'CITY OF SAN FERNANDO (Capital)', 'Malpitic', '3rd District'),
(451, 'CITY OF SAN FERNANDO (Capital)', 'Pandaras', '3rd District'),
(452, 'CITY OF SAN FERNANDO (Capital)', 'Panipuan', '3rd District'),
(453, 'CITY OF SAN FERNANDO (Capital)', 'Pulung Bulo', '3rd District'),
(454, 'CITY OF SAN FERNANDO (Capital)', 'Santo Rosario (Poblacion)', '3rd District'),
(455, 'CITY OF SAN FERNANDO (Capital)', 'Quebiawan', '3rd District'),
(456, 'CITY OF SAN FERNANDO (Capital)', 'Saguin', '3rd District'),
(457, 'CITY OF SAN FERNANDO (Capital)', 'San Agustin', '3rd District'),
(458, 'CITY OF SAN FERNANDO (Capital)', 'San Felipe', '3rd District'),
(459, 'CITY OF SAN FERNANDO (Capital)', 'San Isidro', '3rd District'),
(460, 'CITY OF SAN FERNANDO (Capital)', 'San Jose', '3rd District'),
(461, 'CITY OF SAN FERNANDO (Capital)', 'San Juan', '3rd District'),
(462, 'CITY OF SAN FERNANDO (Capital)', 'San Nicolas', '3rd District'),
(463, 'CITY OF SAN FERNANDO (Capital)', 'San Pedro Cutud', '3rd District'),
(464, 'CITY OF SAN FERNANDO (Capital)', 'Santa Lucia', '3rd District'),
(465, 'CITY OF SAN FERNANDO (Capital)', 'Santa Teresita', '3rd District'),
(466, 'CITY OF SAN FERNANDO (Capital)', 'Santo Niño', '3rd District'),
(467, 'CITY OF SAN FERNANDO (Capital)', 'Sindalan', '3rd District'),
(468, 'CITY OF SAN FERNANDO (Capital)', 'Telabastagan', '3rd District'),
(469, 'SAN LUIS', 'San Agustin', '4th District'),
(470, 'SAN LUIS', 'San Carlos', '4th District'),
(471, 'SAN LUIS', 'San Isidro', '4th District'),
(472, 'SAN LUIS', 'San Jose', '4th District'),
(473, 'SAN LUIS', 'San Juan', '4th District'),
(474, 'SAN LUIS', 'San Nicolas', '4th District'),
(475, 'SAN LUIS', 'San Roque', '4th District'),
(476, 'SAN LUIS', 'San Sebastian', '4th District'),
(477, 'SAN LUIS', 'Santa Catalina', '4th District'),
(478, 'SAN LUIS', 'Santa Cruz Pambilog', '4th District'),
(479, 'SAN LUIS', 'Santa Cruz Poblacion', '4th District'),
(480, 'SAN LUIS', 'Santa Lucia', '4th District'),
(481, 'SAN LUIS', 'Santa Monica', '4th District'),
(482, 'SAN LUIS', 'Santa Rita', '4th District'),
(483, 'SAN LUIS', 'Santo Niño', '4th District'),
(484, 'SAN LUIS', 'Santo Rosario', '4th District'),
(485, 'SAN LUIS', 'Santo Tomas', '4th District'),
(486, 'SAN SIMON', 'Concepcion', '4th District'),
(487, 'SAN SIMON', 'De La Paz', '4th District'),
(488, 'SAN SIMON', 'San Juan', '4th District'),
(489, 'SAN SIMON', 'San Agustin', '4th District'),
(490, 'SAN SIMON', 'San Isidro', '4th District'),
(491, 'SAN SIMON', 'San Jose', '4th District'),
(492, 'SAN SIMON', 'San Miguel', '4th District'),
(493, 'SAN SIMON', 'San Nicolas', '4th District'),
(494, 'SAN SIMON', 'San Pablo Libutad', '4th District'),
(495, 'SAN SIMON', 'San Pablo Propio', '4th District'),
(496, 'SAN SIMON', 'San Pedro', '4th District'),
(497, 'SAN SIMON', 'Santa Cruz', '4th District'),
(498, 'SAN SIMON', 'Santa Monica', '4th District'),
(499, 'SAN SIMON', 'Santo Niño', '4th District'),
(500, 'SANTA ANA', 'San Agustin (Sumpung)', '3rd District'),
(501, 'SANTA ANA', 'San Bartolome (Patayum)', '3rd District'),
(502, 'SANTA ANA', 'San Joaquin (Poblacion, Canukil)', '3rd District'),
(503, 'SANTA ANA', 'San Jose (Catmun)', '3rd District'),
(504, 'SANTA ANA', 'San Juan (Tinajeru)', '3rd District'),
(505, 'SANTA ANA', 'San Nicolas (Sepung Ilug)', '3rd District'),
(506, 'SANTA ANA', 'San Pablo (Muzun)', '3rd District'),
(507, 'SANTA ANA', 'San Pedro (Calumpang)', '3rd District'),
(508, 'SANTA ANA', 'San Roque (Tuclung)', '3rd District'),
(509, 'SANTA ANA', 'Santa Lucia (Calinan)', '3rd District'),
(510, 'SANTA ANA', 'Santa Maria (Balen Bayu)', '3rd District'),
(511, 'SANTA ANA', 'Santiago (Culsara)', '3rd District'),
(512, 'SANTA ANA', 'Santo Rosario (Pagbatuan)', '3rd District'),
(513, 'SANTA RITA', 'Becuran', '2nd District'),
(514, 'SANTA RITA', 'Dila Dila', '2nd District'),
(515, 'SANTA RITA', 'San Agustin', '2nd District'),
(516, 'SANTA RITA', 'San Basilio', '2nd District'),
(517, 'SANTA RITA', 'San Isidro', '2nd District'),
(518, 'SANTA RITA', 'San Jose', '2nd District'),
(519, 'SANTA RITA', 'San Juan', '2nd District'),
(520, 'SANTA RITA', 'San Matias', '2nd District'),
(521, 'SANTA RITA', 'Santa Monica', '2nd District'),
(522, 'SANTA RITA', 'San Vicente', '2nd District'),
(523, 'SANTO TOMAS', 'Moras De La Paz', '4th District'),
(524, 'SANTO TOMAS', 'Poblacion', '4th District'),
(525, 'SANTO TOMAS', 'San Bartolome', '4th District'),
(526, 'SANTO TOMAS', 'San Matias', '4th District'),
(527, 'SANTO TOMAS', 'San Vicente', '4th District'),
(528, 'SANTO TOMAS', 'Santo Rosario (Pau)', '4th District'),
(529, 'SANTO TOMAS', 'Sapa (Santo Niño)', '4th District'),
(530, 'SASMUAN (Sexmoan)', 'Santo Tomas includes Sitio Sta. Cruz', '2nd District'),
(531, 'SASMUAN (Sexmoan)', 'San Nicolas 2nd includes Sitio Remedios', '2nd District'),
(532, 'SASMUAN (Sexmoan)', 'San Nicolas 1st', '2nd District'),
(533, 'SASMUAN (Sexmoan)', 'Santa Lucia', '2nd District'),
(534, 'SASMUAN (Sexmoan)', 'San Antonio', '2nd District'),
(535, 'SASMUAN (Sexmoan)', 'San Pedro', '2nd District'),
(536, 'SASMUAN (Sexmoan)', 'Santa Monica includes Sitio San Francisco', '2nd District'),
(537, 'SASMUAN (Sexmoan)', 'Malusac \"Sto Rosario\"', '2nd District'),
(538, 'SASMUAN (Sexmoan)', 'Sebitanan \"Sto Cristo\"', '2nd District'),
(539, 'SASMUAN (Sexmoan)', 'Mabuanbuan \"Sagrada Pamilya\"', '2nd District'),
(540, 'SASMUAN (Sexmoan)', 'Batang 1st \"Sto Niño\"', '2nd District'),
(541, 'SASMUAN (Sexmoan)', 'Batang 2nd \"San Vicente\"', '2nd District');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pcl`
--

CREATE TABLE `pcl` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_enrolled` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fsurname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ffirst_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fmiddle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fsuffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foccupation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msurname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mfirst_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mmiddle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msuffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moccupation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcl`
--

INSERT INTO `pcl` (`id`, `created_at`, `updated_at`, `surname`, `first_name`, `middle_name`, `suffix`, `mobile_number`, `district`, `municipality`, `barangay`, `street`, `school_enrolled`, `course`, `year_level`, `gender`, `birthdate`, `nationality`, `religion`, `civil_status`, `birth_place`, `fsurname`, `ffirst_name`, `fmiddle_name`, `fsuffix`, `foccupation`, `msurname`, `mfirst_name`, `mmiddle_name`, `msuffix`, `moccupation`, `address`, `emergency`, `emobile_number`, `scholarship_id`, `applicant_id`, `application_id`) VALUES
(1, NULL, '2018-10-11 05:23:25', 'Harden', 'James', NULL, NULL, '0000000000', '2nd District', 'FLORIDABLANCA', 'Apalit', 'example street', 'STI College', 'BSIT', '1st', 'Male', '1993-11-30', 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'Hhghghgh', 'Hjjkkjk', NULL, NULL, 'Jkhjhjhjh', 'Jhjhjkjhjh', 'Hjhhjh', NULL, NULL, 'Hjhjhjh', 'hjhjjhj', 'Sdfsdfsdjfsdjfksj', '0000000000', 6, 12, 7),
(2, NULL, NULL, 'Harden', 'James', '', '', '0000000000', '1st District', 'MABALACAT CITY', 'Dau', 'example street', 'STI College', 'BSIT', '1st', 'Male', '1993-11-30', 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'Hhghghgh', 'Hjjkkjk', '', '', 'Jkhjhjhjh', 'Jhjhjkjhjh', 'Hjhhjh', '', '', 'Hjhjhjh', 'hjhjjhj', 'Sdfsdfsdjfsdjfksj', '0000000000', 6, 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civil_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `nationality`, `religion`, `civil_status`, `birth_place`, `municipality`, `barangay`, `street`, `applicant_id`, `created_at`, `updated_at`) VALUES
(1, 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'BACOLOR', 'Santa Barbara', 'example street', 1, NULL, NULL),
(2, 'Filipino', 'Iglesia Ni Cristo', 'Single', 'example bplace', 'MINALIN', 'San Nicolas (Poblacion)', 'example street', 4, NULL, '2018-10-07 12:47:32'),
(3, 'Filipino', 'Roman Catholic', 'Single', 'CSFP', 'MEXICO', 'Eden', NULL, 5, NULL, NULL),
(4, 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'MEXICO', 'Nueva Victoria', 'example street', 6, NULL, NULL),
(5, 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'SAN LUIS', 'Santo Rosario', 'example street', 9, NULL, NULL),
(6, 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'MASANTOL', 'Malauli', 'example street', 10, NULL, NULL),
(7, 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'CITY OF SAN FERNANDO (Capital)', 'Dolores', 'example street', 11, NULL, NULL),
(8, 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'MABALACAT CITY', 'Dau', 'example street', 12, NULL, NULL),
(9, 'Filipino', 'Roman Catholic', 'Single', 'example bplace', 'ANGELES CITY', 'Pandan', 'example street', 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reqeefap`
--

CREATE TABLE `reqeefap` (
  `id` int(10) UNSIGNED NOT NULL,
  `biodata` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grades` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brgy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biodata_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `cor_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `or_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `grades_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `brgy_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `oid_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `scholar_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reqeefap`
--

INSERT INTO `reqeefap` (`id`, `biodata`, `cor`, `or`, `grades`, `brgy`, `oid`, `biodata_sub`, `cor_sub`, `or_sub`, `grades_sub`, `brgy_sub`, `oid_sub`, `scholar_id`, `applicant_id`, `application_id`, `created_at`, `updated_at`, `submit`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 2, 1, 1, '2018-10-03 14:58:28', NULL, 0),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 2, 6, 2, '2018-10-08 07:15:03', NULL, 0),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 6, 9, 4, '2018-10-09 19:11:20', NULL, 0),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 2, 10, 5, '2018-10-10 22:10:43', NULL, 0),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 6, 11, 6, '2018-10-11 00:36:53', NULL, 0),
(7, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 6, 12, 7, '2018-10-11 01:08:59', NULL, 0),
(8, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 6, 12, 8, '2018-10-11 01:09:34', NULL, 0),
(10, NULL, NULL, NULL, NULL, NULL, NULL, 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Not Submitted', 7, 13, 10, '2018-10-11 07:23:46', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reqgv`
--

CREATE TABLE `reqgv` (
  `id` int(10) UNSIGNED NOT NULL,
  `biodata` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grades` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brgy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `honor` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biodata_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `cor_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `or_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `grades_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `brgy_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `oid_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `honor_sub` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Submitted',
  `scholar_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(10) UNSIGNED NOT NULL,
  `scholarship_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarship_desc` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `slot` int(11) NOT NULL,
  `status` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `scholarship_name`, `scholarship_desc`, `amount`, `deadline`, `slot`, `status`, `created_at`, `updated_at`, `type`, `supplement`) VALUES
(1, 'NCW', 'Nanay Community Workers', 5000, '2018-11-05', 20, 'CLOSED', NULL, '2018-10-01 23:39:03', 'eefap', NULL),
(2, 'GAD', 'Gender and Development Scholars', 3000, '2018-11-05', 1, 'OPEN', NULL, '2018-10-11 05:58:50', 'eefap', 2),
(3, 'VG OLD and NEW', 'Vice Governor Old and New', 5000, '2018-10-10', 500, 'CLOSED', NULL, '2018-10-02 14:07:08', 'eefap', NULL),
(4, 'GRADUATE FROM PUBLIC', 'Students from public', 5000, '2018-09-06', 500, 'CLOSED', NULL, '2018-09-22 19:34:08', 'eefap', NULL),
(5, 'GRADUATE FROM PRIVATE', 'Students from private', 5000, '2018-09-22', 500, 'CLOSED', NULL, '2018-09-25 23:08:18', 'eefap', NULL),
(6, 'PCL', 'Pampanga Councilors League', 5000, '2018-10-26', 500, 'OPEN', NULL, '2018-10-11 05:17:40', 'pcl', 1),
(7, 'VG DHVTSU', 'Scholars from DHVTSU', 5000, '2018-11-08', 1, 'OPEN', NULL, '2018-10-10 22:02:44', 'eefap-gv', 2),
(8, 'HONORS and RANKS', 'Students with honors or ranks', 5000, '2018-09-27', 20, 'CLOSED', NULL, '2018-09-27 17:15:32', 'eefap-gv', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spes_tbl`
--

CREATE TABLE `spes_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spes_tbl`
--

INSERT INTO `spes_tbl` (`id`, `first_name`, `surname`, `middle_name`, `school_id`) VALUES
(1, 'Juan', 'Ocampo', NULL, '065-2015-A124');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(2, 'Bong', 'Go', NULL, NULL),
(3, 'Zee', 'Go', NULL, NULL),
(4, 'Zyn', 'Tuk', NULL, NULL),
(5, 'Shanz', 'Sy', NULL, NULL),
(6, 'Quan', 'Wo', NULL, NULL),
(7, 'Zen', 'Lee', NULL, NULL),
(8, 'Kryan', 'Loo', NULL, NULL),
(9, 'Lan', 'Wan', NULL, NULL),
(10, 'Zac', 'Vin', NULL, NULL),
(11, 'Lak', 'Yin', NULL, NULL),
(12, 'Lauren', 'Yoyu', NULL, NULL),
(13, 'GONG', 'FANG', '2018-08-02 10:23:19', '2018-08-02 10:23:19'),
(14, 'Bogz', 'Shing', '2018-08-03 00:09:37', '2018-08-03 00:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(10) UNSIGNED NOT NULL,
  `stage` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `stage`, `status`, `scholarship_id`, `created_at`, `updated_at`) VALUES
(1, 'Approved', 'CLOSED', 1, NULL, '2018-10-01 23:39:03'),
(2, 'Open', 'OPEN', 2, NULL, '2018-09-27 20:34:06'),
(3, 'Approved', 'CLOSED', 3, NULL, '2018-10-02 14:07:08'),
(4, 'Approved', 'CLOSED', 4, NULL, '2018-09-22 19:34:08'),
(5, 'Approved', 'CLOSED', 5, NULL, '2018-09-25 23:08:18'),
(6, 'Approved', 'CLOSED', 6, NULL, '2018-10-11 05:04:15'),
(7, 'Approved', 'CLOSED', 7, NULL, '2018-10-10 08:07:30'),
(8, 'Approved', 'CLOSED', 8, NULL, '2018-09-27 17:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bday` date NOT NULL,
  `applicant_isdel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` int(11) NOT NULL DEFAULT '0',
  `chg` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `school_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `surname`, `first_name`, `middle_name`, `gender`, `bday`, `applicant_isdel`, `suffix`, `mobile_number`, `profile_photo`, `new`, `chg`, `code`, `active`, `school_id`) VALUES
(1, 'studioocampo@gmail.com', '$2y$10$0A9vvbWBiBm1gI/iURxNp.x.HJO5OBpIgAx9cqIVbsNMuujLwknJG', 'gHehzrIZrXd2qGe7tdLUwKrTum8FBa9rZCOWtdqrSafiH3rb3mzH0ItnQjC9', '2018-09-27 18:36:39', '2018-09-27 21:15:49', 'Fierro', 'Camille', 'Solomon', 'Female', '1992-02-02', '0', NULL, '9265056213', 'female.png', 0, 0, NULL, 0, '065-2015-A126'),
(4, 'sample@mail.com', '$2y$10$utrDkrOXfINZKU3v/PtwF.TVC7zHx3n4H7I3EPoLrqQu8.zc2S9CC', 'dPnoDMO9oYmcaBnzrmEw1x8XDea5XF8vGe3KFB449xksXI5ubi2jwIkVVXvs', '2018-09-27 18:47:51', '2018-10-07 12:47:32', 'Ocampo', 'Juan', 'Luna', 'Male', '1992-02-02', '0', NULL, '9172500246', 'male.png', 0, 0, NULL, 0, '065-2015-A124'),
(5, 'hefobacuh@xgmailoo.com', '$2y$10$/w.yYF.GZcfWthbGHtEL5.Ap/CioXAJsl93gngsME7soth6.VPaXS', 'RIIpPPBxjBQWQxchHdLs7HbD3GBDXn32TLIpkeGFtOPQWAVpJbfZrcOksTC0', '2018-09-27 21:27:10', '2018-09-27 21:30:43', 'abc', 'sdf', 'adf', 'Female', '1998-06-28', '0', NULL, '9360426646', 'female.png', 0, 0, NULL, 0, '065-2015-A125'),
(6, 'sample1@mail.com', '$2y$10$fIBcm.z8EjgE69sw4E235uiCrc6NFvwxXYbK0W/v5WWknduiETeg2', 'zxJ7MN6OwDS25PYM094QPkaMpXD2XKlDnCErQVczHJdAnJZP4XFBpjHJiKLL', '2018-10-08 07:09:33', '2018-10-08 07:14:04', 'Smith', 'Sam', NULL, 'Male', '1997-10-02', '0', NULL, '9280000000', 'male.png', 0, 0, NULL, 0, '065-2015-AAAA'),
(9, 'sample2@mail.com', '$2y$10$cHaNnVmRX3/T9nEoDWOmlOO5sDkkyJG5m156uB9UK/Olsk/Amk3cW', 'wsYlfei1dI9tGJnaIv9PgERlugVfqbCD8C7bbVyf6W4WOlOvx20E2gokQN28', '2018-10-09 02:57:20', '2018-10-09 03:03:28', 'Swift', 'Taylor', NULL, 'Female', '1996-10-23', '0', NULL, '9059462732', 'female.png', 0, 0, NULL, 0, '068-2015-A126'),
(10, 'veyoneciw@1blackmoon.com', '$2y$10$VqsIIAaEmr8XouNGro1dZ.8oLgE57ER.rhCUyp9LASttsmNZCiv7a', 'jVU2aQjI6cSzyhobIqCk8tDMTGmOiBtvfZT2pTWQYFnYSisd4ccP5ubXMS7L', '2018-10-10 22:07:43', '2018-10-11 05:49:29', 'Weird', 'James', NULL, 'Male', '1997-03-06', '0', NULL, '9213668022', 'male.png', 0, 0, NULL, 0, '065-2015-BBBB'),
(11, 'sample4@mail.com', '$2y$10$6P1Zhe/OfKh0d1AITpjO..Y3Dy4E.WUjjgOqQLmBuedH0xBfZ5vR2', 'Q2KnYzNmG7DWRXmstV5LIcnW2D8XuoCmairY3DiU879ukNDTl3hlMlZwch0Z', '2018-10-11 00:33:46', '2018-10-11 00:35:46', 'Doe', 'Jane', NULL, 'Male', '1991-04-16', '0', NULL, '0000000000', 'male.png', 0, 0, NULL, 0, '10000165211'),
(12, 'sample5@mail.com', '$2y$10$87eoKWvy/aM/T2NYjhMb0ue84NR1tb5Q1G7JxDOIoDwE3alGiaVNa', 'biHfhXIzT1h3VsXZ84CH8tHhv1bIPFkitPUHfQZhn65UlgJXt8mWoGuf2Vbw', '2018-10-11 00:58:09', '2018-10-11 05:03:06', 'Harden', 'James', NULL, 'Male', '1993-11-30', '0', NULL, '9213668022', 'male.png', 0, 0, NULL, 0, '10000161200'),
(13, 'gahake@tryzoe.com', '$2y$10$dPQkNF0qmFGH1u35mT5uNOzBLznYIUjd5Hat8WbPg0FUoDlFp13WK', NULL, '2018-10-11 07:09:11', '2018-10-11 07:30:17', 'Ken', 'Chan', NULL, 'Male', '1992-04-16', '0', NULL, '0000000000', 'male.png', 0, 0, NULL, 0, '10000266452');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_info`
--
ALTER TABLE `admins_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval_date`
--
ALTER TABLE `approval_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_tbl`
--
ALTER TABLE `backup_tbl`
  ADD PRIMARY KEY (`backup_ID`);

--
-- Indexes for table `education_info`
--
ALTER TABLE `education_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eefap`
--
ALTER TABLE `eefap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eefapgv`
--
ALTER TABLE `eefapgv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faquestions`
--
ALTER TABLE `faquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_info`
--
ALTER TABLE `guardian_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `munbar`
--
ALTER TABLE `munbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pcl`
--
ALTER TABLE `pcl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqeefap`
--
ALTER TABLE `reqeefap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqgv`
--
ALTER TABLE `reqgv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spes_tbl`
--
ALTER TABLE `spes_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins_info`
--
ALTER TABLE `admins_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `approval_date`
--
ALTER TABLE `approval_date`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `backup_tbl`
--
ALTER TABLE `backup_tbl`
  MODIFY `backup_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education_info`
--
ALTER TABLE `education_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eefap`
--
ALTER TABLE `eefap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eefapgv`
--
ALTER TABLE `eefapgv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faquestions`
--
ALTER TABLE `faquestions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `guardian_info`
--
ALTER TABLE `guardian_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `munbar`
--
ALTER TABLE `munbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `pcl`
--
ALTER TABLE `pcl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reqeefap`
--
ALTER TABLE `reqeefap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reqgv`
--
ALTER TABLE `reqgv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spes_tbl`
--
ALTER TABLE `spes_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
