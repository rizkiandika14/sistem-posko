<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kabupaten extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel kabupaten
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'auto_increment' => true
            ],
            'nama_kabupaten'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '256'
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

        // Membuat tabel kabupaten
        $this->forge->createTable('kabupaten', TRUE);
    }

    public function down()
    {
        // menghapus tabel kabupaten
        $this->forge->dropTable('kabupaten');
    }
}
