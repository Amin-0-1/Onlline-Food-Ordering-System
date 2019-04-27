<?php
session_start();
$_SESSION['url'] = '../../app';
include "../Tempelates/header.php";


?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap2-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="register-form validate-form" action="../Controller/RegisterController.php" method="post">
					
					<span class="login100-form-title p-b-49">
						Register
					</span>
					
							<?php if(isset($_GET['msg'])){
								echo $_GET['msg'];
								} 
							?>
					<div class="wrap-input100 validate-input" data-validate = "FullName is reauired">
						<span class="label-input100" name="fullName">Full Name</span>
						<input class="input100" required="required" type="text" name="fullName" placeholder="Type your Full Name" pattern="[A-Za-z].{5,}" title="at leaset 5 letters with Your name">
						<span class="focus-input100" data-symbol="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Email is reauired">
						<span class="label-input100" name="email">Email</span>
						<input class="input100" required="required" type="Email" name="email" placeholder="Type your Email Address">
						<span class="focus-input100" data-symbol="&#xf200;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" required="required" name="password" placeholder="Type your password" pattern="[A-Za-z1-9]{5,}" title="5 or more characters for password">
						<span class="focus-input100" data-symbol="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is reauired">
						<span class="label-input100" name="username" >Username</span>
						<input class="input100" required="required"   type="text" name="username" placeholder="Type your username "pattern="[A-Za-z1-9]{4,15}" title="at leaset 4 characters but not more than 15" >
						<span class="focus-input100" data-symbol="&#xf205;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="address" required="required" name="address" placeholder="Type your Address">
						<span class="focus-input100" data-symbol="&#xf204;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="phone is required">
						<span class="label-input100">Phone No.</span>
						<input class="input100" type="phone" required="required" name="phone" placeholder="Type your Phone Number"pattern="[0-9]{7,11}" title="7 numbers for landline or 11 for a mobile">
						<span class="focus-input100" data-symbol="&#xf2c8;"></span>


					</div>
					<br>	
					
				</tr>
					<div class="text-right p-t-8 p-b-31">
							
						<a href="../../App/Controller/LoginController.php?action=forget"> <!-- phpmailer to send new password-->
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								<input class="inpt" name="submit"   value="Register" >
							</button>
                            
						</div>
					</div>



					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
						<div class="txt1 text-center p-t-54 p-b-20">
							<span>
								<a href="../../Global/Login View.php" class="txt2">
								Login
								</a>
							</span>
							
						</div>
				</form>
			</div>
		</div>
	</div>