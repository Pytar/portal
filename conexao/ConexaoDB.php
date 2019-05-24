<?php
namespace conexao;

use Exception;
use PDO;
use PDOException;
use config\Constantes;


/**
 * Arquivo de Declaracao da classe de Conexao.
 * @author Cleber Melo
 * @package conexao
 * @since 1.0
 * @access public
 *
 */

class ConexaoDB {
	/**
	 * Instancia unica de Conexao
	 * Implementacao do Padrao de Projeto Singleton
	 * 
	 * @var ConexaoDB $Instancia
	 */
	private static $Instancia;
	/**
	 * Objeto que manipular a conexao com o SGBD
	 * 
	 * @var PDO
	 */
	private $Db;
	/**
	 * Construtor Privado (Singleton)
	 * Sera executado uma unica vez por script.
	 */
	private function __construct() {
		
		try {
			 //$this->Db = new PDO("mysql:host=linuxcart;dbname=db_gerador", 'root', '1q2w3e!');
			// $this->Db = new PDO("mysql:host=localhost;dbname=db_gerador", 'cleber', 'Weaponx44$$');
			$this->Db = new PDO("mysql:host=localhost;dbname=dbPortal", 'root', 'weaponx');
			//$this->Db = new PDO($this->getHost().";".$this->getBase(), $this->getUsuario(), $this->getSenha());
			//$this->Db = new PDO ( "sqlsrv:Server=vserver2008\desenv,1443;Database=dbAgenda", "cleber.melo", "weaponx" );
			$this->Db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $E) {
			
			throw new Exception ($E);
		}
	}
	public static function GetInstancia() {
		
		if (! isset ( ConexaoDB::$Instancia )) {
			ConexaoDB::$Instancia = new ConexaoDB ();
		}
		return ConexaoDB::$Instancia;
	}
	public function getDb() {
		return $this->Db;
	}
	/**
	 * Metodo que inicia um transacao
	 */
	public function BeginTrans() {
		$this->getDb ()->beginTransaction ();
	}
	/**
	 * Metodo que encerra uma transacao se bem sucedida.
	 */
	public function Commit() {
		$this->getDb ()->commit ();
	}
	/**
	 * Metodo que encerra a transacao DESCARTANDO (desfazendo) todas as alteracoes.
	 */
	public function RollBack() {
		$this->getDb ()->rollBack ();
	}
	/**
	 * Metodo que retorna o ultimo id inserido
	 * 
	 * @return int
	 */
	public function LastInsertId() {
		return $this->getDb ()->lastInsertId ();
	}
	/**
	 * Metodo que executa instrucoes SQL
	 * 
	 * @param string $sql        	
	 * @param int $tipo        	
	 * @param array $parametros        	
	 * @return mixed $retorno
	 * @throws Exception
	 */
	public function execQuery( $sql,$tipo,$parametros = NULL) {
		$base = $this->getDb ();
		$retorno = NULL;
		
		switch ($tipo) {
			case Constantes::SELECT : // Select com varios resultados
				
				$result = $base->query ( $sql );
				$retorno = $result->fetchAll ( PDO::FETCH_ASSOC );
				break;
			// ------------------
			case Constantes::SELECTPARAM : // Select com varios resultados com parametros
				$posicao = 1;
				$contador = count ( $parametros );
				$stmt = $base->prepare($sql);
				for($x = 0; $x <= ($contador - 1); $x ++) {
					$stmt->bindValue ( $posicao, $parametros [$x] );
					$posicao ++;
				}
				$ok = $stmt->execute ();
				$retorno = $stmt->fetchAll ( PDO::FETCH_ASSOC );
				break;
			// ------------------
			case Constantes::SELECTESCALAR : // Select com unico resultado
				$result = $base->query ( $sql );
				$retorno = $result->fetch ( PDO::FETCH_ASSOC );
				break;
			// ------------------
			case Constantes::SELECTESCALARPARAM : // Select com unico resultado com parametros
				$posicao = 1;
				$contador = count ( $parametros );
				$stmt = $base->prepare ( $sql );
				for($x = 0; $x <= ($contador - 1); $x ++) {
					$stmt->bindValue ( $posicao, $parametros [$x] );
					$posicao ++;
				}
				$ok = $stmt->execute ();
				$retorno = $stmt->fetch ( PDO::FETCH_ASSOC );
				break;
			// ------------------
			case Constantes::QUERY : // Executar query normal
				$base->query ( $sql );
				$retorno = TRUE;
				break;
			// ------------------
			case Constantes::QUERYPARAM : // Executar query com parametros
				$retorno = FALSE;
				$posicao = 1;
				$contador = count ( $parametros );
				$stmt = $base->prepare ( $sql );
				for($x = 0; $x <= ($contador - 1); $x ++) {
					$stmt->bindValue ( $posicao, $parametros [$x] );
					$posicao ++;
				}
				$stmt->execute ();
				$retorno = TRUE;
				break;
			case Constantes::QUERYPARAMRETURNID : // Executar query com parametros com id
				$retorno = FALSE;
				$posicao = 1;
				$contador = count ( $parametros );
				
				$stmt = $base->prepare ( $sql );
				for($x = 0; $x <= ($contador - 1); $x ++) {
					$stmt->bindValue ( $posicao, $parametros [$x] );
					$posicao ++;
				}
				$stmt->execute ();
				$result = $base->query ( "select LAST_INSERT_ID() as iId" );
				$dados = $result->fetch ( PDO::FETCH_OBJ );
				
				$retorno = $dados->iId;
				
				break;
		}
		return $retorno;
	}
	/**
	 * (non-PHPdoc)
	 * 
	 * @see \conexao\IConexaoInfo::getHost()
	 */
	public function getHost() {
		return "sqlsrv:server=vserver2008\desenv,1443";
	}
	/**
	 * (non-PHPdoc)
	 * 
	 * @see \conexao\IConexaoInfo::getBase()
	 */
	public function getBase() {
		return "Database=dbCertificadoDigital";
	}
	/**
	 * (non-PHPdoc)
	 * 
	 * @see \conexao\IConexaoInfo::getUsuario()
	 */
	public function getUsuario() {
		return "cleber.melo";
	}
	/**
	 * (non-PHPdoc)
	 * 
	 * @see \conexao\IConexaoInfo::getSenha()
	 */
	public function getSenha() {
		return "weaponx44";
	}
	/**
	 * (non-PHPdoc)
	 * @see \conexao\IConexaoInfo::testeConexao()
	 */
	public function testeConexao(){
		return 0;	
	}
}

?>