<?php

namespace App\Controllers;

class Logout extends BaseController
{
    
    //Fungsi untuk halaman utama
    public function index()
    {
        if (empty(session()->get('username'))) {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') == '') {
            return redirect()->to(base_url('Login'));
        }elseif (session()->get('username') != '' && session()->get('level') == 'Admin' || session()->get('level') == 'Super Admin') {
            session()->destroy();
            return redirect()->to(base_url('Login'));
        }else {
            return redirect()->to(base_url('Login'));
        }
    }
}