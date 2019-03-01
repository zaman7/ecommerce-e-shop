<?php
//database class
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../config/config.php");
class Database{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct(){
        $this->dbConnect();
    }

    public function dbConnect(){
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            $this->error ="Connection Fail".$this->link->connect_error;
            return false;
        }
    }

    // Insert data
    public function insertData($query){
        $insert_data = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert_data){
            return $insert_data;
        }
        else {
            return false;
        }
    }

    // readData
    public function readData($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    //update Data
    public function updateData($query){
        $update_data = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_data){
            return $update_data;
        }
        else {
            return false;
        }
    }

    // Delete data
    public function deleteData($query){
        $delete_data = $this->link->query($query) or die($this->link->error.__LINE__);
        if($delete_data){
            return $delete_data;
        }
        else {
            return false;
        }
    }
}
?>
