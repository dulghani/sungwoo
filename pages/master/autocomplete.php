<?php
include '../../connect.php';
 
$searchTerm = $_GET['term']; // Menerima kiriman data dari inputan pengguna

$sql="SELECT * FROM master_barang WHERE partnumber LIKE '%".$searchTerm."%' ORDER BY partnumber ASC"; // query sql untuk menampilkan data mahasiswa dengan operator LIKE

$hasil=mysqli_query($conn,$sql); //Query dieksekusi

//Disajikan dengan menggunakan perulangan
while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['partnumber'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
?>