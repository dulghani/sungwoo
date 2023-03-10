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
    
    $pname          = "";
    $pnumber        = "";
    $kategori       = "";
    $satuan         = "";
    $supplier       = "";
    $jenis          = "";
    $ket            = "";
    $author         = $_SESSION['name'];
    $error          = "";
    $succeed        = "";
    $warning        = "";
    $tabelnya       = "master_barang";

    
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    
    // DELETE FUNCTION
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "DELETE FROM $tabelnya where id = '$id'";
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
        $sql1           = "SELECT * FROM $tabelnya where id = '$id'";
        $q1             = mysqli_query($conn, $sql1);
        $r1             = mysqli_fetch_array($q1);
        $pnumber        = $r1['partnumber'];
        $pname          = $r1['partname'];
        $kategori       = $r1['kategori'];
        $satuan         = $r1['satuan'];
        $supplier       = $r1['supplier'];
        $jenis          = $r1['jenis'];
        $ket            = $r1['ket'];
        $author         = $_SESSION['name'];

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {
        $pnumber           = STRTOUPPER($_POST['pnumber']);
        $pname             = STRTOUPPER($_POST['pname']);
        $kategori          = $_POST['kategori'];
        $satuan            = $_POST['satuan'];
        $supplier          = $_POST['supplier'];
        $jenis             = $_POST['jenis'];
        $ket               = $_POST['ket'];
        $author            = $_SESSION['name'];


        if ($pnumber && $pname && $kategori && $satuan && $supplier && $jenis && $author) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE $tabelnya SET partnumber='$pnumber', partname='$pname', ket='$ket',kategori='$kategori',satuan='$satuan',jenis='$jenis',supplier='$supplier', edit_at=NOW(), edit_by='$author' where id = '$id'";
                $q1         = mysqli_query($conn, $sql1);
                if ($q1) {
                    $succeed = "Update success";
                    header("refresh:3;url=add-barang.php");
                } else {
                    $error  = "Update error";
                }
            }
            //Inster Data
            else { 
                $cek    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $tabelnya WHERE partnumber='$pnumber'"));
                if ($cek > 0){
                    $warning           = "Partnumber sudah ada";
                }else {
                    $sql1   = "INSERT INTO $tabelnya values ('', '$pnumber', '$pname','$kategori','$supplier','$jenis','$ket','$ket', NOW(), '$author','','')";
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
                <div class="col ps-md-3 max-vh-100" data-aos="fade" data-aos-delay="50">
                    <!-- Header-->  
                    <div class="page-header pt-3">
                        <h2>Barang</h2>
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

                                    <!-- Input Form -->
                                    <form action="" method="POST">
                                        <div class="row">

                                            <!-- Input Group -->
                                            <div class="col-md-6">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="name" class="col-sm-12 col-form-label">Partnumber</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="pnumber" name="pnumber" value="<?php echo $pnumber ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="name" class="col-sm-12 col-form-label">Partname</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $pname ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="satuan" class="col-sm-12 col-form-label">Satuan</label>
                                                    <div class="col-sm-12">
                                                    <select name="satuan" id="satuan" class="form-control-sm form-control">
                                                        <option value="<?php echo $satuan ?>"><?php echo $satuan ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idsat,codesat FROM master_satuan where idsat!='0' order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['codesat']; ?>"><?php echo $data['codesat']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="supplier" class="col-sm-12 col-form-label">Supplier</label>
                                                    <div class="col-sm-12">
                                                    <select name="supplier" id="supplier" class="form-control-sm form-control">
                                                        <option value="<?php echo $supplier ?>"><?php echo $supplier ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idsup,supcode FROM master_supplier where idsup!='0' order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['supcode']; ?>"><?php echo $data['supcode']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->
                                            <!-- Input Group -->
                                            <div class="col-md-6">

                                                <!-- Input Item -->
                                                
                                                <div class="mb-1 row">
                                                    <label for="jenis" class="col-sm-12 col-form-label">Jenis</label>
                                                    <div class="col-sm-12">
                                                    <select name="jenis" id="katjenisegori" class="form-control-sm form-control">
                                                        <option value="<?php echo $jenis ?>"><?php echo $jenis ?></option>
                                                        <option value="Proses">Proses</option>
                                                        <option value="Lokal">Lokal</option>
                                                        <option value="Import">Import</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="ktgr" class="col-sm-12 col-form-label">Kategori</label>
                                                    <div class="col-sm-12">
                                                        <select name="kategori" id="kategori" class="form-control custom-select">
                                                        <option value="<?php echo $kategori ?>"><?php echo $kategori ?></option>
                                                        <option value="Bahan Baku">Bahan Baku</option>
                                                        <option value="Barang Setangah Jadi(WIP)">Barang Setengah Jadi(WIP)</option>
                                                        <option value="Barang Jadi">Barang Jadi</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="ket" class="col-sm-12 col-form-label">Keterangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-md" id="ket" name="ket" value="<?php echo $ket ?>">
                                                    </div>
                                                </div>

                                                <!-- End Input Item -->
                                                <!-- Submit Button -->
                                                <div class="mb-1 row">
                                                <label for="submit" class="col-sm-12 col-form-label"><span>&nbsp;</span></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-submit btn-control btn-control-sm col-md-12" />
                                                    </div>
                                                </div>
                                            <!-- End Submit Button -->

                                            </div>
                                            <!-- End Input Group -->
                                            
                                            
                                            
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
                                                <th scope="col">Partnumber</th>
                                                <th scope="col">Partname</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Supplier</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col">satuan</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Author</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sql2   = "SELECT * FROM $tabelnya ORDER BY create_at DESC";
                                            $q2     = mysqli_query($conn, $sql2);
                                            $order   = 1;
                                            while ($r2 = mysqli_fetch_array($q2)) {
                                                $id             = $r2['id'];
                                                $pnumber        = $r2['partnumber'];
                                                $pname          = $r2['partname'];
                                                $kategori       = $r2['kategori'];
                                                $jenis          = $r2['jenis'];
                                                $satuan         = $r2['satuan'];
                                                $supplier       = $r2['supplier'];
                                                $ket            = $r2['ket'];
                                                $author         = $r2['author'];
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="add-barang.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                                        <a href="add-barang.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $pnumber  ?></td>
                                                    <td scope="row"><?php echo $pname  ?></td>
                                                    <td scope="row"><?php echo $kategori ?></td>
                                                    <td scope="row"><?php echo $supplier ?></td>
                                                    <td scope="row"><?php echo $jenis ?></td>
                                                    <td scope="row"><?php echo $satuan ?></td>
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