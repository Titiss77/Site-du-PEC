<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTarifs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idGroupe' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'prix' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',  // Prix avec centimes
            ],
        ]);

        $this->forge->addKey('id', true);

        // Ajout de la clé étrangère
        $this->forge->addForeignKey('idGroupe', 'groupes', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('tarifs');
    }

    public function down()
    {
        $this->forge->dropTable('tarifs');
    }
}
