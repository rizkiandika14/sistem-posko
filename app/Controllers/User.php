<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\LoginModel;

class User extends BaseController
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
        $user = $this->loginModel->getUser();
        $array = json_decode(json_encode($user), true);

        $data = [
            'title' => 'Manage User',
            'users' => $array
        ];
        return view('content/user', $data);
    }

    public function create()
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $data = [
            'title' => 'Manage User',
            'kabupaten' => $kabupatenModel
        ];
        return view('user/tambah', $data);
    }

    public function save()
    {
        $validation = \Config\Services::validation();

        //Rule validation
        $valid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]|min_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} minimal 5 karakter',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 5 karakter',
                ]
            ],
            'nama_lengkap' => [
                'label' => 'Nama Pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ]);
        //penerapan validation
        if (!$valid) {
            $sessError = [
                'errUsername' => $validation->getError('username'),
                'errPassword' => $validation->getError('password'),
                'errNama' => $validation->getError('nama_lengkap'),

            ];

            session()->setFlashdata($sessError);
            return redirect()->to('/user/tambah')->withInput();
        } else {
            $password = $this->request->getVar('password');

            $this->loginModel->save([
                'username' => $this->request->getVar('username'),
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'id_desa' => $this->request->getVar('id_desa'),
                'role' => $this->request->getVar('role'),
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);


            session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
            return redirect()->to('/user');
        }
    }

    public function edit($id)
    {
        $kabupatenModel = $this->kabupatenModel->findAll();
        $kecamatanModel = $this->kecamatanModel->findAll();
        $desaModel = $this->desaModel->findAll();

        $data = [
            'title' => 'Manage User',
            'userss' => $this->loginModel->getLogin($id),
            'kabupaten' => $kabupatenModel,
            'users' => $this->loginModel->getUserid($id),
            'desa' => $desaModel,
            'kecamatan' => $kecamatanModel,
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $userLama = $this->loginModel->getLogin($this->request->getVar('id'));
        if ($userLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'is_unique[users.username]';
        }
        //Rule validation
        $valid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ]);
        //penerapan validation
        if (!$valid) {
            $sessError = [
                'errUsername' => $validation->getError('username'),

            ];

            session()->setFlashdata($sessError);
            return redirect()->to('/user/edit/' . $this->request->getVar('id'))->withInput();
        } else {

            $this->loginModel->save([
                'id' => $id,
                'username' => $this->request->getVar('username'),
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'id_desa' => $this->request->getVar('id_desa'),
                'role' => $this->request->getVar('role')
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah!');
            return redirect()->to('/user');
        }
    }

    public function delete($id)
    {
        $this->loginModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/user');
    }
}
