<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanModel;
use App\Models\PelaporanModel;

class ManagePelaporan extends BaseController
{
    protected $pelaporanModel;
    protected $laporanModel;

    public function __construct()
    {
        $this->pelaporanModel = new PelaporanModel();
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getArrLaporanAdmin(),
        ];
        return view('content/pelaporan', $data);
    }

    public function batal()
    {
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getArrLaporanBatalAdmin(),
        ];
        return view('content/pelaporan_batal', $data);
    }

    public function proses()
    {
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getArrLaporanProsesAdmin(),
        ];
        return view('content/pelaporan_proses', $data);
    }

    public function selesai()
    {
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getArrLaporanSelesaiAdmin(),
        ];
        return view('content/pelaporan_selesai', $data);
    }

    public function filter()
    {
        $date1 = strtotime($this->request->getVar('date1'));
        $tgl1 = date('Y-m-d', $date1);
        $date2 = strtotime($this->request->getVar('date2'));
        $tgl2 = date('Y-m-d', $date2);
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getFilterTanggalAdmin($tgl1, $tgl2),
        ];
        session()->setFlashdata('alert', 'Data ' . tgl($tgl1) . 'sampai ' . tgl($tgl2));
        return view('content/pelaporan', $data);
    }

    public function filter_proses()
    {
        $date1 = strtotime($this->request->getVar('date1'));
        $tgl1 = date('Y-m-d', $date1);
        $date2 = strtotime($this->request->getVar('date2'));
        $tgl2 = date('Y-m-d', $date2);
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getFilterTanggalProsesAdmin($tgl1, $tgl2),
        ];
        session()->setFlashdata('alert', 'Data ' . tgl($tgl1) . 'sampai ' . tgl($tgl2));
        return view('content/pelaporan_proses', $data);
    }
    public function filter_batal()
    {
        $date1 = strtotime($this->request->getVar('date1'));
        $tgl1 = date('Y-m-d', $date1);
        $date2 = strtotime($this->request->getVar('date2'));
        $tgl2 = date('Y-m-d', $date2);
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getFilterTanggalBatalAdmin($tgl1, $tgl2),
        ];
        session()->setFlashdata('alert', 'Data ' . tgl($tgl1) . 'sampai ' . tgl($tgl2));
        return view('content/pelaporan_batal', $data);
    }
    public function filter_selesai()
    {
        $date1 = strtotime($this->request->getVar('date1'));
        $tgl1 = date('Y-m-d', $date1);
        $date2 = strtotime($this->request->getVar('date2'));
        $tgl2 = date('Y-m-d', $date2);
        $data = [
            'title' => 'Manage Pelaporan',
            'laporans' => $this->laporanModel->getFilterTanggalSelesaiAdmin($tgl1, $tgl2),
        ];
        session()->setFlashdata('alert', 'Data ' . tgl($tgl1) . 'sampai ' . tgl($tgl2));
        return view('content/pelaporan_selesai', $data);
    }

    public function batalkan($id)
    {
        $this->laporanModel->batalkan($id);
        session()->setFlashdata('pesan', 'Data berhasil dibatalkan!');
        return redirect()->back();
    }

    public function selesaikan($id)
    {
        $this->laporanModel->selesaikan($id);
        session()->setFlashdata('pesan', 'Data berhasil selesai!');
        return redirect()->back();
    }
}
