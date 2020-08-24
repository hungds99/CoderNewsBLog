CREATE DATABASE `codernews`;

USE `codernews`;

-- Table Admin 
CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL auto_increment,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  primary key(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '$2y$12$i4LMfeFPQpGSNPTaccIkKuwxAkJ4PhBr3JND7FpXwWFjRvchQn17C', 'dinhsyhung99@gmail.com', 1, '2020-08-07 17:51:00', '2020-08-07 18:21:07');


CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL auto_increment,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  primary key (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'Java', 'Java, java core, java 8', '2020-08-07 10:28:09', '2020-08-07 18:41:07', 1),
(2, 'Spring', 'Spring, framework, mvc, core, cloud', '2020-08-07 10:28:09', '2020-08-07 18:41:07', 1),
(3, 'Database', 'Mysql, SQL, no SQL', '2020-08-07 10:28:09', '2020-08-07 18:41:07', 1),
(4, 'Tools', 'IDE, text editor', '2020-08-07 10:28:09', '2020-08-07 18:41:07', 1),
(5, 'Devops', 'AWS, cloud, Azure', '2020-08-07 10:28:09', '2020-08-07 18:41:07', 1),
(6, 'Spring Boot', 'Spring Boot, Spring framework', '2020-08-07 10:28:09', '2020-08-07 18:41:07', 1);


CREATE TABLE `tblposts` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `PostTitle` VARCHAR(600) DEFAULT NULL,
    `CategoryId` INT(11) DEFAULT NULL,
    `PostDetails` LONGTEXT CHARACTER SET UTF8 DEFAULT NULL,
    `PostingDate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP (),
    `UpdationDate` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP (),
    `Is_Active` INT(1) DEFAULT NULL,
    `PostUrl` VARCHAR(600) DEFAULT NULL,
    `PostImage` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`CategoryId`)
        REFERENCES tblcategory (`id`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;


CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL auto_increment,
  `postId` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  primary key(`id`),
  foreign key(`postId`) references tblposts(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;