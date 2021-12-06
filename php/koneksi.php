<?php
	$host="172.16.0.2";
	$user="root";
	$pass="root";
	$db="lsp_surat";
	$koneksi=mysqli_connect($host,$user,$pass);
	mysqli_select_db($koneksi,$db);
?>