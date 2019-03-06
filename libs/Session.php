<?php 

/**
 * session class
 */
class Session{
    public static function init(){
        if (version_compare(phpversion(),'5.4.0','<')) {
            if (session_id() == ''){ 
                session_start();
            }
        }
        else{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else{
            return false;
        }
    }


    public static function checkSession(){
        if (self::get("login") == false) {
            self::destroy();
            echo "<script>window.location='login.php';</script>";
        }
    }

    public static function checkLogin(){
        if (self::get("login") == true) {
            echo "<script>window.location='dashbord.php';</script>";
        }
    }
    
    public static function destroy(){
        session_destroy();
        session_unset();
    }
}

?>
