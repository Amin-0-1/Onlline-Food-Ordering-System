<?php
session_start();

//var_dump($_SESSION);
    include_once '../../Model/Visitor.php';
    include_once '../../Model/User.php';
    include_once '../../Model/Order.php';
    include_once '../../Model/OrderFoodItem.php';

if ($_POST OR @$_GET['action']) {

    $result = User::getUserDataByName($_SESSION['username']);
    $visitor = new Visitor();
        

    if (isset($_GET['action']) AND $_GET['action'] == "v_CurrentOrders") {

        $orderData = Order::getOrderData($_SESSION['GroupID']);
        include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Pending Orders.php";
    }

    if (isset($_GET['action']) AND $_GET['action'] == "v_transactions") {
         $orderData = Order::getDelieverdData($_SESSION['GroupID']); // gets all previous orders data
         include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Transactions.php";
    }


     if (isset($_GET['action']) AND $_GET['action'] == "displayTransaction") {
         $orderData = Order::getOrderData($_SESSION['GroupID'],$_GET['id'],$stateuse = 'delivered');
         $orderItems = OrderFoodItem::getAllItemOfOrder($orderData[0]['ID']);
         include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Display Order.php";
        //print_r($orderData);
    }

    if (isset($_GET['action']) AND $_GET['action'] == "displayOrder") {
        $orderData = Order::getOrderData($_SESSION['GroupID'],$_GET['id']);
        $orderItems = OrderFoodItem::getAllItemOfOrder($orderData[0]['ID']);
        include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Display Order.php";
    }

    // if(isset($_GET['action']) And $_GET['action'] =='updateOrder'){ // display update numbe of item
    //     //Array ( [action] => updateOrder [itemNumber] => 6 [itemId] => 1 )
    //     $item = fooditem::displayItemByID($_GET['itemId']);
    //     if(isset($_GET['amount'])){
    //         $_SESSION['numberOfPreviousItem']= $_GET['amount'];
    //     }else{
    //         $_SESSION['numberOfPreviousItem']= $_GET['itemNumber'];
    //     }
    //     include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Update Item in Cart.php";
    // }

    // if(isset($_POST['submit']) && ($_POST['submit'] == 'Commit_update')){

    //     //print_r($_POST); //Array ( [ItemID] => 1 [number_of_item] => 5 [submit] => Commit_update )
    //     $amount = fooditem::getItemAmount(0,$_POST['ItemID']);
    //     $amount = $amount['Amount'];
    //     $amountWillbe = $amount - $_POST['number_of_item'];
    //     if($amountWillbe >= 0){

    //         $orderId = Order::getOrderID($_SESSION['GroupID']);

    //         OrderFoodItem::updateNumberOfItem($orderId['ID'],$_POST['number_of_item'],$_POST['ItemID'],$_SESSION['numberOfPreviousItem']);

    //         if($amountWillbe ==0){
    //             $_SESSION['willDisabled']=$_POST['ItemID'];
    //             fooditem::setDisable($_POST['ItemID']);
    //         }else{
    //             if(isset($_SESSION['willDisabled'])){
    //                 fooditem::setEnable($_POST['ItemID']);
    //             } 
    //         }


    //         header("Location:../../Controller/visitor/Visitor Dashboard Controller.php?action=v_cart");
    //     }else{
            
    //         $itemId = $_POST['ItemID'];
    //         $CurrentAmount = $amount;
    //        header("Location:../../Controller/visitor/Visitor Manage Item.php?action=updateOrder&itemId=$itemId&amount=$CurrentAmount"); 
    //     }
    // }

     
    // if(isset($_GET['action']) And $_GET['action'] =='DeleteItemOrder'){ // display update numbe of item
    //     $orderId = Order::getOrderID($_SESSION['GroupID']);
    //     OrderFoodItem::deleteFooditem($orderId['ID'],$_GET['Itemid'],$_SESSION['GroupID']);
    //     header("Location:../../Controller/visitor/Visitor Dashboard Controller.php?action=v_cart");
    // } 

    // if(isset($_GET['action']) And $_GET['action'] =='pay_order'){ 
    //   //print_r($_GET);
    //      //$orderId = Order::getOrderID($_SESSION['GroupID']);
    //      $state = "OnWay";
    //      Order::updateStatues($_GET['orderId'],$state);
    //      Order::subtractOrder($_GET['orderId']);
    //      header("Location:../../../Global/redirect.php");
    // } 

}