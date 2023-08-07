<?php

namespace App\Controllers;

use App\Models\ModelPoskoFaskes;

class PoskoFaskes extends BaseController
{
    public function __construct() {
        $this->ModelPoskoFaskes = new ModelPoskoFaskes();
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
                'judul' => 'Data Posko dan Fasilitas Kesehatan',
                'page'  => 'admin/v_dataPosko',
                'posko' => $this->ModelPoskoFaskes->ambilDataPoskoFaskes(),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman input
    public function inputPosko()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Tambah Data Posko dan Fasilitas Kesehatan',
                'page'  => 'admin/v_inputPosko',
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data
    public function insertDataPosko(){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'nama-Posko' => [
                    'label' => 'Nama Posko atau Faskes',
                    'rules' => 'required|alpha_numeric_space|max_length[45]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!',
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
                ],
                'nama-Petugas' => [
                    'label' => 'Nama Petugas',
                    'rules' => 'required|alpha_space|max_length[45]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 45 Karakter'
                    ]
                ],
                'telp-Petugas' => [
                    'label' => 'Telepon Petugas',
                    'rules' => 'required|numeric|max_length[13]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'numeric' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 13 Karakter'
                    ]
                ],
                'latitude' => [
                    'label' => 'Latitude',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ],
                'longitude' => [
                    'label' => 'Longitude',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ]
            ])) {
                
                //Jika Lolos Validasi
                $data = [
                    'identitas_posko' => $this->request->getPost('nama-Posko'),
                    'alamat_posko' => $this->request->getPost('alamat'),
                    'nama_petugas' => $this->request->getPost('nama-Petugas'),
                    'telepon_petugas' => $this->request->getPost('telp-Petugas'),
                    'lat_posko' => $this->request->getPost('latitude'),
                    'long_posko' => $this->request->getPost('longitude'),
                ];
            
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelPoskoFaskes->insertDataPoskoFaskes($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Ditambahkan!']);
                return redirect()->to(base_url('PoskoFaskes/inputPosko'))->withInput();
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('PoskoFaskes/inputPosko'))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman edit
    public function editPosko($id_posko)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Edit Data Posko dan Fasilitas Kesehatan',
                'page'  => 'admin/v_editPosko',
                'posko' => $this->ModelPoskoFaskes->ambilDataDariIDPoskoFaskes($id_posko),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data 
    public function editDataPosko($id_posko){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'nama-Posko' => [
                    'label' => 'Nama Posko atau Faskes',
                    'rules' => 'required|alpha_numeric_space|max_length[45]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!',
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
                ],
                'nama-Petugas' => [
                    'label' => 'Nama Petugas',
                    'rules' => 'required|alpha_space|max_length[45]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 45 Karakter'
                    ]
                ],
                'telp-Petugas' => [
                    'label' => 'Telepon Petugas',
                    'rules' => 'required|numeric|max_length[13]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'numeric' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 13 Karakter'
                    ]
                ],
                'latitude' => [
                    'label' => 'Latitude',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ],
                'longitude' => [
                    'label' => 'Longitude',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ]
            ])) {
                
                $posko = $this->ModelPoskoFaskes->ambilDataDariIDPoskoFaskes($id_posko);
        
                //Jika Lolos Validasi
                $data = [
                    'id_posko' => $id_posko,
                    'identitas_posko' => $this->request->getPost('nama-Posko'),
                    'alamat_posko' => $this->request->getPost('alamat'),
                    'nama_petugas' => $this->request->getPost('nama-Petugas'),
                    'telepon_petugas' => $this->request->getPost('telp-Petugas'),
                    'lat_posko' => $this->request->getPost('latitude'),
                    'long_posko' => $this->request->getPost('longitude'),
                ];
                
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelPoskoFaskes->editDataPoskoFaskes($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Diedit!']);
                return redirect()->to(base_url('PoskoFaskes'));
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('PoskoFaskes/editPosko/'.$id_posko))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk hapus data
    public function hapusPosko($id_posko)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'id_posko' => $id_posko,
            ];
            
            //Kirim data ke fungsi hapus didalam folder model
            $this->ModelPoskoFaskes->hapusDataPoskoFaskes($data);
            //Berikan Popup Berhasil
            session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Dihapus!']);
            return redirect()->to(base_url('PoskoFaskes'));
        }else {
            return redirect()->to(base_url('Login'));
        }
    }
}