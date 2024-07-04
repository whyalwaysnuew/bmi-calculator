<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'gender' => [
                'type' => 'CHAR',
                'constraint' => 1,
            ],
            'weight' => [
                'type' => 'DOUBLE',
                'unsigned' => true
            ],
            'height' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'age' => [
                'type' => 'INT',
                'unsigned' =>true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
