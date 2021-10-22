<?php
    include 'master.php';
    $listKategori = mysqli_query($koneksi,"SELECT * FROM kategori");
?>
<div class="d-flex" id="wrapper">
    <?php
        include 'sidebar.php';
    ?>
    <div id="page-content-wrapper">
        <div class="container">
            <h2 class="mt-4">Arsip Surat >> Unggah</h1>
                <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan</p>
                <p>Catatan: </p>
                <ul>
                    <li>Gunakan file berformat PDF</li>
                </ul>
        </div>
        <div class="container">
            <form action="unggah.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3 align-items-center p-2">
                    <div class="col-sm-2">
                        <label for="inputPassword6" class="col-form-label">Nomor Surat</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="nomor" id="nomor" class="form-control">
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
                                    echo"<option value='$kategori[id]'>$kategori[nama_kategori]</option>";
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
                        <input type="text" name="judul" id="judul" class="form-control">
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