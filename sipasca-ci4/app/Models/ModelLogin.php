<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    //Fungsi Cek Login ke Database User
    public function cekUsername($user){
        // $isi = $this->db->table('pengguna')
        // ->where('username', $user)
        // ->get()->getRowArray();
        $isi = $this->db
        ->query('SELECT * FROM `pengguna` WHERE username LIKE BINARY "'.$user.'";')
        ->getRowArray();
        
        if (!empty($isi)) {
            return $isi;
        }else{
            return 'error';
        }
    }

    //Fungsi Ambil Data Profil User
    public function ambilDataUser($username){
        return $this->db->table('pengguna')
        ->where('username',$username)
        ->get()->getRowArray();
    }

    public function ambilDataUserID($id_pengguna){
        return $this->db->table('pengguna')
        ->where('id_pengguna',$id_pengguna)
        ->get()->getRowArray();
    }

    //Fungsi Edit Data ke Database
    public function editProfile($data){
        $this->db->table('pengguna')
        ->where('id_pengguna', $data['id_pengguna'])
        ->update($data);
    }
}
