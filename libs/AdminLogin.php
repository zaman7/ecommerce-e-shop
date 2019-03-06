<?php 
//admin login class
include_once "Database.php";
include_once "Helpers.php";
include_once "Session.php";
Session::init();
Session::checkLogin();

 class AdminLogin{
 	private $db;
 	private $format;
 	public function __construct(){
 		$this->db = new Database();
 		$this->format = new Helpers();
 	}

 	public function UserLogin($userName, $password){
 		$userName = $this->format->validation($userName);
 		$password = $this->format->validation($password);

 		$userName = mysqli_real_escape_string($this->db->link, $userName);
 		$password = mysqli_real_escape_string($this->db->link, $password);
 		if (empty($userName) or empty($password)) {
 			$msg = "<strong>Error! </strong>Usename and Password is empty!";
 			return $msg;
 		}
 		else{

 			$query = "SELECT * FROM users_table WHERE userName = '$userName' AND userPassword = '$password' LIMIT 1";
 			$result = $this->db->readData($query);
 			if ($result) {
 				$value = $result->fetch_assoc();
 				Session::set("login", true);
 				Session::set('userId', $value["userId"]);
 				Session::set('name', $value["name"]);
 				Session::set('userName', $value["userName"]);
 				header("Location: dashbord.php");
 			}
 			else{
 				$msg = "<strong>Error! </strong> User or Password Not match!";
 				return $msg;
 			}
 		}
 	}

 }

 ?>