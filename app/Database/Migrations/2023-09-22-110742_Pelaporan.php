<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelaporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'id_desa'       => [
                'type'           => 'INT',
            ],
            'id_kecamatan'       => [
                'type'           => 'INT',
            ],
            'id_kabupaten'       => [
                'type'           => 'INT',
            ],
            'id_user'       => [
                'type'           => 'INT',
            ],
            'jumlah_rumah'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'jumlah_warga' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'jumlah_meninggal' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'jumlah_pengungsi'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'kebutuhan_perahu'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'kebutuhan_tenda'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'kebutuhan_beras'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'kebutuhan_telur'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'kebutuhan_mineral'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'kebutuhan_minyak'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'kebutuhan_pengobatan'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'penyebab_banjir'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 256
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

        // Membuat tabel news
        $this->forge->createTable('pelaporan', TRUE);
    }

    public function down()
    {
        // menghapus tabel news
        $this->forge->dropTable('pelaporan');
    }
}
