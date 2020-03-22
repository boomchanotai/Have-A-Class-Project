-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 08:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haveaclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `engName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`ID`, `Name`, `engName`) VALUES
(1, 'ตำกว่าประถมศึกษาปีที่ 5', 'Lower than Grade 5'),
(2, 'ประถมศึกษาปีที่ 5', 'Grade 5'),
(3, 'ประถมศึกษาปีที่ 6', 'Grade 6'),
(4, 'มัธยมศึกษาปีที่ 1', 'Grade 7'),
(5, 'มัธยมศึกษาปีที่ 2', 'Grade 8'),
(6, 'มัธยมศึกษาปีที่ 3', 'Grade 9'),
(7, 'มัธยมศึกษาปีที่ 4', 'Grade 10'),
(8, 'มัธยมศึกษาปีที่ 5', 'Grade 11'),
(9, 'มัธยมศึกษาปีที่ 6', 'Grade 12'),
(10, 'ประกาศนียบัตรวิชาชีพปี 1', 'VCE 1'),
(11, 'ประกาศนียบัตรวิชาชีพปี 2', 'VCE 2'),
(12, 'ประกาศนียบัตรวิชาชีพปี 3', 'VCE 3'),
(14, 'ปริญญาตรี', 'Bachelor’s degree'),
(15, 'ปริญญาโท', 'Master’s degree'),
(16, 'ปริญญาเอก', 'Doctor’s degree');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `engName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`ID`, `Name`, `engName`) VALUES
(1, 'ชาย', 'male'),
(2, 'หญิง', 'female'),
(3, 'LGBTQ+', 'LGBTQ+');

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `engName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`ID`, `Name`, `engName`) VALUES
(1, 'นาย', 'Mr.'),
(2, 'นางสาว', 'Miss'),
(3, 'นาง', 'Mrs.'),
(4, 'เด็กชาย', 'Master'),
(5, 'เด็กหญิง', 'Miss'),
(6, 'ศาสตราจารย์', 'Professor'),
(7, 'ผู้ช่วยศาสตราจารย์', 'Assistant Professor'),
(8, 'รองศาสตราจารย์', 'Associate Professor');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `engName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`ID`, `Name`, `engName`) VALUES
(1, 'กระบี่', 'Krabi'),
(2, 'กรุงเทพมหานคร', 'Bangkok'),
(3, 'กาญจนบุรี', 'Kanchanaburi'),
(4, 'กาฬสินธุ์', 'Kalasin'),
(5, 'กำแพงเพชร', 'Kamphaeng Phet'),
(6, 'ขอนแก่น', 'Khon Kaen'),
(7, 'จันทบุรี', 'Chanthaburi'),
(8, 'ฉะเชิงเทรา', 'Chachoengsao'),
(9, 'ชลบุรี', 'Chonburi'),
(10, 'ชัยนาท', 'Chainat'),
(11, 'ชัยภูมิ', 'Chaiyaphum'),
(12, 'ชุมพร', 'Chumphon'),
(13, 'เชียงราย', 'Chiang Rai'),
(14, 'เชียงใหม่', 'Chiang Mai'),
(15, 'ตรัง', 'Trang'),
(16, 'ตราด', 'Trat'),
(17, 'ตาก', 'Tak'),
(18, 'นครนายก', 'Nakhon Nayok'),
(19, 'นครปฐม', 'Nakhon Pathom'),
(20, 'นครพนม', 'Nakhon Phanom'),
(21, 'นครราชสีมา', 'Nakhon Ratchasima'),
(22, 'นครศรีธรรมราช', 'Nakhon Si Thammarat'),
(23, 'นครสวรรค์', 'Nakhon Sawan'),
(24, 'นนทบุรี', 'Nonthaburi'),
(25, 'นราธิวาส', 'Narathiwat'),
(26, 'น่าน', 'Nan'),
(27, 'บึงกาฬ', 'Bueng Kan'),
(28, 'บุรีรัมย์', 'Buriram'),
(29, 'ปทุมธานี', 'Pathum Thani'),
(30, 'ประจวบคีรีขันธ์', 'Prachuap Khiri Khan'),
(31, 'ปราจีนบุรี', 'Prachinburi'),
(32, 'ปัตตานี', 'Pattani'),
(33, 'พระนครศรีอยุธยา', 'Phra Nakhon Si Ayutthaya'),
(34, 'พะเยา', 'Phayao'),
(35, 'พังงา', 'Phang Nga'),
(36, 'พัทลุง', 'Phatthalung'),
(37, 'พิจิตร', 'Phichit'),
(38, 'พิษณุโลก', 'Phitsanulok'),
(39, 'เพชรบุรี', 'Phetchaburi'),
(40, 'เพชรบูรณ์', 'Phetchabun'),
(41, 'แพร่', 'Phrae'),
(42, 'ภูเก็ต', 'Phuket'),
(43, 'มหาสารคาม', 'Maha Sarakham'),
(44, 'มุกดาหาร', 'Mukdahan'),
(45, 'แม่ฮ่องสอน', 'Mae Hong Son'),
(46, 'ยโสธร', 'Yasothon'),
(47, 'ยะลา', 'Yala'),
(48, 'ร้อยเอ็ด', 'Roi Et'),
(49, 'ระนอง', 'Ranong'),
(50, 'ระยอง', 'Rayong'),
(51, 'ราชบุรี', 'Ratchaburi'),
(52, 'ลพบุรี', 'Lopburi'),
(53, 'ลำปาง', 'Lampang'),
(54, 'ลำพูน', 'Lamphun'),
(55, 'เลย', 'Loei'),
(56, 'ศรีสะเกษ', 'Sisaket'),
(57, 'สกลนคร', 'Sakon Nakhon'),
(58, 'สงขลา', 'Songkhla'),
(59, 'สตูล', 'Satun'),
(60, 'สมุทรปราการ', 'Samut Prakan'),
(61, 'สมุทรสงคราม', 'Samut Songkhram'),
(62, 'สมุทรสาคร', 'Samut Sakhon'),
(63, 'สระแก้ว', 'Sa Kaeo'),
(64, 'สระบุรี', 'Saraburi'),
(65, 'สิงห์บุรี', 'Sing Buri'),
(66, 'สุโขทัย', 'Sukhothai'),
(67, 'สุพรรณบุรี', 'Suphan Buri'),
(68, 'สุราษฎร์ธานี', 'Surat Thani'),
(69, 'สุรินทร์', 'Surin'),
(70, 'หนองคาย', 'Nong Khai'),
(71, 'หนองบัวลำภู', 'Nong Bua Lamphu'),
(72, 'อ่างทอง', 'Ang Thong'),
(73, 'อำนาจเจริญ', 'Amnat Charoen'),
(74, 'อุดรธานี', 'Udon Thani'),
(75, 'อุตรดิตถ์', 'Uttaradit'),
(76, 'อุทัยธานี', 'Uthai Thani'),
(77, 'อุบลราชธานี', 'Ubon Ratchathani');

