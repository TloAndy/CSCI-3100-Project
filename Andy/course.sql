-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-16 15:18:11
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- 表的结构 `course_list`
--

CREATE TABLE `course_list` (
  `course_title` text NOT NULL,
  `course_code` varchar(8) NOT NULL,
  `enrolled_num` int(11) NOT NULL,
  `max_enrolled_num` int(11) NOT NULL,
  `course_pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `course_list`
--

INSERT INTO `course_list` (`course_title`, `course_code`, `enrolled_num`, `max_enrolled_num`, `course_pw`) VALUES
('Software Engineering', 'CSCI3100', 0, 100, 'ABC123');

-- --------------------------------------------------------

--
-- 表的结构 `csci3100_info`
--

CREATE TABLE `csci3100_info` (
  `ID` varchar(12) NOT NULL,
  `Name` text NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `csci3100_material`
--

CREATE TABLE `csci3100_material` (
  `ID` int(11) NOT NULL,
  `material_name` text NOT NULL,
  `material_type` text NOT NULL,
  `material_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`course_code`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `csci3100_info`
--
ALTER TABLE `csci3100_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `csci3100_material`
--
ALTER TABLE `csci3100_material`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `csci3100_material`
--
ALTER TABLE `csci3100_material`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
