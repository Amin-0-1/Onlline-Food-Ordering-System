
<?php
session_start();
    include_once '../../Model/User.php';
    include_once '../../Model/Order.php'; 
    include_once '../../Model/OrderFoodItem.php';

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    
    $user  = new User($username,$password);

if ($_POST OR @$_GET['action']) {


    if (isset($_GET['action']) AND $_GET['action'] == "v_orders") {
        include "../../Viewer/Admin/Admin_views/Admin_Orders View.php";
    }


     if (isset($_GET['action']) AND $_GET['action'] == "v_user") {
        include "../../Viewer/Admin/Admin_views/Admin_Users View.php";
    }

    if (isset($_GET['action']) AND $_GET['action'] == "v_item") {
        include "../../Viewer/Admin/Admin_views/Admin_FoodItems View.php";
    }
    
    if (isset($_GET['action']) AND $_GET['action'] == "v_category") {
        include "../../Viewer/Admin/Admin_views/Admin_Categories View.php";
    }
   
    if (isset($_GET['action']) AND $_GET['action'] == "v_FoodItems") {
        include "../../Viewer/Admin/Admin_views/Admin_FoodItems View.php";

    }
    
      //View Update Profile :
     if (isset($_GET['action']) AND $_GET['action'] == "UpdateProfile")
     {
         $date = User::DisplayProfile($_SESSION['GroupID']); // either visitor or admin
        include '../../../Global/Profile.php';
    }
    
     //Edit Profile
     if (isset($_POST['submit']) && $_POST['submit'] == "Edit profile")
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
    
} else {
    header("Refresh:0");
    header('Location:../../../Global/redirect.php');
}
?>