<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kabupaten extends Seeder
{
    public function run()
    {
        // membuat data
        $kabupaten_data = [
            [
                'nama_kabupaten' => 'Cilacap'
            ]
        ];

        foreach ($kabupaten_data as $data) {
            // insert semua data ke tabel
            $this->db->table('kabupaten')->insert($data);
        }
    }
}
