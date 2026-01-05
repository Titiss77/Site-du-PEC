<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGeneral extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'image'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'nomClub'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'description'   => ['type' => 'TEXT'],
            'philosophie'   => ['type' => 'TEXT'],
            'nombreNageurs' => ['type' => 'INT', 'constraint' => 11],
            'nombreHommes'  => ['type' => 'INT', 'constraint' => 11],
            'nombreFemmes'  => ['type' => 'INT', 'constraint' => 11],
            'projetSportif' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('general');
    }

    public function down()
    {
        $this->forge->dropTable('general');
    }
}