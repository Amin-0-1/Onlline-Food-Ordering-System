<?php 
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';     
?>
<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center" style="margin-bottom: 60px">Meal <?php echo $dataPro['Name']?></h1>

                    <div class="container">
                      
                            
                             <div class="wrap-input100 validate-input">
                                 <img src ="" alt="asdf" />
                             </div>

                             <div class="wrap-input100 validate-input">
                                <p class="key">Category : </p>
                                <span class="value"><?php echo $dataPro['Catigiories']?></span>
                           </div>

                            <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                                <p class="key">Name : </p>
                                <span class="value"><?php echo $dataPro['Name']?></span>
                    
					       </div>
                            
                        
                            <div class="wrap-input100 validate-input">
                                 <p class="key">Price : </p>
                                <span class="value"><?php echo $dataPro['Price']?></span>
						      
					       </div>
                           
                             <div class="wrap-input100 validate-input">
                                 <p class="key">Description : </p>
                                <span class="value"><?php echo $dataPro['Description']?></span>
						      
					        </div>
  
                        
                </div>
            </div>
    </div>
</div>
    <?php include '../../Tempelates/footer.php';

?>

