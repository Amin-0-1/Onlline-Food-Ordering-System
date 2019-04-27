<?php 
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';     
?>
<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center" style="margin-bottom: 60px"><?php echo $dataPro['Username']?></h1>

                    <div class="container">
                      
                            
                             <div class="wrap-input100 validate-input">
                                 <img src ="" alt="asdf" />
                             </div>

                            <div class="wrap-input100 validate-input m-b-23">
                                <p class="key">ID : </p>
                                <span class="value"><?php echo $dataPro['ID']?></span>
                    
					        </div>
                            
                            <div class="wrap-input100 validate-input">
                                <p class="key">Username : </p>
                                <span class="value"><?php echo $dataPro['Username']?></span>
						      
					       </div>
                            
                            
                            <div class="wrap-input100 validate-input">
                                <p class="key">Password : </p>
                                <span class="value"><?php echo $dataPro['Password']?></span>
					       </div>
                            
                        
                            <div class="wrap-input100 validate-input">
                                 <p class="key">Full Name : </p>
                                <span class="value"><?php echo $dataPro['Fullname']?></span>
						      
					       </div>
                            
                            <div class="wrap-input100 validate-input">
                                 <p class="key">Email : </p>
                                <span class="value"><?php echo $dataPro['Email']?></span>
                              
                           </div>
                           
                            <div class="wrap-input100 validate-input">
                                 <p class="key">Address : </p>
                                <span class="value"><?php echo $dataPro['Address']?></span>
                              
                           </div>

                           <div class="wrap-input100 validate-input">
                                 <p class="key">Phone Number : </p>
                                <span class="value"><?php echo $dataPro['Phone']?></span>
                              
                           </div>


                             <div class="wrap-input100 validate-input">
                                 <p class="key">Active Statue : </p>
                                <span class="value"><?php echo ($dataPro['ActiveState'] == 1 ? "True" : "false") ?></span>
						      
					        </div>
  
                        
                </div>
            </div>
    </div>
</div>
    <?php include '../../Tempelates/footer.php';

?>

