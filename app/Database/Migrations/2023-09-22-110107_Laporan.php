<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'id_pelaporan'       => [
                'type'           => 'INT',
            ],
            'status'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128,
                'DEFAULT' => 'proses'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at' =>
            [
                'type' => 'DATETIME',
                'null' => true
            ],
            'waktu_status' =>
            [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('laporan', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
        $this->forge->dropTable('laporan');
    }
}
