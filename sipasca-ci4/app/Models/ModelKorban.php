<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKorban extends Model
{
    //Fungsi Menambahkan Data ke Database
    public function insertDataKorban($data){
        $this->db->table('data-korban')->insert($data);
    }

    //Fungsi Mengambil Data dari Database
    public function ambilDataKorban(){
        return $this->db->table('data-korban')
        ->get()->getResultArray();
    }

    //Fungsi Mengambil 1 Data untuk di edit
    public function ambilDataDariIDKorban($nik_korban){
        return $this->db->table('data-korban')
        ->where('nik_korban',$nik_korban)
        ->get()->getRowArray();
    }

    //Fungsi Edit Data ke Database
    public function editDataKorban($data){
        $this->db->table('data-korban')
        ->where('nik_korban', $data['nik_korban'])
        ->update($data);
    }

    //Fungsi Hapus Data ke Database
    public function hapusDataKorban($data){
        $this->db->table('data-korban')
        ->where('nik_korban', $data['nik_korban'])
        ->delete($data);
    }

    //Fungsi Tampilkan Total Korban Keseluruhan
    public function totalKorban(){
        return $this->db->query('SELECT COUNT(nik_korban) AS jmltotalkorban FROM `data-korban`;')
        ->getResultArray();
    }

    //Fungsi Tampilkan Total Korban Selamat
    public function totalKorbanSelamat(){
        return $this->db
        ->query('SELECT COUNT(nik_korban) AS jmlkorbanselamat FROM `data-korban` WHERE kategori_korban = "Korban Selamat";')
        ->getResultArray();
    }

    //Fungsi Tampilkan Total Korban Terluka
    public function totalKorbanTerluka(){
        return $this->db
        ->query('SELECT COUNT(nik_korban) AS jmlkorbanluka FROM `data-korban` WHERE kategori_korban LIKE "Korban Luka %";')
        ->getResultArray();
    }

    //Fungsi Tampilkan Total Korban Tewas
    public function totalKorbanTewas(){
        return $this->db
        ->query('SELECT COUNT(nik_korban) AS jmlkorbantewas FROM `data-korban` WHERE kategori_korban = "Korban Tewas";')
        ->getResultArray();
    }
}
