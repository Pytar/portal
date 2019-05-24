<?php 
use config\Util;
use conexao\ConexaoDB;

class DisciplinaControlador{ 

	private static function MontarObj($rs){

		$vDisciplina = new Disciplina();

		$vDisciplina->setId($rs['iId']);

		$vDisciplina->setDataCadastro($rs['dtDataCadastro']);

		$vDisciplina->setNome($rs['vNome']);
		
		$objCurso = new Curso();

		$objCurso->setId($rs['iIdCurso']);
		
		$objCurso = CursoControlador::Consultar($objCurso)[0];

		$vDisciplina->setCurso($objCurso);

		$vDisciplina->gerarHash();

		return $vDisciplina;
	}

	public static function Consultar($pDisciplina=NULL){

		try {

			if($pDisciplina == NULL){
				$pDisciplina = new Disciplina();
			}

			$vRetorno = array();

			$vRows = DisciplinaDAO::GetInstancia()->Consultar($pDisciplina);

			if (count($vRows) > 0){
				foreach ($vRows as $Disciplina){
					$vRetorno[] = DisciplinaControlador::MontarObj($Disciplina);
				}
			}

			return $vRetorno;

		}catch (Exception $e) {

			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao consultar os Disciplina.');
		}
	}

	public static function Salvar($pDisciplina){

		try {

			$retorno = FALSE;

			ConexaoDB::getInstancia()->beginTrans();

			DisciplinaDAO::getInstancia()->Salvar($pDisciplina);

			ConexaoDB::getInstancia()->commit();

			$retorno  = TRUE;

			return $retorno;

		}catch (Exception $e) {

			ConexaoDB::getInstancia()->rollBack();
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao salvar o Disciplina.');
		}
	}
	public static function Remover($pDisciplina){

		try {

			$retorno = DisciplinaDAO::getInstancia()->Remover($pDisciplina);

			return $retorno;

		} catch (Exception $e) {
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao excluir o Disciplina.');
		}
	}
}