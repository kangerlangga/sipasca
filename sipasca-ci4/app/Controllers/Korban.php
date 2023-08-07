<?php

namespace App\Controllers;

use App\Models\ModelKorban;

class Korban extends BaseController
{
    public function __construct() {
        $this->ModelKorban = new ModelKorban();
    }
    
    //Fungsi untuk halaman utama
    public function index()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Data Korban',
                'page'  => 'admin/v_dataKorban',
                'korban' => $this->ModelKorban->ambilDataKorban(),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman input
    public function inputKorban()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Registrasi Korban',
                'page'  => 'admin/v_inputKorban',
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database
    public function insertDataKorban(){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'no-ID' => [
                    'label' => 'Nomor Identitas Korban',
                    'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[data-korban.nik_korban]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'numeric' => '{field} Tidak Valid!',
                        'max_length' => 'Harus Berisi 16 Digit',
                        'min_length' => 'Harus Berisi 16 Digit',
                        'is_unique' => 'Data Sudah Ada!'
                    ]
                ], 
                'nama' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required|alpha_space|max_length[45]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 45 Karakter'
                    ]
                ], 
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ]
            ])) {
                
                //Jika Lolos Validasi
                $data = [
                    'nik_korban' => $this->request->getPost('no-ID'),
                    'nama_korban' => $this->request->getPost('nama'),
                    'alamat_korban' => $this->request->getPost('alamat'),
                    'kategori_korban' => $this->request->getPost('kategori'),
                    'jk_korban' => $this->request->getPost('jk'),
                ];
            
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelKorban->insertDataKorban($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Ditambahkan!']);
                return redirect()->to(base_url('Korban/inputKorban'))->withInput();
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Korban/inputKorban'))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman edit
    public function editKorban($nik_korban)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Edit Data Korban',
                'page'  => 'admin/v_editkorban',
                'korban' => $this->ModelKorban->ambilDataDariIDKorban($nik_korban),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database
    public function editDataKorban($nik_korban){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'nama' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required|alpha_space|max_length[45]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 45 Karakter'
                    ]
                ], 
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ]
            ])) {
                
                $korban = $this->ModelKorban->ambilDataDariIDKorban($nik_korban);
        
                //Jika Lolos Validasi
                $data = [
                    'nik_korban' => $nik_korban,
                    'nama_korban' => $this->request->getPost('nama'),
                    'alamat_korban' => $this->request->getPost('alamat'),
                    'kategori_korban' => $this->request->getPost('kategori'),
                    'jk_korban' => $this->request->getPost('jk'),
                ];
                
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelKorban->editDataKorban($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Diedit!']);
                return redirect()->to(base_url('Korban'));
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Korban/editKorban/'.$nik_korban))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk hapus data
    public function hapusKorban($nik_korban)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'nik_korban' => $nik_korban,
            ];
            
            //Kirim data ke fungsi hapus didalam folder model
            $this->ModelKorban->hapusDataKorban($data);
            //Berikan Popup Berhasil
            session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Dihapus!']);
            return redirect()->to(base_url('Korban'));
        }else {
            return redirect()->to(base_url('Login'));
        }
    }
}