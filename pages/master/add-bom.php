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
    $error          = "";
    $warning        = "";
    $succeed        = "";
    $tabelnya       = "master_bom";

    
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

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {
        $pnumber           = STRTOUPPER($_POST['pnumber']);
        $pname             = STRTOUPPER($_POST['pname']);
        $pcode             = $_POST['partcode'];
        $model             = $_POST['model'];
        $grupline          = $_POST['grupline'];
        $unikno            = $_POST['unikno'];
        $event             = $_POST['event'];
        $perjam            = $_POST['perjam'];
        $lotbox            = $_POST['lotbox'];
        $cust              = $_POST['cust'];
        $posisi1           = $_POST['posisi1'];
        $posisi2           = $_POST['posisi2'];
        $posisi            = $posisi1. $posisi2;
        $ket               = $_POST['ket'];
        $author            = $_SESSION['name'];


        if ($pnumber && $pname && $kategori && $author) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE $tabelnya SET partnumber='$pnumber', partname='$pname', ket='$ket', edit_at=NOW(), edit_by='$author' where id = '$id'";
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
                    $sql1   = "INSERT INTO $tabelnya values ('', '$pnumber', '$pname','','','$kategori','','','','','', '$ket','', NOW(), '$author','','')";
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
                <div class="col ps-md-3 max-vh-100" data-aos="fade" data-aos-delay="25">
                    <!-- Header-->  
                    <div class="page-header pt-3">
                        <h2>Bill Of Material</h2>
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
                                            <div class="col-md-4" style="border-right : 1px solid #adb5bd">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="pnumber" class="col-sm-12 col-form-label">Partnumber</label>
                                                    <div class="col-sm-12">
                                                    <select name="partnumber" id="partnumber" class="form-control-sm form-control">
                                                        <option value="<?php echo $grupline ?>"><?php echo $grupline ?></option>
                                                            <?php
                                                            $sql = mysqli_query($conn, "SELECT id,partnumber FROM master_barang where kategori='Barang Jadi' or kategori='Barang Setangah Jadi(WIP)' order by create_at");
                                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                                ?>
                                                                <option value="<?php echo $data['partnumber']; ?>"><?php echo $data['partnumber']; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                     </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="pname" class="col-sm-12 col-form-label">Partname</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="partname" name="partname">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="pcode" class="col-sm-12 col-form-label">Partcode</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="pcode" name="pcode" value="<?php echo $pname ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <label for="unikno" class="col-sm-12 col-form-label">Unique No</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="unkino" name="unikno" value="<?php echo $pname ?>">
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
                                                    <label for="line" class="col-sm-12 col-form-label">Line</label>
                                                    <div class="col-sm-12">
                                                    <select name="line" id="line" class="form-control-sm form-control">
                                                        <option value="<?php echo $grupline ?>"><?php echo $grupline ?></option>
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
                                                
                                                
                                                <!-- End Input Item -->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                        <label for="perjam" class="col-sm-12 col-form-label">Kapasitas /jam</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm" id="perjam" name="perjam" value="<?php echo $ket ?>">
                                                        </div>
                                                </div>
                                                <div class="mb-1 row">
                                                        <label for="lotbox" class="col-sm-12 col-form-label">Qty /box</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm" id="lotbox" name="lotbox" value="<?php echo $ket ?>">
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
                                                <div class="mb-1 row">
                                                    <label for="ket" class="col-sm-12 col-form-label">Keterangan</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="ket" name="ket" value="<?php echo $ket ?>">
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
                                                <th scope="col">Partcode</th>
                                                <th scope="col">Partnumber</th>
                                                <th scope="col">Partname</th>
                                                <th scope="col">Unique No</th>
                                                <th scope="col">Model</th>
                                                <th scope="col">Posisi</th>
                                                <th scope="col">Line</th>
                                                <th scope="col">Qty /box</th>
                                                <th scope="col">Kapasitas /jam</th>
                                                <th scope="col">Event</th>
                                                <th scope="col">Customer</th>
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
                                                $pnumber        = $r1['partnumber'];
                                                $pname          = $r2['partname'];
                                                $pcode          = $r2['partcode'];
                                                $model          = $r2['model'];
                                                $grupline       = $r2['grupline'];
                                                $unikno         = $r2['unikno'];
                                                $event          = $r2['event'];
                                                $perjam         = $r2['perjam'];
                                                $lotbox         = $r2['lotbox'];
                                                $cust           = $r2['cust'];
                                                $posisi         = $r2['posisi'];
                                                $ket            = $r2['ket'];
                                                $author         = $r2['author'];
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="add-barang-detail.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                                        <a href="add-barang.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $pcode ?></td>
                                                    <td scope="row"><?php echo $pnumber  ?></td>
                                                    <td scope="row"><?php echo $pname  ?></td>
                                                    <td scope="row"><?php echo $unikno ?></td>
                                                    <td scope="row"><?php echo $model ?></td>
                                                    <td scope="row"><?php echo $posisi ?></td>
                                                    <td scope="row"><?php echo $grupline ?></td>
                                                    <td scope="row"><?php echo $posisi ?></td>
                                                    <td scope="row"><?php echo $lotbox ?></td>
                                                    <td scope="row"><?php echo $perjam ?></td>
                                                    <td scope="row"><?php echo $event ?></td>
                                                    <td scope="row"><?php echo $cust ?></td>
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
   <script>
		$(function() {
			$("#partnumber").change(function(){
				var nis = $("#partnumber").val();
 
				$.ajax({
					url: 'proses-bom.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'partnumber': partnumber
					},
					success: function (master_barang) {
						$("#partname").val(master_barang['partname']);
					}
				});
			});
 
			$("form").submit(function(){
				alert("Keep learning");
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