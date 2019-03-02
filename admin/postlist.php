<?php include "include/header.php"; ?>
<?php $pro = new Products(); ?>
<?php $helper = new Helpers(); ?>
<?php 
    if (isset($_GET['product_delete'])){
        $product_delete = $_GET['product_delete'];
        $deProduct  = $pro->deleteProducts($product_delete);
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
                                <h2>Products Lists</h2>
                            </div>
                            <?php if (isset($deProduct)) {
                                echo $deProduct;
                            } ?>
                            <div class="postlist">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>SL.NO</th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Product Details</th>
                                            <th>Types</th>
                                            <th>Author</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $getProducts = $pro->getAllProductsAdmin();
                                            if ($getProducts) {
                                                $i= 0;
                                                while ($value = $getProducts->fetch_assoc()) {
                                                    $i++;
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $value['productName']; ?></td>
                                            <td><?php echo $value['category']; ?></td>
                                            <td><?php echo $value['brandName']; ?></td>
                                            <td><a href="<?php echo $value['image']; ?>"><img src="<?php echo $value['image']; ?>" width="80px"></a></td>
                                            <td><?php echo $value['price']; ?></td>
                                            <td><?php echo $helper->textShorten($value['products_details'],30); ?></td>
                                            <td>
                                            <?php if ($value['type'] == 0) {
                                                     echo "New";
                                                 }
                                                 else if ($value['type'] == 1) {
                                                    echo "Fetured";
                                                 }
                                                 else{
                                                    echo "General";
                                                 }?>
                                            </td>
                                            <td><?php echo $value['author']; ?></td>
                                            <td class="text-center"><a href="pro_edit.php?products_edit=<?php echo $value['productId']; ?>&pro_update" class="btn btn-primary">Edit</a> || <a href="?product_delete=<?php echo $value['productId']; ?>&pro_delete" class="btn btn-danger" onclick="return confirm('Are you sure?\nPress a button! OK or Cancel To confirm.');">Delete</a></td>
                                        </tr>
                                    <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "include/footer.php"; ?>