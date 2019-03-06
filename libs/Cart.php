<?php 
//Cart class
/*include_once "Database.php";
include_once "Helpers.php";
include_once "Session.php";*/

class Cart{
	
	private $db;
 	private $format;
 	public function __construct(){
 		$this->db = new Database();
 		$this->format = new Helpers();
 	}

 	public function addToCart($quantity, $productId){
 		$quantity  = mysqli_real_escape_string($this->db->link, $quantity);
 		$productId  = mysqli_real_escape_string($this->db->link, $productId);
 		$sessionId = session_id();

 		if (!preg_match("/^[0-9]*$/",$quantity)) {
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Please integer value!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
        }
        else{
     		$cQuery = "SELECT * FROM cart_table WHERE productId = '$productId' AND sessionId = '$sessionId'";
     		$checkPro = $this->db->readData($cQuery);
            
     		if ($checkPro) {
     			$msg = "<div class='alert alert-danger'><strong>Error! </strong> Product Alrady Exists!</div>";
            	return $msg;
     		}
     		else{
                $pQuery = "SELECT * FROM products_table WHERE productId = '$productId'";
                $pResults = $this->db->readData($pQuery)->fetch_assoc();
                
                $productName = $pResults['productName'];
                $price = $pResults['price'];
                $image = $pResults['image'];
                $productCode = $pResults['productCode'];

                //print_r($pResults);
    	 		$query= "INSERT INTO cart_table(sessionId, productId, productName, price, image, productCode, quantity) VALUES('$sessionId', '$productId', '$productName', '$price', '$image', '$productCode', '$quantity')";
    	        $cartIns = $this->db->insertData($query);

    	        if ($cartIns) {
    	        	echo "<script>window.location='cart.php';</script>";
    	        }
    	        else{
    	            echo "<script>window.location='error.php';</script>";
    	        }
    	    }
        }
 	}

 	public function getCartPro(){
 		$sId = session_id();
 		$pQuery = "SELECT * FROM cart_table WHERE sessionId = '$sId'";
 		$result = $this->db->readData($pQuery);
 		return $result;
 	}

 	public function updateCart($quantity,$cartId){

 		$quantity  = mysqli_real_escape_string($this->db->link, $quantity);
 		$cartId  = mysqli_real_escape_string($this->db->link, $cartId);
        if (!preg_match("/^[0-9]*$/",$quantity)) {
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Success! </strong>Please integer value!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
        }
        else{
     		$query= "UPDATE cart_table SET quantity='$quantity' WHERE cartId = '$cartId' ";
            $upCart = $this->db->updateData($query);
        }
 	}

 	public function delCart($cartId){
 		$query = "DELETE FROM cart_table WHERE cartId = '$cartId'";
 		$result = $this->db->deleteData($query);
        if ($result) {
            $msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Cart was Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
        }
        else{
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Cart is not Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
        }
 	}


    public function checkCartTable(){
        $sessionId = session_id();
        $sql = "SELECT * FROM cart_table WHERE sessionId = '$sessionId'";
        $result = $this->db->readData($sql);
        return $result;
    }

    public function delCartData(){
        $sessionId = session_id();
        $query = "DELETE FROM cart_table WHERE sessionId = '$sessionId'";
        $result = $this->db->deleteData($query);
        return $result;
    }

}


?>