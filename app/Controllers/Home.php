<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Home extends BaseController
{
    protected $laporanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }
    public function index()
    {
        $id = session()->get('id');
        $data = [
            'title' => 'Dashboard',
            'stats' => $this->laporanModel->getSatistikKabupaten(),
            'pelaporan_total' => $this->laporanModel->pelaporan_total(),
            'pelaporan_totaluser' => $this->laporanModel->pelaporan_totaluser($id),
            'pelaporan_proses' => $this->laporanModel->pelaporan_proses(),
            'pelaporan_prosesuser' => $this->laporanModel->pelaporan_prosesuser($id),
            'pelaporan_batal' => $this->laporanModel->pelaporan_batal(),
            'pelaporan_bataluser' => $this->laporanModel->pelaporan_bataluser($id),
            'pelaporan_selesai' => $this->laporanModel->pelaporan_selesai(),
            'pelaporan_selesaiuser' => $this->laporanModel->pelaporan_selesaiuser($id),
            'user' => $this->laporanModel->pengguna(),
            'kabs' => $this->laporanModel->ambilKabupaten(),
        ];
        return view('home', $data);
    }
}
