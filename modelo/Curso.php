<?php 
class Curso extends EntidadeCadastro{ 

	private $Turno;

	private $Nome;

	private $NumeroPeriodos;

	public function __construct($pId=0,$pHash='',$pDataCadastro='',Turno $pTurno = NULL,$pNome = '',$pNumeroPeriodos = 0){

		parent::setId($pId);
		parent::setHash($pHash);
		parent::setDataCadastro($pDataCadastro);		
			
		if (!isset($pTurno)){
		    $this->Turno = new Turno();
		}else {
		    $this->Turno = $pTurno;
		}
		
		$this->Nome = $pNome;
		$this->NumeroPeriodos = $pNumeroPeriodos;

	}	
	public function GetTurno(){
		return $this->Turno;
	}
	public function SetTurno($pTurno){
		$this->Turno =$pTurno;
	}
	public function GetNome(){
		return $this->Nome;
	}
	public function SetNome($pNome){
		$this->Nome =$pNome;
	}
	public function GetNumeroPeriodos(){
		return $this->NumeroPeriodos;
	}
	public function SetNumeroPeriodos($pNumeroPeriodos){
	    $this->NumeroPeriodos =$pNumeroPeriodos;
	}
	
}
?>