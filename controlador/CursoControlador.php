<?php 
use config\Util;
use conexao\ConexaoDB;

class CursoControlador{ 

	private static function MontarObj($rs){

		$vCurso = new Curso();

		$vCurso->setId($rs['iId']);

		$vCurso->setDataCadastro($rs['dtDataCadastro']);

		$objConsultaTurno = new Turno();
		
		$objConsultaTurno->setId($rs['iIdTurno']);
		
		$objTurno = TurnoControlador::Consultar($objConsultaTurno)[0];
		
		$vCurso->SetTurno($objTurno);

		$vCurso->setNome($rs['vNome']);

		$vCurso->setNumeroperiodos($rs['iNumeroperiodos']);

		$vCurso->gerarHash();

		return $vCurso;
	}

	public static function Consultar($pCurso=NULL){

		try {

			if($pCurso == NULL){
				$pCurso = new Curso();
			}

			$vRetorno = array();

			$vRows = CursoDAO::GetInstancia()->Consultar($pCurso);

			if (count($vRows) > 0){
				foreach ($vRows as $Curso){
					$vRetorno[] = CursoControlador::MontarObj($Curso);
				}
			}

			return $vRetorno;

		}catch (Exception $e) {

			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao consultar os Curso.');
		}
	}

	public static function Salvar($pCurso){

		try {

			$retorno = FALSE;

			ConexaoDB::getInstancia()->beginTrans();

			CursoDAO::getInstancia()->Salvar($pCurso);

			ConexaoDB::getInstancia()->commit();

			$retorno  = TRUE;

			return $retorno;

		}catch (Exception $e) {

			ConexaoDB::getInstancia()->rollBack();
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao salvar o Curso.');
		}
	}
	public static function Remover($pCurso){

		try {

			$retorno = CursoDAO::getInstancia()->Remover($pCurso);

			return $retorno;

		} catch (Exception $e) {
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao excluir o Curso.');
		}
	}
}