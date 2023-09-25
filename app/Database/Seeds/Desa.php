<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Desa extends Seeder
{
    public function run()
    {
        // membuat data
        $desa_data = [
            [
                'nama_desa' => 'Bingkeng',
                'id_kecamatan' => 1
            ],
            [
                'nama_desa' => 'Bolang',
                'id_kecamatan' => 1
            ],
            [
                'nama_desa' => 'Cijeruk',
                'id_kecamatan' => 1
            ],
            [
                'nama_desa' => 'Adimulya',
                'id_kecamatan' => 2
            ],
            [
                'nama_desa' => 'Bantar',
                'id_kecamatan' => 2
            ],
            [
                'nama_desa' => 'Mulyasari',
                'id_kecamatan' => 3
            ]
        ];

        foreach ($desa_data as $data) {
            // insert semua data ke tabel
            $this->db->table('desa')->insert($data);
        }
    }
}
