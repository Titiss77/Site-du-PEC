<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTarifs extends Migration
{
    public function up()
    {
        // Table Tarifs
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'categorie' => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'prix'      => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tarifs');
    }

    public function down() {
        $this->forge->dropTable('tarifs');
    }
}