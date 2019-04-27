
<?php

include_once "../../Model/Admin.php";
include_once "../../Model/User.php";
include_once "../../Model/Category.php";
session_start();

$tableName = "categories";

if ($_POST OR @$_GET['action']) {
    
    if (isset($_GET['action']) AND $_GET['action'] == "add") {
        
        include "../../Viewer/Admin/Admin_views/Admin_subViews/Add Category.php";

    }
    if (isset($_POST['submit']) && $_POST['submit'] == "Add") { // adds category and return to category page

        
        $category = new Category($_POST);
        $result = category::searchCategory($category->Name);
        if($result == null){
            $catName['Name'] = $category->Name; 
            
            try {
                $dd = $category->AddNewCategory($catName);
        
                if($dd == true){
                    header('Location:Admin Dashboard Controller.php?action=v_category');
                
                }
                

            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }else{
            $result = $category->searchCategory($category->Name);
            include "../../Viewer/Admin/Admin_views/Admin_subViews/display Searched Category.php";
        }
       
    }
    
    // Delete:
    if (isset($_GET['action']) AND $_GET['action'] == "delete") {

        try {
           
            $Category_ID = $_GET['id'];
            Category::deleteCategory($Category_ID);
            header('Location:Admin Dashboard Controller.php?action=v_category');
            
        } catch (Exception $exc) {
            echo $exc->getMessage();

        }
    }
    
    
    // Edit:
     if (isset($_GET['action']) AND $_GET['action'] == "update")
     {
         $C_ID = $_GET['id'];
         $data = Category::displayCategoryName($C_ID);
         include "../../Viewer/Admin/Admin_views/Admin_subViews/Update Category.php";
        
     }
    
    
     if (isset($_POST['submit']) && $_POST['submit'] == "Edit")
     {

        $main['ID'] = $_POST['ID']; 
        $main['Name'] = $_POST['name']; 
         
        try {
            $ID = $main['ID'];
            $dd = Category::UpdateCategory($main,$ID);
            if($dd == true){
                header('Location:../../../Global/redirect.php');
            }

        } catch (Exception $exc) {
            echo $exc->getMessage();
        }   
     }
    
    if (isset($_GET['action']) AND $_GET['action'] == "search") {
        
        include "../../Viewer/Admin/Admin_views/Admin_subViews/Search Category.php";
        
    }

    if(isset($_POST['submit']) && ($_POST['submit'] == 'search_category')){
        $result = Category::searchCategory($_POST['name']);
        include "../../Viewer/Admin/Admin_views/Admin_subViews/display Searched Category.php";
    }

    if (isset($_GET['action']) AND $_GET['action'] == "getIntersectMeals"){

       $data = User::getIntersectMeals($_GET['id']);
       
       include "../../Viewer/Admin/Admin_views/Admin_subViews/Category Meals.php";
    }

}else{
    header('Location:../../../Global/redirect.php');
}
?>