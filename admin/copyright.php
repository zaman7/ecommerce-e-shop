<?php include "include/header.php"; ?>

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
                                <h2>Update Copyright Text</h2>
                            </div>
                            <div class="content">
                                <div class="copyblock">
                                    <form>
                                        <div class="form-group">
                                            <label for="copyright">Copyright:</label>
                                            <input type="text" placeholder="Enter Copyright Text..." id="copyright" class="form-control">
                                        </div>

                                        <input type="submit" name="submit" Value="Update" class="btn btn-success" />
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