<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $db;
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $allowedFields    = [
        'id', 'username', 'password', 'role', 'id_desa', 'nama_lengkap'
    ];

    public function getLogin($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getUser()
    {
        $query = $this->db->query("SELECT users.*, users.id as id_user, kabupaten.*, desa.*, kecamatan.* 
        FROM users 
        LEFT JOIN desa on desa.id = users.id_desa
        LEFT JOIN kecamatan on kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = kecamatan.id_kabupaten
        ORDER BY users.nama_lengkap ASC");
        return $query->getResult();
    }

    public function getUserid($id)
    {
        $query = $this->db->query("SELECT users.*, users.id as id_user, kabupaten.*, desa.*, kecamatan.* 
        FROM users 
        LEFT JOIN desa on desa.id = users.id_desa
        LEFT JOIN kecamatan on kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = kecamatan.id_kabupaten
        where users.id = $id");
        return $query->getResultArray();
    }
}
