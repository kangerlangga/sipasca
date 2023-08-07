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
                    <a class="nav-link active menu" href="#" ><b>Peta Sebaran</b></a>
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

    <!-- Konten Peta Sebaran Bangunan Rusak-->
    <section class="peta" style="padding-top: 70px;">
        <center><h3 class="animate__animated animate__fadeInDown">Peta <b>Sebaran Lokasi</b></h3></center>
    </section>
    <div class="peta">
    <div id="petaSebaran" style="width: 90%; height: 65vh; position: relative; outline-style: groove; outline-width: 5px; margin-left:auto; margin-right:auto; margin-top:2%; margin-bottom:5%"></div>
    </div>
    <!-- Akhir Konten Peta Sebaran Bangunan Rusak -->

    <div class="container">
        <div class="row mb-2">
            <div class="col-md">
                <div class="card shadow mb-3 animate__animated animate__fadeInLeft" style="height: 180px; border-radius: 20px;">
                    <h5 class="card-header text-white text-center" style="background-color: #FF8E00;">Total Data Korban</h5>
                    <div class="card-body">
                    <h5 class="card-title">Total Korban : <?= $jmlkorban[0]['jmltotalkorban'] ?> Orang</h5>
                    <p class="card-text">Korban Selamat : <b><?= $kselamat[0]['jmlkorbanselamat'] ?></b> Orang 
                        <br>
                        Korban Terluka : <b><?= $kluka[0]['jmlkorbanluka'] ?></b> Orang 
                        <br>
                        Korban Meninggal : <b><?= $ktewas[0]['jmlkorbantewas'] ?></b> Orang</p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card shadow mb-3 animate__animated animate__fadeInUp" style="height: 180px; border-radius: 20px;">
                    <h5 class="card-header text-white text-center" style="background-color: #FF8E00;">Total Data Kerusakan</h5>
                    <div class="card-body">
                    <h5 class="card-title">Total Kerusakan : <?= $jmlrusak[0]['jmlrusak'] ?> Bangunan</h5>
                    <p class="card-text">Kerusakan Ringan : <b><?= $rringan[0]['rusakringan'] ?></b> Bangunan
                        <br>
                        Kerusakan Sedang : <b><?= $rsedang[0]['rusaksedang'] ?></b> Bangunan
                        <br>
                        Kerusakan Berat : <b><?= $rparah[0]['rusakparah'] ?></b> Bangunan</p>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card shadow animate__animated animate__fadeInRight" style="height: 180px; border-radius: 20px;">
                    <h5 class="card-header text-white text-center" style="background-color: #FF8E00;">Total Data Kebutuhan</h5>
                    <div class="card-body">
                    <h5 class="card-title">Total Jumlah Kebutuhan : <?= $jmlkebutuhan[0]['jmlkebutuhan'] ?></h5>
                    <p class="card-text"></p>
                    <a href="<?= base_url('Home/kebutuhan') ?>" class="btn btn-primary" style="background-color: #FF8E00;">Lihat Data Kebutuhan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript">
    
    var redHome = L.icon({
    iconUrl: '<?= base_url('img/home-red.png') ?>',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
    });

    var yellowHome = L.icon({
    iconUrl: '<?= base_url('img/home-yellow.png') ?>',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
    });

    var greenHome = L.icon({
    iconUrl: '<?= base_url('img/home-green.png') ?>',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
    });

    var blueHome = L.icon({
    iconUrl: '<?= base_url('img/home-blue.png') ?>',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
    });
    
    //Open Street Maps
    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    });

    //Define Maps
    const map = L.map('petaSebaran', {
        center: [-7.4299876625855, 112.71509735056048],
        zoom: 17,
        layers: [osm],
        attributionControl: false
    });

    //Google Street
    googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    //Hybrid
    googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    //Google Satelite
    googleSat = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    //Terrain
    googleTerrain = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    const baseLayers = {
        'Open Street Map': osm,
        'Google Street': googleStreets,
        'Google Hybrid': googleHybrid,
        'Google Satelite': googleSat,
        'Google Terrain': googleTerrain
    };

    // const rusak_berat = L.layerGroup();
    // const rusak_sedang = L.layerGroup();
    // const rusak_ringan = L.layerGroup();
    // const posko_faskes = L.layerGroup();

    // const overlays = {
    //     'Posko dan Faskes': posko_faskes,
    //     'Kerusakan Parah': rusak_berat,
    //     'Kerusakan Sedang': rusak_sedang,
    //     'Kerusakan Ringan': rusak_ringan,
    // };

    const layerControl = L.control.layers(baseLayers).addTo(map);
    
    var options = {
        flyTo : true,
    };
    L.control.locate(options).addTo(map);

    //Pemetaan Lokasi
    <?php foreach ($lokasi as $key => $value) : 
        if ($value['jenis_bangunan'] == 'Bangunan Kerusakan Parah') { ?>
            L.marker([<?= $value['lat_bangunan']?>, <?= $value['long_bangunan']?>], {icon: redHome})
            .bindPopup('<h6 style="background-color: brown;"><b><?= $value['jenis_bangunan']?></b></h6>' +
            '<img src="<?= base_url('foto/lokasi/'.$value['foto_bangunan'])?>" width="150px">'+
            '<p>Pemilik : <b><?= $value['nama_pemilik']?></b><br>' +
            'Alamat : <b><?= $value['alamat_bangunan']?></b></p>')
            .addTo(map);
            <?php 
        } elseif ($value['jenis_bangunan'] == 'Bangunan Kerusakan Sedang') { ?>
            L.marker([<?= $value['lat_bangunan']?>, <?= $value['long_bangunan']?>], {icon: yellowHome})
            .bindPopup('<h6 style="background-color: chocolate;"><b><?= $value['jenis_bangunan']?></b></h6>' +
            '<img src="<?= base_url('foto/lokasi/'.$value['foto_bangunan'])?>" width="150px">'+
            '<p>Pemilik : <b><?= $value['nama_pemilik']?></b><br>' +
            'Alamat : <b><?= $value['alamat_bangunan']?></b></p>')
            .addTo(map);
            <?php 
        } elseif ($value['jenis_bangunan'] == 'Bangunan Kerusakan Ringan') { ?>
            L.marker([<?= $value['lat_bangunan']?>, <?= $value['long_bangunan']?>], {icon: greenHome})
            .bindPopup('<h6 style="background-color: green;"><b><?= $value['jenis_bangunan']?></b></h6>' +
            '<img src="<?= base_url('foto/lokasi/'.$value['foto_bangunan'])?>" width="150px">'+
            '<p>Pemilik : <b><?= $value['nama_pemilik']?></b><br>' +
            'Alamat : <b><?= $value['alamat_bangunan']?></b></p>')
            .addTo(map);
            <?php
        } else if ($value['jenis_bangunan'] == 'Posko dan Faskes') { ?>
            L.marker([<?= $value['lat_bangunan']?>, <?= $value['long_bangunan']?>], {icon: blueHome})
            .bindPopup('<h6 style="background-color: blue;"><b><?= $value['jenis_bangunan']?></b></h6>' +
            '<img src="<?= base_url('foto/lokasi/'.$value['foto_bangunan'])?>" width="150px">'+
            '<p>Pemilik : <b><?= $value['nama_pemilik']?></b><br>' +
            'Alamat : <b><?= $value['alamat_bangunan']?></b></p>')
            .addTo(map);
            <?php
        } ?>
        
    <?php endforeach?>
</script>
<style>
    .leaflet-popup-content {
        margin: 0px;
        width: 300px;
    }
    
    .leaflet-popup-content-wrapper{
        padding: 0px;
        overflow: hidden;
    }
    .leaflet-popup-content-wrapper h6{
        color: white;
        font-size: 16px;
        padding: 12px;
        text-align: center;
    }
    .leaflet-popup-content-wrapper p{
        font-size: 14px;
        padding: 0 16px;
        margin-bottom: 14px;
    }
    .leaflet-popup-content-wrapper img{
        width: 300px;
        max-height: 300px;
        padding: 0 10px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 0px;
        margin-bottom: 0px;
    }

    @media screen and (max-width: 768px) {
        .peta{
            padding-bottom: 2%;
        }
    }

</style>