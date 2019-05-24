<?php 
use conexao\ConexaoDB;
use config\Constantes;

class AlunoDAO extends BaseDAO { 

	private static $Instancia;
	private $Db;

	private function __construct() {

		$this->Db = ConexaoDB::GetInstancia()->GetDb();

	}

	public static function GetInstancia() {

		if (!isset(self::$Instancia)) {
			self::$Instancia = new AlunoDAO();
		}

		return self::$Instancia;	
	}

	public function Salvar($pAluno){

		$params = array();

		if($pAluno->getHash() != "") {
			$params[] = $pAluno->getHash();
			$sql = 'CALL SPUpd_Aluno (?,?,?,?,?,?)';
		}else{
			$sql = 'CALL SPIns_Aluno (?,?,?,?,?)';
		}
		$params[] = $pAluno->getNome();
		$params[] = $pAluno->getCpf();
		$params[] = $pAluno->getEmail();
		$params[] = $pAluno->getMatricula();
		$params[] = $pAluno->getTelefone();

		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}

	public function Remover($pAluno){

		$params = array();

		$params[] = $pAluno->getHash();

		$sql = 'CALL SPDel_Aluno (?)';
		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}
	public function Consultar($pAluno){

		$params = array();

		$params[] = $pAluno->getId();
		$params[] = $pAluno->getHash();
		
		$params[] = $pAluno->getNome();
		$params[] = $pAluno->getCpf();
		$params[] = $pAluno->getEmail();
		$params[] = $pAluno->getMatricula();
		$params[] = $pAluno->getTelefone();
		
		$sql = 'CALL SPSel_Aluno (?,?,?,?,?,?,?)';
		Return parent::execQuery($sql,Constantes::SELECTPARAM,$params);

	}
}