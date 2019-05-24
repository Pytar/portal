<?php
require_once ("../../config/AutoLoad.php");
use config\AutoLoad;
$obj = new AutoLoad();
use config\Constantes;
use config\Util;



try{
   
     
            
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