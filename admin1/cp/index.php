<?php
 include('partials/menu.php');
?>
<?php


if (isset($_SESSION['login'])) {

	// echo $_SESSION['login'];
	unset($_SESSION['login']);
}

if(!$verified){
?>
	<h1 class="fail">
		Please Complete your profile!! Then and only you can add sites and team members!!
	</h1>
<?php
}
?>


<section class="content-main">
	<div class="content-header">
		<h2 class="content-title">Dashboard</h2>
	
	</div>
	<div class="row">
		
		<div class="col-lg-6">
			<div class="card card-body mb-4">
				<article class="icontext">
					<span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
					<div class="text">
						<h6 class="mb-1">Total Sales</h6> <span><?php echo $sale_count; ?></span>
					</div>
				</article>
			</div> <!-- card end// -->
		</div> <!-- col end// -->
		<div class="col-lg-6">
			<div class="card card-body mb-4">
				<article class="icontext">
					<span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-shopping_basket"></i></span>
					<div class="text">
						<h6 class="mb-1">Total Propeties</h6> <span><?php echo $site_count; ?></span>
					</div>
				</article>
			</div> <!--  end// -->
		</div> <!-- col end// -->


		<div class="col-lg-6">
			<div class="card card-body mb-4">
				<article class="icontext">
					<span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-money"></i></span>
					<div class="text">
						<h6 class="mb-1">Total Sales Money</h6> <span>INR <?php echo $sale_count_in_rupees; ?></span>
					</div>
				</article>
			</div> <!--  end// -->
		</div> <!-- col end// -->
		<div class="col-lg-6">
			<div class="card card-body mb-4">
				<article class="icontext">
					<span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-people"></i></span>
					<div class="text">
						<h6 class="mb-1">Total Team Members</h6> <span> <?php echo $team_count; ?> Members</span>
					</div>
				</article>
			</div> <!--  end// -->
		</div> <!-- col end// -->
	</div> <!-- row end// -->

	<?php

        

	?>




</section>
<!-- content-main end// -->


<?php

if($club){

	?>



<section class="content-main">
	<div class="content-header">
		<h2 class="content-title">You are in club! </h2>
	
	</div>
	<div class="row">
		
		<div class="col-lg-6">
			<div class="card card-body mb-4">
				<article class="icontext">
					<span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
					<div class="text">
						<h6 class="mb-1">Total Club Money </h6> <span> INR <?php echo $club_incentive; ?></span>
					</div>
				</article>
			</div> <!-- card end// -->
		</div> <!-- col end// -->
	
	</div> <!-- row end// -->

	<?php

        

	?>




</section>



<?php
}


?>

<!-- content-main end// -->

<?php
 include('partials/footer.php');
?>