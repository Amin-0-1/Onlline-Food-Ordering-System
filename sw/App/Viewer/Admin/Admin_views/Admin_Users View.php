<?php
$_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';

?>

      
 <div class="container-login100">
    <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">Users</h2>

        <!-- search User Section-->
         <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn" name="submit">
                        <a style="color:#fff" href="Admin Manage User.php?page=Manageuser&action=search_user">Search User</a>
                    </button>

            </div>
        </div>
        <!-- end search User Section-->

        <table class="table table-bordered ">
          <thead style="text-aline=center">
            <tr>
                <th>Username</th>
                <th>Control</th>
              </tr>
            </thead>
    
<?php
            include_once "../../Model/Admin.php";
            $tableName = "users";
            $SecDataDisplay = Admin::DisplayAllUsers($tableName);
          
            if(empty($SecDataDisplay)){
                echo "There is no users ....";
            }else{
                for ($i = 0; $i < count($SecDataDisplay); $i++){
                     echo " 
                        <tr>
                            
                            <td>{$SecDataDisplay[$i]['Username']}</td>
                            <td>".($SecDataDisplay[$i]['ActiveState'] == 0 ?" <a href ='Admin Manage User.php?action=activate&id={$SecDataDisplay[$i]['ID']} 'class= 'btn btn-success'><i class='fa fa-edit'></i> Activate User</a>" : " <a href='Admin Manage User.php?action=block&id={$SecDataDisplay[$i]['ID']}'class='btn btn-secondary'><i class='fa fa-close'></i> Block User</a>")."
                               
                
                                <a href ='Admin Manage User.php?action=display_user&id={$SecDataDisplay[$i]['ID']}'class= 'btn btn-primary'><i class='fa fa-edit'></i> Display User</a>
                                
                                
                                
                            </td>
                        </tr>
                            ";
                }
            }
?>
        </table>
    
     </div>
</div>
        
