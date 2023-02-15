-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 15, 2023 alle 21:31
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_andrearanica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `angularDisplacement`
--

CREATE TABLE `angularDisplacement` (
  `displacement` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `angularDisplacement`
--

INSERT INTO `angularDisplacement` (`displacement`, `factor`) VALUES
(0, 1),
(30, 0.9),
(60, 0.81),
(90, 0.71),
(120, 0.52),
(135, 0.57),
(136, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_key` varchar(5) NOT NULL,
  `name` varchar(5) NOT NULL,
  `access_type` bit(1) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `classes`
--

INSERT INTO `classes` (`class_id`, `class_key`, `name`, `access_type`, `school_id`) VALUES
(1, '', '5ID', b'0', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `gripValue`
--

CREATE TABLE `gripValue` (
  `value` varchar(255) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `gripValue`
--

INSERT INTO `gripValue` (`value`, `factor`) VALUES
('Buono', 1),
('Scarso', 0.9);

-- --------------------------------------------------------

--
-- Struttura della tabella `heightFromGround`
--

CREATE TABLE `heightFromGround` (
  `height` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `heightFromGround`
--

INSERT INTO `heightFromGround` (`height`, `factor`) VALUES
(0, 0.77),
(25, 0.85),
(50, 0.93),
(75, 1),
(100, 0.93),
(125, 0.85),
(150, 0.78),
(175, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `horizontalDistance`
--

CREATE TABLE `horizontalDistance` (
  `distance` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `horizontalDistance`
--

INSERT INTO `horizontalDistance` (`distance`, `factor`) VALUES
(25, 1),
(30, 0.83),
(40, 0.63),
(50, 0.5),
(55, 0.45),
(60, 0.42),
(63, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `schools`
--

INSERT INTO `schools` (`school_id`, `name`) VALUES
(1, 'I.T.I.S. Paleocapa');

-- --------------------------------------------------------

--
-- Struttura della tabella `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `photo_path` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `students`
--

INSERT INTO `students` (`student_id`, `name`, `surname`, `photo_path`, `class_id`, `email`, `password`) VALUES
(1, 'Mario', 'Rossi', '', 1, 'mariorossi@gmail.com', 'mariorossi');

-- --------------------------------------------------------

--
-- Struttura della tabella `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Diego', 'Bernini', 'diego.bernini@itispaleocapa.it', 'diegobernini');

-- --------------------------------------------------------

--
-- Struttura della tabella `teaches`
--

CREATE TABLE `teaches` (
  `teaching_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `teaches`
--

INSERT INTO `teaches` (`teaching_id`, `teacher_id`, `class_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name_surname`, `username`, `password`, `role`) VALUES
(1, 'Maurizio Gaffuri', 'mauriziogaffuri', 'mauriziogaffuri', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `verticalDistance`
--

CREATE TABLE `verticalDistance` (
  `dislocation` int(11) NOT NULL,
  `factor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `verticalDistance`
--

INSERT INTO `verticalDistance` (`dislocation`, `factor`) VALUES
(25, 1),
(30, 0.97),
(40, 0.93),
(50, 0.91),
(70, 0.88),
(100, 0.87),
(150, 0.86),
(175, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `angularDisplacement`
--
ALTER TABLE `angularDisplacement`
  ADD PRIMARY KEY (`displacement`);

--
-- Indici per le tabelle `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indici per le tabelle `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `gripValue`
--
ALTER TABLE `gripValue`
  ADD PRIMARY KEY (`value`);

--
-- Indici per le tabelle `heightFromGround`
--
ALTER TABLE `heightFromGround`
  ADD PRIMARY KEY (`height`);

--
-- Indici per le tabelle `horizontalDistance`
--
ALTER TABLE `horizontalDistance`
  ADD PRIMARY KEY (`distance`);

--
-- Indici per le tabelle `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indici per le tabelle `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indici per le tabelle `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indici per le tabelle `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`teaching_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `verticalDistance`
--
ALTER TABLE `verticalDistance`
  ADD PRIMARY KEY (`dislocation`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `teaches`
--
ALTER TABLE `teaches`
  MODIFY `teaching_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`);

--
-- Limiti per la tabella `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`);

--
-- Limiti per la tabella `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
