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
                                <h2>Add New User</h2>
                            </div>
                            <div class="content">
                                <div class="user-block">
                                    <form action="" method="POST">

                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" name="username" placeholder="Enter Username..." id="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" name="email" placeholder="Enter Username..." id="email" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" placeholder="Enter Password..." id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Role:</label>
                                            <select id="selectmenu" name="role">
                                            <option>Select Role</option>
                                            <option value="0">Admin</option>
                                            <option value="1">Author</option>
                                            <option value="2">Editor</option>
                                        </select>
                                        </div>

                                        <input type="submit" class="btn btn-success" name="submit" Value="Create" />
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