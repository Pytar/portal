CREATE DATABASE IF NOT EXISTS `dbPortal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE `dbPortal`;

DELIMITER $$
CREATE  PROCEDURE `SPDel_Curso`(IN `piIdHash` CHAR(32))
	NO SQL
	DELETE FROM

		tbl_curso

	WHERE

		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

CREATE  PROCEDURE `SPIns_Curso`(  IN `pvNome` VARCHAR(100) , IN `piNumeroPeriodos` INT , IN `pvTurno` VARCHAR(100))
	NO SQL
	INSERT INTO tbl_curso(  vNome , iNumeroPeriodos , vTurno ,dtDataCadastro)VALUES(  pvNome , piNumeroPeriodos , pvTurno ,now())$$

CREATE  PROCEDURE `SPSel_Curso`( IN `piId` INT ,IN `piIdHash` CHAR(32),  IN `pvNome` VARCHAR(100) , IN `piNumeroPeriodos` INT , IN `pvTurno` VARCHAR(100) )
	NO SQL
	SELECT  
		iId,
		dtDataCadastro,
		vNome,
		iNumeroPeriodos,
		vTurno
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
		( (pvNome = '') OR  (vNome = pvNome )) 
	)
	AND
	(
		( (piNumeroPeriodos = 0) OR  (iNumeroPeriodos = piNumeroPeriodos )) 
	)
	AND
	(
		( (pvTurno = '') OR  (vTurno = pvTurno )) 
	)

	$$
CREATE  PROCEDURE `SPUpd_Curso`(IN `piIdHash`  CHAR(32) ,  IN `pvNome` VARCHAR(100) , IN `piNumeroPeriodos` INT , IN `pvTurno` VARCHAR(100) )
	NO SQL
	UPDATE  tbl_curso SET

		vNome = pvNome ,
		iNumeroPeriodos = piNumeroPeriodos ,
		vTurno = pvTurno 
		

	WHERE
		MD5( CAST( iId AS CHAR( 32 ) ) ) = CAST(piIdHash AS CHAR(32) )$$

DELIMITER ;
CREATE TABLE IF NOT EXISTS tbl_curso(
	`iId` int(11) NOT NULL AUTO_INCREMENT,
	`dtDataCadastro` DATETIME NOT NULL ,
	`vNome` varchar(100) NOT NULL ,
	`iNumeroPeriodos` int(11) NOT NULL ,
	`vTurno` varchar(100) NOT NULL ,
	
	 PRIMARY KEY (`iId`) 
)
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
	