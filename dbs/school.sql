-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 08:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `adm_name` varchar(255) NOT NULL,
  `adm_desig` varchar(255) NOT NULL,
  `adm_loc` varchar(255) NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `memb_since` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_photo_name` varchar(255) NOT NULL,
  `adm_photo_path` varchar(255) NOT NULL,
  `adm_photo_type` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adm_members_fee`
--

CREATE TABLE `adm_members_fee` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_members`
--

CREATE TABLE `ad_members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `log_pas` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `access_name` varchar(255) NOT NULL,
  `user_access` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class_teach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_members`
--

INSERT INTO `ad_members` (`id`, `username`, `log_pas`, `email`, `access_name`, `user_access`, `academic_year`, `class_teach`) VALUES
(2, 'digitalcoorg', 'digitalcoorg', 'support@digitalcoorg.com', '', 'admin', '2020-2021', ''),
(3, 'musthu', 'musthu', 'ma.musthafa6@gmail.com', 'admin', 'admin', '2018-2019', 'second_standard'),
(4, 'musthafa', 'musthafa', '', '', 'admin', '2019-2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `studied_upto` varchar(50) NOT NULL,
  `year_passing` varchar(50) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `current_position` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `hometown` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anv_don`
--

CREATE TABLE `anv_don` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `towards` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `assign_title` text NOT NULL,
  `assign_desc` text NOT NULL,
  `assign_date` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `att_date` date DEFAULT NULL,
  `academic_year` varchar(255) NOT NULL,
  `taken_by` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `att_count` int(11) NOT NULL,
  `tot_class` int(11) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `first_name`, `roll_no`, `parent_contact`, `present_class`, `att_date`, `academic_year`, `taken_by`, `type`, `attendance`, `att_count`, `tot_class`, `section`) VALUES
