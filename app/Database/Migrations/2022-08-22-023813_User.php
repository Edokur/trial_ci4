<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'password'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'salt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 55,
            ],
            'role'      => [
                'type'           => 'ENUM',
                'constraint'     => ['1', '2'],
                'default'        => '2',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
