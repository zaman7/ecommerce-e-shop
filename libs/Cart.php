<?php 
//Cart class

class Cart{
	
	private $db;
 	private $format;
 	public function __construct(){
 		$this->db = new Database();
 		$this->format = new Helpers();
 	}

}


?>