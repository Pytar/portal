<?php 
use config\Util;
use conexao\ConexaoDB;

class ProfessorControlador{ 

	private static function MontarObj($rs){

		$vProfessor = new Professor();

		$vProfessor->setId($rs['iId']);

		$vProfessor->setDataCadastro($rs['dtDataCadastro']);

		$vProfessor->setNome($rs['vNome']);

		$vProfessor->setEmail($rs['vEmail']);

		$vProfessor->setTelefone($rs['vTelefone']);

		$vProfessor->gerarHash();

		return $vProfessor;
	}

	public static function Consultar($pProfessor=NULL){

		try {

			if($pProfessor == NULL){
				$pProfessor = new Professor();
			}

			$vRetorno = array();

			$vRows = ProfessorDAO::GetInstancia()->Consultar($pProfessor);

			if (count($vRows) > 0){
				foreach ($vRows as $Professor){
					$vRetorno[] = ProfessorControlador::MontarObj($Professor);
				}
			}

			return $vRetorno;

		}catch (Exception $e) {

			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao consultar os Professor.');
		}
	}

	public static function Salvar($pProfessor){

		try {

			$retorno = FALSE;

			ConexaoDB::getInstancia()->beginTrans();

			ProfessorDAO::getInstancia()->Salvar($pProfessor);

			ConexaoDB::getInstancia()->commit();

			$retorno  = TRUE;

			return $retorno;

		}catch (Exception $e) {

			ConexaoDB::getInstancia()->rollBack();
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao salvar o Professor.');
		}
	}
	public static function Remover($pProfessor){

		try {

			$retorno = ProfessorDAO::getInstancia()->Remover($pProfessor);

			return $retorno;

		} catch (Exception $e) {
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao excluir o Professor.');
		}
	}
}