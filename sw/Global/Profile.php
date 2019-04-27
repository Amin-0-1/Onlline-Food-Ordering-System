<?php 
    
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';
         

?>
<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center">Update Profile</h1>

                    <div class="container">
                        
                        <form class="form-horizontal" action="../Admin/Admin Dashboard Controller.php" method="post">
                            <input type="hidden" name="ID" value="<?php echo $date['ID']?>">
                            <!-- start Username field -->
                            
                            <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                                <span class="label-input100" required="required" name="username">Username</span>
                                <input class="input100" type="text" name="username" value="<?php echo $date['Username']?>" placeholder="Type your username">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
					       </div>
                            <!-- End Username field -->
                            <!-- start Password field -->
                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input type="hidden" name="oldpassword" value="<?php echo $date['Password']?>">
				              <span class="label-input100">Password</span>
						      <input class="input100" type="password" name="newpassword" placeholder="Type your password">
						      <span class="focus-input100" data-symbol="&#xf191;"></span>
					       </div>
                            
                         
                            <!-- End Password field -->
                            <!-- start Fullname field -->
                            <div class="wrap-input100 validate-input">
				              <span class="label-input100">Fullname</span>
						      <input class="input100" type="text"  name="fullname" placeholder="Type Full Name" value="<?php echo $date['Fullname']?>">
						      <span class="focus-input100" data-symbol="&#xf207;"></span>
					       </div>
                            
                          
                            <!-- End Fullname field -->
                            <!-- start Email field -->
                            <div class="wrap-input100 validate-input">
				              <span class="label-input100">Email</span>
						      <input class="input100" type="email"  name="email" placeholder="Type Emial" value="<?php echo $date['Email']?>">
						      <span class="focus-input100" data-symbol="&#xf200;"></span>
					       </div>
                            
                           
                            <!-- End Email field -->
                           

                            <!-- start UserImg field -->
                        
                            <div class="wrap-input100 validate-input">
				              <span class="label-input100">User Image</span>
						      <input class="input100" type="image src = '../pic.jpg' ">
                         
						      <span class="focus-input100" data-symbol="&#xf205;"></span>
					       </div>
                            <!-- End UserImg field -->

                             <!-- start Username field -->
                            
                             <div class="wrap-input100 validate-input">
				              <span class="label-input100">Phone</span>
						      <input class="input100" type="text"  name="phone" placeholder="Type Phone" value="<?php echo $date['Phone']?>">
						      <span class="focus-input100" data-symbol="&#xf2c8;"></span>
					       </div>
                            <!-- End Username field -->
                            <!-- start Username field -->
                        
                            <div class="wrap-input100 validate-input">
				              <span class="label-input100">ِAdress</span>
						      <input class="input100" type="text"  name="address" placeholder="Type Adress" value="<?php echo $date['Address']?>">
						      <span class="focus-input100" data-symbol="&#xf204;"></span>
					       </div>
                            <!-- End Username field -->


                            <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit">
                                     <input  class = "inpt" name = "submit" value="Edit profile" formatmethod = "post">
                                </button>
                                </div>
					       </div>
                    </form>

            </div>
    </div>
</div>

    <?php include '../../Tempelates/footer.php';

?>

