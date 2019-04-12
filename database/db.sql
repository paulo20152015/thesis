-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 12:03 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_21044855_nca`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `teacherId` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`teacherId`, `username`, `password`, `role`) VALUES
(12, 'FloresJay-Bryan639', '$2y$10$FKO5m8ZpIImr37EPCPUJEO6C2MoPZJx15kZqkmgesS.Z.rjicftDq', 'teacher'),
(10, 'Principal', '$2y$10$sPFtna.XaupJ0Dqx.K/ZnO36ypfQuf39Ct8mJivcwGHsKASUxMo7y', 'principal'),
(11, 'JacobRosemary1125', '$2y$10$sPFtna.XaupJ0Dqx.K/ZnO36ypfQuf39Ct8mJivcwGHsKASUxMo7y', 'clerk'),
(13, 'LatorillaRonald1108', '$2y$10$MzRMmUAxlmXr9CQAZ/cd5uePlXSfcrTR8dz86u6iUamLTitdAC.I.', 'teacher'),
(14, 'GaborJulia-Lou1503', '$2y$10$svoi0XwmtGEhZytQEQxxyuoZs4pUWWu1uApVjQyIXME.ufnLmhksO', 'teacher'),
(15, 'HunaCarmela2119', '$2y$10$PzPv9cFwlihbMGcNQ4Qug.8.cTExmNmyUWRJ0AWsWtYOeadWq6lUG', 'teacher'),
(16, 'PadlanShiermaine1547', '$2y$10$0UTCdRNxrbNu8L.oE3J3jesbqtKgvp25bTxuQfezAGQvPquxKnyua', 'teacher'),
(17, 'MachelaShiella1350', '$2y$10$6bVh1G3J3bhZKvxWnO0zaeDOSU3sUG7M5vNV9sv2elIyvKjVwVvPu', 'teacher'),
(18, 'Wa-ayFlordeliza311', '$2y$10$BaVOD7KEFq1pLKVmm.k7V./Ngf2bDR.ti86yOGR07HEbDtJc0zZvC', 'teacher'),
(19, 'DizonLea2265', '$2y$10$iH7xLAbI7wadpJiW8IIELON0kfKetZXhTsqg9JSPEWqxmTkS1KPQe', 'teacher'),
(20, 'VillapaniaMary-Grace1884', '$2y$10$.YU9oEdBXPcshg/CIkqxB.Yb8gN3rsdEu4Owlas.upG/WQgssYY9.', 'teacher'),
(21, 'CasasKaren-Cane2379', '$2y$10$heqF0nQpyO0xX.gG4gBbkeN4svoWkS218k6kfBUgxi4lJYLUaNlGC', 'teacher'),
(22, 'FaculananKaren559', '$2y$10$fPiHfDuqs8J.5uNp/6DmheH9/.A8ve5ldr/Nz1ZaZ.YPg98vod97.', 'teacher'),
(23, 'LacsaRiza2998', '$2y$10$V3xISg4I4hP7QoXSs03Bo.E9lH0vP5ZHW3a2/dp2J7sKg6X4GDFFC', 'teacher'),
(24, 'ErabeKaren874', '$2y$10$PPeEI1.grNzKcsPhOSb0iOz39NNppvpVSuI1ADpnQAtOn1h2810pS', 'teacher'),
(25, 'PerezCorazon1180', '$2y$10$ikFG4SNAAgVtSx9wmfD1Z.Uh813qGO0nCTcmCozsEWzihuJdTWRou', 'teacher'),
(26, 'RomeroKristine-Jane937', '$2y$10$r.WsNHGOnjFUZDLXKBBY6uU.9uFGUgAnF1/FtJ874CrSXHe0jlc9e', 'teacher'),
(27, 'ManalastasCherry-Ann245', '$2y$10$VXxIpEqlspN4yl4iE05h3uGEYc7HnGCJrszxaEdvlbIdkSThvnxzW', 'teacher'),
(28, 'AmaizNorilie1773', '$2y$10$ThziQSdbQpS1vTIR1qpJjOhBaNszpkjJFc/g7WW4XYqitWbUIrJge', 'teacher'),
(29, 'TamayoJoel2184', '$2y$10$mAXNkIDJYqSsZUOd2RvmMebQYRaSxRVJNFUNUAd75aZ.52ewOdLo2', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  `categoryLevel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `categoryLevel`) VALUES
(1, '1st Semester', 2),
(2, '2nd Semester', 2),
(3, 'Summer', 2),
(4, 'Regular', 1),
(5, 'Summer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `gradeLevelId` int(11) NOT NULL,
  `syId` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classId`, `teacherId`, `gradeLevelId`, `syId`, `sectionId`, `categoryId`) VALUES
(17, 21, 2, 1, 8, 4),
(16, 28, 1, 1, 7, 4),
(11, 27, 4, 1, 10, 4),
(12, 24, 3, 1, 9, 4),
(13, 15, 5, 1, 11, 1),
(14, 13, 6, 1, 12, 1),
(15, 12, 6, 1, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `floorId` int(11) NOT NULL,
  `floorNum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`floorId`, `floorNum`) VALUES
