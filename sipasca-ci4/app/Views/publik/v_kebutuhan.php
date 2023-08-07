<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #FF8E00; padding: 3px 3% 3px 3%;">
        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('img/logo-sipasca.png') ?>" width="120"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link menu" aria-current="page" href="<?= base_url('Home') ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu" href="<?= base_url('Home/petaSebaran') ?>" >Peta Sebaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active menu" href="#"><b>Daftar Kebutuhan</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu" href="<?= base_url('Home/poskoFaskes') ?>">Posko dan Fasilitas Kesehatan</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Konten Daftar Kebutuhan-->
    <div class="container" style="padding-top: 70px; min-height: 90vh;">
        <center><h3 class="animate__animated animate__fadeInDown pb-3">Daftar Kebutuhan <b>Wilayah Terdampak</b></h3></center>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 bg-white pt-3 table-responsive" style="border-radius: 10px;">
                        <table class="table table-bordered pt-3 mt-3" id="tabel-kebutuhan">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomer = 1; 
                                foreach ($kebutuhan as $key => $value) { ?>
                                    <tr>
                                        <td><?= $nomer++ ?></td>
                                        <td><?= $value['nama_barang'] ?></td>
                                        <td><?= $value['jumlah'] ?></td>
                                        <td><?= $value['satuan'] ?></td>
                                        <td><?= $value['kategori'] ?></td>
                                        <td><?= $value['keterangan'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Akhir Konten Daftar Kebutuhan -->
    
    <script>
        let table = new DataTable('#tabel-kebutuhan');
    </script>

    <style>
        @media screen and (max-width: 768px) {
            .kebutuhan {
                padding-bottom: 5%;
            }
        }

    </style>
    
    