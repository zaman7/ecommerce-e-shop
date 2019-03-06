<?php include "include/header.php" ?>
<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cartId = $_POST['cart_id'];
        $quantity = $_POST['quantity'];
        $upCart = $cart->updateCart($quantity,$cartId);
    }
    else if (isset($_GET['delete_cart_item'])) {
         $del_cart = $_GET['delete_cart_item'];
         $delCartItem= $cart->delCart($del_cart);
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
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php if (isset($upCart)) {
					echo $upCart;
				}else if (isset($delCartItem)) {
					echo $delCartItem;
				} ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td width="15%" class="image">Item</td>
							<td width="35%" class="description"></td>
							<td width="10%" class="price">Price</td>
							<td width="20%" class="quantity">Quantity</td>
							<td width="10%" class="total">Total</td>
							<td width="10%">Action</td>
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
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php echo $subTotal; ?></span></li>
							<li>Eco Tax <span>$7%</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$<?php echo $gTotal; ?></span></li>
						</ul>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
<script type="text/javascript">

</script>
<?php include "include/footer.php" ?>