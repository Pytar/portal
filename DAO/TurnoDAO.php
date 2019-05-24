<?php 
use conexao\ConexaoDB;
use config\Constantes;

class TurnoDAO extends BaseDAO { 

	private static $Instancia;
	private $Db;

	private function __construct() {

		$this->Db = ConexaoDB::GetInstancia()->GetDb();

	}

	public static function GetInstancia() {

		if (!isset(self::$Instancia)) {
			self::$Instancia = new TurnoDAO();
		}

		return self::$Instancia;	
	}

	public function Salvar($pTurno){

		$params = array();

		if($pTurno->getHash() != "") {
			$params[] = $pTurno->getHash();
			$sql = 'CALL SPUpd_Turno (?,?)';
		}else{
			$sql = 'CALL SPIns_Turno (?)';
		}
		$params[] = $pTurno->getNome();

		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}

	public function Remover($pTurno){

		$params = array();

		$params[] = $pTurno->getHash();

		$sql = 'CALL SPDel_Turno (?)';
		Return parent::execQuery($sql,Constantes::QUERYPARAM,$params);

	}
	public function Consultar($pTurno){

		$params = array();

		$params[] = $pTurno->getId();
		$params[] = $pTurno->getHash();
		
		$params[] = $pTurno->getNome();
		
		$sql = 'CALL SPSel_Turno (?,?,?)';
		Return parent::execQuery($sql,Constantes::SELECTPARAM,$params);

	}
}