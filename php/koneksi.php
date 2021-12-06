<?php
	$host="172.18.0.2";
	$user="root";
	$pass="root";
	$db="lsp_surat";
	$koneksi=mysqli_connect($host,$user,$pass);
	mysqli_select_db($koneksi,$db);
?>