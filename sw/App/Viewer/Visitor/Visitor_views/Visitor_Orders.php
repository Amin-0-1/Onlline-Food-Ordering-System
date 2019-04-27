<?php
if(!isset($_SESSION)){
    header('Location:../../../Global/redirect.php');
}

$_SESSION['url'] = '../../../App';
$_SESSION['logout'] = '../../../Global/';
include "../../../App/Tempelates/header.php";
include "../../../App/Tempelates/navbar.php"
?>

<div class="container-login100">
    <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <div class="table">
            
                <div class="row">
                    <div class="col-md-6">
                       <div class="box2">
                            <div class="title">
                                <p><a href="Visitor Manage Orders Controller.php?action=v_CurrentOrders"><i class="fa fa-tasks" aria-hidden="true"></i>Pending Orders</a></p>
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
                                    <button><a href="Visitor Manage Orders Controller.php?action=v_CurrentOrders"><i class="fa fa-tasks" aria-hidden="true"></i>Orders</a></button>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="title">
                                    <p><a href="Visitor Manage Orders Controller.php?action=v_transactions"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Previous Transactions</a></p>
                            
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
                                        <button><a href="Visitor Manage Orders Controller.php?action=v_transactions"><i class="fa fa-eye" aria-hidden="true"></i>Transactions</a></button>
                            </div>   
                        </div>
                    </div>
                <br></br>
            </div>    
    </div>
</div>

 