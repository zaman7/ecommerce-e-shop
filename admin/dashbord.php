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
                                <h2>Dashbord</h2>
                            </div>
                            <div class="content">
                                <div class="dashbord">
                                    <div id="accordion" class="collapse-item-section">
                                        <div class="dashbord-collapse-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <h3><a data-toggle="collapse" data-target="#at-glance" id="at-glanceh" aria-expanded="true" aria-controls="at-glance">At a Glance<i class="fa fa-angle-down"></i> <i class="fa fa-angle-up"></i></a></h3>
                                            <div id="at-glance" class="collapse in" aria-labelledby="at-glanceh" data-parent="#accordion">
                                                <div class="dashbord-content-body">
                                                    <h5>Recently Published</h5>
                                                    <p>Today, 12:25 pm</p>
                                                    <div class="glance-itme">
                                                        <ul>
                                                            <li><a href="">All(4)</a></li>
                                                            <li><a href="">Pending(1)</a></li>
                                                            <li><a href="">Approved(2)</a></li>
                                                            <li><a href="">Trash(10)</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dashbord-collapse-item col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <h3><a data-toggle="collapse" data-target="#activity" id="activityh" aria-expanded="true" aria-controls="activity">Activity<i class="fa fa-angle-down"></i> <i class="fa fa-angle-up"></i></a></h3>
                                            <div id="activity" class="collapse in" aria-labelledby="activityh" data-parent="#accordion">
                                                <div class="dashbord-content-body">
                                                    <h5>Recently Posts</h5>
                                                    <p>Today, 10:25 pm</p>
                                                    <ul>
                                                        <li><a href="">Posts(2)</a></li>
                                                        <li><a href="">Pages(1)</a></li>
                                                        <li><a href="">Inbox(5)</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "include/footer.php"; ?>