<?php
include 'config/autocomplete.php';

$term = $_GET['term'];
 
$query = $pdo->prepare("select * from mst_barang where nama_barang like '%".$term."%'");
$query->execute();
$json = array();
while($datacust = $query->fetch()) {
	$json[] = array(
		'label' => $datacust['nama_barang'], // text sugesti saat user mengetik di input box
		'value' => $datacust['nama_barang'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
        'nama_barang_1' => $datacust['nama_barang']
		
	
		
	);
}
header("Content-Type: text/json");
echo json_encode($json);
?>