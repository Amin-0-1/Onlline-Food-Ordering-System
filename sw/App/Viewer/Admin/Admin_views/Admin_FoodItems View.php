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
                <th>Id</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Expire </th>
                <!--<th>Description</th>--> 
                <th>Visibility</th>
                <th>Control</th>
            </tr>
          </thead>
          <tbody>
    
<?php
    
        include_once "../../Model/fooditem.php";
         $joindata = fooditem::listFoodItems();
            if(empty($joindata)){
                echo "There is no food Items please try to add some....";
            }else{

            foreach($joindata as $item){
                echo " 
                    <tr>
                        <td>{$item['ID']}</td>
                        <td>{$item['Name']}</td>
                        <td>{$item['Amount']}</td>
                        <td>{$item['Price']}</td>
                        <td>{$item['ExpireDate']}</td> 
                        <td>".(($item['Visibility']==1)? "True":"False")."</td>
                        <td>
                            <a href ='../../Controller/Admin/Admin Manage Item.php?action=update&id={$item['ID']}' class= 'btn btn-info confirm btn-up'><i class='fa fa-edit'></i> Update</a>
                            
                            <a href='../../Controller/Admin/Admin Manage Item.php?action=delete&id={$item['ID']}' class='btn btn-danger confirm btn-del'><i class='fa fa-close'></i> Delete</a>
                            
                            <a href ='../../Controller/Admin/Admin Manage Item.php?page=display&action=display&id={$item['ID']}' class = 'btn btn-info confirm btn-up'> <i class='fa fa-eye' aria-hidden='true'></i> Display</a>
                        </td>
                    </tr>
                        ";
            }
      }
?>
       </tbody>
        </table>
        
        <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="submit">
                            <a style="color:#fff" href="Admin Manage Item.php?action=add item">Add New Item</a>
                        </button>

                </div>
        </div>
        
    </div>
</div>

<?php
include "../../Tempelates/footer.php";
?>