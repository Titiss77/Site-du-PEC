<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePiscines extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'adresse'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'type_bassin' => ['type' => 'ENUM', 'constraint' => ['25m', '50m'], 'null' => true],
            'photo'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('piscines');
    }

    public function down()
    {
        $this->forge->dropTable('piscines');
    }
}