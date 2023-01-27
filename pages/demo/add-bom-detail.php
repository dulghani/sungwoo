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
    
    $partnumber     = "";
    $partname       = "";
    $satuan         = "";
    $pname          = "";
    $pnumber        = "";
    $pcode          = "";
    $posisi         = "";
    $posisi1        = "";
    $posisi2        = "";
    $pss_ex         = "";
    $model          = "";
    $grupline       = "";
    $unikno         = "";
    $event          = "";
    $perjam         = "";
    $lotbox         = "";
    $cust           = "";
    $ket            = "";
    $author         = $_SESSION['name'];
    $qty            = "";
    $idbom          = "";
    $error          = "";
    $warning        = "";
    $succeed        = "";
    $tabelnya       = "master_bom_detail";
    
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    
    // DELETE FUNCTION
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "DELETE FROM master_customer where idcust = '$id'";
        $q1         = mysqli_query($conn,$sql1);
        if($q1){
            $succeed = "Delete Success";
        }else{
            $error  = "Delete error";
        }
    }
    // Detail
    if ($op == 'detail') {
        $idbom          = $_GET['idbom'];
        $sql1           = "SELECT * FROM master_bom where id = '$idbom'";
        $q1             = mysqli_query($conn, $sql1);
        $r1             = mysqli_fetch_array($q1);
        $pnumber        = $r1['partnumber'];
        $pname          = $r1['partname'];
        $pcode          = $r1['partcode'];
        $model          = $r1['model'];
        $grupline       = $r1['grupline'];
        $unikno         = $r1['unikno'];
        $event          = $r1['event'];
        $perjam         = $r1['perjam'];
        $lotbox         = $r1['lotbox'];
        $cust           = $r1['customer'];
        $posisi         = $r1['posisi'];
        $pss_ex         = explode(" ", $posisi);
        $posisi1        = $pss_ex[0]. ' ';
        $posisi2        = $pss_ex[1];
        $ket            = $r1['ket'];
        $author         = $_SESSION['name'];

        if ($idbom == '') {
            $error = "Data tidak ditemukan";
        }
    }
    // EDIT FUNCTION
    if ($op == 'edit') {
        $id             = $_GET['id'];
        $sql1           = "SELECT * FROM master_customer where idcust = '$id'";
        $q1             = mysqli_query($conn, $sql1);
        $r1             = mysqli_fetch_array($q1);
        $namacust       = $r1['namacust'];
        $custcode       = $r1['custcode'];
        $kota           = $r1['alamat'];
        $author         = $_SESSION['name'];

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {
        $partnumber        = STRTOUPPER($_POST['partnumber']);
        $partname          = $_POST['partname'];
        $qty               = $_POST['qty'];
        $satuan            = $_POST['satuan'];
        $author            = $_SESSION['name'];


        if ($idbom && $partnumber && $qty && $author) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE $tabelnya SET partnumber='$partnumber', partname='$partname', qty='$qty', satuan='$satuan', edit_at=NOW(), edit_by='$author' where id = '$id'";
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
                    $error           = "Partnumber sudah ada";
                }else {
                    $sql1   = "INSERT INTO $tabelnya values ('','$idbom', '$pnumber','$pname', '$qty','$satuan', '$author',NOW(),'','')";
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
    <script>
  $( function() {

    $( "#partnumber" ).autocomplete({
      source: "autocomplete.php"
    });
  });
  </script>
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
                        <h2>Coba BOM</h2>
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
                                    <!-- Input Form -->
                                    <form action="" method="POST">
                                        <div class="row">

                                            <!-- Input Group -->
                                            <div class="col-md-4" style="border-right : 1px solid #adb5bd">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="pnumber" class="col-sm-12 col-form-label">Partnumber</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="pnumber" name="pnumber" value="<?php echo $pnumber ?>" readonly>
                                                    </div> 
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="pname" class="col-sm-12 col-form-label">Partname</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="pname" name="pname" value="<?php echo $pname ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="pcode" class="col-sm-12 col-form-label">Partcode</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm " id="pcode" name="pcode" value="<?php echo $pcode ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="unikno" class="col-sm-12 col-form-label">Unique No</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="unikno" name="unikno" value="<?php echo $unikno ?>" readonly>
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- End Input Group -->
                                            <!-- Input Group -->
                                            <div class="col-md-4" style="border-right : 1px solid #adb5bd">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="model" class="col-sm-12 col-form-label">Model</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="model" name="model" value="<?php echo $model ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="posisi" class="col-sm-12 col-form-label">Posisi</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" id="pss1" name="pss1" value="<?php echo $posisi1 ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" id="pss2" name="pss2" value="<?php echo $posisi2 ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="line" class="col-sm-12 col-form-label">Line</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="line" name="line" value="<?php echo $grupline ?>" readonly>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="mb-1 row">
                                                    <label for="cust" class="col-sm-12 col-form-label">Customer</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="cust" name="cust" value="<?php echo $cust ?>" readonly>
                                                    </div>
                                                </div>
                                                
                                                
                                                <!-- End Input Item -->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                        <label for="perjam" class="col-sm-12 col-form-label">Kapasitas /jam</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm" id="perjam" name="perjam" value="<?php echo $perjam ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="mb-1 row">
                                                        <label for="lotbox" class="col-sm-12 col-form-label">Qty /box</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm" id="lotbox" name="lotbox" value="<?php echo $lotbox ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="event" class="col-sm-12 col-form-label">Event</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="event" name="event" value="<?php echo $event ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="ket" class="col-sm-12 col-form-label">Author</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="aut" name="aut" value="<?php echo $author ?>" readonly>
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- Input Group -->
                                            <div class="col-md-3">
                                                
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->

                                            <!-- Submit Button -->
                                            <div class="col-md-12 d-flex justify-content-start">
                                                        <a href="add-bom.php"><button type="button" class="btn btn-warning">Back</button></a>
                                            </div>
                                            <!-- End Submit Button -->
                                        </div>

                                    </form>
                                    <!-- End Input Form -->
                                </div>
                                <!-- End Card Body -->

                            </div>
                        </div>

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
                                            <div class="col-sm-3">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="partnumber" class="col-sm-12 col-form-label">Partnumber</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="partnumber" name="partnumber" onkeyup="autofill()" value="<?php echo $partnumber ?>">
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="partname" class="col-sm-12 col-form-label">Partname</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="partname" name="partname" value="<?php echo $partname ?>" >
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="qty" class="col-sm-12 col-form-label">Qty</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" id="qty" name="qty" value="<?php echo $qty ?>" >
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="satuan" class="col-sm-12 col-form-label">Satuan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="satuan" name="satuan" value="<?php echo $satuan ?>" >
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-end">
                                                        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-submit btn-control btn-control-sm col-md-3 col-lg-2" />
                                                    </div>

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
                                                <th scope="col">partname</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">satuan</th>
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
                                                $qty            = $r2['Qty'];
                                                $satuan         = $r2['Satuan'];
                                                $author         = $r2['Author'];

                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="add-bom-detail.php?op=edit&idbom=<?php echo $idbom ?>&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button></a>
                                                        <a href="add-bom-detail.php?op=delete&idbom=<?php echo $idbom ?>&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger"><i class="bi bi-x-square"></i></button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $pnumber  ?></td>
                                                    <td scope="row"><?php echo $pname  ?></td>
                                                    <td scope="row"><?php echo $qty ?></td>
                                                    <td scope="row"><?php echo $satuan ?></td>
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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
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
   <!--Autofill -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script type="text/javascript">
            function autofill(){
                var partnumber = $("#partnumber").val();
                $.ajax({
                    url: '../master/autofill.php',
                    data:"partnumber="+partnumber ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#partname').val(obj.partname);
                });
            }
        </script>

    <!-- Template Main JS File -->
    <?php include '../../layout/js.php' ?>
 <!-- footer Files -->
 <?php include '../../layout/footer.php' ?>
</body>
<!-- End Body Section-->

</html>