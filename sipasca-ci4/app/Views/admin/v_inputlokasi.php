<style>
    .form-group {
        margin-top: 17px;
    }
    .form-group input, select{
        margin-top: 3px;
    }
    .btn {
        width: 100px;
        margin-right: 5px;
    }
</style>

<?php $errors = validation_errors()?>
<?= form_open_multipart('Lokasi/insertDataBangunan') ?>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="Pemilik">Pemilik Bangunan</label>
            <input class="form-control" name="pemilik" id="Pemilik">
            <p class="text-danger"><?= isset($errors['pemilik']) == isset($errors['pemilik']) ? validation_show_error('pemilik') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Alamat">Alamat <b>(Contoh :  Jl. Jawa No.2 Sidoarjo. 62162)</b></label>
            <input class="form-control" name="alamat" id="Alamat">
            <p class="text-danger"><?= isset($errors['alamat']) == isset($errors['alamat']) ? validation_show_error('alamat') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Kategori">Kategori Bangunan</label>
            <br>
            <select name='kategori' id='Kategori' class="form-control">
                <option name='kategori' value='Bangunan Kerusakan Parah'>Bangunan Kerusakan Parah</option>
                <option name='kategori' value='Bangunan Kerusakan Sedang'>Bangunan Kerusakan Sedang</option>
                <option name='kategori' value='Bangunan Kerusakan Ringan'>Bangunan Kerusakan Ringan</option>
                <option name='kategori' value='Posko dan Faskes'>Posko dan Faskes</option>
	        </select>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Foto">Foto Bangunan (PNG, JPG, JPEG) <b>Maksimal 3 MB</b></label>
            <input class="form-control" name="foto" id="Foto" type="file" accept=".png, .jpg, .jpeg">
            <p class="text-danger"><?= isset($errors['foto']) == isset($errors['foto']) ? validation_show_error('foto') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Latitude">Latitude <b>(Klik Pada Peta)</b></label>
            <input class="form-control" name="latitude" id="Latitude" readonly style="cursor: not-allowed;">
            <p class="text-danger"><?= isset($errors['latitude']) == isset($errors['latitude']) ? validation_show_error('latitude') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Longitude">Longitude <b>(Klik Pada Peta)</b></label>
            <input class="form-control" name="longitude" id="Longitude" readonly style="cursor: not-allowed;">
            <p class="text-danger"><?= isset($errors['longitude']) == isset($errors['longitude']) ? validation_show_error('longitude') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-12">
        <br>
        <div id="petaSebaranBangunanRusak" 
        style="width: 100%; 
        height: 50vh; 
        position: relative; 
        outline-style: groove; 
        outline-width: 5px;"></div>
    </div>
</div>
<br>
<button type="submit" class="btn btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-success">RESET</button>
<?= form_close() ?>
<hr>

<script type="text/javascript">
    <?php
    $tipe = session()->getFlashdata('type');
    if ( $tipe == 'success') : ?>
        Swal.fire({
        icon: '<?= $tipe; ?>',
        title: '<?= session()->getFlashdata('pesan'); ?>',
        showConfirmButton: false,
        timer: 3000
        })
    <?php endif ?>

    //Open Street Maps
    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    });

    //Define Maps
    const map = L.map('petaSebaranBangunanRusak', {
        center: [-7.4299876625855, 112.71509735056048],
        zoom: 17,
        layers: [osm],
        // attributionControl: false
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

    const layerControl = L.control.layers(baseLayers).addTo(map);

    //ambil koordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");
    var curLocation = [-7.479490646932404, 112.72628225280806];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: false,
    });

    //Mengambil koordinat saat map di klik
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if(!marker){
            marker = L.marker(e.latlng).addTo(map);
        }else{
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
    });

    map.addLayer(marker);
</script>