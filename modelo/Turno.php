<?php 
class Turno extends EntidadeCadastro{ 

	private $Nome;

	public function __construct($pId=0,$pHash='',$pDataCadastro='',$pNome = ''){

		parent::setId($pId);
		parent::setHash($pHash);
		parent::setDataCadastro($pDataCadastro);		
		$this->Nome = $pNome;

	}	
	public function GetNome(){
		return $this->Nome;
	}
	public function SetNome($pNome){
		$this->Nome =$pNome;
	}
	
}
?>