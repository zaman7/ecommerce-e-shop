<?php include "include/header.php"; ?>
<?php $pro = new Products(); ?>
<?php 
    if (!isset($_GET['products_edit']) OR $_GET['products_edit'] == NULL ) {
        echo "<script>window.location='products-list.php';</script>";
    }
    else{
        $products_edit = $_GET['products_edit'];
        $get_edit_pro  = $pro->getEditPro($products_edit);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $upProduct = $pro->updateProduct($_POST, $_FILES);
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
                                <h2>Edit Product</h2>
                            </div>
                            <div class="addpost">
                                <?php
                                if (isset($upProduct)) {
                                    echo $upProduct;
                                }
                                if (isset($get_edit_pro)) {
                                    $value = $get_edit_pro->fetch_assoc();
                                ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="text" name="productId" value="<?php echo $value['productId'] ?>">
                                    <div class="form-group">
                                        <label for="title">Product Name:</label>
                                        <input type="text" name="product_title" value="<?php echo $value['productName']; ?>" id="post-title" class="form-control" />
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
                                            <option 
                                                <?php if ($catValue['categoryId'] == $value['categoryId']) {
                                                echo "selected='selected'";
                                            } ?>
                                            value="<?php echo $catValue['categoryId'] ?>"><?php echo $catValue["category"]; ?></option>
                                        <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Brand Name:</label>
                                        <select id="selectBrand" name="brand_id">
                                            <?php 
                                            $getBrand = $pro->getAllBrandName();
                                            if ($getBrand) {
                                                while ($brandValue = $getBrand->fetch_assoc()) {
                                        ?>
                                        <option
                                            <?php if ($brandValue['brandId'] == $value['brandId']) {
                                                echo "selected='selected'";
                                            } ?>
                                         value="<?php echo $brandValue['brandId']; ?>"><?php echo $brandValue["brandName"]; ?></option>

                                        <?php } } ?>
                                        </select>
                                    </div>
                                    <?php if (isset($value['image'])) { ?>

                                    <img src="<?php echo $value['image']; ?>" width='200px'>
                                    <?php }else{ echo "No Image On This Product..!"; } ?>

                                    <div class="form-group">
                                        <label for="file">Product Image:</label>
                                        <input type="file" id="file" name="image" />
                                    </div>

                                    <div class="form-group">
                                        <label for="price" >Price:</label>
                                        <input type="text" id="price" name="price" class="form-control" value="<?php echo $value['price']; ?>"  />
                                    </div>

                                    <div class="form-group">
                                        <label>Product Details:</label>
                                        <textarea name="products_details"><?php echo $value['products_details']; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Types:</label>
                                        <select id="selectBrand" name="pro_type">
                                            <?php 
                                                if ($value['type'] == 0) {
                                            ?>
                                            <option selected="selected" value='0'>New</option>
                                            <option value='1'>Featured</option>
                                            <option value='2'>General</option>

                                        <?php }else if($value['type'] == 1){ ?>
                                            <option value='0'>New</option>
                                            <option selected="selected" value='1'>Featured</option>
                                            <option value='2'>General</option>
                                        <?php }else{ ?>
                                            <option value='0'>New</option>
                                            <option value='1'>Featured</option>
                                            <option selected="selected" value='2'>General</option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="author">Author:</label>
                                        <input type="text" name="author" id="author" value="<?php echo $value['author'] ?>" class="form-control" />
                                    </div>

                                    <input type="submit" name="update" Value="Update" class="btn btn-success" />

                                </form>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "include/footer.php"; ?>