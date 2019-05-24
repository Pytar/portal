<?php 
class Disciplina extends EntidadeCadastro{ 

	private $Nome;

	private $Curso;

	public function __construct($pId=0,$pHash='',$pDataCadastro='',$pNome = '',Curso $pCurso = NULL){

		parent::setId($pId);
		parent::setHash($pHash);
		parent::setDataCadastro($pDataCadastro);		
		$this->Nome = $pNome;
		
		if (!isset($pCurso)){
		    $this->Curso = new Curso();
		}else {
		    $this->Curso = $pCurso;
		}
		
	}	
	public function GetNome(){
		return $this->Nome;
	}
	public function SetNome($pNome){
		$this->Nome =$pNome;
	}
	public function GetCurso(){
		return $this->Curso;
	}
	public function SetCurso($pCurso){
		$this->Curso =$pCurso;
	}
	
}
?>