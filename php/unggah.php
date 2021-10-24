<?php
session_start();
include 'koneksi.php';
$date = date('Y-m-d, G:i', strtotime('now'));
$dir = "";

$namaFile = $_FILES['surat']['name'];
$namaSementara = $_FILES['surat']['tmp_name'];

$dirUpload = "surat/";
$terupload = move_uploaded_file($namaSementara, '../'.$dirUpload.$namaFile);

if (isset($_POST['submit'])) {
    if ($terupload) {
        $dir = $dirUpload.$namaFile;
    }
    $query_run = mysqli_query($koneksi,
    "INSERT INTO surat 
        (nomor,kategori_id,judul,tanggal,direktori) 
    values 
        ('$_POST[nomor]','$_POST[kategori]','$_POST[judul]','$date','$dir')
    ");
    if ($query_run) {
        $_SESSION['status'] = "Data surat berhasil disimpan";
        header("Location: ../index.php");
    }else{
        echo "Data gagal diunggah";
    }
    
}
?>