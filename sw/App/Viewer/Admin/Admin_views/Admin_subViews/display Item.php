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
                                 <img src ="<?php echo $dataPro['Image']?>" alt="img" />

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
                                <p class="key">Amount : </p>
                                <span class="value"><?php echo $dataPro['Amount']?></span>
						      
					       </div>
                            
                        
                            <div class="wrap-input100 validate-input">
                                 <p class="key">Price : </p>
                                <span class="value"><?php echo $dataPro['Price']?></span>
						      
					       </div>
                            
                            <div class="form-group form-group-lg date">
                                <p class="key">Product Date : </p>
                                <span class="value"><?php echo $day ."/".$month."/".$year ?></span>  
                            </div>
                            <hr>
                        
                            <div class="form-group form-group-lg date">
                                <p class="key">Expire Date : </p>
                                <span class="value"><?php echo $exday ."/".$exmonth."/".$exyear ?></span>
                            </div>
                            <hr>
                            
                            <div class="wrap-input100 validate-input">
                                <p class="key">Visibility Statues : </p> <br>
                                 <?php if ($dataPro['Visibility']==1) {
                                            echo "<input type='radio' name='vis'  checked value = 1> Enable" ;
                                            echo "<input type='radio' name='vis' value = 0 > Disabel " ;
                                        }
                                        else{
                                            echo "<input type='radio' name='vis' value = 1> Enable";
                                            echo "<input type='radio' name='vis'  checked value = > Disabel" ;
                                        }

                                  ?>
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