(6, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeId` int(11) NOT NULL,
  `sessionId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `gradeCategory` varchar(20) NOT NULL,
  `grade` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gradeId`, `sessionId`, `studentId`, `gradeCategory`, `grade`, `remarks`) VALUES
(12, 9, 16, '2', 80, 'passed'),
(13, 9, 16, '3', 85, 'passed'),
(14, 9, 16, '4', 87, 'passed'),
(15, 9, 16, '5', 90, 'passed'),
(16, 48, 11, '2', 85, 'passed'),
(17, 48, 12, '2', 80, 'passed'),
(18, 48, 12, '3', 85, 'passed'),
(19, 48, 12, '4', 92, 'passed'),
(20, 48, 11, '3', 86, 'passed'),
(21, 48, 11, '4', 79, 'passed'),
(22, 48, 13, '2', 79, 'passed'),
(23, 48, 13, '3', 84, 'passed'),
(24, 48, 13, '4', 90, 'passed'),
(25, 48, 15, '2', 84, 'passed'),
(26, 48, 15, '3', 80, 'passed'),
(27, 48, 15, '4', 88, 'passed'),
(28, 51, 16, '2', 85, 'passed'),
(29, 51, 16, '3', 88, 'passed'),
(30, 51, 16, '4', 90, 'passed'),
(31, 51, 17, '2', 82, 'passed'),
(32, 51, 17, '3', 84, 'passed'),
(33, 51, 17, '4', 89, 'passed'),
(34, 51, 18, '2', 79, 'passed'),
(35, 51, 18, '3', 82, 'passed'),
(36, 51, 18, '4', 88, 'passed'),
(37, 51, 19, '2', 86, 'passed'),
(38, 51, 19, '3', 88, 'passed'),
(39, 51, 19, '4', 85, 'passed'),
(40, 51, 20, '2', 87, 'passed'),
(41, 23, 31, '6', 76, 'passed');

-- --------------------------------------------------------

--
-- Table structure for table `gradelevel`
--

CREATE TABLE `gradelevel` (
  `gradeLevelId` int(11) NOT NULL,
  `gradeLevel` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  `grabAll` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradelevel`
--

INSERT INTO `gradelevel` (`gradeLevelId`, `gradeLevel`, `level`, `grabAll`) VALUES
(1, '7', 1, 0),
(2, '8', 1, 0),
(3, '9', 1, 0),
(4, '10', 1, 0),
(5, '11', 2, 0),
(6, '12', 2, 0),
(7, 'graduate', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentId` int(11) NOT NULL,
  `parentFname` varchar(20) NOT NULL,
  `parentMname` varchar(20) NOT NULL,
  `parentLname` varchar(20) NOT NULL,
  `parentContactNum` varchar(20) NOT NULL,
  `parentGender` varchar(20) NOT NULL,
  `parentUsername` varchar(50) NOT NULL,
  `parentPassword` varchar(255) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `parentStat` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentId`, `parentFname`, `parentMname`, `parentLname`, `parentContactNum`, `parentGender`, `parentUsername`, `parentPassword`, `relation`, `parentStat`) VALUES
(6, 'sebastian', 'aniceto ', 'martinez', '09912675178', 'Male', 'martinezsebastian2513', '$2y$10$oG1bocyTBzsMiDFaxo90luUlFGmX5cGAT7v3/RI49oEZOwe.U65eW', 'Father', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `roomName` varchar(20) NOT NULL,
  `floorNum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `roomNum`, `roomName`, `floorNum`) VALUES
(5, 1, '101', 1),
(4, 101, '1', 1),
(6, 2, '102', 1),
(7, 3, '103', 1),
(8, 4, '104', 1),
(9, 5, '105', 1),
(10, 6, '106', 1),
(11, 7, '107', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedId` int(11) NOT NULL,
  `sessionId` int(11) NOT NULL,
  `time` varchar(40) NOT NULL,
  `day` varchar(20) NOT NULL,
  `roomId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedId`, `sessionId`, `time`, `day`, `roomId`) VALUES
(10, 22, '7:00 AM-8:00 AM', '2', 6),
(9, 33, '1:30 AM-1:30 AM', '1', 5),
(8, 21, '7:00 AM-8:00 AM', '1', 5),
(7, 23, '7:00 AM-10:00 AM', '1', 5),
(11, 25, '7:30 AM-8:30 AM', '4', 8),
(12, 24, '10:00 AM-11:30 AM', '1', 6),
(13, 35, '10:00 AM-12:30 PM', '1', 6),
(14, 28, '1:00 PM-2:00 PM', '3', 9),
(15, 26, '1:00 PM-2:00 PM', '1', 7),
(16, 29, '1:00 PM-3:00 PM', '5', 8),
(17, 36, '9:30 AM-11:30 AM', '2', 6),
(18, 31, '7:00 AM-10:30 AM', '6', 8),
(19, 27, '3:00 PM-4:00 PM', '1', 8),
(20, 37, '1:00 PM-2:30 PM', '2', 6),
(21, 30, '7:00 AM-10:00 AM', '2', 9),
(22, 39, '3:30 PM-5:00 PM', '4', 8),
(23, 12, '7:00 AM-8:00 AM', '1', 5),
(24, 13, '9:00 AM-12:00 AM', '1', 6),
(25, 14, '1:00 PM-2:00 PM', '1', 7),
(26, 15, '3:00 PM-4:00 PM', '1', 8),
(27, 16, '7:00 AM-8:00 AM', '2', 10),
(28, 17, '10:00 AM-12:00 AM', '2', 8),
(29, 18, '1:00 PM-4:00 PM', '2', 10),
(30, 19, '7:00 AM-11:00 AM', '3', 11),
(31, 20, '1:00 PM-4:00 PM', '3', 10),
(32, 40, '7:00 AM-10:00 AM', '1', 5),
(33, 41, '10:00 AM-12:00 AM', '1', 6),
(34, 42, '1:00 PM-4:00 PM', '1', 7),
(35, 43, '7:00 AM-9:30 AM', '2', 8),
(36, 44, '1:00 PM-3:00 PM', '2', 9),
(38, 45, '7:00 AM-10:00 AM', '1', 5),
(39, 46, '10:30 AM-11:30 AM', '1', 6),
(40, 47, '1:00 PM-2:30 PM', '1', 7),
(41, 48, '3:00 PM-4:00 PM', '1', 10),
(42, 49, '9:00 AM-11:00 AM', '2', 11),
(43, 50, '7:00 AM-9:00 AM', '5', 11),
(44, 51, '10:00 AM-12:00 AM', '4', 7),
(45, 52, '1:00 PM-2:00 PM', '3', 10),
(46, 53, '9:00 AM-11:00 AM', '2', 8),
(47, 54, '3:00 PM-4:00 PM', '1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `syId` int(11) NOT NULL,
  `sy` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`syId`, `sy`, `active`) VALUES
(1, '2017-2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionId` int(11) NOT NULL,
  `sectionName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionId`, `sectionName`) VALUES
(7, '7-Del-Pilar'),
(8, '8-Aguinaldo'),
(9, '9-Bonifacio'),
(10, '10-Rizal'),
(11, 'Grade-11-CCS'),
(12, 'Grade-12-CCS'),
(13, 'Grade-12-Housekeepin');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionId`, `classId`, `subjectId`, `teacherId`) VALUES
(8, 9, 13, 8),
(9, 10, 13, 9),
(10, 10, 15, 9),
(11, 10, 19, 9),
(12, 11, 13, 28),
(13, 11, 14, 21),
(14, 11, 15, 19),
(15, 11, 16, 24),
(16, 11, 17, 22),
(17, 11, 18, 12),
(18, 11, 19, 14),
(19, 11, 20, 15),
(20, 11, 21, 11),
(21, 12, 13, 28),
(22, 12, 14, 28),
(23, 13, 22, 28),
(24, 13, 23, 21),
(25, 12, 15, 24),
(26, 13, 24, 19),
(27, 13, 25, 24),
(28, 12, 17, 28),
(29, 12, 20, 17),
(30, 13, 26, 22),
(31, 12, 18, 12),
(32, 12, 21, 20),
(33, 14, 22, 28),
(34, 12, 16, 17),
(35, 14, 23, 21),
(36, 14, 24, 19),
(37, 14, 25, 24),
(38, 12, 19, 16),
(39, 14, 26, 22),
(40, 15, 40, 20),
(41, 15, 39, 29),
(42, 15, 37, 26),
(43, 15, 36, 17),
(44, 15, 35, 27),
(45, 16, 21, 29),
(46, 16, 20, 18),
(47, 16, 19, 20),
(48, 16, 16, 13),
(49, 16, 13, 22),
(50, 17, 16, 23),
(51, 17, 13, 14),
(52, 17, 17, 19),
(53, 17, 18, 16),
(54, 17, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `stat`
--

CREATE TABLE `stat` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stat`
--

INSERT INTO `stat` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` int(11) NOT NULL,
  `studentLrnNum` varchar(20) NOT NULL,
  `studentFname` varchar(20) NOT NULL,
  `studentMname` varchar(20) NOT NULL,
  `studentLname` varchar(20) NOT NULL,
  `studentBday` date NOT NULL,
  `studentGender` varchar(20) NOT NULL,
  `studentAddCity` varchar(20) NOT NULL,
  `studentAddMunicipality` varchar(20) NOT NULL,
  `studentAddBrgy` varchar(20) NOT NULL,
  `studentAddSt` varchar(20) NOT NULL,
  `studentStat` tinyint(4) NOT NULL DEFAULT '0',
  `studentLevel` varchar(20) NOT NULL,
  `studentUsername` varchar(20) NOT NULL,
  `studentPassword` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentLrnNum`, `studentFname`, `studentMname`, `studentLname`, `studentBday`, `studentGender`, `studentAddCity`, `studentAddMunicipality`, `studentAddBrgy`, `studentAddSt`, `studentStat`, `studentLevel`, `studentUsername`, `studentPassword`) VALUES
