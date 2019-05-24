<?php
require_once ("../../config/AutoLoad.php");
use config\AutoLoad;
$obj = new AutoLoad();
use config\Constantes;

function fnGetDisciplina() {

	$vDisciplina = new Disciplina();
	if(isset($_REQUEST["nome"])){
		$vDisciplina->setNome($_REQUEST["nome"]);
	}
	if(isset($_REQUEST["idCurso"])){
		$vDisciplina->setIdCurso($_REQUEST["idCurso"]);
	}
	switch ($_REQUEST["statusForm"]){
		case Constantes::FORM_STATUS_INSERT:
			$vDisciplina->setHash(Constantes::STRING_EMPTY);
			break;
		case Constantes::FORM_STATUS_UPDATE:
			$vDisciplina->setHash($_REQUEST['hash']);
			break;
	}
	return $vDisciplina;
}

try{
	switch ($_REQUEST["statusForm"]) {
		case Constantes::FORM_STATUS_INSERT:

			DisciplinaControlador::salvar(fnGetDisciplina());
			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_UPDATE:

			$vDisciplinaRequest = fnGetDisciplina();
			$vDisciplinaBusca = new Disciplina();

			$vDisciplinaBusca->setHash($vDisciplinaRequest->getHash());
			$vRowsDisciplina = DisciplinaControlador::consultar($vDisciplinaBusca);

			$vDisciplinaRequest->setId($vRowsDisciplina[0]->getId());
			DisciplinaControlador::salvar($vDisciplinaRequest);

			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_DELETE:

			DisciplinaControlador::remover(fnGetDisciplina());
			echo(Constantes::AJAX_SUCESSO);
			break;
	}
	
}catch (Exception $de){
	$de->getMessage();
}
?>