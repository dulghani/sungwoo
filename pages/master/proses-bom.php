<?php
include '../../connect.php';
 
$query = mysqli_query($conn, "SELECT * FROM master_barang WHERE partnumber='".mysqli_escape_string($conn, $_POST['partnumber'])."'");
$data = mysqli_fetch_array($query);
 
echo json_encode($data);