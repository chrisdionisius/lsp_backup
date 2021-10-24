<?php
    session_start();
    include 'master.php';
    $listKategori = mysqli_query($koneksi,"SELECT * FROM kategori");
    $surat = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM surat WHERE nomor = '$_GET[nomor]'"));
    $date = date('Y-m-d, G:i', strtotime('now'));
    $dir = $surat['direktori'];

    if (isset($_POST['submit'])) {
        if (!empty($_FILES['surat']['name'])) {
            unlink($surat[direktori]);
            $namaFile = $_FILES['surat']['name'];
            $namaSementara = $_FILES['surat']['tmp_name'];
            $dirUpload = "surat/";
            $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
            $dir = $dirUpload.$namaFile;
        }

        $query_run = mysqli_query($koneksi,
        "UPDATE surat SET 
         kategori_id =  '$_POST[kategori]',
         judul = '$_POST[judul]',
         tanggal = '$date',
         direktori = '$dir' 
         WHERE nomor = '$surat[nomor]' ");
        if ($query_run) {
            $_SESSION['status'] = "Data surat berhasil diperbarui";
            header("Location: index.php");
        }else{
            echo "Data gagal diperbarui";
            mysqli_error($query_run);
        }

    }
?>
<div class="d-flex" id="wrapper">
    <?php
        include 'sidebar.php';
    ?>
    <div id="page-content-wrapper">
        <div class="container">
            <h2 class="mt-4">Arsip Surat >> Edit</h1>
                <p>Edit dan Unggah surat yang telah terbit pada form ini untuk diarsipkan</p>
                <p>Catatan: </p>
                <ul>
                    <li>Gunakan file berformat PDF</li>
                </ul>
        </div>
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row g-3 align-items-center p-2">
                    <div class="col-sm-2">
                        <label for="inputPassword6" class="col-form-label">Nomor Surat</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="nomor" id="nomor" class="form-control" disabled
                            value="<?php echo $surat['nomor'] ?>">
                    </div>
                </div>
                <div class="row g-3 align-items-center p-2">
                    <div class="col-sm-2">
                        <label for="inputPassword6" class="col-form-label">Kategori</label>
                    </div>
                    <div class="col-sm-5">
                        <select class="form-select" name="kategori" id="kategori">
                            <?php
                                foreach ($listKategori as $kategori) {
                                    if ($kategori[id] == $surat[kategori_id]) {
                                        echo"<option value='$kategori[id]' selected>$kategori[nama_kategori]</option>";
                                    }else{
                                        echo"<option value='$kategori[id]'>$kategori[nama_kategori]</option>";
                                    }
                                    
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center p-2">
                    <div class="col-sm-2">
                        <label for="inputPassword6" class="col-form-label">Judul</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="judul" id="judul" class="form-control"
                            value="<?php echo $surat['judul'] ?>">
                    </div>
                </div>
                <div class="row g-3 align-items-center p-2">
                    <div class="col-sm-2">
                        <label for="inputFile" class="col-form-label">File Surat(PDF)</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="file" class="form-control-file" id="surat" accept="application/pdf" name="surat">
                    </div>
                </div>
                <a class="btn btn-outline-warning" href="index.php" role="button">
                    << Kembali</a>
                        <input class="btn btn-outline-primary" type="submit" value="submit" name="submit">
            </form>
        </div>
        <div class="container">

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>