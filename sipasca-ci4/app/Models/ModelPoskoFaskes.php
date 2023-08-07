<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPoskoFaskes extends Model
{
    //Fungsi Menambahkan Data ke Database
    public function insertDataPoskoFaskes($data){
        $this->db->table('posko-faskes')->insert($data);
    }

    //Fungsi Mengambil Data dari Database
    public function ambilDataPoskoFaskes(){
        return $this->db->table('posko-faskes')
        ->get()->getResultArray();
    }

    //Fungsi Mengambil 1 Data untuk di edit
    public function ambilDataDariIDPoskoFaskes($id_posko){
        return $this->db->table('posko-faskes')
        ->where('id_posko',$id_posko)
        ->get()->getRowArray();
    }

    //Fungsi Edit Data ke Database
    public function editDataPoskoFaskes($data){
        $this->db->table('posko-faskes')
        ->where('id_posko', $data['id_posko'])
        ->update($data);
    }

    //Fungsi Hapus Data ke Database
    public function hapusDataPoskoFaskes($data){
        $this->db->table('posko-faskes')
        ->where('id_posko', $data['id_posko'])
        ->delete($data);
    }
}
