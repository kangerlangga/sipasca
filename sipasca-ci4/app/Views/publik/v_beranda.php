<link rel="stylesheet" href="<?= base_url() ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/css/owl.theme.default.min.css">
<script src="<?= base_url() ?>/js/owl.carousel.min.js"></script>
    
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
                    <a class="nav-link active menu" aria-current="page" href="#"><b>Beranda</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu" href="<?= base_url('Home/petaSebaran') ?>" >Peta Sebaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu" href="<?= base_url('Home/kebutuhan') ?>">Daftar Kebutuhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu" href="<?= base_url('Home/poskoFaskes') ?>">Posko dan Fasilitas Kesehatan</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="banner-detail">
        <div class="img-top gbr-atas" style="padding-top: 50px;">
            <img src="<?= base_url()?>/img/bpbd.jpg">
        </div>
        <div class="container">
            <div class="row mb-2">
                <div class="col-md">
                    <div class="card shadow animate__animated animate__fadeInUp">
                        <h5 class="card-header text-white text-center" style="background-color: #FF8E00;">SELAMAT DATANG DI SISTEM PELAYANAN PASCA BENCANA</h5>
                        <div class="row g-0">
                            <div class="col-md-2">
                                <center>
                                    <img src="<?= base_url()?>/img/sipasca-maskot.png" class="img-fluid rounded-start maskot animate__animated animate__zoomIn" width="100px" style="margin: 15px;">
                                </center>
                            </div>
                            <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: justify; margin-right: 3px">Sistem Informasi Pasca Bencana adalah suatu sistem yang dirancang untuk mengumpulkan, menganalisis, dan menyebarkan informasi yang berkaitan dengan situasi dan kondisi pasca bencana. Sistem ini bertujuan untuk membantu dalam manajemen respons dan pemulihan setelah terjadinya bencana.</h5>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="owlone owl-carousel mb-0">
        <?php foreach ($grafis as $key => $value) : ?>
        <div class="item">
                <img src="<?= base_url('foto/infografis/'.$value['gambar_infografis'])?>"/>
        </div>
        <?php endforeach; ?>
    </div>

    <script>
    $('.owlone').owlCarousel({
        stagePadding: 200,
        items:1,
        lazyLoad: true,
        nav:true,
        navText: false,
        loop: true,
        autoplay: true,
        responsive:{
            0:{
                items:1,
                stagePadding: 0
            },
            600:{
                items:1,
                stagePadding: 0
            },
            900:{
                items:1,
                stagePadding: 100
            },
            1200:{
                items:1,
                stagePadding: 250
            },
            1400:{
                items:1,
                stagePadding: 300
            },
            1600:{
                items:1,
                stagePadding: 350
            },
            1800:{
                items:1,
                stagePadding: 400
            }
        }
    })
    </script>

    <style>
    .card {
        top: -7vh; 
        left: 10%; 
        right: 10%; 
        width: 80%;
    }
    .gbr-atas img{
        width: 100%;
        height: 34vh;
        object-fit: cover;
    }
        @media screen and (max-width: 768px) {
            .maskot {
                width: 17%;
            }

            .card h5{
                font-size: 2.4vw;
            }

            .card img{
                display: none;
            }
            
            .card {
                top: -4vh;
            }

            .banner-detail .img-top img {
                height: 133px;
            }

        }

    </style>

    <style>
    
    .item{
      opacity:0.4;
      transition:.4s ease all;
      margin:0 20px;
      transform:scale(.8);
      padding: 25px 0;
}

.item img {
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.30);
    border-radius: 20px;
    width: 100%;
    height: 100%;
    /* max-height: 410px; */
}

.active .item{
  opacity:1;
  transform:scale(1);
} 

.owl-dots {
    padding-bottom: 15px
}

.owl-carousel .owl-wrapper {
    display: flex !important;
    flex-direction: column
}

.owl-carousel .owl-item {
    width:100%;
}

.owl-carousel .owl-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    max-width: initial;
}

.text-info {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 40px;
    text-align: center;
}

.text-info p {
    color: #fff
}

.text-info .red-text {
    background-color: rgba(234,104,82,.75);
    display: inline-block;
    font-size: 20px;
    padding: 5px;
    font-weight: 400;
    text-transform: uppercase;
}

.text-info .blue-text {
    background-color: rgba(25,31,98,.75);
    display: inline-block;
    font-size: 20px;
    padding: 5px;
    font-weight: 400
}

</style>
<style>
    .owl-stage {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;

        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    .owl-item{
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        height: auto !important;
    }
    .owl-item > * {
        width: 100%;
    }
</style>

<style>
.owl-carousel.nav-style-1 .owl-nav .owl-next, .owl-carousel.nav-style-1 .owl-nav .owl-prev {
    color: #191F62 !important;
}
</style>