-- --------------------------------------------------------

--
-- Table structure for table `reporttype`
--

CREATE TABLE `reporttype` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `engName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reporttype`
--

INSERT INTO `reporttype` (`ID`, `Name`, `engName`) VALUES
(1, 'แจ้งปัญหาทั่วไป', 'Report'),
(2, 'แจ้งเพิ่มวิชาในการสอน', 'Add more subject');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `engName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID`, `Name`, `engName`) VALUES
(1, 'Founder', 'Founder'),
(2, 'Admin', 'Admin'),
(3, 'ติวเตอร์', 'Tutor'),
(4, 'นักเรียน', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `studiestype`
--

CREATE TABLE `studiestype` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `engName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studiestype`
--

INSERT INTO `studiestype` (`ID`, `Name`, `engName`) VALUES
(1, 'Online (Video Call)', 'Online (Video Call)'),
(2, 'Meet (นัดเจอกัน)', 'Meet');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `engName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Name`, `engName`) VALUES
(1, 'คณิตศาสตร์', 'Mathematics'),
(2, 'วิทยาศาสตร์', 'Science'),
(3, 'ฟิสิกส์', 'Physic'),
(4, 'เคมี', 'Chemistry'),
(5, 'ชีววิทยา', 'Biology'),
(6, 'ภาษาอังกฤษ', 'English language'),
(7, 'ภาษาจีน', 'Chinese language'),
(8, 'ภาษาญี่ปุ่น', 'Japanese language'),
(9, 'กฎหมาย', 'Law'),
(10, 'เศรษฐศาสตร์', 'Economics'),
(11, 'การทูต', 'Diplomacy'),
(12, 'ทัศนศิลป์', 'Visual Arts'),
(13, 'ออกแบบแฟชั่น', 'Fashion Design'),
(14, 'ออกแบบโปสเตอร์', 'Poster Design'),
(15, 'ออกแบบจิวเวลรี่', 'Jewelry Design'),
(16, 'Programming', 'Programming'),
(17, 'ประวัติศาสตร์', 'History');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ID` int(11) NOT NULL,
  `date` varchar(21) NOT NULL,
  `type` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `information` varchar(255) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ID`, `date`, `type`, `subject`, `information`, `reply`, `userid`, `status`) VALUES
