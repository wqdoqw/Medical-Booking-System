-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 03:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infs3202`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_account` varchar(255) NOT NULL,
  `doctor_account` varchar(255) NOT NULL,
  `date_of_booking` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_account`, `doctor_account`, `date_of_booking`, `description`, `status`) VALUES
(1, 'wqdoqw@gmail.com', 'park@naver.com', '2020-08-28', 'sick', 'pending'),
(2, 'jack@gmail.com', 'sam@gmail.com', '2020-08-30', 'cold', 'pending'),
(4, 'jack@gmail.com', 'park@naver.com', '2020-08-28', 'Skin disease', 'pending'),
(5, 'wqdoqw@gmail.com', 'park@naver.com', '2020-09-17', 'Cold', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cap_list`
--

CREATE TABLE `cap_list` (
  `cap_id` int(50) NOT NULL,
  `cap_description` varchar(200) NOT NULL,
  `cap_assignee` varchar(200) NOT NULL,
  `cap_creater` varchar(200) NOT NULL,
  `cap_creat_time` datetime NOT NULL DEFAULT current_timestamp(),
  `cap_status` varchar(200) NOT NULL,
  `cap_due_date` date NOT NULL,
  `cap_report_id` int(50) NOT NULL,
  `cap_priority` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cap_list`
--

INSERT INTO `cap_list` (`cap_id`, `cap_description`, `cap_assignee`, `cap_creater`, `cap_creat_time`, `cap_status`, `cap_due_date`, `cap_report_id`, `cap_priority`) VALUES
(1243, 'Change light bulb', 'max', 'brunoHAHA', '2017-09-09 11:17:48', 'toDo', '2018-01-01', 0, 'low'),
(1245, 'Floor cleaning', 'max', 'brunoHAHA', '2017-09-09 11:20:32', 'inProgress', '2018-01-01', 0, 'low'),
(1253, 'clear the floor of building 78', 'john', 'brunoHAHA', '2017-09-10 07:26:28', 'toDo', '2017-02-02', 0, 'medium'),
(1254, 'Fix light bulb', 'max', 'brunoHAHA', '2017-09-11 05:18:05', 'toDo', '2018-01-01', 0, 'low'),
(1255, 'hjbhh', 'max', 'brunoHAHA', '2017-09-11 05:18:38', 'toDo', '2018-01-01', 0, 'medium'),
(1256, 'Be chill and drink tea', 'mary', 'brunoHAHA', '2017-09-11 05:18:58', 'toDo', '2018-01-01', 0, 'high'),
(1259, 'Change computer', 'max', 'brunoHAHA', '2017-09-11 05:35:00', 'XDo', '2018-01-01', 0, 'low'),
(1260, '', 'max', 'brunoHAHA', '2017-09-11 11:06:53', 'toDo', '2017-02-02', 0, 'low'),
(1261, '', 'max', 'brunoHAHA', '2017-09-11 11:43:20', 'toDo', '2018-01-01', 0, 'low'),
(1262, 'qqqq', 'max', 'brunoHAHA', '2017-09-11 12:00:48', 'toDo', '2018-01-01', 0, 'low'),
(1263, '1233', 'max', 'brunoHAHA', '2017-09-20 18:22:33', 'toDo', '2017-02-02', 0, 'low'),
(1264, 'DE', 'max', 'brunoHAHA', '2017-10-19 13:25:56', 'toDo', '2017-02-02', 0, 'low');

-- --------------------------------------------------------

--
-- Table structure for table `cap_report_list`
--

CREATE TABLE `cap_report_list` (
  `cap_report_id` int(50) NOT NULL,
  `cap_report` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cap_report_list`
--

INSERT INTO `cap_report_list` (`cap_report_id`, `cap_report`) VALUES
(0, 'dummy');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Faculty` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Phone` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Faculty`, `Name`, `Phone`, `Email`, `ID`) VALUES
('11', 'QI LU', '481798297', '381141663@qq.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `D_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `doctor_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_account`, `password`, `D_name`, `phone`, `hospital_name`, `doctor_picture`) VALUES
('Caterina@gmail.com', '$2y$10$7YkE6MmIufY4gafQYlEMSOg5mEeQNTK5qnqLtVQaicsqk.ypMUT5e', 'Caterina', '0102321092', 'Sydney', 'img/default_picture.png'),
('park@naver.com', '$2y$10$0F.jMVaKF7OdWt6QbLCXF.UmGXFyJoOqne.dzx3iJked0olu/mey2', 'parksang', '106367850', 'UQ', 'uploads/park@naver.com_picture.png'),
('sam@gmail.com', '$2y$10$KgFyvt5wA1KNXPWR0n1n7eUfEjlnE8gl6wy.Cp.i5vKDICzfULLDq', 'Sam', '0103332222', 'Queen', 'uploads/sam@gmail.com_picture.jpg'),
('Smith@gmail.com', '$2y$10$V3oP53QY6WpOO6OXo.A2aeR0ipe06UgW6L74Suzk3NBqus73/cLuy', 'Smith', '105252332', 'Melbourne', 'uploads/Smith@gmail.com_picture.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_actions`
--

CREATE TABLE `inspection_actions` (
  `inspection_action_id` int(50) NOT NULL,
  `inspection_action` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inspection_list`
--

CREATE TABLE `inspection_list` (
  `inspection_id` int(50) NOT NULL,
  `inspection_title` varchar(200) NOT NULL,
  `inspection_location` varchar(200) NOT NULL,
  `inspection_workplace` varchar(200) NOT NULL,
  `inspection_creater` varchar(200) NOT NULL,
  `inspection_creat_time` date NOT NULL,
  `inspection_assignee` varchar(200) NOT NULL,
  `inspection_inspected_time` datetime NOT NULL,
  `inspection_score` int(50) NOT NULL,
  `inspection_report_id` int(50) NOT NULL,
  `form_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inspection_list`
--

INSERT INTO `inspection_list` (`inspection_id`, `inspection_title`, `inspection_location`, `inspection_workplace`, `inspection_creater`, `inspection_creat_time`, `inspection_assignee`, `inspection_inspected_time`, `inspection_score`, `inspection_report_id`, `form_status`) VALUES
(10008, 'Annual Check', 'UQ, St lucia', 'EAIT', 'me', '2017-09-11', 'Peter T Peter T', '2017-09-20 00:00:00', 133, 10000, 2),
(10009, 'Annual check ward', 'UQ, Herston', 'Health Centre Whatever', 'me', '2017-09-11', 'Tom C', '2018-01-01 00:00:00', 12, 10000, 2),
(10010, 'Annual Check Water pipe', 'St lucia', 'Safety check team', 'me', '2017-09-11', 'Jacky U', '2017-03-09 00:00:00', 15, 10000, 2),
(10017, 'Clinic', 'UQ, Gatton', 'Health Department', 'me', '2017-09-11', 'Yumi K Yumi K', '2017-09-15 00:00:00', 10, 10000, 2),
(10021, 'asdadad', 'sadsad', 'asdasdasd', 'me', '2017-09-26', 'asdasd asdasdasd', '2017-03-24 00:00:00', 12, 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_notes`
--

CREATE TABLE `inspection_notes` (
  `inspection_note_id` int(50) NOT NULL,
  `inspection_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inspection_questions`
--

CREATE TABLE `inspection_questions` (
  `inspection_id` int(50) NOT NULL,
  `inspection_section` int(2) DEFAULT NULL,
  `inspection_Qnum` int(2) DEFAULT NULL,
  `inspection_question_id` int(50) NOT NULL,
  `inspection_selection` varchar(20) DEFAULT 'x',
  `inspection_images` varchar(255) DEFAULT NULL,
  `inspection_action_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inspection_questions`
--

INSERT INTO `inspection_questions` (`inspection_id`, `inspection_section`, `inspection_Qnum`, `inspection_question_id`, `inspection_selection`, `inspection_images`, `inspection_action_id`) VALUES
(10017, 1, 1, 1771, 'x', NULL, NULL),
(10017, 1, 2, 1772, 'x', NULL, NULL),
(10017, 1, 3, 1773, 'x', NULL, NULL),
(10017, 1, 4, 1774, 'x', NULL, NULL),
(10017, 1, 5, 1775, 'x', NULL, NULL),
(10017, 1, 6, 1776, 'x', NULL, NULL),
(10017, 1, 7, 1777, 'x', NULL, NULL),
(10017, 1, 8, 1778, 'x', NULL, NULL),
(10017, 1, 9, 1779, 'x', NULL, NULL),
(10017, 2, 1, 1780, 'x', NULL, NULL),
(10017, 2, 2, 1781, 'x', NULL, NULL),
(10017, 2, 3, 1782, 'x', NULL, NULL),
(10017, 2, 4, 1783, 'x', NULL, NULL),
(10017, 3, 1, 1784, 'x', NULL, NULL),
(10017, 4, 1, 1785, 'x', NULL, NULL),
(10017, 4, 2, 1786, 'x', NULL, NULL),
(10017, 4, 3, 1787, 'x', NULL, NULL),
(10017, 4, 4, 1788, 'x', NULL, NULL),
(10017, 5, 1, 1789, 'x', NULL, NULL),
(10017, 5, 2, 1790, 'x', NULL, NULL),
(10017, 5, 3, 1791, 'x', NULL, NULL),
(10017, 5, 4, 1792, 'x', NULL, NULL),
(10017, 5, 5, 1793, 'x', NULL, NULL),
(10017, 5, 6, 1794, 'x', NULL, NULL),
(10017, 6, 1, 1795, 'x', NULL, NULL),
(10017, 6, 2, 1796, 'x', NULL, NULL),
(10017, 6, 3, 1797, 'x', NULL, NULL),
(10017, 6, 4, 1798, 'x', NULL, NULL),
(10017, 7, 1, 1799, 'x', NULL, NULL),
(10017, 7, 2, 1800, 'x', NULL, NULL),
(10017, 7, 3, 1801, 'x', NULL, NULL),
(10017, 7, 4, 1802, 'x', NULL, NULL),
(10017, 7, 5, 1803, 'x', NULL, NULL),
(10017, 8, 1, 1804, 'x', NULL, NULL),
(10017, 8, 2, 1805, 'x', NULL, NULL),
(10017, 8, 3, 1806, 'x', NULL, NULL),
(10017, 8, 4, 1807, 'x', NULL, NULL),
(10017, 8, 5, 1808, 'x', NULL, NULL),
(10017, 8, 6, 1809, 'x', NULL, NULL),
(10017, 9, 1, 1810, 'x', NULL, NULL),
(10017, 9, 2, 1811, 'x', NULL, NULL),
(10017, 9, 3, 1812, 'x', NULL, NULL),
(10017, 9, 4, 1813, 'x', NULL, NULL),
(10017, 9, 5, 1814, 'x', NULL, NULL),
(10017, 9, 6, 1815, 'x', NULL, NULL),
(10017, 10, 1, 1816, 'x', NULL, NULL),
(10017, 10, 2, 1817, 'x', NULL, NULL),
(10017, 10, 3, 1818, 'x', NULL, NULL),
(10017, 10, 4, 1819, 'x', NULL, NULL),
(10017, 10, 5, 1820, 'x', NULL, NULL),
(10017, 10, 6, 1821, 'x', NULL, NULL),
(10017, 11, 1, 1822, 'x', NULL, NULL),
(10017, 11, 2, 1823, 'x', NULL, NULL),
(10017, 11, 3, 1824, 'x', NULL, NULL),
(10017, 11, 4, 1825, 'x', NULL, NULL),
(10017, 12, 1, 1826, 'x', NULL, NULL),
(10017, 12, 2, 1827, 'x', NULL, NULL),
(10017, 12, 3, 1828, 'x', NULL, NULL),
(10017, 12, 4, 1829, 'x', NULL, NULL),
(10017, 12, 5, 1830, 'x', NULL, NULL),
(10017, 12, 6, 1831, 'x', NULL, NULL),
(10017, 12, 7, 1832, 'x', NULL, NULL),
(10017, 12, 8, 1833, 'x', NULL, NULL),
(10017, 13, 1, 1834, 'x', NULL, NULL),
(10017, 13, 2, 1835, 'x', NULL, NULL),
(10017, 13, 3, 1836, 'x', NULL, NULL),
(10017, 14, 1, 1837, 'x', NULL, NULL),
(10017, 14, 2, 1838, 'x', NULL, NULL),
(10017, 14, 3, 1839, 'x', NULL, NULL),
(10017, 14, 4, 1840, 'x', NULL, NULL),
(10017, 15, 1, 1841, 'x', NULL, NULL),
(10017, 15, 2, 1842, 'x', NULL, NULL),
(10017, 15, 3, 1843, 'x', NULL, NULL),
(10017, 15, 4, 1844, 'x', NULL, NULL),
(10017, 15, 5, 1845, 'x', NULL, NULL),
(10017, 15, 6, 1846, 'x', NULL, NULL),
(10017, 15, 7, 1847, 'x', NULL, NULL),
(10017, 15, 8, 1848, 'x', NULL, NULL),
(10017, 15, 9, 1849, 'x', NULL, NULL),
(10017, 16, 1, 1850, 'x', NULL, NULL),
(10017, 16, 2, 1851, 'x', NULL, NULL),
(10017, 16, 3, 1852, 'x', NULL, NULL),
(10017, 16, 4, 1853, 'x', NULL, NULL),
(10017, 16, 5, 1854, 'x', NULL, NULL),
(10017, 16, 6, 1855, 'x', NULL, NULL),
(10017, 16, 7, 1856, 'x', NULL, NULL),
(10017, 17, 1, 1857, 'x', NULL, NULL),
(10017, 17, 2, 1858, 'x', NULL, NULL),
(10017, 17, 3, 1859, 'x', NULL, NULL),
(10017, 17, 4, 1860, 'x', NULL, NULL),
(10017, 17, 5, 1861, 'x', NULL, NULL),
(10017, 17, 6, 1862, 'x', NULL, NULL),
(10017, 17, 7, 1863, 'x', NULL, NULL),
(10017, 18, 1, 1864, 'x', NULL, NULL),
(10017, 18, 2, 1865, 'x', NULL, NULL),
(10017, 18, 3, 1866, 'x', NULL, NULL),
(10017, 18, 4, 1867, 'x', NULL, NULL),
(10017, 18, 5, 1868, 'x', NULL, NULL),
(10009, 1, 1, 1869, 'x', NULL, NULL),
(10009, 1, 2, 1870, 'x', NULL, NULL),
(10009, 1, 3, 1871, 'x', NULL, NULL),
(10009, 1, 4, 1872, 'x', NULL, NULL),
(10009, 1, 5, 1873, 'x', NULL, NULL),
(10009, 1, 6, 1874, 'x', NULL, NULL),
(10009, 1, 7, 1875, 'x', NULL, NULL),
(10009, 1, 8, 1876, 'x', NULL, NULL),
(10009, 1, 9, 1877, 'x', NULL, NULL),
(10009, 2, 1, 1878, 'x', NULL, NULL),
(10009, 2, 2, 1879, 'x', NULL, NULL),
(10009, 2, 3, 1880, 'x', NULL, NULL),
(10009, 2, 4, 1881, 'x', NULL, NULL),
(10009, 3, 1, 1882, 'x', NULL, NULL),
(10009, 4, 1, 1883, 'x', NULL, NULL),
(10009, 4, 2, 1884, 'x', NULL, NULL),
(10009, 4, 3, 1885, 'x', NULL, NULL),
(10009, 4, 4, 1886, 'x', NULL, NULL),
(10009, 5, 1, 1887, 'x', NULL, NULL),
(10009, 5, 2, 1888, 'x', NULL, NULL),
(10009, 5, 3, 1889, 'x', NULL, NULL),
(10009, 5, 4, 1890, 'x', NULL, NULL),
(10009, 5, 5, 1891, 'x', NULL, NULL),
(10009, 5, 6, 1892, 'x', NULL, NULL),
(10009, 6, 1, 1893, 'x', NULL, NULL),
(10009, 6, 2, 1894, 'x', NULL, NULL),
(10009, 6, 3, 1895, 'x', NULL, NULL),
(10009, 6, 4, 1896, 'x', NULL, NULL),
(10009, 7, 1, 1897, 'x', NULL, NULL),
(10009, 7, 2, 1898, 'x', NULL, NULL),
(10009, 7, 3, 1899, 'x', NULL, NULL),
(10009, 7, 4, 1900, 'x', NULL, NULL),
(10009, 7, 5, 1901, 'x', NULL, NULL),
(10009, 8, 1, 1902, 'x', NULL, NULL),
(10009, 8, 2, 1903, 'x', NULL, NULL),
(10009, 8, 3, 1904, 'x', NULL, NULL),
(10009, 8, 4, 1905, 'x', NULL, NULL),
(10009, 8, 5, 1906, 'x', NULL, NULL),
(10009, 8, 6, 1907, 'x', NULL, NULL),
(10009, 9, 1, 1908, 'x', NULL, NULL),
(10009, 9, 2, 1909, 'x', NULL, NULL),
(10009, 9, 3, 1910, 'x', NULL, NULL),
(10009, 9, 4, 1911, 'x', NULL, NULL),
(10009, 9, 5, 1912, 'x', NULL, NULL),
(10009, 9, 6, 1913, 'x', NULL, NULL),
(10009, 10, 1, 1914, 'x', NULL, NULL),
(10009, 10, 2, 1915, 'x', NULL, NULL),
(10009, 10, 3, 1916, 'x', NULL, NULL),
(10009, 10, 4, 1917, 'x', NULL, NULL),
(10009, 10, 5, 1918, 'x', NULL, NULL),
(10009, 10, 6, 1919, 'x', NULL, NULL),
(10009, 11, 1, 1920, 'x', NULL, NULL),
(10009, 11, 2, 1921, 'x', NULL, NULL),
(10009, 11, 3, 1922, 'x', NULL, NULL),
(10009, 11, 4, 1923, 'x', NULL, NULL),
(10009, 12, 1, 1924, 'x', NULL, NULL),
(10009, 12, 2, 1925, 'x', NULL, NULL),
(10009, 12, 3, 1926, 'x', NULL, NULL),
(10009, 12, 4, 1927, 'x', NULL, NULL),
(10009, 12, 5, 1928, 'x', NULL, NULL),
(10009, 12, 6, 1929, 'x', NULL, NULL),
(10009, 12, 7, 1930, 'x', NULL, NULL),
(10009, 12, 8, 1931, 'x', NULL, NULL),
(10009, 13, 1, 1932, 'x', NULL, NULL),
(10009, 13, 2, 1933, 'x', NULL, NULL),
(10009, 13, 3, 1934, 'x', NULL, NULL),
(10009, 14, 1, 1935, 'x', NULL, NULL),
(10009, 14, 2, 1936, 'x', NULL, NULL),
(10009, 14, 3, 1937, 'x', NULL, NULL),
(10009, 14, 4, 1938, 'x', NULL, NULL),
(10009, 15, 1, 1939, 'x', NULL, NULL),
(10009, 15, 2, 1940, 'x', NULL, NULL),
(10009, 15, 3, 1941, 'x', NULL, NULL),
(10009, 15, 4, 1942, 'x', NULL, NULL),
(10009, 15, 5, 1943, 'x', NULL, NULL),
(10009, 15, 6, 1944, 'x', NULL, NULL),
(10009, 15, 7, 1945, 'x', NULL, NULL),
(10009, 15, 8, 1946, 'x', NULL, NULL),
(10009, 15, 9, 1947, 'x', NULL, NULL),
(10009, 16, 1, 1948, 'x', NULL, NULL),
(10009, 16, 2, 1949, 'x', NULL, NULL),
(10009, 16, 3, 1950, 'x', NULL, NULL),
(10009, 16, 4, 1951, 'x', NULL, NULL),
(10009, 16, 5, 1952, 'x', NULL, NULL),
(10009, 16, 6, 1953, 'x', NULL, NULL),
(10009, 16, 7, 1954, 'x', NULL, NULL),
(10009, 17, 1, 1955, 'x', NULL, NULL),
(10009, 17, 2, 1956, 'x', NULL, NULL),
(10009, 17, 3, 1957, 'x', NULL, NULL),
(10009, 17, 4, 1958, 'x', NULL, NULL),
(10009, 17, 5, 1959, 'x', NULL, NULL),
(10009, 17, 6, 1960, 'x', NULL, NULL),
(10009, 17, 7, 1961, 'x', NULL, NULL),
(10009, 18, 1, 1962, 'x', NULL, NULL),
(10009, 18, 2, 1963, 'x', NULL, NULL),
(10009, 18, 3, 1964, 'x', NULL, NULL),
(10009, 18, 4, 1965, 'x', NULL, NULL),
(10009, 18, 5, 1966, 'x', NULL, NULL),
(10010, 1, 1, 1967, 'x', NULL, NULL),
(10010, 1, 2, 1968, 'x', NULL, NULL),
(10010, 1, 3, 1969, 'x', NULL, NULL),
(10010, 1, 4, 1970, 'x', NULL, NULL),
(10010, 1, 5, 1971, 'x', NULL, NULL),
(10010, 1, 6, 1972, 'x', NULL, NULL),
(10010, 1, 7, 1973, 'x', NULL, NULL),
(10010, 1, 8, 1974, 'x', NULL, NULL),
(10010, 1, 9, 1975, 'x', NULL, NULL),
(10010, 2, 1, 1976, 'x', NULL, NULL),
(10010, 2, 2, 1977, 'x', NULL, NULL),
(10010, 2, 3, 1978, 'x', NULL, NULL),
(10010, 2, 4, 1979, 'x', NULL, NULL),
(10010, 3, 1, 1980, 'x', NULL, NULL),
(10010, 4, 1, 1981, 'x', NULL, NULL),
(10010, 4, 2, 1982, 'x', NULL, NULL),
(10010, 4, 3, 1983, 'x', NULL, NULL),
(10010, 4, 4, 1984, 'x', NULL, NULL),
(10010, 5, 1, 1985, 'x', NULL, NULL),
(10010, 5, 2, 1986, 'x', NULL, NULL),
(10010, 5, 3, 1987, 'x', NULL, NULL),
(10010, 5, 4, 1988, 'x', NULL, NULL),
(10010, 5, 5, 1989, 'x', NULL, NULL),
(10010, 5, 6, 1990, 'x', NULL, NULL),
(10010, 6, 1, 1991, 'x', NULL, NULL),
(10010, 6, 2, 1992, 'x', NULL, NULL),
(10010, 6, 3, 1993, 'x', NULL, NULL),
(10010, 6, 4, 1994, 'x', NULL, NULL),
(10010, 7, 1, 1995, 'x', NULL, NULL),
(10010, 7, 2, 1996, 'x', NULL, NULL),
(10010, 7, 3, 1997, 'x', NULL, NULL),
(10010, 7, 4, 1998, 'x', NULL, NULL),
(10010, 7, 5, 1999, 'x', NULL, NULL),
(10010, 8, 1, 2000, 'x', NULL, NULL),
(10010, 8, 2, 2001, 'x', NULL, NULL),
(10010, 8, 3, 2002, 'x', NULL, NULL),
(10010, 8, 4, 2003, 'x', NULL, NULL),
(10010, 8, 5, 2004, 'x', NULL, NULL),
(10010, 8, 6, 2005, 'x', NULL, NULL),
(10010, 9, 1, 2006, 'x', NULL, NULL),
(10010, 9, 2, 2007, 'x', NULL, NULL),
(10010, 9, 3, 2008, 'x', NULL, NULL),
(10010, 9, 4, 2009, 'x', NULL, NULL),
(10010, 9, 5, 2010, 'x', NULL, NULL),
(10010, 9, 6, 2011, 'x', NULL, NULL),
(10010, 10, 1, 2012, 'x', NULL, NULL),
(10010, 10, 2, 2013, 'x', NULL, NULL),
(10010, 10, 3, 2014, 'x', NULL, NULL),
(10010, 10, 4, 2015, 'x', NULL, NULL),
(10010, 10, 5, 2016, 'x', NULL, NULL),
(10010, 10, 6, 2017, 'x', NULL, NULL),
(10010, 11, 1, 2018, 'x', NULL, NULL),
(10010, 11, 2, 2019, 'x', NULL, NULL),
(10010, 11, 3, 2020, 'x', NULL, NULL),
(10010, 11, 4, 2021, 'x', NULL, NULL),
(10010, 12, 1, 2022, 'x', NULL, NULL),
(10010, 12, 2, 2023, 'x', NULL, NULL),
(10010, 12, 3, 2024, 'x', NULL, NULL),
(10010, 12, 4, 2025, 'x', NULL, NULL),
(10010, 12, 5, 2026, 'x', NULL, NULL),
(10010, 12, 6, 2027, 'x', NULL, NULL),
(10010, 12, 7, 2028, 'x', NULL, NULL),
(10010, 12, 8, 2029, 'x', NULL, NULL),
(10010, 13, 1, 2030, 'x', NULL, NULL),
(10010, 13, 2, 2031, 'x', NULL, NULL),
(10010, 13, 3, 2032, 'x', NULL, NULL),
(10010, 14, 1, 2033, 'x', NULL, NULL),
(10010, 14, 2, 2034, 'x', NULL, NULL),
(10010, 14, 3, 2035, 'x', NULL, NULL),
(10010, 14, 4, 2036, 'x', NULL, NULL),
(10010, 15, 1, 2037, 'x', NULL, NULL),
(10010, 15, 2, 2038, 'x', NULL, NULL),
(10010, 15, 3, 2039, 'x', NULL, NULL),
(10010, 15, 4, 2040, 'x', NULL, NULL),
(10010, 15, 5, 2041, 'x', NULL, NULL),
(10010, 15, 6, 2042, 'x', NULL, NULL),
(10010, 15, 7, 2043, 'x', NULL, NULL),
(10010, 15, 8, 2044, 'x', NULL, NULL),
(10010, 15, 9, 2045, 'x', NULL, NULL),
(10010, 16, 1, 2046, 'x', NULL, NULL),
(10010, 16, 2, 2047, 'x', NULL, NULL),
(10010, 16, 3, 2048, 'x', NULL, NULL),
(10010, 16, 4, 2049, 'x', NULL, NULL),
(10010, 16, 5, 2050, 'x', NULL, NULL),
(10010, 16, 6, 2051, 'x', NULL, NULL),
(10010, 16, 7, 2052, 'x', NULL, NULL),
(10010, 17, 1, 2053, 'x', NULL, NULL),
(10010, 17, 2, 2054, 'x', NULL, NULL),
(10010, 17, 3, 2055, 'x', NULL, NULL),
(10010, 17, 4, 2056, 'x', NULL, NULL),
(10010, 17, 5, 2057, 'x', NULL, NULL),
(10010, 17, 6, 2058, 'x', NULL, NULL),
(10010, 17, 7, 2059, 'x', NULL, NULL),
(10010, 18, 1, 2060, 'x', NULL, NULL),
(10010, 18, 2, 2061, 'x', NULL, NULL),
(10010, 18, 3, 2062, 'x', NULL, NULL),
(10010, 18, 4, 2063, 'x', NULL, NULL),
(10010, 18, 5, 2064, 'x', NULL, NULL),
(10021, 1, 1, 2065, 'Not verified', '10816609,2560,1600.jpg', NULL),
(10021, 1, 2, 2066, 'Not verified', '10439922,2560,1600.jpg', NULL),
(10021, 1, 3, 2067, 'Not verified', '10450414,2560,1600.jpg', NULL),
(10021, 1, 4, 2068, 'x', NULL, NULL),
(10021, 1, 5, 2069, 'x', NULL, NULL),
(10021, 1, 6, 2070, 'x', NULL, NULL),
(10021, 1, 7, 2071, 'x', NULL, NULL),
(10021, 1, 8, 2072, 'x', NULL, NULL),
(10021, 1, 9, 2073, 'x', NULL, NULL),
(10021, 2, 1, 2074, 'x', NULL, NULL),
(10021, 2, 2, 2075, 'x', NULL, NULL),
(10021, 2, 3, 2076, 'x', NULL, NULL),
(10021, 2, 4, 2077, 'x', NULL, NULL),
(10021, 3, 1, 2078, 'x', NULL, NULL),
(10021, 4, 1, 2079, 'x', NULL, NULL),
(10021, 4, 2, 2080, 'x', NULL, NULL),
(10021, 4, 3, 2081, 'x', NULL, NULL),
(10021, 4, 4, 2082, 'x', NULL, NULL),
(10021, 5, 1, 2083, 'x', NULL, NULL),
(10021, 5, 2, 2084, 'x', NULL, NULL),
(10021, 5, 3, 2085, 'x', NULL, NULL),
(10021, 5, 4, 2086, 'x', NULL, NULL),
(10021, 5, 5, 2087, 'x', NULL, NULL),
(10021, 5, 6, 2088, 'x', NULL, NULL),
(10021, 6, 1, 2089, 'x', NULL, NULL),
(10021, 6, 2, 2090, 'x', NULL, NULL),
(10021, 6, 3, 2091, 'x', NULL, NULL),
(10021, 6, 4, 2092, 'x', NULL, NULL),
(10021, 7, 1, 2093, 'x', NULL, NULL),
(10021, 7, 2, 2094, 'x', NULL, NULL),
(10021, 7, 3, 2095, 'x', NULL, NULL),
(10021, 7, 4, 2096, 'x', NULL, NULL),
(10021, 7, 5, 2097, 'x', NULL, NULL),
(10021, 8, 1, 2098, 'x', NULL, NULL),
(10021, 8, 2, 2099, 'x', NULL, NULL),
(10021, 8, 3, 2100, 'x', NULL, NULL),
(10021, 8, 4, 2101, 'x', NULL, NULL),
(10021, 8, 5, 2102, 'x', NULL, NULL),
(10021, 8, 6, 2103, 'x', NULL, NULL),
(10021, 9, 1, 2104, 'x', NULL, NULL),
(10021, 9, 2, 2105, 'x', NULL, NULL),
(10021, 9, 3, 2106, 'x', NULL, NULL),
(10021, 9, 4, 2107, 'x', NULL, NULL),
(10021, 9, 5, 2108, 'x', NULL, NULL),
(10021, 9, 6, 2109, 'x', NULL, NULL),
(10021, 10, 1, 2110, 'x', NULL, NULL),
(10021, 10, 2, 2111, 'x', NULL, NULL),
(10021, 10, 3, 2112, 'x', NULL, NULL),
(10021, 10, 4, 2113, 'x', NULL, NULL),
(10021, 10, 5, 2114, 'x', NULL, NULL),
(10021, 10, 6, 2115, 'x', NULL, NULL),
(10021, 11, 1, 2116, 'x', NULL, NULL),
(10021, 11, 2, 2117, 'x', NULL, NULL),
(10021, 11, 3, 2118, 'x', NULL, NULL),
(10021, 11, 4, 2119, 'x', NULL, NULL),
(10021, 12, 1, 2120, 'x', NULL, NULL),
(10021, 12, 2, 2121, 'x', NULL, NULL),
(10021, 12, 3, 2122, 'x', NULL, NULL),
(10021, 12, 4, 2123, 'x', NULL, NULL),
(10021, 12, 5, 2124, 'x', NULL, NULL),
(10021, 12, 6, 2125, 'x', NULL, NULL),
(10021, 12, 7, 2126, 'x', NULL, NULL),
(10021, 12, 8, 2127, 'x', NULL, NULL),
(10021, 13, 1, 2128, 'x', NULL, NULL),
(10021, 13, 2, 2129, 'x', NULL, NULL),
(10021, 13, 3, 2130, 'x', NULL, NULL),
(10021, 14, 1, 2131, 'x', NULL, NULL),
(10021, 14, 2, 2132, 'x', NULL, NULL),
(10021, 14, 3, 2133, 'x', NULL, NULL),
(10021, 14, 4, 2134, 'x', NULL, NULL),
(10021, 15, 1, 2135, 'x', NULL, NULL),
(10021, 15, 2, 2136, 'x', NULL, NULL),
(10021, 15, 3, 2137, 'x', NULL, NULL),
(10021, 15, 4, 2138, 'x', NULL, NULL),
(10021, 15, 5, 2139, 'x', NULL, NULL),
(10021, 15, 6, 2140, 'x', NULL, NULL),
(10021, 15, 7, 2141, 'x', NULL, NULL),
(10021, 15, 8, 2142, 'x', NULL, NULL),
(10021, 15, 9, 2143, 'x', NULL, NULL),
(10021, 16, 1, 2144, 'x', NULL, NULL),
(10021, 16, 2, 2145, 'x', NULL, NULL),
(10021, 16, 3, 2146, 'x', NULL, NULL),
(10021, 16, 4, 2147, 'x', NULL, NULL),
(10021, 16, 5, 2148, 'x', NULL, NULL),
(10021, 16, 6, 2149, 'x', NULL, NULL),
(10021, 16, 7, 2150, 'x', NULL, NULL),
(10021, 17, 1, 2151, 'x', NULL, NULL),
(10021, 17, 2, 2152, 'x', NULL, NULL),
(10021, 17, 3, 2153, 'x', NULL, NULL),
(10021, 17, 4, 2154, 'x', NULL, NULL),
(10021, 17, 5, 2155, 'x', NULL, NULL),
(10021, 17, 6, 2156, 'x', NULL, NULL),
(10021, 17, 7, 2157, 'x', NULL, NULL),
(10021, 18, 1, 2158, 'x', NULL, NULL),
(10021, 18, 2, 2159, 'x', NULL, NULL),
(10021, 18, 3, 2160, 'x', NULL, NULL),
(10021, 18, 4, 2161, 'x', NULL, NULL),
(10021, 18, 5, 2162, 'x', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_report_list`
--

CREATE TABLE `inspection_report_list` (
  `inspection_report_id` int(50) NOT NULL,
  `inspection_report` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inspection_report_list`
--

INSERT INTO `inspection_report_list` (`inspection_report_id`, `inspection_report`) VALUES
(1000, 'testing'),
(10000, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_selections`
--

CREATE TABLE `inspection_selections` (
  `inspection_selection_id` int(50) NOT NULL,
  `inspection_selection` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_account` varchar(255) NOT NULL,
  `U_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_account`, `U_name`, `password`, `phone`, `DOB`, `address`, `picture_url`) VALUES
('jack@gmail.com', 'Jack', '$2y$10$RibeuSHUwpIDJEwzzNHwOuMwgquZxQV4PTYhjeDi8uY00lngC83p6', '0106367850', '1996-06-11', 'some st', 'uploads/jack@gmail.com_picture.jpg'),
('wqdoqw@gmail.com', 'Jack', '$2y$10$h83i1CpkSUFHdTnQ5EONEuKMButoyYo7uEl9eyXA19.kZhVp2YHTu', '412341067', '2018-12-31', 'Brisbane CBD', 'uploads/wqdoqw@gmail.com_picture.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cap_list`
--
ALTER TABLE `cap_list`
  ADD PRIMARY KEY (`cap_id`),
  ADD KEY `cap_report_id` (`cap_report_id`);

--
-- Indexes for table `cap_report_list`
--
ALTER TABLE `cap_report_list`
  ADD PRIMARY KEY (`cap_report_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_account`);

--
-- Indexes for table `inspection_actions`
--
ALTER TABLE `inspection_actions`
  ADD PRIMARY KEY (`inspection_action_id`);

--
-- Indexes for table `inspection_list`
--
ALTER TABLE `inspection_list`
  ADD PRIMARY KEY (`inspection_id`),
  ADD KEY `inspection_report_id` (`inspection_report_id`);

--
-- Indexes for table `inspection_notes`
--
ALTER TABLE `inspection_notes`
  ADD PRIMARY KEY (`inspection_note_id`);

--
-- Indexes for table `inspection_questions`
--
ALTER TABLE `inspection_questions`
  ADD PRIMARY KEY (`inspection_question_id`),
  ADD KEY `inspection_action_id` (`inspection_action_id`),
  ADD KEY `inspection_image_id` (`inspection_images`),
  ADD KEY `inspection_id` (`inspection_id`),
  ADD KEY `inspection_selection_id` (`inspection_selection`);

--
-- Indexes for table `inspection_report_list`
--
ALTER TABLE `inspection_report_list`
  ADD PRIMARY KEY (`inspection_report_id`);

--
-- Indexes for table `inspection_selections`
--
ALTER TABLE `inspection_selections`
  ADD PRIMARY KEY (`inspection_selection_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cap_list`
--
ALTER TABLE `cap_list`
  MODIFY `cap_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1265;

--
-- AUTO_INCREMENT for table `inspection_list`
--
ALTER TABLE `inspection_list`
  MODIFY `inspection_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10022;

--
-- AUTO_INCREMENT for table `inspection_questions`
--
ALTER TABLE `inspection_questions`
  MODIFY `inspection_question_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2163;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cap_list`
--
ALTER TABLE `cap_list`
  ADD CONSTRAINT `cap_list_ibfk_1` FOREIGN KEY (`cap_report_id`) REFERENCES `cap_report_list` (`cap_report_id`);

--
-- Constraints for table `inspection_list`
--
ALTER TABLE `inspection_list`
  ADD CONSTRAINT `inspection_list_ibfk_1` FOREIGN KEY (`inspection_report_id`) REFERENCES `inspection_report_list` (`inspection_report_id`);

--
-- Constraints for table `inspection_notes`
--
ALTER TABLE `inspection_notes`
  ADD CONSTRAINT `inspection_notes_ibfk_1` FOREIGN KEY (`inspection_note_id`) REFERENCES `inspection_questions` (`inspection_question_id`) ON DELETE CASCADE;

--
-- Constraints for table `inspection_questions`
--
ALTER TABLE `inspection_questions`
  ADD CONSTRAINT `inspection_questions_ibfk_1` FOREIGN KEY (`inspection_action_id`) REFERENCES `inspection_actions` (`inspection_action_id`),
  ADD CONSTRAINT `inspection_questions_ibfk_4` FOREIGN KEY (`inspection_id`) REFERENCES `inspection_list` (`inspection_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
