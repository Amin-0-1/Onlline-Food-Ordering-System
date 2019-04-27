<?php 
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';


?>

 <div class="container-login100">
    <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">Order <?php echo $orderData[0]['ID']?></h2>
        <table class="table table-bordered ">
          <thead style="text-aline=center">
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>price</th>
                
              </tr>
            </thead>
    
<?php

            include_once "../../Model/Order.php";
            include_once "../../Model/OrderFoodItem.php";
            include_once "../../Model/fooditem.php";

            for ($i = 0; $i < count($orderItems); $i++){
                $itemData = fooditem::displayItemByID($orderItems[$i]['foodItemID']);  
                 echo " 
                    <tr>
                        
                        <td>{$itemData[0][0]}</td>
                        <td>{$orderItems[$i]['foodItemNumber']}</td>
                        <td>{$orderItems[$i]['price']}</td>
    
                    </tr>
                        ";
            }

         
?>
        </table>
      
     </div>
</div>
        
