<!DOCTYPE html>
<html lang="en">

<!-- Head Section-->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SWI</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Font Icon -->
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
</head>
<!-- End Head Section-->

<!-- Body Section-->
<body class="bg-light bg-gradient">
  <!-- Section Log In -->
  <section>

    <!-- Log In Container -->
    <div class="container">

      <!-- Log In Header -->
      <h3 class="text-center mt-5" 
        data-aos="fade-down" 
        data-aos-delay="100">
        Please Log In to Proceed!
      </h3>
      <!-- End Log In Header -->

      <!-- Log In Content -->
			<div class="row justify-content-center"> <!-- Center Side -->
				<div class="col-md-7 col-lg-5"> <!-- Length -->
					<div class="login-wrap p-4 p-md-5"> <!-- Middle Position --> 

		      	<!-- Log In Card -->
            <div class="card" data-aos="fade-down" data-aos-delay="100">
              <div class="card-body">

                <!-- Log In Title -->
                <div class="card-title">
                  <div class="d-flex text-center">
                    <div class="w-100">
                      <h3 class="mb-3">Sign In</h3>
                    </div>
		      	      </div>
                </div>
                <!-- End Log In Title -->

                <!-- LOG IN FORM -->
                <div class="card-text">                 
                  <form action="login.php" method = "post">
                    <!-- Input Group -->
                    <div class="form-group mt-5">
                      <div class="input-group">
                        <span class="input-group-text bi bi-person-fill"></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                      </div>
                    </div>
                    <!-- End Input Group -->
                    
                    <!-- Input Group -->
                    <div class="form-group mt-3">
                      <div class="input-group">
                        <span class="input-group-text bi bi-lock-fill"></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                      </div>
                    </div>
                    <!-- End Input Group -->

                    <!-- Login Button -->
                    <div class="form-group d-flex align-items-center mt-5">
                      <div class="w-100 d-flex justify-content-center ">
                        <button type="submit" name="login" id="login" class="btn btn-login rounded submit w-100">Login</button>
                      </div>
                    </div>
                    <!-- End Login Button -->

                    <!-- Register Trigger Modal -->
                    <div class="form-group d-flex align-items-center mt-3"> 
                      <div class="w-100 d-flex justify-content-center">
                        <button type="button" class="btn btn-regist rounded w-100" data-bs-toggle="modal" data-bs-target="#register">
                          Register
                        </button>
                      </div>
                    </div>
                    <!-- End Register Trigger Modal -->

                  </form>                
                </div>
                <!-- EndLOG IN FORM -->

              </div>
            </div>
            <!-- End Log In Card -->

          </div>
        </div>
      </div>
    </div>
    <!-- End Log In Container -->
  </section>
  <!-- End Section Log In -->

  <!-- Section Sign Up Modal -->
  <section>
    <!-- Modal Dialog -->
    <div class="modal fade"  id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">

          <!-- Modal Title -->
          <div class="modal-header text-center bg-light bg-gradien">
            <h2 class="modal-title " id="staticBackdropLabel">Sign Up</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- End Modal Title -->

          <!-- Signup Form -->
          <div class="modal-body">
            <form action="register.php" method = "post">

              <!-- Input Group -->
              <div class="form-group mt-4">
                <div class="input-group">
                  <span class="input-group-text bi bi-person-lines-fill"></span>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
                </div>
              </div>
              <!-- End Input Group -->

              <!-- Input Group -->
              <div class="form-group mt-3">
                <div class="input-group">
                  <span class="input-group-text bi bi-archive-fill"></span>
                  <select class="form-control" name="position" id="position" required>
                    <option selected>--Position--</option>
                    <option value="Master">Master</option>
                    <option value="Admin">Admin</option>
                    <option value="QCS">Quality Control Staff</option>
                    <option value="PRD">Production Staff</option>
                    <option value="WHS">Warehouse Staff</option>
                    <option value="ACC">Accounting Staff</option>
                  </select>
                </div>
              </div> 
              <!-- End Input Group -->

              <!-- Input Group -->
              <div class="form-group mt-3">
                <div class="input-group">
                  <span class="input-group-text bi bi-person-fill"></span>
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
              </div>
              <!-- End Input Group -->

              <!-- Input Group -->
              <div class="form-group mt-3">
                <div class="input-group">
                  <span class="input-group-text bi bi-lock-fill"></span>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
              </div>
              <!-- End Input Group -->

              <!-- Register Button -->
              <div class="form-group d-flex align-items-center mt-4">
                <div class="w-100 d-flex justify-content-center ">
                  <button type="submit" id="signup" name="signup" class="btn btn-regist rounded submit w-100">Register</button>
                </div>
              </div>
              <!-- End Register Button -->
            </form>
          </div>
          <!-- End Signup Form -->

          <!-- Modal Footer -->
          <div class="modal-footer bg-light bg-gradien">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
          <!-- End Modal Footer -->
    
        </div>
      </div>
    </div>   
    <!-- End Modal Dialog -->
    
  </section>
  <!-- End Section Sign Up Modal -->


  




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
<!-- End Body Section-->

</html>