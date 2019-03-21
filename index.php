<?php
session_start();
ob_start();
if((EMPTY($_SESSION['username'])) AND (EMPTY($_SESSION['password']))){

header('location:login.php');

}else {
  define('INDEX', TRUE);


include('config/koneksi.php');
include('config/autocomplete.php');


//--------header-------> 
include("header.php");
//------------------------->

//-- konten utama website -->
include("konten.php");
//-- /.content-wrapper -->

//-----------Footer---------->
include("footer.php");
//--------------------------->
} 
?>
 