<?php
    include 'master.php';
    $listSurat = mysqli_query($koneksi,"SELECT * FROM surat");
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
                        <input type="text" class="form-control" placeholder="nama surat"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-10">
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
                                            <button type='button' class='btn btn-danger'>Hapus</button>
                                            <button type='button' class='btn btn-warning'>Unduh</button>
                                            <button type='button' class='btn btn-primary'>Lihat >></button>
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
            <button type="button" class="btn btn-outline-secondary">Arsipkan Surat</button>
        </div>
    </div>
    <!-- Page content wrapper-->
    <?php
include 'footer.php';
?>