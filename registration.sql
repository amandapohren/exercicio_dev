-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 12:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration_aluno`
--

CREATE TABLE `registration_aluno` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_aluno`
--

INSERT INTO `registration_aluno` (`matricula`, `nome`, `sexo`, `data_nasc`, `cidade`, `rua`, `numero`, `complemento`, `bairro`) VALUES
(123457, 'Eduardo Dalo', 'Feminino', '2000-01-08', 'Novo Hamburgo', 'Araxá', 372, 'casa', 'Ideal'),
(123458, 'Lucas Pereira', 'Masculino', '2002-02-02', 'Porto Alegre', 'Benjamin Constant', 404, '204', 'São João');

-- --------------------------------------------------------

--
-- Table structure for table `registration_turma`
--

CREATE TABLE `registration_turma` (
  `numeroturma` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `quantvagas` int(11) NOT NULL,
  `nomeprofessor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_turma`
--

INSERT INTO `registration_turma` (`numeroturma`, `descricao`, `quantvagas`, `nomeprofessor`) VALUES
(203, 'Turma Legal', 16, 'Marli');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'amanda', 'amanda@gmail.com', '6209804952225ab3d14348307b5a4a27'),
(2, 'amandapoh', 'amandapoh@gmail.com', '7193279a17a71fc8b83baff16cc400fb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration_aluno`
--
ALTER TABLE `registration_aluno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indexes for table `registration_turma`
--
ALTER TABLE `registration_turma`
  ADD PRIMARY KEY (`numeroturma`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration_aluno`
--
ALTER TABLE `registration_aluno`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123460;

--
-- AUTO_INCREMENT for table `registration_turma`
--
ALTER TABLE `registration_turma`
  MODIFY `numeroturma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
