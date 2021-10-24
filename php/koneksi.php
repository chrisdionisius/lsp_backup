<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="lsp_surat";
	$koneksi=mysqli_connect($host,$user,$pass);
	mysqli_select_db($koneksi,$db);
?>