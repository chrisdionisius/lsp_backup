<?php
    include 'koneksi.php';
    $listSurat = mysqli_query($koneksi,"SELECT * FROM surat" );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Menu</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Arsip</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">About</a>
            </div>
        </div>
        <!-- Page content wrapper-->
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>