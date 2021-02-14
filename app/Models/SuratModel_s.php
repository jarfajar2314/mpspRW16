<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel_s extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    protected $allowedFields = ['id_surat', 'id_warga', 'status_persetujuan', 'status_pemalsuan', 'nama_surat', 'id_jenis', 'keterangan_surat', 'tanggal_diajukan', 'tanggal_ttd_rt'];

    public function getAllSurat()
    {
        return $this->db->table('surat')
            ->join('warga', 'surat.id_warga=warga.id_warga')
            ->get()
            ->getResultArray();
    }

    public function getSurat($id)
    {
        return $this->db->table('surat')
            ->join('warga', 'surat.id_warga=warga.id_warga')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('warga.id_user', $id)
            // ->groupBy('id_surat')
            ->get()
            ->getResultArray();
    }

    public function getSuratByRT($id)
    {
        return $this->db->table('rt')
            ->join('warga', 'warga.id_rt=rt.id_rt')
            ->join('surat', 'surat.id_warga=warga.id_warga')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('rt.id_user', $id)
            ->get()
            ->getResultArray();
    }

    public function getSuratById($id)
    {
        return $this->db->table('surat')
            ->join('warga', 'warga.id_warga=surat.id_warga')
            ->join('warga_musiman', 'warga_musiman.id_warga=surat.id_warga', 'left')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('surat.id_surat', $id)
            ->get()
            ->getResultArray();
    }


    public function getTotalPengajuanByRT($id)
    {
        return $this->db->table('rt')
            ->join('warga', 'warga.id_rt=rt.id_rt')
            ->join('surat', 'surat.id_warga=warga.id_warga')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('rt.id_user', $id)
            ->countAllResults();
    }

    public function getTotalTerverifikasiByRT($id)
    {
        return $this->db->table('rt')
            ->join('warga', 'warga.id_rt=rt.id_rt')
            ->join('surat', 'surat.id_warga=warga.id_warga')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('rt.id_user', $id)
            ->where('status_persetujuan', 1)
            ->countAllResults();
    }

    public function getTotalPengajuanByWarga($id)
    {
        return $this->db->table('warga')
            ->join('surat', 'surat.id_warga=warga.id_warga')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('warga.id_user', $id)
            ->countAllResults();
    }

    public function getTotalTerverifikasiRTByWarga($id)
    {
        return $this->db->table('warga')
            ->join('surat', 'surat.id_warga=warga.id_warga')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('warga.id_user', $id)
            ->where('status_persetujuan', 1)
            ->countAllResults();
    }



    public function getTotalTerverifikasiRWByWarga($id)
    {
        return $this->db->table('warga')
            ->join('surat', 'surat.id_warga=warga.id_warga')
            ->join('jenis_surat', 'surat.id_jenis=jenis_surat.id_jenis')
            ->where('warga.id_user', $id)
            ->where('status_persetujuan', 2)
            ->countAllResults();
    }


    public function getJS()
    {
        return $this->db->table('jenis_surat')
            ->get()
            ->getResultArray();
    }
}
