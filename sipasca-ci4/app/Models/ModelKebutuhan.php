<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKebutuhan extends Model
{
    //Fungsi Menambahkan Data ke Database [Tabel Data Kebutuhan]
    public function insertDataKebutuhan($data){
        $this->db->table('data-kebutuhan')->insert($data);
    }

    //Fungsi Mengambil Data dari Database [Tabel Data Kebutuhan]
    public function ambilDataKebutuhan(){
        return $this->db->table('data-kebutuhan')
        ->get()->getResultArray();
    }

    //Fungsi Mengambil 1 Data untuk di edit [Tabel Data Kebutuhan]
    public function ambilDataDariIDKebutuhan($id_kebutuhan){
        return $this->db->table('data-kebutuhan')
        ->where('id_kebutuhan',$id_kebutuhan)
        ->get()->getRowArray();
    }

    //Fungsi Edit Data ke Database [Tabel Data Kebutuhan]
    public function editDataKebutuhan($data){
        $this->db->table('data-kebutuhan')
        ->where('id_kebutuhan', $data['id_kebutuhan'])
        ->update($data);
    }

    //Fungsi Hapus Data ke Database [Tabel Pemetaan Bangunan]
    public function hapusDataKebutuhan($data){
        $this->db->table('data-kebutuhan')
        ->where('id_kebutuhan', $data['id_kebutuhan'])
        ->delete($data);
    }

    //Fungsi Tampilkan Total Jumlah Kebutuhan Keseluruhan
    public function totalKebutuhan(){
        return $this->db->query('SELECT SUM(jumlah) AS jmlkebutuhan FROM `data-kebutuhan`;')
        ->getResultArray();
    }
}
