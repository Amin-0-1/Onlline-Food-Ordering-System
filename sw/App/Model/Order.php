<?php
	class Order{
		public $ID;
		public $TotalPrice;
		public $date;
		public $statues;
		//public $orderContent;
		public $VisitorID; // fk
		public static  $dbo;
		function __construct($id){
			$this->statues = "pending";
			$this->VisitorID = $id;
			$this->date = date("Y-m-d");
		}

		public function ConnectToDB(){
			include_once "../../Model/Database2.php";
	        include_once "../../../Global/vars.php";
	        $var = vars::getVars();
			self::$dbo = new Database($var);
			self::$dbo = self::$dbo->db;
	
		}

		public static function getOrderID($VisitorID){ // return id of pending order to current visitor
			self::ConnectToDB();
			 $stmt = self::$dbo->prepare("SELECT ID from orders where statues = 'pending' and VISITORID = $VisitorID");
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

		public static function getOrderData($visitorID,$orderID=0,$statues='onWay'){
			 self::ConnectToDB();
			 if($orderID == 0){
			 	$stmt = self::$dbo->prepare("SELECT * from orders where VISITORID = $visitorID and statues = '$statues'");
			 }else{
			 	$stmt = self::$dbo->prepare("SELECT * from orders where ID = $orderID and statues = '$statues'");
			 }
			 
	         $stmt->execute();
	         $cont = $stmt->rowCount();
	         $row  = $stmt->fetchAll();
	         if($cont > 0){
	            return $row; // returns an array
	         }
	         else{
	          return 0;
	         }
		}

		public static function getOrderDataByID($id){
			 self::ConnectToDB();									// VISITORID;
			 $stmt = self::$dbo->prepare("SELECT * from orders where ID = $id");
	         $stmt->execute();
	         $cont = $stmt->rowCount();
	         $row  = $stmt->fetchAll();
	         if($cont > 0){
	            return $row; // returns an array
	         }
	         else{
	          return 0;
	         }
		}


		public static function getPrice($orderid){
			$stmt = self::$dbo->prepare("SELECT TotalPrice from Orders where statues = 'pending' and ID = $orderid");
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

		public static function updatePrice($orderid,$subprice,$numbeOfPreviousItem=0,$itemPrice=0){
			self::ConnectToDB();

			$currentPrice = self::getPrice($orderid);
			
			if($numbeOfPreviousItem == 0){
				
				$currentPrice['TotalPrice'] = $currentPrice['TotalPrice'] + $subprice;

			}else{
				$currentPrice['TotalPrice'] += $subprice;
				$currentPrice['TotalPrice'] -= $numbeOfPreviousItem * $itemPrice;
			}
			$upload = $currentPrice['TotalPrice'];
        	$tableName = "orders";
        	$stmt = self::$dbo->prepare("UPDATE $tableName set TotalPrice = $upload WHERE ID = $orderid ");
       		return $stmt->execute();
		
		}

		public static function updateStatues($orderid,$state){
			self::ConnectToDB();
			$tableName = "orders";
        	$stmt = self::$dbo->prepare("UPDATE $tableName set statues = '$state' WHERE ID = $orderid ");
       		return $stmt->execute();
		}

		public static function deleteOrder($orderId){
			self::ConnectToDB();
			$tablename = "orders";
        	$stmt = self::$dbo->prepare("DELETE FROM $tablename WHERE ID = $orderId AND statues = 'pending'");
        	//echo "DELETE FROM $tablename WHERE orderID = $orderID AND statues = 'pending'";
       		return $stmt->execute();
		}

		public static function getOrdersData(){
			self::ConnectToDB();
			 
			 	$stmt = self::$dbo->prepare("SELECT * from orders where statues = 'onWay'");
		
	         $stmt->execute();
	         $cont = $stmt->rowCount();
	         $row  = $stmt->fetchAll();
	         if($cont > 0){
	            return $row; // returns an array
	         }
	         else{
	          return 0;
	         }
		}

		public static function getDelieverdData($visitorId=0){
			self::ConnectToDB();
			 if($visitorId == 0){
			 	$stmt = self::$dbo->prepare("SELECT * from orders where statues = 'delivered'");
			 }else{
			 	$stmt = self::$dbo->prepare("SELECT * from orders where statues = 'delivered' and VISITORID = $visitorId");
			 }
			 	
		
	         $stmt->execute();
	         $cont = $stmt->rowCount();
	         $row  = $stmt->fetchAll();
	         if($cont > 0){
	            return $row; // returns an array
	         }
	         else{
	          return 0;
	         }
		}

		public static function searchTransaction($id){
			self::ConnectToDB();
			 $stmt = self::$dbo->prepare("SELECT * from orders where ID = $id");
	         $stmt->execute();
	         $cont = $stmt->rowCount();
	         $row  = $stmt->fetchAll();
	         if($cont > 0){
	            return $row; // returns an array
	         }
	         else{
	          return 0;
	         }
		}

		public static function subtractOrder($orderid){
			self::ConnectToDB();
			$orderContent = OrderFoodItem::getAllItemOfOrder($orderid);
            for ($i = 0; $i < count($orderContent); $i++){
            	$prevAmount = fooditem::getItemAmount(0,$orderContent[$i]['foodItemID']);
            	$prevAmount['Amount'] = $prevAmount['Amount'] - $orderContent[$i]['foodItemNumber'];

            	$amount = $prevAmount['Amount'];
            	$id = $orderContent[$i]['foodItemID'];

            	$stmt = self::$dbo->prepare("UPDATE fooditems set Amount = $amount where ID = $id ");
	   	        $stmt->execute();

            }
		}
	}
?>