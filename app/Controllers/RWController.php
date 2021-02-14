<?php

namespace App\Controllers;

use App\Models\RWModel;

class RWController extends BaseController
{
	public function index()
	{
        $rwModel = new RWModel();
        $data = [
            'title' => 'Dashboard',
            'content' => 'RW/v-rw_dashboard',
            'surat' => $rwModel->getSuratWithStatus('1'),
            'count_surat' => count($rwModel->getSuratWithStatus('1')),
            'count_terverifikasi' => count($rwModel->getSuratWithStatus('2')),
            'count_pemalsuan' => count($rwModel->getLaporanPemalsuan()),
            'count_akun_unverified' => count($rwModel->getBelumVerifikasi()),
            'level' => 'rw'
        ];
		return view('layout/v-wrapper', $data);
    }
    
	public function daftarSurat()
	{
        $rwModel = new RWModel();
        $data = [
            'title' => 'Daftar Surat',
            'content' => 'RW/v-rw_daftarSurat',
            'surat' => $rwModel->getAllSurat(),
            'level' => 'rw'
        ];
		return view('layout/v-wrapper', $data);
    }

	public function syarat()
	{
        $data = [
            'title' => 'Daftar Surat',
            'content' => 'persyaratan',
            'level' => 'rt'
        ];
		return view('layout-s/v-wrapper', $data);
    }
    
	public function laporanPemalsuan()
	{
        $data = [
            'title' => 'Laporan Pemalsuan',
            'content' => 'RW/v-rw_laporanPemalsuan',
            'level' => 'rw'
        ];
		return view('layout/v-wrapper', $data);
	}

	public function verifikasiAkun()
	{
        $rwModel = new RWModel();
        $data = [
            'title' => 'Verifikasi Akun',
            'content' => 'RW/v-rw_verifikasiAkun',
            // 'akun' => $rwModel->getBelumVerifikasi()
            'akun' => $rwModel->getAllWarga(),
            'level' => 'rw'
        ];
		return view('layout/v-wrapper', $data);
	}

    public function viewFile($type, $filename)
    {
        $url = base_url("files/" . $type . "/" . $filename);
        // $url = base_url("files/KK/12345_KK.pdf");
        $html = '<iframe src="'.$url.'" style="border:none; width: 100%; height: 100%"></iframe>';
        // echo $html;
        return $html;
    }

    public function verifikasi($nik)
    {
        $rwModel = new RWModel();
        $rwModel->verifikasi($nik);
        session()->setFlashdata('success', 'msg');
        return redirect()->to(base_url('verifikasi-akun'));
    }

    public function verifikasi_surat($id_warga)
    {
        $rwModel = new RWModel();
        $rwModel->verifikasi_surat($id_warga);
        session()->setFlashdata('success', 'msg');
        return redirect()->to(base_url('daftar-surat'));
    }
}
