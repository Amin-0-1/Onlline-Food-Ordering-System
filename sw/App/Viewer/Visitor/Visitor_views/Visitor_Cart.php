<?php 
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';


?>

 <div class="container-login100">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">CART</h2>
        <table class="table table-bordered ">
          <thead style="text-aline=center">
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>price</th>
                <th>Control</th>
              </tr>
            </thead>
    
<?php

            include_once "../../Model/Order.php";
            include_once "../../Model/OrderFoodItem.php";
            include_once "../../Model/fooditem.php";

            $order = Order::getOrderID($_SESSION['GroupID']); 
            
            if(empty($order)){
                echo "There is no Orders ....";
                die();
            }else{
                $orderContent = OrderFoodItem::getAllItemOfOrder($order['ID']);
                for ($i = 0; $i < count($orderContent); $i++){
                    $itemData = fooditem::displayItemByID($orderContent[$i]['foodItemID']);
                    
                     echo " 
                        <tr>
                            
                            <td>{$itemData[0][0]}</td>
                            <td>{$orderContent[$i]['foodItemNumber']}</td>
                            <td>{$orderContent[$i]['price']}</td>
                            <td>
                                <a href ='Visitor Manage Cart.php?action=updateOrder&itemNumber={$orderContent[$i]['foodItemNumber']}&itemId={$orderContent[$i]['foodItemID']}'class= 'btn btn-info confirm btn-up'><i class='fa fa-edit'></i> Update</a>

                                <a href ='Visitor Manage Cart.php?action=DeleteItemOrder&Itemid={$orderContent[$i]['foodItemID']}'class= 'btn btn-danger '><i class='fa fa-edit'></i> Delete</a>
                                
                            </td>
                        </tr>
                            ";
                }
                 $total = Order::getPrice($order['ID']);
                 echo "Total : ".$total['TotalPrice'];
            }
           // <a style="color:#fff" href="Visitor Manage Item.php?action=pay_order&orderID={$orderID['ID']}">Pay</a>
?>
        </table>
     
       <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="submit">
                         <?php
                         $orderID = Order::getOrderID($_SESSION['GroupID']);
                          echo " <a style='color:#fff' href='Visitor Manage Cart.php?action=pay_order&orderId={$orderID['ID']}'>Pay</a>";?>
                        </button>

                </div>
        </div>
     </div>
</div>
        
