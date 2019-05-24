<?php
require_once ("../../config/AutoLoad.php");
use config\AutoLoad;
$obj = new AutoLoad();
use config\Constantes;
use config\Util;

function fnGetCurso() {

	$vCurso = new Curso();
	if(isset($_REQUEST["nome"])){
		$vCurso->setNome($_REQUEST["nome"]);
	}
	if(isset($_REQUEST["numeroPeriodos"])){
		$vCurso->setNumeroPeriodos($_REQUEST["numeroPeriodos"]);
	}
	if(isset($_REQUEST["turno"])){
	    $objTurno = new Turno();
	    $objTurno->setId($_REQUEST["turno"]);
	    $vCurso->setTurno($objTurno);
	}
	switch ($_REQUEST["statusForm"]){
		case Constantes::FORM_STATUS_INSERT:
			$vCurso->setHash(Constantes::STRING_EMPTY);
			break;
		case Constantes::FORM_STATUS_UPDATE:
			$vCurso->setHash($_REQUEST['hash']);
			break;
	}
	
	
	return $vCurso;
}

try{
	switch ($_REQUEST["statusForm"]) {
		case Constantes::FORM_STATUS_INSERT:
		    
			CursoControlador::salvar(fnGetCurso());
			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_UPDATE:

			$vCursoRequest = fnGetCurso();
			$vCursoBusca = new Curso();

			$vCursoBusca->setHash($vCursoRequest->getHash());
			$vRowsCurso = CursoControlador::consultar($vCursoBusca);

			$vCursoRequest->setId($vRowsCurso[0]->getId());
			CursoControlador::salvar($vCursoRequest);

			echo Constantes::AJAX_SUCESSO;
			break;

		case Constantes::FORM_STATUS_DELETE:

			CursoControlador::remover(fnGetCurso());
			echo(Constantes::AJAX_SUCESSO);
			break;
	}
	
}catch (Exception $de){
	$de->getMessage();
}
?>