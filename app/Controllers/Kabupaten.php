<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;

class Kabupaten extends BaseController
{
    protected $kabupatenModel;
    protected $kecamatanModel;

    public function __construct()
    {
        $this->kabupatenModel = new KabupatenModel();
        $this->kecamatanModel = new KecamatanModel();
    }
    public function index()
    {
        $data = [
            'title'  => 'Kabupaten',
            'kabupatens' => $this->kabupatenModel->getJumlahKecamatan(),
        ];
        return view('kabupaten/index', $data);
    }

    public function tambah()
    {
        $this->kabupatenModel->save([
            'nama_kabupaten' => $this->request->getVar('nama_kabupaten'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to('/kabupaten');
    }

    public function delete($id)
    {
        $this->kabupatenModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/kabupaten');
    }

    public function update($id)
    {
        $this->kabupatenModel->save([
            'id' => $id,
            'nama_kabupaten' => $this->request->getVar('nama_kabupaten'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');
        return redirect()->to('/kabupaten');
    }
}
