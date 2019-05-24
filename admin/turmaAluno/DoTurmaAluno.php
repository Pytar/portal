<?php
require_once ("../../config/AutoLoad.php");
use config\AutoLoad;
$obj = new AutoLoad();
use config\Constantes;

function fnGetTurmaAluno() {

	$vTurmaAluno = new TurmaAluno();
	if(isset($_REQUEST["idTurma"])){
		$vTurmaAluno->setIdTurma($_REQUEST["idTurma"]);
	}
	if(isset($_REQUEST["idAluno"])){
		$vTurmaAluno->setIdAluno($_REQUEST["idAluno"]);
	}
	switch ($_REQUEST["statusForm"]){
		case Constantes::FORM_STATUS_INSERT:
			$vTurmaAluno->setHash(Constantes::STRING_EMPTY);
			break;
		case Constantes::FORM_STATUS_UPDATE:
			$vTurmaAluno->setHash($_REQUEST['hash']);
			break;
	}
	return $vTurmaAluno;
}

try{
	switch ($_REQUEST["statusForm"]) {
		case Constantes::FORM_STATUS_INSERT:

			TurmaAlunoControlador::salvar(fnGetTurmaAluno());
			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_UPDATE:

			$vTurmaAlunoRequest = fnGetTurmaAluno();
			$vTurmaAlunoBusca = new TurmaAluno();

			$vTurmaAlunoBusca->setHash($vTurmaAlunoRequest->getHash());
			$vRowsTurmaAluno = TurmaAlunoControlador::consultar($vTurmaAlunoBusca);

			$vTurmaAlunoRequest->setId($vRowsTurmaAluno[0]->getId());
			TurmaAlunoControlador::salvar($vTurmaAlunoRequest);

			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_DELETE:

			TurmaAlunoControlador::remover(fnGetTurmaAluno());
			echo(Constantes::AJAX_SUCESSO);
			break;
	}
	
}catch (Exception $de){
	$de->getMessage();
}
?>