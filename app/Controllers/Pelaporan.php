<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\LaporanModel;
use App\Models\PelaporanModel;
use Kint\Zval\Value;

class Pelaporan extends BaseController
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
            'title' => 'Pelaporan',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->laporanModel->getArrLaporanProses(),
        ];
        return view('data_banjir/index', $data);
    }

    public function tambah()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $data = [
            'title' => 'Pelaporan',
            'kabupaten' => $kabupatenModel
        ];
        return view('data_banjir/tambah', $data);
    }

    public function ajaxSearchkabupaten()
    {
        helper(['form', 'url']);

        $dataKec = new KecamatanModel();
        $id_kab = $this->request->getVar('id_kabupaten');
        if ($this->request->getVar('searchTerm')) {
            $list_kec = $dataKec->select('id,id_kabupaten,nama_kecamatan')->where('id_kabupaten', $id_kab)->like('nama_kecamatan', $this->request->getVar('searchTerm'))->orderBy('nama_kecamatan')->findAll();
        } else {
            $list_kec = $dataKec->select('id,id_kabupaten,nama_kecamatan')->where('id_kabupaten', $id_kab)->orderBy('nama_kecamatan')->findAll();
        }

        $data = [];
        foreach ($list_kec as $value) {
            $data[] = [
                'id' => $value['id'],
                'text' => $value['nama_kecamatan'],
            ];
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function ajaxSearchkecamatan()
    {
        $dataDesa = new DesaModel();
        $id_kec = $this->request->getVar('id_kecamatan');
        if ($this->request->getVar('searchTerm')) {
            $list_kec = $dataDesa->select('id,id_kecamatan,nama_desa')->where('id_kecamatan', $id_kec)->like('nama_desa', $this->request->getVar('searchTerm'))->orderBy('nama_desa')->findAll();
        } else {
            $list_kec = $dataDesa->select('id,id_kecamatan,nama_desa')->where('id_kecamatan', $id_kec)->orderBy('nama_desa')->findAll();
        }

        $data = [];
        foreach ($list_kec as $value) {
            $data[] = [
                'id' => $value['id'],
                'text' => $value['nama_desa'],
            ];
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function save()
    {
        $validation = \Config\Services::validation();
        $id_user = session()->get('id');

        //Rule validation
        $valid = $this->validate([
            'id_kabupaten' => [
                'label' => 'Nama Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi!'
                ]
            ],
            'id_kecamatan' => [
                'label' => 'Nama Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi!'
                ]
            ],
            'id_desa' => [
                'label' => 'Nama Desa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi!'
                ]
            ],
            'jumlah_rumah' => [
                'label' => 'Jumlah Rumah',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'jumlah_warga' => [
                'label' => 'Jumlah Warga',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'jumlah_meninggal' => [
                'label' => 'Jumlah Meninggal',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'jumlah_pengungsi' => [
                'label' => 'Jumlah Pengungsi',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'kebutuhan_perahu' => [
                'label' => 'Kebutuhan Perahu',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'kebutuhan_tenda' => [
                'label' => 'Kebutuhan Tenda',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'kebutuhan_beras' => [
                'label' => 'Kebutuhan Beras',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'kebutuhan_telur' => [
                'label' => 'Kebutuhan Telur',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'kebutuhan_mineral' => [
                'label' => 'Kebutuhan Air Mineral',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'kebutuhan_minyak' => [
                'label' => 'Kebutuhan Minyak Goreng',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'kebutuhan_pengobatan' => [
                'label' => 'Kebutuhan Pengobatan',
                'rules' => 'required|min_length[0]',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                    'min_length' => '{field} minimal 0'
                ]
            ],
            'penyebab_banjir' => [
                'label' => 'Penyebab Banjir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi!',
                ]
            ]

        ]);
        //penerapan validation
        if (!$valid) {
            $sessError = [
                'errid_kabupaten' => $validation->getError('id_kabupaten'),
                'errid_kecamatan' => $validation->getError('id_kecamatan'),
                'errid_desa' => $validation->getError('id_desa'),
                'errjumlah_rumah' => $validation->getError('jumlah_rumah'),
                'errjumlah_warga' => $validation->getError('jumlah_warga'),
                'errjumlah_meninggal' => $validation->getError('jumlah_meninggal'),
                'errjumlah_pengungsi' => $validation->getError('jumlah_pengungsi'),
                'errkebutuhan_perahu' => $validation->getError('kebutuhan_perahu'),
                'errkebutuhan_tenda' => $validation->getError('kebutuhan_tenda'),
                'errkebutuhan_beras' => $validation->getError('kebutuhan_beras'),
                'errkebutuhan_telur' => $validation->getError('kebutuhan_telur'),
                'errkebutuhan_mineral' => $validation->getError('kebutuhan_mineral'),
                'errkebutuhan_minyak' => $validation->getError('kebutuhan_minyak'),
                'errkebutuhan_pengobatan' => $validation->getError('kebutuhan_pengobatan'),
                'errpenyebab_banjir' => $validation->getError('penyebab_banjir')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to('/pelaporan/tambah')->withInput();
        } else {

            $max = $this->pelaporanModel->save([
                'id_desa' => $this->request->getVar('id_desa'),
                'id_kabupaten' => $this->request->getVar('id_kabupaten'),
                'id_kecamatan' => $this->request->getVar('id_kecamatan'),
                'id_user' => $id_user,
                'jumlah_rumah' => $this->request->getVar('jumlah_rumah'),
                'jumlah_warga' => $this->request->getVar('jumlah_warga'),
                'jumlah_meninggal' => $this->request->getVar('jumlah_meninggal'),
                'jumlah_pengungsi' => $this->request->getVar('jumlah_pengungsi'),
                'kebutuhan_perahu' => $this->request->getVar('kebutuhan_perahu'),
                'kebutuhan_tenda' => $this->request->getVar('kebutuhan_tenda'),
                'kebutuhan_beras' => $this->request->getVar('kebutuhan_beras'),
                'kebutuhan_telur' => $this->request->getVar('kebutuhan_telur'),
                'kebutuhan_mineral' => $this->request->getVar('kebutuhan_mineral'),
                'kebutuhan_minyak' => $this->request->getVar('kebutuhan_minyak'),
                'kebutuhan_pengobatan' => $this->request->getVar('kebutuhan_pengobatan'),
                'penyebab_banjir' => htmlspecialchars($this->request->getVar('penyebab_banjir')),
            ]);

            if ($max > 0) {
                $id_pel = $this->pelaporanModel->selectMax('id');
                $id_pelaporan = $id_pel->first();
                // dd($id_pelaporan);
                $this->laporanModel->save([
                    'id_pelaporan' => $id_pelaporan
                ]);
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
                return redirect()->to('/pelaporan');
            } else {
                session()->setFlashdata('pesan', 'Data gagal ditambahkan!');
                return redirect()->to('/pelaporan');
            }
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
            return redirect()->to('/pelaporan');
        }
    }

    public function delete($id)
    {
        $this->pelaporanModel->delete($id);
        $delete_laporan = $this->laporanModel->where('id_pelaporan', $id);
        $delete_laporan->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/pelaporan');
    }

    public function detail($id)
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $pelaporanModel = $this->pelaporanModel->findAll();
        $laporanModel = $this->laporanModel->findAll();
        $data = [
            'title' => 'Detail Pelaporan',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->pelaporanModel->getDetail($id),
        ];
        return view('data_banjir/detail', $data);
    }

    public function edit($id)
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $kecamatanModel = $this->kecamatanModel->findAll();
        $desaModel = $this->desaModel->findAll();

        $data = [
            'title' => 'Pelaporan',
            'kabupaten' => $kabupatenModel,
            'laporans' => $this->pelaporanModel->getArrDetail($id),
            'desa' => $desaModel,
            'kecamatan' => $kecamatanModel
        ];
        return view('data_banjir/edit', $data);
    }

    public function update($id)
    {
        $id_user = session()->get('id');

        $this->pelaporanModel->save([
            'id' => $id,
            'id_desa' => $this->request->getVar('id_desa'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'id_kecamatan' => $this->request->getVar('id_kecamatan'),
            'id_user' => $id_user,
            'jumlah_rumah' => $this->request->getVar('jumlah_rumah'),
            'jumlah_warga' => $this->request->getVar('jumlah_warga'),
            'jumlah_meninggal' => $this->request->getVar('jumlah_meninggal'),
            'jumlah_pengungsi' => $this->request->getVar('jumlah_pengungsi'),
            'kebutuhan_perahu' => $this->request->getVar('kebutuhan_perahu'),
            'kebutuhan_tenda' => $this->request->getVar('kebutuhan_tenda'),
            'kebutuhan_beras' => $this->request->getVar('kebutuhan_beras'),
            'kebutuhan_telur' => $this->request->getVar('kebutuhan_telur'),
            'kebutuhan_mineral' => $this->request->getVar('kebutuhan_mineral'),
            'kebutuhan_minyak' => $this->request->getVar('kebutuhan_minyak'),
            'kebutuhan_pengobatan' => $this->request->getVar('kebutuhan_pengobatan'),
            'penyebab_banjir' => htmlspecialchars($this->request->getVar('penyebab_banjir')),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');
        return redirect()->to('/pelaporan');
    }
}
