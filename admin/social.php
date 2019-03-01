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
                                <h2>Update Social Media</h2>
                            </div>
                            <div class="social">
                                <form>
                                    <div class="form-group">
                                        <label for="facebook">Facebook:</label>
                                        <input type="text" placeholder="Facebook link..." id="facebook" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter">Twitter:</label>
                                        <input type="text" placeholder="Twitter link..." id="twitter" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn:</label>
                                        <input type="text" placeholder="LinkedIn link..." id="linkedin" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="google">Google Plus:</label>
                                        <input type="text" placeholder="Google Plus link..." id="google" class="form-control">
                                    </div>

                                    <input type="submit" name="submit" Value="Update" class="btn btn-success" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "include/footer.php"; ?>