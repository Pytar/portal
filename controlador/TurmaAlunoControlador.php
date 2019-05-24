<?php 
use config\Util;
use conexao\ConexaoDB;

class TurmaAlunoControlador{ 

	private static function MontarObj($rs){

		$vTurmaAluno = new TurmaAluno();

		$vTurmaAluno->setId($rs['iId']);

		$vTurmaAluno->setDataCadastro($rs['dtDataCadastro']);

		
		$objTurma = new Turma();
		
		$objTurma->setId($rs['iIdTurma']);
				
		$objTurma = TurmaControlador::Consultar($objTurma)[0];
				
		$vTurmaAluno->setTurma($objTurma);
		
		
		$objAluno = new Aluno();
		
		$objAluno->setId($rs['iIdAluno']);
		
		$objAluno = AlunoControlador::Consultar($objAluno)[0];
			
		$vTurmaAluno->setAluno($objAluno);
		
		

		$vTurmaAluno->gerarHash();

		return $vTurmaAluno;
	}

	public static function Consultar($pTurmaAluno=NULL){

		try {

			if($pTurmaAluno == NULL){
				$pTurmaAluno = new TurmaAluno();
			}

			$vRetorno = array();

			$vRows = TurmaAlunoDAO::GetInstancia()->Consultar($pTurmaAluno);

			if (count($vRows) > 0){
				foreach ($vRows as $TurmaAluno){
					$vRetorno[] = TurmaAlunoControlador::MontarObj($TurmaAluno);
				}
			}

			return $vRetorno;

		}catch (Exception $e) {

			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao consultar os TurmaAluno.');
		}
	}

	public static function Salvar($pTurmaAluno){

		try {

			$retorno = FALSE;

			ConexaoDB::getInstancia()->beginTrans();

			TurmaAlunoDAO::getInstancia()->Salvar($pTurmaAluno);

			ConexaoDB::getInstancia()->commit();

			$retorno  = TRUE;

			return $retorno;

		}catch (Exception $e) {

			ConexaoDB::getInstancia()->rollBack();
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao salvar o TurmaAluno.');
		}
	}
	public static function Remover($pTurmaAluno){

		try {

			$retorno = TurmaAlunoDAO::getInstancia()->Remover($pTurmaAluno);

			return $retorno;

		} catch (Exception $e) {
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao excluir o TurmaAluno.');
		}
	}
}