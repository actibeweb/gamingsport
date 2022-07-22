<?php
include('partials/menu.php');




if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}



?>



<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">Team Members</h2>

        <!-- Add cp's Site -->

        <?php
        if ($verified) {
        ?>

            <a href="add-team.php" class="btn btn-primary">Add Team Member </a>
        <?php
        }

        ?>
    </div>

    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>



                        <!-- =======================Fetch Team Members=================== -->
                        <!-- =================================================================== -->

                        <?php
                        $sql = "SELECT *  FROM  tbl_team WHERE cp_id=$cp_id ";
                        $res = mysqli_query($conn, $sql);

                        if ($res == TRUE) {

                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($res)) {

                                    $member_name = $rows['member_name'];
                                    $member_id = $rows['member_id'];
                                    $member_username = $rows['member_username'];
                                    $member_email = $rows['member_email'];
                                    $member_phone = $rows['member_phone'];
                                    $member_image = $rows['member_image'];


                        ?>

                                    <tr>
                                        <td width="40%">
                                            <a href="member.php?member_username=<?php echo $member_username; ?>" class="itemside">
                                                <div class="left">
                                                    <img src="<?php echo SITEURL; ?>/cp/images/team/<?php if ($member_image !== '') {
                                                                                                        echo $member_image;
                                                                                                    } else {
                                                                                                        echo 'avatar.jpg';
                                                                                                    } ?>" class="img-sm img-avatar" alt="Userpic">
                                                </div>
                                                <div class="info pl-3">
                                                    <h6 class="mb-0 title"><?php echo $member_name; ?></h6>
                                                </div>
                                            </a>
                                        </td>
                                        <td><?php echo $member_username; ?></td>
                                        <td><?php echo $member_email; ?></td>
                                        <td><?php echo $member_phone; ?></td>

                                        <td class="text-end">
                                            <a href="member-sale.php?member=<?php echo $member_username; ?>" class="btn btn-light">Sale</a>
                                            <a href="delete-member.php?member=<?php echo $member_username; ?>" class="btn btn-light">Delete</a>
                                        </td>

                                    </tr>





                        <?php
                                }
                            } else {
                            }
                        }



                        ?>





                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>

        </div> <!-- card-body end// -->
    </div> <!-- card end// -->


</section> <!-- content-main end// -->



<?php
include('partials/footer.php');
?>