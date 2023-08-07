<?php

namespace App\Controllers;

use App\Models\ModelKebutuhan;

class Kebutuhan extends BaseController
{
    public function __construct() {
        $this->ModelKebutuhan = new ModelKebutuhan();
    }
    
    //Fungsi untuk halaman utama [Tabel Data Kebutuhan]
    public function index()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Data Kebutuhan',
                'page'  => 'admin/v_datakebutuhan',
                'kebutuhan' => $this->ModelKebutuhan->ambilDataKebutuhan(),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman input kebutuhan [Tabel Data Kebutuhan]
    public function inputKebutuhan()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Tambah Data Kebutuhan Korban',
                'page'  => 'admin/v_inputkebutuhan',
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database [Tabel Data Kebutuhan]
    public function insertDataKebutuhan(){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'barang' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required|alpha_space|max_length[25]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 25 Karakter'
                    ]
                ], 
                'jumlah' => [
                    'label' => 'Jumlah',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'numeric' => 'Data {field} Tidak Valid!'
                    ]
                ],
                'satuan' => [
                    'label' => 'Satuan',
                    'rules' => 'required|alpha_space|max_length[10]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 10 Karakter'
                    ]
                ],
                'keterangan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ]
            ])) {
                
                //Jika Lolos Validasi
                $data = [
                    'nama_barang' => $this->request->getPost('barang'),
                    'jumlah' => $this->request->getPost('jumlah'),
                    'satuan' => $this->request->getPost('satuan'),
                    'kategori' => $this->request->getPost('kategori'),
                    'keterangan' => $this->request->getPost('keterangan'),
                ];
            
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelKebutuhan->insertDataKebutuhan($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Ditambahkan!']);
                return redirect()->to(base_url('Kebutuhan/inputKebutuhan'))->withInput();
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Kebutuhan/inputKebutuhan'))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman edit Kebutuhan [Tabel Data Kebutuhan]
    public function editKebutuhan($id_kebutuhan)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Edit Data Kebutuhan Korban',
                'page'  => 'admin/v_editkebutuhan',
                'kebutuhan' => $this->ModelKebutuhan->ambilDataDariIDKebutuhan($id_kebutuhan),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database [Tabel Data Kebutuhan]
    public function editDataKebutuhan($id_kebutuhan){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'barang' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required|alpha_space|max_length[25]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 25 Karakter'
                    ]
                ], 
                'jumlah' => [
                    'label' => 'Jumlah',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'numeric' => 'Data {field} Tidak Valid!'
                    ]
                ],
                'satuan' => [
                    'label' => 'Satuan',
                    'rules' => 'required|alpha_space|max_length[10]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 10 Karakter'
                    ]
                ],
                'keterangan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => '{field} Tidak Valid!'
                    ]
                ]
            ])) {
                
                $kebutuhan = $this->ModelKebutuhan->ambilDataDariIDKebutuhan($id_kebutuhan);
        
                //Jika Lolos Validasi
                $data = [
                    'id_kebutuhan' => $id_kebutuhan,
                    'nama_barang' => $this->request->getPost('barang'),
                    'jumlah' => $this->request->getPost('jumlah'),
                    'satuan' => $this->request->getPost('satuan'),
                    'kategori' => $this->request->getPost('kategori'),
                    'keterangan' => $this->request->getPost('keterangan'),
                ];
                
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelKebutuhan->editDataKebutuhan($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Diedit!']);
                return redirect()->to(base_url('Kebutuhan'));
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Kebutuhan/editKebutuhan/'.$id_kebutuhan))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk hapus data bangunan [Tabel Data Kebutuhan]
    public function hapusKebutuhan($id_kebutuhan)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'id_kebutuhan' => $id_kebutuhan,
            ];
            
            //Kirim data ke fungsi hapus didalam folder model
            $this->ModelKebutuhan->hapusDataKebutuhan($data);
            //Berikan Popup Berhasil
            session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Dihapus!']);
            return redirect()->to(base_url('Kebutuhan'));
        }else {
            return redirect()->to(base_url('Login'));
        }
    }
}