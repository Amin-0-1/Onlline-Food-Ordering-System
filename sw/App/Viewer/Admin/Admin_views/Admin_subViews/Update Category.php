<?php 
    
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';     

?>
<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center" style="margin-bottom: 60px">Update Category
                </h1>

                    <div class="container">
                        
                        <form class="form-horizontal" action='../../Controller/Admin/Admin Manage Category.php' method="post">
                            <input type="hidden" name="ID" value="<?php echo $data['ID']?>">
                            <!-- start name field -->
                            
                            <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                                <span class="label-input100" required="required" name="name">name</span>
                                <input class="input100" type="text" name="name"  placeholder="Type name of product" value="<?php echo $data['Name']?>" >
                                
					       </div>
                            
                            <!-- End name field -->
                    
                            <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit">
                                    <input class="inpt" name="submit" value="Edit" >
                                </button>

                                </div>
					       </div>
                            
                            </form>


                        
            </div>
            </div>
    </div>
</div>
