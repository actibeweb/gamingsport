<?php
include('partials/menu.php');
?>








<section class="content-main">

	<div class="content-header">
		<h2 class="content-title">Sales</h2>
		<div>
		</div>
	</div>

	<div class="card mb-4">
		<header class="card-header">
			<div class="row gx-3">
				<div class="col-lg-4 col-md-6 me-auto">
				</div>
				<div class="col-lg-2 col-6 col-md-3">
					<select class="form-select">
						<option>Status</option>
						<option>Active</option>
						<option>Disabled</option>
						<option>Show all</option>
					</select>
				</div>
				<div class="col-lg-2 col-6 col-md-3">
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
							<th scope="col">Buyer Email</th>
							<th scope="col">Amount</th>
							<th scope="col">Property</th>
							<th scope="col">Channel Partner</th>
							<th scope="col">Agent</th>
						</tr>
					</thead>
					<tbody>






						<!-- =====================Fetch Visits============================ -->
						<!-- ================================================================-->


						<?php
						$sql = "SELECT *  FROM  tbl_sales WHERE cp_id=$cp_id  ";
						$res = mysqli_query($conn, $sql);

						if ($res == TRUE) {

							$count = mysqli_num_rows($res);


							if ($count > 0) {
								while ($rows = mysqli_fetch_assoc($res)) {
									$sale_id = $rows['sale_id'];
									$site_id = $rows['site_id'];
									$cp_id = $rows['cp_id'];
									$visit_id = $rows['visit_id'];
									$buyer_name = $rows["buyer_name"];
									$cp_name = $rows["cp_name"];
									$member_username = $rows["member_username"];
									$sale_amount = $rows["sale_amount"];

						?>


									<tr>
										<td><b><?php echo $buyer_name; ?></b></td>
										<td><b><?php echo $sale_amount; ?></b></td>
										<td><a href="edit-site.php?site_id=<?php echo $site_id; ?>" target="_blank" class="btn btn-light">See</a></td>
										<td><?php echo $cp_name; ?> <a href="profile.php" target="_blank" class="btn btn-light">See</a></td>
										</td>
										<td>
											<?php
											if ($member_username !== '') {
												echo $member_username;

											?>
												<a href="./sale-detail.php?sale_id=<?php echo $sale_id; ?>" target="_blank" class="btn btn-light">See Detail</a>
											<?php
											} else {
											?>

												<a href="./member-sale-form.php?sale_id=<?php echo $sale_id; ?>" target="_blank" class="btn btn-light">Add Agent</a>
											<?php
											} ?>
										</td>


									</tr>


									<!-- itemlist  .// -->


						<?php
								}
							} else {
							}
						}



						?>

					</tbody>
				</table>
			</div> <!-- table-responsive //end -->
		</div> <!-- card-body end// -->
	</div> <!-- card end// -->
</section>



<?php
include('partials/footer.php');
?>