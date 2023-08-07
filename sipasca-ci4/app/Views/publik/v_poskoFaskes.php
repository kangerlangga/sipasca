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
                    <a class="nav-link menu" href="<?= base_url('Home/kebutuhan') ?>">Daftar Kebutuhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active menu" href="#"><b>Posko dan Fasilitas Kesehatan</b></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Konten Posko dan Faskes-->
    <div class="container" style="padding-top: 70px; min-height: 90vh;">
        <center><h3 class="animate__animated animate__fadeInDown pb-3">Posko dan Fasilitas Kesehatan Terdekat</h3></center>
        <div class="row mb-2">
        <?php foreach ($posko as $key => $value) { ?>
            <div class="col-md-6 mb-3">
                <div class="card shadow animate__animated animate__fadeInUp" style="border-radius: 20px;">
                    <h5 class="card-header text-white text-center" style="background-color: #FF8E00;">Posko dan Fasilitas Kesehatan</h5>
                    <div class="card-body">
                        <table class="table table-borderless">
                        <col span="1" style="width: 30%;">
                        <col span="1" style="width: 5%;">
                        <col span="1" style="width: 65%;">
                            <tbody>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>:</td>
                                    <td><b><?= $value['identitas_posko'];?></b></td>
                                </tr>
                                <tr>
                                    <td>Petugas Jaga</td>
                                    <td>:</td>
                                    <td><b><?= $value['nama_petugas'];?></b></td>
                                </tr>
                                <tr>
                                    <td>Kontak Petugas</td>
                                    <td>:</td>
                                    <td><b><?= $value['telepon_petugas'];?></b></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><b><?= $value['alamat_posko'];?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <center>
                        <a href="https://www.google.com/maps/place/<?= $value['lat_posko']?>,<?= $value['long_posko']?>" target="_blank" class="btn btn-primary" style="background-color: #FF8E00;">Lihat di Google Maps</a>
                        </center>
                    </div>
                </div>
            </div>
        <?php } ?>            
        </div>
        <style>
            .card{
                height: 330px;
            }
            @media screen and (max-width: 768px) {
                .card{
                    height: auto;
                }
            }
        </style>