<?php
require_once ("../../config/AutoLoad.php");
use config\AutoLoad;
$obj = new AutoLoad();
use config\Constantes;

function fnGetProfessor() {

	$vProfessor = new Professor();
	if(isset($_REQUEST["nome"])){
		$vProfessor->setNome($_REQUEST["nome"]);
	}
	if(isset($_REQUEST["email"])){
		$vProfessor->setEmail($_REQUEST["email"]);
	}
	if(isset($_REQUEST["telefone"])){
		$vProfessor->setTelefone($_REQUEST["telefone"]);
	}
	switch ($_REQUEST["statusForm"]){
		case Constantes::FORM_STATUS_INSERT:
			$vProfessor->setHash(Constantes::STRING_EMPTY);
			break;
		case Constantes::FORM_STATUS_UPDATE:
			$vProfessor->setHash($_REQUEST['hash']);
			break;
	}
	return $vProfessor;
}

try{
	switch ($_REQUEST["statusForm"]) {
		case Constantes::FORM_STATUS_INSERT:

			ProfessorControlador::salvar(fnGetProfessor());
			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_UPDATE:

			$vProfessorRequest = fnGetProfessor();
			$vProfessorBusca = new Professor();

			$vProfessorBusca->setHash($vProfessorRequest->getHash());
			$vRowsProfessor = ProfessorControlador::consultar($vProfessorBusca);

			$vProfessorRequest->setId($vRowsProfessor[0]->getId());
			ProfessorControlador::salvar($vProfessorRequest);

			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_DELETE:

			ProfessorControlador::remover(fnGetProfessor());
			echo(Constantes::AJAX_SUCESSO);
			break;
	}
	
}catch (Exception $de){
	$de->getMessage();
}
?>