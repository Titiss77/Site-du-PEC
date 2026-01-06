<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendingContacts extends Migration
{
    // app/Database/Migrations/2026-01-06-000007_CreatePendingContacts.php

    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'email_user' => ['type' => 'VARCHAR', 'constraint' => 100],
            'destinataire' => ['type' => 'VARCHAR', 'constraint' => 50],
            'message' => ['type' => 'TEXT'],
            'token' => ['type' => 'VARCHAR', 'constraint' => 64],  // Le lien unique
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('pending_contacts');
    }

    public function down()
    {
        $this->forge->dropTable('pending_contacts');
    }
}