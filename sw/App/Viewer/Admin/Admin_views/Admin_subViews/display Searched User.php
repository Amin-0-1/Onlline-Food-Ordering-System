<?php
$_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';

?>

      
 <div class="container-login100">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">Users</h2>


        <table class="table table-bordered ">
          <thead style="text-aline=center">
            <tr>
                <th>Username</th>
                <th>Control</th>
              </tr>
            </thead>
    
<?php

         echo " 
            <tr>
                            
                <td>{$result['Username']}</td>
                <td>".($result['ActiveState'] == 0 ?" <a href ='Admin Manage User.php?action=activate&id={$result['ID']} 'class= 'btn btn-info confirm btn-up'><i class='fa fa-edit'></i> Activate User</a>" : " <a href='Admin Manage User.php?action=block&id={$result['ID']}'class='btn btn-danger confirm btn-del'><i class='fa fa-close'></i> Block User</a>")."
                   
    
                    <a href ='Admin Manage User.php?action=display_user&id={$result['ID']}'class= 'btn btn-info confirm btn-up'><i class='fa fa-edit'></i> Display User</a>
                    
                    
                    
                </td>
            </tr>
                ";

        
?>
        </table>
    
     </div>
</div>
        