(1, '2020-03-19 12:05:52pm', 1, 'dsafsdf', 'dasfasdf', NULL, 1, 0),
(2, '2020-03-19 12:25:16pm', 1, 'fsdfdasfasd', 'fdsafasdf', NULL, 1, 0),
(3, '2020-03-19 05:22:04pm', 1, 'fsadfasd', 'dasfdsafasdf', NULL, 2, 0),
(4, '2020-03-19 05:24:29pm', 1, 'dfasd', 'fasdfdas', 'dasd', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutorpublish`
--

CREATE TABLE `tutorpublish` (
  `ID` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `topic` varchar(30) NOT NULL,
  `date` varchar(21) NOT NULL,
  `user` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `price` int(11) NOT NULL,
  `agestu` varchar(10) NOT NULL,
  `place` varchar(60) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorpublish`
--

INSERT INTO `tutorpublish` (`ID`, `subject`, `topic`, `date`, `user`, `type`, `price`, `agestu`, `place`, `description`, `status`) VALUES
(1, 9, 'กฎหมายเกี่ยวกับพระมหากษัตริย์', '', 2, 1, 300, '15-20', 'สยาม, แนวบีทีเอส', 'น้องๆ อยากทราบเกี่ยวกับกฎหมายไทย หรือไม่ครับ ว่าพระมหากษัตริย์มีอำนาจในการจัดการอะไรบ้าง', 1),
(2, 1, 'Parabola', '', 2, 2, 500, '14-17', 'มหาวิทยาลัยศรีนครินทรวิโรฒ ประสานมิตร', 'Mathematics is the queen of science.', 1),
(3, 7, 'ภาษาจีนเบื้องต้น', '', 2, 1, 400, '5-10', 'โรงเรียนกวดวิชาใกล้รุ่ง', 'สามารถนำไปสอบ HSK ได้', 1),
(4, 4, 'เซลล์ของสิ่งมีชีวิต', '', 2, 2, 350, '12-16', 'สยาม', 'ทุกสิ่งอย่าง สามารถพิสูจน์ได้ด้วย \"วิทยาศาสตร์\"', 1),
(5, 10, 'การบริหารจัดการทุนทรัพย์', '', 2, 1, 500, '14-16', 'สยาม', 'เริ่มต้นทำธุรกิจ เพื่อทำให้เติบโตในภายภาคหน้า', 1),
(6, 12, 'การจับคู่สีเบื้องต้น', '', 1, 1, 700, '16-17', 'สถาบันสอนพิเศษทัศนศิลป์', 'การจับคู่สีในงานของเราได้ดี จะทำให้งานของเราดูน่าสนใจมากยิ่งขึ้น', 1),
(7, 1, 'ไฮเพอร์โบลา', '', 1, 2, 300, '15-17', 'Too Fast Too Sleep มศว.', 'Mathematics is the best subject for engineering and programming. It can make your program become better because of your math\'s logic.', 1),
(8, 2, 'ระบบทางเดินหายใจ', '', 1, 1, 500, '16-17', 'ที่ไหนก็ได้', 'ระบบทางเดินหายใจเป็นส่วนหนึ่งที่สำคัญต่อร่างกาย การเรียนการสอนของเราจะทำให้คุณเข้าใจว่ามันมีการทำงานอย่างไร และสนุกไปกับมัน!', 1),
(9, 1, 'วงรี', '', 2, 1, 300, '15-17', 'Online', 'วงรีเป็น 1 ในเรื่องภาคตัดกรวย', 1),
(10, 6, 'Tense', '', 2, 2, 450, '10-15', 'สยาม', 'เรียนอังกฤษง่าย ชิลๆสไลต์ครูสมศรี\nเสริมสร้างประสบการณ์ในการเข้าใจภาษาอังกฤษ\nปูพื้นฐาน Tense ในแน่นๆ ก่อนไปเรื่องต่างๆ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prefix` int(1) NOT NULL,
  `thaifirstname` varchar(255) NOT NULL,
  `thailastname` varchar(255) NOT NULL,
  `thainickname` varchar(255) NOT NULL,
  `engfirstname` varchar(255) NOT NULL,
  `englastname` varchar(255) NOT NULL,
  `engnickname` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `sex` int(1) NOT NULL,
  `education` int(2) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `urlfacebook` varchar(255) NOT NULL,
  `lineid` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `role` int(1) NOT NULL,
  `verification` int(1) NOT NULL,
  `image` varchar(40) DEFAULT NULL,
  `lastlogin` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `realname`, `password`, `email`, `prefix`, `thaifirstname`, `thailastname`, `thainickname`, `engfirstname`, `englastname`, `engnickname`, `age`, `sex`, `education`, `district`, `province`, `facebook`, `urlfacebook`, `lineid`, `tel`, `role`, `verification`, `image`, `lastlogin`) VALUES
(1, 'o0koonboom0o', 'o0KoonBoom0o', '0fdfdd3b4bad88114734d860858ad9fc', 'boom9387@hotmail.com', 1, 'ชโณทัย', 'กระแจ่ม', 'บูม', 'Chanotai', 'Krajeam', 'Boom', 16, 1, 8, 'จรัญ 13', 2, 'Chanotai Krajeam', 'https://www.facebook.com/ChanotaiKrajeam', 'boom_chanotai', '0969163254', 1, 0, 'ab42bfadd49e4e741d68bb1fa1d5c198.jpg', '2020-03-22 10:48:52am'),
(2, 'root', 'root', '0fdfdd3b4bad88114734d860858ad9fc', 'boom9387@hotmail.com', 1, 'ชโณทัย', 'กระแจ่ม', 'dasd', 'Chanotai', 'Krajeam', 'sdf', 90, 2, 14, 'asd', 12, 'sdfd', 'https://www.facebook.com/ChanotaiKrajeam', 'boom_chanotai', '0945835820', 3, 0, '5be4aca5423a81a8e3ac2add01a1d714.jpg', '2020-03-22 01:59:30pm'),
(3, 'boom', 'boom', '0fdfdd3b4bad88114734d860858ad9fc', 'chanotai9387@gmail.com', 1, 'ชโณทัย', 'กระแจ่ม', 'บูม', 'Chanotai', 'Krajeam', 'Boom', 16, 1, 8, 'จรัญ 13', 12, 'Chanotai Krajeam', 'https://www.facebook.com/ChanotaiKrajeam', 'boom_chanotai', '0969163254', 3, 0, NULL, '2020-03-19 11:59:30pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reporttype`
--
ALTER TABLE `reporttype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `studiestype`
--
ALTER TABLE `studiestype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userid` (`userid`),
  ADD KEY `reporttype` (`type`);

--
-- Indexes for table `tutorpublish`
--
ALTER TABLE `tutorpublish`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `type` (`type`),
  ADD KEY `subject` (`subject`),
  ADD KEY `userpost` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gender` (`sex`),
  ADD KEY `edu` (`education`),
  ADD KEY `prefix` (`prefix`),
  ADD KEY `province` (`province`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `reporttype`
--
ALTER TABLE `reporttype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studiestype`
--
ALTER TABLE `studiestype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutorpublish`
--
ALTER TABLE `tutorpublish`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `reporttype` FOREIGN KEY (`type`) REFERENCES `reporttype` (`ID`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `tutorpublish`
--
ALTER TABLE `tutorpublish`
  ADD CONSTRAINT `subject` FOREIGN KEY (`subject`) REFERENCES `subjects` (`ID`),
  ADD CONSTRAINT `type` FOREIGN KEY (`type`) REFERENCES `studiestype` (`ID`),
  ADD CONSTRAINT `userpost` FOREIGN KEY (`user`) REFERENCES `user` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `edu` FOREIGN KEY (`education`) REFERENCES `education` (`ID`),
  ADD CONSTRAINT `gender` FOREIGN KEY (`sex`) REFERENCES `gender` (`ID`),
  ADD CONSTRAINT `prefix` FOREIGN KEY (`prefix`) REFERENCES `prefix` (`ID`),
  ADD CONSTRAINT `province` FOREIGN KEY (`province`) REFERENCES `province` (`ID`),
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `role` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
