<?php
/**
 * Entidade declaracao da classe
 * @author Cleber Melo
 */

/**
 * Class EntidadeCadatro.
 */
abstract class EntidadeCadastro extends Entidade {
	/**
	 * 
	 * @var DateTime
	 */
	private $DataCadastro;
	/**
	 * Constructor da EntidadeCadatro.
	 * @param int $pId
	 * @param string $pHash
	 */
	public function __construct($pId=0,$pHash="",$pDataCadastro = "") {
		/**
		 * Construtor Pai
		 */
		parent::setId($pId);
		parent::setHash($pHash);
		$this->DataCadastro = $pDataCadastro;
	}
	/**
	 * Getter method of DataCadastro
	 * @return DateTime
	 */
	public function getDataCadastro() {
		return $this->DataCadastro;
	}
	/**
	 * Setter method of DataCadastro
	 * @param DateTime $pDataCadastro
	 */
	public function setDataCadastro($pDataCadastro) {
		@$this->DataCadastro = $DataCadastro;
	}
	
}
?>