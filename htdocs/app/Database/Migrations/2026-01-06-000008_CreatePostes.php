<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostes extends Migration
{
    public function up()
    {
        // Table Postes
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'libelle'         => ['type' => 'VARCHAR', 'constraint' => 100],
            'mail' => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('postes');
    }

    public function down() {
        $this->forge->dropTable('postes');
    }
}