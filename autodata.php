<?php
include 'config/autocomplete.php';

$term = $_GET['term'];
 
$query = $pdo->prepare("select * from mst_mg where nama like '%".$term."%'");
$query->execute();
$json = array();
while($datacust = $query->fetch()) {
	$json[] = array(
		'label' => $datacust['nama'], // text sugesti saat user mengetik di input box
		'value' => $datacust['nama'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
        'nama' => $datacust['nama'],
		'no_tlp' => $datacust['no_tlp'],
		'lokasi' => $datacust['lokasi'],
	
		
	);
}
header("Content-Type: text/json");
echo json_encode($json);
?>