(11, '48950415012', 'Juan-Miguel', 'A', 'Andres', '0000-00-00', 'Male', '', '', '', '', 1, '7', 'student1', '$2y$10$51TW7JoaNWtyvNBk8ioe3u9jEoJzTco4yp3XA41F.OdwaHVz/mbLy'),
(12, '489504150122', 'Jhon-Carlo', 'B', 'Bartolome', '0000-00-00', 'Male', '', '', '', '', 0, '7', '', ''),
(13, '106717100005', 'John-Marco', 'C', 'Buhay', '0000-00-00', 'Male', '', '', '', '', 0, '7', '', ''),
(14, '106720100023', 'Vincent', 'F', 'Bartolome', '0000-00-00', 'Male', '', '', '', '', 0, '7', '', ''),
(15, '489504150124', 'Chedrick-John', 'K', 'Dalena', '0000-00-00', 'Male', '', '', '', '', 0, '7', '', ''),
(16, '117435140017', 'Lawrence-Jeniel', 'B', 'Babon', '0000-00-00', 'Male', '', '', '', '', 0, '8', '', ''),
(17, '106466090007', 'Chris-Jhon', 'C', 'Bonita', '0000-00-00', 'Male', '', '', '', '', 0, '8', '', ''),
(18, '106714070012', 'Clarence', 'D', 'Bulatao', '0000-00-00', 'Male', '', '', '', '', 0, '8', '', ''),
(19, '489504150145', 'Erice-josh', 'P', 'Capili', '0000-00-00', 'Male', '', '', '', '', 0, '8', '', ''),
(20, '401538150287', 'Anthony', 'K', 'Espinosa', '0000-00-00', 'Male', '', '', '', '', 0, '8', '', ''),
(21, '489504150166', 'Jorge-Dean', 'M', 'Abella', '0000-00-00', 'Male', '', '', '', '', 0, '9', '', ''),
(22, '489504150167', 'Mark-Lester', 'O', 'Bio', '0000-00-00', 'Male', '', '', '', '', 0, '9', '', ''),
(23, '106466080009', 'Christian-Dave', 'C', 'Bonita', '0000-00-00', 'Male', '', '', '', '', 0, '9', '', ''),
(24, '106714060016', 'John-Carlo', 'D', 'Bulatao', '0000-00-00', 'Male', '', '', '', '', 0, '9', '', ''),
(25, '489506150644', 'Rolando', 'B', 'Cleofas', '0000-00-00', 'Male', '', '', '', '', 0, '9', '', ''),
(26, '106743070004', 'Ed-Peter-Paul', 'V', 'Aquino', '0000-00-00', 'Male', '', '', '', '', 0, '10', '', ''),
(27, '489504150222', 'Mark-Jerome', 'B', 'Castro', '0000-00-00', 'Male', '', '', '', '', 0, '10', '', ''),
(28, '106694120146', 'Brynne-Jerime', 'R', 'Celestino', '0000-00-00', 'Male', '', '', '', '', 0, '10', '', ''),
(29, '489504150223', 'Nyl-Jade', 'C', 'De-Guzman', '0000-00-00', 'female', '', '', '', '', 0, '10', '', ''),
(30, '401210150274', 'Yzrielle-Gilvyk', 'C', 'Dela-Cruz', '0000-00-00', 'Male', '', '', '', '', 0, '10', '', ''),
(31, '106460060002', 'Jed-Sprint', 'S', 'Acierto', '0000-00-00', 'Male', '', '', '', '', 0, '11', '', ''),
(32, '300995100002', 'Mark-Kevin', 'B', 'Acierto', '0000-00-00', 'Male', '', '', '', '', 0, '11', '', ''),
(33, '106467060001', 'Princess-May', 'G', 'Aganon', '0000-00-00', 'female', '', '', '', '', 0, '11', '', ''),
(34, '106763060004', 'Anjoe', 'R', 'Agdeppa', '0000-00-00', 'Male', '', '', '', '', 0, '11', '', ''),
(35, '106763060005', 'Russel-Ivan', 'P', 'Aguas', '0000-00-00', 'Male', '', '', '', '', 0, '11', '', ''),
(36, '106752050003', 'Karen-Joy', 'E', 'Andres', '0000-00-00', 'female', '', '', '', '', 0, '12', '', ''),
(37, '300994120319', 'Erika-Joy', 'Q', 'Antonio', '0000-00-00', 'female', '', '', '', '', 0, '12', '', ''),
(38, '106752050010', 'Andrea', 'E', 'Bagtong', '0000-00-00', 'female', '', '', '', '', 0, '12', '', ''),
(39, '106720050012', 'Genasis', 'C', 'Balmores', '0000-00-00', 'Male', '', '', '', '', 0, '12', '', ''),
(40, '106714050009', 'Mary-Joyce', 'W', 'Balot', '0000-00-00', 'female', '', '', '', '', 0, '12', '', ''),
(41, '489504150273', 'Karl-Nicolai', 'D', 'Alipio', '0000-00-00', 'Male', '', '', '', '', 0, '12', '', ''),
(42, '300971110018', 'Brixter', 'F', 'Andres', '0000-00-00', 'Male', '', '', '', '', 0, '12', '', ''),
(43, '489504160002', 'Israel', 'G', 'Andres', '0000-00-00', 'Male', '', '', '', '', 0, '12', '', ''),
(44, '106772050019', 'Robin', 'D', 'Andres', '0000-00-00', 'Male', '', '', '', '', 0, '12', '', ''),
(45, '106714050010', 'Dave-Renzkie', 'U', 'Bandasan', '0000-00-00', 'Male', '', '', '', '', 0, '12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `studentId` int(11) NOT NULL,
  `classId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`studentId`, `classId`) VALUES
(11, 9),
(11, 16),
(12, 9),
(12, 16),
(13, 9),
(13, 16),
(15, 16),
(16, 10),
(16, 17),
(17, 17),
(18, 17),
(19, 17),
(20, 17),
(21, 12),
(31, 13),
(32, 13),
(33, 13),
(34, 13),
(35, 13),
(36, 14),
(37, 14),
(38, 14),
(39, 14),
(40, 14),
(41, 14),
(42, 15),
(44, 14),
(45, 14);

-- --------------------------------------------------------

--
-- Table structure for table `studentparent`
--

CREATE TABLE `studentparent` (
  `studentId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentparent`
--

INSERT INTO `studentparent` (`studentId`, `parentId`) VALUES
(11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectId` int(11) NOT NULL,
  `subjectCode` varchar(20) NOT NULL,
  `subjectName` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `subjectCode`, `subjectName`) VALUES
