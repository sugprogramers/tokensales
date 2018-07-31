-- create database smartdeveloper
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `IdAdministrator` int(10) NOT NULL auto_increment,
  `Email` varchar(50) NOT NULL,  
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,  
  PRIMARY KEY (`IdAdministrator`),
 UNIQUE KEY `Unique_Email` (`Email`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;