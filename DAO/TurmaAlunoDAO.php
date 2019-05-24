<?php 
use conexao\ConexaoDB;
use config\Constantes;
use config\Util;

class TurmaAlunoDAO extends BaseDAO { 

	private static $Instancia;
	private $Db;

	private function __construct() {

		$this->Db = ConexaoDB::GetInstancia()->GetDb();

	}

	public static function GetInstancia() {

		if (!isset(self::$Instancia)) {
			self::$Instancia = new TurmaAlunoDAO();
		}

		return self::$Instancia;	
	}

	public function Salvar($pTurmaAluno){

		$params = array();

		if($pTurmaAluno->getHash() != "") {
			$params[] = $pTurmaAluno->getHash();
			$sql = 'CALL SPUpd_TurmaAluno (?,?,?)';
		}else{
			$sql = 'CALL SPIns_TurmaAluno (?,?)';
		}
		$params[] = $pTurmaAluno->getTurma()->getId();
		$params[] = $pTurmaAluno->getAluno()->getId();

		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}

	public function Remover($pTurmaAluno){

		$params = array();

		$params[] = $pTurmaAluno->getHash();

		$sql = 'CALL SPDel_TurmaAluno (?)';
		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}
	public function Consultar($pTurmaAluno){

	    //Util::fnDebugg($pTurmaAluno);
		$params = array();

		$params[] = $pTurmaAluno->getId();
		$params[] = $pTurmaAluno->getHash();
		
		$params[] = $pTurmaAluno->GetTurma()->getId();
		$params[] = $pTurmaAluno->getAluno()->getId();
		
		$sql = 'CALL SPSel_TurmaAluno (?,?,?,?)';
		Return parent::execQuery($sql,Constantes::SELECTPARAM,$params);

	}
}