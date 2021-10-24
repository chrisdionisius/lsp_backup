<?php
    include 'master.php';
    $id = $_GET['nomor'];
    $surat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM surat WHERE nomor='$id'"));

    $result = mysqli_query($koneksi, "SELECT nama_kategori FROM kategori where id =$surat[kategori_id]");
    $kategori = mysqli_fetch_assoc($result);
?>
<div class="d-flex" id="wrapper">
    <?php
        include 'sidebar.php';
    ?>
    <div id="page-content-wrapper">
        <div class="container">
            <h2 class="mt-4">Arsip Surat >> Lihat</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <table>
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td><?php echo $surat['nomor'] ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td><?php echo $kategori['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                            <td>Judul </td>
                            <td>:</td>
                            <td><?php echo $surat['judul'] ?></td>
                        </tr>
                        <tr>
                            <td>Waktu unggah </td>
                            <td>:</td>
                            <td><?php echo $surat['tanggal'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
                echo "<iframe src=\"$surat[direktori]\" width=\"100%\" style=\"height:350px\"></iframe>";
            ?>
        </div>
        <div class="container">
            <a class="btn btn-outline-warning" href="index.php" role="button">
                << Kembali</a>
                    <?php
                echo "<a class='btn btn-outline-primary' href='php/unduh.php?direktori=../".$surat['direktori']."'>Unduh</a>";
                echo "<a class='btn btn-outline-secondary' href='edit.php?nomor=".$surat['nomor']."'>Edit/Ganti File</a>";
            ?>

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>