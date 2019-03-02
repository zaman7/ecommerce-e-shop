	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<?php 
				$getCategory = $cat->getAllCat();
				if ($getCategory) {
					while ($value = $getCategory->fetch_assoc()) {

	        ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="productby-category.php?products_by_category=<?php echo $value['categoryId']; ?>&show_products"><?php echo $value['category']; ?></a></h4>
				</div>
			</div>
		<?php } }else{ ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">No Category</a></h4>
				</div>
			</div>
		<?php } ?>
			
		</div><!--/category-products-->

		<div class="brands_products"><!--brands_products-->
			<h2>Brands</h2>
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					<?php 
	                    $showBrand = $brand->getAllBrand();
	                    if ($showBrand) {
	                        while ($brandValue = $showBrand->fetch_assoc()) {
	                    
	                ?>
					<li><a href="productby-brand.php?products_by_brand=<?php echo $brandValue['brandId']; ?>&show_products"> <span class="pull-right">(50)</span><?php echo $brandValue['brandName']; ?></a></li>
					<?php } }else{ ?>
					<li><a href="#"> <span class="pull-right">(0)</span>No Brand</a></li>
					<?php } ?>
				</ul>
			</div>
		</div><!--/brands_products-->
		
		<div class="price-range"><!--price-range-->
			<h2>Price Range</h2>
			<div class="well text-center">
				 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
				 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
			</div>
		</div><!--/price-range-->
		
		<!-- <div class="shipping text-center">
			<img src="images/home/shipping.jpg" alt="" />
		</div> -->
	</div>