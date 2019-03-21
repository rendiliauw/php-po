<?php
	
	//Sesuaikan config mysql nya
    $dns 		= "mysql:host=localhost;dbname=purchase_order";
	$db_user 	= "root";
	$db_pass 	= "";
 
	try {
        $pdo = new PDO($dns, $db_user, $db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));      
    } catch (PDOException $e) {
        echo "Koneksi ke database gagal: ".$e->getMessage();
        die();
    }
?>