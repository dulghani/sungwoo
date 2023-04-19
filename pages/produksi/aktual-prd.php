<!-- PHP Connection-->
<?php
    session_start();

    //cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['position'] == "") {
        header("location:../../index.php");
    }

    include "../../connect.php";    
?>
<!-- End PHP Connection-->

<!-- PHP Function -->
<?php
    
    $nama           = "";
    $code           = "";
    $ket           = "";
    $author         = $_SESSION['name'];
    $error          = "";
    $succeed        = "";
    $warning        = "";
    $tabelnya       = "master_gudang";

    
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    
    // DELETE FUNCTION
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "DELETE FROM $tabelnya where idgud = '$id'";
        $q1         = mysqli_query($conn,$sql1);
        if($q1){
            $succeed = "Delete Success";
        }else{
            $error  = "Delete error";
        }
    }

    // EDIT FUNCTION
    if ($op == 'edit') {
        $id             = $_GET['id'];
        $sql1           = "SELECT * FROM $tabelnya where idgud = '$id'";
        $q1             = mysqli_query($conn, $sql1);
        $r1             = mysqli_fetch_array($q1);
        $nama           = $r1['namagud'];
        $code           = $r1['codegud'];
        $ket            = $r1['ket'];
        $author         = $_SESSION['name'];

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {
        $nama           = STRTOUPPER($_POST['nama']);
        $code           = STRTOUPPER($_POST['code']);
        $ket           = $_POST['ket'];
        $author         = $_SESSION['name'];

        if ($nama && $code && $author) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE $tabelnya SET namagud='$nama', codegud='$code', ket='$ket', edit_at=NOW(), edit_by='$author' where idgud = '$id'";
                $q1         = mysqli_query($conn, $sql1);
                if ($q1) {
                    $succeed = "Update success";
                    header("refresh:3;url=add-gudang.php");
                } else {
                    $error  = "Update error";
                }
            }
            //Inster Data
            else { 
                $cek    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $tabelnya WHERE namagud='$nama' or codegud='$code'"));
                if ($cek > 0){
                    $warning           = "Nama Supplier atau kode Supplier sudah ada";
                }else {
                    $sql1   = "INSERT INTO $tabelnya values ('', '$nama', '$code', '$ket','$author', NOW(),'','')";
                    $q1     = mysqli_query($conn, $sql1);
                    if ($q1) {
                        $succeed      = "Submission success";

                    } else {
                        $error      = "Submission error";
                    }
                }
            }
        } else {
            $error = "Please fill all the data";
            
        }
    }
?>
<!-- End PHP Function -->

<!DOCTYPE html>
<html lang="en">

<!-- Head Section-->
<head>
    <?php include '../../layout/header.php' ?>
</head>
<!-- End Head Section-->

<!-- Body Section-->
<body class="bg-light bg-light" >
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
				<!-- End Sidebar Section -->


                <!-- Main Section-->
                <div class="col ps-md-3 max-vh-100" data-aos="fade" data-aos-delay="100">
                    <!-- Header-->  
                    <div class="page-header pt-3">
                        <h2>PRODUKSI HARIAN</h2>
                    </div>
                    <hr class="mb-3">
                    <!-- End Header-->
                    
                    <!-- Main Content --> 
                    <div class="row justify-content-md-center">

                        <!-- Card Input -->
                        <div class="col-lg-12 col-md-12">
                            <div class="container shadow px-4 py-3">

                                <!-- Card Header
                                <div class="card-header">
                                    Create / Edit Data
                                </div>
                                End Card Header -->

                                <!-- Card Body -->
                                <div class="card-body bg-light">

                                    <?php
                                    if ($error) {
                                    ?>

                                        <div class="alert alert-danger d-flex align-items-center mb-2" role="alert">
                                            <?php echo $error ?>
                                        </div>

                                    <?php
                                        //echo "<meta http-equiv=\"refresh\" content=\"0;URL=qc-reject-material.php\">";
                                        //"<script> document.location.href ='qc-reject-material.php'</script>";
                                        //header("refresh:2;url=qc-reject-material.php");
                                        //5 : detik
                                    }
                                    ?>

                                    <?php
                                    if ($succeed) {
                                        ?>
    
                                            <div class="alert alert-success  d-flex align-items-center mb-2" role="alert">
                                                <?php echo $succeed ?>
                                            </div>
    
                                        <?php
                                            //header("refresh:3;url=qc-reject-material.php");
                                        }
                                        ?>
                                    <?php
                                    if ($warning) {
                                        ?>
    
                                            <div class="alert alert-warning  d-flex align-items-center mb-2" role="alert">
                                                <?php echo $succeed ?>
                                            </div>
    
                                        <?php
                                            //header("refresh:3;url=qc-reject-material.php");
                                        }
                                        ?>

                                    <!-- Input Form -->
                                    <form action="" method="POST">
                                        <div class="row">

                                            <!-- Input Group -->
                                            <div class="col-sm-3">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="name" class="col-sm-12 col-form-label">Partnumber</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="pnumber" name="pnumber" value="<?php echo $pnumber ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- End Input Group -->
                                            <!-- Input Group -->
                                            <div class="col-sm-3">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="code" class="col-sm-12 col-form-label">Plan</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="code" name="code" value="<?php echo $code ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- End Input Group -->
                                            <div class="col-sm-3">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="code" class="col-sm-12 col-form-label">Aktual</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="code" name="code" value="<?php echo $code ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- Input Group -->
                                            <div class="col-sm-4">
                                                <div class="mb-1 row">
                                                    <label for="ket" class="col-sm-12 col-form-label">Keterangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ket" name="ket" value="<?php echo $ket ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->

                                            <!-- Submit Button -->
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-submit btn-control btn-control-sm col-md-3 col-lg-2" />
                                                    </div>
                                            <!-- End Submit Button -->
                                        </div>

                                    </form>
                                    <!-- End Input Form -->

                                </div>
                                <!-- End Card Body -->

                            </div>
                        </div>
                        <!-- End Card Input -->                    

                    </div>
                    <!-- End Main Content --> 

                </div>
                <!-- End Main Section-->

            </div>
        </div>
    </section>
    <!-- End Main -->

    <!--Table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function () {
    $('#show_table').DataTable({
        scrollY: 430,
        scrollX: true,
    });
    });    
    </script>
   

    <!-- Template Main JS File -->
    <?php include '../../layout/js.php' ?>
 <!-- footer Files -->
 <?php include '../../layout/footer.php' ?>
</body>
<!-- End Body Section-->

</html>