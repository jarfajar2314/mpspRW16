<?php

namespace App\Controllers;

use App\Models\RtModel_s;
use App\Models\UserModel_s;
use App\Models\WargaModel_s;

class login extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel_s();
        $this->rt = new RtModel_s();
        $this->warga = new WargaModel_s();
    }

    public function index()
    {
        return view('guest/login');
    }


    public function proses_login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $ceklogin = $this->user->login($username, $password);

        if ($ceklogin) {
            foreach ($ceklogin as $row) {
                $session = \Config\Services::session();

                $session->set('id_user', $row['id_user']);
                $session->set('username', $row['username']);
                $session->set('level', $row['level']);

                if ($session->get('level') == "3") { //warga
                    $orang = $this->warga->login($session->get('id_user'));
                    foreach ($orang as $row) {
                        $session->set('nama', $row['nama_warga']);
                    }
                    return redirect()->to(base_url('warga/dashboard'));
                    
                } elseif ($session->get('level') == "2") { //rt
                    $orang = $this->rt->login($session->get('id_user'));
                    foreach ($orang as $row) {
                        $session->set('nama', $row['nama_rt']);
                    }
                    return redirect()->to(base_url('rt/dashboard'));
                    
                } else { //rw
                    $session->set('nama', 'Ketua RW!');
                    return redirect()->to(base_url('rw/dashboard'));
                }
                // return redirect()->to(base_url('dashboard'));
            }
        } else {
            $data['data'] = "Username dan Password tidak sesuai!";
            return view('login', $data);
        }
    }

    public function logout()
    {
        //Menghapus semua session (sesi)
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
