<?php
class Category{

	public $Name;
	public $ID;
    public $foodItem;
	public static $sdb;
	function __construct($data){
		$this->Name = $data['name'];
        //$foodItem = new fooditem();
	}

	public static function ConnectToDB(){
		include_once "../../Model/Database2.php";
        include_once "../../../Global/vars.php";
        $var = vars::getVars();
		self::$sdb = new Database($var);
		self::$sdb = self::$sdb->db;
	}

	public static function searchCategory($name){
        self::ConnectToDB();
        $tableName = "categories";
        $query = "SELECT * FROM $tableName WHERE Name = '$name' ";
        
        $stmt = self::$sdb->prepare($query);
        $stmt->execute();
        $cont = $stmt->rowCount();
        $row  = $stmt->fetch();
        if($cont > 0){
            return $row;
        }
        else{
          return 0;
        }
    }

    public static function AddNewCategory($main){
    	self::ConnectToDB();
    	$tblName = 'categories';
    	$col = 'Name';
    	
    	$keys=array();
        $values=array(); 
    	foreach($main as $key => $value){
            
            $val="'$value'";
            array_push($keys,$key);
            array_push($values,$val);
        }
        
        $tblkeys = implode($keys , ',');
        $datavalues = implode($values , ',') ;
        $stmt = self::$sdb->prepare("INSERT INTO $tblName ($tblkeys) VALUES($datavalues)");
        return $stmt->execute();
        
    }

    public static function deleteCategory($id){
    	
        $tableName = "categories";
    	self::ConnectToDB();
    	$stmt = self::$sdb->prepare("DELETE FROM $tableName WHERE ID = $id ");
        print_r($stmt);
        $stmt->execute();  
    }

        public static function displayCategoryName($ID){
	       // include 'Display.php';
	        self::ConnectToDB();
	        $tableName = "categories";
	        $query = "SELECT * FROM $tableName WHERE ID = $ID ";
	       
	        $stmt = self::$sdb->prepare($query);
	        $stmt->execute();
	        $cont = $stmt->rowCount();
	        $row  = $stmt->fetch();
	       
	        if($cont > 0){

	            return $row;
	              
	        }
	        else{
	          throw new exception("data not Found");
	        }
	        
	        return $data;
    }

        public static function UpdateCategory($data,$C_ID){
        self::ConnectToDB();
        $tableName = "categories";
        $query = "UPDATE $tableName SET ";        
        foreach ($data as $key => $value) {
            $query .= "`".$key."` = '".$value."', ";
        }             
        $pat = "+-0*/";
        $query .= $pat;        
        $query = str_replace(", ".$pat, " ", $query);                             
        $query .= " WHERE id = $C_ID";
       
       $stmt = self::$sdb->prepare($query);
       return $stmt->execute();
        
    }


     public static function listCategories(){
    //connect to datebase
        self::ConnectToDB();
        $tablename = "categories";
        $sql = "SELECT * from $tablename ";
        $stmt = self::$sdb->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }

}


?>