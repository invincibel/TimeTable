# orif
this project shows the user daily work that he have to do and sends you notification when time is complete. 
now it came how to run this on your device download the codes from here then go to phpmyadmin and then paste the following query there.


1. first create a database name "list" and then paste the following query:

CREATE TABLE `competition` (
  `user` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `chapter` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `time` (
  `name` varchar(50) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `work` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `sex` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

