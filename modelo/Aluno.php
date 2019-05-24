<?php 
class Aluno extends EntidadeCadastro{ 

	private $Nome;

	private $Cpf;

	private $Email;

	private $Matricula;

	private $Telefone;

	public function __construct($pId=0,$pHash='',$pDataCadastro='',$pNome = '',$pCpf = '',$pEmail = '',$pMatricula = 0,$pTelefone = ''){

		parent::setId($pId);
		parent::setHash($pHash);
		parent::setDataCadastro($pDataCadastro);		
		$this->Nome = $pNome;
		$this->Cpf = $pCpf;
		$this->Email = $pEmail;
		$this->Matricula = $pMatricula;
		$this->Telefone = $pTelefone;

	}	
	public function GetNome(){
		return $this->Nome;
	}
	public function SetNome($pNome){
		$this->Nome =$pNome;
	}
	public function GetCpf(){
		return $this->Cpf;
	}
	public function SetCpf($pCpf){
		$this->Cpf =$pCpf;
	}
	public function GetEmail(){
		return $this->Email;
	}
	public function SetEmail($pEmail){
		$this->Email =$pEmail;
	}
	public function GetMatricula(){
		return $this->Matricula;
	}
	public function SetMatricula($pMatricula){
		$this->Matricula =$pMatricula;
	}
	public function GetTelefone(){
		return $this->Telefone;
	}
	public function SetTelefone($pTelefone){
		$this->Telefone =$pTelefone;
	}
	
}
?>