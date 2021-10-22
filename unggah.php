<?php

include 'koneksi.php';
$date = date('Y-m-d', strtotime('now'));
$dir = "";

$namaFile = $_FILES['surat']['name'];
$namaSementara = $_FILES['surat']['tmp_name'];

$dirUpload = "surat/";
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if (isset($_POST['submit'])) {
    if ($terupload) {
        $dir = $dirUpload.$namaFile;
    }
    mysqli_query($koneksi,
    "INSERT INTO surat 
    (nomor,kategori_id,judul,tanggal,direktori) 
    values 
    ('$_POST[nomor]','$_POST[kategori]','$_POST[judul]','$date','$dir')
    ");
    header("Location: index.php");
}






// $target_dir = "surat/";
// $target_file = $target_dir . basename($_FILES["surat"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// if(isset($_POST["submit"])) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
// }
// if (move_uploaded_file($_FILES["surat"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["surat"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
?>