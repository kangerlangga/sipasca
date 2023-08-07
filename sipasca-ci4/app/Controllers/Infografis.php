<?php

namespace App\Controllers;

use App\Models\ModelInfografis;

class Infografis extends BaseController
{
    public function __construct() {
        $this->ModelInfografis = new ModelInfografis();
    }
    
    //Fungsi untuk halaman utama [Tabel Data Infografis]
    public function index()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Data Gambar Infografis',
                'page'  => 'admin/v_dataInfografis',
                'infografis' => $this->ModelInfografis->ambilDataInfografis(),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman input [Tabel Data Infografis]
    public function inputInfografis()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Tambah Gambar Infografis',
                'page'  => 'admin/v_inputinfografis',
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database [Tabel Data Infografis]
    public function insertDataInfografis(){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'sumber' => [
                    'label' => 'URL Sumber Infografis',
                    'rules' => 'required|valid_url_strict[https]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'valid_url_strict' => 'URL Tidak Valid'
                    ]
                ], 
                'gambar' => [
                    'label' => 'Gambar Infografis',
                    'rules' => 'uploaded[gambar]|max_size[gambar,5120]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'uploaded' => 'File {field} Tidak Boleh Kosong!',
                        'max_size' => 'Ukuran File {field} Maksimal 5 MB!',
                        'mime_in' => 'Format File {field} Tidak Sesuai!',
                    ]
                ]
            ])) {
                
                $gbr = $this->request->getFile('gambar');
                $namafilegbr = $gbr->getRandomName();
                //Jika Lolos Validasi
                $data = [
                    'link_sumber' => $this->request->getPost('sumber'),
                    'gambar_infografis' => $namafilegbr,
                    'visibilitas' => $this->request->getPost('visibilitas'),
                ];
            
                $gbr->move('foto/infografis',$namafilegbr);
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelInfografis->insertDataInfografis($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Ditambahkan!']);
                return redirect()->to(base_url('Infografis/inputInfografis'))->withInput();
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Infografis/inputInfografis'))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman edit Kebutuhan [Tabel Data Infografis]
    public function editInfografis($id_infografis)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Edit Data Infografis',
                'page'  => 'admin/v_editInfografis',
                'infografis' => $this->ModelInfografis->ambilDataDariIDInfografis($id_infografis),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database [Tabel Data Infografis]
    public function editDataInfografis($id_infografis){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'sumber' => [
                    'label' => 'URL Sumber Infografis',
                    'rules' => 'required|valid_url_strict[https]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'valid_url_strict' => 'URL Tidak Valid'
                    ]
                ], 
                'gambar' => [
                    'label' => 'Gambar Infografis',
                    'rules' => 'max_size[gambar,5120]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'max_size' => 'Ukuran File {field} Maksimal 5 MB!',
                        'mime_in' => 'Format File {field} Tidak Sesuai!',
                    ]
                ]
            ])) {
    
                $gbr = $this->request->getFile('gambar');
    
                $infografis = $this->ModelInfografis->ambilDataDariIDInfografis($id_infografis);
                if ($gbr->getError()==4) {
                    $namafilegbr = $infografis['gambar_infografis'];
                }else{
                    $namafilegbr = $gbr->getRandomName();
                    $filegbrlama = $infografis['gambar_infografis'];
                    if (file_exists("foto/infografis/".$filegbrlama)) {
                        unlink("foto/infografis/".$filegbrlama);
                    }
                    $gbr->move('foto/infografis/',$namafilegbr);
                }
        
                //Jika Lolos Validasi
                $data = [
                    'id_infografis' => $id_infografis,
                    'link_sumber' => $this->request->getPost('sumber'),
                    'gambar_infografis' => $namafilegbr,
                    'visibilitas' => $this->request->getPost('visibilitas'),
                ];
                
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelInfografis->editDataInfografis($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Diedit!']);
                return redirect()->to(base_url('Infografis'));
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Infografis/editInfografis/'.$id_infografis))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk hapus data [Tabel Data Infografis]
    public function hapusInfografis($id_infografis)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $infografis = $this->ModelInfografis->ambilDataDariIDInfografis($id_infografis);

            $data = [
                'id_infografis' => $id_infografis,
            ];

            $filegbr = $infografis['gambar_infografis'];
            if (file_exists("foto/infografis/".$filegbr)) {
                unlink("foto/infografis/".$filegbr);
            }
            
            //Kirim data ke fungsi hapus didalam folder model
            $this->ModelInfografis->hapusDataInfografis($data);
            //Berikan Popup Berhasil
            session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Dihapus!']);
            return redirect()->to(base_url('Infografis'));
        }else {
            return redirect()->to(base_url('Login'));
        }
    }
}