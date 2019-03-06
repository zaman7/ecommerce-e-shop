<?php include "include/header.php" ?>
<?php
	$checkLogin = Session::get("customerLogin");
	if ($checkLogin == true) {
		echo "<script>window.location='checkout.php';</script>";
	}
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_reg'])) {
        $customersReg = $cstmr->customersRegister($_POST);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $customersEmail = $_POST['customersEmail'];
        $password = $_POST['password'];
        $login = $cstmr->customersLogin($customersEmail, $password);
    }
?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<?php if (isset($login)) {
			        	echo $login;
			        } ?>
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#" method="POST">
							<input type="email" name="customersEmail" placeholder="Email" />
							<input type="password" name="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default" name="login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<?php if (isset($customersReg)) {
				        	echo $customersReg;
				        } ?>
						<h2>New User Signup!</h2>
						<form action="#" method="POST">
							<input type="text" name="customersName" placeholder="Name"/>
							<input type="email" name="customersEmail" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="text" name="phoneNumber" placeholder="Phone Number" value="+88" />
							<input type="text" name="city" placeholder="City"/>
							<input type="text" name="address" placeholder="Address"/>
							<button type="submit" class="btn btn-default" name="user_reg">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

<?php include "include/footer.php" ?>