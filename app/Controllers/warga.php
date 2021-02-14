<?php

namespace App\Controllers;

use App\Models\SuratModel_s;
use App\Models\SyaratModel_s;
use App\Models\WargaModel_s;

class warga extends BaseController
{
    public function __construct()
    {
        $this->warga = new WargaModel_s();
        $this->surat = new SuratModel_s();
        $this->syarat = new SyaratModel_s();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $id = $session->get('id_user');

        $data = [
            'surat' => $this->surat->getSurat($id),
            'warga' => $this->warga->getWarga($id),
            'jumlahPengajuan' => $this->surat->getTotalPengajuanByWarga($id), //pengajuan
            'jumlahTerverifikasiRT' => $this->surat->getTotalTerverifikasiRTByWarga($id), //proses
            'jumlahTerverifikasiRW' => $this->surat->getTotalTerverifikasiRWByWarga($id), //selesai
            'content' => 'warga/dashboard',
            'title' => 'Dashboard',
            'level' => 'warga'
        ];
        return view('layout/v-wrapper', $data);
    }

    public function account()
    {
        $session = \Config\Services::session();
        $id = $session->get('id_user');
        $data['user'] = $this->warga->getUser($id);
        return view('warga/account', $data);
    }

    public function addSurat()
    {

        $session = \Config\Services::session();
        $id = $session->get('id_user');

        $data = [
            'warga' => $this->warga->getWarga($id),
            'jenis' => $this->surat->getJS(),
            'content' => 'warga/tambah-surat',
            'title' => 'Tambah Surat',
            'level' => 'warga'
        ];

        return view('layout-s/v-wrapper', $data);
    }

    public function saveSurat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $this->surat->save([
            'id_warga' => $this->request->getVar('id_warga'),
            'status_persetujuan' => 0,
            'status_pemalsuan' => 0,
            'nama_surat' => $this->request->getVar('nik'),
            'id_jenis' => $this->request->getVar('id_jenis'),
            'keterangan_surat' => $this->request->getVar('keterangan'),
            'tanggal_diajukan' => $now
        ]);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Surat Pengantar Berhasil Ditambahkan');
        return redirect()->to(base_url('warga/index'));
    }

    public function persyaratan()
    {
        $data = [
            'syarat' => $this->syarat->getAllSyarat(),
            'surat' => $this->syarat->getAllSurat(),
            'content' => 'warga/persyaratan',
            'title' => 'Persyaratan Pembuatan Surat-Surat',
            'level' => 'warga'
        ];

        return view('layout/v-wrapper', $data);
    }
}
