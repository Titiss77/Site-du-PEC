<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InscriptionsTables extends Migration
{
    public function up()
    {
        // Table Tarifs
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'categorie' => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'prix'      => ['type' => 'DECIMAL', 'constraint' => '10,2'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tarifs');

        // Table Matériel
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nom'         => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT'],
            'pret'        => ['type' => 'BOOLEAN', 'default' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('materiel');
    }

    public function down() {
        $this->forge->dropTable('tarifs');
        $this->forge->dropTable('materiel');
    }
}