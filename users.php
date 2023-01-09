<!-- PHP Connection-->
<?php
session_start(); 
include "connect.php";
?>
<!-- End PHP Connection-->


<!DOCTYPE html>
<html lang="en">

<!-- Head Section-->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Table -->  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Font Icon -->
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
</head>
<!-- End Head Section-->

<!-- Body Section-->
<body class="bg-light bg-light" >
    <!-- Header Section-->
	<section>

        <!-- Topbar -->
        <header>
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container-xxl">

                    <!-- Sidebar Toggler-->
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#sidebar"
                        aria-controls="sidebar"
                        aria-expanded="true"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- End Sidebar Toggler-->

                    <!-- Topbar Title-->
                    <a class="navbar-brand me-auto ms-lg-3 ms-2 text-uppercase fw-bold"
                        href="home.html">
                        PORTOFOLIO
                    </a>
                    <!-- End Topbar Title-->
                
                    <!-- Topbar Toggler-->
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#topbar"
                        aria-controls="topbar"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- End Topbar Toggler-->

                    <!-- Topbar Content -->
                    <div class="collapse navbar-collapse" id="topbar">
                        <ul class="navbar-nav d-flex ms-auto"> 
                            <!-- Topbar Item -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                href="#" id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <span class="bi bi-person-fill"></span>Profile
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-fill me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear-fill me-2"></i>Setting</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="index.html"><i class="bi bi-box-arrow-right me-2"></i>Log Out</a></li>
                                </ul>
                            </li>
                            <!-- End Topbar Item -->
                        </ul>
                    </div>
                    <!-- End Topbar Content -->
                </div>
            </nav>
        </header>
        <!-- End Topbar -->

    </section>
    <!-- End Header Section-->

    <!-- Main -->
    <section class="container-xxl">
		<div class="row flex-nowrap">
			<div class="col-auto px-0 max-vh-100">
				<!-- Sidebar Section-->
				<div id="sidebar" class="navbar-nav navbar-expand-md bg-light">
					<div id="sidebar" class="collapse navbar-collapse collapse-horizontal min-vh-100  border-0 rounded-0  border-end">
						
						<!-- Sidebar Content -->                        
						<ul class="px-2 pt-2 min-vh-100">
							<li class="px-2 pt-2">
								<div class="accordion" id="accordionExample">

									<!-- Sidebar Item -->  
									<div class="px-2 pt-2">
										<a href="home.html" class="btn btn-nav w-100 text-start rounded text-black" role="button"> <span class="bi bi-house me-2"></span>Home</a>
									</div>
									<!-- End Sidebar Item -->  

									<!-- Sidebar Item -->  
									<div class="px-2 pt-2">
										<a href="#"
										class="btn btn-nav collapsed w-100 text-start rounded text-black"
										data-bs-toggle="collapse"
										data-bs-target="#QC"
										role="button"
										aria-expanded="false"
										aria-controls="QC">
										<span class="bi bi-shield-check me-2"></span>
										Quality Control</a>
										  
										<div id="QC" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
											<ul>
												<li class="dropdown-item">
													<a href="qc-dashboard.html" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Dashboard</a>
												</li>
												<li class="dropdown-item">
													<a href="qc-reject-material.php" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Reject Material</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Reject Rate</a>
												</li>
											</ul>
										 </div>
									</div>
									<!-- End Sidebar Item -->  


									<!-- Sidebar Item -->  
									<div class="px-2 pt-2">
										<a href="#"
										class="btn btn-nav collapsed w-100 text-start rounded text-black"
										data-bs-toggle="collapse"
										data-bs-target="#PRD"
										role="button"
										aria-expanded="false"
										aria-controls="PRD">
										<span class="bi bi-tools me-2"></span>
										Production</a>
										  
										<div id="PRD" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
											<ul>
												<li class="dropdown-item">
													<a href="#"  role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Dashboard</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- End Sidebar Item -->  

									<!-- Sidebar Item -->  
									<div class="px-2 pt-2">
										<a href="#"
										class="btn btn-nav collapsed w-100 text-start rounded text-black"
										data-bs-toggle="collapse"
										data-bs-target="#PPIC"
										role="button"
										aria-expanded="false"
										aria-controls="PPIC">
										<span class="bi bi-wallet-fill me-2"></span>
										PPIC</a>
										  
										<div id="PPIC" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
											<ul>
												<li class="dropdown-item">
													<a href="#"  role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Dashboard</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
											</ul>
											</div>
									</div>
									<!-- End Sidebar Item -->  

									<!-- Sidebar Item -->  
									<div class="px-2 pt-2">
										<a href="#"
										class="btn btn-nav collapsed w-100 text-start rounded text-black"
										data-bs-toggle="collapse"
										data-bs-target="#WHS"
										role="button"
										aria-expanded="false"
										aria-controls="WHS">
										<span class="bi bi-building me-2"></span>
										Warehouse</a>
										  
										<div id="WHS" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
											<ul>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Dashboard</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- End Sidebar Item -->  

									<!-- Sidebar Item -->  
									<div class="px-2 pt-2">
										<a href="#"
										class="btn btn-nav collapsed w-100 text-start rounded text-black"
										data-bs-toggle="collapse"
										data-bs-target="#ACC"
										role="button"
										aria-expanded="false"
										aria-controls="ACC">
										<span class="bi bi-bank2 me-2"></span>
										Accounting</a>
										  
										<div id="ACC" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
											<ul>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Dashboard</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav-item w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
												<li class="dropdown-item">
													<a href="#" role="button" class="btn btn-nav w-100 text-start rounded text-black btn-sm">Profile</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- End Sidebar Item -->  					
								
									<!-- Divider -->
									<div class="px-2 pt-2">
									<hr>
									</div>
									<!-- End Divider -->
									
									<!-- Sidebar Item -->
									<li class="list-group-item px-2 pt-2">
										<a href="users.php" class="btn btn-nav w-100 text-start rounded text-black active" role="button"> Users</a>
									</li>	
									<!-- End Sidebar Item -->
								</div>
							</li>						
						</ul>
						<!-- End Sidebar Content -->

					</div>
				</div>
				<!-- End Sidebar Section -->


                <!-- Main Section-->
                <div class="col ps-md-3 max-vh-100" data-aos="fade" data-aos-delay="100">  
                    <!-- Header-->  
                    <div class="page-header pt-3">
                        <h2>Users</h2>
                    </div>
                    <hr class="mb-3">
                    <!-- End Header-->

                    <!-- Main Content -->
                    <div class="row justify-content-md-center">
                        <div class="col-lg-9 md-9 mt-2">
                            <div class="table-responsive-lg">
                                <div class="container">
                                    <table id="users_table" class="table table-hover row-border table-sm table caption-top ">
                                        
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" >#</th>
                                                <th scope="col" >Name</th>
                                                <th scope="col" >Position</th>
                                                <th scope="col" >Username</th>
                                                <th scope="col" type="password">Password</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                        <?php

                                        $sql = "SELECT * FROM user_accounts";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                echo
                                                "<tr>
                                                <td>" . $row["id"]. "</td>
                                                <td>" . $row["name"] . "</td>
                                                <td>" . $row["position"] . "</td>
                                                <td>" . $row["username"] . "</td>
                                                <td>" . $row["password"]. "</td>
                                                <td>
                                                Edit | Delete </td>
                                                </tr>";
                                                }
                                                echo "</table>";
                                            }
                                            else { 
                                                echo "0 results"; }
                                            $conn->close();
                                        ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Main Content -->

                </div>
                <!-- End Main Section-->
            </div>
        </div>
    </section>
    <!-- End Main -->





        



    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>