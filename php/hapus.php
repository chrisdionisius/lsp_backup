<?php
include 'koneksi.php';
session_start();
$id = $_GET['nomor'];
$path = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT direktori FROM surat WHERE nomor='$id'"));
unlink("../".$path[direktori]);
$result = mysqli_query($koneksi, "DELETE FROM surat WHERE nomor='$id'");
$_SESSION['delete'] = "Data surat berhasil dihapus";
header("Location:../index.php");
?>