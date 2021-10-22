<?php
include 'koneksi.php';
$id = $_GET['nomor'];
$path = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT direktori FROM surat WHERE nomor='$id'"));
echo$path[direktori];
unlink($path[direktori]);
$result = mysqli_query($koneksi, "DELETE FROM surat WHERE nomor='$id'");
header("Location:index.php");
?>