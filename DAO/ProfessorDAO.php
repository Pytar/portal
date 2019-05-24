<?php 
use conexao\ConexaoDB;
use config\Constantes;

class ProfessorDAO extends BaseDAO { 

	private static $Instancia;
	private $Db;

	private function __construct() {

		$this->Db = ConexaoDB::GetInstancia()->GetDb();

	}

	public static function GetInstancia() {

		if (!isset(self::$Instancia)) {
			self::$Instancia = new ProfessorDAO();
		}

		return self::$Instancia;	
	}

	public function Salvar($pProfessor){

		$params = array();

		if($pProfessor->getHash() != "") {
			$params[] = $pProfessor->getHash();
			$sql = 'CALL SPUpd_Professor (?,?,?,?)';
		}else{
			$sql = 'CALL SPIns_Professor (?,?,?)';
		}
		$params[] = $pProfessor->getNome();
		$params[] = $pProfessor->getEmail();
		$params[] = $pProfessor->getTelefone();

		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}

	public function Remover($pProfessor){

		$params = array();

		$params[] = $pProfessor->getHash();

		$sql = 'CALL SPDel_Professor (?)';
		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}
	public function Consultar($pProfessor){

		$params = array();

		$params[] = $pProfessor->getId();
		$params[] = $pProfessor->getHash();
		
		$params[] = $pProfessor->getNome();
		$params[] = $pProfessor->getEmail();
		$params[] = $pProfessor->getTelefone();
		
		$sql = 'CALL SPSel_Professor (?,?,?,?,?)';
		Return parent::execQuery($sql,Constantes::SELECTPARAM,$params);

	}
}