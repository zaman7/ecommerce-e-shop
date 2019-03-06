<?php include "include/header.php" ?>
<?php
	$checkLogin = Session::get("customerLogin");
	if ($checkLogin == false) {
		echo "<script>window.location='login.php';</script>";
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cartId = $_POST['cart_id'];
        $quantity = $_POST['quantity'];
        $upCart = $cart->updateCart($quantity,$cartId);
    }
    if (!isset($_GET['ref_cart'])) {
    	echo "<meta http-equiv='refresh' content='0; URL=?ref_cart=buy_product'/>";
    }
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Company Name">
									<input type="text" placeholder="Email*">
									<input type="text" placeholder="Title">
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						<?php 
							$chekcCart = $cart->checkCartTable();
							if ($chekcCart) {						
								$getCart = $cart->getCartPro();
								if ($getCart) {
									$i= 0;
									$subTotal = 0;
									$qty = 0;
									while ($value = $getCart->fetch_assoc()) {
										$i++;
						?>
						<tr>

							<td class="cart_product">
								<a href=""><img src="admin/<?php echo $value['image'] ?>" alt="" width="100px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="product-details.php?single_product_details=<?php echo $value['productId']; ?>&add-to-cart"><?php echo $value['productName'] ?></a></h4>
								<p>Product Code: <?php echo $value['productCode']; ?></p>
							</td>
							<td class="cart_price">
								<p>$<?php echo $value['price'] ?></p>
							</td>
							<td class="cart_quantity">
								<form action="" method="POST">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + </a>
										<input type="hidden" name="cart_id" value="<?php echo $value['cartId'] ?>">
										<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $value['quantity'] ?>" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
										<input type="submit" name="cat_update" id="cart_update" value="Update">
									</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$
								<?php 
									$totalPrice = $value['price'] * $value['quantity'];
									echo $totalPrice;
									$qty = $qty + $value['quantity'];
									Session::set("quantity", $qty);

								?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="cart.php?delete_cart_item=<?php echo $value['cartId'] ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
						<?php
							$subTotal = $subTotal + $totalPrice;
							$vat = $subTotal*.07;
							$gTotal = $subTotal+$vat;
						?>
						<?php } }else{
							echo "Cart is empty";
						} }else{
							echo "<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error! </strong>Cart is empty please <a href='http://localhost/ecommerce-e-shop/'>shop now!</a><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
						} ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$<?php echo $subTotal; ?></td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$7%</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$<?php echo $gTotal; ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

<?php include "include/footer.php" ?>