-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2019 at 08:54 PM
-- Server version: 5.7.26-log
-- PHP Version: 5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbportal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDel_Aluno` (IN `piIdHash` CHAR(32))  NO SQL
DELETE FROM

		tbl_aluno

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDel_Curso` (IN `piIdHash` CHAR(32))  NO SQL
DELETE FROM

		tbl_curso

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDel_Disciplina` (IN `piIdHash` CHAR(32))  NO SQL
DELETE FROM

		tbl_disciplina

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDel_Professor` (IN `piIdHash` CHAR(32))  NO SQL
DELETE FROM

		tbl_professor

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDel_Turma` (IN `piIdHash` CHAR(32))  NO SQL
DELETE FROM

		tbl_turma

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDel_TurmaAluno` (IN `piIdHash` CHAR(32))  NO SQL
DELETE FROM

		tbl_turmaAluno

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPDel_Turno` (IN `piIdHash` CHAR(32))  NO SQL
DELETE FROM

		tbl_turno

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIns_Aluno` (IN `pvNome` VARCHAR(100), IN `pvCpf` VARCHAR(100), IN `pvEmail` VARCHAR(100), IN `piMatricula` INT, IN `pvTelefone` VARCHAR(100))  NO SQL
INSERT INTO tbl_aluno(  vNome , vCpf , vEmail , iMatricula , vTelefone ,dtDataCadastro)VALUES(  pvNome , pvCpf , pvEmail , piMatricula , pvTelefone ,now())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIns_Curso` (IN `piIdTurno` INT, IN `pvNome` VARCHAR(100), IN `piNumeroperiodos` INT)  NO SQL
INSERT INTO tbl_curso(  iIdTurno , vNome , iNumeroperiodos ,dtDataCadastro)VALUES(  piIdTurno , pvNome , piNumeroperiodos ,now())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIns_Disciplina` (IN `pvNome` VARCHAR(100), IN `piIdCurso` INT)  NO SQL
INSERT INTO tbl_disciplina(  vNome , iIdCurso ,dtDataCadastro)VALUES(  pvNome , piIdCurso ,now())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIns_Professor` (IN `pvNome` VARCHAR(100), IN `pvEmail` VARCHAR(100), IN `pvTelefone` VARCHAR(100))  NO SQL
INSERT INTO tbl_professor(  vNome , vEmail , vTelefone ,dtDataCadastro)VALUES(  pvNome , pvEmail , pvTelefone ,now())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIns_Turma` (IN `piIdDisciplina` INT, IN `piIdProfessor` INT)  NO SQL
INSERT INTO tbl_turma(  iIdDisciplina , iIdProfessor ,dtDataCadastro)VALUES(  piIdDisciplina , piIdProfessor ,now())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIns_TurmaAluno` (IN `piIdTurma` INT, IN `piIdAluno` INT)  NO SQL
INSERT INTO tbl_turmaAluno(  iIdTurma , iIdAluno ,dtDataCadastro)VALUES(  piIdTurma , piIdAluno ,now())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIns_Turno` (IN `pvNome` VARCHAR(100))  NO SQL
INSERT INTO tbl_turno(  vNome ,dtDataCadastro)VALUES(  pvNome ,now())$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_Aluno` (IN `piId` INT, IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100), IN `pvCpf` VARCHAR(100), IN `pvEmail` VARCHAR(100), IN `piMatricula` INT, IN `pvTelefone` VARCHAR(100))  NO SQL
SELECT  
		iId,
		dtDataCadastro,
		vNome,
		vCpf,
		vEmail,
		iMatricula,
		vTelefone
		FROM tbl_aluno 
	WHERE
		((piId = 0)or(iId = piId))
	AND
	(
		( CAST(piIdHash AS CHAR(32)) = '')
		 OR (
			MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) ) )
	)
	
	AND
	(
		( (pvNome = '') OR  (vNome = pvNome )) 
	)
	AND
	(
		( (pvCpf = '') OR  (vCpf = pvCpf )) 
	)
	AND
	(
		( (pvEmail = '') OR  (vEmail = pvEmail )) 
	)
	AND
	(
		( (piMatricula = 0) OR  (iMatricula = piMatricula )) 
	)
	AND
	(
		( (pvTelefone = '') OR  (vTelefone = pvTelefone )) 
	)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_Curso` (IN `piId` INT, IN `piIdHash` CHAR(32), IN `piIdTurno` INT, IN `pvNome` VARCHAR(100), IN `piNumeroperiodos` INT)  NO SQL
