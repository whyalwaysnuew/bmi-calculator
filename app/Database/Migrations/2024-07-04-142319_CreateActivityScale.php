<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActivityScale extends Migration
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
            'scale' => [
                'type' => 'double',
                'unsigned' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('activity_scale', true);
    }

    public function down()
    {
        $this->forge->dropTable('activity_scale', true);
    }
}
