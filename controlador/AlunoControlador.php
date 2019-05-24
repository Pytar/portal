<?php 
use config\Util;
use conexao\ConexaoDB;

class AlunoControlador{ 

	private static function MontarObj($rs){

		$vAluno = new Aluno();

		$vAluno->setId($rs['iId']);

		$vAluno->setDataCadastro($rs['dtDataCadastro']);

		$vAluno->setNome($rs['vNome']);

		$vAluno->setCpf($rs['vCpf']);

		$vAluno->setEmail($rs['vEmail']);

		$vAluno->setMatricula($rs['iMatricula']);

		$vAluno->setTelefone($rs['vTelefone']);

		$vAluno->gerarHash();

		return $vAluno;
	}

	public static function Consultar($pAluno=NULL){

		try {

			if($pAluno == NULL){
				$pAluno = new Aluno();
			}

			$vRetorno = array();

			$vRows = AlunoDAO::GetInstancia()->Consultar($pAluno);

			if (count($vRows) > 0){
				foreach ($vRows as $Aluno){
					$vRetorno[] = AlunoControlador::MontarObj($Aluno);
				}
			}

			return $vRetorno;

		}catch (Exception $e) {

			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao consultar os Aluno.');
		}
	}

	public static function Salvar($pAluno){

		try {

			$retorno = FALSE;

			ConexaoDB::getInstancia()->beginTrans();

			AlunoDAO::getInstancia()->Salvar($pAluno);

			ConexaoDB::getInstancia()->commit();

			$retorno  = TRUE;

			return $retorno;

		}catch (Exception $e) {

			ConexaoDB::getInstancia()->rollBack();
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao salvar o Aluno.');
		}
	}
	public static function Remover($pAluno){

		try {

			$retorno = AlunoDAO::getInstancia()->Remover($pAluno);

			return $retorno;

		} catch (Exception $e) {
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao excluir o Aluno.');
		}
	}
}