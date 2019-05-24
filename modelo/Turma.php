<?php 
class Turma extends EntidadeCadastro{ 

	private $Disciplina;

	private $Professor;
	
	private $IsConsultarPreenchimento;

	public function __construct($pId=0,$pHash='',$pDataCadastro='',Disciplina $pDisciplina = NULL,Professor $pProfessor = NULL,$pIsConsultarPreenchimento = FALSE){

		parent::setId($pId);
		parent::setHash($pHash);
		parent::setDataCadastro($pDataCadastro);	
		
		if (!isset($pDisciplina)){
		    $this->Disciplina = new Disciplina();
		}else {
		    $this->Disciplina = $pDisciplina;
		}
		
		if (!isset($pProfessor)){
		    $this->Professor = new Professor();
		}else {
		    $this->Professor = $pProfessor;
		}
		


	}	
	public function GetDisciplina(){
		return $this->Disciplina;
	}
	public function SetDisciplina($pDisciplina){
		$this->Disciplina =$pDisciplina;
	}
	public function GetProfessor(){
		return $this->Professor;
	}
	public function SetProfessor($pProfessor){
		$this->Professor =$pProfessor;
	}
	
	public function GetIsConsultarPreenchimento(){
	    return $this->IsConsultarPreenchimento;
	}
	public function SetIsConsultarPreenchimento($pIsConsultarPreenchimento){
	    $this->IsConsultarPreenchimento =$pIsConsultarPreenchimento;
	}
	
}
?>