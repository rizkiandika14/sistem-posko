<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\LaporanModel;
use App\Models\PelaporanModel;

class DataPelaporan extends BaseController
{
    protected $kabupatenModel;
    protected $laporanModel;
    protected $pelaporanModel;
    protected $kecamatanModel;
    protected $desaModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->pelaporanModel = new PelaporanModel();
        $this->desaModel = new DesaModel();
        $this->kabupatenModel = new KabupatenModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $pelaporanModel = $this->pelaporanModel->findAll();
        $laporanModel = $this->laporanModel->findAll();

        $data = [
            'title' => 'Data Pelaporan Proses',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->laporanModel->getArrLaporanProses(),
        ];
        return view('data_pelaporan/index', $data);
    }

    public function batal()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $pelaporanModel = $this->pelaporanModel->findAll();
        $laporanModel = $this->laporanModel->findAll();

        $data = [
            'title' => 'Data Pelaporan Dibatalkan',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->laporanModel->getArrLaporanBatal(),
        ];
        return view('data_pelaporan/batal', $data);
    }

    public function selesai()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $pelaporanModel = $this->pelaporanModel->findAll();
        $laporanModel = $this->laporanModel->findAll();

        $data = [
            'title' => 'Data Pelaporan Selesai',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->laporanModel->getArrLaporanSelesai(),
        ];
        return view('data_pelaporan/selesai', $data);
    }

    public function filter_proses()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $pelaporanModel = $this->pelaporanModel->findAll();
        $date1 = strtotime($this->request->getVar('date1'));
        $tgl1 = date('Y-m-d', $date1);
        $date2 = strtotime($this->request->getVar('date2'));
        $tgl2 = date('Y-m-d', $date2);

        $laporanModel = $this->laporanModel->findAll();

        $data = [
            'title' => 'Data Pelaporan Proses',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->laporanModel->getFilterTanggalProses($tgl1, $tgl2),
        ];
        return view('data_pelaporan/index', $data);
    }

    public function filter_batal()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $pelaporanModel = $this->pelaporanModel->findAll();
        $date1 = strtotime($this->request->getVar('date1'));
        $tgl1 = date('Y-m-d', $date1);
        $date2 = strtotime($this->request->getVar('date2'));
        $tgl2 = date('Y-m-d', $date2);

        $laporanModel = $this->laporanModel->findAll();

        $data = [
            'title' => 'Data Pelaporan Dibatalkan',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->laporanModel->getFilterTanggalBatal($tgl1, $tgl2),
        ];
        return view('data_pelaporan/batal', $data);
    }

    public function filter_selesai()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $pelaporanModel = $this->pelaporanModel->findAll();
        $date1 = strtotime($this->request->getVar('date1'));
        $tgl1 = date('Y-m-d', $date1);
        $date2 = strtotime($this->request->getVar('date2'));
        $tgl2 = date('Y-m-d', $date2);

        $laporanModel = $this->laporanModel->findAll();

        $data = [
            'title' => 'Data Pelaporan Selesai',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->laporanModel->getFilterTanggalSelesai($tgl1, $tgl2),
        ];
        return view('data_pelaporan/selesai', $data);
    }
}
