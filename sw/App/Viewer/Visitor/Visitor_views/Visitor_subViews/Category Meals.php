<?php 
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';
         

?>
<div class="container-login100">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">Food Items</h2>
        <table class="table table-bordered ">
          <thead style="text-aline=center">
             <tr>
  
                <th>Name</th>
                
                <th>Price</th>
               
                <th>Control</th>
            </tr>
          </thead>
          <tbody>
    
    <?php
    
            if(empty($data)){
                echo "There is no food Items please try to add some....";
            }else{
              
            foreach($data as $item){
                echo " 
                    <tr>
                        
                        <td>{$item['Name']}</td>
                        
                        <td>{$item['Price']}</td>
                        
                        
                        <td>                            
                            <a href ='../../Controller/Visitor/Visitor Manage Item.php?page=display&action=display&id={$item['ID']}' class = 'btn btn-info confirm btn-up'> <i class='fa fa-eye' aria-hidden='true'></i> Display</a>
                            <a href ='../../Controller/Visitor/Visitor Manage Item.php?action=add_to_cart&id={$item['ID']}' class = 'btn btn-info confirm btn-up'> <i class='fa fa-plus' aria-hidden='true'></i> Add To Cart</a>
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