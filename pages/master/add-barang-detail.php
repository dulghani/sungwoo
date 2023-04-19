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
    $posisi1        = "";
    $posisi2        = "";
    $posisi         = "";
    $pss_ex         = "";
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
        $model          = $r1['model'];
        $ket            = $r1['ket'];
        $kategori       = $r1['kategori'];
        $supplier       = $r1['supplier'];
        $jenis          = $r1['jenis'];
        $cust           = $r1['customer'];
        $event          = $r1['namaevent'];
        $posisi         = $r1['posisi'];
        $pss_ex         = explode(" ", $posisi);
        $posisi1        = $pss_ex[0]. ' ';
        $posisi2        = $pss_ex[1];
        $satuan         = $r1['satuan'];
        $line           = $r1['grupline'];
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
        $ket            = STRTOUPPER($_POST['ket']);
        $kategori       = $_POST['kategori'];
        $supplier       = $_POST['supplier'];
        $jenis          = $_POST['jenis'];
        $event          = $_POST['event'];
        $satuan         = $_POST['satuan'];
        $line           = $_POST['line'];
        $posisi1        = $_POST['pss1'];
        $posisi2        = $_POST['posisi'];
        $posisi         = $posisi1.$posisi2;
        $author         = $_SESSION['name'];

        if ($pname && $pnumber && $satuan && $kategori) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE $tabelnya SET partnumber='$pnumber',
                                                    partname='$pname',
                                                    ket='$ket', 
                                                    customer='$cust',
                                                    model='$model',
                                                    kategori='$kategori',
                                                    supplier='$supplier', 
                                                    jenis='$jenis',
                                                    namaevent='$event',
                                                    satuan='$satuan',
                                                    grupline='$line', 
                                                    posisi='$posisi',
                                                    edit_at=NOW(), 
                                                    edit_by='$author' 
                                                    where id = '$id'";
                $q1         = mysqli_query($conn, $sql1);
                if ($q1) {
                    $succeed = "Update success";
                    //header("refresh:3;url=add-barang-detail.php");
                } else {
                    $error  = 'Update error :'.  mysqli_error($conn);
                }
            }
            //Inster Data
            else { 
                $cek    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $tabelnya WHERE partnumber='$pnumber'"));
                if ($cek > 0){
                    $error           = "Parnumber sudah ada";
                }else {
                    $sql1   = "INSERT INTO $tabelnya values ('', '$pnumber', '$pname', '$model','$posisi', '$ket', '$kategori','$supplier','$jenis','$cust','$event','$line','$satuan','$lvl0','$lvl1','$lvl2','$lvl3', NOW(), '$author','','')";
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
                        <h2><a class="h5 mb-0 text-gray-800" href="add-barang.php">Barang/</a> <span class="h3 mb-0 text-gray-800">Detail Barang</span></h2>
                    </div>
                    <hr class="mb-3">
                    <!-- End Header-->
                    
                    <!-- Main Content --> 
                    <div class="row justify-content-md-center">
                        <!-- Table
                       <div class="col-lg-12 col-md-12">
                            <div class="container shadow px-4 py-4">
                                Table Content
                                <div class="table-responsive-lg">                                
                                    <table id="show_table" class="table-sm display nowrap table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">#</th>
                                                <th scope="col">Partnumber</th>
                                                <th scope="col">Partname</th>
                                                <th scope="col">Model</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Satuan</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Supplier</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Line</th>
                                                <th scope="col">Event</th>
                                                <th scope="col">Author</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sql2   = "SELECT b.id,b.partnumber,b.partname,b.kategori,b.jn   FROM $tabelnya as b 
                                                       outer join master_customer as c on b.customer=c.idcust 
                                                       outer join master_model as m on b.model=m.idmodel
                                                       outer join master_satuan as t on b.satuan=t.idsat
                                                       outer join master_supplier as s on b.supplier=s.idsup
                                                       outer join master_grupline as l on b.line=l.idgruline
                                                       outer join master_event as e on b.event=e.idevent
                                                       ORDER BY b.create_at DESC";
                                            $q2     = mysqli_query($conn, $sql2);
                                            $order   = 1;
                                            while ($r2 = mysqli_fetch_array($q2)) {
                                                $id             = $r2['b.id'];
                                                $pnumber        = $r2['b.partnumber'];
                                                $pname          = $r2['b.partname'];
                                                $kategori       = $r2['b.kategori'];
                                                $jenis          = $r2['b.jenis'];
                                                $ket            = $r2['b.ket'];
                                                $cust           = $r2['c.custcode'];
                                                $model          = $r2['m.namamodel'];
                                                $satuan         = $r2['t.codesat'];
                                                $supplier       = $r2['s.supcode'];
                                                $line           = $r2['l.nama_gru'];
                                                $event          = $r2['e.namaevent'];
                                                $author         = $r2['b.author'];
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="add-barang.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                                        <a href="add-barang.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $pnumber ?></td>
                                                    <td scope="row"><?php echo $pname ?></td>
                                                    <td scope="row"><?php echo $model ?></td>
                                                    <td scope="row"><?php echo $ket ?></td>
                                                    <td scope="row"><?php echo $satuan ?></td>
                                                    <td scope="row"><?php echo $kategori ?></td>
                                                    <td scope="row"><?php echo $supplier ?></td>
                                                    <td scope="row"><?php echo $jenis ?></td>
                                                    <td scope="row"><?php echo $cust ?></td>
                                                    <td scope="row"><?php echo $line ?></td>
                                                    <td scope="row"><?php echo $event ?></td>
                                                    <td scope="row"><?php echo $author ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>                                           
                                    </table>
                                </div>
                                End Table Content
                            </div>
                        </div>
                        End Table -->

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
                                                    <label for="pnumber" class="col-sm-12 col-form-label">Partnumber</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="pnumber" name="pnumber" value="<?php echo $pnumber ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="pname" class="col-sm-12 col-form-label">Partname</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="pname" name="pname" value="<?php echo $pname ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="model" class="col-sm-12 col-form-label">Model</label>
                                                    <div class="col-sm-12">
                                                        <select name="model" id="model" class="form-control-sm form-control">
                                                        <option value="<?php echo $model ?>"><?php echo $model ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idmodel,namamodel FROM master_model where idmodel!='0' order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['namamodel']; ?>"><?php echo $data['namamodel']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="mb-1 row">
                                                    <label for="line" class="col-sm-12 col-form-label">Line</label>
                                                    <div class="col-sm-12">
                                                    <select name="line" id="line" class="form-control-sm form-control">
                                                        <option value="<?php echo $line ?>"><?php echo $line ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idgruline,nama_gru FROM master_grupline where idgruline!='0' order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['nama_gru']; ?>"><?php echo $data['nama_gru']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="ket" class="col-sm-12 col-form-label">Keterangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="ket" name="ket" value="<?php echo $ket ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <!-- End Input Group -->
                                            <!-- Input Group -->
                                            <div class="col-md-4">
                                                <!-- Input Item -->
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
                                                    <label for="posisi" class="col-sm-12 col-form-label">Posisi</label>
                                                    <div class="col-sm-6">
                                                    <select name="pss1" id="pss1" class="form-control-sm form-control">
                                                        <option value="<?php echo $posisi1 ?>"><?php echo $posisi1 ?></option>
                                                        <option value="F ">F</option>
                                                        <option value="R ">R</option>
                                                        <option value="R2 ">R2</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <select name="posisi" id="posisi" class="form-control-sm form-control">
                                                        <option value="<?php echo $posisi2 ?>"><?php echo $posisi2 ?></option>
                                                        <option value="LH">LH</option>
                                                        <option value="RH">RH</option>
                                                        <option value="CTR">CTR</option>
                                                        <option value="LH-CTR">LH-CTR</option>
                                                        <option value="RH-CTR">RH-CTR</option>
                                                        <option value="LH-RH">LH-RH</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="author" class="col-sm-12 col-form-label">Author</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="ket" name="author" readonly value="<?php echo $author ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                <!-- <label for="level2" class="col-sm-12 col-form-label">Level 2</label>
                                                    <div class="col-sm-12">
                                                    <select name="level2" id="level2" class="form-control-sm form-control">
                                                        <option value="<?php echo $lvl2 ?>"><?php echo $lvl2 ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idsat,codesat FROM master_satuan order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['idsat']; ?>"><?php echo $data['codesat']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div> -->
                                                </div>
                                                <div class="mb-1 row">
                                                    <!-- <label for="name" class="col-sm-12 col-form-label">Level 3</label>
                                                    <div class="col-sm-12">
                                                    <select name="level3" id="level3" class="form-control-sm form-control">
                                                        <option value="<?php echo $lvl3 ?>"><?php echo $lvl3 ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idsat,codesat FROM master_satuan order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['idsat']; ?>"><?php echo $data['codesat']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div> -->
                                                </div>
                                                <!-- End Input Item -->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="ktgr" class="col-sm-12 col-form-label">kategori</label>
                                                    <div class="col-sm-12">
                                                        <select name="kategori" id="kategori" class="form-control-sm form-control">
                                                        <option value="<?php echo $kategori ?>"><?php echo $kategori ?></option>
                                                        <option value="Bahan Baku">Bahan Baku</option>
                                                        <option value="Barang Setangah Jadi(WIP)">Barang Setangah Jadi(WIP)</option>
                                                        <option value="Barang Jadi">Barang Jadi</option>
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
                                                <div class="mb-1 row">
                                                    <label for="jenis" class="col-sm-12 col-form-label">Jenis</label>
                                                    <div class="col-sm-12">
                                                    <select name="jenis" id="katjenisegori" class="form-control-sm form-control">
                                                        <option value="<?php echo $jenis ?>"><?php echo $jenis ?></option>
                                                        <option value="Lokal">Lokal</option>
                                                        <option value="Import">Import</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="cust" class="col-sm-12 col-form-label">Customer</label>
                                                    <div class="col-sm-12">
                                                        <select name="cust" id="cust" class="form-control-sm form-control">
                                                        <option value="<?php echo $cust ?>"><?php echo $cust ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idcust,custcode FROM master_customer where idcust!='0' order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['custcode']; ?>"><?php echo $data['custcode']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="event" class="col-sm-12 col-form-label">Event</label>
                                                    <div class="col-sm-12">
                                                        <select name="event" id="event" class="form-control-sm form-control">
                                                        <option value="<?php echo $event ?>"><?php echo $event ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT idevent,namaevent FROM master_event where idevent!='0' order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['namaevent']; ?>"><?php echo $data['namaevent']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
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

                    </div>
                    <!-- End Main Content --> 

                </div>
                <!-- End Main Section-->

            </div>
        </div>
    </section>
    <!-- End Main -->

    <?php include '../../layout/js.php' ?>
    <script>
    $(document).ready(function () {
    $('#show_table').DataTable({
        scrollY: true,
        scrollX: true,
    });
    });    
    </script>
   

    <!-- Template Main JS File -->
 
 <!-- footer Files -->
 <?php include '../../layout/footer.php' ?>
</body>
<!-- End Body Section-->

</html>