<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    public function __construct() {
        $this->ModelLokasi = new ModelLokasi();
    }
    
    //Fungsi untuk halaman utama [Tabel Pemetaan Bangunan]
    public function index()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Data Lokasi',
                'page'  => 'admin/v_datalokasi',
                'lokasi' => $this->ModelLokasi->ambilDataBangunan(),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman input lokasi [Tabel Pemetaan Bangunan]
    public function inputLokasi()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Registrasi Data Bangunan Rusak, Posko dan Faskes',
                'page'  => 'admin/v_inputlokasi',
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database [Tabel Pemetaan Bangunan]
    public function insertDataBangunan(){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'pemilik' => [
                    'label' => 'Pemilik Bangunan',
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!'
                    ]
                ], 
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => 'Data {field} Tidak Valid!'
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
                ],
                'foto' => [
                    'label' => 'Foto Bangunan',
                    'rules' => 'uploaded[foto]|max_size[foto,3072]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'uploaded' => 'File {field} Tidak Boleh Kosong!',
                        'max_size' => 'Ukuran File {field} Maksimal 3 MB!',
                        'mime_in' => 'Format File {field} Tidak Sesuai!',
                    ]
                ]
            ])) {
                $foto = $this->request->getFile('foto');
                $namafilefoto = $foto->getRandomName();
                //Jika Lolos Validasi
                $data = [
                    'nama_pemilik' => $this->request->getPost('pemilik'),
                    'alamat_bangunan' => $this->request->getPost('alamat'),
                    'jenis_bangunan' => $this->request->getPost('kategori'),
                    'foto_bangunan' => $namafilefoto,
                    'lat_bangunan' => $this->request->getPost('latitude'),
                    'long_bangunan' => $this->request->getPost('longitude'),
                ];
                $foto->move('foto/lokasi',$namafilefoto);
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelLokasi->insertDataBangunan($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Ditambahkan!']);
                return redirect()->to(base_url('Lokasi/inputLokasi'))->withInput();
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Lokasi/inputLokasi'))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman edit lokasi [Tabel Pemetaan Bangunan]
    public function editLokasi($id_bangunan)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Edit Data Bangunan Rusak, Posko dan Faskes',
                'page'  => 'admin/v_editlokasi',
                'lokasi' => $this->ModelLokasi->ambilDataDariIDBangunan($id_bangunan),
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk masukkan data ke Database [Tabel Pemetaan Bangunan]
    public function editDataBangunan($id_bangunan){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'pemilik' => [
                    'label' => 'Pemilik Bangunan',
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => 'Data {field} Tidak Valid!'
                    ]
                ], 
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required|alpha_numeric_punct',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_numeric_punct' => 'Data {field} Tidak Valid!'
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
                ],
                'foto' => [
                    'label' => 'Foto Bangunan',
                    'rules' => 'max_size[foto,3072]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                    'errors' => [
                        'max_size' => 'Ukuran File {field} Maksimal 3 MB!',
                        'mime_in' => 'Format File {field} Tidak Sesuai!',
                    ]
                ]
            ])) {
                $foto = $this->request->getFile('foto');
    
                $lokasi = $this->ModelLokasi->ambilDataDariIDBangunan($id_bangunan);
                if ($foto->getError()==4) {
                    $namafilefoto = $lokasi['foto_bangunan'];
                }else{
                    $namafilefoto = $foto->getRandomName();
                    $filefotolama = $lokasi['foto_bangunan'];
                    if (file_exists("foto/lokasi/".$filefotolama)) {
                        unlink("foto/lokasi/".$filefotolama);
                    }
                    $foto->move('foto/lokasi',$namafilefoto);
                }
                //Jika Lolos Validasi
                $data = [
                    'id_bangunan' => $id_bangunan,
                    'nama_pemilik' => $this->request->getPost('pemilik'),
                    'alamat_bangunan' => $this->request->getPost('alamat'),
                    'jenis_bangunan' => $this->request->getPost('kategori'),
                    'foto_bangunan' => $namafilefoto,
                    'lat_bangunan' => $this->request->getPost('latitude'),
                    'long_bangunan' => $this->request->getPost('longitude'),
                ];
                
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelLokasi->editDataBangunan($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Diedit!']);
                return redirect()->to(base_url('Lokasi'));
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Lokasi/editLokasi/'.$id_bangunan))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk hapus data bangunan [Tabel Pemetaan Bangunan]
    public function hapusLokasi($id_bangunan)
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $lokasi = $this->ModelLokasi->ambilDataDariIDBangunan($id_bangunan);

            $data = [
                'id_bangunan' => $id_bangunan,
            ];

            $filefoto = $lokasi['foto_bangunan'];
            if (file_exists("foto/lokasi/".$filefoto)) {
                unlink("foto/lokasi/".$filefoto);
            }
            
            //Kirim data ke fungsi hapus didalam folder model
            $this->ModelLokasi->hapusDataBangunan($data);
            //Berikan Popup Berhasil
            session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Berhasil Dihapus!']);
            return redirect()->to(base_url('Lokasi'));
        }else {
            return redirect()->to(base_url('Login'));
        }
    }
}