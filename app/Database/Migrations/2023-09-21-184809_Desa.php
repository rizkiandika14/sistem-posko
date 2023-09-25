<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desa extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel desa
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'auto_increment' => true
            ],
            'nama_desa'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '256'
            ],
            'id_kecamatan'       => [
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

        // Membuat tabel desa
        $this->forge->createTable('desa', TRUE);
    }

    public function down()
    {
        // menghapus tabel desa
        $this->forge->dropTable('desa');
    }
}
