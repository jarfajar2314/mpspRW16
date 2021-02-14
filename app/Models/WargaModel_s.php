<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel_s extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'id_warga';
    protected $allowedFields = ['id_warga', 'nama_warga', 'nik', 'no_kk', 'pas_foto', 'foto_kk', 'foto_ktp', 'jenis_warga', 'status_akun', 'id_user'];

    public function getWarga($keyword)
    {
        return $this->where(['id_user' => $keyword])
            ->first();
    }

    public function getUser($keyword)
    {
        return $this->db->table('warga')
            ->join('user', 'warga.id_user=user.id_user')
            ->where('warga.id_user', $keyword)
            ->get()
            ->getResultArray();
    }

    public function login($id)
    {
        return $this->db->table('warga')
            ->where('id_user', $id)
            ->get()
            ->getResultArray();
    }
}
