<?php include "include/header.php"; ?>
<?php $brand = new Brand(); ?>
<?php 
    if (isset($_GET['brand_delete'])) {
         $del_brand = $_GET['brand_delete'];
         $brand_delete= $brand->deleteBrand($del_brand);
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
                                <h2>Brand List</h2>
                            </div>
                            <?php if (isset($brand_delete)) {
                                echo $brand_delete;
                            } ?>
                            <div class="content">
                                <div class="catlist">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th width="20%">Serial No.</th>
                                                <th width="60%">Brand Name</th>
                                                <th width="20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $getBrand = $brand->getAllBrand();
                                            if ($getBrand) {
                                                $i= 0;
                                                while ($value = $getBrand->fetch_assoc()) {
                                                    $i++;
                                            
                                        ?>
                                            
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value["brandName"]; ?></td>
                                                <td><a href="" class="btn btn-primary">Edit</a> || <a href="?brand_delete=<?php echo $value['brandId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure?\nPress a button! OK or Cancel To confirm.');">Delete</a></td>
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
        </div>
    </section>

<?php include "include/footer.php"; ?>