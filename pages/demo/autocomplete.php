<?php
include '../../connect.php';
 
$term = trim(strip_tags($_GET['term']));
	//query untuk menampilkan data dari tabel country
	$query = mysqli_query($conn, "SELECT * FROM master_barang WHERE partnumber LIKE '%$term%' ");

	$array=array();
	//looping data
	while($data=mysqli_fetch_assoc($query)){	
    	$row['value']=$data['partnumber'];
		//buat array yang nantinya akan di konversi ke json
    	array_push($array, $row);
    }

	//mengubah data object menjadi data json
	echo json_encode($array);
?>