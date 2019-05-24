<?php 
use conexao\ConexaoDB;
use config\Constantes;
use config\Util;

class TurmaDAO extends BaseDAO { 

	private static $Instancia;
	private $Db;

	private function __construct() {

		$this->Db = ConexaoDB::GetInstancia()->GetDb();

	}

	public static function GetInstancia() {

		if (!isset(self::$Instancia)) {
			self::$Instancia = new TurmaDAO();
		}

		return self::$Instancia;	
	}

	public function Salvar( $pTurma){

		$params = array();

		if($pTurma->getHash() != "") {
			$params[] = $pTurma->getHash();
			$sql = 'CALL SPUpd_Turma (?,?,?)';
		}else{
			$sql = 'CALL SPIns_Turma (?,?)';
		}
		$params[] = $pTurma->GetDisciplina()->getId();
		$params[] = $pTurma->GetProfessor()->getId();

		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}

	public function Remover($pTurma){

		$params = array();

		$params[] = $pTurma->getHash();

		$sql = 'CALL SPDel_Turma (?)';
		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}
	public function Consultar($pTurma){

		$params = array();

		$params[] = $pTurma->getId();
		$params[] = $pTurma->getHash();
		
		$params[] = $pTurma->getDisciplina()->getId();
		$params[] = $pTurma->getProfessor()->getId();
		
		$sql = 'CALL SPSel_Turma (?,?,?,?)';
		Return parent::execQuery($sql,Constantes::SELECTPARAM,$params);

	}
	public function ConsultarTurma(){
		
		$sql = 'CALL SPSel_TurmaSemAlunos()';
		Return parent::execQuery($sql,Constantes::SELECT);

	}
}