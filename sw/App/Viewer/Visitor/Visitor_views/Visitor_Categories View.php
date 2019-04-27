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
                <th>Name</th>
                <th>Control</th>
              </tr>
            </thead>
    
<?php
            include_once "../../Model/Category.php";
            $tableName = "categories";
            $SecDataDisplay = Category::listCategories($tableName);
            if(empty($SecDataDisplay)){
                echo "There is no Categories ....";
            }else{
                for ($i = 0; $i < count($SecDataDisplay); $i++){
                     echo " 
                        <tr>
                            
                            <td>{$SecDataDisplay[$i]['Name']}</td>
                            <td>
                                <a href ='Visitor Manage Item.php?action=getIntersectMeals&id={$SecDataDisplay[$i]['ID']}'class= 'btn btn-info confirm btn-up'><i class='fa fa-edit'></i> Meals</a>
                                
                            </td>
                        </tr>
                            ";
                }
            }
?>
        </table>
        
        
       <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="submit">
                            <a style="color:#fff" href="Visitor Manage Item.php?action=search_category">Search Category</a>
                        </button>

                </div>
        </div>
     </div>
</div>
        
