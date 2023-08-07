<div class="row">

     <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Kerusakan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlrusak[0]['jmlrusak'] ?> Bangunan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-location-dot fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Korban</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlkorban[0]['jmltotalkorban'] ?> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-person fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Kebutuhan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlkebutuhan[0]['jmlkebutuhan'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-box fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div id="petaSebaranBangunanRusak" style="width: 99%; height: 65vh; position: relative; outline-style: groove; outline-width: 5px; margin: 0.5%;"></div>
    </div>
</div>

<script type="text/javascript">

    <?php
    $tipe = session()->getFlashdata('type');
    if ( $tipe == 'success') : ?>
        Swal.fire({
        icon: '<?= $tipe; ?>',
        title: '<?= session()->getFlashdata('pesan'); ?>',
        showConfirmButton: false,
        timer: 5000
        })
    <?php endif ?>

    <?php
    $psn = session()->getFlashdata('pesan');
    if ( $psn == 'Password Akun Telah Diperbarui!') : ?>
        Swal.fire({
        icon: '<?=session()->getFlashdata('type'); ?>',
        title: '<?= session()->getFlashdata('pesan'); ?>',
        text: 'Anda Akan Logout Dalam Beberapa Detik!',
        showConfirmButton: false,
        timer: 5000
        })
        setTimeout(
        function(){
            window.location = "<?= base_url('Logout')?>" 
        },
        5000); // waktu tunggu atau delay
    <?php endif ?>

    <?php
    $psn = session()->getFlashdata('pesan');
    if ( $psn == 'Anda Berhasil Login!') : ?>
        Swal.fire({
        icon: '<?=session()->getFlashdata('type'); ?>',
        title: '<?= session()->getFlashdata('pesan'); ?>',
        text: 'Disarankan Membuka Halaman Administrasi Dengan Komputer atau Laptop!',
        })
    <?php endif ?>

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
    const map = L.map('petaSebaranBangunanRusak', {
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
</style>