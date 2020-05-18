-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 03:18 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

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
(2, 'digitalcoorg', 'digitalcoorg', 'support@digitalcoorg.com', '', 'admin', '2017-2018', ''),
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
(1, 'musthafa MA', '12345', '8277021524', 'first standard', '2018-07-30', '2018-2019', 'musthu', '', 'Absent', 0, 1, ''),
(2, 'musthafa MA', '12345', '8277021524', 'first standard', '2018-07-31', '2018-2019', 'musthu', '', 'Present', 1, 1, ''),
(3, 'musthafa MA', '12345', '8277021524', 'first standard', '2018-09-26', '2018-2019', 'musthu', '', 'Absent', 0, 1, ''),
(4, 'Shiva prasad', '123456', '8762264622', 'first standard', '2018-09-26', '2018-2019', 'musthu', '', 'Present', 1, 1, ''),
(5, 'Unais', '1234567', '6362159633', 'first standard', '2018-09-26', '2018-2019', 'musthu', '', 'Present', 1, 1, ''),
(6, 'Ajmal', '545', '8277021524', 'ukg', '2018-12-10', '2018-2019', 'musthafa', '', 'Present', 1, 1, ''),
(7, 'fathima', '121', '6362159633', 'ukg', '2018-12-10', '2018-2019', 'musthafa', '', 'Absent', 0, 1, ''),
(8, 'Ajmal', '545', '8277021524', 'ukg', '2018-12-10', '2018-2019', 'musthafa', '', 'Present', 1, 1, ''),
(9, 'fathima', '121', '6362159633', 'ukg', '2018-12-10', '2018-2019', 'musthafa', '', 'Absent', 0, 1, ''),
(10, 'Ajmal', '545', '8277021524', 'ukg', '2018-12-10', '2018-2019', 'musthafa', '', 'Absent', 0, 1, ''),
(11, 'fathima', '121', '6362159633', 'ukg', '2018-12-10', '2018-2019', 'musthafa', '', 'Present', 1, 1, ''),
(12, 'musthafa MA', '12345', '8277021524', 'first standard', '2019-01-31', '2018-2019', 'musthu', '', 'Absent', 0, 1, ''),
(13, 'musthafa MA', '12345', '8277021524', 'first standard', '2019-01-31', '2018-2019', 'musthu', '', 'Absent', 0, 1, ''),
(14, 'musthafa MA', '12345', '8277021524', 'second standard', '2019-06-07', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(15, 'musthafa MA', '12345', '8277021524', 'second standard', '2019-06-08', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(16, 'Mohammed Jannan SA', '19/1PA/2019-20', '', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Absent', 0, 1, ''),
(17, 'Aiyappa HM', '34/1PA/2019-20', '9480991776', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(18, 'Ana Elina David', '27/1PA/2019-20', '8105136489', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(19, 'Arun RM', '30/1PA/2019-20', '9902242923', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(20, 'Bhavana HA', '24/1PA/2019-20', '9880568306', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(21, 'Bhavana NU', '28/1PA/2019-20', '8762478911', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(22, 'Bhuvan KE', '18/1PA/2019-20', '9448309374', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(23, 'Brunda HG', '23/1PA/2019-20', '9480083779', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(24, 'Daksha KP', '16/1PA/2019-20', '9901719305', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(25, 'Darshan KG', '32/1PA/2019-20', '9480430395', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(26, 'Darshan TH', '12/1PA/2019-20', '9741985332', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(27, 'Dayana TD', '26/1PA/2019-20', '9480309407', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(28, 'Deekshith ponnamma CM', '35/1PA/2019-20', '9535603035', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(29, 'Dhanush MT', '11/1PA/2019-20', '9900324564', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(30, 'Fazil MU', '02/1PA/2019-20', '9483372763', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(31, 'Harish GA', '22/1PA/2019-20', '9480441681', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(32, 'Harshitha AD', '15/1PA/2019-20', '8296561770', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(33, 'Koovappa KS', '07/1PA/2019-20', '9902498475', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(34, 'Koushalya HR', '25/1PA/2019-20', '9741317558', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(35, 'Madhu HR', '21/1PA/2019-20', '8105201943', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(36, 'Neelesh VS', '09/1PA/2019-20', '9731258149', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(37, 'Nishan HV', '08/1PA/2019-20', '9632431227', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(38, 'Nivya HR', '29/1PA/2019-20', '8277243110', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(39, 'Priya Mistory', '13/1PA/2019-20', '7795481171', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(40, 'Punith HV', '06/1PA/2019-20', 'null', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(41, 'Sachin HR', '05/1PA/2019-20', '9483871428', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(42, 'Sachin HR', '31/1PA/2019-20', '9632549985', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(43, 'Saifudheen MH', '10/1PA/2019-20', '9900772980', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(44, 'Sajan Ganapathi KM', '01/1PA/2019-20', '9008200581', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(45, 'Shib Shankar', '14/1PA/2019-20', '7760910746', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(46, 'Shyam krishna P', '17/1PA/2019-20', '8762349880', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(47, 'Suprith HA', '33/1PA/2019-20', '9449988414', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(48, 'Vinay kumar KB', '20/1PA/2019-20', '9483120590', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(49, 'Yathish R', '04/1PA/2019-20', '9449769217', 'first puc arts', '2019-07-02', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(50, 'Musthafa MA', '12345', '8277021524', 'first standard', '2019-07-23', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(51, 'Muhammad Ajmal M', '123', '9481030162', 'first standard', '2019-07-23', '2019-2020', 'musthafa', '', 'Present', 1, 1, ''),
(52, 'Musthafa MA', '12345', '8277021524', 'first standard', '2019-07-23', '2019-2020', 'musthafa', '', 'Present', 1, 1, '');

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

/* CREATE TABLE `enrolled_students` (
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
 */
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

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `fac_fname`, `fac_lname`, `fac_email`, `fac_dob`, `parent_contact`, `fac_desig`, `class_teach`, `fac_dep`, `fac_prev_org`, `fac_quali`, `fac_join`, `fac_add`, `fac_photo_name`, `fac_photo_path`, `fac_photo_type`, `fac_sex`, `fac_adhar_name`, `fac_adhar_path`, `fac_adhar_type`, `fac_id_name`, `fac_id_path`, `fac_id_type`, `staff_type`, `academic_year`, `section`, `adhaar_no`) VALUES
(1, 'NANAIAH  N M', '', '', '', '9448648153', 'Principal Eco', '', 'Principal Eco', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(2, 'DAMAYANTHI  M P', '', '', '', '9902310257', 'Lect.Kannada', '', 'Lect.Kannada', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(3, 'KARUNAKUMAR  T N', '', '', '', '9845475241', 'Lect. Geography', '', 'Lect. Geography', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(4, 'DINA  A M', '', '', '', '9480308574', 'Lect. English', '', 'Lect. English', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(5, 'BOJAMMA  K T', '', '', '', '9482937576', 'Lect. Hindi', '', 'Lect. Hindi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(6, 'GAYATHRI  K P', '', '', '', '9901709498', 'Lect. Political Sci', '', 'Lect. Political Sci', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(7, 'REVATHI  C M', '', '', '', '9480905756', 'Lect. Kannada', '', 'Lect. Kannada', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(8, 'NAKHIYA BANU  M I', '', '', '', '9916156105', 'Lect. Commerce ', '', 'Lect. Commerce ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(9, 'DECHAMMA  M B', '', '', '', '9448896154', 'Lect. Mathematics', '', 'Lect. Mathematics', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(10, 'DEEPA  K', '', '', '', '9902367324', 'Lect. Commerce ', '', 'Lect. Commerce ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(11, 'RASHITHA C N', '', '', '', '9880337598', 'Lect. Economics', '', 'Lect. Economics', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(12, 'THANVEER  K C', '', '', '', '9036358404', 'Lect. English', '', 'Lect. English', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(13, 'BOPANNA  K P', '', '', '', '9740131774', 'Lect. Chemistry', '', 'Lect. Chemistry', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(14, 'MAHIMA  M', '', '', '', '9448972649', 'Lect. Physics ', '', 'Lect. Physics ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(15, 'NACHAPPA  M A ', '', '', '', '9449363239', 'Phy. Director', '', 'Phy. Director', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(16, 'SOWMYA  N', '', '', '', '9663956338', 'Lect. Biology', '', 'Lect. Biology', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'teaching', '', '', ''),
(17, 'JAGADEESH  B S', '', '', '', '9449475542', 'S.D.A.', '', 'S.D.A.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'non_teaching', '', '', ''),
(18, 'THREENA  M A', '', '', '', '7259825647', 'S.D.A.', '', 'S.D.A.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'non_teaching', '', '', ''),
(19, 'VIKRAM  V R', '', '', '', '9535031334', 'ATTENDER', '', 'ATTENDER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'non_teaching', '', '', ''),
(20, 'KAVYA  H R', '', '', '', '9008141138', 'ATTENDER', '', 'ATTENDER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'non_teaching', '', '', ''),
(21, 'SUDHA  H R', '', '', '', '8296993499', 'PEON', '', 'PEON', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'non_teaching', '', '', '');

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

--
-- Dumping data for table `gate_pass`
--

INSERT INTO `gate_pass` (`id`, `first_name`, `roll_no`, `present_class`, `gate_reason`, `gate_permit_go`, `gate_with`, `relation`, `section`, `academic_year`, `parent_contact`, `address`, `date_time`, `issued_date`) VALUES
(1, 'musthafa MA', '12345', 'second standard', 'maariage', 'father', 'father', 'dklfajlfj', '', '2019-2020', '8277021524', 'Ponnathmotte\r\nCHES Chettalli\r\nKodagu\r\nPIN 571248', '2019-06-07 18:46:57', '2019-06-07');

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

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `ho_day`, `ho_date`, `ho_name`, `ho_details`, `academic_year`) VALUES
(1, '', '2019-07-30', 'Festival Holiday', 'There is no festival holiday ', '2019-2020');

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

--
-- Dumping data for table `leave_appli`
--

INSERT INTO `leave_appli` (`id`, `first_name`, `admission_no`, `reason`, `from_date`, `to_date`, `details`, `applied_date`, `class`, `academic_year`) VALUES
(1, 'musthafa MA', '12345', 'fdgfsd', '2018-07-05', '2018-07-05', 'fdgfsdgsd', '2018-07-05', 'first standard', '2018-2019'),
(2, 'Musthafa MA', '12345', 'Marriage', '2019-07-25', '2019-07-27', 'I need leave on these days', '2019-07-23', 'first standard', '2019-2020');

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
  `rep_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_reply`
--

INSERT INTO `leave_reply` (`id`, `first_name`, `roll_no`, `action`, `details`, `rep_date`, `from_date`, `to_date`, `academic_year`) VALUES
(1, 'Musthafa MA', '12345', 'approved', 'Your leave application is approved', '2019-07-23 07:17:08', '0000-00-00', '0000-00-00', '2019-2020');

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
  `iss_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recie_date` date NOT NULL,
  `academic_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `bor_name`, `bor_id`, `book_name`, `book_id`, `iss_date`, `recie_date`, `academic_year`) VALUES
(18, 'musthafa MA', '12345', 'unfortunate Events', 'S-3', '2019-06-07 15:52:13', '2019-06-08', ''),
(19, 'musthafa MA', '12345', 'unfortunate Events', 'S-3', '2019-06-07 15:54:20', '2019-06-08', ''),
(20, 'musthafa MA', '12345', 'Morality for beautiful girls', 'S-15', '2019-06-07 15:56:00', '2019-06-08', ''),
(21, 'Ajmal', '545', 'The Deviant strain', 'S-2', '2019-06-07 15:57:52', '0000-00-00', ''),
(22, 'musthafa MA', '12345', 'Woeful Second World War', 'S-68', '2019-06-08 01:48:31', '2019-06-08', ''),
(23, 'Ajmal', '545', 'The Killer Under Pant', 'S-78', '2019-06-12 01:57:48', '2019-06-12', '');

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

--
-- Dumping data for table `other_fee`
--

INSERT INTO `other_fee` (`id`, `name`, `roll_no`, `adm_fee`, `towards`, `class`, `section`, `rec_date`, `rec_no`, `mob`, `academic_year`) VALUES
(1, 'musthafa MA', '12345', 250, 'uniform', 'first standard', '', '2018-07-26', '2', '', '2018-2019');

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

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `first_name`, `roll_no`, `present_class`, `section`, `remarks_title`, `remarks_desc`, `remarks_date`, `academic_year`) VALUES
(1, 'musthafa MA', '12345', 'first standard', '', 'Testing Remarks title edited', 'Remarks description will be displayed here', '2018-07-31', '2018-2019'),
(2, 'musthafa MA', '12345', 'second standard', '', 'good attitude', 'good good', '2019-06-07', '2019-2020');

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

--
-- Dumping data for table `request_study`
--

INSERT INTO `request_study` (`id`, `first_name`, `admission_no`, `class`, `reason`, `req_date`, `certi_name`, `academic_year`, `status`, `ready_date`) VALUES
(2, 'Musthafa MA', '12345', 'first standard', 'Scholarship', '2019-07-23', 'Study Certificate', '2019-2020', 'approved', '2019-07-30');

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

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route_name`, `route_contact`, `add_date`, `route_det`, `academic_year`) VALUES
(1, 'Route 1', '464646646', '2019-09-20', 'Ponnathmotte', '2019-2020');

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

--
-- Dumping data for table `route_students`
--

INSERT INTO `route_students` (`id`, `first_name`, `roll_no`, `route_name`, `present_class`, `section`, `stage_name`, `academic_year`) VALUES
(1, 'Muhammad Ajmal M', '123', 'Route 1', 'first standard', '', 'Sunticoppa', '2019-2020');

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
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_fee`
--

INSERT INTO `set_fee` (`id`, `first_name`, `roll_no`, `class`, `section`, `adm_fee`, `tot_fee`, `academic_year`, `fee_towards`, `updated_date`) VALUES
(3, '', '', 'second standard', '', 10000, 10000, '2019-2020', '', '2019-06-23 03:25:41'),
(4, '', '', 'first puc arts', '', 2000, 2000, '2019-2020', '', '2019-07-03 02:44:31'),
(5, '', '', 'first standard', '', 10000, 10000, '2019-2020', '', '2019-09-20 00:26:48');

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

--
-- Dumping data for table `set_van_fee`
--

INSERT INTO `set_van_fee` (`id`, `academic_year`, `route_name`, `stage_name`, `van_fee`, `assign_date`) VALUES
(4, '2019-2020', 'Route 1', 'Sunticoppa', '1500', '2019-09-20'),
(5, '2019-2020', 'Route 1', 'Sunticoppa', '1500', '2019-09-20'),
(6, '2019-2020', 'Route 1', 'Sunticoppa', '1500', '2019-09-20');

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

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `route_name`, `stage_name`, `academic_year`) VALUES
(1, 'Route 1', 'Sunticoppa', '2019-2020');

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
(2, 'Musthafa MA', '12345', 'A', '2019-07-23', '', '8277021524', '', '12345', 'male', 'second standard', 'second standard', '1986-04-13', '0', '', 0, 0, 0, 0, '', '', '', '', 'Kodagu', '2019-2020', 'Abdulla', 'Ayisha', '', '', '', '', '', '', '', '', '', 'Muslim', '', '', 'Malayalam', '', 0, 0, 0, 0, 0, 0, '', '', '', '', 'download (1).jpg', 'photo/download (1).jpg', 'image/jpeg', '', 'adhar/', '', '', 'birth/', '', 0, '', '', '0000-00-00', '0000-00-00', 0, '12345', '544646465465', 'Ponnathmotte', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0),
(3, 'Muhammad Ajmal M', '123', 'A', '2019-07-23', '', '9482897647', '', '123', 'male', 'second standard', 'second standard', '2016-11-05', '0', '', 10000, 0, 0, 0, '', '', '', '', 'Kodagu', '2019-2020', 'Musthafa', 'Fathima', '', '', '', '', '', '', '', '', '', 'Muslim', '', '', 'Malayalam', '', 0, 0, 0, 0, 0, 0, '', '', '', '', 'download.jpg', 'photo/download.jpg', 'image/jpeg', '', 'adhar/', '', '', 'birth/', '', 0, '', '', '0000-00-00', '0000-00-00', 0, '123', '6565465464', 'Ponnathmotte', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0);

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
(4, 'Mohammed Jannan SA', '19/1PA/2019-20', 'first puc arts', '', 1000, '1', '2019-07-03', '', '', '2019-2020', 'dfkalsdj'),
(5, 'Mohammed Jannan SA', '19/1PA/2019-20', 'first puc arts', '', 3000, '3', '2019-07-03', '', '', '2019-2020', 'dsfafads'),
(6, 'Mohammed Jannan SA', '19/1PA/2019-20', 'first puc arts', '', 3000, '25', '2019-07-03', '', '', '2019-2020', 'school fee'),
(7, 'Mohammed Jannan SA', '19/1PA/2019-20', 'first puc arts', '', 200, '545', '2019-07-03', '', '', '2019-2020', 'school fee'),
(8, 'Mohammed Jannan SA', '19/1PA/2019-20', 'first puc arts', '', 100, '343', '2019-07-02', '', '', '2019-2020', 'school fee'),
(9, 'Mohammed Jannan SA', '19/1PA/2019-20', 'first puc arts', '', 200, '45332', '2019-07-03', '', '', '2019-2020', 'school fee with balance'),
(10, 'Muhammad Ajmal M', '123', 'first standard', '', 5000, '15', '2019-09-20', '', '', '2019-2020', 'school fee');

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

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `first_name`, `roll_no`, `present_class`, `section`, `academic_year`, `exam_name`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`) VALUES
(5, 'musthafa MA', '12345', 'first standard', '', '2018-2019', 'FA1', '25', '26', '27', '28', '29', '30', '', '', '', '', '', ''),
(6, 'Shiva prasad', '123456', 'first standard', '', '2018-2019', 'FA1', '31', '32', '33', '34', '35', '36', '', '', '', '', '', ''),
(7, 'musthafa MA', '12345', 'first standard', '', '2018-2019', 'FA1', '45', '35', '25', '26', '24', '28', '38', '', '', '', '', ''),
(8, 'Shiva prasad', '123456', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Unais', '1234567', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'musthafa MA', '12345', 'first standard', '', '2018-2019', 'FA1', '38', '36', '35', '34', '38', '39', '45', '', '', '', '', ''),
(11, 'Shiva prasad', '123456', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Unais', '1234567', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'musthafa MA', '12345', 'first standard', '', '2018-2019', 'FA1', '42', '41', '35', '36', '38', '39', '31', '', '', '', '', ''),
(14, 'Shiva prasad', '123456', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Unais', '1234567', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'musthafa MA', '12345', 'first standard', '', '2018-2019', 'FA1', '42', '41', '35', '36', '38', '39', '31', '', '', '', '', ''),
(17, 'Shiva prasad', '123456', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Unais', '1234567', 'first standard', '', '2018-2019', 'FA1', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Muhammad Ajmal M', '123', 'first standard', '', '2019-2020', 'Fa1', '50', '45', '35', '48', '48', '47', '50', '', '', '', '', ''),
(20, 'Musthafa MA', '12345', 'first standard', '', '2019-2020', 'Fa1', '30', '35', '36', '37', '38', '39', '34', '', '', '', '', '');

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

--
-- Dumping data for table `student_van_fee`
--

INSERT INTO `student_van_fee` (`id`, `first_name`, `roll_no`, `van_fee`, `rec_date`, `rec_no`, `academic_year`, `present_class`, `section`, `route_name`, `stage_name`) VALUES
(1, 'Muhammad Ajmal M', '123', 500, '2019-09-20', 2, '2019-2020', 'first standard', '', 'Route 1', 'Sunticoppa'),
(2, 'Muhammad Ajmal M', '123', 500, '2019-09-20', 5, '2019-2020', 'first standard', '', 'Route 1', 'Sunticoppa'),
(3, 'Muhammad Ajmal M', '123', 500, '2019-11-19', 56, '2019-2020', 'first standard', '', 'Route 1', 'Sunticoppa'),
(4, 'Muhammad Ajmal M', '123', 1000, '2019-11-19', 65, '2019-2020', 'first standard', '', 'Route 1', 'Sunticoppa'),
(5, 'Muhammad Ajmal M', '123', 2000, '2019-11-19', 111, '2019-2020', 'first standard', '', 'Route 1', 'Sunticoppa');

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

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `class`, `date`, `count`, `academic_year`) VALUES
(53, 'kannada', 'first standard', '2018-08-23', 7, '2018-2019'),
(54, 'English', 'first standard', '2018-08-23', 7, '2018-2019'),
(55, 'Hindi', 'first standard', '2018-08-23', 7, '2018-2019'),
(56, 'Maths', 'first standard', '2018-08-23', 7, '2018-2019'),
(57, 'Science', 'first standard', '2018-08-23', 7, '2018-2019'),
(58, 'Social', 'first standard', '2018-08-23', 7, '2018-2019'),
(59, 'Computer', 'first standard', '2018-08-23', 7, '2018-2019'),
(60, 'kannada', 'second standard', '2018-08-23', 7, '2018-2019'),
(61, 'English', 'second standard', '2018-08-23', 7, '2018-2019'),
(62, 'Hindi', 'second standard', '2018-08-23', 7, '2018-2019'),
(63, 'Maths', 'second standard', '2018-08-23', 7, '2018-2019'),
(64, 'Science', 'second standard', '2018-08-23', 7, '2018-2019'),
(65, 'Social', 'second standard', '2018-08-23', 7, '2018-2019'),
(66, 'Computer', 'second standard', '2018-08-23', 7, '2018-2019'),
(72, 'kannada', 'third standard', '2018-08-23', 7, '2018-2019'),
(73, 'English', 'third standard', '2018-08-23', 7, '2018-2019'),
(74, 'Hindi', 'third standard', '2018-08-23', 7, '2018-2019'),
(75, 'Maths', 'third standard', '2018-08-23', 7, '2018-2019'),
(76, 'Science', 'third standard', '2018-08-23', 7, '2018-2019'),
(77, 'Social', 'third standard', '2018-08-23', 7, '2018-2019'),
(78, 'Computer', 'third standard', '2018-08-23', 7, '2018-2019'),
(79, 'kannada', 'fourth standard', '2018-09-18', 7, '2018-2019'),
(80, 'English', 'fourth standard', '2018-09-18', 7, '2018-2019'),
(81, 'Hindi', 'fourth standard', '2018-09-18', 7, '2018-2019'),
(82, 'Maths', 'fourth standard', '2018-09-18', 7, '2018-2019'),
(83, 'Science', 'fourth standard', '2018-09-18', 7, '2018-2019'),
(84, 'Social', 'fourth standard', '2018-09-18', 7, '2018-2019'),
(85, 'Computer', 'fourth standard', '2018-09-18', 7, '2018-2019'),
(86, 'kannada', 'fifth standard', '2018-09-18', 7, '2018-2019'),
(87, 'English', 'fifth standard', '2018-09-18', 7, '2018-2019'),
(88, 'Hindi', 'fifth standard', '2018-09-18', 7, '2018-2019'),
(89, 'Maths', 'fifth standard', '2018-09-18', 7, '2018-2019'),
(90, 'Science', 'fifth standard', '2018-09-18', 7, '2018-2019'),
(91, 'Social', 'fifth standard', '2018-09-18', 7, '2018-2019'),
(92, 'Computer', 'fifth standard', '2018-09-18', 7, '2018-2019'),
(93, 'kannada', 'sixth standard', '2018-09-18', 7, '2018-2019'),
(94, 'English', 'sixth standard', '2018-09-18', 7, '2018-2019'),
(95, 'Hindi', 'sixth standard', '2018-09-18', 7, '2018-2019'),
(96, 'Maths', 'sixth standard', '2018-09-18', 7, '2018-2019'),
(97, 'Science', 'sixth standard', '2018-09-18', 7, '2018-2019'),
(98, 'Social', 'sixth standard', '2018-09-18', 7, '2018-2019'),
(99, 'Computer', 'sixth standard', '2018-09-18', 7, '2018-2019'),
(100, 'kannada', 'seventh standard', '2018-09-18', 7, '2018-2019'),
(101, 'English', 'seventh standard', '2018-09-18', 7, '2018-2019'),
(102, 'Hindi', 'seventh standard', '2018-09-18', 7, '2018-2019'),
(103, 'Maths', 'seventh standard', '2018-09-18', 7, '2018-2019'),
(104, 'Science', 'seventh standard', '2018-09-18', 7, '2018-2019'),
(105, 'Social', 'seventh standard', '2018-09-18', 7, '2018-2019'),
(106, 'Computer', 'seventh standard', '2018-09-18', 7, '2018-2019'),
(107, 'kannada', 'eighth standard', '2018-09-18', 7, '2018-2019'),
(108, 'English', 'eighth standard', '2018-09-18', 7, '2018-2019'),
(109, 'Hindi', 'eighth standard', '2018-09-18', 7, '2018-2019'),
(110, 'Maths', 'eighth standard', '2018-09-18', 7, '2018-2019'),
(111, 'Science', 'eighth standard', '2018-09-18', 7, '2018-2019'),
(112, 'Social', 'eighth standard', '2018-09-18', 7, '2018-2019'),
(113, 'Computer', 'eighth standard', '2018-09-18', 7, '2018-2019'),
(121, 'kannada', 'ninth standard', '2018-09-18', 7, '2018-2019'),
(122, 'English', 'ninth standard', '2018-09-18', 7, '2018-2019'),
(123, 'Hindi', 'ninth standard', '2018-09-18', 7, '2018-2019'),
(124, 'Maths', 'ninth standard', '2018-09-18', 7, '2018-2019'),
(125, 'Science', 'ninth standard', '2018-09-18', 7, '2018-2019'),
(126, 'Social', 'ninth standard', '2018-09-18', 7, '2018-2019'),
(127, 'Computer', 'ninth standard', '2018-09-18', 7, '2018-2019'),
(128, 'kannada', 'tenth standard', '2018-09-18', 7, '2018-2019'),
(129, 'English', 'tenth standard', '2018-09-18', 7, '2018-2019'),
(130, 'Hindi', 'tenth standard', '2018-09-18', 7, '2018-2019'),
(131, 'Maths', 'tenth standard', '2018-09-18', 7, '2018-2019'),
(132, 'Science', 'tenth standard', '2018-09-18', 7, '2018-2019'),
(133, 'Social', 'tenth standard', '2018-09-18', 7, '2018-2019'),
(134, 'Computer', 'tenth standard', '2018-09-18', 7, '2018-2019'),
(140, 'English', 'lkg', '2018-09-27', 6, '2018-2019'),
(141, 'Kannada', 'lkg', '2018-09-27', 6, '2018-2019'),
(142, 'Maths', 'lkg', '2018-09-27', 6, '2018-2019'),
(143, 'GK', 'lkg', '2018-09-27', 6, '2018-2019'),
(144, 'Story/Rhymes', 'lkg', '2018-09-27', 6, '2018-2019'),
(145, 'Drawing', 'lkg', '2018-09-27', 6, '2018-2019'),
(146, 'English', 'ukg', '2018-09-27', 6, '2018-2019'),
(147, 'Kannada', 'ukg', '2018-09-27', 6, '2018-2019'),
(148, 'Maths', 'ukg', '2018-09-27', 6, '2018-2019'),
(149, 'GK', 'ukg', '2018-09-27', 6, '2018-2019'),
(150, 'Story/Rhymes', 'ukg', '2018-09-27', 6, '2018-2019'),
(151, 'Drawing', 'ukg', '2018-09-27', 6, '2018-2019'),
(152, 'English', 'prekg', '2018-10-01', 6, '2018-2019'),
(153, 'Kannada', 'prekg', '2018-10-01', 6, '2018-2019'),
(154, 'Maths', 'prekg', '2018-10-01', 6, '2018-2019'),
(155, 'Story/Rhymes', 'prekg', '2018-10-01', 6, '2018-2019'),
(156, 'Drawing', 'prekg', '2018-10-01', 6, '2018-2019'),
(157, 'GK', 'prekg', '2018-10-01', 6, '2018-2019'),
(158, '', 'second standard', '2019-03-30', 7, '2018-2019'),
(159, '', 'second standard', '2019-03-30', 7, '2018-2019'),
(160, '', 'second standard', '2019-03-30', 7, '2018-2019'),
(161, '', 'second standard', '2019-03-30', 7, '2018-2019'),
(162, '', 'second standard', '2019-03-30', 7, '2018-2019'),
(163, '', 'second standard', '2019-03-30', 7, '2018-2019'),
(164, '', 'second standard', '2019-03-30', 7, '2018-2019'),
(165, '', '', '2019-03-30', 7, '2018-2019'),
(166, '', '', '2019-03-30', 7, '2018-2019'),
(167, '', '', '2019-03-30', 7, '2018-2019'),
(168, '', '', '2019-03-30', 7, '2018-2019'),
(169, '', '', '2019-03-30', 7, '2018-2019'),
(170, '', '', '2019-03-30', 7, '2018-2019'),
(171, '', '', '2019-03-30', 7, '2018-2019');

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
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
-- Indexes for table `enrolled_students`
--
--ALTER TABLE `enrolled_students`
  --ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `fac_attendance`
--
ALTER TABLE `fac_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_name`
--
ALTER TABLE `fee_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gate_pass`
--
ALTER TABLE `gate_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_appli`
--
ALTER TABLE `leave_appli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_reply`
--
ALTER TABLE `leave_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letterhead`
--
ALTER TABLE `letterhead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_teach`
--
ALTER TABLE `non_teach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_fee`
--
ALTER TABLE `other_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `present_class`
--
ALTER TABLE `present_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_study`
--
ALTER TABLE `request_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_students`
--
ALTER TABLE `route_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_det`
--
ALTER TABLE `school_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_adm_fee`
--
ALTER TABLE `set_adm_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_books_fee`
--
ALTER TABLE `set_books_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_cca_fee`
--
ALTER TABLE `set_cca_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_fee`
--
ALTER TABLE `set_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_shoe_fee`
--
ALTER TABLE `set_shoe_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_software_fee`
--
ALTER TABLE `set_software_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_uniform_fee`
--
ALTER TABLE `set_uniform_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_van_fee`
--
ALTER TABLE `set_van_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_adm_fee`
--
ALTER TABLE `student_adm_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_books_fee`
--
ALTER TABLE `student_books_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_cca_fee`
--
ALTER TABLE `student_cca_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shoe_fee`
--
ALTER TABLE `student_shoe_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_software_fee`
--
ALTER TABLE `student_software_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_uniform_fee`
--
ALTER TABLE `student_uniform_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_van_fee`
--
ALTER TABLE `student_van_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_content`
--
ALTER TABLE `website_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adm_members_fee`
--
ALTER TABLE `adm_members_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_members`
--
ALTER TABLE `ad_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anv_don`
--
ALTER TABLE `anv_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `birthday_status`
--
ALTER TABLE `birthday_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_status`
--
ALTER TABLE `certificate_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_ad_members`
--
ALTER TABLE `class_ad_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_school`
--
ALTER TABLE `contact_school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolled_fees`
--
ALTER TABLE `enrolled_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolled_students`
--
--ALTER TABLE `enrolled_students`
  --MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fac_attendance`
--
ALTER TABLE `fac_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_name`
--
ALTER TABLE `fee_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gate_pass`
--
ALTER TABLE `gate_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_appli`
--
ALTER TABLE `leave_appli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_reply`
--
ALTER TABLE `leave_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letterhead`
--
ALTER TABLE `letterhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_teach`
--
ALTER TABLE `non_teach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_fee`
--
ALTER TABLE `other_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `present_class`
--
ALTER TABLE `present_class`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_study`
--
ALTER TABLE `request_study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `route_students`
--
ALTER TABLE `route_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_det`
--
ALTER TABLE `school_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `set_adm_fee`
--
ALTER TABLE `set_adm_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_books_fee`
--
ALTER TABLE `set_books_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_cca_fee`
--
ALTER TABLE `set_cca_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_fee`
--
ALTER TABLE `set_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `set_shoe_fee`
--
ALTER TABLE `set_shoe_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_software_fee`
--
ALTER TABLE `set_software_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_uniform_fee`
--
ALTER TABLE `set_uniform_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_van_fee`
--
ALTER TABLE `set_van_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_adm_fee`
--
ALTER TABLE `student_adm_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_books_fee`
--
ALTER TABLE `student_books_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_cca_fee`
--
ALTER TABLE `student_cca_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_shoe_fee`
--
ALTER TABLE `student_shoe_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_software_fee`
--
ALTER TABLE `student_software_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_uniform_fee`
--
ALTER TABLE `student_uniform_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_van_fee`
--
ALTER TABLE `student_van_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_content`
--
ALTER TABLE `website_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
