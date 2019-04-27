<?php
if(!isset($_SESSION)){
    header('Location:../../../Global/redirect.php');
}

$_SESSION['url'] = '../App';
$_SESSION['logout'] = '';
include "../App/Tempelates/header.php";
?>

<div class="container-login100">
    <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <div class="table">
            
                <div class="row">
                    <div class="col-md-6">
                       <div class="box2">
                            <div class="title">
                                <p><a href="../App/Controller/Admin/Admin Dashboard Controller.php?action=v_category"><i class="fa fa-tasks" aria-hidden="true"></i>Categories</a> </p>
                            
                            </div>
                        
                                <div class="list">
                                    <ul>

                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                                    <button><a href="../App/Controller/Admin/Admin Manage Category.php?action=add"><i class="fa fa-plus" aria-hidden="true"></i>Add Catagory</a></button>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="title">
                                    <p><a href="../App/Controller/Admin/Admin Dashboard Controller.php?action=v_item"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Food Items</a></p>
                            
                                </div>
                                    <div class="list">
                                        <ul>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                        <button><a href="../App/Controller/Admin/Admin Manage Item.php?action=add item"><i class="fa fa-plus" aria-hidden="true"></i>Add Item</a></button>
                            </div>   
                        </div>
                    
                </div>
            
                    <br></br>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="box">
                                <div class="title">
                                    <p><a href="../App/Controller/Admin/Admin Dashboard Controller.php?action=v_user"><i class="fa fa-users" aria-hidden="true"></i>Users</a></p>
                            
                                </div>
                            <div class="list">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                                <button><a href="../App/Controller/Admin/Admin Manage User.php?action=search_user"><i class="fa fa-plus" aria-hidden="true"></i>Search User</a></button>
                        </div>   
                    </div>
                    
                    <div class="col-md-6">
                           <div class="box2">
                                <div class="title">
                                    <p><a href="../App/Controller/Admin/Admin Dashboard Controller.php?action=v_orders"><i class="fa fa-users" aria-hidden="true"></i>Orders</a></p>
                                    
                                </div>
                            
                                <div class="list">
                                        <ul>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                </div>
                                <button><a href="../App/Controller/Admin/Admin Dashboard Controller.php?action=v_orders"><i class="fa fa-plus" aria-hidden="true"></i>View Orders</a></button>
                            </div>
                    </div>
                
                </div>
        

            </div>    
    </div>
</div>

 