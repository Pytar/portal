<?php 
class Professor extends EntidadeCadastro{ 

	private $Nome;

	private $Email;

	private $Telefone;

	public function __construct($pId=0,$pHash='',$pDataCadastro='',$pNome = '',$pEmail = '',$pTelefone = ''){

		parent::setId($pId);
		parent::setHash($pHash);
		parent::setDataCadastro($pDataCadastro);		
		$this->Nome = $pNome;
		$this->Email = $pEmail;
		$this->Telefone = $pTelefone;

	}	
	public function GetNome(){
		return $this->Nome;
	}
	public function SetNome($pNome){
		$this->Nome =$pNome;
	}
	public function GetEmail(){
		return $this->Email;
	}
	public function SetEmail($pEmail){
		$this->Email =$pEmail;
	}
	public function GetTelefone(){
		return $this->Telefone;
	}
	public function SetTelefone($pTelefone){
		$this->Telefone =$pTelefone;
	}
	
}
?>