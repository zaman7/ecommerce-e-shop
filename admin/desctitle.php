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
                                <h2>Update Site Title and Description</h2>
                            </div>
                            <div class="sloginblock">
                                <form>
                                    <div class="form-group">
                                        <label for="title">Website Title:</label>
                                        <input type="text" placeholder="Enter Website Title..." id="title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="slogan">Website Slogan:</label>
                                        <input type="text" placeholder="Website Slogan" id="slogan" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="slogo">Site Logo:</label>
                                        <input type="file" id="slogo">
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