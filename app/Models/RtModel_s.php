<?php

namespace App\Models;

use CodeIgniter\Model;

class RtModel_s extends Model
{
    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $allowedFields = ['nama_rt', 'nik', 'no_kk', 'pas_foto', 'id_user'];

    public function getRT()
    {
        return $this->db->table('RT')
            ->get()
            ->getResultArray();
    }

    public function login($id)
    {
        return $this->db->table('rt')
            ->where('id_user', $id)
            ->get()
            ->getResultArray();
    }
}
