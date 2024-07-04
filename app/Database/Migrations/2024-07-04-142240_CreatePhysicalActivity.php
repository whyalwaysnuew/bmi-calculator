<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePhysicalActivity extends Migration
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
            'description' => [
                'type' => 'LONGTEXT'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('physical_activity', true);
    }

    public function down()
    {
        $this->forge->dropTable('physical_activity', true);
    }
}
