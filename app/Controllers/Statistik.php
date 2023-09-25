<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\LaporanModel;
use App\Models\PelaporanModel;

class Statistik extends BaseController
{
    protected $pelaporanModel;
    protected $laporanModel;
    protected $kabupatenModel;
    protected $kecamatanModel;
    protected $desaModel;

    public function __construct()
    {
        $this->pelaporanModel = new PelaporanModel();
        $this->laporanModel = new LaporanModel();
        $this->desaModel = new DesaModel();
        $this->kabupatenModel = new KabupatenModel();
        $this->kecamatanModel = new KecamatanModel();
    }


    //KABUPATEN
    public function index()
    {
        // $dat = $stat['total_rumah'];
        // dd($stat);
        $data = [
            'title' => 'Statistik Kebutuhan',
            'kabupatens' => $this->kabupatenModel->findAll(),
            'stats' => $this->laporanModel->getSatistikKabupaten(),
            'kabs' => $this->laporanModel->ambilKabupaten(),
            'kecamatans' => $this->kecamatanModel->findAll(),
            'desa' => $this->desaModel->findAll(),
        ];
        return view('statistik/index', $data);
    }

    public function filter_kabupaten()
    {
        $id = $this->request->getVar('id_kabupaten');
        $id_kec = $this->request->getVar('id_kecamatan');
        $id_desa = $this->request->getVar('id_desa');
        if ($id_desa != "") {
            $data = [
                'title' => 'Statistik Kebutuhan',
                'kabupatens' => $this->kabupatenModel->findAll(),
                'kecamatans' => $this->kecamatanModel->findAll(),
                'laporans' => $this->laporanModel->ambilDesa($id_desa),
                'stats' => $this->laporanModel->statsDesa($id_desa),
                'statis' => $this->laporanModel->getSatistikKabupatenperKecamatanStat($id),
                'desa' => $this->desaModel->findAll(),
                'id_kab' => $id,
                'id_kec' => $id_kec,
                'id_desa' => $id_desa,
            ];
            return view('statistik/filter_desa', $data);
        } elseif ($id_kec != "") {
            $data = [
                'title' => 'Statistik Kebutuhan',
                'kabupatens' => $this->kabupatenModel->findAll(),
                'kecamatans' => $this->kecamatanModel->findAll(),
                'laporans' => $this->laporanModel->ambilKecamatan($id_kec),
                'stats' => $this->laporanModel->statsKecamatan($id_kec),
                'statis' => $this->laporanModel->getSatistikKabupatenperKecamatanStat($id),
                'desa' => $this->desaModel->findAll(),
                'id_kab' => $id,
                'id_kec' => $id_kec,
            ];
            return view('statistik/filter_kecamatan', $data);
        } else {
            $data = [
                'title' => 'Statistik Kebutuhan',
                'kabupatens' => $this->kabupatenModel->findAll(),
                'kecamatans' => $this->kecamatanModel->findAll(),
                'laporans' => $this->laporanModel->getKabupaten($id),
                'stats' => $this->laporanModel->getSatistikKabupatenperKecamatan($id),
                'statis' => $this->laporanModel->getSatistikKabupatenperKecamatanStat($id),
                'desa' => $this->desaModel->findAll(),
                'id_kab' => $id,
            ];
            return view('statistik/filter_kabupaten', $data);
        }
    }
}
