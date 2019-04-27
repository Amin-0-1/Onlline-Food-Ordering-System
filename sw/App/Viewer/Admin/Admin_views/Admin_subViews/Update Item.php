<?php
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';     

?>
<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center">Update Item</h1>

                    <div class="container">
                        
                        <form class="form-horizontal" action="../../Controller/Admin/Admin Manage Item.php" method="post">
                            <input type="hidden" name="ID" value="<?php echo $dataPro['ID']?>">
                            <!-- start Name field -->
                            
                            <div class="wrap-input100 validate-input m-b-23" data-validate = "Name is reauired">
                                <span class="label-input100"  name="username">Name</span>
                                <input class="input100" required="required" type="text" name="name" pattern="[[A-Za-z].{2,}" title="Contains only characters not less than 3" placeholder="Type Name" value="<?php echo $dataPro['Name']?>">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
					       </div>
                            <!-- End Name field -->
                            <!-- start Amount field -->
                            <div class="wrap-input100 validate-input " data-validate="Amount is required">
				              <span class="label-input100">Amount</span>
						      <input class="input100" required="required" type="text" name="amount" pattern="[1-9].{0,}" title="Must Be only Numbers " placeholder="Type Amount" value="<?php echo $dataPro['Amount'];?>">
						      <span class="focus-input100" data-symbol="&#xf190;"></span>
					       </div>
                            
                         
                            <!-- End Amount field -->
                            <!-- start Categories field -->
                            <div class="form-group form-group-lg date">
				              <span class="label-input100">Category Name</span>
						      <select class="form-control disCat" required name="catid">
                                        <option value="<?=$dataPro['CATID'];?>" ><?php echo $dataPro['Catigiories'];?></option>
                                        
                                    <?php
            
                                        foreach($catdata as $cat){
                                            
                                            echo "<option value='".$cat['ID']."'>".$cat['Name']."</option>";
                                        }
            
                                    ?>
                                </select>
						      
					       </div>
                            
                          
                            <!-- End categories field -->
                            <!-- start Price field -->
                            <div class="wrap-input100 validate-input">
				              <span class="label-input100">Price</span>
						      <input class="input100" required="required" type="text"  name="price" placeholder="Price pre Unit" pattern="[1-9].{1,}" title="Must Be only Numbers not less than one" value="<?php echo $dataPro['Price']?>">
						      
					       </div>
                            
                           
                            <!-- End Price field -->

                             <!-- start brithday field -->
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label">ProductDate</label>
                                    <div class="col-sm-10 col-md-6 date">
                                        <div class="day">
                                            <select class="form-control" name="day1">
                                           <?php
                                                
                                                for($i=01,$j=01;i<=31,$j<=31;$i++,$j++){
                                                    
                                                    
                                                    echo "<option value='".$i."'";
                                                    if($j == $day){echo ' selected';}
                                                    echo   ">".$j."</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="month">
                                            <select class="form-control" name="month1">
                                           <?php
                                                for($i=1,$j=1;i<=12,$j<=12;$i++,$j++){
                                                   echo "<option value='".$i."'";
                                                    if($j == $month){echo 'selected';}
                                                    echo   ">".$j."</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="year">
                                            <select class="form-control" name="year1">
                                           <?php
                                                for($i=2019,$j=2019;i<=1958,$j>=1958;$i--,$j--){
                                                   echo "<option value='".$i."'";
                                                    if($j == $year){echo 'selected';}
                                                    echo   ">".$j."</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End brithday field -->
                            
                             <!-- start ExpireDate field -->
                            <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label">ExpireDate</label>
                                    <div class="col-sm-10 col-md-6 date">
                                        <div class="day">
                                            <select class="form-control" name="day2">
                                           <?php
                                                
                                                for($i=01,$j=01;i<=31,$j<=31;$i++,$j++){
                                                    
                                                    
                                                    echo "<option value='".$i."'";
                                                    if($j == $exday){echo 'selected';}
                                                    echo   ">".$j."</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="month">
                                            <select class="form-control" name="month2">
                                           <?php
                                                for($i=1,$j=1;i<=12,$j<=12;$i++,$j++){
                                                   echo "<option value='".$i."'";
                                                    if($j == $exmonth){echo 'selected';}
                                                    echo   ">".$j."</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="year">
                                            <select class="form-control" name="year2">
                                           <?php
                                                for($i=2050,$j=2050;i<=2019,$j>=2019;$i--,$j--){
                                                   echo "<option value='".$i."'";
                                                    if($j == $exyear){echo 'selected';}
                                                    echo   ">".$j."</option>";
                                                }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            <!-- End ExpireDate field -->
                            
                            <!-- start productimg field -->
                        
                            <div class="wrap-input100 validate-input">
				              <span class="label-input100 ">Image</span>
						      <input class="input100" type="image" name="productimg" value="<?php echo $dataPro['Image']?>">
						      
					       </div>
                            <!-- End productimg field -->

                             <!-- start Description field -->
                            
                             <div class="wrap-input100 validate-input">
				              <span class="label-input100">Description</span>
						      <input class="input100" required="required" type="text"  name="desc" placeholder="Type Description" value="<?php echo $dataPro['Description']?>">
						      
					       </div>
                            <!-- End Description field -->                             
                            <div>
                                <span>Visibility :</span>
                                    
                                    <?php if ($dataPro['Visibility']==1) {
                                                echo "<input type='radio' name='vis'  checked value = 1> Enable" ;
                                                echo "<input type='radio' name='vis' value = 0 > Disabel" ;
                                            }
                                            else{
                                                echo "<input type='radio' name='vis' value = 1> Enable";
                                                echo "<input type='radio' name='vis'  checked value = > Disabel" ;
                                            }

                                    ?>

                                
                            </div>
                            <br>
                            <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit">
                                    <input class="inpt" name="submit"   value="Edit" >
                                </button>

                                </div>
					       </div>
                            
                            
                        </form>
                        
            </div>
            </div>
    </div>
</div>
    <?php include '../../Tempelates/footer.php';

?>