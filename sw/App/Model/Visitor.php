<?php
include_once 'User.php';
include_once 'Database2.php';
include_once "../../Model/Database2.php";
include_once "../../../Global/vars.php";

class Visitor extends User{


	private $order ;
	public $dbo;
	function __construct(){
		//parent::__construct($data);
		
		$x = new User($x);
		//return $x;
	}

	public function register($data){
		// access and add to db
		include_once "Database2.php";
		include_once "../../Global/vars.php"; 
        $var = vars::getVars();
		$db = new Database($var);
		$state = $db->add($data,'users');
		return $state;

	}	

	public function ConnectToDB(){
		include_once "../../Model/Database2.php";
        include_once "../../../Global/vars.php";
        $var = vars::getVars();
		$this->dbo = new Database($var);
		$this->dbo = $this->dbo->db;
	
	}

	public function addOrder($id){
		$this->ConnectToDB();
		include_once "Order.php";
		$order = new Order($id);
    	$tblName = 'orders';
    	$col = 'Name';
    	
    	$keys=array();
        $values=array(); 
    	foreach($order as $key => $value){
            
            $val="'$value'";
            array_push($keys,$key);
            array_push($values,$val);
        }
        
        $tblkeys = implode($keys , ',');
        $datavalues = implode($values , ',') ;
        $stmt = $this->dbo->prepare("INSERT INTO $tblName ($tblkeys) VALUES($datavalues)");
        //echo "INSERT INTO $tblName ($tblkeys) VALUES($datavalues)";
        return $stmt->execute();
		
	}

	public function getCurrentOrder($id){
		$this->ConnectToDB();
		$stmt = $this->dbo->prepare("SELECT * FROM orders where VISITORID = $id AND statues = 'pending'");
		$stmt->execute();
        $cont = $stmt->rowCount();
        $row  = $stmt->fetch();
        if($cont > 0){
            return 1;
        }
        else{
          return 0;
        }
		
	}

}
?> 