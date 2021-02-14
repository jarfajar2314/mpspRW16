<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel_s extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'level'];

    public function getUser()
    {
        return $this->db->table('user')
            ->get()
            ->getResultArray();
    }

    public function login($username, $password)
    {
        return $this->db->table('user')
            ->where('username', $username)
            ->where('password', $password)
            ->get()
            ->getResultArray();
    }

    public function cek_user($id)
    {
        return $this->db->table('user')
            ->join('pasien', 'pasien.id_user=user.id_user')
            ->where('pasien.id_user', $id)
            ->get()
            ->getRow();
    }

    public function user_add($id_dokter)
    {
        return $this->db->table('user')
            ->where('username', $id_dokter)
            ->get()
            ->getRow();
    }

    public function user_add2()
    {
        return $this->db->table('user')
            ->orderBy('id_user', 'DESC')
            ->limit(1)
            ->get()
            ->getRow();
    }

    public function getUpdate_User($keyword)
    {
        return $this->where(['id_user' => $keyword])
            ->first();
    }
}
