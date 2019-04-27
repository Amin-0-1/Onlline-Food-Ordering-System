<?php

session_start();

include "../App/Tempelates/header.php";

if(! isset($_SESSION)){

    header('Location:Login View.php');
    die();
}else{

    if($_SESSION['GroupID']==1){
        include "../App/Tempelates/navbar.php";
        include "../App/Viewer/Admin/Admin View.php";
      
    }
    elseif($_SESSION['GroupID'] !=1 && $_SESSION['active']!=0){
        include "../App/Tempelates/navbar.php";
        include "../App/Viewer/Visitor/Visitor View.php";
        //header('Location:../App/Viewer/Visitor View.php');
    }else{
       header('Location:Login View.php'); 
    }
    
}

    

include "../App/Tempelates/footer.php";
?>
