<?php namespace App\Models;

use CodeIgniter\Model;
use App\Config\Database;

class RWModel extends Model
{
    protected $table = 'surat';

    public function getAllSurat(){

        return $this->db->table('surat')
            ->join('warga','warga.id_warga=surat.id_warga')
            ->join('jenis_surat', 'jenis_surat.id_jenis=surat.id_jenis')
            ->orderBy('tanggal_diajukan','ASC')
            ->get()
            ->getResultArray();
            
    }

    public function getSuratWithStatus($id){

        return $this->db->table('surat')
            ->join('warga','warga.id_warga=surat.id_warga')
            ->join('jenis_surat', 'jenis_surat.id_jenis=surat.id_jenis')
            // ->orderBy('tanggal_diajukan','ASC')
            ->getWhere(['surat.status_persetujuan' => $id])
            ->getResultArray();

    }

    public function getBelumVerifikasi(){
        return $this->db->table('warga')
        ->join('warga_musiman','warga_musiman.id_warga=warga.id_warga', 'left')
        ->getWhere(['status_akun' => "Belum Diverifikasi" ])
        ->getResultArray();
    }

    public function getLaporanPemalsuan(){
        return $this->db->table('lap_pemalsuan')->get()->getResultArray();
    }

    public function getAllWarga(){
        return $this->db->table('warga')
        ->join('warga_musiman','warga_musiman.id_warga=warga.id_warga', 'left')
        ->get()
        ->getResultArray();
    }

    public function verifikasi($nik){
        return $this->db->table('warga')
        ->set('status_akun', 'Sudah Diverifikasi')
        ->where('nik', $nik)
        ->update();
    }

    public function verifikasi_surat($id_warga){
        return $this->db->table('surat')
        ->set('status_persetujuan', '2')
        ->set('noreg_rw', '')
        ->set('tanggal_selesai', '2')
        ->where('id_warga', $id_warga)
        ->update();
    }
}