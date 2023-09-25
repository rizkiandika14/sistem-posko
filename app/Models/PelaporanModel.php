<?php

namespace App\Models;

use CodeIgniter\Model;

class PelaporanModel extends Model
{
    protected $table            = 'pelaporan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields    = [
        'id_kecamatan', 'id_kabupaten', 'id_desa', 'id_user', 'jumlah_rumah', 'jumlah_warga', 'jumlah_meninggal', 'jumlah_pengungsi',
        'kebutuhan_perahu', 'kebutuhan_tenda', 'kebutuhan_beras', 'kebutuhan_telur', 'kebutuhan_mineral', 'kebutuhan_minyak',
        'kebutuhan_pengobatan', 'penyebab_banjir'
    ];

    public function getPelaporan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getDetail($id)
    {
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE pelaporan.id = $id");
        return $query->getResult();
    }

    public function getArrDetail($id)
    {
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE pelaporan.id = $id AND laporan.status = 'proses'");
        return $query->getResultArray();
    }
}
