<?php

/*
 * Class responsável por guardar os estilos dos posts e comentários - CSS
 * property: value 
 */

require_once(dirname(__FILE__).'/autoload.php'); 
protegeArquivo(basename(__FILE__));

abstract class Style extends Tfield{
	
	protected $property;
	protected $value;
	
	function __construct(){
		$instace = new Style();
		return $instace;
	}
	 
	 public function setProperty($property){
	 	$this->property = $property;
	 }
	 public function getProperty(){
	 	return $this->property;
	 }
	 public function setValeu($value){
	 	$this->value = $value;
	 }
	 public function getValue(){
	 	return $this->value;
	 }
	 
	 
}#Style Class
