
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name_feed` varchar(15) NOT NULL,
  `phone_feed` int(11) DEFAULT NULL,
  `email_feed` varchar(15) DEFAULT NULL,
  `msg_feed` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name_feed`,`phone_feed`, `email_feed`, `msg_feed`) VALUES
('John Uree', 52837379,'johnuree@outlook.com', 'Best Site Ever! I am so in love'),
('Mary Xtis', 58575747,'maryathome@gmail.com', 'This site made me very fit. thanks'),
('James Arthur', 59574635,'jamesarthur@gmail.com', 'Nice gallery!'),
('Ram Jotee', 59847472, 'ramjotee@outlook.com', 'Excellent site!'),
('Bibi Ally', 57929288,'bibially@yahoo.com', 'Not so bad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(15) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `confirm_password` varchar(15) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table stores the user data for registration.';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `email`, `phone`, `password`, `confirm_password`) VALUES
('John Uree', 'JohnU', 'johnuree@outlook.com',52837379, 'johnu28', 'johnu28'),
('Mary Xtis', 'Mary', 'maryathome@gmail.com', 58575747, 'maryx12','maryx12'),
('James Arthur', 'James', 'jamesarthur@gmail.com', 59574635, 'jamesss09','jamesss09');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(15) NOT NULL,
  `con_email` varchar(15) DEFAULT NULL,
  `msg` varchar(255) NOT NULL,,

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `con_email`, `msg`) VALUES
('John', 'johnuree@outlook.com', 'Please contact me as soon as possible'),
('Lash', 'lashlou@yahoo.com', 'I need some advice and need to get in touch with you.'),
('Cameron', 'cameron5@gmail.com', 'This site has really help me. can you please contact me for more experience.'),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`name_feed`),


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;