SELECT  
		iId,
		dtDataCadastro,
		iIdTurno,
		vNome,
		iNumeroperiodos
		FROM tbl_curso 
	WHERE
		((piId = 0)or(iId = piId))
	AND
	(
		( CAST(piIdHash AS CHAR(32)) = '')
		 OR (
			MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) ) )
	)
	
	AND
	(
		( (piIdTurno = 0) OR  (iIdTurno = piIdTurno )) 
	)
	AND
	(
		( (pvNome = '') OR  (vNome = pvNome )) 
	)
	AND
	(
		( (piNumeroperiodos = 0) OR  (iNumeroperiodos = piNumeroperiodos )) 
	)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_Disciplina` (IN `piId` INT, IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100), IN `piIdCurso` INT)  NO SQL
SELECT  
		iId,
		dtDataCadastro,
		vNome,
		iIdCurso
		FROM tbl_disciplina 
	WHERE
		((piId = 0)or(iId = piId))
	AND
	(
		( CAST(piIdHash AS CHAR(32)) = '')
		 OR (
			MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) ) )
	)
	
	AND
	(
		( (pvNome = '') OR  (vNome = pvNome )) 
	)
	AND
	(
		( (piIdCurso = 0) OR  (iIdCurso = piIdCurso )) 
	)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_Professor` (IN `piId` INT, IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100), IN `pvEmail` VARCHAR(100), IN `pvTelefone` VARCHAR(100))  NO SQL
SELECT  
		iId,
		dtDataCadastro,
		vNome,
		vEmail,
		vTelefone
		FROM tbl_professor 
	WHERE
		((piId = 0)or(iId = piId))
	AND
	(
		( CAST(piIdHash AS CHAR(32)) = '')
		 OR (
			MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) ) )
	)
	
	AND
	(
		( (pvNome = '') OR  (vNome = pvNome )) 
	)
	AND
	(
		( (pvEmail = '') OR  (vEmail = pvEmail )) 
	)
	AND
	(
		( (pvTelefone = '') OR  (vTelefone = pvTelefone )) 
	)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_Turma` (IN `piId` INT, IN `piIdHash` CHAR(32), IN `piIdDisciplina` INT, IN `piIdProfessor` INT)  NO SQL
SELECT  
		iId,
		dtDataCadastro,
		iIdDisciplina,
		iIdProfessor
		FROM tbl_turma 
	WHERE
		((piId = 0)or(iId = piId))
	AND
	(
		( CAST(piIdHash AS CHAR(32)) = '')
		 OR (
			MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) ) )
	)
	
	AND
	(
		( (piIdDisciplina = 0) OR  (iIdDisciplina = piIdDisciplina )) 
	)
	AND
	(
		( (piIdProfessor = 0) OR  (iIdProfessor = piIdProfessor )) 
	)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_TurmaAluno` (IN `piId` INT, IN `piIdHash` CHAR(32), IN `piIdTurma` INT, IN `piIdAluno` INT)  NO SQL
