<?php

namespace App\Controllers;

use App\Models\GuestModel;

class GuestController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
    }

	public function index()
	{
        $GuestModel = new GuestModel();
        $data = [
            'title' => 'Registrasi',
            'listRT' => $GuestModel->getListRT()
        ];
		return view('Guest/v-register', $data);
    }

    public function landing()
    {
        $data = [
            'title' => 'Welcome',
        ];		
        // echo view("layout/v-head.php", $data);
        echo view("Guest/v-landing.php", $data);
        // echo view("layout/v-footer.php");
    }

    public function save()
    {
        // Get fotoKTP & fotoKK files
        $fileKTP = $this->request->getFile('fotoKTP');
        $ext_KTP = $fileKTP->getClientExtension();
        $fileKK = $this->request->getFile('fotoKK');
        $ext_KK = $fileKK->getClientExtension();

        // Retrieve post data
        $data = [
            'rt' => $this->request->getPost('rt'),
            'nama_warga' => $this->request->getPost('nama_warga'),
            'nik' => $this->request->getPost('nik'),
            'no_kk' => $this->request->getPost('no_kk'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            're-password' => $this->request->getPost('re-password'),
            'fotoKTP' => $this->request->getPost('nik') . "_KTP." . $ext_KTP,
            'fotoKK' => $this->request->getPost('nik') . "_KK." . $ext_KK,
            'jenis' => 'Tetap'
        ];

        // Run validation
        $var = $this->form_validation->run($data, 'user');
        
        // Check if musiman checked
        $check_musiman = $this->request->getPost('musiman');

        // if musiman checked
        if(isset($check_musiman)){
            // Get skMusiman file
            $fileMusiman = $this->request->getFile('skMusiman');
            $ext_Musiman = $fileMusiman->getClientExtension();

            // Retrieve skMusiman
            $data['skMusiman'] = $this->request->getPost('nik') . "_SKPindah." . $ext_Musiman;

            $data['jenis'] = 'Musiman';

            // Run validation
            $var = $this->form_validation->run($data, 'userMusiman');
        }
        

        // if not validated
        if($var == FALSE){
            // Store prev input data to FlashData
            session()->setFlashdata('inputs', $this->request->getPost());
            // Store error message to FlashData
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            // Redirect back
            return redirect()->to(base_url('register'));
        } else {
            $fileKTP->move(ROOTPATH . 'public/files/KTP', $data['fotoKTP']);
            $fileKK->move(ROOTPATH . 'public/files/KK', $data['fotoKK']);
            if(isset($fileMusiman)) $fileMusiman->move(ROOTPATH . "public/files/SKPindah", $data['skMusiman']);

            $GuestModel = new GuestModel();

            // Insert to User
            $toUserTable = [
                'id_user' => NULL,
                'username' => $data['nik'],
                'password' => $data['password'],
                'level' => '3',
            ];
            $GuestModel->insert_user($toUserTable);

            // Get id_user
            $findUser = $GuestModel->where('username', $data['nik'])->first();

            // Insert to Warga
            $toWargaTable = [
                'id_warga' => NULL,
                'id_user' => $findUser['id_user'],
                'id_rt' => $data['rt'],
                'nama_warga' => $data['nama_warga'],
                'nik' => $data['nik'],
                'no_kk' => $data['no_kk'],
                'foto_KTP' => $data['fotoKTP'],
                'foto_KK' => $data['fotoKK'],
                'pas_foto' => '',
                'jenis_warga' => $data['jenis'],
                'status_akun' => 'Belum Diverifikasi'
            ];
            $GuestModel->insert_warga($toWargaTable);
            
            if($data['jenis'] === 'Musiman'){
                $findWarga = $GuestModel->findWarga($data['nik']);
                
                $toWargaMusiman = [
                    'id_wm' => NULL,
                    'id_warga' => $findWarga[0]['id_warga'],
                    'sk_pindah' => $data['skMusiman']
                ];
                $GuestModel->insert_wargaMusiman($toWargaMusiman);
            }
            
            // var_dump($toWargaMusiman);
            // print_r($this->request->getVar());
            session()->setFlashdata('success', 'Registrasi berhasil. Harap tunggu persetujuan RW untuk aktivasi akun.');
            return redirect()->to(base_url('register'));
        }
    }
    
}
