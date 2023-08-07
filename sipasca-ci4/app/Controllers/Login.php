<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Login extends BaseController
{
    public function __construct() {
        $this->ModelLogin = new ModelLogin();
    }
    
    //Fungsi untuk halaman utama
    public function index()
    {
        if (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            return redirect()->to(base_url('Dashboard'));
        }else {
            $data = [
                'judul' => 'Login',
            ];
            return view('publik/v_login', $data);
        }
    }

    //Fungsi untuk masukkan data ke Database
    public function validasiLogin(){
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'Kolom {field} Tidak Boleh Kosong!',
                    'alpha_numeric' => '{field} Tidak Valid!'
                ]
            ]
        ])) {
            
            //Jika Lolos Validasi
            $data = [
                'user' => $this->request->getPost('username'),
                'pass' => $this->request->getPost('password')
            ];
        
            //Kirim data ke fungsi cek user didalam folder model
            $login = $this->ModelLogin->cekUsername($data['user']);

            if (!empty($login)  && $login != 'error'){
                if (password_verify($data['pass'], $login['password'])){
                    //Berikan Popup Berhasil
                    session()->setFlashdata(['type' => 'success', 'pesan' => 'Anda Berhasil Login!']);
                    session()->set('id',$login['id_pengguna']);
                    session()->set('username',$login['username']);
                    session()->set('nama',$login['nama_pengguna']);
                    session()->set('jabatan',$login['jabatan']);
                    session()->set('level',$login['level']);
                    session()->set('email',$login['email']);
                    session()->set('tlp',$login['telepon']);
                    session()->set('alamat',$login['alamat']);
                    return redirect()->to(base_url('Dashboard'));
                    return $login;
                }else{
                    session()->setFlashdata(['pesan' => 'GAGAL']);
                    return redirect()->to(base_url('Login'))->withInput();
                }
            }elseif (!empty($login) && $login == 'error') {
                session()->setFlashdata(['pesan' => 'GAGAL']);
                return redirect()->to(base_url('Login'))->withInput();
            }
        }else{
            //Jika tidak Lolos
            session()->setFlashdata(['pesan' => 'GAGAL']);
            return redirect()->to(base_url('Login'))->withInput();
        }
    }
}