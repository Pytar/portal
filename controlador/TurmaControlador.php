<?php 
use config\Util;
use conexao\ConexaoDB;

class TurmaControlador{ 

	private static function MontarObj($rs){

		$vTurma = new Turma();

		$vTurma->setId($rs['iId']);

		$vTurma->setDataCadastro($rs['dtDataCadastro']);
		
		$objDisciplina = new Disciplina();
		$objDisciplina->setId($rs['iIdDisciplina']);
		$objDisciplina = DisciplinaControlador::Consultar($objDisciplina)[0];
		
		$vTurma->setDisciplina($objDisciplina);

		$objProfessor = new Professor();
		$objProfessor->setId($rs['iIdProfessor']);
		$objProfessor = ProfessorControlador::Consultar($objProfessor)[0];
		
		$vTurma->setProfessor($objProfessor);
		

		$vTurma->gerarHash();

		return $vTurma;
	}

	public static function Consultar($pTurma=NULL){

		try {

			if($pTurma == NULL){
				$pTurma = new Turma();
			}

			$vRetorno = array();
            
			if($pTurma->GetIsConsultarPreenchimento()){
			
			     $vRows = TurmaDAO::GetInstancia()->ConsultarTurma();
			    
			 
			}else {
			    
			    $vRows = TurmaDAO::GetInstancia()->Consultar($pTurma);
			}
			
			if (count($vRows) > 0){
				foreach ($vRows as $Turma){
					$vRetorno[] = TurmaControlador::MontarObj($Turma);
				}
			}

			return $vRetorno;

		}catch (Exception $e) {

			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao consultar os Turma.');
		}
	}

	public static function Salvar($pTurma){

		try {

			$retorno = FALSE;

			ConexaoDB::getInstancia()->beginTrans();

			TurmaDAO::getInstancia()->Salvar($pTurma);

			ConexaoDB::getInstancia()->commit();

			$retorno  = TRUE;

			return $retorno;

		}catch (Exception $e) {

			ConexaoDB::getInstancia()->rollBack();
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao salvar o Turma.');
		}
	}
	public static function Remover($pTurma){

		try {

			$retorno = TurmaDAO::getInstancia()->Remover($pTurma);

			return $retorno;

		} catch (Exception $e) {
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao excluir o Turma.');
		}
	}
}