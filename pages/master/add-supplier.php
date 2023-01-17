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
    $kota           = "";
    $author         = $_SESSION['name'];
    $error          = "";
    $succeed        = "";
    $almt           = "";
    $telp           = "";
    $tabelnya       = "master_supplier";

    
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    
    // DELETE FUNCTION
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "DELETE FROM $tabelnya where idsup = '$id'";
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
        $sql1           = "SELECT * FROM $tabelnya where idsup = '$id'";
        $q1             = mysqli_query($conn, $sql1);
        $r1             = mysqli_fetch_array($q1);
        $nama           = $r1['namasup'];
        $code           = $r1['supcode'];
        $almt           = $r1['alamat'];
        $kota           = $r1['kota'];
        $telp           = $r1['telp'];
        $author         = $_SESSION['name'];

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {
        $nama           = STRTOUPPER($_POST['nama']);
        $code           = STRTOUPPER($_POST['code']);
        $kota           = $_POST['kota'];
        $author         = $_SESSION['name'];
        $almt           = $_POST['almt'];
        $telp           = $_POST['telp'];

        if ($nama && $code && $kota && $author) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE $tabelnya SET namasup='$nama', supcode='$code', alamat='$almt', kota='$kota', telp='$telp', edit_at=NOW(), edit_by='$author' where idsup = '$id'";
                $q1         = mysqli_query($conn, $sql1);
                if ($q1) {
                    $succeed = "Update success";
                    header("refresh:3;url=add-supplier.php");
                } else {
                    $error  = "Update error";
                }
            }
            //Inster Data
            else { 
                $cek    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $tabelnya WHERE namasup='$nama' or supcode='$code'"));
                if ($cek > 0){
                    $error           = "Nama Supplier atau kode Supplier sudah ada";
                }else {
                    $sql1   = "INSERT INTO $tabelnya values ('', '$nama', '$code', '$kota', '$almt','$telp', NOW(), '$author','','')";
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
                        <h2>Supplier</h2>
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
                                                    <label for="name" class="col-sm-12 col-form-label">Nama Supplier</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $nama ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-1 row">
                                                    <label for="code" class="col-sm-12 col-form-label">Supplier Kode</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo $code ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->
                                           
                                            <!-- Input Group -->
                                            <div class="col-md-4">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="almt" class="col-sm-12 col-form-label">Alamat</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="almt" name="almt" value="<?php echo $almt ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-1 row">
                                                    <label for="kota" class="col-sm-12 col-form-label">Kota</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="kota" name="kota" value="<?php echo $kota ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->

                                            <!-- Input Group -->
                                            <div class="col-md-3">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="telp" class="col-sm-12 col-form-label">No Telp</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="telp" name="telp" value="<?php echo $telp ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->

                                            <!-- Submit Button -->
                                            <div class="col-md-12 d-flex justify-content-end">
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

                        <!-- Table -->
                        <div class="col-lg-12 col-md-12">
                            <div class="container shadow px-4 py-4">
                                <!-- Table Content -->
                                <div class="table-responsive-lg">                                
                                    <table id="show_table" class="table-sm display nowrap table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">#</th>
                                                <th scope="col">Name Supplier</th>
                                                <th scope="col">Supplier Code</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Kota</th>
                                                <th scope="col">No Telp</th>
                                                <th scope="col">Author</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sql2   = "SELECT * FROM $tabelnya where idsup!='0' ORDER BY create_at DESC";
                                            $q2     = mysqli_query($conn, $sql2);
                                            $order   = 1;
                                            while ($r2 = mysqli_fetch_array($q2)) {
                                                $id             = $r2['idsup'];
                                                $nama           = $r2['namasup'];
                                                $code           = $r2['supcode'];
                                                $almt           = $r2['alamat'];
                                                $kota           = $r2['kota'];
                                                $telp           = $r2['telp'];
                                                $author         = $r2['author'];
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="add-supplier.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                                        <a href="add-supplier.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $nama  ?></td>
                                                    <td scope="row"><?php echo $code ?></td>
                                                    <td scope="row"><?php echo $almt ?></td>
                                                    <td scope="row"><?php echo $kota ?></td>
                                                    <td scope="row"><?php echo $telp ?></td>
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