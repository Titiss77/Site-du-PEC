<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActualites extends Migration
{
    // app/Database/Migrations/2026-01-06-000007_CreatePendingContacts.php

    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'Titre' => ['type' => 'VARCHAR', 'constraint' => 50],
            'image' => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT'],
            'datePublication' => ['type' => 'DATE'],
            'dateEvenement' => ['type' => 'DATE', 'null' => true],
            'idAuteur' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('idAuteur', 'membres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('actualites');
    }

    public function down()
    {
        $this->forge->dropTable('actualites');
    }
}