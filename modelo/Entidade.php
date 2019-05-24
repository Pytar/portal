<?php
/**
 * Entidade declaracao da classe
 * @author Cleber Melo
 */

/**
 * Class Entidade.
 */
abstract class Entidade {
	/**
	 * Id da Entidade
	 * @var int
	 */
	private $Id;

	/**
	 * Hash da Entidade
	 * @var string
	 */
	private $Hash;

	/**
	 * Constructor da Entidade.
	 * @param int $Id
	 * @param string $Hash
	 */
	public function __construct($pId=0,$pHash="") {
		$this->Id   = $pId;
		$this->Hash = $pHash;
	}
	/**
	 * Getter method of Id
	 * @return int
	 */
	public function getId() {
		return $this->Id;
	}
	/**
	 * Setter method of Id
	 * @param int $pId
	 */
	public function setId($pId) {
		$this->Id = $pId;
	}
	/**
	 * Getter method of Hash
	 * @return string
	 */
	public function getHash() {
		return $this->Hash;
	}
	/**
	 * Setter method of Hash
	 * @param string $pHash
	 */
	public function setHash($pHash) {
		$this->Hash = $pHash;
	}
	
	public function gerarHash(){
		
		$this->Hash = md5($this->Id);
		
	}
}
?>