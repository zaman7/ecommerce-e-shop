<?php 
//brand class
/*include_once "Database.php";
include_once "Helpers.php";
include_once "Session.php";*/
class Brand{
	
	private $db;
 	private $format;
 	public function __construct(){
 		$this->db = new Database();
 		$this->format = new Helpers();
 	}
 	// add brand name function
 	public function addBrand($brand){
 		$brand = mysqli_real_escape_string($this->db->link, $brand);

 		if ($brand == "") {
 			$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Field must not be empty!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
 		}
 		else{
 			$query = "INSERT INTO brand_table (brandName) VALUES('$brand')";
 			$result = $this->db->insertData($query);
 			if ($result) {
 				$msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Category Added!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 				return $msg;
 			}
 		}
 	}
 	//show all brand name function
 	public function getAllBrand(){
 		$query = "SELECT * FROM brand_table ORDER BY brandId ASC";
 		$result = $this->db->readData($query);
 		return $result;
 	}

 	//delete brand name function
 	public function deleteBrand($del_brand){
 		$del_brand = $del_brand;
 		$query = "DELETE FROM brand_table WHERE brandId = '$del_brand'";
		$result = $this->db->deleteData($query);
		if ($result) {
			$msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Brand was Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
		}
		else{
			$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Brand is not Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
		}
 	}

 	
}


?>