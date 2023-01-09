<!DOCTYPE html>
<html lang="en">
<?php
    session_start(); 
    include "../../connect.php";    
?>
<!-- Head Section-->
<head>

	<?php include '../../layout/header.php' ?>

</head>
<!-- End Head Section-->

<!-- Body Section-->
<body class="bg-light bg-light" data-aos="fade-down" data-aos-delay="100">
	
	<!-- Header Section-->
	<section>

		<!-- Topbar -->
		<?php include '../../layout/topbar.php' ?>
		<!-- End Topbar -->

	</section>
	<!-- End Header Section-->

	<!-- Main -->
	<section class="container-xxl">
		<div class="row flex-nowrap">
			<div class="col-auto px-0 max-vh-100">
				<!-- Sidebar Section-->
				<?php include '../../layout/sidebar.php' ?>
				<!-- End Sidebar Section-->
				
			

				<!-- Main Section-->
				<div class="col ps-md-3 max-vh-100">  
					<!-- Header-->  
					<div class="page-header pt-3">
						<h2>Welcome!</h2>
					</div>
					<hr class="mb-3">
					<!-- End Header--> 
						
					<!-- Main Content --> 
					<div class="row">
						<!-- Main Item -->
						<div class="col-md-6 mb-3">
							<div class="card card-dashboard shadow">
								<div class="card-body text-start">
									<h5 class="card-title">Quality Control</h5>
									<p class="card-text"><i class="bi bi-people mr-4"></i>
									<a href="#" class="btn btn-dash ms-2">Dashboard</a></p>                                
								</div>
							</div>
						</div>
						<!-- End Main Item -->

						<!-- Main Item -->
						<div class="col-md-6 mb-3">
							<div class="card card-dashboard shadow">
								<div class="card-body text-start">
									<h5 class="card-title">Production</h5>
									<p class="card-text"><i class="bi bi-people mr-4"></i>
									<a href="#" class="btn btn-dash ms-2">Dashboard</a></p>                                
								</div>
							</div>
						</div>
						<!-- End Main Item -->

						<!-- Main Item -->
						<div class="col-md-6 mb-3">
							<div class="card card-dashboard shadow">
								<div class="card-body text-start">
									<h5 class="card-title">PPIC</h5>
									<p class="card-text"><i class="bi bi-people mr-4"></i>
									<a href="#" class="btn btn-dash ms-2">Dashboard</a></p>                                
								</div>
							</div>
						</div>
						<!-- End Main Item -->

						<!-- Main Item -->
						<div class="col-md-6 mb-3">
							<div class="card card-dashboard shadow">
								<div class="card-body text-start">
									<h5 class="card-title">Warehouse</h5>
									<p class="card-text"><i class="bi bi-people mr-4"></i>
									<a href="#" class="btn btn-dash ms-2">Dashboard</a></p>                                
								</div>
							</div>
						</div>
						<!-- End Main Item -->

						<!-- Main Item -->
						<div class="col-md-6 mb-3">
							<div class="card card-dashboard shadow">
								<div class="card-body text-start">
									<h5 class="card-title">Accounting</h5>
									<p class="card-text"><i class="bi bi-people mr-4"></i>
									<a href="#" class="btn btn-dash ms-2">Dashboard</a></p>                                
								</div>
							</div>
						</div>
						<!-- End Main Item -->
						
					</div>
					<!-- End Main Content -->
				</div>
				<!-- End Main Section-->

			</div>
		</div>			
	</section>
	<!-- End Main -->


    



  <!-- Vendor JS Files -->
 <?php include '../../layout/js.php' ?>
 <!-- footer Files -->
 <?php include '../../layout/footer.php' ?>
</body>
<!-- End Body Section-->

</html>