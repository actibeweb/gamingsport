<?php
include('partials/menu.php');




if (isset($_SESSION['upload'])) {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}



?>




<!-- ===================Properties HTML Body============================= -->
<!-- ================================================================ -->



<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">Your Listed Properties</h2>
        <div>

            <?php
            if ($verified) {
            ?>

                <a href="add-site.php" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>

            <?php
            }
            ?>
        </div>
    </div>

    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col col-check flex-grow-0">
                    <div class="form-check ms-2">
                    </div>
                </div>
                <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">

                </div>
                <div class="col-md-2 col-6">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->

        <div class="card-body">



            <!-- ==============================Fetch all Properties=========================== -->


            <?php
            $sql = "SELECT *  FROM  tbl_sites WHERE cp_id=$cp_id AND sale=0";
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {

                $count = mysqli_num_rows($res);


                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $site_id = $rows['site_id'];
                        $site_title = $rows["site_title"];
                        $site_prize = $rows["site_prize"];
                        $site_city = $rows["site_city"];
                        $site_state = $rows["site_state"];
                        $site_country = $rows["site_country"];
                        $site_address = $rows["site_address"];
                        $site_category = $rows["site_category"];
                        $site_image = $rows["site_image"];
                        $site_video = $rows["site_video"];
                        $featured = $rows["featured"];


                        if (empty($site_image)) {
                            $site_image = "avatar.jpg";
                        }


            ?>


                        <article class="itemlist">
                            <div class="row align-items-center">
                                <div class="col col-check flex-grow-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                                    <a class="itemside" href="edit-site.php?site_id=<?php echo $site_id; ?>">
                                        <div class="left">
                                            <img src="images/sites/<?php echo $site_image; ?>" class="img-sm img-thumbnail" alt="Item">
                                        </div>
                                        <div class="info">
                                            <h6 class="mb-0"><?php echo $site_title; ?></h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-4 col-price"> <span><?php echo "$site_prize INR"; ?></span> </div>
                                <div class="col-lg-2 col-sm-2 col-4 col-status">
                                    <?php

                                    if ($featured) {
                                    ?>
                                        <span class="badge rounded-pill alert-success">Active</span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="badge rounded-pill alert-warning">Inactive</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-4 col-date">
                                    <span><?php echo $site_state; ?></span>
                                </div>
                                <div class="col-lg-1 col-sm-2 col-4 col-action">
                                    <div class="dropdown float-end">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <!-- <a class="dropdown-item" href="edit-site.php?site_id=<?php echo $site_id; ?>">View detail</a> -->
                                            <a class="dropdown-item" href="edit-site.php?site_id=<?php echo $site_id; ?>">Edit info</a>
                                            <a class="dropdown-item" href="virtual-visit.php?site_id=<?php echo $site_id; ?>">Make Virtual Vist Ready</a>
                                            <a class="dropdown-item text-danger" href="delete-site.php?site_id=<?php echo $site_id; ?>&site_image=<?php echo $site_image; ?>&site_video=<?php echo $site_video; ?>">Delete</a>
                                        </div>
                                    </div> <!-- dropdown // -->
                                </div>
                            </div> <!-- row .// -->
                        </article>


                        <!-- itemlist  .// -->


            <?php
                    }
                } else {
                }
            }



            ?>



            <!-- <nav class="float-end mt-4" aria-label="Page navigation">
                      <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav> -->

        </div> <!-- card-body end// -->
    </div> <!-- card end// -->


    <p>*Admin can hide your properties from website.</p>
</section> <!-- content-main end// -->








<!-- ==============================Footer======================================== -->
<!-- ================================================================================ -->



<?php
include('partials/footer.php');
?>