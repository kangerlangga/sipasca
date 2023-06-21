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
const rumah_berat_1 = L.marker([-7.423454208419702, 112.69466783777257], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_2 = L.marker([-7.423459527874966, 112.69472416415819], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_3 = L.marker([-7.4235127224239665, 112.69457932488085], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_4 = L.marker([-7.423877104911623, 112.69472684636703], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_5 = L.marker([-7.423605812869234, 112.69431378620573], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_6 = L.marker([-7.423595173962208, 112.69428696411731], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_7 = L.marker([-7.42367230603236, 112.69428964632617], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_8 = L.marker([-7.4235127224239665, 112.69516941082557], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_9 = L.marker([-7.423523361332991, 112.69534375440014], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_10 = L.marker([-7.423568576698158, 112.69535984768306], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_11 = L.marker([-7.423518041883174, 112.69538935198031], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_12 = L.marker([-7.423994132798463, 112.6955771066069], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_13 = L.marker([-7.424432987108735, 112.6955100513922], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_14 = L.marker([-7.424209570424834, 112.69511040226779], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);
const rumah_berat_15 = L.marker([-7.423879764639941, 112.69444789668438], {icon: redHome}).bindPopup('Rumah 1').addTo(rumah_berat);

const rumah_sedang = L.layerGroup();
const rumah_sedang_1 = L.marker([-7.423462187602558, 112.69421722668748], {icon: yellowHome}).bindPopup('Rumah 2').addTo(rumah_sedang);
const rumah_sedang_2 = L.marker([-7.42368028521126, 112.69426282423777], {icon: yellowHome}).bindPopup('Rumah 2').addTo(rumah_sedang);
const rumah_sedang_3 = L.marker([-7.424438306546492, 112.69411798496044], {icon: yellowHome}).bindPopup('Rumah 2').addTo(rumah_sedang);
const rumah_sedang_4 = L.marker([-7.424049987008191, 112.69385244628529], {icon: yellowHome}).bindPopup('Rumah 2').addTo(rumah_sedang);
const rumah_sedang_5 = L.marker([-7.424137757892727, 112.69461955801344], {icon: yellowHome}).bindPopup('Rumah 2').addTo(rumah_sedang);
const rumah_sedang_6 = L.marker([-7.424488841255703, 112.69427623528196], {icon: yellowHome}).bindPopup('Rumah 2').addTo(rumah_sedang);

const rumah_ringan = L.layerGroup();
const rumah_ringan_1 = L.marker([-7.4234302708735775, 112.69383635299658], {icon: greenHome}).bindPopup('Rumah 3').addTo(rumah_ringan);
const rumah_ringan_2 = L.marker([-7.423712201928728, 112.69336428424081], {icon: greenHome}).bindPopup('Rumah 3').addTo(rumah_ringan);
const rumah_ringan_3 = L.marker([-7.423714861654807, 112.69339110632922], {icon: greenHome}).bindPopup('Rumah 3').addTo(rumah_ringan);
const rumah_ringan_4 = L.marker([-7.4240872231464685, 112.69361104745406], {icon: greenHome}).bindPopup('Rumah 3').addTo(rumah_ringan);
const rumah_ringan_5 = L.marker([-7.424342556566004, 112.69529815687956], {icon: greenHome}).bindPopup('Rumah 3').addTo(rumah_ringan);

const posko = L.layerGroup();
const posko_1 = L.marker([-7.423730820007008, 112.69437547701384], {icon: blueHome}).bindPopup('Posko Bencana 1').addTo(posko);
const posko_2 = L.marker([-7.4237760353476325, 112.6951130844512], {icon: blueHome}).bindPopup('Posko Bencana 1').addTo(posko);
const posko_3 = L.marker([-7.424049987010976, 112.69421722666755], {icon: blueHome}).bindPopup('Posko Bencana 1').addTo(posko);
const posko_4 = L.marker([-7.423270687174373, 112.69422259108228], {icon: blueHome}).bindPopup('Posko Bencana 1').addTo(posko);
const posko_5 = L.marker([-7.424310639889171, 112.6954108096179], {icon: blueHome}).bindPopup('Posko Bencana 1').addTo(posko);

//Open Street Maps
const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
});

//Define Maps
const map = L.map('petaSebaranBangunanRusak', {
    center: [-7.423938278586701, 112.6946866132312],
    zoom: 17,
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
