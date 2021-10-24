<?php
    include 'master.php';
    session_start();
    $listSurat = mysqli_query($koneksi,"SELECT * FROM surat ORDER BY tanggal DESC");
    if (isset($_GET['query']) ) {
        $listSurat = mysqli_query($koneksi,"SELECT * FROM surat WHERE judul LIKE '%$_GET[query]%'");
    }
?>
<div class="d-flex" id="wrapper">
    <?php
        include 'sidebar.php';
    ?>
    <div id="page-content-wrapper">
        <!-- Page content-->
        <div class="container">
            <h2 class="mt-4">Arsip Surat</h1>
                <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
                    Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    Cari Surat
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" name="query" id="query"
                                        placeholder="nama surat" aria-label="Recipient's username"
                                        aria-describedby="button-addon2">
                                </div>
                                <div class="col-4">
                                    <input class="btn btn-outline-secondary" type="submit" value="submit" name="submit">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION['status'])) {
            echo "
            <div class='container'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$_SESSION[status]</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>";
            unset($_SESSION['status']);
        }else if (isset($_SESSION['delete'])) {
            echo "
            <div class='container'>
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$_SESSION[delete]</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>";
            unset($_SESSION['delete']);
        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr class="table-secondary">
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Waktu pengarsipan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listSurat as $surat) {
                                    $result = mysqli_query($koneksi, "SELECT nama_kategori FROM kategori where id =$surat[kategori_id]");
                                    $kategori = mysqli_fetch_assoc($result);
                                    echo"
                                    <tr>
                                    <th scope='row'>$surat[nomor]</th>
                                    <td>$kategori[nama_kategori]</td>
                                    <td>$surat[judul]</td>
                                    <td>$surat[tanggal]</td>
                                    <td>
                                        <div class='btn-group' role='group' aria-label='Basic example'>
                                            <a class='btn btn-danger' onClick=\"javascript: return confirm('Apakah anda yakin menghapus berkas ini ?');\" href='php/hapus.php?nomor=".$surat['nomor']."'>Hapus</a>            
                                            <a class='btn btn-warning' href='php/unduh.php?direktori=../".$surat['direktori']."'>Unduh</a>
                                            <a class='btn btn-primary' href='lihat_surat.php?nomor=".$surat['nomor']."'>Lihat</a>
                                        </div>
                                    </td>
                                </tr>";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <a class="btn btn-outline-secondary" href="unggah_surat.php">Arsipkan Surat</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <?php
include 'footer.php';
?>