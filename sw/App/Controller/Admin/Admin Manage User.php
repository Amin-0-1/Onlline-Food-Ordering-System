<?php

include_once "../../Model/Admin.php";

session_start();

$table = "users";

if ($_POST OR @$_GET['action']) {
    
    if (isset($_GET['action']) AND $_GET['action'] == "search_user") {
        include "../../Viewer/Admin/Admin_views/Admin_subViews/Search User";          
    }
    // post for search user
    if (isset($_POST['submit']) && $_POST['submit'] == "search") {

     		$result = Admin::searchUser($_POST['name']);
 			
 			if($result != 0){
 				
 				include "../../Viewer/Admin/Admin_views/Admin_subViews/display Searched User.php";
 			}else{
 				include "../../Viewer/Admin/Admin_views/Admin_subViews/Search User";
 			}


    }
    if(isset($_GET['action']) AND $_GET['action'] == "block"){
 
    	$result = Admin::blockUser($_GET['id']);
    	header('Location:../../Controller/Admin/Admin Dashboard Controller.php?action=v_user');

    }

    if(isset($_GET['action']) AND $_GET['action'] == "activate"){
    	
    	$result = Admin::activateUser($_GET['id']);
    	header('Location:../../Controller/Admin/Admin Dashboard Controller.php?action=v_user');
    }

    
    if (isset($_GET['action']) AND $_GET['action'] == "display_user") {

        try {
            include_once "../../Model/User.php";
            include_once "../../../Global/vars.php";
            $id = $_GET['id'];
            $dataPro =  User::getUserData($id);
            include '../../Viewer/Admin/Admin_views/Admin_subViews/display user.php';
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    

    
}else{
    header('Location:../../../Global/redirect.php');
}