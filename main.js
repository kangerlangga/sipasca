var redHome = L.icon({
    iconUrl: 'img/home-red.png',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
});

var yellowHome = L.icon({
    iconUrl: 'img/home-yellow.png',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
});

var greenHome = L.icon({
    iconUrl: 'img/home-green.png',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
});

var blueHome = L.icon({
    iconUrl: 'img/home-blue.png',

    iconSize:     [25, 38], // size of the icon
    shadowSize:   [0, 0], // size of the shadow
    iconAnchor:   [12, 39], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 0],  // the same for the shadow
    popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
});

const rumah_berat = L.layerGroup();
const rumah_berat_1 = L.marker([-7.460255555964899, 112.70779985238791], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);

const rumah_sedang = L.layerGroup();
const rumah_sedang_1 = L.marker([-7.460151170398643, 112.70807410824756], {icon: yellowHome}).bindPopup('Rumah 2').addTo(rumah_sedang);

const rumah_ringan = L.layerGroup();
const rumah_ringan_1 = L.marker([-7.4599876108006855, 112.70830410765778], {icon: greenHome}).bindPopup('Rumah 3').addTo(rumah_ringan);

const posko = L.layerGroup();
const posko_1 = L.marker([-7.459996919070119, 112.70791518736364], {icon: blueHome}).bindPopup('Posko Bencana 1').addTo(posko);

// const mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
// const mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

// const streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

//Open Street Maps
const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

//Define Maps
const map = L.map('petaSebaran', {
    center: [-7.460011213921716, 112.70795407939627],
    zoom: 12,
    layers: [osm, posko, rumah_berat, rumah_sedang, rumah_ringan]
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

const overlays = {
    'Posko Bencana': posko,
    'Kerusakan Parah': rumah_berat,
    'Kerusakan Sedang': rumah_sedang,
    'Kerusakan Ringan': rumah_ringan,
};

const layerControl = L.control.layers(baseLayers, overlays, overlays, overlays, overlays).addTo(map);
