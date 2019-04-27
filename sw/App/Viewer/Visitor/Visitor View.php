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
                                <p><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_category"><i class="fa fa-tasks" aria-hidden="true"></i>Menue</a> </p>
                            
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
                                    <button><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_category"><i class="fa fa-eye" aria-hidden="true"></i>Menue</a></button>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="title">
                                    <p><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_item"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Food Items</a></p>
                            
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
                                        <button><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_item"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Food Items</a></button>
                            </div>   
                        </div>
                    
                </div>
            
                    <br></br>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="box">
                                <div class="title">
                                    <p><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>View Cart</a></p>
                            
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
                                <button><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</a></button>
                        </div>   
                    </div>
                    
                    <div class="col-md-6">
                           <div class="box2">
                                <div class="title">
                                    <p><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_Orders"><i class="fa fa-automobile" aria-hidden="true"></i>Orders</a></p>
                                    
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
                                <button><a href="../App/Controller/Visitor/Visitor Dashboard Controller.php?action=v_Orders"><i class="fa fa-automobile" aria-hidden="true"></i>View Orders</a></button>
                            </div>                                                                                             
                    </div>
                
                </div>
        

            </div>    
    </div>
</div>

 