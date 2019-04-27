<?php

class User{
	private $fullName;
	private $userName;
    private $email;
	private $password;
    private $address;
    private $phoneNumber;
    private $tablename;
    private $activeStatues;
    public $db; // latest one

    function __constuct($data){
        $this->fullName = $data['fullName'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->userName = $data['username'];
        $this->address = $data['address'];
        $this->phoneNumber = $data['phone'];
        $this->tablename = "users";
        $this->$activeStatues = true;

    }

	public static function login($username,$pass){
		include_once "Database2.php";
        include_once "../../Global/vars.php"; 
        $var = vars::getVars();
		$dbo = new Database($var);

		$login = self::getDataToLogin($username,$pass,$dbo);

        return $login;
	}



    //Get date to user From the databas
    public static function getDataToLogin($username,$pass){
        include_once "Database2.php";
        include_once "../../Global/vars.php"; 
        $var = vars::getVars();
        $dbo = new Database($var);
        $db = $dbo->db;
            
        $stmt = $db->prepare(" SELECT * FROM users WHERE Username = ? AND Password = ? LIMIT 1" );
            $stmt->execute(array($username,$pass));
            //$stmt->execute(array('menna',123));
            $cont = $stmt->rowCount();
            $row  = $stmt->fetch();

            //echo $groupID;
            //check if user exist or not 
            if($cont > 0){
                return true; 
            }
            else{
              throw new exception("user not found");
            }
    }

    public static function getPassword($email){
         include_once "Database2.php";
         include_once "../../Global/vars.php";
            $var = vars::getVars();
            $dbo = new Database($var);
            $db = $dbo->db;
          

            $stmt = $db->prepare(" SELECT Password FROM users WHERE Email = '$email' ");
            $stmt->execute();
            $cont = $stmt->rowCount();
            $row  = $stmt->fetch();
           
            if($cont > 0){
                return $row;

            }else{
                 return -1;
            }
    }

    public static function getUserData($id){
        include_once "Database2.php";
        include_once "../../../Global/vars.php";
            $var = vars::getVars();
            $dbo = new Database($var);
            $db = $dbo->db;
          

            $stmt = $db->prepare(" SELECT * FROM users WHERE id = $id" );
            $stmt->execute();
            $row  = $stmt->fetch();
            return $row;
    } 

    public static function getUserDataByName($name){
        include_once "Database2.php";
        include_once "../../../Global/vars.php";
            $var = vars::getVars();
            $dbo = new Database($var);
            $db = $dbo->db;
          

            $stmt = $db->prepare(" SELECT * FROM users WHERE Username = '$name' ");
            $stmt->execute();
            $row  = $stmt->fetch();
            return $row;
    } 


    public static function getActiveState($id=0){
            $var = vars::getVars();
            $dbo = new Database($var);
            $db = $dbo->db;
            $stmt = $db->prepare(" SELECT 'ActiveState' FROM users WHERE id = $id" );
            return $stmt->execute();    
    }

    public static function getActiveStateforLogin($username,$password){
        $var = vars::getVars();
        $dbo = new Database($var);
        $db = $dbo->db;
        $stmt = $db->prepare("SELECT ActiveState FROM users WHERE Username = '$username' and Password = $password" );
       
        $stmt->execute();
        $cont = $stmt->rowCount();
        $row  = $stmt->fetch();
       
        if($cont > 0){
            return $row;

        }else{
             return -1;
        }
    }

    public static function getGroupID($username,$pass){
    		$var = vars::getVars();
            $dbo = new Database($var);
            $db = $dbo->db;
            $stmt = $db->prepare(" SELECT * FROM users WHERE Username = ? AND Password = ? LIMIT 1" );
            
            $stmt->execute(array($username,$pass));
            //$stmt->execute(array('menna',123));
            
            $row  = $stmt->fetch();
           // echo $row['GroupID'];
            
            $GroupID = $row['ID'];
            return $GroupID;
    }

        //Display profile
    public static function DisplayProfile($id){
        
        include_once "../../Model/Database2.php";
        include_once "../../../Global/vars.php"; 
        $var = vars::getVars();
        $dba = new Database($var);
        $tablename = "users";
        $query = "SELECT * FROM $tablename WHERE ID = '$id' ";
       
        $stmt = $dba->db->prepare($query);
        $stmt->execute();
        $cont = $stmt->rowCount();
        $row  = $stmt->fetch();
       
        if($cont > 0){
 
            return $row;
              
        }
        else{
          throw new exception("User not Found");
        }
    }


    //Update profile
    public static function UpdateProfile($date,$ID){
           
            include_once "../../Model/Database2.php";
            include_once "../../../Global/vars.php"; 
            $var = vars::getVars();
            $dba = new Database($var);
            $query = "UPDATE users SET ";        
            foreach ($date as $key => $value) {
                $query .= "`".$key."` = '".$value."', ";
            }             
            $pat = "+-0*/";
            $query .= $pat;        
            $query = str_replace(", ".$pat, " ", $query);                             
            $query .= " WHERE id = $ID";
           
            $stmt = $dba->db->prepare($query);
            
            $stmt->execute();

        if($stmt == true){
            return true;
        }else{
            throw exception('Can not Update');
        }
        
    }

    // gets all category items;
    public static function getIntersectMeals($id,$userid=0){
        include_once "../../Model/Database2.php";
            include_once "../../../Global/vars.php"; 
            $var = vars::getVars();
            $dba = new Database($var);
            if($userid == 0){
                   $query = "SELECT * from fooditems WHERE CATID = $id ";   
            }else{
               
                $query = "SELECT * from fooditems WHERE CATID = $id and Visibility = 1";    
            }
            $stmt = $dba->db->prepare($query);
            $stmt->execute();
            $count = $stmt->rowCount();
            $data = array();
            for ($i=0; $i < $count; $i++) { 
                $data[$i] =$stmt->fetch(PDO::FETCH_ASSOC);
            }
           
           return $data;            
    }

}


?>