(13, 'LOWER', 'Fil-Filipino'),
(14, 'LOWER', 'Eng-English'),
(15, 'LOWER', 'Math-Mathematics'),
(16, 'LOWER', 'Sci-Science'),
(17, 'LOWER', 'AP-Araling-Panlipunan'),
(18, 'LOWER', 'ESP-Edukasyon-sa-Pagpapakatao'),
(19, 'LOWER', 'Comp-Computer'),
(20, 'LOWER', 'TLE-Technology-and-Livelihood-Education'),
(21, 'LOWER', 'MAPEH-Music-Arts-Physical-Education-and-Health'),
(22, 'Eng-1', 'Oral-Communication-in-Context'),
(23, 'Fil-1', 'Komunikasyon-at-PananaliksiksaWika-at-Kulturang-Pilipino-'),
(24, 'Math-1', 'General-Mathematics-'),
(25, 'Sci-1', 'Earth-and-Life-Science-'),
(26, 'PE-1', 'Physical-Education-and-Health-'),
(27, 'SS3', 'Specialized-SubjectFood-and-Beverage-Services'),
(28, 'PE-4', 'Physical-Education-and-Health-'),
(29, 'TVL-7', 'Inquiries-Investigation-and-Immersion'),
(30, 'TVL-6', 'Entrepreneurship'),
(31, 'TVL-5', 'Empowerment-Technologiesfor-Tech-Voc'),
(32, 'Sci-2', 'Physical-Science-'),
(33, 'SS2', 'Specialized-Subject-House-Keeping-'),
(34, 'PE-3', 'Physical-Education-and-Health'),
(35, 'TVL-4', 'Practical-Research-2'),
(36, 'ICT-1', 'Media-and-Information-Literacy-'),
(37, 'Hum-1', 'Contemporary-Philippine-Arts-from-the-Regions-'),
(38, 'Philo-1', 'Introduction-to-the-Philosophy-of-the-Human-Person-'),
(39, 'Soc-1', 'Understanding-Culture-Society-and-Politics'),
(40, 'SS1', 'Specialized-Subject-Contact-Center-Services-'),
(41, 'PE-2', 'Physical-Education-and-Health'),
(42, 'TVL-3', 'Practical-Research-1'),
(43, 'Math-2', 'Statistics-and-Probability-'),
(44, 'Fil-2', 'Pagbasa-at-Pagsusuri-ng-Ibat-Ibang-Teksto-Tungo-sa-Pananalik'),
(45, 'Eng-3', 'Reading-and-Writing-Skills'),
(46, 'TVL-2', 'Filipino-sa-Piling-Larangan-Tech-Voc'),
(47, 'TVL-1', 'English-for-Academic-and-Professional-Purposes-'),
(48, 'Eng-2', '21st-Century-Literature-from-the-Philippines-and-the-World-'),
(49, 'PD-1', 'Personal-Development-Pansariling-Kaunlaran');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherId` int(11) NOT NULL,
  `teacherFname` varchar(20) NOT NULL,
  `teacherMname` varchar(20) NOT NULL,
  `teacherLname` varchar(20) NOT NULL,
  `teacherGender` varchar(20) NOT NULL,
  `teacherBday` date NOT NULL,
  `teacherContact` varchar(20) NOT NULL,
  `teacherStat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherId`, `teacherFname`, `teacherMname`, `teacherLname`, `teacherGender`, `teacherBday`, `teacherContact`, `teacherStat`) VALUES
(13, 'Ronald', 'DC', 'Latorilla', 'Male', '0000-00-00', '09258964123', 1),
(12, 'Jay-Bryan', 'M', 'Flores', 'Male', '0000-00-00', '09123456781', 1),
(11, 'Rosemary', 'M', 'Jacob', 'female', '0000-00-00', '09123456789', 1),
(10, 'Shery may', 'D', 'Guevarra', 'female', '0000-00-00', '09876767656', 1),
(14, 'Julia-Lou', 'L', 'Gabor', 'female', '0000-00-00', '091768422968', 1),
(15, 'Carmela', 'P', 'Huna', 'female', '0000-00-00', '09845213698', 1),
(16, 'Shiermaine', 'A', 'Padlan', 'female', '0000-00-00', '09279573985', 1),
(17, 'Shiella', 'A', 'Machela', 'female', '0000-00-00', '09845632152', 1),
(18, 'Flordeliza', 'G', 'Wa-ay', 'female', '0000-00-00', '09279567186', 1),
(19, 'Lea', 'M', 'Dizon', 'female', '0000-00-00', '09827432185', 1),
(20, 'Mary-Grace', 'C', 'Villapania', 'female', '0000-00-00', '09856412589', 1),
(21, 'Karen-Cane', 'R', 'Casas', 'female', '0000-00-00', '09176843357', 1),
(22, 'Karen', 'C', 'Faculanan', 'female', '0000-00-00', '09824563215', 1),
(23, 'Riza', 'R', 'Lacsa', 'female', '0000-00-00', '09274598759', 1),
(24, 'Karen', 'P', 'Erabe', 'female', '0000-00-00', '09176547752', 1),
(25, 'Corazon', 'B', 'Perez', 'female', '0000-00-00', '09375492857', 1),
(26, 'Kristine-Jane', 'F', 'Romero', 'female', '0000-00-00', '09783647214', 1),
(27, 'Cherry-Ann', 'M', 'Manalastas', 'female', '0000-00-00', '09274573249', 1),
(28, 'Norilie', 'D', 'Amaiz', 'female', '0000-00-00', '09863713452', 1),
(29, 'Joel', 'D', 'Tamayo', 'Male', '0000-00-00', '09837465234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`teacherId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classId`),
  ADD KEY `teacherId` (`teacherId`),
  ADD KEY `gradeLevelId` (`gradeLevelId`),
  ADD KEY `syId` (`syId`),
  ADD KEY `sectionId` (`sectionId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`floorId`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeId`),
  ADD KEY `sessionId` (`sessionId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `gradelevel`
--
ALTER TABLE `gradelevel`
  ADD PRIMARY KEY (`gradeLevelId`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedId`),
  ADD KEY `sessionId` (`sessionId`),
  ADD KEY `roomId` (`roomId`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`syId`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionId`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionId`),
  ADD KEY `classId` (`classId`),
  ADD KEY `subjectId` (`subjectId`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`studentId`,`classId`),
  ADD KEY `classId` (`classId`);

--
-- Indexes for table `studentparent`
--
ALTER TABLE `studentparent`
  ADD PRIMARY KEY (`studentId`,`parentId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `floorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `gradelevel`
--
ALTER TABLE `gradelevel`
  MODIFY `gradeLevelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `syId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `stat`
--
ALTER TABLE `stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
