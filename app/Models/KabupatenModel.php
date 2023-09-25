<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kabupaten';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $allowedFields    = [
        'id', 'nama_kabupaten'
    ];

    public function getKabupaten($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getJumlahKabupaten()
    {
        $query = $this->db->query("SELECT COUNT(desa.id) as jumlah_desa,kabupaten.id, kabupaten.nama_kabupaten
        FROM kabupaten
        LEFT JOIN desa on desa.id_kabupaten = kabupaten.id 
        GROUP BY kabupaten.id 
        ORDER BY kabupaten.nama_kabupaten ASC");
        return $query->getResult();
    }

    public function getJumlah()
    {
        $query = $this->db->query("SELECT COUNT(desa.id) as jumlah_desa, COUNT(DISTINCT kecamatan.id) as jumlah_kecamatan, kabupaten.id, kabupaten.nama_kabupaten
        FROM desa
        LEFT JOIN kecamatan on kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten on desa.id_kabupaten = kabupaten.id 
        GROUP BY kabupaten.id 
        ORDER BY kabupaten.nama_kabupaten ASC");
        return $query->getResult();
    }

    public function getJumlahKecamatan()
    {
        $query = $this->db->query("SELECT COUNT(kecamatan.id) as jumlah_kecamatan, kabupaten.id, kabupaten.nama_kabupaten
        FROM kabupaten
        LEFT JOIN kecamatan on kecamatan.id_kabupaten = kabupaten.id 
        GROUP BY kabupaten.id 
        ORDER BY kabupaten.nama_kabupaten ASC");
        return $query->getResult();
    }
}
