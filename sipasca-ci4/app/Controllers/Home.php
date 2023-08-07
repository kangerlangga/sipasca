<?php

namespace App\Controllers;

use App\Models\ModelLokasi;
use App\Models\ModelKebutuhan;
use App\Models\ModelKorban;
use App\Models\ModelInfografis;
use App\Models\ModelPoskoFaskes;

class Home extends BaseController
{
    public function __construct() {
        $this->ModelLokasi = new ModelLokasi();
        $this->ModelKebutuhan = new ModelKebutuhan();
        $this->ModelKorban = new ModelKorban();
        $this->ModelInfografis = new ModelInfografis();
        $this->ModelPoskoFaskes = new ModelPoskoFaskes();
    }
    
    //Fungsi untuk halaman utama
    public function index()
    {
        $data = [
            'judul' => 'Beranda',
            'page'  => 'publik/v_beranda',
            'grafis' => $this->ModelInfografis->tampilInfografis(),
        ];
        return view('publik/v_publik', $data);
    }

    //Fungsi untuk halaman Peta Sebaran
    public function petaSebaran()
    {
        $data = [
            'judul' => 'Peta Sebaran',
            'page'  => 'publik/v_petaSebaran',
            'lokasi' => $this->ModelLokasi->ambilDataBangunan(),
            'jmlkorban' => $this->ModelKorban->totalKorban(),
            'kselamat' => $this->ModelKorban->totalKorbanSelamat(),
            'kluka' => $this->ModelKorban->totalKorbanTerluka(),
            'ktewas' => $this->ModelKorban->totalKorbanTewas(),
            'jmlkebutuhan' => $this->ModelKebutuhan->totalKebutuhan(),
            'jmlrusak' => $this->ModelLokasi->totalRusak(),
            'rringan' => $this->ModelLokasi->totalRusakRingan(),
            'rsedang' => $this->ModelLokasi->totalRusakSedang(),
            'rparah' => $this->ModelLokasi->totalRusakParah(),
        ];
        return view('publik/v_publik', $data);
    }

    //Fungsi untuk halaman Daftar Kebutuhan
    public function kebutuhan()
    {
        $data = [
            'judul' => 'Daftar Kebutuhan',
            'page'  => 'publik/v_kebutuhan',
            'kebutuhan' => $this->ModelKebutuhan->ambilDataKebutuhan(),
        ];
        return view('publik/v_publik', $data);
    }

    //Fungsi untuk halaman Posko dan Faskes
    public function poskoFaskes()
    {
        $data = [
            'judul' => 'Posko dan Faskes Terdekat',
            'page'  => 'publik/v_poskoFaskes',
            'posko' => $this->ModelPoskoFaskes->ambilDataPoskoFaskes(),
        ];
        return view('publik/v_publik', $data);
    }
}
