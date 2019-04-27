<?php
session_start();

//var_dump($_SESSION);
    include_once '../../Model/Visitor.php';
    include_once '../../Model/User.php';
    include_once '../../Model/Order.php';
    include_once '../../Model/OrderFoodItem.php';
if ($_POST OR @$_GET['action']) {


    if(isset($_GET['action']) And $_GET['action'] == 'v_cart'){
        include "../../Viewer/Visitor/Visitor_views/Visitor_Cart.php";
    }   

    if (isset($_GET['action']) AND $_GET['action'] == "v_category") {
        include "../../Viewer/Visitor/Visitor_views/Visitor_Categories View.php";
    }
      
    if (isset($_GET['action']) AND $_GET['action'] == "v_item") {
      
        include "../../Viewer/Visitor/Visitor_views/Visitor_FoodItems View.php";
    }

    if (isset($_GET['action']) AND $_GET['action'] == "v_Orders") {
      
        include "../../Viewer/Visitor/Visitor_views/Visitor_Orders.php";
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "UpdateProfile")
    {
    
        $main['ID'] = $_POST['ID']; 

        if(empty($_POST['username'])){

        }else{
            $main['Username'] = $_POST['username']; 
        }
        

        if(empty($_POST['newpassword'])){
            
        }else{
            $main['Password'] = $_POST['newpassword']; 
        } 

        if(empty($_POST['fullname'])){

        }else{
            $main['Fullname'] = $_POST['fullname']; 
        }
        
        if(empty($_POST['email'])){

        }else{
            $main['Email'] = $_POST['email']; 
        }
        
        if(empty($_POST['phone'])){

        }else{
            $main['Phone'] = $_POST['phone']; 
        }

        if(empty($_POST['address'])){

        }else{
            $main['Address'] = $_POST['address']; 
        }
        
        //$main['GroupID'] = 1;
         
        try {
            $ID = $main['ID'];
            $dd = $user->UpdateProfile($main,$ID);
        
            if($dd == true){
                header("Refresh:0");
                header('Location:../../../Global/redirect.php');
            }
            

        } catch (Exception $exc) {
            echo $exc->getMessage();
        }    
     }
    

}
?>