SELECT  
		iId,
		dtDataCadastro,
		iIdTurma,
		iIdAluno
		FROM tbl_turmaAluno 
	WHERE
		((piId = 0)or(iId = piId))
	AND
	(
		( CAST(piIdHash AS CHAR(32)) = '')
		 OR (
			MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) ) )
	)
	
	AND
	(
		( (piIdTurma = 0) OR  (iIdTurma = piIdTurma )) 
	)
	AND
	(
		( (piIdAluno = 0) OR  (iIdAluno = piIdAluno )) 
	)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_TurmaSemAlunos` ()  NO SQL
SELECT  
		tbl_turma.*
	FROM 
		tbl_turma 
	where
		tbl_turma.iId not in (select tbl_turmaaluno.iIdTurma  from tbl_turmaaluno)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPSel_Turno` (IN `piId` INT, IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100))  NO SQL
SELECT  
		iId,
		dtDataCadastro,
		vNome
		FROM tbl_turno 
	WHERE
		((piId = 0)or(iId = piId))
	AND
	(
		( CAST(piIdHash AS CHAR(32)) = '')
		 OR (
			MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) ) )
	)
	
	AND
	(
		( (pvNome = '') OR  (vNome = pvNome )) 
	)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPUpd_Aluno` (IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100), IN `pvCpf` VARCHAR(100), IN `pvEmail` VARCHAR(100), IN `piMatricula` INT, IN `pvTelefone` VARCHAR(100))  NO SQL
UPDATE  tbl_aluno SET

		vNome = pvNome ,
		vCpf = pvCpf ,
		vEmail = pvEmail ,
		iMatricula = piMatricula ,
		vTelefone = pvTelefone 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPUpd_Curso` (IN `piIdHash` CHAR(32), IN `piIdTurno` INT, IN `pvNome` VARCHAR(100), IN `piNumeroperiodos` INT)  NO SQL
UPDATE  tbl_curso SET

		iIdTurno = piIdTurno ,
		vNome = pvNome ,
		iNumeroperiodos = piNumeroperiodos 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPUpd_Disciplina` (IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100), IN `piIdCurso` INT)  NO SQL
UPDATE  tbl_disciplina SET

		vNome = pvNome ,
		iIdCurso = piIdCurso 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPUpd_Professor` (IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100), IN `pvEmail` VARCHAR(100), IN `pvTelefone` VARCHAR(100))  NO SQL
UPDATE  tbl_professor SET

		vNome = pvNome ,
		vEmail = pvEmail ,
		vTelefone = pvTelefone 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPUpd_Turma` (IN `piIdHash` CHAR(32), IN `piIdDisciplina` INT, IN `piIdProfessor` INT)  NO SQL
UPDATE  tbl_turma SET

		iIdDisciplina = piIdDisciplina ,
		iIdProfessor = piIdProfessor 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPUpd_TurmaAluno` (IN `piIdHash` CHAR(32), IN `piIdTurma` INT, IN `piIdAluno` INT)  NO SQL
UPDATE  tbl_turmaAluno SET

		iIdTurma = piIdTurma ,
		iIdAluno = piIdAluno 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPUpd_Turno` (IN `piIdHash` CHAR(32), IN `pvNome` VARCHAR(100))  NO SQL
UPDATE  tbl_turno SET

		vNome = pvNome 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aluno`
--

