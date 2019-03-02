<?php include "include/header.php"; ?>
<?php $brand = new Brand() ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brand'];
        $addB = $brand->addBrand($brandName);
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
                            <h2>Add New Brand</h2>
                        </div>
                        <div class="content">
                            <div class="catblock">
                                <?php 
                                    if (isset($addB)) {
                                        echo $addB;
                                    } 
                                ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="category">Brand Name:</label>
                                        <input type="text" name="brand" placeholder="Enter Category Name..." id="category" class="form-control">
                                    </div>

                                    <input type="submit" class="btn btn-success" name="submit" Value="Add Brand" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "include/footer.php"; ?>
