<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\LoginModel;

class Desa extends BaseController
{
    protected $loginModel;
    protected $kabupatenModel;
    protected $kecamatanModel;
    protected $desaModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->desaModel = new DesaModel();
        $this->kabupatenModel = new KabupatenModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Desa',
            'kecamatans' => $this->kecamatanModel->findAll(),
            'kabupatens' => $this->kabupatenModel->findAll(),
            'desas' => $this->desaModel->getNamadesa(),
        ];
        return view('desa/index', $data);
    }

    public function tambah()
    {
        $this->desaModel->save([
            'nama_desa' => $this->request->getVar('nama_desa'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'id_kecamatan' => $this->request->getVar('id_kecamatan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to('/desa');
    }

    public function delete($id)
    {
        $this->desaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/desa');
    }

    public function update($id)
    {
        $this->desaModel->save([
            'id' => $id,
            'nama_desa' => $this->request->getVar('nama_desa'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'id_kecamatan' => $this->request->getVar('id_kecamatan')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');
        return redirect()->to('/desa');
    }
}
