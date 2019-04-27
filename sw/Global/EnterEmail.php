<?php 
  $_SESSION['url'] = '../';
    $_SESSION['logout'] = '../../../Global/';
    include '../Tempelates/header.php';
 
?>

<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center" style="margin-bottom: 60px">Recover Your password
                </h1>

                    <div class="container">
                        
                        <form class="form-horizontal" action='../Controller/LoginController.php' method="post">
                            <input type="hidden" name="ID">
                            <!-- start name field -->
                            <?php

                                if(isset($_GET['msg']) And $_GET['msg'] == 'notexist'){
                                    echo "User Not Found";
                                }
                                if(isset($_GET['msg']) And $_GET['msg'] == 'message has been sent right now check your Gmail'){
                                    echo $_GET['msg'];
                                }

                            ?>

                            <div class="wrap-input100 validate-input m-b-23" data-validate = "Category Name is required">
                                <input class="input100"  required="required" type="Email" name="Email"  placeholder="Type in Your Email Address">
					       </div>
                            <!-- End name field -->
                    
                            <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit" value="recover_email">submit
                                </button>

                                </div>
					       </div>
                            
                        </form>


                        
            </div>
            </div>
    </div>
</div>
