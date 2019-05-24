<?php
namespace config;

/**
 * Classe de constante de sistema
 *
 * @author Cleber Filho
 *        
 */
class Constantes
{
    /**
     * Valores de Status de Forms
     * @var integer
     */
    const  FORM_STATUS_INSERT = 0;
    
    const  FORM_STATUS_UPDATE = 1;
       
    const  FORM_STATUS_DELETE = 3;
    /** --------------------------**/
    
    
    /** Valores de Retorno de Ajax
     * 
     * @var integer
     */
    const AJAX_FALHA = 0;
    
    const AJAX_SUCESSO = 1;
    /** --------------------------**/
    
    const DIV_LOADING = "divLoading";
    
    const DIV_ALERT = "divAlert";
        
    const STRING_EMPTY = "";
         
    const URL_DOMINIO = "http://localhost";

    const URL_PADRAO_ERROR = URL_DOMINIO."/gerador/admin/error.php";
    
    const PATH_RAIZ = "auto";

    const UPLOAD_PATH_RAIZ = "/uploads/";

    const UPLOAD_PATH_IMAGEM = Constantes::UPLOAD_PATH_RAIZ . "/IMAGEM/";
    
    const VALOR_DATETIME_DEFAULT = '1900-01-01 00:00:00.000000';

    /**
     * Barras de acordo com o S.O.
     */
    const DS = "/";

    /**
     * Ponto e virgula ou dois pontos de acordo com o S.O.
     */
    const PS = PATH_SEPARATOR;

    /**
     * Raiz física da aplicação.
     */
    const RAIZ = __DIR__;

    /**
     * Ativo = 1
     */
    const ATIVO = 1;

    /**
     * Inativo = 0
     */
    const INATIVO = 0;

    /**
     * @var integer
     * @des Tamanho maximo da Imgem Para Upload
     */
    const TAMANHO_IMG_MAX = "2097152";

    /**
     * =======================CONSTANTES DE BANCO=======================
     */

    /**
     * @var integer
     * @desc SQL que retorna um conjunto de resultados de registros de uma ou mais tabelas.
     * 
     */
    const SELECT = 1;

    /**@var integer
     * @desc SQL que retorna um conjunto de resultados de registros de uma ou mais tabelas passando parametros.
     */
    const SELECTPARAM = 2;

    /** 
     * @var integer
     * @desc Comando SELECT comum que retorna exatamente uma linha com uma coluna.
     */
    const SELECTESCALAR = 3;

    /**
     * @var integer
     * @desc Comando SELECT comum que retorna exatamente uma linha com uma coluna passando parametros.
     */
    const SELECTESCALARPARAM = 4;

    /**
     * @var integer
     * @desc A instrução QUERY permite inserir um único registro ou vários registros em uma tabela.
     */
    const QUERY = 5;

    /**
     * @var integer
     * @desc A instrução QUERY permite inserir um único registro ou vários registros em uma tabela passando parametros.
     */
    const QUERYPARAM = 6;

    /**
     * @var integer
     * @desc A instrução QUERY permite inserir um único registro ou vários registros em uma tabela passando parametros.
     */
    const QUERYPARAMRETURNID = 7;

/**
 * =======================CONSTANTES DE BANCO - END=======================
 */
}
?>