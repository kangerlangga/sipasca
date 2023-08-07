<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    //Fungsi Menambahkan Data ke Database [Tabel Pemetaan Bangunan]
    public function insertDataBangunan($data){
        $this->db->table('pemetaan-bangunan')->insert($data);
    }

    //Fungsi Mengambil Data dari Database [Tabel Pemetaan Bangunan]
    public function ambilDataBangunan(){
        return $this->db->table('pemetaan-bangunan')
        ->get()->getResultArray();
    }

    //Fungsi Mengambil 1 Data untuk di edit [Tabel Pemetaan Bangunan]
    public function ambilDataDariIDBangunan($id_bangunan){
        return $this->db->table('pemetaan-bangunan')
        ->where('id_bangunan',$id_bangunan)
        ->get()->getRowArray();
    }

    //Fungsi Edit Data ke Database [Tabel Pemetaan Bangunan]
    public function editDataBangunan($data){
        $this->db->table('pemetaan-bangunan')
        ->where('id_bangunan', $data['id_bangunan'])
        ->update($data);
    }

    //Fungsi Hapus Data ke Database [Tabel Pemetaan Bangunan]
    public function hapusDataBangunan($data){
        $this->db->table('pemetaan-bangunan')
        ->where('id_bangunan', $data['id_bangunan'])
        ->delete($data);
    }

    //Fungsi Tampilkan Total Kerusakan Keseluruhan
    public function totalRusak(){
        return $this->db->query('SELECT COUNT(id_bangunan) AS jmlrusak FROM `pemetaan-bangunan` WHERE jenis_bangunan LIKE "Bangunan Kerusakan %";')
        ->getResultArray();
    }

    //Fungsi Tampilkan Total  Kerusakan Ringan
    public function totalRusakRingan(){
        return $this->db
        ->query('SELECT COUNT(id_bangunan) AS rusakringan FROM `pemetaan-bangunan` WHERE jenis_bangunan = "Bangunan Kerusakan Ringan";')
        ->getResultArray();
    }

    //Fungsi Tampilkan Total Kerusakan Sedang
    public function totalRusakSedang(){
        return $this->db
        ->query('SELECT COUNT(id_bangunan) AS rusaksedang FROM `pemetaan-bangunan` WHERE jenis_bangunan = "Bangunan Kerusakan Sedang";')
        ->getResultArray();
    }

    //Fungsi Tampilkan Total Kerusakan Berat
    public function totalRusakParah(){
        return $this->db
        ->query('SELECT COUNT(id_bangunan) AS rusakparah FROM `pemetaan-bangunan` WHERE jenis_bangunan = "Bangunan Kerusakan Parah";')
        ->getResultArray();
    }
}
