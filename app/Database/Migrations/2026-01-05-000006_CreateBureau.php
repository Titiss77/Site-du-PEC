<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBureau extends Migration
{
    public function up()
    {
        // Table des Membres
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'nom' => ['type' => 'VARCHAR', 'constraint' => 100],
            'photo' => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'vide.jpg'],
            'numTel' => ['type' => 'VARCHAR', 'constraint' => 20],
            'mail' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('membres');

        // Table des Fonctions
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'titre' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('fonctions');

        // Table de liaison (Pivot)
        $this->forge->addField([
            'membre_id' => ['type' => 'INT'],
            'fonction_id' => ['type' => 'INT'],
        ]);
        $this->forge->addForeignKey('membre_id', 'membres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('fonction_id', 'fonctions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('membre_fonction');
    }

    public function down()
    {
        $this->forge->dropTable('membre_fonction');
        $this->forge->dropTable('fonctions');
        $this->forge->dropTable('membres');
    }
}