-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 05:47 PM
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
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `Id` int(11) NOT NULL,
  `announcement_topic` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`Id`, `announcement_topic`, `description`, `department_id`, `image`) VALUES
(1, 'Comparza Dancing', 'A comparsa is a group of singers, musicians and dancers that take part in carnivals and other festivities in Spain and Latin America. Its precise meaning depends on the specific regional celebration. The most famous comparsas are those that participate in the Carnival of Santiago de Cuba and Carnaval de Barranquilla in Colombia. In Brazil, comparsas are called carnival blocks, as those seen in the Carnival of Rio de Janeiro and other Brazilian carnivals. In the US, especially at the New Orleans Mardi Gras, comparsas are called krewes, which include floats.', 1, 'education.png'),
(2, 'Photo Editing Wars', 'It is possible to say that photo editing service is a part or branch of graphic design. Photo editing is a digital process where software and digital applications are used to process to edit an image; it can be a portrait, product photo editing, print media, posters, advertisement, etc.', 6, 'photoediting.jpg'),
(4, 'War on Drugs', 'In the 1970s, President Richard Nixon formally launched the war on drugs to eradicate illicit drug use in the US. \"If we cannot destroy the drug menace in America, then it will surely in time destroy us,\" Nixon told Congress in 1971. \"I am not prepared to accept this alternative.\"\r\n\r\nOver the next couple decades, particularly under the Reagan administration, what followed was the escalation of global military and police efforts against drugs. But in that process, the drug war led to unintended consequences that have proliferated violence around the world and contributed to mass incarceration in the US, even if it has made drugs less accessible and reduced potential levels of drug abuse.', 5, 'war-on-drugs-fbshare.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daily_activities`
--

CREATE TABLE `daily_activities` (
  `Id` int(11) NOT NULL,
  `Activity_topic` varchar(255) NOT NULL,
  `Activity_description` varchar(255) NOT NULL,
  `time_date` datetime NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_activities`
--

INSERT INTO `daily_activities` (`Id`, `Activity_topic`, `Activity_description`, `time_date`, `Image`) VALUES
(2, 'Feeding Program', 'gfdFeeding programs basically involve delivering or providing a meal or snack to beneficiaries, most of the time children, and are often done in a specified time. Most non-government organizations or even institutions hold feeding programs to better addre', '2022-04-17 00:00:00', 'Screenshot (2).png'),
(3, 'Math Challenge', 'Mathematical challenge is a combination of a number of different. methods and topics together. It means that solving challenging problem I. use different mathematical principles and topics (e.g. algebra and. geometry or analytical geometry)', '2022-04-18 00:00:00', 'Screenshot (1).png'),
(4, 'Mobile Legend Contest', 'Mobile Legends: Bang Bang is a multiplayer online battle arena (MOBA) game designed for mobile phones. The game is free-to-play and is only monetized through in-game purchases like characters and skins. Each player can control a selectable character, call', '2022-04-15 00:00:00', 'ml-696x327.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `department_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Id`, `dept_name`, `department_description`) VALUES
(1, 'College of Teacher Education', 'The NTC Teacher Education Program envisions itself as the Standard Bearer of the Institution dedicated to the development of future teachers who manifest high performance in the exercise of the noblest, the most dignified, and the best loved-profession-TEACHING.'),
(2, 'College of Elementary Education', 'The Bachelor of Elementary Education (BEED) is a four-year degree program designed to prepare students to become primary school teachers. '),
(5, 'College of Criminology', 'A criminology major studies criminal behavior and its biological, psychological and social causes. Criminology majors get a broad education in the law, research methods, and sociology and psychology.'),
(6, 'College of Computer Studies', 'The College of Computer Studies (CCS) is an educational institution committed to its three-pronged vision of continually sharing knowledge and expertise through teaching, engaging in Computer Science research and Information Technology product development, and rendering service to communities in need.'),
(7, 'College of Commerce', 'Commerce is an education stream which offers the students a study of trade and business activities such as the exchange of goods and services from producer to the final consumer. The Commerce stream in Class 11 and 12 includes various subjects like Economics, Accountancy and Business Studies.'),
(8, 'College of Engineering', 'Engineering college means a school, college, university, department of a university or other educational institution, reputable and in good standing in accordance with rules prescribed by the Department, and which grants baccalaureate degrees in engineering.'),
(9, 'College of Business Management', 'The program aims to provide students with basic principles, theories, concepts of a business organization and its ecosystem. It will equip students the skill, attitudes and knowledge in a complex work place environment with the right values and social awareness.');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_Id` int(11) NOT NULL,
  `student_Id` int(11) NOT NULL,
  `request_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date_requested` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_Id`, `student_Id`, `request_status`, `date_requested`) VALUES
(3, 8, 'Pending', '2022-04-24 10:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `request_grade`
--

CREATE TABLE `request_grade` (
  `request_grade_Id` int(11) NOT NULL,
  `student_Id` int(11) NOT NULL,
  `request_grade_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `grade_date_requested` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_grade`
--

INSERT INTO `request_grade` (`request_grade_Id`, `student_Id`, `request_grade_status`, `grade_date_requested`) VALUES
(2, 8, 'Pending', '2022-04-24 10:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `Id` int(11) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`Id`, `schoolyear`, `status`) VALUES
(2, '2022-2023', 'Active'),
(3, '2021-2022', 'Inactive'),
(4, '2020-2021', 'Inactive'),
(5, '2019-2020', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `Id` int(11) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`Id`, `Semester`, `school_id`) VALUES
(1, '1st Semester', 2),
(4, '2nd Semester', 2),
(5, 'Summer', 2),
(6, '1st Semester', 5),
(7, '2nd Semester', 5),
(8, 'Summer', 5),
(9, '1st Semester', 4),
(10, '2nd Semester', 4),
(11, 'Summer', 4),
(12, '1st Semester', 3),
(13, '2nd Semester', 3),
(14, 'Summer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id` int(11) NOT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `year_level` int(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `id_no`, `firstname`, `middlename`, `lastname`, `dob`, `age`, `email`, `contact`, `address`, `username`, `password`, `images`, `dept_id`, `year_level`, `status`) VALUES
(8, 'NLP-1234', 'Erwin123456789', 'Cabag', 'Son', '1997-09-22', '24', 'sonerwin12@gmail.com', '9359428963', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'student', '21232f297a57a5a743894a0e4a801fc3', 'Screenshot (60).png', 6, 8, 'Confirmed'),
(13, 'NLP-12345', 'Erwin2', 'Cabag', 'Son', '2022-03-29', '543', 'sonerwifdsfsn12@gmail.com', '4324', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'fdsf', 'd2f2297d6e829cd3493aa7de4416a18f', 'Screenshot (2).png', 5, 6, 'Confirmed'),
(16, 'NLP-123456', 'Erwin3', 'Cabag', 'Son', '2022-04-12', '423', 'sonerwidfesn12@gmail.com', '432', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'fdsfdsfqwq', 'd2f2297d6e829cd3493aa7de4416a18f', 'Screenshot (6).png', 5, 4, 'Pending'),
(18, 'NLP-1234567', 'Sample', 'Sample', 'Sample', '2022-04-12', '56', 'Sample@gmail.com', '9359428963', 'Sample', 'Sample', '5e8ff9bf55ba3508199d22e984129be6', '4.jpg', 5, 3, 'Confirmed'),
(19, 'NLP-12345678', 'Erwin', 'Cabag', 'Son', '2022-04-04', '32', 'sonerwin12345531@gmail.com', '9359428963', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'erwinson1997fdsfds', '4e78864ba69a2748773be8cafcb1d353', 'download.png', 1, 3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `grade_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_grade`
--

INSERT INTO `student_grade` (`grade_id`, `student_id`, `subject_id`, `grade`) VALUES
(7, 8, 4, 89),
(8, 8, 5, 50),
(9, 8, 6, 89),
(10, 8, 7, 80),
(11, 8, 1, 93),
(12, 8, 3, 92),
(13, 8, 9, 75),
(14, 8, 10, 85);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_Id` int(11) NOT NULL,
  `school_yr_Id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `Sub_code` varchar(255) NOT NULL,
  `Sub_name` varchar(255) NOT NULL,
  `Sub_description` varchar(255) NOT NULL,
  `Teacher` varchar(255) NOT NULL,
  `Sub_level` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_sched` varchar(255) NOT NULL,
  `Units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_Id`, `school_yr_Id`, `semester_id`, `Sub_code`, `Sub_name`, `Sub_description`, `Teacher`, `Sub_level`, `day`, `time_sched`, `Units`) VALUES
(1, 3, 4, 'eng', 'English', 'English description sample', 'Erwin Son', 4, 'Monday,Wednesday,Friday,', '08:00', 3),
(3, 3, 4, 'DS', 'Data Structure', 'Data Structure sample description', 'Andres Bonifacio', 4, 'Tuesday,Wednesday,', '13:13', 3),
(4, 2, 1, 'MiMW', 'Math in Modern World', 'Math in Modern World sample description', 'Emilio Aguinaldo', 8, 'Wednesday,Friday,', '14:00', 3),
(5, 2, 1, 'Eng 2', 'English 2', 'English 2 sample description', 'Ariel Montesclaros', 8, 'Monday,Wednesday,Thursday,', '09:00', 3),
(6, 2, 1, 'M2', 'Math 2', 'Math 2 sample description', 'Jojo Montesclaros', 8, 'Monday,Tuesday,Wednesday,Thursday,Friday,', '11:00', 3),
(7, 2, 1, 'IT', 'Information Technology', 'Information Technology sample description', 'Danilo Nicolas', 8, 'Tuesday,Thursday,', '15:00', 3),
(9, 3, 4, 'ENGENG', 's', 's', 'Ariesal Montesclaros', 4, 'Monday,Tuesday,', '19:43', 3),
(10, 2, 1, 'S1', 'Subject 1', 'Subject 1 description', 'Dale Dela Cruz', 8, 'Monday,Tuesday,Wednesday,', '11:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'Teacher',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `firstname`, `middlename`, `lastname`, `dob`, `age`, `email`, `contact`, `address`, `username`, `password`, `usertype`, `image`) VALUES
(1, 'Erwin', 'Cabag', 'Son', '', 24, 'sonerwin12@gmail.com', '09359428963', 'Old Town, Medellin, Cebu', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', ''),
(3, 'Faculty123', 'Faculty', 'Faculty', '2022-04-14', 12, 'Faculty@gmail.com', '1234567789', 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'Faculty', 'd561c7c03c1f2831904823a95835ff5f', 'Teacher', 'Screenshot (8).png');

-- --------------------------------------------------------

--
-- Table structure for table `year_level`
--

CREATE TABLE `year_level` (
  `level_Id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year_level`
--

INSERT INTO `year_level` (`level_Id`, `level`, `section`) VALUES
(3, '2nd year', 'BSIT-2A'),
(4, '1st year', 'BSIT-1A'),
(5, '1st year', 'BSIT-1B'),
(6, '2nd year', 'BSIT-2B'),
(7, '3rd year', 'BSIT-3A'),
(8, '3rd year', 'BSIT-3B'),
(9, '4th year', 'BSIT-4A'),
(10, '4th year', 'BSIT-4B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `daily_activities`
--
ALTER TABLE `daily_activities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_Id`);

--
-- Indexes for table `request_grade`
--
ALTER TABLE `request_grade`
  ADD PRIMARY KEY (`request_grade_Id`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student_grade`
--
ALTER TABLE `student_grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `year_level`
--
ALTER TABLE `year_level`
  ADD PRIMARY KEY (`level_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daily_activities`
--
ALTER TABLE `daily_activities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_grade`
--
ALTER TABLE `request_grade`
  MODIFY `request_grade_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_grade`
--
ALTER TABLE `student_grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `year_level`
--
ALTER TABLE `year_level`
  MODIFY `level_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
