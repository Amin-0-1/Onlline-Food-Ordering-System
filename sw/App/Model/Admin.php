<?php

//class Admin extends User{
	//function __constuct($fullName,$userName,$Email,$password,$addrss,$phone,$groupId){
		//super($fullName,$userName,$Email,$password,$addrss,$phone);
		//$this->$Id = 1;
	//}

	class Admin{
	private $Id;
	private static $db;

	public static function ConnectToDB(){
		include_once "../../Model/Database2.php";
        include_once "../../../Global/vars.php";
        //$var = "../../../Global/vars.php";
        $var = vars::getVars();
		self::$db = new Database($var);
		self::$db = self ::$db->db;
	
	}

      public static function searchUser($name){
        self::ConnectToDB();
        $tableName = "users";
        if($name != 'admin'){

                $query = "SELECT * FROM $tableName WHERE Username = '$name' ";
                $stmt = self::$db->prepare($query);
                $stmt->execute();
                $cont = $stmt->rowCount();
                $row  = $stmt->fetch();
                if($cont > 0){
                    return $row;
                }
                else{
                  return 0;
                }
            }else{
                return 0;
            }
            
         
    }
    public static function blockUser($id){
            self::ConnectToDB();
            $tableName = "users";
           // update users set `ActiveState` = 0 where `ID` = 56
            $col = "ActiveState";
            $query = "Update `$tableName` set `$col` = 0 WHERE `ID` = $id";
            echo "$query";
            $stmt = self::$db->prepare($query);
            return $stmt->execute();
    }

    public static function activateUser($id){
        self::ConnectToDB();
            $tableName = "users";
            $col = "ActiveState";
            //update users set `ActiveState` = 1 where `ID` = 55
            $query = "Update `$tableName` set `$col`= 1 WHERE `ID` = $id ";
            echo "$query"; 
            $stmt = self::$db->prepare($query);
            return $stmt->execute();
    }


    public static function DisplayAllUsers(){ // gets table name and display all its datas
        self::ConnectToDB();
        $tablename = "users";
        $sql = "SELECT * from $tablename where ID != 1";
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }


    public static function DisplayNonBlockedUsers(){ // gets table name and display all its datas
        self::ConnectToDB();
        $tablename = "users";
        $sql = "SELECT * from $tablename where ID != 1 And ActiveState != 0";
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }

    
   
    public static function DeleteItem($C_ID){
        
        $tableName = "fooditems";
        self::ConnectToDB();
        self::DeleteRecordByID($C_ID,$tableName);   

    }



    public static function DeleteRecordByID($ID,$tableName)
    {
     	             
        $stmt = self::$db->prepare("DELETE FROM $tableName WHERE ID = $ID ");
        print_r($stmt);
        $stmt->execute();

    }



}


?>
