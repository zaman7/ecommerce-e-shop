<?php
/**
 * 
 */
class Customers {
	private $db;
 	private $format;
 	public function __construct(){
 		$this->db = new Database();
 		$this->format = new Helpers();
 	}
 	// add brand name function
 	public function customersRegister($data){

/* 		$customersName = $this->format->validation($data['customersName']);
 		$customersEmail = $this->format->validation($data['customersEmail']);
 		$password = $this->format->validation($data['password']);
 		$phoneNumber = $this->format->validation($data['phoneNumber']);
 		$city = $this->format->validation($data['city']);
 		$address = $this->format->validation($data['address']);*/

 		$customersName = mysqli_real_escape_string($this->db->link, $data['customersName']);
 		$customersEmail = mysqli_real_escape_string($this->db->link, $data['customersEmail']);
 		$password = mysqli_real_escape_string($this->db->link, $data['password']);
 		$phoneNumber = mysqli_real_escape_string($this->db->link, $data['phoneNumber']);
 		$city = mysqli_real_escape_string($this->db->link, $data['city']);
 		$address = mysqli_real_escape_string($this->db->link, $data['address']);

 		
 		if (empty($customersName) OR empty($customersEmail) OR empty($password) OR empty($city) OR empty($address)) {
 			$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Please Fill Out this Field!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
 		}
 		else{
 			$check_email = $this->checkCustomersEmail($customersEmail);

 			if ($check_email != false) {
 				$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Oppos! </strong> This Email address exists!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	 				return $msg;
	 		}
	 		else{
	 			$password = md5($password);
	 			$sql = "INSERT INTO customers_table
	 			(customersName, customersEmail, password, phoneNumber, city, address)
	 			VALUES('$customersName', '$customersEmail', '$password', '$phoneNumber', '$city', '$address')";
	 			$result = $this->db->insertData($sql);
	 			if ($result) {
	 				$msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Congress! </strong> Registeration Complet!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	 				return $msg;
	 			}
	 		}
 		}
 	}
 	
 	public function checkCustomersEmail($customersEmail){
 		$sql = "SELECT customersEmail FROM customers_table WHERE customersEmail = '$customersEmail'";
 		$result = $this->db->readData($sql);
 		return $result;
 	}

 	public function customersLogin($customersEmail, $password){
 		$customersEmail = $this->format->validation($customersEmail);
 		$password = $this->format->validation($password);

 		$customersEmail = mysqli_real_escape_string($this->db->link, $customersEmail);
 		$password = mysqli_real_escape_string($this->db->link, $password);
 		if (empty($customersEmail) OR empty($password)) {
 			$msg = "<strong>Error! </strong>Usename and Password is empty!";
 			return $msg;
 		}
 		else{
 			$password = md5($password);
 			$query = "SELECT * FROM customers_table WHERE customersEmail = '$customersEmail' AND password = '$password' LIMIT 1";
 			$result = $this->db->readData($query);
 			if ($result) {
 				$value = $result->fetch_assoc();
 				Session::set("customerLogin", true);
 				Session::set('customersId', $value["customersId"]);
 				Session::set('customersName', $value["customersName"]);
 				Session::set('address', $value["address"]);
 				echo "<script>window.location='checkout.php';</script>";
 			}
 			else{
 				$msg = "<strong>Error! </strong> User or Password Not match!";
 				return $msg;
 			}
 		}
 	}


 	public function getCustomerProfile($customersId){
 		$query = "SELECT * FROM customers_table WHERE customersId = '$customersId'";
 		$result = $this->db->readData($query);
 		return $result;
 	}


 	
}





?>