<?php include "include/header.php" ?>
<?php
	$checkLogin = Session::get("customerLogin");
	if ($checkLogin == false) {
		echo "<script>window.location='login.php';</script>";
	}
?>
<?php 
	if (!isset($_GET['user_account']) OR $_GET['user_account'] == NULL ) {
        echo "<script>window.location='login.php';</script>";
    }
    else{
        $customersId = $_GET['user_account'];
		$getData = $cstmr->getCustomerProfile($customersId);
    }

?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="signup-form"><!--sign up form-->
						<h2>User Profiel!</h2>
						<table class="table table-striped">
							<?php if ($getData) {
								while($value = $getData->fetch_assoc()){
							?>
							<tr>
								<th>Name:</th>
								<td><?php echo $value['customersName'] ?></td>
							</tr>
							<tr>
								<th>Email:</th>
								<td><?php echo $value['customersEmail'] ?></td>
							</tr>
							<tr>
								<th>Phone:</th>
								<td><?php echo $value['phoneNumber'] ?></td>
							</tr>
							<tr>
								<th>City:</th>
								<td><?php echo $value['city'] ?></td>
							</tr>
							<tr>
								<th>Address:</th>
								<td><?php echo $value['address'] ?></td>
							</tr>
							<?php } } ?>
						</table>
						<a href="#" class="btn btn-primary">Edit Profile</a>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<!-- 	<script>
	window.oncontextmenu = function () {
				return false;
			}
			$(document).keydown(function (event) {
				if (event.keyCode == 123) {
					return false;
				}
				else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
					return false;
				}
			});
		</script>
 -->
<?php include "include/footer.php" ?>