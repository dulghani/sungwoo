<!-- PHP Connection-->
<?php
    session_start(); 
    include "../../connect.php";    
?>
<!-- End PHP Connection-->

<!-- PHP Function -->
<?php
    $date           = "";
    //$no_lpb       = "";
    //$part_number  = "";
    $part_name      = "";
    //$supplier     = "";
    //$category     = "";
    $problem        = "";
    $note           = "";
    $location       = "";
    $qty            = "";
    $date_to_whs    = "";
    $error          = "";
    $succeed        = "";

    
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    
    // DELETE FUNCTION
    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql1       = "DELETE FROM raw_data_reject where id = '$id'";
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
        $sql1           = "SELECT * FROM raw_data_reject where id = '$id'";
        $q1             = mysqli_query($conn, $sql1);
        $r1             = mysqli_fetch_array($q1);
        $date           = $r1['date'];
        $no_lpb         = $r1['no_lpb'];
        $part_number    = $r1['part_number'];
        $part_name      = $r1['part_name'];
        $supplier       = $r1['supplier'];
        $category       = $r1['category'];
        $problem        = $r1['problem'];
        $note           = $r1['note'];
        $location       = $r1['location'];
        $qty            = $r1['qty'];
        $date_to_whs    = $r1['date_to_whs'];

        if ($id == '') {
            $error = "Data tidak ditemukan";
        }
    }

    // SUBMIT FUNCTION
    if (isset($_POST['submit'])) {
        $date           = $_POST['date'];
        //$no_lpb       = $_POST['no_lpb'];
        //$part_number  = $_POST['part_number'];
        $part_name      = $_POST['part_name'];
        //$supplier     = $_POST['supplier'];
        //$category     = $_POST['category'];
        $problem        = $_POST['problem'];
        $note           = $_POST['note'];
        $location       = $_POST['location'];
        $qty            = $_POST['qty'];
        $date_to_whs    = $_POST['date_to_whs'];

        if ($date && $part_name && $problem && $location && $qty && $date_to_whs) {
            //Update Data
            if ($op == 'edit') { 
                $sql1       = "UPDATE raw_data_reject SET date='$date', part_name='$part_name', problem = '$problem', note='$note', location='$location', qty='$qty', date_to_whs='$date_to_whs' where id = '$id'";
                $q1         = mysqli_query($conn, $sql1);
                if ($q1) {
                    $succeed = "Update success";
                    header("refresh:3;url=qc-reject-material.php");
                } else {
                    $error  = "Update error";
                }
            }
            //Inster Data
            else { 
                $sql1   = "INSERT INTO raw_data_reject values ('', '$date', '', '', '$part_name', '', '', '$problem', '$note', '$location', '$qty', '$date_to_whs')";
                $q1     = mysqli_query($conn, $sql1);
                if ($q1) {
                    $succeed      = "Submission success";
                    $date           = "";
                    //$no_lpb       = "";
                    //$part_number  = "";
                    $part_name      = "";
                    //$supplier     = "";
                    //$category     = "";
                    $problem        = "";
                    $note           = "";
                    $location       = "";
                    $qty            = "";
                    $date_to_whs    = "";
                } else {
                    $error      = "Submission error";
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
                        <h2>Reject Material</h2>
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
                                            <div class="col-md-6">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="date" class="col-sm-12 col-form-label">Date</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control form-control-sm datepicker_input" id="date" name="date" value="<?php echo $date ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                                
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="part_name" class="col-sm-12 col-form-label">Part Name</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="part_name" name="part_name" value="<?php echo $part_name ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="problem" class="col-sm-12 col-form-label">Problem</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="problem" name="problem" value="<?php echo $problem ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="note" class="col-sm-12 col-form-label">Note</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="note" name="note" value="<?php echo $note ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                            </div>
                                            <!-- End Input Group -->

                                            <!-- Input Group -->
                                            <div class="col-md-6">

                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="location" class="col-sm-12  col-form-label">Location</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="location" name="location" value="<?php echo $location ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->
                                                
                                                <!-- Input Item -->
                                                <div class="mb-1 row">
                                                    <label for="qty" class="col-sm-12  col-form-label">Quantity</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm" id="qty" name="qty" value="<?php echo $qty ?>">
                                                    </div>
                                                </div>
                                                <!-- End Input Item -->

                                                <!-- Input Item -->
                                                <div class="mb-4 row">
                                                    <label for="date_to_whs" class="col-sm-12 col-form-label">Date to WHS</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control form-control-sm datepicker_input" id="date_to_whs" name="date_to_whs" value="<?php echo $date_to_whs ?>">
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
                                    <table id="reject_table" class="table table-sm display nowrap table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">No LPB</th>
                                                <th scope="col">Part Number</th>
                                                <th scope="col">Part Name</th>
                                                <th scope="col">Supplier</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Problem</th>
                                                <th scope="col">Note</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">Date to WHS</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sql2   = "SELECT * FROM raw_data_reject ORDER BY id DESC";
                                            $q2     = mysqli_query($conn, $sql2);
                                            $order   = 1;
                                            while ($r2 = mysqli_fetch_array($q2)) {
                                                $id             = $r2['id'];
                                                $date           = $r2['date'];
                                                $no_lpb         = $r2['no_lpb'];
                                                $part_number    = $r2['part_number'];
                                                $part_name      = $r2['part_name'];
                                                $supplier       = $r2['supplier'];
                                                $category       = $r2['category'];
                                                $problem        = $r2['problem'];
                                                $note           = $r2['note'];
                                                $location       = $r2['location'];
                                                $qty            = $r2['qty'];
                                                $date_to_whs    = $r2['date_to_whs'];

                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <a href="qc-reject-material.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                                        <a href="qc-reject-material.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete the data?')"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>            
                                                    </td>
                                                    <th scope="row"><?php echo $order++ ?></th>
                                                    <td scope="row"><?php echo $date  ?></td>
                                                    <td scope="row"><?php echo $no_lpb ?></td>
                                                    <td scope="row"><?php echo $part_number ?></td>
                                                    <td scope="row"><?php echo $part_name  ?></td>
                                                    <td scope="row"><?php echo $supplier ?></td>
                                                    <td scope="row"><?php echo $category ?></td>
                                                    <td scope="row"><?php echo $problem ?></td>
                                                    <td scope="row"><?php echo $note ?></td>
                                                    <td scope="row"><?php echo $location ?></td>
                                                    <td scope="row"><?php echo $qty ?></td>
                                                    <td scope="row"><?php echo $date_to_whs ?></td>
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
    $('#reject_table').DataTable({
        scrollY: 500,
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