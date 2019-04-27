
<?php


include_once "../../Model/User.php";
include_once "../../Model/Category.php";
include_once "../../Model/fooditem.php";
include_once "../../Model/Visitor.php";
include_once "../../Model/OrderFoodItem.php";
include_once "../../Model/Order.php";
session_start();

$ID       = $_SESSION['GroupID'];

$table = "fooditmes";


if ($_POST OR @$_GET['action']) {

    if (isset($_GET['action']) AND $_GET['action'] == "display") {
        
        try {
            $id = $_GET['id'];
            $joindata =  fooditem::displayItemByID($id);
             foreach($joindata as $join){
             
             $dataPro['Name'] = $join[0];
             $dataPro['Catigiories'] = $join['Name'];
             $dataPro['Price'] = $join['Price'];
             $dataPro['Image'] = $join['Image'];
             $dataPro['Description'] = $join['Description'];
             $dataPro['Visibility'] = $join['Visibility'];
             }

             include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/display Item.php";
        
           
            
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        
    }
    

    if (isset($_GET['action']) AND $_GET['action'] == "search_category") {
        
        include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Search Category.php";
        
    }

    if(isset($_POST['submit']) && ($_POST['submit'] == 'search_category2')){

        $result = Category::searchCategory($_POST['name']);
        if($result != null){ 
          include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/display Searched Category.php"; 
        }else{
            include "../../Viewer/Visitor/Visitor_views/Visitor_Categories View.php";
        }
       
    }

    if (isset($_GET['action']) AND $_GET['action'] == "getIntersectMeals") {
        
       $data = User::getIntersectMeals($_GET['id'],$_SESSION['GroupID']);
       
       include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Category Meals.php";
        
    }

    
    if (isset($_GET['action']) AND $_GET['action'] == "add_to_cart") { // choose an item  
         
        $item = fooditem::displayItemByID($_GET['id']);
        
         include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/add Item to Cart.php";
     }

    if(isset($_POST['submit']) && ($_POST['submit'] == 'submit_to_cart')){ // enter number of items
        // post >>  [ID] => [number_of_item] => 5 [submit] => submit_to_cart 
        

        $amount = fooditem::getItemAmount(0,$_POST['ItemID']);
        $amount = $amount['Amount'];
        $amountWillbe = $amount - $_POST['number_of_item'];
        if($amountWillbe >= 0){
                $userData = User::getUserData($_SESSION['GroupID']);
                $test['fullName']= $userData['Fullname'];
                $test['email'] = $userData['Email'];
                $test['password'] = $userData['Password'];
                $test['username'] = $userData['Username'];
                $test['address'] = $userData['Address'];
                $test['phone'] = $userData['Phone'];

                $data['Fullname'] = $test['fullName'];
                $data['Email'] = $test['email'];
                $data['Password'] = $test['password'];
                $data['Username'] = $test['username'];
                $data['Address']= $test['address'];
                $data['Phone'] = $test['phone'];
               
               $visitor = new Visitor($data);
                if($amountWillbe ==0){
                    $_SESSION['willDisabled']=$_POST['ItemID'];
                    fooditem::setDisable($_POST['ItemID']);
                }
               if($visitor->getCurrentOrder($_SESSION['GroupID']) == 0){ // gets pending order
                   
                    $visitor->addOrder($_SESSION['GroupID']); // there is no pending orders will make one

                    $send['numberOfItem'] = $_POST['number_of_item'];
                
                    $send['itemId'] = $_POST['ItemID'];
                    $send['orderId'] = Order::getOrderID($_SESSION['GroupID']);
                    $orderItem = new OrderFoodItem($send);
               }else{
             
                    $send['numberOfItem'] = $_POST['number_of_item'];
                    $send['orderId'] = Order::getOrderID($_SESSION['GroupID']); // gets the only pending order
                    $send['itemId'] = $_POST['ItemID'];
                    $orderItem = new OrderFoodItem($send);
                    
               }
               header("Location:../../Controller/Visitor/Visitor Dashboard Controller.php?action=v_item");
        }else{
            $itemId = $_POST['ItemID'];
            $CurrentAmount = $amount;
           header("Location:../../Controller/visitor/Visitor Manage Item.php?action=add_to_cart&id=$itemId&amount=$CurrentAmount"); 
        }
    
    
    }
      


    
}else{
    include "../../Viewer/Visitor/Visitor View.php";
}
?>

