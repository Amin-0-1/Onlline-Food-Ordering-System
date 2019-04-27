<?php
session_start();
    include_once '../../Model/User.php';
    include_once '../../Model/Order.php'; 
    include_once '../../Model/OrderFoodItem.php';

if ($_POST OR @$_GET['action']) {


	    if (isset($_GET['action']) AND $_GET['action'] == "v_CurrentOrders") {

	        $orderData = Order::getOrdersData(); // gets all orders data

	        include "../../Viewer/Admin/Admin_views/Admin_subViews/Pending Orders.php";
	    }

	    if (isset($_GET['action']) AND $_GET['action'] == "Transactions") {
	        $deliveredData = Order::getDelieverdData();
	        include '../../Viewer/Admin/Admin_views/Admin_subViews/Delivered Orders.php';
	    }

	    if (isset($_GET['action']) AND $_GET['action'] == "displayOrder") {

	        $orderData = Order::getOrderDataByID($_GET['id']);
	        $orderItems = OrderFoodItem::getAllItemOfOrder($orderData[0]['ID']);
	        include "../../Viewer/Visitor/Visitor_views/Visitor_subViews/Display Order.php";
	    }

	    if (isset($_GET['action']) AND $_GET['action'] == "assignAsDelivered") { // admin click delivered button
	        Order::updateStatues($_GET['id'],"delivered");
	        $orderData = Order::getOrdersData();
	        include "../../Viewer/Admin/Admin_views/Admin_subViews/Pending Orders.php";
	    }
	    

	    if (isset($_GET['action']) AND $_GET['action'] == "search_transaction") {
	        
	        include "../../Viewer/Admin/Admin_views/Admin_subViews/search_transaction.php";
	        
	    }

	    if(isset($_POST['submit']) && ($_POST['submit'] == 'Search_Transactions2')){
	        $deliveredData = Order::searchTransaction($_POST['ID']);
	        include '../../Viewer/Admin/Admin_views/Admin_subViews/Delivered Orders.php';
	    }



}




?>