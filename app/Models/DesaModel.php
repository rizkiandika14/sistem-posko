<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'desa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $db;
    protected $allowedFields    = [
        'id', 'nama_desa', 'id_kabupaten', 'id_kecamatan'
    ];

    public function getDesa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getNamadesa()
    {
        $query = $this->db->query("SELECT desa.*, kecamatan.nama_kecamatan, kabupaten.nama_kabupaten FROM desa
        JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        ORDER BY desa.nama_desa ASC");
        return $query->getResult();
    }
}