CREATE TABLE `tbl_aluno` (
  `iId` int(11) NOT NULL,
  `dtDataCadastro` datetime NOT NULL,
  `vNome` varchar(100) NOT NULL,
  `vCpf` varchar(100) NOT NULL,
  `vEmail` varchar(100) NOT NULL,
  `iMatricula` int(11) NOT NULL,
  `vTelefone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aluno`
--

INSERT INTO `tbl_aluno` (`iId`, `dtDataCadastro`, `vNome`, `vCpf`, `vEmail`, `iMatricula`, `vTelefone`) VALUES
(1, '2019-05-23 12:13:15', 'Cleber Melo Filho', '11212312333', 'cleber@bol.com.br', 454343, '34551364'),
(4, '2019-05-23 17:48:47', 'erica patricia', '445.456.456-66', 'cleber@bol.com', 45454, '(11) 1111-1111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curso`
--

CREATE TABLE `tbl_curso` (
  `iId` int(11) NOT NULL,
  `dtDataCadastro` datetime NOT NULL,
  `iIdTurno` int(11) NOT NULL,
  `vNome` varchar(100) NOT NULL,
  `iNumeroperiodos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_curso`
--

INSERT INTO `tbl_curso` (`iId`, `dtDataCadastro`, `iIdTurno`, `vNome`, `iNumeroperiodos`) VALUES
(1, '2019-05-23 20:06:23', 3, 'Direito', 12),
(2, '2019-05-23 20:08:42', 3, 'Medicina', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disciplina`
--

CREATE TABLE `tbl_disciplina` (
  `iId` int(11) NOT NULL,
  `dtDataCadastro` datetime NOT NULL,
  `vNome` varchar(100) NOT NULL,
  `iIdCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_disciplina`
--

INSERT INTO `tbl_disciplina` (`iId`, `dtDataCadastro`, `vNome`, `iIdCurso`) VALUES
(1, '2019-05-23 18:30:11', 'IntroduÃ§Ã£o ao Direito', 1),
(2, '2019-05-23 18:36:06', 'Autonomia', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professor`
--

CREATE TABLE `tbl_professor` (
  `iId` int(11) NOT NULL,
  `dtDataCadastro` datetime NOT NULL,
  `vNome` varchar(100) NOT NULL,
  `vEmail` varchar(100) NOT NULL,
  `vTelefone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_professor`
--

INSERT INTO `tbl_professor` (`iId`, `dtDataCadastro`, `vNome`, `vEmail`, `vTelefone`) VALUES
(1, '2019-05-23 20:55:01', 'Pedro Paulos', 'pedro@bol.com.br', '(11) 1111-1111'),
(2, '2019-05-23 20:59:39', 'Maria das Dores', 'maria@bol.com.br', '(22) 2222-2222');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turma`
--

CREATE TABLE `tbl_turma` (
  `iId` int(11) NOT NULL,
  `dtDataCadastro` datetime NOT NULL,
  `iIdDisciplina` int(11) NOT NULL,
  `iIdProfessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turma`
--

INSERT INTO `tbl_turma` (`iId`, `dtDataCadastro`, `iIdDisciplina`, `iIdProfessor`) VALUES
(1, '2019-05-23 21:47:34', 1, 1),
(2, '2019-05-23 21:48:39', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turmaaluno`
--

CREATE TABLE `tbl_turmaaluno` (
  `iId` int(11) NOT NULL,
  `dtDataCadastro` datetime NOT NULL,
  `iIdTurma` int(11) NOT NULL,
  `iIdAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turno`
--

CREATE TABLE `tbl_turno` (
  `iId` int(11) NOT NULL,
  `dtDataCadastro` datetime NOT NULL,
  `vNome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_turno`
--

INSERT INTO `tbl_turno` (`iId`, `dtDataCadastro`, `vNome`) VALUES
(1, '2019-05-23 19:13:35', 'Manha'),
(2, '2019-05-23 19:13:35', 'Tarde'),
(3, '2019-05-23 19:13:35', 'Noite');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `tbl_disciplina`
--
ALTER TABLE `tbl_disciplina`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `tbl_professor`
--
ALTER TABLE `tbl_professor`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `tbl_turma`
--
ALTER TABLE `tbl_turma`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `tbl_turmaaluno`
--
ALTER TABLE `tbl_turmaaluno`
  ADD PRIMARY KEY (`iId`);

--
-- Indexes for table `tbl_turno`
--
ALTER TABLE `tbl_turno`
  ADD PRIMARY KEY (`iId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_curso`
--
ALTER TABLE `tbl_curso`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_disciplina`
--
ALTER TABLE `tbl_disciplina`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_professor`
--
ALTER TABLE `tbl_professor`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_turma`
--
ALTER TABLE `tbl_turma`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_turmaaluno`
--
ALTER TABLE `tbl_turmaaluno`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_turno`
--
ALTER TABLE `tbl_turno`
  MODIFY `iId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
