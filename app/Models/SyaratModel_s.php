<?php

namespace App\Models;

use CodeIgniter\Model;

class SyaratModel_s extends Model
{
    protected $table = 'jenis_surat2';
    protected $primaryKey = 'id_jenis2';
    protected $allowedFields = ['id_jenis2', 'keterangan'];

    public function getAllSurat()
    {
        return $this->db->table('jenis_surat2')
            ->get()
            ->getResultArray();
    }

    public function getAllSyarat()
    {
        return $this->db->table('persyaratan')
            ->get()
            ->getResultArray();
    }
}
