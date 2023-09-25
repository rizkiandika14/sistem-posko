<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kecamatan extends Seeder
{
    public function run()
    {
        // membuat data
        $kecamatan_data = [
            [
                'nama_kecamatan' => 'Dayeuhluhur',
                'id_kabupaten' => 1
            ],
            [
                'nama_kecamatan' => 'Wanareja',
                'id_kabupaten' => 1
            ],
            [
                'nama_kecamatan' => 'Majenang',
                'id_kabupaten' => 1
            ],
            [
                'nama_kecamatan' => 'Cimanggu',
                'id_kabupaten' => 1
            ],
            [
                'nama_kecamatan' => 'Karangpucung',
                'id_kabupaten' => 1
            ]
        ];

        foreach ($kecamatan_data as $data) {
            // insert semua data ke tabel
            $this->db->table('kecamatan')->insert($data);
        }
    }
}
