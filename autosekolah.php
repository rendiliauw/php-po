<?php
include 'config/autocomplete.php';

$term = $_GET['term'];
 
$query = $pdo->prepare("select * from mst_unit where nama_unit like '%".$term."%'");
$query->execute();
$json = array();
while($datacust = $query->fetch()) {
	$json[] = array(
		'label' => $datacust['nama_unit'], // text sugesti saat user mengetik di input box
		'value' => $datacust['nama_unit'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
        'sekolah_1' => $datacust['nama_unit']
		
	
		
	);
}
header("Content-Type: text/json");
echo json_encode($json);
?>