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
    
    $namagru        = "";
    $grupcode       = "";
    $ket            = "";
    $author         = $_SESSION['name'];
    $error          = "";
    $succeed        = "";
    $warning        = "";
    $tabelnya       = "master_grupline";

    
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    
    // DELETE FUNCTION
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "DELETE FROM $tabelnya where idgruline = '$id'";
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
        $sql1           = "SELECT * FROM master_grupline where idgruline = '$id'";
        $q1             = mysqli_query($conn, $sql1);
        $r1             = mysqli_fetch_array($q1);
        $namagru        = $r1['nama_gru'];
        $grupcode       = $r1['grup_code'];
        $ket            = $r1['ket'];
        $author         = $_SESSION['name'];

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {

        $namagru        = STRTOUPPER($_POST['namagru']);
        $grupcode       = STRTOUPPER($_POST['grupcode']);
        $ket            = $_POST['ket'];
        $author         = $_SESSION['name'];

        if ($namagru && $grupcode && $ket && $author) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE master_grupline SET nama_gru='$namagru', grup_code='$grupcode', ket='$ket' where idgruline = '$id'";
                $q1         = mysqli_query($conn, $sql1);
                if ($q1) {
                    $succeed = "Update success";
                    header("refresh:3;url=add-grupline.php");
                } else {
                    $error  = "Update error";
                }
            }
            //Inster Data
            else { 
                $cek    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM master_grupline WHERE nama_gru='$namagru' or grup_code='$grupcode'"));
                if ($cek > 0){
                    $warning           = "Nama Grup Line atau kode Grup Line sudah ada";
                }else {
                    $sql1   = "INSERT INTO master_grupline values ('', '$namagru', '$grupcode', '$ket', NOW(), '$author')";
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
                        <h2>Group Line</h2>
                    </div>
                    <hr class="mb-3">
                    <!-- End Header-->
                    
                    <!-- Main Content --> 
                    <div class="row justify-content-md-center">

                        <!-- Card Input -->
                        <div class="col-lg-9 col-md-12 mb-3">
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
                                    if ($warning) {
                                    ?>

                                        <div class="alert alert-warning  d-flex align-items-center mb-2" role="alert">
                                            <?php echo $warning ?>
                                        </div>

                                    <?php
                                        //header("refresh:3;url=qc-reject-material.php");
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

                                    <!-- Input Form -->
                                    <form action="" method="POST">
                                        <div class="row">

                                            <!-- Input Group -->
                                            <div class="col-md-4">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="namagru" class="col-sm-12 col-form-label">Nama Group Line</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="namagru" name="namagru" value="<?php echo $namagru ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->
                                            <div class="col-md-3">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="grupcode" class="col-sm-12 col-form-label">Group Line Kode</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="grupcode" name="grupcode" value="<?php echo $grupcode ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->

                                            <!-- Input Group -->
                                            <div class="col-md-5">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="ket" class="col-sm-12 col-form-label">Keterangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="textarea" class="form-control form-control-sm" id="ket" name="ket" value="<?php echo $ket ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->

                                            <!-- Submit Button -->
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-submit col-md-3 col-lg-2" />
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

                        <!-- Table -->
                        <div class="col-lg-12 col-md-12">
                            <div class="container shadow px-4 py-4">
                                <!-- Table Content -->
                                <div class="table-responsive-lg">                                
                                    <table id="grupline_table" class="table-sm display nowrap table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">#</th>
                                                <th scope="col">Name Group Line</th>
                                                <th scope="col">Line Code</th>
                                                <th scope="col">Ket</th>
                                                <th scope="col">Author</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sql2   = "SELECT * FROM master_grupline where idgruline!='0' ORDER BY create_at DESC";
                                            $q2     = mysqli_query($conn, $sql2);
                                            $order   = 1;
                                            while ($r2 = mysqli_fetch_array($q2)) {
                                                $id             = $r2['idgruline'];
                                                $namagru       = $r2['nama_gru'];
                                                $grupcode       = $r2['grup_code'];
                                                $ket           = $r2['ket'];
                                                $author         = $r2['author'];
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="add-grupline.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                                        <a href="add-grupline.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $namagru  ?></td>
                                                    <td scope="row"><?php echo $grupcode ?></td>
                                                    <td scope="row"><?php echo $ket ?></td>
                                                    <td scope="row"><?php echo $author ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>                                           
                                    </table>
                                </div>
                                <!-- End Table Content -->
                            </div>
                        </div>
                        <!-- End Table -->


                        

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
    $('#grupline_table').DataTable({
        scrollY: 400,
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