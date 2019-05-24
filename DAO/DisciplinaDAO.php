<?php 
use conexao\ConexaoDB;
use config\Constantes;

class DisciplinaDAO extends BaseDAO { 

	private static $Instancia;
	private $Db;

	private function __construct() {

		$this->Db = ConexaoDB::GetInstancia()->GetDb();

	}

	public static function GetInstancia() {

		if (!isset(self::$Instancia)) {
			self::$Instancia = new DisciplinaDAO();
		}

		return self::$Instancia;	
	}

	public function Salvar($pDisciplina){

		$params = array();

		if($pDisciplina->getHash() != "") {
			$params[] = $pDisciplina->getHash();
			$sql = 'CALL SPUpd_Disciplina (?,?,?)';
		}else{
			$sql = 'CALL SPIns_Disciplina (?,?)';
		}
		$params[] = $pDisciplina->getNome();
		$params[] = $pDisciplina->getCurso()->getId();

		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}

	public function Remover($pDisciplina){

		$params = array();

		$params[] = $pDisciplina->getHash();

		$sql = 'CALL SPDel_Disciplina (?)';
		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}
	public function Consultar($pDisciplina){

		$params = array();

		$params[] = $pDisciplina->getId();
		$params[] = $pDisciplina->getHash();
		
		$params[] = $pDisciplina->getNome();
		$params[] = $pDisciplina->getCurso()->getId();
		
		$sql = 'CALL SPSel_Disciplina (?,?,?,?)';
		Return parent::execQuery($sql,Constantes::SELECTPARAM,$params);

	}
}