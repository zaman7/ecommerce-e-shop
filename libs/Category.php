<?php 
//category class
/*include_once "Database.php";
include_once "Helpers.php";
include_once "Session.php";*/
class Category{
	
	private $db;
 	private $format;
 	public function __construct(){
 		$this->db = new Database();
 		$this->format = new Helpers();
 	}
 	//add category function
 	public function addCategory($category){
 		$category = mysqli_real_escape_string($this->db->link, $category);

 		if ($category == "") {
 			$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Field must not be empty!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
 		}
 		else{
 			$query = "INSERT INTO category_table (category) VALUES('$category')";
 			$result = $this->db->insertData($query);
 			if ($result) {
 				$msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Category Added!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 				return $msg;
 			}
 		}
 	}
 	//show all cetegory function
 	public function getAllCat(){
 		$query = "SELECT * FROM category_table ORDER BY category ASC";
 		$result = $this->db->readData($query);
 		return $result;
 	}

 	//delete cetegory function
 	public function deleteCat($cat_del){
 		$cat_del = $cat_del;
 		$query = "DELETE FROM category_table WHERE categoryId = '$cat_del'";
		$result = $this->db->deleteData($query);
		if ($result) {
			$msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Category was Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
		}
		else{
			$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Category is not Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
		}
 	}

 	public function addSubCategory($categoryId,$sub_category){
 		$categoryId = mysqli_real_escape_string($this->db->link, $categoryId);
 		$sub_category = mysqli_real_escape_string($this->db->link, $sub_category);

 		if ($categoryId == "" OR $sub_category == "") {
 			$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Field must not be empty!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 			return $msg;
 		}
 		else{
 			$query = "INSERT INTO subCateogry_table (categoryId, subCateogryName) VALUES('$categoryId',
 			'$sub_category')";
 			$result = $this->db->insertData($query);
 			if ($result) {
 				$msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Sub Category Added!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 				return $msg;
 			}
 			else{
 				$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Sub Category is Not Uploded!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
 				return $msg;
 			}
 		}
 	}
}


?>