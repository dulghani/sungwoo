<?php
	header('Content-Type: application/json; charset=utf8');

	$server = "localhost";
	$user 	= "root";
	$pass 	= "";
	$dbname = "swi";
	//koneksi ke database db_country
	$conn = mysqli_connect($server, $user, $pass, $dbname);

	if(!$conn){
		die("Connection Failed: " .mysqli_connect_error());
	}
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