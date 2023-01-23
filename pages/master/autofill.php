<?php
include '../../connect.php';
 
$partnumber = $_GET['partnumber'];

//mengambil data
$query = mysqli_query($conn, "select * from master_barang where partnumber='$partnumber'");
$pbarang = mysqli_fetch_array($query);
$data = array(
            'partname'      =>  @$pbarang['partname'],);

//tampil data
echo json_encode($data);
?>