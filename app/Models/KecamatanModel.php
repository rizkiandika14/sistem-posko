<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class KecamatanModel extends Model
{

    protected $db;
    protected $table            = 'kecamatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id', 'nama_kecamatan', 'id_kabupaten'
    ];

    public function getKecamatan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getJumlahKecamatan()
    {
        $query = $this->db->query("SELECT COUNT(desa.id) as jumlah_desa, kabupaten.nama_kabupaten, kecamatan.id, kecamatan.nama_kecamatan, kecamatan.id_kabupaten 
        FROM kecamatan 
        LEFT JOIN desa on desa.id_kecamatan = kecamatan.id 
        LEFT JOIN kabupaten ON kabupaten.id = kecamatan.id_kabupaten 
        GROUP BY kecamatan.id 
        ORDER BY kecamatan.nama_kecamatan ASC");
        return $query->getResult();
    }
}
