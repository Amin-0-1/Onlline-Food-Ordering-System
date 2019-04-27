<?php 
    
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';     

?>
<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center" style="margin-bottom: 60px">Search Transaction
                </h1>

                    <div class="container">
                        
                        <form class="form-horizontal" action='../../Controller/Admin/Admin Manage Orders Controller.php' method="post">
                            <input type="hidden" name="ID">
                            <!-- start name field -->
                            
                            <div class="wrap-input100 validate-input m-b-23" data-validate = "Category Name is required">
                                <span class="label-input100" name="number">ID</span>
                                <input class="input100"  required="required" type="number" name="ID"  placeholder="Transaction ID">
					       </div>
                            
                            <!-- End name field -->
                    
                            <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit" value="Search_Transactions2">Search
                                </button>

                                </div>
					       </div>
                            
                        </form>


                        
            </div>
            </div>
    </div>
</div>
