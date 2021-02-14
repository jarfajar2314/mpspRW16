<?php

namespace App\Controllers;

use App\Models\SuratModel_s;
use App\Models\WargaModel_s;

class rt extends BaseController
{
    public function __construct()
    {
        $this->warga = new WargaModel_s();
        $this->surat = new SuratModel_s();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $id = $session->get('id_user');

        $data = [
            'surat' => $this->surat->getSuratByRT($id),
            'jumlahPengajuan' => $this->surat->getTotalPengajuanByRT($id),
            'jumlahTerverifikasi' => $this->surat->getTotalTerverifikasiByRT($id),
            'content' => 'rt/dashboard',
            'title' => 'Dashboard',
            'level' => 'rt'
        ];

        return view('layout/v-wrapper', $data);
    }

    public function verifSurat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $this->surat->save([
            'id_surat' => $this->request->getVar('id_surat'),
            'id_warga' => $this->request->getVar('id_warga'),
            'status_persetujuan' => 1,
            'status_pemalsuan' => $this->request->getVar('status_pemalsuan'),
            'nama_surat' => $this->request->getVar('nama_surat'),
            'id_jenis' => $this->request->getVar('id_jenis'),
            'tanggal_diajukan' => $this->request->getVar('tanggal_diajukan'),
            'tanggal_ttd_rt' => $now
        ]);

        $session = \Config\Services::session();
        $session->setFlashdata('success', 'Data Surat Disetujui');
        return redirect()->to(base_url('rt/index'));
    }

    public function daftarSurat()
    {
        $session = \Config\Services::session();
        $id = $session->get('id_user');

        $data = [
            'surat' => $this->surat->getSuratByRT($id),
            'content' => 'rt/daftar-surat',
            'title' => 'Daftar Surat',
            'level' => 'rt'
        ];

        return view('layout/v-wrapper', $data);
    }

    public function lihatDataSurat($id_surat)
    {
        $data = [
            'surat' => $this->surat->getSuratById($id_surat),
            'content' => 'rt/data-surat',
            'title' => 'Data Surat',
            'level' => 'rt'
        ];

        return view('layout/v-wrapper', $data);
    }

    public function verifikasiAkun()
	{
        // $rwModel = new RWModel();
        $data = [
            'title' => 'Verifikasi Akun',
            'content' => 'RT/verifikasiAkun',
            // 'akun' => $rwModel->getBelumVerifikasi()
            'akun' => [0],
            // 'akun' => $rwModel->getAllWarga(),
            'level' => 'rt'
        ];
		return view('layout/v-wrapper', $data);
	}
}
