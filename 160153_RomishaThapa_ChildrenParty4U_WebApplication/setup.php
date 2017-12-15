<?php

$conn = new mysqli("localhost","root","");
$create_db = "create database db_romisha_childrenparty4u";
$result = $conn->query($create_db);
$dbselect = $conn->select_db('db_romisha_childrenparty4u');


$conn->query("CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `party` int(11) NOT NULL,
  `child_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `child_name2` varchar(50) NOT NULL,
  `dob2` date NOT NULL,
  `gender2` varchar(10) NOT NULL,
  `no_of_children` int(11) NOT NULL,
  `party_date` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");


$conn->query("INSERT INTO `tbl_booking` (`booking_id`, `party`, `child_name`, `dob`, `gender`, `child_name2`, `dob2`, `gender2`, `no_of_children`, `party_date`, `user`) VALUES
(1, 21, 'sabin', '2017-04-15', 'Male', 'Rabin', '2017-04-21', 'Female', 22, '2017-04-28', 2),
(2, 22, 'rabin', '2017-04-14', 'Female', 'sabin', '2017-05-03', 'Male', 67, '2017-04-28', 2),
(3, 21, 'ss', '2017-04-29', '', 'ssswdwd', '2017-04-28', 'Female', 90, '2017-04-29', 2),
(4, 22, 'Anuz Pandey', '2026-04-23', 'Male', 'Romisha Thapa', '2024-08-22', 'Female', 20, '2017-04-13', 2),
(5, 21, 'romisha', '2017-04-20', 'Female', 'anuz', '2017-04-23', 'Female', 18, '2017-04-30', 2),
(6, 21, 'Anuzey1', '2017-04-12', 'Male', 'Romishey1', '2017-04-20', 'Female', 19, '2017-04-20', 2),
(7, 21, 'Anuzey1', '2017-04-12', 'Male', 'Romishey1', '2017-04-20', 'Female', 19, '2017-04-20', 2),
(8, 21, 'asdasd', '2017-04-28', 'Male', 'asdasdas', '2017-04-22', 'Female', 13, '2017-04-22', 2),
(9, 21, 'Anu', '2020-02-03', 'Female', 'Romish', '2023-02-03', 'Male', 10, '2015-11-27', 2),
(10, 22, 'Anjan', '2012-10-28', 'Male', 'Romans', '2021-02-03', 'Male', 12, '2020-03-03', 2),
(11, 21, 'askjdhsajk', '2014-11-29', 'Male', 'sjhqiudh', '2014-12-30', 'Female', 12, '2014-10-29', 2)");


$conn->query("CREATE TABLE `tbl_partyinfo` (
  `party_id` int(11) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `party_desc` text NOT NULL,
  `cost_per_child` int(11) NOT NULL,
  `length_of_party` varchar(50) NOT NULL,
  `num_of_children` int(11) NOT NULL,
  `services` text NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

$conn->query("INSERT INTO `tbl_partyinfo` (`party_id`, `party_name`, `party_desc`, `cost_per_child`, `length_of_party`, `num_of_children`, `services`, `photo`) VALUES
(21, 'Build A Bear', 'In this party children will learn how to build their own teddy bear.', 20, '50', 20, 'All the required materials are provided', 'pic_21_party.jpg'),
(22, 'Starwars', 'This party will have starwar themes.', 20, '12', 20, 'Each child will receive Jeda T-shirt as a party gift.', 'pic_22_party.jpg')");


$conn->query("CREATE TABLE `tbl_userinfo` (
  `userid` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");


$conn->query("INSERT INTO `tbl_userinfo` (`userid`, `f_name`, `l_name`, `username`, `password`, `dob`, `email`, `country`, `gender`, `user_type`) VALUES
(1, 'Rajinda', 'Thapa', 'rajinda', '21232f297a57a5a743894a0e4a801fc3', '1996-08-26', 'rajinda@yahoo.com', '2', 'Female', 'Admin'),
(2, 'Romisha', 'Thapa', 'romisha', '5f4dcc3b5aa765d61d8327deb882cf99', '08/26/1996', 'romisha.thapa10@gmail.com', '3', 'Female', 'General'),
(3, 'Anuz', 'Pandey', 'anuzbvb', '6924d37280d59d8735c31f0225d87023', '04/22/1996', 'anuzbvbmanaic123@gmail.com', '1', 'Male', 'General'),
(4, 'Anuz', 'Pandey', 'anuzbvb123', 'f25a2fc72690b780b2a14e140ef6a9e0', '04/22/1996', 'anuzbvbmaniac123@gmail.com', '3', 'Male', 'General')");


$conn->query("ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`)");

$conn->query("ALTER TABLE `tbl_partyinfo`
  ADD PRIMARY KEY (`party_id`)");

$conn->query("ALTER TABLE `tbl_userinfo`
  ADD PRIMARY KEY (`userid`)");

$conn->query("ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12");

$conn->query("ALTER TABLE `tbl_partyinfo`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24");

$conn->query("ALTER TABLE `tbl_userinfo`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5");

header('location:index.php');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

?>