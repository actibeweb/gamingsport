<?php
include('partials/menu.php');
?>




<!-- =====================Fetch Channel Partner Profile date==================== -->
<!-- =========================================================================== -->


<?php
$member_username = $_GET['member_username'];
$sql = "SELECT * FROM tbl_team WHERE member_username='$member_username'";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // echo "Admin Available";
        $row = mysqli_fetch_assoc($res);
        $member_name = $row['member_name'];
        $member_address = $row['member_address'];
        $member_email = $row['member_email'];
        $member_phone = $row['member_phone'];
        $member_image = $row['member_image'];
        $level_id = $row['level_id'];
    }
}






// =============================Count of Sales==========================
// =====================================================================



$sale_sql = "SELECT * FROM tbl_sales WHERE member_username='$member_username' AND cp_id=$cp_id";
$sale_res = mysqli_query($conn, $sale_sql);
if ($sale_res == true) {
  $sale_count = mysqli_num_rows($sale_res);
  $sale_count_in_rupees = 0;

  if ($sale_count > 0) {
    while ($rows = mysqli_fetch_assoc($sale_res)) {

      $member_profit = $rows["member_profit"];
      $sale_count_in_rupees += (float)$member_profit;
    }
  }else{
    $sale_count_in_rupees=0;

  }


} else {
  $sale_count = 0;
}






?>






<!-- ===========================HTML CONTENT=========================== -->
<!-- ==========================================================================-->





<section class="content-main">

    <div class="content-header">
        <a href="javascript:history.back()" class="btn btn-light"><i class="material-icons md-arrow_back"></i> Go back
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-warning" style="height:150px">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                    <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height:190px; width:200px; margin-top:-120px">
                        <img src="../cp/images/team/<?php if ($member_image !== '') {
                                                                                                        echo $member_image;
                                                                                                    } else {
                                                                                                        echo 'avatar.jpg';
                                                                                                    } ?>" class="center-xy img-fluid" alt="Logo Brand">
                    </div>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <h3><?php echo $member_name; ?></h3>
                    <p><?php echo $member_address; ?></p>
                </div> <!--  col.// -->
            
            </div> <!-- card-body.// -->
            <hr class="my-4">
            <div class="row g-4">
                <div class="col-md-12 col-lg-4 col-xl-2">
                    <article class="box">
                        <p class="mb-0 text-muted">Total sales:</p>
                        <h5 class="text-success"><?php echo $sale_count ?></h5>
                        <p class="mb-0 text-muted">Revenue:</p>
                        <h5 class="text-success mb-0">INR <?php echo $sale_count_in_rupees ?></h5>
                    </article>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Contacts</h6>
                    <p>

                        <?php echo $member_email; ?><br>
                        <?php echo $member_phone; ?>
                    </p>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Address</h6>
                    <p>
                        Address: <?php echo $member_address; ?> <br>
                    </p>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-xl-4 text-xl-end">

                </div> <!--  col.// -->
            </div> <!--  row.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->


</section> <!-- content-main end// -->





<style>
    .transform-plan:hover {
        transform: rotateZ(-2deg);
    }
</style>


<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"><?php echo $member_name ?>'s Business Level</h2>

    </div>
    <div class="row">



        <?php

        // Get data for particuular level

        $level_sql = "SELECT * FROM tbl_business_plan ";
        $level_res = mysqli_query($conn, $level_sql);

        if ($level_res == TRUE) {
            $level_count = mysqli_num_rows($level_res);
            if ($level_count > 0) {

                while ($level_row = mysqli_fetch_assoc($level_res)) {


                    $level = $level_row['level'];
                    $position = $level_row['position'];
                    $incentive = $level_row['incentive'];
                    $target = $level_row['target'];
                    $salary = $level_row['salary'];

        ?>


                    <div class="col-lg-12 transform-plan">
                        <div class="card card-body mb-4" <?php

                                                            if ($level == $level_id) {
                                                            ?> style="    box-shadow: rgb(16 16 193 / 21%) 0px 7px 29px 0px;
                                                        background: #a1a1e1;
                                                        color: white;" <?php

                                                                    }
                                                                        ?>>
                            <article class="icontext">
                                <span <?php

                                        if ($level == $level_id) {
                                        ?> style="   
                                                            background-color: rgb(235 255 237) !important;
                                                            " <?php

                                                            }
                                                                ?> class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-one"><?php echo $level; ?></i></span>
                                <div class="text" style="display: flex;width: 100%;justify-content: space-evenly;">



                                    <?php if ($level == $level_id) {

                                    ?>

                                        <span class="badge rounded-pill alert-danger"><?php echo "current"; ?></span>

                                        <h6 class="mb-1" style="font-size: 20px;
"> <?php echo $position; ?></h6>

                                        <?php

                                    } else {

                                        if ($level < $level_id) {
                                        ?>

                                            <span class="badge rounded-pill alert-success"><?php echo "completed"; ?></span>

                                        <?php
                                        } else {

                                        ?>

                                            <span class="badge rounded-pill alert-success"><?php echo "coming..."; ?></span>
                                        <?php



                                        }




                                        ?>



                                        <h6 class="mb-1" style="font-size: 20px;
color: #63bb92;"> <?php echo $position; ?></h6>
                                    <?php
                                    } ?>




                                    <h6 class="mb-1">Target : <?php if ($level == 11) {
                                                                    echo "No Target";
                                                                } else { ?>INR <?php echo $target;
                                                                        } ?></h6>
                                    <h6 class="mb-1">Incentive : <?php echo $incentive; ?>%</h6>
                                    <h6 class="mb-1">Salary : INR <?php echo $salary; ?></h6>
                                </div>
                            </article>
                        </div> <!-- card end// -->
                    </div> <!-- col end// -->




        <?php
                }
            }
        }
        ?>


</section>
<!-- content-main end// -->



<?php
include('partials/footer.php');
?>