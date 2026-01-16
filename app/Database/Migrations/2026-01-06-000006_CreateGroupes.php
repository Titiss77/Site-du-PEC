<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGroupes extends Migration
{
    public function up()
    {
        // On crée la structure de la table 'groupes'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tranche_age' => [
                'type'       => 'VARCHAR',
                'constraint' => '50', // Ex: "6-10 ans", "Adultes", "Tout âge"
                'null'       => true,
            ],
            'horaire_resume' => [
                'type'       => 'VARCHAR',
                'constraint' => '100', // Ex: "2x par semaine"
                'null'       => true,
            ],
            'prix' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2', // Prix avec centimes
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'ordre' => [ // Pour gérer l'ordre d'affichage
                'type'       => 'INT',
                'constraint' => 2,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('groupes');
    }

    public function down()
    {
        $this->forge->dropTable('groupes');
    }
}