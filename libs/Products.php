<?php
/*include_once "Database.php";
include_once "Helpers.php";
include_once "Session.php";*/

/**
 * Products class
 */
class Products{

	private $db;
 	private $format;
 	public function __construct(){
 		$this->db = new Database();
 		$this->format = new Helpers();
 	}

    //show all brand function
 	public function getAllBrandName(){
 		$query = "SELECT * FROM brand_table ORDER BY brandName ASC";
 		$result = $this->db->readData($query);
 		return $result;
 	}
    //show all cetegory function
 	public function getAllCategory(){
 		$query = "SELECT * FROM category_table ORDER BY category ASC";
 		$result = $this->db->readData($query);
 		return $result;
 	}
    //insert product function
 	public function insartProduct($data, $img_file){

        $productName  = mysqli_real_escape_string($this->db->link, $data['product_title']);
 		$categoryId  = mysqli_real_escape_string($this->db->link, $data['categoryId']);
 		$brandId = mysqli_real_escape_string($this->db->link, $data['brand_id']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
 		$productCode = mysqli_real_escape_string($this->db->link, $data['productCode']);
 		$products_details = mysqli_real_escape_string($this->db->link, $data['products_details']);
 		$type = mysqli_real_escape_string($this->db->link, $data['type']);
 		$author = mysqli_real_escape_string($this->db->link, $data['author']);


 		$pro_img 	= $img_file['image']['name'];
        $image_type = array('jpg','png', 'gif','jpeg' );
        $file_size  = $_FILES['image']['size'];
        $tmp_name   = $_FILES['image']['tmp_name'];

        $div         = explode('.', $pro_img);
        $file_ext    = strtolower(end($div));
        $unique_name = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image= "uploads/posts/".$unique_name;

        if (empty($productName)) {
        	$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Enter product name!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	return $msg;
        }
        else if (empty($categoryId)) {
        	$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Select Catogory!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	return $msg;
        }
        else if (empty($brandId)) {
        	$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Select Brand!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	return $msg;
        }
        else if (empty($pro_img)) {
        	$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Select Products Image!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	return $msg;
        }
        else if (empty($price)) {
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Enter Price!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
        }
        else if (empty($productCode)) {
        	$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Enter Product Code!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	return $msg;
        }

        else if (empty($products_details)) {
        	$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Enter Products Details!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	return $msg;
        }

        else if ($type == "") {
        	$msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Product Type empty!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	return $msg;
        }
        else{
        	if (in_array($file_ext, $image_type) === false) {
                $msg ="<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Please select any image file:-".implode(', ',$image_type)."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                return $msg;
            }
            else{
            	move_uploaded_file($tmp_name, $upload_image);

                $query= "INSERT INTO products_table(productName, brandId, categoryId, products_details, price, image, productCode, type, author) VALUES('$productName', '$brandId', '$categoryId', '$products_details', '$price', '$upload_image', '$productCode', '$type', '$author')";
                $proIns = $this->db->insertData($query);
                if ($proIns) {
                    $msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Post Uploaded Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    return $msg;
                }
                else{
                    $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Post Not Uploaded.....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    return $msg;
                }
            }
        }
 	}

    //show all products function
    public function getAllProductsAdmin(){
        $query = "SELECT products_table.*, category_table.category, brand_table.brandName
        FROM products_table
        INNER JOIN category_table ON products_table.categoryId = category_table.categoryId
        INNER JOIN brand_table ON products_table.brandId = brand_table.brandId
        ORDER BY products_table.productId DESC";
        $result = $this->db->readData($query);
        return $result;

    }

    //edit products function
    public function getEditPro($productId){
        $query = "SELECT * FROM products_table WHERE productId = '$productId'";
        $result = $this->db->readData($query);
        return $result;
    }

    //update products function
    public function updateProduct($data, $up_img_file){

        $productId  = mysqli_real_escape_string($this->db->link, $data['productId']);
        $productName  = mysqli_real_escape_string($this->db->link, $data['product_title']);
        $categoryId  = mysqli_real_escape_string($this->db->link, $data['categoryId']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brand_id']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $products_details = mysqli_real_escape_string($this->db->link, $data['products_details']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $author = mysqli_real_escape_string($this->db->link, $data['author']);


        $pro_img    = $up_img_file['image']['name'];
        $image_type = array('jpg','png', 'gif','jpeg' );
        $file_size  = $up_img_file['image']['size'];
        $tmp_name   = $up_img_file['image']['tmp_name'];

        $div         = explode('.', $pro_img);
        $file_ext    = strtolower(end($div));
        $unique_name = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image= "uploads/posts/".$unique_name;

/*         if (empty($products_details)) {
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Enter Products Details!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
        }

        else{*/
            if (empty($pro_img)) {

                $query= "UPDATE products_table SET
                productName ='$productName',
                brandId='$brandId',
                categoryId='$categoryId',
                products_details='$products_details',
                price='$price',
                type='$type',
                author='$author'
                WHERE productId= '$productId'";
                $proUp = $this->db->updateData($query);
                if ($proUp) {
                    $msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Products Update Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    return $msg;
                }
                else{
                    $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Products Not Updated.....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    return $msg;
                }
            }
            else{
                move_uploaded_file($tmp_name, $upload_image);

                $query= "UPDATE products_table SET
                productName ='$productName',
                brandId='$brandId',
                categoryId='$categoryId',
                products_details='$products_details',
                price='$price',
                type='$type',
                author='$author'
                WHERE productId= '$productId'";
                
                $proUp = $this->db->updateData($query);
                if ($proUp) {
                    $msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Products Update Successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    return $msg;
                }
                else{
                    $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Products Not Updated.....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    return $msg;
                }  
            }
            
        
    }

    //delete products function
    public function deleteProducts($productId){

        $productId = $productId;
        $query = "SELECT * FROM products_table WHERE productId = '$productId'";
        $getpostImg = $this->db->readData($query);
        if ($getpostImg) {
            while ($delImg = $getpostImg->fetch_assoc()) {
                $unlinkImg = $delImg['image'];
                if ($unlinkImg) {
                   unlink($unlinkImg);
                }
            }
        }
        $query = "DELETE FROM products_table WHERE productId = '$productId'";
        $result = $this->db->deleteData($query);
        if ($result) {
            $msg = "<div class='alert alert-success alert-dismissible' role='alert'><strong>Success! </strong>Product was Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
            header("Refresh:1");
        }
        else{
            $msg = "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong> Product is not Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            return $msg;
        }
    }

    //show fetured products
    public function getHomePageProducts(){
        $query = "SELECT * FROM products_table ORDER BY productId DESC LIMIT 6";
        $result = $this->db->readData($query);
        return $result;
    }

    //show fetured single products
    public function showSinglePro($productId){
        $productId = $productId;
        $query = "SELECT p.*, c.category, b.brandName
        FROM products_table as p, category_table as c, brand_table as b WHERE p.categoryId = c.categoryId
        AND p.brandId = b.brandId AND p.productId = '$productId'";
        $result = $this->db->readData($query);
        return $result;
    }

    public function showProductsByBrand($brandId){
        $query = "SELECT * FROM products_table WHERE brandId = '$brandId'";
        $result = $this->db->readData($query);
        return $result;
    }

    public function showProductsByCat($categoryId){
        $query = "SELECT * FROM products_table WHERE categoryId = '$categoryId'";
        $result = $this->db->readData($query);
        return $result;
    }
    

}

?>
