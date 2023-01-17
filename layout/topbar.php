
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
						href="../admin/index.php">
						Sungwoo Indonesia
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
							<li class="nav-item dropdown me-auto text-uppercase fw-bold">
								<a class="nav-link dropdown-toggle"
								href="#" id="navbarDropdown"
								role="button"
								data-bs-toggle="dropdown"
								aria-expanded="false">
								<span class="bi bi-person-fill"><?php echo strtoupper($_SESSION['name']); ?></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="#"><i class="bi bi-person-fill me-2"></i>Profile</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-gear-fill me-2"></i>Setting</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="../../index.php"><i class="bi bi-box-arrow-right me-2"></i>Log Out</a></li>
								</ul>
							</li>
							<!-- End Topbar Item -->
						</ul>
					</div>
					<!-- End Topbar Content -->
			  	</div>
		  	</nav>
		</header>
		