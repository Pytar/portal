<?php
use conexao\ConexaoDB;
/**
 * Classe responsavel pelo acesso e manipulacao na base de dados.
 * @author Cleber Filho
 * @package repositorio
 * @access public
 */

abstract class BaseDAO {

    /**
     * Metodo responsavel por salvar a entidade;
     * @param StdClass
     * @return int
     */
    abstract protected function Salvar($pObj);
    /**
     * Metodo responsavel por remover a entidade;
     * @param StdClass
     * @return boolean
     */
    abstract protected function Remover($pObj);
    /**
     * Metodo responsavel por lista as entidades;
     * @return ArrayObject 
     */
    abstract protected function Consultar($pObj);
	/**
	 * Metodo responsavel por iniciar uma transacao
	 */
    protected function BeginTransaction() {
    	 ConexaoDB::getInstancia()->beginTrans();
    }
    /**
     * Metodo responsavel por salva uma transacao
     */
    protected function Commit() {
        ConexaoDB::getInstancia()->commit();
    }
    /**
     * Metodo responsavel por voltar uma transacao
     */
    protected function Rollback() {
        ConexaoDB::getInstancia()->rollBack();
    }
	/**
	 * Metodo responsavel por executar procedimentos de banco de dados
	 * 
	 * @param string $pSql
	 * @param array $pParametros
	 * @return mixed
	 */
	protected function execQuery($pSql,$pTipo,$pParametros = NULL){
        return ConexaoDB::getInstancia()->execQuery($pSql, $pTipo,$pParametros);
    }
    /**
     * Metodo responsavel por fornecer ultimo id inserido
     * @return int
     */
    protected function lastInsertId(){
        return ConexaoDB::getInstancia()->lastInsertId();
    }
}
?>