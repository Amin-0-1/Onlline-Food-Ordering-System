<?php 
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';
         

?>

 <div class="container-login100">
    <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54 ">
        <h2 class="headcash">Category</h2>
        <table class="table table-bordered ">
          <thead style="text-aline=center">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Control</th>
              </tr>
            </thead>
    
<?php
            include_once "../../Model/Category.php";
            $SecDataDisplay = Category::listCategories($tableName);
            if(empty($SecDataDisplay)){
                echo "There is no Categories ....";
            }else{
                
                     echo " 
                        <tr>
                            <td>{$result['ID']}</td>
                            <td>{$result['Name']}</td>
                            <td>
                                <a href='Admin Manage Category.php?action=delete&id={$result['ID']}'class='btn btn-danger confirm btn-del'><i class='fa fa-close'></i> Delete</a>
                                
                                <a href ='Admin Manage Category.php?page=updateCategory&action=update&id={$result['ID']}'class= 'btn btn-info confirm btn-up'><i class='fa fa-edit'></i> Update</a>
                                
                                <a href ='Admin Manage Category.php?action=getIntersectMeals&id={$result['ID']}'class= 'btn btn-info confirm btn-up'><i class='fa fa-edit'></i> Meals</a>
                                
                            </td>
                        </tr>
                            ";
                
            }
?>
        </table>
        
     </div>
</div>
        
