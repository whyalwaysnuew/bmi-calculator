<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConsumption extends Migration
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
            'type' => [
                'type' => 'INT',
            ],
            'energy' => [
                'type' => 'INT',
                'unsigned' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('consumption', true);
    }

    public function down()
    {
        $this->forge->dropTable('consumption', true);
    }
}
