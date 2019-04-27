<?php 
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';
         

?>
<div class="container-login100">
    <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">Pending Orders</h2>
        <table class="table table-bordered ">
          <thead style="text-aline=center">

             <tr>
                <th>Statues</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Control</th>
            </tr>
          </thead>
          <tbody>
    
<?php
    

            if(empty($orderData)){
                echo "There is no Pending Orders....";
                
            }else{

            foreach($orderData as $item){
                echo " 
                    <tr>
                        <td>{$item['statues']}</td>
                        <td>{$item['TotalPrice']}</td>
                        <td>{$item['date']}</td>
                        <td>
                            <a href ='Visitor Manage Orders controller.php?&action=displayOrder&id={$item['ID']}' class = 'btn btn-info confirm btn-up'> <i class='fa fa-eye' aria-hidden='true'></i> Display</a>
                           
                        </td>
                    </tr>
                        ";
            }
      }
?>
       </tbody>
        </table>

        
    </div>
</div>

<?php
include "../../Tempelates/footer.php";
?>