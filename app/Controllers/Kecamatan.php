<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;

class Kecamatan extends BaseController
{
    protected $kecamatanModel;
    protected $kabupatenModel;
    protected $desaModel;

    public function __construct()
    {
        $this->kabupatenModel = new KabupatenModel();
        $this->kecamatanModel = new KecamatanModel();
        $this->desaModel = new DesaModel();
    }
    public function index()
    {

        $data = [
            'title'  => 'Kecamatan',
            'kecamatans' => $this->kecamatanModel->getJumlahKecamatan(),
            'kabupatens' => $this->kabupatenModel->findAll(),
        ];
        return view('kecamatan/index', $data);
    }

    public function tambah()
    {
        $this->kecamatanModel->save([
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to('/kecamatan');
    }

    public function delete($id)
    {
        $this->kecamatanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/kecamatan');
    }

    public function update($id)
    {
        $this->kecamatanModel->save([
            'id' => $id,
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');
        return redirect()->to('/kecamatan');
    }
}
