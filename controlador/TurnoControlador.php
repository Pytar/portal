<?php 
use config\Util;
use conexao\ConexaoDB;

class TurnoControlador{ 

	private static function MontarObj($rs){

		$vTurno = new Turno();

		$vTurno->setId($rs['iId']);

		$vTurno->setDataCadastro($rs['dtDataCadastro']);

		$vTurno->setNome($rs['vNome']);

		$vTurno->gerarHash();

		return $vTurno;
	}

	public static function Consultar($pTurno=NULL){

		try {

			if($pTurno == NULL){
				$pTurno = new Turno();
			}

			$vRetorno = array();

			$vRows = TurnoDAO::GetInstancia()->Consultar($pTurno);

			if (count($vRows) > 0){
				foreach ($vRows as $Turno){
					$vRetorno[] = TurnoControlador::MontarObj($Turno);
				}
			}

			return $vRetorno;

		}catch (Exception $e) {

			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao consultar os Turno.');
		}
	}

	public static function Salvar($pTurno){

		try {

			$retorno = FALSE;

			ConexaoDB::getInstancia()->beginTrans();

			TurnoDAO::getInstancia()->Salvar($pTurno);

			ConexaoDB::getInstancia()->commit();

			$retorno  = TRUE;

			return $retorno;

		}catch (Exception $e) {

			ConexaoDB::getInstancia()->rollBack();
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao salvar o Turno.');
		}
	}
	public static function Remover($pTurno){

		try {

			$retorno = TurnoDAO::getInstancia()->Remover($pTurno);

			return $retorno;

		} catch (Exception $e) {
			Util::GravarLog($e);
			throw new Exception('Ocorreu um erro ao excluir o Turno.');
		}
	}
}