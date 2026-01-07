<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBoutique extends Migration
{
    // app/Database/Migrations/2026-01-06-000007_CreatePendingContacts.php

    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom' => ['type' => 'VARCHAR', 'constraint' => 50],
            'url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT'],
            'tranchePrix' => ['type' => 'VARCHAR', 'constraint' => 50],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('boutique');
    }

    public function down()
    {
        $this->forge->dropTable('boutique');
    }
}