(0, 'Musthafa', '12345', '8277021524', 'first standard', '2020-06-13', '2019-2020', 'musthafa', '', 'Present', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance1`
--

CREATE TABLE `attendance1` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `att_date` date DEFAULT NULL,
  `academic_year` varchar(255) NOT NULL,
  `taken_by` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `att_count` int(11) NOT NULL,
  `tot_class` int(11) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `birthday_status`
--

CREATE TABLE `birthday_status` (
  `id` int(11) NOT NULL,
  `dob_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birthday_status`
--

INSERT INTO `birthday_status` (`id`, `dob_date`, `status`, `academic_year`) VALUES
(0, '2020-05-18', 'sent', '2019-2020'),
(4, '2019-06-08', 'sent', '2019-2020'),
(5, '2019-06-09', 'sent', '2019-2020'),
(6, '2019-06-12', 'sent', '2018-2019'),
(7, '2019-06-13', 'sent', '2018-2019'),
(8, '2019-06-21', 'sent', '2019-2020'),
(9, '2019-06-22', 'sent', '2019-2020'),
(10, '2019-06-23', 'sent', '2019-2020'),
(11, '2019-06-24', 'sent', '2019-2020'),
(12, '2019-06-27', 'sent', '2019-2020'),
(13, '2019-07-02', 'sent', '2019-2020'),
(14, '2019-07-03', 'sent', '2019-2020'),
(15, '2019-07-16', 'sent', '2019-2020'),
(16, '2019-07-17', 'sent', '2019-2020'),
(17, '2019-07-23', 'sent', '2019-2020'),
(18, '2019-07-24', 'sent', '2019-2020'),
(19, '2019-08-31', 'sent', '2019-2020'),
(20, '2019-09-02', 'sent', '2019-2020'),
(21, '2019-09-20', 'sent', '2019-2020'),
(22, '2019-09-26', 'sent', '2019-2020'),
(23, '2019-10-01', 'sent', '2019-2020'),
(24, '2019-11-02', 'sent', '2019-2020'),
(25, '2019-11-19', 'sent', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `shelf_no` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `no_books` int(11) NOT NULL,
  `ad_date` date NOT NULL,
  `spons` varchar(255) NOT NULL,
  `tot_books` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `cat`, `book_id`, `shelf_no`, `author`, `edition`, `no_books`, `ad_date`, `spons`, `tot_books`, `academic_year`) VALUES
(0, 'History', 'history', '123', '1', 'musthu', '1', 5, '0000-00-00', 'musthu', 5, '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_status`
--

CREATE TABLE `certificate_status` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `certi_id` varchar(255) NOT NULL,
  `status_send_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_ad_members`
--

CREATE TABLE `class_ad_members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `log_pas` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `class_teach` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_ad_members`
--

INSERT INTO `class_ad_members` (`id`, `username`, `log_pas`, `email`, `class_teach`, `academic_year`, `section`) VALUES
(1, 'musthu', 'musthu', '', 'first standard', '2018-2019', 'Section A');

-- --------------------------------------------------------

--
-- Table structure for table `contact_school`
--

CREATE TABLE `contact_school` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_fees`
--

CREATE TABLE `enrolled_fees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `st_enroll_no` varchar(255) NOT NULL,
  `fee_paid_amount` int(11) NOT NULL,
  `fee_receipt_date` date NOT NULL,
  `fee_receipt_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_students`
--

CREATE TABLE `enrolled_students` (
  `id` int(11) NOT NULL,
  `admit_to_class` varchar(255) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `mother_tongue` varchar(255) NOT NULL,
  `prev_affi` varchar(255) NOT NULL,
  `tc_no` varchar(255) NOT NULL,
  `tc_date` date NOT NULL,
  `prev_sch_name` varchar(255) NOT NULL,
  `prev_sch_type` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `taluk` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `prev_sch_address` text NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `f_first_name` varchar(255) NOT NULL,
  `f_middle_name` varchar(255) NOT NULL,
  `f_last_name` varchar(255) NOT NULL,
  `m_first_name` varchar(255) NOT NULL,
  `m_middle_name` varchar(255) NOT NULL,
  `m_last_name` varchar(255) NOT NULL,
  `f_adhaar_no` varchar(255) NOT NULL,
  `m_adhaar_no` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age_appro` varchar(255) NOT NULL,
  `stud_adhaar` varchar(255) NOT NULL,
  `urban_rural` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `caste` varchar(255) NOT NULL,
  `f_caste` varchar(255) NOT NULL,
  `m_caste` varchar(255) NOT NULL,
  `social_cat` varchar(255) NOT NULL,
  `bpl` varchar(255) NOT NULL,
  `bpl_no` varchar(255) NOT NULL,
  `bhagya_bond_no` varchar(255) NOT NULL,
  `disabil` varchar(255) NOT NULL,
  `spec_cat` varchar(255) NOT NULL,
  `st_pin` varchar(255) NOT NULL,
  `st_district` varchar(255) NOT NULL,
  `st_taluk` varchar(255) NOT NULL,
  `st_city` varchar(255) NOT NULL,
  `st_locality` varchar(255) NOT NULL,
  `st_address` text NOT NULL,
  `st_mobile` varchar(255) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `f_mobile` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `m_mobile` varchar(255) NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `st_enroll_no` varchar(255) NOT NULL,
  `admis_date` date NOT NULL,
  `bank_acc` varchar(255) NOT NULL,
  `bank_ifsc` varchar(255) NOT NULL,
  `data_opera_name` varchar(255) NOT NULL,
  `applied_date` date NOT NULL,
  `cast_cert_no` varchar(255) NOT NULL,
  `f_cast_cert_no` varchar(255) NOT NULL,
  `m_cast_cert_no` varchar(255) NOT NULL,
  `other_medium` varchar(255) NOT NULL,
  `other_mother_tongue` varchar(255) NOT NULL,
  `other_affiliation` varchar(255) NOT NULL,
  `other_religion` varchar(255) NOT NULL,
  `other_spec_cat` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `fee_paid_amount` int(11) NOT NULL,
  `fee_receipt_date` date NOT NULL,
  `fee_receipt_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `evt_name` varchar(255) NOT NULL,
  `evt_date` date NOT NULL,
  `evt_time` time NOT NULL,
  `evt_details` text NOT NULL,
  `evt_mob` varchar(255) NOT NULL,
  `evt_venue` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `evt_name`, `evt_date`, `evt_time`, `evt_details`, `evt_mob`, `evt_venue`, `academic_year`) VALUES
(1, 'Sports', '2019-07-31', '10:00:00', 'We are celebrating our annual day', '2578309797', 'School', '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `class`, `academic_year`, `date`, `count`) VALUES
(3, 'fa-1', 'first standard', '2017-2018', '2017-11-11', 6),
(4, 'fa-2', 'first standard', '2017-2018', '2017-11-11', 6),
(5, 'fa-3', 'first standard', '2017-2018', '2017-11-11', 6),
(6, 'fa-4', 'first standard', '2017-2018', '2017-11-11', 6),
(7, 'sa-1', 'first standard', '2017-2018', '2017-11-11', 6),
(8, 'sa-2', 'first standard', '2017-2018', '2017-11-11', 6),
(10, 'Fa1', 'prekg', '2018-2019', '2018-08-11', 6),
(11, 'Fa2', 'prekg', '2018-2019', '2018-08-11', 6),
(12, 'Sa1', 'prekg', '2018-2019', '2018-08-11', 6),
(13, 'Fa3', 'prekg', '2018-2019', '2018-08-11', 6),
(14, 'Fa4', 'prekg', '2018-2019', '2018-08-11', 6),
(15, 'Sa2', 'prekg', '2018-2019', '2018-08-11', 6),
(16, 'FA1', 'prekg', '2019-2020', '2019-07-24', 6),
(17, 'FA2', 'prekg', '2019-2020', '2019-07-24', 6),
(18, 'SA1', 'prekg', '2019-2020', '2019-07-24', 6),
(19, 'FA3', 'prekg', '2019-2020', '2019-07-24', 6),
(20, 'FA4', 'prekg', '2019-2020', '2019-07-24', 6),
(21, 'SA2', 'prekg', '2019-2020', '2019-07-24', 6);

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE `exam_timetable` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `towards` varchar(255) NOT NULL,
  `exp_date` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_updated` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(100) NOT NULL,
  `fac_fname` text NOT NULL,
  `fac_lname` text NOT NULL,
  `fac_email` varchar(50) NOT NULL,
  `fac_dob` varchar(255) NOT NULL,
  `parent_contact` varchar(20) NOT NULL,
  `fac_desig` varchar(50) NOT NULL,
  `class_teach` varchar(255) NOT NULL,
  `fac_dep` varchar(100) NOT NULL,
  `fac_prev_org` varchar(100) NOT NULL,
  `fac_quali` varchar(100) NOT NULL,
  `fac_join` varchar(255) NOT NULL,
  `fac_add` varchar(255) NOT NULL,
  `fac_photo_name` varchar(100) NOT NULL,
  `fac_photo_path` varchar(255) NOT NULL,
  `fac_photo_type` varchar(100) NOT NULL,
  `fac_sex` varchar(10) NOT NULL,
  `fac_adhar_name` varchar(100) NOT NULL,
  `fac_adhar_path` varchar(255) NOT NULL,
  `fac_adhar_type` varchar(50) NOT NULL,
  `fac_id_name` varchar(100) NOT NULL,
  `fac_id_path` varchar(255) NOT NULL,
  `fac_id_type` varchar(50) NOT NULL,
  `staff_type` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adhaar_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fac_attendance`
--

CREATE TABLE `fac_attendance` (
  `id` int(11) NOT NULL,
  `first_fname` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `taken_by` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `att_date` date NOT NULL,
  `att_count` int(11) NOT NULL,
  `tot_class` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_name`
--

CREATE TABLE `fee_name` (
  `id` int(11) NOT NULL,
  `fee_name` varchar(255) NOT NULL,
  `fee_details` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass`
--

CREATE TABLE `gate_pass` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `gate_reason` varchar(255) NOT NULL,
  `gate_permit_go` varchar(255) NOT NULL,
  `gate_with` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `issued_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `ho_day` varchar(255) NOT NULL,
  `ho_date` date NOT NULL,
  `ho_name` varchar(255) NOT NULL,
  `ho_details` text NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` int(11) NOT NULL,
  `last_updated` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `avl_quantity` int(11) NOT NULL,
  `ware_stock_loc` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `item_condition` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_appli`
--

CREATE TABLE `leave_appli` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `details` text NOT NULL,
  `applied_date` date NOT NULL,
  `class` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_reply`
--

CREATE TABLE `leave_reply` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `rep_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `letterhead`
--

CREATE TABLE `letterhead` (
  `id` int(11) NOT NULL,
  `lh_title` varchar(255) NOT NULL,
  `lh_desc` longtext NOT NULL,
  `printed_date` date NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `bor_name` varchar(255) NOT NULL,
  `bor_id` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `iss_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `recie_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `kannada` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `evs` int(11) NOT NULL,
  `drawings` int(11) NOT NULL,
  `maths` int(11) NOT NULL,
  `gk` int(11) NOT NULL,
  `story` int(11) NOT NULL,
  `pt` int(11) NOT NULL,
  `arabic` int(11) NOT NULL,
  `hindi` int(11) NOT NULL,
  `rhymes` int(11) NOT NULL,
  `physical_education` int(11) NOT NULL,
  `computer` int(11) NOT NULL,
  `abacus` int(11) NOT NULL,
  `craft` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `meeting_type` varchar(255) NOT NULL,
  `meeting_class` varchar(255) NOT NULL,
  `meeting_name` text NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `non_teach`
--

CREATE TABLE `non_teach` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(20) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `join_date` date NOT NULL,
  `address` text NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `photo_type` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `adhar_name` varchar(100) NOT NULL,
  `adhar_path` varchar(255) NOT NULL,
  `adhar_type` varchar(50) NOT NULL,
  `id_name` varchar(100) NOT NULL,
  `id_path` varchar(255) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notifi_title` varchar(255) NOT NULL,
  `notifi_desc` text NOT NULL,
  `notifi_date` date NOT NULL,
  `class` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_fee`
--

CREATE TABLE `other_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `towards` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `present_class`
--

CREATE TABLE `present_class` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `time_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `remarks_title` varchar(255) NOT NULL,
  `remarks_desc` varchar(255) NOT NULL,
  `remarks_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_study`
--

CREATE TABLE `request_study` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `req_date` date NOT NULL,
  `certi_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ready_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `route_contact` varchar(255) NOT NULL,
  `add_date` varchar(255) NOT NULL,
  `route_det` text NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route_students`
--

CREATE TABLE `route_students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `stage_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_det`
--

CREATE TABLE `school_det` (
  `id` int(11) NOT NULL,
  `sch_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  `sch_dise1` varchar(255) NOT NULL,
  `sch_dise2` varchar(255) NOT NULL,
  `sch_dise3` varchar(255) NOT NULL,
  `sch_dise4` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_det`
--

INSERT INTO `school_det` (`id`, `sch_name`, `location`, `city`, `district`, `state`, `pin`, `phone`, `mob`, `email`, `web`, `sender_id`, `sch_dise1`, `sch_dise2`, `sch_dise3`, `sch_dise4`, `academic_year`) VALUES
(5, 'St. Thomas School', 'Kushalnagar', 'Kushalnagar', 'Kodagu', 'Karnataka', 571234, '08274-248962', '9591855620', 'ma.musthafa6@gmail.com', 'www.digitalcoorg.com', 'STHOMS', '29250314701', '29250314702', '', '', ''),
(6, 'Digitalcoorg Software Solution', 'Kushalnagar', 'Kushalnagar', 'Kodagu', 'Karnataka', 571234, '8277021524', '8277021524', 'support@digitalcoorg.com', 'www.digitalcoorg.com', 'SCHOOL', '123', '1234', '12345', '123456', '2017-2018'),
(7, 'Digitalcoorg ', 'Kushalnagar', 'Kushalan', 'Kodagu', 'Karnataka', 571234, '8277021524', '8277021524', 'ma.musthafa6@gmail.com', 'www.digitalcoorg.com', 'SCHOOL', '12345', 'dise11234', 'disepuc1234', 'disedegree123', '2018-2019'),
(8, 'DIGITALCOORG', 'KUSHALNAGAR', 'KUSHALNAGAR', 'KODAGU', 'KARNATAKA', 571234, '8277021524', '8277021524', 'support@digitalcoorg.com', 'www.digitalcoorg.com', 'SCHOOL', '5437642387', '4798371974', '8797897', '8978979', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `set_adm_fee`
--

CREATE TABLE `set_adm_fee` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_books_fee`
--

CREATE TABLE `set_books_fee` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_cca_fee`
--

CREATE TABLE `set_cca_fee` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_fee`
--

CREATE TABLE `set_fee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `fee_towards` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_fee`
--

INSERT INTO `set_fee` (`id`, `first_name`, `roll_no`, `class`, `section`, `adm_fee`, `tot_fee`, `academic_year`, `fee_towards`, `updated_date`) VALUES
(0, '', '', 'first standard', '', 7500, 7500, '2019-2020', '', '2020-06-13 06:50:58'),
(0, 'Musthafa', '12345', 'first standard', '', 1500, 0, '2019-2020', 'Uniform', '2020-06-13 06:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `set_shoe_fee`
--

CREATE TABLE `set_shoe_fee` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_software_fee`
--

CREATE TABLE `set_software_fee` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_uniform_fee`
--

CREATE TABLE `set_uniform_fee` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_van_fee`
--

CREATE TABLE `set_van_fee` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `stage_name` varchar(255) NOT NULL,
  `van_fee` varchar(255) NOT NULL,
  `assign_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `stage_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `last_name` text NOT NULL,
  `parent_contact` varchar(20) NOT NULL,
  `section` varchar(255) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `sex` text NOT NULL,
  `class_join` varchar(20) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `stage_name` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL,
  `tot_van_fee` int(11) NOT NULL,
  `tot_van_paid` int(11) NOT NULL,
  `place_birth` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `taluk` varchar(100) NOT NULL,
  `district` text NOT NULL,
  `academic_year` varchar(30) NOT NULL,
  `father_name` text NOT NULL,
  `mother_name` text NOT NULL,
  `edu_father` varchar(20) NOT NULL,
  `edu_mother` varchar(20) NOT NULL,
  `stay_with` text NOT NULL,
  `guard_add` varchar(100) NOT NULL,
  `father_add` varchar(100) NOT NULL,
  `fa_occu` varchar(100) NOT NULL,
  `ma_occu` varchar(100) NOT NULL,
  `nation` text NOT NULL,
  `religion` text NOT NULL,
  `caste` text NOT NULL,
  `sc_st` text NOT NULL,
  `back_caste` varchar(100) NOT NULL,
  `mother_tongue` text NOT NULL,
  `other_lang` text NOT NULL,
  `no_bro` int(2) NOT NULL,
  `no_sis` int(2) NOT NULL,
  `eld_bro` int(2) NOT NULL,
  `young_bro` int(2) NOT NULL,
  `eld_sis` int(2) NOT NULL,
  `young_sis` int(2) NOT NULL,
  `perm_address` varchar(255) NOT NULL,
  `vaccinated` text NOT NULL,
  `illness_sick` varchar(255) NOT NULL,
  `school_prev` varchar(255) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `photo_type` varchar(100) NOT NULL,
  `adhar_name` varchar(255) NOT NULL,
  `adhar_path` varchar(255) NOT NULL,
  `adhar_type` varchar(100) NOT NULL,
  `birth_name` varchar(255) NOT NULL,
  `birth_path` varchar(255) NOT NULL,
  `birth_type` varchar(100) NOT NULL,
  `tc_no` int(11) NOT NULL,
  `last_class` varchar(255) NOT NULL,
  `class_stream` varchar(255) NOT NULL,
  `tc_date` date NOT NULL,
  `last_date` date NOT NULL,
  `income` int(11) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `adhaar_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tot_adm_fee` int(11) NOT NULL,
  `tot_adm_paid` int(11) NOT NULL,
  `tot_shoe_fee` int(11) NOT NULL,
  `tot_shoe_paid` int(11) NOT NULL,
  `tot_uniform_fee` int(11) NOT NULL,
  `tot_uniform_paid` int(11) NOT NULL,
  `tot_software_fee` int(11) NOT NULL,
  `tot_software_paid` int(11) NOT NULL,
  `tot_cca_fee` int(11) NOT NULL,
  `tot_cca_paid` int(11) NOT NULL,
  `tot_books_fee` int(11) NOT NULL,
  `tot_books_paid` int(11) NOT NULL,
  `caste_cat` varchar(255) NOT NULL,
  `phys_chal` varchar(255) NOT NULL,
  `student_type` varchar(255) NOT NULL,
  `tot_admis_fee` int(11) NOT NULL,
  `tot_admis_paid` int(11) NOT NULL,
  `total_student_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `roll_no`, `blood`, `join_date`, `last_name`, `parent_contact`, `section`, `admission_no`, `sex`, `class_join`, `present_class`, `dob`, `route_name`, `stage_name`, `tot_fee`, `tot_paid`, `tot_van_fee`, `tot_van_paid`, `place_birth`, `village`, `town`, `taluk`, `district`, `academic_year`, `father_name`, `mother_name`, `edu_father`, `edu_mother`, `stay_with`, `guard_add`, `father_add`, `fa_occu`, `ma_occu`, `nation`, `religion`, `caste`, `sc_st`, `back_caste`, `mother_tongue`, `other_lang`, `no_bro`, `no_sis`, `eld_bro`, `young_bro`, `eld_sis`, `young_sis`, `perm_address`, `vaccinated`, `illness_sick`, `school_prev`, `photo_name`, `photo_path`, `photo_type`, `adhar_name`, `adhar_path`, `adhar_type`, `birth_name`, `birth_path`, `birth_type`, `tc_no`, `last_class`, `class_stream`, `tc_date`, `last_date`, `income`, `rollno`, `adhaar_no`, `address`, `tot_adm_fee`, `tot_adm_paid`, `tot_shoe_fee`, `tot_shoe_paid`, `tot_uniform_fee`, `tot_uniform_paid`, `tot_software_fee`, `tot_software_paid`, `tot_cca_fee`, `tot_cca_paid`, `tot_books_fee`, `tot_books_paid`, `caste_cat`, `phys_chal`, `student_type`, `tot_admis_fee`, `tot_admis_paid`, `total_student_fee`) VALUES
(4, 'Musthafa', '12345', 'A', '2020-05-18', '', '8277021524', '', '12345', 'male', 'first standard', 'first standard', '1986-04-13', '', '', 7500, 0, 0, 0, '', '', '', '', 'Kodagu', '2019-2020', 'Abdulla', 'Ayisha', '', '', '', '', '', '', '', '', '', 'Muslim', '', '', 'Malayalam', '', 0, 0, 0, 0, 0, 0, '', '', '', '', 'Musthu Png.png', 'photo/Musthu Png.png', 'image/png', '', 'adhar/', '', '', 'birth/', '', 0, '', '', '0000-00-00', '0000-00-00', 0, '12345', '866022517900', 'Ponnathmotte', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0),
(5, 'Musthafa', '12345', 'A', '2020-05-18', '', '8277021524', '', '12345', 'male', 'first standard', 'second standard', '1986-04-13', '', '', 0, 0, 0, 0, '', '', '', '', 'Kodagu', '2020-2021', 'Abdulla', 'Ayisha', '', '', '', '', '', '', '', '', '', 'Muslim', '', '', 'Malayalam', '', 0, 0, 0, 0, 0, 0, '', '', '', '', 'Musthu Png.png', 'photo/Musthu Png.png', 'image/png', '', 'adhar/', '', '', 'birth/', '', 0, '', '', '0000-00-00', '0000-00-00', 0, '12345', '866022517900', 'Ponnathmotte', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0),
(6, 'Ajmal', '123', 'A', '2020-06-13', '', '8277021524', '', '123', 'male', 'first standard', 'first standard', '2016-11-05', '', '', 0, 0, 0, 0, '', '', '', '', 'Kodagu', '2019-2020', 'Abdulla M', 'Ayisha', '', '', '', '', '', '', '', '', '', 'Muslim', '', '', 'Malayalam', '', 0, 0, 0, 0, 0, 0, '', '', '', '', 'IMG_0091.JPG', 'photo/IMG_0091.JPG', 'image/jpeg', '', 'adhar/', '', '', 'birth/', '', 0, '', '', '0000-00-00', '0000-00-00', 0, '123', '866022517900', 'Ponnathmotte\r\nChettalli Post\r\nKodagu 571248', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0),
(7, 'Fathima M', '12', 'A', '2020-06-13', '', '9481030162', 'Section A', '12', 'female', 'second standard', 'second standard', '1996-02-01', '', '', 0, 0, 0, 0, '', '', '', '', '', '2019-2020', 'Mahin', 'Zeenath', '', '', '', '', '', '', '', '', '', 'Muslim', '', '', 'Malayalam', '', 0, 0, 0, 0, 0, 0, '', '', '', '', 'IMG_20190605_170114.jpg', 'photo/IMG_20190605_170114.jpg', 'image/jpeg', '', 'adhar/', '', '', 'birth/', '', 0, '', '', '0000-00-00', '0000-00-00', 0, '12', '48504808574987', 'Kushalnagar', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_adm_fee`
--

CREATE TABLE `student_adm_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_books_fee`
--

CREATE TABLE `student_books_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_cca_fee`
--

CREATE TABLE `student_cca_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tut_fee` int(11) NOT NULL,
  `lab_fee` int(11) NOT NULL,
  `lib_fee` int(11) NOT NULL,
  `sp_fee` int(11) NOT NULL,
  `mag_fee` int(11) NOT NULL,
  `exa_fee` int(11) NOT NULL,
  `bett_fee` int(11) NOT NULL,
  `st_wel_fund` int(11) NOT NULL,
  `teach_wel_fund` int(11) NOT NULL,
  `caut_dep` int(11) NOT NULL,
  `devp_fund` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `miscel_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_paid` int(11) NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `rec_date` date NOT NULL,
  `mob` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`id`, `name`, `roll_no`, `class`, `section`, `tot_paid`, `rec_no`, `rec_date`, `mob`, `parent_name`, `academic_year`, `note`) VALUES
(0, 'Musthafa', '12345', 'first standard', '', 5000, '2', '2020-06-13', '', '', '2019-2020', 'school fee collected');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `sub1` varchar(255) NOT NULL,
  `sub2` varchar(255) NOT NULL,
  `sub3` varchar(255) NOT NULL,
  `sub4` varchar(255) NOT NULL,
  `sub5` varchar(255) NOT NULL,
  `sub6` varchar(255) NOT NULL,
  `sub7` varchar(255) NOT NULL,
  `sub8` varchar(255) NOT NULL,
  `sub9` varchar(255) NOT NULL,
  `sub10` varchar(255) NOT NULL,
  `sub11` varchar(255) NOT NULL,
  `sub12` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_shoe_fee`
--

CREATE TABLE `student_shoe_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_software_fee`
--

CREATE TABLE `student_software_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_uniform_fee`
--

CREATE TABLE `student_uniform_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `tot_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` varchar(255) NOT NULL,
  `adm_fee` int(11) NOT NULL,
  `tot_paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_van_fee`
--

CREATE TABLE `student_van_fee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `van_fee` int(11) NOT NULL,
  `rec_date` date NOT NULL,
  `rec_no` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `present_class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `stage_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `stream_combi` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `subject1` varchar(255) NOT NULL,
  `subject2` varchar(255) NOT NULL,
  `subject3` varchar(255) NOT NULL,
  `subject4` varchar(255) NOT NULL,
  `subject5` varchar(255) NOT NULL,
  `subject6` varchar(255) NOT NULL,
  `subject7` varchar(255) NOT NULL,
  `subject8` varchar(255) NOT NULL,
  `subject9` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_documents`
--

CREATE TABLE `uploaded_documents` (
  `id` int(11) NOT NULL,
  `upl_doc_name` varchar(255) NOT NULL,
  `upl_file_name` varchar(255) NOT NULL,
  `upl_file_path` varchar(255) NOT NULL,
  `upl_file_type` varchar(255) NOT NULL,
  `upl_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_content`
--

CREATE TABLE `website_content` (
  `id` int(11) NOT NULL,
  `page_area` varchar(255) NOT NULL,
  `page_content` longtext NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_members_fee`
--
ALTER TABLE `adm_members_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_members`
--
ALTER TABLE `ad_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anv_don`
--
ALTER TABLE `anv_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance1`
--
ALTER TABLE `attendance1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday_status`
--
ALTER TABLE `birthday_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_status`
--
ALTER TABLE `certificate_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_ad_members`
--
ALTER TABLE `class_ad_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_school`
--
ALTER TABLE `contact_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled_fees`
--
ALTER TABLE `enrolled_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
