<?php namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table = 'user';

    // Insert to user table
    public function insert_user($data){
        return $this->db->table('user')->insert($data);
    
    }

    // Insert to warga table
    public function insert_warga($data){
        return $this->db->table('warga')->insert($data);
    }

    // Insert to warga table
    public function insert_wargaMusiman($data){
        return $this->db->table('warga_musiman')->insert($data);
    }

    public function findWarga($data){
        return $this->db->table('warga')->getWhere(['nik' => $data])->getResultArray();
    }

    public function getListRT(){
        return $this->db->table('rt')->get()->getResultArray();
    }
}