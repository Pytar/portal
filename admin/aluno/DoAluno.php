<?php
require_once ("../../config/AutoLoad.php");
use config\AutoLoad;
$obj = new AutoLoad();
use config\Constantes;
use config\Util;

function fnGetAluno() {

	$vAluno = new Aluno();
	if(isset($_REQUEST["nome"])){
		$vAluno->setNome($_REQUEST["nome"]);
	}
	if(isset($_REQUEST["cpf"])){
		$vAluno->setCpf($_REQUEST["cpf"]);
	}
	if(isset($_REQUEST["email"])){
		$vAluno->setEmail($_REQUEST["email"]);
	}
	if(isset($_REQUEST["matricula"])){
		$vAluno->setMatricula($_REQUEST["matricula"]);
	}
	if(isset($_REQUEST["telefone"])){
		$vAluno->setTelefone($_REQUEST["telefone"]);
	}
	switch ($_REQUEST["statusForm"]){
		case Constantes::FORM_STATUS_INSERT:
			$vAluno->setHash(Constantes::STRING_EMPTY);
			break;
		case Constantes::FORM_STATUS_UPDATE:
			$vAluno->setHash($_REQUEST['hash']);
			break;
	}
	//Util::fnDebugg($_REQUEST);
	return $vAluno;
}

try{
	switch ($_REQUEST["statusForm"]) {
		case Constantes::FORM_STATUS_INSERT:

			AlunoControlador::salvar(fnGetAluno());
			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_UPDATE:

			$vAlunoRequest = fnGetAluno();
			$vAlunoBusca = new Aluno();

			$vAlunoBusca->setHash($vAlunoRequest->getHash());
			$vRowsAluno = AlunoControlador::consultar($vAlunoBusca);

			$vAlunoRequest->setId($vRowsAluno[0]->getId());
			AlunoControlador::salvar($vAlunoRequest);

			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_DELETE:

			AlunoControlador::remover(fnGetAluno());
			echo(Constantes::AJAX_SUCESSO);
			break;
	}
	
}catch (Exception $de){
	$de->getMessage();
}
?>