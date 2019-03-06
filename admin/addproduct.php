<?php include "include/header.php"; ?>
<?php $pro = new Products(); ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $addProduct = $pro->insartProduct($_POST, $_FILES);
    }
?>

    <section class="main-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-lg-2 col-sm-4 col-xs-12 padding-right15">
                    <?php include "include/sidebar.php" ?>
                </div>

                <div class="col-md-9 col-lg-10 col-sm-8 col-xs-12 padding-left15">
                    <div class="main-content">
                        <div class="display-flax-content">
                            <div class="section-title">
                                <h2>New Product</h2>
                            </div>
                            <div class="addpost">
                                <?php
                                 if (isset($addProduct)) {
                                    echo $addProduct;
                                } ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="title">Product Name:</label>
                                        <input type="text" name="product_title" placeholder="Enter Product Name..." id="post-title" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <select id="selectmenu" name="categoryId">
                                            <option selected="selected">Select One</option>
                                        <?php 
                                            $getCat = $pro->getAllCategory();
                                            if ($getCat) {
                                                while ($catValue = $getCat->fetch_assoc()) {
                                            
                                        ?>
                                        <option value="<?php echo $catValue['categoryId'] ?>"><?php echo $catValue["category"]; ?></option>
                                    <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Brand Name:</label>
                                        <select id="selectBrand" name="brand_id">
                                            <option selected="selected">Select One</option>
                                            <?php 
                                            $getBrand = $pro->getAllBrandName();
                                            if ($getBrand) {
                                                while ($brandValue = $getBrand->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $brandValue['brandId']; ?>"><?php echo $brandValue["brandName"]; ?></option>

                                    <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="file">Product Image:</label>
                                        <input type="file" id="file" name="image" />
                                    </div>

                                    <div class="form-group">
                                        <label for="product-code" >Product Code:</label>
                                        <input type="text" name="productCode" id="product-code" class="form-control" placeholder="Product Code" />
                                    </div>

                                    <div class="form-group">
                                        <label for="price" >Price:</label>
                                        <input type="text" id="price" name="price" class="form-control" placeholder="Price" />
                                    </div>

                                    <div class="form-group">
                                        <label>Product Details:</label>
                                        <textarea name="products_details" placeholder="Product Details"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Types:</label>
                                        <select id="selectBrand" name="pro_type">
                                            <option selected="selected">Select One</option>
                                            <option value="0">New</option>
                                            <option value="1">Fetured</option>
                                            <option value="2">General</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="author">Author:</label>
                                        <input type="hidden" name="userid" value="<?php echo Session::get('userId'); ?>" />
                                        <input type="text" name="author" id="author" value="<?php echo Session::get('userName'); ?>" class="form-control" />
                                    </div>

                                    <input type="submit" name="submit" Value="Save" class="btn btn-success" />

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "include/footer.php"; ?>