<?php 

namespace conexao; 

interface IConexaoInfo
{
	
	/**
	 * Testa a conexao herada
	 */
	function testeConexao();
	/**
	 * Fornece o Servidor do SGDB
	 * @return string 
	 */
	function getHost();
	/**
	 * Fornece a Base do SGDB
	 * @return string
	 */
	function getBase();
	/**
	 * Fornece o Usu�rio do SGDB
	 * @return string
	 */
	function getUsuario();
	/**
	 * Fornece a Senha do SGDB
	 * @return string 
	 */
	function getSenha();
	
	
	
}


?>