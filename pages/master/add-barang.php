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
    
    $pnumber        = "";
    $pname          = "";
    $model          = "";
    $kategori       = "";
    $supplier       = "";
    $jenis          = "";
    $cust           = "";
    $event          = "";
    $satuan         = "";
    $line           = "";
    $lvl0           = "";
    $lvl1           = "";
    $lvl2           = "";
    $lvl3           = "";
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
        $model          = $r1['model'];
        $kategori       = $r1['kategori'];
        $supplier       = $r1['suppplier'];
        $jenis          = $r1['jenis'];
        $cust           = $r1['customer'];
        $event          = $r1['event'];
        $satuan         = $r1['satuan'];
        $line           = $r1['line'];
        $lvl0           = $r1['level0'];
        $lvl1           = $r1['level1'];
        $lvl2           = $r1['level2'];
        $lvl3           = $r1['level3'];
        $author         = $_SESSION['name'];

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {
        $pname          = STRTOUPPER($_POST['pname']);
        $pnumber        = STRTOUPPER($_POST['pnumber']);
        $cust           = $_POST['cust'];
        $model          = $_POST['model'];
        $kategori       = $_POST['kategori'];
        $supplier       = $_POST['suppplier'];
        $jenis          = $_POST['jenis'];
        $event          = $_POST['event'];
        $satuan         = $_POST['satuan'];
        $line           = $_POST['line'];
        $lvl0           = $_POST['level0'];
        $lvl1           = $_POST['level1'];
        $lvl2           = $_POST['level2'];
        $lvl3           = $_POST['level3'];
        $author         = $_SESSION['name'];

        if ($pname && $pnumber && $satuan && $kategori) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE $tabelnya SET partnumber='$pnumber',
                                                    partname='$pname', 
                                                    customer='$cust',
                                                    model='$model',
                                                    kategori='$kategori',
                                                    supplier='$pname', 
                                                    jenis='$cust',
                                                    'event'='$model',
                                                    satuan='$pnumber',
                                                    'line'='$pname', 
                                                    level0='$lvl0',
                                                    level1='$lvl1',
                                                    level2='$lvl2',
                                                    level3='$lvl3',
                                                    edit_at=NOW(), 
                                                    edit_by='$author' 
                                                    where id = '$id'";
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
                $cek    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $tabelnya WHERE nama='$nama' or code='$code'"));
                if ($cek > 0){
                    $error           = "Nama Supplier atau kode Supplier sudah ada";
                }else {
                    $sql1   = "INSERT INTO $tabelnya values ('', '$nama', '$code', '$cust', NOW(), '$author','','')";
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
                                                    <label for="name" class="col-sm-12 col-form-label">Nama Event</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $nama ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- End Input Group -->
                                            <!-- Input Group -->
                                            <div class="col-md-4">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="code" class="col-sm-12 col-form-label">Code Event</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="code" name="code" value="<?php echo $code ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- End Input Group -->
                                            <!-- Input Group -->
                                            <div class="col-md-3">
                                                <div class="mb-1 row">
                                                    <label for="cust" class="col-sm-12 col-form-label">Customer Code</label>
                                                    <select name="cust" id="cust" class="form-control-sm form-control">
                                                        <option value="<?php echo $cust ?>"><?php echo $cust ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idcust,custcode FROM master_customer order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['idcust']; ?>"><?php echo $data['custcode']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
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
                                                <th scope="col">Event Code</th>
                                                <th scope="col">customer</th>
                                                <th scope="col">Author</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sql2   = "SELECT u.id, u.nama, u.code, c.custcode, u.author FROM master_event as u join master_customer as c on u.customer=c.idcust ORDER BY u.create_at DESC";
                                            $q2     = mysqli_query($conn, $sql2);
                                            $q3     = mysqli_num_rows($q2);
                                            $order   = 1;
                                            while ($r2 = mysqli_fetch_array($q2)) {
                                                $id             = $r2['id'];
                                                $nama           = $r2['nama'];
                                                $code           = $r2['code'];
                                                $cust           = $r2['custcode'];
                                                $author         = $r2['author'];
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="add-event.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                                        <a href="add-event.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $nama  ?></td>
                                                    <td scope="row"><?php echo $code ?></td>
                                                    <td scope="row"><?php echo $cust ?></td>
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