<?php 
class TurmaAluno extends EntidadeCadastro{ 

	private $Turma;

	private $Aluno;

	public function __construct($pId=0,$pHash='',$pDataCadastro='',Turma $pTurma = NULL,Aluno $pAluno = NULL){

		parent::setId($pId);
		parent::setHash($pHash);
		parent::setDataCadastro($pDataCadastro);
		
		if (!isset($pTurma)){
		    $this->Turma = new Turma();
		}else {
		    $this->Turma = $pTurma;
		}
		
		if (!isset($pAluno)){
		    $this->Aluno = new Aluno();
		}else {
		    $this->Aluno = $pAluno;
		}
		

	}	
	public function GetTurma(){
		return $this->Turma;
	}
	public function SetTurma($pTurma){
		$this->Turma =$pTurma;
	}
	public function GetAluno(){
		return $this->Aluno;
	}
	public function SetAluno($pAluno){
		$this->Aluno =$pAluno;
	}
	
}
?>