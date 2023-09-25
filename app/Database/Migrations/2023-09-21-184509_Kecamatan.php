<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kecamatan extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel kecamatan
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'auto_increment' => true
            ],
            'nama_kecamatan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '256'
            ],
            'id_kabupaten'       => [
                'type'           => 'INT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at' =>
            [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel kecamatan
        $this->forge->createTable('kecamatan', TRUE);
    }

    public function down()
    {
        // menghapus tabel kecamatan
        $this->forge->dropTable('kecamatan');
    }
}
