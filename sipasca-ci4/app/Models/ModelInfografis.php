<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInfografis extends Model
{
    //Fungsi Menambahkan Data ke Database [Tabel Data Kebutuhan]
    public function insertDataInfografis($data){
        $this->db->table('infografis')->insert($data);
    }

    //Fungsi Mengambil Data dari Database [Tabel Data Kebutuhan]
    public function ambilDataInfografis(){
        return $this->db->table('infografis')
        ->get()->getResultArray();
    }

    //Fungsi Mengambil 1 Data untuk di edit [Tabel Data Kebutuhan]
    public function ambilDataDariIDInfografis($id_infografis){
        return $this->db->table('infografis')
        ->where('id_infografis',$id_infografis)
        ->get()->getRowArray();
    }

    //Fungsi Edit Data ke Database [Tabel Data Kebutuhan]
    public function editDataInfografis($data){
        $this->db->table('infografis')
        ->where('id_infografis', $data['id_infografis'])
        ->update($data);
    }

    //Fungsi Hapus Data ke Database [Tabel Pemetaan Bangunan]
    public function hapusDataInfografis($data){
        $this->db->table('infografis')
        ->where('id_infografis', $data['id_infografis'])
        ->delete($data);
    }

    //Fungsi Tampilkan Infografis Kategori Tampilkan
    public function tampilInfografis(){
        $visib = "Tampilkan";
        return $this->db->table('infografis')
        ->where('visibilitas',$visib)
        ->get()->getResultArray();
    }
}
