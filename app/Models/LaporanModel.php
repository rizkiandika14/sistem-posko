<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'laporan';
    protected $primaryKey       = 'id';
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields    = [
        'id_pelaporan',  'status', 'waktu_status'
    ];

    public function getLaporan($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    //USER
    public function getArrLaporan()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE users.id = $id_user");
        return $query->getResultArray();
    }

    public function getArrLaporanProses()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE users.id = $id_user AND laporan.status = 'proses'");
        return $query->getResultArray();
    }

    public function getArrLaporanBatal()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE users.id = $id_user AND laporan.status = 'batal'");
        return $query->getResultArray();
    }

    public function getArrLaporanSelesai()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE users.id = $id_user AND laporan.status = 'selesai'");
        return $query->getResultArray();
    }

    public function getFilterTanggalProses($tgl1, $tgl2)
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE DATE (pelaporan.created_at) BETWEEN DATE ('$tgl1') AND DATE ('$tgl2') AND laporan.status = 'proses' AND users.id = $id_user");
        return $query->getResultArray();
    }
    public function getFilterTanggalBatal($tgl1, $tgl2)
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE DATE (pelaporan.created_at) BETWEEN DATE ('$tgl1') AND DATE ('$tgl2') AND laporan.status = 'batal' AND users.id = $id_user");
        return $query->getResultArray();
    }
    public function getFilterTanggalSelesai($tgl1, $tgl2)
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE DATE (pelaporan.created_at) BETWEEN DATE ('$tgl1') AND DATE ('$tgl2') AND laporan.status = 'selesai' AND users.id = $id_user");
        return $query->getResultArray();
    }


    //ADMIN
    public function getArrLaporanAdmin()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten ORDER BY pelaporan.id ASC");
        return $query->getResultArray();
    }

    public function getArrLaporanProsesAdmin()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE laporan.status = 'proses'");
        return $query->getResultArray();
    }

    public function getArrLaporanBatalAdmin()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE laporan.status = 'batal'");
        return $query->getResultArray();
    }

    public function getArrLaporanSelesaiAdmin()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE laporan.status = 'selesai'");
        return $query->getResultArray();
    }

    public function getFilterTanggalAdmin($tgl1, $tgl2)
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE DATE (pelaporan.created_at) BETWEEN DATE ('$tgl1') AND DATE ('$tgl2')");
        return $query->getResultArray();
    }

    public function getFilterTanggalProsesAdmin($tgl1, $tgl2)
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE DATE (pelaporan.created_at) BETWEEN DATE ('$tgl1') AND DATE ('$tgl2') AND laporan.status = 'proses'");
        return $query->getResultArray();
    }

    public function getFilterTanggalBatalAdmin($tgl1, $tgl2)
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE DATE (pelaporan.created_at) BETWEEN DATE ('$tgl1') AND DATE ('$tgl2') AND laporan.status = 'batal'");
        return $query->getResultArray();
    }

    public function getFilterTanggalSelesaiAdmin($tgl1, $tgl2)
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.*, pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE DATE (pelaporan.created_at) BETWEEN DATE ('$tgl1') AND DATE ('$tgl2') AND laporan.status = 'selesai'");
        return $query->getResultArray();
    }

    public function batalkan($id)
    {
        $myTime = Time::now('Asia/Jakarta', 'en_US');
        $this->db->query("UPDATE laporan 
                SET waktu_status = '$myTime',status = 'batal'
                WHERE id_pelaporan = $id");
    }
    public function selesaikan($id)
    {
        $myTime = Time::now('Asia/Jakarta', 'en_US');
        $this->db->query("UPDATE laporan 
        SET waktu_status = '$myTime', status = 'selesai'
        WHERE id_pelaporan = $id");
    }

    //Statistik
    public function getAllStatistik()
    {
        $id_user = session()->get('id');
        $query = $this->db->query("SELECT pelaporan.created_at as dibuat,laporan.*,users.*,desa.*,kecamatan.*,kabupaten.*,
        SUM(pelaporan.jumlah_rumah)
        FROM pelaporan
        LEFT JOIN desa on desa.id = pelaporan.id_desa
        LEFT JOIN users on users.id = pelaporan.id_user
        LEFT JOIN laporan on laporan.id_pelaporan = pelaporan.id
        LEFT JOIN kecamatan ON kecamatan.id = desa.id_kecamatan
        LEFT JOIN kabupaten ON kabupaten.id = desa.id_kabupaten
        WHERE laporan.status = 'selesai'
        GROUP BY kabupaten.id");
        return $query->getResultArray();
    }

    public function getKabupaten($id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE kabupaten.id = $id AND laporan.status = 'selesai'");
        return $query->getResultArray();
    }

    public function ambilKabupaten()
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,COUNT(DISTINCT pelaporan.id_kabupaten) total_kabupaten,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE laporan.status = 'selesai'");
        return $query->getResultArray();
    }

    public function getSatistikKabupaten()
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kabupaten) total_kabupaten,
                                    COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    SUM(jumlah_rumah) as total_rumah, 
                                    SUM(pelaporan.jumlah_warga) as total_warga, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE laporan.status = 'selesai'
                                    GROUP BY kabupaten.id");
        return $query->getResult();
    }


    public function getSatistikKabupatenperKecamatan($id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,COUNT(DISTINCT pelaporan.id_kabupaten) total_kabupaten,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten, kecamatan.nama_kecamatan
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN kecamatan on pelaporan.id_kecamatan = kecamatan.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE laporan.status = 'selesai' AND kabupaten.id = $id
                                    GROUP BY kecamatan.id");
        return $query->getResult();
    }
    public function getSatistikKabupatenperKecamatanStat($id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,COUNT(DISTINCT pelaporan.id_kabupaten) total_kabupaten,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten, kecamatan.nama_kecamatan
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN kecamatan on pelaporan.id_kecamatan = kecamatan.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE laporan.status = 'selesai' AND kabupaten.id = $id
                                    GROUP BY kecamatan.id");
        return $query->getResultArray();
    }


    public function coba()
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kabupaten) total_kabupaten,
                                    COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    SUM(jumlah_rumah) as total_rumah, 
                                    SUM(pelaporan.jumlah_warga) as total_warga, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE laporan.status = 'selesai'
                                    GROUP BY kabupaten.id");
        return $query->getResult();
    }

    public function ambilKecamatan($id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten, kecamatan.nama_kecamatan
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN kecamatan on pelaporan.id_kecamatan = kecamatan.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE kecamatan.id = $id AND laporan.status = 'selesai'");
        return $query->getResultArray();
    }

    public function statsKecamatan($id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,COUNT(DISTINCT pelaporan.id_kabupaten) total_kabupaten,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten, kecamatan.nama_kecamatan, desa.nama_desa
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN kecamatan on pelaporan.id_kecamatan = kecamatan.id 
                                    JOIN desa on pelaporan.id_desa = desa.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE laporan.status = 'selesai' AND kecamatan.id = $id
                                    GROUP BY desa.id");
        return $query->getResult();
    }

    public function ambilDesa($id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten, kecamatan.nama_kecamatan, desa.nama_desa
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN kecamatan on pelaporan.id_kecamatan = kecamatan.id 
                                    JOIN desa on pelaporan.id_desa = desa.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE desa.id = $id AND laporan.status = 'selesai'");
        return $query->getResultArray();
    }

    public function statsDesa($id)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT pelaporan.id_kecamatan) total_kecamatan,COUNT(DISTINCT pelaporan.id_kabupaten) total_kabupaten,
                                    COUNT(DISTINCT pelaporan.id_desa) total_desa,
                                    sum(pelaporan.jumlah_warga) as total_warga, 
                                    sum(jumlah_rumah) as total_rumah, 
                                    SUM(jumlah_meninggal) as total_meninggal,
                                    SUM(jumlah_pengungsi) as total_pengungsi, SUM(kebutuhan_perahu) as total_perahu,
                                    SUM(kebutuhan_tenda) as total_tenda,
                                    SUM(kebutuhan_beras) as total_beras,
                                    SUM(kebutuhan_telur) as total_telur,
                                    SUM(kebutuhan_mineral) as total_mineral,
                                    SUM(kebutuhan_minyak) as total_minyak,
                                    SUM(kebutuhan_pengobatan) as total_pengobatan, 
                                    kabupaten.id, kabupaten.nama_kabupaten, kecamatan.nama_kecamatan, desa.nama_desa
                                    FROM pelaporan 
                                    JOIN kabupaten on pelaporan.id_kabupaten = kabupaten.id 
                                    JOIN kecamatan on pelaporan.id_kecamatan = kecamatan.id 
                                    JOIN desa on pelaporan.id_desa = desa.id 
                                    JOIN laporan on laporan.id_pelaporan = pelaporan.id
                                    WHERE laporan.status = 'selesai' AND desa.id = $id");
        return $query->getResult();
    }

    public function pelaporan_total()
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan From laporan");
        return $query->getResult();
    }
    public function pelaporan_selesai()
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan From laporan where status = 'selesai'");
        return $query->getResult();
    }
    public function pelaporan_proses()
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan From laporan where status = 'proses'");
        return $query->getResult();
    }
    public function pelaporan_batal()
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan From laporan where status = 'batal'");
        return $query->getResult();
    }
    public function pengguna()
    {
        $query = $this->db->query("SELECT COUNT(id) as total From users");
        return $query->getResult();
    }
    public function pelaporan_totaluser($id)
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan, pelaporan.id_user From laporan join pelaporan on laporan.id_pelaporan = pelaporan.id where pelaporan.id_user = $id");
        return $query->getResult();
    }
    public function pelaporan_selesaiuser($id)
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan,pelaporan.id_user From laporan join pelaporan on laporan.id_pelaporan = pelaporan.id where pelaporan.id_user = $id AND laporan.status = 'selesai'");
        return $query->getResult();
    }
    public function pelaporan_prosesuser($id)
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan,pelaporan.id_user From laporan join pelaporan on laporan.id_pelaporan = pelaporan.id where pelaporan.id_user = $id AND laporan.status = 'proses'");
        return $query->getResult();
    }
    public function pelaporan_bataluser($id)
    {
        $query = $this->db->query("SELECT COUNT(id_pelaporan) as total_pelaporan,pelaporan.id_user From laporan join pelaporan on laporan.id_pelaporan = pelaporan.id where pelaporan.id_user = $id AND laporan.status = 'batal'");
        return $query->getResult();
    }
}
