<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    //Fungsi Menambahkan Data ke Database
    public function insertDataPengguna($data){
        $this->db->table('pengguna')->insert($data);
    }

    //Fungsi Mengambil Data dari Database
    public function ambilDataPengguna(){
        return $this->db->table('pengguna')
        ->get()->getResultArray();
    }

    //Fungsi Mengambil 1 Data untuk di edit
    public function ambilDataDariIDPengguna($id_pengguna){
        return $this->db->table('pengguna')
        ->where('id_pengguna',$id_pengguna)
        ->get()->getRowArray();
    }

    //Fungsi Edit Data ke Database
    public function editDataPengguna($data){
        $this->db->table('pengguna')
        ->where('id_pengguna', $data['id_pengguna'])
        ->update($data);
    }

    //Fungsi Hapus Data ke Database
    public function hapusDataPengguna($data){
        $this->db->table('pengguna')
        ->where('id_pengguna', $data['id_pengguna'])
        ->delete($data);
    }
    
}
