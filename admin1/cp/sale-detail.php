<?php
include('partials/menu.php');
?>



<!-- =============================Visit Id, Site Id, CP id ==================================== -->
<!-- ==================================================================================== -->



<?php

$sale_id = $_GET['sale_id'];

$sql = "SELECT * FROM tbl_sales WHERE sale_id=$sale_id";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // echo "Admin Available";
        $row = mysqli_fetch_assoc($res);
        $site_id = $row['site_id'];
        $cp_id = $row['cp_id'];
        $sale_amount = $row['sale_amount'];
        $buyer_name = $row['buyer_name'];
        $cp_name = $row['cp_name'];
        $member_username = $row['member_username'];
        $member_profit = $row['member_profit'];

    }
}



?>



<section class="content-main" style="max-width: 720px">

    <div class="content-header">
        <h2 class="content-title">Sale Detail </h2>
        <div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST">
                <div class="mb-4">
                    <label for="product_name" class="form-label"> Sales Amount</label>
                    <input type="text" placeholder="Type here" value=' <?php echo $sale_amount; ?>' name="sale_amount" class="form-control" id="product_name" readonly>
                    <input type="hidden" placeholder="Type here" name="sale_id" value="<?php echo $sale_id; ?>" class="form-control" id="product_name">

                </div>

                <div class="mb-4">
                    <label class="form-label">Buyer Name</label>
                    <input type="text" placeholder="Type here" name="buyer_name" value="<?php echo $buyer_name; ?>" class="form-control" id="product_name" readonly>
                </div>

                <div class="mb-4">
                    <label class="form-label">Channel Partner</label>
                    <input type="text" placeholder="Type here" name="cp_name" value="<?php echo $cp_name; ?>" class="form-control" id="product_name" readonly> 
                </div>

                <div class="mb-4">
                    <label class="form-label">Agent </label>
                    <input type="text" placeholder="Type here" value="<?php echo $member_username;?>" name="member_profit" class="form-control" id="product_name" readonly > 
                </div>

                <div class="mb-4">
                    <label class="form-label">Agent Profit [in Rs]</label>
                    <input type="text" placeholder="Type here" value="<?php echo $member_profit;?>" name="member_profit" class="form-control" id="product_name" readonly > 
                </div>

            </form>
        </div>
    </div> <!-- card end// -->

</section> <!-- content-main end// -->





<!-- -------------------------  -->
<!-- ================Sale Form Post ============ -->


<?php
include('partials/footer.php');
?>