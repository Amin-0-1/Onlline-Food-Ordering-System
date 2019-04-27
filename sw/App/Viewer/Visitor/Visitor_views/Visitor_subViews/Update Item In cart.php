<?php 

    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';
         
 
?>
<div class="container-login100">
    <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">Update Number of Item</h2>
        
        <?php

            if(isset($_GET['amount'])){
                if($_GET['amount'] != 0){
                    if($_GET['amount'] <= 10){
                        echo "Sorry !! we have just ".$_GET['amount']." Item";
                    }else{
                        echo "Sorry !! Our Items insufficient";
                    }
                
                }
            }
        ?>


        <table class="table table-bordered ">
          <thead style="text-aline=center">
             <tr>
  
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
               
                <!-- <th>Control</th> -->
            </tr>
          </thead>
          <tbody>
    
    <?php    
        echo " 
        <tr>
            
            <td>{$item[0][0]}</td>
            <td>{$item[0]['Name']}</td>
            <td>{$item[0]['Price']}</td>
            <input type='number' class = 'text-aline' name='quantity' min='1' >
            

        </tr>
            ";
    ?>
       </tbody>
        </table>
            <form class="form-horizontal" action="../../Controller/Visitor/Visitor Manage Cart.php"  method="post">
                            <input type="hidden" name="ItemID" value="<?php echo($item[0]['ID']) ?>" >
                            <!-- start Name field -->
                            
                            <!-- <span class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired"> -->
                                
                                <input class="number" required="required" type="number" min='1' name="number of item"  placeholder="Number of items" pattern="[1-9].{0,}" title="you must define number of item !!">
                                
                            <!-- </span> -->
                  
                            <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit" value="Commit_update">
                                    Submit
                                </button>

                                </div>
                           </div>
                            
                            
                        </form>

    </div>
</div>

<?php
include "../../Tempelates/footer.php";
?>