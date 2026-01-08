<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMateriel extends Migration
{
    public function up()
    {
        // Table Matériel
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom'         => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT'],
            'pret'        => ['type' => 'BOOLEAN', 'default' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('materiel');

    }

    public function down() {
        $this->forge->dropTable('materiel');
    }
}