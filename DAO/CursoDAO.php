<?php 
use conexao\ConexaoDB;
use config\Constantes;

class CursoDAO extends BaseDAO { 

	private static $Instancia;
	private $Db;

	private function __construct() {

		$this->Db = ConexaoDB::GetInstancia()->GetDb();

	}

	public static function GetInstancia() {

		if (!isset(self::$Instancia)) {
			self::$Instancia = new CursoDAO();
		}

		return self::$Instancia;	
	}

	public function Salvar($pCurso){

		$params = array();

		if($pCurso->getHash() != "") {
			$params[] = $pCurso->getHash();
			$sql = 'CALL SPUpd_Curso (?,?,?,?)';
		}else{
			$sql = 'CALL SPIns_Curso (?,?,?)';
		}
		$params[] = $pCurso->getTurno()->getId();
		$params[] = $pCurso->getNome();
		$params[] = $pCurso->getNumeroPeriodos();

		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}

	public function Remover($pCurso){

		$params = array();

		$params[] = $pCurso->getHash();

		$sql = 'CALL SPDel_Curso (?)';
		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}
	public function Consultar($pCurso){

		$params = array();

		$params[] = $pCurso->getId();
		$params[] = $pCurso->getHash();
		
		$params[] = $pCurso->getTurno()->getId();
		
		$params[] = $pCurso->getNome();
		$params[] = $pCurso->getNumeroPeriodos();
		
		$sql = 'CALL SPSel_Curso (?,?,?,?,?)';
		Return parent::execQuery($sql,Constantes::SELECTPARAM,$params);

	}
}