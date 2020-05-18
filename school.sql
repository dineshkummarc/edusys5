-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 03:41 AM
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
  `rep_date` timestamp NOT NULL DEFAULT current_timestamp(),
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
  `iss_date` timestamp NOT NULL DEFAULT current_timestamp(),
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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
