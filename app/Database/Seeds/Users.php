<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        // membuat data
        $users_data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'nama_lengkap' => 'Rizki Andika Super',
                'role' => 'superadmin',
                'id_desa' => '1'
            ],
            [
                'username' => 'admin2',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'nama_lengkap' => 'Rizki Andika Admin',
                'id_desa' => '1',
                'role' => 'admin'
            ],
            [
                'username' => 'admin3',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'nama_lengkap' => 'Rizki Andika User',
                'id_desa' => '1',
                'role' => 'user'
            ]
        ];

        foreach ($users_data as $data) {
            // insert semua data ke tabel
            $this->db->table('users')->insert($data);
        }
    }
}
