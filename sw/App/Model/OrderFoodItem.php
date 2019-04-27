<?php
include_once "Order.php";
class OrderFoodItem{
	public $foodItemNumber;
	public $foodItemID;
	public $orderID;
	public $price; // for just one item in the order;

	public $dbo;
	public static $dbo2;
	public function __construct($data){
		$this->foodItemNumber = $data['numberOfItem'];
		$this->orderID = $data['orderId']['ID'];
		$this->foodItemID = $data['itemId'];

		$sendDB['foodItemNumber'] = $this->foodItemNumber;
		$sendDB['foodItemID'] = $this->foodItemID;
		$sendDB['orderID'] = $this->orderID;

		$prevNumber = $this->checkExits($this->foodItemNumber,$this->foodItemID,$this->orderID);
		
		if($prevNumber == 0){
			$this->calculate();
			$sendDB['price'] = $this->price;
			$this->addToOrder($sendDB);
			Order::updatePrice($this->orderID,$this->price);
		}else{
			OrderFoodItem::updateNumberOfItem($this->orderID,$this->foodItemNumber,$this->foodItemID,$prevNumber[0]);
		}

		// $this->calculate();
		// $sendDB['price'] = $this->price;
		// $this->addToOrder($sendDB);
		// Order::updatePrice($this->orderID,$this->price);
	}
	public function checkExits($number,$itemID,$orderId){
		$this->ConnectToDB();
		$sql = "SELECT foodItemNumber from orderfooditem where orderID = $orderId And foodItemID = $itemID";

		$stmt = $this->dbo->prepare($sql);
	         $stmt->execute();
	         $cont = $stmt->rowCount();
	         $row  = $stmt->fetch();
	         if($cont > 0){
	            return $row; // returns an array
	         }
	         else{
	          return 0;
	         }
	}

	public function ConnectToDB(){
		include_once "../../Model/Database2.php";
        include_once "../../../Global/vars.php";
        $var = vars::getVars();
		$this->dbo = new Database($var);
		$this->dbo = $this->dbo->db;
		
	}

	public static function ConnectToDB2(){
		include_once "../../Model/Database2.php";
        include_once "../../../Global/vars.php";
        $var = vars::getVars();
		self::$dbo2 = new Database($var);
		self::$dbo2 = self::$dbo2->db;
		
	}


	public function addToOrder($data){
		$this->ConnectToDB();
		$tblName = "orderfooditem";
		$keys=array();
	    $values=array(); 
	    foreach($data as $key => $value){
	        
	        $val="'$value'";
	        array_push($keys,$key);
	        array_push($values,$val);
	    }
	    
	    $tblkeys = implode($keys , ',');
	    $datavalues = implode($values , ',') ;
	    $stmt = $this->dbo->prepare("INSERT INTO $tblName ($tblkeys) VALUES($datavalues)");
	    return $stmt->execute();
	    //echo "INSERT INTO $tblName ($tblkeys) VALUES($datavalues)";
	}

	public function calculate(){
		
		$itemPrice = fooditem::getItemPrice($this->foodItemID);
		$this->price = $itemPrice['Price'] * ($this->foodItemNumber);
		
		return $this->price;
	}

	public static function getAllItemOfOrder($orderId){
		self::ConnectToDB2();
    	$tablename = "orderfooditem";
        $sql = "SELECT * from $tablename where orderID = $orderId";
	    $stmt = self::$dbo2->prepare($sql);
	    $stmt->execute();
	    $rows=$stmt->fetchAll();
	   	return $rows;
	}

	public static function updateNumberOfItem($orderId,$number,$itemId,$numberOfpreviousItem){
		self::ConnectToDB2();
		$tablename = "orderfooditem";

		$query = "UPDATE $tablename SET foodItemNumber = $number where foodItemID = $itemId AND orderID = $orderId ";   
		$stmt = self::$dbo2->prepare($query);
		$stmt->execute();

		$itemPrice = fooditem::getItemPrice($itemId);
		$TotalPrice = $itemPrice['Price'] * $number;
		$query = "UPDATE $tablename SET price = $TotalPrice where foodItemID = $itemId AND orderID = $orderId ";   
		$stmt = self::$dbo2->prepare($query);
		$stmt->execute();

		Order::updatePrice($orderId,$TotalPrice,$numberOfpreviousItem,$itemPrice['Price']); 

   
	}

	public static function deleteFooditem($orderId,$itemId,$visitorID){
		self::ConnectToDB2();

		$tablename = "orderfooditem";

		$query = "SELECT price FROM $tablename Where orderID = $orderId And foodItemID = $itemId";
		$stmt = self::$dbo2->prepare($query);
		$stmt->execute();
		$price=$stmt->fetch();
		$price['price'] *= -1 ;
	

		Order::updatePrice($orderId,$price['price']);
		$query = "DELETE FROM $tablename WHERE orderID = $orderId AND foodItemID = $itemId ";
	
		$stmt = self::$dbo2->prepare($query);
		$stmt->execute();
		$orderNotEmpty = self::getAllItemOfOrder($orderId);
		//print_r($orderNotEmpty);
		if($orderNotEmpty == null){
			Order::deleteOrder($orderId);
			session_start();
			if(isset($_SESSION['willDisabled'])){
				fooditem::setEnable($_SESSION['willDisabled']);
				unset($_SESSION['willDisabled']);
			}
		}
		
	}

}
?>