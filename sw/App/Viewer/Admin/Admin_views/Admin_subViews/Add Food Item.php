<?php
    $_SESSION['url'] = '../..';
    $_SESSION['logout'] = '../../../Global/';
    include '../../Tempelates/header.php';
    include '../../Tempelates/navbar.php';     

?>
<div class="limiter">
    
		<div class="container-login100">
            <div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <h1 class="text-center">Add New Item</h1>

                    <div class="container">
                        
                        <form class="form-horizontal" action="../../Controller/Admin/Admin Manage Item.php"  method="post">
                            <input type="hidden" name="ID" >
                            <!-- start Name field -->
                            
                            <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                                <span class="label-input100"  name="username">Name</span>
                                <input class="input100" required="required" type="text" name="name"  placeholder="Type Name" pattern="[[A-Za-z].{2,}" title="Contains only characters not less than 3">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
					       </div>
                            <!-- End Name field -->
                            <!-- start Amount field -->
                            <div class="wrap-input100 validate-input " data-validate="Password is required">
				              <span class="label-input100">Amount</span>
						      <input class="input100" required="required" type="text" name="amount" placeholder="Type Amount" pattern="[1-9].{0,}" title="Must Be only Numbers ">
						      <span class="focus-input100" data-symbol="&#xf190;"></span>
					       </div>
                            
                         
                            <!-- End Amount field -->
                            <!-- start Categories field -->
                            <div class="form-group form-group-lg date">
				              <span class="label-input100">Category Name</span>
						      <select class="form-control disCat" name="catid" required>
                                    <option value="">...</option>
                                    
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
						      <input class="input100" required="required" type="text"  name="price" placeholder="Type price for unit of item" pattern="[1-9].{1,}" title="Must Be only Numbers not less than one">
						      
					       </div>
                            
                           
                            <!-- End Price field -->
                             <!-- start ProductDate field -->
                            <div class="form-group form-group-lg date">
                                <span class="label-input100">ProductDate</span>
                                <div class="col-sm-10" style="padding: 0;overflow: hidden;margin-top: 10px;">
                                    <div class="day">
                                        <select class="form-control" style="padding: 0px" name="day">
                                       <?php
                                            for($i=1,$j=1;i<=31,$j<=31;$i++,$j++){
                                               echo "<option value='$i'>".$j."</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="month">
                                        <select class="form-control" name="month">
                                       <?php
                                            for($i=1,$j=1;i<=12,$j<=12;$i++,$j++){
                                               echo "<option value='$i'>".$j."</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                    <div class=" year">
                                        <select class="form-control" name="year">
                                       <?php
                                            for($i=2019,$j=2019;i<=1958,$j>=1958;$i--,$j--){
                                               echo "<option value='$i'>".$j."</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <!-- End ProductDate field -->
                            
                             <!-- start ExpireDate field -->
                            <div class="form-group form-group-lg date">
                                <span class="label-input100">ExpireDate</span>
                                <div class="col-sm-10" style="padding: 0;overflow: hidden;margin-top: 10px;">
                                    <div class="day">
                                        <select class="form-control" style="padding: 0px" name="exday">
                                       <?php
                                            for($i=1,$j=1;i<=31,$j<=31;$i++,$j++){
                                               echo "<option value='$i'>".$j."</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="month">
                                        <select class="form-control" name="exmonth">
                                       <?php
                                            for($i=1,$j=1;i<=12,$j<=12;$i++,$j++){
                                               echo "<option value='$i'>".$j."</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                    <div class=" year">
                                        <select class="form-control" name="exyear">
                                       <?php
                                            for($i=2050,$j=2050;i<=2019,$j>=2019;$i--,$j--){
                                               echo "<option value='$i'>".$j."</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <!-- End ExpireDate field -->
                            
                            <!-- start productimg field -->
                        
                            <div class="wrap-input100 validate-input">
				              <span class="label-input100">Item Image</span>
						      <input class="input100" type="file" name="image">
						      
					       </div>
                            <!-- End productimg field -->

                             <!-- start Description field -->
                            
                             <div class="wrap-input100 validate-input">
				              <span class="label-input100">Description</span>
						      <input class="input100" required="required" type="text"  name="desc" placeholder="Type Description" >
						      
					       </div>
                            <!-- End Description field -->                             
                             <div>
                                <span>Visibility :</span>

                                    <input type='radio' name='vis' value = 1 required=""> Enable
                                    <input type='radio' name='vis' value = 0 > Disabel

                            </div>
                                <br>
                            <div class="container-login100-form-btn">
                              <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="submit">
                                    <input class="inpt" name="submit"   value="Add" >
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