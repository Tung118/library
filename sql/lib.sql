-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 08:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";


CREATE TABLE `book` (
  `b_id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `booksname` nvarchar(50) NOT NULL,
  `authorname` nvarchar(50) NOT NULL,
  `copies` varchar(20) NOT NULL,
  `avl_cpy` int(100) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `book` (`b_id`, `booksname`, `authorname`, `copies`, `avl_cpy`, `file_name`, `path`) VALUES
(1, 'Machine Learning', N'Vũ Hữu Tiệp', '10', 10, 'machinelearning.pdf', 'books/machine-learning.pdf'),
(2,N'Công nghệ Blockchain',N'Nhiều tác giả','20',20,'blockchain.pdf','books/blockchain.pdf'),
(3,N'Learning Vue.js',N'Olga Filipova','15',15,'vue-js.pdf','books/vue-js.pdf'),
(4,N'Giáo trình Algorithms',N'Thomas H. Cormen - Charles E. Leiserson','15',15,'algorithms.pdf','books/algorithms.pdf'),
(5,N'Giáo trình thiết kế mạng',N'Nguyễn Gia Như','15',15,'thiet-ke-mang.pdf','books/thiet-ke-mang.pdf'),
(6,N'Cấu trúc dữ liệu và giải thuật',N'Trần Hạnh Nhi – Dương Anh Đức','15',15,'cau-truc-du-lieu-va-giai-thuat.pdf','books/cau-truc-du-lieu-va-giai-thuat.pdf'),
(7,N'Lập trình Java cơ bản',N'Đang cập nhật','15',15,'java.pdf','books/java.pdf'),
(8,N'Giáo trình bảo mật dữ liệu',N'Trần Đức Sự','16',16,'bao-mat-du-lieu.pdf','books/bao-mat-du-lieu.pdf'),
(9,N'.Net - Tập 2',N'Dương Quang Thiện','15',15,'dotnet2.pdf','books/dotnet2.pdf'),
(10,N'.Net - Tập 1',N'Dương Quang Thiện','15',15,'dotnet1.pdf','books/dotnet1.pdf');
CREATE TABLE `student_book` (
  `id` int(10) NOT NULl PRIMARY KEY AUTO_INCREMENT,
  `emailid` varchar(200) NOT NULL,
  `book_id` int(10) NOT NULL,
  `book` nVARCHAR(100) NOT NULL,
  `recive_date` varchar(100) NOT NULL,
  `submisson_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `student_registration` (
  `id` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `name` nvarchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `student_registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;