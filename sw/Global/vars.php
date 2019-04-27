<?php


/*	$dns = 'mysql:host=localhost;dbname=mk_market'; 
      $user='root';
      $pass ='';
     $option =array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        );; */


   
 class vars{ //singleton and immutable 
        private  $dns ; 
        private  $user;
        private  $pass ;
        private  $option;
        private static $refrence = null; // singleton

        private function __construct() {
           $this-> dns = 'mysql:host=localhost;dbname=mk_market'; //mk_market
           $this -> user = 'root';
           $this -> pass = '';
           $this -> option = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            );

        }
    public static function getVars(){

        if(is_null(self::$refrence)){
            self::$refrence = new vars();  // creates just one object it is singltone design pattern
        }
        return self::$refrence;
    }

    public function getDns(){
        return $this->dns;
    }
    public function getUser(){
        return $this->user;
    }
    public function getPass(){
        return $this->pass;
    }
    public function getOption(){
        return $this->option;
    }
}


?>


