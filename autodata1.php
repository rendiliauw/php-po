<?php
include 'config/autocomplete.php';

$term = $_GET['term'];
 
$query = $pdo->prepare("select * from mst_supplier where perusahaan_s like '%".$term."%'");
$query->execute();
$json = array();
while($datacust = $query->fetch()) {
	$json[] = array(
		'label' => $datacust['perusahaan_s'], // text sugesti saat user mengetik di input box
		'value' => $datacust['perusahaan_s'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
        'nama_s' => $datacust['nama_s'],
        'perusahaan_s' => $datacust['perusahaan_s'],
		'no_tlp_s' => $datacust['no_tlp_s'],
		'alamat_s' => $datacust['alamat_s'],
	
		
	);
}
header("Content-Type: text/json");
echo json_encode($json);
?>