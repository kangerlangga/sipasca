<?php

namespace App\Controllers;

use App\Models\ModelLokasi;
use App\Models\ModelKebutuhan;
use App\Models\ModelKorban;
use App\Models\ModelLogin;

class Dashboard extends BaseController
{
    public function __construct() {
        $this->ModelLokasi = new ModelLokasi();
        $this->ModelKebutuhan = new ModelKebutuhan();
        $this->ModelKorban = new ModelKorban();
        $this->ModelLogin = new ModelLogin();
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
                'judul' => 'Dashboard',
                'page'  => 'admin/v_dashboard',
                'lokasi' => $this->ModelLokasi->ambilDataBangunan(),
                'jmlkorban' => $this->ModelKorban->totalKorban(),
                'jmlkebutuhan' => $this->ModelKebutuhan->totalKebutuhan(),
                'jmlrusak' => $this->ModelLokasi->totalRusak(),
                'user' => $this->ModelLogin->ambilDataUser(session()->get('username'))
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman profil
    public function profil()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Akun Saya',
                'page'  => 'admin/v_profile',
                'profil' => $this->ModelLogin->ambilDataUser(session()->get('username'))
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk edit data ke Database
    public function editProfile($id_pengguna){
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
                ],
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required|alpha_space|max_length[100]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'alpha_space' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 100 Karakter'
                    ]
                ],
                'email-Pengguna' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email|max_length[200]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'valid_email' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 200 Karakter',
                    ]
                ],
                'telp-Pengguna' => [
                    'label' => 'Telepon',
                    'rules' => 'required|numeric|max_length[13]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'numeric' => '{field} Tidak Valid!',
                        'max_length' => 'Maksimal Hanya 13 Karakter',
                    ]
                ]
            ])) {
        
                //Jika Lolos Validasi
                $data = [
                    'id_pengguna' => $id_pengguna,
                    'nama_pengguna' => $this->request->getPost('nama'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'email' => $this->request->getPost('email-Pengguna'),
                    'telepon' => $this->request->getPost('telp-Pengguna'),
                    'alamat' => $this->request->getPost('alamat'),
                ];
                
                //Kirim data ke fungsi insert didalam folder model
                $this->ModelLogin->editProfile($data);
                //Berikan Popup Berhasil
                session()->setFlashdata(['type' => 'success', 'pesan' => 'Data Akun Telah Diperbarui!']);
                session()->set('nama',$data['nama_pengguna']);
                return redirect()->to(base_url('Dashboard'));
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Dashboard/profil'))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk halaman ubah sandi
    public function UbahPass()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            $data = [
                'judul' => 'Ganti Password Akun',
                'page'  => 'admin/v_ubahPass',
                'profil' => $this->ModelLogin->ambilDataUser(session()->get('username'))
            ];
            return view('admin/v_dashAdmin', $data);
        }else {
            return redirect()->to(base_url('Login'));
        }
    }

    //Fungsi untuk edit data ke Database
    public function gantiPass($id_pengguna){
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            if ($this->validate([
                'old-Pass' => [
                    'label' => 'Password Lama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!'
                    ]
                ],
                'new-Pass' => [
                    'label' => 'Password Baru',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!'
                    ]
                ],
                'confirm-Pass' => [
                    'label' => 'Konfirmasi Password Baru',
                    'rules' => 'required|matches[new-Pass]',
                    'errors' => [
                        'required' => 'Kolom {field} Tidak Boleh Kosong!',
                        'matches' => '{field} Tidak Cocok!'
                    ]
                ]
            ])) {
        
                $profil = $this->ModelLogin->ambilDataUserID($id_pengguna);
                //Cek Password lama
                $passwordlama = $this->request->getPost('old-Pass');
                $cek = $this->ModelLogin->cekUsername($profil['username']);
                if (password_verify($passwordlama, $cek['password'])){
                    //Jika Lolos Validasi
                    $passwordbaru = $this->request->getPost('new-Pass');
                    $password = password_hash($passwordbaru, PASSWORD_DEFAULT);
                    $data = [
                        'id_pengguna' => $id_pengguna,
                        'password' => $password,
                    ];
                    
                    //Kirim data ke fungsi edit didalam folder model
                    $this->ModelLogin->editProfile($data);
                    //Berikan Popup Berhasil
                    session()->setFlashdata(['type' => 'success', 'pesan' => 'Password Akun Telah Diperbarui!']);
                    return redirect()->to(base_url('Dashboard'));
                }else {
                    //Jika pass lama salah
                    session()->setFlashdata(['type' => 'error', 'pesan' => 'Password Lama Anda Salah!']);
                    return redirect()->to(base_url('Dashboard/UbahPass'))->withInput();
                }
            }else{
                //Jika tidak Lolos
                return redirect()->to(base_url('Dashboard/UbahPass'))->withInput();
            }
        }else {
            return redirect()->to(base_url('Login'));
        }
    }
}
