<?php
require_once ("../../config/AutoLoad.php");
use config\AutoLoad;
$obj = new AutoLoad();
use config\Constantes;

function fnGetTurma() {

	$vTurma = new Turma();
	if(isset($_REQUEST["idDisciplina"])){
	    $objDisciplina = new Disciplina();
	    $objDisciplina->setId($_REQUEST["idDisciplina"]);
	    
	    $vTurma->SetDisciplina($objDisciplina);
	}
	if(isset($_REQUEST["idProfessor"])){
	    $objProfessor = new Professor();
	    $objProfessor->setId($_REQUEST["idProfessor"]);
	    
	    $vTurma->setProfessor($objProfessor);
	}
	switch ($_REQUEST["statusForm"]){
		case Constantes::FORM_STATUS_INSERT:
			$vTurma->setHash(Constantes::STRING_EMPTY);
			break;
		case Constantes::FORM_STATUS_UPDATE:
			$vTurma->setHash($_REQUEST['hash']);
			break;
	}
	return $vTurma;
}

try{
	switch ($_REQUEST["statusForm"]) {
		case Constantes::FORM_STATUS_INSERT:

			TurmaControlador::salvar(fnGetTurma());
			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_UPDATE:

			$vTurmaRequest = fnGetTurma();
			$vTurmaBusca = new Turma();

			$vTurmaBusca->setHash($vTurmaRequest->getHash());
			$vRowsTurma = TurmaControlador::consultar($vTurmaBusca);

			$vTurmaRequest->setId($vRowsTurma[0]->getId());
			TurmaControlador::salvar($vTurmaRequest);

			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_DELETE:

			TurmaControlador::remover(fnGetTurma());
			echo(Constantes::AJAX_SUCESSO);
			break;
	}
	
}catch (Exception $de){
	$de->getMessage();
}
?>