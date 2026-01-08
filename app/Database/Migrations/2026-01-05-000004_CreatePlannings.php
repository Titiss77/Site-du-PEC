<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlannings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'categorie' => [
                'type'       => 'ENUM',
                'constraint' => ['scolaire', 'vacances', 'competitions'],
                'null'       => true,
            ],
            'date' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('plannings');
    }

    public function down()
    {
        $this->forge->dropTable('plannings');
    }
}