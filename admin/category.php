<?php include "include/header.php"; ?>
<?php $cat = new Category(); ?>
<?php 
    if (isset($_GET['cat_delete'])) {
         $cat_del = $_GET['cat_delete'];
         $del_cat= $cat->deleteCat($cat_del);
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
                                <h2>Category List</h2>
                            </div>
                            <?php if (isset($del_cat)) {
                                echo $del_cat;
                            } ?>
                            <div class="content">
                                <div class="catlist">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th width="20%">Serial No.</th>
                                                <th width="50%">Category Name</th>
                                                <th width="30%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $getCat = $cat->getAllCat();
                                            if ($getCat) {
                                                $i= 0;
                                                while ($value = $getCat->fetch_assoc()) {
                                                    $i++;
                                            
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value["category"]; ?></td>
                                                <td class="text-center"><a href="" class="btn btn-primary">Edit</a> || <a href="?cat_delete=<?php echo $value['categoryId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure?\nPress a button! OK or Cancel To confirm.');">Delete</a></td>
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