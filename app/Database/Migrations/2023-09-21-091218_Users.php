<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'auto_increment' => true
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '256'
            ],
            'password'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '256',
            ],
            'nama_lengkap' => [
                'type'           => 'VARCHAR',
                'constraint'     => '256',
            ],
            'id_desa'      => [
                'type'           => 'INT'
            ],
            'role'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '128',
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

        // Membuat tabel user
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        // menghapus tabel user
        $this->forge->dropTable('users');
    }
}
