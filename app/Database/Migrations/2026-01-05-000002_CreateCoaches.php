<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCoaches extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'photo'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'numTel'      => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'mail'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('coaches');
    }

    public function down()
    {
        $this->forge->dropTable('coaches');
    }
}