<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBureau extends Migration
{
    public function up()
    {
        // 1. Table des Membres
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom' => ['type' => 'VARCHAR', 'constraint' => 100],
            'photo' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'default' => '22'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('photo', 'images', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('membres');

        // 2. Table des Fonctions
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'titre' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('fonctions');

        // 3. Table de liaison (Pivot)
        $this->forge->addField([
            // ESSENTIEL : doit être 'unsigned' => true pour correspondre aux tables ci-dessus
            'membre_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'fonction_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
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